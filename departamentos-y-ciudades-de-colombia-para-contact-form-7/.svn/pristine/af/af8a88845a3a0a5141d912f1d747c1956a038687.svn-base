<?php
/*
* @wordpress-plugin
* Plugin Name:       Departamentos y Ciudades de Colombia para Contact Form 7
* Plugin URI:        https://jupa.co/wordpress/contact-form-7/departamentos-y-ciudades-de-colombia-para-contact-form-7/
* Description:       Este plugin es un addon para Contact Form 7 que permite listar ciudades y departamentos de Colombia. Para listar departamentos usar: [dycccf7_state departamento]. Para listar ciudades usar: [dycccf7_city ciudad].
* Version:           1.2.0
* Author:            Jupa
* Author URI:        https://www.jupa.co/
* License:           GPL-2.0+
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
* Text Domain:       dycccf7
* Domain Path:       /languages
* Requires Plugins:  contact-form-7
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'DYCCCF7_VERSION', '1.2.0' );

function dycdc_embed_js() {
   wp_enqueue_script( 'dycccf7_main', plugin_dir_url( __FILE__ ) . 'includes/js/dycccf7.js', array(), DYCCCF7_VERSION, true );
}

function dycdc_set_tags() {
   
	add_action('wpcf7_init', function () {
      wpcf7_add_form_tag(array('dycccf7_state', 'dycccf7_state*'), 'dycccf7_state_select', array('name-attr' => true));
   });
   
	add_action('wpcf7_init', function () {
		wpcf7_add_form_tag(array('dycccf7_city', 'dycccf7_city*'), 'dycccf7_city_select', array('name-attr' => true));
   });

   add_filter('wpcf7_validate_dycccf7_state', 'dycccf7_validate_select', 10, 2);
   add_filter('wpcf7_validate_dycccf7_state*', 'dycccf7_validate_select', 10, 2);

   add_filter('wpcf7_validate_dycccf7_city', 'dycccf7_validate_select', 10, 2);
   add_filter('wpcf7_validate_dycccf7_city*', 'dycccf7_validate_select', 10, 2);

}

function dycccf7_state_select($tag) {
   
	$tag = new WPCF7_FormTag($tag);
   if (empty($tag->name)) return '';

   $validation_error = wpcf7_get_validation_error($tag->name);
   $class = wpcf7_form_controls_class($tag->type, 'wpcf7-select');

   $atts = array(
      'class' => $tag->get_class_option($class),
      'aria-required' => $tag->is_required() ? 'true' : 'false',
      'aria-invalid' => $validation_error ? 'true' : 'false',
      'name' => $tag->name,
   );

   $atts = wpcf7_format_atts($atts);

   return sprintf(
      '<span class="wpcf7-form-control-wrap" data-name="%s"><select id="dycccf7-states" %s><option value="">%s</option></select></span>',
      esc_attr($tag->name),
      $atts,
      esc_html__('Elige un departamento', 'dycccf7')
   );

}

function dycccf7_city_select($tag) {
   
	$tag = new WPCF7_FormTag($tag);
   if (empty($tag->name)) return '';

   $validation_error = wpcf7_get_validation_error($tag->name);
   $class = wpcf7_form_controls_class($tag->type, 'wpcf7-select');

   $atts = array(
      'class' => $tag->get_class_option($class),
      'aria-required' => $tag->is_required() ? 'true' : 'false',
      'aria-invalid' => $validation_error ? 'true' : 'false',
      'name' => $tag->name,
      'disabled' => 'disabled',
   );

   $atts = wpcf7_format_atts($atts);

   return sprintf(
      '<span class="wpcf7-form-control-wrap" data-name="%s"><select id="dycccf7-cities" %s><option value="">%s</option></select></span>',
      esc_attr($tag->name),
   	$atts,
   	esc_html__('Elige una ciudad', 'dycccf7')
   );

}

function dycccf7_validate_select($result, $tag) {
   
	$tag = new WPCF7_FormTag($tag);
   $name = $tag->name;
   if ($tag->is_required() && empty($_POST[$name])) {
      $result->invalidate($tag, __('Por favor, rellena este campo.', 'dycccf7'));
   }
   return $result;

}

if (class_exists('WPCF7')) {
   
	add_action('wp_enqueue_scripts', 'dycdc_embed_js');
   dycdc_set_tags();

}