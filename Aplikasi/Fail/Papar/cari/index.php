<?php
# pilih paparan ke bawah atau melintang
//$pilihJadual = 'jadual_operasi';
$pilihJadual = 'jadual_am';
//$pilihJadual = 'ubah_medan01';
//$pilihJadual = 'ubah_medan02';

# untuk kod lama
/*echo '<pre>$primaryKey='; print_r($this->primaryKey); echo '</pre>';
echo '<pre>$carian='; print_r($this->carian[0]); echo '</pre>';
echo '<pre>$cariID='; print_r($this->$cariID); echo '</pre>';*/
//include 'papar_jadual_berulang_mudah.php';

# untuk kod baru
echo '<pre>$carian='; print_r($this->carian); echo '</pre>';
//echo '<pre>$senarai='; print_r($this->senarai); echo '</pre>';

# jenis template
include 'template_' . $this->template . '.php';
