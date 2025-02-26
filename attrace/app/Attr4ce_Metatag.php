<?php


use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\API\Model\ConfigModel;


class Attr4ce_Metatag
{

    private $publicAddress;

    /**
     * Initializes all of the partial classes.
     *
     */
    public function __construct()
    {
        $this->publicAddress = ConfigController::getInstance()->get(ConfigModel::ACCOUNT);
    }

    public function init()
    {
        add_action('wp_head', array($this, 'metatag'));
    }

    public function metatag()
    {
        if (!$this->publicAddress) {
            return;
        }
        ?>

        <meta name="attrace-site-verification" content='<?php echo $this->publicAddress ?>'/>

        <?php
    }
}