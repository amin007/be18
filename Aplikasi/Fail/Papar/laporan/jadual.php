<?php
foreach ($this->senarai as $myTable => $row)
{
	if ( count($row)==0 ) echo '';
	else
	{
		$tajukjadual = $this->tajukjadual; ?>
<!-- div class="container" -->
<!-- Jadual <?php echo $myTable ?> ########################################### -->
<?php include 'pilih_jadual_am.php'; ?>
<?php //include 'pilih_jadual_am2.php'; ?>
<!-- Jadual <?php echo $myTable ?> ########################################### -->
<!-- / class="container-fluid" -->
<?php
	} // if ( count($row)==0 )
}
?>
