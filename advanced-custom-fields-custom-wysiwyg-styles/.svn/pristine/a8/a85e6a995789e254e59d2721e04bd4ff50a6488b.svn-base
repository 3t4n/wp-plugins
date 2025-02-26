<?php
/*
Plugin Name: Advanced Custom Fields - Custom WYSIWYG styles
Plugin URI: http://www.webdesign-muenchen.de/acf/
Description: Gives you the possibility to style the TinyMCE Editor of ACF with different custom styles. Every ACF WYSIWYG field can be styled differently. Put a "/css/tinymce.css" file in your theme and start styling. Every ACF WYSIWYG Editor field will have a special css-class in the body tag, which helps you to identify it.
Author: WDM
Version: 1.0
Author URI: http://www.webdesign-muenchen.de/
*/

function wdmacfcws_adminjs() { wp_enqueue_script('wdmacfcwsjs',plugins_url('/backend.js', __FILE__ )); }
function wdmacfcws_theme_setup() { add_editor_style('css/tinymce.css'); }
add_action('admin_enqueue_scripts','wdmacfcws_adminjs');
add_action('after_setup_theme','wdmacfcws_theme_setup');