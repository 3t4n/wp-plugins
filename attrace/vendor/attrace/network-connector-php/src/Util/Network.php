<?php


namespace Attrace\Connector\Util;


use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\API\Controller\IntegrationConfigController;
use Attrace\Connector\API\Controller\TransactionController;
use Attrace\Connector\API\Model\ConfigModel;
use Attrace\Connector\API\Model\IntegrationConfigModel;
use Attrace\Connector\API\Model\TransactionModel;
use Attrace\Connector\Client;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Entity\Address;
use Attrace\Connector\Entity\Agreement;
use Attrace\Connector\Entity\ContractprotocolValue;
use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\Service\Operations\CreateRoot;
use Attrace\Connector\Service\Service;

class Network
{

    private static $network;

    /**
     * @param string $aliasId alias, as defined in integration config RedirectUrl: https://attrace-builds.s3.eu-central-1.amazonaws.com/protodocs/develop/core.html#integrations.RedirectUrl
     * @param array $meta Metadata array, this will be stored with the transaction, and passed on in the clickout to the shop
     * @param false $debug If true, click will not redirect but instead show a page with debug inforation
     * @param false $pulse If true, the click will not be published. Used for Attrace Pulse (ensuring tracking is online without publishing)
     * @param null $callback Callback function. This will be called after creating the transaction. First param of this function will be passed the transaction hash
     * @param array $args Additional arguments for the callback function (non-assoc array)
     */
    public static function clickAndRedirect($aliasId, $meta = [], $debug = false, $pulse = false, $callback = null, $args = [])
    {
        Perf::start('clickAndRedirect');
        $integrationConfigModel = IntegrationConfigController::getInstance()->getByHashId($aliasId);
        if (!$integrationConfigModel) {
            NetUtil::errorExit("Hash not found");
        }
        try {
            Perf::start('createClickTransaction');
            $tx = self::createClickTransaction($integrationConfigModel, $meta, $pulse);
            Perf::stop('createClickTransaction');

            // invoke callback
            if ($callback) {
                call_user_func_array($callback, array_merge([$tx->getHashBase32()] + $args));
            }

            Perf::start('publishTransaction');
            self::publishTransaction($tx);
            Perf::stop('publishTransaction');


            $redirect = Network::getRedirectUrl($integrationConfigModel->getRedirectUrl($aliasId), $tx, $integrationConfigModel->getProtocolIntegrationConfig()->getAgreement(), $meta);

            Perf::stop('clickAndRedirect');
            if (!$debug) {
                NetUtil::redirect($redirect);
            }


            self::printDebug($redirect, $tx);
        } catch (AttraceException $e) {
            NetUtil::errorExit($e->toString());
        }
    }

    /**
     * @param IntegrationConfigModel $integrationConfigModel
     * @param array $metadata
     * @param bool $pulse
     * @return TransactionModel
     * @throws AttraceException
     */
    public static function createClickTransaction(IntegrationConfigModel $integrationConfigModel, $metadata = [], $pulse = false)
    {
        Perf::start('CreateRootcreate', 'CreateRoot::create');
        $op = CreateRoot::create($integrationConfigModel->getAgreementAddress(), $integrationConfigModel->getDelegateOfAddress(), 'click');
        Perf::stop('CreateRootcreate');
        Perf::start('createSignedTransactionWithDelegator', 'createSignedTransactionWithDelegator');
        $tx = TransactionModel::createSignedTransactionWithDelegator($integrationConfigModel->getDelegateOfAddress(), $integrationConfigModel->getOperationalKeyAccount(), [$op]);

        //set pulse
        $tx->getProtocolTransaction()->setIsPulse($pulse);

        Perf::stop('createSignedTransactionWithDelegator');

        //set the metadata
        if (is_array($metadata) && count($metadata)) {
            $tx->setMetadata($metadata);
        }
        return $tx;
    }


    /**
     * @param IntegrationConfigModel $integrationConfigModel
     * @param $parentRootAddrString
     * @param string $action
     * @param null $conversionValue
     * @param array $metadata
     * @param boolean $pulse
     * @return TransactionModel
     * @throws AttraceException
     */
    public static function createConversionTransaction(IntegrationConfigModel $integrationConfigModel, $parentRootAddrString, $action = 'sale', $conversionValue = null, $metadata = [], $pulse = false)
    {
        $operationalKeyAccount = $integrationConfigModel->getOperationalKeyAccount();
        $delegateOfAddress     = $integrationConfigModel->getDelegateOfAddress();
        $agreementAddress      = $integrationConfigModel->getAgreementAddress();

        $parentRoot = Address::fromBase32($parentRootAddrString);

        $params = null;
        if ($conversionValue) {
            $params = [ContractprotocolValue::createValue(["Str" => $conversionValue . ""])];
        }

        $op = CreateRoot::create($agreementAddress, $delegateOfAddress, $action, $parentRoot, $params);

        $tx = TransactionModel::createSignedTransactionWithDelegator($delegateOfAddress, $operationalKeyAccount, [$op]);

        //set pulse
        $tx->getProtocolTransaction()->setIsPulse($pulse);

        //set the metadata
        $tx->setMetadata($metadata);

        return $tx;
    }

