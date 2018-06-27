<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__; 
class Kawalan extends \Aplikasi\Kitab\Kawal
{
#===========================================================================================
	function __construct()
	{
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		//\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_folder = huruf('kecil', namaClass($this));
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		//echo '<hr>Nama function :' . __FUNCTION__ . '<hr>';
	}
##------------------------------------------------------------------------------------------
	public function index()
	{
		# Set pembolehubah utama
		$this->papar->tajuk = namaClass($this);
		//echo '<hr> Nama class : ' . namaClass($this) . '<hr>';
		//echo $this->namaClass; //echo $this->namaFunction;

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$this->_folder = ''; # jika mahu ubah lokasi Papar
		$this->paparKandungan($this->_folder, 'index', $noInclude=0);
	}
##------------------------------------------------------------------------------------------
	public function paparKandungan($folder, $fail, $noInclude)
	{	# Pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/' . $fail, $jenis, $noInclude); # $noInclude=0
			//'mobile/mobile',$jenis,0); # $noInclude=0
		//*/
	}
##------------------------------------------------------------------------------------------
	public function semakPembolehubah($senarai)
	{
		echo '<pre>$senarai:<br>';
		print_r($senarai);
		echo '</pre>|';//*/
	}
##------------------------------------------------------------------------------------------
	function logout()
	{
		//echo '<pre>sebelum:'; print_r($_SESSION); echo '</pre>';
		\Aplikasi\Kitab\Sesi::destroy();
		header('location: ' . URL);
		//exit;
	}
#===========================================================================================
#-------------------------------------------------------------------------------------------
	public function pembolehubahSesi()
	{
		$sesi = \Aplikasi\Kitab\Sesi::init();
		//echo '<pre>MENU_ATAS - $_SESSION:'; print_r($_SESSION, 1); echo '</pre><br>';
		# set pembolehubah
		$pengguna = \Aplikasi\Kitab\Sesi::get('namaPendek');
		$level = \Aplikasi\Kitab\Sesi::get('levelPengguna');

		return array($pengguna, $level);
	}
#-------------------------------------------------------------------------------------------
	public function ubahCari()
	{
		//echo '<pre>$_GET->', print_r($_GET, 1) . '</pre>';
		# Bersihkan data $_POST
		$input = bersih($_GET['cari']);
		$dataID = str_pad($input, 12, "0", STR_PAD_LEFT);

		# Pergi papar kandungan
		//echo '<br>location: ' . URL . 'kawalan/ubah/' . $dataID . '';
		header('location: ' . URL . 'kawalan/ubah/' . $dataID);
	}
#-------------------------------------------------------------------------------------------
	public function ubah($cariID)
	{# Set pembolehubah utama
		//echo '<hr>' . $this->_namaClass . '<hr>';
		$this->jadualKawalan($cariID);
		$this->papar->template = 'biasa';
		//$this->papar->template = 'bootstrap';
		$fail = array('index','b_ubah','b_ubah_kawalan');

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$this->semakPembolehubah($this->papar->_cariIndustri); # Semak data dulu
		$this->_folder = 'cari'; # jika mahu ubah lokasi Papar
		$this->paparKandungan($this->_folder, $fail[1] , $noInclude=0); //*/
    }
#-------------------------------------------------------------------------------------------
	function semakDataJadual($senarai)
	{
		echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		echo '<pre>';
		//echo '<br>Test $_POST->'; print_r($_POST);
		//echo '<br>$senarai::'; print_r($senarai);
		//echo '<hr>$kira=' . sizeof($senarai) . '<hr>';
		# semak pembolehubah dari jadual lain
		echo '<br>$this->papar->medanID::'; print_r($this->papar->medanID);
		echo '<br>$this->papar->cariID::'; print_r($this->papar->cariID);
		echo '<br>$this->papar->carian::'; print_r($this->papar->carian);
		echo '<br>$this->papar->_jadual::';	print_r($this->papar->_jadual);
		echo '<br>$this->papar->senarai::'; print_r($this->papar->senarai);
		echo '<br>$this->papar->_cariIndustri::'; print_r($this->papar->_cariIndustri);
		echo '<br>$this->papar->_method::'; print_r($this->papar->_method);
		echo '</pre>';
	}
#-------------------------------------------------------------------------------------------
	function umpukNilai($umpuk)
	{
		list($senarai, $myTable, $newss, $medanID, $cariID) = $umpuk;
		$this->papar->medanID = $medanID;
		$this->papar->cariID = $newss;
		$this->papar->carian[] = $newss;
		$this->papar->_jadual = $myTable;
		$this->papar->senarai = $senarai;
		//$this->papar->_cariIndustri = null; # rujuk fungsi cariIndustri()
		$this->papar->_method = huruf('kecil', namaClass($this));
		//$this->semakDataJadual($senarai); # semak Pembolehubah
	}
#-------------------------------------------------------------------------------------------
	private function jadualKawalan($cariID)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		list($myTable, $medanID) = dpt_senarai('jadual_kawalan');
		$medan = $this->tanya->medanKawalan($cariID); //echo '<pre>';

