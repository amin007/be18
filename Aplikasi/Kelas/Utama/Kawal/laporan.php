<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__; 
class Laporan extends \Aplikasi\Kitab\Kawal
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
	public function setPembolehubahUtama($bilSemua,$item,$baris,$namaPegawai,$cariBatch,$kp = 'BE')
	{
		$this->papar->kiraSemuaBaris = $bilSemua;
		$this->papar->item = $item;
		$this->papar->baris = $baris;
		$this->papar->fe = $namaPegawai . '-' . $cariBatch;
		$this->papar->kp = $kp;
	}
#-------------------------------------------------------------------------------------------
	public function fe($jadual, $cariID, $cariApa, $item = 1000, $ms = 1)
	{
		# kod asas panggil sql
			$cari[] = array('fix'=>'like%','atau'=>'WHERE','medan'=>$cariID,'apa'=>$cariApa);
			$jum2 = pencamSqlLimit(300, $item, $ms); #
			$susun[] = array_merge($jum2, array('kumpul'=>null,'susun'=>null) );
			# tanya Sql
			$this->papar->hasil = $this->tanya->tatasusunanRespon
				//kumpulRespon
				($item, $ms, $jadual, $cari, $susun = null);

		# Set pemboleubah utama
		$this->papar->Tajuk_Muka_Surat = 'Enjin Laporan FE';
		$this->setPembolehubahUtama($bilSemua,$item,$baris,
			$cariID,$cariApa,$kp = 'BUTAM');

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, 'f3all', $noInclude=0);
		//$this->papar->baca($this->_folder . '/f3all', null, 1);
	}
#-------------------------------------------------------------------------------------------
# cetak f3 - senarai nama syarikat ikut fe/batchAwal
	public function cetakf3($namaPegawai, $cariBatch, $item = 30, $ms = 1, $baris = 30)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		$medan = $this->tanya->kumpulRespon($item, $ms); # kumpul respon jadi medan sql
		# set pembolehubah utama untuk sql
		$jadual = 'kawalan_aes';
		$carian[] = array('fix'=>'like','atau'=>'WHERE','medan'=>'pegawai','apa'=>$namaPegawai);
		$carian[] = array('fix'=>'like','atau'=>'AND','medan'=>'borang','apa'=>$cariBatch);
		# tentukan bilangan mukasurat & jumlah rekod
			$bilSemua = $this->tanya->kiraBaris//tatasusunanCari//cariSql
			($jadual, $medan2 = '*', $carian, NULL);
			# semak bilangan mukasurat & jumlah rekod
			//echo '$bilSemua:' . $bilSemua . ', $item:' . $item . ', $ms:' . $ms . '<br>';
			$jum = pencamSqlLimit($bilSemua, $item, $ms);
		$susun[] = array_merge($jum, array('kumpul'=>null,'susun'=>'kp,nama ASC') );
		# tanya dalam sql 	
		$this->papar->senarai = $this->tanya->cariSemuaData//cariSql
			($jadual, $medan, $carian, $susun);

		# Set pemboleubah utama
		$this->setPembolehubahUtama($bilSemua,$item,$baris,
			$namaPegawai,$cariBatch);

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$this->_folder = 'cari';
		$this->paparKandungan($this->_folder, 'f3all', $noInclude=1);
		//$this->papar->baca($this->_folder . '/f3all', null, 1);
	}
#-------------------------------------------------------------------------------------------
	public function cetakresponden($namaPegawai, $cariBatch, $item = 30, $ms = 1, $baris = 30)
	{
		list($medan,$jadual,$carian) = $this->tanya->
			kumpulResponden($namaPegawai,$cariBatch,$item,$ms);# kumpul respon jadi medan sql
		# tentukan bilangan mukasurat & jumlah rekod
			$bilSemua = $this->tanya->kiraBaris//tatasusunanCari//cariSql
			($jadual, $medan2 = '*', $carian, NULL);
			# semak bilangan mukasurat & jumlah rekod
			//echo '$bilSemua:' . $bilSemua . ', $item:' . $item . ', $ms:' . $ms . '<br>';
			$jum = pencamSqlLimit($bilSemua, $item, $ms);
		$susun[] = array_merge($jum, array('kumpul'=>null,'susun'=>'kp,nama ASC') );
		# tanya dalam sql 	
		$this->papar->hasil = $this->tanya->cariSemuaData//cariSql
			($jadual, $medan, $carian, $susun);
		//echo '<pre>$hasil:'; print_r($this->papar->hasil) . '</pre>'; # semak data

		# Set pemboleubah utama
		$this->setPembolehubahUtama($bilSemua,$item,$baris,
			$namaPegawai,$cariBatch);

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, 'f3responden', $noInclude=1);
		//$this->papar->baca($this->_folder . '/f3all', null, 1);
	}
