<?php

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Show admin notice 1 month after plugin activation
 */
function htgb_admin_notice()
{
    // Get activation timestamp
    $activation_time = get_option('htgb_activation_time');

    // Set activation time if not already set
    if (!$activation_time) {
        $activation_time = time();
        update_option('htgb_activation_time', $activation_time);
        return;
    }

    // Check if notice has been dismissed
    $dismissed = get_option('htgb_notice_dismissed');
    if ($dismissed) {
        return;
    }

    // Show notice after 30 days
    $current_time = time();
    $thirty_days = 30 * DAY_IN_SECONDS;

    if (($current_time - $activation_time) > $thirty_days) {
?>
        <div class="notice notice-info is-dismissible htgb-admin-notice">
            <p><?php _e('Thank you for using Heroic Glossary! If you\'re enjoying the plugin, you will love our other knowledge management plugins for WordPress.', 'ht-glossary'); ?></p>
            <p style="display: inline-block; margin-right: 15px;"><a href="https://herothemes.com/plugins/?utm_source=wprepo&utm_medium=link&utm_campaign=heroic-glossary" target="_blank" class="htgb-link"><?php _e('See More HeroThemes Plugins', 'ht-glossary'); ?></a></p>
            <p style="display: none;"><a href="#" class="htgb-dismiss-link"><?php _e('Dismiss this message', 'ht-glossary'); ?></a></p>
        </div>
    <?php
    }
}
add_action('admin_notices', 'htgb_admin_notice');

/**
 * Handle notice dismissal via AJAX
 */
function htgb_dismiss_notice()
{
    update_option('htgb_notice_dismissed', true);
    wp_die();
}
add_action('wp_ajax_htgb_dismiss_notice', 'htgb_dismiss_notice');

/**
 * Add JavaScript to handle notice dismissal
 */
function htgb_admin_scripts()
{
    ?>
    <script>
        jQuery(document).ready(function($) {
            $(document).on('click', '.htgb-admin-notice .notice-dismiss, .htgb-admin-notice .htgb-dismiss-link', function(e) {
                if ($(this).hasClass('htgb-dismiss-link')) {
                    e.preventDefault();
                    $(this).closest('.htgb-admin-notice').fadeOut();
                }
                $.ajax({
                    url: ajaxurl,
                    data: {
                        action: 'htgb_dismiss_notice'
                    }
                });
            });
        });
    </script>
<?php
}
add_action('admin_footer', 'htgb_admin_scripts');
