<?php // phpcs:ignore
/**
 * Plugin Name: Easy Replace Image
 * Plugin URI:  https://iuliacazan.ro/easy-replace-image/
 * Description: This plugin allows you to replace an attachment file by uploading another image or by downloading one from a specified URL, without deleting the attachment. The plugin handles the sub-sizes generation and the attachment metadata update, and you will see the result right away.
 * Text Domain: eri
 * Domain Path: /langs
 * Version:     3.4.2
 * Author:      Iulia Cazan
 * Author URI:  https://profiles.wordpress.org/iulia-cazan
 * Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=JJA37EHZXWUTJ
 * License:     GPL2
 *
 * @package eri
 *
 * Copyright (C) 2017-2024 Iulia Cazan
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

define( 'ERI_PLUGIN_VERSION', 3.42 );
define( 'ERI_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'ERI_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'ERI_PLUGIN_SLUG', 'eri' );

/**
 * Class for Replace Image From Upload or URL
 */
class Sisanu_Easy_Replace_Image {
	const PLUGIN_NAME        = 'Easy Replace Image';
	const PLUGIN_SUPPORT_URL = 'https://wordpress.org/support/plugin/easy-replace-image/';
	const PLUGIN_URL         = 'https://iuliacazan.ro/easy-replace-image/';
	const PLUGIN_TRANSIENT   = 'srifu-plugin-notice';

	/**
	 * Class instance.
	 *
	 * @var object
	 */
	private static $instance;

	/**
	 * Get active object instance
	 *
	 * @return object
	 */
	public static function get_instance() { // phpcs:ignore
		if ( ! self::$instance ) {
			self::$instance = new Sisanu_Easy_Replace_Image();
		}
		return self::$instance;
	}