#-------------------------------------------------------------------------------------------
	public function calamat($namaPegawai, $cariBatch, $item = 30, $ms = 1, $baris = 30)
	{
		$medan = $this->tanya->kumpulAlamat($item, $ms);# kumpul respon jadi medan sql
		# set pembolehubah utama untuk sql
		$jadual = 'kawalan_aes';
		$carian[] = array('fix'=>'like%','atau'=>'WHERE','medan'=>'pegawai','apa'=>$namaPegawai);
		$carian[] = array('fix'=>'like%','atau'=>'AND','medan'=>'kp','apa'=>$cariBatch);
		# tentukan bilangan mukasurat & jumlah rekod
			$bilSemua = $this->tanya->kiraBaris//tatasusunanCari//cariSql
			($jadual, $medan2 = '*', $carian, NULL);
			# semak bilangan mukasurat & jumlah rekod
			//echo '$bilSemua:' . $bilSemua . ', $item:' . $item . ', $ms:' . $ms . '<br>';
			$jum = pencamSqlLimit($bilSemua, $item, $ms);
		$susun[] = array_merge($jum, array('kumpul'=>null,
			'susun'=>'respon DESC, nota DESC, nama ASC') );
		# tanya dalam sql 	
		$this->papar->hasil = $this->tanya->cariSemuaData//cariSql
			($jadual, $medan, $carian, $susun);
		//echo '<pre>$hasil:'; print_r($this->papar->hasil) . '</pre>'; # semak data

		# Set pemboleubah utama
		$this->setPembolehubahUtama($bilSemua,$item,$baris,
			$namaPegawai,$cariBatch);

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, 'f3responden', $noInclude=0);
		//$this->papar->baca($this->_folder . '/f3all', null, 1);
		//$this->papar->baca($this->_folder . '/f3responden', null, 1);
	}
#-------------------------------------------------------------------------------------------
	public function cdatalama($namaPegawai, $cariBatch, $item = 30, $ms = 1, $baris = 30)
	{
		$medan = $this->tanya->kumpulDatalama($item, $ms);# kumpul respon jadi medan sql
		# set pembolehubah utama untuk sql
		$jadual = 'kawalan_aes';
		$carian[] = array('fix'=>'like%','atau'=>'WHERE','medan'=>'pegawai','apa'=>$namaPegawai);
		$carian[] = array('fix'=>'like%','atau'=>'AND','medan'=>'borang','apa'=>$cariBatch);
		# tentukan bilangan mukasurat & jumlah rekod
			$bilSemua = $this->tanya->kiraBaris//tatasusunanCari//cariSql
			($jadual, $medan2 = '*', $carian, NULL);
			# semak bilangan mukasurat & jumlah rekod
			//echo '$bilSemua:' . $bilSemua . ', $item:' . $item . ', $ms:' . $ms . '<br>';
			$jum = pencamSqlLimit($bilSemua, $item, $ms);
		$susun[] = array_merge($jum, array('kumpul'=>null,
			'susun'=>'kp,nama ASC') );
		# tanya dalam sql
		$this->papar->hasil = $this->tanya->cariSemuaData//cariSql
			($jadual, $medan, $carian, $susun);
		//echo '<pre>$hasil:'; print_r($this->papar->hasil) . '</pre>'; # semak data

		# Set pemboleubah utama
		$this->setPembolehubahUtama($bilSemua,$item,$baris,
			$namaPegawai,$cariBatch);

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, 'f3responden', $noInclude=1);
		//$this->papar->baca($this->_folder . '/f3all', null, 1);
	}
#-------------------------------------------------------------------------------------------
	public function cdaerah($namaPegawai, $cariBatch, $item = 30, $ms = 1, $baris = 30)
	{
		# set pembolehubah utama untuk sql
		list($medan, $jadual, $carian, $susunkan) = $this->tanya->
			kumpulDaerah($namaPegawai, $cariBatch, $item, $ms);
		# tentukan bilangan mukasurat & jumlah rekod
			$bilSemua = $this->tanya->kiraBaris//tatasusunanCari//cariSql
			($jadual, $medan2 = '*', $carian, NULL);
			# semak bilangan mukasurat & jumlah rekod
			//echo '$bilSemua:' . $bilSemua . ', $item:' . $item . ', $ms:' . $ms . '<br>';
			$jum = pencamSqlLimit($bilSemua, $item, $ms);
		$kumpulkan[] = array_merge($jum, $susunkan);
		# tanya dalam sql 	
		$this->papar->hasil[] = $this->tanya->cariSemuaData//cariSql
			($jadual, $medan, $carian, $kumpulkan);
		//echo '<pre>$hasil:'; print_r($this->papar->hasil) . '</pre>'; # semak data

		# Set pemboleubah utama
		$this->setPembolehubahUtama($bilSemua,$item,$baris,
			$namaPegawai,$cariBatch);

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, 'fetnt', $noInclude=0);
		//$this->papar->baca($this->_folder . '/fetnt', null, 1);
	}
