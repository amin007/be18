<?php
$senaraiStaf = dtr_senarai('operasi'); //echo '<pre>$senaraiStaf->'; print_r($senaraiStaf) . '</pre>';
$urlStaf = $target = null; //$target = ' target="_blank"';
foreach ($senaraiStaf as $namaStaf):
	$urlStaf .=  "\r | " . '<a' . $target . ' href="' . URL .'operasi/batch/' . $namaStaf . '">'
			 .  $namaStaf . '</a>';
endforeach;

$html = new Aplikasi\Kitab\Borang03_Batch;
if (($this->namaPegawai == null)):
	list($namaPegawai,$cariBatch,$notaTambahan,$mencari,$butangHantar)
		= pautan01($this->namaPegawai, $this->noBatch, $urlStaf);
elseif (($this->namaPegawai != null) && ($this->noBatch == null)):
	list($namaPegawai,$cariBatch,$notaTambahan,$mencari,$butangHantar)
		= pautan02($this->namaPegawai, $this->noBatch, $urlStaf);
elseif (($this->namaPegawai != null) && ($this->noBatch != null)
	&& ($this->error == 'Kosong') ):
	list($namaPegawai,$cariBatch,$notaTambahan,$mencari,$butangHantar)
		= pautan03($this->namaPegawai, $this->noBatch, $urlStaf);
else:
	list($namaPegawai,$cariBatch,$notaTambahan,$mencari,$butangHantar)
		= pautan04($this->namaPegawai, $this->noBatch, $urlStaf);
endif; ?>
<div class="container"><?php echo (!isset($cetak)) ? null : "\r$cetak" ?>
	<h1><?=$notaTambahan?></h1>

	<div align="center"><form method="GET" action="<?=$mencari?>" class="form-inline" autocomplete="off">
	<?php //echo $mencari . '<br>' . "\r" ?>
	<div class="form-group"><div class="input-group">
		<input type="text" name="cari" class="form-control" autofocus
		placeholder="Contoh : 000000123456"
		id="inputString" onkeyup="lookup(this.value);" onblur="fill();">
		<span class="input-group-addon">
		<input type="submit" value="<?=$butangHantar?>">
		</span>
	</div></div>
	<div class="suggestionsBox" id="suggestions" style="display: none; " >
		<div class="suggestionList" id="autoSuggestionsList">&nbsp;</div>
	</div>
	</form></div><br>

</div><!-- / class="container" -->
