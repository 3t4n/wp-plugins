<?php
/* ======================================================
 # Easy Custom Code (LESS/CSS/JS) - Live editing for WordPress - v1.1.2 (free version)
 # -------------------------------------------------------
 # Author: Web357
 # Copyright © 2014-2025 Web357. All rights reserved.
 # License: GNU/GPLv3, http://www.gnu.org/licenses/gpl-3.0.html
 # Website: https://www.web357.com/easy-custom-code-wordpress-plugin
 # Demo: https://demo-wordpress.web357.com/
 # Support: https://www.web357.com/support
 # Last modified: Friday 31 January 2025, 12:48:01 AM
 ========================================================= */
class w357EasyCustomCode
{
	/**
	 * Sets up all the filters and actions.
	 */
	public function run()
	{
		add_action( 'wp_enqueue_scripts', array($this, 'enqueue_styles'));
		add_action( 'customize_register', 'web357_customizer_customize_register');
		add_action( 'customize_save_after', 'web357_customizer_createCSS');
		add_action( 'customize_save_after', 'web357_customizer_createJS');
		
		$options = get_option('easy_custom_code_options');
		$js_position = isset($options['js_position']) ? $options['js_position'] : 'footer';
		
		// add the scripts to the head or to the footer
		if ($js_position == 'head') {
			add_action('wp_enqueue_scripts', array($this, 'web357_customizer_load_libraries_to_head'));
		} else {
			add_action('wp_enqueue_scripts', array($this, 'web357_customizer_load_libraries_to_footer'));
		}

		// custom code (in <head>, after <body>, before </body>)
		add_action( 'wp_head', array($this, 'web357_custom_code_in_head_tag'));
		add_action( 'wp_body_open', array($this, 'web357_custom_code_after_body'));
		add_action( 'wp_footer', array($this, 'web357_custom_code_before_body'));
		
		// settings link in admin
		add_action( 'admin_menu', array($this, 'web357_customizer_section_admin_menu_settings_link'));
	}

	/**
	 * Custom code in <head> tag
	 *
	 * @return void
	 */
	public function web357_custom_code_in_head_tag()
	{
		$custom_code = trim(get_option('web357_theme_customizer_code_head', ''));
		
		if (!empty($custom_code))
		{
			$custom_code_html = "\n"."<!-- BEGIN: Easy Custom Code -->"."\n";
        	$custom_code_html .= $custom_code;
			$custom_code_html .= "\n"."<!-- END: Easy Custom Code -->"."\n\n";
			echo wp_kses_post($custom_code_html);
		}
	}

	/**
	 * Custom code after open <body> tag
	 *
	 * @return void
	 */
	public function web357_custom_code_after_body()
	{
		$custom_code = trim(get_option('web357_theme_customizer_code_after_body', ''));
		if (!empty($custom_code))
		{
			$custom_code_html = "\n"."<!-- BEGIN: Easy Custom Code -->"."\n";
			$custom_code_html .= $custom_code;
			$custom_code_html .= "\n"."<!-- END: Easy Custom Code -->"."\n\n";
			echo wp_kses_post($custom_code_html);
		}
	}

	/**
	 * Custom code before closing </body> tag
	 *
	 * @return void
	 */
	public function web357_custom_code_before_body()
	{
		$custom_code = trim(get_option('web357_theme_customizer_code_before_body', ''));
		if (!empty($custom_code))
		{
			$custom_code_html = "\n"."<!-- BEGIN: Easy Custom Code -->"."\n";
			$custom_code_html .= $custom_code;
			$custom_code_html .= "\n"."<!-- END: Easy Custom Code -->"."\n\n";
			echo wp_kses_post($custom_code_html);
		}
	}

	/**
	 * Load CSS & Javascript files to head
	 *
	 * @return void
	 */
	public function web357_customizer_load_libraries_to_footer() {
		$items_scripts = json_decode(get_option('hidden_web357_customizer_json_items_scripts', ''));
		$web357_theme_customizer_code_js = get_option('web357_theme_customizer_code_js', '');

		// Custom JS
		$wp_upload_dir = wp_upload_dir();
		$upload_dir_base_url = $wp_upload_dir['baseurl'].'/easy-custom-code/js';
		$get_web357_customizer_random_file_name_suffix = get_option('web357_customizer_random_file_name_suffix', '');

		// JS file name
		$js_file_name = (!empty($get_web357_customizer_random_file_name_suffix)) ? 'script_' . $get_web357_customizer_random_file_name_suffix : 'script';

		// Enqueue external scripts
		if (!empty($items_scripts)) {
			for ($i = 0; $i < count($items_scripts); $i++) {
				wp_enqueue_script('easy-custom-code-lib-' . ($i + 1), esc_url($items_scripts[$i]), array(), '[VERSION]', true);
			}
		}

		// Enqueue custom JavaScript
		if (!empty(trim($web357_theme_customizer_code_js))) {
			$js_file_path = $upload_dir_base_url . '/' . $js_file_name . '.js';
			if (file_exists($js_file_path)) {
				wp_enqueue_script('easy-custom-code-custom-js', esc_url($js_file_path), array(), '[VERSION]', true);
			} else {
				wp_add_inline_script('easy-custom-code-inline-js', $web357_theme_customizer_code_js);
			}
		}

		add_action('wp_footer', function() {
			echo "\n\n" . wp_kses_post("<!-- BEGIN: Easy Custom Code (Javascript) -->") . "\n";
			echo wp_kses_post("<!-- END: Easy Custom Code (Javascript) -->") . "\n\n";
		});
	}

