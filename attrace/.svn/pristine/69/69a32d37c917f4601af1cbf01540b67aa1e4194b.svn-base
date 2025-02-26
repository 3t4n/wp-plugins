<?php

namespace Attrace\Connector\API;

use Attrace\Connector\API\Controller\TransactionController;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Util\NetUtil;


class API_TransactionsHandler extends API_AbstractHandler
{
    public function __construct()
    {
        parent::__construct([
            Constants::HTTP_GET => Constants::AUTH_MONITOR,
            Constants::HTTP_DELETE => Constants::AUTH_ADMIN
        ]);
    }

    protected function processRequest()
    {
        switch (NetUtil::getHttpMethod()) {
            case Constants::HTTP_GET:
                $from = NetUtil::getCheckParam('From');
                if (!$from) {
                    NetUtil::errorExit('Missing from');
                }
                $to = NetUtil::getCheckParam('To');
                if (!$from) {
                    NetUtil::errorExit('Missing to');
                }

                $limit = NetUtil::getCheckParam('Limit');
                if (!$limit) {
                    $limit = Constants::TX_LIMIT;
                }

                $next = NetUtil::getCheckParam('Next');

                NetUtil::jsonResponse(TransactionController::getInstance()->getRawTransactionBatch($from, $to, $limit, $next ? $next : 0));
                break;
            case Constants::HTTP_DELETE:
                //TODO flush tx that have errors, even not enough retries.
                break;
        }


    }
}