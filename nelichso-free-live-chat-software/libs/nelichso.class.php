<?php
	require_once('nelichso.widget.php');

	CLASS nelichso
	{
		protected static $instance ;
		protected $plugin_path = null ;
		protected $nelichso_html_code = null ;

		protected function __construct()
		{
			add_action( 'widgets_init', create_function( null, 'return register_widget("nelichso_widget") ;' ) ) ;
		}

		public static function get_instance()
		{
			if ( !isset( self::$instance ) ) { $nelichso_class = __CLASS__ ; self::$instance = new $nelichso_class ; }
			return self::$instance ;
		}

		public function fetch_nelichso_wp_plugin_path()
		{
			if ( is_null( $this->plugin_path ) ) { $this->plugin_path = WP_PLUGIN_URL.'/nelichso-free-live-chat-software/libs' ; }
			return $this->plugin_path ;
		}

		public function fetch_nelichso_html_code()
		{
			$this->nelichso_html_code = get_option( 'nelichso_html_code' ) ;

			if ( is_null( $this->nelichso_html_code ) || !$this->nelichso_html_code ) { $this->nelichso_html_code ; }
			return $this->nelichso_html_code ;
		}

		public function widget_fetch_nelichso_html_code()
		{
			$nelichso_url_showhide = get_option( 'nelichso_url_showhide' ) ;
			// disable check for now
			if( !$nelichso_url_showhide && 0 )
				print "<div style=\"padding: 10px; background: #ECEEED; border: 1px solid #DDDDDD;\">nelichso for WordPress has not been <a href=\"wp-admin/admin.php?page=nelichso_wp\">setup</a>.</div>" ;
			else
			{
				if ( $nelichso_url_showhide != "hide" )
					print $this->fetch_nelichso_html_code() ;
			}
		}
	}
?>
