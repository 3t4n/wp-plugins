<?php

/**
 * Base template for dashboard.
 *
 * @package StockSyncWithGoogleSheetForWooCommerce
 * @since   1.0.0
 */

// Exit if accessed directly.
defined('ABSPATH') || exit();
?>
<div x-data="dashboard" >
	<?php
	if ( ! ssgsw()->is_ultimate_activated() && ( true !== wp_validate_boolean(get_transient('ssgsw_hide_upgrade_notice')) ) && true !== wp_validate_boolean(ssgsw_get_option('hide_upgrade_notice')) ) :
		$screen = get_current_screen();
		if ( 'toplevel_page_ssgsw-admin' !== $screen->id ) {
			return;
		}
		?>
	<div class="ssgsw-upgrade-notice">
		<div class="ssgsw-upgrade-notice-content">
			<?php echo wp_sprintf('Get <strong>unlimited syncs</strong> and <strong>premium features</strong> in the ULTIMATE version.'); ?>
		</div>
		<div class="ssgsw-upgrade-notice-buttons">
			<a href="https://go.wppool.dev/mr9n" target="_blank"><?php esc_html_e('Upgrade to ULTIMATE', 'stock-sync-with-google-sheet-for-woocommerce'); ?></a>
			<a href="#" @click.prevent="hideUpgradeNotice"><?php esc_html_e('Hide', 'stock-sync-with-google-sheet-for-woocommerce'); ?></a>
		</div>
	</div>
		<?php
	endif;
	?>
	<?php
	$active_new_user  = get_option('ssgsw_new_user_activated_key5', '0' );
	$already_update   = get_option('ssgsw_already_updated_key5', '0' );
	$new_trigger_notice = false;
	if ( '1' != $active_new_user && '1' != $already_update ) { //phpcs:ignore
		?>
	<style>
		.osgsw-wrapper .ssgs-dashboard__header {
			display: flex;
			align-items: center;
			justify-content: space-between;
			line-height: 40px;
			padding-top: 20px;
		}
		.ssgsw_notice_container2 {
			display: inline-block;
			position: relative;
			top: -23px;
			right: -46px;
		}
		p.ossgw_setup_now_button {
			position: absolute;
			top: -56px;
			right: -61px;
		}
	</style>
		<div class="ssgsw_appscript_trigger ssgsw_appscript_notice233 ssgsw_appscript_notice_wrap">
			<div class="ssgsw_notice_container">
				<p> <?php esc_html_e('Hey! 👋 We’ve updated our Apps Script Please','stock-sync-with-google-sheet-for-woocommerce'); ?> <strong class="ssgsw_extra_strong"> <?php esc_html_e('update your Apps Script','stock-sync-with-google-sheet-for-woocommerce'); ?> </strong> <?php esc_html_e('on Google sheets ','stock-sync-with-google-sheet-for-woocommerce'); ?> <?php esc_html_e('to enjoy all the new changes.','stock-sync-with-google-sheet-for-woocommerce'); ?>  <span class="ssgsw_remove_text_dec osgsw_remove_text_dec23"><?php esc_html_e('Setup Now →','stock-sync-with-google-sheet-for-woocommerce'); ?></span></p>
					
			</div>
			<div class="ssgsw_notice_container2">
				<span class="dashicons dashicons-dismiss osgsw_notice_off" x-on:click="show_notice_popup_setup = true"></span>
			</div>	
		</div>
		<?php
	}
	?>
	<div id="popup1" class="ssgs_popup-container" x-show="show_notice_popup_setup" style="display: none">
		<div class="ssgs_popup-content" @click.away="show_notice_popup_setup = false">
			<div class="profile-section">
				<div class="profile-details">
					<h3 class="ossgw_profile-title2"><?php esc_html_e('Are you sure to close?','stock-sync-with-google-sheet-for-woocommerce'); ?></h3>
					<p class="ossgw_extra_class2"><?php esc_html_e('Please make sure that you have updated the Apps Script. Otherwise the plugin functionality may not work properly.','stock-sync-with-google-sheet-for-woocommerce'); ?></p>
				</div>
			</div>
			<div class="ssgs_first_section">
				<div class="osgs_button_section">
					
					<button type="button" class="osgsw_save_changes231 button" x-on:click="show_notice_popup_setup = false"><?php esc_html_e(' Later','stock-sync-with-google-sheet-for-woocommerce'); ?></button>
					<button type="button" class="ssgsw_dismiss_notice button" style="background-color:#005ae0; color:#fff"><?php esc_html_e('Confirm & close','stock-sync-with-google-sheet-for-woocommerce'); ?></button>
				</div>
			</div>
		</div>
	</div>
	<section class="ssgsw-wrapper">
		
		<?php ssgsw()->load_template('dashboard/header'); ?>

		<?php ssgsw()->load_template('dashboard/overview'); ?>

		<?php ssgsw()->load_template('dashboard/settings'); ?>

		<?php
		if ( ssgsw()->is_ultimate_activated() && ssgsw()->is_license_valid() ) {
			ssgsw()->load_template('dashboard/support');
		}
		?>
	</section>
</div>
