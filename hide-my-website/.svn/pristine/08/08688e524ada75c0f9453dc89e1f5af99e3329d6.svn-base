<?php
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 


// Section callback functions
function hmwp_set_password_section_callback() {
    echo '<p>' . esc_html__('Hey There👋,', 'hide-my-website') . '</p>';
    echo '<p>' . esc_html__('Thank you for choosing Hide My Website!Let me help you introduce some setup over here!,', 'hide-my-website') . '</p>';
    echo '<p>' . esc_html__('Configure your login password settings below:', 'hide-my-website') . '</p>';
    echo '<p>' . esc_html__('Once your password is set, this plugin automatically enables protection. There is no switch to enable it manually. However, if you deactivate the plugin, it will also remove the protection. There is an option to disable the protection temporarily for testing purposes.ie,Disable the Password Protection', 'hide-my-website') . '</p>';
    echo '<h2>' . esc_html__('Main Settings', 'hide-my-website') . '</h2>';
}

function hmwp_seo_disable_section_callback() {
    echo '<p>' . esc_html__('Set up your search engine visibility settings below. You can discourage search engine crawlers and add rules to your .htaccess for extra control.', 'hide-my-website') . '</p>';
}

function hmwp_template_section_callback() {
    echo '<p>' . esc_html__('Choose a template for password protection below. Currently, you can select from two available options.', 'hide-my-website') . '</p>';
}
function hmwp_ipwhitelist_section_callback() {
    echo '<p>' . esc_html__('Configure your IP whitelisting settings below. IP whitelisting allows you to specify certain IP addresses or ranges that are allowed to access your account. This adds an extra layer of security by blocking access from any other IPs.', 'hide-my-website') . '</p>';
}

function hmwp_exclusion_section_callback() {
    echo '<p>' . esc_html__('Set up your page exclusion settings below. This lets you choose which pages should be excluded from password protection.', 'hide-my-website') . '</p>';
}

// Field callback functions
function hmwp_password_field_callback() {
    $value = get_option('hmw_password');
    ?>
    <input type="text" name="hmw_password" placeholder="<?php echo esc_attr__('Enter password', 'hide-my-website'); ?>" value="<?php echo esc_attr($value); ?>" class="regular-text">
    <p><?php esc_html_e("Choose a protection password here. You'll need this to enable protection.", 'hide-my-website'); ?></p>
    <?php
}

function hmwp_password_hint_field_callback() {
    $value = get_option('hmw_password_hint');
    ?>
    <input type="text" name="hmw_password_hint" placeholder="<?php echo esc_attr__('Enter password hint', 'hide-my-website'); ?>" value="<?php echo esc_attr($value); ?>" class="regular-text">
    <p><?php esc_html_e("Feel free to add a password hint here! It's completely optional, but it can help you remember your password if you ever forget it.", 'hide-my-website'); ?></p>
    <hr>
    <?php
}

function hmwp_disable_protection_field_callback() {
    $value = get_option('hmw_disable_protection'); // Retrieve the current value
    ?>
    <input type="checkbox" name="hmw_disable_protection" value="1" <?php checked(1, $value, true); ?>>
    <label style='color:red'><?php esc_html_e('**IMPORTANT**: Checking this will disable password protection.', 'hide-my-website'); ?></label>
    <?php
}


function hmw_ip_whitelist_enabled_callback() {
    $hmw_ip_whitelist_enabled = get_option('hmw_ip_whitelist_enabled', '0');
    ?>
    <input type='checkbox' 
           name='hmw_ip_whitelist_enabled' 
           value='1' 
           <?php checked(1, $hmw_ip_whitelist_enabled, true); ?> />
    <label><?php esc_html_e('Enable IP Whitelisting', 'hide-my-website'); ?></label>
    <?php
}
// Add callback functions for the new settings
function hmw_excluded_pages_enabled_callback() {
    $enabled = get_option('hmw_excluded_pages_enabled', '0');
    ?>
    <input type='checkbox' 
           name='hmw_excluded_pages_enabled' 
           <?php checked($enabled, '1'); ?> 
           value='1'>
    <p class="description"><?php esc_html_e('Enable page exclusion feature', 'hide-my-website'); ?></p>
    <?php
}

