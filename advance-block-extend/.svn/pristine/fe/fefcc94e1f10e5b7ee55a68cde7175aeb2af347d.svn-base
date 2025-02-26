<?php
/**
 * Plugin Name: Advance Block Extend
 * Description: The creative and advance blocks for the Gutenberg.
 * Author: Jaydip
 * Author URI: https://www.linkedin.com/in/thejaydip/
 * Text Domain: advance-block-extend
 * Version: 1.0.3
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! defined( 'GE_VERSION' ) ) {
	define( 'GE_VERSION', '1.0.3' );
}

defined( 'GE_ROOT' ) or define( 'GE_ROOT', plugin_dir_path( __FILE__ ) );
defined( 'GE_ROOT_BLOCK' ) or define( 'GE_ROOT_BLOCK', GE_ROOT. 'block/' );

defined( 'GE_ROOT_URI' ) or define( 'GE_ROOT_URI', plugins_url().'/advance-block-extend' );
defined( 'GE_ROOT_BLOCK_URI' ) or define( 'GE_ROOT_BLOCK_URI', GE_ROOT_URI. '/block/' );

if ( ! class_exists( 'Advance_Block_Extend' ) ) {

	class Advance_Block_Extend {

		public function __construct() {
			
			if ( ! function_exists( 'register_block_type' ) ) {
				// Gutenberg is not active.
				return;
			}
			add_action( 'block_categories', array( $this, 'advance_block_extend_block_categories' ), 10, 2 );
			add_action( 'init', array( $this, 'advance_block_extend_register_block' ) );
		}

		public function advance_block_extend_block_categories( $categories, $post ) {

			return array_merge(
			    $categories,
			    array(
			        array(
			            'slug'	=> 'gutenberg-extend',
			            'title' => __( 'Advance Block Extend', 'advance-block-extend' ),
			            'icon'  => 'shield',
			        ),
			    )
			);
		}

		public function advance_block_extend_register_block() {

			$block_file = array( 'posts', 'profile', 'transform', 'heading', 'button', 'cover-image', 'gallery' );
			$wpArray 	= array( 'wp-blocks', 'wp-components', 'wp-element', 'wp-i18n', 'wp-editor', 'wp-data' );
			
			if ( ! empty( $block_file ) ) {

				foreach ( $block_file as $file ) {
				
					// Register Scripts
					wp_register_script(
						$file.'-block-script',
						GE_ROOT_BLOCK_URI . $file .'/'. $file . '.js',
						$wpArray ,
						GE_VERSION,
						true
					);

					// Register Styles
					wp_register_style(
						$file. '-block-editor-style',
						GE_ROOT_BLOCK_URI .  $file .'/'. $file  . '-editor.css' ,
						array( 'wp-edit-blocks' ),
						GE_VERSION
					);

					wp_register_style(
						$file. '-block-frontend-style',
						GE_ROOT_BLOCK_URI .  $file .'/'. $file  . '-style.css' ,
						array(),
						GE_VERSION
					);

					register_block_type( 'gutenberg-extend/'.$file.'-block', array(
						'editor_script'   => $file. '-block-script',
						'editor_style'    => $file. '-block-editor-style',
						'style'           => $file. '-block-frontend-style',
						'render_callback' => 'advance_block_extend_'. $file.'_render_block',
					) );
				}
			}

			wp_register_style(
				'fontawesome',
				GE_ROOT_URI . '/font-awesome.css',
				array(),
				'4.7.0'
			);			
			wp_enqueue_style('fontawesome');
		}

	} // END of Class

	$Advance_Block_Extend = new Advance_Block_Extend();
	
} // END of Class Exists

if ( ! function_exists( 'advance_block_extend_posts_render_block' ) ) {

	function advance_block_extend_posts_render_block( $attributes, $content ) {
		
		$output 		= $styleTitle = $box_style = '';
		$arrStyle 		= array();	    
	    $TitleColor 	= ( ! empty($attributes['TitleColor'] ) ) ? 'color:'.$attributes['TitleColor'].';' : '';
	    $boxColor 		= ( ! empty($attributes['boxColor'] ) ) ? 'background-color:'.$attributes['boxColor'].';': '';	    
	    $TxtFontSize 	= ( ! empty($attributes['TxtFontSize'] ) ) ? 'font-size:'.$attributes['TxtFontSize'].'px;' : '';

		$box_style = ($attributes ) ? ' style="'.$boxColor.'"' : '';

		if ( $TitleColor ) {
			$arrStyle[] = $TitleColor;
		}

		if ( $TxtFontSize ) {
		 	$arrStyle[] = $TxtFontSize;
		}
		$styleTitle = ( is_array( $arrStyle ) && $arrStyle ) ? ' style="'. implode( "", $arrStyle ).'"' : '';
		
	    $recent_posts = wp_get_recent_posts( array(
	        'numberposts' => 5,
	        'post_status' => 'publish',
	    ) );
	   
	    if ( count( $recent_posts ) === 0 ) {
	        return __( 'No posts', 'advance-block-extend' );
	    }
	    $posts = $recent_posts;
	    
	    if ( is_array( $posts ) && ! empty( $posts) ) {

	    	$output .=  '<div class="post-list"'.$box_style.'>';
	    		
	    		$output .= '<ul>';

			    foreach ( $posts as $post ) {

			    	$post_id = $post['ID'];    	
					$output .= '<li>';

					 	$output .= '<a class="wp-block-gutenberg-extend-posts-block" href="'.get_permalink( $post_id ).'"'.$styleTitle.'>'.get_the_title( $post_id ).'</a>';

					$output .= '</li>';
				}
				$output .= '</ul>';

			$output .= '</div>';
		}
		
		return $output; 
	}
}