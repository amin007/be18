<form method="POST" action="<?php echo $aksi ?>"
class="form-horizontal"><?php echo "\n";
for ($kira=0; $kira < count(3); $kira++)
{## papar data $row ----------------------------------------------------------
	?><div class="form-group"><?php echo "\n\t";
	?><label for="inputTajuk" class="col-sm-2 control-label"><?php echo $key
	?></label><?php echo "\n\t";
	?><div class="<?php echo $class2 ?>"><?php
		$paparData = "\n\t" . '<div class="input-group">'
		. "\n\t\t" . '<div class="input-group-prepend">'
		. "\n\t\t\t" . '<span class="input-group-text">First and last name</span>'
		. "\n\t\t" . '</div>'
		. "\n\t\t" . '<input type="text" aria-label="First name" class="form-control">'
		. "\n\t\t" . '<input type="text" aria-label="Last name" class="form-control">'
		. "\n\t" . '</div>';
		echo $paparData . "\n\t";
	?></div><!-- / class="<?php echo $class2 ?>" --><?php echo "\n";
	?></div><!-- / class="form-group" --><?php echo "\n";
}## --------------------------------------------------------------------------

/*<!-- / class="container" -->*/ ?>
</form><!-- / class="form-horizontal" -->
