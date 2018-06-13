<?php
namespace Aplikasi\Tanya; //echo __NAMESPACE__; 
class Biodata_Tanya extends \Aplikasi\Kitab\Tanya
{
#=====================================================================================================
	public function __construct()
	{
		parent::__construct();
	}
#---------------------------------------------------------------------------------------------------#
	function data_contoh($pilih)
	{
		$data = array(
			'namaPendek' => 'james007',
			'namaPenuh' => 'Polan Bin Polan',
			'level' => 'pelawat'
		); # dapatkan medan terlibat
		$kira = 1; # kira jumlah data
		
		return ($pilih==1) ? $kira : $data; # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	public function semakPosmen($myTable, $posmen, $pass, $pass2)
	{
		if(isset($posmen[$myTable][$pass])):
			if($posmen[$myTable][$pass] == null):
				//echo '<br> buang ' . $pass;
				unset($posmen[$myTable][$pass]);
			else:
				$data = $this->cincangPassword($myTable, $posmen, $pass, $pass2);
				//$data = $this->semakPassword($data);
				$posmen[$myTable][$pass2] = $data;
				$posmen[$myTable][$pass] =
					\Aplikasi\Kitab\RahsiaHash::rahsia('md5', 
					$posmen[$myTable][$pass]);//*/
			endif;
		endif;

		return $posmen;
	}
#---------------------------------------------------------------------------------------------------#
	public function cincangPassword($myTable, $posmen, $pass, $pass2)
	{
		//$data00 = $posmen[$myTable][$pass]; //echo "<br>\$data00=$data00";
		//$data01 = \Aplikasi\Kitab\RahsiaHash::rahsia('md5', $data00);
		//echo '<br>\Aplikasi\Kitab\RahsiaHash::rahsia(\'md5\', $data00):' . $data01;
		$data[2] = \Aplikasi\Kitab\RahsiaHash::cincang($posmen[$myTable][$pass]);
		//echo '<br>\Aplikasi\Kitab\RahsiaHash::cincang($data00):' . $data02;

		return $data[2];
	}
#---------------------------------------------------------------------------------------------------#
	function semakPassword($data)
	{
		$cincang01 = '082905ee4b03a4d8415436d4b3dcc376';
		$cincang02 = '$2y$18$VQVcUc6bUaaPNZGVmu8aDeG8nT70QxG.In0edZmbBEaCJZWB2b7rq';
		echo '<br>\Aplikasi\Kitab\RahsiaHash::sahkan($data, $cincang):'
		. \Aplikasi\Kitab\RahsiaHash::sahkan($data, $cincang02);
	}
#=====================================================================================================
}