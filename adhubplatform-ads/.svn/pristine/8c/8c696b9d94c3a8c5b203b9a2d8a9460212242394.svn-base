<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="wrap adhub-platform-settings">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    
    <form action="options.php" method="post">
        <?php
        settings_fields('adhub_platform_options');
        do_settings_sections($this->page_name);
        submit_button(esc_html__('Save Settings', 'adhubplatform-ads'));
        ?>
    </form>
</div>