    /**
     * @return Client
     * @throws AttraceException
     */
    public static function getClient() {
        return new Client([Constants::CONFIG_ATTRACE_NETWORK => self::getNetwork()]);
    }


    /**
     * @return Service
     * @throws AttraceException
     */
    public static function getService() {
        return self::getClient()->getService();
    }


    /**
     * Get agreement based on Address
     *
     * @param Address $address
     * @return Agreement
     * @throws AttraceException
     */
    public static function getAgreement(Address $address) {
        return self::getService()->getAgreement($address);
    }

    /**
     * @param Address $party
     * @return Agreement[]
     * @throws AttraceException
     */
    public static function getAgreementsByParty(Address $party) {
        return self::getService()->getAgreementsByParty($party);
    }


    /**
     * @deprecated
     * @param Address $party
     * @return Agreement[]
     * @throws AttraceException
     */
    public static function getAgreementByParty(Address $party) {
        return self::getAgreementsByParty($party);
    }

    /**
     * @param Address $party
     * @param array $types
     * @param int $limit
     * @param int $offset
     * @return mixed
     * @throws AttraceException
     */
    public static function getTransactionsByParty(Address $party, array $types, $limit = 100, $offset = 0) {
        return self::getService()->getTransactionsByParty($party, $types, $limit, $offset);
    }

    /**
     * @param Address $party
     * @return mixed
     * @throws AttraceException
     */
    public static function getRootHistoryByAddress(Address $party) {
        return self::getService()->getRootHistoryByAddress($party);
    }

    /**
     * @param Agreement $agreement
     * @param array $types
     * @param int $limit
     * @param int $offset
     * @return mixed
     * @throws AttraceException
     */
    public static function getTransactionsByAgreement(Agreement $agreement, array $types, $limit = 100, $offset = 0) {
        return self::getService()->getTransactionsByAgreements([$agreement], $types, $limit, $offset);
    }


    /**
     * @param TransactionModel $tx
     * @throws AttraceException
     */
    public static function publishTransaction(TransactionModel $tx)
    {
        if ($tx->getProtocolTransaction()->getIsPulse()) {
            //pulse transaction, do not put on queue or publish;
            return;
        }
        $hasStore = TransactionController::getInstance()->getStorage()->hasStore();

        //if no storage, we just fire the transaction to the network once, no failover.
        if (!$hasStore) {
            self::getClient()->getService()->publishTransaction($tx);
            return;
        }

        Queue::addTxToQueue($tx);
        Queue::processTx();
    }

    /**
     * @param $redirectUrl
     * @param TransactionModel $tx
     * @param $agreementAddress
     * @param array $meta
     * @return string
     * @throws AttraceException
     */
    public static function getRedirectUrl($redirectUrl, TransactionModel $tx, $agreementAddress, $meta = [])
    {
        $hash           = $tx->getHashBase32();
        $blob           = Base32::encode($tx->getProtocolTransaction()->serializeToString());
        $addressForRoot = Address::forRootBase32($hash);

        $vars = [
            'A_AG' => $agreementAddress,
            'A_RT' => $addressForRoot->encodeBase32(),
            'atx'  => $blob,
        ];

        if (is_array($meta)) {
            foreach ($meta as $key => $value) {
                //never overwrite our own vars
                if (isset($vars[$key])) {
                    continue;
                }
                $vars[$key] = $value;
            }
        }

        return NetUtil::urlAddVars($redirectUrl, $vars);
    }

    public static function getNetwork()
    {
        if (!self::$network) {
            self::$network = ConfigController::getInstance()->get(ConfigModel::NETWORK);
        }
        return self::$network;
    }


    /**
     * Debug info on the click out
     *
     * @param string $redirect
     * @param TransactionModel $tx
     */
    public static function printDebug($redirect, TransactionModel $tx)
    {
        ?>
        <html lang="en">
        <head>
            <link rel="stylesheet" type="text/css"
                  href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
            <title>Attrace Debug</title>
            <?php Perf::getTimelineHeader(); ?>
        </head>
        <body>
        <div class="ui grid">
            <div class="four wide column"></div>
            <div class="eight wide column">
                <div class="ui horizontal divider">
                    Attrace PHP Connector V<?php echo Constants::VERSION ?>
                </div>
                <h1>DEBUG</h1>
                <h3>CREATE CLICK</h3>
                <a href="<?php echo $redirect ?>">Click-out link</a>
                <h3>RESULT PUBLISH TX</h3>
                <?php if($tx->getProtocolTransaction()->getIsPulse()): ?>
                    <strong>Pulse transaction, not published on network </strong>
                <?php else : ?>
                    <?php echo "<a href = \"https://explorer" . (Network::getNetwork() == 'testnet' ? '.testnet' : '') . ".attrace.com/transactions/" . $tx->getHashBase32() . "\">Check on network explorer</a>" ?>
                <?php endif; ?>
                <h3>PERFORMANCE</h3>
            </div>
            <div class="four wide column"></div>
        </div>
        <div style="padding: 30px 100px 20px 100px; margin: 5px 5px 5px 5px;">
            <?php Perf::getTimelineDiv() ?>
        </div>
        </body>
        </html>
        <?php
        exit;
    }


}