<?php
/*
Plugin Name:       AI Image Lab
Plugin URI:        https://wpzone.co/
Description:       Use AI to generate images for your WordPress site or blog!
Version:           1.0.6
Author:            WP Zone
License:           GPLv3+
License URI:       http://www.gnu.org/licenses/gpl.html
Text Domain:       wpz-ai-image-lab
*/

/*
AI Image Lab
Copyright (C) 2024  WP Zone

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.

===

The text of the GNU General Public License version 3 is in
./license/license.txt.

===

This plugin includes code based on WordPress. WordPress licensing and
copyright information is included in ./license/wp-license.txt.

This plugin includes code based on Gutenberg. Gutenberg licensing and
copyright information is included in ./license/gutenberg-LICENSE.md.

This plugin includes code based on Kadence Blocks, Copyright Kadence WP,
released under the GNU General Public License, version 2 or later. Used in
this project under GNU General Public License version 3 or later
(see ./license/license.txt).
*/

class WpzAiImageLab {
	
	const VERSION = '1.0.6';
	const KEY_ISSUE_URL = 'https://wpzone.co/connect-ai/?keyTarget=30037105';
	const API_URL = 'https://api.aiimagelab.com/api.php';
	const REQUESTS_BASE_URL = 'https://api.aiimagelab.com/get/';
	
	const SAMPLE_PROMPTS = [
		'snowy rocky mountains, low clouds',
		'red car, city street, at night',
		'a frog, on a lilypad, in a pond'
	];

	public static $pluginUrl;
	public static $pluginDir;

	function __construct() {
		self::$pluginUrl = plugin_dir_url(__FILE__);
		self::$pluginDir =  __DIR__ . '/';
		add_action('admin_menu', [$this, 'adminMenu']);
		add_action('admin_init', [$this, 'adminInit']);
		add_action('post-upload-ui', function () { include_once self::$pluginDir . 'includes/upload-ui.php'; });
		add_action('wp_ajax_wpz-ai-images-upload', [$this, 'ajaxUpload']);
		add_action('wp_ajax_wpz-ai-images-block-instructions', [$this, 'ajaxBlockInstructions']);
		add_action('wp_ajax_wpz-ai-images-settings-save', [$this, 'ajaxSaveSettings']);
		add_action('admin_enqueue_scripts', [$this, 'adminScripts'], 99);
		add_action('init', [$this, 'onInit']);
	}
	
	function onInit() {
		load_plugin_textdomain('wpz-ai-image-lab', false, basename(__DIR__).'/languages');
		register_block_type(__DIR__);
		
		if (current_user_can('upload_files')) {
			add_action('wp_enqueue_media', [$this, 'mediaScripts']);
		}
	}
	
