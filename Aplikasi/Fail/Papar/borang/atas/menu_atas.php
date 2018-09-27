<!-- menu_atas.php A0 --><?php 
$sesi = \Aplikasi\Kitab\Sesi::init();
//echo '<pre>MENU_ATAS - $_SESSION:', print_r($_SESSION, 1) . '</pre><br>';
# set pembolehubah
$pengguna = \Aplikasi\Kitab\Sesi::get('namaPendek');
$level = \Aplikasi\Kitab\Sesi::get('levelPengguna');

$senaraiPengguna = array('pentadbir','biasa');
$senaraiPentadbir = array('pentadbir','biasa');
if (in_array($level, $senaraiPentadbir)) 
	$paras = '' . $level;
elseif (in_array($level, $senaraiPengguna))
	$paras = '' . $level;
else 
	$paras = null; # untuk pelawat sahaja

$iconFA['home2'] = '<i class="fa fa-home fa-2x" aria-hidden="true"></i>';
$iconFA['video'] = '<i class="fas fa-video"></i>';
$iconFA['search'] = '<i class="fas fa-search"></i>';

echo "\n\n"; 
//if ($paras == null): else: ?>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
	<a class="navbar-brand" href="<?php echo URL ?>">
		<?php echo $iconFA['video'] . Tajuk_Muka_Surat . ':' . $paras ?></a>
	<a class="navbar-brand" href="<?php echo URL ?>ruangtamu/logout">
		<i class="fa fa-times fa-2x" aria-hidden="true"></i>Keluar</a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
	aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ --
<form class="mx-2 my-auto d-inline w-50" action="<?php echo $this->pautan ?>" method="POST">
<div class="input-group">
	<div class="input-group-btn">
		<a class="btn btn-info"><?php echo $iconFA['search'] ?></a>
	</div>
	<input type="hidden" name="namajadual" value="syarikat">
	<input type="text" name="jika[cari][1]" placeholder="Cari Newss / Nama" class="form-control" />
	<input type="hidden" name="susun" value="nama ASC">
</div>
</form><!-- / class="form-inline" -->
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<?php require 'menubar_atas.php'; ?>
</nav>
<?php
// endif;