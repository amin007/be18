<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__;
class Borang extends \Aplikasi\Kitab\Kawal
{
#==========================================================================================
	function __construct()
	{
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_folder = huruf('kecil', namaClass($this));
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		//echo '<hr>Nama function :' . __FUNCTION__ . '<hr>';
	}
##-----------------------------------------------------------------------------------------
	public function index()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		# Set pemboleubah utama
		$this->papar->tajuk = namaClass($this);

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
		echo '<pre>'; print_r($senarai); echo '</pre>';//*/
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
	function debugKandunganPaparan()
	{
		echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		echo '<pre>';
		echo '<br>$this->papar->senarai : '; print_r($this->papar->senarai);
		echo '<br>$this->papar->myTable : '; print_r($this->papar->myTable);
		echo '<br>$this->papar->_jadual : '; print_r($this->papar->_jadual);
		echo '<br>$this->papar->carian : '; print_r($this->papar->carian);
		echo '<br>$this->papar->c1 : '; print_r($this->papar->c1);
		echo '<br>$this->papar->c2 : '; print_r($this->papar->c2);
		if(isset($this->papar->medan)):
			echo '<br>$this->papar->medan : '; print_r($this->papar->medan);
		endif;
		if(isset($this->papar->senaraiMedan)):
			echo '<br>$this->papar->senaraiMedan : '; print_r($this->papar->senaraiMedan);
		endif;
		echo '<br>$this->papar->_pilih : '; print_r($this->papar->_pilih);
		echo '<br>$this->papar->template : '; print_r($this->papar->template);
		echo '</pre>';
	}
#-------------------------------------------------------------------------------------------
	function kandunganPaparan($pilih, $myTable)
	{
		//$this->papar->senarai[$myTable] = null;
		$this->papar->myTable = $myTable;
		$this->papar->_jadual = $myTable;
		$this->papar->carian[] = 'semua';
		$this->papar->c1 = $this->papar->c2 = null;
		$this->papar->_pilih = $pilih;
		$this->papar->template = 'biasa';
		//$this->papar->template = 'bootstrap_table';
		//$this->papar->template = 'bootstrap';
		//$this->papar->template = 'khas01';
		//*/
	}
#-------------------------------------------------------------------------------------------
	function panggilDB($pilih,$myJadual,$idBorang)
	{
		# Set pembolehubah utama
		list($entah, $medan, $carian, $susun) = $this->tanya->susunPembolehubah($pilih,$idBorang);
		$this->papar->senarai[$pilih] = $this->tanya->//cariSql
			cariSemuaData
			($myJadual, $medan, $carian, $susun);
		/*if( count($this->papar->senarai[$pilih]) == 0 ):
			//echo 'jumlah $senarai kosong';
			$this->papar->senarai[$myJadual] = null;
		endif;//*/
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($pilih, $myJadual);
		//$this->debugKandunganPaparan($pilih, $myJadual);
	}
#-------------------------------------------------------------------------------------------
	function panggilDB2($pilih,$myJadual,$idBorang)
	{
		# Set pembolehubah utama
		list($entah, $medan, $carian, $susun) = $this->tanya->susunPembolehubah($pilih,$idBorang);
		//$myJadual = explode('.', $myJadual);
		$this->papar->senarai[$pilih] = $this->tanya->//cariSql
			cariSemuaData
			($myJadual, $medan, $carian, $susun);
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($pilih, $myJadual);
		//$this->debugKandunganPaparan($pilih, $myJadual);
	}
#-------------------------------------------------------------------------------------------
	function tambahMedanDB($pilih)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		list($myTable) = $this->tanya->tambahPembolehubah($pilih);
		$this->papar->medan = $this->tanya->//paparMedan
			//paparMedan02 //pilihMedan //pilihMedan02
			pilihMedan02($myTable);//*/

		# Set pembolehubah untuk Papar
		$this->papar->_jadual = $myTable;
	}
#-------------------------------------------------------------------------------------------
	public function updateID($pilih)
	{
		# ubahsuai $posmen
		list($posmen,$senaraiJadual,$myTable,$medanID) = $this->ubahsuaiPost($pilih);
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
		$lokasi = 'vendor/profile';
		//echo '<br>location: ' . URL . $lokasi;
		header('location: ' . URL . $lokasi); //*/
	}
#-------------------------------------------------------------------------------------------
	function ubahsuaiPost($pilih)
	{
		list($senaraiJadual,$medanID) = $this->tanya->pilihJadual($pilih);

		$posmen = array();
		foreach ($_POST as $myTable => $value):
			if ( in_array($myTable,$senaraiJadual) ):
				foreach ($value as $kekunci => $papar)
				{
					$posmen[$myTable][$kekunci] = bersih($papar);
					//$posmen[$myTable][$medanID] = $dataID;
				}
		endif; endforeach;//*/

		//echo '<pre>$pilih='; print_r($pilih); echo '</pre>';
		//echo '<pre>$senaraiJadual='; print_r($senaraiJadual); echo '</pre>';
		//echo '<pre>$medanID='; print_r($medanID); echo '</pre>';
		//echo '<pre>$dataID='; print_r($dataID); echo '</pre>';
		//echo '<pre>$posmen='; print_r($posmen); echo '</pre>';
		return array($posmen,$senaraiJadual,$senaraiJadual[0],$medanID); # pulangkan nilai
	}
