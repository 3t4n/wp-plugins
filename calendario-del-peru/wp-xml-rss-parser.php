<?php
/*
Plugin Name: Calendario del Perú
Plugin URI: http://www.deperu.com/
Description: Muestra eventos del día del Calendario peruano. Instale el plugin, luego vaya al menú de "Apariencia / widgets" y arrastre el mismo hasta la ubicación donde desea mostrarlo (normalmente un sidebar). Este plugin mostrará 5 eventos diarios del Calendario, todos los días.
Author: DePeru.com
Version: 1
Author URI: http://www.deperu.com/
*/

include_once('parser.php');

	function widget_gsearch($args) {
		extract($args);

		$options = get_option('widget_gsearch');
		$title = 'Calendario del Perú';
		$item = 5;
		$url = 'http://www.deperu.com/rss/004-calendario.php';

		$url_flux_rss		= $url;
		$item_no		= $item; 
		$rss			= new parseXMLRSS;
		$rss->cache_dir		= 'cache'; 
		$rss->cache_time	= 3600; 
		$rss->CDATA		= 'content';

		echo $before_widget . $before_title . $title . $after_title;
		$url_parts = parse_url(get_bloginfo('url'));

		if ($rs = $rss->get($url_flux_rss)) 
		{
			for($i=0;$i<count($rs['items']) && $i < 5;$i++)
			{
				
				$text = '<p><a href="'.$rs['items'][$i]['link'].'">' . $rs['items'][$i]['title'].'</a></p>';
				echo $text;
				
			}
		}
		echo $after_widget;
	}
wp_register_sidebar_widget('cal2014dp', 'Calendario del Perú', 'widget_gsearch');
add_action('calendario_peru', 'widget_gsearch_init');
?>