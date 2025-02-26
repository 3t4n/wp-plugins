<?php
/*

Plugin Name: Featured Heroes Slideshow
Plugin URI: http://atlanticbt.com/blog/wordpress-plugin-featured-heroes-slideshow
Description: Slideshow of custom Posts
Author: atlanticbt, zaus, heyoka
Version: 0.2.2
Author URI: http://atlanticbt.com
Changelog:
	0.1.0 - split from Snapsite core
	0.1.1 - encapsulated "featured content", added shortcode
 	0.2 - cleanup, query change, template reconfigure
	0.2.1 - namechange for clarity
    0.2.2 - additional documentation and code cleanup
*/


require_once('abt_featured_content.class.php');

/**
 * Encapsulate slider
 */
class abt_featured_heroes extends abt_featured_content {
	
	const VERSION = '0.2.1';
	
	public function __construct(){
		//call base with appropriate parameters
		parent::__construct( 'abt-heroes', 'Hero', 'Heroes' );
		
		add_action( 'wp_footer', array( &$this, 'print_scripts' ) );
		
		//register shortcode
		add_shortcode( 'abt_slider_hero', array(&$this, 'shortcode_slider') );
		
	}
	
	/**
	 * Register scripts and such
	 */
	public function init(){
		wp_register_script( 'jquery-cycle', plugins_url( 'theme_files/jquery.cycle.all.min.js', __FILE__ ), array( 'jquery' ), '2.99', true );
		wp_register_script( 'abt-heroes-init', plugins_url( 'theme_files/script.js', __FILE__ ), array( 'jquery', 'jquery-cycle' ), self::VERSION, true );
		
		return parent::init();
	}

	/**
	 * Jedi Master way - conditionally include scripts
	 * @see http://scribu.net/wordpress/optimal-script-loading.html
	 */
	static $add_script;
	static $shortcode_options;
	/**
	 * Hook to footer to print scripts, only if shortcode called
	 * @link http://scribu.net/wordpress/optimal-script-loading.html
	 */
	function print_scripts(){
		if( ! self::$add_script ) return;	// only if included once
		
		#plugins_url('styles.css', __FILE__)
		
		wp_enqueue_scripts( 'jquery-cycle' );
		// use localize to pass arbitrary data (stylesheet path)
		$plugin_js_data = apply_filters(
	        __CLASS__ . '_localize',
	        array(
    			'stylesheet' => plugins_url( 'theme_files/styles.css', __FILE__ ),
                'speed'      => self::$shortcode_options['speed'],
                'timeout'    => self::$shortcode_options['timeout'],
                'fx'         => self::$shortcode_options['fx'],
                'style'      => self::$shortcode_options['style'],
                'width'      => self::$shortcode_options['width'],
                'height'     => self::$shortcode_options['height'],
    		)
        );
		wp_localize_script( 'jquery-cycle', __CLASS__, $plugin_js_data );	// localize after target
		wp_print_scripts( 'abt-heroes-init' );	// need to print at least one?
	}
	
	
	
	function shortcode_slider( $atts, $content = null, $code = "" ) {
		// $atts	 ::= array of attributes
		// $content ::= text within enclosing form of shortcode element
		// $code	 ::= the shortcode found, when == callback name
		// examples: [my-shortcode]
		//			 [my-shortcode/]
		//			 [my-shortcode foo='bar']
		//			 [my-shortcode foo='bar'/]
		//			 [my-shortcode]content[/my-shortcode]
		//			 [my-shortcode foo='bar']content[/my-shortcode]
		
		// pass options on to footer script
		self::$shortcode_options = shortcode_atts(
	        array(
    			'width' => '100%',
    			'height' => '400px',
    			'order' => 'asc',
    			'orderby' => 'menu_order',
    			'speed' => 600,
    			'timeout' => 7000,
    			'classes' => '',
    			'postType' => $this->postType,
    			'style' => 'photo', // | thumbnail
    			'fx' => 'fade', // shuffle, zoom, fade, turnDown, curtainX, scrollRight
			),
	        $atts
        );
		extract( self::$shortcode_options );
		
		$my_query = new WP_Query(
	        array(
                'post_type' => $postType,
                'orderby'   => $orderby,
                'order'     => $order,
            )
        );
		//don't do the rest if we don't have heroes
		if ( !$my_query->have_posts() ) return '';
		
		
		//jedi trigger for page styles - see abt_featured_content
		self::$add_script = true;
		
		// must return the output!  use the following to intercept nicely formatted html
		ob_start();
		
		// check for theme override, otherwise use default template
		if ( '' == ( $template_file = locate_template( 'hero-slider-content.php' ) ) ) {
			$template_file = 'theme_files/hero-slider-content.php';
		}
		include( $template_file );
		
		// return the output (and stop the buffer)
		return ob_get_clean();
	}
	
	/**
	 * Dump the slider (using the shortcode, internally)
	 * @param array $atts {optional} override shortcode parameters
	 */
	public static function embed( $atts = array() ) {
		//build attribute string
		$att_str = '';
		foreach ( $atts as $att => $value ) {
			$att_str .= " $att=\"$value\"";
		}
		
		echo '<div id="abt-slides" style="display:none;">';
		echo do_shortcode( "[abt_slider_hero $att_str]" );
		echo '</div>';
	}//--	fn	embed
}

//instantiate
new abt_featured_heroes();
?>