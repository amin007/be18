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
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		# Set pembolehubah utama

		# Pergi papar kandungan
		$lokasi = 'borang/google';
		//echo '<br>location: ' . URL . $lokasi;
		header('location: ' . URL . $lokasi); //*/
		/*$fail = array('1cari','index','b_ubah');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		//$this->semakPembolehubah(); # Semak data dulu
		$this->paparKandungan($this->_folder, $fail[0], $noInclude=1);*/
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
		echo '<hr>Nama class :' . __METHOD__ . '()<hr><pre>';
		$semak = array('idBorang','senarai','myTable','_jadual','carian','c1','c2',
			'medan','bentukJadual01','bentukJadual02','bentukJadual03',
			'_pilih','_5p','template','pilihJadual','template2','pilihJadual2');
		$takWujud = array(); $kira = 0;

		foreach($semak as $apa):
			if(isset($this->papar->$apa)):
				echo '<br>$this->papar->' . $apa . ' : ';
				print_r($this->papar->$apa);
			else:
				$takWujud[$kira++] = '$this->papar->' . $apa;
			endif;
		endforeach;

		echo '<hr><font color="red">tidak wujud : '; print_r($takWujud);
		echo '</font>';
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
		$this->papar->template = 'template_biasa';
		$this->papar->pilihJadual = 'pilih_jadual_am';
		$this->papar->template2 = 'template_khas02';
		$this->papar->pilihJadual2 = 'pilih_jadual_am2';
		$this->papar->template3 = 'template_khas03';
		$this->papar->pilihJadual3 = 'pilih_jadual_am';
		//$this->papar->template2 = 'template_bootstrap';
		//$this->papar->template3 = 'template_bootstrap_table';
		//$this->papar->template1 = 'template_khas01';
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
	function panggilMedan($pilih,$myJadual,$idBorang)
	{
		# Set pembolehubah utama
		list($entah, $medan, $carian, $susun) = $this->tanya->susunPembolehubah($pilih,$idBorang);
		//$myJadual = explode('.', $myJadual);
		$this->papar->medan = $this->tanya->//cariSql
			cariSemuaData
			($myJadual, $medan, $carian, $susun);
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($pilih, $myJadual);
		//$this->debugKandunganPaparan($pilih, $myJadual);
	}
#-------------------------------------------------------------------------------------------
	function panggilDBKhas01($pilih,$myTable,$idBorang)
	{
		# Set pembolehubah utama
		$pecah = explode('.', $myTable);
		$myJadual = $pecah[1];
		list($entah, $medan, $carian, $susun) = $this->tanya->susunPembolehubah($pilih,$idBorang);
		$this->papar->bentukJadual01[$pilih] = $this->tanya->//cariSql
			cariSemuaData
			($myTable, $medan, $carian, $susun);
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($pilih, $myJadual);
		//$this->debugKandunganPaparan($pilih, $myJadual);
	}
