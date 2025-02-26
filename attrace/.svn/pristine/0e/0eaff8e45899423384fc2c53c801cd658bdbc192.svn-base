<?php


namespace Attrace\Connector\API\Controller;


use Attrace\Connector\API\Model\TransactionModel;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Exceptions\AttraceException;

class TransactionController extends AbstractController
{
    private static $instance;

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new TransactionController();
        }
        return self::$instance;
    }

    /**
     * @return TransactionModel[]
     * @throws AttraceException
     */
    public function getTransactionsToProcess()
    {
        return $this->getStorage()->getTransactionsToProcess();
    }

    /**
     * @param $from
     * @param $to
     * @param int $limit
     * @param int $next
     * @return mixed
     * @throws AttraceException
     */
    public function getRawTransactionBatch($from, $to, $limit = Constants::TX_LIMIT, $next = 0)
    {
        return $this->getStorage()->getRawTransactionBatch($from, $to, $limit,  $next);
    }

    /**
     * @param $hash
     * @param $data
     * @return mixed
     * @throws AttraceException
     */
    public function setTransactionFields($hash, $data)
    {
        return $this->getStorage()->setTransactionFields($hash, $data);
    }
}