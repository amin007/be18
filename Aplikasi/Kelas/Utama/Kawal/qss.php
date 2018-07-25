<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__; 
class Qss extends \Aplikasi\Kitab\Kawal
{
#==========================================================================================
	function __construct()
	{
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_folder = huruf('kecil', namaClass($this));
	}
##-----------------------------------------------------------------------------------------
	public function index()
	{
		# Set pemboleubah utama
		$this->papar->tajuk = namaClass($this);
		//echo '<hr> Nama class : ' . namaClass($this) . '<hr>';

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, 'index', $noInclude=0);
	}
##-----------------------------------------------------------------------------------------
	public function paparKandungan($folder, $fail, $noInclude)
	{	# Pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/' . $fail, $jenis, $noInclude); # $noInclude=0
			//'mobile/mobile',$jenis,0); # $noInclude=0
		//*/
	}
##-----------------------------------------------------------------------------------------
	public function semakPembolehubah($senarai)
	{
		echo '<pre>$senarai:<br>';
		print_r($senarai);
		echo '</pre>|';//*/
	}
##-----------------------------------------------------------------------------------------
	function logout()
	{
		//echo '<pre>sebelum:'; print_r($_SESSION) . '</pre>';
		\Aplikasi\Kitab\Sesi::destroy();
		header('location: ' . URL);
		//exit;
	}
#==========================================================================================
#-------------------------------------------------------------------------------------------
	function semaknama($nama)
	{
		# Semak data $_POST
		echo '<pre>$_POST->'; print_r($_POST) . '</pre>| ';
		echo '<pre>$nama->'; print_r($nama) . '</pre>| ';
		echo 'Kod:' . \Aplikasi\Kitab\RahsiaHash::rahsia('md5', $nama) . ': ';
		//echo 'Kod:' . RahsiaHash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY) . ': ';
	}
#-------------------------------------------------------------------------------------------
	public function suku1($action = 'hasil')
	{
		# Set pemboleubah utama
		$this->papar->tajuk = namaClass($this);
		//echo '<hr> Nama class : ' . namaClass($this) . '<hr>';
		$pilihFail = $this->pilihFail($action);

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, $pilihFail, $noInclude=1);
	}
#-------------------------------------------------------------------------------------------
	public function suku2($medanID = null, $suku = 2,$action = 'hasil')
	{
		# Set pemboleubah utama
		$this->papar->tajuk = namaClass($this);
		//echo '<hr> Nama class : ' . namaClass($this) . '<hr>';
		$this->papar->suku = $suku;
		$this->papar->medanID = $medanID;
		$pilihFail = $this->pilihFail($action);

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, $pilihFail, $noInclude=1);
	}
#-------------------------------------------------------------------------------------------
	function pilihFail($action = 'hasil')
	{
		if($action == 'rangka'):
			$pilihFail = 'tab01_rangka';
		elseif($action == 'hasil'):
			$pilihFail = 'qss01_hasil';
			//$pilihFail = 'tab02_hasil';
		elseif($action == 'aset'):
			$pilihFail = 'tab03_aset';
		elseif($action == 'tambahan'):
			$pilihFail = 'tab04_tambahan';
		endif;

		return $pilihFail;
	}
#-------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------
#==========================================================================================
}