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
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		//echo '<hr>Nama function :' .__FUNCTION__ . '<hr>';
	}
##------------------------------------------------------------------------------------------
	public function index()
	{
		# Set pemboleubah utama
		$this->papar->tajuk = namaClass($this);
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
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
		$myJadual = array('`aes`','`kawalan_aes`','`aes_alam_sekitar`',
		'`aes_kp_205`','`aes_kp_206`','`aes_kp_207`','`aes_kp_800`',
		'`aes_perkhidmatan`','`aes_pertanian`');
		$medan = '*';
		# cari id berasaskan newss/ssm/sidap/nama
		$id['nama'] = isset($_POST['cari']) ? bersih($_POST['cari']) : null;
		$kumpulSusun = array('kumpul'=>null,'susun'=>'nama');
		$susun = $this->menyusun($kumpulSusun);
		return array($myJadual, $medan, $id, $susun); //*/
	}
#------------------------------------------------------------------------------------------
	public function idnama() 
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>'; 
		# senaraikan tatasusunan jadual
		list($myJadual, $medan, $id, $susun) = $this->pembolehubah();

		if (!empty($id['nama']))
		{
			$carian[] = array('fix'=>'z%like%', # cari = atau %%
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => 'concat_ws("",newss,nossm,nama)', # cari dalam medan apa
				'apa' => $id['nama']); # benda yang dicari
			$this->cariSyarikat($myJadual, $medan, $carian, $susun, $id['nama']);
		}
		else
		{
			$this->papar->carian[]='[id:0]'; //$this->papar->cariID = '[id:0]';
		}

		//$this->papar->template = 'bootstrap';
		$this->papar->template = 'biasa';
		$fail = array('index','b_ubah','b_ubah_kawalan');

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, $fail[0], $noInclude=0); //*/
    }
#------------------------------------------------------------------------------------------
	function cariSyarikat($jadual, $medan, $carian, $susun, $cariID)
	{
		foreach ($jadual as $key => $myTable)
		{# mula ulang table
			$this->papar->senarai[$myTable] = $this->tanya->
				//cariSql($myTable, $medan, $carian, $susun);
				cariSemuaData($myTable, $medan, $carian, $susun);
		}# tamat ulang table//*/
		# isytihar pembolehubah untuk dalam class Papar
		$this->papar->primaryKey = 'newss';
		$this->papar->cariID = $this->papar->carian[] = $cariID;
	}
#------------------------------------------------------------------------------------------
###########################################################################################
#------------------------------------------------------------------------------------------
	public function tentang($apa, $bil=1, $mesej=null)
	{
		# Fungsi ini memaparkan borang

		//if ($apa=='msic') $jadual = 'pom_dataekonomi.msic2000';
		if ($apa=='msic') $jadual = 'msic2000';
		elseif ($apa=='produk') $jadual = 'pom_dataekonomi.kodproduk_mei2011';
		elseif ($apa=='johor') $jadual = 'pom_lokaliti.a_johor'; # negeri johor/malaysia
		elseif ($apa=='malaysia') $jadual = 'pom_lokaliti.a_malaysia'; # negeri johor/malaysia
		elseif ($apa=='prosesan') $jadual = 'pom_dataekonomi.data_mm_prosesan';
		elseif ($apa=='operasi') $jadual = 'kawalan_aes';

		# Set pemboleubah utama
		$this->papar->senarai = $this->tanya->paparMedan($jadual);
		$this->papar->url = dpt_url();
		$this->papar->mesej = $mesej;
		$this->papar->template = 'bootstrap';
		$fail = array('index','a_mula','b_ubah','b_ubah_kawalan');

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$this->semakPembolehubah($this->papar->url); # Semak data dulu
		$this->paparKandungan($this->_folder, $fail[1], $noInclude=0); //*/
	}
#------------------------------------------------------------------------------------------
	function semakOutput($mesej, $lokasi, $namajadual)
	{
		echo '<pre>'; # semak output
		echo 'Patah balik ke ' . $lokasi . '/' . $namajadual . '<hr>';
		echo '$mesej = ' . $mesej . '';
		echo '<br>$this->papar->carian :'; $this->semakRujuk($this->papar->carian);
		echo '<br>$this->papar->senarai:'; $this->semakRujuk($this->papar->senarai);
		echo '</pre>';
	}
