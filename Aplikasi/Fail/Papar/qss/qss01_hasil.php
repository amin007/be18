<?php
$pautan = URL . 'sumber/rangka-dawai/qss/';
\Aplikasi\Kitab\Sesi::init();
//echo '<pre>'; print_r($_SESSION); echo '</pre>';
//include 'diatas.php';
include 'diatas-am.php';
//include 'menu_atas.php';
/*
<div class="container_12">
	<SCRIPT  language='JavaScript' type='text/javascript' src='<?php echo $pautan?>js_file/js/a_valid.js'></SCRIPT>
	<link href="<?php echo $pautan?>css_file/cssmenu/menu_assets/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $pautan?>css_file/cssmenu/text.css" rel="stylesheet" type="text/css">
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
	<script type="text/javascript" src="<?php echo $pautan?>js_file/js/autoNumeric.js"></script>
	<script type="text/javascript" src="<?php echo $pautan?>css_nota/highslide-html.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo $pautan?>css_nota/highslide.css" />
	<script type="text/javascript">
	hs.graphicsDir = 'graphics/';
	hs.outlineType = 'rounded-white';
	hs.wrapperClassName = 'draggable-header';
	</script>
	<style> .readonlyTAB{ background:#999;} </style>
	<script  language='JavaScript' type='text/javascript' src='<?php echo $pautan?>js_file/js/validasi/a_internaluser.js'></SCRIPT>	
</div>
*/
$link[0]= 'https://qss.stats.gov.my/qssv2/pdf/pdf3.php?no_siri='
. $this->medanID . '&sukutahun=1&tahun=2018';
$link[1] = 'https://qss.stats.gov.my/qssv2/pagemenu.php?pref='
. $this->suku .'&getSerial=' . $this->medanID . '';
?>
<br>Suku 1 : <a target="_blank" href="<?php echo $link[0] ?>"><?php echo $link[0] ?></a>
<br>Suku 2 : <a target="_blank" href="<?php echo $link[1] ?>"><?php echo $link[1] ?></a>
<!-- isi borang mula ########################################################################################################## -->
<?php include 'n_borang2.php'; ?>
<!-- isi borang tamat ########################################################################################################## -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<?php include 'kiraTextbox02_hasil.php'; ?>

<!-- input type="text" name="value1" id="textone">
<input type="text" name="value2" id="texttwo">
<input type="text" name="result" id="result" -->

<script>
    $('#texttwo').keyup(function(){
        var textone;
        var texttwo;
        textone = parseFloat($('#textone').val());
        texttwo = parseFloat($('#texttwo').val());
        var result = textone + texttwo;
        $('#result').val(result.toFixed(0));
    });
</script>
  
