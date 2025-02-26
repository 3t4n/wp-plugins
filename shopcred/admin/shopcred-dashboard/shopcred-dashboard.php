<?php
/**
 * Shopcred Dashboard Module
 *
 * Version: 2.0.9
 */

namespace ShopCred;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Dashboard {

	/**
	 * A reference to an instance of this class.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    object
	 */
	private static $instance = null;

	/**
	 * Module directory path.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var srting.
	 */
	protected $path;

	/**
	 * Module directory URL.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var srting.
	 */
	protected $url;

	/**
	 * Module version
	 *
	 * @var string
	 */
	protected $version = '1.0.0';

	/**
	 * [$dashboard_slug description]
	 * @var string
	 */
	public $dashboard_slug = 'shopcred-dashboard';

	/**
	 * [$module_manager description]
	 * @var null
	 */
	public $module_manager = null;

	/**
	 * [$data_manager description]
	 * @var null
	 */
	public $data_manager = null;

	/**
	 * [$license_manager description]
	 * @var null
	 */
	public $license_manager = null;

	/**
	 * [$notice_manager description]
	 * @var null
	 */
	public $notice_manager = null;

	/**
	 * [$compat_manager description]
	 * @var null
	 */
	public $compat_manager = null;

	/**
	 * [$subpage description]
	 * @var null
	 */
	private $page = null;

	/**
	 * [$subpage description]
	 * @var null
	 */
	private $subpage = null;

	/**
	 * [$default_args description]
	 * @var [type]
	 */
	public $default_args = array(
		'path'           => '',
		'url'            => '',
		'cx_ui_instance' => false,
		'plugin_data'    => array(
			'slug'         => false,
			'file'         => '',
			'version'      => '',
			'plugin_links' => array()
		),
	);

	/**
	 * [$args description]
	 * @var array
	 */
	public $args = array();

	/**
	 * [$cx_ui_instance description]
	 * @var boolean
	 */
	public $cx_ui_instance = false;

	/**
	 * [$plugin_slug description]
	 * @var boolean
	 */
	public $plugin_data = false;

	/**
	 * [$assets_enqueued description]
	 * @var boolean
	 */
	protected $assets_enqueued = false;

	/**
	 * [$registered_plugins description]
	 * @var array
	 */
	public $registered_plugins = array();

	/**
	 * shopcred_dashboard constructor.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function __construct() {

		$this->load_files();

		add_action( 'init', array( $this, 'init_managers' ), -998 );

		add_action( 'admin_menu', array( $this, 'register_page' ), -999 );

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_dashboard_assets' ) );

	}

	/**
	 * [load_files description]
	 * @return [type] [description]
	 */
	public function load_files() {
		/**
		 * Modules
		 */
		require $this->path . 'inc/modules/manager.php';
		require $this->path . 'inc/modules/page-base.php';
		require $this->path . 'inc/modules/welcome/module.php';
		require $this->path . 'inc/modules/welcome/dev-test.php';
		require $this->path . 'inc/modules/settings/module.php';

		require $this->path . 'inc/data-manager.php';
		require $this->path . 'inc/notice-manager.php';

	}

	/**
	 * [init_managers description]
	 * @param  array  $args [description]
	 * @return [type]       [description]
	 */
	public function init_managers() {
		$this->module_manager  = new Modules\Manager();
		$this->notice_manager  = new Notice_Manager();
		$this->data_manager    = new Data_Manager();
	}

	/**
	 * [init description]
	 * @return [type] [description]
	 */
	public function init( $args = [] ) {

		$this->args = wp_parse_args( $args, $this->default_args );

		$this->path = ! empty( $this->args['path'] ) ? $this->args['path'] : false;
		$this->url  = ! empty( $this->args['url'] ) ? $this->args['url'] : false;

		if ( ! $this->path || ! $this->url || ! $this->args['cx_ui_instance'] ) {
			wp_die(
				'shopcred_dashboard not initialized. Module URL, Path, UI instance and plugin data should be passed into constructor',
				'shopcred_dashboard Error'
			);
		}

		$plugin_data = wp_parse_args( $this->args['plugin_data'], $this->default_args['plugin_data'] );

		$this->register_plugin( $this->args['plugin_data']['file'], $plugin_data );
	}

