<?php
/**
 *
 * @package   Simple_News_Ticker
 * @author    Mimo <mimocontact@gmail.com>
 * @license   GPL-2.0+
 * @link      http://mimo.media
 * @copyright 2014 Mimo
 *
 * @wordpress-plugin
 * Plugin Name:       Simple News Ticker
 * Plugin URI:        http://mimo.media
 * Description:       Create a ticker of posts, pages or whatever Custom Post Type you have
 * Version:           1.0.2
 * Author:            Mimo
 * Author URI:        http://mimothemes.com
 * Text Domain:       simple-news-ticker 
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /lang
 */
 
 // Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

class Simple_News_Ticker extends WP_Widget {

    /**
     * Unique identifier for this widget.
     *
     * @since    1.0.0
     *
     * @var      string
     */
    protected $widget_slug = 'simple_news_ticker';
   
   

	/*--------------------------------------------------*/
	/* Constructor
	/*--------------------------------------------------*/

	/**
	 * Specifies the classname and description, instantiates the widget,
	 * loads localization files, and includes necessary stylesheets and JavaScript.
	 */
	public function __construct() {

		// load plugin text domain
		add_action( 'init', array( $this, 'widget_textdomain' ) );

		// Hooks fired when the Widget is activated and deactivated
		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

		parent::__construct(
			$this->get_widget_slug(),
			__( 'Simple News Ticker', $this->get_widget_slug() ),
			array(
				'classname'  => ' ' . $this->get_widget_slug(),
				'description' => __( 'Create a ticker of any Post, page or Custom Post Type with a lot of options.', 'simple-news-ticker' )
			)
		);

		

		// Register site styles and scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'register_widget_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_widget_scripts' ) );

		// Refreshing the widget's cached output with each new post
		add_action( 'save_post',    array( $this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( $this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( $this, 'flush_widget_cache' ) );

	} // end constructor


    /**
     * Return the widget slug.
     *
     * @since    1.0.0
     *
     * @return    Plugin slug variable.
     */
    public function get_widget_slug() {
        return $this->widget_slug;
    }

    public function get_widget_id() {
        return $this->id;
    }

    public static function get_defaults(){

    	$defaults = array(
                'title' => '' , 
                'offset' => '0',
                'ntax' => '' ,
                'showposts' => '12' ,
                'posttype' => 'post' ,
                'exclude' => '' ,
                'titlewords' => '5',
                

            );

    	return $defaults;
    }
	/*--------------------------------------------------*/
	/* Widget API Functions
	/*--------------------------------------------------*/

	/**
	 * Outputs the content of the widget.
	 *
	 * @param array args  The array of form elements
	 * @param array instance The current instance of the widget
	 */
	public function widget( $args, $instance ) {

		
		// Check if there is a cached output
		$cache = wp_cache_get( $this->get_widget_slug(), 'widget' );

		if ( !is_array( $cache ) )
			$cache = array();

		if ( ! isset ( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset ( $cache[ $args['widget_id'] ] ) )
			return print $cache[ $args['widget_id'] ];
		
		// go on with your widget logic, put everything into a string and …

		$simple_news_ticker_defaults = $this->get_defaults();

		foreach($simple_news_ticker_defaults as $value => $defaultvalue){
			$$value = apply_filters( 'widget_' . $value, $instance[ $value ]); 
		}
		

		extract( $args, EXTR_SKIP );

		$widget_string = $before_widget;


		$simple_news_ticker_defaults = $this->get_defaults();
		foreach($simple_news_ticker_defaults as $value => $defaultvalue){
			$$value = empty($instance[$value]) ? $defaultvalue : apply_filters($value, $instance[$value]);
		}

		ob_start();
		include( plugin_dir_path( __FILE__ ) . 'views/widget.php' );
		$widget_string .= ob_get_clean();
		$widget_string .= $after_widget;


		$cache[ $args['widget_id'] ] = $widget_string;

		wp_cache_set( $this->get_widget_slug(), $cache, 'widget' );
		$simple_news_ticker_widget_id = $args['widget_id'];
		

		print $widget_string;

	} // end widget

	
	
	
	public function flush_widget_cache() 
	{
    	wp_cache_delete( $this->get_widget_slug(), 'widget' );
	}
	/**
	 * Processes the widget's options to be saved.
	 *
	 * @param array new_instance The new instance of values to be generated via the update.
	 * @param array old_instance The previous instance of values before the update.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance = array();
		$simple_news_ticker_defaults = $this->get_defaults();

		foreach($simple_news_ticker_defaults as $value => $defaultvalue){
			$instance[$value] = ( ! empty( $new_instance[$value] ) ) ? strip_tags( $new_instance[$value] ) : ''; 

			$$value = apply_filters( 'widget_' . $value, $instance[ $value ]); 
		}
		
		

		return $instance;

	} // end widget

	/**
	 * Generates the administration form for the widget.
	 *
	 * @param array instance The array of keys and values for the widget.
	 */
	public function form( $instance ) {

		$simple_news_ticker_defaults = $this->get_defaults();

		foreach($simple_news_ticker_defaults as $value => $defaultvalue){
			if ( isset( $instance[ $value ] ) ) { $$value = $instance[ $value ]; }	else { $$value = $defaultvalue;};
		}

		$instance = wp_parse_args(
            (array)$instance, $simple_news_ticker_defaults
        );

		

		// Display the admin form
		include( plugin_dir_path(__FILE__) . 'views/admin.php' );
		

	} // end form

	
	

	


	

	/**
	 * Loads the Widget's text domain for localization and translation.
	 */
	public function widget_textdomain() {

		load_plugin_textdomain( $this->get_widget_slug(), false, plugin_dir_path( __FILE__ ) . 'lang/' );

	} // end widget_textdomain

	/**
	 * Fired when the plugin is activated.
	 *
	 * @param  boolean $network_wide True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog.
	 */
	public function activate( $network_wide ) {
		// define activation functionality here
	} // end activate

	/**
	 * Fired when the plugin is deactivated.
	 *
	 * @param boolean $network_wide True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog
	 */
	public function deactivate( $network_wide ) {
		// define deactivation functionality here
	} // end deactivate

	/**
	*Loads custom inline styles
	*
	*
	*/





	

	/**
	 * Registers and enqueues widget-specific styles.
	 */
	public function register_widget_styles() {

		wp_enqueue_style( $this->get_widget_slug().'-widget-styles', plugins_url( 'css/widget.css', __FILE__ ) );
		wp_enqueue_style( $this->get_widget_slug().'-widget-styles', plugins_url( 'css/custom.css', __FILE__ ) );
		
		



	} // end register_widget_styles

	/**
	 * Registers and enqueues widget-specific scripts.
	 */
	public function register_widget_scripts() {

		wp_enqueue_script( $this->get_widget_slug().'-script', plugins_url( 'js/widget.js', __FILE__ ), array('jquery') );
		wp_enqueue_script( $this->get_widget_slug().'-flexslider', plugins_url( 'js/jquery.flexslider.js', __FILE__ ), array('jquery') );
		


	} // end register_widget_scripts

} // end class

add_action( 'widgets_init', create_function( '', 'register_widget("Simple_News_Ticker");' ) );
