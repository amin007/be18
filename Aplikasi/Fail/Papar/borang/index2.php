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
include $this->template3 . '.php';

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
	?><td><?php echo $key ?></td><?php
	?><td><?php echo $data ?></td><?php
	?><td><?php echo formula01($myTable,$key,$data,$_5p) ?></td><?php
	?><td><?php echo formula02($myTable,$key,$data,$_5p) ?></td><?php
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
		$kiraan = $data / $_5p['hasil'];
		$papar = kiraPerpuluhan($kiraan,10) . '%';
	elseif($myTable == 'be2016_belanja_servis'):
		$kiraan = $data / $_5p['belanja'];
		$papar = kiraPerpuluhan($kiraan,10) . '%';
	else:
		$papar = kiraPerpuluhan($data,2) . '%';
	endif;

	return $papar;
}
#--------------------------------------------------------------------------------------------
function formula02($myTable,$key,$data,$_5p)
{# papar yang banyak perpuluhan//$kira01 = kiraPerpuluhan($kira00,2);
	$peratus = $_5p['peratus'];
	$hasil01 = $_5p['hasil']; $hasil02 = $_5p['hasil_kini'];
	$belanja01 = $_5p['belanja']; $belanja02 = $_5p['belanja_kini'];
	if($myTable == 'be2016_hasil_servis'):
		$kira00 = ($data/$hasil01) * $hasil02;
		$papar = kiraPerpuluhan($kira00,10);
	//elseif( ($myTable == 'be2016_hasil_servis') && ($key == 'F2099') ):
	elseif($myTable == 'be2016_belanja_servis'):
		$kira00 = ($data/$belanja01) * $belanja02;
		$papar = kiraPerpuluhan($kira00,10);
	//elseif( ($myTable == 'be2016_belanja_servis') && ($key == 'F2199') ):
	else:
		$papar = kiraPerpuluhan($data,2) . '';
	endif;

	return $papar;
}
#--------------------------------------------------------------------------------------------
function formula03($myTable,$key,$data,$_5p)
{//$kira01 = kiraPerpuluhan($kira00,2);
	$peratus = $_5p['peratus'];
	$hasil01 = $_5p['hasil']; $hasil02 = $_5p['hasil_kini'];
	$belanja01 = $_5p['belanja']; $belanja02 = $_5p['belanja_kini'];
	if($myTable == 'be2016_hasil_servis'):
		$kira00 = ($data/$hasil01) * $hasil02;
		$papar = truncate_number($kira00);
	//elseif( ($myTable == 'be2016_hasil_servis') && ($key == 'F2099') ):
	elseif($myTable == 'be2016_belanja_servis'):
		$kira00 = ($data/$belanja01) * $belanja02;
		$papar = truncate_number($kira00);
	//elseif( ($myTable == 'be2016_belanja_servis') && ($key == 'F2199') ):
	else:
		$papar = kiraPerpuluhan($data,2) . '';
	endif;

	return $papar;
}
#--------------------------------------------------------------------------------------------