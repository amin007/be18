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

	public function index()
	{
		# Set pembolehubah utama
		$this->papar->tajuk = namaClass($this);
		//echo '<hr> Nama class : ' . namaClass($this) . '<hr>';
		//echo $this->namaClass;
		//echo $this->namaFunction;

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$this->_folder = ''; # jika mahu ubah lokasi Papar
		$this->paparKandungan($this->_folder, 'index', $noInclude=0);
	}

	public function paparKandungan($folder, $fail, $noInclude)
	{	# Pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/' . $fail, $jenis, $noInclude); # $noInclude=0
			//'mobile/mobile',$jenis,0); # $noInclude=0
		//*/
	}

	public function semakPembolehubah($senarai)
	{
		echo '<pre>$senarai:<br>';
		print_r($senarai);
		echo '</pre>|';//*/
	}

	function logout()
	{
		//echo '<pre>sebelum:'; print_r($_SESSION) . '</pre>';
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
		//echo '<pre>MENU_ATAS - $_SESSION:', print_r($_SESSION, 1) . '</pre><br>';
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
	{		
		# Set pembolehubah utama
		//echo '<hr>' . $this->_namaClass . '<hr>';
		$this->jadualBiodata();

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$this->_folder = ''; # jika mahu ubah lokasi Papar
		//$this->paparKandungan($this->_folder, 'b_ubah' , $noInclude=0); 
		//*/
    }
#-------------------------------------------------------------------------------------------
	private function jadualBiodata()
	{
		list($myTable, $medan01, $medan02, $medan) = dpt_senarai('jadual_biodata');
		list($pengguna, $level) = $this->pembolehubahSesi(); echo "<pre>";

		# semak database
			$carian[] = array('fix'=>'like', # cari x= atau %like%
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => $medan01, # cari dalam medan apa
				'apa' => $pengguna); # benda yang dicari
			$carian[] = array('fix'=>'like', # cari x= atau %like%
				'atau'=>'AND', # WHERE / OR / AND
				'medan' => $medan02, # cari dalam medan apa
				'apa' => $level); # benda yang dicari
			# mula cari $cariID dalam $myJadual
				$cariNama = 
					$this->tanya->cariSemuaData("`$myTable`", $medan, $carian, null);
					//$this->tanya->cariSql("`$myTable`", $medan, $carian, null);
		# semak pembolehubah
		//echo '<pre>Test $_POST->'; print_r($_POST) . '</pre>';
		echo '<pre>$cariNama::'; print_r($cariNama) . '<pre>';
		//echo '<hr>$data->' . sizeof($cariNama) . '<hr>';		
	}
#-------------------------------------------------------------------------------------------
#===========================================================================================
}