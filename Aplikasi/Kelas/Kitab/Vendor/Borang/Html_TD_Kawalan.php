<?php
namespace Aplikasi\Kitab; //echo __NAMESPACE__; 
class Html_TD_Kawalan
{
#==========================================================================================
#------------------------------------------------------------------------------------------
	public static function labelBawah($labelDibawah)
	{
		$input2 = null;
		$tab2 = "\n\t\t";
		$input2 = ($labelDibawah==null) ? '' :
				'<span class="input-group-addon">'
				. $labelDibawah . '</span>'
				. $tab2;

		return $input2;
	}
#------------------------------------------------------------------------------------------
	public function medanCarian($pindah, $class = 'col-sm-7')
	{
		list($myTable, $senarai, $cariID, $_jadual) = $pindah;
		$this->atasLabelSyarikat();
		list($mencari, $carian, $mesej) = $this->atasSemakData($senarai, $cariID, $_jadual);
		$this->atasInputCarian($mencari, $carian, $mesej, $class);
	}
#------------------------------------------------------------------------------------------
	public function atasLabelSyarikat()
	{
		echo "\n"; ?><style>
.floating-menu {
	padding: 5px;; width: 300px; z-index: 100;
	position: fixed; bottom: 0px; right: 0px;
}
</style><?php echo "\n";
	}
#------------------------------------------------------------------------------------------
	public function atasSemakData($senarai, $cariID, $_jadual)
	{
		if(isset($senarai['kes'][0]['newss'])):
			# set pembolehubah
			$mencari = URL . 'kawalan/ubahCari/';
			$carian = $cariID;
			$mesej = ''; //$carian .' ada dalam ' . $this->_jadual;
			list($namaSyarikat, $semak1, $semak3) = explode("|", $senarai['kes'][0]['nama']);
			?><nav class="floating-menu">
			<p class="bg-primary">
			<?php echo "\n&nbsp;" . $namaSyarikat ?>
			</p></nav>
			<?php
		else: # set pembolehubah
			$mencari = URL . 'kawalan/ubahCari/';
			$carian = null;
			$mesej = '::' . $cariID . ' tiada dalam ' . $_jadual;
		endif;

		return array($mencari, $carian, $mesej);
	}
#------------------------------------------------------------------------------------------
	public function atasInputCarian($mencari, $carian, $mesej, $class)
	{
		echo "\n";?><div class="container">
<form method="GET" action="<?=$mencari;?>" class="form-inline" autocomplete="off">
<div class="form-group">
	<label for="carian"><h1>Ubah Kawalan<?=$mesej?></h1></label>
	<div class="input-group">
		<input type="text" name="cari" value="<?=$carian;?>"
		class="form-control" id="inputString"
		onkeyup="lookup(this.value);" onblur="fill();">
		<span class="input-group-addon"><input type="submit" value="mencari"></span>
	</div>
</div>
<div class="suggestionsBox" id="suggestions" style="display: none;">
	<div class="suggestionList" id="autoSuggestionsList">&nbsp;</div>
</div>
</form></div><br><?php echo "\n";
	}
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
	public function medanTajuk($myTable, $class = 'col-sm-7')
	{
		echo "\n";
?><div class="form-group">
	<div class="<?php echo $class ?>">
		<div class="input-group input-group-lg">
		<span class="input-group-addon">Jadual <?php echo $myTable ?></span>
		</div>
	</div>
</div><?php echo "\n";
	}
#------------------------------------------------------------------------------------------
	public function medanHantar($myTable, $class = 'col-sm-7')
	{
?><div class="form-group">
	<div class="<?php echo $class ?>">
		<!--label for="inputSubmit" class="col-sm-3 control-label"><?=$myTable?></label -->
		<div class="input-group input-group-lg">
		<span class="input-group-addon">
			<input type="hidden" name="jadual" value="<?php echo $myTable ?>">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary btn-large">
			<input type="reset" name="Reset" value="Reset" class="btn btn-default btn-large">
		</span>
		</div>
	</div>
</div><?php
	}
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
	public function ubahInput($paparSahaja,$jadual,$kira,$key,$data)
	{	# istihar pembolehubah
		$medanBiodata = dpt_senarai('jadual_biodata2');
		$name = 'name="' . $jadual . '[' . $key . ']"';
		$inputText = $name . ' value="' . $data . '"';
		$labelDibawah = $data;
		$dataType = myGetType($data);
		$tabline = "\n\t\t\t\t\t";
		$tabline2 = "\n\t\t\t\t";
		$tab2 = "\n\t\t";
		$tab3 = "\n\t\t\t";
		$tab4 = "\n\t\t\t\t";
		# butang 
		$birutua = 'btn btn-primary btn-mini';
		$birumuda = 'btn btn-info btn-mini';
		$merah = 'btn btn-danger btn-mini';
		$classInput = 'input-group input-group';
		$komen = '<!-- / "input-group input-group" -->';

		//if ( in_array($key,array(...)) )
		if(in_array($key,$medanBiodata))
		{#senarai medan untuk biodata
			//$data = null;
			$input = $tab2 . '<div class="'.$classInput.'">' . $tab3
				   //. '<span class="input-group-addon"></span>' . $tab3
				   . '<input type="text" ' . $name
				   . ' value="' . $data . '"'
				   . ' class="form-control">' . $tab3
				   . $this->labelBawah($labelDibawah)
				   . '</div>' . $komen
				   . '';
		}
		elseif(in_array($key,array('nota','catatan','CatatNota')))
		{#kod utk textarea
			$input = '<textarea ' . $name . ' rows="1" cols="20"' . $tabline2 
				   . ' class="form-control">' . $data . '</textarea>'
				   . $tabline2 . '<pre>' . $data . '</pre>'
				   . '';
		}
		elseif(in_array($key,array('posdaftar')))
		{#kod utk kesan API dan input text saiz besar
			# tatasusuan API posdaftar
			list($k,$btn) = $this->posdaftar($data);
			$data2 = ($data==null) ? $data :
				'<a target="_blank" href="' . $k[3] . '">' . $data . '</a>';
			$input = '<div class="input-group input-group-lg">' . $tabline
				   . '<span class="input-group-addon">' . $data2 . '</span>' . $tabline
				   . '<input type="text" ' . $inputText 
				   . ' class="form-control">'
				   . $tabline2 . '</div>'
				   . '';
		}
		elseif(in_array($key,array('namax','emailx','responden','fe')))
		{#kod utk input text saiz besar
			$input = '<div class="input-group input-group-lg">' . $tabline
				   . '<span class="input-group-addon">' . $data . '</span>' . $tabline
				   . '<input type="text" ' . $inputText 
				   . ' class="form-control">'
				   . $tabline2 . '</div>'
				   . '';
		}
		elseif(in_array($key,array('respon','mko','nobatch','feprosesan')))
		{#kod utk input text 3 aksara sahaja
			$input = '<div class="input-group input-group">' . $tabline
				   . '<span class="input-group-addon">' . $data . '</span>' . $tabline
				   . '<input type="text" ' . $inputText 
				   . ' class="form-control">'
				   . $tabline2 . '</div>'
				   . '';
		}
		elseif(in_array($key,array('email','pecah5P','po')))
		{#kod utk input text saiz biasa
			$input = '<div class="input-group input-group">' . $tabline
				   . '<span class="input-group-addon">' . $data . '</span>' . $tabline
				   . '<input type="text" ' . $inputText 
				   . ' class="form-control">'
				   . $tabline2 . '</div>'
				   . '';
		}
		elseif(in_array($key,array('no','batu','jalan','tmn_kg','daerah')))
		{#kod utk alamat baru
			$input = '<div class="input-group input-group">' . $tabline
				   . '<span class="input-group-addon">' . $data . '</span>' . $tabline
				   . '<input type="text" ' . $inputText
				   . ' class="form-control">'
				   . $tabline2 . '</div>'
				   . '';
		}
		elseif(in_array($key,array('notel','nofax','nohp')))
		{#kod utk input text saiz kecil
			$input = '<div class="input-group input-group-sm">' . $tabline
				   . '<span class="input-group-addon">' . $data . '</span>' . $tabline
				   . '<input type="text" ' . $inputText 
				   . ' class="form-control">'
				   . $tabline2 . '</div>'
				   . '';
		}
		elseif(in_array($key,array('hasil','belanja','bilpekerja','gaji','hartatetap','stokakhir',
			'staf','aset','stok')))
		{#kod utk input paparkan nilai asal sebelum ubah
			$input = '<div class="input-group input-group-sm">' . $tabline
				   . '<span class="input-group-addon">Nilai</span>'
				   . '<input type="text" ' . $inputText 
				   . ' class="form-control">' . $tabline
				   . '<span class="input-group-addon">' . kira($data) . '</span>'
				   . $tabline2 . '</div>'
				   . '';
		}
		elseif(in_array($key,array('output','input','nilaitambah','ioratio')))
		{#kod utk input paparkan nilai asal sebelum ubah
			$input = '<div class="input-group input-group-sm">' . $tabline
				   . '<span class="input-group-addon">Nilai</span>'
				   . '<input type="text" ' . $inputText 
				   . ' class="form-control">' . $tabline
				   . '<span class="input-group-addon">' . kira($data) . '</span>'
				   . $tabline2 . '</div>'
				   . '';
		}//*/
		elseif ( in_array($key,array('password','kataLaluan')) )
		{#kod untuk input password
			$input = ''//'<div class="input-group input-group-sm">' . $tabline
				   //. '<span class="input-group-addon"></span>' . $tabline
				   . '<input type="password" ' . $name
				   . $tabline . ' placeholder="Tukar kata laluan"'
				   . ' class="form-control">'
				   //. $tabline2 . '</div>'
				   . '';
		}
		elseif ( in_array($key,array('lawat','terima','hantar','hantar_prosesan')) )
		{#kod utk input tarikh
		#terima - style="font-family:sans-serif;font-size:10px;"
			$tandaX = 'name="' . $jadual . '[' . $key . 'X]"';
			$dataX = ($key=='hantar_prosesan') ?
				'<input type="checkbox" ' . $tandaX . ' value="x">Utk Prosesan : ' . $data
				: '<input type="checkbox" ' . $tandaX . ' value="x">' . $data;
			$input = '<div class="input-group input-group-sm">' . $tabline
				   . '<span class="input-group-addon">' . $dataX . '</span>' . $tabline
				   . '<input type="date" ' . $inputText //. 'class="input-date tarikh" readonly>'
				   . $tabline . ' class="form-control date-picker"'
				   . $tabline . ' placeholder="Cth: 2014-05-01"'
				   . $tabline . ' id="date' . $key . '" data-date-format="yyyy/mm/dd"/>'
				   . $tabline2 . '</div>'
				   . '';
		}
		elseif ( in_array($key,array('posdaftar_terima')) )
		{#kod untuk input select option
			# set pembolehubah
			$input2 = null;
			$senaraiInput = array('Belum','Proses','Terima','KadKuning','Borang');

			foreach ($senaraiInput as $key => $value)
			{
				$input2 .= '<option value="' . $value . '"';
				$input2 .= ($value == $data) ? ' selected>*' : '>';
				$input2 .= ucfirst(strtolower($value));
				$input2 .= '</option>' . $tabline;
			}

			# cantumkan dalam input
			$input = '<div class="input-group input-group-sm">' . $tabline
				   . '<span class="input-group-addon">' . $data . '</span>' . $tabline
				   . '<select ' . $name . ' class="form-control">' . $tabline
				   . $input2 . '</select>'
				   . $tabline2 . '</div>'
				   . '';
		}
		elseif ( in_array($key,array('jantina')) )
		{#kod untuk input select option
			# set pembolehubah
			$input2 = null;
			$senaraiJantina = array('lelaki','perempuan');
			
			foreach ($senaraiJantina as $key => $value)
			{
				$input2 .= '<option value="' . $value . '"';
				$input2 .= ($value == $data) ? ' selected>*' : '>';
				$input2 .= ucfirst(strtolower($value));
				$input2 .= '</option>' . $tabline;
			}

			# cantumkan dalam input
			$input = '<div class="input-group input-group-sm">' . $tabline
				   . '<span class="input-group-addon">' . $data . '</span>' . $tabline
				   . '<select ' . $name . ' class="form-control">' . $tabline
				   . $input2 . '</select>'
				   . $tabline2 . '</div>'
				   . '';
		}
		# kod html untuk bukan input type
		elseif ( in_array($key,array('keterangan')) )
		{#kod untuk papar jadual
			//echo '$paparSahaja-><pre>'; print_r($paparSahaja) . '<pre>';
			//var_export($paparSahaja) . '<pre>';
			# set nama class untuk jadual
			$jadual1 = ' table-striped'; # tambah zebra
			$jadual2 = ' table-bordered';
			$jadual3 = ' table-hover';
			$jadual4 = ' table-condensed'; 
			$classJadual = 'table' . $jadual4 . $jadual3;
			foreach ($paparSahaja as $myTable => $bilang)
			{# mula ulang $bilang
				$this->papar_jadual($bilang, $myTable, $pilih=4, $classJadual);
			}# tamat ulang $bilang //*/

			$input = '';
		}
		elseif ( in_array($key,array('alamat_baru')) )
		{#kod untuk  blockquote
			$input = '<blockquote>'
				   . '<p class="form-control-static text-info">' . $data . '</p>'
				   //. '<small>Alamat <cite title="Source Title">baru</cite></small>'
				   . '</blockquote>';
		}
		/*elseif($dataType=='string' && !in_array($key,array('level')))
		{
			$input = '<div class="input-group input-group-sm">' . $tabline
				   . '<span class="input-group-addon">' . $data . '</span>'
				   . '<input type="text" ' . $inputText 
				   . ' class="form-control">' . $tabline
				   . $tabline2 . '</div>'
				   . '';
		}*/
		//elseif($dataType=='numeric')
		//elseif($dataType=='NULL')
		else
		{#kod untuk lain2
			$input = '<p class="form-control-static text-info">' . $data . '</p>';
		}

		return $input; # pulangkan nilai
	}
#------------------------------------------------------------------------------------------
	# mula untuk kod php+html 
	function papar_jadual($row, $myTable, $pilih, $classTable = null)
	{
		if ($pilih == 1) 
		{
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
			?><!-- Jadual <?php echo $myTable ?> -->
			<table border="1" class="excel" id="example">
			<?php $printed_headers = false; # mula bina jadual
			#-----------------------------------------------------------------
			for ($kira=0; $kira < count($row); $kira++)
			{	# print the headers once: 	
				if ( !$printed_headers ) : ?><thead><tr>
			<th>#</th><?php foreach ( array_keys($row[$kira]) as $tajuk ) :
			?><th><?php echo $tajuk ?></th>
			<?php endforeach; ?></tr></thead>
			<?php	$printed_headers = true; 
				endif;
			#- print the data row --------------------------------------------
			?><tbody><tr>
			<td><?php echo $kira+1 ?></td>	
			<?php foreach ( $row[$kira] as $key=>$data ) : 
			?><td><?php echo $data ?></td>
			<?php endforeach; ?></tr></tbody>
			<?php
			}#-----------------------------------------------------------------
			?></table><?php echo "\r" ?><!-- Jadual <?php echo $myTable ?> --><?php
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
		} elseif ($pilih == 2) {
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
			?><!-- Jadual <?php echo $myTable ?> -->
			<table border="1" class="excel" id="example"><?php
			$printed_headers = false; # mula bina jadual
			#-----------------------------------------------------------------
			for ($kira=0; $kira < count($row); $kira++)
			{	# cetak tajuk hanya sekali sahaja :
				if ( !$printed_headers ) : ?>
			<thead><tr>
			<th>#</th><?php
					foreach ( array_keys($row[$kira]) AS $tajuk ) 
					{ 	if ( !is_int($tajuk) ) :
							$paparTajuk = ($tajuk=='nama') ?
							$tajuk . '(jadual:' . $myTable . ')'
							: $tajuk; ?>
			<th><?php echo $paparTajuk ?></th>
			<?php		endif;
					}
			?></tr></thead><?php
					$printed_headers = true; 
				endif; 
			#- cetak hasil $data ---------------------------------------------?>
			<tbody><tr>
			<td><?php echo $kira+1 ?></td>	
			<?php
				foreach ( $row[$kira] AS $key=>$data ) 
				{
					?><td><?php echo $data ?></td><?php
				} 
				?></tr></tbody>
			<?php
			}
			#-----------------------------------------------------------------
			?></table><!-- Jadual <?php echo $myTable ?> --><?php
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
		} elseif ($pilih == 3) {
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
			?><!-- Jadual <?php echo $myTable ?>  --><?php
			for ($kira=0; $kira < count($row); $kira++)
			{// ulang untuk $kira++ ?>
			<table border="1" class="excel" id="example">
			<tbody><?php foreach ( $row[$kira] as $key=>$data ):?>
			<tr>
			<td><?php echo $key ?></td>
			<td><?php echo $data ?></td>
			</tr>
			<?php endforeach; ?></tbody>
			</table>
			<?php
			}# ulang untuk $kira++ ?>
			<!-- Jadual <?php echo $myTable ?> --><?php
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
		} elseif ($pilih == 4) { 
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
			?><!-- Jadual <?php echo $myTable ?> -->
			<table class="<?php echo $classTable ?>">
			<?php $printed_headers = false; # mula bina jadual
			#-----------------------------------------------------------------
			for ($kira=0; $kira < count($row); $kira++)
			{	# cetak tajuk hanya sekali sahaja :
				if ( !$printed_headers ) : ?><thead><tr>
			<th>#</th><?php foreach ( array_keys($row[$kira]) as $tajuk ) :
			?><th><?php echo $tajuk ?></th><?php endforeach; 
			?></tr></thead>
			<?php	$printed_headers = true; 
				endif;
			# cetak hasil $data --------------------------------------------
			?><tbody><tr>
			<td><?php echo $kira+1 ?></td><?php 
				foreach ( $row[$kira] as $key=>$data ) :
			?><td><?php echo bersih2X($data); ?></td><?php
				endforeach; ?>  
			</tr></tbody>
			<?php
			}
			#-----------------------------------------------------------------
			?></table><?php echo "\r\t\t\t"; ?><!-- Jadual <?php echo $myTable ?> --><?php echo "\r\t\t\t";
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
		} elseif ($jadual == 5) { 
		# nilai akan dipulangkan balik
			$bil_tajuk = $row['bil_tajuk'];// => 8
			$bil_baris = $row['bil_baris']; 

			$output  = null; 
			//$output .= '<br>$bil_tajuk=' . $bil_tajuk;
			//$output .= '<br>$bil_baris=' . $bil_baris;
			$output .= '<table border="1" class="excel" id="example">
			<thead><tr>
			<th colspan="' . $bil_tajuk . '">
			<strong>Jadual ' . $myTable . ' : ' . $bil_tajuk . '
			</strong></th>
			</tr></thead>';

			$printed_headers = false; # mula bina jadual
			#-----------------------------------------------------------------
			for ($kira=0; $kira < $bil_baris; $kira++)
			{	# print the headers once:
				if ( !$printed_headers ) 
				{##=================================================
				$output .= "\r\t<thead><tr>\r\t<th>#</th>";
				foreach ( array_keys($row[$kira]) as $tajuk ) :
					$output .= "\r\t" . '<th>' . $tajuk . '</th>';
				endforeach;
				$output .= "\r\t" . '</tr></thead>';
				##==================================================
					$printed_headers = true; 
				} 
			#--- print the data row ------------------------------------------
				$output .= "\r\t<tbody><tr>\r\t<td>" . ($kira+1) . '</td>';
				foreach ( $row[$kira] as $key=>$data ) :
					$output .= "\r\t" . '<td>' . $data . '</td>';
				endforeach; 
				$output .= "\r\t" . '</tr></tbody>';
			}
			#-----------------------------------------------------------------
			$output .= "\r\t" . '</table>';

			return $output;

		} # tamat if ($jadual == 5
	}# tamat untuk kod php+html 
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
#==========================================================================================
}