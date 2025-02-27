<?php
/**
 * Dashboard page for Sports Leagues
 *
 * @link       https://anwp.pro
 * @since      0.11.0
 *
 * @package    Sports_Leagues
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! current_user_can( 'manage_options' ) ) {
	wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'sports-leagues' ) );
}
?>
<script type="text/javascript">
	window.slDashboardData             = <?php echo wp_json_encode( sports_leagues()->data->get_dashboard_data() ); ?>;
	window._slDashboardData            = {};
	window._slDashboardData.rest_root  = '<?php echo esc_url_raw( rest_url() ); ?>';
	window._slDashboardData.rest_nonce = '<?php echo wp_create_nonce( 'wp_rest' ); ?>';
</script>

<div class="wrap anwp-b-wrap">
	<div id="sl-admin-dashboard"></div>
</div>
