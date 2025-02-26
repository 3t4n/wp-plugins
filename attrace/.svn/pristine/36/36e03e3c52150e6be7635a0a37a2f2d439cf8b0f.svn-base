<?php


namespace Attrace\Connector\Util;


use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\API\Controller\IntegrationConfigController;
use Attrace\Connector\API\Model\ConfigModel;
use Attrace\Connector\API\Model\TransactionModel;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Exceptions\AttraceException;

/**
 * Server side tracking check and handler
 * Class Tracking
 * @package Attrace\Connector\Util
 */
class Tracking
{
    const ONE_DAY_IN_SECONDS = 86400;

    public static $mandatoryParams = [
        Constants::COOKIE_AKEY,
        Constants::COOKIE_RKEY,
        Constants::COOKIE_ATX,
    ];

    private static $sentFlag = false;

    /**
     * @param null $route
     */
    public static function handleRequest($route = null)
    {

        //check if already sent
        if (self::$sentFlag) {
            return;
        }
        //check config if we are allowed to handle server side
        if (ConfigController::getInstance()->get(ConfigModel::TRACKING_STRATEGY) != ConfigModel::TRACKING_STRATEGY_BACKEND) {

            return;
        }


        $params = NetUtil::getQueryParams();

        if (!$params) {
            return;
        }

        //check if all params are present
        foreach (self::$mandatoryParams as $mandatoryParam) {
            if (!isset($params[$mandatoryParam])) {
                return;
            }
        }

        $agreementAddress = $params[Constants::COOKIE_AKEY];

        $integrationConfig = IntegrationConfigController::getInstance()->getByAgreementAndType($agreementAddress, Constants::ROLE_ADVERTISER);

        if (!$integrationConfig) {
            return;
        }

        $isSecure   = NetUtil::isHttpsConnection();
        $isHttponly = true;

        //copied from core
        setcookie(Constants::COOKIE_AKEY, $agreementAddress, time() + (self::ONE_DAY_IN_SECONDS * 120), "/", NetUtil::cookie_domain(NetUtil::getDomainUrl(true)), $isSecure, $isHttponly);               // 86400 = 1 day
        setcookie(Constants::COOKIE_RKEY, $params[Constants::COOKIE_RKEY], time() + (self::ONE_DAY_IN_SECONDS * 120), "/", NetUtil::cookie_domain(NetUtil::getDomainUrl(true)), $isSecure, $isHttponly); // 86400 = 1 day

        $expireDays = $integrationConfig->getProtocolIntegrationConfig()->getExpireDays();
        if ($expireDays) {
            $expireDays = Constants::DEFAULT_EXPIRE_DAYS;
        }
        $expirationAtMils = round(microtime(true) * 1000) + (self::ONE_DAY_IN_SECONDS * 1000 * $expireDays);

        $cookieAgreementKey = NetUtil::getAgreementCookieKey($agreementAddress);
        $config             = [
            'expireDays'       => $expireDays,
            'URLActions'       => [],
            'expirationAtMils' => $expirationAtMils,
        ];

        //copied from core
        setcookie($cookieAgreementKey, json_encode($config), time() + (self::ONE_DAY_IN_SECONDS * 3650), "/", NetUtil::cookie_domain(NetUtil::getDomainUrl(true)), $isSecure, $isHttponly);              // 86400 = 1 day
        //
        self::$sentFlag = true;
    }

    /**
     * Read the cookies, find agreement and if all correct invoke a serverside conversion
     *
     * @param $value
     * @param array $metadata
     * @return array
     */
    public static function tryInvokeConversion($value, $metadata = null)
    {
        if (ConfigController::getInstance()->get(ConfigModel::CONVERSION_STRATEGY) != ConfigModel::CONVERSION_STRATEGY_BACKEND) {
            Perf::log("Tried to invoke server side conversion, but ConversionStrategy des not allow it");
            return null;
        }

        if (!isset($_COOKIE[Constants::COOKIE_AKEY])) {
            Perf::log("No cookie: " . Constants::COOKIE_AKEY);
            return null;
        }
        if (!isset($_COOKIE[Constants::COOKIE_RKEY])) {
            Perf::log("No cookie: " . Constants::COOKIE_RKEY);
            return null;
        }

        $agreementAddrString = $_COOKIE[Constants::COOKIE_AKEY];
        $parentRootAddress   = $_COOKIE[Constants::COOKIE_RKEY];

        $agreementCookieKey = NetUtil::getAgreementCookieKey($agreementAddrString);
        if (!isset($_COOKIE[$agreementCookieKey])) {
            Perf::log("No cookie: " . $agreementCookieKey);
            return null;
        }

        //need to replace escaped quotes
        $config = json_decode(str_replace('\"', '"', $_COOKIE[$agreementCookieKey]), true);

        if (!$config) {
            Perf::log("Invalid json: " . urldecode($_COOKIE[$agreementCookieKey]));
            return null;
        }

        if (!isset($config['expirationAtMils'])) {
            Perf::log("No expirationAtMils set in cookie");
            return null;
        }

        $currentTimeInMilis = round(microtime(true) * 1000);

        if ($config['expirationAtMils'] < $currentTimeInMilis) {
            Perf::log("Cookie expired: " . $config['expirationAtMils'] . ' < ' . $currentTimeInMilis);
            return null;
        }

        $integrationConfig = IntegrationConfigController::getInstance()->getByAgreementAndType($agreementAddrString, Constants::ROLE_ADVERTISER);
        if (!$integrationConfig) {
            Perf::log("No advertiser integration config found for " . $agreementAddrString);
            return null;
        }

        try {
            $tx = Network::createConversionTransaction($integrationConfig, $parentRootAddress, 'sale', $value, $metadata);
            Perf::log("Created transaction, hash = " . $tx->getHashBase32());
            Network::publishTransaction($tx);
            Perf::log("Transaction published");
            return [
                'transaction' => $tx,
                'parent_root' => $parentRootAddress,
                'value'       => $value,
                'meta_data'   => $metadata,
            ];
        } catch (AttraceException $e) {
            Perf::log("AttraceException " . $e->toString());
        }

        return null;
    }
}