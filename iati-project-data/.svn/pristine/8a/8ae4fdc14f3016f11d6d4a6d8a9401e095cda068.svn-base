<?php
function iati_admin_menu(){
    add_menu_page( __( 'IATI Project', 'iati' ), __( 'IATI Project Data', 'iatiproject' ), 'manage_options', 'iati-project-data', 'iati_project_data_func', 'dashicons-category', 20 );
}

function iati_project_data_func(){
    global $wpdb;
    $project_opts      = get_option( 'iati_project_opts' );
    ?>
    <div class="wrap">
        <h1><?php esc_attr_e( 'Iati Project Data', 'iatiproject' ); ?></h1>
        <p><?php esc_attr_e( 'Find below the data associated to your project.', 'iatiproject' ); ?></p>

        <?php
        $iati_data  = $wpdb->get_results( "SELECT * FROM `" . $wpdb->prefix . "iati_project_data` WHERE iati_identifier='" . $project_opts['project_id'] . "'", ARRAY_A );
        ?>
        <?php

        if( $wpdb->num_rows == 0 ) {
            include( 'no-data.php' );
        } else {
            include( 'project-data.php' );
        }
        ?>
    </div>
    <?php
}