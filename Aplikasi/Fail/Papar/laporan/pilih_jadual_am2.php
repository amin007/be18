	<table class="table table-bordered table-striped table-hover">
	<?php echo '<h3>'. $tajukjadual . '</h3>';
	$printed_headers = false; # mula bina jadual
	#-----------------------------------------------------------------
	for ($kira=0; $kira < count($row); $kira++)
	{
		if ( !$printed_headers ) # papar tajuk medan sekali sahaja:
		{
			?><thead><tr><th>#</th><?php
			foreach ( array_keys($row[$kira]) as $tajuk )
			{
				?><th><?php echo $tajuk ?></th><?php
			}
			?></tr></thead>
	<?php	$printed_headers = true;
		}
	# papar data $row ------------------------------------------------
	?><tr><td align="center"><?php echo $kira+1 ?></td><?php
		$html = new \Aplikasi\Kitab\Html_TD;
		foreach ( $row[$kira] as $key=>$data )
		{
			$data = ($data == '0') ? '&nbsp;':$data;
			$data = ($data == null) ? 'Jumlah:':$data;
			$html->paparURL($key, $data, $myTable,
			$this->c1, $this->c2);
		}
		?></tr>
	<?php
	}#-----------------------------------------------------------------
	?></table>