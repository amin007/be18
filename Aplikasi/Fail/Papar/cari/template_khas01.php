<?php
$html = new Aplikasi\Kitab\Borang02_Ubah;
$aksi = URL . $this->_method . '/tambahSimpan/' . $this->carian[0];
$class1 = 'col-sm-7'; # untuk tajuk dan hantar
$class2 = 'col-sm-6 '; # untuk $data
$html->medanCarian(
	array($this->_method, null, null, null, null)
);?>
<!-- h1> Ini Template Khas01 </h1 -->
<form method="POST" action="<?php echo $aksi ?>">
<table class="table">
<tr><td colspan="1">
	<input class="form-control" type="text" name="medanID" value="<?php echo $this->medanID ?>">
	<input class="form-control" type="text" name="cariID" value="<?php echo $this->cariID ?>">
	<?php $html->medanHantar(null, $class1); ?>
</td></tr>
<tr>
<?php
foreach ($this->senarai as $myTable => $row)
{
	if ( count($row)==0 ) echo '';
	else
	{
		$tajukjadual = '<span class="badge badge-success">' . $myTable . '</span>'
		. "\r" . '<span class="badge">' . count($row) . '</span>';
		echo "\n<td>" . $tajukjadual . "\n"; ?>
	<!-- Jadual <?php echo $myTable ?> ########################################### -->
<?php include 'pilih_' . $pilihJadual . '.php'; ?>
	<!-- Jadual <?php echo $myTable ?> ########################################### -->
<?php	echo "\n</td>";
	} // if ( count($row)==0 )
}
?>
</tr>
</table>
</form>