<?php
include 'atas/diatas.php';
//include 'atas/menu_atas.php';
include 'z_tatasusunan.php';
$class1 = 'col-sm-6'; # untuk tajuk dan hantar
$class2 = 'col-sm-6'; # untuk $data
$aksi = null;

# untuk debug
//echo '<pre>$carian='; print_r($this->carian); echo '</pre>';
//echo '<pre>$senarai='; print_r($this->senarai); echo '</pre>';

include $this->template . '.php';
include $this->template2 . '.php';
include 'atas/dibawah.php';

#--------------------------------------------------------------------------------------------
function formula01($key,$data)
{
	$buang01 = array('newss','nama','batch','form','kp','msic2008');
	if (in_array($key,$buang01)):
		$papar = null;
	elseif($data == '0'):
		$papar = null;
	else:
		$jumlah = '1969435';
		$kiraan = $data / $jumlah;
		$papar = kiraPerpuluhan($kiraan, $perpuluhan = 2) . '%';
	endif;

	return $papar;
}
#--------------------------------------------------------------------------------------------