#-------------------------------------------------------------------------------------------
	function panggilDBKhas02($pilih,$myJadual,$idBorang)
	{
		# Set pembolehubah utama
		//$myJadual = explode('.', $myJadual);
		list($entah, $medan, $carian, $susun) = $this->tanya->susunPembolehubah($pilih,$idBorang);
		$this->papar->bentukJadual02[$pilih] = $this->tanya->//cariSql
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
	function panggilTable($myJadual,$medanID,$dataID)
	{
		# Set pembolehubah utama
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		list($entah, $medan, $carian, $susun) = $this->tanya->jadualAES($medanID,$dataID);
		$this->papar->senarai[$myJadual] = $this->tanya->//cariSql
			cariSemuaData
			($myJadual, $medan, $carian, $susun);
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($myJadual, $myJadual);
		//$this->debugKandunganPaparan($pilih, $myJadual);
	}
#-------------------------------------------------------------------------------------------
	function panggilSQL($pilih)
	{
		# Set pembolehubah utama
		list($entah, $medan, $carian, $susun) = $this->tanya->susunPembolehubah($pilih,$idBorang);
		$this->papar->bentukJadual02[$pilih] = $this->tanya->//cariSql
			cariSemuaData
			($myJadual, $medan, $carian, $susun);
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($pilih, $myJadual);
		//$this->debugKandunganPaparan($pilih, $myJadual);
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

		# Pergi papar kandungan
		$lokasi = 'vendor/profile';
		//echo '<br>location: ' . URL . $lokasi;
		header('location: ' . URL . $lokasi); //*/
	}
#-------------------------------------------------------------------------------------------
	function ubahsuaiPost($pilih)
	{
		list($senaraiJadual) = $this->tanya->pilihJadual($pilih);

		$posmen = array(); //echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
		foreach ($_POST as $myTable => $value):
			if ( in_array($myTable,$senaraiJadual) ):
				foreach ($value as $kekunci => $papar)
				{
					$posmen[$myTable][$kekunci] = bersih($papar);
					//$posmen[$myTable][$medanID] = $dataID;
				}
		endif; endforeach;//*/

		$debugData = array('pilih','senaraiJadual','medanID','dataID','posmen');
		echo '<pre>'; foreach($debugData as $semak): if(isset($$semak)):
			echo '<br>$' . $semak . ' : '; print_r($$semak);
		endif; endforeach; echo '</pre>';//*/

		return array($posmen,$senaraiJadual,$senaraiJadual[0]); # pulangkan nilai
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

		# Pergi papar kandungan
		$lokasi = '' . $myTable;
		//echo '<br>location: ' . URL . $lokasi;
		header('location: ' . URL . $lokasi); //*/
	}
#-------------------------------------------------------------------------------------------
#==========================================================================================
#-------------------------------------------------------------------------------------------
	public function bentuksoalan()
	{
		# Set pembolehubah utama
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$this->papar->soalan = $this->tanya->soalan();

		# Pergi papar kandungan
		$this->_folder = 'borang';
		//echo '<br>$this->_folder = ' . $this->_folder . '<hr>';
		$fail = array('index','b_ubah','z_contoh_link_pill','soalan4');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, $fail[2], $noInclude=1);
	}
#-------------------------------------------------------------------------------------------
	public function google()
	{
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		# Set pembolehubah utama
		$this->papar->idBorang = (isset($_GET['cari'])) ? $_GET['cari'] : null;
		$random = rand(-30, 30);
		$this->papar->pautan = URL . 'borang/temui/400/1/' . $random;

		# Pergi papar kandungan
		$fail = array('1cari','index','b_ubah');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		//$this->semakPembolehubah(); # Semak data dulu
		$this->paparKandungan($this->_folder, $fail[0], $noInclude=1);
	}
#-------------------------------------------------------------------------------------------
	public function temui($a,$b,$c2) # daripada fungsi index()
	{
		# Set pembolehubah utama
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		list($senaraiJadual,$medanID,$dataID) = $this->ubahsuaiKhas();
		$this->ulangCariJadual($senaraiJadual,$medanID,$dataID,$c2);
		//$this->debugKandunganPaparan();

		# Pergi papar kandungan
		$this->_folder = 'borang';
		//echo '<br>$this->_folder = ' . $this->_folder . '<hr>';
		$fail = array('index','index1','index2','b_ubah','soalan4');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		//$this->semakPembolehubah(); # Semak data dulu
		$this->paparKandungan($this->_folder, $fail[1], $noInclude=1);//*/
	}
