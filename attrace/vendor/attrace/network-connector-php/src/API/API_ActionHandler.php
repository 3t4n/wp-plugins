<?php
namespace Attrace\Connector\API;

use Attrace\Connector\API\Controller\IntegrationConfigController;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\Util\NetUtil;
use Attrace\Connector\Util\Network;


class API_ActionHandler extends API_AbstractHandler
{



    /**
     * Initializes all of the partial classes.
     *
     */
    public function __construct()
    {
        parent::__construct(
            [
                //no auth
                Constants::HTTP_GET  => Constants::AUTH_NONE,
            ]
        );
    }

    protected function processRequest()
    {

        $agreementAddrString = NetUtil::getCheckParam('Agreement');
        $parentRoot          = NetUtil::getCheckParam('ParentRoot');
        $userDefinedAction   = NetUtil::getCheckParam('Action');

        $pulse   = NetUtil::getCheckParam('Pulse');

        if (!$agreementAddrString) {
            NetUtil::errorExit('Missing agreement');
        }

        if ($userDefinedAction && !$parentRoot) {
            NetUtil::errorExit('Missing parent root');
        }

        $integrationConfigModel = IntegrationConfigController::getInstance()->getByAgreementAndType($agreementAddrString, Constants::ROLE_ADVERTISER);


        if (!$integrationConfigModel) {
            NetUtil::errorExit('Could not find integration config for agreement '.$agreementAddrString.' and with role '.Constants::ROLE_ADVERTISER);
        }

        $action = $userDefinedAction ? $userDefinedAction  : $integrationConfigModel->getProtocolIntegrationConfig()->getDefaultActionRootType();

        if (!$action) {
            NetUtil::errorExit('No action defined');
        }

        //TODO Implement if there are more Param values
        $saleValue   = NetUtil::getCheckParam('Param');


        $metadata = [];
        //getRemainingVars
        foreach ($_GET as $key => $value) {
            //skip reserved keywords, except of saleValue
            if (in_array($key,['Agreement','ParentRoot','Action', 'Param', 'Pulse'])) {
                continue;
            }
            $checkedValue = NetUtil::getCheckParam($key);
            if (is_bool($checkedValue) && !$checkedValue) {
                continue;
            }

            $metadata[$key] = $checkedValue;
        }

        try {
            $tx = Network::createConversionTransaction($integrationConfigModel, $parentRoot, $action, $saleValue, $metadata, $pulse);
            Network::publishTransaction($tx);
            NetUtil::jsonResponse($tx->toArray());
        } catch (AttraceException $e) {
            NetUtil::errorExit('Error creating root: ' . $e->toString(), 500);

        }
    }

}