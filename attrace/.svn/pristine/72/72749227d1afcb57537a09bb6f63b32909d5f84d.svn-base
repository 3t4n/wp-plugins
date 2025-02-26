<?php

namespace Attrace\Connector\API\Model;


use Attrace\Connector\Entity\Account;
use Attrace\Connector\Entity\Address;
use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\Protocol\Integrations\IntegrationConfig as ProtocolIntegrationConfig;
use Attrace\Connector\Protocol\Integrations\RedirectUrl;
use Attrace\Connector\Protocol\Integrations\RootActionConfig;
use Attrace\Connector\Util\Network;
use Exception;

/**
 *
 * Class IntegrationConfig
 *
 * Represents an Agreement config.
 */
class IntegrationConfigModel implements ModelInterface
{
    /**
     * @var ProtocolIntegrationConfig
     */
    private $protocolIntegrationConfig;

    /**
     * IntegrationConfigModel constructor.
     * @param String $data
     * @param bool $binary
     * @throws Exception
     */
    public function __construct($data = null, $binary = false)
    {
        $this->protocolIntegrationConfig = new ProtocolIntegrationConfig();

        if ($binary) {
            $this->protocolIntegrationConfig->mergeFromString($data);
            return;
        }

        if (is_array($data)) {
            $data = json_encode($data);
        }

        if ($data) {
            $this->protocolIntegrationConfig->mergeFromJsonString($data);
        }
    }

    public function getUniqueKey()
    {
        return $this->protocolIntegrationConfig->getAgreement() . '-' . $this->protocolIntegrationConfig->getDelegateOf();
    }

    public function containsAlias($alias)
    {
        return !is_null($this->getRedirectUrl($alias));
    }

    /**
     * @param $jsonString
     * @throws Exception
     */
    public function setData($jsonString)
    {
        $this->getProtocolIntegrationConfig()->mergeFromJsonString($jsonString);
    }

    /**
     * Network not in the IntegrationConfig anymore
     *
     * @deprecated
     */
    public function getNetwork()
    {
        return null;
    }


    /**
     * @param string $alias If null, return first one
     * @return string
     */
    public function getRedirectUrl($alias = null)
    {
        /** @var RootActionConfig $config */
        foreach ($this->getProtocolIntegrationConfig()->getRootActionConfigs() as $config) {
            $redirectUrls = $config->getRedirectUrls();
            /** @var RedirectUrl $redirectUrl */
            foreach ($redirectUrls as $redirectUrl) {
                if (!$alias) {
                    return $redirectUrl->getUrl();
                }
                if ($alias == $redirectUrl->getAliasId()) {
                    return $redirectUrl->getUrl();
                }
            }
        }
        return null;
    }

    /**
     * @return string
     */
    public function getFirstAlias()
    {
        /** @var RootActionConfig $config */
        foreach ($this->getProtocolIntegrationConfig()->getRootActionConfigs() as $config) {
            $redirectUrls = $config->getRedirectUrls();
            /** @var RedirectUrl $redirectUrl */
            foreach ($redirectUrls as $redirectUrl) {
                return $redirectUrl->getAliasId();
            }
        }
        return null;
    }

    /**
     * @return Address
     * @throws AttraceException
     */
    public function getAgreementAddress()
    {
        return Address::fromBase32($this->getProtocolIntegrationConfig()->getAgreement());
    }


    /**
     * @return \Attrace\Connector\Entity\Agreement
     * @throws AttraceException
     */
    public function getAgreement() {
        return Network::getAgreement($this->getAgreementAddress());
    }

    /**
     * @return Address
     * @throws AttraceException
     */
    public function getDelegateOfAddress()
    {
        return Address::fromBase32($this->getProtocolIntegrationConfig()->getDelegateOf());
    }

    /**
     * @return Account
     * @throws AttraceException
     */
    public function getOperationalKeyAccount()
    {
        return Account::fromPrivateKeyBase32($this->getProtocolIntegrationConfig()->getOperationalKey());
    }

    /**
     * @return ProtocolIntegrationConfig
     */
    public function getProtocolIntegrationConfig()
    {
        return $this->protocolIntegrationConfig;
    }

    /**
     * @param ProtocolIntegrationConfig $protocolIntegrationConfig
     */
    public function setProtocolIntegrationConfig($protocolIntegrationConfig)
    {
        $this->protocolIntegrationConfig = $protocolIntegrationConfig;
    }

    public function toArray()
    {
        return json_decode($this->getProtocolIntegrationConfig()->serializeToJsonString(), true);
    }
}