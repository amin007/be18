<?php
include 'atas/diatas.php';
include 'atas/menu_atas.php';
$mencari = $this->pautan;
$carian = $this->idBorang;
$mesej = null;
?>
<div class="container">
<!-- form method="POST" action="" class="form-inline" autocomplete="off" -->
<form method="POST" action="<?=$mencari?>" autocomplete="off">
<!-- --------------------------------------------------------------------------------------------------- -->
<label for="carian"><h1>Mahu Industri apa?
<?=$mesej?></h1></label>
<!-- --------------------------------------------------------------------------------------------------- -->
<div class="input-group">
	<input type="text" name="cariIndustri" value="<?=$carian?>"
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
	<input type="text" class="form-control" name="semasa[nisbah]" value="<?=$nisbah?>" placeholder="<?=$nisbah?>">
	<div class="input-group-prepend"><span class="input-group-text">Peratus</span></div>
	<input type="text" class="form-control" name="semasa[peratus]" value="<?=$peratus?>" placeholder="<?=$peratus?>">
</div>
<!-- --------------------------------------------------------------------------------------------------- --><?php
$ulang = array('kp'=>null,'nosiri'=>null,'nama'=>'Biarlah Rahsia');
foreach($ulang as $kunci => $isiApa):?>
<div class="input-group">
	<div class="input-group-prepend">
		<span class="input-group-text"><?=$kunci?></span>
	</div>
	<input type="text" class="form-control" name="semasa[<?=$kunci?>]" placeholder="<?=$isiApa?>">
</div>
<!-- --------------------------------------------------------------------------------------------------- --><?php
endforeach;

$ulang = array('hasil','belanja','gaji','susut','aset','asetsewa');
foreach($ulang as $medanApa):?>
<div class="input-group">
	<div class="input-group-prepend"><span class="input-group-text"><?=$medanApa?> kini</span></div>
	<input type="text" class="form-control" name="semasa[<?=$medanApa?>_kini]">
</div>
<!-- --------------------------------------------------------------------------------------------------- -->
<?php endforeach; ?>
<div class="input-group">
	<div class="input-group-prepend"><span class="input-group-text">Catatan</span></div>
	<textarea class="form-control" name="semasa[catatan]"><?php echo $nota ?></textarea>
	<div class="input-group-prepend"><span class="input-group-text">
		Papar Semua Nilai<select class="form-control" name="semasa[paparNilai]">
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
	$pecah = explode('/', $pautan); //echo '<pre>'; print_r($pecah); echo '</pre>';
	$peratus = $pecah[10]; # 10->peratus
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
