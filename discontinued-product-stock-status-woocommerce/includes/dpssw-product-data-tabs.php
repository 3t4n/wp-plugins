<?php

add_filter( 'woocommerce_settings_tabs_array', 'dpssw_discontinued_woocommerce_settings_tabs_array_filter', 30, 1 );

/**
 * Function for `woocommerce_settings_tabs_array` filter-hook.
 * Add discontinued product setting tab in woocommerce setting page.
 *
 * @param array $settings_tabs .
 * @return array
 */
function dpssw_discontinued_woocommerce_settings_tabs_array_filter( $settings_tabs ) {
	$settings_tabs['discontinued_settings_tab'] = __( 'Discontinued Product Stock Status', 'discontinued-products-stock-status' );
	return $settings_tabs;
}


add_action( 'woocommerce_sections_discontinued_settings_tab', 'dpssw_discontinued_settings_tab_sections', 10, 1 );

/**
 * Adds tabs on woocommece setting page.
 *
 * @param array $output_sections .
 * @return void
 */
function dpssw_discontinued_settings_tab_sections( $output_sections ) {
	global $current_section;
	echo '<ul class="subsubsub">';
	$sections   = array(
		''        => __( 'General', 'discontinued-products-stock-status' ),
		'restore' => __( 'Revert', 'discontinued-products-stock-status' ),
	);
	$array_keys = array_keys( $sections );
	foreach ( $sections as $id => $label ) {
		$url       = admin_url( 'admin.php?page=wc-settings&tab=discontinued_settings_tab&section=' . sanitize_title( $id ) );
		$class     = ( $current_section === $id ? 'current' : '' );
		$separator = ( end( $array_keys ) === $id ? '' : '|' );
		$text      = esc_html( $label );
		echo "<li><a href='$url' class='$class'>$text</a> $separator </li>"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
	echo '</ul><br class="clear" />';
}


add_action( 'woocommerce_settings_discontinued_settings_tab', 'dpssw_discontinued_settings_tab_options', 10, 1 );

/**
 * To Show all setttings fields.
 */
function dpssw_discontinued_settings_tab_options() {
	$settings = dpssw_get_discontinued_settings_for_section();
	if ( ! empty( $settings ) && class_exists( 'WC_Admin_Settings' ) ) {
		WC_Admin_Settings::output_fields( $settings );
	}
}


add_action( 'woocommerce_settings_save_discontinued_settings_tab', 'dpssw_discontinued_settings_tab_options_save', 10, 1 );

/**
 * To update/save values all setttings fields.
 */
function dpssw_discontinued_settings_tab_options_save() {
	$settings = dpssw_get_discontinued_settings_for_section();
	if ( ! empty( $settings ) && class_exists( 'WC_Admin_Settings' ) ) {
		unset( $settings['discontinued_global_message_border_style'] );
		unset( $settings['discontinued_global_message_border_color'] );
		unset( $settings['discontinued_global_message_border_width'] );
		unset( $settings['discontinued_global_message_border_radius'] );
		unset( $settings['discontinued_global_background_color'] );
		unset( $settings['discontinued_global_text_color'] );
		WC_Admin_Settings::save_fields( $settings );
	}
}

/**
 * Make setting page on admin.
 *
 * @return string
 */
function dpssw_get_discontinued_settings_for_section() {
	global $current_section;

	switch ( $current_section ) {
		case '':
			$settings = array(
				'section_title'                            => array(
					'name' => __(
						'Discontinued Product Stock Status Global Settings
					',
						'discontinued-products-stock-status'
					),
					'type' => 'title',
					'desc' => '',
					'id'   => 'wc_discontinued_settings_tab_section_title',
				),
				'discontinued_export_button'               => array(
					'title'    => __( 'Export Discontinued Products Meta', 'discontinued-products-stock-status' ),
					'id'       => 'discontinued_export_button',
					'type'     => 'export_button',
					'desc_tip' => true,
					'desc'     => __( 'Exports all the discontinued products meta in csv format.', 'discontinued-products-stock-status' ),
				),
				'discontinued_import_button'               => array(
					'title' => __( 'Import Discontinued Products Meta', 'discontinued-products-stock-status' ),
					'id'    => 'discontinued_import_button',
					'type'  => 'import_button',
					'desc'  => __( "Imports all meta of discontinued products.Before importing please import products from woocommerce importer and insert the 'New Product ID' in the csv file.", 'discontinued-products-stock-status' ),
				),
				'discontinued_show_in_catalog'             => array(
					'title'   => __( 'Hide Discontinued Products in WooCommerce Catalog & Search Results', 'discontinued-products-stock-status' ),
					'id'      => 'discontinued_show_in_catalog',
					'default' => 'yes',
					'type'    => 'checkbox',
					'desc'    => __( "By default, all products that are marked as 'Discontinued' won't appear in catalog & search results. Uncheck this,if  <br> you want to see Discontinued Products in  catalog and search results.", 'discontinued-products-stock-status' ),
				),
				'discontinued_greyscale_effect'            => array(
					'title'   => __( 'Apply Grayscale effect on Discontinued products', 'discontinued-products-stock-status' ),
					'id'      => 'discontinued_greyscale_effect',
					'default' => 'no',
					'type'    => 'checkbox',
					'desc'    => __( "Enable this if you want to show the discontinued product's images with grayscale effect on archive page and WooCommerce.<br>Products with no image will use this.", 'discontinued-products-stock-status' ),
				),
				'enable_custom_message'                    => array(
					'title'   => __( 'Enable Product-Specific Discontinued Message', 'discontinued-products-stock-status' ),
					'id'      => 'discontinued_enable_custom_message',
					'default' => 'yes',
					'type'    => 'checkbox',
					'desc'    => __( 'This option allows you to customize your message for Discontinued Products on a product-level.', 'discontinued-products-stock-status' ),
				),
				'discontinued_settings_sectionend_one'     => array(
					'type' => 'sectionend',
					'id'   => 'discontinued_settings_sectionend_one',
				),
				'discontinued_global_message_heading'      => array(
					'title' => __( 'Customization Options for Global Discontinued Products Message', 'discontinued-products-stock-status' ),
					'type'  => 'title',
					'id'    => 'discontinued_global_message_heading',
				),
				'discontinued_global_message'              => array(
					'name'        => __( 'Enter the Global Message', 'discontinued-products-stock-status' ),
					'type'        => 'text',
					'id'          => 'discontinued_global_message',
					'default'     => 'This product has been discontinued.',
					'placeholder' => __( 'Set Custom Global Message for all Discontinued Products', 'discontinued-products-stock-status' ),
				),
				// Add border style dropdown in settings.
				'discontinued_global_message_border_style' => array(
					'id'       => 'discontinued_global_message_border_style',
					'title'    => __( 'Border Style', 'discontinued-products-stock-status' ),
					'type'     => 'select',
					'css'      => 'width:8.5em;',
					'options'  => array(
						'none'   => __( 'None', 'discontinued-products-stock-status' ),
						'dotted' => __( 'dotted', 'discontinued-products-stock-status' ),
						'dashed' => __( 'dashed', 'discontinued-products-stock-status' ),
						'solid'  => __( 'solid', 'discontinued-products-stock-status' ),
						'double' => __( 'double', 'discontinued-products-stock-status' ),
						'groove' => __( 'groove', 'discontinued-products-stock-status' ),
						'ridge'  => __( 'ridge', 'discontinued-products-stock-status' ),
						'inset'  => __( 'inset', 'discontinued-products-stock-status' ),
						'outset' => __( 'outset', 'discontinued-products-stock-status' ),
						'hidden' => __( 'hidden', 'discontinued-products-stock-status' ),
					),
					'desc_tip' => true,
					'desc'     => __( 'Set border style for global message.', 'discontinued-products-stock-status' ),

				),
				'discontinued_global_message_border_width' => array(
					'id'      => 'discontinued_global_message_border_width',
					'title'   => __( 'Border Width', 'discontinued-products-stock-status' ),
					'type'    => 'select',
					'css'     => 'width:8.5em;',
					'options' => array(
						'1px' => __( '1px', 'discontinued-products-stock-status' ),
						'2px' => __( '2px', 'discontinued-products-stock-status' ),
						'3px' => __( '3px', 'discontinued-products-stock-status' ),
						'4px' => __( '4px', 'discontinued-products-stock-status' ),
						'5px' => __( '5px', 'discontinued-products-stock-status' ),
					),
				),

				'discontinued_global_message_border_color' => array(
					'title' => __( 'Border Color', 'discontinued-products-stock-status' ),
					'id'    => 'discontinued_global_message_border_color',
					'type'  => 'color',
					'css'   => 'width:6em;',
				),
				'discontinued_global_message_border_radius' => array(
					'title'    => __( 'Border Radius', 'discontinued-products-stock-status' ),
					'id'       => 'discontinued_global_message_border_radius',
					'type'     => 'number',
					'css'      => 'width:8.5em;',
					'default'  => '0',
					'desc_tip' => true,
					'desc'     => __( 'Set border radius in pixels. eg : 10 .', 'discontinued-products-stock-status' ),
				),
				'discontinued_global_text_color'           => array(
					'title'    => __( 'Text Color', 'discontinued-products-stock-status' ),
					'desc'     => __( 'Text color is use to change global message text.', 'discontinued-products-stock-status' ),
					'id'       => 'discontinued_global_text_color',
					'type'     => 'color',
					'css'      => 'width:6em;',
					'default'  => '#FF0000',
					'desc_tip' => true,
				),
				'discontinued_global_background_color'     => array(
					'title'    => __( 'Background Color', 'discontinued-products-stock-status' ),
					'desc'     => __( 'background color is for global message text.', 'discontinued-products-stock-status' ),
					'id'       => 'discontinued_global_background_color',
					'type'     => 'color',
					'css'      => 'width:6em;',
					'default'  => '',
					'desc_tip' => true,
				),
				'discontinued_restore_default_setting_button' => array(
					'type'  => 'restore_settings',
					'title' => __( 'Reset to Default Settings.', 'discontinued-products-stock-status' ),
					'id'    => 'discontinued_restore_default_setting_button',
					'desc'  => __( 'Resets all settings to default settings.', 'discontinued-products-stock-status' ),
				),
				'section_end'                              => array(
					'type' => 'sectionend',
					'id'   => 'wc_discontinued_settings_tab_section_end',
				),
			);
			break;
		case 'restore':
			$settings = array(
				'section_title'                      => array(
					'name' => __( 'Revert Settings', 'discontinued-products-stock-status' ),
					'type' => 'title',
					'desc' => '',
					'id'   => 'wc_discontinued_settings_restore_tab_section_title',
				),
				'discontinued_restore_to_outofstock' => array(
					'title'    => __( 'Revert  products from "Discontinued" stock status to "Out of Stock" status?', 'discontinued-products-stock-status' ),
					'desc'     => __( 'Enabling this setting will  set all the WooCommerce products in the  "Discontinued" stock status  to "Out of Stock" stock status on deactivation of this plugin.', 'discontinued-products-stock-status' ),
					'desc_tip' => esc_html__( 'NOTE - If this setting is enabled and plugin is deactivated for any reason, all the products in the "discontinued" stock status will be updated and those changes cannot be undone.', 'discontinued-products-stock-status' ),
					'id'       => 'discontinued_restore_to_outofstock',
					'type'     => 'checkbox',
					'default'  => 'no',
					'autoload' => false,
				),
				'section_end'                        => array(
					'type' => 'sectionend',
					'id'   => 'wc_discontinued_settings_restore_tab_section_end',
				),
			);
			break;

		default:
			$settings = array();
			break;
	}
	return apply_filters( 'dpssw_discontinued_settings_tab_settings', $settings );
}

add_action( 'woocommerce_admin_field_restore_settings', 'dpssw_pro_restore_default_settings', 10, 1 );

/**
 * Restore default admin settings.
 *
 * @param array $value .
 */
function dpssw_pro_restore_default_settings( $value ) {
	?>
	<tr>
		<th style="width:300px;">
			<label id="discontinued_reset_button_title">
				<?php echo esc_attr( $value['title'] ); ?>
				<span class="tooltip" data-text="<?php echo esc_attr( $value['desc'] ); ?>">
					<img src="<?php echo esc_url( plugin_dir_url( __DIR__ ) . 'assets/images/tooltip.png' ); ?>"
						alt="tooltip icon" />
				</span>
			</label>
		</th>
		<td>
			<div class="restore-container">
				<div class="discontinued-restore-button">Reset</div>
			</div>
		</td>
	</tr>
	<?php
}

add_action( 'woocommerce_admin_field_export_button', 'dpssw_pro_export_button', 10, 1 );
/**
 * Export button field.
 *
 * @param array $value .
 */
function dpssw_pro_export_button( $value ) {
	?>
	<tr>
		<th style="width:300px;">
			<label id="discontinued_export_button_title">
			<?php echo esc_attr( $value['title'] ); ?>
				<span class="tooltip" data-text="<?php echo esc_attr( $value['desc'] ); ?>">
					<img src="<?php echo esc_url( plugin_dir_url( __DIR__ ) . 'assets/images/tooltip.png' ); ?>"
						alt="tooltip icon" />
				</span>
			</label>
		</th>
		<td>
			<div class="export-container">
				<div class="discontinued-export-button">Export</div>
			</div>
		</td>
	</tr>
	<?php
}

add_action( 'woocommerce_admin_field_import_button', 'dpssw_pro_import_button', 10, 1 );

/**
 * Import button field.
 *
 * @param array $value .
 */
function dpssw_pro_import_button( $value ) {
	?>
	<tr>
		<th style="width:300px;">
			<label id="discontinued_import_button_title">
			<?php echo esc_attr( $value['title'] ); ?>
				<span class="tooltip" data-text="<?php echo esc_attr( $value['desc'] ); ?>">
					<img src="<?php echo esc_url( plugin_dir_url( __DIR__ ) . 'assets/images/tooltip.png' ); ?>"
						alt="tooltip icon" />
				</span>
			</label>
		</th>
		<td>
			<div class="import-container">
				<div class="discontinued-import-button">Import</div>
				<input type="file" accept=".csv" name="fileToUpload" id="fileToUpload">
				<div>
		</td>
	</tr>
	<?php
}

/**
 * Add HTML content after the "Save Changes" button on the WooCommerce settings page under the "Discontinued Settings" tab.
 */
function add_html_after_save_changes_button() {

	// Write below pro banner.
	// Get closed status.
	$hide_message = get_option( 'dpssw_latest_popup_sale_notice' );

	// If sale has ended.
	$sale_end = get_option( 'dpssw_last_notice', 0 );

	?>
	<div id="discontinued_banner">
		<div class="dpssw-footer-upgrade">
			<div class="sft-logo">
				<a href=" <?php echo esc_url( plugins_url( '../assets/images/saffiretech_logo.png', __FILE__ ) ); ?> ">
					<img src=" <?php echo esc_url( plugins_url( '../assets/images/saffiretech_logo.png', __FILE__ ) ); ?> ">
				</a>
			</div>
			<div class="dpssw-upgrade-col1">
				<h3>Unlock Advanced Features For Discontinued Product Stock Status for WooCommerce</h3>
				<div class="dpssw-moneyback-badge">
					<div>
						<a href=" <?php echo esc_url( plugins_url( '../assets/images/moneyback-badge.png', __FILE__ ) ); ?> ">
							<img src=" <?php echo esc_url( plugins_url( '../assets/images/moneyback-badge.png', __FILE__ ) ); ?> ">
						</a>
					</div>
					<div class="dpssw-cashback-text">
						<h3>100% Risk-Free Money Back Guarantee!</h3>
						<p>We guarantee you a complete refund for new purchases or renewals if a request is made within 15 Days of purchase.</p>
						<input type="button" value="<?php echo esc_attr( __( 'Upgrade To Pro!', 'discontinued-products-stock-status' ) ); ?>" class="btn" onclick="location.href='https:\/\/www.saffiretech.com/woocommerce-discontinued-products-stock-status-pro/?utm_source=wp_plugin&utm_medium=footer&utm_campaign=free2pro&utm_id=c1&utm_term=upgrade_now&utm_content=dpssw';" />
					</div>
				</div>
			</div>
			<div class="dpssw-upgrade-col">
				<ul>
					<li><i class="fa fa-check" aria-hidden="true"></i><strong> <?php echo esc_attr( __( 'Supports  WooCommerce’s  Default Product Types', 'discontinued-products-stock-status' ) ); ?> </strong> : <?php echo esc_attr( __( 'Simple, Variable, Grouped.', 'discontinued-products-stock-status' ) ); ?></li>
					<li><i class="fa fa-check" aria-hidden="true"></i> <?php echo esc_attr( __( 'Supports', 'discontinued-products-stock-status' ) ); ?> <strong><?php echo esc_attr( __( 'Product Level Messages.', 'discontinued-products-stock-status' ) ); ?> </strong></li>
					<li><i class="fa fa-check" aria-hidden="true"></i> <?php echo esc_attr( __( 'Supports', 'discontinued-products-stock-status' ) ); ?> <strong><?php echo esc_attr( __( 'Global Level Messages.', 'discontinued-products-stock-status' ) ); ?> </strong></li>
					<li><i class="fa fa-check" aria-hidden="true"></i> <?php echo esc_attr( __( 'Works on', 'discontinued-products-stock-status' ) ); ?> <strong><?php echo esc_attr( __( 'Category, Archive & Shop Pages.', 'discontinued-products-stock-status' ) ); ?> </strong></li>
					<li><i class="fa fa-check" aria-hidden="true"></i><strong> <?php echo esc_attr( __( 'Product Alternatives', 'discontinued-products-stock-status' ) ); ?> </strong> : <?php echo esc_attr( __( 'Show up to 4 product alternatives for the Discontinued Product.', 'discontinued-products-stock-status' ) ); ?></li>
					<li><i class="fa fa-check" aria-hidden="true"></i><strong> <?php echo esc_attr( __( 'Global Styling Options', 'discontinued-products-stock-status' ) ); ?> </strong> : <?php echo esc_attr( __( 'Options to style the Global Discontinued Product Message.', 'discontinued-products-stock-status' ) ); ?></li>
					<li><i class="fa fa-check" aria-hidden="true"></i><strong> <?php echo esc_attr( __( 'Compatible  with WooCommerce Subscriptions', 'discontinued-products-stock-status' ) ); ?> </strong> : <?php echo esc_attr( __( 'Works with Simple & Variable Subscription Product types.', 'discontinued-products-stock-status' ) ); ?></li>
					<li><i class="fa fa-check" aria-hidden="true"></i><strong> <?php echo esc_attr( __( 'Compatible with WooCommerce Product Bundles', 'discontinued-products-stock-status' ) ); ?> </strong> : <?php echo esc_attr( __( 'Works with Product Bundle Product type.', 'discontinued-products-stock-status' ) ); ?></li>
					<li><i class="fa fa-check" aria-hidden="true"></i> <?php echo esc_attr( __( 'Effortlessly', 'discontinued-products-stock-status' ) ); ?> <strong><?php echo esc_attr( __( 'Migrate Discontinued Products Meta', 'discontinued-products-stock-status' ) ); ?></strong> <?php echo esc_attr( __( 'from one site to another using', 'discontinued-products-stock-status' ) ); ?> <strong> <?php echo esc_attr( __( 'Export - Import Feature.', 'discontinued-products-stock-status' ) ); ?> </strong></li>
				</ul>
			</div>
		</div>
	</div>
 
		<!-- Extra Quick Link View -->
	   <div>
		   <!-- Quick Links - SaffireTech -->
		   <div class="sft-quick-links-section">


			   <!-- SaffireTech Logo -->
			   <button class="sft-quick-links-menu-icon">
				   <img src='<?php echo esc_attr( plugins_url( '../assets/images/saffiretech-quick-links-logo.png', __FILE__ ) ); ?>' width="60px" height="60px">
			   </button>


			   <!-- Addional links -->
			   <div class="sft-quick-links-menu-items">


				   <!-- Additional Links can Be Added Here Inside -->
				   <div class="sft-quick-links-flex-container">
					   <?php
						// If last sale not ended.
						if ( $sale_end < 0 ) {
							?>
						   <!-- Sale Link -->
						   <a href="https://www.saffiretech.com/products/?utm_source=wp_plugin&utm_medium=floating_widget&utm_campaign=bfcm2024&utm_id=19" target="_blank">
							   <div class="sft-quick-links-tooltip-wrapper">
								   <button>
									   <!-- Replace with Image Tags -->
									   <svg width="30px" height="30px" viewBox="0 0 14 14" role="img" focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#d32f2f" d="M11.66666662 12.99999994H2.33333338c-.36666666 0-.66666666-.3-.66666666-.66666666v-6.6666666h10.66666656v6.6666666c0 .36666666-.3.66666666-.66666666.66666666z"></path><path fill="#f44336" d="M12.99999994 5.66666668H1.00000006V3.6666667c0-.36666666.3-.66666666.66666666-.66666666h10.66666656c.36666666 0 .66666666.3.66666666.66666666v1.99999998z"></path><path fill="#ff8f00" d="M6.33333334 5.66666668h1.33333332v7.33333326H6.33333334zm1.99999998-4.66666662L6.33333334 3.00000004h1.33333332l1.99999998-1.99999998z"></path><path fill="#ffc107" d="M6.33333334 5.66666668h1.33333332V3.00000004L5.66666668 1.00000006H4.33333336l1.99999998 1.99999998z"></path></g></svg>
								   </button>
								   <span class="sft-quick-links-tooltip-text"><?php echo esc_html__( 'BFCM 40% OFF SALE!', 'discontinued-products-stock-status' ); ?></span>
							   </div>
						   </a>
						<?php } ?>


					   <!-- Replace Links with Documentation Link -->
					   <a href="https://www.saffiretech.com/docs/sft-woocommerce-discontinued-product-stock-status/" target="_blank">
						   <div class="sft-quick-links-tooltip-wrapper">
							   <button>
								   <!-- Replace with Image Tags -->
								   <svg width="30px" height="30px" viewBox="-1.28 -1.28 34.56 34.56" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><style>.cls-1{fill:url(#linear-gradient);}.cls-2{fill:url(#linear-gradient-2);}.cls-3{fill:#f8edeb;}</style><linearGradient gradientUnits="userSpaceOnUse" id="linear-gradient" x1="6.65" x2="27.27" y1="6.65" y2="27.27"><stop offset="0" stop-color="#3a7fa1"></stop><stop offset="1" stop-color="#149fd7"></stop></linearGradient><linearGradient id="linear-gradient-2" x1="6" x2="12" xlink:href="#linear-gradient" y1="5" y2="5"></linearGradient></defs><path class="cls-1" d="M23.5,2h-12a.47.47,0,0,0-.35.15l-5,5A.47.47,0,0,0,6,7.5v20A2.5,2.5,0,0,0,8.5,30h15A2.5,2.5,0,0,0,26,27.5V4.5A2.5,2.5,0,0,0,23.5,2Z"></path><path class="cls-2" d="M11.69,2a.47.47,0,0,0-.54.11l-5,5A.47.47,0,0,0,6,7.69.5.5,0,0,0,6.5,8h3A2.5,2.5,0,0,0,12,5.5v-3A.5.5,0,0,0,11.69,2Z"></path><path class="cls-3" d="M16,21a2,2,0,0,1-2-2V13a2,2,0,0,1,4,0v6A2,2,0,0,1,16,21Zm0-9a1,1,0,0,0-1,1v6a1,1,0,0,0,2,0V13A1,1,0,0,0,16,12Z"></path><path class="cls-3" d="M9.5,21a.5.5,0,0,1-.5-.5v-9a.5.5,0,0,1,.5-.5A3.5,3.5,0,0,1,13,14.5v3A3.5,3.5,0,0,1,9.5,21Zm.5-8.95V20a2.5,2.5,0,0,0,2-2.45v-3A2.5,2.5,0,0,0,10,12.05Z"></path><path class="cls-3" d="M21,21a2,2,0,0,1-2-2V13a2,2,0,0,1,4,0,.5.5,0,0,1-1,0,1,1,0,0,0-2,0v6a1,1,0,0,0,2,0,.5.5,0,0,1,1,0A2,2,0,0,1,21,21Z"></path></g></svg>
							   </button>
							   <span class="sft-quick-links-tooltip-text"><?php echo esc_html__( 'Explore Documentation', 'discontinued-products-stock-status' ); ?></span>
						   </div>
					   </a>


					   <!-- Upgrade to Pro Link - Support Link for Pro Versions -->
					   <a href="https://www.saffiretech.com/woocommerce-discontinued-products-stock-status-pro/" target="_blank">
						   <div class="sft-quick-links-tooltip-wrapper">
							   <button>
								   <!-- Replace with Image Tags -->
								   <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px" viewBox="-66.56 -66.56 645.12 645.12" xml:space="preserve" fill="#000000" stroke="#000000" stroke-width="6.144"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css">  .st0{fill:#FFD700;}  </style> <g> <path class="st0" d="M512,152.469c0-21.469-17.422-38.875-38.891-38.875c-21.484,0-38.906,17.406-38.906,38.875 c0,10.5,4.172,20.016,10.938,27c-26.453,54.781-77.016,73.906-116.203,56.594c-34.906-15.438-47.781-59.563-52.141-93.75 c14.234-7.484,23.938-22.391,23.938-39.594C300.734,78.016,280.719,58,256,58c-24.703,0-44.734,20.016-44.734,44.719 c0,17.203,9.703,32.109,23.938,39.594c-4.359,34.188-17.234,78.313-52.141,93.75c-39.188,17.313-89.75-1.813-116.203-56.594 c6.766-6.984,10.938-16.5,10.938-27c0-21.469-17.422-38.875-38.891-38.875C17.422,113.594,0,131,0,152.469 c0,19.781,14.781,36.078,33.875,38.547l44.828,164.078h354.594l44.828-164.078C497.234,188.547,512,172.25,512,152.469z"></path> <path class="st0" d="M455.016,425.063c0,15.984-12.953,28.938-28.953,28.938H85.938C69.953,454,57,441.047,57,425.063v-2.406 c0-16,12.953-28.953,28.938-28.953h340.125c16,0,28.953,12.953,28.953,28.953V425.063z"></path> </g> </g></svg>
							   </button>
							   <span class="sft-quick-links-tooltip-text"><?php echo esc_html__( 'Explore Pro Version', 'discontinued-products-stock-status' ); ?></span>
						   </div>
					   </a>
				   </div>
			   </div>


			   <?php
				if ( ! $hide_message ) {
					?>
				   <div id="sft-sale-notice-popup" class="sft-quick-links-popup">
					   <div class="sft-sale-notice-popup-inner dpssw-quick-links-popup">
						   <div class="sft-ql-popup-close-container"><button class="sft-quick-links-close-popup">x</button></div>


							   <div class="sft-ql-popup-content">


								   <!-- Black friday sale notice image -->
								   <img style="width: 100%; max-width: 180px;" src="<?php echo esc_attr( plugins_url( '../assets/images/bfcm-sale-notice-img.png', __FILE__ ) ); ?>"/>


								   <?php
									// Sale one.
									if ( get_option( 'sale_bf1_start' ) ) {
										?>
									   <h3 class="sft-sale-popup-heading"><?php echo esc_html__( 'BFCM EARLYBIRD SALE!', 'discontinued-products-stock-status' ); ?></h3>


									   <!-- Coundown Container -->
									   <div id="sft-popup-sale-countdown-timer-container">
										   <div class="sft-sale-popup-number-container">
											   <div class="days time"><span class="sft-countdown-days-one">00</span></div>
											   <div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'DAYS', 'discontinued-products-stock-status' ); ?></div>
										   </div>


										   <div class="sft-sale-popup-countdown-colon">:</div>
										   <div class="sft-sale-popup-number-container">
											   <div class="hours time"><span class="sft-countdown-hours-one">00</span></div>
											   <div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'HRS', 'discontinued-products-stock-status' ); ?></div>
										   </div>


										   <div class="sft-sale-popup-countdown-colon">:</div>
										   <div class="sft-sale-popup-number-container">
											   <div class="minutes time"><span class="sft-countdown-minutes-one">00</span></div>
											   <div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'MINS', 'discontinued-products-stock-status' ); ?></div>
										   </div>


										   <div class="sft-sale-popup-countdown-colon">:</div>
										   <div class="sft-sale-popup-number-container">
											   <div class="seconds time"><span class="sft-countdown-seconds-one">00</span></div>
											   <div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'SECS', 'discontinued-products-stock-status' ); ?></div>
										   </div>
									   </div>
										<?php
									}

									// Sale two.
									if ( get_option( 'sale_bf2_start' ) ) {
										?>
									   <h3 class="sft-sale-popup-heading"><?php echo esc_html__( 'BFCM MEGA SALE IS LIVE!', 'discontinued-products-stock-status' ); ?></h3>


									   <!-- Coundown Container -->
									   <div id="sft-popup-sale-countdown-timer-container">
										   <div class="sft-sale-popup-number-container">
											   <div class="days time"><span class="sft-countdown-days-two">00</span></div>
											   <div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'DAYS', 'discontinued-products-stock-status' ); ?></div>
										   </div>


										   <div class="sft-sale-popup-countdown-colon">:</div>
										   <div class="sft-sale-popup-number-container">
											   <div class="hours time"><span class="sft-countdown-hours-two">00</span></div>
											   <div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'HRS', 'discontinued-products-stock-status' ); ?></div>
										   </div>


										   <div class="sft-sale-popup-countdown-colon">:</div>
										   <div class="sft-sale-popup-number-container">
											   <div class="minutes time"><span class="sft-countdown-minutes-two">00</span></div>
											   <div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'MINS', 'discontinued-products-stock-status' ); ?></div>
										   </div>


										   <div class="sft-sale-popup-countdown-colon">:</div>
										   <div class="sft-sale-popup-number-container">
											   <div class="seconds time"><span class="sft-countdown-seconds-two">00</span></div>
											   <div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'SECS', 'discontinued-products-stock-status' ); ?></div>
										   </div>
									   </div>
										<?php
									}

									// Sale three.
									if ( get_option( 'sale_bf3_start' ) ) {
										?>
									   <h3 class="sft-sale-popup-heading"><?php echo esc_html__( 'BFCM Sale Alert!', 'discontinued-products-stock-status' ); ?></h3>


									   <!-- Coundown Container -->
									   <div id="sft-popup-sale-countdown-timer-container">
										   <div class="sft-sale-popup-number-container">
											   <div class="days time"><span class="sft-countdown-days-three">00</span></div>
											   <div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'DAYS', 'discontinued-products-stock-status' ); ?></div>
										   </div>


										   <div class="sft-sale-popup-countdown-colon">:</div>
										   <div class="sft-sale-popup-number-container">
											   <div class="hours time"><span class="sft-countdown-hours-three">00</span></div>
											   <div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'HRS', 'discontinued-products-stock-status' ); ?></div>
										   </div>


										   <div class="sft-sale-popup-countdown-colon">:</div>
										   <div class="sft-sale-popup-number-container">
											   <div class="minutes time"><span class="sft-countdown-minutes-three">00</span></div>
											   <div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'MINS', 'discontinued-products-stock-status' ); ?></div>
										   </div>


										   <div class="sft-sale-popup-countdown-colon">:</div>
										   <div class="sft-sale-popup-number-container">
											   <div class="seconds time"><span class="sft-countdown-seconds-three">00</span></div>
											   <div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'SECS', 'discontinued-products-stock-status' ); ?></div>
										   </div>
									   </div>
										<?php
									}

									// Sale four.
									if ( get_option( 'sale_bf4_start' ) ) {
										?>
									   <h3 class="sft-sale-popup-heading"><?php echo esc_html__( 'Extended BFCM MEGA SALE!', 'discontinued-products-stock-status' ); ?></h3>


									   <!-- Coundown Container -->
									   <div id="sft-popup-sale-countdown-timer-container">
										   <div class="sft-sale-popup-number-container">
											   <div class="days time"><span class="sft-countdown-days-four">00</span></div>
											   <div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'DAYS', 'discontinued-products-stock-status' ); ?></div>
										   </div>


										   <div class="sft-sale-popup-countdown-colon">:</div>
										   <div class="sft-sale-popup-number-container">
											   <div class="hours time"><span class="sft-countdown-hours-four">00</span></div>
											   <div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'HRS', 'discontinued-products-stock-status' ); ?></div>
										   </div>


										   <div class="sft-sale-popup-countdown-colon">:</div>
										   <div class="sft-sale-popup-number-container">
											   <div class="minutes time"><span class="sft-countdown-minutes-four">00</span></div>
											   <div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'MINS', 'discontinued-products-stock-status' ); ?></div>
										   </div>


										   <div class="sft-sale-popup-countdown-colon">:</div>
										   <div class="sft-sale-popup-number-container">
											   <div class="seconds time"><span class="sft-countdown-seconds-four">00</span></div>
											   <div class="sft-sale-popup-countdown-text"><?php echo esc_html__( 'SECS', 'discontinued-products-stock-status' ); ?></div>
										   </div>
									   </div>
										<?php
									}
									?>
							   </div>


							   <div class="sft-ql-popup-btn-container"><a class="sft-ql-popup-sale-btn-link" style="text-decoration: none;" target="_blank" href="https://www.saffiretech.com/products/?utm_source=wp_plugin&utm_medium=sale_popup&utm_campaign=bfcm2024&utm_id=19">
							   <button class="sft-ql-popup-deal-btn"><?php echo esc_html__( 'GRAB MY DISCOUNT', 'discontinued-products-stock-status' ); ?></button></a></div>
							   &nbsp;
						   </div>
					   </div>
				   </div>
				<?php } ?>


			   <script>


				   // Show the popup with a fade-in effect after 2 seconds.
				   setTimeout( function() {
					   jQuery('.sft-quick-links-popup').fadeIn(400);
				   }, 2000);


				   // Handel close popup script.
				   setTimeout( () => {


					   // AJAX to show popup notice.
					   jQuery('button.sft-quick-links-close-popup').on('click', function(e){
						   e.preventDefault();
						   jQuery.ajax({
							   type: "POST",
							   url: dpssw_ajax_obj.url,
							   data: {
								   action: 'dpssw_update_new_sale_notice_read',
							   },
							   success: (res) => {
							   }
						   });
					   })
				   }, 2002);


				   jQuery(document).ready(function() {


					   jQuery( '#wpfooter').css('position', 'relative' );


					   // Check if hidden.
					   let isHide = <?php echo esc_html( $hide_message ); ?>


					   if ( isHide ) {
						   jQuery( '.dpssw-quick-links-popup').hide();
					   } else {
						   jQuery( '.dpssw-quick-links-popup').fadeIn(400);;
					   }


					   // Disable the menu toggle until the popup is closed.
					   if ( jQuery('.sft-quick-links-popup').length ) {
						   var isPopupClosed = false;
					   } else {
						   var isPopupClosed = true;
					   }


					   // Close the popup when the "x" button is clicked.
					   jQuery('.sft-quick-links-close-popup').click(function() {


						   // Close the popup with a fade-out effect.
						   jQuery('.sft-quick-links-popup').fadeOut(400);


						   // Enable the menu toggle.
						   isPopupClosed = true;
					   });


					   // Toggle the menu items on click of the logo button.
					   jQuery('.sft-quick-links-menu-icon').click(function( e ) {
						e.preventDefault();
						   if (isPopupClosed) {


							   // Toggle with slide effect.
							   jQuery('.sft-quick-links-menu-items').slideToggle(400);
						   }
					   });
				   });
			   </script>
		   </div>
	   </div>

	<?php
}
add_action( 'woocommerce_settings_tabs_discontinued_settings_tab', 'add_html_after_save_changes_button' );

