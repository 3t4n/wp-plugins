<?php
/*
Plugin Name: atpic
Plugin URI: http://www.ushcompu.com.ar/
Description: atpic gallery
Author: totoloco at gmail dot com
Version: 0.6
Author URI: http://www.ushcompu.com.ar/
*/

/*
 * Author 2009 totoloco at gmail dot com
 * http://www.ushcompu.com.ar/
 * Licensed under Sisterware
 */

class atpic {
  function atpic () {
    //add_action ('plugins_loaded', 'init');
  }

  function init () {
		if (!function_exists ('fetch_rss')) {	
			if (file_exists (ABSPATH . WPINC . '/rss.php'))
				require_once (ABSPATH . WPINC . '/rss.php');
			else
				require_once (ABSPATH . WPINC . '/rss-functions.php');
		}
  	register_sidebar_widget (__ ('Atpic Slideshow'), array ('atpic', 'slideshow'));
  	register_widget_control (    'Atpic Slideshow',  array ('atpic', 'control'));
  }

  function slideshow ($args) {
    $options = get_option('widget_atpic');
    extract ($args);
    $url = $options['url'];
    $title = $before_title . $options['title'] . $after_title;
    $pics = atpic :: getPics ($url);
    $id = md5 (time ());

    echo $before_widget;
    include (dirname (__FILE__) . '/tpl/widget.php');
    echo $after_widget;
  }

  function getPics ($url) {
    $feed = @fetch_rss($url);
    $ret = array ();
    if (is_array ($feed -> items))
      foreach ($feed -> items as $key => $image) {
        $title = $image['title'];
        $link  = $image['link'];
        preg_match ('/.*src="(http:\/\/[^"]+)"/', $image['description'], $img);
        $img = $img[1];
        $ret[] = array ('title' => $title,'link' => $link,  'img' => $img); 
      }
    return $ret;
  }

  function control () {
		$options = $newoptions = get_option ('widget_atpic');
		if ( $_POST["atpic-submit"] ) {
			$newoptions['title'] =  trim (strip_tags (stripslashes ($_POST["atpic-title"])));
			$newoptions['url'] =    trim ($_POST["atpic-url"]);
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option ('widget_atpic', $options);
		}
		$title  = htmlspecialchars ($options['title'], ENT_QUOTES);
    if ($title == '') $title = 'Atpic';
    $url = $options['url'] == ''? 'http://atpic.com/rss/.php?uuid=5117': $options['url'];

		if (empty($delay)) $delay ='5000';

    // widget control template
    include (dirname (__FILE__) . '/tpl/control.php');
  }
}
add_action('widgets_init', array ('atpic', 'init'));
?>
