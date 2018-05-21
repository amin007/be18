<?php
namespace Aplikasi\Kitab; //echo __NAMESPACE__;
class Borang03_Batch
{
#==========================================================================================
###########################################################################################
#------------------------------------------------------------------------------------------
	public function pautan01($namaPegawai, $noBatch, $urlStaf)
	{# set pembolehubah $this->namaPegawai == null
		$namaPegawai = (!isset($namaPegawai)) ? null : $namaPegawai;
		$cariBatch = (!isset($noBatch)) ? null : $noBatch;
		$notaTambahan = 'nama pegawai tidak wujud. klik salah satu pautan staf di bawah ini ' 
		. $urlStaf;
		$mencari = URL . 'operasi/tambahNamaStaf';
		$butangHantar = 'Letak Nama Staf';

		return array($namaPegawai,$cariBatch,$notaTambahan,$mencari,$butangHantar);
	}
#------------------------------------------------------------------------------------------
	public function pautan02($namaPegawai, $noBatch, $urlStaf)
	{
		list($birutua,$birumuda,$merah,$cetakIcon,$paparStaf,$paparXStaf) 
			= $this->icon($namaPegawai, $urlStaf);
		# set pembolehubah 
		$namaPegawai = (!isset($namaPegawai)) ? null : $namaPegawai;
		$cariBatch = (!isset($noBatch)) ? null : $noBatch;
		$mencari = URL . 'operasi/tambahBatchBaru/' . $namaPegawai;
		$notaTambahan = ( (in_array($namaPegawai,$senaraiStaf)) ?
			$paparStaf : $paparXStaf );
		$butangHantar = 'Letak No Batch';

		return array($namaPegawai,$cariBatch,$notaTambahan,$mencari,$butangHantar);
	}
#------------------------------------------------------------------------------------------
	public function pautan03($namaPegawai, $noBatch, $urlStaf)
	{
		list($birutua,$birumuda,$merah,$cetakIcon,$paparStaf,$paparXStaf) 
			= $this->icon($namaPegawai, $urlStaf);
		# set pembolehubah
		$namaPegawai = (!isset($namaPegawai)) ? null : $namaPegawai;
		$cariBatch = (!isset($noBatch)) ? null : $noBatch;
		$cetakF03 = URL . 'laporan/cetakf3/' . $namaPegawai . '/' . $cariBatch . '/1000/1';
		//$cetakF10 = URL . 'laporan/cetakf10/' . $namaPegawai . '/' . $cariBatch . '/1000/1';
		//$cetakAlamat = URL . 'laporan/cetakresponden/' . $namaPegawai . '/' . $cariBatch . '/1000/1';
		$cetakA1 = URL . 'laporan/cetakA1/' . $namaPegawai . '/' . $cariBatch . '/1000/1';
		$cetak = '<h3><a target="_blank" class="' . $merah . '" href="' . $cetakF03 . '">' 
		. $cetakIcon . 'F3</a>| ' . "\r" .
		//'<a target="_blank" class="' . $merah . '" href="' . $cetakAlamat . '">' 
		//. $cetakIcon . 'Alamat</a>| ' . "\r" .
		'<a target="_blank" class="' . $merah . '" href="' . $cetakA1 . '">' 
		. $cetakIcon . 'A1</a></h3>' . "\r";
		$mencari = URL . 'operasi/ubahBatchProses/' . $namaPegawai . '/' . $cariBatch;
		$notaTambahan = 'Daftar kes masing-masing<br>';
		$butangHantar = 'Letak No ID';

		return array($namaPegawai,$cariBatch,$notaTambahan,$mencari,$butangHantar);
	}
#------------------------------------------------------------------------------------------
	public function pautan04($namaPegawai, $noBatch, $urlStaf)
	{
		list($birutua,$birumuda,$merah,$cetakIcon,$paparStaf,$paparXStaf) 
			= $this->icon($namaPegawai, $urlStaf);
		# set pembolehubah
		$namaPegawai = (!isset($namaPegawai)) ? null : $namaPegawai;
		$cariBatch = (!isset($noBatch)) ? null : $noBatch;
		$paparError = (!isset($error)) ? null : $error;
		$mencari = URL . 'operasi/ubahBatchProses/' . $namaPegawai . '/' . $cariBatch;
		$cetakF03 = URL . 'laporan/cetakf3/' . $namaPegawai . '/' . $cariBatch . '/1000/1';
		//$cetakF10 = URL . 'laporan/cetakf10/' . $namaPegawai . '/' . $cariBatch . '/1000/1';
		$cetakAlamat = URL . 'laporan/cetakresponden/' . $namaPegawai . '/' 
		. $cariBatch . '/1000/1';
		$cetakA1 = URL . 'laporan/cetakA1/' . $namaPegawai . '/' 
		. $cariBatch . '/1000/1';
		$cetak = '<h3><a target="_blank" class="' . $merah . '" href="' . $cetakF03 . '">' 
		. $cetakIcon . 'F3</a>| ' . "\r" .
		'<a target="_blank" class="' . $merah . '" href="' . $cetakAlamat . '">' 
		. $cetakIcon . 'Alamat</a>| ' . "\r" .
		'<a target="_blank" class="' . $merah . '" href="' . $cetakA1 . '">' 
		. $cetakIcon . 'A1</a></h3>' . "\r";
		$notaTambahan = 'Ubah | Nama Pegawai : ' . $namaPegawai . ' | BatchOperasi : ' 
		. $cariBatch . '<br>' . "\r" .
		'<small>Nota: ' . $paparError . '</small>';
		$butangHantar = 'Tambah Lagi No ID';

		return array($namaPegawai,$cariBatch,$notaTambahan,$mencari,$butangHantar);
	}
#------------------------------------------------------------------------------------------
	public function icon($namaPegawai, $urlStaf)
	{
		# butang / icon
		$birutua = 'btn btn-primary btn-mini';
		$birumuda = 'btn btn-info btn-mini';
		$merah = 'btn btn-danger btn-mini';
		$cetakIcon = '<i class="fa fa-print fa-2x pull-left"></i> ';
		$paparStaf = $namaPegawai . " ada dalam senarai staf";
		$paparXStaf = $namaPegawai . " tiada dalam senarai staf.<br>"
			. ' klik salah satu pautan staf di bawah ini ' . $urlStaf . '';

		return array($birutua,$birumuda,$merah,$cetakIcon,$paparStaf,$paparXStaf);
	}
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
###########################################################################################
#==========================================================================================
}