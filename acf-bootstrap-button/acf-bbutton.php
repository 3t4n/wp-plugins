<?php

/**
 * Plugin Name: Advanced Custom Fields: Bootstrap Button
 * Plugin URI: https://wordpress.org/plugins/acf-bootstrap-button/
 * Description: Add a field to create a Bootstrap 3 or 4 Button for the popular Advanced Custom Fields plugin, with internal or external link.
 * Version: 1.1.0
 * Author: teakor
 * Author URI:
 * Text Domain: acf-bootstrap-button
 * Domain Path: /lang
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('acf_plugin_bbutton') ) :

    class acf_plugin_bbutton {

        // vars
        var $settings;

        /**
        *  __construct
        *
        *  This function will setup the class functionality
        *
        *  @type	function
        *  @date	17/04/2018
        *  @since	1.1.0
        *
        *  @param	void
        *  @return	void
        */

        function __construct() {

            // vars
            $this->settings = array(
                'version'	=> '1.1.0',
                'url'		=> plugin_dir_url( __FILE__ ),
                'path'		=> plugin_dir_path( __FILE__ )
            );


            // include field
            add_action('acf/include_field_types', 	array($this, 'include_field')); // v5
            add_action('acf/register_fields', 		array($this, 'include_field')); // v4

        }


        /**
        *  include_field_types
        *
        *  This function will include the field type class
        *
        *  @type	function
        *  @date	17/04/2018
        *  @since	1.1.0
        *
        *  @param	$version (int) major ACF version. Defaults to false
        *  @return	n/a
        */

        function include_field( $version = false) {

            if( !$version ) $version = 4;

            // load textdomain
            load_plugin_textdomain( 'acf-bootstrap-button', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' );

            // include
            include_once('fields/class-acf-field-bbutton-v' . $version . '.php');

        }

    }


    // initialize
    new acf_plugin_bbutton();

    /**
     * acf_bbutton_render()
     *
     * Generate the Bootstrap button for the frontend
     *
     *  @type	function
     *  @date	17/04/2018
     *  @since	1.1.0
     *
     * @param	$field (array)
     * @param   bool $echo
     * @return string
     *
     */
    function acf_bbutton_render($field, $echo = true){

        $bbutton = "";

        $bv = $field['bootstrap_version'];

        if($field['style_' . $bv] != "btn-link")
            $style = ( $field['outline_' . $bv] ) ? str_replace("-", "-outline-", $field['style_' . $bv]) : $field['style_' . $bv];
        else
            $style = $field['style_' . $bv];

        $block = ( $field['block'] ) ? " btn-block" : "";
        $active = ( $field['active_state'] ) ? " active" : "";
        $class = trim($style . ' ' . $field['size'] . $block . $active . ' ' . $field['css_class']);

        switch ($field['tag']){

            case "a":
                $class .= ( $field['disabled_state'] ) ? " disabled" : "";
                $target = ( $field['target'] ) ? 'target="_blank"' : "";
                $rel = ( $field['rel'] ) ? 'rel="' . $field['rel'] . '"' : "";
                $text = ( $field['text'] == "") ? $field['title'] : $field['text'];

                if($bv == 4){
                    $area_pressed = ( $field['active_state'] ) ? ' aria-pressed="true"' : "";
                    $tab = ( $field['disabled_state'] ) ? ' tabindex="-1"' : "";
                    $aria_disabled = ( $field['disabled_state'] ) ? ' aria-disabled="true"' : "";
                } else {
                    $area_pressed = "";
                    $tab = "";
                    $aria_disabled =  "";
                }

                $bbutton = sprintf('<a href="%s" class="btn %s" %s %s %s role="button" %s %s>%s</a>', esc_url($field['url']), $class, $target, $rel, $tab, $area_pressed, $aria_disabled, $text);
                break;

            case "button":
                $disabled = ( $field['disabled_state'] ) ? 'disabled' : "";
                $text = ( $field['text'] == "") ? $field['title'] : $field['text'];
                $bbutton = sprintf('<button class="btn %s" %s type="button">%s</button>', $class, $disabled, $text);
                break;

            case "input":
            case "submit":
            case "reset":
                $disabled = ( $field['disabled_state'] ) ? 'disabled' : "";
                $text = ( $field['text'] == "") ? $field['title'] : $field['text'];
                $bbutton = sprintf('<input class="btn %s" %s type="%s" value="%s">', $class, $disabled, $field['tag'],$text);
                break;
        }

        if($echo)
            echo $bbutton;
        else
            return $bbutton;
    }

// class_exists check
endif;
	
?>