<?php
  require_once('class_functions.php');
	$functions = new class_functions;

	if (isset($_POST['ex']) ) {
	$meta_box = $_POST;
	$checked = array();
	unset($meta_box['ex']);
	unset($meta_box['checked_num']);
	unset($meta_box['cat']);
		for ($i = 0; $i < count($meta_box); $i++){
			for ($j = 0; $j < $_POST['checked_num']; $j ++){
				if ($meta_box[$i] == 'checked'.$j){
					$checked[] = $meta_box[$i];
					unset($meta_box[$i]);
				}
			}
		}
		$meta_box = array_merge(array_unique($meta_box));
		print_r($meta_box);
  	if (count($meta_box) > 0){
    	$functions->export_txt($meta_box, $_POST['cat']);
  	} else {
    	echo 'Bitte makieren Sie die zu exportierenden Metadaten<br />';
  	}
  } else if (!isset($_POST['ex'])) {
?>
  <form action="<?php echo $_SERVER['PHP_SELF'] . '?page=contact-export/contact-export.php&action=1'; ?>" method="post">
<?php
  $functions->add_Meta_Box();
?>
		<input type="hidden" name="cat" value="<?php echo get_option('ex_cat'); ?>" />
		<input type="submit" class="button-primary" value="exportieren" name="ex" />
  </form>
<?php
  }
?>
