<?php
/*
Plugin Name: EasyCron
Plugin URI: https://wordpress.org/plugins/easycron/
Description: EasyCron <strong>configures a cron job</strong> to trigger your WordPress' scheduled tasks without the need of <a href="https://developer.wordpress.org/plugins/cron/">WP-Cron</a> and Cron on your server.
Version: 1.3.2
Author: EasyCron Team
Author URI: https://www.easycron.com
License: GPL v2
*/

if (is_admin()){ // admin actions
    add_action(
        'admin_menu', 
        'easycron_plugin_menu',
    );
    add_action(
        'admin_init', 
        'easycron_register_settings',
    );
}

function easycron_plugin_menu() {
    $page = add_menu_page(
        'EasyCron Settings', 
        'EasyCron', 
        'administrator', 
        __FILE__, 
        'easycron_option_page', 
        plugins_url('/easycron_16x16.png', __FILE__),
    );
    add_action(
        'admin_print_styles-' . $page, 
        'easycron_add_admin_styles',
    );
}

function easycron_add_admin_styles() {
    wp_enqueue_style('easycronAdminStyle');
}

function easycron_register_settings() {
    register_setting(
        'easycron_options', 
        'easycron_options', 
        array(
            'sanitize_callback' => 'easycron_options_validate',
        ),
    );
	
    add_settings_section(
        'easycron_settings', 
        'Cron Job Settings', 
        'easycron_section_text', 
        'easycron',
    );

    add_settings_field(
        'easycron-api-token', 
        'API Token', 
        'easycron_input_api_token', 
        'easycron', 
        'easycron_settings', 
    );
    add_settings_field(
        'easycron-cron-job-status', 
        'Cron Job Status', 
        'easycron_input_cron_job_status', 
        'easycron', 
        'easycron_settings',
    );
    add_settings_field(
        'easycron-cron-expression', 
        'Cron Expression', 
        'easycron_input_cron_expression', 
        'easycron', 
        'easycron_settings',
    );    
    add_settings_field(
        'easycron-cron-job-id', 
        '', 
        'easycron_input_cron_job_id', 
        'easycron', 
        'easycron_settings', 
        ['class' => 'hidden'],
    );

    // Add CSS.
    wp_register_style(
        'easycronAdminStyle', 
        plugins_url('style.css', __FILE__),
    );
}

function easycron_section_text() {
    ?>
       <div class="easycron-box">
       Before using this plugin, it's better to add <code>define('DISABLE_WP_CRON', true);</code> to your wp-config.php file (below line <code>define( 'WP_DEBUG', false );</code>) to disable the "visitor trigger" WP Cron System.<br>
       
       This page provides a way to configure a few settings of the cron job. To configure advanced settings, please go to <a target="_blank" href="https://www.easycron.com/user">EasyCron's cron job page</a>. <br>
       If your cron job settings were updated elsewhere, the settings on this page won't reflect those new changes. 
       </div>  
    <?php
}


function easycron_input_api_token() {
    $options = get_option('easycron_options');
    ?><input id="easycron-api-token" style="width:300px;" name="easycron_options[api-token]" size="40" type="password" value="<?php echo $options['api-token']; ?>" /> 
    <i>You can get an API token at <a href="https://www.easycron.com/user/token" target="_blank">EasyCron's token page</a>.</i><?php
}

function easycron_input_cron_job_status() {
    $options = get_option('easycron_options');
    if (isset($options['status']) && ($options['status'] === '1')) {
        $enabled = true;
    } else {
        $enabled = false;
    }
    ?>
    <select id="easycron-cron-job-status" style="width:150px;" name="easycron_options[status]">
        <option value="0"<?php echo ($enabled ? '' : ' selected="selected"'); ?>>Disabled</option>
        <option value="1" <?php echo ($enabled ? ' selected="selected"' : ''); ?>>Enabled</option>
    </select><?php
}

function easycron_input_cron_expression() {
    $options = get_option('easycron_options');
    if (isset($options['cron-expression'])) {
        $ce = $options['cron-expression'];
    } else {
        $ce = '';
    }
	
    ?><input id="easycron-cron-expression" style="width:300px;" name="easycron_options[cron-expression]" size="40" type="text" value="<?php echo $ce; ?>" /> 
    <i><a href="https://www.easycron.com/faq/What-cron-expression-does-easycron-support" target="_blank">Cron expression guide</a></i><?php
}

function easycron_input_cron_job_id() {
    $options = get_option('easycron_options');
    ?><input id="easycron-input-cron-job-id" name="easycron_options[cron-job-id]" type="hidden" value="<?php echo $options['cron-job-id']; ?>" /><?php
}

