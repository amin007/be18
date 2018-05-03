<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__; 
class Cari extends \Aplikasi\Kitab\Kawal
{
#==========================================================================================
	function __construct()
	{
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_folder = huruf('kecil', namaClass($this));
		$this->_namaClass = '<hr>Nama class :' . __METHOD__ . '<hr>';
		$this->_namaFunction = '<hr>Nama function :' .__FUNCTION__ . '<hr>';
	}

	public function index()
	{
		# Set pemboleubah utama
		$this->papar->tajuk = namaClass($this);
		//echo $this->_namaClass; //echo $this->_namaFunction;

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
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

	public function semakRujuk($senarai)
	{
		//echo '<pre>$senarai:<br>';
		print_r($senarai);
		//echo '</pre>|';//*/
	}

	function logout()
	{
		//echo '<pre>sebelum:'; print_r($_SESSION); echo '</pre>';
		\Aplikasi\Kitab\Sesi::destroy();
		header('location: ' . URL);
		//exit;
	}
#==========================================================================================
#------------------------------------------------------------------------------------------
	public function menyusun($kumpulSusun, $bilSemua = 20, $item = 10)
	{
		$ms = 1; ## set pembolehubah utama
		//echo '$bilSemua:' . $bilSemua . ', $item:' . $item . ', $ms:' . $ms . '<br>';
		$jum = pencamSqlLimit($bilSemua, $item, $ms);
		///$kumpulSusun = array('kumpul'=>null,'susun'=>'nama');
		$susun[] = array_merge($jum,  $kumpulSusun);

		return $susun;
	}
#------------------------------------------------------------------------------------------
	public function pembolehubah()
	{
		//echo '<pre>$_POST=>'; print_r($_POST); echo '</pre>';
		/* $_POST[] => Array ( [cari] => 0000000123456 or [nama] => ABC ) */

		$myJadual = array('aes','kawalan_aes','aes_alam_sekitar',
		'aes_kp_205','aes_kp_206','aes_kp_207','aes_kp_800',
		'aes_perkhidmatan','aes_pertanian');
		$medan = '*';
		# cari id berasaskan newss/ssm/sidap/nama
		$id['nama'] = bersih(isset($_POST['cari']) ? $_POST['cari'] : null);
		//$id['nama'] = isset($_POST['id']['nama']) ? $_POST['id']['nama'] : null;
		$kumpulSusun = array('kumpul'=>null,'susun'=>'nama');
		$susun = menyusun($kumpulSusun);
		return array($myJadual, $medan, $id, $susun); //*/
	}
#------------------------------------------------------------------------------------------
	public function idnama() 
	{	//echo $this->namaClass; 
        # senaraikan tatasusunan jadual
		list($myJadual, $medan, $id, $susun) = $this->pembolehubah();
		$this->papar->senarai = array();
        if (!empty($id['nama'])) 
        {
			$carian[] = array('fix'=>'z%like%', # cari = atau %%
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => 'concat_ws("",newss,nossm,nama)', # cari dalam medan apa
				'apa' => $id['nama']); # benda yang dicari

            foreach ($myJadual as $key => $myTable)
            {# mula cari $cariID dalam $myJadual
                $this->papar->senarai[$myTable] = 
					$this->tanya->cariSemuaData("`$myTable`", $medan, $carian, $susun);
					//$this->tanya->cariSql("`$myTable`", $medan, $carian, $susun);
            }# tamat

			# isytihar pembolehubah untuk dalam class Papar
			$this->papar->primaryKey = 'newss';
			$this->papar->carian[] = $id['nama'];
        }
        else
        {
            $this->papar->carian[]='[id:0]';
        }

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, 'a_syarikat' , $noInclude=0); //*/
    }
#------------------------------------------------------------------------------------------
	public function tentang($apa, $bil=1, $mesej=null) 
	{	
		# Fungsi ini memaparkan borang
		//echo 'mana ko pergi daa lokaliti($negeri)<br>';

		if ($apa=='msic') $jadual = 'pom_dataekonomi.msic2000';
		elseif ($apa=='produk') $jadual = 'pom_dataekonomi.kodproduk_mei2011';
		elseif ($apa=='johor') $jadual = 'pom_lokaliti.johor'; # negeri johor/malaysia
		elseif ($apa=='malaysia') $jadual = 'pom_lokaliti.malaysia'; # negeri johor/malaysia
		elseif ($apa=='prosesan') $jadual = 'pom_dataekonomi.data_mm_prosesan';

		# Set pemboleubah utama
		$this->papar->senarai = $this->tanya->paparMedan($jadual);
		$this->papar->url = dpt_url();
		$this->papar->mesej = $mesej;

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$this->semakPembolehubah($this->papar->url); # Semak data dulu
		$this->paparKandungan($this->_folder, 'a_mula' , $noInclude=0); //*/
	}
#------------------------------------------------------------------------------------------
	function pecah_post()
	{
		$papar['atau'] = isset($_POST['jika']['atau']) ? $_POST['jika']['atau'] : null;
		$papar['pilih'] = isset($_POST['jika']['pilih']) ? $_POST['jika']['pilih'] : null;
		$papar['cari'] = isset($_POST['jika']['cari']) ? $_POST['jika']['cari'] : null;
		$papar['fix'] = isset($_POST['jika']['fix']) ? $_POST['jika']['fix'] : null;

		$kira['atau'] = count($papar['atau']);
		$kira['pilih'] = count($papar['pilih']);
		$kira['cari'] = count($papar['cari']);
		$kira['fix'] = count($papar['fix']);

		return $kira; //echo '<pre>'; print_r($kira) . '</pre>';
	}
#------------------------------------------------------------------------------------------
	function pada($bil = 400, $muka = 1)
	{	//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		/* fungsi ini memaparkan hasil carian
		 * untuk jadual msic2000 dan msic2008
		 */
		//$this->semakPembolehubah($_POST['jika']); 
		$kira = $this->pecah_post($_POST); //$this->semakPembolehubah($kira);
		$this->sayaMestiPilih($bil, $muka, $kira);
		$this->papar->cariID = '';

		/*echo '<pre>'; # semak output
		//echo 'Patah balik ke ' . $lokasi . $mesej . $namajadual . '<hr>';
		echo '$this->papar->carian :'; $this->semakRujuk($this->papar->carian);
		echo '$this->papar->senarai:'; $this->semakRujuk($this->papar->senarai);
		//	. '$this->papar->apa : ' . $this->papar->apa . '<br>';
		echo '</pre>';//*/
		
		# paparkan ke fail cari/$namajadual.php
		/*if ($mesej != null ) 
		{
			$_SESSION['mesej'] = $mesej;
			//echo 'Patah balik ke ' . $lokasi . $mesej . '<hr>' . $data;
			header('location:' . URL . 'cari/' . $lokasi . $namajadual . '/2');
		}
		else 
		{	//echo 'Tak patah balik';
			$this->papar->primaryKey = 'newss';
			$this->papar->baca('cari/cari', 0);	
		}//*/

		# Pergi papar kandungan
		$this->paparKandungan($this->_folder, 'a_syarikat' , $noInclude=0); //*/
	}
#------------------------------------------------------------------------------------------
	function susunPembolehubah($bil, $muka)
	{	//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# setkan pembolehubah dulu
		$namajadual = isset($_POST['namajadual']) ? $_POST['namajadual'] : null;
		$cari = isset($_POST['jika']['cari']) ? $_POST['jika']['cari'] : null;
		$susun = isset($_POST['susun']) ? $_POST['susun'] : 1;
		$pilih = isset($_POST['jika']['pilih'][1]) ? $_POST['jika']['pilih'][1] : null;
		$semak = isset($_POST['jika']['cari'][1]) ? $_POST['jika']['cari'][1] : null;
		$semak2 = isset($_POST['jika']['cari'][2]) ? $_POST['jika']['cari'][2] : null;
		$atau = isset($_POST['jika']['atau']) ? $_POST['jika']['atau'] : null;

		//$this->semakPembolehubah($_POST);
		//echo '$bil=' . $bil. '<br>$muka=' . $muka . '<br>';
		//echo '$pilih=' . $pilih. '<br>$semak=' . $semak . '<br>';
		//echo '$pilih=' . $pilih. '<br>$semak=' . $semak . '<br>';

		return array($namajadual,$susun,$cari,$pilih,$semak,$semak2,$atau);
	}
#------------------------------------------------------------------------------------------
	function sayaMestiPilih($bil, $muka, $kira)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		list($namajadual,$susun,$cari,$pilih,$semak,$semak2,$atau) 
			= $this->susunPembolehubah($bil, $muka);

