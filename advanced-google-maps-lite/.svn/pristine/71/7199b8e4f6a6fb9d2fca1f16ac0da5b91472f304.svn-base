<?php
defined( 'ABSPATH' ) or die();
require_once( WL_AGM_LITE_PLUGIN_DIR_PATH . 'admin/inc/helpers/WL_AGM_LITE_Helper.php' );
?>
<style>
.cip-upgrade-banner {
   
       box-shadow: 2px 5px 4px 0px rgb(0 0 0 / 12%), 0 1px 2px rgb(0 0 0 / 28%);
    transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
    padding: 25px 25px;
	    margin: 15px 0px 0px 0px;
	    background: #23282d;
}


</style>
<div class="container-fluid wl_agm_container">
    <!-- row 1 -->
    <div class="product_header wl-agm_plugin_top col-md-12">
        <div class="col-md-8 col-xs-6 product_header_desc">
            <div class="product_name wl-agm-title-plugin"><?php esc_html_e( 'IS-Google Maps Lite', WL_AGM_LITE_DOMAIN ) ?>
                <span class="fc-badge"><?php echo esc_html( WL_AGM_LITE_Helper::get_plugin_version() ); ?></span></div>
        </div>
        <div class="col-sm-4 col-xs-6 social_media_area float-right">
            <div class="social-media-links text-right">
                <a href="" target="_blank"><i class="fas fa-info-circle fc-label-info" aria-hidden="true"></i></a>
                <a href="" target="_blank"><i class="fas fa-video fc-label-warning" aria-hidden="true"></i></a>
                <a href="" target="_blank"><i class="fas fa-book fc-label-danger" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
	
	<!-- <div class="cip-upgrade-banner">
	<a target="_" href="https://www.infigosoftware.in/theme-bundle/"><img src="<?php echo WL_AGM_LITE_PLUGIN_URL ?>admin/image/christmas.png" class="img-responsive" style="width:100%;height:auto;" alt="infigo" >
    </div> -->
	
    <!-- end - row 1 -->
    <div id="dashboard_cards">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card">
                    <div class="box">
                        <div class="counter btn-floating">
                            <span class="count text-bold text-center">
                              <?php if ( wp_count_posts( 'wl_agm_locations' )->publish ) {
        	                      echo wp_count_posts( 'wl_agm_locations' )->publish;
                              } else {
        	                      echo esc_html('0');
                              }
                              ?>
                            </span>
                        </div>
                        <h2><?php esc_html_e( 'Location Maps', WL_AGM_LITE_DOMAIN ) ?></h2>
                        <a href="<?php echo esc_url(admin_url()); ?>post-new.php?post_type=wl_agm_locations"
                           class="btn blue-gradient-cstm btn-sm btn-floating waves-effect"><?php esc_html_e( 'Add', WL_AGM_LITE_DOMAIN ) ?></a>
                        <a href="<?php echo esc_url(admin_url()); ?>edit.php?post_type=wl_agm_locations"
                           class="btn orange-gradient-cstm btn-sm btn-floating waves-effect"><?php esc_html_e( 'Manage', WL_AGM_LITE_DOMAIN ) ?></a>
                        <hr>
						<?php if ( WL_AGM_LITE_Helper::get_last_updated_time( 'wl_agm_locations' ) ) { ?>
                            <p class="last_update_agm"><?php esc_html_e( 'Last Updated', WL_AGM_LITE_DOMAIN ) ?>:-
                                <span><?php echo WL_AGM_LITE_Helper::get_last_updated_time( 'wl_agm_locations' ); ?></span>
                            </p>
						<?php } else { ?>
                            <p class="last_update_agm"><?php esc_html_e( 'Last Updated', WL_AGM_LITE_DOMAIN ) ?>:-
                                <span><?php esc_html_e( 'No Last Update', WL_AGM_LITE_DOMAIN ) ?></span></p>
						<?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card">
                    <div class="box">
                        <div class="counter btn-floating">
                    <span class="count text-bold text-center">
                      <?php if ( wp_count_posts( 'wl_agm_maps' )->publish ) {
	                      echo wp_count_posts( 'wl_agm_maps' )->publish;
                      } else {
	                      echo esc_html('0');
                      }
                      ?>
                    </span>
                        </div>
                        <h2><?php esc_html_e( 'Multiple Location Maps', WL_AGM_LITE_DOMAIN ) ?></h2>
                        <p></p>
                        <a href="<?php echo esc_url(admin_url()); ?>post-new.php?post_type=wl_agm_maps"
                           class="btn blue-gradient-cstm btn-sm btn-floating waves-effect"><?php esc_html_e( 'Add', WL_AGM_LITE_DOMAIN ) ?></a>
                        <a href="<?php echo esc_url(admin_url()); ?>edit.php?post_type=wl_agm_maps"
                           class="btn orange-gradient-cstm btn-sm btn-floating waves-effect"><?php esc_html_e( 'Manage', WL_AGM_LITE_DOMAIN ) ?></a>
                        <hr>
						<?php if ( WL_AGM_LITE_Helper::get_last_updated_time( 'wl_agm_maps' ) ) { ?>
                            <p class="last_update_agm"><?php esc_html_e( 'Last Updated', WL_AGM_LITE_DOMAIN ) ?>:-
                                <span><?php echo WL_AGM_LITE_Helper::get_last_updated_time( 'wl_agm_maps' ); ?></span></p>
						<?php } else { ?>
                            <p class="last_update_agm"><?php esc_html_e( 'Last Updated', WL_AGM_LITE_DOMAIN ) ?>:-
                                <span><?php esc_html_e( 'No Last Update', WL_AGM_LITE_DOMAIN ) ?></span>
                            </p>
						<?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card">
                    <div class="box">
                        <div class="counter btn-floating">
                    <span class="count text-bold text-center">
                      <?php if ( wp_count_posts( 'wl_agm_routes' )->publish ) {
	                      echo wp_count_posts( 'wl_agm_routes' )->publish;
                      } else {
	                      echo esc_html('0');
                      }
                      ?>
                    </span>
                        </div>
                        <h2><?php esc_html_e( 'Route Maps', WL_AGM_LITE_DOMAIN ) ?></h2>
                        <p></p>
                        <a href="<?php echo esc_url(admin_url()); ?>post-new.php?post_type=wl_agm_routes"
                           class="btn blue-gradient-cstm btn-sm btn-floating waves-effect"><?php esc_html_e( 'Add', WL_AGM_LITE_DOMAIN ) ?></a>
                        <a href="<?php echo esc_url(admin_url()); ?>edit.php?post_type=wl_agm_routes"
                           class="btn orange-gradient-cstm btn-sm btn-floating waves-effect"><?php esc_html_e( 'Manage', WL_AGM_LITE_DOMAIN ) ?></a>
                        <hr>
						<?php if ( WL_AGM_LITE_Helper::get_last_updated_time( 'wl_agm_routes' ) ) { ?>
                            <p class="last_update_agm"><?php esc_html_e( 'Last Updated', WL_AGM_LITE_DOMAIN ) ?>:-
                                <span><?php echo WL_AGM_LITE_Helper::get_last_updated_time( 'wl_agm_routes' ); ?></span></p>
						<?php } else { ?>
                            <p class="last_update_agm"><?php esc_html_e( 'Last Updated', WL_AGM_LITE_DOMAIN ) ?>:-
                                <span><?php esc_html_e( 'No Last Update', WL_AGM_LITE_DOMAIN ) ?></span></p>
						<?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card">
                    <div class="box">
                        <div class="counter btn-floating">
                    <span class="count text-bold text-center">
                      <?php if ( wp_count_posts( 'wl_agm_inter_maps' )->publish ) {
	                      echo wp_count_posts( 'wl_agm_inter_maps' )->publish;
                      } else {
	                      echo esc_html('0');
                      }
                      ?>
                    </span>
                        </div>
                        <h2><?php esc_html_e( 'Interactive Maps', WL_AGM_LITE_DOMAIN ) ?></h2>
                        <p></p>
                        <a href="<?php echo esc_url(admin_url()); ?>post-new.php?post_type=wl_agm_inter_maps"
                           class="btn blue-gradient-cstm btn-sm btn-floating waves-effect"><?php esc_html_e( 'Add', WL_AGM_LITE_DOMAIN ) ?></a>
                        <a href="<?php echo esc_url(admin_url()); ?>edit.php?post_type=wl_agm_inter_maps"
                           class="btn orange-gradient-cstm btn-sm btn-floating waves-effect"><?php esc_html_e( 'Manage', WL_AGM_LITE_DOMAIN ) ?></a>
                        <hr>
						<?php if ( WL_AGM_LITE_Helper::get_last_updated_time( 'wl_agm_inter_maps' ) ) { ?>
                            <p class="last_update_agm"><?php esc_html_e( 'Last Updated', WL_AGM_LITE_DOMAIN ) ?>:-
                                <span><?php echo WL_AGM_LITE_Helper::get_last_updated_time( 'wl_agm_inter_maps' ); ?></span>
                            </p>
						<?php } else { ?>
                            <p class="last_update_agm"><?php esc_html_e( 'Last Updated', WL_AGM_LITE_DOMAIN ) ?>:-
                                <span><?php esc_html_e( 'No Last Updates', WL_AGM_LITE_DOMAIN ) ?></span></p>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
        
</div>