	public function web357_customizer_load_libraries_to_head() {
		$items_scripts = json_decode(get_option('hidden_web357_customizer_json_items_scripts', ''));
		$web357_theme_customizer_code_js = get_option('web357_theme_customizer_code_js', '');

		// Custom JS
		$wp_upload_dir = wp_upload_dir();
		$upload_dir_base_url = $wp_upload_dir['baseurl'].'/easy-custom-code/js';
		$get_web357_customizer_random_file_name_suffix = get_option('web357_customizer_random_file_name_suffix', '');

		// JS file name
		$js_file_name = (!empty($get_web357_customizer_random_file_name_suffix)) ? 'script_' . $get_web357_customizer_random_file_name_suffix : 'script';

		// Enqueue external scripts
		if (!empty($items_scripts)) {
			for ($i = 0; $i < count($items_scripts); $i++) {
				wp_enqueue_script('easy-custom-code-lib-' . ($i + 1), esc_url($items_scripts[$i]), array(), '[VERSION]', false);
			}
		}

		// Enqueue custom JavaScript
		if (!empty(trim($web357_theme_customizer_code_js))) {
			$js_file_path = $upload_dir_base_url . '/' . $js_file_name . '.js';
			if (file_exists($js_file_path)) {
				wp_enqueue_script('easy-custom-code-custom-js', esc_url($js_file_path), array(), '[VERSION]', false);
			} else {
				wp_add_inline_script('easy-custom-code-inline-js', $web357_theme_customizer_code_js);
			}
		}

		add_action('wp_head', function() {
			echo "\n\n" . wp_kses_post("<!-- BEGIN: Easy Custom Code (Javascript) -->") . "\n";
			echo wp_kses_post("<!-- END: Easy Custom Code (Javascript) -->") . "\n\n";
		});
	}

	/**
	 * Link to admin menu
	 *
	 * @return void
	 */
	public function web357_customizer_section_admin_menu_settings_link() {
		add_menu_page(
			esc_html__('Easy Custom Code', 'easy-custom-code'),
			esc_html__('Easy Custom Code', 'easy-custom-code'),
			'manage_options',
			'/customize.php?autofocus[section]=web357_customizer_section',
			'',
			'dashicons-admin-appearance'
		);

		add_submenu_page(
			'/customize.php?autofocus[section]=web357_customizer_section',
			esc_html__('Open Customizer', 'easy-custom-code'),
			esc_html__('Open Customizer', 'easy-custom-code'),
			'manage_options',
			'/customize.php?autofocus[section]=web357_customizer_section'
		);

		add_submenu_page(
			'/customize.php?autofocus[section]=web357_customizer_section',
			esc_html__('Settings', 'easy-custom-code'),
			esc_html__('Settings', 'easy-custom-code'),
			'manage_options',
			'options-general.php?page=easy-custom-code'
		);
	}

	public function enqueue_styles()
	{
    	wp_register_style('easy-custom-code-inline-style', false, [], '[VERSION]');
		wp_enqueue_style('easy-custom-code-inline-style');
	}
}

