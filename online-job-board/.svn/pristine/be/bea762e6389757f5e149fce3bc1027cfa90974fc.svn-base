<?php
// Enqueue necessary styles and scripts
wp_enqueue_style('wfojb-bootstrap-css');
wp_enqueue_style('wfojb-shortcode-css');
wp_enqueue_style('wfojb-toogle-css');
wp_enqueue_style('wfojb-fontawesome-css');
wp_enqueue_script('wfojb-toogle-js');

// Get the saved template value, defaulting to 'template1'
$contactFormTemplate = get_option('selected_contact_form_template', 'template1');
?>

<div class="container-fluid"><br>
    <div class="row mt-2 mb-5">
        <h1>Template Settings Unlock Only Pro Version : <a href="https://wpfrank.com/account/signup/online-job-board-pro" target="_blank" role="button" class="btn btn-success btn-lg"><?php esc_html_e('Buy Now', 'online-job-board'); ?></a></h1>
        
    </div>
    
    <form id="Wfojb_template_setting" class="opacity-75">
        <div class="bhoechie-tab-content active ">
            <h3><?php esc_html_e('Select Template Design:', 'online-job-board'); ?></h3>
            <div id="contact_form_template">
                <div class="row">
                    <!-- Template 1 -->
                    <div class="col-md-6 ojbcustom-section">
                       
                        <label for="contact_form_template_one" class="contact_layout_one">
                            <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . 'assets/image/1.webp'); ?>"
                                style="width: 100%; box-shadow: 3px 2px 11px 0px #999;">
                        </label>
                    </div>

                    <!-- Template 2 -->
                    <div class="col-md-6 ojbcustom-section">
                        
                        <label for="contact_form_template_two" class="contact_layout_two">
                            <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . 'assets/image/2.webp'); ?>"
                                style="width: 100%; box-shadow: 3px 2px 11px 0px #999;">
                        </label>
                    </div>                

                    <div class="text-center">
                        <button disabled class="col-md-3 btn btn-success btn-lg mt-4"
                            ><?php esc_html_e('Save Settings', 'online-job-board'); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

