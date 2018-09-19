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
		elseif($pilih == 'product'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualProduct();
		elseif($pilih == 'report'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualReport();
		elseif($pilih == 'status'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualStatus();
		elseif($pilih == 'booking'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualBooking();
		elseif($pilih == 'website'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualWebsite();
		elseif($pilih == 'payment'): //echo "\$pilih = $pilih <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualPayment();
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
			$carian[] = array('fix'=>'%like%', # cari x= / %like% / xlike
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => 'NoSiri', # cari dalam medan apa
				'apa' => $idBorang); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	function jadualProduct()
	{
		$myTable = 'test_product'; $medan = 'id as Action,*';
		$carian = $susun = null;
		/*# semak database
			$carian[] = array('fix'=>'xlike', # cari x= atau %like%
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => 'username', # cari dalam medan apa
				'apa' => 'admin'); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	function jadualReport()
	{
		$myTable = 'test_report'; $medan = 'id as Action,*';
		$carian = $susun = null;
		/*# semak database
			$carian[] = array('fix'=>'xlike', # cari x= atau %like%
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => 'username', # cari dalam medan apa
				'apa' => 'admin'); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	function jadualStatus()
	{
		list($idUser,$namaPendek) = $this->tanyaDataSesi();
		$userID = $idUser . '-' . $namaPendek;
		$myTable = 'test_booking_result'; $medan = '*';
		$carian = $susun = null;
		# semak database
			$carian[] = array('fix'=>'x=', # cari x= atau %like%
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => 'idUser', # cari dalam medan apa
				'apa' => $userID); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	function jadualBooking()
	{
		list($idUser,$namaPendek) = $this->tanyaDataSesi();
		$userID = $idUser . '-' . $namaPendek;
		$myTable = 'test_booking_criteria'; $medan = '*';
		$carian = $susun = null;
		# semak database
			$carian[] = array('fix'=>'x=', # cari x= atau %like%
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => 'idUser', # cari dalam medan apa
				'apa' => $userID); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	function jadualPayment()
	{
		list($idUser,$namaPendek) = $this->tanyaDataSesi();
		$userID = $idUser . '-' . $namaPendek;
		$myTable = 'test_payment'; $medan = '*';
		$carian = $susun = null;
		# semak database
			$carian[] = array('fix'=>'x=', # cari x= atau %like%
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => 'idUser', # cari dalam medan apa
				'apa' => $userID); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	function jadualWebsite()
	{
		$myTable = 'test_website';
		$medan = '`website_id` as Action,`website_id`,`website_name`,`website_link`,`note`';
		$carian = $susun = null;
		/*# semak database
			$carian[] = array('fix'=>'xlike', # cari x= atau %like%
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => 'username', # cari dalam medan apa
				'apa' => 'admin'); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	public function tambahPembolehubah($pilih)
	{
		//$pilih = null;
		if($pilih == 'profile'): //echo "\$pilih = $pilih <br>";
			$myTable = 'login';
		elseif($pilih == 'product'): //echo "\$pilih = $pilih <br>";
			$myTable = 'test_product';
		elseif($pilih == 'report'): //echo "\$pilih = $pilih <br>";
			$myTable = 'test_report';
		elseif($pilih == 'booking'): //echo "\$pilih = $pilih <br>";
			$myTable = 'test_booking_criteria';
		elseif($pilih == 'website'): //echo "\$pilih = $pilih <br>";
			$myTable = 'test_website';
		elseif($pilih == 'payment'): //echo "\$pilih = $pilih <br>";
			$myTable = 'test_payment';
		else: //echo "\$pilih = $pilih <br>";
			$myTable = null;
		endif;

		return array($myTable); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	public function pilihJadual($pilih, $m = null)
	{
		//$pilih = null;
		list($idUser,$namaPendek) = $this->tanyaDataSesi();
		if($pilih == 'profile'): //echo "\$pilih = $pilih <br>";
			$t = array('login');
		elseif($pilih == 'product'): //echo "\$pilih = $pilih <br>";
			$t = array('test_product');
		elseif($pilih == 'report'): //echo "\$pilih = $pilih <br>";
			$t = array('test_report');
		elseif($pilih == 'booking'): //echo "\$pilih = $pilih <br>";
			$t = array('test_booking_criteria','test_booking_result');
			$m = array($idUser,$namaPendek);
		elseif($pilih == 'website'): //echo "\$pilih = $pilih <br>";
			$t = array('test_website');
		else: //echo "\$pilih = $pilih <br>";
			$t = $m = null;
		endif;

		return array($t,$m); # pulangkan nilai
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
		$data = array('be2016_a','be2016_b','be2016_kp202a','be2016_kp202a_null','be2016_kp202b','be2016_kp202b_null','be2016_kp202_5p','be2016_kp202_5p_null',
			'be2016_kp301a','be2016_kp301b','be2016_kp302a','be2016_kp302b','be2016_kp303a','be2016_kp303b','be2016_kp304a','be2016_kp304b','be2016_kp305a','be2016_kp305b',
			'be2016_kp306a','be2016_kp306b','be2016_kp308a','be2016_kp308b','be2016_kp309a','be2016_kp309b','be2016_kp310a','be2016_kp310b','be2016_kp311a','be2016_kp311b',
			'be2016_kp312a','be2016_kp312b','be2016_kp313a','be2016_kp313b','be2016_kp314a','be2016_kp314b','be2016_kp315a','be2016_kp315b','be2016_kp316a','be2016_kp316b',
			'be2016_kp317a','be2016_kp317b','be2016_kp318a','be2016_kp318b','be2016_kp319a','be2016_kp319b','be2016_kp320a','be2016_kp320b','be2016_kp322a','be2016_kp322b',
			'be2016_kp323a','be2016_kp323b','be2016_kp324a','be2016_kp324b','be2016_kp325a','be2016_kp325b','be2016_kp328a','be2016_kp328b','be2016_kp330a','be2016_kp330b',
			'be2016_kp331a','be2016_kp331b','be2016_kp332a','be2016_kp332b','be2016_kp333a','be2016_kp333b','be2016_kp334a','be2016_kp334b','be2016_kp335a','be2016_kp335b',
			'be2016_kp336a','be2016_kp336b','be2016_kp392a','be2016_kp392b','be2016_kp393a','be2016_kp393b','be2016_kp840a','be2016_kp840b','be2016_kp850a','be2016_kp850b',
			'be2016_kp890a','be2016_kp890b',
			'pbe2010rev','pbe2010_q1','pbe2010_q2','pbe2010_q3','pbe2010_q4','pbe2010_q5a','pbe2010_q5b','pbe2010_q6','pbe2010_q7','pbe2010_q8','pbe2010_q9',
			'pbe2010_q10','pbe2010_q11','pbe2010_q11_kp323kp325_q14_kp318','pbe2010_q12','pbe2010_q13a','pbe2010_q13b	InnoDB','pbe2010_q13c',	'pbe2010_q14',
			'pbe2015_a','pbe2015_b',
			'pbe2015_kp313a','pbe2015_kp313b','pbe2015_kp314a','pbe2015_kp314b','pbe2015_kp315a','pbe2015_kp315b','pbe2015_kp317a','pbe2015_kp317b',
			'pbe2015_kp318a','pbe2015_kp318b','pbe2015_kp322a','pbe2015_kp322b','pbe2015_kp323a','pbe2015_kp323b','pbe2015_kp324a','pbe2015_kp324b',
			'pbe2015_kp325a','pbe2015_kp325b','pbe2015_kpall_a','pbe2015_kpall_b',
			'pertubuhan','pertubuhan_copy1','pertubuhan_copy2','pertubuhan_copy3'
			);
		//$data['SSM'] = array('ssm_fail9','ssm_file5');

		return $data;
	}
#---------------------------------------------------------------------------------------------------#
#=====================================================================================================
}