#-------------------------------------------------------------------------------------------
	public function insertID($pilih)
	{
		# ubahsuai $posmen
		list($posmen,$senaraiJadual,$myTable) = $this->ubahsuaiPost2($pilih);
		//echo '<hr><pre>$_POST='; print_r($_POST); echo '</pre>';
		//echo '<pre>$posmen='; print_r($posmen); echo '</pre>';

		# mula ulang $senaraiJadual
		foreach ($senaraiJadual as $kunci => $jadual)
		{# mula ulang table
			//$this->tanya->tambahSql($jadual, $posmen[$jadual]);
			$this->tanya->tambahData($jadual, $posmen[$jadual]);
		}# tamat ulang table

		# pergi papar kandungan
		$lokasi = '' . $myTable;;
		//echo '<br>location: ' . URL . $lokasi;
		header('location: ' . URL . $lokasi); //*/
	}
#-------------------------------------------------------------------------------------------
#==========================================================================================
#-------------------------------------------------------------------------------------------
	public function bentuksoalan()
	{
		# Set pemboleubah utama
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$this->papar->soalan = $this->tanya->soalan();

		# Pergi papar kandungan
		$this->_folder = 'borang';
		$fail = array('index','b_ubah','z_contoh_link_pill','soalan4');
		//echo '<br>$this->_folder = ' . $this->_folder . '<hr>';
		//echo '<br>$fail = ' . $fail[3] . '<hr>';
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, $fail[2], $noInclude=1);
	}
#-------------------------------------------------------------------------------------------
	public function soalan4()
	{
		# Set pemboleubah utama
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		//$this->_folder = 'borang/kp205/';
		$this->_folder = 'borang';
		$fail = array('index','b_ubah','b_ubah_kawalan','soalan4');

		# Pergi papar kandungan
		//echo '<br>$this->_folder = ' . $this->_folder . '<hr>';
		//echo '<br>$fail = ' . $fail[3] . '<hr>';
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, $fail[3], $noInclude=1);
	}
#-------------------------------------------------------------------------------------------
	public function soalanhasil($myJadual = null,$idBorang = null)
	{
		# Set pemboleubah utama
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$this->panggilDB('',$myJadual,$idBorang);
		$this->panggilDB('infoIctHasil',$myJadual,$idBorang);
		//$this->debugKandunganPaparan();
		$this->_folder = 'borang';

		# Pergi papar kandungan
		//echo '<br>$this->_folder = ' . $this->_folder . '<hr>';
		//echo '<br>$fail = ' . $fail[3] . '<hr>';
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$fail = array('index','b_ubah','b_ubah_kawalan','soalan4');
		$this->paparKandungan($this->_folder, $fail[0], $noInclude=1);
	}
#-------------------------------------------------------------------------------------------
	public function be($idBorang = null)
	{
		# Set pemboleubah utama
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$db = 'pom_malaysiabaru.';
		$this->panggilDB('semuaBE',$db . 'be2016_v2',$idBorang);
		//$this->debugKandunganPaparan();
		$this->_folder = 'borang';

		# Pergi papar kandungan
		//echo '<br>$this->_folder = ' . $this->_folder . '<hr>';
		//echo '<br>$fail = ' . $fail[3] . '<hr>';
		$fail = array('index','b_ubah','b_ubah_kawalan','soalan4');
		$this->paparKandungan($this->_folder, $fail[0], $noInclude=1);
	}
#-------------------------------------------------------------------------------------------
	public function banci($idBorang = null)
	{
		# Set pemboleubah utama
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		//$ulangjadual = $this->tanya->dataBE();
		//$ulangjadual = $this->tanya->dataBanci2016();
		//$db = 'pom_malaysiabaru.be2016_kp';
		/*foreach($ulangjadual as $jadual):
			$this->panggilDB2('semuaBE',$db.$jadual . 'a',$idBorang);
			//$this->panggilDB2('hasilBE',$db.$jadual . 'a',$idBorang);
			//$this->panggilDB2('belanjaBE',$db.$jadual . 'a',$idBorang);
		endforeach;//*/
		$this->debugKandunganPaparan();
		$this->_folder = 'borang';

		# Pergi papar kandungan
		//echo '<br>$this->_folder = ' . $this->_folder . '<hr>';
		//echo '<br>$fail = ' . $fail[3] . '<hr>';
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$fail = array('index','b_ubah','b_ubah_kawalan','soalan4');
		//$this->paparKandungan($this->_folder, $fail[0], $noInclude=1);
	}
#-------------------------------------------------------------------------------------------
#==========================================================================================
}