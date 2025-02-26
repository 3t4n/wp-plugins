<?php

add_action( 'plugins_loaded', 'WPAPIYoast_init' );

/**
 * Plugin Name: Adaptify SEO One-Click Publishing
 * Plugin URI: https://adaptify.ai/
 * Description: Adaptify SEO One-Click Publishing automates your SEO process, allowing you to rank higher on Google while you focus on your core business. Works seamlessly with Yoast, Rankmath, and AIOSEO.
 * Version: 1.3.0
 * Requires at least: 4.4
 * Tested up to: 6.5
 * Requires PHP: 5.6
 * Author: Adaptify SEO
 * Author URI: https://adaptify.ai/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: adaptify-seo
 *
 * Short Description: AI-powered SEO automation tool that creates and publishes optimized content while managing meta fields across popular SEO plugins.
 *
 * Stable tag: 1.3.0
 */

// Activation function
function adaptify_seo_plugin_activate() {
    // Call the function to create application password
    create_application_password_for_user();
}

// Activation hook
register_activation_hook( __FILE__, 'adaptify_seo_plugin_activate' );

// Register the settings page
add_action('admin_menu', 'adaptify_seo_settings_page');

function adaptify_seo_settings_page() {
    add_options_page(
        'Adaptify SEO Settings',
        'Adaptify SEO',
        'manage_options',
        'adaptify-seo-settings',
        'adaptify_seo_settings_page_html'
    );
}

function adaptify_seo_settings_page_html() {
    if (!current_user_can('manage_options')) {
        return;
    }

    if (isset($_POST['adaptify_seo_settings_submitted']) && $_POST['adaptify_seo_settings_submitted'] == 'submitted') {
        update_option('adaptify_seo_enable_meta_sync', isset($_POST['adaptify_seo_enable_meta_sync']) ? '1' : '0');
        echo '<div class="updated"><p>Settings saved.</p></div>';
    }

    if (isset($_POST['create_application_password'])) {
        create_application_password_for_user();
        echo '<div class="updated"><p>Application password created.</p></div>';
    }

    if (isset($_POST['delete_application_password'])) {
        delete_application_password_for_user();
        echo '<div class="updated"><p>Application password deleted.</p></div>';
    }

    $enable_meta_sync = get_option('adaptify_seo_enable_meta_sync', '1');
    ?>
    <div class="wrap">
        <h1>Adaptify SEO Settings</h1>
        

        <h2>Application Password Management</h2>
        <p>
            The application password is used to securely connect your WordPress site with the Adaptify API. This password should be treated with the same level of security as any other password.
        </p>
        <form method="POST">
            <?php submit_button('Create New Application Password', 'primary', 'create_application_password', false); ?>
            <?php submit_button('Delete Application Password', 'secondary', 'delete_application_password', false); ?>
        </form>
<form method="POST">
            <input type="hidden" name="adaptify_seo_settings_submitted" value="submitted">
            <table class="form-table" role="presentation">
                <tr>
                    <th scope="row">
                        <label for="adaptify_seo_enable_meta_sync">Enable Meta Field Synchronization</label>
                    </th>
                    <td>
                        <input type="checkbox" id="adaptify_seo_enable_meta_sync" name="adaptify_seo_enable_meta_sync" <?php checked('1', $enable_meta_sync); ?>>
                        <p class="description">Check this box to enable the synchronization of Yoast and Rankmath meta fields.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button('Save Settings'); ?>
        </form>
    </div>
    <?php
}

// Synchronize meta fields if the feature is enabled
add_action('rest_insert_post', function (\WP_Post $post, $request, $creating) {
    if (get_option('adaptify_seo_enable_meta_sync', '1') === '1') {
        $yoast_meta = $request->get_param('yoast_meta');
        if (is_array($yoast_meta)) {
            if (isset($yoast_meta['yoast_wpseo_metadesc'])) {
                update_post_meta($post->ID, 'rank_math_description', $yoast_meta['yoast_wpseo_metadesc']);
            }
            if (isset($yoast_meta['yoast_wpseo_metakeywords'])) {
                update_post_meta($post->ID, 'rank_math_focus_keyword', $yoast_meta['yoast_wpseo_metakeywords']);
            }
            if (isset($yoast_meta['yoast_wpseo_title'])) {
                update_post_meta($post->ID, 'rank_math_title', $yoast_meta['yoast_wpseo_title']);
            }
        }
    }
}, 10, 3);

