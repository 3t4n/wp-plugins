<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class DocumentPress {

	/**
	 * The single instance of DocumentPress.
	 * @var 	object
	 * @access  private
	 * @since 	1.0.0
	 */
	private static $_instance = null;

	/**
	 * Settings class object
	 * @var     object
	 * @access  public
	 * @since   1.0.0
	 */
	public $settings = null;

	/**
	 * The version number.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $_version;

	/**
	 * The token.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $_token;

	/**
	 * The main plugin file.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $file;

	/**
	 * The main plugin directory.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $dir;

	/**
	 * The plugin assets directory.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $assets_dir;

	/**
	 * The plugin assets URL.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $assets_url;

	/**
	 * Suffix for Javascripts.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $script_suffix;

	public $base;

	/**
	 * Constructor function.
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function __construct ( $file = '', $version = '1.0.0' ) {
		$this->_version = $version;
		$this->_token = 'documentpress';
		$this->base = 'documentpress_';

		// Load plugin environment variables
		$this->file = $file;
		$this->dir = dirname( $this->file );
		$this->assets_dir = trailingslashit( $this->dir ) . 'assets';
		$this->assets_url = esc_url( trailingslashit( plugins_url( '/assets/', $this->file ) ) );

		$this->script_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		register_activation_hook( $this->file, array( $this, 'install' ) );

		// Load frontend JS & CSS
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ), 10 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 10 );

		// Load admin JS & CSS
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ), 10, 1 );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_styles' ), 10, 1 );

		// Load API for generic admin functions
		if ( is_admin() ) {
			$this->admin = new DocumentPress_Admin_API();
		}

		// Handle localisation
		$this->load_plugin_textdomain();
		add_action( 'init', array( $this, 'load_localisation' ), 0 );
		// add_action( 'admin_print_footer_scripts', array($this,'add_js') );
		// add_action('admin_head', array($this, 'gavickpro_add_my_tc_button'));
		add_filter( 'mce_buttons', array($this, 'myplugin_register_buttons' ));
		add_filter( 'mce_external_plugins', array($this, 'myplugin_register_tinymce_javascript' ));
		add_shortcode( 'docupress-document', array($this, 'docupress_hook_shortcode' ));
	} // End __construct ()



function docupress_hook_shortcode( $atts ) {
    extract( shortcode_atts( array(
        'url' => '',
    ), $atts ) );
    // $html = $url;
    // $bodytag = str_replace("%body%", "black", "<body text='%body%'>");

    $url = str_replace("view?usp=drive_web" , "preview", $url);
    $id = md5($url);
    $loader_link = esc_url( $this->assets_url ) . 'images/rolling.svg';
    $loadinghtml = "<div id=\"$id\"><div style='text-align:center;'>Loading embedded document<br><img src=\"$loader_link\" /></div></div>";

    $show_loader = get_option( $this->base.'show_loader' );
    // print_r($show_loader);
    if ($show_loader!="on"){
    	$loadinghtml = "";
    }

    $newhtml = "$loadinghtml<iframe src='$url' width='640' height='480' onload='document.getElementById(\"$id\").style.display=\"none\";'></iframe>";

    $html = $newhtml;
    // $rposts = new WP_Query( array( 'posts_per_page' => $numbers, 'orderby' => 'date' ) );
    // if ( $rposts->have_posts() ) {
    //     $html = '<h3>Recent Posts</h3><ul class="recent-posts">';
    //     while( $rposts->have_posts() ) {
    //         $rposts->the_post();
    //         $html .= sprintf(
    //             '<li><a href="%s" title="%s">%s</a></li>',
    //             get_permalink($rposts->post->ID),
    //             get_the_title(),
    //             get_the_title()
    //         );
    //     }
    //     $html .= '</ul>';
    // }
    // wp_reset_query();
    return $html;
}
function myplugin_register_buttons( $buttons ) {
   array_push( $buttons, 'separator', 'docupress' );
   return $buttons;
}

function myplugin_register_tinymce_javascript( $plugin_array ) {
   $restrict_uploaded_docs = get_option( $this->base.'restrict_uploaded_docs' );
   if ( $restrict_uploaded_docs != "on" ){
		$plugin_array['docupress'] = esc_url( $this->assets_url ) . 'js/buttons.js';
   }else{
   		$plugin_array['docupress'] = esc_url( $this->assets_url ) . 'js/buttons_priv.js';
   }
   
   return $plugin_array;
}
	// function gavickpro_add_tinymce_plugin($plugin_array) {
	// 	// esc_url( $this->assets_url ) . 'js/frontend' 
	//     $plugin_array['gavickpro_tc_button'] = esc_url( $this->assets_url ) . 'js/buttons.js';  // CHANGE THE BUTTON SCRIPT HERE
	//     return $plugin_array;
	// }

	// function gavickpro_register_my_tc_button($buttons) {
	//    array_push($buttons, "gavickpro_tc_button");
	//    return $buttons;
	// }

	// function gavickpro_add_my_tc_button() {
	//     global $typenow;
	//     // check user permissions
	//     if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
	//     return;
	//     }
	//     // verify the post type
	//     if( ! in_array( $typenow, array( 'post', 'page' ) ) )
	//         return;
	//     // check if WYSIWYG is enabled
	//     // if ( get_user_option('rich_editing') == 'true') {
	//     // print "ADDING FILTER";
	//     // exit();
	//         add_filter("mce_external_plugins", "gavickpro_add_tinymce_plugin");
	//         add_filter('mce_buttons', 'gavickpro_register_my_tc_button');
	//     // }
	// }


	/**
	 * Wrapper function to register a new post type
	 * @param  string $post_type   Post type name
	 * @param  string $plural      Post type item plural name
	 * @param  string $single      Post type item single name
	 * @param  string $description Description of post type
	 * @return object              Post type class object
	 */
	public function register_post_type ( $post_type = '', $plural = '', $single = '', $description = '', $options = array() ) {

		if ( ! $post_type || ! $plural || ! $single ) return;

		$post_type = new DocumentPress_Post_Type( $post_type, $plural, $single, $description, $options );

		return $post_type;
	}

	/**
	 * Wrapper function to register a new taxonomy
	 * @param  string $taxonomy   Taxonomy name
	 * @param  string $plural     Taxonomy single name
	 * @param  string $single     Taxonomy plural name
	 * @param  array  $post_types Post types to which this taxonomy applies
	 * @return object             Taxonomy class object
	 */
	public function register_taxonomy ( $taxonomy = '', $plural = '', $single = '', $post_types = array(), $taxonomy_args = array() ) {

		if ( ! $taxonomy || ! $plural || ! $single ) return;

		$taxonomy = new DocumentPress_Taxonomy( $taxonomy, $plural, $single, $post_types, $taxonomy_args );

		return $taxonomy;
	}

	/**
	 * Load frontend CSS.
	 * @access  public
	 * @since   1.0.0
	 * @return void
	 */
	public function enqueue_styles () {
		wp_register_style( $this->_token . '-frontend', esc_url( $this->assets_url ) . 'css/frontend.css', array(), $this->_version );
		wp_enqueue_style( $this->_token . '-frontend' );
	} // End enqueue_styles ()

	/**
	 * Load frontend Javascript.
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function enqueue_scripts () {
		wp_register_script( $this->_token . '-frontend', esc_url( $this->assets_url ) . 'js/frontend' . $this->script_suffix . '.js', array( 'jquery' ), $this->_version );
		wp_enqueue_script( $this->_token . '-frontend' );
	} // End enqueue_scripts ()

	/**
	 * Load admin CSS.
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function admin_enqueue_styles ( $hook = '' ) {
		// wp_register_style( $this->_token . '-admin', esc_url( $this->assets_url ) . 'css/jquery.fancybox.css', array(), $this->_version );
		// wp_enqueue_style( $this->_token . '-admin' );
	} // End admin_enqueue_styles ()

	/**
	 * Load admin Javascript.
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function admin_enqueue_scripts ( $hook = '' ) {
		wp_register_script( $this->_token . '-admin', esc_url( $this->assets_url ) .  'js/admin.min.js' , array(  ), '' );
		wp_enqueue_script( $this->_token . '-admin' );
		// wp_register_script( $this->_token . '-admin', 'http://localhost/google-api-client/admin.js' , array( $this->_token . '-admin-intercom' ), '' );
		// wp_enqueue_script( $this->_token . '-admin' );

		// wp_register_script( $this->_token . '-admin-gs', 'https://apis.google.com/js/api.js?onload=onApiLoad' , array(  ), '' );
		// wp_enqueue_script( $this->_token . '-admin-gs' );
	} // End admin_enqueue_scripts ()

	/**
	 * Load plugin localisation
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function load_localisation () {
		load_plugin_textdomain( 'documentpress', false, dirname( plugin_basename( $this->file ) ) . '/lang/' );
	} // End load_localisation ()

	/**
	 * Load plugin textdomain
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function load_plugin_textdomain () {
	    $domain = 'documentpress';

	    $locale = apply_filters( 'plugin_locale', get_locale(), $domain );

	    load_textdomain( $domain, WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo' );
	    load_plugin_textdomain( $domain, false, dirname( plugin_basename( $this->file ) ) . '/lang/' );
	} // End load_plugin_textdomain ()

	/**
	 * Main DocumentPress Instance
	 *
	 * Ensures only one instance of DocumentPress is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @static
	 * @see DocumentPress()
	 * @return Main DocumentPress instance
	 */
	public static function instance ( $file = '', $version = '1.0.0' ) {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self( $file, $version );
		}
		return self::$_instance;
	} // End instance ()

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __clone () {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?' ), $this->_version );
	} // End __clone ()

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __wakeup () {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?' ), $this->_version );
	} // End __wakeup ()

	/**
	 * Installation. Runs on activation.
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function install () {
		$this->_log_version_number();
		$settings = ($this->settings->settings["standard"]["fields"]);
	    foreach ($settings as $setting) {
	    	update_option($this->base . $setting["default"] );
	    }
	    // exit();
	} // End install ()

	/**
	 * Log the plugin version number.
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	private function _log_version_number () {
		update_option( $this->_token . '_version', $this->_version );
	} // End _log_version_number ()

}