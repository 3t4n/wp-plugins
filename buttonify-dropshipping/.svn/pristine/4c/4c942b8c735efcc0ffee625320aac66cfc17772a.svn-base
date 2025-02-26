<?php
if ( ! defined( 'ABSPATH' ) ) exit;

require_once 'Buttonify_LifeCycle.php';

class Buttonify_Plugin extends Buttonify_LifeCycle
{


    //Setting menu name
    public function getPluginDisplayName()
    {
        return 'Buttonify';
    }

    protected function getMainPluginFileName()
    {
        return 'buttonify.php';
    }

    public function upgrade()
    {
    }


    //Add menu
    public function addActionsAndFilters()
    {
        add_action('admin_menu', array(&$this, 'addSettingsSubMenuPage'));
    }

    //Get stored data
    protected function initOptions()
    {
        $options = $this->getOptionMetaData();
        if (!empty($options)) {
            foreach ($options as $key => $arr) {
                if (is_array($arr) && count($arr > 1)) {
                    $this->addOption($key, $arr[1]);
                }
            }
        }
    }

}
