<?php

class FiveSter_Plugin {

    private static $_instance;

    public static function get_instance() {
        if ( ! self::$_instance ) {
            self::$_instance  = new FiveSter_Plugin();
        }
        return self::$_instance;
    }

    public function load() {
        @mkdir( FIVESTER_INVITE_DIR__ . 'tmp' );

		new FiveSter_Admin();
	    new FiveSter_Frontend();
    }

    public function activate() {
        FiveSter_Log_Debug::init();
    }

    public function deactivate() {
    }
}