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
	function alihMedan()
	{
		//ALTER TABLE Employees MODIFY COLUMN empName VARCHAR(50) AFTER department;
	}
#---------------------------------------------------------------------------------------------------#
	public function semakPosmen($myTable, $posmen, $pass)
	{
		if(isset($posmen[$myTable][$pass])):
			if($posmen[$myTable][$pass] == null):
				//echo '<br> buang ' . $pass;
				unset($posmen[$myTable][$pass]);
			else:
				$posmen[$myTable][$pass] = 
					\Aplikasi\Kitab\RahsiaHash::rahsia('md5', 
					$posmen[$myTable][$pass]);
			endif;
		endif;

		return $posmen;
	}
#---------------------------------------------------------------------------------------------------#
#---------------------------------------------------------------------------------------------------#
#=====================================================================================================
}