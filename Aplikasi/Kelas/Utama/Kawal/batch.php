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
		echo '<pre>';
		print_r($senarai);
		echo '</pre>';//*/
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
	public function awal($namaPegawai = null, $noBatch = null, $cariID = null, $semakID = null) 
	{//echo "\$cariBatch = $cariBatch . \$cariID = $cariID <br>";
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		# Mencari dalam database
		$this->cariDatabase($namaPegawai,$noBatch,$semakID,$cariID);
		$this->semakSemua($namaPegawai,$noBatch);

		# Pergi papar kandungan
		$this->papar->template = 'bootstrap';
		//$this->papar->template = 'biasa';
		$fail = array('index','b_ubah','b_ubah_batch','batchawal');
		$this->_folder = 'cari';
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, $fail[2], $noInclude=0);
	}
#-------------------------------------------------------------------------------------------
	public function semakSemua($namaPegawai,$noBatch)
	{
		# Set pemboleubah utama
		$this->papar->namaPegawai = $namaPegawai;
		$this->papar->noBatch = $noBatch;
		$this->papar->cariID = 'semua';
		$this->papar->carian[] = 'semua';
		# Semak data dulu
		/*echo '<pre>';
		echo '<br>$this->error'; $this->semakPembolehubah($this->papar->error);
		echo '<br>$this->senarai'; $this->semakPembolehubah($this->papar->senarai);
		echo '<br>$this->namaPegawai'; $this->semakPembolehubah($this->papar->namaPegawai);
		echo '<br>$this->noBatch'; $this->semakPembolehubah($this->papar->noBatch);
		echo '</pre>';//*/
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
					. 'concat_ws(" ",alamat1,alamat2,poskod,bandar) as alamat,'
					. 'concat_ws(" ",posdaftar,posdaftar_terima) as posdaftar,'
					. 'concat_ws(" ",pegawai,borang) as siapapunya';
				$susun = null;
				$carian[] = array('fix'=>'x=','atau'=>'WHERE','medan'=>'newss','apa'=>$cariID);
				$dataKes = $this->tanya->
					//cariKhas02($jadual[0], $medan, $carian, $susun);
					//cariSql($jadual[0], $medan, $carian, $susun);
					cariSemuaData($jadual[0], $medan, $carian, $susun);
				$paparError = (!isset($dataKes[0]['newss'])) ? 
					$this->tiadaDalamRangka('newss', $cariID) : # jika jumpa
					'Ada id: <a target="_blank" href="'. URL . 'kawalan/ubah/' 
					. $dataKes[0]['newss'] .'">' . $dataKes[0]['newss'] . '</a> '
					. ( empty($dataKes[0]['nossm']) ? '' : '| nossm:' . $dataKes[0]['nossm'] )
					. '<br> nama:' . $dataKes[0]['nama'] 
					. ( empty($dataKes[0]['operator']) ? '' : '| operator:' . $dataKes[0]['operator'] )
					. '<br> alamat:' . $dataKes[0]['alamat']
					. ( empty($dataKes[0]['posdaftar']) ? '' : '| posdaftar:' . $dataKes[0]['posdaftar'] )
					. ( empty($dataKes[0]['siapapunya']) ? '' : '|<br> siapapunya:' . $dataKes[0]['siapapunya'] )
					. '';
			}
		endif;

		//echo '<pre>$dataKes=>'; print_r($dataKes); echo '</pre>';//*/
		//echo '<pre>$paparError=>'; print_r($paparError); echo '</pre>';//*/
		return $paparError;
	}
#-------------------------------------------------------------------------------------------
	function cariDatabase($namaPegawai,$cariBatch,$semakID,$cariID)
	{
		$jadual = array('kawalan_aes'); # set senarai jadual yang terlibat
		$medan = $this->tanya->medanData();
		if ($semakID != null):
			$this->papar->error  = 'Data sudah ada, pandai-pandai ambil ya <br>';
			$this->papar->error .= $this->wujudBatchAwal($jadual, $cariBatch, $cariID);
			# mula carian dalam jadual $myTable
			$this->cariAwal($jadual, $namaPegawai, $cariBatch, $cariID, $medan);
		elseif ($cariID == null):
			$this->papar->error = 'Kosong';
			# mula carian dalam jadual $myTable
			$this->cariAwal($jadual, $namaPegawai, $cariBatch, $cariID, $medan);
		else:
			# cari $cariBatch atau cariID wujud tak
			$this->papar->error = $this->wujudBatchAwal($senaraiJadual, $cariBatch, $cariID);
			# mula carian dalam jadual $myTable
			$this->cariAwal($jadual, $namaPegawai, $cariBatch, $cariID, $medan);
		endif;
	}
