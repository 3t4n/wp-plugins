<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.linkedin.com/in/stevestewart84/
 * @since      1.0.0
 *
 * @package    Read_mb
 * @subpackage Read_mb/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Read_mb
 * @subpackage Read_mb/public
 * @author     Steve Stewart <steve.stewart2612@gmail.com>
 */
class Read_mb_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;
	
	/**
	 * The options name to be used in this plugin
	 *
	 * @since  	1.0.0
	 * @access 	private
	 * @var  	string 		$option_name 	Option name of this plugin
	 */
	private $option_name = 'read_mb';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Read_mb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Read_mb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/read_mb-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Read_mb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Read_mb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/read_mb-public.js', array( 'jquery' ), $this->version, false );

	}
	
	/**
	*Insert JavaScript to trigger readmore in head of page
	*
	*@since   1.0.0
	*/
	
	function read_mb_javascript() {
		
		global $post;
		
		if ( has_shortcode( $post->post_content, 'readmb' ) ) { 
			echo '<script>
			function toggle_read_mb(id, more, less){

				el = jQuery("#read-mb-link" + id);
				el.html( ( el.html() == more )? less : more );
				expandReadMb(id);

			}

			function expandReadMb(id){

				el = jQuery("#read-mb-content"+ id)
				el.toggleClass("active");
				el.hasClass("active")? height = el.height()+50 : height = 0;
				el.parent().css("max-height", height);

			}
			</script>';
		}
		
	}
	
	/**
	*Insert css in head of page
	*
	*@since   1.0.0
	*/
	
	function read_mb_load_styles() { ?>
		
		<style type="text/css">
			
		.read_mb_wrap{
			max-height: 0;
			overflow: hidden;
			transition: max-height 0.3s ease-out;
			margin: 0!important;
		}
		.read_mb_link_wrap{
			margin:0!important;
		}
		
		<?php if( get_option( $this->option_name .'_display_radio' ) == 'link' ){ ?>
			
			a.read-mb-link {		 
				color: <?php echo get_option($this->option_name .'_text_color'); ?>;
				font-size: <?php echo get_option($this->option_name .'_font_size'); ?>;	 
			}

			a.read-mb-link:hover { 
				color: <?php echo get_option($this->option_name .'_text_hover'); ?>; 
			}
		
		<?php }elseif( get_option( $this->option_name .'_display_radio' ) == 'button' ){ ?>
				a.read-mb-link {
					text-decoration: none!important;
					padding: 7px 10px;
					display: inline-block;
					text-align: center;
					width: <?php echo get_option($this->option_name .'_width'); ?>;
					color: <?php echo get_option($this->option_name .'_text_color'); ?>;
					font-size: <?php echo get_option($this->option_name .'_font_size'); ?>;
					background-color: <?php echo get_option($this->option_name .'_button_background'); ?>;
				}

				.read-mb-link:hover { 
					color: <?php echo get_option($this->option_name .'_text_hover'); ?>;
					background-color: <?php echo get_option($this->option_name .'_button_hover'); ?>;
				}
			
		<?php } ?>

		</style>
		<?php 
	}
	
	
	
	public function read_mb_main($atts, $content = null) {
		
		extract(shortcode_atts(array(
			'read_mb_read_more_text' => 'Read More',
			'less' => 'Read Less'
		), $atts));

		mt_srand((double)microtime() * 1000000);
		$rnum = mt_rand();
		
		if( get_option( $this->option_name .'_display_position' ) == 'below' ){
			
			$new_string = '<div class="read_mb_wrap"><p class="read-mb-content" id="read-mb-content' . $rnum . '">' . do_shortcode($content) . '</p></div>'. "\n";
			$new_string .='<div class="read_mb_link_wrap"><a onclick="toggle_read_mb(' . $rnum . ', \'' . get_option($this->option_name .'_read_more_text') . '\', \'' . get_option($this->option_name .'_read_less_text') . '\'); return false;" class="read-mb-link" id="read-mb-link' . $rnum . '" href="#">' . get_option($this->option_name .'_read_more_text') . '</a></div>';
			
		}else{
			
			$new_string ='<div class="read_mb_link_wrap"><a onclick="toggle_read_mb(' . $rnum . ', \'' . get_option($this->option_name .'_read_more_text') . '\', \'' . get_option($this->option_name .'_read_less_text') . '\'); return false;" class="read-mb-link" id="read-mb-link' . $rnum . '" href="#">' . get_option($this->option_name .'_read_more_text') . '</a></div>'. "\n";
			$new_string .= '<div class="read_mb_wrap"><p class="read-mb-content" id="read-mb-content' . $rnum . '">' . do_shortcode($content) . '</p></div>'. "\n";
			
		}
		
		
		return $new_string;
	}

}
