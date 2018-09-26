<?php
include 'atas/diatas.php';
//include 'atas/menu_atas.php';
//include 'z_tatasusunan.php';
$class1 = 'col-sm-6'; # untuk tajuk dan hantar
$class2 = 'col-sm-6'; # untuk $data
$aksi = null;
$buang01 = array('newss','nama','batch','form','kp','msic2008',
	'KodBanci','NoSiri','F0002','F0014','F0015');
# include fail
include $this->template . '.php';
include $this->template2 . '.php';

# untuk debug
//echo '<pre>$carian='; print_r($this->carian); echo '</pre>';
//echo '<pre>$senarai='; print_r($this->senarai); echo '</pre>';
//echo '<pre>$medan='; print_r($this->medan); echo '</pre>';
//echo '<pre>$_5p='; print_r($this->_5p); echo '</pre>';
/*$ulang = array('kodbanci','nosiri','F0002','F0014','F0015',
	'F2001','F2089','F2099');
foreach ($ulang as $key):
	echo "\n<h4>" . keteranganMedan($key,$this->medan) . '</h4>';
endforeach;//*/

//include 'soalan_anggaran.php';
include 'atas/dibawah.php';

#--------------------------------------------------------------------------------------------
function keteranganMedan($key,$banyakMedan)
{
	# cari keterangan medan yang lain
	$namaMedan = null;
	foreach ($banyakMedan as $p0 => $p1):
	foreach ($p1 as $n0 => $data):
		if($key == $data)
			$namaMedan = $banyakMedan[$p0]['keterangan'];
	endforeach;endforeach;

	return $namaMedan;
}
#--------------------------------------------------------------------------------------------
function paparInput01($myTable,$key,$data,$banyakMedan,$_5p)
{
	?><tr><?php
	?><td align="right"><?php echo keteranganMedan($key,$banyakMedan) ?></td><?php
	//$paparData = $html->tambahDropInput($this->_paparMedan, $this->_j2,
	//$myTable, $kira, $key, $data);
	$f1 = formula01($myTable,$key,$data,$_5p);
	$f2 = formula02($myTable,$key,$data,$_5p);
	?><td><?php echo $key ?></td><?php
	?><td><?php echo $data ?></td><?php
	?><td><?php echo $f1 ?></td><?php
	?><td><?php echo $f2 ?></td><?php
	?><td><?php echo formula03($myTable,$key,$data,$_5p) ?></td><?php
	?><td><?php //echo $data ?></td><?php
	?></tr><?php
}
#--------------------------------------------------------------------------------------------
function formula00()
{

}
#--------------------------------------------------------------------------------------------
function formula01($myTable,$key,$data,$_5p)
{
	$perpuluhan = 2;
	if($myTable == 'be2016_hasil_servis'):
		$jumlah = $_5p['hasil'];
		$kiraan = $data / $jumlah;
		$papar = kiraPerpuluhan($kiraan,2) . '%';//*/
	elseif($myTable == 'be2016_belanja_servis'):
		$jumlah = $_5p['belanja'];
		$kiraan = $data / $jumlah;
		$papar = kiraPerpuluhan($kiraan,10) . '%';//*/
		//$papar = $myTable . '|' . $data;
	else:
		$jumlah = '1969435';
		$kiraan = $data / $jumlah;
		$papar = kiraPerpuluhan($kiraan,2) . '%';
	endif;

	return $papar;
}
#--------------------------------------------------------------------------------------------
function formula02($myTable,$key,$data,$_5p)
{# papar yang banyak perpuluhan
	$peratus = $_5p['peratus']; $hasil = $_5p['hasil'];
	$belanja01 = $_5p['belanja']; $belanja02 = $_5p['belanja_kini'];
	$jumBelanja = $kira00 = $kira01 = $kira02 = $kira03 = 0;
	if( ($myTable == 'be2016_hasil_servis') && ($key != 'F2099') ):
		$papar = $data * $peratus;
	elseif( ($myTable == 'be2016_hasil_servis') && ($key == 'F2099') ):
		//$kira00 = $kira01 = $kira02 = $kira03 = 0;
		$kira01 = $data * $peratus;
		$papar = $kira01;
	elseif( ($myTable == 'be2016_belanja_servis') ):
		$kira00 = ($data/$belanja01) * $belanja02;
		$papar = kiraPerpuluhan($kira00,8);
	/*elseif( ($myTable == 'be2016_belanja_servis') && ($key == 'F2199') ):
		$papar = $data * $peratus;*/
	else:
		$papar = kiraPerpuluhan($data,2) . '';
	endif;

	return $papar;
}
#--------------------------------------------------------------------------------------------
function formula03($myTable,$key,$data,$_5p)
{
	$peratus = $_5p['peratus'];
	$jumHasil = $jumBelanja = $kira00 = $kira01 = $kira02 = $kira03 = 0;
	if( ($myTable == 'be2016_hasil_servis') && ($key != 'F2099') ):
		$kira00 = $data * $peratus; //$kira01 = kiraPerpuluhan($kira00,2);
		$kira02 = truncate_number($kira00);
		$papar = $kira02;
	elseif( ($myTable == 'be2016_hasil_servis') && ($key == 'F2099') ):
		$kira00 = $kira01 = $kira02 = $kira03 = 0;
		$kira00 = $data * $peratus; //$kira01 = kiraPerpuluhan($kira00,2);
		$kira02 = truncate_number($kira00);
		$papar = $kira02;
	elseif( ($myTable == 'be2016_belanja_servis') && ($key != 'F2199') ):
		$kira00 = $kira01 = $kira02 = $kira03 = 0;
		$kira00 = $data * $peratus; //$kira01 = kiraPerpuluhan($kira00,2);
		$kira02 = truncate_number($kira00);
		$papar = $kira02;
	elseif( ($myTable == 'be2016_belanja_servis') && ($key == 'F2199') ):
		$kira00 = $kira01 = $kira02 = $kira03 = 0;
		$kira00 = $data * $peratus;
		$kira02 = truncate_number($kira00);
		$papar = $kira02;
		//$papar = $myTable . '|' . $data;
	else:
		$papar = kiraPerpuluhan($data,2) . '';
	endif;

	return $papar;
}
#--------------------------------------------------------------------------------------------