	/**
	 * Class constructor, includes and init method.
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Run action and filter hooks.
	 */
	private function init() {
		$obj = get_called_class();

		add_action( 'after_setup_theme', [ $obj, 'load_textdomain' ], 20 );
		add_action( 'init', [ $obj, 'block_init' ] );
		add_action( 'wp_ajax_eri-element', [ $obj, 'element' ] );
		add_action( 'add_meta_boxes', [ $obj, 'post_metabox' ] );
		add_filter( 'media_row_actions', [ $obj, 'media_actions' ], 10, 2 );
		add_action( 'wp_ajax_eri_from_upload', [ $obj, 'image_replacement_from_upload' ], 99 );
		add_action( 'wp_ajax_eri_from_url', [ $obj, 'image_replacement_from_url' ], 99 );
		add_filter( 'admin_post_thumbnail_html', [ $obj, 'image_replace_ajax_elements' ], 60, 3 );
		add_action( 'admin_enqueue_scripts', [ $obj, 'load_assets' ] );
		add_action( 'wp_enqueue_media', [ $obj, 'add_media_overrides' ] );
		add_action( 'admin_notices', [ $obj, 'plugin_admin_notices' ] );
		add_action( 'wp_ajax_plugin-deactivate-notice-eri', [ $obj, 'plugin_admin_notices_cleanup' ] );
		add_action( 'plugins_loaded', [ $obj, 'plugin_ver_check' ] );
		add_action( 'eri/replacements', [ $obj, 'replacement_task' ] );
		if ( is_admin() ) {
			add_filter( 'wp_get_attachment_image_src', [ $obj, 'wp_get_attachment_image_src' ], 10, 4 );
			add_filter( 'wp_calculate_image_srcset', [ $obj, 'wp_calculate_image_srcset' ], 10, 5 );
			add_action( 'admin_menu', [ $obj, 'admin_menu' ] );
			add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), [ $obj, 'plugin_action_links' ] );
			add_action( 'admin_init', [ $obj, 'update_settings' ] );
		}
	}

	/**
	 * Generic element.
	 *
	 * @return string
	 */
	public static function element(): string {
		ob_start();
		echo self::refresh_from_url_input( 0 ); // phpcs:ignore
		return ob_get_clean();
	}

	/**
	 * Load text domain for internalization.
	 */
	public static function load_textdomain() {
		load_plugin_textdomain( 'eri', false, basename( __DIR__ ) . '/langs' );
	}

	/**
	 * Add the plugin menu.
	 */
	public static function post_metabox() {
		add_meta_box(
			'eri_meta',
			__( 'Easy Replace Image', 'eri' ),
			[ get_called_class(), 'eri_metabox_content' ],
			'attachment',
			'side',
			'default'
		);
	}

	/**
	 * Add the custom replace link to the media item.
	 *
	 * @param  array    $actions Actions.
	 * @param  \WP_Post $post    Current object.
	 * @return array
	 */
	public static function media_actions( array $actions = [], \WP_Post $post = null ): array {
		if ( empty( $post->post_type ) ) {
			// Fail-fast, not a post.
			return $actions;
		}

		if ( 'attachment' !== $post->post_type || ! substr_count( $post->post_mime_type, 'image/' ) || substr_count( $post->post_mime_type, 'image/svg' ) ) {
			// Fail-fast, not a media file that can be replaced.
			return $actions;
		}

		$actions['eri-action'] = '<a href="' . esc_url( admin_url( 'tools.php?page=easy-replace-image-settings&id=' . $post->ID ) ) . '"><div class="dashicons dashicons-format-gallery"></div> ' . esc_html__( 'Easy Replace Image', 'eri' ) . '</a>';
		return $actions;
	}

	/**
	 * Exposes the custom wishlist info in the orders edit page sidebar box.
	 */
	public static function eri_metabox_content() {
		global $post;
		if ( ! empty( $post->ID ) ) {
			self::image_replace_ajax_elements_edit( $post );
		}
	}

	/**
	 * Registers the Gutenberg custom block assets.
	 */
	public static function block_init() {
		if ( ! function_exists( 'register_block_type' ) ) {
			// Gutenberg is not active.
			return;
		}

		$uri = $_SERVER['REQUEST_URI']; // phpcs:ignore
		if ( ! substr_count( $uri, 'post.php' )
			&& ! substr_count( $uri, 'page=easy-replace-image-settings' ) ) {
			// Fail-fast, the assets should not be loaded.
			return;
		}

		include_once __DIR__ . '/parts/block.php';
	}

	/**
	 * Load the plugin assets.
	 */
	public static function load_assets() {
		$current_screen = \get_current_screen();
		if ( empty( $current_screen->base ) || ! in_array( $current_screen->base, [ 'post', 'attachment', 'tools_page_easy-replace-image-settings' ], true ) ) {
			// Fail-fast, we only add assets to this page.
			return;
		}

		include_once __DIR__ . '/parts/assets.php';
	}

	/**
	 * Make preset colors tokens.
	 *
	 * @return string
	 */
	public static function make_preset_colors_tokens() {
		global $_wp_admin_css_colors;

		$user_id = \get_current_user_id();
		$scheme  = \get_user_option( 'admin_color', $user_id );
		$colors  = $_wp_admin_css_colors[ $scheme ]->colors ?? [];
		$main    = $colors[2] ?? '#2271b1';
		if ( 'light' === $scheme ) {
			$main = $colors[3] ?? '#2271b1';
		} elseif ( 'modern' === $scheme ) {
			$main = $colors[1] ?? '#2271b1';
		} elseif ( 'blue' === $scheme ) {
			$main = '#e1a948';
		} elseif ( 'midnight' === $scheme ) {
			$main = $colors[3] ?? '#2271b1';
		}

		// Return the minified string.
		$style = ':root { --eri-color-main: ' . $main . '; --eri-color-faded: ' . $main . '25; }';
		$style = ! empty( $style ) ? trim( preg_replace( '/\s\s+/', ' ', $style ) ) : '';
		return $style;
	}

	/**
	 * Add the new menu in general options section that allows to configure the plugin settings.
	 */
	public static function admin_menu() {
		add_submenu_page(
			'tools.php',
			__( 'Easy Replace Image', 'eri' ),
			__( 'Easy Replace Image', 'eri' ),
			'manage_options',
			'easy-replace-image-settings',
			[ get_called_class(), 'eri_settings' ]
		);
	}

	/**
	 * Custom pagination.
	 *
	 * @param  int $total    Total items.
	 * @param  int $per_page Per page.
	 * @param  int $size     Middle size.
	 * @return string
	 */
	public static function pagination( int $total = 0, int $per_page = 10, int $size = 3 ): string {
		if ( $total <= $per_page || empty( $per_page ) || empty( $total ) ) {
			// Fail-fast, no pagination.
			return '';
		}

		$pages   = ceil( $total / $per_page );
		$current = max( 1, filter_input( INPUT_GET, 'paged', FILTER_VALIDATE_INT ) );
		$current = ( $current > $pages ) ? $pages : $current;
		$current = ( $current <= 1 ) ? 1 : $current;

		$half  = ceil( ( $size - 1 ) / 2 );
		$range = [];
		if ( $current < $size ) {
			$range = range( 1, $size );
			if ( $current < $pages ) {
				$range[] = '>';
				$range[] = $pages;
			}
		} else {
			$start = $current - $half;
			$start = ( $start <= 1 ) ? 1 : $start;
			$end   = $start + $half + 1;
			$end   = ( $end > $pages ) ? $pages : $end;
			$range = range( $start, $end );
			if ( $current >= $size ) {
				array_unshift( $range, 1, '<' );
			}

			if ( $end < $pages ) {
				$range[] = '>';
				$range[] = $pages;
			}
		}

		$pagination = [];
		foreach ( $range as $p ) {
			$item = (int) $p;
			if ( $item > $pages ) {
				break;
			}

			if ( ! empty( $item ) ) {
				$class        = ( $current === $item ) ? ' button-primary' : '';
				$pagination[] = '<a href="' . get_pagenum_link( $item ) . '" class="page-numbers button' . $class . '">' . $item . '</a>';
			} elseif ( '<' === $p ) {
				$pagination[] = '<a href="' . get_pagenum_link( ( $current - 1 ) ) . '" class="page-numbers button nav-prev">&laquo;</a>';
			} else {
				$pagination[] = '<a href="' . get_pagenum_link( ( $current + 1 ) ) . '" class="page-numbers button nav-next">&raquo;</a>';
			}
		}

		$pagination = implode( ' ', $pagination );
		return '<div class="pagination">' . $pagination . '</div>';
	}

	/**
	 * The plugin settings and trigger for image replacement.
	 */
	public static function eri_settings() {
		require_once ERI_PLUGIN_DIR . 'parts/settings.php';
	}

	/**
	 * Return hmain readable files size.
	 *
	 * @param  int $bytes    Bytes.
	 * @param  int $decimals Decimals.
	 * @return string
	 */
	public static function human_filesize( $bytes, $decimals = 2 ) { // phpcs:ignore
		if ( empty( $bytes ) ) {
			return '?';
		}
		$sz = 'KMGTP';
		$fa = floor( ( strlen( (string) $bytes ) - 1 ) / 3 );
		return sprintf( "%.{$decimals}f&nbsp;", $bytes / pow( 1024, $fa ) ) . ( ( 0 == $fa ) ? 'B' : @$sz[ $fa - 1 ] . 'B' ); // phpcs:ignore
	}

	/**
	 * Return the data mapped in the _wp_attachment_metadata of an attachemnt.
	 *
	 * @param  int $initial_image_id The attachment ID.
	 * @return array
	 */
	public static function get_initial_image_metadata( $initial_image_id ) { // phpcs:ignore
		$metadata = maybe_unserialize( get_post_meta( $initial_image_id, '_wp_attachment_metadata', true ) );
		return $metadata;
	}

	/**
	 * Remove the files that were mapped in the _wp_attachment_metadata of an attachemnt.
	 *
	 * @param int    $initial_image_id The attachment ID.
	 * @param string $basedir          The base dir.
	 */
	public static function maybe_remove_files_from_metadata( $initial_image_id, $basedir ) { // phpcs:ignore
		$original_folder = '';
		$removable       = [];
		$metadata        = self::get_initial_image_metadata( $initial_image_id );
		if ( ! empty( $metadata['file'] ) ) {
			$original_folder       = dirname( $metadata['file'] );
			$removable['original'] = $basedir . '/' . $metadata['file'];
		}
		if ( ! empty( $metadata['sizes'] ) ) {
			$sizes = wp_list_pluck( $metadata['sizes'], 'file' );
			foreach ( $sizes as $size => $file ) {
				$removable[ $size ] = $basedir . '/' . $original_folder . '/' . $file;
			}
		}
		if ( ! empty( $removable ) ) {
			foreach ( $removable as $size => $file ) {
				wp_delete_file( $file );
			}
		}
	}

	/**
	 * Return the fail and default response.
	 *
	 * @return array
	 */
	public static function return_fail_response(): array {
		return [
			'url'      => '',
			'new_info' => false,
			'old_info' => false,
			'changed'  => false,
			'srcset'   => '',
		];
	}

	/**
	 * Return the processed guid, new and old metadata, if the image from the specified URL
	 * could be fetched and saved in the uploads directory as the attachment file.
	 *
	 * @param  int    $id  The attachment ID.
	 * @param  string $url The URL of the image used as the replacement.
	 * @return bool|array
	 */
	public static function maybe_replace_image_from_url( $id, $url ) { // phpcs:ignore
		if ( ! empty( $id ) && ! empty( $url ) ) {
			$new_file_content = '';

			// Let's fetch the remote image.
			$response = wp_remote_get( $url );
			$code     = wp_remote_retrieve_response_code( $response );
			if ( 200 === $code ) {
				// Seems that we got a successful response from the remore URL.
				$content_type = wp_remote_retrieve_header( $response, 'content-type' );
				if ( ! empty( $content_type ) && substr_count( $content_type, 'image/' ) ) {
					// Seems that the content type is an image, let's get the body as the file content.
					$new_file_content = wp_remote_retrieve_body( $response );
				}
			}

			if ( ! empty( $new_file_content ) ) {
				return self::maybe_replace_image_from_file_content( $id, $new_file_content );
			}
		}

		return self::return_fail_response();
	}

	/**
	 * Return the processed guid, new and old metadata, if the image from the specified URL
	 * could be fetched and saved in the uploads directory as the attachment file.
	 *
	 * @param  int    $initial_image_id The attachment ID.
	 * @param  string $file             The URL of the image used as the replacement.
	 * @return bool|array
	 */
	public static function maybe_replace_image_from_upload( $initial_image_id, $file ) { // phpcs:ignore
		if ( ! empty( $initial_image_id ) && ! empty( $file ) ) {
			$new_file_content = '';
			$allowed_types    = [
				'image/gif',
				'image/jpg',
				'image/jpeg',
				'image/png',
				'image/webp',
				'image/svg',
				'image/svg+xml',
				'image/avif',
			];

			// Let's check that the file was upoloaded.
			if ( empty( $file['erorr'] ) && ! empty( $file['tmp_name'] )
				&& ! empty( $file['type'] ) && in_array( $file['type'], $allowed_types, true ) ) {
				$new_file_content = @file_get_contents( $file['tmp_name'] ); // phpcs:ignore
			}

			if ( ! empty( ! empty( $file['tmp_name'] ) ) ) {
				@unlink( $file['tmp_name'] ); // phpcs:ignore
			}

			if ( ! empty( $new_file_content ) ) {
				return self::maybe_replace_image_from_file_content( $initial_image_id, $new_file_content );
			}
		}

		return self::return_fail_response();
	}

	/**
	 * Approximate the mime type from filename.
	 *
	 * @param  string $filename Filename.
	 * @return sring
	 */
	public static function approx_mime_type( string $filename ): string {
		$finfo = finfo_open( FILEINFO_MIME_TYPE );
		$mime  = finfo_file( $finfo, $filename );
		finfo_close( $finfo );
		return $mime;
	}

	/**
	 * Return the processed guid, new and old metadata, if the image from the specified URL
	 * could be fetched and saved in the uploads directory as the attachment file.
	 *
	 * @param  int    $initial_image_id The attachment ID.
	 * @param  string $new_file_content The URL of the image used as the replacement.
	 * @return bool|array
	 */
	public static function maybe_replace_image_from_file_content( $initial_image_id, $new_file_content ) { // phpcs:ignore
		if ( ! empty( $initial_image_id ) && ! empty( $new_file_content ) ) {
			$upload_dir = wp_upload_dir();
			$basedir    = $upload_dir['basedir'];
			$post       = get_post( $initial_image_id );
			$meta       = get_post_meta( $initial_image_id, '_wp_attached_file', true );

			if ( ! empty( $meta ) ) {
				$image_path = $basedir . '/' . $meta;
			} else {
				$image_path = $upload_dir['path'] . '/' . basename( $image_url );
			}

			if ( ! empty( $image_path ) && file_exists( $image_path ) ) {
				// Cleanup existing files.
				self::maybe_remove_files_from_metadata( $initial_image_id, $basedir );
			}

			if ( ! empty( $image_path ) && ! file_exists( $image_path ) ) {
				global $wp_filesystem;
				require_once ABSPATH . '/wp-admin/includes/file.php';
				WP_Filesystem();

				// phpcs:disable
				$dir = dirname( $image_path );
				@$wp_filesystem->mkdir( $dir );
				@$wp_filesystem->touch( $image_path );
				// phpcs:enable
			}

			if ( @file_put_contents( $image_path, $new_file_content ) ) { // phpcs:ignore
				$file_info = getimagesize( $image_path );
				if ( empty( $file_info['mime'] ) ) {
					$file_info['mime'] = self::approx_mime_type( $image_path );
				}

				if ( ! function_exists( 'wp_generate_attachment_metadata' ) ) {
					require_once ABSPATH . 'wp-admin/includes/image.php';
				}

				// Delete initial cache for the metadata of this image.
				delete_transient( 'wp_generating_att_' . $initial_image_id );

				// Get the initial image info.
				$old_data = self::get_initial_image_metadata( $initial_image_id );
				$new_data = wp_generate_attachment_metadata( $initial_image_id, $image_path );

				if ( empty( $new_data['width'] ) ) {
					$new_data['width'] = 0;
				}

				if ( empty( $new_data['height'] ) ) {
					$new_data['height'] = 0;
				}

				if ( empty( $new_data['mime-type'] ) ) {
					$new_data['mime-type'] = $file_info['mime'];
				}

				if ( empty( $new_data['file'] ) ) {
					$new_data['file'] = str_replace( $basedir, '', $image_path );
				}

				if ( ! empty( $new_data['file'] ) ) {
					// This means that the metadata was generated for the new image.
					// Allow to filter and maybe override the new metadata.
					$new_data = apply_filters( 'sisanu_replace_image_before_update_attachment_info', $new_data, $old_data );
					wp_update_attachment_metadata( $initial_image_id, $new_data );
				}

				$artdata = [
					'ID'             => (int) $initial_image_id,
					'guid'           => wp_get_attachment_url( (int) $initial_image_id ),
					'post_mime_type' => $file_info['mime'],
				];

				$artdata = apply_filters( 'sisanu_replace_image_before_update_attachment_post', $artdata );
				wp_update_post( $artdata );

				if ( function_exists( 'wp_update_image_subsizes' ) && ! class_exists( 'SIRSC' ) ) {
					// Attempt to regenerate subsizes.
					wp_update_image_subsizes( (int) $initial_image_id );
				}

				self::attempt_purge_cache( (int) $initial_image_id, $image_path, $new_data );
				$srcset = self::make_srcset( $new_data, $old_data );
				$found  = self::replace_old_strings( $old_data, $new_data );
				$direct = filter_input( INPUT_POST, 'direct', FILTER_VALIDATE_INT );
				if ( ! empty( $direct ) ) {
					// When replacing featured image of the current post, we can replace strings directly.
					self::replacement_task( $direct );
				}

				// Return the image URL.
				return [
					'url'        => $artdata['guid'],
					'new_info'   => $new_data,
					'old_info'   => $old_data,
					'found'      => $found,
					'extra_info' => self::make_extra_info( $new_data, $initial_image_id, $found ),
					'changed'    => true,
					'srcset'     => $srcset,
				];
			}
		}

		return self::return_fail_response();
	}

	/**
	 * Match the old with new files and attempt to find content to be replaced.
	 *
	 * @param  array $old Old media metadata.
	 * @param  array $new New media metadata.
	 * @return int
	 */
	public static function replace_old_strings( $old, $new ) { // phpcs:ignore
		if ( empty( $old['file'] ) || empty( $old['sizes'] ) ) {
			return 0;
		}

		$old_path_parts = pathinfo( $old['file'] );
		$new_path_parts = pathinfo( $new['file'] );
		if ( empty( $old_path_parts['dirname'] ) || empty( $new_path_parts['dirname'] ) ) {
			return 0;
		}

		$old_dir = $old_path_parts['dirname'];
		$new_dir = $new_path_parts['dirname'];
		$match   = [];
		if ( $old['file'] !== $new['file'] ) {
			$match[ $old['file'] ] = $new['file'];
		}

		foreach ( $old['sizes'] as $subsize => $info ) {
			if ( empty( $new['sizes'][ $subsize ] ) ) {
				// This has no new correspondent, maybe replace with new full file.
				$match[ $old_dir . '/' . $info['file'] ] = $new['file'];
			} elseif ( $old['sizes'][ $subsize ]['file'] !== $new['sizes'][ $subsize ]['file'] ) {
				// The old subsize has a new file.
				$match[ $old_dir . '/' . $info['file'] ] = $new_dir . '/' . $new['sizes'][ $subsize ]['file'];
			}
		}

		$found = 0;
		if ( ! empty( $match ) ) {
			foreach ( $match as $old_string => $new_string ) {
				$found += self::match_posts_content_replacement( $old_string, $new_string );
			}
		}

		return $found;
	}

	/**
	 * Match posts content for replacement and attempt cron task schedule.
	 *
	 * @param  string $old Old file partial name.
	 * @param  string $new New file partial name.
	 * @return int
	 */
	public static function match_posts_content_replacement( $old, $new ) { // phpcs:ignore
		global $wpdb;

		$found = 0;
		$recs  = $wpdb->get_results( $wpdb->prepare( ' SELECT ID FROM ' . $wpdb->posts . ' WHERE 1 = %d AND post_content LIKE %s and post_type != %s ORDER BY ID DESC ', 1, '%' . $wpdb->esc_like( '/' . $old . '"' ) . '%', 'revision' ) ); // phpcs:ignore
		if ( ! empty( $recs ) ) {
			foreach ( $recs as $rec ) {
				$found += self::maybe_schedule_content_replacement( (int) $rec->ID, $old, $new );
			}
		}

		return $found;
	}

	/**
	 * Update posts meta with replacement strings and schedule/reschedule the
	 * replacement task.
	 *
	 * @param  int    $id         Post where strings to be replaced.
	 * @param  string $old_string Old file partial name.
	 * @param  string $new_string New file partial name.
	 * @return int
	 */
	public static function maybe_schedule_content_replacement( $id, $old_string, $new_string ) {
		$rep = get_post_meta( $id, 'eri_replacements', true );
		$rep = empty( $rep ) ? [] : maybe_unserialize( $rep );

		$rep[ $old_string ] = $new_string;
		update_post_meta( $id, 'eri_replacements', maybe_serialize( $rep ) );

		$cron = get_option( 'eri_cron' );
		if ( ! empty( $cron ) ) {
			// Schedule the hardcoded content replacement task for this post.
			wp_clear_scheduled_hook( 'eri/replacements', [ $id ] );
			wp_schedule_single_event( time() + 1 * MINUTE_IN_SECONDS, 'eri/replacements', [ $id ] );
		}

		return count( $rep );
	}

	/**
	 * Cron task handler for the media partial names replacements in the post.
	 *
	 * @param int $id Post ID.
	 */
	public static function replacement_task( int $id = 0 ) {
		if ( ! empty( $id ) ) {
			$rep = get_post_meta( $id, 'eri_replacements', true );
			if ( empty( $rep ) ) {
				return;
			}

			$rep = maybe_unserialize( $rep );
			if ( ! is_array( $rep ) ) {
				return;
			}

			global $wpdb;
			$text = $wpdb->get_var( $wpdb->prepare( ' SELECT post_content FROM ' . $wpdb->posts . ' WHERE id = %d ORDER BY ID DESC LIMIT 0,1', $id ) ); // phpcs:ignore

			$init = $text;
			foreach ( $rep as $o => $n ) {
				if ( is_string( $o ) && is_string( $n ) ) {
					$text = str_replace( '/' . $o . '"', '/' . $n . '"', $text );
					$text = str_replace( '/' . $o . ' ', '/' . $n . ' ', $text );
				}
			}

			if ( $init !== $text ) {
				wp_update_post( [
					'ID'           => $id,
					'post_content' => $text,
				] );
			}

			delete_post_meta( $id, 'eri_replacements' );
		}
	}

	/**
	 * Attempt to purge cache.
	 *
	 * @param int    $id   Post ID.
	 * @param string $path Original path.
	 * @param array  $info Replacement info.
	 */
	public static function attempt_purge_cache( $id, $path, $info ) {
		clean_post_cache( (int) $id );
		clean_attachment_cache( (int) $id );

		if ( empty( $path ) ) {
			$meta = get_post_meta( $id, '_wp_attached_file', true );
			if ( ! empty( $meta ) ) {
				$upload_dir = wp_upload_dir();
				$basedir    = $upload_dir['basedir'];
				$path       = $basedir . '/' . $meta;
			}
		}

		if ( ! empty( $path ) && file_exists( $path ) ) {
			clearstatcache( true, $path );
		}

		if ( empty( $info['file'] ) ) {
			// Fail-fast.
			return;
		}

		$root   = str_replace( basename( $info['file'] ), '', $path );
		$list   = [];
		$list[] = $path;
		if ( ! empty( $info['sizes'] ) ) {
			foreach ( $info['sizes'] as $size => $img ) {
				if ( ! empty( $img['file'] ) ) {
					$list[] = $root . $img['file'];
				}
			}
		}

		if ( ! empty( $list ) ) {
			foreach ( $list as $item ) {
				if ( file_exists( $item ) ) {
					clearstatcache( true, $item );
				}
			}
		}
	}

	/**
	 * Make extra info.
	 *
	 * @param  array $meta  Attachemnt metadata.
	 * @param  int   $id    Attachment ID.
	 * @param  int   $found Replacement instances.
	 * @return string
	 */
	public static function make_extra_info( array $meta, int $id = 0, int $found = 0 ): string {
		if ( empty( $meta ) ) {
			$meta = wp_get_attachment_metadata( $id );
		}
		if ( empty( $meta ) ) {
			return '';
		}

		// Clear the cache again.
		self::attempt_purge_cache( $id, '', $meta );

		$extra  = '<hr>' . self::human_filesize( $meta['filesize'] ?? 0 );
		$extra .= ' • ' . implode( 'x', [ $meta['width'] ?? 0, $meta['height'] ?? 0 ] ) . 'px';

		if ( ! empty( $found ) ) {
			// translators: %d - total replacements.
			$extra .= ' • ' . sprintf( __( 'Total of references for replacement inside the posts\' contents: %d (the number includes also the sub-sizes).', 'eri' ), $found );
		}

		if ( ! empty( $meta['sizes'] ) ) {
			$extra .= '<ul class="extra">';
			foreach ( $meta['sizes'] as $size => $info ) {
				$subsize = wp_get_attachment_image( $id, $size );
				if ( ! empty( $subsize ) ) {
					$subsize = str_replace( $info['file'], $info['file'] . '?v' . time(), $subsize );
					$extra  .= '<li><b>' . $size . '</b> ' . $subsize . '</li>';
				}
			}
			$extra .= '</ul>';
		}

		return $extra;
	}

	/**
	 * Generate a srcset attribute value from the image metadata.
	 *
	 * @param  array $new_data An image metadata array.
	 * @return string
	 */
	public static function make_srcset( $new_data ) { // phpcs:ignore
		$srcset     = '';
		$upload_dir = wp_upload_dir();
		$baseurl    = trailingslashit( $upload_dir['baseurl'] );
		$folder     = ( ! empty( $new_data['file'] ) ) ? dirname( $new_data['file'] ) : '';
		if ( ! empty( $new_data['sizes'] ) ) {
			foreach ( $new_data['sizes'] as $size => $file_info ) {
				$srcset .= ( '' === $srcset ) ? '' : ', ';
				$srcset .= trailingslashit( $baseurl . $folder ) . $file_info['file'] . '?v=' . time() . ' ' . $file_info['width'] . 'w';
			}
		}

		return $srcset;
	}

	/**
	 * Append the plugin elements used for the replacement of the image in the edit thumbnail code.
	 *
	 * @param  string $content      The post thumbnail html.
	 * @param  int    $post_id      The current post ID.
	 * @param  int    $thumbnail_id The thumbnail ID.
	 * @return string
	 */
	public static function image_replace_ajax_elements( $content, $post_id = 0, $thumbnail_id = 0 ) { // phpcs:ignore
		$attachment_id = 0;
		$display       = false;
		if ( ! empty( $thumbnail_id ) ) {
			$attachment_id = $thumbnail_id;
		} else {
			if ( is_object( $post_id ) ) {
				$post_id = $post_id->ID;
			}
			$post = get_post( $post_id );
			if ( ! empty( $post->post_type ) && 'attachment' === $post->post_type ) {
				$attachment_id = $post_id;
			}
		}
		if ( ! empty( $attachment_id ) ) {
			$button  = '<div id="eri-feature-wrapper" class="eri-feature eri-feature-wrap as-target in-post-view" imageid="' . (int) $attachment_id . '" postid="' . (int) $post_id . '">' . self::refresh_from_url_input( $attachment_id, '', '' ) . '</div>';
			$content = $content . $button;
		}

		return $content;
	}

	/**
	 * Outputs the plugin elements used for the replacement of the image in the edit form after title.
	 *
	 * @param object $post The current post.
	 */
	public static function image_replace_ajax_elements_edit( $post ) { // phpcs:ignore
		if ( is_object( $post ) && ! empty( $post->post_type ) && 'attachment' === $post->post_type ) {
			?>
			<div id="eri-feature-wrapper"
				class="eri-feature eri-feature-wrap as-target in-attachment-view"
				imageid="<?php (int) $post->ID; // phpcs:ignore ?>">
				<?php echo self::refresh_from_url_input( $post->ID, '<div class="inside">', '</div>' ); // phpcs:ignore ?>
			</div>
			<?php
		}
	}

	/**
	 * Returns the markup for the elements used by the image replace functionality.
	 *
	 * @param  int    $attachment_id The attachment ID.
	 * @param  string $before        Markup before the elements.
	 * @param  string $after         Markup after the elements.
	 * @return string
	 */
	public static function refresh_from_url_input( $attachment_id, $before = '', $after = '' ) { // phpcs:ignore
		ob_start();
		?>
		<div class="eri-feature element-container">
			<input type="hidden" id="eri-item-id" name="eri-item-id" value="wrap-<?php echo (int) $attachment_id; ?>">
			<label for="js-serifu-image-fetch-wrap-<?php echo (int) $attachment_id; ?>">
				<h3><?php esc_html_e( 'Easy Replace Image', 'eri' ); ?></h3>
			</label>
			<div class="js-serifu-image-fetch-wrap"
				id="js-serifu-image-fetch-wrap-<?php echo (int) $attachment_id; ?>">
				<?php echo wp_kses_post( $before ); ?>

				<label class="eri-type-selector type-upload">
					<input type="radio"
						name="serifu_replace_type"
						id="serifu_replace_type_upload"
						checked="checked"
						value="upload">
					<?php esc_attr_e( 'Upload', 'eri' ); ?>
				</label>
				<label class="eri-type-selector type-url">
					<input type="radio"
						name="serifu_replace_type"
						id="serifu_replace_type_url"
						value="url">
					<?php esc_attr_e( 'Get from URL', 'eri' ); ?>
				</label>

				<br>

				<div id="js-eri-type-url" class="js-serifu-replace-type-url is-hidden">
					<div>
						<div class="double">
							<?php esc_html_e( 'Download a new image', 'eri' ); ?>
						</div>
						<div class="file-wrap download">
							<input type="text"
								class="js-serifu-image-fetch components-text-control__input"
								placeholder="<?php esc_attr_e( 'Image URL', 'eri' ); ?>">
						</div>
						<div>
							<button type="button"
								id="button-fetch-wrap-<?php echo (int) $attachment_id; ?>"
								class="button button-primary is-primary js-serifu-image-fetch action components-button"
								data-attachment-id="<?php echo (int) $attachment_id; ?>"
								onclick="startERIdownload()">
								<span class="dashicons dashicons-download"></span>
								<?php esc_html_e( 'Download', 'eri' ); ?>
							</button>
						</div>
						<em class="double">
							<?php esc_html_e( 'If the new image can be retrieved in the uploads folder, it will replace the current file.', 'eri' ); ?>
						</em>
					</div>
				</div>

				<div id="js-eri-type-upload" class="js-serifu-replace-type-upload">
					<div>
						<div class="double">
							<?php esc_html_e( 'Upload a new image', 'eri' ); ?>
						</div>
						<div class="file-wrap upload">
							<input id="js-serifu-image-upload-file-<?php echo (int) $attachment_id; ?>"
								type="file"
								class="js-serifu-image-upload components-text-control__input"
								size="200">
						</div>
						<div>
							<button type="button"
								id="button-fetch-upload-<?php echo (int) $attachment_id; ?>"
								class="button button-primary is-primary js-serifu-image-upload action components-button"
								data-attachment-id="<?php echo (int) $attachment_id; ?>"
								onclick="startERIupload()">
								<span class="dashicons dashicons-upload"></span>
								<?php esc_html_e( 'Upload', 'eri' ); ?>
							</button>
						</div>
						<em class="double">
							<?php esc_html_e( 'If the new image can be retrieved in the uploads folder, it will replace the current file.', 'eri' ); ?>
						</em>
					</div>
				</div>

				<span class="js-serifu-image-processed-response"></span>
				<?php echo wp_kses_post( $after ); ?>

				<br>
				<a class="eri-page-link" href="<?php echo esc_url( admin_url( 'tools.php?page=easy-replace-image-settings' ) ); ?>" target="_blank"><?php esc_html_e( 'Easy replace any image', 'eri' ); ?><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="components-external-link__icon css-rvs7bx esh4a730" aria-hidden="true" focusable="false"><path d="M18.2 17c0 .7-.6 1.2-1.2 1.2H7c-.7 0-1.2-.6-1.2-1.2V7c0-.7.6-1.2 1.2-1.2h3.2V4.2H7C5.5 4.2 4.2 5.5 4.2 7v10c0 1.5 1.2 2.8 2.8 2.8h10c1.5 0 2.8-1.2 2.8-2.8v-3.6h-1.5V17zM14.9 3v1.5h3.7l-6.4 6.4 1.1 1.1 6.4-6.4v3.7h1.5V3h-6.3z"></path></svg></a>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * AJAX handler for replecing the file of a specified attachment from a URL.
	 */
	public static function image_replacement_from_url() {
		\check_ajax_referer( 'eri', 'security' );

		$id  = filter_input( INPUT_POST, 'old_image_id', FILTER_VALIDATE_INT );
		$url = filter_input( INPUT_POST, 'file', FILTER_SANITIZE_URL );
		if ( ! empty( $id ) && ! empty( $url ) ) {
			$response = self::maybe_replace_image_from_url( $id, $url );
			self::prepare_replacement_response( $response );
		}

		wp_die();
		die();
	}

	/**
	 * AJAX handler for replecing the file of a specified attachment from an upload.
	 */
	public static function image_replacement_from_upload() {
		\check_ajax_referer( 'eri', 'security' );

		$id = filter_input( INPUT_POST, 'old_image_id', FILTER_VALIDATE_INT );
		if ( ! empty( $id ) && ! empty( $_FILES['file'] ) ) {
			$response = self::maybe_replace_image_from_upload( $id, $_FILES['file'] ); // phpcs:ignore
			self::prepare_replacement_response( $response );
		}

		wp_die();
		die();
	}

	/**
	 * Prepare replacement response.
	 *
	 * @param array $response Response details.
	 */
	public static function prepare_replacement_response( $response ) {
		if ( ! empty( $response ) && ! empty( $response['url'] ) ) {
			$response['url']  = $response['url'] . '?v=' . current_time( 'timestamp' ); // phpcs:ignore
			$response['file'] = $response['new_info']['file'] ?? '';
			if ( ! empty( $response['file'] ) ) {
				$info = pathinfo( $response['file'] );

				$response['file'] = $info['dirname'] . '/' . $info['filename'] . '-';
			}
		}

		echo wp_json_encode( $response );
	}

	/**
	 * Replace the src.
	 *
	 * @param  array  $image         The image attr.
	 * @param  int    $attachment_id Attachment id.
	 * @param  string $size          Size name.
	 * @param  string $icon          Icon.
	 * @return array
	 */
	public static function wp_get_attachment_image_src( $image, $attachment_id, $size, $icon ) { // phpcs:ignore
		if ( is_admin() && ! empty( $image[0] ) && substr_count( $_SERVER['REQUEST_URI'], 'post.php' ) ) { // phpcs:ignore
			if ( ! substr_count( $image[0], '?' ) ) {
				$image[0] = $image[0] . '?v=' . time();
			}
		}
		return $image;
	}

	/**
	 * Replace the urls for the src.
	 *
	 * @param  array $sources       The images sources.
	 * @param  array $size_array    The image sizes.
	 * @param  array $image_src     The image src.
	 * @param  array $image_meta    The image meta.
	 * @param  int   $attachment_id Attachment id.
	 * @return array
	 */
	public static function wp_calculate_image_srcset( $sources, $size_array, $image_src, $image_meta, $attachment_id ) { // phpcs:ignore
		if ( is_admin() && ! empty( $sources ) ) {
			foreach ( $sources as $k => $source ) {
				if ( ! substr_count( $sources[ $k ]['url'], '?' ) ) {
					$sources[ $k ]['url'] .= '?v=' . time();
				}
			}
		}
		return $sources;
	}

	/**
	 * Update cron task settings.
	 */
	public static function update_settings() {
		$nonce = filter_input( INPUT_POST, 'eri_settings_nonce', FILTER_DEFAULT );
		if ( empty( $nonce ) ) {
			// No need to continue.
			return;
		}
		if ( ! wp_verify_nonce( $nonce, 'eri_settings_save' ) ) {
			esc_html_e( 'Action not allowed.', 'eri' );
			die();
		}

		$cron = filter_input( INPUT_POST, 'eri_cron', FILTER_DEFAULT );
		if ( 'on' === $cron ) {
			update_option( 'eri_cron', true );
		} else {
			delete_option( 'eri_cron' );
		}
	}

	/**
	 * The actions to be executed when the plugin is activated.
	 */
	public static function activate_plugin() {
		set_transient( self::PLUGIN_TRANSIENT, true );
	}

	/**
	 * The actions to be executed when the plugin is deactivated.
	 */
	public static function deactivate_plugin() {
		self::plugin_admin_notices_cleanup( false );
	}

	/**
	 * The actions to be executed when the plugin is updated.
	 */
	public static function plugin_ver_check() {
		$opt = str_replace( '-', '_', self::PLUGIN_TRANSIENT ) . '_db_ver';
		$dbv = get_option( $opt, 0 );
		if ( ERI_PLUGIN_VERSION !== (float) $dbv ) {
			update_option( $opt, ERI_PLUGIN_VERSION );
			self::activate_plugin();
		}
	}

	/**
	 * Execute notices cleanup.
	 *
	 * @param bool $ajax Is AJAX call.
	 */
	public static function plugin_admin_notices_cleanup( $ajax = true ) { // phpcs:ignore
		// Delete transient, only display this notice once.
		delete_transient( self::PLUGIN_TRANSIENT );

		if ( true === $ajax ) {
			// No need to continue.
			wp_die();
		}
	}

	/**
	 * Append the plugin URL.
	 *
	 * @param  array $links The plugin links.
	 * @return array
	 */
	public static function plugin_action_links( array $links ): array {
		$all   = [];
		$all[] = '<a href="' . esc_url( admin_url( 'tools.php?page=easy-replace-image-settings' ) ) . '">' . __( 'Settings', 'eri' ) . '</a>';
		$all[] = '<a href="https://iuliacazan.ro/easy-replace-image">' . __( 'Plugin URL', 'eri' ) . '</a>';
		$all   = array_merge( $all, $links );
		return $all;
	}

	/**
	 * Add media overrides.
	 */
	public static function add_media_overrides() {
		add_action( 'admin_footer-upload.php', [ get_called_class(), 'override_media_templates' ] );
	}

	/**
	 * Media overrides.
	 */
	public static function override_media_templates() {
		include_once __DIR__ . '/parts/media-template.php';
	}

	/**
	 * Maybe donate or rate.
	 *
	 * @return string
	 */
	public static function donate_text(): string {
		$donate = 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=JJA37EHZXWUTJ&item_name=' . rawurlencode( 'Support for development and maintenance (' . self::PLUGIN_NAME . ')' );
		$thanks = __( 'A huge thanks in advance!', 'eri' );

		return sprintf(
				// Translators: %1$s - donate URL, %2$s - rating, %3$s - thanks.
			__( 'If you find the plugin useful and would like to support my work, please consider making a <a href="%1$s" target="_blank">donation</a>. It would make me very happy if you would leave a %2$s rating. %3$s', 'eri' ),
			$donate,
			'<a href="' . self::PLUGIN_SUPPORT_URL . 'reviews/?rate=5#new-post" class="rating" target="_blank" rel="noreferrer" title="' . esc_attr( $thanks ) . '">★★★★★</a>',
			$thanks
		);
	}

	/**
	 * Show donate or rate.
	 */
	public static function show_donate_text() {
		if ( apply_filters( 'eri_filter_remove_donate_info', false ) ) {
			return;
		}
		?>
		<div class="donate">
			<img src="<?php echo esc_url( ERI_PLUGIN_URL . 'assets/images/icon-128x128.gif' ); ?>" width="32" height="32" alt="<?php echo esc_html( self::PLUGIN_NAME ); ?>">
			<div>
				<?php echo wp_kses_post( self::donate_text() ); ?>
			</div>
		</div>
		<?php
	}

	/**
	 * Admin notices.
	 */
	public static function plugin_admin_notices() {
		if ( apply_filters( 'eri_filter_remove_update_info', false ) ) {
			return;
		}

		$maybe_trans = get_transient( self::PLUGIN_TRANSIENT );
		if ( ! empty( $maybe_trans ) ) {
			$slug   = md5( ERI_PLUGIN_SLUG );
			$ptitle = __( 'Easy Replace Image', 'eri' );
			$donate = 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=JJA37EHZXWUTJ&item_name=Support for development and maintenance (' . rawurlencode( $ptitle ) . ')';

			// Translators: %1$s - plugin name.
			$activated = sprintf( __( '%1$s plugin was activated!', 'eri' ), '<b>' . $ptitle . '</b>' );

			$other_notice = sprintf(
				// Translators: %1$s - plugins URL, %2$s - heart, %3$s - extensions URL, %4$s - star, %5$s - pro.
				__( '%5$sCheck out my other <a href="%1$s" target="_blank" rel="noreferrer">%2$s free plugins</a> on WordPress.org and the <a href="%3$s" target="_blank" rel="noreferrer">%4$s other extensions</a> available!', 'eri' ),
				'https://profiles.wordpress.org/iulia-cazan/#content-plugins',
				'<span class="dashicons dashicons-heart"></span>',
				'https://iuliacazan.ro/shop/',
				'<span class="dashicons dashicons-star-filled"></span>',
				''
			);
			?>
			<div id="item-<?php echo esc_attr( $slug ); ?>" class="notice is-dismissible">
				<div class="content">
					<a class="icon" href="<?php echo esc_url( admin_url( 'tools.php?page=easy-replace-image-settings' ) ); ?>"><img src="<?php echo esc_url( ERI_PLUGIN_URL . 'assets/images/icon-128x128.gif' ); ?>"></a>
					<div class="details">
						<div>
							<h3><?php echo wp_kses_post( $activated ); ?></h3>
							<div class="notice-other-items"><?php echo wp_kses_post( $other_notice ); ?></div>
						</div>
						<div><?php echo wp_kses_post( self::donate_text() ); ?></div>
						<a class="notice-plugin-donate" href="<?php echo esc_url( $donate ); ?>" target="_blank"><img src="<?php echo esc_url( ERI_PLUGIN_URL . 'assets/images/buy-me-a-coffee.png?v=' . ERI_PLUGIN_VERSION ); ?>" width="200"></a>
					</div>
				</div>
				<button type="button" class="notice-dismiss" onclick="dismiss_notice_for_<?php echo esc_attr( $slug ); ?>()"><span class="screen-reader-text"><?php esc_html_e( 'Dismiss this notice.', 'eri' ); ?></span></button>
			</div>
			<?php
			$style = '#trans123super{--color-bg:rgba(17,117,108,.1); --color-border:rgb(17,117,108); border-left-color:var(--color-border);padding:0 38px 0 0!important}#trans123super *{margin:0}#trans123super .dashicons{color:var(--color-border)}#trans123super a{text-decoration:none}#trans123super img{display:flex;}#trans123super .content,#trans123super .details{display:flex;gap:1rem;padding-block:.5em}#trans123super .details{align-items:center;flex-wrap:wrap;padding-block:0}#trans123super .details>*{flex:1 1 35rem}#trans123super .details .notice-plugin-donate{flex:1 1 auto}#trans123super .details .notice-plugin-donate img{max-width:100%}#trans123super .icon{background:var(--color-bg);flex:0 0 4rem;margin:-.5em 0;padding:1rem}#trans123super .icon img{display:flex;height:auto;width:4rem} #trans123super h3{margin-bottom:0.5rem;text-transform:none}';
			$style = str_replace( '#trans123super', '#item-' . esc_attr( $slug ), $style );
			echo '<style>' . $style . '</style>'; // phpcs:ignore
			?>
			<script>function dismiss_notice_for_<?php echo esc_attr( $slug ); ?>() { document.getElementById( 'item-<?php echo esc_attr( $slug ); ?>' ).style='display:none'; fetch( '<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>?action=plugin-deactivate-notice-<?php echo esc_attr( ERI_PLUGIN_SLUG ); ?>' ); }</script>
			<?php
		}
	}
}

// Instantiate the class.
$srifu = Sisanu_Easy_Replace_Image::get_instance();

register_activation_hook( __FILE__, [ $srifu, 'activate_plugin' ] );
register_deactivation_hook( __FILE__, [ $srifu, 'deactivate_plugin' ] );
