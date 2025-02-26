<?php
/**
 * Upload form
 *
 * @package Axle_Demo_Importer
 */

$theme_zip_file = axle_demo_importer_get_demo_content_settings( 'zip_file' );
$theme_zip_file_remote = axle_demo_importer_get_demo_content_settings( 'zip_file_remote' );
$predefined_status = ( ! empty( $theme_zip_file ) || ! empty( $theme_zip_file_remote ) ) ? true : false;
?>

<?php if ( true === $predefined_status ) : ?>
	<p><strong><?php esc_html_e( 'Predefined demo zip file available for this theme.', 'axle-demo-importer' ); ?></strong></p>
<?php endif; ?>

<form action="<?php echo esc_url( admin_url( 'themes.php?page=axle-demo-importer' ) ); ?>" method="post" class="form-axle-demo-importer" enctype="multipart/form-data">
	<?php wp_nonce_field( 'axle_demo_importer_form_upload', 'axle_demo_importer_nonce_form_upload' ); ?>

	<?php if ( false === $predefined_status ) : ?>
		<p><strong><?php esc_html_e( 'Upload a zip file containing demo content.', 'axle-demo-importer' ); ?></strong></p>

		<p><input type="file" name="zip-file" id="zip-file" size="50" /></p>

		<p><?php printf( esc_html__( 'Maximum upload file size: %s.', 'axle-demo-importer' ), size_format( wp_max_upload_size() ) ); ?></p>
	<?php endif; ?>

	<?php if ( true === $predefined_status ) : ?>
		<input type="hidden" name="predefined" value="1" />
	<?php else : ?>
		<input type="hidden" name="predefined" value="0" />
	<?php endif; ?>

	<?php if ( true === $predefined_status ) : ?>
		<?php submit_button( esc_html__( 'Import Demo Content', 'axle-demo-importer' ) ); ?>
	<?php else : ?>
		<?php submit_button( esc_html__( 'Upload and Import', 'axle-demo-importer' ) ); ?>
	<?php endif; ?>
</form><!-- .form-axle-demo-importer -->
