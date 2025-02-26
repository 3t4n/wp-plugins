<?php

namespace AdEnergizer\AdEnergizer\Admin;

class SettingsPage {
	const PAGE_ID = 'adenergizer_settings';
	const REQUIRED_CAPABILITY = 'manage_options';
	const AD_FILES = [
		'ads_txt'     => ABSPATH . 'ads.txt',
		'app_ads_txt' => ABSPATH . 'app-ads.txt',
	];
	const REVIEW_NOTICE_DISMISSED_META = '_adenergizer-review-notice-dismissed';

	private static bool $should_show_review_notice = true;
	private static array $saved_settings = [];

	public static function init() {
		add_action( 'admin_init', [ __CLASS__, 'register_settings' ] );
		add_action( 'admin_post_' . self::PAGE_ID, [ __CLASS__, 'save_settings' ] );
		add_action( 'wp_ajax_adenergizer-dismiss-review-notice', [ __CLASS__, 'dismiss_review_notice' ] );
		add_action( 'admin_menu', [ __CLASS__, 'register_settings_page' ] );
		add_action( 'admin_enqueue_scripts', [ __CLASS__, 'enqueue_scripts' ] );

		add_filter( 'plugin_action_links_' . plugin_basename( \AdEnergizer::PLUGIN_FILE ), [
			__CLASS__,
			'add_action_links'
		] );
	}

