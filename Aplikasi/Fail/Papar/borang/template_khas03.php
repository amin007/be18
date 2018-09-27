<!-- h1> Ini Template Bootstrap Khas03 </h1 -->
<div class="tabbable tabs-top">
	<ul class="nav nav-tabs putih">
<?php
foreach ($this->bentukJadual03 as $jadual => $baris)
{
	if ( count($baris)==0 ) echo '';
	else
	{	//$mula = ($jadual=='***') ? ' class="active"' : ''; ?>
	<li><a href="#<?php echo $jadual ?>" data-toggle="tab">
		<span class="badge badge-success"><?php echo $jadual ?></span>
		<span class="badge"><?php echo count($baris) ?></span>
		</a></li>
<?php
	}
}
?>	</ul>
<div class="tab-content">
<?php
foreach ($this->bentukJadual03 as $myTable => $row)
{
	if ( count($row)==0 ) echo '';
	else
	{
		$mula2 = ($jadual=='***') ? ' active' : '';
		$tajukjadual = '<span class="badge badge-success">' . $myTable . '</span>'
		. "\r" . '<span class="badge">' . count($row) . '</span>'; ?>
	<div class="tab-pane<?php echo $mula2?>" id="<?php echo $myTable ?>">
<!-- Jadual <?php echo $myTable ?> ########################################### -->
<?php include $this->pilihJadual3 . '.php'; ?>
<!-- Jadual <?php echo $myTable ?> ########################################### -->
	</div>
<?php
	} // if ( count($row)==0 )
}
?>
</div><!-- class="tab-content" -->
</div><!-- /tabbable -->