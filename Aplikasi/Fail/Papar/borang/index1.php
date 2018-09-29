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
//debug($this->dataID,$this->nama,$this->c1,$this->c2);
$borang = pautanServis($this->dataID,$this->nama,$this->c1,$this->c2);
# pautan() sesuai untuk Chrome sahaja, firefox tak jalan
$papar = implode("\n",$borang);
//echo "\n<hr>Pautan<hr>\n<pre>" . htmlentities($papar) . '</pre>';
echo "\n<hr>" . ($papar);
include 'atas/dibawah.php';

#-------------------------------------------------------------------------------------
function debug($dataID,$nama,$c1,$c2)
{
	echo '<br>$this->nama=' . $nama;
	echo '<br>$this->c1=' . $c1;
	echo '<br>$this->c1=' . $c2;
	//echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
}
#-------------------------------------------------------------------------------------
function pautanServis($dataID,$nama,$kp,$c2)
{
	$p[] = '<form method="POST" action="' . URL . 'borang/cariapa/'
	. $kp . '/' . $dataID . '/' . $c2 . '">';//target="_blank"
	foreach($_POST['semasa'] as $key => $data):
		$data = ($data == null) ? '0' : $data;
		$data = ($key == 'kp') ? $kp : $data;
		$data = ($key == 'nosiri') ? $dataID : $data;
		$data = ($key == 'nama') ? $nama : $data;
		$p[] = '<input type="hidden" name="' . $key . '" value="' . $data . '">';
	endforeach;
	//$p[] = '<h2><a href="javascript:document.forms[0].submit()"'
	//. ' target="_blank" class="btn btn-outline-dark">Klik sini</a></h2>';
	$p[] = '<input type="submit" value="Untuk Servis"'
	. 'class="btn btn-primary btn-large">';
	$p[] = '</form>';

	return $p;
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