<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<style>
	.aw-field-description {
		font-size: 12px;
		color: grey;
	}

	.aw-checkbox-block {
		display: block;
	}

	.d-block{
		display:block;
	}
</style>

<div class="wrap">
	<h3><?php echo get_admin_page_title(); ?></h3>
	<form action="<?php echo admin_url( 'admin-post.php' ); ?>" method="post">
		<input type="hidden" name="action" value="awsa_quick_buy_settings" />
		<table class="form-table">
			<?php
				$a = new AWSA_Quick_Buy_Settings_Page_Fields();
				$a->render_fields();
			?>
		</table>
		<?php wp_nonce_field(); ?>
		<?php submit_button( __( 'Save', 'awsa-quick-buy' ), 'primary', 'awsa-save-quick-buy-settings' ); ?>
	</form>
</div>