function hmw_excluded_pages_callback() {
    $excluded_pages = get_option('hmw_excluded_pages', '');
    ?>
    <textarea name='hmw_excluded_pages' 
              rows='5' 
              cols='50' 
              placeholder="home
about-us
contact
blog"
              class="large-text code"><?php echo esc_textarea($excluded_pages); ?></textarea>
    <p class="description">
        <?php esc_html_e('Enter page slugs to exclude from password protection, one per line:', 'hide-my-website'); ?>
        <br>
        • <?php esc_html_e('Use "home" for your homepage', 'hide-my-website'); ?>
        <br>
        • <?php esc_html_e('For other pages, use the last part of the URL (e.g., "about-us" for example.com/about-us)', 'hide-my-website'); ?>
    </p>
    <hr>
    <?php
}

function hmw_ip_whitelist_callback() {
    $hmw_ip_whitelist = get_option('hmw_ip_whitelist', '');
    ?>
    <textarea name='hmw_ip_whitelist' 
              rows='5' 
              cols='50' 
              class="large-text code"><?php echo esc_textarea($hmw_ip_whitelist); ?></textarea>
    <p class="description"><?php esc_html_e('Enter IP addresses, one per line, to whitelist.', 'hide-my-website'); ?></p>
    <hr>
  <?php
}

function hmwp_prevent_indexing_field_callback() {
    $value = get_option('hmw_prevent_indexing');
    ?>
    <input type="checkbox" name="hmw_prevent_indexing" value="1" <?php checked(1, $value, true); ?>>
    <label><?php esc_html_e('Prevent search engines from indexing this site', 'hide-my-website'); ?></label>
    <p><?php esc_html_e('This will turn off discourage crawlers in the site, by turning on the WordPress Setting', 'hide-my-website'); ?></p>
    <hr>
   <?php
}

// Callback for the indexing prevention checkbox
function hmw_prevent_indexing_callback() {
    $prevent_indexing = get_option('hmw_prevent_indexing', '0');
    ?>
    <input type='checkbox' 
           name='hmw_prevent_indexing' 
           value='1' 
           <?php checked(1, $prevent_indexing, true); ?> />
    <label><?php esc_html_e('Prevent search engines from indexing this site', 'hide-my-website'); ?></label>
    <p class="description"><?php esc_html_e('This will modify robots.txt and add meta tags to prevent indexing', 'hide-my-website'); ?></p>
    <?php
}




function hmwp_settings_template_field_callback() {
    $current_template = get_option('hmw_login_template', 'default');
    ?>
    <div class="template-selection">
        <label>
            <input type="radio" name="hmw_login_template" value="default" <?php checked($current_template, 'default'); ?>>
            <?php esc_html_e('Default Template', 'hide-my-website'); ?>
        </label>
        <div class="template-preview">
            <img src="<?php echo esc_url(plugins_url('../assets/default-template.png', __FILE__)); ?>" alt="<?php esc_attr_e('Default template preview', 'hide-my-website'); ?>">
        </div>
        
        <label>
            <input type="radio" name="hmw_login_template" value="wordpress" <?php checked($current_template, 'wordpress'); ?>>
            <?php esc_html_e('WordPress Style Template', 'hide-my-website'); ?>
        </label>
        <div class="template-preview">
            <img src="<?php echo esc_url(plugins_url('../assets/wordpress-template.png', __FILE__)); ?>" alt="<?php esc_attr_e('WordPress style template preview', 'hide-my-website'); ?>">
        </div>
    </div>
    <?php

   
    
}