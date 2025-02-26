<?php


namespace Attrace\Connector\MasterTag;


use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\API\Model\ConfigModel;
use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\Util\NetUtil;

class TagManager
{
    /** @var String $js */
    private $js;

    /** @var String $api */
    private $api;


    /**
     * @throws AttraceException
     */
    public function getJs()
    {
    	if(is_null($this->js)) {
			$filename = dirname(__FILE__) . '/mtag.js';
			if (!file_exists($filename)) {
				throw new AttraceException(AttraceException::NOT_FOUND, "mtag.js: Not found");
			}
			$this->js = file_get_contents($filename);
		}
		
        $js = $this->js.PHP_EOL;
        if (!$this->api) {
            throw new AttraceException(AttraceException::MTAG_NO_API_DEFINED, "mtag.js: No API defined");
        }
        $js .= sprintf('Attrace.init(\'%s\');'.PHP_EOL, $this->api);
        return $js;
    }


    /**
     * @return string
     */
    public function getApi()
    {
        return $this->api;
    }

    /**
     * @param string $api
     */
    public function setApi($api)
    {
        $this->api = $api;
    }


    public static function attr_master_tag()
    {
        $tag = ConfigController::getInstance()->get(ConfigModel::MASTERTAG_URL);
        $versionedTag = str_replace('.js', '.' . self::getMtagHash() . '.js', $tag);
        $versionedTag = str_replace('_js', '_' . self::getMtagHash() . '_js', $versionedTag);
        return sprintf('<script type="text/javascript" src="%s%s"></script>', NetUtil::getDomainUrl(true), $versionedTag);
    }

    public static function attr_action($action, $value = null)
    {
        if (!$value) {
            return '<script type="text/javascript">
                    Attrace.action(\'' . $action . '\')
                 </script>';
        }
        return '<script type="text/javascript">
                     Attrace.action(\'' . $action . '\', null, {}, ["' . $value . '"])
                 </script>';
    }

    public static function updateMtagHash()
    {
//        $hash = Util::quickRandom(8);
//        update_option(Attr4ce_Constants::OPTION_GROUP_MTAG, $hash);
        return "attr4ceX";

    }

    public static function getMtagHash()
    {
        return "attr4ceX";
        //if no exist, create it
//        return self::updateMtagHash();
    }

}