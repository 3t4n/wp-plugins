<?php

namespace Attrace\Connector\API;

use Attrace\Connector\API\Controller\IntegrationConfigController;
use Attrace\Connector\API\Model\IntegrationConfigModel;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\Util\NetUtil;
use Attrace\Connector\Util\Util;
use Exception;


class API_IntegrationConfigHandler extends API_AbstractHandler
{

    public function __construct()
    {
        parent::__construct(
            [
                //no auth
                Constants::HTTP_GET    => Constants::AUTH_MONITOR,
                Constants::HTTP_POST   => Constants::AUTH_ADMIN,
                Constants::HTTP_DELETE => Constants::AUTH_ADMIN,
                Constants::HTTP_PUT    => Constants::AUTH_ADMIN,
            ]
        );
    }


    protected function processRequest()
    {


        /** @var IntegrationConfigModel[] $integrationConfigs */

        switch (NetUtil::getHttpMethod()) {
            case Constants::HTTP_GET:
            {
                $id = $this->getId();
                if (!$id) {
                    //show all of them
                    $limit = NetUtil::getCheckParam('limit');
                    $next  = NetUtil::getCheckParam('Next');
                    NetUtil::jsonResponse(IntegrationConfigController::getInstance()->getRawIntegrationConfigBatch($limit ? $limit : 10, $next ? $next : 0));
                }
                $integrationConfig = IntegrationConfigController::getInstance()->get($id);
                if (!$integrationConfig) {
                    NetUtil::errorExit('Integration-config  ' . $id . ' not found');
                }
                NetUtil::jsonResponse($integrationConfig);
                break;
            }
            case Constants::HTTP_DELETE:
            {
                $id = $this->getId();
                if (!$id) {
                    NetUtil::errorExit('Delete integration-config needs an identifier');
                }
                //looking for one agreement
                $integrationConfig = IntegrationConfigController::getInstance()->get($id);
                if (!$integrationConfig) {
                    NetUtil::errorExit('Integration-config  ' . $id . ' not found');
                }
                IntegrationConfigController::getInstance()->delete($id);
                NetUtil::jsonResponse(['Integration-config  deleted']);
                break;
            }
            case Constants::HTTP_PUT:
            {
                //we only return publisher agreements with this
                $id = $this->getId();
                if (!$id) {
                    NetUtil::errorExit('Delete integration-config needs an identifier');
                }
                /** @var IntegrationConfigModel $integrationConfig */
                $integrationConfig = IntegrationConfigController::getInstance()->get($id);
                if (!$integrationConfig) {
                    NetUtil::errorExit('Integration-config  ' . $id . ' not found');
                }

                $arrayConfig  = $integrationConfig->toArray();
                $dataToUpdate = NetUtil::getJsonRequestBody();

                //this should be recursive or so but i'm lazy today.
                foreach ($dataToUpdate as $key => $value) {
                    if (!is_array($value)) {
                        $arrayConfig[$key] = $value;
                        continue;
                    }
                    foreach ($value as $key2 => $value2) {
                        if (!is_array($value2)) {
                            $arrayConfig[$key][$value2] = $value;
                            continue;
                        }
                        foreach ($value2 as $key3 => $value3) {
                            if (!is_array($value2)) {
                                $arrayConfig[$key][$value3] = $value;
                                continue;
                            }
                        }
                    }
                }
                try {
                    $integrationConfig->getProtocolIntegrationConfig()->mergeFromJsonString($arrayConfig);
                    IntegrationConfigController::getInstance()->set($integrationConfig->getUniqueKey(), $integrationConfig);
                } catch (Exception $e) {
                    NetUtil::errorExit($e->getMessage());
                }

                NetUtil::jsonResponse(['Integration-config  updated']);
                break;
            }
            case Constants::HTTP_POST:
            {
                $inputIntegrationConfig = NetUtil::getJsonRequestBody();
                if (!$inputIntegrationConfig) {
                    NetUtil::errorExit('Missing agreement body');
                }

                //backwards compatibility with posting it as an array. To be removed
                if (!Util::isAssoc($inputIntegrationConfig)) {
                    $inputIntegrationConfig = $inputIntegrationConfig[0];
                }


                try {
                    $integrationConfig = new IntegrationConfigModel(json_encode($inputIntegrationConfig));
                    if (!$integrationConfig->getProtocolIntegrationConfig()->getName()) {
                        $integrationConfig->getProtocolIntegrationConfig()->setName('Remote Agreement ' . date("d-m-y"));
                    }
                    if (!$integrationConfig->getProtocolIntegrationConfig()->getAgreement()) {
                        //something went wrong
                        NetUtil::errorExit('Invalid integration config');
                    }
                    if (IntegrationConfigController::getInstance()->get($integrationConfig->getUniqueKey())) {
                        NetUtil::errorExit('Agreement with unique ID '.$integrationConfig->getUniqueKey() . ' already exists', 403);
                    }

                    IntegrationConfigController::getInstance()->set($integrationConfig->getUniqueKey(), $integrationConfig);


                    $link = sprintf('%s/%s/%s', NetUtil::getDomainUrl(), $this->getClickoutSlug(), $integrationConfig->getFirstAlias());

                    $res =
                        [
                            'id'           => $integrationConfig->getUniqueKey(),
                            'agreement'    => $integrationConfig->getProtocolIntegrationConfig()->getAgreement(),
                            'delegate_of'  => $integrationConfig->getProtocolIntegrationConfig()->getDelegateOf(),
                            'link'         => $link,
                            'redirect_url' => $integrationConfig->getRedirectUrl()
                        ];
                    NetUtil::jsonResponse($res);
                    //removed confirmed check for now
//                        $client = new Client([Constants::CONFIG_ATTRACE_NETWORK => $integrationConfig->getNetwork()]);
//                        $networkAgreement = $client->getService()->getAgreement($integrationConfig->getAgreementAddress());
//                        $confirmedParties = $networkAgreement->getConfirmedParties();
//                        if (!in_array($this->address, $confirmedParties)) {
//                            $res['warning'] = 'Integration-config  not confirmed by owner ' . $this->address;
//                            $res['peer'] = $client->getService()->getSelectedWitness()->getHttpConnectionString();
//                        }
                } catch (Exception $e) {
                    NetUtil::errorExit($e->getFile() . ' L' . $e->getLine() . ': ' . $e->getMessage(), 400, $e->getTraceAsString());
                }

                break;
            }
            default:
            {
                NetUtil::errorExit("Unknown http method");
            }
        }
    }
}