function web357_customizer_customize_register($wp_customize){
	/**
	 * Add SECTION
	 */
    $section_description = '<h4>' . esc_html__( 'How it works?', 'easy-custom-code' ) . '</h4>';
    $section_description .= wp_kses( wp_kses_post( '<p>The first textarea is the "CSS or LESS", and the second is the "Javascript". You can enter your CSS/LESS/JS code in these input fields and you can see the result in real-time at the right frame which is your frontend website. <a href="options-general.php?page=easy-custom-code" target="_blank">Settings</a></p>', 'easy-custom-code' ), array( 'strong' => array(), 'br' => array(), 'p' => array(), 'a' => array('href'=>array()) ) );
    $section_description .= '<h4>' . esc_html__( 'What is Less?', 'easy-custom-code' ) . '</h4>';
    $section_description .= wp_kses( wp_kses_post( '<p>In simple terms, LESS allows you to write CSS in a smarter way by combining functions, mixins, operations and more. This means you write more concise style information and can reuse things like colors and styles more easily. The Pro edition of the Web Workbench supports generating CSS files automatically rather than needing to do JavaScript parsing. Read more info about less in the official website lesscss.org.</p>', 'easy-custom-code' ), array( 'strong' => array(), 'br' => array(), 'p' => array(), 'a' => array('href'=>array()) ) );
			
	$wp_customize->add_section( 'web357_customizer_section', array(
		'title'    => esc_html__( 'Easy Custom Code (LESS/CSS/JS) - Live editing', 'easy-custom-code' ),
		'priority' => 9999,
		'description_hidden' => true,
		'description' => $section_description,
	) );

	

	// css libraries (only the button)
	class web357_customizer_control_button_css extends WP_Customize_Control {
		public $type = 'text';

		public function render_content() {
			?>
				

				<span class="web357-customizer-tab__external-button" onClick="web357_customizer_modal_css.toggle()">
					<?php echo esc_html__('Add External Stylesheets', 'easy-custom-code'); ?> (<span id="web357_external_button_count_libraries_css" style="display:inline-block;"></span>)
				</span>
				<script>
					//It is being used only on first load, after it refreshes from .put_data_to_hidden_fields()
					/*START:: Count libraries & Buttons*/
					var count_css_external_libraries = wp.customize( 'hidden_web357_customizer_json_items_css' ).get();
					try {
						count_css_external_libraries = JSON.parse(count_css_external_libraries).length;
					} catch (e) {
						count_css_external_libraries = 0;
					}
					document.getElementById("web357_external_button_count_libraries_css").innerHTML = count_css_external_libraries;
					/*END:: Count libraries & Buttons*/
				</script>
			<?php
		}
	}

	// js libaries (only the button)
	class web357_customizer_control_button_scripts extends WP_Customize_Control {
		public $type = 'text';

		public function render_content() {
			?>
				

				<span class="web357-customizer-tab__external-button" onClick="web357_customizer_modal_scriptfiles.toggle()">
					<?php echo esc_html__('Add External Scripts', 'easy-custom-code'); ?> (<span id="web357_external_button_count_libraries_scriptfiles" style="display:inline-block;"></span>)
				</span>
				<script>
					//It is being used only on first load, after it refreshes from .put_data_to_hidden_fields()
					/*START:: Count libraries & Buttons*/
					var count_css_external_libraries = wp.customize( 'hidden_web357_customizer_json_items_scripts' ).get();
					try {
						count_css_external_libraries = JSON.parse(count_css_external_libraries).length;
					} catch (e) {
						count_css_external_libraries = 0;
					}
					document.getElementById("web357_external_button_count_libraries_scriptfiles").innerHTML = count_css_external_libraries;
					/*END:: Count libraries & Buttons*/
				</script>
			<?php
		}
	}

	class web357_customizer_Custom_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';

		public function render_content() {
			?>
			<style>
				.wp-full-overlay.expanded {
					margin-left: 350px;
				}

				.wp-full-overlay-sidebar,
				#customize-control-custom_css {
					width: 350px;
				}

				.web357-customizer-tab__modal-container {
					position:fixed;
					z-index: 1455;
					top:0;
					left:0;
					width:100%;
					height:100%;
					overflow: auto;
					word-break: break-word;
				}
				.web357-customizer-tab__modal-container-content {
					position: relative;
					display: block;
					margin: auto;
					width: 80vw;
					max-width: 600px;
					top: 30px;
					background-color: #FFFFFF;
					border-radius:3px;
					border:2px #FFFFFF solid;
					z-index: 1457;
				}
				.web357-customizer-tab__modal-container-content-top {
					background:#2d303a;
				}
				.web357-customizer-tab__modal-container-content-top-title {
					display: block;
					font-size: 19px;
					color:#FFFFFF;
					padding:20px;
				}
				.web357-customizer-tab__modal-container-content-top-close {
					background: #03A8F3;
					color: #FFFFFF;
					font-size: 13px;
					padding: 10px;
					display: inline-block;
					position: absolute;
					right: 20px;
					top: 10px;
					border-radius: 3px;
					cursor:pointer;
				}
				.web357-customizer-tab__modal-container-content-middle {
					display:block;
					padding-bottom: 20px;
				}
				.web357-customizer-tab__modal-container-content-middle2 {
					display:block;
					padding-bottom: 20px;
				}
				.web357-customizer-tab__modal-container-content-middle-label {
					display:block;
					font-size:20px;
					color:#0A0A0A;
					padding:20px 20px 10px 20px;
				}
				.web357-customizer-tab__modal-container-content-middle-descr {
					display:block;
					font-size:13px;
					color:#0A0A0A;
					padding:0px 20px 20px 20px;
				}
				.web357-customizer-tab__modal-container-content-middle-input-search {
					display: block;
					width: 94% !important;
					padding: 10px !important;
					margin-left: 3% !important;
					outline: 0 !important;
					background: #e3e4e9 !important;
					border: 2px #CECECE solid !important;
					color: #0A0A0A !important;
					border-radius: 3px !important;
				}
				.web357-customizer-tab__modal-container-content-middle-results-search {
					display: block;
					position: relative;
					width: 94%;
					margin-left: 3%;
					margin-top: 10px;
				}
				.web357-customizer-tab__modal-container-content-middle-results-search-item {
					display: block;
					position: relative;
					width: 94%;
					margin-left: 0px;
					padding:10px 3% 10px 3%;
					margin-top: 1px;
					background: #2d303a;
					color:#FFFFFF;
					cursor:pointer;
					transition:0.3s;
				}
				.web357-customizer-tab__modal-container-content-middle-results-search-item:hover {
					background: #03A8F3;
					transition:0.3s;
				}
				.web357-customizer-tab__modal-container-content-middle-results-search-item-version {
					display:inline-block;
					font-size:17px;
					width: 25%;
					text-align:right;
				}
				.web357-customizer-tab__modal-container-content-middle-results-search-item-title {
					display:inline-block;
					font-size:17px;
					width: 70%;
				}
				.web357-customizer-tab__modal-container-content-middle-results-search-item-descr {
					display:block;
					font-size:13px;
					color:#EDEDED;
				}
				.web357-customizer-tab__modal-bg-overlay {
					position:fixed;
					z-index: 1455;
					top:0;
					left:0;
					width:100vw;
					height:100vh;
					background-color: rgba(10, 10, 10, 0.7);
				}
				.web357-customizer-tab__modal-bg-overlay.disabled, .web357-customizer-tab__modal-container.disabled {
					display: none;
				}
				.web357-customizer-tab__modal-bg-overlay.enabled, .web357-customizer-tab__modal-container.enabled {
					display: block;
				}
				/*Start :: Modal add source item*/
				.web357-customizer-tab__modal-container-content-middle-item {
					position:relative;
					display:block;
					width:94%;
					margin-left:3%;
					background:#F4F4F4;
					border-radius:3px;
					margin-top:7px
				}
				.web357-customizer-tab__modal-container-content-middle-reorder-group {
					display:inline-block;
				}
				.web357-customizer-tab__modal-container-content-middle-reorder-group-button {
					width:20px;
					font-size:10px;
					display:block;
					padding:5px;
					text-align:center;
					cursor:pointer;
				}
				.web357-customizer-tab__modal-container-content-middle-reorder-group-button:hover {
					background-color:#03A8F3;
					color:#FFFFFF;
				}

				.web357-customizer-tab__modal-container-content-middle-input-group {
					display:inline-block;
					width:70%;
					height: 0px;
				}
				.web357-customizer-tab__modal-container-content-middle-input-group-inputtext {
					position:relative !important;
					top:-13px !important;
					font-size:13px !important;
					border:0 !important;
					outline:0 !important;
					padding:10px !important;
					width:100% !important;
				}

				.web357-customizer-tab__modal-container-content-middle-close-group {
					display:inline-block;
				}
				.web357-customizer-tab__modal-container-content-middle-close-group-button {
					position:absolute;
					top:0;
					right:0;
					font-size:14px;
					color:#FFFFFF;
					background:#03A8F3;
					width: 60px;
					text-align: center;
					padding: 6px 0px 6px 0px;
					cursor:pointer;
				}
				.web357-customizer-tab__modal-container-content-middle-close-group-button-eye {
					position: absolute;
					top: 30px;
					right: 0px;
					font-size: 14px;
					color: #03A8F3;
					background: #FFFFFF;
					width: 60px;
					text-align: center;
					padding: 2px 0px 2px 0px;
					height: 22px;
					cursor: pointer;
				}
				.web357-customizer-tab__modal-container-content-middle-add-new-resource {
					display:block;
					width:94%;
					margin-left:3%;
					margin-top:15px;
					background-color:#03A8F3;
					color:#FFFFFF;
					text-align:center;
					padding:10px 0px 10px 0px;
					cursor:pointer;
				}
				/*End :: Modal add source item*/

				.web357-customizer-tab__external-button {
					width:100%;
					background: #03A8F3;
					color: #FFFFFF;
					padding:15px 0px 15px 0px;
					text-align:center;
					display: block;
					cursor:pointer;
					margin-top:10px;
					font-size:13px;
				}

				/*START:: Hide json CSS & SCRIPTS textareas*/
				#_customize-input-hidden_web357_customizer_json_items_css,#_customize-input-hidden_web357_customizer_json_items_scripts {
					display: none;
				}
				/*END:: Hide json CSS & SCRIPTS textareas*/

				/*START:: ICONS CSS*/
				.svg-icon {
					width: 20px;
					height: 20px;
				}

				.svg-icon path,
				.svg-icon polygon,
				.svg-icon rect {
					fill: #4691f6;
				}

				.svg-icon circle {
					stroke: #4691f6;
					stroke-width: 1;
				}
				/*END:: ICONS CSS*/

				
			</style>

			

			<div id="web357_customizer_modal_content_css" class="web357-customizer-tab__modal-container disabled">
				<div id="web357_customizer_modal_bg_css" class="web357-customizer-tab__modal-bg-overlay disabled" onClick="web357_customizer_modal_css.toggle()"></div>
				<div class="web357-customizer-tab__modal-container-content">
					<div class="web357-customizer-tab__modal-container-content-top">
						<span class="web357-customizer-tab__modal-container-content-top-title">
							CSS
							<span onClick="web357_customizer_modal_css.toggle()" class="web357-customizer-tab__modal-container-content-top-close"><?php echo esc_html__('Apply Changes', 'easy-custom-code'); ?></span>
						</span>
					</div>
					<div class="web357-customizer-tab__modal-container-content-middle">
						<span class="web357-customizer-tab__modal-container-content-middle-label"><?php echo esc_html__('Add External Stylesheets', 'easy-custom-code'); ?></span>
						<span class="web357-customizer-tab__modal-container-content-middle-descr">
						<?php echo esc_html__('Any URL\'s added here will be added as ', 'easy-custom-code') . esc_html(htmlentities('<link>', ENT_COMPAT, 'UTF-8'));?>.</span>
					</div>
					<div class="web357-customizer-tab__modal-container-content-middle2">
						<div id="js_web357_customizer_middle2_resource_items_css">
							<div id="js_web357_customizer_middle2_resource_items_css_itemid__pseudo"></div>
						</div>
						<span onClick="web357_customizer_source_css.add_row()" class="web357-customizer-tab__modal-container-content-middle-add-new-resource"><?php echo esc_html__('+add another resource', 'easy-custom-code'); ?></span>
					</div>
				</div>
			</div>
			
			<div id="web357_customizer_modal_content_scriptfiles" class="web357-customizer-tab__modal-container disabled">
				<div id="web357_customizer_modal_bg_scriptfiles" class="web357-customizer-tab__modal-bg-overlay disabled" onClick="web357_customizer_modal_scriptfiles.toggle()"></div>
				<div class="web357-customizer-tab__modal-container-content">
					<div class="web357-customizer-tab__modal-container-content-top">
						<span class="web357-customizer-tab__modal-container-content-top-title">
							<?php echo esc_html__('JavaScript', 'easy-custom-code'); ?>
							<span onClick="web357_customizer_modal_scriptfiles.toggle()" class="web357-customizer-tab__modal-container-content-top-close"><?php echo esc_html__('Apply Changes', 'easy-custom-code'); ?></span>
						</span>
					</div>
					<div class="web357-customizer-tab__modal-container-content-middle">
						<span class="web357-customizer-tab__modal-container-content-middle-label"><?php echo esc_html__('Add External Scripts', 'easy-custom-code'); ?></span>
						<span class="web357-customizer-tab__modal-container-content-middle-descr"><?php echo esc_html__('Any URL\'s added here will be added as ', 'easy-custom-code') . esc_html(htmlentities('<script>', ENT_COMPAT, 'UTF-8'));?>.</span>
					</div>
					<div class="web357-customizer-tab__modal-container-content-middle2">
						<div id="js_web357_customizer_middle2_resource_items_scriptfiles">
							<div id="js_web357_customizer_middle2_resource_items_scriptfiles_itemid__pseudo"></div>
						</div>
						<span onClick="web357_customizer_source_scriptfiles.add_row()" class="web357-customizer-tab__modal-container-content-middle-add-new-resource"><?php echo esc_html__('+add another resource', 'easy-custom-code'); ?></span>
					</div>
				</div>
			</div>

			<script>

				

				/*START:: css objects*/
				var web357_customizer_modal_css = {
					_bg_overlay : document.getElementById("web357_customizer_modal_bg_css").classList,
					_container : document.getElementById("web357_customizer_modal_content_css").classList,
					toggle : function() {
						if (this._container.contains('disabled')) {
							this._bg_overlay.remove('disabled');
							this._bg_overlay.add('enabled');
							this._container.remove('disabled');
							this._container.add('enabled');
							web357_customizer_source_css.load_data_to_modal();
						} else {
							this._bg_overlay.remove('enabled');
							this._bg_overlay.add('disabled');
							this._container.remove('enabled');
							this._container.add('disabled');
							web357_customizer_source_css.put_data_to_hidden_fields();
						}
					}
				};
				var web357_customizer_source_css = {
					count_all : 0,
					items : [],
					increment : function() {
						var all = this.count_all++;
						this.items.push(all);
						return all;
					},
					add_row : function(url = '') {
						var item_id = this.increment();
						var html_output = document.createElement('div');
						html_output.className = 'web357-customizer-tab__modal-container-content-middle-item';
						html_output.id = 'js_web357_customizer_middle2_resource_items_css_itemid_'+ item_id;

						var inner_html =       '<div class="web357-customizer-tab__modal-container-content-middle-reorder-group">'
										+           '<span onClick="web357_customizer_source_css.swap_up('+item_id+')" class="web357-customizer-tab__modal-container-content-middle-reorder-group-button">&uarr;</span>'
										+           '<span onClick="web357_customizer_source_css.swap_down('+item_id+')" class="web357-customizer-tab__modal-container-content-middle-reorder-group-button">&darr;</span>'
										+       '</div>'
										+       '<div class="web357-customizer-tab__modal-container-content-middle-input-group">'
										+           '<input id="js_web357_customizer_middle2_resource_items_css_input_itemid_'+ item_id +'" class="web357-customizer-tab__modal-container-content-middle-input-group-inputtext" type="text" placeholder="https://anothersite.com/style.css" value="' +url+ '">'
										+       '</div>'
										+       '<div class="web357-customizer-tab__modal-container-content-middle-close-group">'
										+           '<a href="'+url+'" target="_blank" title="Preview"><div class="web357-customizer-tab__modal-container-content-middle-close-group-button-eye"><svg class="svg-icon" viewBox="0 0 20 20"> <path fill="none" d="M16.198,10.896c-0.252,0-0.455,0.203-0.455,0.455v2.396c0,0.626-0.511,1.137-1.138,1.137H5.117c-0.627,0-1.138-0.511-1.138-1.137V7.852c0-0.626,0.511-1.137,1.138-1.137h5.315c0.252,0,0.456-0.203,0.456-0.455c0-0.251-0.204-0.455-0.456-0.455H5.117c-1.129,0-2.049,0.918-2.049,2.047v5.894c0,1.129,0.92,2.048,2.049,2.048h9.488c1.129,0,2.048-0.919,2.048-2.048v-2.396C16.653,11.099,16.45,10.896,16.198,10.896z"></path> <path fill="none" d="M14.053,4.279c-0.207-0.135-0.492-0.079-0.63,0.133c-0.137,0.211-0.077,0.493,0.134,0.63l1.65,1.073c-4.115,0.62-5.705,4.891-5.774,5.082c-0.084,0.236,0.038,0.495,0.274,0.581c0.052,0.019,0.103,0.027,0.154,0.027c0.186,0,0.361-0.115,0.429-0.301c0.014-0.042,1.538-4.023,5.238-4.482l-1.172,1.799c-0.137,0.21-0.077,0.492,0.134,0.629c0.076,0.05,0.163,0.074,0.248,0.074c0.148,0,0.294-0.073,0.382-0.207l1.738-2.671c0.066-0.101,0.09-0.224,0.064-0.343c-0.025-0.118-0.096-0.221-0.197-0.287L14.053,4.279z"></path> </svg></div></a>'
										+           '<div onClick="web357_customizer_source_css.delete_row('+item_id+')" class="web357-customizer-tab__modal-container-content-middle-close-group-button">x</div>'
										+       '</div>';
						html_output.innerHTML = inner_html;

						var array_length = this.items.length;
						if (array_length < 2) {
							var last_element = document.getElementById("js_web357_customizer_middle2_resource_items_css_itemid__pseudo");
						} else {
							var last_id = this.items[array_length-2]; //-2, last id has already added to list but not added yet to html, see above
							var last_element = document.getElementById("js_web357_customizer_middle2_resource_items_css_itemid_"+last_id);
						}
						last_element.after(html_output);
						return;
					},
					delete_row : function(id) {
						var search_array = this.items;
						for (var i=search_array.length-1; i>=0; i--) {
							if (search_array[i] == id) {
								search_array.splice(i, 1);
							}
						}
						document.getElementById("js_web357_customizer_middle2_resource_items_css_itemid_"+id).remove();
					},
					swap_up : function(id) {
						var search_array = this.items;
						var array_length = search_array.length;
						for (var i=0; i<array_length; i++) {
							if (search_array[i] == id) {
								//Check if first element
								if (i > 0) {
									//Find the element up from the selected
									var id_up   = search_array[i-1];
									//Find the element the selected (clicked on)
									var id_down = search_array[i];
									var elem_up = document.getElementById("js_web357_customizer_middle2_resource_items_css_itemid_"+id_up);
									var elem_down = document.getElementById("js_web357_customizer_middle2_resource_items_css_itemid_"+id_down);
									elem_down.before(elem_down, elem_up);

									//Swap items array
									var temp1 = search_array[i-1];
									var temp2 = search_array[i];
									search_array[i] = temp1;
									search_array[i-1] = temp2;
									this.items = search_array;
									break;
								}
							}
						}
					},
					swap_down : function(id) {
						var search_array = this.items;
						var array_length = search_array.length;
						for (var i=0; i<array_length; i++) {
							if (search_array[i] == id) {
								//Check if first element
								if (i < array_length-1) {
									//Find the element up from the selected
									var id_up   = search_array[i];
									//Find the element the selected (clicked on)
									var id_down = search_array[i+1];
									var elem_up = document.getElementById("js_web357_customizer_middle2_resource_items_css_itemid_"+id_up);
									var elem_down = document.getElementById("js_web357_customizer_middle2_resource_items_css_itemid_"+id_down);
									elem_down.before(elem_down, elem_up);

									//Swap items array
									var temp1 = search_array[i+1];
									var temp2 = search_array[i];
									search_array[i] = temp1;
									search_array[i+1] = temp2;
									this.items = search_array;
									break;
								}
							}
						}
					},
					put_data_to_hidden_fields : function() {
						var data_items = this.items;
						var items_to_hidden_fields = [];
						var counter = 0;
						for (var i=0; i<data_items.length; i++) {
							var input_value = document.getElementById("js_web357_customizer_middle2_resource_items_css_input_itemid_"+data_items[i]).value.trim();
							if (input_value != '') {
								items_to_hidden_fields.push(input_value);
								counter++;
							}
						}
						var json_array = JSON.stringify(items_to_hidden_fields);
						//Update customizer hidden field
						wp.customize( 'hidden_web357_customizer_json_items_css', function ( obj ) {
							obj.set( json_array );
						} );
						//Delete all rows
							document.getElementById("js_web357_customizer_middle2_resource_items_css").innerHTML = '<div id="js_web357_customizer_middle2_resource_items_css_itemid__pseudo"></div>';
						//Clear array & count_all
							this.items = [];
							this.count_all = 0;
						//Update Libraries counter on Button
							document.getElementById("web357_external_button_count_libraries_css").innerHTML = counter;
					},
					load_data_to_modal : function() {
						var json_array = wp.customize( 'hidden_web357_customizer_json_items_css' ).get();
						try {
							json_array = JSON.parse(json_array);
						} catch (e) {
							json_array = [];
						}
						var count_json_array = json_array.length;
						for (var i=0; i<count_json_array; i++) {
							this.add_row(json_array[i]);
						}
						if (count_json_array <3) {
							for (var i=count_json_array; i<3; i++) {
								this.add_row('');
							}
						}
					}
				};
				/*END:: css object*/

				/*START:: script object*/
				var web357_customizer_modal_scriptfiles = {
					_bg_overlay : document.getElementById("web357_customizer_modal_bg_scriptfiles").classList,
					_container : document.getElementById("web357_customizer_modal_content_scriptfiles").classList,
					toggle : function() {
						if (this._container.contains('disabled')) {
							this._bg_overlay.remove('disabled');
							this._bg_overlay.add('enabled');
							this._container.remove('disabled');
							this._container.add('enabled');
							web357_customizer_source_scriptfiles.load_data_to_modal();
						} else {
							this._bg_overlay.remove('enabled');
							this._bg_overlay.add('disabled');
							this._container.remove('enabled');
							this._container.add('disabled');
							web357_customizer_source_scriptfiles.put_data_to_hidden_fields();
						}
					}
				};
				var web357_customizer_source_scriptfiles = {
					count_all : 0,
					items : [],
					increment : function() {
						var all = this.count_all++;
						this.items.push(all);
						return all;
					},
					add_row : function(url = '') {
						var item_id = this.increment();
						var html_output = document.createElement('div');
						html_output.className = 'web357-customizer-tab__modal-container-content-middle-item';
						html_output.id = 'js_web357_customizer_middle2_resource_items_scriptfiles_itemid_'+ item_id;

						var inner_html =       '<div class="web357-customizer-tab__modal-container-content-middle-reorder-group">'
										+           '<span onClick="web357_customizer_source_scriptfiles.swap_up('+item_id+')" class="web357-customizer-tab__modal-container-content-middle-reorder-group-button">&uarr;</span>'
										+           '<span onClick="web357_customizer_source_scriptfiles.swap_down('+item_id+')" class="web357-customizer-tab__modal-container-content-middle-reorder-group-button">&darr;</span>'
										+       '</div>'
										+       '<div class="web357-customizer-tab__modal-container-content-middle-input-group">'
										+           '<input id="js_web357_customizer_middle2_resource_items_scriptfiles_input_itemid_'+ item_id +'" class="web357-customizer-tab__modal-container-content-middle-input-group-inputtext" type="text" placeholder="https://anothersite.com/script.js" value="' +url+ '">'
										+       '</div>'
										+       '<div class="web357-customizer-tab__modal-container-content-middle-close-group">'
										+           '<a href="'+url+'" target="_blank" title="Preview"><div class="web357-customizer-tab__modal-container-content-middle-close-group-button-eye"><svg class="svg-icon" viewBox="0 0 20 20"> <path fill="none" d="M16.198,10.896c-0.252,0-0.455,0.203-0.455,0.455v2.396c0,0.626-0.511,1.137-1.138,1.137H5.117c-0.627,0-1.138-0.511-1.138-1.137V7.852c0-0.626,0.511-1.137,1.138-1.137h5.315c0.252,0,0.456-0.203,0.456-0.455c0-0.251-0.204-0.455-0.456-0.455H5.117c-1.129,0-2.049,0.918-2.049,2.047v5.894c0,1.129,0.92,2.048,2.049,2.048h9.488c1.129,0,2.048-0.919,2.048-2.048v-2.396C16.653,11.099,16.45,10.896,16.198,10.896z"></path> <path fill="none" d="M14.053,4.279c-0.207-0.135-0.492-0.079-0.63,0.133c-0.137,0.211-0.077,0.493,0.134,0.63l1.65,1.073c-4.115,0.62-5.705,4.891-5.774,5.082c-0.084,0.236,0.038,0.495,0.274,0.581c0.052,0.019,0.103,0.027,0.154,0.027c0.186,0,0.361-0.115,0.429-0.301c0.014-0.042,1.538-4.023,5.238-4.482l-1.172,1.799c-0.137,0.21-0.077,0.492,0.134,0.629c0.076,0.05,0.163,0.074,0.248,0.074c0.148,0,0.294-0.073,0.382-0.207l1.738-2.671c0.066-0.101,0.09-0.224,0.064-0.343c-0.025-0.118-0.096-0.221-0.197-0.287L14.053,4.279z"></path> </svg></div></a>'
										+           '<div onClick="web357_customizer_source_scriptfiles.delete_row('+item_id+')" class="web357-customizer-tab__modal-container-content-middle-close-group-button">x</div>'
										+       '</div>';
						html_output.innerHTML = inner_html;

						var array_length = this.items.length;
						if (array_length < 2) {
							var last_element = document.getElementById("js_web357_customizer_middle2_resource_items_scriptfiles_itemid__pseudo");
						} else {
							var last_id = this.items[array_length-2]; //-2, last id has already added to list but not added yet to html, see above
							var last_element = document.getElementById("js_web357_customizer_middle2_resource_items_scriptfiles_itemid_"+last_id);
						}
						last_element.after(html_output);
						return;
					},
					delete_row : function(id) {
						var search_array = this.items;
						for (var i=search_array.length-1; i>=0; i--) {
							if (search_array[i] == id) {
								search_array.splice(i, 1);
							}
						}
						document.getElementById("js_web357_customizer_middle2_resource_items_scriptfiles_itemid_"+id).remove();
					},
					swap_up : function(id) {
						var search_array = this.items;
						var array_length = search_array.length;
						for (var i=0; i<array_length; i++) {
							if (search_array[i] == id) {
								//Check if first element
								if (i > 0) {
									//Find the element up from the selected
									var id_up   = search_array[i-1];
									//Find the element the selected (clicked on)
									var id_down = search_array[i];
									var elem_up = document.getElementById("js_web357_customizer_middle2_resource_items_scriptfiles_itemid_"+id_up);
									var elem_down = document.getElementById("js_web357_customizer_middle2_resource_items_scriptfiles_itemid_"+id_down);
									elem_down.before(elem_down, elem_up);

									//Swap items array
									var temp1 = search_array[i-1];
									var temp2 = search_array[i];
									search_array[i] = temp1;
									search_array[i-1] = temp2;
									this.items = search_array;
									break;
								}
							}
						}
					},
					swap_down : function(id) {
						var search_array = this.items;
						var array_length = search_array.length;
						for (var i=0; i<array_length; i++) {
							if (search_array[i] == id) {
								//Check if first element
								if (i < array_length-1) {
									//Find the element up from the selected
									var id_up   = search_array[i];
									//Find the element the selected (clicked on)
									var id_down = search_array[i+1];
									var elem_up = document.getElementById("js_web357_customizer_middle2_resource_items_scriptfiles_itemid_"+id_up);
									var elem_down = document.getElementById("js_web357_customizer_middle2_resource_items_scriptfiles_itemid_"+id_down);
									elem_down.before(elem_down, elem_up);

									//Swap items array
									var temp1 = search_array[i+1];
									var temp2 = search_array[i];
									search_array[i] = temp1;
									search_array[i+1] = temp2;
									this.items = search_array;
									break;
								}
							}
						}
					},
					put_data_to_hidden_fields : function() {
						var data_items = this.items;
						var items_to_hidden_fields = [];
						var counter = 0;
						for (var i=0; i<data_items.length; i++) {
							var input_value = document.getElementById("js_web357_customizer_middle2_resource_items_scriptfiles_input_itemid_"+data_items[i]).value.trim();
							if (input_value != '') {
								items_to_hidden_fields.push(input_value);
								counter++;
							}
						}
						var json_array = JSON.stringify(items_to_hidden_fields);
						//Update customizer hidden field
						wp.customize( 'hidden_web357_customizer_json_items_scripts', function ( obj ) {
							obj.set( json_array );
						} );
						//Delete all rows
							document.getElementById("js_web357_customizer_middle2_resource_items_scriptfiles").innerHTML = '<div id="js_web357_customizer_middle2_resource_items_scriptfiles_itemid__pseudo"></div>';
						//Clear array & count_all
							this.items = [];
							this.count_all = 0; 
						//Update Libraries counter on Button
							document.getElementById("web357_external_button_count_libraries_scriptfiles").innerHTML = counter;
					},
					load_data_to_modal : function() {
						var json_array = wp.customize( 'hidden_web357_customizer_json_items_scripts' ).get();
						try {
							json_array = JSON.parse(json_array);
						} catch (e) {
							json_array = [];
						}
						var count_json_array = json_array.length;
						for (var i=0; i<count_json_array; i++) {
							this.add_row(json_array[i]);
						}
						if (count_json_array <3) {
							for (var i=count_json_array; i<3; i++) {
								this.add_row('');
							}
						}
					}
				};
				/*END:: script object*/
			</script>
			<?php
		}
	}

	/*START:: Modal & Custom CSS & Custom Javascript*/
	$wp_customize->add_setting( 'no_date_web357_customizer_setting_template', array(
		'type'  => 'option'
	) );
	$wp_customize->add_control( new web357_customizer_Custom_Textarea_Control($wp_customize, 'no_date_web357_customizer_setting_template', array(
		'section'    => 'web357_customizer_section',
		'settings'  => 'no_date_web357_customizer_setting_template',
	)));
	/*END:: Modal & Custom CSS & Custom Javascript*/

	/*START:: Hidden forms*/
	$wp_customize->add_setting( 'hidden_web357_customizer_json_items_css', array(
		'type'  => 'option'
	) );
	$wp_customize->add_control( 'hidden_web357_customizer_json_items_css', array(
		'type' => 'textarea',
		'section' => 'web357_customizer_section',
	));
	$wp_customize->add_setting( 'hidden_web357_customizer_json_items_scripts', array(
		'type'  => 'option'
	) );
	$wp_customize->add_control( 'hidden_web357_customizer_json_items_scripts', array(
		'type' => 'textarea',
		'section' => 'web357_customizer_section',
	));
	/*END:: Hidden forms*/
	
	/*START:: CSS/LESS Codemirror*/
	$wp_customize->add_setting( 'web357_theme_customizer_code_less_css', array(
		'type' => 'option',
	) );

	$wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'web357_theme_customizer_code_less_css', array(
		'label'     => __('CSS or LESS', 'easy-custom-code'),
		'description' => esc_html( 'Add custom CSS or LESS to your site. All LESS theme variables and mixins are available. The <style> tag is not needed.', 'easy-custom-code' ),
		'code_type' => 'text/x-less',
		'settings'  => 'web357_theme_customizer_code_less_css',
		'section'   => 'web357_customizer_section',
	) ) );
	/*END:: CSS/LESS Codemirror*/

	/*START:: CSS/LESS Libraries Button*/
	$wp_customize->add_setting( 'web357_customizer_button_libraries_css', array(
		'type'  => 'option'
	) );
	$wp_customize->add_control( new web357_customizer_control_button_css($wp_customize, 'web357_customizer_button_libraries_css', array(
		'section'    => 'web357_customizer_section',
		'settings'  => 'web357_customizer_button_libraries_css',
	)));
	/*END:: CSS/LESS Libraries Button*/

	/*START:: JAVASCRIPT Codemirror*/
	$wp_customize->add_setting( 'web357_theme_customizer_code_js', array(
		'type' => 'option',
	) );
 
	$wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'web357_theme_customizer_code_js', array(
		'label'     => __('JavaScript', 'easy-custom-code'),
		'description' => esc_html( 'Add custom JavaScript to your site. The <script> tag is not needed.', 'easy-custom-code' ),
		'code_type' => 'javascript',
		'settings'  => 'web357_theme_customizer_code_js',
		'section'   => 'web357_customizer_section',
	) ) );
	/*END:: JAVASCRIPT Codemirror*/

	/*START:: JAVASCRIPT Libraries Button*/
	$wp_customize->add_setting( 'web357_customizer_button_libraries_scriptfiles', array(
		'type'  => 'option'
	) );
	$wp_customize->add_control( new web357_customizer_control_button_scripts($wp_customize, 'web357_customizer_button_libraries_scriptfiles', array(
		'section'    => 'web357_customizer_section',
		'settings'  => 'web357_customizer_button_libraries_scriptfiles',
	)));
	/*END:: JAVASCRIPT Libraries Button*/

	/*START:: Custom HTML Code Codemirror */
	// HEAD <head>
	$wp_customize->add_setting( 'web357_theme_customizer_code_head', array( 'type' => 'option' ) );
	$wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'web357_theme_customizer_code_head', array(
		'label'     => __('In <head>', 'easy-custom-code'),
		'description' => esc_html( 'Add custom HTML code in the <head> tag.', 'easy-custom-code' ),
		'code_type' => 'text/html',
		'settings'  => 'web357_theme_customizer_code_head',
		'section'   => 'web357_customizer_section',
	) ) );
	
	
	// After <body>
	$wp_customize->add_setting( 'web357_theme_customizer_code_after_body', array( 'type' => 'option' ) );
	$wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'web357_theme_customizer_code_after_body', array(
		'label'     => __('After <body>', 'easy-custom-code'),
		'description' => esc_html( 'Add custom HTML code right after open <body> tag.', 'easy-custom-code' ),
		'code_type' => 'text/html',
		'settings'  => 'web357_theme_customizer_code_after_body',
		'section'   => 'web357_customizer_section',
	) ) );
	

	// Before </body>
	$wp_customize->add_setting( 'web357_theme_customizer_code_before_body', array( 'type' => 'option' ) );
	$wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'web357_theme_customizer_code_before_body', array(
		'label'     => __('Before </body>', 'easy-custom-code' ),
		'description' => esc_html( 'Add custom HTML code before closing </body> tag.', 'easy-custom-code' ),
		'code_type' => 'text/html',
		'settings'  => 'web357_theme_customizer_code_before_body',
		'section'   => 'web357_customizer_section',
	) ) );
	
	/*END:: Custom HTML Code Codemirror */

}