		# bentuk tatasusunan $carian //$carian = null; 
		$carian[] = array('fix'=>'like', # cari x= atau %like%
			'atau'=>'WHERE', # WHERE / OR / AND
			'medan' => $medanID, # cari dalam medan apa
			'apa' => $cariID); # benda yang dicari
		# semak database
		$senarai['kes'] = $this->tanya->
			cariSemuaData("`$myTable`", $medan, $carian, null);
			//cariSql("`$myTable`", $medan, $carian, null);
		$newss = $this->cariMsic($senarai['kes']); # mula cari Msic
		# semak semua $pencam di sini
		$this->umpukNilai(array($senarai, $myTable, $newss,
			$medanID, $cariID));

		return array($senarai, $newss);
	}
#-------------------------------------------------------------------------------------------
	function cariMsic($cariApa)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		//echo '<pre>$cariApa::'; print_r($cariApa); echo '</pre>';

		if(isset($cariApa[0]['newss'])):
			# 1.1 ambil nilai newss
			$newss = $cariApa[0]['newss'];

			# 1.2 cari nilai msic & msic08 dalam jadual msic2008
				# substr("abcdef", 0, -1); # returns "abcde"
				# 326-46312 -> returns "46312"
			$msic08 = explode('-', $cariApa[0]['msic2008']);
			//echo '<br>$msic08:'; # Semak data dulu
			//$this->semakPembolehubah($msic08);
			$this->cariIndustri(dpt_senarai('msicbaru'),$msic08[1]);
		else:
			$newss = $this->papar->_cariIndustri = null;
		endif;

		return $newss;//*/
	}
#---------------------------------------------------------------------------------------------------
	private function cariIndustri($jadualMSIC, $msic08)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		$cariM6[] = array('fix'=>'x=','atau'=>'WHERE','medan'=>'msic','apa'=>$msic08);

		# mula cari $msis08 dalam database yang sama
		foreach ($jadualMSIC as $m6 => $msic)
		{# mula ulang table
			$jadual = substr($msic, 16); //echo "\$msic=$msic|\$jadual=$jadual<br>";

			# senarai nama medan
			if($jadual=='msic2008')/*bahagian B,kumpulan K,kelas Kls,*/
				$medanM6 = 'seksyen S,msic2000,msic,keterangan,notakaki';
			elseif($jadual=='msic2008_asas')
				$medanM6 = 'msic,survey kp,keterangan,keterangan_en';
			elseif($jadual=='msic_v1')
				$medanM6 = 'msic,survey kp,bil_pekerja staf,keterangan,notakaki';
			else $medanM6 = '*'; 

			$this->papar->_cariIndustri[$jadual] = $this->tanya->
				//cariSql($msic, $medanM6, $cariM6, null);
				cariSemuaData($msic, $medanM6, $cariM6, null);
		}# tamat ulang table
	}
#---------------------------------------------------------------------------------------------------
	public function ubahSimpan($dataID)
	{
		list($medanID,$senaraiJadual,$pass) = dpt_senarai('jadual_kawalan2');
		# ubahsuai $posmen
		$posmen = $this->ubahsuaiPost($medanID, $dataID, $senaraiJadual, $pass);
		//echo '<br>$dataID=' . $dataID . '<br>';
		//echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
		//echo '<pre>$posmen='; print_r($posmen); echo '</pre>';

		# mula ulang $senaraiJadual
		foreach ($senaraiJadual as $kunci => $jadual)
		{# mula ulang table
			$this->tanya->//ubahSqlSimpan
			ubahSimpan
			($posmen[$jadual], $jadual, $medanID);
		}# tamat ulang table

		# pergi papar kandungan
		//echo 'location: ' . URL . 'kawalan/ubah/' . $dataID;
		header('location: ' . URL . 'kawalan/ubah/' . $dataID); //*/
	}
