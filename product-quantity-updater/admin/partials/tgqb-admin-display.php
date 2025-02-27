<?php 
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://http://www.technifyguru.com/
 * @since      1.0.0
 *
 * @package    Tgwt
 * @subpackage Tgwt/admin/partials
 */

// check user capabilities
if ( ! current_user_can( 'manage_options' ) ) {
    return;
}

//Get the active tab from the $_GET param
$default_tab = 'settings';
$tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

    <nav class="nav-tab-wrapper">
        <a href="?page=<?php echo $this->plugin_name.'-pqub'; ?>&tab=settings" class="nav-tab <?php if ($tab === null || $tab === 'settings') echo 'nav-tab-active';  ?>">Settings</a>
        <a href="?page=<?php echo $this->plugin_name.'-pqub'; ?>&tab=styling" class="nav-tab <?php if ($tab === 'styling') echo 'nav-tab-active'; ?>">Styling</a>
    </nav>

    <div class="tab-content">
        <?php 
        switch ($tab) :
            case 'settings':
                ?>
                <form method="post" action="options.php">
                    <?php 
                    settings_fields('tgqb_settings');
                    do_settings_sections('tgqb_settings');
                    submit_button('Save Settings');
                    ?>
                </form>
                <?php
                break;
            case 'styling':
                ?>
                <form method="post" action="options.php">
                    <?php
                    settings_fields('tgqb_styling');
                    do_settings_sections('tgqb_styling');
                    submit_button('Save Settings');
                    ?>
                </form>
                <?php
                break;
            default:
                break;
        endswitch;
        ?>
    </div>

	<?php include_once( ( __DIR__ ) . '/tgqb-footer.php' ); ?>

</div>