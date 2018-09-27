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
echo papar3();
include 'atas/dibawah.php';

#-------------------------------------------------------------------------------------
function debug($nama,$c1)
{
	//echo '<pre>$this->nama=' . $nama .'</pre>';
	//echo '<pre>$this->c1=' . $c1 .'</pre>';
	echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
}
#-------------------------------------------------------------------------------------
function pautan()
{/*
	$p[] = '<form target="_blank" method="POST" action="' . URL . 'borang/cariapa">';
	foreach():
		$p[] = '<input type="hidden" name="" value="">';
	endforeach;
	$p[] = '<h2><a href="javascript:document.forms[0].submit()"'
	. ' class="btn btn-outline-dark">Ubah3</a></h2>';
	//*/
}
#-------------------------------------------------------------------------------------
function kp()
{
	$kp = array (
		array (
		'form' => '<form target="_blank" method="POST" action="suku/bst/">',
		'nama' => 'BST - Penyiasatan Bahan Binaan',
		'input' => '<input type="hidden" name="suku" value="bst">'
		),array (
		'form' => '<form target="_blank" method="POST" action="suku/pan09/">',
		'nama' => 'PAN09 - Penyiasatan Akaun Negara',
		'input' => '<input type="hidden" name="suku" value="pan">',
		),array (
		'form' => '<form target="_blank" method="POST" action="suku/bts/">',
		'nama' => 'BTS - Penyiasatan Kecenderungan Perniagaan',
		'input' => '<input type="hidden" name="suku" value="bts">',
		),array (
		'form' => '<form target="_blank" method="POST" action="suku/qss12/">',
		'nama' => 'QSS - Penyiasatan Perkhidmatan Suku Tahunan',
		'input' => '<input type="hidden" name="suku" value="qss">',
		)
	);

	return $kp;
}
#-------------------------------------------------------------------------------------
function papar3()
{
	$isi = '<div align="left"><table>';
	foreach (kp() as $key => $jenis):
		$isi .= "\n\t" . '<tr><td class="kotak">'
			 . "\n\t\t" . $jenis['form']
			 . "\n\t\t" . $jenis['input']
			 . "\n\t\t" . '<h2><a href="javascript:document.forms['
			 . $key . '].submit()" class="btn btn-outline-dark">'
			 . "\n\t\t" . $jenis['nama'] . '</a></h2>'
			 . "\n\t\t</form>"
			 . "\n\t</td></tr>\r";
	endforeach;
	$isi .= '</table></div>' . "\r";
	return $isi;
}
#-------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------;