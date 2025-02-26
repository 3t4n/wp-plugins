<?php
/**
* Plugin Name: 		ACF Post Object Addon
* Plugin URI: 		https://github.com/dream-encode/de-acf-post-object-addon
* Description: 		A custom plugin to add ACF data to a post title for the "Post Object" field type in ACF.
* Version: 			2.1.0
* Author: 			David Baumwald
* Author URI: 		https://dream-encode.com/
* Text Domain: 		de-acfpoftao
**/

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'DE_ACF_Post_Object_Addon_Plugin' ) ) :

define( 'DE_ACF_POST_OBJECT_ADDON_PLUGIN_VERSION', '2.1.0' );

class DE_ACF_Post_Object_Addon_Plugin {
	public $version      = DE_ACF_POST_OBJECT_ADDON_PLUGIN_VERSION;
	private $lang_domain = 'de-acfpoftao';
	private $plugin_name = 'ACF Post Object Add-On';
	private $plugin_key  = 'de_acfpoftao';

	function __construct() {
		add_action( 'admin_menu', array( $this, 'add_option_menu' ) );

		add_action( 'init', array( $this, 'register_settings' ) );

		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'plugin_action_links' ) );

		add_action( 'admin_init', array( $this, 'add_acf_filter' ) );

		add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );

		register_activation_hook( __FILE__, array( $this, 'activate' ) );
	}

	function load_plugin_textdomain() {
	 	$plugin_dir = basename( dirname( __FILE__ ) );

	 	load_plugin_textdomain( $this->lang_domain, false, $plugin_dir );
	}

	public static function activate() {
		global $wp_version;

		if ( is_admin() && current_user_can( 'activate_plugins' ) && ! is_plugin_active( 'advanced-custom-fields/acf.php' ) && ! is_plugin_active( 'advanced-custom-fields-pro/acf.php' )  ) {
        	add_action( 'admin_notices', 'acf_plugin_required_notice' );

        	deactivate_plugins( plugin_basename( __FILE__ ) );

        	if ( isset( $_GET['activate'] ) ) {
            	unset( $_GET['activate'] );
        	}
    	} else {
    		update_option( 'de_acfpoftao_version', DE_ACF_POST_OBJECT_ADDON_PLUGIN_VERSION );
    	}
	}

	function acf_plugin_required_notice() {
?>

	<div class="error"><p><?php _e( 'Sorry, but ACF Post Object Add-on requires either Advanced Custom Fields or Advanced Custom Fields PRO to be installed and active.', $this->lang_domain ); ?></p></div>

<?php
	}

	function add_acf_filter() {
		if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
			add_filter( 'acf/fields/post_object/result', array( $this, 'update_acf_post_object_field_choices'), 10, 4 );
		} else {
			add_action( 'admin_notices', array( $this, 'display_acf_notice' ) );
		}
	}

	function plugin_action_links( $links ) {
		 $links[] = '<a href="'. esc_url( menu_page_url( $this->plugin_key, false ) ) .'">' . __( 'Settings', $this->lang_domain ) . '</a>';

		 return $links;
	}

	function add_action_plugin( $actions, $plugin_file ) {
		static $plugin;

		if ( ! isset( $plugin ) ) {
			$plugin = plugin_basename( __FILE__ );
		}

		if ( $plugin == $plugin_file ) {
			$settings = array(
				'settings' => '<a href="'. esc_url( menu_page_url( $this->plugin_key, false ) ) .'">' . __( 'Settings', $this->lang_domain ) . '</a>'
			);

			$actions = array_merge( $settings, $actions );
			$actions = array_merge( $site_link, $actions );
		}

		return $actions;
	}

	function option_page_assets() {
		wp_register_script( 'de-acfpoftao-admin-js', plugins_url( '/', __FILE__ ) . 'assets/dist/admin/de-acf-post-object-field-type-add-on.min.js', array( 'wp-api', 'wp-i18n', 'wp-components', 'wp-element' ), $this->version, true );
		wp_enqueue_style( 'de-acfpoftao-admin-css', plugins_url( '/', __FILE__ ) . 'assets/dist/admin/de-acf-post-object-field-type-add-on.min.css', array( 'wp-components' ), $this->version );

		$localization = array(
			'AJAX_URL'             => admin_url( 'admin-ajax.php' ),
			'ACF_FIELD_GROUPS'     => (array) $this->get_acf_append_field_options(),
			'APPEND_FIELD_FORMATS' => (array) $this->get_acf_append_field_format_options(),
		);

		wp_localize_script( 'de-acfpoftao-admin-js', 'DE_ACFPOFTAO', $localization );

		wp_enqueue_script( 'de-acfpoftao-admin-js' );
	}

	function add_option_menu() {
		$hook = add_options_page(
			$this->plugin_name,
			$this->plugin_name,
			'manage_options',
			$this->plugin_key,
			array( $this, 'option_menu_callback' )
		);

		add_action( "admin_print_scripts-{$hook}", array( $this, 'option_page_assets' ) );
	}

	function option_menu_callback() {
		echo '<div id="de_acfpoftao"></div>';
	}

	function register_settings() {
		register_setting(
			'de_acfpoftao_settings',
			'de_acfpoftao_enable',
			array(
				'type'         => 'boolean',
				'show_in_rest' => true,
				'default'      => false,
			)
		);

		register_setting(
			'de_acfpoftao_settings',
			'de_acfpoftao_append_field',
			array(
				'type'         => 'string',
				'show_in_rest' => true,
				'default'      => false,
			)
		);

		register_setting(
			'de_acfpoftao_settings',
			'de_acfpoftao_append_field_format',
			array(
				'type'         => 'string',
				'show_in_rest' => true,
				'default'      => false,
			)
		);
	}

	function get_acf_append_field_options() {
		$acf_version = get_option( 'acf_version' );

		$options_array = array(
			'Post' => array(
				array(
					'label' => __( 'Post ID', $this->lang_domain ),
					'value' => 'ID',
				),
				array(
					'label' => __( 'Post Slug', $this->lang_domain ),
					'value' => 'post_name',
				),
			),
		);

		$field_groups_args = apply_filters( 'de/acf_post_object_addon/alter_acf_field_group_args', array() );

		$groups = apply_filters( 'de/acf_post_object_addon/alter_acf_field_groups', acf_get_field_groups( $field_groups_args ) );

		$exclude_field_types = apply_filters( 'de/acf_post_object_addon/exclude_acf_field_types', array( 'radio', 'checkbox', 'image', 'oembed', 'file', 'gallery', 'true_false', 'google_map', 'message', 'tab', 'repeater', 'flexible_content', 'clone', ) );

		if ( $groups ) {
			foreach ( $groups as $index => $group ){
				$group_id    = $group['ID'];
				$group_title = $group['title'];

				$fields = array();

				if ( version_compare( '5.7.11', $acf_version ) ) {
					$fields = apply_filters( 'de/acf_post_object_addon/alter_acf_field_group_fields', acf_get_fields( $group_id ) );
				} else {
					$fields = apply_filters( 'de/acf_post_object_addon/alter_acf_field_group_fields', acf_get_fields_by_id( $group_id ) );
				}

				if ( $fields && is_array( $fields ) && ! empty( $fields ) ) {
					foreach ( $fields as $index => $field_data ){
						$field_type  = $field_data['type'];
						$field_name  = $field_data['name'];
						$field_label = $field_data['label'];

						if ( is_array( $exclude_field_types ) && ! in_array( $field_type, $exclude_field_types ) ) {
							$options_array[ $group_title ][] = array(
								'value' => esc_attr( $field_name ),
								'label' => $field_label,
							);
						}
					}
				}
			}
		}

		return $options_array;
	}

	function get_acf_append_field_format_options() {
		$post_title_text         = __( 'Post Title', $this->lang_domain );
		$append_field_value_text = __( 'Append Field Value', $this->lang_domain );

		$format_options = array(
			array(
				'label' => "Parentheses, e.g. {$post_title_text} ({$append_field_value_text})",
				'value' => 'wrap::par',
			),
			array(
				'label' => "Dash, e.g. {$post_title_text} - {$append_field_value_text}",
				'value' => 'separator::dash',
			),
			array(
				'label' => "Colon, e.g. {$post_title_text}: {$append_field_value_text}",
				'value' => 'separator::colon',
			),
			array(
				'label' => "Arrow 1, e.g. {$post_title_text} > {$append_field_value_text}",
				'value' => 'separator::gt',
			),
			array(
				'label' => "Arrow 2, e.g. {$post_title_text} » {$append_field_value_text}",
				'value' => 'separator::raquo',
			),
			array(
				'label' => "Arrow 3, e.g. {$post_title_text} ⋙ {$append_field_value_text}",
				'value' => 'separator::gg',
			),
			array(
				'label' => "Vertical, Bar e.g. {$post_title_text} | {$append_field_value_text}",
				'value' => 'separator::verbar',
			),
			array(
				'label' => "Brackets, e.g. {$post_title_text} [{$append_field_value_text}]",
				'value' => 'wrap::brack',
			),
			array(
				'label' => "Braces, e.g. {$post_title_text} {{$append_field_value_text}}",
				'value' => 'wrap::brace',
			),
		);

		return apply_filters( 'de/acf_post_object_addon/append_field_formats', $format_options );
	}

	function update_acf_post_object_field_choices( $title, $post, $field, $post_id ) {
		$settings = get_option( 'de_acfpoftao_append_field' );

		$enabled      = get_option( 'de_acfpoftao_enable' );
		$append_field = get_option( 'de_acfpoftao_append_field' );
		$format       = apply_filters( 'de/acfpoftao/append_field_data_format', get_option( 'de_acfpoftao_append_field_format' ) );

		if ( $enabled && ! empty( $append_field ) ) {
			switch ( $append_field ) {
				case 'ID':
				case 'slug':
					$append_field_value = $post->{$append_field};
					break;
				default:
					$append_field_value = get_field( $append_field, $post->ID );
					break;
			}

			if ( ! empty( $append_field_value ) ) {
				switch ( true ) {
					case preg_match( "/^separator::(.*)/", $format, $matches ):
						$title .= ' &' . $matches[1] . '; ' . $append_field_value;
						break;
					case preg_match( "/^wrap::(.*)/", $format, $matches ):
						$title .= ' &l' . $matches[1] . ';' . $append_field_value . '&r' . $matches[1] . ';';
						break;
					default:
						$title .= ' (' . $append_field_value .  ')';
						break;
				}
			}
		}

		$title = apply_filters( 'de/acfpoftao/format_post_title', $title, $post, $field, $post_id );

		return $title;
	}
}

// Initialize the plugin
$settings_de_acf_post_object_addon_plugin = new DE_ACF_Post_Object_Addon_Plugin();

endif;