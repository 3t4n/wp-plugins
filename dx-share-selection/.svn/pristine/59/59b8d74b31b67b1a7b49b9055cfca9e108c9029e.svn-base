<?php
/**
 * Contains various core plugin functions.
 *
 * @package DX-Share-Selection
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * DXSS_Share_Selection
 */
class DXSS_Share_Selection {

	/**
	 * __construct
	 */
	public function __construct() {
		add_action( 'admin_notices', array( $this, 'dxss_admin_notices' ) );
		add_filter( 'plugin_action_links', array( $this, 'dxss_plugin_actions' ), 10, 2 );
		add_action( 'admin_enqueue_scripts', array( $this, 'dxss_admin_js' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'dxss_admin_css' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'dxss_scripts' ) );
		add_action( 'admin_menu', array( $this, 'dxss_addpage' ) );
	}

	/**
	 * DXSS Is active check.
	 *
	 * @return int 1 or 0
	 */
	public function dxss_is_active() {
		if ( 1 === intval( get_option( 'dxss_active' ) ) ) {
			return 1;
		} else {
			return 0;
		}
	}

	/**
	 * DXSS Check if the plugin was just activated.
	 *
	 * @return int 1 or 0
	 */
	public function dxss_just_actived() {
		if ( 1 === intval( get_option( 'dxss_just_activated' ) ) ) {
			return 1;
		} else {
			return 0;
		}
	}

	/**
	 * DXSS plugin activate.
	 */
	public function dxss_plugin_activate() {
		update_option( 'dxss_active', 1 );
		update_option( 'dxss_just_activated', 1 );
	}

	/**
	 * DXSS plugin deactivate.
	 */
	public function dxss_plugin_deactivate() {
		update_option( 'dxss_active', 0 );
	}

	/**
	 * Get the admin notices.
	 */
	public function dxss_admin_notices() {
		if ( $this->dxss_just_actived() && 'settings_page_dx-share-selection' !== get_current_screen()->id ) {
			update_option( 'dxss_just_activated', 0 );
			echo '<div class="updated fade"><p>' . wp_kses_post( __( '<b>DX Share Selection</b> plugin is activated. You should adjust <a href="options-general.php?page=dx-share-selection">the settings</a> to match your preferences.', 'dxss' ) ) . '</p></div>';
		}
	}

	/**
	 * Get the action links with html.
	 *
	 * @param mixed $links The links.
	 * @param mixed $file File name.
	 * @return mixed
	 */
	public function dxss_plugin_actions( $links, $file ) {

		if ( DXSS_BASENAME === $file ) {
			$settings_link = '<a href="options-general.php?page=dx-share-selection">' . __( 'Settings', 'dxss' ) . '</a>';
			$links         = array_merge( array( $settings_link ), $links );
		}

		return $links;
	}

	/**
	 * Enqueue scripts.
	 */
	public function dxss_admin_js() {
		if ( 'settings_page_dx-share-selection' === get_current_screen()->id ) {
			$admin_js_url  = DXSS_URL . 'assets/dist/js/dxss-admin.min.js';
			$color_url     = DXSS_URL . 'js/farbtastic/farbtastic.js';
			$dompurify_url = DXSS_URL . 'js/dompurify/purify.min.js';
			$dxss_js_url   = DXSS_URL . 'assets/dist/js/dx-share-selection.min.js';

			wp_enqueue_script( 'dompurify', $dompurify_url, array(), DXSS_VERSION, false );
			wp_enqueue_script( 'farbtastic', $color_url, array( 'jquery' ), DXSS_VERSION, false );
			wp_enqueue_script( 'dx-share-selection', $dxss_js_url, array( 'jquery' ), DXSS_VERSION, false );
			wp_enqueue_script( 'dx-share-selection-admin', $admin_js_url, array( 'jquery' ), DXSS_VERSION, false );

			wp_localize_script(
				'dx-share-selection-admin',
				'dx_share_selection',
				array(
					'settings_data_default' => DXSS_Option_Helper::get_default_settings_data(),
				)
			);
		}
	}

