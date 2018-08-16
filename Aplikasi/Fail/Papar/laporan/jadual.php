<?php
foreach ($this->senarai as $myTable => $row)
{
	if ( count($row)==0 ) echo '';
	else
	{
		$tajukjadual = $this->tajukjadual; ?>
<!-- Jadual <?php echo $myTable ?> ########################################### -->
<?php include 'pilih_jadual_am.php'; ?>
<!-- Jadual <?php echo $myTable ?> ########################################### -->
<?php
	} // if ( count($row)==0 )
}
?>