#-------------------------------------------------------------------------------------------
	public function paparA1($namaPegawai, $cariBatch, $item = 30, $ms = 1, $baris = 30)
	{
		$medan = $this->tanya->paparA1($item, $ms);# kumpul respon jadi medan sql
		# set pembolehubah utama untuk sql
		$jadual = 'kawalan_aes';
		$carian[] = array('fix'=>'like','atau'=>'WHERE','medan'=>'fe','apa'=>$namaPegawai);
		$carian[] = array('fix'=>'like','atau'=>'AND','medan'=>'hantar','apa'=>$cariBatch);
		$carian[] = array('fix'=>'like','atau'=>'AND','medan'=>'respon','apa'=>'A1');
		# tentukan bilangan mukasurat & jumlah rekod
			$bilSemua = $this->tanya->kiraBaris//tatasusunanCari//cariSql
			($jadual, $medan2 = '*', $carian, NULL);
			# semak bilangan mukasurat & jumlah rekod
			//echo '$bilSemua:' . $bilSemua . ', $item:' . $item . ', $ms:' . $ms . '<br>';
			$jum = pencamSqlLimit($bilSemua, $item, $ms);
		$susun[] = array_merge($jum, array('kumpul'=>null,'susun'=>'respon,kp,nama ASC') );
		# tanya dalam sql 	
		$this->papar->hasil = $this->tanya->cariSemuaData//cariSql
			($jadual, $medan, $carian, $susun);
		//echo '<pre>$hasil:'; print_r($this->papar->hasil) . '</pre>'; # semak data

		# Set pemboleubah utama
		$this->setPembolehubahUtama($bilSemua,$item,$baris,
			$namaPegawai,$cariBatch);

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, 'f3responden', $noInclude=0);
		//$this->papar->baca($this->_folder . '/f3responden', null, 1);
	}
#-------------------------------------------------------------------------------------------
	public function cetakA1($namaPegawai, $cariBatch, $item = 30, $ms = 1, $baris = 30)
	{
		$medan = $this->tanya->kumpulA1($item, $ms);# kumpul respon jadi medan sql
		# set pembolehubah utama untuk sql
		$jadual = 'kawalan_aes';
		$carian[] = array('fix'=>'like','atau'=>'WHERE','medan'=>'fe','apa'=>$namaPegawai);
		$carian[] = array('fix'=>'like','atau'=>'AND','medan'=>'hantar','apa'=>$cariBatch);
		$carian[] = array('fix'=>'like','atau'=>'AND','medan'=>'respon','apa'=>'A1');
		# tentukan bilangan mukasurat & jumlah rekod
			$bilSemua = $this->tanya->kiraBaris//tatasusunanCari//cariSql
			($jadual, $medan2 = '*', $carian, NULL);
			# semak bilangan mukasurat & jumlah rekod
			//echo '$bilSemua:' . $bilSemua . ', $item:' . $item . ', $ms:' . $ms . '<br>';
			$jum = pencamSqlLimit($bilSemua, $item, $ms);
		$susun[] = array_merge($jum, array('kumpul'=>null,'susun'=>'respon,kp,nama ASC') );
		# tanya dalam sql 	
		$this->papar->hasil = $this->tanya->cariSemuaData//cariSql
			($jadual, $medan, $carian, $susun);
		//echo '<pre>$hasil:'; print_r($this->papar->hasil) . '</pre>'; # semak data

		# Set pemboleubah utama
		$this->setPembolehubahUtama($bilSemua,$item,$baris,
			$namaPegawai,$cariBatch);

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, 'f10', $noInclude=0);
		//$this->papar->baca($this->_folder . '/f3all', null, 1);
		//$this->papar->baca($this->_folder . '/f10', null, 1);//*/
	}
