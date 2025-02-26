<?php



// Use this constant for refering to plugin directory

define('MAIN_PLUGIN_DIR', plugin_dir_url(__FILE__));



// Remove this condition if you want to show theme options for all wordpress users, not only for admins.

if (is_admin()) {

    // Theme options

    include_once 'options/ar_options.php';

    include_once 'admin-helper.php';

    include_once 'ajax-image.php';

    include_once 'generate-options.php';

    new ar_theme_options($options);



    add_action('admin_head', 'ar_admin_head');

}
?>