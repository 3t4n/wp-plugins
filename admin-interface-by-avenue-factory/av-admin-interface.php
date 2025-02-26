<?php

    /**
    * Plugin Name: Admin Interface by Avenue Factory
    * Version: 1.0.0
    * Description: WordPress 3.8 comes with great UI improvements to its admin interface, but its typography, spacing, and layout have lost the tactile feel that it once had. This plugin restores that tactile feel and generally improves the admin experience of what WordPress 3.8 brings.
    * Author: Avenue Factory
    * Author URI: http://www.avenuefactory.com
    * 
    * @class AV_AdminInterface
    * @author Avenue Factory
    * @package Avenue
    * @version 1.0.0
    */

    new AV_AdminInterface();

    class AV_AdminInterface {

        public $assetsUrl = '';

        public function __construct() {

            //Getting URLs
            $this->assetsUrl = plugins_url('av-assets', __FILE__);

            //Register our enqueue assets only to our admin pages
            add_action('admin_enqueue_scripts', array($this, 'enqueueAssets'));
        }

        public function enqueueAssets() {

            //Load our CSS styling
            wp_enqueue_style(
                'av-admin-interface',
                $this->assetsUrl . '/av-admin-interface.css',
                array(),
                false,
                'all'
            );

        }

    }

?>