#-------------------------------------------------------------------------------------------
	function ubahsuaiPost($medanID, $dataID, $senaraiJadual, $pass)
	{
		$posmen = array();
		foreach ($_POST as $myTable => $value): 
		if ( in_array($myTable,$senaraiJadual) ):
			foreach ($value as $kekunci => $papar)
			{
				$posmen[$myTable][$kekunci] = bersih($papar);
				$posmen[$myTable][$medanID] = $dataID;
			}//*/
		endif; endforeach;

		//echo '<pre>$senaraiJadual='; print_r($senaraiJadual); echo '</pre>';
		//echo '<pre>$medanID='; print_r($medanID); echo '</pre>';
		//echo '<pre>$dataID='; print_r($dataID); echo '</pre>';
		//echo '<pre>$posmen='; print_r($posmen); echo '</pre>';

		$posmen = $this->pecah5P($senaraiJadual[0], $posmen);
		//$posmen = $this->kira5P($senaraiJadual[0], $posmen);
		$posmen = $this->tukarHuruf($senaraiJadual[0], $posmen);
		$posmen = $this->tambahAksara($senaraiJadual[0], $posmen);
		$posmen = $this->tarikh($senaraiJadual[0], $posmen);
		return $posmen = $this->tanya->semakPosmen(
			$senaraiJadual[0], $posmen, $pass);
	}
#-------------------------------------------------------------------------------------------
	function pecah5P($myTable, $posmen) 
	{
		$pecah5P = $posmen[$myTable]['pecah5P']; 

		if (!empty($pecah5P))
		{
			$pos = explode(" ", $pecah5P);
			  $posmen[$myTable]['hasil'] = str_replace( ',', '', bersih($pos[0]) );
			$posmen[$myTable]['belanja'] = str_replace( ',', '', bersih($pos[1]) );
			   $posmen[$myTable]['gaji'] = str_replace( ',', '', bersih($pos[2]) );
			   $posmen[$myTable]['aset'] = str_replace( ',', '', bersih($pos[3]) );
			   $posmen[$myTable]['staf'] = str_replace( ',', '', bersih($pos[4]) );
			   $posmen[$myTable]['stok'] = str_replace( ',', '', bersih($pos[5]) );
		}
		else
		{
			//$data5P = array('hasil','belanja','gaji','aset','staf','stok');
			$data5P = array('hasil','belanja','gaji','aset','staf','stok',
				'amt_staf','amt_output','amt_input','amt_aset','amt_gaji',
				'amt_jualan','amt_hasil','amt_belanja');
			foreach ($posmen as $jadual => $value)
			foreach ($value as $kekunci => $papar)
				$posmen[$myTable][$kekunci] =
					( in_array($kekunci,$data5P) ) ?
					str_replace( ',', '', bersih($papar) )# buang koma
					: bersih($papar);
		}

		unset($posmen[$myTable]['pecah5P']);

		/*# debug
		echo '<pre>$hasil='; print_r($hasil); echo '</pre>';
		echo '<pre>$pos='; print_r($pos); echo '</pre>';
		echo '<pre>$posmen2='; print_r($posmen); echo '</pre>';//*/

		return $posmen; # pulangkan nilai
	}
#-------------------------------------------------------------------------------------------
	function kira5P($myTable, $posmen)
	{
		$data5P = array('hasil','belanja','gaji','aset','staf','stok');
		$mengira = null;
		foreach ($data5P as $kekunci)
		if (isset($posmen[$myTable][$kekunci]))
		{
			//echo '<br>' . $kekunci .'|'. $posmen[$myTable][$kekunci];
			//@eval( '$mengira = (' . $posmen[$myTable][$kekunci] . ');' );
			$mengira = ($posmen[$myTable][$kekunci]);
			$posmen[$myTable][$kekunci] = $mengira;
			$mengira = null;
		}

		return $posmen; # pulangkan nilai
	}
