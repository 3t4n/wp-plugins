<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.daivdschlegl.at
 * @since      1.0.0
 *
 * @package    Bfelan
 * @subpackage Bfelan/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Bfelan
 * @subpackage Bfelan/public
 * @author     David Schlegl <schlegld@gmail.com>
 */
class Bfelan_Public {

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
		 * defined in Bfelan_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bfelan_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bfelan-public.css', array(), $this->version, 'all' );

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
		 * defined in Bfelan_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bfelan_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bfelan-public.js', array( 'jquery' ), $this->version, false );

	}
	
	/**
	 * Load CSS Code
	 * 
	 * @since    1.0.0
	*/
	public function load_css_code() {
		$options = get_option($this->plugin_name);
		$tx_text = ( isset( $options['tx_text'] ) && ! empty( $options['tx_text'] ) ) ? esc_attr( $options['tx_text'] ) : '*';
		$cb_underline = ( isset( $options['cb_underline'] ) && ! empty( $options['cb_underline'] ) ) ? 1 : 0;
		$cb_border = ( isset( $options['cb_border'] ) && ! empty( $options['cb_border'] ) ) ? 1 : 0;
		$sl_textsize = ( isset( $options['sl_textsize'] ) && ! empty( $options['sl_textsize'] ) ) ? esc_attr( $options['sl_textsize'] ) : '1';
			
		
		?>

		<style>
			.externlink sup:after {
				color: #424242; 
				content: "<?php echo $tx_text ?>";
			}
		</style>

		<?php
			
		if ($cb_underline == 1)
		{
			?>
			
			<style>
				a *{
					text-decoration: none;
					display: inline-block;
				}
			</style>
				
			<?php
		}
		
		if ($cb_border == 1)
		{
			?>
			
			<style>
				.externlink sup:after {
					border: 1px;
					border-style: solid;
					border-width: thin;
					border-color: #424242;
					padding: 0.3px;
					border-spacing: 3px;
					display: inline;
					vertical-align: baseline;
				}
			</style>
			
		<?php
		}
			
		if ($sl_textsize == 'small')
		{
			?>
			
			<style>
				.externlink sup:after {
					font-size: 0.5em;
				}
			</style>
		
		<?php
		}
			
		if ($sl_textsize == 'medium')
		{
			?>
			
			<style>
				.externlink sup:after {
					font-size: 0.75em;
				}
			</style>
					
		<?php
		}
			
		if ($sl_textsize == 'large')
		{
			?>
			
			<style>
				.externlink sup:after {
					font-size: 1em;
				}
			</style>
				
			<?php
		}
	}
}