// ======
// ----------------------------------------------- Dismmiss plugin popup notice ---------------------------------------.


add_action( 'wp_ajax_dpssw_update_new_sale_notice_read', 'dpssw_update_new_sale_notice_read' );


/**
 * AJAX handler to hide the sale popup.
 */
function dpssw_update_new_sale_notice_read() {
	update_option( 'dpssw_latest_popup_sale_notice', 1 );
	wp_die();
}
// ======

add_filter( 'plugin_action_links_' . DPSSW_DISCOUNTINUED_PLUGIN_BASENAME, 'dpssw_discontinued_plugin_setting_link', 10, 1 );

/**
 * Show 'Settings' action links on the plugin screen.
 *
 * @param mixed $links Plugin Action links.
 *
 * @return array
 */
function dpssw_discontinued_plugin_setting_link( $links ) {
	$action_links = array(
		'settings'             => '<a href="' . admin_url( 'admin.php?page=wc-settings&tab=discontinued_settings_tab' ) . '" aria-label="' . esc_attr__( 'Settings', 'discontinued-products-stock-status' ) . '">' . esc_html__( 'Settings', 'discontinued-products-stock-status' ) . '</a>',
		'dpssw_upgrade_to_pro' => '<a href="https://www.saffiretech.com/woocommerce-discontinued-products-stock-status-pro/?utm_source=wp_plugin&utm_medium=plugins_archive&utm_campaign=free2pro&utm_id=c1&utm_term=upgrade_now&utm_content=dpssw" target="_blank" aria-label="' . esc_attr__( 'Upgrade to Pro', 'discontinued-products-stock-status' ) . '" style=" background: #10A494; color: white; padding: 4px 5px; border-radius: 5px; font-weight: 600;">' . esc_html__( 'Upgrade to Pro', 'discontinued-products-stock-status' ) . '</a>',
	);
	return array_merge( $action_links, $links );
}


