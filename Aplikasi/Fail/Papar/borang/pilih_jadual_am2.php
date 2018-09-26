	<table><tr><td>
	<table class="excel">
	<h3><?php echo $tajukjadual ?></h3>
	<thead><tr><th>keterangan</th><th>nama medan</th><th>data</th><th>peratusan</th>
		<th>anggar puluh</th>
		<th>anggar fix</th>
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
			elseif(in_array($key,$buang01)):
				echo '';
			else:
				paparInput01($myTable,$key,$data,$this->medan,$this->_5p);
			endif;
		}
		?></tbody>
	<?php
	}#----------------------------------------------------------------------
	?></table>
	</td>
	<td><pre><?php echo '$_5p='; print_r($this->_5p); ?></pre></td>
	</tr></table>
