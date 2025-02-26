<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       www.stpetedesign.com
 * @since      1.0.0
 *
 * @package    Aa508_Call
 * @subpackage Aa508_Call/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Aa508_Call
 * @subpackage Aa508_Call/public
 * @author     stpetedesign <foucciano@gmail.com >
 */
class Aa508_Call_Public {

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
		add_action('wp_footer', array($this, 'add_button'));
	}

	function add_button(){
		$button_type = get_option('button-type', 'button0');
		$button_text = get_option('button-text', 'For Disability Assistance Call');
		$href = get_option('phone_number', false);
		$position = get_option('button-position', 'br');
		$assistence_label = get_option('ass-label', 'If you are using a screen reader and need help please use this button for assistance');
		if($href !== false && $href != ""):
		echo '<a aria-label="'.esc_html($assistence_label).'" href="tel:'.$href.'" class="'.$button_type.' '.$position.' aa-button" data-target="button0">';
		echo $button_text;
		echo '<br>';
		echo esc_html($href);
		echo '</a>';
		endif;
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
		 * defined in Aa508_Call_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Aa508_Call_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/aa-call-public.css', array(), $this->version, 'all' );
		$this->button_style_backend();
	}

	function button_style_backend(){
		$bg = get_option('aa-bg-color', "#13a503");
		$bg_hover = get_option('aa-bg-hover-color', "#13a503");
		$text = get_option('aa-text-color', "#fff");
		$text_hover = get_option('aa-text-hover-color', "#fff");
		$br = get_option('border-radius', 20);
		$lrp = get_option('x-padding', 15);
		$tbp = get_option('y-padding', 10);
		$fs = get_option('font-size', 20);
		$fw = get_option('font-weight', 700);

		$hide_button = get_option('hide-button','show-all');

		$button_css = '
			.aa-button{
				background-color:'.$bg.';
				color: '.$text.';
				border-radius:'.$br.'px;
				padding-left:'.$lrp.'px;
				padding-right:'.$lrp.'px;
				padding-top:'.$tbp.'px;
				padding-bottom:'.$tbp.'px;
				font-size:'.$fs.'px;
				font-weight:'.$fw.';
				transition:all 0.2s;
				text-align:center;
				'.($hide_button == 'show-reader-only' ? 'display:none;': '').'
			}

			.aa-button:hover{
				background-color:'.$bg_hover.';
				color:'.$text_hover.';
				-webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
			}
		';
		wp_add_inline_style( $this->plugin_name, $button_css);
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
		 * defined in Aa508_Call_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Aa508_Call_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/aa-call-public.js', array( 'jquery' ), $this->version, false );

	}

}
