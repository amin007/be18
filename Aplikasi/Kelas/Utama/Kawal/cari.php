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
		//echo '<hr> Nama class : ' . namaClass($this) . '<hr>';
		//echo $this->namaClass; //echo $this->namaFunction;

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

	function logout()
	{
		//echo '<pre>sebelum:'; print_r($_SESSION); echo '</pre>';
		\Aplikasi\Kitab\Sesi::destroy();
		header('location: ' . URL);
		//exit;
	}
#==========================================================================================
#------------------------------------------------------------------------------------------
	public function suku1($action = 'hasil')
	{	//echo $this->namaClass; 
		# Set pemboleubah utama
		$this->papar->tajuk = namaClass($this);

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, $pilihFail, $noInclude=1); //*/
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
		$this->papar->senarai = array();
		# cari id berasaskan newss/ssm/sidap/nama
		$id['nama'] = bersih(isset($_POST['cari']) ? $_POST['cari'] : null);
		//$id['nama'] = isset($_POST['id']['nama']) ? $_POST['id']['nama'] : null;
		$bilSemua = $item = 10; $ms = 1; ## set pembolehubah utama
		//echo '$bilSemua:' . $bilSemua . ', $item:' . $item . ', $ms:' . $ms . '<br>';
		$jum = pencamSqlLimit($bilSemua, $item, $ms);
		$susun[] = array_merge($jum, array('kumpul'=>null,'susun'=>'nama') );

		return array($myJadual, $medan, $id, $this->papar->senarai, $susun); //*/
	}
#------------------------------------------------------------------------------------------
	public function idnama() 
	{	//echo $this->namaClass; 
        # senaraikan tatasusunan jadual
		list($myJadual, $medan, $id, $this->papar->senarai, $susun) = $this->pembolehubah();
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
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
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
				$carian[] = array('fix'=>'z%like%','atau'=>'WHERE','medan'=>'concat_ws(" ",newss,nossm,nama)','apa'=>$cari);
				$susun['dari'] = 10;

				$paparKes = //$this->tanya->cariSql($myTable, $medan, $carian, $susun);
					$this->tanya->cariSemuaData($myTable, $medan, $carian, $susun);
				$bilKes = count($paparKes); //echo $bilKes . '=>'; //print_r($paparKes) . '<pre></pre>';

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