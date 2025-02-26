<?php

/**
 * @package  3D-Model-Viewer-by-Arty
 */

namespace Arty_3DModelViewer\Settings;

use Arty_3DModelViewer\Controllers\Arty_3DModelViewer_BaseController;

class Arty_3DModelViewer_SettingsLinks extends Arty_3DModelViewer_BaseController
{

    /**
     * Initialization function
     * @return void
     */
	public function arty_3dmodelviewer_register()
	{
	    add_filter( "plugin_action_links_$this->plugin", array( $this, 'arty_3dmodelviewer_settings_links' ) );
	}

    /**
     * @param $links
     * @return mixed
     */
	public function arty_3dmodelviewer_settings_links( $links )
	{
		$integration_link = '<a href="admin.php?page=wc-settings&tab=arty-3dmodel-viewer">Integration</a>';
        $settings_link = '<a href="admin.php?page=wc-settings&tab=arty-3dmodel-viewer&section=settings">Viewer settings</a>';

		$links[] = $integration_link;
        $links[] = $settings_link;

		return $links;
	}

}
