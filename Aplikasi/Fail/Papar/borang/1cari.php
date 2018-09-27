<?php
include 'atas/diatas.php';
include 'atas/menu_atas.php';
$mencari = $this->pautan;
$carian = $this->idBorang;
?>
<div class="container">
<!-- form method="POST" action="" class="form-inline" autocomplete="off" -->
<form method="POST" action="<?=$mencari?>" autocomplete="off">
<!-- --------------------------------------------------------------------------------------------------- -->
<label for="carian"><h1>Mahu cari apa? <?=$mencari?></h1></label>
<div class="input-group">
	<input type="text" name="cari" value="<?=$carian?>"
	class="form-control" id="inputString"
	onkeyup="lookup(this.value);" onblur="fill();">
	<span class="input-group-prepend"><input type="submit" value="mencari"></span>
</div>
<div class="input-group">
	<div class="input-group-prepend">
		<span class="input-group-text">Senarai Syarikat</span>
	</div>
	<div class="suggestionsBox" id="suggestions" style="display: none;">
		<div class="suggestionList" id="autoSuggestionsList">&nbsp;</div>
	</div>
</div>
<!-- --------------------------------------------------------------------------------------------------- --><?php
list($peratus,$nisbah,$nota) = nisbahperatusan($this->pautan);?>
<div class="input-group">
	<div class="input-group-prepend"><span class="input-group-text">Nisbah</span></div>
	<input type="text" name="semasa[nisbah]" class="form-control" placeholder="<?=$nisbah?>">
	<div class="input-group-prepend"><span class="input-group-text">Peratus</span></div>
	<input type="text" name="semasa[peratus]" class="form-control" placeholder="<?=$peratus?>">
</div>
<!-- --------------------------------------------------------------------------------------------------- --><?php
$pecah = explode('/', $this->pautan);
//echo '<pre>'; print_r($pecah); echo '</pre>';

$ulang = array('Nisbah &amp; Peratus'=>$pecah[10],'kp'=>null,
'newss'=>'Kod007JamesBond','nama'=>'Biarlah Rahsia');
foreach($ulang as $kunci => $isiApa):?>
<div class="input-group">
	<div class="input-group-prepend">
		<span class="input-group-text"><?=$kunci?></span>
	</div>
	<input type="text" name="semasa[<?=$kunci?>]" class="form-control" placeholder="<?=$isiApa?>">
</div>
<!-- --------------------------------------------------------------------------------------------------- --><?php
endforeach;

$ulang = array('hasil','belanja','gaji','susut','aset','asetsewa');
foreach($ulang as $medanApa):?>
<div class="input-group">
	<div class="input-group-prepend"><span class="input-group-text"><?=$medanApa?> dulu</span></div>
	<input type="text" name="semasa[<?=$medanApa?>]" class="form-control">
	<div class="input-group-prepend"><span class="input-group-text"><?=$medanApa?> kini</span></div>
	<input type="text" name="semasa[<?=$medanApa?>_kini]" class="form-control">
</div>
<!-- --------------------------------------------------------------------------------------------------- -->
<?php endforeach; ?>
<div class="input-group">
	<div class="input-group-prepend"><span class="input-group-text">Catatan</span></div>
	<textarea name="semasa[catatan]" class="form-control" aria-label="With textarea"></textarea>
	<div class="input-group-prepend"><span class="input-group-text">
		Papar Semua Nilai<select name="paparNilai" class="form-control">
		<option>Ya</option><option>Tidak</option></select>
	</span></div>
</div>
<!-- --------------------------------------------------------------------------------------------------- -->
</form></div><br>

<?php
include 'atas/dibawah.php';

#----------------------------------------------------------------------------------------------------
function nisbahperatusan($pautan)
{
	$pecah = explode('/', $pautan); //echo '<pre>'; print_r($pecah); echo '</pre>'; # 10->peratus
	//$peratus = $pecah[10];
	$peratus = 0;
	$nisbah = ($peratus!=null) ? ($peratus)/100 : rand(-30, 30)/100;
	//$nisbah = rand(-30, 30)/100;
	$nisbah = 1 + $nisbah;

	if ($peratus==0):
		$nota = 'nisbah=' . $nisbah . ' diberi boleh komputer';
	else:
		$nota = 'nisbah=' . $nisbah . ' dan peratus=' . $peratus . '%';
	endif;

	return array($peratus,$nisbah,$nota);
}
#----------------------------------------------------------------------------------------------------