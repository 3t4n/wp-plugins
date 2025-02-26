<?php
/**
 * Registers all block files by including them from their respective block folders.
 */
 
 // Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;


// Include the Women's Day slider block
require_once plugin_dir_path( __FILE__ ) . '../blocks/mega-slider/hero-slider/block-mega-slider.php';

// Include other blocks similarly

