<?php
/**
 * Plugin Name: Load low source image first
 * Plugin URI: http://www.rogierlankhorst.com/load-low-source-image-first
 * Description: Plugin to load a default small image first.
 * Version: 1.1.1
 * Text Domain: llsif-load-low-source-image-first
 * Domain Path: /lang
 * Author: Rogier Lankhorst
 * Author URI: http://www.rogierlankhorst.com
 * License: GPL2
 */

/*  Copyright 2014  Rogier Lankhorst  (email : rogier@rogierlankhorst.com)

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

    LLSIF: load low source image first

    available filters:
    llsif_replace_images: to filter the buffer including the replaced images
    llsif_set_imagefile : to change the default s.png small lowsource image
*/
defined('ABSPATH') or die("you do not have acces to this page!");

class llsif_load_low_source_image_first {
    public $plugin_url;
    public $img_file;

    public function __construct()
    {
        $this->plugin_url = trailingslashit(WP_PLUGIN_URL).trailingslashit(dirname(plugin_basename(__FILE__)));
        $this->img_file = apply_filters( 'llsif_set_imagefile', $this->plugin_url.'img/s.png');
        add_action('init', array($this, 'load_translation'));
        add_action( 'wp_enqueue_scripts', array($this, 'enqueue_assets'));
        add_filter('template_include', array($this,'replace_images_with_lowsource'),1);
    }

    public function load_translation()
    {
        load_plugin_textdomain('llsif-load-low-source-image-first', FALSE, dirname(plugin_basename(__FILE__)).'/lang/');
    }

    public function enqueue_assets()
    {
        wp_enqueue_script( "llsif", $this->plugin_url."llsif.js",array('jquery'),'1.0.0', true );
    }

    public function replace_images_with_lowsource($template) {
      ob_start(array($this, 'end_buffer_capture'));  // Start Page Buffer
      return $template;
    }

    public function end_buffer_capture($buffer) {
        //find image in buffer
        $imgpos = strpos($buffer,"<img ");
        $datapos = strpos($buffer, " data-");
        //while not reached end of file
        While ($imgpos!==false) {
            $endimgpos = strpos($buffer, ">", $imgpos);
            $srcpos = strpos($buffer," src=",$imgpos);

            //replace only if the encountered closingtag comes after the src property
            //and if the encountered dataproperty is not within the current img tag
            if ($endimgpos>$srcpos && $datapos>$endimgpos) {
                //the srcpos appears to be inside the image tag, replace the $srcpos
                $buffer = substr_replace($buffer,' src="'.$this->img_file.'" highsrc=',$srcpos,5);
            }
            //find next img tag
            $datapos = strpos($buffer, " data-", $endimgpos);
            $imgpos = strpos($buffer,"<img ",$endimgpos);
        }
        return apply_filters( 'llsif_replace_images', $buffer );
    }
}

$llsif_load_low_source_image_first = new llsif_load_low_source_image_first();
unset($llsif_load_low_source_image_first);
