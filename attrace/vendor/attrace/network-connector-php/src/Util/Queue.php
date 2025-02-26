<?php

namespace Attrace\Connector\Util;

use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\API\Controller\TransactionController;
use Attrace\Connector\API\Model\ConfigModel;
use Attrace\Connector\API\Model\TransactionModel;
use Attrace\Connector\Client;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Exceptions\AttraceException;


class Queue
{

    protected static $callback;

    /**
     * Add the transaction to the transaction queue table
     *
     * @param TransactionModel $tx
     */
    public static function addTxToQueue(TransactionModel $tx)
    {
        if ($tx->getProtocolTransaction()->getIsPulse()) {
            return;
        }
        TransactionController::getInstance()->set($tx->getHashBase32(), $tx);
    }


    /**
     * Create the transaction, and push it on the queue
     *
     * @return array
     */
    public static function processTx()
    {
        if (ConfigController::getInstance()->get(ConfigModel::NETWORK_BROADCAST_STRATEGY) == ConfigModel::NETWORK_BROADCAST_STRATEGY_QUEUE) {
            $performance['cron_scheduled'] = 'yes';

            //invoke the queue through callable
            if (self::$callback) {
                call_user_func(self::$callback);
            }

        } else {
            $performance['cron_scheduled'] = 'no';
            $error = self::processTransactionQueue();
            $performance['executed'] = 'true';
            if ($error) {
                $performance['error'] = $error;
            }
        }
        return $performance;
    }

    /**
     * Process transactions that are on the queue.
     * This is either invoked directly, or by a one time or hourly job to ensure transactions arrive
     *
     * @return array
     */
    private static function processTransactionQueue()
    {

        $errors = [];
        /** @var TransactionModel[] $transactions */
        $transactions = TransactionController::getInstance()->getTransactionsToProcess();
        foreach ($transactions as $index => $tx) {
            try {
                $client = new Client([Constants::CONFIG_ATTRACE_NETWORK => Network::getNetwork()]);
                $client->getService()->publishTransaction($tx);
                TransactionController::getInstance()->setTransactionFields($tx->getHashBase32(), ['synced' => 1]);
            } catch (AttraceException $e) {
                TransactionController::getInstance()->setTransactionFields($tx->getHashBase32(), ['retries' => $tx->getRetries() + 1, 'error' => $e->toString()]);
                $errors[] = $tx->getHashBase32() . ' (retry ' . ($tx->getRetries() + 1) . ') :' . $e->toString();
            }
        }
        return $errors;
    }

    public static function setCallable($function)
    {
        self::$callback = $function;
    }


}