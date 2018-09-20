	<table class="excel">
	<h3><?php echo $tajukjadual ?></h3>
	<thead><tr>
		<th>nama medan</th>
		<th>data</th>
		<th>peratusan</th>
		<th>anggar</th>
		<th>ubahsuai</th>
	</tr></thead>
	<?php
	for ($kira=0; $kira < count($row); $kira++)
	{## papar data $row ------------------------------------------------
	?><tbody><?php
		foreach ( $row[$kira] as $key=>$data )
		{
			echo ($data == '0') ? '' : "\n\t";
			?><tr><td align="right"><?php echo $key ?></td><?php
			//$paparData = $html->tambahDropInput($this->_paparMedan, $this->_j2,
			//$myTable, $kira, $key, $data);
			/*?><td><?php echo $paparData . "\n\t" ?></td><?php*/
			?><td><?php echo $data ?></td><?php
			?><td><?php echo formula01($key,$data) ?></td><?php
			?><td><?php echo $data ?></td><?php
			?><td><?php echo $data ?></td><?php
			?></tr><?php 
		}
		?></tbody>
	<?php
	}#-----------------------------------------------------------------
	?></table>

