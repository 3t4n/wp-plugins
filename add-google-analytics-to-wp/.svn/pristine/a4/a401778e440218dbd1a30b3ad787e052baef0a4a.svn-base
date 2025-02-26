<?php
add_action('admin_menu','meet_analytics_setting_page');
function meet_analytics_setting_page(){
    $page_title = 'Google Analytics';
    $menu_title = 'Meetanshi GA';
    $capability = 'manage_options';
    $menu_slug  = 'meet-ga';
    $function   = 'analytics_page_setting_markup';
    $icon_url   = 'dashicons-admin-appearance';
    $position   = 100;
    add_menu_page( $page_title,$menu_title,$capability,$menu_slug,$function,$icon_url,$position );
}
function analytics_page_setting_markup(){
    //Double Check User Capabilities
    ?>
    <div class="wrap">
        <h1><?php esc_html_e(get_admin_page_title()); ?></h1>
        <p><?php esc_html_e("Plugin Sub heading"); ?>  </p>
        <?php
            include (plugin_dir_path(__FILE__).'meet-admin-form.php');
        ?>
    </div>
    <?php
}
// Add Link to your setting page in your plugin
function meet_add_setting_link($link){
    $setting_link = '<a href="admin.php?page=meet-ga">'.__('Setting').'</a>';
    array_push($link,$setting_link);
    return $link;
}
$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_$plugin", 'meet_add_setting_link' );
?>
