<?php
# pilih paparan ke bawah atau melintang
//$pilihJadual = 'jadual_operasi';
//$pilihJadual = 'jadual_am';
//$pilihJadual = 'ubah_medan01'; # borang biodata berasaskan table
//$pilihJadual = 'ubah_medan02'; # borang biodata berasaskan bootstrap
$pilihJadual = 'ubah_medan03'; # borang kawalan berasaskan bootstrap

# untuk kod lama
/*echo '<pre>$primaryKey='; print_r($this->primaryKey); echo '</pre>';
echo '<pre>$carian='; print_r($this->carian); echo '</pre>';
echo '<pre>$cariID='; print_r($this->$cariID); echo '</pre>';//*/
//include 'papar_jadual_berulang_mudah.php';

# untuk kod baru
//echo '<pre>$carian='; print_r($this->carian); echo '</pre>';
//echo '<pre>$senarai='; print_r($this->senarai); echo '</pre>';
//echo '<pre>$_cariIndustri='; print_r($this->_cariIndustri); echo '</pre>';

# papar hasil carian
$cari1 = '&nbsp;|&nbsp;'; $cari2 = '';
foreach ($this->carian as $kunci => $nilai)
	$cari1 .= ( count($nilai)==0 ) ? $nilai : $nilai . ' | ';
foreach ($this->senarai as $kunci2 => $nilai2)
	$cari2 .= ( count($nilai2)==0 ) ? $kunci2 . " = Kosong<br>\r"
	: $kunci2 . ' = ' . count($nilai2) . "<br>\r";
echo "Anda mencari = $cari1\r<br>$cari2\r<hr>";

# jenis template
include 'template_' . $this->template . '.php';
