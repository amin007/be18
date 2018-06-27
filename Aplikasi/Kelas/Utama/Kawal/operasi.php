<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__; 
class Operasi extends \Aplikasi\Kitab\Kawal
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
	function semakData($namaPegawai,$noBatch,$cariID,$semakID)
	{
		# Semak data awal
		echo '<pre>';
		echo '<br>$namaPegawai: ' . $namaPegawai;
		echo '<br>$$noBatch:' . $noBatch;
		echo '<br>$cariID:' . $cariID;
		echo '<br>$semakID:' . $semakID;
		echo '</pre>';//*/
	}
#-------------------------------------------------------------------------------------------
	public function batch($namaPegawai = null, $noBatch = null, $cariID = null, $semakID = null) 
	{
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		# Mencari dalam database
		//$this->semakData($namaPegawai,$noBatch,$cariID,$semakID);
		$this->cariDatabase($namaPegawai,$noBatch,$cariID,$semakID);
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
		$this->papar->c1 = $namaPegawai;
		$this->papar->c2 = $noBatch;
		$this->papar->cariID = 'semua';
		$this->papar->carian[] = 'semua';
		# Semak data dulu
		/*echo '<pre>';
		echo '<br>$this->error'; $this->semakPembolehubah($this->papar->error);
		//echo '<br>$this->senarai'; $this->semakPembolehubah($this->papar->senarai);
		//echo '<br>$this->namaPegawai'; $this->semakPembolehubah($this->papar->namaPegawai);
		//echo '<br>$this->noBatch'; $this->semakPembolehubah($this->papar->noBatch);
		echo '</pre>';//*/
	}