#-------------------------------------------------------------------------------------------
	private function cariAwal($senaraiJadual, $cariBatch, $cariID)
	{
		## set pembolehubah utama
		$bilSemua = $item = 300; $ms = 1; 
		$jum = pencamSqlLimit($bilSemua, $item, $ms);
		$kumpul = array('kumpul'=>null,'susun'=>'kp DESC,respon DESC,nama');
		$susun[] = array_merge($jum, $kumpul);

		# sql 1
			$medan = $this->tanya->medanData();
			$carian[] = array('fix'=>'x=','atau'=>'WHERE','medan'=>'fe','apa'=>$cariBatch);
			foreach ($senaraiJadual as $key => $myTable)
			{# mula ulang table
				# sql guna limit 
				$this->papar->senarai['aes'] = $this->tanya->
					//cariKhas01($myTable, $medan, $carian, $susun);
					//cariSql($myTable, $medan, $carian, $susun);
					cariSemuaData($myTable, $medan, $carian, $susun);
			}# tamat ulang table
	}
#-------------------------------------------------------------------------------------------
	private function cariGroup($senaraiJadual, $cariBatch, $cariID, $medan)
	{
		$jum2 = pencamSqlLimit(300, $item=50, $ms=1, 50);
		//echo '<pre>$jum2->'; print_r($jum2); echo '</pre>'; # debug $jum2
		$jadual = $senaraiJadual[0];
		## buat group, $medan set semua
			# sql 5 - buat group ikut fe
			$susunFE[] = array_merge($jum2, array('kumpul'=>'fe','susun'=>'fe') );
			echo '<pre>$susunFE->'; print_r($susunFE); echo '</pre>'; # debug $jum2
			$this->papar->senarai['kiraBatchAwal'] = $this->tanya->
				cariGroup($jadual, $medan = 'fe as batchAwal, count(*) as kira', $carian = null, $susunFE);
			# sql 6 - buat group ikut pembuatan / perkhidmatan
			$cariKP[] = array('fix'=>'x=','atau'=>'WHERE','medan'=>'fe','apa'=>$cariBatch);
			$susunKP[] = array_merge($jum2, array('kumpul'=>'kp,sv,nama_kp','susun'=>'kp,sv,nama_kp') );
			$this->papar->senarai['kiraKP' . $cariBatch] = $this->tanya->
				cariGroup($jadual, $medan = 'kp,sv,nama_kp, count(*) as kira', $cariKP, $susunKP);
	}
#-------------------------------------------------------------------------------------------
	public function tambahNamaStaf()
	{
		//echo '<pre>$_GET->', print_r($_GET, 1) . '</pre>'; # debug $_GET
		# Set pemboleubah utama
		$this->papar->namaPegawai = $namaPegawai = bersihGET_nama('cari'); # bersihkan data $_GET

		# pergi papar kandungan
		//echo '<br>location: ' . URL . $this->_folder . "/batch/$namaPegawai" . '';
		header('location: ' . URL . $this->_folder . "/batch/$namaPegawai");
	}
#-------------------------------------------------------------------------------------------
	public function tambahBatchBaru($namaPegawai = null)
	{
		echo '<pre>$_GET->', print_r($_GET, 1) . '</pre>'; # debug $_GET
		# Set pemboleubah utama
		$this->papar->namaPegawai = $namaPegawai;
		$this->papar->noBatch = $noBatch = bersihGET('cari'); # bersihkan data $_GET

		# pergi papar kandungan
		//echo '<br>location: ' . URL . $this->_folder . "/batch/$namaPegawai/$noBatch" . '';
		header('location: ' . URL . $this->_folder . "/batch/$namaPegawai/$noBatch");
	}
#-------------------------------------------------------------------------------------------
	public function tukarBatchProses($namaPegawai,$asalBatch)
	{
		//echo '<pre>$_GET->', print_r($_GET, 1) . '</pre>';
		//echo "\$namaPegawai = $namaPegawai<br>";
		//echo "\$asalBatch = $asalBatch<br>";
		$tukarBatch = bersihGET('cari'); # bersihkan data $_POST

		# masuk dalam database
			# ubahsuai $posmen
			$jadual = 'be16_kawal';
			$medanID = 'nobatch';
			//$posmen[$jadual]['nama_pegawai'] = $namaPegawai;
			$posmen[$jadual][$medanID] = $tukarBatch;
			$dimana[$jadual][$medanID] = $asalBatch;
			//echo '<pre>$posmen='; print_r($posmen) . '</pre>';

			//$this->tanya->ubahSimpanSemua(
			$this->tanya->ubahSqlSimpanSemua(
				$posmen[$jadual], $jadual, $medanID, $dimana[$jadual]);

		# Set pemboleubah utama
		$this->papar->namaPegawai = $namaPegawai;
		$this->papar->noBatch = $tukarBatch; 

		# pergi papar kandungan
		echo '<br>location: ' . URL . $this->_folder . "/batch/$namaPegawai/$tukarBatch" . '';
		//header('location: ' . URL . $this->_folder . "/batch/$namaPegawai/$tukarBatch");
	}
