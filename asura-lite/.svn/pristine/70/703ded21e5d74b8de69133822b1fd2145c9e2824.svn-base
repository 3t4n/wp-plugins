<?php

namespace Asura\Integration\WordPress;

class Notice {
    const ERROR = 'error';
    const SUCCESS = 'success';
    const WARNING = 'warning';
    const INFO = 'info';

    public static function init() {
        foreach (
            [
                self::ERROR,
                self::SUCCESS,
                self::WARNING,
                self::INFO,
            ] as $level
        ) {
            $messages = get_transient( "asura_notice_{$level}" );

            if ( $messages && is_array( $messages ) ) {
                foreach ( $messages as $message ) {
                    echo sprintf(
                        '<div class="notice notice-%s is-dismissible"><p><b>Asura</b>: %s</p></div>',
                        $level,
                        $message
                    );
                }

                delete_transient( "asura_notice_{$level}" );
            }
        }
    }

    public static function error( $messages ) {
        self::adds( self::ERROR, $messages );
    }

    public static function adds( $level, $messages ) {
        if ( ! is_array( $messages ) ) {
            $messages = [ $messages ];
        }

        foreach ( $messages as $message ) {
            self::add( $level, $message );
        }
    }

    public static function add( $level, $message, $code = 0, $duration = 60 ) {
        $messages = get_transient( "asura_notice_{$level}" );

        if ( $messages && is_array( $messages ) ) {
            if ( ! in_array( $message, $messages ) ) {
                $messages[] = $message;
            }
        } else {
            $messages = [ $message ];
        }

        set_transient( "asura_notice_{$level}", $messages, $duration );
    }

    public static function success( $messages ) {
        self::adds( self::SUCCESS, $messages );
    }

    public static function warning( $messages ) {
        self::adds( self::WARNING, $messages );
    }

    public static function info( $messages ) {
        self::adds( self::INFO, $messages );
    }
}
