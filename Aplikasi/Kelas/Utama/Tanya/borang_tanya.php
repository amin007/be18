<?php
namespace Aplikasi\Tanya; //echo __NAMESPACE__;
class Borang_Tanya extends \Aplikasi\Kitab\Tanya
{
#=====================================================================================================
	public function __construct()
	{
		parent::__construct();
	}
#---------------------------------------------------------------------------------------------------#
	public function semakPembolehubah($senarai,$jadual)
	{
		echo '<pre>$jadual = ' . $jadual . '|<br>';
		print_r($senarai); echo '</pre>';//*/
	}
#---------------------------------------------------------------------------------------------------#
	function data_contoh($pilih)
	{
		$data = array(
			'namaPendek' => 'james007',
			'namaPenuh' => 'Polan Bin Polan',
			'level' => 'pelawat'
		); # dapatkan medan terlibat
		$kira = 1; # kira jumlah data

		return ($pilih==1) ? $kira : $data; # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	public function medanRangka()
	{
		$medan = 'newss,ssm,concat_ws("<br>",nama,operator) as nama,'
			. 'fe,batchProses,hantar_prosesan,mko,respon R,msic2008,kp,nama_kp,'
			. 'concat_ws("<br>",alamat1,alamat2,poskod,bandar,negeri) as alamat'
			//. 'concat_ws("<br>",semak1,mdt,notamdt2014,notamdt2012,notamdt2011) as nota_lama'
			. "\r";

		return $medan;
	}
#---------------------------------------------------------------------------------------------------#
	public function medanData()
	{
		$medan = 'newss,nossm,nama,fe,"<input type=\"checkbox\">" as tik,' . "\r"
			//. 'concat_ws("<br>",alamat1,alamat2,poskod,bandar,negeri) as alamat,'
			. 'mko,respon R,survei,kp,msic2008,' . "\r"
			. ' concat_ws("|",' . "\r"
			. ' 	concat_ws("="," hasil",format(hasil,0)),' . "\r"
			. ' 	concat_ws("="," belanja",format(belanja,0)),' . "\r"
			. ' 	concat_ws("="," gaji",format(gaji,0)),' . "\r"
			. ' 	concat_ws("="," aset",format(aset,0)),' . "\r"
			. ' 	concat_ws("="," staf",format(staf,0)),' . "\r"
			. ' 	concat_ws("="," stok akhir",format(stok,0))' . "\r"
			. ' ) as data5P,nota'
			. "\r";

		return $medan;
	}
#---------------------------------------------------------------------------------------------------#
	public function cariKhas02($a,$b,$c,$d)
	{
		$medan[0] = array(
			'newss' => '000000123456',
			'nossm' => 'JR0001234',
			'nama' => 'Biar Rahsia',
			'operator' => '',
			'alamat' => 'NO 1, JALAN 2, TAMAN 3 48000 MUAR',
		);

		return $medan;
	}
#---------------------------------------------------------------------------------------------------#
	public function cariKhas01($a,$b,$c,$d)
	{
		$medan[0] = array(
			'newss' => '000000123456',
			'nossm' => 'JR0001234',
			'nama' => 'Biar Rahsia',
			'fe' => '','hantar' => '',
			'tik' => '<input type="checkbox">',
			'mko' => '','R' => '',
			'nama_kp' => 'pembuatan',
			'kp' => '205',
			'msic2008' => '10101'
		);
		$medan[1] = array(
			'newss' => '000000123457',
			'nossm' => 'JR0001235',
			'nama' => 'Biar Rahsia2',
			'fe' => '','hantar' => '',
			'tik' => '<input type="checkbox">',
			'mko' => '','R' => '',
			'nama_kp' => 'pembuatan',
			'kp' => '205',
			'msic2008' => '10101'
		);

		return $medan;
	}
#---------------------------------------------------------------------------------------------------#
	public function tanyaDataSesi()
	{
		$dataSulit = new \Aplikasi\Kitab\Sesi();
		//echo '<pre>'; print_r($_SESSION) . '</pre>';
		$idUser = $dataSulit->get('idUser');
		$namaPendek = $dataSulit->get('namaPendek');
		/*echo 'idUser=' . $dataSulit->get('idUser') . '<br>';
		echo 'namaPendek=' . $dataSulit->get('namaPendek') . '<br>';
		echo 'namaPenuh=' . $dataSulit->get('namaPenuh') . '<br>';
		echo 'email=' . $dataSulit->get('email') . '<br>';
		echo 'levelPengguna=' . $dataSulit->get('levelPengguna') . '';
		echo '<hr>';//*/

		return array($idUser,$namaPendek);
	}
#---------------------------------------------------------------------------------------------------#
	public function susunPembolehubah($pilih,$idBorang)
	{
		//$pilih = null;
		if($pilih == 'infoIctHasil'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualInfoIctHasil($idBorang);
		elseif($pilih == 'semuaBE'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualSemuaBE($idBorang);
		elseif($pilih == 'hasilBE'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualHasilBE($idBorang);
		elseif($pilih == 'belanjaBE'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualBelanjaBE($idBorang);
		elseif($pilih == 'stafBE'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualStafBE($idBorang);
		else: //echo "\$pilih = $pilih <br>";
			$myTable = $medan = $carian = $susun = null;
		endif;

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	function jadualInfoIctHasil($idBorang)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//list($idUser,$namaPendek) = $this->tanyaDataSesi();
		$myTable = 'data_malaysiabaru.mk_tr2010_hasil';
		$medan = '*';
		$carian = $susun = null;
		# semak database
			$carian[] = array('fix'=>'x=', # cari x= / %like% / xlike
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => 'newss', # cari dalam medan apa
				'apa' => $idBorang); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	function jadualSemuaBE($idBorang)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//list($idUser,$namaPendek) = $this->tanyaDataSesi();
		$myTable = null;
		$medan = '*';
		$carian = $susun = null;
		# semak database
			$carian[] = array('fix' => 'x=', # cari x= / %like% / xlike
				'atau' => 'WHERE', # WHERE / OR / AND
				'medan' => 'NoSiri', # cari dalam medan apa
				'apa' => $idBorang); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	function jadualHasilBE($idBorang)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//list($idUser,$namaPendek) = $this->tanyaDataSesi();
		$myTable = null;
		$medan = '*'; /*'`NoSiri`,`KodBanci`,`F2001`,`F2002`,`F2003`,`F2004`,`F2005`,`F2006`,`F2007`,`F2008`,`F2009`,`F2010`,
		`F2011`,`F2012`,`F2013`,`F2014`,`F2015`,`F2016`,`F2017`,`F2018`,`F2019`,`F2020`,
		`F2021`,`F2022`,`F2023`,`F2024`,`F2025`,`F2026`,`F2027`,`F2028`,`F2029`,`F2030`,
		`F2031`,`F2032`,`F2033`,`F2034`,`F2035`,`F2036`,`F2037`,`F2038`,`F2040`,`F2042`,
		`F2043`,`F2044`,`F2045`,`F2046`,`F2047`,`F2048`,`F2049`,`F2050`,`F2051`,`F2052`,
		`F2053`,`F2054`,`F2055`,`F2056`,`F2057`,`F2058`,`F2059`,`F2060`,`F2061`,`F2062`,
		`F2063`,`F2064`,`F2065`,`F2069`,`F2070`,`F2072`,`F2073`,`F2074`,`F2075`,`F2076`,
		`F2077`,`F2078`,`F2079`,`F2080`,`F2081`,`F2082`,`F2083`,`F2084`,`F2085`,`F2086`,
		`F2087`,`F2088`,`F2097`,`F2098`,`F2089`,`F2094`,`F2095`,`F2096`,`F2099`';//*/
		$carian = $susun = null;
		# semak database
			$carian[] = array('fix' => 'x=', # cari x= / %like% / xlike
				'atau' => 'WHERE', # WHERE / OR / AND
				'medan' => 'NoSiri', # cari dalam medan apa
				'apa' => $idBorang); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	function jadualBelanjaBE($idBorang)
	{
		$myTable = null;
		$medan = '*'; /*'`F2101`,`F2102`,`F2103`,`F2104`,`F2105`,`F2106`,`F2107`,`F2108`,`F2109`,`F2110`,
			`F2111`,`F2112`,`F2113`,`F2114`,`F2115`,`F2116`,`F2117`,`F2118`,`F2119`,`F2120`,
			`F2121`,`F2122`,`F2123`,`F2124`,`F2125`,`F2126`,`F2127`,`F2128`,`F2129`,`F2130`,
			`F2131`,`F2132`,`F2133`,`F2134`,`F2135`,`F2136`,`F2137`,`F2138`,`F2139`,`F2140`,
			`F2141`,`F2142`,`F2143`,`F2144`,`F2145`,`F2146`,`F2147`,`F2148`,`F2149`,`F2150`,
			`F2151`,`F2152`,`F2153`,`F2154`,`F2155`,`F2156`,`F2157`,`F2158`,`F2159`,`F2160`,
			`F2161`,`F2163`,`F2164`,`F2165`,`F2166`,`F2167`,`F2168`,`F2169`,`F2170`,
			`F2171`,`F2172`,`F2173`,`F2174`,`F2175`,`F2176`,`F2177`,`F2178`,`F2179`,`F2180`,
			`F2181`,`F2182`,`F2183`,`F2184`,`F2185`,`F2186`,`F2187`,`F2188`,`F2190`,
			`F2191`,`F2197`,`F2198`,`F2189`,`F2193`,`F2194`,`F2195`,`F2196`,`F2199`';//*/
		$carian = $susun = null;
		# semak database
			$carian[] = array('fix' => 'x=', # cari x= / %like% / xlike
				'atau' => 'WHERE', # WHERE / OR / AND
				'medan' => 'NoSiri', # cari dalam medan apa
				'apa' => $idBorang); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	function jadualStafBE($idBorang)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//list($idUser,$namaPendek) = $this->tanyaDataSesi();
		$myTable = null;
		$medan = '*';
		$carian = $susun = null;
		# semak database
			$carian[] = array('fix' => 'x=', # cari x= / %like% / xlike
				'atau' => 'WHERE', # WHERE / OR / AND
				'medan' => 'nosiri', # cari dalam medan apa
				'apa' => $idBorang); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	public function soalan()
	{
		$data = array('soalan-01','soalan-02','soalan-03','soalan-04','soalan-05',
			'soalan-06','soalan-07','soalan-08','soalan-09','soalan-10',
			'soalan-11','soalan-12','soalan-13','soalan-14','soalan-15',
			'soalan-16','soalan-17','soalan-18','soalan-19','soalan-20'
		);

		return $data;
	}
#---------------------------------------------------------------------------------------------------#
	public function dataBE()
	{
		$data = array(/*'be2016_kp202a','be2016_kp202b','be2016_kp202_5p',
			'be2016_kp301a','be2016_kp301b','be2016_kp302a','be2016_kp302b','be2016_kp303a','be2016_kp303b','be2016_kp304a','be2016_kp304b','be2016_kp305a','be2016_kp305b',
			'be2016_kp306a','be2016_kp306b','be2016_kp308a','be2016_kp308b','be2016_kp309a','be2016_kp309b','be2016_kp310a','be2016_kp310b','be2016_kp311a','be2016_kp311b',
			'be2016_kp312a','be2016_kp312b','be2016_kp313a','be2016_kp313b','be2016_kp314a','be2016_kp314b','be2016_kp315a','be2016_kp315b','be2016_kp316a','be2016_kp316b',
			'be2016_kp317a','be2016_kp317b','be2016_kp318a','be2016_kp318b','be2016_kp319a','be2016_kp319b','be2016_kp320a','be2016_kp320b','be2016_kp322a','be2016_kp322b',
			'be2016_kp323a','be2016_kp323b','be2016_kp324a','be2016_kp324b','be2016_kp325a','be2016_kp325b','be2016_kp328a','be2016_kp328b','be2016_kp330a','be2016_kp330b',
			'be2016_kp331a','be2016_kp331b','be2016_kp332a','be2016_kp332b','be2016_kp333a','be2016_kp333b','be2016_kp334a','be2016_kp334b','be2016_kp335a','be2016_kp335b',
			'be2016_kp336a','be2016_kp336b','be2016_kp392a','be2016_kp392b','be2016_kp393a','be2016_kp393b',//*/
			'be2016_kp840a',/*'be2016_kp840b',*/'be2016_kp850a',/*'be2016_kp850b',*/'be2016_kp890a',/*'be2016_kp890b',*/
			//'pbe2010rev',//'pbe2010_q1','pbe2010_q2','pbe2010_q3','pbe2010_q4','pbe2010_q5a','pbe2010_q5b','pbe2010_q6','pbe2010_q7','pbe2010_q8','pbe2010_q9',
			//'pbe2010_q10','pbe2010_q11','pbe2010_q11_kp323kp325_q14_kp318','pbe2010_q12','pbe2010_q13a','pbe2010_q13b','pbe2010_q13c','pbe2010_q14',
			//'pbe2015_a','pbe2015_b',
			//'pbe2015_kp313a','pbe2015_kp313b','pbe2015_kp314a','pbe2015_kp314b','pbe2015_kp315a','pbe2015_kp315b','pbe2015_kp317a','pbe2015_kp317b',
			//'pbe2015_kp318a','pbe2015_kp318b','pbe2015_kp322a','pbe2015_kp322b','pbe2015_kp323a','pbe2015_kp323b','pbe2015_kp324a','pbe2015_kp324b',
			//'pbe2015_kp325a','pbe2015_kp325b',
			//'pbe2015_kpall_a','pbe2015_kpall_b',
			//'pertubuhan','pertubuhan_copy1','pertubuhan_copy2','pertubuhan_copy3'//*/
			);
		//$data['SSM'] = array('ssm_fail9','ssm_file5');

		return $data;
	}
#---------------------------------------------------------------------------------------------------#
	public function dataBanci2016()
	{
		$data = array('301','302','303','304','305','306','308','309','310','311','312',
			'313','314','315','316','317','318','319','320','322','323','324','325','328',
			'330','331','332','333','334','335','336','392','393','840','850','890'
		);

		return $data;
	}
#---------------------------------------------------------------------------------------------------#
	public function ubahSuaiMedan($papar,$jadual)
	{
		$data = array();
		$hasil = $belanja = 0;
		foreach($this->soalanHasil() as $hasil):
			//echo '<br>' . $hasil . '|' . $papar[$jadual][0][$hasil];
			$data['Hasil'][0][$hasil] = $papar[$jadual][0][$hasil];
		endforeach;//*/
		foreach($this->soalanBelanja() as $belanja):
			echo '<br>' . $belanja . '|' . $papar[$jadual][0][$belanja];
			$data['Belanja'][0][$belanja] = $papar[$jadual][0][$belanja];
		endforeach;//*/
		//$this->semakPembolehubah($papar[$jadual], $jadual);
		//$this->semakPembolehubah($data, $jadual);

		return $data;
	}
#---------------------------------------------------------------------------------------------------#
	public function soalanHasil()
	{
		$data = array('F2001','F2002','F2003','F2004','F2005','F2006','F2007','F2008','F2009','F2010',
			'F2011','F2012','F2013','F2014','F2015','F2016','F2017','F2018','F2019','F2020',
			'F2021','F2022','F2023','F2024','F2025','F2026','F2027','F2028','F2029','F2030',
			'F2031','F2032','F2033','F2034','F2035','F2036','F2037','F2038','F2040','F2042',
			'F2043','F2044','F2045','F2046','F2047','F2048','F2049','F2050','F2051','F2052',
			'F2053','F2054','F2055','F2056','F2057','F2058','F2059','F2060','F2061','F2062',
			'F2063','F2064','F2065','F2069','F2070','F2072','F2073','F2074','F2075','F2076',
			'F2077','F2078','F2079','F2080','F2081','F2082','F2083','F2084','F2085','F2086',
			'F2087','F2088','F2097','F2098','F2089','F2094','F2095','F2096','F2099');
		return $data;
	}
#---------------------------------------------------------------------------------------------------#
	public function soalanBelanja()
	{
		$data = array(/*'F2101','F2102','F2103','F2104','F2105','F2106','F2107','F2108','F2109','F2110',
			'F2111','F2112','F2113','F2114','F2115','F2116','F2117','F2118','F2119','F2120',
			'F2121','F2122','F2123',*/
			'F2101','F2102','F2103','F2104','F2105','F2106','F2107','F2108','F2109','F2110',
			'F2111','F2112','F2113','F2114','F2115','F2116','F2117','F2118','F2119','F2120',
			'F2121','F2122','F2123','F2124','F2125','F2126','F2127','F2128','F2129','F2130',
			'F2131','F2132','F2133','F2134','F2135','F2136','F2137','F2138','F2139','F2140',
			'F2141','F2142','F2143','F2144','F2145','F2146','F2147','F2148','F2149','F2150',
			'F2151','F2152','F2153','F2154','F2155','F2156','F2157','F2158','F2159','F2160',
			'F2161','F2163','F2164','F2165','F2166','F2167','F2168','F2169','F2170',
			'F2171','F2172','F2173','F2174','F2175','F2176','F2177','F2178','F2179','F2180',
			'F2181','F2182','F2183','F2184','F2185','F2186','F2187','F2188','F2190',
			'F2191','F2197','F2198','F2189','F2193','F2194','F2195','F2196','F2199',
			'F2124','F2125','F2126','F2127','F2128','F2129','F2130',
			'F2131','F2132','F2133','F2134','F2135','F2136','F2137','F2138','F2139','F2140',
			'F2141','F2142','F2143','F2144','F2145','F2146','F2147','F2148','F2149','F2150',
			'F2151','F2152','F2153','F2154','F2155','F2156','F2157','F2158','F2159','F2160',
			'F2161','F2163','F2164','F2165','F2166','F2167','F2168','F2169','F2170','F2171',
			'F2172','F2173','F2174','F2175','F2176','F2177','F2178','F2179','F2180','F2181',
			'F2182','F2183','F2184','F2185','F2186','F2187','F2188','F2190','F2191','F2197',
			'F2198','F2189','F2193','F2194','F2195','F2196','F2199');
		return $data;
	}
#---------------------------------------------------------------------------------------------------#
	private function soalanAmBe2016()
	{
		$sql = ' CREATE TABLE be2016_v2 AS
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp202a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp205a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp301a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp302a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp303a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp304a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp305a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp306a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp308a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp309a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp310a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp311a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp312a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp313a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp314a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp315a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp316a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp317a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp318a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp319a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp320a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp322a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp323a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp324a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp325a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp328a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp330a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp331a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp332a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp333a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp334a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp335a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp336a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp392a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp393a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp840a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp850a UNION
		SELECT `kodbanci`,`nosiri`,`f0002`,`f0014`,`f0015` FROM be2016_kp890a
		';
		return $sql;
	}
#---------------------------------------------------------------------------------------------------#
	private function soalanGaji($m,$myTable)
	{
		$sql = 'SELECT ' . $m . ' "01-PEMILIK-01" L,`F4901` MSIA,`F5001` XMSIA,`F1401` JUM,"" GAJI, "" SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "02-KELUARGA-02" L,`F4902` MSIA,`F5002` XMSIA,`F1402` JUM,"" GAJI, "" SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "03-PENGURUS-12" L,`F4912` MSIA,`F5012` XMSIA,`F1412` JUM,`F1812` GAJI,`F5112` SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "04-PRO-13" L,`F4913` MSIA,`F5013` XMSIA,`F1413` JUM,`F1813` GAJI,`F5113` SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "05-PENYELIDIK-04" L,`F4904` MSIA,`F5004` XMSIA,`F1404` JUM,`F1804` GAJI,`F5104` SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "06-JURUTEKNIK-05" L,`F4905` MSIA,`F5005` XMSIA,`F1405` JUM,`F1805` GAJI,`F5105` SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "07-KERANI-14" L,`F4914` MSIA,`F5014` XMSIA,`F1414` JUM,`F1814` GAJI,`F5114` SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "08-JUALAN-15" L,`F4915` MSIA,`F5015` XMSIA,`F1415` JUM,`F1815` GAJI,`F5115` SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "09-KEMAHIRAN-16" L,`F4916` MSIA,`F5016` XMSIA,`F1416` JUM,`F1816` GAJI,`F5116` SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "10-MESIN-06" L,`F4906` MSIA,`F5006` XMSIA,`F1406` JUM,`F1806` GAJI,`F5106` SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "11-ASAS-06" L,`F4906` MSIA,`F5006` XMSIA,`F1406` JUM,`F1806` GAJI,`F5106` SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "12-JUM-TETAP-17" L,`F4917` MSIA,`F5017` XMSIA,`F1417` JUM,`F1817` GAJI,`F5117` SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "13-JUM-SAM-11" L,`F4911` MSIA,`F5011` XMSIA,`F1411` JUM,`F1811` GAJI,`F5111` SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "14-JUMLAH-19" L,`F4919` MSIA,`F5019` XMSIA,`F1419` JUM,`F1819` GAJI,`F5119` SUB FROM ' . $myTable . ' UNION

		SELECT ' . $m . ' "01-PEMILIK-21" P,`F4921` MSIA,`F5021` XMSIA,`F1421` JUM,"" GAJI, "" SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "02-KELUARGA-22" P,`F4922` MSIA,`F5022` XMSIA,`F1422` JUM,"" GAJI, "" SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "03-PENGURUS-32" P,`F4932` MSIA,`F5032` XMSIA,`F1432` JUM,`F1832` GAJI,`F5132` SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "04-PRO-23" P,`F4923` MSIA,`F5023` XMSIA,`F1423` JUM,`F1823` GAJI,`F5123` SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "05-PENYELIDIK-33" P,`F4933` MSIA,`F5033` XMSIA,`F1433` JUM,`F1833` GAJI,`F5133` SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "06-JURUTEKNIK-24" P,`F4924` MSIA,`F5024` XMSIA,`F1424` JUM,`F1824` GAJI,`F5124` SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "07-KERANI-25" P,`F4925` MSIA,`F5025` XMSIA,`F1425` JUM,`F1825` GAJI,`F5125` SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "08-JUALAN-34" P,`F4934` MSIA,`F5034` XMSIA,`F1434` JUM,`F1834` GAJI,`F5134` SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "09-KEMAHIRAN-35" P,`F4935` MSIA,`F5035` XMSIA,`F1435` JUM,`F1835` GAJI,`F5135` SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "11-ASAS-36" P,`F4936` MSIA,`F5036` XMSIA,`F1436` JUM,`F1836` GAJI,`F5136` SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "12-JUM-TETAP-26" P,`F4926` MSIA,`F5026` XMSIA,`F1426` JUM,`F1826` GAJI,`F5126` SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "13-JUM-SAM-31" P,`F4931` MSIA,`F5031` XMSIA,`F1431` JUM,`F1831` GAJI,`F5131` SUB FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "14-JUMLAH-39" P,`F4939` MSIA,`F5039` XMSIA,`F1439` JUM,`F1839` GAJI,`F5139` SUB FROM ' . $myTable . "\r";
		return $sql;
	}
#---------------------------------------------------------------------------------------------------#
	function soalanGajiSijil($m,$myTable)
	{
		$sql = '
		SELECT ' . $m . ' "01-PEMILIK" STAF, "L01" `JANTINA`,`F4901` MSIA,`F5001` XMSIA,`F1401` JUM,"" GAJI, "" SUB,"Pascasiswazah" SIJIL, "06" K,`F1506` L, `F1606` P FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "02-KELUARGA" STAF, "L02", `F4902` MSIA,`F5002` XMSIA,`F1402` JUM,"" GAJI, "" SUB,"Bacelor Akademik", "41",`F1541` L, `F1641` P FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "03-PENGURUS" STAF, "L12", `F4912` MSIA,`F5012` XMSIA,`F1412` JUM,`F1812` GAJI,`F5112` SUB,"Bacelor Teknikal", "42",`F1542` L, `F1642` P FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "04-PRO" STAF, "L13", `F4913` MSIA,`F5013` XMSIA,`F1413` JUM,`F1813` GAJI,`F5113` SUB,"Diploma Akademik", "43",`F1543` L, `F1643` P FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "05-PENYELIDIK" STAF, "L04", `F4904` MSIA,`F5004` XMSIA,`F1404` JUM,`F1804` GAJI,`F5104` SUB,"Diploma Teknikal TVET", "44",`F1544` L, `F1644` P FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "06-JURUTEKNIK" STAF, "L05", `F4905` MSIA,`F5005` XMSIA,`F1405` JUM,`F1805` GAJI,`F5105` SUB,"STPM", "03",`F1503` L, `F1603` P FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "07-KERANI" STAF, "L14", `F4914` MSIA,`F5014` XMSIA,`F1414` JUM,`F1814` GAJI,`F5114` SUB,"Sijil Akademik", "45",`F1545` L, `F1645` P FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "08-JUALAN" STAF, "L15", `F4915` MSIA,`F5015` XMSIA,`F1415` JUM,`F1815` GAJI,`F5115` SUB,"Sijil SKM 3", "46",`F1546` L, `F1646` P FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "09-KEMAHIRAN" STAF, "L16", `F4916` MSIA,`F5016` XMSIA,`F1416` JUM,`F1816` GAJI,`F5116` SUB,"Sijil SKM 1&2", "47",`F1547` L, `F1647` P FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "10-MESIN" STAF, "L06", `F4906` MSIA,`F5006` XMSIA,`F1406` JUM,`F1806` GAJI,`F5106` SUB,"Sijil Kemahiran lain", "48",`F1548` L, `F1648` P FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "11-ASAS" STAF, "L06", `F4906` MSIA,`F5006` XMSIA,`F1406` JUM,`F1806` GAJI,`F5106` SUB,"SPM", "04",`F1504` L, `F1604` P FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "12-JUM-TETAP" STAF, "L17", `F4917` MSIA,`F5017` XMSIA,`F1417` JUM,`F1817` GAJI,`F5117` SUB,"Bawah SPM", "05",`F1505` L, `F1605` P FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "13-JUM-SAM" STAF, "L11", `F4911` MSIA,`F5011` XMSIA,`F1411` JUM,`F1811` GAJI,`F5111` SUB,"JUMLAH", "09",`F1509` L, `F1609` P FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "14-JUMLAH" STAF, "L19", `F4919` MSIA,`F5019` XMSIA,`F1419` JUM,`F1819` GAJI,`F5119` SUB,"","","","" FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "01-PEMILIK" STAF, "P21", `F4921` MSIA,`F5021` XMSIA,`F1421` JUM,"" GAJI, "" SUB,"","","","" FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "02-KELUARGA" STAF, "P22", `F4922` MSIA,`F5022` XMSIA,`F1422` JUM,"" GAJI, "" SUB,"","","","" FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "03-PENGURUS" STAF, "P32", `F4932` MSIA,`F5032` XMSIA,`F1432` JUM,`F1832` GAJI,`F5132` SUB,"","","","" FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "04-PRO" STAF, "P23", `F4923` MSIA,`F5023` XMSIA,`F1423` JUM,`F1823` GAJI,`F5123` SUB,"","","","" FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "05-PENYELIDIK" STAF, "P33", `F4933` MSIA,`F5033` XMSIA,`F1433` JUM,`F1833` GAJI,`F5133` SUB,"","","","" FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "06-JURUTEKNIK" STAF, "P24", `F4924` MSIA,`F5024` XMSIA,`F1424` JUM,`F1824` GAJI,`F5124` SUB,"","","","" FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "07-KERANI" STAF, "P25", `F4925` MSIA,`F5025` XMSIA,`F1425` JUM,`F1825` GAJI,`F5125` SUB,"","","","" FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "08-JUALAN" STAF, "P34", `F4934` MSIA,`F5034` XMSIA,`F1434` JUM,`F1834` GAJI,`F5134` SUB,"","","","" FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "09-KEMAHIRAN" STAF, "P35", `F4935` MSIA,`F5035` XMSIA,`F1435` JUM,`F1835` GAJI,`F5135` SUB,"","","","" FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "11-ASAS" STAF, "P36", `F4936` MSIA,`F5036` XMSIA,`F1436` JUM,`F1836` GAJI,`F5136` SUB,"","","","" FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "12-JUM-TETAP" STAF, "P26", `F4926` MSIA,`F5026` XMSIA,`F1426` JUM,`F1826` GAJI,`F5126` SUB,"","","","" FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "13-JUM-SAM" STAF, "P31", `F4931` MSIA,`F5031` XMSIA,`F1431` JUM,`F1831` GAJI,`F5131` SUB,"","","","" FROM ' . $myTable . ' UNION
		SELECT ' . $m . ' "14-JUMLAH" STAF, "P39", `F4939` MSIA,`F5039` XMSIA,`F1439` JUM,`F1839` GAJI,`F5139` SUB,"","","","" FROM ' . $myTable . " UNION\r";
		return $sql;
	}
#---------------------------------------------------------------------------------------------------#
	private function soalanSijil()
	{
		$sql = '"Pascasiswazah" SIJIL, "06" K,`F1506` L, `F1606` P
		"Bacelor Akademik", "41",`F1541` L, `F1641` P
		"Bacelor Teknikal", "42",`F1542` L, `F1642` P
		"Diploma Akademik", "43",`F1543` L, `F1643` P
		"Diploma Teknikal TVET", "44",`F1544` L, `F1644` P
		"STPM", "03",`F1503` L, `F1603` P
		"Sijil Akademik", "45",`F1545` L, `F1645` P
		"Sijil SKM 3", "46",`F1546` L, `F1646` P
		"Sijil SKM 1&2", "47",`F1547` L, `F1647` P
		"Sijil Kemahiran lain", "48",`F1548` L, `F1648` P
		"SPM", "04",`F1504` L, `F1604` P
		"Bawah SPM", "05",`F1505` L, `F1605` P
		"JUMLAH", "09",`F1509` L, `F1609` P
		"","","",""
		';
		return $sql;
	}
#---------------------------------------------------------------------------------------------------#
#=====================================================================================================
}