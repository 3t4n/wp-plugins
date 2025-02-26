<?php


namespace Attrace\Connector\API\Controller;


use Attrace\Connector\API\Model\IntegrationConfigModel;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Exceptions\AttraceException;

class IntegrationConfigController extends AbstractController
{
    private static $instance;

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new IntegrationConfigController();
        }
        return self::$instance;
    }


    public function getByHashId($key)
    {
        $allConfigs = $this->getAll();
        /** @var IntegrationConfigModel $config */
        foreach ($allConfigs as $config) {
            if ($config->containsAlias($key)) {
                return $config;
            }
        }
        return null;
    }

    public function getByAgreementAndType($agreement, $role = Constants::ROLE_ADVERTISER)
    {
        $allConfigs = $this->getAll();
        /** @var IntegrationConfigModel $config */
        foreach ($allConfigs as $config) {
            if
            (
                $config->getProtocolIntegrationConfig()->getAgreement() == $agreement &&
                $config->getProtocolIntegrationConfig()->getRole() == $role
            )
                return $config;
        }
        return null;
    }

    /**
     * @param int $limit
     * @param int $next
     * @return mixed
     * @throws AttraceException
     */
    public function getRawIntegrationConfigBatch($limit = 10, $next = 0)
    {
        return $this->getStorage()->getRawIntegrationConfigBatch($limit,  $next);
    }

}