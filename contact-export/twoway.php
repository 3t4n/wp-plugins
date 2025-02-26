<?php
  require_once('class_functions.php');
	$functions = new class_functions;

  if (isset($_POST['ex']) ) {
	$meta_box = $_POST;
	$checked = array();
	unset($meta_box['ex']);
	unset($meta_box['checked_num']);
	unset($meta_box['cat']);
  //unset($meta_box['checked0']);
		for ($i = 0; $i < count($meta_box); $i++){
			for ($j = 0; $j < $_POST['checked_num']; $j ++){
				if ($meta_box[$i] == 'checked'.$j){
					$checked[] = $meta_box[$i];
					unset($meta_box[$i]);
				}
			}
		}
		$meta_box = array_merge(array_unique($meta_box));
		//print_r($_POST['cat']);
  	if (count($meta_box) > 0){
    	$functions->export_txt($meta_box, $_POST['cat']);
  	} else {
    	echo 'Bitte makieren Sie die zu exportierenden Metadaten<br />';
  	}
  } else if (isset($_POST['next'])) {
	$checked = $_POST;
	unset($checked['next']);
?>
  <form action="<?php echo $_SERVER['PHP_SELF'] . '?page=contact-export/contact-export.php&action=2'; ?>" method="post">
<?php
  $functions->add_Meta_Box();
	for ($i = 0; $i < count($checked); $i++){
?>
	<!--<input type="hidden" name="checked<?php echo $i; ?>" value="<?php echo $checked[$i]; ?>"/>-->
<?php
	}
?>
		<input type="hidden" name="checked_num" value="<?php echo $i; ?>" />
		<input type="hidden" name="cat" value="<?php echo $_POST['cat']; ?>" />
		<input type="submit" class="button-primary" value="exportieren" name="ex" />
  </form>
<?php
  } else {
?>
  <form action="<?php echo $_SERVER['PHP_SELF'] . '?page=contact-export/contact-export.php&action=2'; ?>" method="post">
<?php
  wp_dropdown_categories('show_option_all&hide_empty=0&hierarchical=1');
  // des oben ist die besser Alternative
  /*$categories = get_categories('show_option_all&hide_empty=0&hierarchical=1');
	$i = 0;
	foreach ($categories as $cat) {
  	echo '<input type="checkbox" name="'.$i.'" value="'.$cat->category_nicename.'">'.$cat->category_nicename.'<br>';
		$i ++;
	}*/
?>
  <input type="submit" class="button-primary" value="weiter" name="next"/>
  </form>
<?php }
?>
