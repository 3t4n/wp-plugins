<?php
if ( !defined( 'ABSPATH' ) ) {
	die() || exit();
}

global $awsa_settings_page_args;
extract( $awsa_settings_page_args );

// wp_die($this->atts['title']);
$template_name = 'admin-settings-page.php';
$id            = !empty( $settings_box['form_id'] ) ? $settings_box['form_id'] : $this->page_slug;
?>

<?php
// scripts
do_action( 'awsa_settings_page_enqueue', $id );
?>
<?php do_action( 'awsa_before_settings_page', $active_tab ); ?>
	<style>
		.display-block {
			display: block;
		}
	</style>
	<div class="wrap">
		<h3><?php echo $this->atts['title']; ?></h3>

		<div class="aw-settings  aw-settings-<?php echo $id; ?> <?php echo implode( ' ', (array) $settings_box['classes'] ); ?>"
			 data-type="<?php echo $settings_page_type; ?>">

			<div class="aw-settings-topmenu <?php echo implode( ' ', (array) $topmenu['classes'] ); ?>">
				<h3><?php do_action( 'awsa_settings_topmenu', $id, $topmenu ); ?></h3>
			</div>

			<?php do_action( 'awsa_settings_form_before', $id ); ?>

			<form action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>" method="post">
				<?php do_action( 'awsa_settings_form_start', $id ); ?>

				<input type="hidden" name="aw-page_slug" value="<?php echo $this->page_slug; ?>"/>
				<input type="hidden" name="aw-tab" value="<?php echo $active_tab; ?>"/>

				<input type="hidden" name="action" value="awsa_settings_page"/>
				<input type="hidden" id="awsa-settings-action" name="awsa-settings[action]" value="awsa-settings"/>
				<input type="hidden" id="awsa-settings-paged" name="awsa-settings[paged]" value="1"/>
				<input type="hidden" id="awsa-settings-form-id" name="awsa-settings[form_id]"
					   value="<?php echo $id; ?>"/>
				<?php wp_nonce_field( 'awsa_settings_form_id' . date( 'd' ) . $id, '_awsa_from_nonce' ); ?>

				<div class="aw-settings-content <?php echo join( ' ', (array) $content['classes'] ); ?>">
					<?php

					do_action( 'awsa_display_page_settings' );

					do_action( 'awsa_display_page_settings-' . $id, $active_tab );

					do_action( 'awsa_display_page_settings-' . $id . '_' . $active_tab );

					wp_nonce_field( 'awsa_' . $id . '_nf_' . $active_tab . date( 'd' ), '_awsa_settings_page_nonce' );
					?>
				</div>

				<p class="submit">
					<button id="awsa-save-settings-<?php echo $id; ?>" name="awsa-save-settings"
							class="button button-primary">
						<?php _e( 'ذخیره', 'awsa-shipping' ); ?>
					</button>
				</p>

				<?php do_action( 'awsa_settings_form_end', $id ); ?>
			</form>

			<?php do_action( 'awsa_settings_form_after', $id ); ?>

		</div>
	</div>

<?php do_action( 'awsa_after_settings_page', $active_tab ); ?>