#-------------------------------------------------------------------------------------------
	public function cariapa($kp,$idBorang,$peratus) # daripada fungsi temui()
	{
		# Set pembolehubah utama
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		//echo '$_POST:->'; $this->semakPembolehubah($_POST); # Semak data dulu
		$db = 'pom_malaysiabaru.';
		$this->panggilMedan('medanKP',$db . 'medanKeterangan',$kp = '890');
		$this->panggilDB('limaPerangkaan',$db . 'be2016_servis_5p',$idBorang);
		//$this->panggilDB('stafBE',$db . 'be2016_staf_servis02',$idBorang);//*/
		$this->panggilDBKhas01('hasilBE',$db . 'be2016_hasil_servis',$idBorang);
		$this->panggilDBKhas01('belanjaBE',$db . 'be2016_belanja_servis',$idBorang);
		$this->godekPembolehubah01($kp,$idBorang,$peratus);
		$this->godekPembolehubah02();//$this->godekPembolehubah03();
		//$this->debugKandunganPaparan();//*/

		# Pergi papar kandungan
		$fail = array('index','index1','index2','b_ubah','soalan4');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		//$this->semakPembolehubah(); # Semak data dulu
		$this->paparKandungan($this->_folder, $fail[2], $noInclude=1);//*/
	}
#-------------------------------------------------------------------------------------------
	function godekPembolehubah01($kp, $idBorang, $peratus)
	{
		$this->papar->_5p['kp'] = $kp;
		//$this->papar->senarai['limaPerangkaan'][0]['kodbanci'];
		$this->papar->_5p['peratus'] = $peratus;
		$this->papar->_5p['idBorang'] = 'Kod007JamesBond'; //$_POST['nosiri'];
		$this->papar->_5p['nama'] = 'Biarlah Rahsia'; //$_POST['nama'];;
		# semak sama ada nilai wujud atau tidak
		$hasil = $this->papar->senarai['limaPerangkaan'][0]['hasil'];
		$belanja = $this->papar->senarai['limaPerangkaan'][0]['belanja'];
		$gaji = $this->papar->senarai['limaPerangkaan'][0]['gajiL']
			+ $this->papar->senarai['limaPerangkaan'][0]['gajiP'];
		$aset = $this->papar->senarai['limaPerangkaan'][0]['harta'];
		$susut = $this->papar->senarai['limaPerangkaan'][0]['susut'];
		# f2148 = sewa lain2, f2147 = sewa tanah
		$sewatanah = $this->papar->senarai['limaPerangkaan'][0]['sewatanah'];
		$sewalain = $this->papar->senarai['limaPerangkaan'][0]['sewalain'];
		$asetsewa = $this->papar->senarai['limaPerangkaan'][0]['sewaharta'];
		# masukkan nilai 5 perangkaan utama
		$this->papar->_5p['hasil'] = $hasil;
		$this->papar->_5p['belanja'] = $belanja;
		$this->papar->_5p['gaji'] = $gaji;
		$this->papar->_5p['susut'] = $susut;
		$this->papar->_5p['aset'] = $aset;
		$this->papar->_5p['asetsewa'] = $asetsewa;
		//*/
	}
#-------------------------------------------------------------------------------------------
	function godekPembolehubah02()
	{
		# semak sama ada nilai wujud atau tidak
		/*
		$_POST['kp']$_POST['nosiri']$_POST['nama']
		$_POST['hasil']	$_POST['hasil_kini']
		$_POST['belanja'] $_POST['belanja_kini']
		$_POST['gaji'] $_POST['gaji_kini']
		$_POST['susut'] $_POST['susut_kini']
		$_POST['aset'] $_POST['aset_kini']
		$_POST['asetsewa'] $_POST['asetsewa_kini']
		$_POST['catatan']
		*/
		$hasil = truncate_number($_POST['hasil_kini']);
		$belanja = truncate_number($_POST['belanja_kini']);
		$gaji = truncate_number($_POST['gaji_kini']);
		$susut = truncate_number($_POST['susut_kini']);
		$aset = truncate_number($_POST['aset_kini']);
		$asetsewa = truncate_number($_POST['asetsewa_kini']);
		# masukkan nilai anggaran
		$this->papar->_5p['hasil_kini'] = ($hasil);
		$this->papar->_5p['belanja_kini'] = ($belanja);
		$this->papar->_5p['gaji_kini'] = ($gaji);
		$this->papar->_5p['susut_kini'] = ($susut);
		$this->papar->_5p['aset_kini'] = ($aset);
		$this->papar->_5p['asetsewa_kini'] = ($asetsewa);
		//*/
	}