add_filter( 'woocommerce_product_data_tabs', 'dpssw_discontinued_products_tabs', 10, 1 );

/**
 * Add custom Product data tab on Product page backend.
 *
 * @param array $tabs Return array of tabs to show.
 * @return array $tabs .
 */
function dpssw_discontinued_products_tabs( $tabs ) {
	$tabs['discontinued-products-tabs'] = array(
		'label'    => __( 'Discontinued Products', 'discontinued-products-stock-status' ),
		'class'    => array( 'show_if_simple show_if_variable show_if_grouped' ),
		'target'   => 'discontinued_tab_container',
		'priority' => 100,
	);
	return $tabs;
}


add_action( 'woocommerce_product_data_panels', 'dpssw_discontinued_product_tab_content' );

/**
 * Discontinued product tab contents on product page backend.
 */
function dpssw_discontinued_product_tab_content() {
	 global $post;
	$product_id = $post->ID;

	// Note the 'id' attribute needs to match the 'target' parameter set above.
	?>
	<div id='discontinued_tab_container' class='panel woocommerce_options_panel'>
		<div class='options_group'>
			<?php
			woocommerce_wp_checkbox(
				array(
					'id'          => '_discontinued_product',
					'label'       => __( 'Discontinue Entire Product :', 'discontinued-products-stock-status' ),
					'description' => __( 'Check this box if you want to set the entire product as discontinued', 'discontinued-products-stock-status' ),
					'value'       => get_post_meta( $product_id, '_discontinued_product', true ),
				)
			);
			woocommerce_wp_select(
				array(
					'id'          => 'show_specific_messsage',
					'label'       => __( 'Product Message Type', 'discontinued-products-stock-status' ),
					'type'        => 'select',
					'class'       => 'select short',
					'options'     => array(
						'global_text_message'      => __( 'Global Message', 'discontinued-products-stock-status' ),
						'product_specific_message' => __( 'Product Specific Message', 'discontinued-products-stock-status' ),
					),
					'desc_tip'    => 'true',
					'description' => __( 'Choose type of message to be displayed for the Discontinued product', 'discontinued-products-stock-status' ),
				)
			);
			woocommerce_wp_text_input(
				array(
					'id'          => 'related_product_header',
					'label'       => __( 'Enter the Heading Text for <span class="dpssw-pro-alert pointer"><b> Pro </b></span><br>Similar Products ', 'discontinued-products-stock-status' ),
					'placeholder' => __( 'You Might be Interested in', 'discontinued-products-stock-status' ),
					'desc_tip'    => 'true',
					'description' => __( 'Enter the text to be displayed on the Header of Similar products else default text will be displayed', 'discontinued-products-stock-status' ),
					'value'       => get_post_meta( $product_id, 'related_product_header', true ),
				)
			);
			woocommerce_wp_select(
				array(
					'id'          => 'related_to_disc_prod',
					'name'        => 'related_to_disc_prod[]',
					'label'       => __( 'Choose Alternative Products <span class="dpssw-pro-alert pointer"><b> Pro </b></span>', 'discontinued-products-stock-status' ),
					'type'        => 'select',
					'class'       => 'select short',
					'options'     => array(),
					'desc_tip'    => 'true',
					'description' => __( 'Select similar products to be displayed on the Product Page', 'discontinued-products-stock-status' ),
				)
			);

			$editor_id = 'custom_editor_box';
			$content   = get_post_meta( $product_id, 'custom_editor_box', true );
			wp_editor( $content, $editor_id );

			?>
		</div>
	</div>
	<?php
}


