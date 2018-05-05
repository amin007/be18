<?php
$html = new \Aplikasi\Kitab\Html_Input;
$aksi = URL . 'biodata/ubahSimpan/' . $this->carian[0];
$class1 = 'col-sm-7'; # untuk tajuk dan hantar
$class2 = 'col-sm-6 '; # untuk $data ?>
<form method="POST" action="<?php echo $aksi ?>"
class="form-horizontal"><!-- class="form-inline" --><?php
$html->medanTajuk($myTable, $class1); 
for ($kira=0; $kira < count($row); $kira++)
{	foreach ( $row[$kira] as $key=>$data )
	{## papar data $row ------------------------------------------------
		?><div class="form-group"><?php echo "\n\t";
		?><label for="inputTajuk" class="col-sm-1 control-label"><?php echo $key 
		?></label><?php //echo "\n\t"; 
		/*?><div class="<?php echo $class2 ?>"><?php*/
		$paparData = $html->updateInput($class2, $myTable, $kira, $key, $data);
		echo $paparData . "\n";
		/*?></div><!-- / class="<?php echo $class ?>" --><?php*/
		?></div><!-- / class="form-group" --><?php
		echo "\n";
	}#-----------------------------------------------------------------
}#-----------------------------------------------------------------
$html->medanHantar($myTable, $class1); 
/*<!-- / class="container" -->*/ ?>
</form><!-- / class="form-horizontal" -->