	/**
	 * Load the admin CSS.
	 */
	public function dxss_admin_css() {
		if ( 'settings_page_dx-share-selection' === get_current_screen()->id ) {
			wp_enqueue_style( 'dxss-css', DXSS_URL . 'assets/dist/css/dxss.min.css', array(), DXSS_VERSION, false );
			wp_enqueue_style( 'dxss-admin-css', DXSS_URL . 'assets/dist/css/dxss-admin.min.css', array(), DXSS_VERSION, false );
			wp_enqueue_style( 'farbtastic-css', DXSS_URL . '/js/farbtastic/farbtastic.css', array(), DXSS_VERSION, false );
		}
	}

	/**
	 * Get the url and title of the page.
	 *
	 * @return array
	 */
	public function dxss_get_post_details() {
		// Get the global post variable.
		global $post;

		if ( in_the_loop() ) {
			// Inside loop.
			$permalink_inside_loop = get_permalink( $post->ID );
			$title_inside_loop     = str_replace( '+', '%20', get_the_title( $post->ID ) );

			$details = array(
				'permalink' => $permalink_inside_loop,
				'title'     => $title_inside_loop,
			);
		} else {
			// Outside loop.
			$permalink_outside_loop = ( ! empty( $_SERVER['HTTPS'] ) ) ? 'https://' . $this->dxss_sanitize_server_data( 'SERVER_NAME' ) . $this->dxss_sanitize_server_data( 'REQUEST_URI' ) : 'http://' . $this->dxss_sanitize_server_data( 'SERVER_NAME' ) . $this->dxss_sanitize_server_data( 'REQUEST_URI' );
			$title_outside_loop     = str_replace( '+', '%20', wp_title( '', 0 ) );

			// If title is null.
			if ( '' === $title_outside_loop ) {
				$title_outside_loop = str_replace( '+', '%20', get_bloginfo( 'name' ) );
			}

			$details = array(
				'permalink' => $permalink_outside_loop,
				'title'     => $title_outside_loop,
			);
		}

		return $details;
	}

	/**
	 * Get processed list.
	 *
	 * @return mixed
	 */
	public function dxss_get_processed_list() {
		global $post;

		$info     = $this->dxss_get_post_details();
		$rss      = get_bloginfo( 'rss_url' );
		$blogname = rawurlencode( get_bloginfo( 'name' ) . ' ' . get_bloginfo( 'description' ) );

		$terms = array(
			'{url}',
			'{title}',
			'{blogname}',
			'{rss-url}',
		);

		$replacable = array(
			$info['permalink'],
			$info['title'],
			$blogname,
			$rss,
		);

		// Get the Options.
		$dxss_settings = DXSS_Option_Helper::fetch_settings_data();
		$dxss_lists    = $dxss_settings['lists'];

		// Generate short url from Bit.ly only if needed.
		if ( false !== mb_strpos( $dxss_lists, '{surl}' ) ) {
			$terms[]      = '{surl}';
			$replacable[] = DXSS_Bitly::dxss_shorten_url( $info['permalink'] );
		}

		$list_explode = explode( "\n", $dxss_lists );
		$list_implode = implode( '|', $list_explode );
		$list         = str_replace( "\r", '', $list_implode );

		$list_final = str_replace( $terms, $replacable, $list );

		return $list_final;
	}