	/**
	 * Register add/edit page
	 *
	 * @return void
	 */
	public function register_page() {

		add_menu_page(
			esc_html__( 'ShopCred', 'shopcred' ),
			esc_html__( 'ShopCred', 'shopcred' ),
			'manage_options',
			$this->dashboard_slug,
			function() {
				include $this->get_view( 'common/dashboard' );
			},
			'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMTAwIDUwQzEwMCA3Ny42MTQzIDc3LjYxNDMgMTAwIDUwIDEwMEMyMi4zODU3IDEwMCAwIDc3LjYxNDMgMCA1MEMwIDIyLjM4NTcgMjIuMzg1NyAwIDUwIDBDNzcuNjE0MyAwIDEwMCAyMi4zODU3IDEwMCA1MFpNMzIgMjhDMjguNjg2MyAyOCAyNiAzMC42ODYzIDI2IDM0Vjc0QzI2IDc3LjMxMzcgMjguNjg2MyA4MCAzMiA4MEg2OEM3MS4zMTM3IDgwIDc0IDc3LjMxMzcgNzQgNzRWMzRDNzQgMzAuNjg2MyA3MS4zMTM3IDI4IDY4IDI4SDYyVjI3QzYyIDIwLjkyNDkgNTYuNjI3NCAxNiA1MCAxNkM0My4zNzI2IDE2IDM4IDIwLjkyNDkgMzggMjdWMjhIMzJaTTQyIDI4SDM4VjMySDMyQzMwLjg5NTUgMzIgMzAgMzIuODk1NCAzMCAzNFY3NEMzMCA3NS4xMDQ2IDMwLjg5NTUgNzYgMzIgNzZINjhDNjkuMTA0NSA3NiA3MCA3NS4xMDQ2IDcwIDc0VjM0QzcwIDMyLjg5NTQgNjkuMTA0NSAzMiA2OCAzMkg2MlYyOEg1OFYyN0M1OCAyMy4xMzQgNTQuMjE3MyAyMCA1MCAyMEM0NS43ODI3IDIwIDQyIDIzLjEzNCA0MiAyN1YyOFpNNDIgMzJIMzhWMzRDMzggMzUuMTA0NiAzOC45NzY4IDM2IDQwLjE4MTkgMzZDNDEuMzg2NyAzNiA0MiAzNS4xMDQ2IDQyIDM0VjMyWk01OCAzMlYzNEM1OCAzNS4xMDQ2IDU4LjYxMzMgMzYgNTkuODE4MSAzNkM2MS4wMjMyIDM2IDYyIDM1LjEwNDYgNjIgMzRWMzJINThaTTU4IDMySDQyVjI4SDU4VjMyWk00MSA1MEM0Mi42NTcgNTAgNDQgNDguNjU2OSA0NCA0N0M0NCA0NS4zNDMxIDQyLjY1NyA0NCA0MSA0NEMzOS4zNDMgNDQgMzggNDUuMzQzMSAzOCA0N0MzOCA0OC42NTY5IDM5LjM0MyA1MCA0MSA1MFpNMzkuNDQzOCA1Ni4wNzg5QzQwLjUwNDYgNTUuNzcxNyA0MS42MTQgNTYuMzgyOCA0MS45MjExIDU3LjQ0MzhDNDMuMDUzIDYxLjM1MjcgNDYuMzI3NCA2NCA1MCA2NEM1My42NzI5IDY0IDU2Ljk0NyA2MS4zNTI3IDU4LjA3ODkgNTcuNDQzOEM1OC4zODYyIDU2LjM4MjggNTkuNDk1NCA1NS43NzE3IDYwLjU1NjQgNTYuMDc4OUM2MS42MTc0IDU2LjM4NjIgNjIuMjI4MyA1Ny40OTUzIDYxLjkyMTEgNTguNTU2M0M2MC4zNjY5IDYzLjkyMzYgNTUuNzAyNiA2OCA1MCA2OEM0NC4yOTc0IDY4IDM5LjYzMzEgNjMuOTIzNiAzOC4wNzg5IDU4LjU1NjNDMzcuNzcxNyA1Ny40OTUzIDM4LjM4MjggNTYuMzg2MiAzOS40NDM4IDU2LjA3ODlaTTYyLjc5OTYgNDkuNTk5NkM2My42ODMxIDUwLjI2MjUgNjQuOTM2NSA1MC4wODM4IDY1LjU5OTYgNDkuMjAwM0M2Ni4yNjI1IDQ4LjMxNjggNjYuMDgzNyA0Ny4wNjMgNjUuMjAwMiA0Ni40MDAxQzYzLjE5MjQgNDQuODkzNiA2MC42OTc1IDQzLjk5OTkgNTggNDMuOTk5OUM1NS4zMDIgNDMuOTk5OSA1Mi44MDcxIDQ0Ljg5MzYgNTAuNzk5NiA0Ni40MDAxQzQ5LjkxNiA0Ny4wNjMyIDQ5LjczNzMgNDguMzE2OCA1MC40MDAxIDQ5LjIwMDNDNTEuMDYzMiA1MC4wODM4IDUyLjMxNjkgNTAuMjYyNSA1My4yMDAyIDQ5LjU5OTZDNTQuNTQwOCA0OC41OTM2IDU2LjE5OTIgNDcuOTk5OSA1OCA0Ny45OTk5QzU5LjgwMDUgNDcuOTk5OSA2MS40NTkgNDguNTkzNiA2Mi43OTk2IDQ5LjU5OTZaIiBmaWxsPSJ3aGl0ZSIvPgo8L3N2Zz4K',
			59
		);

		add_submenu_page(
			$this->dashboard_slug,
			esc_html__( 'Dashboard', 'shopcred' ),
			esc_html__( 'Dashboard', 'shopcred' ),
			'manage_options',
			$this->dashboard_slug
		);

		do_action( 'shopcred-dashboard/after-page-registration', $this );
	}

