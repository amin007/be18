<?php
include 'atas/diatas.php';
//include 'atas/menu_atas.php';
include 'z_tatasusunan.php';
$class1 = 'col-sm-6'; # untuk tajuk dan hantar
$class2 = 'col-sm-6'; # untuk $data
$aksi = null;
?><br><br>
<div><!-- class="container" --> 
<form method="POST" action="<?php echo $aksi ?>"
class="form-horizontal"><?php echo "\n";
?><div class="form-group row"><?php echo "\n\t";
foreach($ulangTajuk as $k => $d)
{	?><label for="inputTajuk" class="col-sm-2 control-label text-right"><?php
	echo $d ?></label><?php echo "\n\t";
}?></div><!-- / class="form-group" --><?php echo "\n";//*/

for ($kira=1; $kira < count($soalan4kp205); $kira++)
{
	foreach($soalan4kp205[$kira] as $key => $data)
	{## papar data $row ----------------------------------------------------------
		list($no,$medan,$angka) = explode('|',$data);
		?><div class="form-group row"><?php echo "\n\t";
		?><label for="inputTajuk" class="col-sm-2 control-label text-right"><?php
		echo $medan	?></label><?php echo "\n\t";
		?><div class="<?php echo $class2 ?>"><?php
			$paparData = "\n\t" . '<div class="input-group">'
			. "\n\t\t" . '<div class="input-group-prepend">'
			. "\n\t\t\t" . '<span class="input-group-text">' . $angka . '</span>'
			. "\n\t\t" . '</div>'
			. "\n\t\t" . '<input type="text" aria-label="First name" class="form-control">'
			. "\n\t\t" . '<input type="text" aria-label="Last name" class="form-control">'
			. "\n\t\t" . '<input type="text" aria-label="Last name" class="form-control">'
			. "\n\t" . '</div>';
			echo $paparData . "\n\t";
		?></div><!-- / class="<?php echo $class2 ?>" --><?php echo "\n";
		?></div><!-- / class="form-group" --><?php echo "\n";
	}## --------------------------------------------------------------------------
}## endfor
?>
</form><!-- / class="form-horizontal" -->
</div><!-- / class="container" -->
<?php
include 'atas/dibawah.php';
?>