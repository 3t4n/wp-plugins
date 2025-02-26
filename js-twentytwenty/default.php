<?php if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists('opsteam') ):

class opsclass {
    
    function __construct() {
        define( 'OPS_URL', plugin_dir_url( __FILE__ ) );
        define( 'OPS_DIR', dirname( __FILE__ ) );
    }
    
}

new opsclass();

endif; // class_exists check

?>