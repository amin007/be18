	<table border="1" class="excel" id="example">
	<?php
	for ($kira=0; $kira < count($row); $kira++)
	{## papar data $row ------------------------------------------------
	?><tbody><?php
		//$html = new \Aplikasi\Kitab\Html_TD;
		foreach ( $row[$kira] as $key=>$data )
		{
			?><tr><?php
			?><td><?php echo $key ?></td><?php
			?><td><?php echo $data ?></td><?php
			?></tr><?php
		} 
		?></tbody>
	<?php
	}#-----------------------------------------------------------------
	?>
	</table>
