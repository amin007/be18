<?php
namespace Aplikasi\Kitab; //echo __NAMESPACE__; 
class Html_TD
{
#==========================================================================================
	function paparURL($key, $data, $myTable = null, $khas = null, $cariB = null)
	{
		if ($key=='newss')
		{# primary key
				$k0 = URL . 'kawalan/' . $data;
				$k1 = $this->iconFA(1) . '<a target="_blank" href="' . $k0 . '">'
				. $data . '</a>&nbsp;';

			?><td><?php echo $k1 ?></td><?php
		}
		elseif(in_array($key,array('posdaftar')))
		{
				list($k,$btn) = $this->posdaftar($data);
				$pautan = ($data==null) ? $data :
				'<a target="_blank" href="' . $k[3] . '" class="' 
				. $this->butang . '">' . $data . '</a>';

			?><td><?php echo $pautan ?></td><?php
		}
		elseif(in_array($key,array('Mesej')))
		{
			?><td><?php echo nl2br($data) ?></td><?php
		}
		elseif(in_array($key,array('rating')))
		{
			echo "\n"; 
			?><td><?php $this->popupPicture($data, $khas) ?></td><?php
		}
		elseif(in_array($key,array('website_id')))
		{
				$k[1] = URL . 'homeadmin2/updateform/' 
				. $myTable . '/' . $data;
				$pautan = ($data==null) ? $data :
				'<a target="_blank" href="' . $k[1] . '" class="' 
				. $this->butang() . '">' . $data . '</a>';

			?><td><?php echo $pautan ?></td><?php
		}
		else
		{
			?><td><?php echo $data ?></td><?php
		}//*/
	}
#==========================================================================================
public function butang($warna = 'info',$saiz = 'kecil')
	{ 
		$btnW['primary'] = 'btn btn-primary'; # birutua
		$btnW['info'] = 'btn btn-info'; # birumuda - utama
		$btnW['danger'] = 'btn btn-danger'; # merah
		$btnW['success'] = 'btn btn-success'; #hijau
		$btnS['kecil'] = ' btn-mini'; # - utama
		
		$btn = $btnW[$warna] . $btnS[$saiz];
		return $btn;
	}
#==========================================================================================
	public function iconFA($pilih)
	{# icon font awesome
		$a[0] = '<i class="fa fa-user-o" aria-hidden="true"></i>';
		$a[1] = '<i class="fa fa-pencil" aria-hidden="true"></i>';

		return $a[$pilih];
	}
#==========================================================================================
	public function pautanTD($target, $href, $class, $data)
	{
		if ($target == null) { $t = ''; }
		else { $t = ' target="' . $target . '"'; }
	
		?><a<?php echo $t ?> href="<?php echo $href ?>" class="<?php
		echo $class ?>"><?php echo $data ?></a><?php
	}
#==========================================================================================
}