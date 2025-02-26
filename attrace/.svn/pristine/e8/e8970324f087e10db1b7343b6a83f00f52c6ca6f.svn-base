<?php

use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\API\Model\ConfigModel;
use Attrace\Connector\MasterTag\TagManager;

/**
 * Attrace Shortcode, example:
 * [attr_link id="YUBFt" text="My link text"]
 *
 * Class Shortcode
 */
class Attr4ce_Shortcode
{
    private $slug;

    public function __construct()
    {
        $this->slug = ConfigController::getInstance()->get(ConfigModel::CLICKOUT_PATH);

    }

    public function init()
    {
        add_shortcode('attr_link', array($this, 'attr_link'));
        add_shortcode('attr_master_tag', array($this, 'attr_master_tag'));
        add_shortcode('attr_action_sale', array($this, 'attr_action_sale'));
        add_shortcode('attr_action_lead', array($this, 'attr_action_lead'));

    }

    function attr_link($params)
    {
        if (!isset($params['id'])) {
            return "";
        }
        $text = isset($params['text']) ? $params['text'] : "";
        return sprintf('<a href="/%s/%s" target="_blank">%s</a>', $this->slug, $params['id'], $text);
    }

    function attr_master_tag()
    {
        return TagManager::attr_master_tag();
    }

    function attr_action_sale($params)
    {
        return TagManager::attr_action('sale', isset($params['value']) ? $params['value'] : null);
    }

    function attr_action_lead($params)
    {
        return TagManager::attr_action('lead', isset($params['value']) ? $params['value'] : null);
    }

}