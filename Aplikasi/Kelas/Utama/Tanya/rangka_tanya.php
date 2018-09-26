<?php
namespace Aplikasi\Tanya; //echo __NAMESPACE__; 
class Rangka_Tanya extends \Aplikasi\Kitab\Tanya
{
#=====================================================================================================
	public function __construct()
	{
		parent::__construct();
	}
#---------------------------------------------------------------------------------------------------#
	public function semakData($senarai)
	{
		echo '<pre>$senarai:<br>';
		print_r($senarai);
		echo '</pre>||';//*/
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
	public function medanKawalan($cariID) 
	{ 
		$news1 = 'http://sidapmuar/ekonomi/ckawalan/ubah/' . $cariID;
		$news2 = 'http://sidapmuar/ekonomi/cprosesan/ubah/000/'.$cariID.'/2010/2015/'; 
		$news3 = 'http://sidapmuar/ekonomi/semakan/ubah/",kp,"/'.$cariID.'/2010/2015/'; 
		$url1 = '" <a target=_blank href=' . $news1 . '>SEMAK 1</a>"' . "\r";
		$url2 = '" <a target=_blank href=' . $news2 . '>SEMAK 2</a>"' . "\r";
		$url3 = 'concat("<a target=_blank href=' . $news3 . '>SEMAK 3</a>")' . "\r";
        $medanKawalan = '`newss`,`bandar`,'
			. 'concat_ws("|",nama,operator) nama,'
			. '`kod_daerah`,`daerah`,`po`,'
			. '`survei`,kp,msic2008,' 
			//. 'concat_ws("-",kp,msic2008) msic2008,' . "\r"
			//. 'concat_ws("-",kp,msic2008) keterangan,' . "\r"
			. ' concat_ws("|",' . "\r"
			. ' 	concat_ws("="," responden",responden),' . "\r"
			. ' 	concat_ws("="," notel",notel),' . "\r"
			. ' 	concat_ws("="," nofax",nofax),' . "\r"
			. ' 	concat_ws("="," orang_",orang_a),' . "\r"
			. ' 	concat_ws("="," notel_a",notel_a),' . "\r"
			. ' 	concat_ws("="," nofax_a",nofax_a)' . "\r"
 			. ' ) as dataHubungi,' . "\r"
			. 'concat_ws(" ",alamat1,alamat2,poskod,bandar) as alamat' . "\r"
			. '';	
		return $medanKawalan;
	}
#---------------------------------------------------------------------------------------------------#
	public function jadualRangka()
	{
		list($medan, $myTable, $j1,$j2) = dpt_senarai('jadual_rangka');
		# bentuk tatasusunan $carian //
		$carian = null; 
		/*$carian[] = array('fix'=>'like', # cari x= atau %like%
			'atau'=>'WHERE', # WHERE / OR / AND
			'medan' => $medanID, # cari dalam medan apa
			'apa' => $cariID); # benda yang dicari //*/
		# bentuk tatasusunan $atur //$atur = null;
		$jum2 = pencamSqlLimit(1, $item = 1, $ms = 1);
		$atur1['kumpul'] = null;
		$atur1['susun'] = null;
		$atur[] = array_merge($jum2,$atur1);

		return array($myTable,$medan,$carian,$atur,$j1,$j2);
	}
#---------------------------------------------------------------------------------------------------#
	public function jadualRangka3($jadual,$medanID,$cariID)
	{
		list($j1,$j2,$e1,$e2) = dpt_senarai('jadual_rangka3');
		# bentuk tatasusunan $carian //
			$carian[] = array('fix'=>'like', # cari x= atau %like%
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => $medanID, # cari dalam medan apa
				'apa' => $cariID); # benda yang dicari //*/

		return $carian;
	}
#---------------------------------------------------------------------------------------------------#
#=====================================================================================================
}