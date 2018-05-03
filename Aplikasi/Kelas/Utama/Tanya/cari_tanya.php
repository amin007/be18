<?php
namespace Aplikasi\Tanya; //echo __NAMESPACE__; 
class Cari_Tanya extends \Aplikasi\Kitab\Tanya
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
	public function cariPOST($myTable, $medan, $susun)
	{
		$sql = 'SELECT ' . $medan . "\r" . ' FROM ' . $myTable . "\r"
			 . $this->dimanaPOST($myTable) . $susun;

		//echo '<pre>$sql->'; print_r($sql); echo '</pre>';
		return $this->db->selectAll($sql);
	}
#---------------------------------------------------------------------------------------------------#
	private function dimanaPOST($myTable)
	{
		//echo '<pre>$_POST->'; print_r($_POST) . '</pre>';
		// //' WHERE ' . $medan . ' like %:cariID% ', array(':cariID' => $cariID));
		$where = null;
		if($_POST==null || empty($_POST) ):
			$where .= null;
		else:
			foreach ($_POST['pilih'] as $key=>$cari)
			{
				$apa = $_POST['cari'][$key];
				$f = isset($_POST['fix'][$key]) ? $_POST['fix'][$key] : null;
				$atau = isset($_POST['atau'][$key]) ? $_POST['atau'][$key] : 'WHERE';

				//$sql.="\r$key => $f  | ";

				if ($apa==null)
					$where .= " $atau `$cari` is null\r";
				elseif ($myTable=='msic2008')
				{
					if ($cari=='msic') $where .= ($f=='x') ?
					" $atau (`$cari`='$apa' OR msic2000='$apa')\r" :
					" $atau (`$cari` like '%$apa%' OR msic2000 like '%$apa%')\r";
					else $where .= ($f=='x') ?
					" $atau (`$cari`='$apa' OR notakaki='$apa')\r" :
					" $atau (`$cari` like '%$apa%' OR notakaki like '%$apa%')\r";
				}
				else
					$where .= ($f=='x') ? " $atau `$cari`='$apa'\r" :
					" $atau `$cari` like '%$apa%'\r";
			}
		endif;

		return $where;
	} // private function dimanaPOST()
#---------------------------------------------------------------------------------------------------#
	function bentukCarian($post, $myTable)
	{	//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//echo '<pre>$post->'; print_r($post); echo '</pre>';
		$carian = null; //' WHERE ' . $medan . ' like %:cariID% ', array(':cariID' => $cariID));
		if($_POST==null || empty($_POST) ):
			$carian .= null;
		else:
			foreach ($post['pilih'] as $key=>$cari)
			{
				$f = isset($post['fix'][$key]) ? $post['fix'][$key] : null;
				$atau = isset($post['atau'][$key]) ? $post['atau'][$key] : 'WHERE';
				$apa = isset($post['cari'][$key]) ? $post['cari'][$key] : null;

				//echo "\r$key => $f  | "; // '%like%' 'x='

				if ($myTable=='msic2008')
				{	//" $atau (`$cari`='$apa' OR msic2000='$apa')\r" :
					if ($cari=='msic') $carian[] = ($f=='x') ?
						array('fix'=>'or(x=)','atau'=>$atau,'medan'=>$cari . '|msic2000','apa'=>$apa):
						array('fix'=>'or(%like%)','atau'=>$atau,'medan'=>$cari . '|msic2000','apa'=>$apa);
					else $carian[] = ($f=='x') ?
					//" $atau (`$cari`='$apa' OR notakaki='$apa')\r" :
						array('fix'=>'or(x=)','atau'=>$atau,'medan'=>$cari . '|notakaki','apa'=>$apa):
						array('fix'=>'or(%like%)','atau'=>$atau,'medan'=>$cari . '|notakaki','apa'=>$apa);
				}
				else
				{
					$carian[] = ($f=='x') ?
					array('fix'=>'x=','atau'=>$atau,'medan'=>$cari,'apa'=>$apa)
					: array('fix'=>'%like%','atau'=>$atau,'medan'=>$cari,'apa'=>$apa);
				}
			}
		endif; //echo '<pre>$carian->'; print_r($carian); echo '</pre>';

		return $carian;
	}
#---------------------------------------------------------------------------------------------------#
#=====================================================================================================
}