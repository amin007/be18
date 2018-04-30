<?php 
foreach ($this->senarai as $myTable => $row)
{
	if ( count($row)==0 ) echo '';
	else
	{	echo "\n"; ?>
<hr><h2>Jadual <?php echo $myTable ?></h2>
<!-- Jadual <?php echo $myTable ?> ########################################### -->
<?php include 'papar_jadual_operasi.php'; ?>
<!-- Jadual <?php echo $myTable ?> ########################################### -->
<?php
	} // if ( count($row)==0 )
}
?>