	/**
	 * [maybe_modify_subpages_links description]
	 * @return [type] [description]
	 */
	public function maybe_modify_subpages_links() {
		global $submenu;

		$submenu['shopcred'][3][2] = 'admin.php?page=shopcred-dashboard-license-page&subpage=license-manager';
	}

	/**
	 * [render_dashboard description]
	 * @return [type] [description]
	 */
	public function render_dashboard() {
		include $this->get_view( 'common/dashboard' );
	}

	/**
	 * [get_dashboard_version description]
	 * @return [type] [description]
	 */
	public function get_dashboard_path() {
		return $this->path;
	}

	/**
	 * [get_dashboard_version description]
	 * @return [type] [description]
	 */
	public function get_dashboard_url() {
		return $this->url;
	}

	/**
	 * [get_dashboard_version description]
	 * @return [type] [description]
	 */
	public function get_dashboard_version() {
		return $this->version;
	}

	/**
	 * [get_registered_plugins description]
	 * @return [type] [description]
	 */
	public function get_registered_plugins() {
		return $this->registered_plugins;
	}

	/**
	 * [get_registered_plugins description]
	 * @return [type] [description]
	 */
	public function register_plugin( $plugin_slug = false, $plugin_data = array() ) {

		if ( ! array_key_exists( $plugin_slug, $this->registered_plugins ) ) {
			$this->registered_plugins[ $plugin_slug ] = $plugin_data;
		}

		return false;
	}

	/**
	 * Returns path to view file
	 *
	 * @param  [type] $path [description]
	 * @return [type]       [description]
	 */
	public function get_view( $path ) {
		return apply_filters( 'shopcred-dashboard/get-view', $this->path . 'views/' . $path . '.php' );
	}

	/**
	 * Returns wizard initial subpage
	 *
	 * @return string
	 */
	public function get_initial_page() {
		return 'welcome-page';
	}

	/**
	 * Check if dashboard page is currently displayiing
	 *
	 * @return boolean [description]
	 */
	public function is_dashboard_page() {
		return ( ! empty( $_GET['page'] ) && false !== strpos( $_GET['page'], $this->dashboard_slug ) );
	}

	/**
	 * Returns current subpage slug
	 *
	 * @return string
	 */
	public function get_page() {

		if ( null === $this->page ) {

			$page = isset( $_GET['page'] ) && $this->dashboard_slug !== $_GET['page'] ? esc_attr( $_GET['page'] ) : $this->dashboard_slug . '-' . $this->get_initial_page();

			$this->page = str_replace( $this->dashboard_slug . '-', '', $page );
		}

		return $this->page;
	}

	/**
	 * [get_subpage description]
	 * @return [type] [description]
	 */
	public function get_subpage() {

		if ( null === $this->subpage ) {

			$this->subpage = isset( $_GET['subpage'] ) && $this->is_dashboard_page() ? esc_attr( $_GET['subpage'] ) : false;
		}

		return $this->subpage;
	}

	/**
	 * [get_admin_url description]
	 * @return [type] [description]
	 */
	public function get_dashboard_page_url( $page = null, $subpage = null, $args = array() ) {

		$page = $this->dashboard_slug . '-' . $page;

		$page_args = array(
			'page'    => $page,
			'subpage' => $subpage,
		);

		if ( ! empty( $args ) ) {
			$page_args = array_merge( $page_args, $args );
		}

		return add_query_arg( $page_args, admin_url( 'admin.php' ) );
	}