class Yoast_To_REST_API {

	protected $keys = array(
		'yoast_wpseo_focuskw',
		'yoast_wpseo_title',
		'yoast_wpseo_metadesc',
		'yoast_wpseo_linkdex',
		'yoast_wpseo_metakeywords',
		'yoast_wpseo_meta-robots-noindex',
		'yoast_wpseo_meta-robots-nofollow',
		'yoast_wpseo_meta-robots-adv',
		'yoast_wpseo_canonical',
		'yoast_wpseo_redirect',
		'yoast_wpseo_opengraph-title',
		'yoast_wpseo_opengraph-description',
		'yoast_wpseo_opengraph-image',
		'yoast_wpseo_twitter-title',
		'yoast_wpseo_twitter-description',
		'yoast_wpseo_twitter-image'
	);

	function __construct() {
		add_action( 'rest_api_init', array( $this, 'add_yoast_data' ) );
	}

	function add_yoast_data() {
		// Posts
		register_rest_field( 'post',
			'yoast_meta',
			array(
				'get_callback'    => array( $this, 'wp_api_encode_yoast' ),
				'update_callback' => array( $this, 'wp_api_update_yoast' ),
				'schema'          => null,
			)
		);

		// Pages
		register_rest_field( 'page',
			'yoast_meta',
			array(
				'get_callback'    => array( $this, 'wp_api_encode_yoast' ),
				'update_callback' => array( $this, 'wp_api_update_yoast' ),
				'schema'          => null,
			)
		);

		// Category
		register_rest_field( 'category',
			'yoast_meta',
			array(
				'get_callback'    => array( $this, 'wp_api_encode_yoast_category' ),
				'update_callback' => null,
				'schema'          => null,
			)
		);

		// Tag
		register_rest_field( 'tag',
			'yoast_meta',
			array(
				'get_callback'    => array( $this, 'wp_api_encode_yoast_tag' ),
				'update_callback' => null,
				'schema'          => null,
			)
		);

		// Public custom post types
		$types = get_post_types( array(
			'public'   => true,
			'_builtin' => false
		) );

		foreach ( $types as $key => $type ) {
			register_rest_field( $type,
				'yoast_meta',
				array(
					'get_callback'    => array( $this, 'wp_api_encode_yoast' ),
					'update_callback' => array( $this, 'wp_api_update_yoast' ),
					'schema'          => null,
				)
			);
		}
	}

	/**
	 * Updates post meta with values from post/put request.
	 *
	 * @param array $value
	 * @param object $data
	 * @param string $field_name
	 *
	 * @return array
	 */
	function wp_api_update_yoast( $value, $data, $field_name ) {

		foreach ( $value as $k => $v ) {

			if ( in_array( $k, $this->keys ) ) {
				! empty( $k ) ? update_post_meta( $data->ID, '_' . $k, $v ) : null;
			}
		}

		return $this->wp_api_encode_yoast( $data->ID, null, null );
	}

	function wp_api_encode_yoast( $p, $field_name, $request ) {
		$wpseo_frontend = WPSEO_Frontend_To_REST_API::get_instance();
		$wpseo_frontend->reset();

		query_posts( array(
			'p'         => $p['id'], // ID of a page, post, or custom type
			'post_type' => 'any'
		) );

		the_post();

		$yoast_meta = array(
			'yoast_wpseo_title'     => $wpseo_frontend->get_content_title(),
			'yoast_wpseo_metadesc'  => $wpseo_frontend->metadesc( false ),
			'yoast_wpseo_canonical' => $wpseo_frontend->canonical( false ),
		);

		/**
		 * Filter the returned yoast meta.
		 *
		 * @since 1.4.2
		 * @param array $yoast_meta Array of metadata to return from Yoast.
		 * @param \WP_Post $p The current post object.
		 * @param \WP_REST_Request $request The REST request.
		 * @return array $yoast_meta Filtered meta array.
		 */
		$yoast_meta = apply_filters( 'wpseo_to_api_yoast_meta', $yoast_meta, $p, $request );

		wp_reset_query();

		return (array) $yoast_meta;
	}

