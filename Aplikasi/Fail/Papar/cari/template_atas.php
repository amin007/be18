<?php
$carian = (!isset($this->cariID)) ? null : $this->cariID;
$cariBatch = (!isset($this->cariBatch)) ? null : $this->cariBatch;
$mencari = URL . 'batch/ubahBatchAwal/' . $cariBatch;
$cetakF3 = URL . 'laporan/cetakf3/' . $cariBatch;
$cetakF3semua = URL . 'laporan/cetakf3semua/' . $cariBatch . "/500";
$cetakF3mfg = URL . 'laporan/cetakf3mfg/' . $cariBatch . "/500";
$cetakF3ppt = URL . 'laporan/cetakf3ppt/' . $cariBatch . "/500"; ?>
<h3><a target="_blank" href="<?=$cetakF3semua?>">Cetak F3 Semua</a>
|<a target="_blank" href="<?=$cetakF3mfg?>">F3 MFG</a>
|<a target="_blank" href="<?=$cetakF3ppt?>">F3 PPT</a>
| Ubah BatchAwal : <?=$cariBatch?>
| <small>Nota: <?=$this->error?></small></h3>
<div align="center"><form method="GET" action="<?=$mencari?>" class="form-inline" autocomplete="off">
<div class="form-group"><div class="input-group">
	<input type="text" name="cari" class="form-control" autofocus
	id="inputString" onkeyup="lookup(this.value);" onblur="fill();">
	<span class="input-group-addon">
	<input type="submit" value="Kemaskini">
	</span>
</div></div>
<div class="suggestionsBox" id="suggestions" style="display: none; " >
	<div class="suggestionList" id="autoSuggestionsList">&nbsp;</div>
</div>
</form></div><br>
