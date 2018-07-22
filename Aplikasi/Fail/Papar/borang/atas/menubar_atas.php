<?php 
$nav = 'class="dropdown-toggle" data-toggle="dropdown"';
//<ul class="nav navbar-nav navbar-right">
$classUL = 'nav navbar-nav navbar-right';
$iconFA['User'] = '<i class="fas fa-user"></i>';
$iconFA['Barcode'] = '<i class="fas fa-barcode"></i>';
$iconFA['Filter'] = '<i class="fas fa-filter"></i>';
$iconFA['Stats'] = '<i class="fas fa-chart-bar"></i>';
$iconFA['Ask'] = '<i class="fas fa-question-circle"></i>';
$iconFA['Power'] = '<i class="fas fa-power-off"></i>';

$pilihMenu = 1;
//$pilihMenu = '4.1.1';

if($pilihMenu == '4.1.1'): echo "\n";?>
<!-- ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ -->
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
			data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<?=$iconFA['User']?>Staf
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item"  href="<?php echo URL ?>biodata/ubah">
					<?=$iconFA['User']?>Profile <?=$pengguna?>
				</a>
				<hr>
				<a class="dropdown-item" href="<?php echo URL ?>rangkabaru/masukdata/1"><?=$iconFA['Barcode']?>Tambah Kes</a>
				<a class="dropdown-item" href="<?php echo URL ?>operasi/batch"><?=$iconFA['Barcode']?>Semak Barcode</a>
				<a class="dropdown-item" href="<?php echo URL ?>operasi/hantar"><?=$iconFA['Barcode']?>Hantar Kes</a>
				<a class="dropdown-item" href="<?php echo URL ?>prosesan/batch"><?=$iconFA['Barcode']?>Terima Di Prosesan</a>
				<hr>
				<a class="dropdown-item" href="<?php echo URL ?>ruangtamu/logout"><?=$iconFA['User']?>Keluar</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
			data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<?=$iconFA['Filter']?>Cari
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="#">Action1</a>
				<a class="dropdown-item" href="#">Action2</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
			data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<?=$iconFA['Stats']?>Laporan
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="#">Action1</a>
				<a class="dropdown-item" href="#">Action2</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
			data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<?=$iconFA['Ask']?>Bantuan
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="#">Action1</a>
				<a class="dropdown-item" href="#">Action2</a>
			</div>
		</li>
		</ul>
	</div>
<!-- ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ -->
<?php 
elseif($pilihMenu == '1'): echo "\n";?>
<!-- ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ -->
<ul class="<?php echo $classUL ?>">
<li class="dropdown">
	<a <?php echo $nav ?> href="#"><?=$iconFA['User']?>Staf
	<b class="caret"></b></a>
	<ul class="dropdown-menu">
	<li><a href="<?php echo URL ?>biodata/ubah">
		<?=$iconFA['User']?>Profile <?=$pengguna?>
	</a></li>
	<li class="divider"></li>
	<li><a href="<?php echo URL ?>rangkabaru/masukdata/1"><?=$iconFA['Barcode']?>Tambah Kes</a></li>
	<li><a href="<?php echo URL ?>operasi/batch"><?=$iconFA['Barcode']?>Semak Barcode</a></li>
	<li><a href="<?php echo URL ?>operasi/hantar"><?=$iconFA['Barcode']?>Hantar Kes</a></li>
	<li><a href="<?php echo URL ?>prosesan/batch"><?=$iconFA['Barcode']?>Terima Di Prosesan</a></li>
	<li class="divider"></li>
	<li><a href="<?php echo URL ?>ruangtamu/logout">
		<?=$iconFA['Power']?>Keluar
	</a></li>
	</ul>
</li>
<li class="dropdown">
	<a <?php echo $nav ?> href="#">
		<?=$iconFA['Filter']?>Cari
	<b class="caret"></b></a>
	<ul class="dropdown-menu">
	<li><a href="<?php echo URL ?>cari/tentang/msic/1"><?=$iconFA['Filter']?>MSIC</a></li>
	<li><a href="<?php echo URL ?>cari/tentang/produk/1"><?=$iconFA['Filter']?>PRODUK</a></li>
	<li><a href="<?php echo URL ?>cari/tentang/johor/2"><?=$iconFA['Filter']?>LOKALITI JOHOR</a></li>
	<li><a href="<?php echo URL ?>cari/tentang/malaysia/2"><?=$iconFA['Filter']?>LOKALITI MALAYSIA</a></li>
	<li><a href="<?php echo URL ?>cari/tentang/prosesan/1"><?=$iconFA['Filter']?>Prosesan</a></li>
	</ul>
</li>
<li class="dropdown">
	<a <?php echo $nav ?> href="#">
		<?=$iconFA['Stats']?>Laporan
	<b class="caret"></b></a>
	<ul class="dropdown-menu">
	<li><a href="<?php echo URL ?>laporan/bulanan">Laporan Bulanan</a></li>
		<li><a href="<?php echo URL ?>qss/suku1">Laporan QSS</a></li>
	<li class="divider"></li><?php
