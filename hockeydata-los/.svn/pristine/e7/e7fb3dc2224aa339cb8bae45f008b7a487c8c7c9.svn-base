<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

$active_tab = ( isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'general' );

?>

<div class="wrap">

    <h2 class="nav-tab-wrapper">

        <a href="?page=hockeydata_los_settings&tab=general"   class="nav-tab <?php if ( 'general'   === $active_tab ) { echo 'nav-tab-active'; } ?>"><?php _e( 'General',   'hockeydata_los' ); ?></a>
		<a href="?page=hockeydata_los_settings&tab=divisions" class="nav-tab <?php if ( 'divisions' === $active_tab ) { echo 'nav-tab-active'; } ?>"><?php _e( 'Divisions', 'hockeydata_los' ); ?></a>
		<a href="?page=hockeydata_los_settings&tab=styling"   class="nav-tab <?php if ( 'styling'   === $active_tab ) { echo 'nav-tab-active'; } ?>"><?php _e( 'Styling',   'hockeydata_los' ); ?></a>

    </h2>

	<form method="post" action="<?php echo 'options.php'; ?>" id="hd_los_settings_form">

        <?php
		/** @noinspection PhpIncludeInspection */
        include( HD_LOS_PLUGIN_PATH . 'pages/settings.' . $active_tab . '.php' );
        ?>

        <?php submit_button(); ?>

	</form>

</div>

<script>

    jQuery( function() {

        hdLosInitAdminSettings();

    } );

</script>