add_action( 'woocommerce_process_product_meta_simple', 'dpssw_save_discontinued_product_option_fields', 10, 1 );
add_action( 'woocommerce_process_product_meta', 'dpssw_save_discontinued_product_option_fields', 10, 1 );

/**
 * Save the custom fields from simple variable, grouped product.
 *
 * @param int $post_id .
 */
function dpssw_save_discontinued_product_option_fields( $post_id ) {
	$product = wc_get_product( $post_id ); // product object.
	if ( empty( $product ) ) {
		return '';
	}

	// save stock status for variable and grouped product.
	if ( $product->is_type( 'variable' ) || $product->is_type( 'grouped' ) ) {
		$is_discontinued_product = isset( $_POST['_discontinued_product'] ) ? 'yes' : 'no';
		update_post_meta( $post_id, '_discontinued_product', $is_discontinued_product );
	}

	if ( isset( $_POST['show_specific_messsage'] ) ) :
		update_post_meta( $post_id, 'show_specific_messsage', sanitize_text_field( wp_unslash( $_POST['show_specific_messsage'] ) ) );
	endif;

	/* WTYIWYG Editor Data */
	if ( isset( $_POST['custom_editor_box'] ) ) :
		update_post_meta( $post_id, 'custom_editor_box', wp_kses_post( wp_unslash( $_POST['custom_editor_box'] ) ) );
	endif;
}