#-------------------------------------------------------------------------------------------
	function tukarHuruf($myTable, $posmen)
	{
		$huruf['kecil'] = array('fe','email');
		$huruf['BESAR'] = array('respon');
		$huruf['Depan'] = array('responden','orang_a','no','batu','jalan','tmn_kg','daerah');

		foreach ($huruf as $jenis=>$key): foreach ($key as $v=>$kekunci):
		if (isset($posmen[$myTable][$kekunci])):
			if ($jenis == 'kecil') # huruf('kecil', )
				$posmen[$myTable][$kekunci] = huruf('kecil', $posmen[$myTable][$kekunci]);
			if ($jenis == 'BESAR') # huruf('Besar', )
				$posmen[$myTable][$kekunci] = huruf('Besar', $posmen[$myTable][$kekunci]);
			if ($jenis == 'Depan') # huruf('Besar_Depan', )
				$posmen[$myTable][$kekunci] = huruf('Besar_Depan', $posmen[$myTable][$kekunci]);
		endif; endforeach; endforeach; //echo '<hr><hr>';

		return $posmen; # pulangkan nilai
	}
#-------------------------------------------------------------------------------------------
	function tambahAksara($myTable, $posmen)
	{
		$aksara['angkasa'] = array('fe');

		foreach ($aksara as $jenis=>$key): foreach ($key as $v=>$kekunci):
		if (isset($posmen[$myTable][$kekunci])):
			if ($jenis == 'angkasa') #  str_replace('_','&nbsp;', $asal);
				$posmen[$myTable][$kekunci] = str_replace(' ','-',
					$posmen[$myTable][$kekunci]);
		endif; endforeach; endforeach; //echo '<hr><hr>';

		return $posmen; # pulangkan nilai
	}
#-------------------------------------------------------------------------------------------
	function tarikh($myTable, $posmen)
	{
		$tarikh = array('lawat','terima','hantar','hantar_prosesan');

		foreach ($tarikh as $kekunci)
		if (isset($posmen[$myTable][$kekunci . 'X']))
		{
			//echo '<br>' . $kekunci . 'X|' . $posmen[$myTable][$kekunci . 'X'];
			//echo '<br>' . $kekunci . ' |' . $posmen[$myTable][$kekunci];
			$posmen[$myTable][$kekunci] = null;
			unset($posmen[$myTable][$kekunci . 'X']);
		}

		return $posmen; # pulangkan nilai
	}
#-------------------------------------------------------------------------------------------
	public function masuk($cariID)
	{# Set pembolehubah utama
		//echo '<hr>' . $this->_namaClass . '<hr>';
		$this->bentukSql($cariID);
		$this->papar->template = 'biasa';
		//$this->papar->template = 'bootstrap';
		$fail = array('index','b_ubah','b_ubah_kawalan');

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$this->semakPembolehubah($this->papar->_cariIndustri); # Semak data dulu
		$this->_folder = 'cari'; # jika mahu ubah lokasi Papar
		$this->paparKandungan($this->_folder, $fail[1] , $noInclude=0); //*/
    }
#-------------------------------------------------------------------------------------------
	public function bentukSql($cariID)
	{
		list($myTable,$medan,$medanID,$carian,$atur) = $this->tanya->jadualKawalan02();

		# semak database
		$senarai['kes'] = $this->tanya->
			cariSemuaData("`$myTable`", $medan, $carian, $atur);
			//cariSql("`$myTable`", $medan, $carian, $atur);
		# semak semua $pencam di sini
		//$this->semakPembolehubah($senarai);
		$this->papar->_cariIndustri = null;
		$this->umpukNilai(array($senarai, $myTable, $cariID,
			$medanID, $cariID));
	}
#-------------------------------------------------------------------------------------------
	function umpukNilai2($umpuk)
	{
		list($senarai, $myTable) = $umpuk;
		$this->papar->c1 = $this->papar->c2 = null;
		$this->papar->medanID = 'semua';
		$this->papar->cariID = 'semua';
		$this->papar->carian[] = 'semua';
		$this->papar->_jadual = $myTable;
		$this->papar->senarai = $senarai;
		//$this->papar->_cariIndustri = null; # rujuk fungsi cariIndustri()
		$this->papar->_method = huruf('kecil', namaClass($this));
		//$this->semakDataJadual($senarai); # semak Pembolehubah
	}
