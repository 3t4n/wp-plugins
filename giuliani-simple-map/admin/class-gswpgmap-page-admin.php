<?php
class GSWPGMAP_Page_Admin {
	private $plugin_name;
	private $version;
	public function __construct($plugin_name, $version) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_action ( 'admin_menu', array (
				$this,
				'addPluginAdminMenu'
		), 9 );
		add_action ( 'admin_init', array (
				$this,
				'registerAndBuildFields'
		) );
	}
	public function enqueue_styles() {
		wp_enqueue_style ( $this->plugin_name, plugin_dir_url ( __FILE__ ) . 'css/gswpgmap-page-admin.css', array (), $this->version, 'all' );
	}
	public function enqueue_scripts() {
		wp_enqueue_script ( $this->plugin_name, plugin_dir_url ( __FILE__ ) . 'js/gswpgmap-page-admin.js', array (
				'jquery'
		), $this->version, false );
	}
	public function addPluginAdminMenu() {
		$name = strtolower ( $this->plugin_name );
		add_menu_page ( $name, 'GS Simple Map', 'administrator', $name . '-settings', array (
				$this,
				'displayPluginAdminSettings'
		), 'dashicons-location-alt', 26 );
	}
	public function displayPluginAdminDashboard() {
		require_once 'partials/' . strtolower ( $this->plugin_name ) . '-page-admin-display.php';
	}
	public function displayPluginAdminSettings() {
		// set this var to be used in the settings-display view
		$active_tab = isset ( $_GET ['tab'] ) ? sanitize_text_field ( $_GET ['tab'] ) : 'general';
		if (isset ( $_GET ['error_message'] )) {
			add_action ( 'admin_notices', array (
					$this,
					'gswpgmapPageSettingsMessages'
			) );
			do_action ( 'admin_notices', sanitize_text_field ( $_GET ['error_message'] ) );
		}
		require_once 'partials/' . strtolower ( $this->plugin_name ) . '-page-admin-settings-display.php';
	}
	public function gswpgmapPageSettingsMessages($error_message) {
		switch ($error_message) {
			case '1' :
				$message = __ ( 'There was an error adding this setting. Please try again.  If this persists, shoot us an email.', 'my-text-domain' );
				$err_code = esc_attr ( 'settings_page_gswpgmap' );
				$setting_field = 'settings_page_gswpgmap';
				break;
		}
		$type = 'error';
		add_settings_error ( $setting_field, $err_code, $message, $type );
	}
	public function registerAndBuildFields() {
		add_settings_section ( 'gswpgmap_page_general_section', '', array (
				$this,
				'gswpgmap_page_display_general_account'
		), 'gswpgmap_page_general_settings' );
		$fields = array (
				array (
						'name' => 'apikey',
						'label' => '<small>Google Map</small> Api key'
				),
				array (
						'name' => 'cntid',
						'label' => '<small>Container </small>ID'
				),
				array (
						'subtype' => 'number',
						'step' => '0.000000001',
						'name' => 'lat',
						'label' => '<small>Map </small> Latitude'
				),
				array (
						'subtype' => 'number',
						'step' => '0.000000001',
						'name' => 'lng',
						'label' => '<small>Map </small> Longitude'
				),
				array (
						'subtype' => 'number',
						'min' => 2,
						'max' => 22,
						'name' => 'zoom',
						'label' => '<small>Map </small> Zoom'
				),
				array (
						'type' => 'select',
						'name' => 'style',
						'label' => '<small>Map </small> Style',
						'options' => array (
								'Retro',
								'Silver',
								'Dark',
								'Standard'
						)
				),
				array (
						'type' => 'textarea',
						'subtype' => 'wysiwyg',
						'name' => 'infow_html',
						'label' => '<small>Map Marker Window</small>  Content'
				)
		);

		foreach ( $fields as $field ) {
			unset ( $args );
			$args = array (
					'type' => (isset ( $field ['type'] ) ? $field ['type'] : 'input'),
					'subtype' => (isset ( $field ['subtype'] ) ? $field ['subtype'] : 'text'),
					'id' => 'gswpgmap_' . $field ['name'],
					'name' => 'gswpgmap_' . $field ['name'],
					'required' => 'true',
					'get_options_list' => '',
					'value_type' => 'normal',
					'wp_data' => 'option'
			);
			if ($field ['subtype'] == 'number') {

				if (isset ( $field ['step'] )) {

					$args ['step'] = $field ['step'];
				}

				if (isset ( $field ['min'] )) {

					$args ['min'] = $field ['min'];
					$args ['max'] = $field ['max'];
				}
			}
			if ($field ['type'] == 'select') {
				$args ['options'] = $field ['options'];
			}

			add_settings_field ( 'gswpgmap_' . $field ['name'], $field ['label'], array (
					$this,
					'gswpgmap_page_render_settings_field'
			), 'gswpgmap_page_general_settings', 'gswpgmap_page_general_section', $args );

			register_setting ( 'gswpgmap_page_general_settings', 'gswpgmap_' . $field ['name'] );
		}
	}
	public function gswpgmap_page_display_general_account() {
		// echo '<p>These settings apply to all Plugin Name functionality.</p>';
	}
	public function gswpgmap_page_render_settings_field($args) {
		if ($args ['wp_data'] == 'option') {

			$wp_data_value = get_option ( $args ['name'] );
		} elseif ($args ['wp_data'] == 'post_meta') {

			$wp_data_value = get_post_meta ( $args ['post_id'], $args ['name'], true );
		}

		$value = ($args ['value_type'] == 'serialized') ? serialize ( $wp_data_value ) : $wp_data_value;

		switch ($args ['type']) {

			case 'input' :

				if ($args ['subtype'] != 'checkbox') {

					$prependStart = (isset ( $args ['prepend_value'] )) ? '<div class="input-prepend"> <span class="add-on">' . $args ['prepend_value'] . '</span>' : '';
					$prependEnd = (isset ( $args ['prepend_value'] )) ? '</div>' : '';
					$step = (isset ( $args ['step'] )) ? 'step="' . $args ['step'] . '"' : '';
					$min = (isset ( $args ['min'] )) ? 'min="' . $args ['min'] . '"' : '';
					$max = (isset ( $args ['max'] )) ? 'max="' . $args ['max'] . '"' : '';

					echo $prependStart . '<input type="' . $args ['subtype'] . '" id="' . $args ['id'] . '" ' . $step . ' ' . $max . ' ' . $min . ' name="' . $args ['name'] . '" size="40" value="' . (! empty ( $min ) ? floatval ( $value ) : esc_attr ( $value )) . '" /><input type="hidden" id="' . $args ['id'] . '" ' . $step . ' ' . $max . ' ' . $min . ' name="' . $args ['name'] . '" size="40" value="' . esc_attr ( $value ) . '" />' . $prependEnd;
				} else {
					$checked = ($value) ? 'checked' : '';
					echo '<input type="' . $args ['subtype'] . '" id="' . $args ['id'] . '" "' . $args ['required'] . '" name="' . $args ['name'] . '" ' . $checked . ' />';
				}
				break;

			case 'textarea' :

				if ($args ['subtype'] == 'wysiwyg') {

					wp_editor ( $value, $args ['id'], array (
							'wpautop' => true,
							'media_buttons' => true,
							'textarea_rows' => 6
					) );
					return;
				}

				echo '<textarea id="' . $args ['id'] . '" "' . $args ['required'] . '" name="' . $args ['name'] . '">' . esc_textarea ( $value ) . '</textarea>';
				break;

			case 'select' :

				$select = '<select id="' . $args ['id'] . '" "' . $args ['required'] . '" name="' . $args ['name'] . '">';

				foreach ( $args ['options'] as $option ) {
					$select .= '<option ' . ($value == strtolower ( $option ) ? 'selected="true"' : '') . ' value="' . strtolower ( $option ) . '">' . esc_html ( $option ) . '</option>';
				}
				echo $select . '</select>';

				break;

			default :
				// code...
				break;
		}
	}
}
