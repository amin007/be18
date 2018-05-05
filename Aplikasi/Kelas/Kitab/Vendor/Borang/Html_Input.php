<?php
namespace Aplikasi\Kitab; //echo __NAMESPACE__; 
class Html_Input
{
#==========================================================================================
#------------------------------------------------------------------------------------------
	public function semakPembolehubah($senarai)
	{
		echo '<pre>$senarai:<br>';
		print_r($senarai);
		echo '</pre>|';//*/
	}
#------------------------------------------------------------------------------------------
	public static function dropmenuInsert($tabline, $jenisData)
	{
		$input2 = '';
		$tatasusunan = @explode(',', $jenisData);
		foreach ($tatasusunan as $key => $value)
		{
			$input2 .= $tabline;
			$input2 .= ($key==0) ? '<option>' :
				'<option value="' . $value . '">';
			$input2 .= ucfirst($value);
			$input2 .= '</option>';
		}

		return $input2;
	}
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
	public static function labelPre($labelDibawah)
	{
		$input2 = null;
		$tab2 = "\n\t\t";
		$pre = 'pre';
		//$pre = 'blockquote';
		$input2 = ($labelDibawah==null) ? '' : 
				'<' . $pre . '>' 
				. $labelDibawah 
				. '</' . $pre . '>'
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
	public function updateInput($class, $myTable, $kira, $namaMedan, $data)
	{
		# istihar pembolehubah 
		$medan = dpt_senarai('jadual_biodata2');
		//$this->semakPembolehubah($medan);
		$jenisMedan = isset($senarai['jenis_medan'])? $senarai['jenis_medan']: '';
		$jenisData = isset($senarai['jenis_data'])? $senarai['jenis_data']: '';
		//$labelDibawah = isset($senarai['label_dibawah'])? $senarai['label_dibawah']: '';
		$labelDibawah = $data;
		$name = 'name="' . $myTable . '[' . $namaMedan . ']"';
		$tab2 = "\n\t\t";
		$tab3 = "\n\t\t\t";
		$tab4 = "\n\t\t\t\t";
		# butang
		$birutua = 'btn btn-primary btn-mini';
		$birumuda = 'btn btn-info btn-mini';
		$merah = 'btn btn-danger btn-mini';
		$classInput = $class . 'input-group input-group';
		$komen = '<!-- / "' . $class . 'input-group input-group" -->';

		if(in_array($jenisMedan,array('textbox')))
		{#kod utk input text 
			$input = $tab2 . '<div class="'.$classInput.'">' . $tab3
				   //. '<span class="input-group-addon"></span>' . $tab3
				   . '<input type="text" ' . $name . ' class="form-control">' . $tab3
				   . $this->labelBawah($labelDibawah)
				   . '</div>' . $komen
				   . '';
		}
		elseif(in_array($namaMedan,array('no')))
		{#untuk medan primary key
			$data = null;
			$input = $tab2 . '<div class="'.$classInput.'">' . $tab3
				   //. '<span class="input-group-addon"></span>' . $tab3
				   . $this->labelBawah($labelDibawah)
				   . '</div>' . $komen
				   . '';
		}
		elseif(in_array($namaMedan,array('CatatNota')))
		{#senarai medan untuk textarea
			//$data = null;
			$input = $tab2 . '<div class="'.$classInput.'">' . $tab3
				   . '<textarea ' . $name . ' rows="5" cols="20"' . $tab3
				   . ' class="form-control">' . $data . '</textarea>' . $tab3 
				   . $this->labelPre($labelDibawah)
				   . '</div>' . $komen . $tab3 
				   . '';
		}
		elseif(in_array($namaMedan,$medan))
		{#senarai medan untuk type="text"
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
		elseif ( in_array($jenisMedan,array('blockquote')) )
		{#kod untuk blockquote
			$data = null;
			$input = '<blockquote>'
				   . '<p class="form-control-static text-info">' . $data . '</p>'
				   //. '<small>Alamat <cite title="Source Title">baru</cite></small>'
				   . '</blockquote>';
		}
		else
		{#kod untuk lain2
			$input = '<p class="form-control-static text-info">' . $data . '</p>';
		}
		
		return $input; # pulangkan nilai
	}
#------------------------------------------------------------------------------------------
	public function dataKawalan()
	{
		$medanlabel = array('newss','nama','dataHubungi','nossm','alamat','msic2008');
		$medanlabel = array('keterangan');
		$medanlabel = array('lawat','terima','hantar','hantar_prosesan');
		$medanlabel = array('fe','po','pecah5P');
		$medanlabel = array('hasil','belanja','gaji','aset','staf','stok');
	}
#------------------------------------------------------------------------------------------
#==========================================================================================
}