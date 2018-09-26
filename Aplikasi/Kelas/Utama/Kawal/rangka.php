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
	private function paparHTML()
	{
		foreach($this->papar->_paparMedan as $jadual):
			echo '<select>' . "\r";
			foreach($jadual as $key => $medan):
				echo '<option>' . $medan . '</option>' . "\r";
			endforeach;
			echo '</select>' . "\r";
		endforeach;
		//*/
	}
#-------------------------------------------------------------------------------------------
	public function tambah($kp = null,$dataID = null)
	{
		# Set pembolehubah utama
		//echo '<hr>' . $this->_namaClass . '<hr>';
		$this->ulangJadual();
		$this->setPembolehUbah($kp,$dataID);
		$fail = array('index','b_ubah','b_ubah_kawalan','b_baru');

		# Pergi papar kandungan
		$this->_folder = 'cari'; # jika mahu ubah lokasi Papar
		$this->paparKandungan($this->_folder, $fail[3], $noInclude=0);
		//*/
    }
#-------------------------------------------------------------------------------------------
	public function setPembolehUbah($kp,$dataID)
	{
		$this->papar->medanID = $kp;
		$this->papar->cariID = $dataID;
		$this->papar->carian[] = 'semua';
		$this->papar->_method = huruf('kecil', namaClass($this));
		$this->papar->c1 = $this->papar->c2 = null;
		//$this->papar->template = 'biasa';
		//$this->papar->template = 'bootstrap';
		$this->papar->template = 'khas01';

		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$this->semakPembolehubah($this->papar->_paparMedan); # Semak data dulu
		//$this->paparHTML();
	}
#-------------------------------------------------------------------------------------------
	public function ulangJadual()
	{
		list($j0,$medan,$carian,$atur,$j1,$j2) = $this->tanya->jadualRangka();

		foreach($j0 as $myTable):
			$this->papar->senarai[$myTable] =
				$this->tanya->cariSemuaData("`$myTable`", $medan, $carian, $atur);
				//$this->tanya->cariSql("`$myTable`", $medan, $carian, $atur);
		endforeach;
		$myTable = null;
		foreach($j1 as $myTable):
			$this->papar->_paparMedan =
				$this->tanya->pilihMedan02($myTable);
		endforeach;

		$this->papar->_j2 = $j2;
		//*/
	}
#-------------------------------------------------------------------------------------------
	public function tambahSimpan()
	{
		list($jaduaLama,$senaraiJadual) = dpt_senarai('jadual_rangka2');
		# ubahsuai $_POST
		list($medanLama,$medanBaru,$medanID,$cariID) = $this->tambahPost($senaraiJadual);
		//echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
		//echo '<pre>$medanLama='; print_r($medanLama); echo '</pre>';
		//echo '<pre>$medanBaru='; print_r($medanBaru); echo '</pre>';

		# mula ulang $senaraiJadual
		foreach ($senaraiJadual as $kunci => $jadual)
		{# mula ulang table
			$carian = $this->tanya->jadualRangka3($jadual,$medanID,$cariID);
			//$this->tanya->salinJadual($jadual . '_x', $medan = '*', $jadual);

			$this->tanya->//tambahSqlJadualBarukeLama
			tambahJadualBarukeLama
			($jadual,$medanBaru[$jadual],$medanLama[$jadual],$jaduaLama,$carian);
		}# tamat ulang table

		# pergi papar kandungan
		//echo 'location: ' . URL . 'kawalan/ubah/' . $dataID;
		//header('location: ' . URL . 'kawalan/ubah/' . $dataID); //*/
	}
#-------------------------------------------------------------------------------------------
	function tambahPost($senaraiJadual)
	{
		$posmen = array();
		foreach ($_POST as $myTable => $v): //echo "<br>\$k=$k";
			if(in_array($myTable,$senaraiJadual)):
			foreach ($v as $k1):
			foreach ($k1 as $kekunci => $papar)
			{
				//echo "\$kekunci=$kekunci";
				$posmen1[$myTable][] = bersih($papar);
				$posmen2[$myTable][] = bersih($kekunci);
			}//*/
			endforeach;
			endif;
		endforeach;

		//echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
		//echo '<pre>$senaraiJadual='; print_r($senaraiJadual); echo '</pre>';
		//echo '<pre>$posmen='; print_r($posmen); echo '</pre>';

		$medanLama = $this->cantumMedan1($senaraiJadual, $posmen1);
		$medanBaru = $this->cantumMedan2($senaraiJadual, $posmen2);
		$medanID = bersih($_POST['medanID']);
		$cariID = bersih($_POST['cariID']);

		return array($medanLama,$medanBaru,$medanID,$cariID); # pulangkan nilai
	}
#-------------------------------------------------------------------------------------------
	function cantumMedan1($jadual, $posmen)
	{
		# cantumkan tatasusunan
		foreach($jadual as $my):
			$pos[$my] = '`' . implode("`,`", $posmen[$my]) . '`';
		endforeach;

		# debug
		//echo '<pre>$pos='; print_r($pos); echo '</pre>';
		//echo '<pre>$posmen2='; print_r($posmen); echo '</pre>';//*/

		return $pos; # pulangkan nilai
	}
#-------------------------------------------------------------------------------------------
	function cantumMedan2($jadual, $posmen)
	{
		# cantumkan tatasusunan
		foreach($jadual as $my):
			$pos[$my] = '`' . implode("`,`", $posmen[$my]) . '`';
		endforeach;

		# debug
		//echo '<pre>$pos='; print_r($pos); echo '</pre>';
		//echo '<pre>$posmen2='; print_r($posmen); echo '</pre>';//*/

		return $pos; # pulangkan nilai
	}
#-------------------------------------------------------------------------------------------
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