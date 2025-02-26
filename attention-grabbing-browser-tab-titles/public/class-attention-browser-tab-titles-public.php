<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://https://profiles.wordpress.org/thechetanvaghela/
 * @since      1.0.0
 *
 * @package    Attention_Browser_Tab_Titles
 * @subpackage Attention_Browser_Tab_Titles/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Attention_Browser_Tab_Titles
 * @subpackage Attention_Browser_Tab_Titles/public
 * @author     Chetan Vaghela <ckvaghela92@gmail.com>
 */
class Attention_Browser_Tab_Titles_Public {

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
		 * defined in Attention_Browser_Tab_Titles_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Attention_Browser_Tab_Titles_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/attention-browser-tab-titles-public.css', array(), $this->version, 'all' );

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
		 * defined in Attention_Browser_Tab_Titles_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Attention_Browser_Tab_Titles_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		if(!is_admin())
		{
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/attention-browser-tab-titles-public.js', array( 'jquery' ), $this->version, array('in_footer' => true, 'strategy'  => 'defer') );
		}
		$tab_title_widget = get_option('attention_browser_enable_feature');
		if (!empty($tab_title_widget)) 
		{
			$titles_only = get_option('attention_browser_title_texts', ['']);
			if (is_array($titles_only) && !empty($titles_only)) 
			{	
				// Encode the array as JSON
				$json_titles = wp_json_encode($titles_only);					
				$interval =  !empty(get_option('attention_browser_title_time')) ? get_option('attention_browser_title_time') * 1000 : 2000;
				$attention_browser_enable_homepage =  !empty(get_option('attention_browser_enable_homepage')) ? get_option('attention_browser_enable_homepage')  : false;
				
					$script_added = "
					document.addEventListener('DOMContentLoaded', function() {
						var originalTitle = document.title;
						var attentionTitles = " . wp_json_encode($titles_only) . ";
						var index = 0;
						var interval;

						function changeTitle() {
							document.title = attentionTitles[index];
							index = (index + 1) % attentionTitles.length;
						}
						window.addEventListener('blur', function() {
							interval = setInterval(changeTitle, " . esc_js($interval) . ");
						});

						window.addEventListener('focus', function() {
							clearInterval(interval);
							document.title = originalTitle;
						});
					});";
				
				if ($attention_browser_enable_homepage) {
					if (is_front_page() || is_home()) {
						wp_add_inline_script( $this->plugin_name, $script_added);
					}
				}
				else
				{
					wp_add_inline_script( $this->plugin_name, $script_added );
				}
				
			}
		}

	}
}