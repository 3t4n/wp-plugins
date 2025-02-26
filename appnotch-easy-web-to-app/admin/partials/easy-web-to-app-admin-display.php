<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://easywebtoapp.com/
 * @since      1.0.0
 *
 * @package    Easy_Web_To_App
 * @subpackage Easy_Web_To_App/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
	    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>
	    <form action="options.php" method="post">
	        <?php
settings_fields($this->plugin_name);
do_settings_sections($this->plugin_name);
 $general_sett = get_option($this->option_name . '_appfirsttime','');
        if($general_sett <> "easywebtoapp"){
            submit_button();
        }
//submit_button();
?>
	    </form>
	</div>