#-------------------------------------------------------------------------------------------
	public function cetakNonA1($namaPegawai, $cariBatch, $item = 30, $ms = 1, $baris = 30)
	{
		$medan = $this->tanya->kumpulNonA1($item, $ms);# kumpul respon jadi medan sql
		# set pembolehubah utama untuk sql
		$jadual = 'kawalan_aes';
		$carian[] = array('fix'=>'like','atau'=>'WHERE','medan'=>'fe','apa'=>$namaPegawai);
		$carian[] = array('fix'=>'like','atau'=>'AND','medan'=>'hantar','apa'=>$cariBatch);
		$carian[] = array('fix'=>'xlike','atau'=>'AND','medan'=>'respon','apa'=>'A1');
		# tentukan bilangan mukasurat & jumlah rekod
			$bilSemua = $this->tanya->kiraBaris//tatasusunanCari//cariSql
			($jadual, $medan2 = '*', $carian, NULL);
			# semak bilangan mukasurat & jumlah rekod
			//echo '$bilSemua:' . $bilSemua . ', $item:' . $item . ', $ms:' . $ms . '<br>';
			$jum = pencamSqlLimit($bilSemua, $item, $ms);
		$susun[] = array_merge($jum, array('kumpul'=>null,'susun'=>'respon,kp,nama ASC') );
		# tanya dalam sql 	
		$this->papar->hasil = $this->tanya->cariSemuaData//cariSql
			($jadual, $medan, $carian, $susun);
		//echo '<pre>$hasil:'; print_r($this->papar->hasil) . '</pre>'; # semak data

		# Set pemboleubah utama
		$this->setPembolehubahUtama($bilSemua,$item,$baris,
			$namaPegawai,$cariBatch);

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, 'f10', $noInclude=0);
		//$this->papar->baca($this->_folder . '/f3all', null, 1);
		//$this->papar->baca($this->_folder . '/f10', null, 1);//*/
	}
#-------------------------------------------------------------------------------------------
	# cetakTerimaProses
	public function cetakTerimaProses($namaPegawai, $cariBatch, $item = 30, $ms = 1, $baris = 30)
	{
		# kiraKes dulu
		$ms = 1;
		$tarikh = null;
		$jadual = 'be16_proses';
		$carian[] = array('fix'=>'like','atau'=>'WHERE','medan'=>'feprosesan','apa'=>$namaPegawai);
		$carian[] = array('fix'=>'like','atau'=>'AND','medan'=>'nobatch','apa'=>$cariBatch);
		$bilSemua = $this->tanya->kiraBaris($jadual, $medan = '*', $carian, $susun = null);
		# tentukan bilangan mukasurat. bilangan jumlah rekod
		//echo '$bilSemua:' . $bilSemua . ', $item:' . $item . ', $ms:' . $ms . '<br>';
		$jum = pencamSqlLimit($bilSemua, $item, $ms);
		$susun[] = array_merge($jum, array('kumpul'=>'1,2 WITH ROLLUP','susun'=> NULL) );
		//$medan='concat_ws("/",`kp terkini`,tarikh) as terimaProsesan,';
		# kumpul respon
		//$mencari = "respon='11' AND tarikh <= '$tarikh' "; 
		$mencari = "respon='11' "; 
		//$medan = $this->tanya->laporanProsesan($jadual, $medan = "kelaskes,`kp terkini`,\r", $mencari, $susun);
		$medan = $this->tanya->laporanProsesan($jadual, $medan = "po,kp,", $mencari, $susun);
		$this->papar->hasil = $this->tanya->cariSemuaData//cariSql
			($jadual, $medan, $carian, $susun);
		//echo '<pre>$hasil:'; print_r($this->papar->hasil) . '</pre>'; # semak data

		# Set pemboleubah utama
		$this->setPembolehubahUtama($bilSemua,$item,$baris,
			$namaPegawai,$cariBatch);
		$this->papar->tarikh = ($tarikh==null) ? date("Y-m-d h:i:s") : $tarikh;

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, 'terimaProsesan', $noInclude=0);
		//$this->papar->baca($this->_folder . '/f3all', null, 1);
		//$this->papar->baca($this->_folder . '/terimaProsesan', null, 1);//*/
	}
#-------------------------------------------------------------------------------------------
	public function laporanSemasa()
	{
		# kiraKes dulu
		$this->papar->jadual = $jadual = 'kawalan_aes';
		$carian[] = array('fix'=>'like','atau'=>'WHERE','medan'=>'po','apa'=>'pom');
		$jum = pencamSqlLimit($bilSemua = 300, $item = 300, $ms = 1);
		$susun[] = array_merge($jum, array('kumpul'=>'1 WITH ROLLUP','susun'=> NULL) );
		# kumpul respon
		$medan = $this->tanya->laporanSemasa();
		$this->papar->senarai['laporanSemasa'] = $this->tanya->cariSemuaData//cariSql
			($jadual, $medan, $carian, $susun);
		//echo '<pre>$senarai:'; print_r($this->papar->senarai) . '</pre>'; # semak data

		# Set pemboleubah utama
		$this->papar->tajukjadual = 'Laporan AES Semasa';
		$this->papar->c1 = $this->papar->c2 = null;
		//$this->papar->tarikh = ($tarikh==null) ? date("Y-m-d h:i:s") : $tarikh;

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, 'jadual', $noInclude=0);
	}
#-------------------------------------------------------------------------------------------
#==========================================================================================
}