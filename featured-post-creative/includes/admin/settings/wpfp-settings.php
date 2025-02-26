<?php
/**
 * Settings Page
 *
 * @package WP Featured Post
 * @since 1.0.0
 */

if( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<div class="wrap wpfp-settings">

<h2><?php esc_html_e( 'Featured Post - Settings', 'featured-post-creative' ); ?></h2><br />

<style>
.wpfp-settings .postbox-header .handle-actions{order: 1;}
.wpfp-settings .CodeMirror{border: 1px solid #e5e5e5; height:400px;}
.wpfp-code-editor{height:400px;}
</style>

<?php
// Success message
if( isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true' ) {
	echo '<div id="message" class="updated notice notice-success is-dismissible">
			<p><strong>'.esc_html__( "Your changes saved successfully.", "featured-post-creative" ).'</strong></p>
		  </div>';
}
?>

<form action="options.php" method="POST" id="wpfp-settings-form" class="wpfp-settings-form">

	<?php settings_fields( 'wpfp_plugin_options' ); ?>

	<!-- Custom CSS Settings Starts -->
	<div id="wpfp-custom-css-sett" class="post-box-container wpfp-custom-css-sett">
		<div class="metabox-holder">
			<div class="meta-box-sortables">
				<div id="custom-css" class="postbox">
					<div class="postbox-header">
						<h2 class="hndle">
							<span><?php esc_html_e( 'Custom CSS Settings', 'featured-post-creative' ); ?></span>
						</h2>
					</div>
					<div class="inside">
						<table class="form-table wpfp-custom-css-sett-tbl">
							<tbody>
								<tr>
									<th scope="row">
										<label for="wpfp-custom-css"><?php esc_html_e( 'Custom CSS', 'featured-post-creative' ); ?></label>
									</th>
									<td>
										<textarea name="wpfp_options[custom_css]" class="large-text wpfp-code-editor wpfp-custom-css" id="wpfp-custom-css" data-mode="css"><?php echo esc_textarea( wpfp_get_option( 'custom_css' ) ); ?></textarea>
										<span class="description"><?php esc_html_e( 'Enter custom CSS to override plugin CSS.', 'featured-post-creative' ); ?></span>
									</td>
								</tr>
								<tr>
									<td colspan="2" valign="top" scope="row">
										<input type="submit" id="wpfp-settings-submit" name="wpfp-settings-submit" class="button button-primary right" value="<?php esc_attr_e( 'Save Changes','featured-post-creative' ); ?>" />
									</td>
								</tr>
							</tbody>
						 </table>
					</div><!-- .inside -->
				</div><!-- #custom-css -->
			</div><!-- .meta-box-sortables -->
		</div><!-- .metabox-holder -->
	</div><!-- #wpfp-custom-css-sett -->
	<!-- Custom CSS Settings Ends -->

</form><!-- end .wpfp-settings-form -->

</div><!-- end .wpfp-settings -->