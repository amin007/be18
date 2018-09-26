<?php
include 'atas/diatas.php';
//include 'atas/menu_atas.php';
//include 'z_tatasusunan.php';
$class1 = 'col-sm-6'; # untuk tajuk dan hantar
$class2 = 'col-sm-6'; # untuk $data
$aksi = null;

# include fail
include $this->template . '.php';
include $this->template2 . '.php';

# untuk debug
//echo '<pre>$carian='; print_r($this->carian); echo '</pre>';
//echo '<pre>$senarai='; print_r($this->senarai); echo '</pre>';
//echo '<pre>$medan='; print_r($this->medan); echo '</pre>';
echo '<pre>$_5p='; print_r($this->_5p); echo '</pre>';
/*$ulang = array('kodbanci','nosiri','F0002','F0014','F0015',
	'F2001','F2089','F2099');
foreach ($ulang as $key):
	echo "\n<h4>" . keteranganMedan($key,$this->medan) . '</h4>';
endforeach;//*/

include 'soalan_anggaran.php';
include 'atas/dibawah.php';

#--------------------------------------------------------------------------------------------
function formula01($myTable,$key,$data,$_5p)
{
	$buang01 = array('newss','nama','batch','form','kp','msic2008',
		'KodBanci','NoSiri','F0002','F0014','F0015');
	if (in_array($key,$buang01)):
		$papar = null;
	elseif($data == '0'):
		$papar = null;
	elseif($myTable == 'be2016_hasil_servis'):
		$jumlah = '1969435';
		$kiraan = $data / $jumlah;
		$papar = kiraPerpuluhan($kiraan, $perpuluhan = 2) . '%';
	elseif($myTable == 'be2016_belanja_servis'):
		$jumlah = '1969435';
		$kiraan = $data / $jumlah;
		$papar = kiraPerpuluhan($kiraan, $perpuluhan = 2) . '%';
	else:
		$jumlah = '1969435';
		$kiraan = $data / $jumlah;
		$papar = kiraPerpuluhan($kiraan, $perpuluhan = 2) . '%';
	endif;

	return $papar;
}
#--------------------------------------------------------------------------------------------
function paparInput01($myTable,$key,$data,$banyakMedan,$_5p)
{
	?><tr><?php
	?><td align="right"><?php echo keteranganMedan($key,$banyakMedan) ?></td><?php
	//$paparData = $html->tambahDropInput($this->_paparMedan, $this->_j2,
	//$myTable, $kira, $key, $data);
	/*?><td><?php echo $paparData . "\n\t" ?></td><?php*/
	?><td><?php echo $key ?></td><?php
	?><td><?php echo $data ?></td><?php
	?><td><?php echo formula01($myTable,$key,$data,$_5p) ?></td><?php
	?><td><?php echo $data ?></td><?php
	?><td><?php echo $data ?></td><?php
	?></tr><?php
}
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