	/**
	 * [init_ui_instance description]
	 * @param  boolean $ui_callback [description]
	 * @return [type]               [description]
	 */
	public function init_ui_instance( $ui_callback = false ) {

		if ( $ui_callback && is_object( $ui_callback ) && 'CX_Vue_UI' === get_class( $ui_callback ) ) {
			$this->cx_ui_instance = $ui_callback;
		}

		if ( ! $ui_callback || ! is_callable( $ui_callback ) ) {
			return;
		}

		$this->cx_ui_instance = call_user_func( $ui_callback );
	}

	/**
	 * [enqueue_dashboard_assets description]
	 * @param  [type] $hook [description]
	 * @return [type]       [description]
	 */
	public function enqueue_dashboard_assets( $hook ) {

		if ( ! $this->is_dashboard_page() ) {
			return false;
		}

		if ( $this->assets_enqueued ) {
			return false;
		}

		$this->enqueue_assets();

		$this->assets_enqueued = true;
	}

	/**
	 * Enqueue builder assets
	 *
	 * @return void
	 */
	public function enqueue_assets() {

		$this->init_ui_instance( $this->args['cx_ui_instance'] );

		$this->cx_ui_instance->enqueue_assets();

		wp_enqueue_script(
			'shopcred-dashboard-class-script',
			$this->url . 'assets/js/shopcred-dashboard-class.js',
			array( 'cx-vue-ui' ),
			$this->version,
			true
		);

		do_action( 'shopcred-dashboard/before-enqueue-assets', $this, $this->get_page() );

		$direction_suffix = is_rtl() ? '-rtl' : '';

		wp_enqueue_style(
			'shopcred-dashboard-admin-css',
			$this->url . 'assets/css/shopcred-dashboard-admin' . $direction_suffix . '.css',
			false,
			$this->version
		);
		wp_enqueue_style( 'spc-admin-css', base_init()->plugin_admin_url( 'assets/css/admin-style.css' ) );

		wp_enqueue_script(
			'shopcred-dashboard-script',
			$this->url . 'assets/js/shopcred-dashboard.js',
			array( 'cx-vue-ui' ),
			$this->version,
			true
		);

		wp_enqueue_script( 'spc-admin-js', base_init()->plugin_admin_url( 'assets/js/admin-script.js' ), array( 'jquery' ), SPC_VER, true );

		do_action( 'shopcred-dashboard/after-enqueue-assets', $this, $this->get_page() );

		wp_set_script_translations( 'shopcred-dashboard-script', 'shopcred' );

		wp_localize_script(
			'shopcred-dashboard-script',
			'ShopcredDashboardConfig',
			apply_filters( 'shopcred-dashboard/js-page-config',
				array(
					'pageModule'           => false,
					'subPageModule'        => false,
					'ajaxUrl'              => esc_url( admin_url( 'admin-ajax.php' ) ),
					'nonce'                => wp_create_nonce( $this->dashboard_slug ),
					'pageModuleConfig'     => $this->data_manager->get_dashboard_page_config( $this->get_page(), $this->get_subpage() ),
					'helpCenterConfig'     => $this->data_manager->get_dashboard_config( 'helpCenter' ),
					'avaliableBanners'     => $this->data_manager->get_dashboard_config( 'banners' ),
				),
				$this->get_page(),
				$this->get_subpage()
			)
		);

		add_action( 'admin_footer', array( $this, 'print_vue_templates' ), 0 );
	}

	/**
	 * Print components templates
	 *
	 * @return void
	 */
	public function print_vue_templates() {

		$templates = apply_filters(
			'shopcred-dashboard/js-page-templates',
			array(
				'alert-list'       => $this->get_view( 'common/alert-list' ),
				'alert-item'       => $this->get_view( 'common/alert-item' ),
				'banner'           => $this->get_view( 'common/banner' ),
				'before-content'   => $this->get_view( 'common/before-content' ),
				'header'           => $this->get_view( 'common/header' ),
				'before-component' => $this->get_view( 'common/before-component' ),
				'before-sidebar'   => $this->get_view( 'common/before-sidebar' ),
				'sidebar'          => $this->get_view( 'common/sidebar' ),
				'after-sidebar'    => $this->get_view( 'common/after-sidebar' ),
				'shopcred-admin-category'    	   => $this->get_view( 'common/shopcred-admin-category' ),
			),
			$this->get_page(),
			$this->get_subpage()
		);

		foreach ( $templates as $name => $path ) {

			ob_start();
			include $path;
			$content = ob_get_clean();

			printf(
				'<script type="text/x-template" id="shopcred-dashboard-%1$s">%2$s</script>',
				$name,
				$content
			);
		}
	}

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}
}

