<?php
namespace Aplikasi\Tanya; //echo __NAMESPACE__; 
class Kawalan_Tanya extends \Aplikasi\Kitab\Tanya
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
	public function medanKawalan($cariID) 
	{ 
		$news1 = 'http://ekonomi/ekonomi/ckawalan/ubah/' . $cariID;
		$news2 = 'http://ekonomi/ekonomi/cprosesan/ubah/000/' . $cariID .'/2010/2015/';
		$news3 = 'http://ekonomi/ekonomi/semakan/ubah/",kp,"/' . $cariID .'/2010/2015/';
		$url1 = '" <a target=_blank href=' . $news1 . '>SEMAK 1</a>"';
		$url2 = '" <a target=_blank href=' . $news2 . '>SEMAK 2</a>"';
		$url3 = 'concat("<a target=_blank href=' . $news3 . '>SEMAK 3</a>")';
		$medanKawalan = 'newss,'
			//. '( if (hasil is null, "", '
			. 'concat_ws("|",nama,operator,' . $url1 . ',' . $url3 .') nama,'
			/*. ' concat_ws("|",' . "\r"
			. ' 	concat_ws("="," hasil",format(hasil,0)),' . "\r"
			. ' 	concat_ws("="," belanja",format(belanja,0)),' . "\r"
			. ' 	concat_ws("="," gaji",format(gaji,0)),' . "\r"
			. ' 	concat_ws("="," aset",format(aset,0)),' . "\r"
			. ' 	concat_ws("="," staf",format(staf,0)),' . "\r"
			. ' 	concat_ws("="," stok akhir",format(stok,0))' . "\r"
 			. ' ) as data5P,' . "\r"//*/
			. ' concat_ws("|",' . "\r"
			. ' 	concat_ws("="," responden",responden),' . "\r"
			. ' 	concat_ws("="," notel",notel),' . "\r"
			. ' 	concat_ws("="," nofax",nofax),' . "\r"
			. ' 	concat_ws("="," orang_a",orang_a),' . "\r"
			. ' 	concat_ws("="," notel_a",notel_a),' . "\r"
			. ' 	concat_ws("="," nofax_a",nofax_a)' . "\r"
 			. ' ) as dataHubungi,' . "\r"
			//. 'orang_a,notel_a,nofax_a,email_a,' . "\r"
			. 'responden,notel,nofax,' . "\r"
			. ' concat_ws("|",' . "\r"
			. ' 	concat_ws("="," hasil",format(amt_hasil,0)),' . "\r"
			. ' 	concat_ws("="," belanja",format(amt_belanja,0)),' . "\r"
			. ' 	concat_ws("="," gaji",format(amt_gaji,0)),' . "\r"
			. ' 	concat_ws("="," aset",format(amt_aset,0)),' . "\r"
			. ' 	concat_ws("="," staf",format(amt_staf,0)),' . "\r"
			. ' 	concat_ws("="," jualan",format(amt_jualan,0))' . "\r"
			. ' ) as dataAsal,' . "\r"//*/
			//. 'amt_staf,amt_output,amt_input,amt_aset,amt_gaji,'
			//. 'amt_jualan,amt_hasil,amt_belanja,' . "\r"
			. 'concat_ws(" | ",nossm,kp) as nossm,' . "\r"
			. 'concat_ws(" | ",pegawai,borang) batchAwal,fe,po,' . "\r"
			. 'mko,respon,nota,nota_prosesan,' . "\r"
			. 'concat_ws(" ",alamat1,alamat2,poskod,bandar,daerah,ngdbbp) as alamat,' . "\r"
			. 'no,batu,jalan,tmn_kg,dp_baru,' . "\r"
			//. 'concat_ws(" ",no,batu,'
			//. '( if (jalan is null, "", concat("JALAN ",jalan) ) ),
			//. 'tmn_kg,poskod,dp_baru) alamat_baru,' . "\r"
			. 'concat_ws("-",kp,msic2008) msic2008,' 
			. 'concat_ws("-",kp,msic2008) keterangan,' . "\r"
			//. 'concat_ws("=>ngdbbp baru=",ngdbbp,ngdbbp_baru) ngdbbp,ngdbbp_baru,' . "\r"
			//. 'batchAwal,dsk,mko,batchProses,'
			. 'lawat,terima,hantar,hantar_prosesan,' . "\r" 
			. 'null as pecah5P,hasil,belanja,gaji,aset,staf,stok,' . "\r"
			. 'null as notapendek';
		return $medanKawalan;
	}
#---------------------------------------------------------------------------------------------------#
	public function medanKawalan02($cariID)
	{
		$news1 = 'http://ekonomi/ekonomi/ckawalan/ubah/' . $cariID;
		$news2 = 'http://ekonomi/ekonomi/cprosesan/ubah/000/' . $cariID .'/2010/2015/';
		$news3 = 'http://ekonomi/ekonomi/semakan/ubah/",kp,"/' . $cariID .'/2010/2015/';
		$u1 = '" <a target=_blank href=' . $news1 . '>SEMAK 1</a>"'. ",\r";
		$u2 = '" <a target=_blank href=' . $news2 . '>SEMAK 2</a>"' . ",\r";
		$u3 = 'concat("<a target=_blank href=' . $news3 . '>SEMAK 3</a>")' . "\r";
		$medanKawalan = 'newss,'
			. 'concat_ws("|",nama,operator,' . $u1 . $u3 . ') nama,' . "\r"
			. 'nossm,nocidb,nama,operator,' . "\r"
			. 'kp,msic2008,msic2018_3digit,' . "\r"
			. 'alamat1_a,alamat2_a,bandar_a,poskod_a,' . "\r"
			. 'negeri_a,daerah_a,po_a,ngdbbp_a,' . "\r"
			. 'orang_a,email_a,notel_a,nofax_a,' . "\r"
			. 'Jualan_RM,Hasil,`Bil Pekerja`,Output,' . "\r"
			. 'Harta_Tetap_RM,Gaji,`Nilai Kerja Pembinaan (RM)`,Belanja,' . "\r"
			. 'null as notapendek';
		return $medanKawalan;
	}
#---------------------------------------------------------------------------------------------------#
	public function jadualKawalan02()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		list($myTable, $medanID,$cariID) = dpt_senarai('jadual_salin03');
		$medan = $this->medanKawalan02($cariID); //echo '<pre>';

		# bentuk tatasusunan $carian // $carian = null;
		$carian[] = array('fix'=>'x=', # cari x= atau %like%
			'atau'=>'WHERE', # WHERE / OR / AND
			'medan' => $medanID, # cari dalam medan apa
			'apa' => $cariID); # benda yang dicari //*/
		$atur[0]['max'] = 1;

		return array($myTable,$medan,$medanID,$carian,$atur);
	}

#---------------------------------------------------------------------------------------------------#
	public function ubahData($myTable, $a1, $a2, $senarai)
	{
		echo '<pre>';
		foreach($senarai['kes'] as $key => $data):
			$passAsal = $senarai['kes'][$key][$a1];
			$pass = \Aplikasi\Kitab\RahsiaHash::rahsia('md5', $passAsal);
			echo "\rUPDATE $myTable";
			echo "\rSET `$a2` = '$pass'";
			echo "\rWHERE `$a1` = '$passAsal';\r";
		endforeach;
		echo '</pre>';

		return $senarai;
	}
#---------------------------------------------------------------------------------------------------#
#=====================================================================================================
}