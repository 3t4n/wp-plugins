<?php
/*
 * UtmvGrabber Actions
 * @package utmv_grabber/inc
 * @since   1.0.0
 */

class UtmvGrabberActions {

    /**
     * UtmvGrabber Constructor.
     */
    function __construct() {
        foreach ($this->AjaxActions() as $key => $action) {
            add_action("wp_ajax_{$action['name']}",  array($this, $action['callback']));
            add_action("wp_ajax_nopriv_{$action['name']}", array($this, $action['callback']));
        }
        add_action('init', array($this, 'UtmvGrabberActionsInit'));
    }

    /*
     * UtmvGrabber ajax handlers
     *
     * @return Array
     */

    private function AjaxActions() {
        return array();
    }    

    /**
     * actions init method
     */
    public function UtmvGrabberActionsInit() {

    }
}
return new UtmvGrabberActions();
?>