	private function wp_api_encode_taxonomy() {
		$wpseo_frontend = WPSEO_Frontend_To_REST_API::get_instance();
		$wpseo_frontend->reset();

		$yoast_meta = array(
			'yoast_wpseo_title'    => $wpseo_frontend->get_taxonomy_title(),
			'yoast_wpseo_metadesc' => $wpseo_frontend->metadesc( false ),
		);

		/**
		 * Filter the returned yoast meta for a taxonomy.
		 *
		 * @since 1.4.2
		 * @param array $yoast_meta Array of metadata to return from Yoast.
		 * @return array $yoast_meta Filtered meta array.
		 */
		$yoast_meta = apply_filters( 'wpseo_to_api_yoast_taxonomy_meta', $yoast_meta );

		return (array) $yoast_meta;
	}

	function wp_api_encode_yoast_category( $category ) {
		query_posts( array(
			'cat' => $category['id'],
		) );

		the_post();

		$res = $this->wp_api_encode_taxonomy();

		wp_reset_query();

		return $res;
	}

	function wp_api_encode_yoast_tag( $tag ) {
		query_posts( array(
			'tag_id' => $tag['id'],
		) );

		the_post();

		$res = $this->wp_api_encode_taxonomy();

		wp_reset_query();

		return $res;
	}
}

function WPAPIYoast_init() {
	if ( class_exists( 'WPSEO_Frontend' ) ) {
		include __DIR__ . '/classes/class-wpseo-frontend-to-rest-api.php';

		$yoast_To_REST_API = new Yoast_To_REST_API();
	} 
}

function create_application_password_for_user() {
    global $plugin_error_message;

    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    $user_id = get_current_user_id();
    $custom_date = date('YmdHis');
    $app_name = 'adaptify' . $custom_date;
    $user = get_userdata($user_id);

    if (!$user) {
        $plugin_error_message = "Can't access your username, please contact Adaptify support at hans@adaptify.ai";
        add_action( 'admin_notices', 'application_password_fail' );
        return;
    }

    $new_password = WP_Application_Passwords::create_new_application_password( $user_id, array( 'name' => $app_name ) );

    if ( is_wp_error( $new_password ) ) {
        $plugin_error_message = "Error creating application password.";
        add_action( 'admin_notices', 'application_password_fail' );
        return;
    }

    $post_data = array(
        'user_name' => $user->user_login,
        'application_pw' => $new_password[0],
        'site_url' => get_site_url()
    );

    $response = wp_remote_post( 'https://api.adaptify.ai/add-wp-pw', array(
        'method' => 'POST',
        'headers' => array('Content-Type' => 'application/json; charset=utf-8'),
        'body' => json_encode($post_data),
        'data_format' => 'body'
    ));

    if ( is_wp_error( $response ) ) {
        $plugin_error_message = "Error in sending POST request: " . $response->get_error_message();
        add_action( 'admin_notices', 'application_password_fail' );
    }
}

function delete_application_password_for_user() {
    global $plugin_error_message;

    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    $user_id = get_current_user_id();
    $user = get_userdata($user_id);

    if (!$user) {
        $plugin_error_message = "Can't access your username, please contact Adaptify support at hans@adaptify.ai";
        add_action( 'admin_notices', 'application_password_fail' );
        return;
    }

    $app_passwords = WP_Application_Passwords::get_user_application_passwords( $user_id );

    if ( !empty($app_passwords) ) {
        foreach ( $app_passwords as $app_password ) {
            WP_Application_Passwords::delete_application_password( $user_id, $app_password['uuid'] );
        }
    } else {
        $plugin_error_message = "No application passwords found to delete.";
        add_action( 'admin_notices', 'application_password_fail' );
    }
}

function application_password_fail() {
    global $plugin_error_message;
    printf(
        '<div class="error"><p>%s</p></div>',
        esc_html( $plugin_error_message )
    );
}

?>
