<?php
$kiraF1 = array('01','02','03','04','05','06','07','08','99');
$kiraF2 = array('02','03','04','05','06','07','08');
?>
<script>
$('#F0108').keyup(function(){
<?php foreach ($kiraF1 as $ff1):?>
	var F01<?php echo $ff1 ?>;
<?php endforeach;  
	foreach ($kiraF1 as $ff1):?>
	F01<?php echo $ff1 ?> = parseFloat($('#F01<?php echo $ff1 ?>').val());
<?php endforeach; ?>
	var result = F0101 <?php foreach ($kiraF2 as $ff2):?>	
	+ F01<?php echo $ff2; endforeach; ?>
	+ F0199;
	$('#F0199').val(result.toFixed(0));
});
</script>
<?php 
echo "\r";
