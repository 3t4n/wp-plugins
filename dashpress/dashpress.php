<?php
/*
Plugin Name: DashPress
Plugin URI: http://wordpress.org/extend/plugins/dashpress/
Description: The ultimate Dashboard management plugin
Author: Andre Renaut
Requires at least: 5.0
Tested up to: 5.4
Version: 5.0.1
Author URI: http://www.mailpress.org
*/

/** Absolute path to the DashPress directory. */
define ( 'DBP_ABSPATH', 	__DIR__ . '/');

/** Folder name of DashPress plugin. */
define ( 'DBP_FOLDER', 	basename( DBP_ABSPATH ));

/** Relative path to the DashPress directory. */
define ( 'DBP_PATH', 		PLUGINDIR . '/' . DBP_FOLDER . '/' );

class DashPress
{
	const option_name  = 'plugin_dashpress_core_options';
	const option_boxes = 'plugin_dashpress_core_boxes';
	const option_wdgts = 'plugin_dashpress_core_widgets';

	const maxwidgets	 = 9;

	function __construct() 
	{
		if ( !is_admin() ) return;

		spl_autoload_register( 			array( &$this, 'autoload' ) );

		remove_action( 'welcome_panel', 'wp_welcome_panel' );
		add_action( 'wp_dashboard_setup', 	array( &$this, 'wp_dashboard_setup' ), 1000 );
		add_action( 'wp_ajax_dbp_ajax',		array( &$this, 'wp_ajax_dbp_ajax' ) );
	} 

	function autoload( $class )
	{
		if ( 0 == strpos( $class, 'DBP_' ) )
		{
			$file = DBP_ABSPATH . "dbp-admin/class/{$class}.class.php";
			if ( is_file( $file ) ) return require $file;
		}
		return false;
	}

	function wp_dashboard_setup()
	{
		if ( !function_exists( 'wp_add_dashboard_widget' ) ) return;

	// for widget(s)
		$this->get_count();
		if ( !$this->count ) return;

	// for gettext
		load_plugin_textdomain( 'DashPress', false, DBP_PATH . 'dbp-content/languages' );

	// for css
		$this->print_styles();

	// for js
		$this->print_scripts();

	// for templates
		add_action( 'admin_footer', array( &$this, 'admin_footer' ) );

	// creating widget instances
		for ( $i = 1; $i <= $this->count ; $i++ ) new DBP_Widget( $i );

	// for filtering widgets
		global $wp_meta_boxes, $dbp_boxes;

		$init = array();
		$page = 'dashboard';
		$visible = ( current_user_can( 'edit_dashboard' ) ) ? get_user_option( self::option_boxes ) : get_option( self::option_boxes );	
		if ( !is_array( $visible ) ) $visible = array();
		foreach ( array_keys( $wp_meta_boxes[$page]) as $context )
		{ 
			foreach ( array_keys( $wp_meta_boxes[$page][$context]) as $priority ) 
			{
				foreach ( $wp_meta_boxes[$page][$context][$priority] as $key => $box ) 
				{
					if ( $visible && !in_array( $key, $visible ) ) unset( $wp_meta_boxes[$page][$context][$priority][$key] );
					$dbp_boxes[] = array( 'id' => $box['id'], 'title' => (strpos($box['title'], ' <span') ? substr($box['title'],0,strpos($box['title'], ' <span' ) ) : $box['title']), 'checked' => ( in_array($box['id'], $visible ) ) ? 1 : 0);
					$init[] = $box['id'];
				}
			}
		}

		if ( !$visible ) self::update_user_option( self::option_boxes, $init );
	}

	function get_count() 
	{
		if ( !current_user_can( 'edit_dashboard' ) )
		{
			$option = get_option( self::option_wdgts );
			$this->count = ( is_array( $option ) ) ? count( $option ) : 0;
			return;
		}

		$this->count = get_user_option( self::option_name );
		if ( $this->count ) return;

		self::update_user_option( self::option_name, $this->count = 1 );
	}

	function print_styles()
	{
		$pathcss	= DBP_ABSPATH . 'dbp-admin/css/colors_' . get_user_option( 'admin_color' ) . '.css';
		$css		= '/' . DBP_PATH . 'dbp-admin/css/colors_' . get_user_option( 'admin_color' ) . '.css';
		$css_def	= '/' . DBP_PATH . 'dbp-admin/css/colors_fresh.css';
		$css		= ( is_file( $pathcss ) ) ? $css : $css_def;
		wp_register_style( __CLASS__ . '_colors', 	$css );

		wp_register_style( __CLASS__ , '/' . DBP_PATH . 'dbp-admin/css/dbp.css', array( __CLASS__ . '_colors' ) );
		wp_enqueue_style( __CLASS__ );
	}

	function print_scripts()
	{
		wp_register_script( __CLASS__ , '/' . DBP_PATH . 'dbp-admin/js/dbp.js' );
		wp_localize_script( __CLASS__ , 'dbpL10n', array( 
			'url' 		=> admin_url( 'admin-ajax.php' ),
			'count'		=> $this->count,
			'can_edit'	=> current_user_can( 'edit_dashboard' ) ? 1 : 0,
			'set'		=> esc_js( __( 'Set default', 'DashPress' ) ),
			'erase'		=> esc_js( __( 'Erase default', 'DashPress' ) ),

			'cancel'	=> esc_js( __( 'Cancel' ) ),

			'handlers' 	=> esc_js( sprintf( '<a href="#" class="edit-box spin" %3$s></a><a href="#" class="edit-box open-box" %3$s>%1$s</a><a href="#" class="edit-box close-box" %3$s>%2$s</a>', __( 'Configure', 'GDPress' ), __( 'Cancel',    'GDPress' ), 'style="display:none;"' ) ),
			'images' 	=> sprintf( esc_js( __( 'By activating this option, you are informed that %1$simages from external sites will be displayed. %1$sThis process can collect personal data.', 'DashPress' ) ), "\r\n" ),
		));
		wp_enqueue_script( __CLASS__ );
	}

	function admin_footer() 
	{
		require_once( DBP_ABSPATH . 'dbp-admin/includes/admin_footer.php' );
	}

	public static function update_user_option( $option_name, $newvalue ) 
	{
		global $user_ID;
		return update_user_option( $user_ID, $option_name, $newvalue );
	}

	function wp_ajax_dbp_ajax()
	{
		new DBP_Ajax();
	}
}
new DashPress();