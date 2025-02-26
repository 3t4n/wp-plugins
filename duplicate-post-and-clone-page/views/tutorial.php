<?php

defined('ABSPATH') || exit;

if (isset(DPCP_Settings::$options["hide_tutorial"]) && DPCP_Settings::$options["hide_tutorial"] == "1") {
    $hide_tutorial = "0";
    $action_url = dpcp_get_tutorial_hide_show_link($hide_tutorial);
?>

    <a href="<?php echo esc_url($action_url); ?>">Show Quick Tutorial</a>
<?php
    return;
}
$hide_tutorial = "1";
$action_url = dpcp_get_tutorial_hide_show_link($hide_tutorial);
?>
<div id="metabox" class="postbox dpcp-metabox">
    <div class="dpcp-tutorial">
        <h3>Look for the "Duplicate" link under the list of your <a href="<?php echo esc_url(dpcp_posts_list_url()); ?>">posts</a> and <a href="<?php echo esc_url(dpcp_pages_list_url()); ?>">pages</a></h3>
        <img src="<?php echo esc_url(DPCP_URL . "assets/images/01-tutorial.png"); ?>" width="500px">
        <p>Don't worry about the settings below. We've already configured the usual
            settings for most users.</p>
        <p>You likely won't need to adjust anything - simply duplicate your post/page.</p>
        <p>If you want more control, you can always return to this page and modify the settings.</p>

        <hr>
        <p><a href="<?php echo esc_url($action_url); ?>" class="button button-primary">Dismiss</a></p>
    </div>
</div>