#-------------------------------------------------------------------------------------------
	public function lihat01()
	{# Set pembolehubah utama
		//echo '<hr>' . $this->_namaClass . '<hr>';
		$this->jadualKhas();
		$this->papar->template = 'biasa';
		//$this->papar->template = 'bootstrap';
		$fail = array('index','b_ubah','b_ubah_kawalan');

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$this->semakPembolehubah($this->papar->_cariIndustri); # Semak data dulu
		$this->_folder = 'cari'; # jika mahu ubah lokasi Papar
		$this->paparKandungan($this->_folder, $fail[0] , $noInclude=0); //*/
    }
#-------------------------------------------------------------------------------------------
	private function jadualKhas()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		list($myT1, $myT2, $on, $medan,
		$a, $b, $c, $d) = dpt_senarai('jadual_kawalan3');

		# bentuk tatasusunan $carian //$carian = null;
		$myTable = "$myT1 INNER JOIN $myT2 $on";
		$carian[] = array('fix'=>'z3x','atau'=>'WHERE','medan'=>$a,'apa'=>1);
		$carian[] = array('fix'=>'z3x','atau'=>'OR','medan'=>$b,'apa'=>1);
		$carian[] = array('fix'=>'z3x','atau'=>'OR','medan'=>$c,'apa'=>1);
		$carian[] = array('fix'=>'z3x','atau'=>'OR','medan'=>$d,'apa'=>1);
		$susun[0]['susun'] = '1 ASC, 4 ASC';
		# semak database
		$senarai['kes'] = $this->tanya->
			cariSemuaData($myTable, $medan, $carian, $susun);
			//cariSql($myTable, $medan, $carian, $susun);
		# semak semua $pencam di sini
		$this->umpukNilai2(array($senarai, $myTable));

		return array($senarai);
	}
#-------------------------------------------------------------------------------------------
	public function lihat02()
	{# Set pembolehubah utama
		//echo '<hr>' . $this->_namaClass . '<hr>';
		$this->jadualKhas02();
		$this->papar->template = 'biasa';
		//$this->papar->template = 'bootstrap';
		$fail = array('index','b_ubah','b_ubah_kawalan');

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$this->semakPembolehubah($this->papar->_cariIndustri); # Semak data dulu
		$this->_folder = 'cari'; # jika mahu ubah lokasi Papar
		$this->paparKandungan($this->_folder, $fail[0] , $noInclude=0); //*/
    }
#-------------------------------------------------------------------------------------------
	private function jadualKhas02()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		list($myT1, $myT2, $on, $medan) = dpt_senarai('jadual_kawalan4');

		# bentuk tatasusunan $carian //$carian = null;
		$myTable = "$myT1 INNER JOIN $myT2 $on";
		$carian = $susun = null;
		//$carian[] = array('fix'=>'z3x','atau'=>'WHERE','medan'=>$a,'apa'=>1);
		//$susun[0]['susun'] = '1 ASC, 4 ASC';
		# semak database
		$senarai['kes'] = $this->tanya->
			cariSemuaData($myTable, $medan, $carian, $susun);
			//cariSql($myTable, $medan, $carian, $susun);
		# semak semua $pencam di sini
		$this->umpukNilai2(array($senarai, $myTable));

		return array($senarai);
	}
#-------------------------------------------------------------------------------------------
	public function lihat03()
	{# Set pembolehubah utama
		//echo '<hr>' . $this->_namaClass . '<hr>';
		$this->jadualKhas03();
		$this->papar->template = 'biasa';
		//$this->papar->template = 'bootstrap';
		$fail = array('index','b_ubah','b_ubah_kawalan');

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$this->semakPembolehubah($this->papar->_cariIndustri); # Semak data dulu
		$this->_folder = 'cari'; # jika mahu ubah lokasi Papar
		$this->paparKandungan($this->_folder, $fail[0] , $noInclude=0); //*/
    }
