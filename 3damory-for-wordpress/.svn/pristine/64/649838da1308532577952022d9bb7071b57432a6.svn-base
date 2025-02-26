<?php

/*
	Plugin Name: 3DArmory for Wordpress
	Plugin URI: http://www.3darmory.com
	Description: 3DArmory for Wordpress is a plugin providing a widget that can render your World of Warcraft toon's 3D Model on your blog
	Version: 0.1
	Author: 3DArmory.com
	Author URI: http://www.3darmory.com
*/


add_action('plugins_loaded', 'wp_3darmory_widget_init');  

function wp_3darmory_widget_init() 
{
	if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') ) return;

	function wp_3darmory_widget($args) 
	{
		extract($args);

		$options=get_option('wp_3darmory');
		$title = empty($options['wp_3darmory_title']) ? 'My World of Warcraft Character' : htmlspecialchars($options['wp_3darmory_title'], ENT_QUOTES);
		$zone = htmlspecialchars($options['wp_3darmory_zone'], ENT_QUOTES);
		$realm = htmlspecialchars($options['wp_3darmory_realm'], ENT_QUOTES);
		$name = htmlspecialchars($options['wp_3darmory_name'], ENT_QUOTES);
		$width = htmlspecialchars($options['wp_3darmory_width'], ENT_QUOTES);
		$height = htmlspecialchars($options['wp_3darmory_height'], ENT_QUOTES);	

 		echo $before_widget;
		echo $before_title . $title . $after_title;

		if( empty($zone) OR empty($realm) OR empty($name) OR empty($width) OR empty($height))
			echo "In order to 3DArmory for Wordpress widget work, you've to configure your widget and fill all the fields..<br>";
		else
			render_toon($zone,$realm,$name,$width,$height);
		
		echo $after_widget;
	}

	function render_toon($zone,$realm,$name,$width,$height)
	{
		echo "<script type=\"text/javascript\" src=\"http://www.3darmory.com/api/render_toon/$zone/$realm/$name/$width/$height\"></script>";
	}
		
	function wp_3darmory_widget_control()
	{	
		$options=get_option('wp_3darmory');
		
		if($_POST['wp_3darmory_submit'])
		{
			$options['wp_3darmory_title']=strip_tags(stripslashes($_POST['wp_3darmory_title']));
			$options['wp_3darmory_zone']=strip_tags(stripslashes($_POST['wp_3darmory_zone']));
			$options['wp_3darmory_realm']=strip_tags(stripslashes($_POST['wp_3darmory_realm']));
			$options['wp_3darmory_name']=strip_tags(stripslashes($_POST['wp_3darmory_name']));
			$options['wp_3darmory_width']=strip_tags(stripslashes($_POST['wp_3darmory_width']));
			$options['wp_3darmory_height']=strip_tags(stripslashes($_POST['wp_3darmory_height']));
			update_option('wp_3darmory',$options);
		}
		
		$title = htmlspecialchars($options['wp_3darmory_title'], ENT_QUOTES);
		$zone = htmlspecialchars($options['wp_3darmory_zone'], ENT_QUOTES);
		$realm = htmlspecialchars($options['wp_3darmory_realm'], ENT_QUOTES);
		$name = htmlspecialchars($options['wp_3darmory_name'], ENT_QUOTES);
		$width = htmlspecialchars($options['wp_3darmory_width'], ENT_QUOTES);
		$height = htmlspecialchars($options['wp_3darmory_height'], ENT_QUOTES);		

	?>

		<label for="wp_3darmory_title" style="line-height:35px;display:block;">Widget title: 
		<input type="text" id="wp_3darmory_title" name="wp_3darmory_title" value="<?=$title?>" /></label>

		<label for="wp_3darmory_zone" style="line-height:35px;display:block;">Character's Zone: 
		<select id="wp_3darmory_zone" name="wp_3darmory_zone" >
			<option value="eu">EU</option>
			<option value="us">US</option>
			<option value="kr">KR</option>
			<option value="cn">CN</option>
			<option value="tw">TW</option>
		</select>

		<label for="wp_3darmory_realm" style="line-height:35px;display:block;">Character's Realm: 
		<input type="text" id="wp_3darmory_realm" name="wp_3darmory_realm" value="<?=$realm?>" /></label>

		<label for="wp_3darmory_name" style="line-height:35px;display:block;">Character's Name
		<input type="text" id="wp_3darmory_name" name="wp_3darmory_name" value="<?=$name?>" /></label>

		<label for="wp_3darmory_width" style="line-height:35px;display:block;">Model Width:
		<input type="text" id="wp_3darmory_width" name="wp_3darmory_width" value="<?=$width?>" /></label>

		<label for="wp_3darmory_height" style="line-height:35px;display:block;">Model Height:
		<input type="text" id="wp_3darmory_height" name="wp_3darmory_height" value="<?=$height?>" /></label>

		<input type="hidden" name="wp_3darmory_submit" id="wp_3darmory_submit" value="1" />
	
	<?php
	}

	register_sidebar_widget('3DArmory Widget','wp_3darmory_widget');
	register_widget_control('3DArmory Widget','wp_3darmory_widget_control');

}

?>