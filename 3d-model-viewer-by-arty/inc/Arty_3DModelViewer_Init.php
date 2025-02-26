<?php

/**
 * @package  3D-Model-Viewer-by-Arty
 */

namespace Arty_3DModelViewer;


final class Arty_3DModelViewer_Init {

    /**
     * Store all the classes inside an array
     * @return array Full list of classes
     */
    public static function arty_3dmodelviewer_get_services()
    {
        return [
            Settings\Arty_3DModelViewer_SettingsLinks::class,
            Settings\Arty_3DModelViewer_WooCommerceSettings::class,
            Base\Arty_3DModelViewer_Enqueue::class,
            Controllers\Arty_3DModelViewer_WooCommerceController::class
        ];
    }

    /**
     * Loop through the classes, initialize them,
     * and call the register() method if it exists
     */
    public static function arty_3dmodelviewer_register_services()
    {
        foreach ( self::arty_3dmodelviewer_get_services() as $class ) {
            $service = self::arty_3dmodelviewer_instantiate( $class );
            if ( method_exists( $service, 'arty_3dmodelviewer_register' ) ) {
                $service->arty_3dmodelviewer_register();
            }
        }
    }

    /**
     * @param $class
     * @return mixed
     */
    private static function arty_3dmodelviewer_instantiate( $class )
    {
        return new $class();
    }
}