#-------------------------------------------------------------------------------------------
	function godekPembolehubah03()
	{
		$ulang = array('01'=>'L01-PEMILIK','02'=>'L02-KELUARGA','12'=>'L03-PENGURUS',
		'03'=>'L04-PRO','13'=>'L05-PENYELIDIK','04'=>'L06-JURUTEKNIK',
		'05'=>'L07-KERANI','14'=>'L08-JUALAN','15'=>'L09-KEMAHIRAN',
		'16'=>'L10-MESIN','16'=>'L11-ASAS',
		'17'=>'L12-JUM-TETAP','11'=>'L13-JUM-SAM','19'=>'L14-JUMLAH',
		'21'=>'P01-PEMILIK','22'=>'P02-KELUARGA','32'=>'P03-PENGURUS',
		'23'=>'P04-PRO','33'=>'P05-PENYELIDIK','24'=>'P06-JURUTEKNIK',
		'25'=>'P07-KERANI','34'=>'P08-JUALAN','35'=>'P09-KEMAHIRAN',
		'36'=>'P10-MESIN','26'=>'P11-ASAS',
		'37'=>'P12-JUM-TETAP','31'=>'P13-JUM-SAM','39'=>'P14-JUMLAH');
		$m = 0; $j = 'bentukJadual03';
		foreach($ulang as $key => $data):
			if($this->papar->senarai['stafBE'][0]['F14'.$key] != 0):
				//echo '<br>Data staf ' . $data . ' ada';
				$this->papar->bentukJadual03['staf'][$m]['Kod'] = $data;
				$this->papar->bentukJadual03['staf'][$m]['Msia']
					= $this->papar->senarai['stafBE'][0]['F49'.$key];
				$this->papar->bentukJadual03['staf'][$m]['Pati']
					= $this->papar->senarai['stafBE'][0]['F50'.$key];
				$this->papar->bentukJadual03['staf'][$m]['Jum']
					= $this->papar->senarai['stafBE'][0]['F14'.$key];
				$this->papar->bentukJadual03['staf'][$m]['Gaji']
					= $this->papar->senarai['stafBE'][0]['F18'.$key];
				$this->papar->bentukJadual03['staf'][$m]['Sub']
					= $this->papar->senarai['stafBE'][0]['F51'.$key];
				$m++;//*/
		endif;endforeach;
	}
#-------------------------------------------------------------------------------------------
	function ubahsuaiKhas()
	{
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$medanID = 'newss';
		$dataID = $this->cariDataIDdaa();
		$senaraiJadual = $this->tanya->pilihJadual();

		$debugData = array('senaraiJadual','medanID','dataID');
		/*echo '<pre>'; foreach($debugData as $semak): if(isset($$semak)):
			echo '<br>$' . $semak . ' : '; print_r($$semak);
		endif; endforeach; echo '</pre>';//*/

		return array($senaraiJadual,$medanID,$dataID); # pulangkan nilai
	}
#-------------------------------------------------------------------------------------------
	function cariDataIDdaa()
	{
		//echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
		if(isset($_POST['cari']))
			$dataID = bersih($_POST['cari']);
		elseif(isset($_POST['jika']['cari'][1]))
			$dataID = bersih($_POST['jika']['cari'][1]);
		else $dataID = null;

		$this->papar->dataID = $dataID;

		return $dataID;
	}