#------------------------------------------------------------------------------------------
	function pada($bil = 400, $muka = 1)
	{	//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		/* fungsi ini memaparkan hasil carian
		 * untuk jadual msic2000 dan msic2008
		 */
		list($mesej, $lokasi, $namajadual) = $this->sayaPilih($bil, $muka);
		$this->papar->c1 = $this->papar->c2 = null;
		//$this->semakOutput($mesej, $lokasi, $namajadual);
		$this->papar->template = ($namajadual=='syarikat') ?
			'biasa' : 'bootstrap';
		$fail = array('index','b_ubah','b_ubah_kawalan');

		# paparkan ke fail cari/$namajadual.php
		if ($mesej != null )
		{
			@$_SESSION['mesej'] = $mesej;
			//echo 'Patah balik ke ' . $lokasi . $mesej . '<hr>' . $data;
			header('location:' . URL . 'cari/' . $lokasi . $namajadual . '/2');
		}
		else# Pergi papar kandungan
			$this->paparKandungan($this->_folder, $fail[0], $noInclude=0); //*/
	}
#------------------------------------------------------------------------------------------
	function susunPembolehubah($bil, $muka)
	{	//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//echo '$post:' . $this->semakPembolehubah($_POST);
		# ini adalah bukan tatasusunan
		$jadual = isset($_POST['namajadual']) ? bersih($_POST['namajadual']) : null;
		$susunX = isset($_POST['susun']) ? bersih($_POST['susun']) : 1;
		$pilih = isset($_POST['jika']['pilih'][1]) ? bersih($_POST['jika']['pilih'][1]) : null;
		$semak = isset($_POST['jika']['cari'][1]) ? bersih($_POST['jika']['cari'][1]) : null;
		$semak2 = isset($_POST['jika']['cari'][2]) ? bersih($_POST['jika']['cari'][2]) : null;
		# ini adalah tatasusunan
		$cari = isset($_POST['jika']['cari']) ? $_POST['jika']['cari'] : null;
		$atau = isset($_POST['jika']['atau']) ? $_POST['jika']['atau'] : null;
		# susun limit ikut $bil
		$limit = isset($_POST['max']) ? bersih($_POST['max']) : $bil;
		$kumpulSusun = array('kumpul'=>null,'susun'=>$susunX);
		$susun = $this->menyusun($kumpulSusun, '0', $limit);
		//echo 'susun:' . $this->semakPembolehubah($susun);
		//$this->semakPembolehubah($_POST);
		//echo '$bil=' . $bil. '<br>$limit=' . $limit. '<br>$muka=' . $muka . '<br>';
		//echo '$susunX =' . $susunX . '<br>';//echo '$pilih=' . $pilih . '<br>';
		//echo '$semak =' . $semak1 . '<br>$semak2=' . $semak2 . '<br>';

		return array($jadual,$susun,$pilih,$semak,$semak2,$cari,$atau,$limit);
	}
#------------------------------------------------------------------------------------------
	function sayaPilih($bil, $muka)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		list($jadual,$susun,$pilih,$semak,$semak2,$cari,$atau,$limit)
			= $this->susunPembolehubah($bil,$muka);

		if (!isset($_POST['atau']) && isset($_POST['pilih'][2]))
		{	//echo ')$jadual=' . $jadual . '<br>';
			$mesej = 'tak isi atau-dan pada carian';
			$lokasi = ($jadual=='johor') ? 'lokaliti/' : 'semua/';
		}
		elseif ( (empty($semak) || ( empty($semak2) && $jadual=='johor') ) )
		{	//echo '2)$jadual=' . $jadual . '<br>';
			$mesej = 'tak isi pada carian';
			$lokasi = ($jadual=='johor') ? 'lokaliti/' : 'semua/';
		}
		elseif (!empty($jadual) )
		{
			$this->pilihYangWujud($jadual, $cari, $susun, $limit);
			$mesej = $lokasi = null;
		}//*/

		return array($mesej,$lokasi,$jadual);
	}