	function mediaScripts() {
		$suffix = (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min');
		wp_enqueue_script('wpz-ai-images-media', self::$pluginUrl.'assets/js/media'.$suffix.'.js', ['jquery'], self::VERSION);
		
		$settings = get_user_meta(get_current_user_id(), 'wpz-ai-images-settings', true);
		if ($settings) {
			$settings = json_decode($settings);
		}
		if (!$settings) {
			$settings = [
				'high_quality' => 0,
				'ratio' => 1,
				'width' => 768,
				'height' => 768,
				'edit_hd' => 0,
				'modifier_type' => 'photo'
			];
		}
		
		wp_localize_script('wpz-ai-images-media', 'wpzAiImagesConfig', [
			'ajaxurl' => admin_url('admin-ajax.php'),
			'settings' => $settings
		]);
		wp_enqueue_style('wpz-ai-images-media', self::$pluginUrl.'assets/css/media'.$suffix.'.css', null);
	}
	
	function adminScripts($hook) {
		global $pagenow;
		
		$suffix = (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min');
		
		if (current_user_can('upload_files')) {
			wp_enqueue_style('wpz-ai-images-wp-styles', self::$pluginUrl.'assets/css/wp-styles'.$suffix.'.css', null, self::VERSION);
			wp_enqueue_script('wpz-ai-images-wp-script', self::$pluginUrl.'assets/js/wp-script'.$suffix.'.js', ['jquery'], self::VERSION);
		}
		
		wp_localize_script('wpz-aiil-image-editor-script', 'wpz_aiilg', [
			'key' => get_option('wpz_ai_images_key'),
			'userHasCapability' => current_user_can('upload_files') ? 1 : '',
			'apiUrl' => self::API_URL,
			'getNonce' => wp_create_nonce('wpz-ai-images-get'),
			'settingsSaveNonce' => wp_create_nonce('wpz-ai-images-settings-save'),
			'isPro' => self::isPro() ? 1 : '',
			'hasKey' => empty(get_option('wpz_ai_images_key')) ? '' : 1,
			'pluginUrl' => self::$pluginUrl, 
			'adminPageUrl' => admin_url('admin.php?page=wpz-ai-images'),
			'promptModifiers' => array_map(
				function($modifier) {
					$modifier['values'] = array_map(
						function($value) {
							if (!empty($value['sample-image'])) {
								$value['sample-image'] = self::$pluginUrl.'assets/img/samples/'.$value['sample-image'];
							}
							return $value;
						},
						$modifier['values']
					);
					return $modifier;
				},
				include( self::$pluginDir . 'includes/prompt_modifiers.php' )
			)
		]);
		wp_set_script_translations('wpz-aiil-image-editor-script', 'wpz-ai-image-lab', __DIR__.'/languages');

		if ( 'toplevel_page_wpz-ai-images' === $hook  ) {
            wp_enqueue_style('wpz-ai-images-addons-admin', self::$pluginUrl.'includes/admin/addons/css/admin'.$suffix.'.css', null, self::VERSION);
            wp_enqueue_style('wpz-ai-images-admin', self::$pluginUrl.'assets/css/admin'.$suffix.'.css', null, self::VERSION);
            wp_enqueue_script('wpz-ai-images-admin', self::$pluginUrl.'assets/js/admin'.$suffix.'.js', ['jquery'], self::VERSION);
	    }
		if (isset($pagenow) && $pagenow == 'media-new.php' && current_user_can('upload_files')) {
			$this->mediaScripts();
		}
	}

    function adminInit() {
	    if ( is_admin() ) {
		    include_once self::$pluginDir . 'includes/admin/addons/addons.php';
		    if ( current_user_can( 'manage_options' ) ) {
			    include_once self::$pluginDir . 'includes/admin/notices/admin-notices.php';
				if ( !get_option('wpz_ai_images_welcomed') && (empty($_GET['page']) || $_GET['page'] != 'wpz-ai-images') ) {
					wp_safe_redirect(admin_url('admin.php?page=wpz-ai-images'));
					exit;
				}
		    }
	    }
    }
	
	function ajaxUpload() {
		if (!current_user_can('upload_files')) {
			status_header(403);
			exit;
		}
		
		check_ajax_referer('wpz-ai-images-get', 'nonce');
		
		if (empty($_POST['url']) || substr($_POST['url'], 0, strlen(self::REQUESTS_BASE_URL)) !== self::REQUESTS_BASE_URL) {
			status_header(400);
			exit;
		}
		
		$headersRequest = get_headers(add_query_arg(['key' => get_option('wpz_ai_images_key'), 'validate' => 1], $_POST['url']));
		
		if ($headersRequest && strpos(current($headersRequest), '202')) {
			wp_send_json_success(['wait' => 1]);
		}
		
		add_filter('wp_handle_sideload_prefilter', [__CLASS__, 'filterSideloadFile'], 1);
		$attachmentId = media_sideload_image(add_query_arg('key', get_option('wpz_ai_images_key'), $_POST['url']), isset($_POST['postId']) ? (int) $_POST['postId'] : 0, isset($_POST['prompt']) ? $_POST['prompt'] : null, 'id');
		remove_filter('wp_handle_sideload_prefilter', [__CLASS__, 'filterSideloadFile'], 1);
		
		if (!is_wp_error($attachmentId)) {
			wp_send_json_success( wp_prepare_attachment_for_js( $attachmentId ) );
		}
	}
	
	function ajaxSaveSettings() {
		check_ajax_referer('wpz-ai-images-settings-save', 'nonce');
		
		if (!is_user_logged_in()) {
			wp_send_json_error();
		}
		
		$settings = json_decode(wp_unslash($_POST['settings']), true);
		$settings = array_combine(
			array_map('sanitize_key', array_keys($settings)),
			array_map('sanitize_text_field', array_values($settings))
		);
		update_user_meta(get_current_user_id(), 'wpz-ai-images-settings', wp_json_encode($settings));
		
		wp_send_json_success();
	}
	
	function ajaxBlockInstructions() {
		// Important: This function should be read-only because there is no nonce checked! Output must be HTML-safe!

		include_once self::$pluginDir . 'includes/admin/block-important-info.php';
		exit;
	}
	
	static function filterSideloadFile($file) {
		if (!empty($_POST['prompt'])) {
			$filename = preg_replace('/[^[:alnum:]]/', '-', trim($_POST['prompt']));
			$replaceCount = 0;
			do {
				$filename = str_replace('--', '-', $filename, $replaceCount);
			} while ($replaceCount);
			$filename = trim($filename, '-');
			
			if ($filename) {
				if (strlen($filename) > 32) {
					$lastDash = strrpos($filename, '-', 32 - strlen($filename));
					if ($lastDash) {
						$filename = substr($filename, 0, $lastDash);
					}
				}
				
				$filename .= '.jpg';
				
				$file['name'] = $filename;
			}
		}
		return $file;
	}
	
	function adminMenu() {
		add_menu_page('AI Image Lab', 'AI Image Lab', 'manage_options', 'wpz-ai-images', function () {
			if (!get_option('wpz_ai_images_welcomed')) {
				update_option('wpz_ai_images_welcomed', 1);
			}
			include_once self::$pluginDir . 'includes/admin/admin-page.php';
		}, '', 600);
	}
	
	static function isPro() {
		$isPro = get_transient('wpz_ai_images_pro');
		if ($isPro === false) {
			$apiKey = get_option('wpz_ai_images_key');
			if ($apiKey) {
				$response = json_decode( wp_remote_retrieve_body( wp_remote_post( self::API_URL, ['body' => ['action' => 'quota', 'key' => $apiKey]] ) ) );
				$isPro = ($response && isset($response->plan) && $response->plan === 'pro') ? 'pro' : 'free';
			} else {
				$isPro = 'free';
			}
			
			set_transient('wpz_ai_images_pro', $isPro, 600);
		}
		
		return $isPro === 'pro';
	}
	
}

new WpzAiImageLab();