#-------------------------------------------------------------------------------------------
	public function ubahBatchProses($namaPegawai,$asalBatch)
	{
		//echo '<pre>$_GET->', print_r($_GET, 1) . '</pre>';
		//echo "\$namaPegawai = $namaPegawai<br>\$asalBatch = $asalBatch<br>";
		$dataID = bersihGET('cari'); # bersihkan data $_POST
		if (myGetType($dataID)=='numeric'):
			$dataID = kira3($dataID, 12); # letak 0 pada kiri
		else:
			echo 'jenis data : ' . myGetType($dataID) 
				. '. Sila patah balik <hr>';
			exit();
		endif;

		# ubahsuai $posmen
		$jadual = 'be16_kawal';
		$medanID = 'newss';
		$posmen[$jadual]['pegawai'] = $namaPegawai;
		$posmen[$jadual]['borang']  = $asalBatch;
		$posmen[$jadual][$medanID]  = $dataID;
		//$dimana[$jadual][$medanID] = $asalBatch;
		//echo '<pre>$posmen='; print_r($posmen) . '</pre>';

		# kod asas panggil sql
		$medan = 'newss,nossm,nama,operator,pegawai,borang,'
			. 'concat_ws(" ",alamat1,alamat2,poskod,bandar) as alamat';
		$cari[] = array('fix'=>'x=','atau'=>'WHERE','medan'=>$medanID,'apa'=>$dataID);
		# tanya Sql //$semakID[0]['pegawai'] 	$semakID[0]['borang']
		$semakID = $this->tanya->cariSemuaData//cariSql
			($jadual, $medan, $cari, $susun = null);
		//echo '<pre>$semakID->', print_r($semakID, 1) . '</pre>';

		# masuk dalam database	
		if(is_null($semakID[0]['pegawai'])):
			if(is_null($semakID[0]['borang'])):
				$this->tanya->ubahSimpan(
				//$this->tanya->ubahSqlSimpan(
					$posmen[$jadual], $jadual, $medanID);
				$kodID = $dataID; //$semakID[0]['pegawai'] . '-' . $semakID[0]['borang']; 
			else: 
			$kodID = $dataID . '/' . $semakID[0]['pegawai'] . '-' . $semakID[0]['borang']; 
			endif;
		else: 
			$kodID = $dataID . '/' . $semakID[0]['pegawai'] . '-' . $semakID[0]['borang']; 
		endif;//*/

		# pergi papar kandungan
		//echo '<br>location: ' . URL . $this->_folder . "/batch/$namaPegawai/$asalBatch/$kodID" . '';
		header('location: ' . URL . $this->_folder . "/batch/$namaPegawai/$asalBatch/$kodID");
	}
#-------------------------------------------------------------------------------------------
	public function buangID($namaPegawai,$cariBatch,$dataID)
	{
		# semak session //echo '<pre>$_GET->', print_r($_GET, 1) . '</pre>';
		$sesi = \Aplikasi\Kitab\Sesi::init();
		//echo '<pre>$_SESSION->', print_r($_SESSION, 1) . '</pre>';

		# masuk dalam database
			# ubahsuai $posmen
			$jadual = 'be16_kawal'; 
			$medanID = 'newss';
			$posmen[$jadual]['pegawai'] = null;
			$posmen[$jadual]['borang'] = null;
			$posmen[$jadual][$medanID] = $dataID;
			//$dimana[$jadual][$medanID] = $asalBatch;
			//echo '<pre>$posmen='; print_r($posmen) . '</pre>';

			$this->tanya->ubahSimpan
			//$this->tanya->ubahSqlSimpan
				($posmen[$jadual], $jadual, $medanID);

			# log sql
			$jadual2 = 'log_sql'; 
			$pengguna = \Aplikasi\Kitab\Sesi::get('namaPegawai');
			$log[$medanID] = $dataID;
			$log['pengguna'] = $pengguna;
			$log['sql'] = $this->tanya->ubahArahanSqlSimpan($posmen[$jadual], $jadual, $medanID);
			$log['arahan'] = 'buang medan pegawai(' . $namaPegawai 
				. ') dan borang(' . $cariBatch . ') oleh ' . $pengguna;
			$log['tarikhmasa'] = date("Y-m-d H:i:s");
			$this->tanya->tambahData//tambahSql
				($jadual2, $log);

		# pergi papar kandungan
		//echo '<br>location: ' . URL . $this->_folder . "/batch/$namaPegawai/$cariBatch/?id=$dataID&mesej=data sudah dikosongkan" . '';
		header('location: ' . URL . $this->_folder . "/batch/$namaPegawai/$cariBatch/?id=$dataID&mesej=data sudah dikosongkan" . '');
	}
#-------------------------------------------------------------------------------------------
	private function tiadaDalamRangka($key = 'newss', $data = null)
	{
		# butang 
		$birutua = 'btn btn-primary btn-mini';
		$birumuda = 'btn btn-info btn-mini';
		$merah = 'btn btn-danger btn-mini';

		$k1 = URL . 'rangkabaru/masukdatadarirangka/1/' . $key . '/' . $data;
		$btn =  $merah;
		$a = '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>Tambah2';

		$pautan = 'Tiada id dalam rangka. '
			. '<a target="_blank" href="' . $k1 . '" class="' . $btn . '">' . $a . '</a>'
			. '<br>Mana kau orang jumpa kes ini daa.' 
			. '<br>Jumpa amin jika mahu masuk rangka ya'
			. '';

		return $pautan;
	}
#-------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------
#==========================================================================================
}