add_action( 'woocommerce_variation_options_dimensions', 'dpssw_add_wc_variable_discontinued_to_variations', 10, 3 );

/**
 * To add custom field for discontinued stock status on variation level.
 *
 * @param int     $loop           Position in the loop.
 * @param array   $variation_data Variation data.
 * @param WP_Post $variation      Post data.
 */
function dpssw_add_wc_variable_discontinued_to_variations( $loop, $variation_data, $variation ) {
	?>
	<div class="variation-discontinued-div" style="display: none;">
		<?php
		$message_type = get_post_meta( $variation->ID, '_discontinued_messsage_type', true );

		woocommerce_wp_select(
			array(
				'id'          => 'wc_discontinued_messsage_type[' . $loop . ']',
				'label'       => __( 'Discontinued Message Type', 'discontinued-products-stock-status' ),
				'type'        => 'select',
				'class'       => 'select dpssw-select',
				'value'       => esc_attr( $message_type ),
				'options'     => array(
					'global_text_message'         => __( 'Global Message', 'discontinued-products-stock-status' ),
					'variations_specific_message' => __( 'Variation Specific Message', 'discontinued-products-stock-status' ),
				),
				'desc_tip'    => 'true',
				'description' => __( 'Choose type of message to be displayed for Discontinued product', 'discontinued-products-stock-status' ),
			)
		);

		woocommerce_wp_textarea_input(
			array(
				'id'            => 'wc_variable_discontinued[' . $loop . ']',
				'class'         => 'form-field form-row-full',
				'wrapper_class' => 'dpssw-message',
				'label'         => __( 'Discontinued description', 'discontinued-products-stock-status' ),
				'value'         => get_post_meta( $variation->ID, '_variable_discontinued_textarea', true ),
			)
		);
		?>
	</div>
	<?php
}


