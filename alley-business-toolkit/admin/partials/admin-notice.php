<?php
/**
 * Adding Admin Notice for recommended plugins
 */
if( ! function_exists( 'alley_business_toolkit_activation_notice' ) ) :
function alley_business_toolkit_activation_notice() {
	global $submenu;

				$main_menu = 'alley-toolkit';

				if (
				   isset( $submenu[ $main_menu ] )
				   && in_array( 'alley-toolkit-contact', wp_list_pluck( $submenu[ $main_menu ], 2 ) )
				) {
				    return;
				} else {
		global $pagenow;
	    // $theme_args      = wp_get_theme();
	    // $name            = $theme_args->__get( 'Name' );
	    $meta            = get_option( 'alley-business-toolkit-update-notice' );
	    $current_screen  = get_current_screen();

	    if ( is_admin() && !$meta ) {
	        
	        // if( $current_screen->id !== 'dashboard' && $current_screen->id !== 'themes' ) {
	        //     return;
	        // }

	        if ( is_network_admin() ) {
	            return;
	        }

	        if ( ! current_user_can( 'manage_options' ) ) {
	            return;
	        } ?>
	        <div class="notice notice-info is-dismissible content-install-plugin abt-notice-layout">
	            <div class="alley-icon">
	                <img src="<?php echo esc_url(ALLEY_BUSINESS_TOOLKIT_URL . 'admin/images/logo.png'); ?>" />
	            </div>
	             <div class="notice-content">
	                <h3><?php esc_html_e('You haven’t Activated the Alley Business Toolkit Account yet!','home-services');?></h3>
	                <!-- plugins list need to be install -->
	                 <p><?php echo __('<strong>Activate the Free version</strong> or <strong>Enter the Pro License Key</strong> for the plugin to work as intended.','alley-business-toolkit');?></p>

	                   
	                    <a href="<?php echo admin_url();?>/admin.php?page=alley-toolkit" class="abt-admin-button activate-button"><?php esc_html_e('Complete Activation Now','alley-business-toolkit');?></a>
	                   
	            
	                <a href="<?php echo esc_url(admin_url());?>/themes.php?alley-business-toolkit-update-notice=true" class="abt-admin-button dismiss-notice btn-abt-notice-dismiss"><?php echo __('No Thanks','alley-business-toolkit');?></a>

	           
	            </div>
	         </div>
	    <?php }
		}
	}
endif;
add_action( 'admin_notices', 'alley_business_toolkit_activation_notice' );


if( ! function_exists( 'alley_businesss_toolkit_ignore_admin_notice' ) ) :
/**
 * ignore notice if dismissed!
 */
function alley_businesss_toolkit_ignore_admin_notice() {

    if ( isset( $_GET['alley-business-toolkit-update-notice'] ) && $_GET['alley-business-toolkit-update-notice'] = 'true' ) {

        update_option( 'alley-business-toolkit-update-notice', true );
    }
}
endif;
add_action( 'admin_init', 'alley_businesss_toolkit_ignore_admin_notice' );