	/**
	 * Enqueue Scripts to WordPress.
	 */
	public function dxss_scripts() {
		// Get the Options.
		$dxss_settings     = DXSS_Option_Helper::fetch_settings_data();
		$dxss_script_place = $dxss_settings['scriptPlace'];

		$dxss_js_url       = DXSS_URL . 'assets/dist/js/dx-share-selection.min.js';
		$dompurify_url     = DXSS_URL . 'js/dompurify/purify.min.js';
		$jquery_mobile_url = DXSS_URL . 'js/jquery.mobile/jquery.mobile.custom.min.js';

		if ( ( wp_is_mobile() && 'deactivate' === $dxss_settings['deactMobile'] ) || ( ! wp_is_mobile() && 'deactivate' === $dxss_settings['deactDesktop'] ) ) {
			add_action( 'wp_footer', array( $this, 'dxss_jquery_plugin_activate' ) );

			wp_enqueue_script( 'jquery-mobile', $jquery_mobile_url, array( 'jquery' ), DXSS_VERSION, false );
			wp_enqueue_script( 'dompurify', $dompurify_url, array(), DXSS_VERSION, false );
			wp_enqueue_script( 'dx-share-selection', $dxss_js_url, array( 'jquery', 'dompurify' ), DXSS_VERSION, $dxss_script_place );

			wp_enqueue_style( 'dxss-css', DXSS_URL . 'assets/dist/css/dxss.min.css', array(), DXSS_VERSION );
		}
	}

	/**
	 * Activate jQuery Selector element.
	 */
	public function dxss_jquery_plugin_activate() {

		// Get the Options.
		$dxss_settings = DXSS_Option_Helper::fetch_settings_data();

		echo "\n" .
			"<script type='text/javascript'>
				/* <![CDATA[ */
					jQuery(document).ready(function(){
						if(jQuery('" . esc_html( $dxss_settings['element'] ) . "').length > 0){
							jQuery('" . esc_html( $dxss_settings['element'] ) . "').selectedTextSharer({
								title : '" . esc_html( $dxss_settings['title'] ) . "',
								lists : '" . esc_html( $this->dxss_get_processed_list() ) . "',
								truncateChars : '" . esc_html( $dxss_settings['truncateChars'] ) . "',
								extraClass : '" . esc_html( $dxss_settings['extraClass'] ) . "',
								borderColor : '" . esc_html( $dxss_settings['borderColor'] ) . "',
								background : '" . esc_html( $dxss_settings['bgColor'] ) . "',
								titleColor : '" . esc_html( $dxss_settings['titleColor'] ) . "',
								hoverColor : '" . esc_html( $dxss_settings['hoverColor'] ) . "',
								textColor : '" . esc_html( $dxss_settings['textColor'] ) . "',
								titleTextColor : '" . esc_html( $dxss_settings['titleTextColor'] ) . "'
							});
						}
					});
				/* ]]>*/
				</script>\n";
	}

	/**
	 * Add the Admin menu.
	 */
	public function dxss_addpage() {
		add_submenu_page( 'options-general.php', 'DX Share Selection', 'DX Share Selection', 'manage_options', 'dx-share-selection', array( $this, 'dxss_admin_page' ) );
	}

