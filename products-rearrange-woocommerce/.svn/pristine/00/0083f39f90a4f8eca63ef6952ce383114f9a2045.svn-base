<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://haywoodtech.it
 * @since      1.0.0
 *
 * @package    Wcpr
 * @subpackage Wcpr/admin/partials
 */

?>
<div class="wcpr_products_container">
	<h1><?php esc_html_e( 'Product Rearrange Settings', 'wcpr' ); ?></h1>
	<div id="wcpr_products_settings" 
		data_url="<?php echo esc_url( site_url() ); ?>" 
		data_restURL="<?php echo esc_url( get_rest_url() ); ?>"
		data_settingsURL="<?php echo esc_url( admin_url( 'admin.php?page=wcpr-reorder-settings' ) ); ?>"
	>
	</div>
	<div class="wcpr_documentation">        
		<div class="wcpr_navigate">
			<h3>Navigate to Woocommerce => Settings => Advanced => REST API.</h3>
			<h4>Create API with the description, assign User and make sure you select Read/Write on permissions.</h4>
			<img src="<?php echo esc_url( WCPR_ADMIN_IMGS . 'wcpr_reorder.png' ); ?>" />
		</div>
		<div class="wcpr_navigate">
			<h3>Copy the Consumer key and Consumer Secret.</h3>
			<h4>Paste the both keys on the respective fields in the current settings page.</h4>
			<img src="<?php echo esc_url( WCPR_ADMIN_IMGS . 'wcpr_api.png' ); ?>" />
		</div>
		<div class="wcpr_navigate">
			<h3>IMPORTANT! WordPress permalinks must be set to something that is easily human readable at: Settings => Permalinks.</h3>
			<h4>Day and name is a great default, but anything aside from Plain should work.</h4>
			<img src="<?php echo esc_url( WCPR_ADMIN_IMGS . 'wcpr_permalinks.png' ); ?>" />
		</div>
	</div>
</div>
