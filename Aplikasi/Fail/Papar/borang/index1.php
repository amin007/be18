<?php
include 'atas/diatas.php';
//include 'atas/menu_atas.php';
include 'z_tatasusunan.php';
$class1 = 'col-sm-6'; # untuk tajuk dan hantar
$class2 = 'col-sm-6'; # untuk $data
$aksi = null;

# pilih paparan ke bawah atau melintang
//$pilihJadual = 'jadual_am';
$pilihJadual = 'jadual_am2'; # ubah suai data
//$pilihJadual = 'ubah_medan01'; # borang biodata berasaskan table
//$pilihJadual = 'ubah_medan02'; # borang ubah berasaskan bootstrap

# untuk kod baru
//echo '<pre>$carian='; print_r($this->carian); echo '</pre>';
//echo '<pre>$senarai='; print_r($this->senarai); echo '</pre>';

include $this->template . '.php';
debug($this->nama,$this->c1);
pautan();
include 'atas/dibawah.php';

#-------------------------------------------------------------------------------------
function debug($nama,$c1)
{
	echo '<pre>$this->nama=' . $nama .'</pre>';
	echo '<pre>$this->c1=' . $c1 .'</pre>';
	echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
}
#-------------------------------------------------------------------------------------
function pautan()
{
	$p[] = '<form target="_blank" method="POST" action="suku/bst/">';
	$p[] = '<input type="hidden" name="suku" value="bst">';
	$p[] = '<h2><a href="javascript:document.forms[0].submit()">'
	. 'BST - Penyiasatan Bahan Binaan</a></h2>';
}
#-------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------;