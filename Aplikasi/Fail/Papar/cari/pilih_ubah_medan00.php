<?php
$html = new Aplikasi\Kitab\Borang02_Ubah;
$aksi = URL . $this->_method . '/tambahSimpan/' . $this->carian[0];
$class1 = 'col-sm-7'; # untuk tajuk dan hantar
$class2 = 'col-sm-6 '; # untuk $data
$html->medanCarian(
	array($this->_method, $myTable, $this->senarai, $this->cariID, null)
);?>

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
			?><td><?php echo $paparData . "\n\t" ?></td><?php
			?><td><?php echo $data ?></td><?php
			?></tr><?php
		}
		?></tbody>
	<?php
	}#-----------------------------------------------------------------
	?></table>
