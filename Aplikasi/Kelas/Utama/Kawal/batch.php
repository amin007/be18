<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__; 
class Batch extends \Aplikasi\Kitab\Kawal
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
	public function contoh()
	{
		# Set pemboleubah utama
		echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$fail = array('index','b_ubah','b_ubah_kawalan');

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$this->paparKandungan($this->_folder, $fail[0], $noInclude=1);
	}
#-------------------------------------------------------------------------------------------
	private function wujudBatchAwal($jadual, $cariBatch = null, $cariID = null) 
	{
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		if (!isset($cariBatch) || empty($cariBatch) ):
			$paparError = 'Tiada batch<br>';
		else:
			if((!isset($cariID) || empty($cariID) ))
				$paparError = 'Tiada id<br>';
			else
			{
				$medan = 'newss,nossm,nama,operator,'
					. 'concat_ws(" ",alamat1,alamat2,poskod,bandar) as alamat';
				$susun = null;
				$carian[] = array('fix'=>'x=','atau'=>'WHERE','medan'=>'newss','apa'=>$cariID);
				$dataKes = $this->tanya->
					//cariSql($jadual[0], $medan, $carian, $susun);
					cariSemuaData($jadual[0], $medan, $carian, $susun);
				$paparError = 'Ada id:' . $dataKes[0]['newss'] 
					. '| ssm:' . $dataKes[0]['nossm']
					. '<br> nama:' . $dataKes[0]['nama'] 
					. '| operator:' . $dataKes[0]['operator']
					. '<br> alamat:' . $dataKes[0]['alamat']; //*/
			}
		endif;

		//echo '<pre>$dataKes=>'; print_r($dataKes); echo '</pre>';//*/
		//echo '<pre>$paparError=>'; print_r($paparError); echo '</pre>';//*/
		return $paparError;
	}
#-------------------------------------------------------------------------------------------
	public function awal($cariBatch = null, $cariID = null) 
	{//echo "\$cariBatch = $cariBatch . \$cariID = $cariID <br>";
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$jadual = array('kawalan_aes'); # set senarai jadual yang terlibat
		# cari $cariBatch atau cariID wujud tak
		$this->papar->error = $this->wujudBatchAwal($jadual, $cariBatch, $cariID);
		# mula carian dalam jadual $myTable
		$this->cariAwal($jadual, $cariBatch, $cariID);
		//$this->cariGroup($jadual, $cariBatch, $cariID, $this->tanya->medanData);

		# semak pembolehubah
		$this->semakPembolehubah($this->papar->error); # Semak data dulu
		$this->semakPembolehubah($this->papar->senarai); # Semak data dulu

		# Set pemboleubah utama
		$this->papar->cariBatch = $cariBatch;
		$this->papar->cariID = $cariID;
		$this->papar->carian = 'semua';
		$fail = array('index','b_ubah','batchawal');

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$this->paparKandungan($this->_folder, $fail[2], $noInclude=1);
	}
#-------------------------------------------------------------------------------------------
	private function cariAwal($senaraiJadual, $cariBatch, $cariID)
	{
		$bilSemua = $item = 1000; $ms = 1; ## set pembolehubah utama
		# sql 1
			$medan = $this->tanya->medanData;
			$carian[] = array('fix'=>'x=','atau'=>'WHERE','medan'=>'fe','apa'=>$cariBatch);
			foreach ($senaraiJadual as $key => $myTable)
			{# mula ulang table
				$jum = pencamSqlLimit($bilSemua, $item, $ms);
				$susun[] = array_merge($jum, array('kumpul'=>null,'susun'=>'kp DESC,respon DESC,nama') );
				# sql guna limit //$this->papar->senarai = array();
				$this->papar->senarai['aes'] = $this->tanya->
					cariSql($myTable, $medan, $carian, $susun);
					//cariSemuaData($myTable, $medan, $carian, $susun);
			}# tamat ulang table
	}
#-------------------------------------------------------------------------------------------
	private function cariGroup($senaraiJadual, $cariBatch, $cariID, $medan)
	{
		$jum2 = pencamSqlLimit(300, $item=30, $ms=1);
		$jadual = $senaraiJadual[0];
		## buat group, $medan set semua
			# sql 5 - buat group ikut fe
			$susunFE[] = array_merge($jum2, array('kumpul'=>'fe','susun'=>'fe') );
			$this->papar->senarai['kiraBatchAwal'] = $this->tanya->
				cariGroup($jadual, $medan = 'fe as batchAwal, count(*) as kira', $carian = null, $susunFE);
			# sql 6 - buat group ikut pembuatan / perkhidmatan
			$cariKP[] = array('fix'=>'x=','atau'=>'WHERE','medan'=>'fe','apa'=>$cariBatch);
			$susunKP[] = array_merge($jum2, array('kumpul'=>'kp,sv,nama_kp','susun'=>'kp,sv,nama_kp') );
			$this->papar->senarai['kiraKP' . $cariBatch] = $this->tanya->
				cariGroup($jadual, $medan = 'kp,sv,nama_kp, count(*) as kira', $cariKP, $susunKP);
	}
#-------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------
#==========================================================================================
}