#------------------------------------------------------------------------------------------
	function pilihYangWujud($jadual, $cari, $susun, $limit)
	{
		//echo '<br>jadual:' . $jadual . '<br>';
		if($jadual=='msic')
			$this->sayaPilihMsic($cari, $susun, $limit);
		elseif($jadual=='produk')
			$this->sayaPilihProduk($cari, $susun, $limit);
		elseif($jadual=='johor')
			$this->sayaPilihJohor($cari, $susun, $limit);
		elseif($jadual=='malaysia')
			$this->sayaPilihMalaysia($cari, $susun, $limit);
		elseif($jadual=='syarikat')
			$this->sayaPilihSyarikat($cari, $susun, $limit);
		elseif($jadual=='data_mm_prosesan')
			$this->sayaPilihDataMM($cari, $susun, $limit);
		elseif($jadual=='operasi')
			$this->sayaPilihOperasi($cari, $susun, $limit);
		else
			$this->sayaTidakWujud($cari, $susun, $limit);
	}
#------------------------------------------------------------------------------------------
	function sayaPilihMsic($cari, $susun, $limit)
	{	//echo '<hr>Nama class : ' . __METHOD__ . '()<hr>';
		$jadual = dpt_senarai('msicbaru'); //echo '<pre>';
		//echo 'jadual:' . $this->semakPembolehubah($jadual);

		foreach ($jadual as $key => $namaPanjang)
		{# mula ulang table
			$myTable = substr($namaPanjang, 16);
			//$myTable = $namaPanjang;
			//echo "<br>Msic) $myTable|$namaPanjang";
			$medan = $this->tanya->medanIndustri($myTable);
			list($carian,$cariID) = $this->tanya->bentukCarian($_POST['jika'], $myTable);
			$this->papar->senarai[$myTable] = $this->tanya->
				//cariSql($namaPanjang, $medan, $carian, $susun);
				cariSemuaData($namaPanjang, $medan, $carian, $susun);
		}# tamat ulang table//*/

		$this->papar->carian = $cari;
		$this->papar->cariID = $cariID;
	}
#------------------------------------------------------------------------------------------
	function sayaPilihProduk($cari, $susun, $limit)
	{
		$jadual = dpt_senarai('produk');
		//echo 'jadual:' . $this->semakPembolehubah($jadual);

		foreach ($jadual as $key => $namaPanjang)
		{# mula ulang table
			$myTable = substr($namaPanjang, 16); 
			//echo "<br>Produk) $myTable|$namaPanjang";
			# senarai nama medan
			$medan = ($myTable=='kodproduk_aup') ? 
				'bil,substring(kod_produk_lama,1,5) as msic,kod_produk_lama,'
				. 'kod_produk,unit_kuantiti unit,keterangan,keterangan_bi,aup,min,max' 
				: '*';
			list($carian,$cariID) = $this->tanya->bentukCarian($_POST['jika'], $myTable);
			$this->papar->senarai[$myTable] = $this->tanya->
				//cariSql($namaPanjang, $medan, $carian, $susun);
				cariSemuaData($namaPanjang, $medan, $carian, $susun);
		}# tamat ulang table

		# papar jadual kod unit
		$unitPanjang = 'pom_dataekonomi.kodproduk_unitkuantiti';
		$unit = 'unitkuantiti';
		$this->papar->senarai[$unit] = $this->tanya->
			cariSemuaData($unitPanjang, '*', null, null);

		$this->papar->carian = $cari;
		$this->papar->cariID = $cariID;
	}
