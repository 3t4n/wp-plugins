<?php
/*
Plugin Name: Widget IP Publica
Plugin URI: https://www.mavksoft.es
Description: Añade un Widget que nos muestra la IP Pública
Author: Jose Salinas
Author URI: https://www.mavksoft.es/plugins
Version: 1.0
License: GPLv2
    Copyright 2016  Mavksoft.es  (email : admin@mavksoft.es)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
*/

function vdd_widget_ip_publica($showlink) {
	
	$vdd_ip_publica = $_SERVER['REMOTE_ADDR'];
	

	if($showlink == 'true' || $showlink == ‘0’)
	{
		$html = $vdd_ip_publica . '<div><a href="https://www.mavksoft.es/plugins" target="_blank">Mas servicios en MavkSoft</a></div>';
	}
	else
	{
		$html = $vdd_ip_publica;
	}
	
	return $html;
}

class vdd_IP_publica_Widget extends WP_Widget
{
  function __construct() 
  {
	parent::__construct('vdd_IP_publica_Widget', __('Añadir IP Pública visitantes', 'vdd_ip_publica' ), array ('description' => __( 'Widget texto para mostrar la IP pública de nuestros visitantes', 'vdd_ip_publica')));
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => 'Tu IP Pública es:', 'showlink' => ‘0’) );
    $title = $instance['title'];
    $showlink = $instance['showlink'];
	
?>

 <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>

  <p><input id="<?php echo $this->get_field_id('showlink'); ?>" name="<?php echo $this->get_field_name('showlink'); ?>" type="checkbox" value="1" <?php checked( '1', $showlink ); ?>/><label for="<?php echo $this->get_field_id('showlink'); ?>"><?php _e('&nbsp;Añadir acceso directo a www.mavksoft.es'); ?></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
	if($new_instance['showlink'] == '1')
	{
		$instance['showlink'] = '1';
	}
	else
	{
		$instance['showlink'] = '0';
	}
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
 	$showlink = $instance['showlink'];
	if($showlink == '')
	{
		$showlink = '1';
	}
	

    echo vdd_widget_ip_publica($showlink);
 
    echo $after_widget;
  }
}

add_action( 'widgets_init', create_function('', 'return register_widget("vdd_IP_publica_Widget");') );

?>