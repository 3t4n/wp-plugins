<?php
use Automattic\WooCommerce\Admin\Features\Features;
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class OPBW_Settings
 *
 * This class contains all of the plugin settings.
 * Here you can configure the whole plugin data.
 *
 * @package		OPBW
 * @subpackage	Classes/OPBW_Settings
 * @author		WPOPAL
 * @since		1.0.0
 */
class OPBW_Settings{

	/**
	 * The plugin name
	 *
	 * @var		string
	 * @since   1.0.0
	 */
	private $plugin_name;

	/**
	 * Our OPBW_Settings constructor 
	 * to run the plugin logic.
	 *
	 * @since 1.0.0
	 */
	function __construct(){
		$this->plugin_name = OPBW_NAME;
		$plugin = OPBW_PLUGIN_BASE;
		
        add_filter("plugin_action_links_$plugin", array($this, 'add_settings_link'));

		register_activation_hook(OPBW_PLUGIN_FILE, array($this, 'deactive_without_woocommerce'));
		register_deactivation_hook(OPBW_PLUGIN_FILE, array($this, 'deactivation'));

		add_action( 'init', [$this, 'register_cpts'] );
		add_action( 'admin_init', [$this, 'trigger_deactice_addon_without_woocommerce'] );
		add_action( 'admin_menu', [$this, 'custom_submenu' ], 99 );
		add_action( 'admin_enqueue_scripts', [$this, 'admin_enqueue'] );

		add_filter( 'woocommerce_screen_ids', [$this, 'add_screen_ids'] );
		add_filter( 'admin_footer_text', [ $this, 'admin_footer_text' ], 99 );
	}

	/**
	 * Return the plugin name
	 *
	 * @access	public
	 * @since	1.0.0
	 * @return	string The plugin name
	 */
	public function get_plugin_name(){
		return apply_filters( 'OPBW/settings/get_plugin_name', $this->plugin_name );
	}

	public function add_settings_link($links) {
		if ( !opbw_check_woocommerce_active() ) return $links;

        $settings = '<a href="' . admin_url('admin.php?page=opbw-bulk-edit') . '">' . esc_html__('Bulk Edit Setup', 'opal-bulkedit-for-woocommerce') . '</a>';
        array_push($links, $settings);
        
        return $links;
    }

	public function admin_footer_text($footer_text) {
		global $pagenow, $typenow, $plugin_page;

		$footer_text_new = sprintf(
			/* translators: 1: WooCommerce 2:: five stars */
			__( 'If you like %1$s please leave us a %2$s rating. A huge thanks in advance!', 'opal-bulkedit-for-woocommerce' ),
			sprintf( '<strong>%s</strong>', esc_html__( 'Opal Bulkedit for Woocommerce', 'opal-bulkedit-for-woocommerce' ) ),
			'<a href="https://wordpress.org/support/plugin/opal-bulkedit-for-woocommerce/reviews?rate=5#new-post" target="_blank" class="wc-rating-link" aria-label="' . esc_attr__( 'five star', 'opal-bulkedit-for-woocommerce' ) . '" data-rated="' . esc_attr__( 'Thanks :)', 'opal-bulkedit-for-woocommerce' ) . '">&#9733;&#9733;&#9733;&#9733;&#9733;</a>'
		);

		if (!empty($plugin_page) && $plugin_page == 'opbw-bulk-edit') {
			return $footer_text_new;
		}

		if ($pagenow == 'edit.php' && $typenow == 'opbw-history') {
			return $footer_text_new;
		}
		
        return $footer_text;
    }

	public function deactive_without_woocommerce() {
		if (!class_exists('Woocommerce')) {
			add_action( 'admin_notices', array($this, 'child_plugin_notice') );
			// deactivate_plugins(OPBW_PLUGIN_BASE);
		}
	}
	
	public function trigger_deactice_addon_without_woocommerce() {
		if (!class_exists('Woocommerce')) {
			add_action( 'admin_notices', array($this, 'child_plugin_notice') );
		}
	}
	
	public function child_plugin_notice(){
		$message = __('<strong>Opal Bulkedit for Woocommerce</strong> is an addon extention of <strong>Woocommerce Plugin</strong>. Please active <strong>Woocommerce Plugin</strong> to be able to use this extention!', 'opal-bulkedit-for-woocommerce');
		?>
		<div class="error"><p><?php echo wp_kses_post($message); ?></p></div>
		<?php
	}

