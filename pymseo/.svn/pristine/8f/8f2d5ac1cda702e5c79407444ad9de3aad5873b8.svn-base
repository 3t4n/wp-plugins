<?php
//###############################
// Desactivar el Heartbeat
//###############################

    add_action( 'init', 'fun_pymseo_stop_heartbeat', 1 );
    function fun_pymseo_stop_heartbeat() {
        wp_deregister_script('heartbeat');

    // PONERLE UN INTERVALO - PENDIENTE
    //function pymseoWpoHeartbeatInterval( $settings ) {
    //    $settings['interval'] = 90;
    //    return $settings;
    //}
    //add_filter( 'heartbeat_settings', 'pymseoWpoHeartbeatInterval' );
}



?>