<?php
/*
Plugin Name: FlickRss
Plugin URI: http://joaopedrobarros.com.br/code/wordpress/flickrss
Description: Widget that display your latest Flickr photos in your sidebar.
Author: João Pedro Barros
Version: 1.0.1
Author URI: http://joaopedrobarros.com.br
*/
?>
<?php

	$widget_flickrss_options["title"] = "Flickr Photos";
	$widget_flickrss_options["rss"] = "";
	$widget_flickrss_options["items"] = 3;
	$widget_flickrss_options["size"] = "smallsquare";
	$widget_flickrss_options["before_item"] = "<li>";
	$widget_flickrss_options["after_item"] = "</li>";
	$widget_flickrss_options["before_flickrss_widget"] = "<ul>";
	$widget_flickrss_options["after_flickrss_widget"] = "</ul>";
	$widget_flickrss_options["target"] = "true";

	function widget_flickrss($args=array())
	{
		global $widget_flickrss_options;	
		// load options
		$options = get_option("widget_flickrss");
		// check if there is options, otherwise transform it in an array
		if ( !is_array($options) ) $options = array();
		// merge options (default, current and args)
		$options = array_merge($widget_flickrss_options, $options, $args);
		// extract options
		extract($options);
		
		if ( $rss )
		{
			// include WordPress RSS Library
			include_once(ABSPATH . WPINC . '/rss.php');
			// get and parse flickr rss
			$flickrss = fetch_rss($rss);
			// define'n'clean $out and $loop
			$out = NULL; $loop = 1;
			// foreach item found
			foreach( $flickrss->items as $item )
			{
				// find photo url
				ereg("<img[^>]* src=\"([^\"]*)\"[^>]*>", $item["description"], $findMatch);
				
				// format photo url as wanted size
				switch( $options["size"] )
				{
					case 'smallsquare':
						$photo = str_replace("_m.jpg", "_s.jpg", $findMatch[1]);
					break;	
					case 'thumbnail':
						$photo = str_replace("_m.jpg", "_t.jpg", $findMatch[1]);
					break;					
					case 'medium':
						$photo = str_replace("_m.jpg", "_m.jpg", $findMatch[1]);
					break;						
					case 'big':
						$photo = str_replace("_m.jpg", ".jpg", $findMatch[1]);
					break;					
				}			
				
				// format target
				$target = ( $target == "true" ) ? ' target="_blank"' : NULL;
				
				// add item output
				$out .= $before_item . '<a href="'.$item["link"].'"'.$target.'>' . '<img src="'.$photo.'" title="'.$item["title"].'" />' . "</a>" . $after_item;
				
				if ($loop == $options["items"]) break;
				$loop++;
			}
		}
		else
		{
			$out = $before_item . "There is no RSS link defined." . $after_item;	
		}
		
		// Output Widget
		echo $before_widget, $before_title, $title, $after_title, $before_flickrss_widget, $out, $after_flickrss_widget, $after_widget;
	}
	
	
	function widget_flickrss_control()
	{
		global $widget_flickrss_options;
		
		// load options
		$options = get_option("widget_flickrss");		
		// check if there is options, otherwise transform it in an array
		if( !is_array($options) ) $options = array();
		// merge options (default and current)
		$options = array_merge($widget_flickrss_options, $options);		
		// extract options vars into "absolute" vars (escaping special chars)
		foreach( $options as $key => $value )
			eval("\$".$key." = \"".wp_specialchars($value)."\";");		
		
		// if there is a post
		if( $_POST["flickrss_submit"] )
		{
			$new_options = array(				
				"title" => $_POST["title"],
				"rss" => $_POST["rss"],
				"size" => $_POST["size"],
				"before_item" => $_POST["before_item"],
				"after_item" => $_POST["after_item"],
				"before_flickrss_widget" => $_POST["before_flickrss_widget"],
				"after_flickrss_widget" => $_POST["after_flickrss_widget"],
				"target" => (isset($_POST["target"])) ? "true" : "false"							 
			);
			
			// merge default options, current options and new options
			$new_options = array_merge($options, $new_options);
			// update options
			update_option("widget_flickrss", $new_options);
		}

		?>
        <input type="hidden" name="flickrss_submit" value="1" />
        <p><label><?php _e("Title:"); ?> <input class="widefat" name="title" type="text" value="<?= $title; ?>" /></label></p>
		<p><label><?php _e("Flickr RSS Link:"); ?> <input class="widefat" name="rss" type="text" value="<?= $rss; ?>" /></label></p>
        <p><label><?php _e("Photo Size:"); ?>
			<select class="widefat" name="size">            
			<option value="smallsquare" <?= ($size=="smallsquare" ? 'selected="selected"' : '') ?>>Small Square</option>
			<option value="thumbnail" <?= ($size=="thumbnail" ? 'selected="selected"' : '') ?>>Thumbnail</option>
			<option value="medium" <?= ($size=="medium" ?'selected"selected"' : '') ?>>Medium</option>
			<option value="big" <?= ($size=="big" ? 'selected="selected"' : '') ?>>Big</option>
		</select>
        </label></p>
        <p><label><?php _e("Before item:"); ?> <input class="widefat" name="before_item" type="text" value="<?= $before_item; ?>" /></label></p>
        <p><label><?php _e("After item:"); ?> <input class="widefat" name="after_item" type="text" value="<?= $after_item; ?>" /></label></p>
		<p><label>
		<?php _e("Before widget:"); ?> <input class="widefat" name="before_flickrss_widget" type="text" value="<?= $before_flickrss_widget; ?>" />
        </label></p>
        <p><label>
		<?php _e("After widget:"); ?> <input class="widefat" name="after_flickrss_widget" type="text" value="<?= $after_flickrss_widget; ?>" />
        </label></p>
		<p><label>
        	<input name="target" type="checkbox" value="checked" <?= (isset($target) && $target=="true") ? 'checked="checked"' : '' ?>/> 
			<?php _e("Link target as _blank"); ?>
        </label></p>
		<?
	}

	register_widget_control("FlickRss", "widget_flickrss_control");
	register_sidebar_widget("FlickRss", "widget_flickrss");

?>