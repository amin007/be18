<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__; 
class Biodata extends \Aplikasi\Kitab\Kawal
{
#===========================================================================================
	function __construct()
	{
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		//\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_folder = huruf('kecil', namaClass($this));
		$this->_namaClass = '<hr>Nama class :' . __METHOD__ . '<hr>';
		$this->_namaFunction = '<hr>Nama function :' .__FUNCTION__ . '<hr>';
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
	public function contoh($action = 'hasil')
	{
		# Set pemboleubah utama
		//echo '<hr>' . $this->_namaClass . '<hr>';

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$this->_folder = ''; # jika mahu ubah lokasi Papar
		$this->paparKandungan($this->_folder, $pilihFail, $noInclude=1);
	}
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
	public function register() 
	{
		# Set pembolehubah utama

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$this->_folder = ''; # jika mahu ubah lokasi Papar
		//$this->paparKandungan($this->_folder, 'b_register' , $noInclude=0); 
		//*/
    }
#-------------------------------------------------------------------------------------------
	public function ubah() 
	{# Set pembolehubah utama
		//echo '<hr>' . $this->_namaClass . '<hr>';
		$this->jadualBiodata();
		$this->papar->template = 'biasa';
		//$this->papar->template = 'bootstrap';
		$fail = array('index','b_ubah','b_ubah_kawalan');

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
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
		echo '</pre>';
	}
#-------------------------------------------------------------------------------------------
	function umpukNilai($umpuk)
	{
		list($senarai, $pengguna, $medan01, $pengguna, $myTable) = $umpuk;
		$this->papar->medanID = $medan01;
		$this->papar->cariID = null;
		$this->papar->carian[] = $pengguna;
		$this->papar->_jadual = $myTable;
		$this->papar->senarai = $senarai;
		$this->papar->_cariIndustri = null;
		//$this->semakDataJadual($senarai); # semak Pembolehubah
	}
#-------------------------------------------------------------------------------------------
	private function jadualBiodata()
	{
		list($myTable, $medan01, $medan02, $medan) = dpt_senarai('jadual_biodata');
		list($pengguna, $level) = $this->pembolehubahSesi(); //echo "<pre>";

		# bentuk tatasusunan $carian //$carian = null; 
			$carian[] = array('fix'=>'like', # cari x= atau %like%
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => $medan01, # cari dalam medan apa
				'apa' => $pengguna); # benda yang dicari
			$carian[] = array('fix'=>'like', # cari x= atau %like%
				'atau'=>'AND', # WHERE / OR / AND
				'medan' => $medan02, # cari dalam medan apa
				'apa' => $level); # benda yang dicari
		# semak database
			$senarai[$myTable] = $this->tanya->
				cariSemuaData("`$myTable`", $medan, $carian, null);
				//cariSql("`$myTable`", $medan, $carian, null);
		# semak pembolehubah
			$this->umpukNilai(array($senarai, $pengguna, $medan01,
				$pengguna, $myTable));

		return array($senarai, $pengguna);
	}
#-------------------------------------------------------------------------------------------
	public function ubahSimpan($dataID)
	{
		list($medanID,$senaraiJadual,$pass) = dpt_senarai('jadual_biodata3');
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
		//echo 'location: ' . URL . 'biodata/ubah/' . $dataID;
		header('location: ' . URL . 'biodata/ubah/' . $dataID); //*/
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

		return $posmen = $this->tanya->semakPosmen(
			$senaraiJadual[0], $posmen, $pass);
	}
#-------------------------------------------------------------------------------------------
#===========================================================================================
}