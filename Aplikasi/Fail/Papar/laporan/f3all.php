<?php
include 'diatas.php';
	$pegawai = dpt_senarai('operasi'); // kumpul nama fe
	$kp = isset($this->kp) ? $this->kp : null;
	$namaOrg['penyelia'] = 'Abdul Razak';
	$namaOrg['pegawai'] = $this->fe;
	if (count($this->senarai)==0):
		$fields = null; 
		  $rows = null; 
		 $hasil = null; 
	else:
		$fields = count($this->senarai[0]); 
		  $rows = count($this->senarai); 
		 $hasil = $this->senarai;
	endif;
	$item = isset($this->item) ? $this->item : 30;
	$baris = isset($this->baris) ? $this->baris : 30;
	$ms = isset($this->ms) ? $this->ms : 1;
	$hasil = $this->senarai;
	$tajukRespon = array();
	/*# semak data
	echo '<pre>$hasilLaporan:'; print_r($this->senarai) . '</pre>';
	echo '<br>$baris:' . $rows . '|' . count($this->senarai) . '<br>';
	echo '<br>$lajur:' . $fields . '|' . count($this->senarai[0]) . '<br>';
	echo '<br>$kp:' . $kp . '<br>'; //*/

if (count($this->senarai) == 0):
	echo 'Tiada data';
else:
	$jadual = new Aplikasi\Kitab\Perangkaan;
	echo "\n"; //echo "item $item | baris $baris | ms $ms | kodsv $kodsv \n";
	?><table border="1" class="excel" width="100%" height="100%"><?php echo "\n";
	$jadual->paparJadualF3_Data($kp,$namaOrg,$rows,$fields,$hasil,$item,$ms,$baris);
	//$jadual->paparJadualF3_TajukBawah($rows,$fields);
	echo "\n";
	?></table><?php 
endif;
echo "\n"; ?>
</body>
</html>