<div class="container">
<hr><h1>Ruangtamu - Kita Tanya Apa Khabar</h1><hr>
<div class="hero-unit">
<p><?php
$Sesi = new \Aplikasi\Kitab\Sesi();
$Sesi->init();
//echo '<pre>'; print_r($_SESSION) . '</pre>';
echo 'namaPendek=' . $Sesi->get('be18_namaPendek') . '<br>';
echo 'namaPenuh=' . $Sesi->get('be18_namaPenuh') . '<br>';
echo 'levelPengguna=' . $Sesi->get('be18_levelPengguna') . '';//*/
?></p>

	<a class="btn btn-primary btn-large" href="<?php echo URL ?>ruangtamu/logout">Pergi Lebih Jauh<i class="fa fa-binoculars fa-2x"></i></a>
	<a class="btn btn-success btn-large" target="_blank" href="<?php echo URL ?>borang">Borang<i class="fa fa-binoculars fa-2x"></i></a>
	<a class="btn btn-success btn-large" target="_blank" href="<?php echo URL ?>borang/industri">MSIC<i class="fa fa-binoculars fa-2x"></i></a>

</div><!-- / class="hero-unit" -->
</div><!-- / class="container" -->

<?php //echo semakDataSesi(); ?>