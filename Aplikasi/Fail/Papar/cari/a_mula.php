<pre><?php
//echo '$this->senarai:'; print_r($this->senarai);
/*array(
    [0] => array ([Field] => msic)
    [1] => array ([Field] => keterangan)
)*/
# Memilih nama medan dalam jadual berkenaan
$pilihMedan = null;
foreach ($this->senarai as $key => $row)
{// mula ulang $row
	$pilihMedan .= '<option>' . $row['Field'] . '</option>';
}// tamat ulang $row
echo '$this->url:'; print_r($this->url); # semak url

$url = $this->url;
$class  = isset($url[0]) ? $url[0] : null;
$method = isset($url[1]) ? $url[1] : null;
$jadual = isset($url[2]) ? $url[2] : 'entah';
$ulang  = isset($url[3]) ? $url[3] : 1;
# untuk gambar icon
$icon['Remove'] = '<span class="glyphicon glyphicon-remove"></span>';
$icon['Star'] = '<span class="glyphicon glyphicon-star"></span>';
$icon['Ok'] = '<span class="glyphicon glyphicon-ok"></span>';
$icon['Check'] = '<span class="glyphicon glyphicon-check"></span>';
$icon['Unchecked'] = '<span class="glyphicon glyphicon-unchecked"></span>';
$saizLabel = 4;
$saizInput = 5;
// <label for="inputJadual" class="col-sm-5 control-label">Jadual</label>
?></pre>
<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
<form class="form-horizontal" method="POST" action="<?php echo URL ?>cari/pada/300/1">
<hr>
<div class="form-group has-warning has-feedback">
	<label for="input" class="col-sm-1 control-label">&nbsp;</label>
	<div class="col-sm-<?php echo $saizLabel?>">
		<div class="input-group">
			<span class="input-group-addon">&nbsp;</span>
			<select name="namajadual" class="form-control">
			<option><?php echo $jadual ?></option></select>
			<span class="input-group-addon">Jadual</span>
		</div><!-- class="input-group" -->
	</div>
	<div class="col-sm-<?php echo $saizInput?>">
		<div class="input-group">
			<label class="form-control">Carian/Fix/(AntaraKurungan)</label>
		</div>
	</div>
</div>
<!-- =============================================================================== -->
<?php
$u = 1;
	$paparJika = ''; //echo $paparJika;
	$linkTambah = URL . "$class/$method/$jadual/" . ($u+1);
	$pilihU = '<a href="' . $linkTambah . '">+</a> '
			. ' Pilih[' . $u . ']:';
?>
<div class="form-group has-success has-feedback">
	<label for="input" class="col-sm-1 control-label">&nbsp;</label>
	<div class="col-sm-<?php echo $saizLabel?>">
		<div class="input-group">
			<span class="input-group-addon"><?php echo $paparJika?>Medan</span>
			<input type="hidden" name="jika[atau][1]" value="WHERE">
			<select name="jika[pilih][<?php echo $u?>]" class="form-control">
			<?php echo $pilihMedan; ?></select>
			<span class="input-group-addon"></span>
		</div><!-- class="input-group" -->
	</div>
	<div class="col-sm-<?php echo $saizInput?>">
		<div class="input-group">
			<span class="input-group-addon">
				<input type="checkbox" name="jika[fix][<?php echo $u?>]" value="x">
				<?php echo '&nbsp;' . $pilihU ?>
			</span>
			<input type="text" name="jika[cari][<?php echo $u?>]" class="form-control">
		</div><!-- class="input-group" -->
	</div><!-- class="col-sm-5" -->
</div><!-- class="form-group" -->
<!-- =============================================================================== -->
<?php
# buat array or/and/in dalam sql
//$jikalau = array('atau' => 'or', 'dan' => 'and','dalam' => 'in');
$jikalau = array('atau' => 'OR', 'dan' => 'AND');

//$ulang = 6;
for ( $u = 2 ; $u <= $ulang ; $u++ )
{
	$jika = null;
	//<input type="radio" name="atau[$u]" value="or">atau
	foreach ($jikalau as $kunci => $isian)
	{// mula ulang $jikalau
		# memilih or/and/in dalam sql
		$jika .= '<input type="radio" name="jika[atau][' 
			. $u . ']" value="' . $isian . '" >' . $kunci
			. "\r\t\t";
	}// tamat ulang $jikalau
	//$paparJika = '<span class="label label-info">' . $jika . '</span>';
	$paparJika = $jika; //echo $paparJika;
	$linkTambah = URL . "$class/$method/$jadual/" . ($u+1);
	$linkBuang = URL . "$class/$method/$jadual/" . ($u-1);
	$pilihU = '<a href="' . $linkTambah . '">+</a> '
			. '<a href="' . $linkBuang . '">-</a> '
			. ' Pilih[' . $u . ']:';
?>
<div class="form-group has-success has-feedback">
	<label for="input" class="col-sm-1 control-label">&nbsp;</label>
	<div class="col-sm-<?php echo $saizLabel?>">
		<div class="input-group">
			<span class="input-group-addon"><?php echo $paparJika?></span>
			<select name="jika[pilih][<?php echo $u?>]" class="form-control">
			<?php echo $pilihMedan; ?></select>
			<span class="input-group-addon">&nbsp;</span>
		</div><!-- class="input-group" -->
	</div>
	<div class="col-sm-<?php echo $saizInput?>">
		<div class="input-group">
			<span class="input-group-addon">
				<input type="checkbox" name="jika[fix][<?php echo $u?>]" value="x">
				<?php echo $pilihU ?>
			</span>
			<input type="text" name="jika[cari][<?php echo $u?>]" class="form-control">
			<span class="input-group-addon">
				<input type="radio" name="mula[<?php echo $u?>]" value="(">(
				<input type="radio" name="tmt[<?php echo $u?>]" value=")">)
			</span>
		</div><!-- class="input-group" -->
	</div><!-- class="col-sm-5" -->
</div><!-- class="form-group" -->

<?php
} // for ( $u = 2 ; $u <= $ulang ; $u++ )
?>
<!-- =============================================================================== -->
<div class="form-group has-error has-feedback">
	<label for="input" class="col-sm-1 control-label">&nbsp;</label>
	<div class="col-sm-<?php echo $saizLabel?>">
		<div class="input-group">
			<span class="input-group-addon">
				<input type="radio" name="ikut">ASC
				<input type="radio" name="ikut" value="DESC">DESC
				<br><br>LIMIT
			</span>
			<select class="form-control">
			<!-- select name="susun" class="form-control" -->
			<?php echo $pilihMedan; ?></select>
			<input type="text" name="max" value="300" class="form-control">
			<span class="input-group-addon"></span>
		</div><!-- class="input-group" -->
	</div>
	<div class="col-sm-<?php echo $saizInput?>">
		<div class="input-group">
			<input type="submit" name="carian" value="cari <?php echo $jadual ?>" class="btn btn-primary btn-large">
			<input type="reset" name="kosong" value="kosong" class="btn btn-warning btn-large">
		</div>
	</div>
</div>
<!-- =============================================================================== -->
</form>