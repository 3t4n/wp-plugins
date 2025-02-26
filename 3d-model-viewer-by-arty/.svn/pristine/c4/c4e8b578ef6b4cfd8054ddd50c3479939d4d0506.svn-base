<?php

/**
 * @package  3D-Model-Viewer-by-Arty
 */

namespace Arty_3DModelViewer\Base;

class Arty_3DModelViewer_Deactivator
{

	public static function arty_3dmodelviewer_deactivate()
    {

        delete_option( 'arty_3dmodelviewer_activation_redirect' );
	    flush_rewrite_rules();
	}
}
