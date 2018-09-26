	<table class="excel">
	<?php
	for ($kira=0; $kira < count($row); $kira++)
	{## papar data $row ------------------------------------------------
	?><tbody><?php
		foreach ( $row[$kira] as $key=>$data )
		{
			?><tr><td align="right"><?php echo $key ?></td><?php
			$paparData = $html->tambahDropInput($this->_paparMedan, $this->_j2,
			$myTable, $kira, $key, $data);
			?><td><?php echo $paparData ?></td><?php
			?><td><?php echo $data ?></td><?php
			?></tr><?php echo "\n\t";
		}
		?></tbody>
	<?php
	}#-----------------------------------------------------------------
	?></table>
