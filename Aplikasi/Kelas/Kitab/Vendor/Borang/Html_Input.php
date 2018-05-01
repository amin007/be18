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
	public function medanTajuk($myTable, $class = 'col-sm-7')
	{
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
		
		return $input; # pulangkan nilai
	}
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
#==========================================================================================
}