#-------------------------------------------------------------------------------------------
	function ulangCariJadual($senaraiJadual,$medanID,$dataID,$c2)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//echo '<pre>$senaraiJadual='; print_r($senaraiJadual); echo '</pre>';
		foreach($senaraiJadual as $key => $jadual):
			//echo '<br>$jadual = ' . $jadual;
			$this->panggilTable($jadual,$medanID,$dataID);
		endforeach;

		if(isset($this->papar->senarai['kawalan_aes'][0]['nama']))
			$this->papar->nama = $this->papar->senarai['kawalan_aes'][0]['nama'];
		if(isset($this->papar->senarai['kawalan_aes'][0]['kp']))
			$this->papar->c1 = $this->papar->senarai['kawalan_aes'][0]['kp'];
		else $this->papar->c1 = '000';
		$this->papar->c2 = $c2;
	}
#-------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------
	public function industri()
	{
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		# Set pembolehubah utama
		$this->papar->idBorang = (isset($_GET['cari'])) ? $_GET['cari'] : null;
		$random = rand(-30, 30);
		$this->papar->pautan = URL . 'borang/msic/400/1/' . $random;

		# Pergi papar kandungan
		$fail = array('1cari','1cariIndustri','index','b_ubah');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		//$this->semakPembolehubah(); # Semak data dulu
		$this->paparKandungan($this->_folder, $fail[1], $noInclude=1);
	}
#-------------------------------------------------------------------------------------------
	public function msic($a,$b,$c2) # daripada fungsi index()
	{
		# Set pembolehubah utama
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		list($senaraiJadual,$medanID,$dataID) = $this->ubahsuaiKhas02();
		$this->ulangCariJadual02($senaraiJadual,$medanID,$dataID,$c2);
		//$this->debugKandunganPaparan();

		# Pergi papar kandungan
		$this->_folder = 'borang';
		//echo '<br>$this->_folder = ' . $this->_folder . '<hr>';
		$fail = array('index','index1','index2','b_ubah','soalan4');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		//$this->semakPembolehubah(); # Semak data dulu
		$this->paparKandungan($this->_folder, $fail[1], $noInclude=1);//*/
	}
#-------------------------------------------------------------------------------------------
	function ubahsuaiKhas02()
	{
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$medanID = 'msic2008';
		$this->papar->dataID = $dataID = bersih($_POST['cariIndustri']);
		//$senaraiJadual = dpt_senarai('msicbaru');
		$senaraiJadual = $this->tanya->pilihJadual();
		$debugData = array('senaraiJadual','medanID','dataID');
		/*echo '<pre>'; foreach($debugData as $semak): if(isset($$semak)):
			echo '<br>$' . $semak . ' : '; print_r($$semak);
		endif; endforeach; echo '</pre>';//*/
		return array($senaraiJadual,$medanID,$dataID); # pulangkan nilai
	}
#-------------------------------------------------------------------------------------------
	function ulangCariJadual02($senaraiJadual,$medanID,$dataID,$c2)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//echo '<pre>$senaraiJadual='; print_r($senaraiJadual); echo '</pre>';
		//echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
		foreach($senaraiJadual as $key => $jadual):
			//echo '<br>$jadual = ' . $jadual;
			$this->panggilTable($jadual,$medanID,$dataID);
		endforeach;
		if(isset($_POST['semasa']['nama']))
			$this->papar->nama = bersih($_POST['semasa']['nama']);
		if(isset($_POST['semasa']['kp']))
			$this->papar->c1 = bersih($_POST['semasa']['kp']);
		else $this->papar->c1 = '000';
		$this->papar->c2 = $c2;//*/
	}
