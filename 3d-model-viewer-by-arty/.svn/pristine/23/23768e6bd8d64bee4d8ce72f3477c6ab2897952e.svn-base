<?php

/**
 * @package  3D-Model-Viewer-by-Arty
 */

namespace Arty_3DModelViewer\Base;

class Arty_3DModelViewer_Activator
{
    public static function arty_3dmodelviewer_activate()
    {
        $wooCommerceActivated = ( is_plugin_active( 'woocommerce/woocommerce.php' ) );

        if ( !$wooCommerceActivated ){
            echo '<h3>Arty 3D Viewer needs WooCommerce plugin to be installed and activated</h3>';
            exit;
        }

        flush_rewrite_rules();
        add_option( 'arty_3dmodelviewer_activation_redirect', 'true', '', 'yes' );
	}

    public static function arty_3dmodelviewer_activation_redirect() {

        if ( get_option('arty_3dmodelviewer_activation_redirect') ){

            delete_option( 'arty_3dmodelviewer_activation_redirect' );
			wp_redirect( esc_url( admin_url( 'admin.php?page=wc-settings&tab=arty_3dmodelviewer' ) ) );
			exit;
        }
    }
}

