<?php
/******************************************************************
/*Bootstrap file for getting the ABSPATH constant to wp-load.php
/*This is requried when a plugin requires access not via the admin screen.
******************************************************************/
$path  = ''; 


/******************************************************************
/*Cast Numeric values as Boolean
******************************************************************/
	add_filter('query_vars','appten_rotator_targets');

	function appten_rotator_targets($vars)
	{
		$vars[]='rid';
		return $vars;
	}
	
	add_action('template_redirect','appten_rotator_checks');

	function appten_rotator_checks()
	{
		if(get_query_var('rid')){
			image_rotator(get_query_var('rid'));
		}
	}
	
	function image_rotator($id)
	{
		global $wpdb;
		$siteurl=get_option('siteurl');
		$br ="\n";
		$config  = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".$wpdb->prefix."appten_imagerotator WHERE id=%d", $id ));
		$item 		 = $config;
		$isshow 	 = json_decode($item->show);
		$desc 		 = json_decode($item->message);
		$target 	 = json_decode($item->link);
		$target_type = json_decode($item->w_type);
		$img_src	 = json_decode($item->preview);
		
		header("content-type:text/xml;charset=utf-8");
		echo '<config>';
		for ($j=0; $j<count($img_src);$j++){
			if ($isshow[$j] == 1 && !empty($img_src[$j])){
				echo '<item>';
				echo '<src>' . $img_src[$j] . '</src>';
				echo '<desc>' . $desc[$j] . '</desc>';
				echo '<link>' . $target[$j] . '</link>';
				echo '<target>' . $target_type[$j] . '</target>';
				echo '</item>';
			}
		}
		echo '</config>';
		exit();	
	}
	
?>