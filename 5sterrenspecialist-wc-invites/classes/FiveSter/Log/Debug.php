<?php

class FiveSter_Log_Debug {

    public static function log( $msg, $force = false ) {
        if ( ! ( $force || defined('FIVESTER_DEBUG__') ) ) {
            return;
        }

        error_log( date( 'F j, Y H:i:s', current_time( 'timestamp' ) ) . ' - ' . $msg );
        file_put_contents( FIVESTER_INVITE_DIR__ . "tmp/log.log", date( 'F j, Y H:i:s', current_time( 'timestamp' ) ) . ' - ' . $msg."\n", FILE_APPEND );
    }

    public static function init() {
        @unlink( FIVESTER_INVITE_DIR__ . 'tmp/log.log' );
    }
}