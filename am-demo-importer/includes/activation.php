<?php

class AmDemoImporterActivation {

    private $whizzie_instance;
    private $steps_instance;

    public function __construct($whizzie_instance) {
        $this->whizzie_instance = $whizzie_instance;
        $this->steps_instance = new AmDemoImporterSteps($whizzie_instance);
    }

    public function am_demo_importer_pro_mostrar_guide() {

        $am_demo_importer_pre_license_key = am_demo_importer_ThemeWhizzie::get_the_theme_key();

        $api_params = array(
            'slm_action' => 'slm_check',
            'secret_key' => ADI_SECRET_KEY,
            'license_key' => $am_demo_importer_pre_license_key,
        );

        $response = wp_remote_get(
            add_query_arg(
                $api_params,
                ADI_THEMES_MAIN_URL
            ),
            array(
                'timeout' => 20,
                'sslverify' => false
            )
        );

        if (is_wp_error($response)) {
            am_demo_importer_ThemeWhizzie::set_the_validation_status('false');
        } else {
            $response_body = wp_remote_retrieve_body($response);
            $response_body = json_decode($response_body);

            $theme_textdomain = wp_get_theme()->get('TextDomain');

            if (isset($response_body->product_ref) && ($response_body->product_ref == $theme_textdomain) ) {

                if (isset($response_body->status) && $response_body->status == 'active') {
                    am_demo_importer_ThemeWhizzie::set_the_validation_status('true');
                } else {
                    am_demo_importer_ThemeWhizzie::set_the_validation_status('false');
                }
            } else {
                am_demo_importer_ThemeWhizzie::set_the_validation_status('false');
            }
            
        }
        // Check the validation END
        $theme_validation_status = am_demo_importer_ThemeWhizzie::get_the_validation_status(); ?>
        <div class="wrapper-info get-stared-page-wrap">
           
            <div class="d-flex align-items-start parent-import-container">
                <div class="main-div-left d-flex align-items-start">
              
                <div class="tab-content" id="am-demo-importer-tab-pills-tabContent">

                    <div class="tab-pane fade show active" id="am-demo-importer-tab-pills-import" role="tabpanel" aria-labelledby="am-demo-importer-tab-pills-import-tab" tabindex="0">
                        <div class="wee-tab-sec wee-theme-option-tab">
                            <div class="wee-tab">
                                <?php if(defined('IS_AM_PREMIUM_THEME')){ ?>
                                    <div class="tab">
                                      <!--   <button class="tablinks active" onclick="openCity(event, 'wee_theme_activation')" data-tab="wee_theme_activation"><?php esc_html_e('Key Activation', 'am-demo-importer'); ?></button> -->
                                    </div>
                                <?php }?>
                            </div>
                            <!-- Tab content -->
                            <div id="wee_theme_activation" class="wee-tabcontent  <?php echo defined('IS_AM_PREMIUM_THEME') ? 'open' : '' ?>">
                                <?php if(defined('IS_AM_PREMIUM_THEME')){ ?>
                                    <div class="wee_theme_activation-wrapper">
                                        <div class="wee_theme_activation_spinner">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;display:block;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                                <g transform="translate(50,50)">
                                                    <g transform="scale(0.7)">
                                                        <circle cx="0" cy="0" r="50" fill="#0f81d0"></circle>
                                                        <circle cx="0" cy="-28" r="15" fill="#cfd7dd">
                                                            <animateTransform attributeName="transform" type="rotate" dur="1s" repeatCount="indefinite" keyTimes="0;1" values="0 0 0;360 0 0"></animateTransform>
                                                        </circle>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="wee-theme-wizard-key-status">
                                            <?php if ($theme_validation_status === 'false') {
                                                esc_html_e('Theme License Key is not activated!', 'am-demo-importer');
                                            } else {
                                                esc_html_e('Theme License is Activated!', 'am-demo-importer');
                                            } ?>
                                        </div>
                                        <?php $this->activation_page(); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div id="wee_demo_offer" class="wee-tabcontent <?php echo !defined('IS_AM_PREMIUM_THEME') ? 'open' : '' ?>">
                                <?php $this->steps_instance->wizard_page(); ?>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
        <?php
    }

    public function activation_page() {
        
        if(defined('IS_AM_PREMIUM_THEME')){
            $theme_key = am_demo_importer_ThemeWhizzie::get_the_theme_key();
            $validation_status = am_demo_importer_ThemeWhizzie::get_the_validation_status(); ?>
                <div class="wee-wrap">
                    <label><?php esc_html_e('Please Enter Your Theme License Key:', 'am-demo-importer'); ?></label>
                    <form id="am_demo_importer_pro_license_form">
                        <input type="text" name="am_demo_importer_pre_license_key" value="<?php echo esc_attr($theme_key); ?>" <?php if ($validation_status === 'true') { echo 'disabled'; } ?> required placeholder="<?php esc_attr_e('License Key', 'am-demo-importer'); ?>" />
                        <div class="licence-key-button-wrap">
                            <button class="button" type="submit" name="button" <?php if ($validation_status === 'true') { echo 'disabled'; } ?>>
                                <?php if ($validation_status === 'true') { ?>
                                    <?php esc_html_e('Activated', 'am-demo-importer'); ?>
                                <?php } else { ?>
                                    <?php esc_html_e('Activate', 'am-demo-importer'); ?>
                                <?php } ?>
                            </button>
                            <?php if ($validation_status === 'true') { ?>
                                <button id="change--key" class="button" type="button" name="button"><?php esc_html_e('Change Key', 'am-demo-importer'); ?></button>
                                <div class="next-button">
                                    <button id="start-now-next" class="button" type="button" name="button" onclick="openCity(event, 'wee_demo_offer')"><?php esc_html_e('Next', 'am-demo-importer'); ?></button>
                                </div>
                            <?php } ?>
                        </div>
                    </form>
                </div>
        <?php }
    }

    public function slm_check_premium_theme_text_domain($am_demo_importer_pre_license_key) {

        $api_params = array(
            'slm_action' => 'slm_check',
            'secret_key' => ADI_SECRET_KEY,
            'license_key' => $am_demo_importer_pre_license_key,
        );

        $response = wp_remote_get(
            add_query_arg(
                $api_params,
                ADI_THEMES_MAIN_URL
            ),
            array(
                'timeout' => 20,
                'sslverify' => false
            )
        );

        if (is_wp_error($response)) {
            am_demo_importer_ThemeWhizzie::remove_the_theme_key();
            am_demo_importer_ThemeWhizzie::set_the_validation_status('false');
            am_demo_importer_ThemeWhizzie::set_the_theme_key('');
            
            $response = array('status' => false, 'msg' => 'Something Went Wrong!');
            wp_send_json($response);
            exit;
        } else {
            $response_body = wp_remote_retrieve_body($response);
            $response_body = json_decode($response_body);

            $theme_textdomain = wp_get_theme()->get('TextDomain');

            if ($response_body->result == 'error') {
                
                am_demo_importer_ThemeWhizzie::remove_the_theme_key();
                am_demo_importer_ThemeWhizzie::set_the_validation_status('false');
                am_demo_importer_ThemeWhizzie::set_the_theme_key('');

                $response = array('status' => false, 'msg' => $response_body->message);
                wp_send_json($response);
                exit;
            }

            if ($response_body->result == 'success') {

                if ( $response_body->status == 'active' ) {

                    if (isset($response_body->product_ref) && ($response_body->product_ref != $theme_textdomain)) {

                        am_demo_importer_ThemeWhizzie::remove_the_theme_key();
                        am_demo_importer_ThemeWhizzie::set_the_validation_status('false');
                        
                        $response = array('status' => false, 'msg' => 'The key for this theme is incorrect!');
                        wp_send_json($response);
                        exit;
                    } else {
                        
                        $current_site_url = site_url();

                        $site_exists = false;
                        foreach ($response_body->registered_domains as $registered_domain) {
                            if ($current_site_url === $registered_domain->registered_domain) {
                                $site_exists = true;
                                break;
                            }
                        }

                        if ($site_exists) {
                            
                            am_demo_importer_ThemeWhizzie::set_the_validation_status('true');
                            am_demo_importer_ThemeWhizzie::set_the_theme_key($am_demo_importer_pre_license_key);

                            $response = array('status' => true, 'msg' => 'License Key Activated');
                            wp_send_json($response);
                            exit;

                        } else {

                            return 'true';
                        }
                    }

                } else {

                    return 'true';
                }
            }
        }
    }

    public function wz_activate_am_demo_importer_pro() {

        if ( defined('IS_AM_PREMIUM_THEME') ) {
                $am_demo_importer_pre_license_key = sanitize_text_field( $_POST['am_demo_importer_pre_license_key'] );
                $is_current_theme = $this->slm_check_premium_theme_text_domain( $am_demo_importer_pre_license_key );
        
            if ( $is_current_theme == 'true' ) {
                $api_params = array(
                    'slm_action' => 'slm_activate',
                    'secret_key' => ADI_SECRET_KEY,
                    'license_key' => $am_demo_importer_pre_license_key,
                    'registered_domain' => site_url(),
                );
    
                $response = wp_remote_get(
                    add_query_arg(
                        $api_params,
                        ADI_THEMES_MAIN_URL
                    ),
                    array(
                        'timeout' => 20,
                        'sslverify' => false,
                    )
                );
    
                if ( is_wp_error( $response ) ) {
                    am_demo_importer_ThemeWhizzie::remove_the_theme_key();
                    am_demo_importer_ThemeWhizzie::set_the_validation_status( 'false' );
                    am_demo_importer_ThemeWhizzie::set_the_theme_key( '' );
    
                    $response = array( 'status' => false, 'msg' => 'Something Went Wrong!' );
                    wp_send_json( $response );
                    exit;
                } else {
                    $response_body = wp_remote_retrieve_body( $response );
                    $response_body = json_decode( $response_body );
    
                    if ( $response_body->result == 'error' ) {
                        am_demo_importer_ThemeWhizzie::remove_the_theme_key();
                        am_demo_importer_ThemeWhizzie::set_the_validation_status( 'false' );
    
                        $response = array( 'status' => false, 'msg' => $response_body->message );
                        wp_send_json( $response );
                        exit;
                    } elseif ( $response_body->result == 'success' ) {
                        am_demo_importer_ThemeWhizzie::set_the_validation_status( 'true' );
                        am_demo_importer_ThemeWhizzie::set_the_theme_key( $am_demo_importer_pre_license_key );
    
                        $response = array( 'status' => true, 'msg' => $response_body->message );
                        wp_send_json( $response );
                        exit;
                    } else {
                        am_demo_importer_ThemeWhizzie::remove_the_theme_key();
                        am_demo_importer_ThemeWhizzie::set_the_validation_status( 'false' );
    
                        $response = array( 'status' => false, 'msg' => 'Something Went Wrong!' );
                        wp_send_json( $response );
                        exit;
                    }
                }
            }

        }
        
    }
}