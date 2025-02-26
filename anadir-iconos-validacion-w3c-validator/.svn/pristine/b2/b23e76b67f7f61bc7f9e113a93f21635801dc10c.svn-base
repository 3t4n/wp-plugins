<?php
/*
Plugin Name: Widget Logotipo W3C Validator
Plugin URI: https://www.mavksoft.es
Description: Añade un Widget que nos muestra los logotipos de W3C Validator
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

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function vdd_widget_w3c_validator($xhtml1,$HTML5,$ISOHTML) {

$tipoweb = $_SERVER['SERVER_PORT'];

       if ($tipoweb == '80')
	{
	$preweb = 'http://';
	}
	else if ($tipoweb == '443')
	{
	$preweb = 'https://';
	}


	$html ='<div style="text-align:center;">';


	if($xhtml1 == 'true' || $xhtml1 == '1')
	{
		$html = $html. '

 	    <a href="http://validator.w3.org/check?uri='. $preweb . $_SERVER['HTTP_HOST'] .'" target="blank">
	    <img src="'. $preweb . $_SERVER['HTTP_HOST'] .'/wp-content/plugins/anadir-iconos-validacion-w3c-validator/Icons/valid-xhtml10.png" alt="Valid XHTML 1.0!" height="31" width="88" />
	    </a>';

	}
	

	if($HTML5 == 'true' || $HTML5 == '1')
	{
		$html = $html. '

	    <a href="https://validator.w3.org/nu/?showsource=yes&doc='. $preweb . $_SERVER['HTTP_HOST'] .'" target="blank">
	    <img src="'. $preweb . $_SERVER['HTTP_HOST'] .'/wp-content/plugins/anadir-iconos-validacion-w3c-validator/Icons/valid-HTML5.png" alt="Valid HTML 5!" height="15" width="44" />
            </a>';

	}


	if($ISOHTML == 'true' || $ISOHTML == '1')
	{
		$html = $html. '


            <a href="https://validator.w3.org/check?uri='. $preweb . $_SERVER['HTTP_HOST'] .  ';ss" target="blank">
	    <img src="'. $preweb . $_SERVER['HTTP_HOST'] .  '/wp-content/plugins/anadir-iconos-validacion-w3c-validator/Icons/valid-ISOHTML.png" alt="Valid ISO/IEC 15445:2000">
            </a>';

	}

	$html = $html. '</div>';



	return $html;
}


class vdd_w3c_validator_Widget extends WP_Widget
{
  function __construct() 
  {
	parent::__construct('vdd_w3c_validator_Widget', __('Añadir Logotipos de validación W3C'), array ('description' => __( 'Widget texto para mostrar los iconos de validación de W3C')));
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => 'Esta Página está Validada:', 'xhtml1' => '1', 'HTML5' => '1', 'ISOHTML' => '1') );
    $title = $instance['title'];
	$xhtml1 = $instance['xhtml1'];
	$HTML5 = $instance['HTML5'];
	$ISOHTML = $instance['ISOHTML'];
	
?>

 <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
  <p>
 <p>
	<label><b>Su dirección web es: </b>
		<?php 
		   $tipoweb = $_SERVER['SERVER_PORT'];

       		      if ($tipoweb == '80')
			{
			  $preweb = 'http://';
			  $postweb = ' No usa SSL';
			}
		      else if ($tipoweb == '443')
			{
			  $preweb = 'https://';
			  $postweb = ' Usa SSL';

			}
				
			echo $preweb.$_SERVER['HTTP_HOST'].$postweb; 
		?>
    	</label></p>
  <p>
</p>
  <p><input id="<?php echo $this->get_field_id('xhtml1'); ?>" name="<?php echo $this->get_field_name('xhtml1'); ?>" type="checkbox" value="1" <?php checked( '1', $xhtml1 ); ?>/><label for="<?php echo $this->get_field_id('xhtml1'); ?>"><?php _e('&nbsp;Añadir icono validación de código xHTML1.0'); ?></label></p>

<p><input id="<?php echo $this->get_field_id('HTML5'); ?>" name="<?php echo $this->get_field_name('HTML5'); ?>" type="checkbox" value="1" <?php checked( '1', $HTML5 ); ?>/><label for="<?php echo $this->get_field_id('HTML5'); ?>"><?php _e('&nbsp;Añadir icono validación de código HTML5'); ?></label></p>

<p><input id="<?php echo $this->get_field_id('ISOHTML'); ?>" name="<?php echo $this->get_field_name('ISOHTML'); ?>" type="checkbox" value="1" <?php checked( '1', $ISOHTML ); ?>/><label for="<?php echo $this->get_field_id('ISOHTML'); ?>"><?php _e('&nbsp;Añadir icono validación de código Iso HTML'); ?></label></p>


<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
	if($new_instance['xhtml1'] == '1')
	{
		$instance['xhtml1'] = '1';
	}
	else
	{
		$instance['xhtml1'] = '0';
	}

	if($new_instance['HTML5'] == '1')
	{
		$instance['HTML5'] = '1';
	}
	else
	{
		$instance['HTML5'] = '0';
	}

	if($new_instance['ISOHTML'] == '1')
	{
		$instance['ISOHTML'] = '1';
	}
	else
	{
		$instance['ISOHTML'] = '0';
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
 
 	$xhtml1 = $instance['xhtml1'];
	if($xhtml1 == '')
	{
		$xhtml1 = '1';
	}

	$HTML5 = $instance['HTML5'];
	if($HTML5 == '')
	{
		$HTML5 = '1';
	}

	$ISOHTML = $instance['ISOHTML'];
	if($ISOHTML == '')
	{
		$ISOHTML = '1';
	}
	
	
    echo vdd_widget_w3c_validator($xhtml1,$HTML5,$ISOHTML);
 
    echo $after_widget;
  }
}

add_action( 'widgets_init', create_function('', 'return register_widget("vdd_w3c_validator_Widget");') );

?>