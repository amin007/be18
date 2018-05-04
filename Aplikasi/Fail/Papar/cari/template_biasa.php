<h1> Ini Template Biasa </h1>
<?php
foreach ($this->senarai as $myTable => $row)
{
	if ( count($row)==0 ) echo '';
	else
	{	echo "\n"; ?>
<!-- Jadual <?php echo $myTable ?> ########################################### -->
<?php include 'pilih_' . $pilihJadual . '.php'; ?>
<!-- Jadual <?php echo $myTable ?> ########################################### -->
<?php
	} // if ( count($row)==0 )
}
?>
