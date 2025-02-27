<?php

/*
Plugin Name: juxtapose
Plugin URI: http://www.juxtaposewp.com
Description: This plugin allows to place 2 images juxtaposed, it means, one over the other, with a slider in the middle. The slided can be used to show more or less of each image. This way, you can create presentations with a before/after view of a landscape, etc..
Version: 1.0.0
Author: Jordi Giménez
Author URI: http://www.jgimenez.info
License: GPLv2
*/

/* 
Copyright (C) 2015 Jordi Giménez

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
*/


if (!class_exists('JuxtaposeJG_Image')) {
	
	class JuxtaposeJG_Image {
		
		public $cssClass;
		public $style;
		public $alt;
		public $src;
		public $width;
		public $height;
		public $srcset;
		public $sizes;
		public $title;
		
		public function __construct( $html ) {
			
			// ALL ' converted to ", to make life easier
			$html= strtr( $html, array('\''=>'"'));
		
			preg_match( '~class\s*=\s*"([^"]*)"~i', $html, $match );
			$this->cssClass=  isset( $match[1] ) ? $match[1] : NULL;

			preg_match( '~style\s*=\s*"([^"]*)"~i', $html, $match );
			$this->style=  isset( $match[1] ) ? $match[1] : NULL;
		
			preg_match( '~alt\s*=\s*"([^"]*)"~i', $html, $match );
			$this->alt=  isset( $match[1] ) ? $match[1] : NULL;
		
			preg_match( '~src\s*=\s*"([^"]*)"~i', $html, $match );
			$this->src=  isset( $match[1] ) ? $match[1] : NULL;
		
			preg_match( '~width\s*=\s*"([^"]*)"~i', $html, $match );
			$this->width=  isset( $match[1] ) ? $match[1] : NULL;
		
			preg_match( '~height\s*=\s*"([^"]*)"~i', $html, $match );
			$this->height=  isset( $match[1] ) ? $match[1] : NULL;

			preg_match( '~srcset\s*=\s*"([^"]*)"~i', $html, $match );
			$this->srcset=  isset( $match[1] ) ? $match[1] : NULL;
		
			preg_match( '~sizes\s*=\s*"([^"]*)"~i', $html, $match );
			$this->sizes=  isset( $match[1] ) ? $match[1] : NULL;
		
			preg_match( '~title\s*=\s*"([^"]*)"~i', $html, $match );
			$this->title=  isset( $match[1] ) ? $match[1] : NULL;
		}
	}
	
}

if(!class_exists('JuxtaposeJG')) {
    class JuxtaposeJG   {
        
        public function __construct() {
			add_action('admin_init', array(&$this, 'admin_init'));
			add_action('admin_menu', array(&$this, 'add_menu'));
			add_action( 'wp_enqueue_scripts', array(&$this, 'register_scripts' ));
			add_shortcode('juxtapose', array(&$this,'juxtapose_shortcode'));
        }
		
		public function juxtapose_shortcode( $atts, $content, $tag  ) {
			
			if (is_null($content) || ''== trim($content)) {
				return $content;
			}
			
			$images= $this->getImages($content);
			if (2 != count($images) ) {
				return $content;
			}
			
			
			
			$output='<div class="juxtapose">';
			foreach ($images as $img) {
				$output .= '<img ';
				$output .= 'src="' . $img->src . '" ';
				$output .= 'alt="' . (isset( $img->alt ) ? $img->alt : '' ) . '" ';
				
				if (isset( $img->srcset) ) {
					$output .= 'srcset="' . $img->srcset . '" ';
				}
				if (isset( $img->sizes) ) {
					$output .= 'sizes="' . $img->sizes . '" ';
				}
				if (isset( $img->title) ) {
					$output .= 'title="' . $img->title . '" ';
				}
				
				if (isset( $img->width) ) {
					$output .= 'width="' . $img->width . '" ';
				}
				
				if (isset( $img->height) ) {
					$output .= 'height="' . $img->height . '" ';
				}
				
				$output .= "/>";
			}
			$output .= '</div>';
			wp_enqueue_script('NUKnightLab/juxtapose');
			wp_enqueue_style('NUKnightLab/juxtapose');
			
			
			return $output;
		}
		
		protected function getImages( $html ) {
			
			$images=array();
			preg_match_all( '~<img [^\>]*\ />~i', $html, $pics );
			foreach ($pics[0] as $pic) {
				$images[]= new JuxtaposeJG_Image( $pic );
			}
			return $images;
		}
		
		public function register_scripts() {
			wp_register_script('NUKnightLab/juxtapose', plugins_url('/assets/juxtapose/js/juxtapose.min.js', __FILE__ )  , array('jquery'),NULL, true);
			wp_register_style( 'NUKnightLab/juxtapose', plugins_url('/assets/juxtapose/css/juxtapose.css', __FILE__ ), NULL, NULL, NULL );
		}
			
		
		public function admin_init() {
			
		}
		
		public function add_menu() {
			 add_options_page(
				 'Juxtapose Images', 
				 'Juxtapose Images', 
				 'manage_options', 
				 'juxtapose', 
				 array(&$this, 'plugin_settings_page'));
		}
		
		public function plugin_settings_page() {
		
			if(!current_user_can('manage_options')) {
				wp_die(__('You do not have sufficient permissions to access this page.'));
			}
			include(sprintf("%s/templates/admin/settings.php", dirname(__FILE__)));
		}
    
        /**
         * Activate the plugin
         */
        public static function activate(){
			

        } 
		
        /**
         * Deactivate the plugin
         */     
        public static function deactivate(){
			
            
        } 
    } 
	
	
	register_activation_hook(__FILE__, array('JuxtaposeJG', 'activate'));
    register_deactivation_hook(__FILE__, array('JuxtaposeJG', 'deactivate'));

    // instantiate the plugin class
    $juxtaposeJG = new JuxtaposeJG();

} 
