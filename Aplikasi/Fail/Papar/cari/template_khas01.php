<!-- h1> Ini Template Khas01 </h1 -->
<table class="table">
<tr>
<?php
foreach ($this->senarai as $myTable => $row)
{
	if ( count($row)==0 ) echo '';
	else
	{
		$tajukjadual = '<span class="badge badge-success">' . $myTable . '</span>'
		. "\r" . '<span class="badge">' . count($row) . '</span>';
		echo "\n<td>"; ?>
<!-- Jadual <?php echo $myTable ?> ########################################### -->
<?php include 'pilih_' . $pilihJadual . '.php'; ?>
<!-- Jadual <?php echo $myTable ?> ########################################### -->
<?php	echo "\n</td>";
	} // if ( count($row)==0 )
}
?>
</tr>
</table>