#-------------------------------------------------------------------------------------------
	private function wujudBatchAwal($jadual, $noBatch = null, $cariID = null)
	{
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		if (!isset($noBatch) || empty($noBatch) ):
			$paparError = 'Tiada batch<br>';
		else:
			if((!isset($cariID) || empty($cariID) ))
				$paparError = 'Tiada id<br>';
			else
			{
				$medan = 'newss,nossm,nama,operator,'
					. 'concat_ws(" ",alamat1,alamat2,poskod,bandar) as alamat,'
					//. 'concat_ws(" ",posdaftar,posdaftar_terima) as posdaftar,'
					. 'concat_ws("|",pegawai,borang) as siapapunya';
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
	function cariDatabase($namaPegawai,$noBatch,$cariID,$semakID)
	{
		$jadual = array('kawalan_aes'); # set senarai jadual yang terlibat
		if ($semakID != null):
			$this->papar->error  = 'Data sudah ada, pandai-pandai ambil ya <br>';
			$this->papar->error .= $this->wujudBatchAwal($jadual, $noBatch, $cariID);
			# mula carian dalam jadual $myTable
			$this->cariAwal($jadual, $namaPegawai, $noBatch, $cariID);
		elseif ($cariID == null):
			$this->papar->error = 'Kosong';
			# mula carian dalam jadual $myTable
			$this->cariAwal($jadual, $namaPegawai, $noBatch, $cariID);
		else:
			# cari $noBatch atau cariID wujud tak
			$this->papar->error = $this->wujudBatchAwal($jadual, $noBatch, $cariID);
			# mula carian dalam jadual $myTable
			$this->cariAwal($jadual, $namaPegawai, $noBatch, $cariID);
		endif;
	}
#-------------------------------------------------------------------------------------------
	private function cariAwal($jadual, $namaPegawai, $noBatch, $cariID)
	{
		## set pembolehubah utama
		$bilSemua = $item = 300; $ms = 1; 
		$jum = pencamSqlLimit($bilSemua, $item, $ms);
		$kumpul = array('kumpul'=>null,'susun'=>'kp DESC,respon DESC,nama');
		# sql 1
		$medan = $this->tanya->medanData();
		$carian[] = array('fix'=>'x=','atau'=>'WHERE','medan'=>'pegawai','apa'=>$namaPegawai);
		$carian[] = array('fix'=>'x=','atau'=>'AND','medan'=>'borang','apa'=>$noBatch);
		$susun[] = array_merge($jum, $kumpul); //echo '<pre>';
		foreach ($jadual as $key => $myTable)
		{# mula ulang table
			$this->papar->senarai['aes'] = $this->tanya->
				//cariKhas01($myTable, $medan, $carian, $susun);
				//cariSql($myTable, $medan, $carian, $susun);
				cariSemuaData($myTable, $medan, $carian, $susun);
		}# tamat ulang table
		$this->cariGroup($jadual[0], $namaPegawai, $noBatch); //echo '</pre>';
	}
#-------------------------------------------------------------------------------------------
	private function cariGroup($jadual, $namaPegawai, $noBatch)
	{
		$jum2 = pencamSqlLimit(300, $item=60, $ms=1);
		//echo '<pre>$jum2->'; print_r($jum2); echo '</pre>'; # debug $jum2
		## buat group, $medan set semua
		# sql 1 - buat group ikut fe
		$fe = 'pegawai';
		$m0 = 'concat_ws("/",pegawai,borang) batchX,' . "$fe,borang,";
		$mFE = $m0 . 'count(*) as kira';
		$susunFE[] = array_merge($jum2, array('kumpul'=>$fe . ',borang','susun'=>'borang ASC') );
		$this->papar->senarai['kiraBatchAwal'] = $this->tanya->
			//cariSql($jadual, $mFE, null, $susunFE);
			cariSemuaData($jadual, $mFE, null, $susunFE);
		# sql 2 - buat group ikut pembuatan / perkhidmatan
		$mKP = 'kp,survei,count(*) as kira';
		//$cariKP[] = array('fix'=>'x=','atau'=>'WHERE','medan'=>'pegawai','apa'=>$namaPegawai);
		$cariKP[] = array('fix'=>'x=','atau'=>'WHERE','medan'=>'PO','apa'=>'POM');
		$susunKP[] = array_merge($jum2, array('kumpul'=>'kp,survei','susun'=>'kp,survei') );
		$this->papar->senarai['kiraKP'] = $this->tanya->
			//cariSql($jadual, $mKP, $cariKP, $susunKP);
			cariSemuaData($jadual, $mKP, $cariKP, $susunKP);
		# sql 3 - buat kp 309
		$mKP = 'newss,nossm,nama,operator,kp,msic2008,borang,pegawai,po,'
			. 'concat_ws(" ",alamat1,alamat2,poskod,bandar) as alamat';
		$cariKP309[] = array('fix'=>'x=','atau'=>'WHERE','medan'=>'kp','apa'=>'309');
		$cariKP309[] = array('fix'=>'x=','atau'=>'AND','medan'=>'PO','apa'=>'POM');
		$susunKP309[] = array_merge($jum2, array('kumpul'=>NULL,'susun'=>NULL) );
		$this->papar->senarai['kp309'] = $this->tanya->
			//cariSql($jadual, $mKP, $cariKP, $susunKP);
			cariSemuaData($jadual, $mKP, $cariKP309, $susunKP309);
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
		$jadual = 'kawalan_aes';
		$medanID = 'nobatch';
		# ubahsuai $posmen
		//$posmen[$jadual]['nama_pegawai'] = $namaPegawai;
		$posmen[$jadual][$medanID] = $tukarBatch;
		$dimana[$jadual][$medanID] = $asalBatch;
		//echo '<pre>$posmen='; print_r($posmen) . '</pre>';

		# masuk dalam database
			//$this->tanya->ubahSimpanSemua
			$this->tanya->ubahSqlSimpanSemua
				($posmen[$jadual], $jadual, $medanID, $dimana[$jadual]);

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
		$jadual = 'kawalan_aes';
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
		# tanya Sql //$semakID[0]['pegawai'] $semakID[0]['borang']
		$semakID = $this->tanya->cariSemuaData//cariSql
			($jadual, $medan, $cari, $susun = null);
		//echo '<pre>$semakID->', print_r($semakID); echo '</pre>';
		//echo '<pre>$posmen->'; print_r($posmen); echo '</pre>';

		# masuk dalam database
		$p1 = "$namaPegawai/$asalBatch/$dataID";
		$p2 = '/' . $semakID[0]['pegawai'] . '-' . $semakID[0]['borang'];
		if(is_null($semakID[0]['pegawai'])):
			if(is_null($semakID[0]['borang'])):
				$this->tanya->ubahSimpan
				//$this->tanya->ubahSqlSimpan
					($posmen[$jadual], $jadual, $medanID);
				$kodID = $p1;
			else: //echo 'sudah ada isi';
				$kodID = $p1 . $p2;
			endif;
		else: //echo 'sudah ada isi';
			$kodID = $p1 . $p2;
		endif;//*/

		# Pergi papar kandungan
		//echo '<br>location:' . URL . $this->_folder . "/batch/$kodID" . '';
		header('location:' . URL . $this->_folder . "/batch/$kodID");
	}
#-------------------------------------------------------------------------------------------
	public function buangID($namaPegawai,$cariBatch,$dataID)
	{
		# semak session //echo '<pre>$_GET->'; print_r($_GET); echo '</pre>';
		$sesi = \Aplikasi\Kitab\Sesi::init();
		//echo '<pre>$_SESSION->'; print_r($_SESSION); echo '</pre>';

		# ubahsuai $posmen
		$jadual = 'kawalan_aes';
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
		$pengguna = \Aplikasi\Kitab\Sesi::get('namaPendek');
		$log[$medanID] = $dataID;
		$log['pengguna'] = $pengguna;
		$log['sql'] = $this->tanya->ubahArahanSqlSimpan($posmen[$jadual], $jadual, $medanID);
		$log['arahan'] = 'buang medan pegawai(' . $namaPegawai
			. ') dan borang(' . $cariBatch . ') oleh ' . $pengguna;
		$log['tarikhmasa'] = date("Y-m-d H:i:s");
		$this->tanya->tambahData
		//$this->tanya->tambahSql
			($jadual2, $log);

		# Pergi papar kandungan
		$link = "$namaPegawai/$cariBatch/?id=$dataID&mesej=data sudah dikosongkan";
		//echo '<br>location: ' . URL . $this->_folder . '/batch/' . $link;
		header('location: ' . URL . $this->_folder . '/batch/' . $link);
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