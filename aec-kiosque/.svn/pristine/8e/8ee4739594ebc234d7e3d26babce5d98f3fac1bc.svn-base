<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://atl-software.net/
 * @since      1.0.0
 *
 * @package    Aec
 * @subpackage Aec/admin/partials
 */

?>

<?php wp_enqueue_style('kioske-builder-app-css', AEC_URL . '/includes/components/build/static/css/kiosque-builder-apps.css'); ?>
<div class="wrap aec-admin-wrap">

	<?php Aec_Admin_Settings::render_settings_page_header( AEC()->t( 'aec_section_title_shortcode_generator' ) ) ?>

	<div class="aec-admin-container">
        <div id="kiosque-builder-sc-generator"></div>
	</div>

</div>
<?php
wp_enqueue_script('kioske-builder-app-js', AEC_URL . '/includes/components/build/static/js/kiosque-builder-apps.js');
wp_localize_script('kioske-builder-app-js', 'AECClientInstanceInfo', [
    'version' => esc_js(AEC_CLIENT_INSTANCE_VERSION),
    'isLocal' => esc_js(AEC()->is_local_client_instance())
]);
?>