#-------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------
	public function soalan4()
	{
		# Set pembolehubah utama
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
		# Set pembolehubah utama
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
	public function be($kp = null,$idBorang = null,$peratus = 0)
	{
		# Set pembolehubah utama
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$db = 'pom_malaysiabaru.';
		$this->panggilMedan('medanKP',$db . 'medanKeterangan',$kp = '890');
		$this->panggilDB('limaPerangkaan',$db . 'be2016_servis_5p',$idBorang);
		$this->panggilDB('pertubuhan',$db . 'pertubuhan',$idBorang);
		$this->panggilDBKhas01('hasilBE',$db . 'be2016_hasil_servis',$idBorang);
		$this->panggilDBKhas01('belanjaBE',$db . 'be2016_belanja_servis',$idBorang);
		//$this->panggilDB('stafBE',$db . 'be2016_staf_servis02',$idBorang);//*/
		$this->setPembolehubah($kp,$idBorang,$peratus);
		//$this->kiraNisbah($peratus); // rand(-30, 30)
		//$this->debugKandunganPaparan();//*/

		# Pergi papar kandungan
		$fail = array('index','index2','b_ubah','b_ubah_kawalan');
		//echo '<br>$fail = ' . $fail[3] . '<hr>';
		$this->paparKandungan($this->_folder, $fail[1], $noInclude=1);//*/
	}
#-------------------------------------------------------------------------------------------
	function setPembolehubah($kp, $idBorang, $peratus)
	{
		$this->papar->_5p['kp'] = $this->papar->senarai['limaPerangkaan'][0]['kodbanci'];
		$this->papar->_5p['peratus'] = $nisbah = $this->kiraNisbah($peratus);
		$this->papar->_5p['idBorang'] = ($idBorang == null) ? 'Kod007JamesBond' : $idBorang;
		/*if(isset($this->papar->senarai['pertubuhan'][0]['NaPer'])):
			$nama = $this->papar->senarai['pertubuhan'][0]['NaPer'];
			$this->papar->_5p['nama'] = $nama;//*/
		$this->papar->_5p['nama'] = 'Biarlah Rahsia';
		# semak sama ada nilai wujud atau tidak
		/*
		$this->papar->senarai['limaPerangkaan'][0]['kodbanci']
		$this->papar->senarai['limaPerangkaan'][0]['nosiri']
		$this->papar->senarai['limaPerangkaan'][0]['F0002']
		$this->papar->senarai['limaPerangkaan'][0]['F0014']
		$this->papar->senarai['limaPerangkaan'][0]['F0015']
		$this->papar->senarai['limaPerangkaan'][0]['hasil']
		$this->papar->senarai['limaPerangkaan'][0]['belanja']
		$this->papar->senarai['limaPerangkaan'][0]['susut']
		$this->papar->senarai['limaPerangkaan'][0]['harta']
		$this->papar->senarai['limaPerangkaan'][0]['sewatanah']
		$this->papar->senarai['limaPerangkaan'][0]['sewalain']
		$this->papar->senarai['limaPerangkaan'][0]['sewaharta']
		$this->papar->senarai['limaPerangkaan'][0]['stafL']
		$this->papar->senarai['limaPerangkaan'][0]['gajiL']
		$this->papar->senarai['limaPerangkaan'][0]['sijilL']
		$this->papar->senarai['limaPerangkaan'][0]['stafP']
		$this->papar->senarai['limaPerangkaan'][0]['gajiP']
		$this->papar->senarai['limaPerangkaan'][0]['sijilP']
		*/
		$hasil = $this->papar->senarai['limaPerangkaan'][0]['hasil'];
		$belanja = $this->papar->senarai['limaPerangkaan'][0]['belanja'];
		$gaji = $this->papar->senarai['limaPerangkaan'][0]['gajiL']
			+ $this->papar->senarai['limaPerangkaan'][0]['gajiP'];
		$aset = $this->papar->senarai['limaPerangkaan'][0]['harta'];
		$susut = $this->papar->senarai['limaPerangkaan'][0]['susut'];
		# f2148 = sewa lain2, f2147 = sewa tanah
		$sewatanah = $this->papar->senarai['limaPerangkaan'][0]['sewatanah'];
		$sewalain = $this->papar->senarai['limaPerangkaan'][0]['sewalain'];
		//$asetsewa = $sewatanah + $sewalain;
		$asetsewa = $this->papar->senarai['limaPerangkaan'][0]['sewaharta'];
		# masukkan nilai 5 perangkaan utama
		$this->papar->_5p['hasil'] = $hasil;
		$this->papar->_5p['belanja'] = $belanja;
		$this->papar->_5p['gaji'] = $gaji;
		$this->papar->_5p['susut'] = $susut;
		$this->papar->_5p['aset'] = $aset;
		$this->papar->_5p['asetsewa'] = $asetsewa;
		# masukkan nilai anggaran
		$this->papar->_5p['hasil_kini'] = truncate_number($nisbah * $hasil);
		$this->papar->_5p['belanja_kini'] = truncate_number($nisbah * $belanja);
		$this->papar->_5p['gaji_kini'] = truncate_number($nisbah * $gaji);
		$this->papar->_5p['susut_kini'] = truncate_number($nisbah * $susut);
		$this->papar->_5p['aset_kini'] = truncate_number($nisbah * $aset);
		$this->papar->_5p['asetsewa_kini'] = truncate_number($nisbah * $asetsewa);
		//*/
	}
#-------------------------------------------------------------------------------------------
	function kiraNisbah($peratus)
	{
		$nisbah = ($peratus!=null) ? ($peratus)/100 : rand(-30, 30)/100;
		//$nisbah = rand(-30, 30)/100;
		$nisbah = 1 + $nisbah;
		$nilaiNisbah = 1;

		return $nisbah;
	}
#-------------------------------------------------------------------------------------------
	public function be2($idBorang = null)
	{
		# Set pembolehubah utama
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$db = 'pom_malaysiabaru.be2016_kp';
		$md = 'kodbanci,nosiri,F0002,F0014,F0015,';
		$sql = null;
		foreach($this->tanya->dataBanci2016() as $jadual):
			//$sql .= $this->tanya->soalanGajiSijil($md,$db.$jadual . 'a');
			//$sql[] = $this->tanya->data5P($md,$db.$jadual . 'a');
			//$sql[] = $this->tanya->soalanGaji($md,$db.$jadual . 'a');
			$sql[] = $this->tanya->soalanGaji02($md,$db.$jadual . 'a');
			//$this->panggilDB2('semuaBE',$db.$jadual . 'a',$idBorang);
		endforeach;//*/
		$sqlAll = "CREATE TABLE be2016_staf_servis02 AS \r" . implode(" UNION \r",$sql);
		//$this->debugKandunganPaparan();

		# Pergi papar kandungan
		$this->semakPembolehubah($sqlAll); # Semak data dulu
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$fail = array('index','b_ubah','b_ubah_kawalan','soalan4');
		//echo '<br>$fail = ' . $fail[3] . '<hr>';
		//$this->paparKandungan($this->_folder, $fail[0], $noInclude=1);
	}
#-------------------------------------------------------------------------------------------
	public function banci($idBorang = null)
	{
		# Set pembolehubah utama
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
	public function ulangBilStaf($idBorang = null)
	{
		# Set pembolehubah utama
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$myDB = 'pom_malaysiabaru';
		$myTable = 'be2016_kp890a';//'be2016_staf_servis02';
		//$this->papar->senarai = $this->tanya->pilihMedan($myTable, $myDB);
		$this->papar->senarai = $this->tanya->pilihMedan02($myTable, $myDB);
		/*$where = " WHERE nosiri = '$idBorang' ";
		$sql = null;
		foreach($this->tanya->jawatanStaf() as $key):
			$sql[] = "SELECT `L$key`,`F49$key`,`F50$key`,`F14$key`,`F18$key`,`F51$key` "
				. "FROM $myTable$where";
		endforeach;//*/
		//return $sqlAll = implode(" UNION \r",$sql);
		//$this->debugKandunganPaparan();


		# Pergi papar kandungan
		//$this->_folder = 'borang';
		//echo '<br>$this->_folder = ' . $this->_folder . '<hr>';
		//$this->semakPembolehubah($sqlAll); # Semak data dulu
		$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$fail = array('index','b_ubah','b_ubah_kawalan','soalan4');
		//$this->paparKandungan($this->_folder, $fail[0], $noInclude=1);
	}
#-------------------------------------------------------------------------------------------
#==========================================================================================
}
