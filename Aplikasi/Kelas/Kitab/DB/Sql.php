<?php
namespace Aplikasi\Kitab; //echo __NAMESPACE__;
class Sql
{
#=================================================================================================
#-------------------------------------------------------------------------------------------------
	function __construct() { }
#-------------------------------------------------------------------------------------------------
	private function jika($fix,$di,$medan,$cariApa,$akhir)
	{
		$dimana = null; //echo "\r($fix) +> $di $medan -> '$cariApa' |";
		if($fix==null) $dimana .= null;
		elseif($cariApa==null)
			$dimana .= ($fix=='x!=') ? " $di`$medan` != '' $akhir\r"
					: " $di`$medan` is null $akhir\r";
		elseif($fix=='xnull')
			$dimana .= " $di`$medan` is not null  $akhir\r";
		elseif($fix=='x=')
			$dimana .= " $di`$medan` = '$cariApa' $akhir\r";
		elseif($fix=='x!=')
			$dimana .= " $di`$medan` != '$cariApa' $akhir\r";
		elseif($fix=='x<=')
			$dimana .= " $di`$medan` <= '$cariApa' $akhir\r";
		elseif($fix=='x>=')
			$dimana .= " $di`$medan` >= '$cariApa' $akhir\r";
		elseif($fix=='like')
			$dimana .= " $di`$medan` like '$cariApa' $akhir\r";
		elseif($fix=='xlike')
			$dimana .= " $di`$medan` not like '$cariApa' $akhir\r";
		elseif($fix=='%like%')
			$dimana .= " $di`$medan` like '%$cariApa%' $akhir\r";
		elseif($fix=='x%like%')
			$dimana .= " $di`$medan` not like '%$cariApa%' $akhir\r";
		elseif($fix=='like%')
			$dimana .= " $di`$medan` like '$cariApa%' $akhir\r";
		elseif($fix=='xlike%')
			$dimana .= " $di`$medan` not like '$cariApa%' $akhir\r";
		elseif($fix=='%like')
			$dimana .= " $di`$medan` like '%$cariApa' $akhir\r";
		elseif($fix=='x%like')
			$dimana .= " $di`$medan` not like '%$cariApa' $akhir\r";
		elseif($fix=='in')
			$dimana .= " $di`$medan` in $cariApa $akhir\r";
		elseif($fix=='xin')
			$dimana .= " $di`$medan` not in $cariApa $akhir\r";
		elseif($fix=='khas2')
			$dimana .= " $di`$medan` REGEXP CONCAT('(^| )','',$cariApa) $akhir\r";
		elseif($fix=='xkhas2')
			$dimana .= " $di`$medan` NOT REGEXP CONCAT('(^| )','',$cariApa) $akhir\r";
		elseif($fix=='khas3')
			$dimana .= " $di`$medan` REGEXP CONCAT('[[:<:]]',$cariApa,'[[:>:]]') $akhir\r";
		elseif($fix=='xkhas4')
			$dimana .= " $di`$medan` NOT REGEXP CONCAT('[[:<:]]',$cariApa,'[[:>:]]') $akhir\r";
		elseif($fix=='z%like%')
			$dimana .= " $di$medan like '%$cariApa%' $akhir\r";
		elseif($fix=='z1')
			$dimana .= " $di$medan = $cariApa $akhir\r";
		elseif($fix=='z2')
			$dimana .= " $di$medan like '$cariApa' $akhir\r";
		elseif($fix=='z2x')
			$dimana .= " $di$medan not like '$cariApa' $akhir\r";
		elseif($fix=='z3x')
			$dimana .= " $di$medan IS NOT NULL $akhir\r";
		elseif($fix=='zin')
			$dimana .= " $di$medan in $cariApa $akhir\r";
		elseif($fix=='zxin')
			$dimana .= " $di$medan not in $cariApa $akhir\r";
		elseif($fix=='or(x=)') //" $di (`$cari`='$apa' OR msic2000='$apa')\r" :
		{	$pecah = explode('|', $medan);
			$dimana .= " $di(`" . $pecah[0] . "` = '$cariApa' "
			. " OR `" . $pecah[1] . "` = '$cariApa')\r";	}
		elseif($fix=='or(%like%)')
		{	$pecah = explode('|', $medan);
			$dimana .= " $di(`" . $pecah[0] . "` like '%$cariApa%' "
			. " OR `" . $pecah[1] . "` like '%$cariApa%')\r";	}

		return $dimana; //echo '<br>' . $dimana;
	}
#-------------------------------------------------------------------------------------------------
	public function dimana($carian)
	{
		$where = null; //echo '<pre>'; print_r($carian); echo '</pre>';
		if($carian==null || $carian=='' || empty($carian) ):
			$where .= null;
		else:
			foreach ($carian as $key=>$value)
			{
				   $di = isset($carian[$key]['atau'])  ? $carian[$key]['atau'] . ' ' : null;
				$medan = isset($carian[$key]['medan']) ? $carian[$key]['medan']      : null;
				  $fix = isset($carian[$key]['fix'])   ? $carian[$key]['fix']        : null;
				 $cari = isset($carian[$key]['apa'])   ? $carian[$key]['apa']        : null;
				$akhir = isset($carian[$key]['akhir']) ? $carian[$key]['akhir']      : null;
				//echo "\r$key => ($fix) $di $medan -> '$cari' |";
				$where .= $this->jika($fix,$di,$medan,$cari,$akhir);
			}
		endif;

		return $where; //echo '<pre>'; print_r($where); echo '</pre>';
	}
#-------------------------------------------------------------------------------------------------
	public function dibawah($cari)
	{
		$susunan = null; //echo '<pre>'; print_r($cari); echo '</pre>';
		if($cari==null || empty($cari) ):
			$susunan .= null;
		else:
			foreach ($cari as $key=>$val)
			{
				$mengira = isset($cari[$key]['mengira'])? $cari[$key]['mengira'] : null;
				 $kumpul = isset($cari[$key]['kumpul']) ? $cari[$key]['kumpul']  : null;
				  $order = isset($cari[$key]['susun'])  ? $cari[$key]['susun']   : null;
				   $dari = isset($cari[$key]['dari'])   ? $cari[$key]['dari']    : null;
				    $max = isset($cari[$key]['max'])    ? $cari[$key]['max']     : null;
				//echo "\$val = $val, \$key=$key <br>";
			}	//$this->semakPembolehUbah($mengira,$kumpul,$order,$dari,$max);
				$susunan .= $this->atur($mengira,$kumpul,$order,$dari,$max);
		endif;

		return $susunan; //echo '<pre>$susunan:'; print_r($susunan); echo '</pre>';
	}
#-------------------------------------------------------------------------------------------------
	private function atur($mengira,$kumpul,$order,$dari,$max)
	{
		$susunan = "\r";
			if ($kumpul!=null) $susunan .= " GROUP BY $kumpul\r";
			if ($mengira!=null)$susunan .= " $mengira\r";
			if ($order!=null)  $susunan .= " ORDER BY $order\r";
			if ($max!=null)    $susunan .= ($dari==0) ? 
				" LIMIT $max\r" : " LIMIT $dari,$max\r";

		return $susunan; //echo '<pre>$susunan:'; print_r($susunan); echo '</pre>';				
	}
#-------------------------------------------------------------------------------------------------
	private function semakPembolehUbah($mengira,$kumpul,$order,$dari,$max)
	{
		echo '<br>$mengira = ' . $mengira;
		echo '<br>$kumpul = ' . $kumpul;
		echo '<br>$order = ' . $order;
		echo '<br>$dari = ' . $dari;
		echo '<br>$max = ' . $max;
		echo '<hr>';
		//*/
	}	
#-------------------------------------------------------------------------------------------------
	public function bentukSqlSelect($myTable, $medan, $carian, $susun = null)
	{
		$sql = ' SELECT ' . $medan . "\r" . ' FROM ' . $myTable
			 . "\r" . $this->dimana($carian)
			 . $this->dibawah($susun);

		return $sql;
	}
#-------------------------------------------------------------------------------------------------
#=================================================================================================
}