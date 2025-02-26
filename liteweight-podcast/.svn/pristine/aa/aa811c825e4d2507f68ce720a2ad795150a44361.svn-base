<?php
namespace PDP\Model;
class EnqueueAssets{
    protected static $_instance = null;

    public function __construct(){
        add_action("wp_enqueue_scripts", [$this, 'publicAssets']);
        add_action( 'admin_enqueue_scripts', [$this, 'adminAssets'] );
    }

    /**
     * Create Instance
     */
    public static function instance(){
        if(self::$_instance === null){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Enqueue public assets
     */
    public function publicAssets(){
        
        wp_enqueue_script('jquery');
        wp_register_style( 'bplugins-plyrio',  PDP_PLUGIN_DIR. 'assets/css/player-style.css', array(), PDP_VER );
        wp_register_style( 'pdp-social', PDP_PLUGIN_DIR . 'assets/css/jssocials.css', array(), PDP_VER );
        wp_register_style( 'pdp-font', PDP_PLUGIN_DIR . 'assets/font/flaticon.css', array(), PDP_VER );
        // wp_register_style( 'pdp-font-player', PDP_PLUGIN_DIR . 'assets/font/player/flaticon.css', array(), PDP_VER );
        wp_register_style( 'pdp-public', PDP_PLUGIN_DIR . 'dist/public.css', array('bplugins-plyrio', 'pdp-social', 'pdp-font'), PDP_VER );

        // wp_enqueue_script( 'pdp-wave', PDP_PLUGIN_DIR . 'src/wave.js', array(), PDP_VER, true ); 

        wp_register_script( 'bplugins-plyrio', PDP_PLUGIN_DIR. 'assets/js/plyr.js', array(), PDP_VER, true );
	    wp_register_script( 'pdp-social', PDP_PLUGIN_DIR. 'assets/js/jssocials.min.js', array('jquery'), PDP_VER, true );
        wp_register_script( 'pdp-public', PDP_PLUGIN_DIR . 'dist/public.js', array('jquery', 'bplugins-plyrio', 'pdp-social'), PDP_VER, true );
    }

    /**
     * enqueue admin assets
     **/    
    function adminAssets($hook_suffix) {
        wp_enqueue_style( 'pdp-admin', PDP_PLUGIN_DIR . 'dist/editor.css', array(), PDP_VER, 'all' );
        // wp_enqueue_style( 'pdp-admin', PDP_PLUGIN_DIR . 'dist/admin.css', array(), PDP_VER, 'all' );
        wp_enqueue_script( 'pdp-admin-js', PDP_PLUGIN_DIR . 'dist/admin.js', array(), PDP_VER, 'all' );
    }
}

EnqueueAssets::instance();