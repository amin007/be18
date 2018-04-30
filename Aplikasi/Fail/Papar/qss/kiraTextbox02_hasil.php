<?php
$kiraF = array('07','08','09','10','11','12','13','14','15','16','17','18','19','20');
foreach ($kiraF as $ff):?>
<script>
$('#F00<?php echo $ff ?>c').keyup(function(){
	var F00<?php echo $ff ?>a;
	var F00<?php echo $ff ?>b;
	var F00<?php echo $ff ?>c;
	F00<?php echo $ff ?>a = parseFloat($('#F00<?php echo $ff ?>a').val());
	F00<?php echo $ff ?>b = parseFloat($('#F00<?php echo $ff ?>b').val());
	F00<?php echo $ff ?>c = parseFloat($('#F00<?php echo $ff ?>c').val());
	var result = F00<?php echo $ff ?>a + F00<?php echo $ff ?>b + F00<?php echo $ff ?>c;
	$('#F00<?php echo $ff ?>d').val(result.toFixed(0));
});
</script>
<?php endforeach; 
echo "\r";
$kiraF = array('a','b','c','d');
foreach ($kiraF as $ff):?>
<script>
$('#F0009<?php echo $ff ?>').keyup(function(){
	var F0007<?php echo $ff ?>;
	var F0009<?php echo $ff ?>;
	F0007<?php echo $ff ?> = parseFloat($('#F0007<?php echo $ff ?>').val());
	F0009<?php echo $ff ?> = parseFloat($('#F0009<?php echo $ff ?>').val());
	var result = F0007<?php echo $ff ?> + F0009<?php echo $ff ?>;
	$('#F0011<?php echo $ff ?>').val(result.toFixed(0));
});
</script>
<?php endforeach; 
echo "\r";
echo "\r";
$kiraF = array('a','b','c','d');
foreach ($kiraF as $ff):?>
<script>
$('#F0010<?php echo $ff ?>').keyup(function(){
	var F0008<?php echo $ff ?>;
	var F0010<?php echo $ff ?>;
	F0008<?php echo $ff ?> = parseFloat($('#F0008<?php echo $ff ?>').val());
	F0010<?php echo $ff ?> = parseFloat($('#F0010<?php echo $ff ?>').val());
	var result = F0008<?php echo $ff ?> + F0010<?php echo $ff ?>;
	$('#F0012<?php echo $ff ?>').val(result.toFixed(0));
});
</script>
<?php endforeach; 
echo "\r";
####################################################################################################
$kiraF = array('a','b','c','d');
foreach ($kiraF as $ff):?>
<script>
$('#F0017<?php echo $ff ?>').keyup(function(){
	var F0013<?php echo $ff ?>;
	var F0015<?php echo $ff ?>;
	var F0017<?php echo $ff ?>;
	F0013<?php echo $ff ?> = parseFloat($('#F0013<?php echo $ff ?>').val());
	F0015<?php echo $ff ?> = parseFloat($('#F0015<?php echo $ff ?>').val());
	F0017<?php echo $ff ?> = parseFloat($('#F0017<?php echo $ff ?>').val());
	var result = F0013<?php echo $ff ?> + F0015<?php echo $ff ?> + F0017<?php echo $ff ?>;
	$('#F0019<?php echo $ff ?>').val(result.toFixed(0));
});
</script>
<?php endforeach; 
echo "\r";
$kiraF = array('a','b','c','d');
foreach ($kiraF as $ff):?>
<script>
$('#F0018<?php echo $ff ?>').keyup(function(){
	var F0014<?php echo $ff ?>;
	var F0016<?php echo $ff ?>;
	var F0018<?php echo $ff ?>;
	F0014<?php echo $ff ?> = parseFloat($('#F0014<?php echo $ff ?>').val());
	F0016<?php echo $ff ?> = parseFloat($('#F0016<?php echo $ff ?>').val());
	F0018<?php echo $ff ?> = parseFloat($('#F0018<?php echo $ff ?>').val());
	var result = F0014<?php echo $ff ?> + F0016<?php echo $ff ?> + F0018<?php echo $ff ?>;
	$('#F0020<?php echo $ff ?>').val(result.toFixed(0));
});
</script>
<?php endforeach; 
echo "\r";