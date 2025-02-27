<?php if ( ! defined( 'WPINC' ) ) { die; } ?>
<?php $kses_allowed_html = dsdvo_wp_frontend::dsdvo_kses_allowed(); ?>

	<div class="wrap">
		<h2><?php echo wp_kses(__('Import/Export Settings', 'dsgvo-all-in-one-for-wp'), $kses_allowed_html); ?></h2>
		<div class="metabox-holder">
			<div class="postbox">
				<h3><span><?php echo wp_kses(__( 'Export Settings', 'dsgvo-all-in-one-for-wp' ), $kses_allowed_html); ?></span></h3>
				<div class="inside">
					<p><?php echo wp_kses(__( 'Here you can export the settings of DSGVO AIO Serves as backup and also if you want to use the same settings on another installation.', 'dsgvo-all-in-one-for-wp' ), $kses_allowed_html); ?></p>
					<form method="post">
						<p><input type="hidden" name="dsgvoaiofree_action" value="export_settings" /></p>
						<p>
							<?php wp_nonce_field( 'dsgvoaiofree_export_nonce', 'dsgvoaiofree_export_nonce' ); ?>
							<?php submit_button( __( 'Export', 'dsgvo-all-in-one-for-wp' ), 'secondary', 'submit', false ); ?>
						</p>
					</form>
				</div>
			</div>

			<div class="postbox">
				<h3><span><?php echo wp_kses(__( 'Import Settings', 'dsgvo-all-in-one-for-wp' ), $kses_allowed_html); ?></span></h3>
				<div class="inside">
					<p><?php echo wp_kses(__( 'Import the plugin settings from a .json file. You can generate such a file via "Export settings".', 'dsgvo-all-in-one-for-wp' ), $kses_allowed_html); ?></p>
					<form method="post" enctype="multipart/form-data" class="dsgvoaio_settings_export_form">
						<p>
							<input type="file" name="import_file"/>
						</p>
						<p>
							<input type="hidden" name="dsgvoaiofree_action" value="import_settings" />
							<?php wp_nonce_field( 'dsgvoaiofree_import_nonce', 'dsgvoaiofree_import_nonce' ); ?>
							<?php submit_button( __( 'Import', 'dsgvo-all-in-one-for-wp' ), 'secondary', 'submit', false ,array( 'data-class' => 'dsgvoaio_export_settings_btn' )); ?>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	jQuery( document ).ready(function() {
		jQuery(document).on('submit','form.dsgvoaio_settings_export_form',function(){
			if (confirm('<?php echo wp_kses(__( 'Are you sure you want to import the settings? This will overwrite all existing settings!', 'dsgvo-all-in-one-for-wp' ), $kses_allowed_html); ?>')) {
				
			} else {
				event.preventDefault(); 
			}
		});
	});
	</script>