	<table class="excel">
	<h3><?php echo $tajukjadual ?></h3>
	<thead><tr>
		<th>keterangan</th>
		<th>nama medan</th>
		<th>data</th>
		<th>peratusan</th>
		<th>anggar</th>
		<th>ubahsuai</th>
	</tr></thead>
	<?php
	for ($kira=0; $kira < count($row); $kira++)
	{## papar data $row -----------------------------------------------------
	?><tbody><?php
		foreach ( $row[$kira] as $key=>$data )
		{
			if($data == '0' or $data == NULL):
				echo '';
			else:
				paparInput01($myTable,$key,$data,$this->medan,$this->_5p);
			endif;
		}
		?></tbody>
	<?php
	}#----------------------------------------------------------------------
	?></table>