/*	
	echo "\n\t";
	$bulanan = bulanan('nama_bulan', null);
	foreach ($bulanan as $key => $bln):?>
	<li><a target="_blank" href="<?php echo URL ?>laporan/bulan/<?php echo $bln 
	?>">Bulan <?php echo ($key+1) . ' - ' . (huruf('Besar_Depan',$bln)) ?></a></li><?php
	echo "\n\t";
	endforeach;
//*/?>	
	</ul>
</li>
<li class="dropdown">
	<a <?php echo $nav ?> href="#">
		<?=$iconFA['Ask']?>Bantuan
	<b class="caret"></b></a>
	<ul class="dropdown-menu">
	<li><a href="#">Sistem</a></li>
	<li><a href="<?php echo URL ?>forum/perdana">Forum</a></li>
	<li><a href="<?php echo URL ?>mesej/utama">Email</a></li>
	</ul>
</li>
</ul>
<!-- ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ -->
<?php elseif($pilihMenu == '1'): echo "\n";?>
<!-- ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ -->
<ul class="<?php echo $classUL ?>">
<li class="dropdown"><a <?php echo $nav ?> href="#">
	<i class="fa fa-money fa-2x" aria-hidden="true"></i>
	Student Finance<b class="caret"></b></a>
	<ul class="dropdown-menu">
	<li><a href="<?php echo URL ?>kewangan/semua/1/1">
		<i class="fa fa-address-card fa-2x" aria-hidden="true"></i>
		Semua Pelajar</a></li>
	<li><a href="<?php echo URL ?>kewangan/yuran/1/1">
		<i class="fa fa-user-secret fa-2x" aria-hidden="true"></i>
		Resit</a></li>
	<li><a href="<?php echo URL ?>kewangan/hubungiwaris/surat">
		<i class="fa fa-link fa-2x" aria-hidden="true"></i>
		Surat/SMS/Email</a></li>
	</ul>
</li>
<li class="dropdown"><a <?php echo $nav ?> href="#">
	<i class="fa fa-tachometer fa-2x" aria-hidden="true"></i>
	Dashboard</a></li>
<li class="dropdown"><a <?php echo $nav ?> href="#">
	<i class="fa fa-users fa-2x" aria-hidden="true"></i>
	Staf</a></li>
<li class="dropdown"><a <?php echo $nav ?> href="#">
	<i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
	Pendaftaran<b class="caret"></b></a>
	<ul class="dropdown-menu">
	<li><a href="<?php echo URL ?>pelajar/daftarBaru">
		<i class="fa fa-user-plus fa-2x" aria-hidden="true"></i>
		Baru</a></li>
	<li><a href="<?php echo URL ?>pelajar/paparSemua">
		<i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i>
		Profil</a></li>
	<li><a href="<?php echo URL ?>surat/hubungiwaris">
		<i class="fa fa-female fa-2x" aria-hidden="true"></i>
		<i class="fa fa-male fa-2x" aria-hidden="true"></i>
		Ibubapa</a></li>
	</ul>
</li>
<li class="dropdown"><a <?php echo $nav ?> href="#">
	<i class="fa fa-book fa-2x" aria-hidden="true"></i>
	Akademik<b class="caret"></b></a>
	<ul class="dropdown-menu">
	<li><a href="<?php echo URL ?>pelajar/peperiksaan/1/1">
		<i class="fa fa-newspaper-o fa-2x" aria-hidden="true"></i>
		Peperiksaan</a></li>
	<li><a href="<?php echo URL ?>pelajar/laporanSubjek/1/1">
		<i class="fa fa-newspaper-o fa-2x" aria-hidden="true"></i>
		Laporan Subjek</a></li>
	<li><a href="<?php echo URL ?>pelajar/slippeperiksaan/1/1">
		<i class="fa fa-newspaper-o fa-2x" aria-hidden="true"></i>
		Slip peperiksaan</a></li>
	<li><a href="<?php echo URL ?>pelajar/analisapencapaian">
		<i class="fa fa-newspaper-o fa-2x" aria-hidden="true"></i>
		Analisa Pencapaian</a></li>
	<li><a href="<?php echo URL ?>pelajar/kedatangan">
		<i class="fa fa-newspaper-o fa-2x" aria-hidden="true"></i>
		Kedatangan Pelajar</a></li>
	<li><a href="<?php echo URL ?>pelajar/hafazan">
		<i class="fa fa-newspaper-o fa-2x" aria-hidden="true"></i>
		Pengurusan Hafazan</a></li>
	<li><a href="<?php echo URL ?>akademik/analisa/subjek/kelas_1_ibn_kathir">
		<i class="fa fa-newspaper-o fa-2x" aria-hidden="true"></i>
		Graf Analisa Subjek</a></li>
	</ul>
</li>
<li class="dropdown"><a <?php echo $nav ?> href="#">
	<i class="fa fa-trophy fa-2x" aria-hidden="true"></i>
	Ko-kurikulum</a></li>
<li class="dropdown"><a <?php echo $nav ?> href="qss/suku1">
	<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>
	Displin</a></li>
</ul>
<!-- ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ --><?php 
endif; echo "\n";?>