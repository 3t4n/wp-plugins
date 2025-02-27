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

	<?php include_once( ( __DIR__ ) . '/tgqb-footer.php' ); ?>

</div>