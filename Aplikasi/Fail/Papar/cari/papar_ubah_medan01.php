	<table border="1" class="excel" id="example">
	<?php
	for ($kira=0; $kira < count($row); $kira++)
	{## papar data $row ------------------------------------------------
	?><tbody><?php
		$html = new \Aplikasi\Kitab\Html_Input;
		foreach ( $row[$kira] as $key=>$data )
		{
			?><tr><td><?php echo $key ?></td><?php
			$paparData = $html->updateInput($myTable, $kira, $key, $data)
			?><td><?php echo $paparData . "\n\t"
			?></td></tr><?php
		} 
		?></tbody>
	<?php
	}#-----------------------------------------------------------------
	?></table>