function web357_customizer_createCSS()
{
	require_once plugin_dir_path( __FILE__ ) . 'lessphp.php';
	$wp_upload_dir = wp_upload_dir();
	$upload_dir = $wp_upload_dir['basedir'].'/easy-custom-code/css';
	$old_custom_css_path = $wp_upload_dir['basedir'].'/custom.css';  // remove this in v1.0.2

	// file system
	if ( ! class_exists( 'WP_Filesystem_Direct' ) ) {
		require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php';
		require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php';
	}
	$wp_filesystem = new WP_Filesystem_Direct( new StdClass() );

	// delete the folder first
	if ( file_exists( $upload_dir ) ) 
	{
		$wp_filesystem->rmdir($upload_dir, true);
	}

	// delete the previous custom.css file
	if ( file_exists( $old_custom_css_path ) )  // remove this in v1.0.2
	{
		$wp_filesystem->delete($old_custom_css_path, true);
	}

	// then create the folder again
	if ( ! file_exists( $upload_dir ) ) {
        wp_mkdir_p( $upload_dir );
	}

	$less = new lessc;
	try {
		$compiled_data = $less->compile(get_option('web357_theme_customizer_code_less_css', ''));

		// Decode any HTML entities like &gt; and &lt; back to normal characters (>, <)
		$compiled_data = html_entity_decode($compiled_data);

		$current_timestmamp = time();
		if (get_option('web357_customizer_random_file_name_suffix')) {
			update_option('web357_customizer_random_file_name_suffix', $current_timestmamp);
		} else {
			add_option('web357_customizer_random_file_name_suffix', $current_timestmamp);
		}

		$get_web357_customizer_random_file_name_suffix = get_option('web357_customizer_random_file_name_suffix', '');
		$css_file_name = (!empty($get_web357_customizer_random_file_name_suffix)) ? 'style_' . $get_web357_customizer_random_file_name_suffix : 'style';
		$file = $upload_dir.'/'.$css_file_name.'.css';

		

		// file_put_contents($file, $compiled_data);
		global $wp_filesystem;

		// Initialize the WP_Filesystem if not already initialized
		if (empty($wp_filesystem)) {
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			WP_Filesystem();
		}

		// Check if the WP_Filesystem is initialized properly
		if (is_null($wp_filesystem) || !is_object($wp_filesystem)) {
			throw new Exception('Failed to initialize the WP_Filesystem.');
		}

		// Use the WP_Filesystem API to write to the file
		if (!$wp_filesystem->put_contents($file, $compiled_data, FS_CHMOD_FILE)) {
			throw new Exception('Failed to write to the file.');
		}
	} catch (exception $e) {
		return;
	}

}