	/**
	 * Save the options.
	 */
	public function dxss_save_options() {
		$dxss_settings['title']          = $this->dxss_sanitize_post_data( 'dxss_title' );
		$dxss_settings['lists']          = preg_replace( '/^[ \t]*[\r\n]+/m', '', $this->dxss_sanitize_post_data( 'dxss_lists', 'textarea' ) );
		$dxss_settings['borderColor']    = $this->dxss_sanitize_post_data( 'dxss_borderColor', 'color' );
		$dxss_settings['bgColor']        = $this->dxss_sanitize_post_data( 'dxss_bgColor', 'color' );
		$dxss_settings['titleColor']     = $this->dxss_sanitize_post_data( 'dxss_titleColor', 'color' );
		$dxss_settings['hoverColor']     = $this->dxss_sanitize_post_data( 'dxss_hoverColor', 'color' );
		$dxss_settings['textColor']      = $this->dxss_sanitize_post_data( 'dxss_textColor', 'color' );
		$dxss_settings['titleTextColor'] = $this->dxss_sanitize_post_data( 'dxss_titleTextColor', 'color' );
		$dxss_settings['extraClass']     = $this->dxss_sanitize_post_data( 'dxss_extraClass' );
		$dxss_settings['scriptPlace']    = $this->dxss_sanitize_post_data( 'dxss_scriptPlace' );
		$dxss_settings['truncateChars']  = $this->dxss_sanitize_post_data( 'dxss_truncateChars' );
		$dxss_settings['element']        = $this->dxss_sanitize_post_data( 'dxss_element' );
		$dxss_settings['bitly_token']    = DXSS_Option_Helper::get_bitly_token( $this->dxss_sanitize_post_data( 'dxss_bitly_token' ) );
		$dxss_settings['deactDesktop']   = $this->dxss_sanitize_post_data( 'dxss_deact_desktop' );
		$dxss_settings['deactMobile']    = $this->dxss_sanitize_post_data( 'dxss_deact_mobile' );

		if ( empty( $dxss_settings['deactDesktop'] ) ) {
			$dxss_settings['deactDesktop'] = 'deactivate';
		}

		if ( empty( $dxss_settings['deactMobile'] ) ) {
			$dxss_settings['deactMobile'] = 'deactivate';
		}

		$color_keys   = DXSS_Option_Helper::get_color_options_keys();
		$old_settings = DXSS_Option_Helper::fetch_settings_data();

		$dxss_settings['bitly_token_encrypted'] = ! empty( $dxss_settings['bitly_token'] );

		foreach ( $color_keys as $key ) {
			if ( empty( $dxss_settings[ $key ] ) ) {
				$dxss_settings[ $key ] = $old_settings[ $key ];
			}
		}

		if ( empty( $dxss_settings['element'] ) ) {
			$dxss_settings['element'] = 'body';
		}

		DXSS_Option_Helper::update_settings_data( $dxss_settings );

		echo "<div class='message updated'><p>Updated successfully</p></div>";
	}

	/**
	 * Sanitize $_POST data.
	 *
	 * @param String $data The slug of the $_POST option.
	 * @param string $type The type of data to sanitize.
	 * @return mixed The sanitized data.
	 */
	public function dxss_sanitize_post_data( $data, $type = false ) {
		// phpcs:disable -- Suppressing the Nonce warnings, because we check the nonce before entering this function.
		if ( isset( $_POST[ $data ] ) ) {
			$unslashed_data = wp_strip_all_tags( wp_unslash( $_POST[ $data ] ) );

			if ( 'color' === $type ) {
				return sanitize_hex_color( $unslashed_data );
			} elseif ( 'textarea' === $type ) {
				return sanitize_textarea_field( $unslashed_data );
			} else {
				return sanitize_text_field( $unslashed_data );
			}
		}
		// phpcs:enable

		return '';
	}

	/**
	 * Sanitize $_SERVER data.
	 *
	 * @param String $data The slug of the $_SERVER option.
	 * @return mixed The sanitized data.
	 */
	public function dxss_sanitize_server_data( $data ) {
		if ( isset( $_SERVER[ $data ] ) ) {
			$data = sanitize_text_field( wp_unslash( $_SERVER[ $data ] ) );
			return $data;
		} else {
			return '';
		}
	}

	/**
	 * Admin page options.
	 */
	public function dxss_admin_page() {
		if ( ! empty( $_POST['dxss_submit'] ) ) {
			if ( ! isset( $_POST['dxss_settings_save_nonce'] ) || ! wp_verify_nonce( $this->dxss_sanitize_post_data( 'dxss_settings_save_nonce' ), 'dxss_save_settings' ) ) {
				echo 'Sorry, there was an error saving your settings. Please refresh the page and try again.';
				exit;
			}
			$this->dxss_save_options();
		}

		// Get the Options.
		$dxss_settings = DXSS_Option_Helper::fetch_settings_data();

		// Load the admin menu html.
		require DXSS_DIR . '/templates/dxss.php';
	}
}
