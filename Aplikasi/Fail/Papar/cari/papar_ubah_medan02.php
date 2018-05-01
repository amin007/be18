<form class="form-horizontal"><!-- form class="form-inline" -->
<?php
$html = new \Aplikasi\Kitab\Html_Input;
$html->medanTajuk($myTable, $class = 'col-sm-7');
$class = 'col-sm-6 '; # untuk $data
for ($kira=0; $kira < count($row); $kira++)
{## papar data $row ------------------------------------------------
	foreach ( $row[$kira] as $key=>$data )
	{
		?><div class="form-group"><?php echo "\n\t";
		?><label for="inputTajuk" class="col-sm-1 control-label"><?php echo $key 
		?></label><?php //echo "\n\t"; 
		/*?><div class="<?php echo $class ?>"><?php*/
		$paparData = $html->updateInput($class, $myTable, $kira, $key, $data);
		echo $paparData . "\n";
		/*?></div><!-- / class="<?php echo $class ?>" --><?php*/
		?></div><!-- / class="form-group" --><?php
		echo "\n";
	} 
}#-----------------------------------------------------------------
//include 'z_medan02_hantar.php'; ?>
</form><!-- / class="form-horizontal" -->
<!-- / class="container" -->
