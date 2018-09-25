<?php
include 'atas/diatas.php';
include 'atas/menu_atas.php';
$mencari = $this->pautan;
$mesej = '';
$carian = $this->idBorang;
?>
<div class="container">
<form method="POST" action="<?=$mencari;?>" class="form-inline" autocomplete="off">
<div class="form-group">
	<label for="carian"><h1>Mahu cari apa? <?=$mesej?></h1></label>
	<div class="input-group">
		<input type="text" name="cari" value="<?=$carian;?>"
		class="form-control" id="inputString"
		onkeyup="lookup(this.value);" onblur="fill();">
		<span class="input-group-addon"><input type="submit" value="mencari"></span>
	</div>
</div>
<div class="suggestionsBox" id="suggestions" style="display: none;">
	<div class="suggestionList" id="autoSuggestionsList">&nbsp;</div>
</div>
</form></div><br>
<?php
include 'atas/dibawah.php';
?>