function easycron_connect($action, $easycron_settings) {
    $settings_array = array();
    foreach ($easycron_settings as $key => $value) {
        $settings_array[] = $key . '=' . urlencode($value);
    }
    
    $settings_str = implode('&', $settings_array);
    $url = 'https://www.easycron.com/rest/' . $action . '?' . $settings_str;
    
    $result = wp_remote_get($url);

    if (is_wp_error($result)) {
       $r['status'] = 'error';
       $r['error']['message'] = $result->get_error_message();
       return $r;
    } else {
       return json_decode($result['body'], TRUE);
    }
}

// Validate options that are going to be saved to database.
function easycron_options_validate($values) {

    // There are up to 6 options that could be saved to database:
    // 1) api-token;
    // 2) status;
    // 3) cron-expression;
    // 4) has-error;
    // 5) message;
    // 6) cron-job-id.

    $cron_job_id = isset($values["cron-job-id"]) ? $values["cron-job-id"] : '';

    $values['has-error'] = false;
    $values['message'] = '';
    $values['cron-job-id'] = $cron_job_id;  

    if (strlen($values["api-token"]) != 32) {
        $values["has-error"] = true;
        $values['message'] = "The API token should be 32 characters' long.";  
    } else {
        $easycron_settings = array(
            'token' => $values["api-token"],
            'cron_expression' => $values["cron-expression"],
            'url' => get_site_url() . '/wp-cron.php',
            'cron_job_name' => get_option('blogname'),
        );

        if (empty($cron_job_id)) {
            // Add a new cron job on EasyCron.

            // Set the email_me to 1.
            $easycron_settings['email_me'] = 1;    
            $result = easycron_connect('add', $easycron_settings);            
            if ($result['status'] == 'success') {
                // Save the new cron job ID.
                $values['cron-job-id'] = $result['cron_job_id'];
                // If the status of the cron job is "disabled", we disable the 
                // cron job here.
                if ($values['status'] === '0') {
                    $result = easycron_connect('disable', array(
                        'token' => $values["api-token"],
                        'id' => $result['cron_job_id'],         
                    ));
                    if ($result['status'] != 'success') {
                        $values["has-error"] = true;
                        $values['message'] = $result['error']['message']; 
                    }
                }
            } else {
                $values["has-error"] = true;
                $values['message'] = $result['error']['message'];            
            }
        } else {
            // Update an existent cron job on EasyCron.
            $easycron_settings['id'] = $cron_job_id;
            $result = easycron_connect('edit', $easycron_settings);
            if ($result['status'] == 'success') {
                // Update the cron job status.
                $result = easycron_connect(
                    ($values['status'] === '1') ? 'enable' : 'disable', 
                    array(
                        'token' => $values["api-token"],
                        'id' => $result['cron_job_id'],
                    ),
                );
                if ($result['status'] != 'success') {
                    $values["has-error"] = true;
                    $values['message'] = $result['error']['message']; 
                }            
            } else {
                if ($result['error']['code'] == 25) {
                    // Cron job ID not found (the cron job could have been 
                    // deleted at EasyCron's side), create a new cron job.
                    $easycron_settings['email_me'] = 1;
                    unset($easycron_settings['id']);
                    $result = easycron_connect('add', $easycron_settings);
                    if ($result['status'] == 'success') {
                        $values['cron-job-id'] = $result['cron_job_id'];
                    } else {
                        $values["has-error"] = true;
                        $values['message'] = $result['error']['message']; 
                    }
                } else {
                    $values["has-error"] = true;
                    $values['message'] = $result['error']['message'];           
                }    
            }
        }
    }

	return $values;
}

function easycron_option_page() {
    if (!current_user_can('administrator')) {
        wp_die( __('You do not have sufficient permissions to access this page.') );
    }
	
    $options = get_option('easycron_options');
    ?>	

    <div class="wrap">
        <div id="icon-easycron" class="icon32"><br></div>
        <h2>EasyCron</h2>

    <?php
    if ($options["has-error"] == true) {
    ?>
        <div id="message" class="error">
            <p><strong><?php echo $options["message"]; ?></strong></p>
        </div>
        <?php
        } else {
        if( isset($_GET['settings-updated']) ) { ?>
            <div id="message" class="updated">
                <p><strong><?php _e('Settings saved.') ?></strong></p>
            </div>
        <?php
        }
    }
        ?>
    <form method="post" action="options.php" id="easycron-settings-form">
    <?php 
    settings_fields('easycron_options');
    ?>
    
    <?php
    do_settings_sections('easycron');
    ?>
    <p class="submit">
        <input type="submit" name="easycron_btn_save" class="button-primary" value="<?php _e('Save') ?>" />
    </p>

    </form>
    </div>
<?php
}
