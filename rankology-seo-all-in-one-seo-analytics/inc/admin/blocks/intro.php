<?php
    // To prevent calling the plugin directly
    if ( ! function_exists('add_action')) {
        echo 'Please don&rsquo;t call the plugin directly. Thanks :)';
        exit;
    }

    if (defined('RANKOLOGY_WL_ADMIN_HEADER') && RANKOLOGY_WL_ADMIN_HEADER === false) {
        //do nothing
    } else {
?>

<div id="rankology-intro" class="rankology-intro">
    <div>
        <h1><?php printf('Welcome to Rankology SEO Plugin', 'wp-rankology'); ?></h1>
        <p><?php esc_html_e('Your one stop for SEO.', 'wp-rankology'); ?></p>
    </div>
</div>

<?php }
