<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Include template files
include( plugin_dir_path( __FILE__ ) . 'general.php');
include( plugin_dir_path( __FILE__ ) . 'design.php');
include( plugin_dir_path( __FILE__ ) . 'single-sermon.php');
include( plugin_dir_path( __FILE__ ) . 'archive.php');
include( plugin_dir_path( __FILE__ ) . 'shortcodes.php');
include( plugin_dir_path( __FILE__ ) . 'misc.php');
include( plugin_dir_path( __FILE__ ) . 'language.php');
include( plugin_dir_path( __FILE__ ) . 'import-export.php');

// Pro Feature template files
// include( plugin_dir_path( __FILE__ ) . 'upgrade.php');


// Create settings general page template

function asp_settings() {
global $asp_active_tab;
global $asp_plugin_version;
global $asp_pro_plugin_version;
$asp_active_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'general'; ?>


		<div class="wrap asp-settings-wrapper">
				<div class="advanced-header">
						<img clas="asp-logo" style="padding-top: 4px;" src="<?php echo plugins_url( 'assets/Advanced-Sermon-Logo-Light.png', __FILE__ ); ?>" alt="Advanced Sermons" height="50" width="50" />
						<h1><span class="asp-developer">Version <?php echo $asp_plugin_version; ?><?php if (is_plugin_active('advanced-sermons-pro/advanced-sermons-pro.php') ) { ?> | Pro Version <?php echo $asp_pro_plugin_version ?><?php } ?></span></h1>
				</div>

				<div class="asp-page-navigation vertical left clearfix">

							<div class="asp-tabs-navigation-wrapper">
									<?php do_action( 'asp_settings_tab' ); ?>
							</div>

							<div class="asp-tab-content">
									<?php do_action( 'asp_settings_content' ); ?>
							</div>

							<script type="text/javascript">
				      jQuery(document).ready(function($){
				          $('#upload-btn').click(function(e) {
				              e.preventDefault();
				              var image = wp.media({
				                  title: 'Upload Image',
				                  // mutiple: true if you want to upload multiple files at once
				                  multiple: false
				              }).open()
				              .on('select', function(e){
				                  // This will return the selected image from the Media Uploader, the result is an object
				                  var uploaded_image = image.state().get('selection').first();
				                  // We convert uploaded_image to a JSON object to make accessing it easier
				                  // Output to the console uploaded_image
				                  console.log(uploaded_image);
				                  var image_url = uploaded_image.toJSON().url;
				                  // Let's assign the url value to the input field
				                  $('#image_url').val(image_url);
				              });
				          });
				      });
				      </script>

		</div>

		<!-- Footer -->
    <div class="asp-footer"><?php _e( 'Proudly developed by ' ) ?><a href="https://wpcodeus.com/" target="_blank"><?php _e( 'WP Codeus.' ) ?></a></div>

<?php }
