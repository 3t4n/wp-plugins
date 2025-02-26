<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to show the tabs and content to plugin settings page.
 *
 * @link       https://sfbx.io/
 * @since      1.0.0
 *
 * @package    Appconsent_Cmp_Sfbx
 * @subpackage Appconsent_Cmp_Sfbx/admin/templates
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
if ( ! current_user_can( 'manage_options' ) ) {
    return;
  }
$tab = null;
if( isset( $_GET['section'] ) && !empty( $_GET['section'] ) ){
    $tab = sanitize_text_field($_GET['section']);
}
?>
<div class="wrap sfbx-wrap">
	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
	<nav class="nav-tab-wrapper">

		<a href="?page=appconsent_cmp" class="nav-tab <?php if($tab===null):?>nav-tab-active<?php endif; ?>"><?php esc_html_e( "Overview", "appconsent-cmp-sfbx" ); ?></a>

		<a href="?page=appconsent_cmp&section=user-guide" class="nav-tab <?php if($tab==='user-guide'):?>nav-tab-active<?php endif; ?>"><?php esc_html_e( "User Guide", "appconsent-cmp-sfbx" ); ?></a>

		<a href="?page=appconsent_cmp&section=plugin-settings" class="nav-tab <?php if($tab==='plugin-settings'):?>nav-tab-active<?php endif; ?>"><?php esc_html_e( "Plugin Settings", "appconsent-cmp-sfbx" ); ?></a>

		<a href="?page=appconsent_cmp&section=support" class="nav-tab <?php if($tab==='support'):?>nav-tab-active<?php endif; ?>"><?php esc_html_e( "Support", "appconsent-cmp-sfbx" ); ?></a>

	</nav>
	<div class="tab-content">
		<?php switch($tab) :
		case 'user-guide':
			require APPCONSENT_CMP_SFBX_PATH . '/admin/templates/appconsent-cmp-sfbx-user-guide.php';
		break;
		case 'plugin-settings':
			require APPCONSENT_CMP_SFBX_PATH . '/admin/templates/appconsent-cmp-sfbx-plugin-settings.php';
		break;
		case 'support':
			require APPCONSENT_CMP_SFBX_PATH . '/admin/templates/appconsent-cmp-sfbx-support.php';
		break;
		default:
			require APPCONSENT_CMP_SFBX_PATH . '/admin/templates/appconsent-cmp-sfbx-overview.php';
		break;
		endswitch; ?>
	</div>
</div>