add_action( 'woocommerce_save_product_variation', 'dpssw_save_variable_discontinued_data', 10, 2 );

/**
 * To save custom field values on product variation .
 *
 * @param int $variation_id .
 * @param int $i .
 */
function dpssw_save_variable_discontinued_data( $variation_id, $i ) {

	if ( isset( $_POST['wc_variable_discontinued'][ $i ] ) || isset( $_POST['wc_discontinued_messsage_type'][ $i ] ) ) {

		$variable_discontinued_textarea = sanitize_text_field( wp_unslash( $_POST['wc_variable_discontinued'][ $i ] ) );
		$discontinued_messsage_type     = sanitize_text_field( wp_unslash( $_POST['wc_discontinued_messsage_type'][ $i ] ) );
	}

	if ( isset( $variable_discontinued_textarea ) ) {
		update_post_meta( $variation_id, '_variable_discontinued_textarea', sanitize_text_field( wp_unslash( $variable_discontinued_textarea ) ) );
	}
	if ( isset( $discontinued_messsage_type ) ) {
		update_post_meta( $variation_id, '_discontinued_messsage_type', sanitize_text_field( wp_unslash( $discontinued_messsage_type ) ) );
	}
}


add_filter( 'woocommerce_available_variation', 'dpssw_add_wc_discontinued_variation_data', 10, 3 );

/**
 * To add custom field discountinued data in the variation object to display in product page.
 *
 * @param array  $data .
 * @param object $product .
 * @param object $variation .
 * @return array
 */
function dpssw_add_wc_discontinued_variation_data( $data, $product, $variation ) {

	if ( $variation->get_stock_status() === 'discontinued' ) {

		$variation_id           = $variation->get_id();
		$message                = '';
		$message_type           = get_post_meta( $variation_id, '_discontinued_messsage_type', true );
		$custom_message_disable = get_option( 'discontinued_enable_custom_message' );
		$message                = ! empty( get_option( 'discontinued_global_message' ) ) ? get_option( 'discontinued_global_message' ) : __( 'This product has been discontinued.', 'discontinued-products-stock-status' );

		if ( 'yes' === $custom_message_disable ) {

			if ( 'variations_specific_message' === $message_type ) {
				$variation_message = get_post_meta( $variation_id, '_variable_discontinued_textarea', true );
				$message           = ! empty( $variation_message ) ? $variation_message : $message;
				// If variation_message is empty then by default global message is rendered.
				if ( ! empty( $variation_message ) ) {
					$message_html = '<div class=discontinued_status_message>' . esc_attr( $message ) . '</div>';
				} else {
					$message_html = '<div class=discontinued_status_message>' . esc_attr( $message ) . '</div>';
				}
			} elseif ( 'global_text_message' === $message_type ) { // This will work when message_type is 'global_text_message'.
				$message_html = '<div class=discontinued_status_message>' . esc_attr( $message ) . '</div>';
			}
		} else { // This will work when custom_message_disable is 'yes'. Global message will be overridden.
			$message_html = '<div class=discontinued_status_message>' . esc_attr( $message ) . '</div>';
		}

		$data['availability_html'] = apply_filters( 'dpssw_customize_variation_product_message', $message_html ); // modify the variation product message.

	}
	return $data;
}


add_action( 'woocommerce_after_single_product_summary', 'dpssw_hide_discontinued_variations_and_grouped_forms' );

/**
 * To hide all variation and group products when checkbox is checked form 'Discontinued Tab'.
 */
function dpssw_hide_discontinued_variations_and_grouped_forms() {
	global $post;
	$product_id = $post->ID;
	$product    = wc_get_product( $product_id );
	if ( empty( $product ) ) {
		return '';
	}
	if ( $product->is_type( 'variable' ) || $product->is_type( 'grouped' ) ) {

		$is_checked = get_post_meta( $product_id, '_discontinued_product', true );
		if ( 'yes' === $is_checked ) {
			?>
			<script>
				is_discontinued = '<?php echo esc_attr( $is_checked ); ?>';
				if ('yes' == is_discontinued) {
					jQuery('.variations_form , form.cart.grouped_form').hide();
				}
			</script>
			<?php
		}
	}
}


add_filter( 'woocommerce_product_stock_status_options', 'dpssw_add_woocommerce_product_stock_status_option', 10, 1 );

/**
 * Add new 'Discontinued' stock status options inside Product Inventory tab.
 *
 * @param array $status Add a new stock status called discontinued.
 * @return array $status .
 */
function dpssw_add_woocommerce_product_stock_status_option( $status ) {

	$status['discontinued'] = __( 'Discontinued', 'discontinued-products-stock-status' ); // Add new statuses.
	return $status;
}


add_action( 'woocommerce_process_product_meta_simple', 'dpssw_save_custom_stock_status', 10, 1 );

/**
 * Save Product Meta Boxes 'Discontinued' stock status.
 *
 * @param int $product_id .
 */
function dpssw_save_custom_stock_status( $product_id ) {
	$product = wc_get_product( $product_id ); // product object.
	if ( empty( $product ) ) {
		return '';
	}

	// save stock status for simple product.
	if ( isset( $_POST['_stock_status'] ) && ! empty( $_POST['_stock_status'] ) ) {

		update_post_meta( $product_id, '_stock_status', wc_clean( sanitize_text_field( wp_unslash( $_POST['_stock_status'] ) ) ) );
		$product->set_stock_status( wc_clean( sanitize_text_field( wp_unslash( $_POST['_stock_status'] ) ) ) );
		$product->save();
	}
}


add_filter( 'woocommerce_admin_stock_html', 'dpssw_woocommerce_admin_stock_html', 100, 2 );