#------------------------------------------------------------------------------------------
	function sayaPilihJohor($cari, $susun, $limit)
	{
		list($namaPanjang,$semak,$medanAsal,$medanBaru) = dpt_senarai('jadual_peta');
		/*echo 'jadual:' . $this->semakPembolehubah($namaPanjang); *///echo '<pre>';

		foreach ($namaPanjang as $key => $jadual)
		{# mula ulang table
			$myTable = ($jadual == $semak) ?
				'JOHOR' : 'LK-JOHOR';
			$medan = ($jadual == $semak) ?
				$medanAsal : $medanBaru;
			list($carian,$cariID) = $this->tanya->bentukCarian($_POST['jika'], $myTable);
			$this->papar->senarai[$myTable] = $this->tanya->
				//cariSql("$jadual\r", $medan, $carian, $susun);
				cariSemuaData("$jadual\r", $medan, $carian, $susun);
		}# tamat ulang table//*/

		$this->papar->carian = $cari;
		$this->papar->cariID = $cariID;
	}
#------------------------------------------------------------------------------------------
	function sayaPilihMalaysia($cari, $susun, $limit)
	{
		list($namaPanjang,$ngbesar,$medan) = dpt_senarai('jadual_peta2');
		/*echo 'jadual:' . $this->semakPembolehubah($namaPanjang); *///echo '<pre>';

		foreach ($namaPanjang as $key => $jadual)
		{# mula ulang table
			$myTable = $ngbesar[$key];
			list($carian,$cariID) = $this->tanya->bentukCarian($_POST['jika'], $myTable);
			$this->papar->senarai[$myTable] = $this->tanya->
				//cariSql("$jadual\r", $medan, $carian, $susun);
				cariSemuaData("$jadual\r", $medan, $carian, $susun);
		}# tamat ulang table//*/

		$this->papar->carian = $cari;
		$this->papar->cariID = $cariID;
	}
#------------------------------------------------------------------------------------------
	function sayaPilihSyarikat($cari, $susun, $limit)
	{
		//echo '<hr>Nama class : ' . __METHOD__ . '()<hr>';
		list($jadual, $medan, $carian, $cariID) = $this->tanya->dataCorp($cari);

		foreach ($jadual as $key => $myTable)
		{# mula ulang table
			$this->papar->senarai[$myTable] = $this->tanya->
				//cariSql($myTable, $medan, $carian, $susun);
				cariSemuaData($myTable, $medan, $carian, $susun);
		}# tamat ulang table//*/

		$this->papar->carian = $cari;
		$this->papar->cariID = $cariID;
	}
#------------------------------------------------------------------------------------------
	function sayaPilihDataMM($cari, $susun, $limit)
	{
		$jadual = dpt_senarai('***');
		//echo 'jadual:' . $this->semakPembolehubah($jadual);
		$medan = '*';

		foreach ($jadual as $key => $myTable)
		{# mula ulang table
			list($carian,$cariID) = $this->tanya->bentukCarian($_POST['jika'], $myTable);
			$this->papar->senarai[$myTable] = $this->tanya->
				cariSql($myTable, $medan, $carian, $susun);
				//cariSemuaData($myTable, $medan, $carian, $susun);
		}# tamat ulang table//*/

		$this->papar->carian = $cari;
		$this->papar->cariID = $cariID;
	}
#------------------------------------------------------------------------------------------
	function sayaPilihOperasi($cari, $susun, $limit)
	{
		$jadual = array('kawalan_aes');
		$medan = '*'; //echo '<pre>$susun->'; print_r($susun); echo '</pre>';
		$susun[0]['max'] = $limit;
		//echo '<pre>$susun->'; print_r($susun); echo '</pre>';

		foreach ($jadual as $key => $myTable)
		{# mula ulang table
			list($carian,$cariID)= $this->tanya->bentukCarian($_POST['jika'], $myTable);
			$this->papar->senarai[$myTable] = $this->tanya->
				//cariSql($myTable, $medan, $carian, $susun);
				cariSemuaData($myTable, $medan, $carian, $susun);
		}# tamat ulang table//*/

		$this->papar->carian = $cari;
		$this->papar->cariID = $cariID;
	}
#------------------------------------------------------------------------------------------
	function sayaTidakWujud($cari, $susun, $limit)
	{
		$medan = $myTable = 'jadual-tidak-wujud';
		list($carian,$cariID) = $this->tanya->bentukCarian($_POST['jika'], $myTable);
		$this->papar->senarai[$myTable] = $this->tanya->
			//cariSql($myTable, $medan, $carian, $susun);
			cariSemuaData($myTable, $medan, $carian, $susun);

		$this->papar->carian = $cari;
		$this->papar->cariID = null;
	}
