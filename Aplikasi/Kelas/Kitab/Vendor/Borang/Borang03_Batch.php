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
		$c1 = (!isset($namaPegawai)) ? null : $namaPegawai;
		$c2 = (!isset($noBatch)) ? null : $noBatch;
		if (($namaPegawai == null)):
			list($cetak,$notaTambahan,$mencari,$butangHantar)
				= $this->pautan01($error, $c1, $c2, $urlStaf);
		elseif (($namaPegawai != null) && ($noBatch == null)):
			list($cetak,$notaTambahan,$mencari,$butangHantar)
				= $this->pautan02($error, $c1, $c2, $urlStaf, $staff);
		elseif (($namaPegawai != null) && ($noBatch != null)
			&& ($error == 'Kosong') ):
			list($cetak,$notaTambahan,$mencari,$butangHantar)
				= $this->pautan03($error, $c1, $c2, $urlStaf);
		else:
			list($cetak,$notaTambahan,$mencari,$butangHantar)
				= $this->pautan04($error, $c1, $c2, $urlStaf);
		endif;

		return array($cetak,$notaTambahan,$mencari,$butangHantar);
	}
#------------------------------------------------------------------------------------------
	public function pautan01($error, $namaPegawai, $noBatch, $urlStaf)
	{# $this->namaPegawai == null
		$cetak = null;
		$notaTambahan = 'nama pegawai tidak wujud. klik salah satu pautan staf di bawah ini ' 
		. $urlStaf;// "\r" . '<br><small>Nota: ' . $error . '</small>';
		$mencari = URL . 'operasi/tambahNamaStaf';
		$butangHantar = 'Letak Nama Staf';

		return array($cetak,$notaTambahan,$mencari,$butangHantar);
	}
#------------------------------------------------------------------------------------------
	public function pautan02($error, $namaPegawai, $noBatch, $urlStaf, $staff)
	{# $namaPegawai != null) && ($noBatch == null)
		list($birutua,$birumuda,$merah,$cetakIcon,$paparStaf,$paparXStaf) 
			= $this->icon($namaPegawai, $urlStaf);
		# set pembolehubah 
		$cetak = null;
		$mencari = URL . 'operasi/tambahBatchBaru/' . $namaPegawai;
		$notaTambahan = ( (in_array($namaPegawai,$staff)) ?
			$paparStaf : $paparXStaf )
			. "\r" . '<br><small>Nota: ' . $error . '</small>';
		$butangHantar = 'Letak No Batch';

		return array($cetak,$notaTambahan,$mencari,$butangHantar);
	}
#------------------------------------------------------------------------------------------
	public function pautan03($error, $namaPegawai, $noBatch, $urlStaf)
	{# ($namaPegawai != null) && ($noBatch != null) && ($error == 'Kosong')
		# set pembolehubah
		$cetak = $this->cetakSemua($namaPegawai, $noBatch, $urlStaf);
		$mencari = URL . 'operasi/ubahBatchProses/' . $namaPegawai . '/' . $noBatch;
		$notaTambahan = 'Daftar kes masing-masing<br>' 
			. 'Nama Pegawai : ' . $namaPegawai . ' | BatchOperasi : ' . $noBatch 
			. "\r" . '<br><small>Nota: ' . $error . '</small>';
		$butangHantar = 'Letak No ID';

		return array($cetak,$notaTambahan,$mencari,$butangHantar);
	}
#------------------------------------------------------------------------------------------
	public function pautan04($error, $namaPegawai, $noBatch, $urlStaf)
	{
		# set pembolehubah
		$mencari = URL . 'operasi/ubahBatchProses/' . $namaPegawai . '/' . $noBatch;
		$cetak = $this->cetakSemua($namaPegawai, $noBatch, $urlStaf);
		$notaTambahan = 'Ubah | Nama Pegawai : ' . $namaPegawai 
			. ' | BatchOperasi : ' . $noBatch
			. "\r" . '<br><small>Nota: ' . $error . '</small>';
		$butangHantar = 'Tambah Lagi No ID';

		return array($cetak,$notaTambahan,$mencari,$butangHantar);
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
	public function cetakSemua($n1, $n2, $urlStaf)
	{
		list($birutua,$birumuda,$merah,$cetakIcon,$paparStaf,$paparXStaf) 
			= $this->icon($n1, $urlStaf);
		$akhir = $n1 . '/' . $n2 . '/1000/1';
		$cetakF03 = URL . 'laporan/cetakf3/' . $akhir;
		//$cetakF10 = URL . 'laporan/cetakf10/' . $akhir;
		$cetakAlamat = URL . 'laporan/cetakresponden/' . $akhir;
		$cetakData = URL . 'laporan/cdatalama/' . $akhir;
		$cetakA1 = URL . 'laporan/cetakA1/' . $akhir;
		$cetak = '<h3><a target="_blank" class="' . $merah . '" href="' . $cetakF03 . '">'
			. $cetakIcon . 'F3</a>| ' . "\r"
			. '<a target="_blank" class="' . $merah . '" href="' . $cetakAlamat . '">'
			. $cetakIcon . 'Alamat</a>| ' . "\r"
			. '<a target="_blank" class="' . $merah . '" href="' . $cetakData . '">'
			. $cetakIcon . 'Data lama</a>| ' . "\r"
			. '<a target="_blank" class="' . $merah . '" href="' . $cetakA1 . '">'
			. $cetakIcon . 'A1</a></h3>' . "\r";

		return $cetak;
	}
#------------------------------------------------------------------------------------------
###########################################################################################
#==========================================================================================
}