		if (!isset($_POST['atau']) && isset($_POST['pilih'][2]))
		{	//echo ')$namajadual=' . $namajadual . '<br>';
			$mesej = 'tak isi atau-dan pada carian';
			$lokasi = ($namajadual=='johor') ? 'lokaliti/' : 'semua/';
		}
		elseif ( (empty($semak) || ( empty($semak2) && $namajadual=='johor') ) ) 
		{	//echo '2)$namajadual=' . $namajadual . '<br>';
			$mesej = 'tak isi pada carian';
			$lokasi = ($namajadual=='johor') ? 'lokaliti/' : 'semua/';
		}
		elseif (!empty($namajadual) && $namajadual=='msic') 
			list($mesej, $lokasi) = $this->sayaPilihMsic($namajadual, $bil, $muka, $kira, $cari);
	}
#------------------------------------------------------------------------------------------
	function sayaPilihMsic($namajadual, $bil, $muka, $kira, $cari)
	{	
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		$jadual = dpt_senarai('msicbaru');
		$kumpulSusun = array('kumpul'=>null,'susun'=>null);
		$susun = $this->menyusun($kumpulSusun, '0', $bil);
		//echo 'susun:' . $this->semakPembolehubah($susun); 
		$had = ' LIMIT 0, ' . $bil; // setkan $had untuk sql
		//$this->semakPembolehubah($_POST['jika']); # Semak data dulu

		# mula cari $cariID dalam $jadual
		foreach ($jadual as $key => $namaPanjang)
		{# mula ulang table
			$myTable = substr($namaPanjang, 16); 
			$carian = $this->tanya->bentukCarian($_POST['jika'], $myTable); 
			# senarai nama medan
			$medan = ($myTable=='msic2008') ? 
				'seksyen S,bahagian B,kumpulan Kpl,kelas Kls,' .
				'msic2000,msic,keterangan,notakaki' 
				: '*'; 
			$this->papar->senarai[$myTable] = 
				//$this->tanya->cariSql("`$myTable`", $medan, $carian, $susun);
				$this->tanya->cariSemuaData("`$myTable`", $medan, $carian, $susun);
				//$this->tanya->cariPOST($namaPanjang, $medan, $had);//*/
		}# tamat ulang table//*/

		$this->papar->carian = $cari;
		
		return($mesej = null, $lokasi = null);
	}
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
	public function syarikat($carilah = null)
	{
		$cari = bersih($_GET['cari']); //echo "URL \$cari = $cari <br> GET \$cari = $carilah";
		if($cari == null) echo '<li>Kosong Laa</li>';
		elseif (isset($cari)) 
		{
			if(strlen($cari) > 0)
			{
				list($myTable, $medan01) = dpt_senarai('jadual_kawalan');
				$medan = 'newss,nama,nossm,operator,kp';
				$carian[] = array('fix'=>'z%like%','atau'=>'WHERE',
					'medan'=>'concat_ws(" ",newss,nossm,nama)','apa'=>$cari);
				$susun['dari'] = 10;

				$paparKes = //$this->tanya->cariSql($myTable, $medan, $carian, $susun);
					$this->tanya->cariSemuaData($myTable, $medan, $carian, $susun);
				$bilKes = count($paparKes); //echo $bilKes . '=>'; //print_r($paparKes);

				if($bilKes==0) {echo '<li>Takde Laa</li>';}
				else
				{	echo '<li>Jumpa ' . $bilKes . '</li>';
					foreach($paparKes as $key => $data)
					{
						echo '<li onClick="fill(\'' . $data['newss'] . '\');">' 
							. ($key+1) . '-' . $data['nama'] . '-' . $data['newss']
							. '-SSM ' . $data['nossm'] . '-' . $data['operator'] 
							. '-KP' . $data['kp'] . '</li>';
					}# tamat - foreach($paparKes as $key => $data)
				}# tamat - $bilKes ==0
			}# tamat - strlen($cari) > 0
		}# tamat - isset($cari)//*/
	}
#------------------------------------------------------------------------------------------
#==========================================================================================
}