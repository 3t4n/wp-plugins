<?php
namespace Altoviz;

class AOZ4WC_WC_Settings {

	public $tab_slug = 'altoviz';
	public function __construct() {
		add_filter( 'woocommerce_settings_tabs_array', array( $this, 'woocommerce_settings_tabs_array' ), 99 );
		add_action( 'woocommerce_settings_tabs_' . $this->tab_slug, array( $this, 'woocommerce_settings_tabs' ) );
		add_action( 'woocommerce_admin_field_aoz-rawhtml', array( $this, 'woocommerce_admin_field_AOZ4WC_rawhtml' ) );
		add_action( 'woocommerce_admin_field_aoz-html', array( $this, 'woocommerce_admin_field_AOZ4WC_html' ) );
		add_action( 'woocommerce_admin_field_aoz-url', array( $this, 'woocommerce_admin_field_AOZ4WC_url' ) );
		add_action( 'woocommerce_admin_field_aoz-array', array( $this, 'woocommerce_admin_field_AOZ4WC_array' ) );
		add_action( 'woocommerce_settings_saved', array( $this, 'woocommerce_settings_saved' ) );
		// add_action('woocommerce_save_options', [$this, 'woocommerce_save_options']);
		add_action( 'woocommerce_update_options_' . $this->tab_slug, array( $this, 'woocommerce_save_options' ) );
		add_action( 'admin_notices', array( $this, 'admin_notices' ), 10 );
		add_filter( 'safe_style_css', array( $this, 'safe_style_css' ) );
	}
	public function admin_notices() {
		if ( /* !$this->is_wc_settings_page() && */ empty( AOZ4WC()->get_api_key() ) ) {
			AOZ4WC()->add_notice(sprintf(
				// translators: %1$s and %2$s are <b> tags
				__( '%1$sAltoviz for Woocommerce%2$s is almost ready. To get started, connect your Altoviz account.', 'altoviz' ),
				'<b>', '</b>'),
				'warning',
				array(
					'caption' => __( 'Go to settings', 'altoviz' ),
					'url'     => AOZ4WC()->admin()->settings_url(),
				)
			);
		}
	}
	// public function is_wc_settings_page() {
	// return isset($_GET['page']) && ( 'wc-settings' === $_GET['page'] ) && isset($_GET['tab']) && ( 'altoviz' === $_GET['tab'] );
	// }
	public function woocommerce_settings_tabs_array( $settings_tabs ) {
		$settings_tabs[ $this->tab_slug ] = 'Altoviz';
		return $settings_tabs;
	}
	public function settings_fields() {
		$fields = array();
		$fields = array(
			array(
				'type' => 'aoz-rawhtml',
				'html' => '<a href="https://altoviz.com/"><img src="' . esc_url( AOZ4WC()->get_logo_url() ) . '" height="32" /></a>',
				'id'   => 'aoz4wc_title',
			),
			array(
				'title' => __( 'General', 'altoviz' ),
				// 'desc'  => __( 'Use these settings to configure the way the plugin works.', 'altoviz'),
				'type'  => 'title',
				'id'    => 'aoz4wc_section_general_title',
			),
			array(
				'title' => __( 'Informations', 'altoviz' ),
				'id'    => 'aoz4wc_infos',
				'array' => $this->settings_informations(),
				'type'  => 'aoz-array',
			),
			array(
				'title' => __( 'Requirements', 'altoviz' ),
				'id'    => 'aoz4wc_requirements',
				'array' => $this->settings_requirements(),
				'type'  => 'aoz-array',
			),
			array(
				'name'        => __( 'API key', 'altoviz' ),
				'desc'        => __( 'You can get an Altoviz API key in the <a href="https://app.altoviz.com/go/settings/developer">app settings</a>', 'altoviz' ),
				'id'          => 'aoz4wc_api_key',
				'type'        => 'password',
				'placeholder' => '4287e792-...',
				'default'     => '',
				'autoload'    => true,
			),
			array(
				'type' => 'sectionend',
				'id'   => 'aoz4wc_section_general_end',
			),
			array(
				'title' => __( 'Synchronization', 'altoviz' ),
				// 'desc'  => __( 'Define how synchronization will work.', 'altoviz'),
				'type'  => 'title',
				'id'    => 'aoz4wc_section_synchronization_title',
			),
			array(
				'name'     => __( 'Invoices trigger', 'altoviz' ),
				'desc'     => __( 'When should invoices be created ?', 'altoviz' ),
				'id'       => 'aoz4wc_order_status_trigger',
				'type'     => 'radio',
				// 'value' => 'true',
				'options'  => array(
					'processing' => __( 'Order processing', 'altoviz' ),
					'completed'  => __( 'Order completed', 'altoviz' ),
				),
				'default'  => 'completed',
				'autoload' => true,
			),
			array(
				'name'     => __( 'Invoice state', 'altoviz' ),
				// 'desc'        => __('Should invoices be created in draft or finalized state ?', 'altoviz'),
				'desc'     => __( 'Be careful : Finalized invoices cannot be modified and can be sent. Draft invoice can be modified and must be finalized manually to be sent.', 'altoviz' ),
				'id'       => 'aoz4wc_invoice_draft',
				'type'     => 'radio',
				// 'value' => 'true',
				'options'  => array(
					'true'  => __( 'Draft', 'altoviz' ),
					'false' => __( 'Finalized', 'altoviz' ),
				),
				'default'  => 'true',
				'autoload' => true,
			),
			array(
				'name'     => __( 'Send by e-mail', 'altoviz' ),
				'desc'     => __( 'Should invoice be sent ? Invoice needs to be finalized for this option to be effective.', 'altoviz' ),
				'id'       => 'aoz4wc_invoice_send',
				'type'     => 'checkbox',
				'default'  => 'no',
				'autoload' => true,
			),
			array(
				'name'          => __( 'Auto-synchronization', 'altoviz' ),
				'desc'          => __( 'Customers', 'altoviz' ),
				'tooltip'       => __( 'Synchronize data on every save ?', 'altoviz' ),
				// 'desc_tip'        => __('Synchronize customers on every save ?', 'altoviz'),
				'id'            => 'aoz4wc_autosync_customers',
				'type'          => 'checkbox',
				'default'       => 'no',
				'checkboxgroup' => 'start',
				'autoload'      => true,
			),
			array(
				'name'          => __( 'Auto-sync', 'altoviz' ),
				'desc'          => __( 'Orders', 'altoviz' ),
				// 'tooltip'        => __('Synchronize invocies on every save ?', 'altoviz'),
				'id'            => 'aoz4wc_autosync_orders',
				'type'          => 'checkbox',
				'default'       => 'no',
				'checkboxgroup' => '',
				'autoload'      => true,
			),
			array(
				'name'          => __( 'Auto-sync', 'altoviz' ),
				'desc'          => __( 'Products', 'altoviz' ),
				// 'tooltip'        => __('Synchronize products on every save ?', 'altoviz'),
				'id'            => 'aoz4wc_autosync_products',
				'type'          => 'checkbox',
				'default'       => 'no',
				'checkboxgroup' => 'end',
				'autoload'      => true,
			),
			array(
				'name'     => __( 'Async mode', 'altoviz' ),
				'tooltip'  => __( 'Asynchronous synchronization is great for heavy loads but adds some delay.', 'altoviz' ),
				'id'       => 'aoz4wc_async_mode',
				'type'     => 'checkbox',
				'default'  => 'no',
				'autoload' => true,
			),
			array(
				'name'     => __( 'Zero value orders', 'altoviz' ),
				'desc'     => __( 'Create invoices for zero value orders ?', 'altoviz' ),
				// 'tooltip'        => __('Synchronize invocies on every save ?', 'altoviz'),
				'id'       => 'aoz4wc_invoice_zero_value',
				'type'     => 'checkbox',
				'default'  => 'no',
				'autoload' => true,
			),
			array(
				'name'     => __( 'Log level', 'altoviz' ),
				'desc'     => __( 'Log level defines how much information will be logged', 'altoviz' ),
				// 'tooltip'        => __('Synchronize invocies on every save ?', 'altoviz'),
				'id'       => 'aoz4wc_log_level',
				'type'     => 'select',
				'options'  => array(
					AOZ4WC_LOG_LEVEL_NONE        => __( 'None', 'altoviz' ),
					AOZ4WC_LOG_LEVEL_ERROR       => __( 'Error', 'altoviz' ),
					AOZ4WC_LOG_LEVEL_WARNING     => __( 'Warning', 'altoviz' ),
					AOZ4WC_LOG_LEVEL_INFORMATION => __( 'Information', 'altoviz' ),
					AOZ4WC_LOG_LEVEL_DEBUG       => __( 'Debug', 'altoviz' ),
				),
				'default'  => '0',
				'autoload' => true,
			),
			array(
				'type' => 'sectionend',
				'id'   => 'aoz4wc_section_synchronization_end',
			),
		);
		return $fields;
	}
	public function woocommerce_settings_tabs() {
		$fields = $this->settings_fields();
		woocommerce_admin_fields( $fields );
		wp_nonce_field( 'aoz4wc_admin_settings_nonce', 'aoz4wc_admin_settings_nonce', false );
	}
	public function woocommerce_settings_saved() {
		AOZ4WC()->sys_log( array( 'woocommerce_settings_saved', AOZ4WC()->get_api_key() ) );
		// Force cache update
		AOZ4WC()->clear_notices();
		// AOZ4WC()->api()->hello( true );
	}
	public function woocommerce_save_options() {
		if ( isset( $_POST['aoz4wc_admin_settings_nonce'] ) && ! wp_verify_nonce( wc_clean( wp_unslash( sanitize_key( $_POST['aoz4wc_admin_settings_nonce'] ) ) ), 'aoz4wc_admin_settings_nonce' ) ) {
			return;
		}
		$fields = $this->settings_fields();
		woocommerce_update_options( $fields );
		AOZ4WC()->log([
			'API key' => strlen(AOZ4WC()->get_api_key()) > 0,
			'Order status trigger' => AOZ4WC()->options()->invoice_trigger(),
			'Send invoice' => AOZ4WC()->options()->invoice_send(),
			'Auto sync customers' => AOZ4WC()->options()->autosync_customers(),
			'Auto sync products' => AOZ4WC()->options()->autosync_products(),
			'Auto sync orders' => AOZ4WC()->options()->autosync_orders(),
			'Async mode' => AOZ4WC()->options()->async_mode(),
			'Sync zero value orders' => AOZ4WC()->options()->invoice_zero_value(),
			'Log level' => AOZ4WC()->options()->log_level(),
		]);
		AOZ4WC()->sys_log( array( 'woocommerce_save_options', AOZ4WC()->get_api_key() ) );
	}
	public function settings_informations() {
		$result   = array();
		$result[] = array(
			'label' => __( 'Documentation', 'altoviz' ),
			'url'   => AOZ4WC()->admin()->documentation_url(),
		);
		$result[] = array(
			'label' => __( 'Logs', 'altoviz' ),
			'url'   => AOZ4WC()->wc_admin()->get_logs_url(),
		);
		$result[] = array(
			'label' => __( 'Version', 'altoviz' ),
			'value' => AOZ4WC()->get_version(),
		);
		if ( ! empty( AOZ4WC()->get_api_key() ) ) {
			$hello = AOZ4WC()->api()->hello();
			if ( $hello ) {
				$result[] = array(
					'label' => __( 'Company', 'altoviz' ),
					'value' => $hello['companyName'],
				);
				$result[] = array(
					'label' => __( 'URL', 'altoviz' ),
					'url'   => AOZ4WC()->app()->get_url(),
					'value' => AOZ4WC()->app()->get_url(),
				);
				$result[] = array(
					'label' => __( 'API key name', 'altoviz' ),
					'value' => $hello['apiKeyName'],
				);
			}
		}
		$result[] = array(
			'label' => __( 'Language', 'altoviz' ),
			'value' => AOZ4WC()->app()->get_settings_language(),
		);
		if ( AOZ4WC()->debug() ) {
			$result[]     = array(
				'label' => 'Debug',
				'value' => implode (' ', [
					'✓',
					WP_DEBUG ? 'WP_DEBUG' : '',
					WP_DEBUG_DISPLAY ? 'WP_DEBUG_DISPLAY' : '',
					WP_DEBUG_LOG ? 'WP_DEBUG_LOG' : '',
				]),
			);
			$result[]     = array(
				'label' => 'PHP version',
				'value' => phpversion(),
				);
				$result[] = array(
					'label' => 'WordPress version',
					'value' => wp_get_wp_version(),
					);
		}
		return $result;
	}
	public function settings_requirements() {
		$result   = array();
		$result[] = array(
			'label' => __( 'API key', 'altoviz' ),
			'value' => AOZ4WC()->check_api_key() ? '✅' : '🟥',
		);
		$result[] = array(
			'label' => __( 'Woocommerce', 'altoviz' ),
			'value' => AOZ4WC()->check_woocommerce() ? '✅' : '🟥',
		);
		return $result;
	}
	public function woocommerce_admin_field_AOZ4WC_rawhtml( $value ) {
		echo wp_kses_post( $value['html'] ?? '' );
	}
	public function woocommerce_admin_field_AOZ4WC_html( $value ) {
		$field_description = \WC_Admin_Settings::get_field_description( $value );
		$description       = $field_description['description'] ?? '&nbsp;';
		$tooltip_html      = $field_description['tooltip_html'] ?? '&nbsp;';
		$html              = $value['html'] ?? '&nbsp;';
		?>
		<tr test="t" valign="top"<?php echo $value['row_class'] ? ' class="' . esc_attr( $value['row_class'] ) . '"' : ''; ?>">
			<th scope="row" class="titledesc">
				<label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?> <?php echo esc_html( $tooltip_html ); // WPCS: XSS ok. ?></label>
			</th>
			<td>
		<?php
		// echo wp_kses_data($html);
		echo wp_kses_post( $html );
		echo wp_kses_post( $description );
		?>
			</td>
		</tr>
		<?php
	}
	public function woocommerce_admin_field_AOZ4WC_url( $value ) {
		$html_value = $value;
		$url        = $value['url'] ?? '';
		$label      = $value['label'] ?? '';
		if ( ! empty( $url ) && ! empty( $text ) ) {
			$html_value['html'] = '<a href="' . $url . '" >' . $label . '</a>';
		}
		$this->woocommerce_admin_field_AOZ4WC_html( $html_value );
	}
	public function woocommerce_admin_field_AOZ4WC_array( $value ) {
		$html_value = $value;
		$array      = $value['array'] ?? array();
		$html       = '';
		if ( $array && is_array( $array ) ) {
			$html .= '<div style="{display: table;width: 100%;padding: 3px 3px;}">';
			foreach ( $array as $item ) {
				$label = $item['label'] ?? '&nbsp;';
				$html .= '<div style="display: table-row;padding: 3px 3px;">';
				if ( isset( $item['url'] ) ) {
					if ( isset( $item['value'] ) ) {
						$html .= '<div style="display: table-cell;padding: 3px 3px;">' . esc_html( $label ) . '</div>';
						$html .= '<div style="display: table-cell;padding: 3px 3px;"><a href="' . $item['url'] . '">' . esc_html( $item['value'] ) . '</a></div>';

					} else {
						$html .= '<div style="display: table-row;"><div style="display: table-cell;padding: 3px 3px;"><a href="' . $item['url'] . '">' . esc_html( $label ) . '</a></div></div>';
					}
				} elseif ( isset( $item['html'] ) ) {
					$html .= '<div style="display: table-row;"><div style="display: table-cell;padding: 3px 3px;">' . $item['html'] . '</div></div>';
				} elseif ( isset( $item['value'] ) ) {
					$html .= '<div style="display: table-cell;padding: 3px 3px;">' . esc_html( $label ) . '</div>';
					$html .= '<div style="display: table-cell;padding: 3px 3px;"><b>' . esc_html( $item['value'] ) . '</b></div>';
				}
				$html .= '</div>';
			}
			$html .= '</div>';
		}
		$html_value['html'] = $html;
		$this->woocommerce_admin_field_AOZ4WC_html( $html_value );
	}
	public function woocommerce_admin_field_AOZ4WC_array2( $value ) {
		$html_value = $value;
		$array      = $value['array'] ?? array();
		$html       = '';
		if ( $array && is_array( $array ) ) {
			$html .= '<table>';
			foreach ( $array as $item ) {
				$label = $item['label'] ?? '&nbsp;';
				if ( isset( $item['value'] ) ) {
					$html .= '<tr><td>' . esc_html( $label ) . '</td><td><b>' . esc_html( $item['value'] ) . '</b></td></tr>';
				} elseif ( isset( $item['url'] ) ) {
					$html .= '<tr><td colspan="2"><a href="' . $item['url'] . '">' . esc_html( $label ) . '</a></td></tr>';
				} elseif ( isset( $item['html'] ) ) {
					$html .= '<tr><td colspan="2">' . $item['html'] . '</td></tr>';
				}
			}
			$html .= '</table>';
		}
		$html_value['html'] = $html;
		$this->woocommerce_admin_field_AOZ4WC_html( $html_value );
	}
	public function safe_style_css( $styles ) {
		$styles[] = 'display';
		return $styles;
	}
}