/**
 * Admin 'Discontinued' stock html.
 * Apply discontinued label to stock status on admin all product page.
 *
 * @param mixed $stock_html .
 * @param mixed $product  .
 */
function dpssw_woocommerce_admin_stock_html( $stock_html, $product ) {
	if ( empty( $product ) ) {
		return $stock_html;
	}
	$pid = $product->get_id(); // gets product id.

	if ( $product->is_type( 'simple' ) ) {

		$product_stock_status = $product->get_stock_status();
		if ( 'discontinued' === $product_stock_status ) {
			$stock_html = '<mark class="discontinued">' . __( 'Discontinued', 'discontinued-products-stock-status' ) . '</mark>';
			$stock_html = apply_filters( 'dpssw_admin_discontinued_text_css', $stock_html ); // modify the stock status style of the product in the admin menu.
		}
	} elseif ( $product->is_type( 'variable' ) || $product->is_type( 'grouped' ) ) {

		$status = get_post_meta( $pid, '_discontinued_product', true );
		if ( 'yes' === $status ) {
			$stock_html = '<mark class="discontinued">' . __( 'Discontinued', 'discontinued-products-stock-status' ) . '</mark>';
			$stock_html = apply_filters( 'dpssw_admin_discontinued_text_css', $stock_html ); // modify the stock status style of the product in the admin menu.
		}

		$manage_stock = get_post_meta( $pid, '_manage_stock', true );
		if ( 'yes' === $manage_stock ) {
			$stock_quantity = get_post_meta( $pid, '_stock', true );
			$disc_parent    = get_post_meta( $pid, '_stock_discontinued_product', true );
			if ( ( 'yes' === $disc_parent ) && ( '0' === $stock_quantity ) ) {
				$stock_html = '<mark class="discontinued">' . __( 'Discontinued', 'discontinued-products-stock-status' ) . '</mark>';
				$stock_html = apply_filters( 'dpssw_admin_discontinued_text_css', $stock_html ); // modify the stock status style of the product in the admin menu.
			}
		}
	}
	return $stock_html;
}


add_filter( 'woocommerce_product_query_meta_query', 'dpssw_custom_product_meta_query', 10, 1 );

/**
 * Hide all Discontinued Products from Catalog and Search when 'Show in Catalog' is disabled from settings Page.
 *
 * @param  array $meta_query Meta query.
 */
function dpssw_custom_product_meta_query( $meta_query ) {
	$show_in_catalog = get_option( 'discontinued_show_in_catalog' );

	if ( 'no' !== $show_in_catalog ) {
		$meta_query_array = array(
			'key'     => '_stock_status',
			'value'   => 'discontinued',
			'compare' => '!=',
		);
		$meta_query[]     = apply_filters( 'dpssw_customize_catalog_query', $meta_query_array );
	}
	return $meta_query;
}


add_action( 'woocommerce_product_query', 'dpssw_hide_variable_group_products' );

/**
 * Hide discontinued variable & grouped product from archive, shop & category page.
 *
 * @param object $query .
 */
function dpssw_hide_variable_group_products( $query ) {
	global $wpdb;
	$show_in_catalog = get_option( 'discontinued_show_in_catalog' );

	// all discontinued product id of variable products and grouped products.
	$variable_discontinued_product_ids = $wpdb->get_col( "SELECT post_id FROM $wpdb->postmeta WHERE `meta_key` = '_discontinued_product' AND `meta_value` IN ( 'yes' )" );

	// hide variable product on category, shop & archive page.
	if ( ! is_admin() ) {
		if ( 'no' !== $show_in_catalog ) {
			$query->set( 'post__not_in', $variable_discontinued_product_ids );
		}
	}
}

/**
 * Returns discontinued product id.
 *
 * @param array $related_posts .
 * @return array
 */
function dpssw_get_discontiued_product_ids( $related_posts ) {
	$all_product_id = array(); // all discontinued product id.

	foreach ( $related_posts as $rp ) {
		$product = wc_get_product( $rp ); // product object.
		if ( ! empty( $product ) ) {
			if ( $product->is_type( 'simple' ) ) {
				$product_stock_status = $product->get_stock_status();

				// gets simple discontinued product id.
				if ( 'discontinued' === $product_stock_status ) {
					array_push( $all_product_id, $rp );
				}
			} elseif ( $product->is_type( 'variable' ) || $product->is_type( 'grouped' ) ) {
				$status = get_post_meta( $rp, '_discontinued_product', true );

				// gets variable & grouped discontinued product id.
				if ( 'yes' === $status ) {
					array_push( $all_product_id, $rp );
				}
			}
		}
	}
	return $all_product_id;
}


add_filter( 'woocommerce_related_products', 'dpssw_hide_discontinued_product_related_product', 10, 3 );

/**
 * Hide discontinued product from related product .
 *
 * @param array $related_posts array of product ids.
 * @param int   $product_id  cuurent product id.
 * @param array $array  array of values of related product.
 * @return array
 */
function dpssw_hide_discontinued_product_related_product( $related_posts, $product_id, $array ) {
	$show_in_catalog         = get_option( 'discontinued_show_in_catalog' );
	$new_array               = array(); // after removed discontinued product id.
	$discontinued_product_id = dpssw_get_discontiued_product_ids( $related_posts ); // all discontinued product id.

	if ( 'no' !== $show_in_catalog ) {
		$new_array     = array_diff( $related_posts, $discontinued_product_id ); // un discontinued product id.
		$related_posts = $new_array;
	}
	return $related_posts;
}


add_filter( 'woocommerce_shortcode_products_query_results', 'dpssw_hide_discontinued_product_from_shortcode', 50, 1 );

/**
 * Hide discontinued product from woocommerce shortcode used.
 *
 * @param object $results object of shortcode product ids.
 * @return object return modified object after removing discontinued product ids.
 */
function dpssw_hide_discontinued_product_from_shortcode( $results ) {
	$show_in_catalog         = get_option( 'discontinued_show_in_catalog' );
	$new_array               = array(); // after removed discontinued product id.
	$discontinued_product_id = dpssw_get_discontiued_product_ids( $results->ids ); // all discontinued product id.

	if ( 'no' !== $show_in_catalog ) {
		$new_array    = array_diff( $results->ids, $discontinued_product_id ); // not discontinued product id.
		$results->ids = $new_array;
	}
	return $results;
}


add_filter( 'pre_get_posts', 'dpssw_get_discontinued_post_search_filter', 1000, 1 );

/**
 * Gets all discontinued products while filtering in all products page.
 *
 * @param object $query .
 */
