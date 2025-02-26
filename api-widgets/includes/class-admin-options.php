<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'Api_Widgets_Admin_Options' ) ) :

/**
 * Admin Page
 * 
 * @version 1.0.0
 * 
 */
class Api_Widgets_Admin_Options {

	/**
	 * Holds an instance of the object
	 *
	 * @since 1.0.0
	 **/
	private static $instance = null;

	/**
	 * Constructor
	 * @since 1.0.0
	 */
	private function __construct() {
	}

	/**
	 * Returns the running object
	 *
	 * @since 1.0.0
	 **/
	public static function get_instance() {
		if( is_null( self::$instance ) ) {
			self::$instance = new self();
			self::$instance->hooks();
		}
		return self::$instance;
	}
	
	/**
	 * Initiate our hooks
	 * @since 1.0.0
	 */
	public function hooks() {
		add_action( 'admin_menu', array( $this, 'add_page' ) );
		add_action( "api-widgets_save_options-page_fields", array( $this, 'redirect' ), 1, 2 );
	}


	public function add_page() {
		add_submenu_page(
	        'options-general.php',
	        __( 'API Widgets', 'api-widgets' ),
	        __( 'API Widgets', 'api-widgets' ),
	        'manage_options',
	        'api-widgets',
	        array( $this, 'admin_page_display' )
	    );
	}

	/**
	 * Admin page.
	 * @since 1.0.0
	 */
	public function admin_page_display() {

		?>

		<div class="wrap api-widgets">

			<div class="main_content_cell">

				<h1 class="wp-heading-inline">
					<img width="24" height="24" src="<?php echo esc_url( API_WIDGETSURL . 'assets/img/icon.png?v=' . API_WIDGETSVERSION ); ?>" /> <?php esc_html_e( 'API Widgets', 'api-widgets' ) ?>
				</h1>

				<div class="outer-box">
					<h3>Javascript</h3>
					<p>The required Javascript snippet <b>will be automatically included</b> on the pages wherever you embed a Widget. </p>

					<hr>

					<h3>Embedding a Widget</h3>
					<p>There are several options available to embed a Widget.</p>

					<h4>Shortcode</h4>
					<p>You can embed a Widget anywhere in your site that accepts shortcodes. You just need to replace 123 with the id of your Widget.</p>
					<pre><code><?php echo htmlentities('[api-widgets id=123]'); ?></code></pre>
					
					<hr>

					<h4>Template Tag</h4>
					<p>You can embed a Widget directly into a theme template using the below template tag. You just need to replace 123 with the id of your Widget.</p>
					<pre><code><?php echo htmlentities('<?php api_widgets( 123 ); ?>'); ?></code></pre>

					<hr>

					<h4>Gutenberg Editor</h4>
					<p>When inserting a new Block in a page or post, search for API Widgets in the Block search field. Insert the Block and then within the Block settings, add the ID of your Widget and save the page or post.</p>

				</div>

			</div>

			<div class="sidebar_cell">
				
				<div class="box help-box">    
	           		<h4><?php esc_html_e( 'Connect Data Source', 'api-widgets' ); ?></h4>     
	                <p>Start here to <b>connect your API</b> or <b>JSON files</b> and convert to a Chart, Table or HTML. This will take you to the API Widgets website to connect your data scource.</p>

	                <a class="button" target="_blank" href="https://apiwidgets.com/builder ?utm_campaign=JSON Converter&utm_medium=Admin&utm_source=User"><?php esc_html_e( 'Connect Data Source', 'api-widgets' ); ?></a>

	            </div>

				<div class="box help-box">    
	           		<h4><?php esc_html_e( 'What This Plugin Does', 'api-widgets' ); ?></h4>     
	                <p>The plugin provides native WordPress methods to embed a Chart, Table or HTML Widget from <a target="_blank" href="https://www.apiwidgets.com/?utm_campaign=Link&utm_medium=Admin&utm_source=User">API Widgets</a>.</p>
	            </div>

	            <div class="box help-box">    
	           		<h4><?php esc_html_e( 'Need Help?', 'api-widgets' ); ?></h4>     
	                <ul>
						<li><a target="_blank" href="https://apiwidgets.com/docs/?utm_campaign=Docs&utm_medium=Admin&utm_source=User">View the Docs</a></li>
						<li><a target="_blank" href="https://www.apiwidgets.com/docs/what-is-a-widget/?utm_campaign=What is a Widget&utm_medium=Admin&utm_source=User"><?php esc_html_e( 'What is a Widget?', 'api-widgets' ); ?></a></li>
						<li><a target="_blank" href="https://www.apiwidgets.com/docs/convert-api-to-chart/?utm_campaign=Create a Chart&utm_medium=Admin&utm_source=User"><?php esc_html_e( 'Convert API to Chart', 'api-widgets' ); ?></a></li>
						<li><a target="_blank" href="https://www.apiwidgets.com/docs/convert-api-to-table/?utm_campaign=Create a Table&utm_medium=Admin&utm_source=User"><?php esc_html_e( 'Convert API to Table', 'api-widgets' ); ?></a></li>
						<li><a target="_blank" href="https://www.apiwidgets.com/docs/convert-api-to-html/?utm_campaign=Create HTML&utm_medium=Admin&utm_source=User"><?php esc_html_e( 'Convert API to HTML', 'api-widgets' ); ?></a></li>
	                </ul>  

					<a class="button" target="_blank" href="https://apiwidgets.com/?utm_campaign=Main link&utm_medium=Admin&utm_source=User"><?php esc_html_e( 'Visit API Widgets', 'api-widgets' ); ?></a>
	            </div>

			</div>

		</div>

		<?php

	}


}


function api_widgets_admin_options() {
	return Api_Widgets_Admin_Options::get_instance();
}

// Get it started
api_widgets_admin_options();

endif;