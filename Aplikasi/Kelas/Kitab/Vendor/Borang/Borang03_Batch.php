<?php
namespace Aplikasi\Kitab; //echo __NAMESPACE__;
class Borang03_Batch
{
#==========================================================================================
###########################################################################################
#------------------------------------------------------------------------------------------
	public function pilihPautan($namaPegawai, $noBatch, $error)
	{
		$staff = dpt_senarai('operasi');
		//echo '<pre>$staff->'; print_r($staff); echo '</pre>';
		$urlStaf = $target = null; //$target = ' target="_blank"';
		foreach ($staff as $namaStaf):
			$urlStaf .=  "\r | " . '<a' . $target . ' href="' . URL
			. 'operasi/batch/' . $namaStaf . '">'
			. $namaStaf . '</a>';
		endforeach;

		if (($namaPegawai == null)):
			list($namaPegawai,$noBatch,$notaTambahan,$mencari,$butangHantar,$cetak)
				= $this->pautan01($namaPegawai, $noBatch, $urlStaf);
		elseif (($namaPegawai != null) && ($noBatch == null)):
			list($namaPegawai,$noBatch,$notaTambahan,$mencari,$butangHantar,$cetak)
				= $this->pautan02($namaPegawai, $noBatch, $urlStaf, $staff);
		elseif (($namaPegawai != null) && ($noBatch != null)
			&& ($error == 'Kosong') ):
			list($namaPegawai,$noBatch,$notaTambahan,$mencari,$butangHantar,$cetak)
				= $this->pautan03($namaPegawai, $noBatch, $urlStaf);
		else:
			list($namaPegawai,$noBatch,$notaTambahan,$mencari,$butangHantar,$cetak)
				= $this->pautan04($namaPegawai, $noBatch, $urlStaf);
		endif;

		return array($namaPegawai,$noBatch,$notaTambahan,$mencari,$butangHantar,$cetak);
	}
#------------------------------------------------------------------------------------------
	public function pautan01($namaPegawai, $noBatch, $urlStaf)
	{# set pembolehubah $this->namaPegawai == null
		$namaPegawai = (!isset($namaPegawai)) ? null : $namaPegawai;
		$noBatch = (!isset($noBatch)) ? null : $noBatch;
		$notaTambahan = 'nama pegawai tidak wujud. klik salah satu pautan staf di bawah ini ' 
		. $urlStaf;
		$mencari = URL . 'operasi/tambahNamaStaf';
		$butangHantar = 'Letak Nama Staf';
		$cetak = null;

		return array($namaPegawai,$noBatch,$notaTambahan,$mencari,$butangHantar,$cetak);
	}
#------------------------------------------------------------------------------------------
	public function pautan02($namaPegawai, $noBatch, $urlStaf, $staff)
	{
		list($birutua,$birumuda,$merah,$cetakIcon,$paparStaf,$paparXStaf) 
			= $this->icon($namaPegawai, $urlStaf);
		# set pembolehubah 
		$namaPegawai = (!isset($namaPegawai)) ? null : $namaPegawai;
		$noBatch = (!isset($noBatch)) ? null : $noBatch;
		$mencari = URL . 'operasi/tambahBatchBaru/' . $namaPegawai;
		$notaTambahan = ( (in_array($namaPegawai,$staff)) ?
			$paparStaf : $paparXStaf );
		$butangHantar = 'Letak No Batch';
		$cetak = null;

		return array($namaPegawai,$noBatch,$notaTambahan,$mencari,$butangHantar,$cetak);
	}
#------------------------------------------------------------------------------------------
	public function pautan03($namaPegawai, $noBatch, $urlStaf)
	{
		list($birutua,$birumuda,$merah,$cetakIcon,$paparStaf,$paparXStaf) 
			= $this->icon($namaPegawai, $urlStaf);
		# set pembolehubah
		$namaPegawai = (!isset($namaPegawai)) ? null : $namaPegawai;
		$noBatch = (!isset($noBatch)) ? null : $noBatch;
		$cetakF03 = URL . 'laporan/cetakf3/' . $namaPegawai . '/' . $noBatch . '/1000/1';
		//$cetakF10 = URL . 'laporan/cetakf10/' . $namaPegawai . '/' . $noBatch . '/1000/1';
		//$cetakAlamat = URL . 'laporan/cetakresponden/' . $namaPegawai . '/' . $noBatch . '/1000/1';
		$cetakA1 = URL . 'laporan/cetakA1/' . $namaPegawai . '/' . $noBatch . '/1000/1';
		$cetak = '<h3><a target="_blank" class="' . $merah . '" href="' . $cetakF03 . '">' 
		. $cetakIcon . 'F3</a>| ' . "\r" .
		//'<a target="_blank" class="' . $merah . '" href="' . $cetakAlamat . '">' 
		//. $cetakIcon . 'Alamat</a>| ' . "\r" .
		'<a target="_blank" class="' . $merah . '" href="' . $cetakA1 . '">' 
		. $cetakIcon . 'A1</a></h3>' . "\r";
		$mencari = URL . 'operasi/ubahBatchProses/' . $namaPegawai . '/' . $noBatch;
		$notaTambahan = 'Daftar kes masing-masing<br>' 
			. 'Nama:' . $namaPegawai . '|Batch:' . $noBatch;
		$butangHantar = 'Letak No ID';

		return array($namaPegawai,$noBatch,$notaTambahan,$mencari,$butangHantar,$cetak);
	}
#------------------------------------------------------------------------------------------
	public function pautan04($namaPegawai, $noBatch, $urlStaf)
	{
		list($birutua,$birumuda,$merah,$cetakIcon,$paparStaf,$paparXStaf) 
			= $this->icon($namaPegawai, $urlStaf);
		# set pembolehubah
		$namaPegawai = (!isset($namaPegawai)) ? null : $namaPegawai;
		$noBatch = (!isset($noBatch)) ? null : $noBatch;
		$paparError = (!isset($error)) ? null : $error;
		$mencari = URL . 'operasi/ubahBatchProses/' . $namaPegawai . '/' . $noBatch;
		$cetakF03 = URL . 'laporan/cetakf3/' . $namaPegawai . '/' . $noBatch . '/1000/1';
		//$cetakF10 = URL . 'laporan/cetakf10/' . $namaPegawai . '/' . $noBatch . '/1000/1';
		$cetakAlamat = URL . 'laporan/cetakresponden/' . $namaPegawai . '/' 
		. $noBatch . '/1000/1';
		$cetakA1 = URL . 'laporan/cetakA1/' . $namaPegawai . '/' 
		. $noBatch . '/1000/1';
		$cetak = '<h3><a target="_blank" class="' . $merah . '" href="' . $cetakF03 . '">' 
		. $cetakIcon . 'F3</a>| ' . "\r" .
		'<a target="_blank" class="' . $merah . '" href="' . $cetakAlamat . '">' 
		. $cetakIcon . 'Alamat</a>| ' . "\r" .
		'<a target="_blank" class="' . $merah . '" href="' . $cetakA1 . '">' 
		. $cetakIcon . 'A1</a></h3>' . "\r";
		$notaTambahan = 'Ubah | Nama Pegawai : ' . $namaPegawai . ' | BatchOperasi : ' 
		. $noBatch . '<br>' . "\r" .
		'<small>Nota: ' . $paparError . '</small>';
		$butangHantar = 'Tambah Lagi No ID';

		return array($namaPegawai,$noBatch,$notaTambahan,$mencari,$butangHantar,$cetak);
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