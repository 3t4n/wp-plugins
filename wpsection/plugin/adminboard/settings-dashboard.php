<?php
/**
 * Dashboard Settings
 */

$posted_data   = array_map('sanitize_text_field', $_POST );
$nonce       = wpsection()->get_settings_atts( 'wpsection_nonce', '', $posted_data );

if ( wp_verify_nonce( $nonce, 'wpsection_nonce_action' ) ) {

	$elements_active = wpsection()->get_settings_atts( 'wpsection_elements_active', array(), $posted_data );

	if ( is_array( $elements_active ) ) {
		update_option( 'wpsection_elements_active', $elements_active );
	}
}

?>

<form action="<?php menu_page_url( 'wpsection-settings' ); ?>" class="page-wrapper" method="post" enctype="multipart/form-data">

    <div class="element-page">
        <div class="wrapper-box">
            <div class="sidebar">
                <div class="logo">

					<img src="<?php echo esc_url( plugins_url( 'assets/admin/logo.png', dirname( __FILE__ ) ) ); ?>" alt="Plugin Logo">

                </div>
                <ul class="nav nav-tabs tab-btn-style-one" role="tablist">
                  
					<li class="nav-item">
                        <a class="nav-link active" id="tab-one-area" data-bs-toggle="tab" href="#tab-one" role="tab" aria-controls="tab-one" aria-selected="true">
                            <h4><span class="dashicons dashicons-screenoptions"></span> <?php esc_html_e('Dashboard', 'wpsection'); ?></h4>
                        </a>
                    </li>
            
                  
                    <li class="nav-item">
                        <a class="nav-link" id="tab-three-four" data-bs-toggle="tab" href="#tab-four" role="tab" aria-controls="tab-four" aria-selected="false">
                            <h4><span class="dashicons dashicons-welcome-learn-more"></span><?php esc_html_e('Free Vs Pro', 'wpsection'); ?></h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-three-five" data-bs-toggle="tab" href="#tab-five" role="tab" aria-controls="tab-five" aria-selected="false">
                            <h4><span class="dashicons dashicons-database-export"></span><?php esc_html_e('Donate', 'wpsection'); ?></h4>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="content-box">
                <div class="tab-content wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1200ms">
                    
					
					<!-- Area One Dashboard -->
                    <div class="tab-pane fadeInUp animated active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                       <?php  include_once(WPSECTION_PLUGIN_DIR . 'plugin/adminboard/dash.php'); ?>
                    </div>
                    <!-- Area Two for Template Library -->
                    <div class="tab-pane fadeInUp animated" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                        <?php  include_once(WPSECTION_PLUGIN_DIR . 'plugin/adminboard/widget.php'); ?>
                    </div>
                    <!-- Area Three for Template Settings -->
                                   <!-- Area Four Free Vs Pro -->
                    <div class="tab-pane fadeInUp animated" id="tab-four" role="tabpanel" aria-labelledby="tab-four">
                         <?php  include_once(WPSECTION_PLUGIN_DIR . 'plugin/adminboard/compare.php'); ?>
						 
                    </div>
					 <!-- Area Four for Donate -->
					 <div class="tab-pane fadeInUp animated" id="tab-five" role="tabpanel" aria-labelledby="tab-five">
                        <?php  include_once(WPSECTION_PLUGIN_DIR . 'plugin/adminboard/donate.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
<?php wp_nonce_field( 'wpsection_nonce_action', 'wpsection_nonce' ); ?>
</form>