#------------------------------------------------------------------------------------------
###########################################################################################
#------------------------------------------------------------------------------------------
	public function syarikat($carilah = null)
	{
		$cari = bersih($_GET['cari']);
		//echo "URL \$cari = $cari <br> GET \$cari = $carilah";
		if($cari == null) echo '<li>Kosong Laa</li>';
		elseif (isset($cari)) 
		{
			if(strlen($cari) > 0)
			{
				list($paparKes, $bilKes) = $this->syarikatDB($cari);
				$this->syarikatPapar($paparKes, $bilKes);
			}# tamat - strlen($cari) > 0
		}# tamat - isset($cari)//*/
	}
#------------------------------------------------------------------------------------------
	function syarikatPapar($paparKes, $bilKes)
	{
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
	}
#------------------------------------------------------------------------------------------
	function syarikatDB($cari)
	{
		list($myTable, $medan01) = dpt_senarai('jadual_kawalan');
		$medan = 'newss,nama,nossm,operator,kp';
		$carian[] = array('fix'=>'z%like%','atau'=>'WHERE',
			'medan'=>'concat_ws(" ",newss,nossm,nama)','apa'=>$cari);
		$susun['dari'] = 10;

		$paparKes = //$this->tanya->cariSql($myTable, $medan, $carian, $susun);
		$this->tanya->cariSemuaData($myTable, $medan, $carian, $susun);
		$bilKes = count($paparKes); //echo $bilKes . '=>'; //print_r($paparKes);

		return array($paparKes, $bilKes);
	}
#------------------------------------------------------------------------------------------
###########################################################################################
#------------------------------------------------------------------------------------------
	public function msic($carilah = null)
	{
		$cari = bersih($_GET['cari']);
		//echo "URL \$cari = $cari <br> GET \$cari = $carilah";
		if($cari == null) echo '<li>Kosong Laa</li>';
		elseif (isset($cari))
		{
			if(strlen($cari) > 0)
			{
				list($paparKes, $bilKes) = $this->msicDB($cari);
				$this->msicPapar($paparKes, $bilKes);
			}# tamat - strlen($cari) > 0
		}# tamat - isset($cari)//*/
	}
#------------------------------------------------------------------------------------------
	function msicPapar($paparKes, $bilKes)
	{
		if($bilKes==0) {echo '<li>Takde Laa</li>';}
		else
		{	echo '<li>Jumpa ' . $bilKes . '</li>';
			foreach($paparKes as $key => $data)
			{
				echo '<li onClick="fill(\'' . $data['msic'] . '\');">'
				. ($key+1) . '-' . $data['s'] . '|' . $data['msic']
				. '|' .  $data['keterangan'] . '|' . $data['notakaki']
				. '|' . $data['msic2000'] . '</li>';
			}# tamat - foreach($paparKes as $key => $data)
		}# tamat - $bilKes ==0
	}
#------------------------------------------------------------------------------------------
	function msicDB($cari)
	{
		list($myTable, $medan01) = dpt_senarai('jadual_msic');
		/*seksyen,bahagian,kumpulan,kelas,msic,keterangan,msic2000,notakaki*/
		$medan = 'seksyen s,msic,keterangan,msic2000,notakaki';
		$carian[] = array('fix'=>'z%like%','atau'=>'WHERE',
			'medan'=>'concat_ws(" ",msic,keterangan,notakaki)','apa'=>$cari);
		$susun['dari'] = 10;

		$paparKes = //$this->tanya->cariSql($myTable, $medan, $carian, $susun);
		$this->tanya->cariSemuaData($myTable, $medan, $carian, $susun);
		$bilKes = count($paparKes); //echo $bilKes . '=>'; //print_r($paparKes);

		return array($paparKes, $bilKes);
	}
#------------------------------------------------------------------------------------------
#==========================================================================================
}