	public function deactivation() {
	}

	public function register_cpts() {

		/**
		 * Post Type: Bulkedit Histories.
		 */
	
		$labels = [
			"name" => esc_html__( "Bulkedit Histories", "opal-bulkedit-for-woocommerce" ),
			"singular_name" => esc_html__( "Bulkedit History", "opal-bulkedit-for-woocommerce" ),
		];
	
		$args = [
			"label" => esc_html__( "Bulkedit Histories", "opal-bulkedit-for-woocommerce" ),
			"labels" => $labels,
			"description" => "",
			"public" => false,
			"publicly_queryable" => false,
			"show_ui" => true,
			"show_in_menu" => OPBW_SHOWHISTORY,
			"show_in_rest" => false,
			"rest_base" => "",
			"rest_controller_class" => "WP_REST_Posts_Controller",
			"rest_namespace" => "wp/v2",
			"has_archive" => false,
			"show_in_nav_menus" => false,
			"delete_with_user" => false,
			"exclude_from_search" => true,
			"capability_type" => "post",
			'capabilities' => array(
				'read_post'             => 'read',
				'read_private_posts'    => 'read',
				'create_posts'            => 'do_not_allow',
				'edit_post'            => 'do_not_allow',
				'edit_others_posts'     => 'do_not_allow',
				'publish_posts'         => 'do_not_allow',
				'delete_posts'          => 'do_not_allow',
				'delete_others_posts'   => 'do_not_allow',
				'edit_published_posts'  => 'do_not_allow',
				'delete_published_posts'=> 'do_not_allow',
			),
			"map_meta_cap" => false,
			"hierarchical" => false,
			"can_export" => false,
			"rewrite" => [ "slug" => "opbw-history", "with_front" => false ],
			"query_var" => true,
			"supports" => [ "title" ],
			"show_in_graphql" => false,
		];
	
		register_post_type( "opbw-history", $args );

		global $wp_post_types;

		// $wp_post_types['opbw-history']->cap->create_posts ='do_not_allow';
		// $wp_post_types['opbw-history']->cap->edit_post ='do_not_allow';
	}

	public function custom_submenu() {
		global $pagenow, $typenow, $plugin_page;

		add_menu_page(
			'Opal Bulk Edit Products',
			'Opal Bulk Edit',
			'manage_woocommerce',
			'opbw-bulk-edit',
			[$this, 'bulkedit_page_callback'],
			'dashicons-list-view',
			56
		);

		add_submenu_page(
			'opbw-bulk-edit',
			__('History', 'opal-bulkedit-for-woocommerce'),
			__('History', 'opal-bulkedit-for-woocommerce'),
			'manage_woocommerce',
			'edit.php?post_type=opbw-history',
		);

		if (!empty($plugin_page) && $plugin_page == 'opbw-bulk-edit') {
			remove_all_actions( 'admin_notices' );
		}

		if ($pagenow == 'edit.php' && $typenow == 'opbw-history') {
			remove_all_actions( 'admin_notices' );
		}
		
	}

	public function add_screen_ids($screen_ids) {
		$screen_ids[] = 'toplevel_page_opbw-bulk-edit';
		return $screen_ids;
	}

	public function bulkedit_page_callback() {
		?>
		<div id="opqw-bulkedit">
			<?php OPBW_Admin::view('steps', []); ?>
			<?php OPBW_Admin::view('filter', []); ?>
		</div>
		<?php
	}	

	public function admin_enqueue() {
		global $pagenow, $typenow, $plugin_page;
		
		if (!empty($plugin_page) && $plugin_page == 'opbw-bulk-edit') {
			wp_enqueue_script( 'opbw-bulk-edit' );
			wp_enqueue_style( 'opbw-backend-styles' );
			wp_enqueue_style( 'woocommerce_admin_styles' );
			wp_enqueue_style( 'wc-admin-layout' );
		}

		if ($pagenow == 'edit.php' && $typenow == 'opbw-history') {
			wp_enqueue_style( 'opbw-backend-styles' );
			wp_enqueue_script( 'opbw-history' );
		}
	}
}