function dpssw_get_discontinued_post_search_filter( $query ) {
	global $wpdb;
	$valid_instock_prod_id = array(); // all valid instock ids of all type of product.
	$var_discontinued_prod = array(); // variable and grouped discontinued product ids.

	// ony work if filter is applied while search.
	if ( isset( $_GET['filter_action'] ) ) {

		// runs only for main query.
		if ( $query->is_main_query() ) {

			// All product id from lookup table of all stock type.
			$product_id_lookup_instock = $wpdb->get_col( "SELECT product_id FROM $wpdb->wc_product_meta_lookup WHERE `stock_status` IN ( 'instock', 'onbackorder', 'outofstock', 'discontinued' )" );

			// All product id of _stock_status excluded discontinued from postmeta.
			$product_id_excude_discontinued = $wpdb->get_col( "SELECT post_id FROM $wpdb->postmeta WHERE `meta_key` = '_stock_status' AND `meta_value` IN ( 'instock', 'onbackorder', 'outofstock' )" );

			// Gets all type of product id stock status from postmeta.
			$all_product_ids = $wpdb->get_col( "SELECT post_id FROM $wpdb->postmeta WHERE `meta_key` = '_stock_status' AND `meta_value` IN ( 'instock', 'onbackorder', 'outofstock', 'discontinued' )" );

			// All product id of variable & grouped from postmeta of stock status yes or no.
			$product_id_gv_products = $wpdb->get_col( "SELECT post_id FROM $wpdb->postmeta WHERE `meta_key` = '_discontinued_product' AND `meta_value` IN ( 'yes', 'no' )" );

			$args = array(
				'post_type'      => 'product',     // WooCommerce product post type.
				'post_status'    => 'any',         // Any post status.
				'posts_per_page' => -1,            // Retrieve all products.
			);

			$products = get_posts( $args );

			foreach ( $products as $product ) {
				$product_id = $product->ID;

				// To get Product Id of all products which are not published.
				if ( 'publish' !== get_post_status( $product_id ) ) {
					array_push( $valid_instock_prod_id, $product_id );
				}
			}

			// checks from product lookup table.
			foreach ( $product_id_lookup_instock as $pid ) {
				$product = wc_get_product( $pid ); // gets product.

				if ( gettype( $product ) === 'object' ) {

					// only work if variable type is variable or grouped.
					if ( $product->get_type() === 'variable' || $product->get_type() === 'grouped' ) {

						$manage_stock = get_post_meta( $pid, '_manage_stock', true );
						if ( 'yes' === $manage_stock ) {
							$stock_quantity = get_post_meta( $pid, '_stock', true );
							$disc_parent    = get_post_meta( $pid, '_stock_discontinued_product', true );
							if ( ( 'yes' === $disc_parent ) && ( '0' === $stock_quantity ) ) {
								$parent_discont = 'yes';
							} else {
								$parent_discont = 'no';
							}
						} else {
							$parent_discont = 'no';
						}

						if ( metadata_exists( 'post', $pid, '_discontinued_product' ) ) {

							// checks the product ids from variable and group stock status.
							if ( in_array( $pid, $product_id_gv_products, true ) ) {

								// stores instock product id.
								if ( ( 'no' === get_post_meta( $pid, '_discontinued_product', true ) ) && ( 'no' === $parent_discont ) ) {
									array_push( $valid_instock_prod_id, $pid );
								} else {
									array_push( $var_discontinued_prod, $pid );
								}
							}
						} else {
							// Case for Non-discontinued Variable/Grouped product.
							array_push( $valid_instock_prod_id, $pid );
						}
					} else {

						// store instock product id excluding for variable and grouped product.
						if ( in_array( $pid, $product_id_excude_discontinued, true ) ) {
							array_push( $valid_instock_prod_id, $pid );
						}
					}
				}
			}

			if ( isset( $_GET['stock_status'] ) ) {

				// only run for discontinued is serched in filter.
				if ( 'discontinued' === $_GET['stock_status'] ) {
					$query->set( 'post__not_in', $valid_instock_prod_id ); // exclude all product id except discontinued.
					unset( $_GET['stock_status'] ); // unset the stock status.
				} elseif ( 'instock' === $_GET['stock_status'] ) {
					$query->set( 'post__not_in', $var_discontinued_prod ); // exclude all discontinued id.
				} elseif ( 'outofstock' === $_GET['stock_status'] ) {
					$query->set( 'post__not_in', $var_discontinued_prod );
				} else {
					$query->set( 'post__in', $all_product_ids ); // include all product id.
				}
			}
		}
	}
}


add_action( 'woocommerce_product_options_stock_fields', 'dpssw_woocommerce_product_options_inventory_data' );

/**
 * Function for `woocommerce_product_options_inventory_product_data` action-hook.
 */
function dpssw_woocommerce_product_options_inventory_data() {
	woocommerce_wp_checkbox(
		array(
			'id'          => '_stock_discontinued_product',
			'label'       => __( 'Mark this entire product as \'Discontinued\' once it\'s stock becomes zero', 'discontinued-products-stock-status' ),
			'desc_tip'    => true,
			'description' => __( "Check this box if you want to set the stock status of this product to 'Discontinued' after stock quantity becomes zero.", 'discontinued-products-stock-status' ),
			'value'       => get_post_meta( get_the_id(), '_stock_discontinued_product', true ),
		)
	);
}


add_action( 'save_post_product', 'dpssw_product_save', 10, 2 );

/**
 * Save option for discontinued inventory zero status.
 *
 * @param int    $post_id .
 * @param object $post .
 */
function dpssw_product_save( $post_id, $post ) {
	if ( ! empty( $_POST['_stock_discontinued_product'] ) ) {
		update_post_meta( $post_id, '_stock_discontinued_product', 'yes' );
	} else {
		update_post_meta( $post_id, '_stock_discontinued_product', '' );
	}
}


add_action( 'woocommerce_variation_options_inventory', 'dpssw_woocommerce_product_options_variation', 10, 3 );

/**
 * Save option for discontinued inventory zero status for varaiable product.
 *
 * @param object $loop .
 * @param object $variation_data .
 * @param object $variation .
 */
function dpssw_woocommerce_product_options_variation( $loop, $variation_data, $variation ) {
	woocommerce_wp_checkbox(
		array(
			'id'            => '_stock_discontinued_product[' . $loop . ']',
			'label'         => __( 'Mark this variation as \'Discontinued\' once it\'s stock becomes zero.', 'discontinued-products-stock-status' ),
			'desc_tip'      => true,
			'description'   => __( "Check this box if you want to set the stock status of this product to 'Discontinued' after stock quantity becomes zero.", 'discontinued-products-stock-status' ),
			'value'         => get_post_meta( $variation->ID, '_stock_discontinued_product', true ),
			'wrapper_class' => 'dpssw_discon',
		)
	);
}


add_action( 'woocommerce_save_product_variation', 'dpssw_product_save_variation', 10, 2 );

/**
 * Saves varaiation data.
 *
 * @param int $variation_id .
 * @param int $i .
 */
function dpssw_product_save_variation( $variation_id, $i ) {
	if ( isset( $_POST['_stock_discontinued_product'][ $i ] ) || isset( $_POST['_stock_discontinued_product'][ $i ] ) ) {
		$variable_discontinued_option = sanitize_text_field( wp_unslash( $_POST['_stock_discontinued_product'][ $i ] ) );
	}

	// Get the product variation object
	$variation = wc_get_product( $variation_id );

	// saves variation product option data.
	if ( isset( $variable_discontinued_option ) ) {
		update_post_meta( $variation_id, '_stock_discontinued_product', 'yes' );
		$stock_quantity = $variation->get_stock_quantity();

		if ( $stock_quantity == 0 ) {
			update_post_meta( $variation_id, '_stock_status', 'discontinued' );
		}
	} else {
		update_post_meta( $variation_id, '_stock_discontinued_product', '' );

		if ( $variation && $variation->is_type( 'variation' ) ) {
			// Get stock status.
			$stock_status = $variation->get_stock_status(); // 'instock', 'outofstock', 'onbackorder'
			update_post_meta( $variation_id, '_stock_status', $stock_status );
		} else {
			update_post_meta( $variation_id, '_stock_status', '' );

		}
	}
}

add_action( 'woocommerce_product_bulk_edit_save', 'dpssw_custom_bulk_edit_save_action', 10, 1 );
/**
 * When bulk edit is done it updates the show_specific_messsage metadata for discontinued product.
 *
 * @param object $product
 * @return void
 */
function dpssw_custom_bulk_edit_save_action( $product ) {
	if ( empty( $product ) ) {
		return '';
	}
	$product_id = $product->get_id();
	$product    = wc_get_product( $product_id );
	if ( 'discontinued' === $product->get_stock_status() ) {
		$temp = get_post_meta( $product_id, 'show_specific_messsage', true );
		if ( $temp === '' || $temp === null ) {
			update_post_meta( $product_id, 'show_specific_messsage', sanitize_text_field( 'global_text_message' ) );
		}
	}
}

/**
 * This function will set all the WooCommerce products in the  'Discontinued' stock status  to 'Out of Stock' stock status on deactivation of this plugin.
 */
function dpssw_restore_to_outofstock_on_plugin_deactivate() {
	global $wpdb;

	$reset_to_outofstock = get_option( 'discontinued_restore_to_outofstock' );
	if ( 'yes' === $reset_to_outofstock ) {
		if ( function_exists( 'wc_get_product' ) ) {
			$discontinued_products_ids = $wpdb->get_col( $wpdb->prepare( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key='%s' AND meta_value='%s'", '_stock_status', 'discontinued' ) );
			if ( ! empty( $discontinued_products_ids ) ) {
				foreach ( $discontinued_products_ids as $product_id ) {
					// Get an instance of the WC_Product object.
					$product = wc_get_product( $product_id );

					// Get product stock quantity and stock status.
					$stock_quantity = $product->get_stock_quantity();
					$stock_status   = $product->get_stock_status();

					// Set product stock quantity (zero) and stock status (out of stock).
					$product->set_stock_quantity( 0 );
					$product->set_stock_status( 'outofstock' );

					// Save the data and refresh caches.
					$product->save();
				}
			}
		}
	}
}
