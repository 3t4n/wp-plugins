<?php

namespace Attrace\Connector\API;

use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\API\Model\ConfigModel;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Util\NetUtil;
use Attrace\Connector\Util\Router;

abstract class API_AbstractHandler
{

    const NOT_SET = "_not_set";

    private $corsEnabled;
    // id
    private   $id = self::NOT_SET;
    protected $uri;

    //by default all auth is blocked

    protected $auth =
        [
            Constants::HTTP_GET    => Constants::AUTH_BLOCKED,
            Constants::HTTP_DELETE => Constants::AUTH_BLOCKED,
            Constants::HTTP_PUT    => Constants::AUTH_BLOCKED,
            Constants::HTTP_POST   => Constants::AUTH_BLOCKED,
            Constants::HTTP_PATCH  => Constants::AUTH_BLOCKED,
        ];


    /**
     * Initializes all of the partial classes.
     * @param array $auth
     * @param bool $corsEnabled
     */
    public function __construct($auth = [], $corsEnabled = true)
    {
        // merge the auth settings
        $this->auth        = array_merge($this->auth, $auth);
        $this->uri         = NetUtil::getRequestUri();
        $this->corsEnabled = $corsEnabled;
    }


    public function handleRequest($id = self::NOT_SET)
    {
        $this->id = $id;
        if ($this->corsEnabled) {
            NetUtil::setCORSHeaders();
        }
        NetUtil::authCurrentRequest($this->auth);
        $this->processRequest();
    }

    /*
     * parse identifier /{id}
     *
     */
    protected function getId($urlStart = null)
    {
        if ($this->id != self::NOT_SET) {
            return $this->id;
        }
        if ($urlStart) {
            $pattern = '/' . str_replace("/", "\\/", $urlStart) . "\/([A-Za-z_\-\d]+)/";
        } else {
            //API pattern
            $pattern = sprintf('/%s\/[a-z\-]+\/([A-Za-z_\-\d]+)/', Router::getApiBasePath(true));
        }
        preg_match($pattern, $this->uri, $matches);
        if (!isset($matches[1])) {
            return null;
        }
        return $matches[1];
    }

    /**
     * @return string
     */
    protected function getClickoutSlug()
    {
        return ConfigController::getInstance()->get(ConfigModel::CLICKOUT_PATH);
    }


    protected abstract function processRequest();


}