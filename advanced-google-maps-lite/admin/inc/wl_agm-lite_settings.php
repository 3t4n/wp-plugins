<?php
defined( 'ABSPATH' ) or die();
require_once( WL_AGM_LITE_PLUGIN_DIR_PATH . 'admin/inc/helpers/WL_AGM_LITE_Helper.php' );

$save_settings    = get_option( 'wl_agm_settings_data' );
$google_api_key   = isset( $save_settings['wl_agm_gmap_api'] ) ? sanitize_text_field( $save_settings['wl_agm_gmap_api'] ) : '';
$wl_agm_gmap_lang = isset( $save_settings['wl_agm_gmap_lang'] ) ? sanitize_text_field( $save_settings['wl_agm_gmap_lang'] ) : ''; ?>
<div class="container-fluid wl_agm_container">
    <!-- row 1 -->
    <div class="product_header wl-agm_plugin_top col-md-12">
        <div class="col-md-8 col-xs-6 product_header_desc">
            <div class="product_name wl-agm-title-plugin"><?php esc_html_e( 'IS-Google Maps Lite', WL_AGM_LITE_DOMAIN ) ?>
                <span class="fc-badge"><?php echo esc_html( WL_AGM_LITE_Helper::get_plugin_version() ); ?></span></div>
        </div>

    </div>
    <!-- end - row 1 -->
    <!-- Settings -->
    <div class="wl-agm_settings col-md-12">
        <div class="col-md-12 col-xs-12 wl-agm-setting-title">
            <div class="product_name wl-agm-title-setting"><?php esc_html_e( 'General Settings', WL_AGM_LITE_DOMAIN ) ?></div>
        </div>
        <div class="col-md-12 settings_form">
            <form id="wl_agm_save_settings_data" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
				<?php $nonce = wp_create_nonce( 'wl_agm_save_settings' ); ?>
                <input type="hidden" name="wl_agm_setting_options" value="<?php echo esc_attr( $nonce ); ?>">
                <input type="hidden" name="action" value="wl-agm-lite-settings">
                <div class="form-group row">
                    <label for="api_key"
                           class="col-sm-2 col-form-label"><?php esc_html_e( 'Google Maps API Key', WL_AGM_LITE_DOMAIN ) ?></label>
                    <div class="col-sm-8">
                        <input type="map_api" type="password" class="form-control" id="wl_agm_gmap_api"
                               name="wl_agm_gmap_api" placeholder="Google Map API Key"
                               value="<?php echo esc_attr( $google_api_key ); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3"
                           class="col-sm-2 col-form-label"><?php esc_html_e( 'Map Language', WL_AGM_LITE_DOMAIN ) ?></label>
                    <div class="col-sm-2">
                        <select class="custom-select mr-sm-2" id="wl_agm_gmap_lang" name="wl_agm_gmap_lang">
                            <option selected><?php esc_html_e( 'Choose...', WL_AGM_LITE_DOMAIN ) ?></option>
							<?php $language_array = WL_AGM_LITE_Helper::get_map_language_option_array();
							foreach ( $language_array as $key => $value ) { ?>
                                <option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
							<?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit"
                                class="btn btn-success custom_btn_wl_agm save-options-submit"><?php esc_html_e( 'Save Settings', WL_AGM_LITE_DOMAIN ) ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Settings -->
    
</div>
<?php WL_AGM_LITE_Helper::map_language_select(); ?>
