<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__; 
class Rangka extends \Aplikasi\Kitab\Kawal
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
##------------------------------------------------------------------------------------------
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
	public function tambah() 
	{
		# Set pembolehubah utama
		//echo '<hr>' . $this->_namaClass . '<hr>';
		list($jadual,$medan,$carian,$atur) = $this->tanya->jadualRangka();
		# mula cari dalam $myJadual
		foreach($jadual as $myTable):
			$this->papar->senarai[$myTable] =
				$this->tanya->cariSemuaData("`$myTable`", $medan, $carian, $atur);
				//$this->tanya->cariSql("`$myTable`", $medan, $carian, $atur);
			$this->papar->paparMedan[$myTable] =
				$this->tanya->pilihMedan02($myTable);
		endforeach;
		$this->setPembolehUbah();
		$fail = array('index','b_ubah','b_ubah_kawalan','b_baru');

		# Pergi papar kandungan
		$this->_folder = 'cari'; # jika mahu ubah lokasi Papar
		//$this->paparKandungan($this->_folder, $fail[3], $noInclude=0);
		//*/
    }
#-------------------------------------------------------------------------------------------
	public function setPembolehUbah()
	{
		$this->papar->medanID = $this->papar->cariID = null;
		$this->papar->carian[] = 'semua';
		$this->papar->_jadual = 'kawalan_aes';
		$this->papar->_method = huruf('kecil', namaClass($this));
		$this->papar->_cariIndustri = $this->papar->c1 = $this->papar->c2 = null;
		//$this->papar->template = 'biasa';
		//$this->papar->template = 'bootstrap';
		$this->papar->template = 'khas01';

		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->semakPembolehubah($this->papar->paparMedan); # Semak data dulu
	}
#-------------------------------------------------------------------------------------------
	private function jadualKawalan($cariID)
	{
		list($myTable, $this->papar->carian) = dpt_senarai('jadual_rangka');
		$this->papar->_jadual = $myTable; //$carian = null; //echo '<pre>';
		$medan = $this->tanya->medanKawalan($cariID); 

		# semak database
		$carian[] = array('fix'=>'like', # cari x= atau %like%
			'atau'=>'WHERE', # WHERE / OR / AND
			'medan' => 'po', # cari dalam medan apa
			'apa' => 'pom'); # benda yang dicari
		/*$carian[] = array('fix'=>'like', # cari x= atau %like%
			'atau'=>'AND', # WHERE / OR / AND
			'medan' => 'bandar', # cari dalam medan apa
			'apa' => 'MUAR'); # benda yang dicari//*/
		$carian[] = array('fix'=>'like', # cari x= atau %like%
			'atau'=>'AND', # WHERE / OR / AND
			'medan' => 'daerah', # cari dalam medan apa
			'apa' => null); # benda yang dicari//*/
		# susun
		$item = 1000; $ms = 1; ## set pembolehubah utama
		## tentukan bilangan mukasurat. bilangan jumlah rekod
		//echo '$bilSemua:' . $bilSemua . ', $item:' . $item . ', $ms:' . $ms . '<br>';
		$jum2 = pencamSqlLimit(300, $item, $ms);
		$atur[] = array_merge($jum2, array('kumpul'=>null,'susun'=>'bandar') );
		# mula cari $cariID dalam $myJadual
		$cariData['kes'] =
			$this->tanya->cariSemuaData("`$myTable`", $medan, $carian, $atur);
			//$this->tanya->cariSql("`$myTable`", $medan, $carian, null);
			//$newss = $this->cariMsic($cariNama['kes']); # mula cari Msic

		# semak pembolehubah
		//echo '<pre>Test $_POST->'; print_r($_POST); echo '</pre>';
		//echo '<pre>$cariNama::'; print_r($cariNama); echo '</pre>';
		//echo '<hr>$data->' . sizeof($cariNama) . '<hr>';

		return array($cariData, $newss = sizeof($cariNama['kes']) );
	}
#-------------------------------------------------------------------------------------------
	function cariMsic($cariApa)
	{			
		if(isset($cariApa[0]['newss'])):
			# 1.1 ambil nilai newss
			$newss = $cariApa[0]['newss'];

			# 1.2 cari nilai msic & msic08 dalam jadual msic2008
			$jadualMSIC = dpt_senarai('msicbaru');
			$this->cariIndustri($jadualMSIC, $cariApa[0]['msic2008']);
		endif;

		return $newss;
	}
#---------------------------------------------------------------------------------------------------
	private function cariIndustri($jadualMSIC, $msic)
	{
		#326-46312  substr("abcdef", 0, -1);  // returns "abcde"
		$msic08 = substr($msic, 4);  // returns "46312"
		$cariM6[] = array('fix'=>'x=','atau'=>'WHERE','medan'=>'msic','apa'=>$msic08);

		# mula cari $cariID dalam $jadual
		foreach ($jadualMSIC as $m6 => $msic)
		{# mula ulang table
			$jadualPendek = substr($msic, 16); //echo "\$msic=$msic|\$jadualPendek=$jadualPendek<br>";

			# senarai nama medan
			if($jadualPendek=='msic2008') /*bahagian B,kumpulan K,kelas Kls,*/
				$medanM6 = 'seksyen S,msic2000,msic,keterangan,notakaki';
			elseif($jadualPendek=='msic2008_asas') 
				$medanM6 = 'msic,survey kp,keterangan,keterangan_en';
			elseif($jadualPendek=='msic_v1') 
				$medanM6 = 'msic,survey kp,bil_pekerja staf,keterangan,notakaki';
			else $medanM6 = '*'; 
			//echo "cariMSIC($msic, $medanM6,<pre>"; print_r($cariM6) . "</pre>)<br>";

			$this->papar->_cariIndustri[$jadualPendek] = $this->tanya->//cariSql
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
			foreach ($posmen as $jadual => $value)
			foreach ($value as $kekunci => $papar)
				$posmen[$myTable][$kekunci]= 
					( in_array($kekunci,array('hasil','belanja','gaji','aset','staf','stok')) ) ?
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
#===========================================================================================
}