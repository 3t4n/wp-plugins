<?php


use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\API\Model\ConfigModel;
use Attrace\Connector\Util\Tracking;

include_once 'lib/Attr4ce_Constants.php';


class Attr4ce_ServerSideTracking
{

    public function init()
    {
        if (ConfigController::getInstance()->get(ConfigModel::TRACKING_STRATEGY) !== ConfigModel::TRACKING_STRATEGY_BACKEND) {
            return;
        }
        // hook to various events to set the cookies
        add_action('woocommerce_add_to_cart', array($this, 'maybeSetCookies'));
        add_action('wp', array($this, 'maybeSetCookies'), 99);
        add_action('shutdown', array($this, 'maybeSetCookies'), 0);
    }

    public function maybeSetCookies()
    {
        //check the headers
        if (!(!headers_sent() && did_action('wp_loaded'))) {
            return;
        }
        //don't try to set on ajax requests, we get occasional 403 errors
        if (wp_doing_ajax() || wp_doing_cron()) {
            return;
        }
        Tracking::handleRequest();
    }


}