#-------------------------------------------------------------------------------------------
	private function jadualKhas03()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		list($myT1, $on, $medan) = dpt_senarai('jadual_kawalan5');

		# bentuk tatasusunan $carian //$carian = null;
		$myTable = "$myT1 $on";
		$carian = $susun = null;
		//$carian[] = array('fix'=>'z3x','atau'=>'WHERE','medan'=>$a,'apa'=>1);
		//$susun[0]['susun'] = '1 ASC, 4 ASC';
		# semak database
		$senarai['kes'] = $this->tanya->
			//cariSemuaData($myTable, $medan, $carian, $susun);
			cariSql($myTable, $medan, $carian, $susun);
		# semak semua $pencam di sini
		$this->umpukNilai2(array($senarai, $myTable));

		return array($senarai);
	}
#-------------------------------------------------------------------------------------------
	public function lihat04()
	{# Set pembolehubah utama
		//echo '<hr>' . $this->_namaClass . '<hr>';
		$this->jadualKhas04();
		$this->papar->template = 'biasa';
		//$this->papar->template = 'bootstrap';
		$fail = array('index','b_ubah','b_ubah_kawalan');

		# Pergi papar kandungan
		$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$this->semakPembolehubah($this->papar->_cariIndustri); # Semak data dulu
		$this->_folder = 'cari'; # jika mahu ubah lokasi Papar
		//$this->paparKandungan($this->_folder, $fail[0] , $noInclude=0); //*/
    }
#-------------------------------------------------------------------------------------------
	private function jadualKhas04()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		list($myTable,$medan,$atur,$a1, $a2, $b1, $b2, $c1, $c2)
		= dpt_senarai('jadual_biodata4');

		# bentuk tatasusunan $carian //$carian = null;
		$susun[0]['susun'] = $atur;
		//$carian[] = array('fix'=>'z3x','atau'=>'WHERE','medan'=>$a,'apa'=>1);
		$carian[] = array('fix'=>'xnull','atau'=>'WHERE','medan'=>$a1,'apa'=>1);
		$carian[] = array('fix'=>'x=','atau'=>'AND','medan'=>$b1,'apa'=>$b2);
		//$carian[] = array('fix'=>'x=','atau'=>'AND','medan'=>$c1,'apa'=>$c2);
		# semak database
		$senarai['kes'] = $this->tanya->
			cariSemuaData($myTable, $medan, $carian, $susun);
			//cariSql($myTable, $medan, $carian, $susun);
		# semak semua $pencam di sini
		$senarai = $this->tanya->ubahData($myTable,$a1,$a2,$senarai);
		$this->umpukNilai2(array($senarai, $myTable));

		return array($senarai);
	}
#-------------------------------------------------------------------------------------------
	public function salin01()
	{# Set pembolehubah utama
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		list($db,$jadual,$medan) = dpt_senarai('jadual_salin01');

		echo '$sql-><pre>';
		# semak database
		foreach($jadual as $myTable):
			$senarai['kes'] = $this->tanya->
				salinJadual($db.$myTable, $medan, $myTable);
		endforeach;
		# semak semua $pencam di sini
		echo '</pre>';
		//*/
    }
#-------------------------------------------------------------------------------------------
	public function salin02()
	{# Set pembolehubah utama
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		list($jadual,$id,$dataS) = dpt_senarai('jadual_salin02');
		# cantum $data
		foreach($dataS as $did): $dataID[] = kira3($did, 12); endforeach;
		$data = '(' . implode(",",$dataID) . ')';
		# semak database
		$medan = '*,\'<input type="checkbox">\' as tik ';
		$carian[] = array('fix'=>'in','atau'=>'WHERE','medan'=>$id,'apa'=>$data);
		foreach($jadual as $myTable):
			$senarai[$myTable] = $this->tanya->
				cariSemuaData($myTable, $medan, $carian, null);
				//cariSql($myTable, $medan, $carian, null);
		endforeach;
		# semak semua $pencam di sini
		$this->umpukNilai2(array($senarai, $myTable));
		$this->papar->template = 'biasa';
		//$this->papar->template = 'bootstrap';
		$fail = array('index','b_ubah','b_ubah_kawalan');

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->_folder = 'cari'; # jika mahu ubah lokasi Papar
		$this->paparKandungan($this->_folder, $fail[0] , $noInclude=0); //*/
    }
#-------------------------------------------------------------------------------------------
#===========================================================================================
}