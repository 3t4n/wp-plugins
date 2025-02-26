<?php

/**
 * Settings html file
 */

if( !defined( 'ABSPATH' ) ) {
	exit;
}

if( $tab == 'settings' && $_GET['saved'] == 1 ) { ?>
	<?php LDASH_Notices::notice( 'success', true, '', __( 'Settings saved.', 'lightning-dashboard' ), '', true, true ); ?>
<?php }
// Field order below is replicated in activation and settings classes, any changes here should be reflected there ?>
<div id="ldash-settings" class="<?php echo $option; ?>">
	<form method="post" class="ldash-form">
		<?php if( $option == 'general' ) { ?>
			<h2><?php _e( 'General Settings', 'lightning-dashboard' ); ?></h2>
			<h3><?php _e( 'Menu', 'lightning-dashboard' ); ?></h3>
			<div class="ldash-form-element">
				<label for="ldash-form-element-general-menu-name"><?php _e( 'Name', 'lightning-dashboard' ); ?></label><?php LDASH_Markup::field_input( 'text', 'ldash-form-element-general-menu-name', '', '', get_option( 'ldash_general_menu_name' ), true ); ?>
			</div>
			<div class="ldash-form-element">
				<label for="ldash-form-element-general-menu-icon"><?php _e( 'Icon', 'lightning-dashboard' ); ?></label><?php LDASH_Markup::field_input( 'text', 'ldash-form-element-general-menu-icon', '', '', get_option( 'ldash_general_menu_icon' ), false ); ?>
				<small><?php echo sprintf( __( 'Allows you to change the menu icon to any dashicon included with WordPress. Get the dashicon class name from <a href="%s" target="_blank">here</a>, upon selecting your icon you will see it\'s class name is shown at the top of the page (e.g. dashicons-performance). Enter this class name above. If you enter an invalid dashicon then no icon being displayed. To restore the default icon leave field empty.', 'lightning-dashboard' ), esc_url( 'https://developer.wordpress.org/resource/dashicons/' ) ); ?></small>
			</div>
			<div class="ldash-form-element">
				<label for="ldash-form-element-general-menu-position"><?php _e( 'Position', 'lightning-dashboard' ); ?></label><?php LDASH_Markup::field_input( 'number', 'ldash-form-element-general-menu-position', '', '', get_option( 'ldash_general_menu_position' ), true ); ?>
				<small><?php echo sprintf( __( 'Menu items are ordered using a number, lower numbers appear first on the list, see <a href="%s">here</a> to determine the number you require. If you have other plugins then their menu items will also be added around the default WordPress menu items using this numbering system.', 'lightning-dashboard' ), esc_url( 'https://developer.wordpress.org/reference/functions/add_menu_page/#menu-structure' ) ); ?></small>
			</div>
			<h3><?php _e( 'Date & Time', 'lightning-dashboard' ); ?></h3>
			<div class="ldash-form-element">
				<label for="ldash-form-element-general-date-time-date-format"><?php _e( 'Date Format', 'lightning-dashboard' ); ?></label><?php LDASH_Markup::field_input( 'text', 'ldash-form-element-general-date-time-date-format', '', '', get_option( 'ldash_general_date_time_date_format' ), false ); ?>
				<small><?php echo sprintf( __( 'Enter in <a href="%s">this format</a>. Leave blank to use the same setting from WordPress configuration.', 'lightning-dashboard' ), esc_url( 'https://codex.wordpress.org/Formatting_Date_and_Time' ) ); ?></small>
			</div>
			<div class="ldash-form-element">
				<label for="ldash-form-element-general-date-time-time-format"><?php _e( 'Time Format', 'lightning-dashboard' ); ?></label><?php LDASH_Markup::field_input( 'text', 'ldash-form-element-general-date-time-time-format', '', '', get_option( 'ldash_general_date_time_time_format' ), false ); ?>
				<small><?php echo sprintf( __( 'Enter in <a href="%s">this format</a>. Leave blank to use the same setting from WordPress configuration.', 'lightning-dashboard' ), esc_url( 'https://codex.wordpress.org/Formatting_Date_and_Time' ) ); ?></small>
			</div>
			<h3><?php _e( 'Appearance', 'lightning-dashboard' ); ?></h3>
			<div class="ldash-form-element">
				<label for="ldash-form-element-general-appearance-rows-per-page"><?php _e( 'Rows Per Page', 'lightning-dashboard' ); ?></label><?php LDASH_Markup::field_input( 'number', 'ldash-form-element-general-appearance-rows-per-page', '', '', get_option( 'ldash_general_appearance_rows_per_page' ), true ); ?>
				<small><?php _e('You must reset your save state session (if enabled) after changing this setting to view the change.', 'lightning-dashboard' ); ?></small>
			</div>
			<div class="ldash-form-element">
				<label for="ldash-form-element-general-appearance-lightbox-height"><?php _e( 'Lightbox Height', 'lightning-dashboard' ); ?></label><?php LDASH_Markup::field_input( 'number', 'ldash-form-element-general-appearance-lightbox-height', '', '', get_option( 'ldash_general_appearance_lightbox_height' ), true ); ?>
				<small><?php _e('Enter value in pixels, recommended height is 400.', 'lightning-dashboard' ); ?></small>
			</div>
			<div class="ldash-form-element">
				<label for="ldash-form-element-general-appearance-custom-logo"><?php _e( 'Custom Logo', 'lightning-dashboard' ); ?></label><?php LDASH_Markup::field_image( 'ldash-form-element-general-appearance-custom-logo', 'ldash_general_appearance_custom_logo' ); ?>
				<small><?php _e( 'Use this option to add a custom logo to the dashboard, logo will display at 22 pixels height. Remove to use the default logo.', 'lightning-dashboard' ); ?></small>
			</div>
			<div class="ldash-form-element">
				<label for="ldash-form-element-general-appearance-display-logo" class="checkbox-label"><?php _e( 'Display Logo', 'lightning-dashboard' ); ?></label><?php LDASH_Markup::field_input( 'checkbox', 'ldash-form-element-general-appearance-display-logo', '', '', get_option( 'ldash_general_appearance_display_logo' ), false ); ?>
				<small><?php _e('Display or hide the logo shown on the dashboard.', 'lightning-dashboard' ); ?></small>
			</div>
			<div class="ldash-form-element">
				<label for="ldash-form-element-general-appearance-custom-stylesheet" class="checkbox-label"><?php _e( 'Custom Stylesheet', 'lightning-dashboard' ); ?></label><?php LDASH_Markup::field_input( 'checkbox', 'ldash-form-element-general-appearance-custom-stylesheet', '', '', get_option( 'ldash_general_appearance_custom_stylesheet' ), false ); ?>
					<small><?php _e( 'Override styles within the dashboard by enabing and create a stylesheet at /wp-content/themes/theme-name/lightning-dashboard/custom.css.', 'lightning-dashboard' ); ?></small>
			</div>
			<h3><?php _e( 'Notices', 'lightning-dashboard' ); ?></h3>
			<div class="ldash-form-element">
				<label for="ldash-form-element-general-notices-global-notice"><?php _e( 'Global Notice', 'lightning-dashboard' ); ?></label><?php LDASH_Markup::field_input( 'text', 'ldash-form-element-general-notices-global-notice', '', '', get_option( 'ldash_general_notices_global_notice' ), false ); ?>
				<small><?php echo sprintf( __( 'If populated shows a notice at the top of every %s page to give information to dashboard users. The notice is combined with any tab specific global notices.', 'lightning-dashboard' ), LDASH_NAME ); ?></small>
			</div>
			<h3><?php _e( 'Misc', 'lightning-dashboard' ); ?></h3>
			<div class="ldash-form-element">
				<label for="ldash-form-element-general-misc-external-tabs" class="checkbox-label"><?php _e( 'External Tabs', 'lightning-dashboard' ); ?></label><?php LDASH_Markup::field_input( 'checkbox', 'ldash-form-element-general-misc-external-tabs', '', '', get_option( 'ldash_general_misc_external_tabs' ), false ); ?>
				<small><?php echo sprintf( __( 'Tabs which link to pages on the %s website.', 'lightning-dashboard' ), LDASH_NAME ); ?></small>
			</div>
			<div class="ldash-form-element">
				<label for="ldash-form-element-general-misc-woocommerce-tab" class="checkbox-label"><?php _e( 'WooCommerce Tab', 'lightning-dashboard' ); ?></label><?php LDASH_Markup::field_input( 'checkbox', 'ldash-form-element-general-misc-woocommerce-tab', '', '', get_option( 'ldash_general_misc_woocommerce_tab' ), false ); ?>
				<small><?php echo sprintf( __( 'Tab allowing quick access to areas of WooCommerce which %s does not control. If you choose to disable this setting you can still access these sections through WooCommerce as normal.', 'lightning-dashboard' ), LDASH_NAME ); ?></small>
			</div>
			<div class="ldash-form-element">
				<label for="ldash-form-element-general-misc-login-redirect" class="checkbox-label"><?php _e( 'Login Redirect', 'lightning-dashboard' ); ?></label><?php LDASH_Markup::field_input( 'checkbox', 'ldash-form-element-general-misc-login-redirect', '', '', get_option( 'ldash_general_misc_login_redirect' ), false ); ?>
				<small><?php echo sprintf( __( 'Redirects you to %s when you login to WordPress. Note that if there are other plugins used which also attempt to redirect your login this may not work. If it doesn\'t redirect you on login then check your other plugins and disable the option there.', 'lightning-dashboard' ), LDASH_NAME ); ?></small>
			</div>
			<div class="ldash-form-element">
				<label for="ldash-form-element-general-misc-save-state" class="checkbox-label"><?php _e( 'Save State', 'lightning-dashboard' ); ?></label><?php LDASH_Markup::field_input( 'checkbox', 'ldash-form-element-general-misc-save-state', '', '', get_option( 'ldash_general_misc_save_state' ), false ); ?>
				<small><?php _e('Allows current pagination, filtering, search, etc to be stored when navigating away from a page and reloaded on return.', 'lightning-dashboard' ); ?></small>
			</div>
		<?php } elseif( $option == 'orders' ) { ?>
			<h2><?php _e( 'Orders Settings', 'lightning-dashboard' ); ?></h2>
			<h3><?php _e( 'Notices', 'lightning-dashboard' ); ?></h3>
			<div class="ldash-form-element">
				<label for="ldash-form-element-orders-notices-notice"><?php _e( 'Notice', 'lightning-dashboard' ); ?></label><?php LDASH_Markup::field_input( 'text', 'ldash-form-element-orders-notices-notice', '', '', get_option( 'ldash_orders_notices_notice' ), false ); ?>
				<small><?php _e('Adds a notice to the orders page alongside any global notice set. Useful if you want to provide details to dashboard users on the orders page.', 'lightning-dashboard' ); ?></small>
			</div>
			<h3><?php _e( 'Options', 'lightning-dashboard' ); ?></h3>
			<div class="ldash-form-element">
				<label for="ldash-form-element-orders-options-default-option"><?php _e( 'Default Option', 'lightning-dashboard' ); ?></label>
				<?php LDASH_Markup::field_select( 'ldash-form-element-orders-options-default-option', 'settings_orders_default_option', false, false, false, false, array( get_option( 'ldash_orders_options_default_option' ) ) ); ?>
				<small><?php _e('The option which will be selected when you access a tab or upon login (if you have login redirect enabled). Note that if you have save state enabled then the last option you visited will be used instead of this setting for your current session.', 'lightning-dashboard' ); ?></small>
			</div>
			<h3><?php _e( 'Rows', 'lightning-dashboard' ); ?></h3>
			<?php
			$order_statuses = LDASH_Orders::statuses( true );
			if( !empty( $order_statuses ) ) {
				foreach( $order_statuses as $order_status_id => $order_status_label ) {
					// Does not use field input function as sends an array, str_replace used for the order status id because a custom order status could be used which want to save as an underscore not hyphen as per default row highlight format ?>
					<div class="ldash-form-element ldash-form-element-wider">
						<label for="ldash-form-element-orders-rows-row-highlight-color-<?php echo $order_status_id; ?>"><?php echo __( 'Row Highlight Color', 'lightning-dashboard' ) . ': ' . $order_status_label; ?></label>
							<input type="text" id="ldash-form-element-orders-rows-row-highlight-color-<?php echo $order_status_id; ?>" name="ldash_form_element_orders_rows_row_highlight_color[<?php echo str_replace( '-', '_', $order_status_id ); ?>]" class="ldash-form-element-orders-rows-row-highlight-color colorpicker" value="<?php echo get_option( 'ldash_orders_rows_row_highlight_color_' . str_replace( '-', '_', $order_status_id ) ); ?>">
					</div>
				<?php }
			} ?>
			<div class="ldash-form-element ldash-form-element-wider">
				<label for="ldash-form-element-orders-rows-reset-row-highlight-colors" class="checkbox-label"><?php _e( 'Reset Row Highlight Colors', 'lightning-dashboard' ); ?></label><?php LDASH_Markup::field_input( 'checkbox', 'ldash-form-element-orders-rows-reset-row-highlight-colors', '', '', '', false ); ?>
			</div>
		<?php } elseif( $option == 'products' ) { ?>
			<h2><?php _e( 'Products Settings', 'lightning-dashboard' ); ?></h2>
			<h3><?php _e( 'Notices', 'lightning-dashboard' ); ?></h3>
			<div class="ldash-form-element">
				<label for="ldash-form-element-products-notices-notice"><?php _e( 'Notice', 'lightning-dashboard' ); ?></label><?php LDASH_Markup::field_input( 'text', 'ldash-form-element-products-notices-notice', '', '', get_option( 'ldash_products_notices_notice' ), false ); ?>
				<small><?php _e('Adds a notice to the products page alongside any global notice set. Useful if you want to provide details to dashboard users on the products page.', 'lightning-dashboard' ); ?></small>
			</div>
			<h3><?php _e( 'Options', 'lightning-dashboard' ); ?></h3>
			<div class="ldash-form-element">
				<label for="ldash-form-element-products-options-default-option"><?php _e( 'Default Option', 'lightning-dashboard' ); ?></label>
				<?php LDASH_Markup::field_select( 'ldash-form-element-products-options-default-option', 'settings_products_default_option', false, false, false, false, array( get_option( 'ldash_products_options_default_option' ) ) ); ?>
				<small><?php _e('The option which will be selected when you access a tab or upon login (if you have login redirect enabled). Note that if you have save state enabled then the last option you visited will be used instead of this setting for your current session.', 'lightning-dashboard' ); ?></small>
			</div>
		<?php } elseif( $option == 'customers' ) { ?>
			<h2><?php _e( 'Customers Settings', 'lightning-dashboard' ); ?></h2>
			<h3><?php _e( 'Notices', 'lightning-dashboard' ); ?></h3>
			<div class="ldash-form-element">
				<label for="ldash-form-element-customers-notices-notice"><?php _e( 'Notice', 'lightning-dashboard' ); ?></label><?php LDASH_Markup::field_input( 'text', 'ldash-form-element-customers-notices-notice', '', '', get_option( 'ldash_customers_notices_notice' ), false ); ?>
				<small><?php _e('Adds a notice to the customers page alongside any global notice set. Useful if you want to provide details to dashboard users on the customers page.', 'lightning-dashboard' ); ?></small>
			</div>
			<h3><?php _e( 'Options', 'lightning-dashboard' ); ?></h3>
			<div class="ldash-form-element">
				<label for="ldash-form-element-customers-options-default-option"><?php _e( 'Default Option', 'lightning-dashboard' ); ?></label>
				<?php LDASH_Markup::field_select( 'ldash-form-element-customers-options-default-option', 'settings_customers_default_option', false, false, false, false, array( get_option( 'ldash_customers_options_default_option' ) ) ); ?>
				<small><?php _e('The option which will be selected when you access a tab or upon login (if you have login redirect enabled). Note that if you have save state enabled then the last option you visited will be used instead of this setting for your current session.', 'lightning-dashboard' ); ?></small>
			</div>
		<?php }
		if( !empty( ldash_add_ons() ) ) {
			foreach( ldash_add_ons() as $add_on_id => $add_on_name ) {
				if( $option == $add_on_id ) {
					echo '<h2>' . $add_on_name . ' ' . __( '(Add-On)', 'lightning-dashboard' ) . ' ' . __( 'Settings', 'lightning-dashboard' ) . '</h2>';
					do_action( 'ldash_add_on_settings_' . str_replace( '-', '_', $add_on_id ), $add_on_settings );
					break; // No need to continue
				}
			}
		} ?>
		<div class="ldash-form-element">
			<button id="ldash-save-settings" name="ldash_save_settings" value="1" type="submit" class="button button-primary"><?php _e( 'Save', 'lightning-dashboard' ); ?></button>
		</div>
	</form>
</div>