	public static function save_settings() {
		if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], self::PAGE_ID ) ) {
			add_settings_error(
				self::PAGE_ID,
				self::PAGE_ID . '_security_error',
				__( 'Security check failed. You are not allowed to perform this action.', 'adenergizer' ),
			);
		} else if ( isset( $_POST['ads_txt_content'], $_POST['app_ads_txt_content'] ) ) {
			$permissions_error = false;
			foreach ( self::AD_FILES as $key => $filename ) {
				if ( isset( $_POST[ $key . '_enabled' ] ) && 'yes' === $_POST[ $key . '_enabled' ] ) {
					if ( file_exists( $filename . '.disabled' ) ) {
						if ( ! rename( $filename . '.disabled', $filename ) ) {
							$permissions_error = true;
							break;
						}
					}
					if ( false === file_put_contents( $filename, $_POST[ $key . '_content' ] ) ) {
						$permissions_error = true;
						break;
					}
				} else {
					if ( file_exists( $filename ) ) {
						if ( ! rename( $filename, $filename . '.disabled' ) ) {
							$permissions_error = true;
							break;
						}
					}
					if ( false === file_put_contents( $filename . '.disabled', $_POST[ $key . '_content' ] ) ) {
						$permissions_error = true;
						break;
					}
				}
			}
			if ( $permissions_error ) {
				add_settings_error(
					self::PAGE_ID,
					self::PAGE_ID . '_file_permissions_error',
					__( 'Error accessing or modifying the file. Please verify that your webserver has write permissions access to root directory.', 'adenergizer' ),
				);
			} else {
				add_settings_error(
					self::PAGE_ID,
					self::PAGE_ID . '_success',
					__( 'Saved changes successfully.', 'adenergizer' ),
					'success',
				);
			}
		} else {
			add_settings_error(
				self::PAGE_ID,
				self::PAGE_ID . '_fields_missing',
				__( 'Missing required fields. Please try again.', 'adenergizer' ),
			);
		}

		set_transient( 'settings_errors', get_settings_errors( self::PAGE_ID ), 30 );
		wp_redirect( admin_url( 'admin.php?page=' . self::PAGE_ID . '&settings-updated=1' ) );
		exit;
	}

	public static function register_settings() {
		// ads.txt
		$ads_txt_section_id = self::PAGE_ID . '_ads_txt';
		add_settings_section(
			$ads_txt_section_id,
			__( 'Ads.txt', 'adenergizer' ),
			[ __CLASS__, 'render_ads_txt_section' ],
			self::PAGE_ID
		);
		add_settings_field(
			'ads_txt_enabled',
			__( 'Enable Ads.txt', 'adenergizer' ),
			[ __CLASS__, 'render_ads_txt_enable_field' ],
			self::PAGE_ID,
			$ads_txt_section_id,
		);
		add_settings_field(
			'ads_txt_content',
			__( 'Ads.txt Content', 'adenergizer' ),
			[ __CLASS__, 'render_ads_txt_content_field' ],
			self::PAGE_ID,
			$ads_txt_section_id,
		);

		// app-ads.txt
		$app_ads_txt_section_id = self::PAGE_ID . '_app_ads_txt';
		add_settings_section(
			$app_ads_txt_section_id,
			__( 'App-ads.txt', 'adenergizer' ),
			[ __CLASS__, 'render_app_ads_txt_section' ],
			self::PAGE_ID
		);
		add_settings_field(
			'app_ads_txt_enabled',
			__( 'Enable App-ads.txt', 'adenergizer' ),
			[ __CLASS__, 'render_app_ads_txt_enable_field' ],
			self::PAGE_ID,
			$app_ads_txt_section_id,
		);
		add_settings_field(
			'app_ads_txt_content',
			__( 'App-ads.txt Content', 'adenergizer' ),
			[ __CLASS__, 'render_app_ads_txt_content_field' ],
			self::PAGE_ID,
			$app_ads_txt_section_id,
		);
	}

	public static function register_settings_page() {
		add_menu_page(
			__( 'AdEnergizer', 'adenergizer' ),
			__( 'AdEnergizer', 'adenergizer' ),
			self::REQUIRED_CAPABILITY,
			self::PAGE_ID,
			[ __CLASS__, 'render_settings_page' ],
			'dashicons-store'
		);
	}

	public static function dismiss_review_notice() {
		check_ajax_referer( 'adenergizer-dismiss-review-notice' );
		update_user_meta( get_current_user_id(), self::REVIEW_NOTICE_DISMISSED_META, true );
		wp_send_json_success();
		exit;
	}

	public static function maybe_show_plugin_review_notice() {
		if ( ! self::$should_show_review_notice ) {
			return;
		}
		wp_admin_notice( __( sprintf(
			'Show support for <strong>%s</strong> with a 5-star rating. &emsp; <a href="%s" target="_blank" class="button button-primary button-small dismiss-button">Yes, I\'d love to!</a> &ensp; <button class="button button-small dismiss-button">No, thanks</button>',
			\Adenergizer::PLUGIN_NAME,
			\Adenergizer::PLUGIN_REVIEW_URL
		), 'adenergizer' ), [
			'type'               => 'info',
			'additional_classes' => [ 'plugin-review-notice' ],
		] );
	}

	public static function render_settings_page() {
		if ( ! current_user_can( self::REQUIRED_CAPABILITY ) ) {
			wp_die( __( 'You do not have sufficient permissions to access this page.', 'adenergizer' ), 403 );
		}
		$permissions_error = false;
		foreach ( self::AD_FILES as $key => $filename ) {
			if ( file_exists( $filename ) ) {
				$content = file_get_contents( $filename );
				if ( false === $content ) {
					self::$saved_settings[ $key ] = [ 'enabled' => 'no', 'content' => '' ];
					add_settings_error(
						self::PAGE_ID,
						self::PAGE_ID . '_file_permissions_error',
						__( sprintf( 'Error reading file `%s`. Please verify that webserver has write access to root directory.', basename( $filename ) ), 'adenergizer' ),
					);
				} else {
					self::$saved_settings[ $key ] = [
						'enabled' => 'yes',
						'content' => $content,
					];
				}
			} elseif ( file_exists( $filename . '.disabled' ) ) {
				$content = file_get_contents( $filename . '.disabled' );
				if ( false === $content ) {
					self::$saved_settings[ $key ] = [ 'enabled' => 'no', 'content' => '' ];
					add_settings_error(
						self::PAGE_ID,
						self::PAGE_ID . '_file_permissions_error',
						__( sprintf( 'Error reading file `%s`. Please verify that webserver has write access to root directory.', basename( $filename ) ), 'adenergizer' ),
					);
				} else {
					self::$saved_settings[ $key ] = [
						'enabled' => 'no',
						'content' => $content,
					];
				}
			} else {
				self::$saved_settings[ $key ] = [ 'enabled' => 'no', 'content' => '' ];
			}
		}

		include dirname( \AdEnergizer::PLUGIN_FILE ) . '/templates/admin/settings-page.php';
	}

	public static function render_ads_txt_section() {
		_e( 'Fill in ads.txt content and check the checkbox to enable it.', 'adenergizer' );
	}

	public static function render_app_ads_txt_section() {
		_e( 'Fill in app-ads.txt content and check the checkbox to enable it.', 'adenergizer' );
	}

	public static function render_app_ads_txt_content_field() {
		printf(
			'<textarea name="%1$s" id="%1$s" rows="5" cols="60" class="code">%2$s</textarea>',
			"app_ads_txt_content",
			esc_textarea( self::$saved_settings['app_ads_txt']['content'] )
		);
	}

	public static function render_app_ads_txt_enable_field() {
		printf(
			'<input type="checkbox" name="%1$s" id="%1$s" value="yes" %2$s />',
			"app_ads_txt_enabled",
			checked( 'yes', self::$saved_settings['app_ads_txt']['enabled'], false )
		);
	}

	public static function render_ads_txt_content_field() {
		printf(
			'<textarea name="%1$s" id="%1$s" rows="5" cols="60" class="code">%2$s</textarea>',
			"ads_txt_content",
			esc_textarea( self::$saved_settings['ads_txt']['content'] )
		);
	}

	public static function render_ads_txt_enable_field() {
		printf(
			'<input type="checkbox" name="%1$s" id="%1$s" value="yes" %2$s />',
			"ads_txt_enabled",
			checked( 'yes', self::$saved_settings['ads_txt']['enabled'], false )
		);
	}

	public static function enqueue_scripts( string $hook_suffix ) {
		if ( ! function_exists( 'wp_admin_notice' ) ) {
			self::$should_show_review_notice = false;

			return;
		}
		$installed_time = get_option( \Adenergizer::PLUGIN_INSTALLED_TIME_OPTION, - 1 );
		if ( - 1 === $installed_time ) {
			self::$should_show_review_notice = false;

			return;
		}
		$days_installed = round( ( time() - $installed_time ) / DAY_IN_SECONDS );
		if ( $days_installed < 2 ) {
			self::$should_show_review_notice = false;

			return;
		}

		$notice_dismissed = (bool) get_user_meta( get_current_user_id(), self::REVIEW_NOTICE_DISMISSED_META, true );
		if ( $notice_dismissed ) {
			self::$should_show_review_notice = false;

			return;
		}
		if ( 'toplevel_page_' . self::PAGE_ID !== $hook_suffix ) {
			return;
		}
		wp_enqueue_script(
			'adenergizer-settings-page',
			plugins_url( 'assets/js/settings-page.js', \AdEnergizer::PLUGIN_FILE ),
			[],
			\Adenergizer::VERSION,
			[ 'in_footer' => true ]
		);
		wp_localize_script(
			'adenergizer-settings-page',
			'adenergizerSettings',
			[ 'nonce' => wp_create_nonce( 'adenergizer-dismiss-review-notice' ) ]
		);
	}

	public static function add_action_links( array $links ): array {
		array_unshift(
			$links,
			'<a href="' . admin_url( 'admin.php?page=' . self::PAGE_ID ) . '">' . __( 'Settings', 'adenergizer' ) . '</a>'
		);

		return $links;
	}
}