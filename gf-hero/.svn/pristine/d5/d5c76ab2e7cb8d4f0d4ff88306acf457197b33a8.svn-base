<?php

if ( ! defined( 'TGGH_URL' ) ) {
    exit;
}

function tggh_level_common() {
    $level = function_exists( 'tggh_get_license_level' )
        ? tggh_get_license_level()
        : 1;

    ?>
        <script type="text/javascript">
            tggh_level = <?php echo json_encode( $level ) ?>;
        </script>
    <?php
}

add_action( 'wp_head', 'tggh_level_common', -1 );
add_action( 'admin_head', 'tggh_level_common', -1 );

// Date Time Zone
// --------------

function tggh_date_time_zone_format( $tz_string ) {
    return str_replace( '_', ' ', preg_replace( '#^.*/#', '', $tz_string ) );
}

function tggh_date_time_zone_format_current() {
    return tggh_date_time_zone_format( tggh_date_time_zone_get_current() );
}

function tggh_date_time_zone_get_current() {
    // See options-general.php in WordPress.

    $current_offset = get_option( 'gmt_offset' );
    $tz_string = get_option( 'timezone_string' );

    if ( false !== strpos( $tz_string, 'Etc/GMT' ) ) {
        $tz_string = '';
    }

    if ( empty( $tz_string ) ) { // Create a UTC+- zone if no timezone string exists.
        if ( 0 == $current_offset ) {
            $tz_string = 'UTC+0';
        } elseif ( $current_offset < 0 ) {
            $tz_string = 'UTC' . $current_offset;
        } else {
            $tz_string = 'UTC+' . $current_offset;
        }
    }

    return $tz_string;
}

function tggh_date_time_zone_common() {
?>
    <script type="text/javascript">
        tggh.date_time_zone_server = <?php echo json_encode( tggh_date_time_zone_get_current() ) ?>;
    </script>
<?php
}

add_action( 'wp_head', 'tggh_date_time_zone_common' );
add_action( 'admin_head', 'tggh_date_time_zone_common' );