function web357_customizer_createJS()
{
	$wp_upload_dir = wp_upload_dir();
	$upload_dir = $wp_upload_dir['basedir'].'/easy-custom-code/js';

	// file system
	if ( ! class_exists( 'WP_Filesystem_Direct' ) ) {
		require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php';
		require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php';
	}
	$wp_filesystem = new WP_Filesystem_Direct( new StdClass() );

	// delete the folder first
	if ( file_exists( $upload_dir ) ) 
	{
		$wp_filesystem->rmdir($upload_dir, true);
	}

	// then create the folder again
	if ( ! file_exists( $upload_dir ) ) {
        wp_mkdir_p( $upload_dir );
	}

	try {

		$web357_theme_customizer_code_js = get_option('web357_theme_customizer_code_js', '');

		if (!empty(trim($web357_theme_customizer_code_js)))
		{
			$current_timestmamp = time();
			if (get_option('web357_customizer_random_file_name_suffix')) {
				update_option('web357_customizer_random_file_name_suffix', $current_timestmamp);
			} else {
				add_option('web357_customizer_random_file_name_suffix', $current_timestmamp);
			}

			$get_web357_customizer_random_file_name_suffix = get_option('web357_customizer_random_file_name_suffix', '');
			$js_file_name = (!empty($get_web357_customizer_random_file_name_suffix)) ? 'script_' . $get_web357_customizer_random_file_name_suffix : 'script';
			$file = $upload_dir.'/'.$js_file_name.'.js';

			// file_put_contents($file, $web357_theme_customizer_code_js);
			global $wp_filesystem;

			// Initialize the WP_Filesystem if not already initialized
			if (empty($wp_filesystem)) {
				require_once(ABSPATH . 'wp-admin/includes/file.php');
				WP_Filesystem();
			}

			// Check if the WP_Filesystem is initialized properly
			if (is_null($wp_filesystem) || !is_object($wp_filesystem)) {
				throw new Exception('Failed to initialize the WP_Filesystem.');
			}

			// Use the WP_Filesystem API to write to the file
			if (!$wp_filesystem->put_contents($file, $web357_theme_customizer_code_js, FS_CHMOD_FILE)) {
				throw new Exception('Failed to write to the file.');
			}

		}
		
	} catch (exception $e) {
		return;
	}
	

}

$plugin = new w357EasyCustomCode();
$plugin->run();