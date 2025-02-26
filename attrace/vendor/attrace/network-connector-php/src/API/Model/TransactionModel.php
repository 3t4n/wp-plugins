<?php


namespace Attrace\Connector\API\Model;


use Attrace\Connector\Entity\Account;
use Attrace\Connector\Entity\Address;
use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\Protocol\Core\Operations;
use Attrace\Connector\Protocol\Core\Transaction as ProtocolTransaction;
use Attrace\Connector\Service\Operations\OperationWrapper;
use Attrace\Connector\Util\Base32;
use Attrace\Connector\Util\Crypto;
use Attrace\Connector\Util\Hash;
use Attrace\Connector\Util\Util;
use Exception;


class TransactionModel implements ModelInterface
{

    /** @var ProtocolTransaction $protocolTransaction */
    private $protocolTransaction;

    /** @var array $metadata*/
    private $metadata;


    private $retries = 0;




    /**
     * @param $binary
     * @return TransactionModel
     * @throws AttraceException
     */
    public static function createFromBase32($binary)
    {
        return self::createFromBase32(Base32::decode($binary));
    }

    /**
     * @param $binary
     * @return TransactionModel
     * @throws AttraceException
     */
    public static function createFromBinary($binary)
    {
        $transaction = new ProtocolTransaction();
        try {
            $transaction->mergeFromString($binary);
        } catch (Exception $e) {
            throw new AttraceException(AttraceException::PROTOBUF_EXCEPTION, "Protobuf binary merge error");
        }
        $obj = new TransactionModel();
        $obj->setProtocolTransaction($transaction);
        return $obj;
    }


    /**
     * @param Address $delegatorAddress
     * @param Account $delegatee
     * @param $operations
     * @param null $ts
     * @return TransactionModel
     * @throws AttraceException
     */
    public static function createSignedTransactionWithDelegator(Address $delegatorAddress, Account $delegatee, $operations, $ts = null)
    {
        if (!$ts) {
            $ts = Util::getCurrentTimeMs();
        }

        $ops = [];
        /** @var OperationWrapper $operation */
        foreach ($operations as $operation) {
            $ops[] = $operation->getOperation();
        }


        $txHash = self::createTxHash($delegatorAddress->encodeBinary(), $delegatee->getAddress()->encodeBinary(), $ts, $ops);


        $transaction = new ProtocolTransaction();
        $transaction->setSourceAddress($delegatorAddress->encodeBinary());
        $transaction->setOperations($ops);
        $transaction->setTimestamp($ts);
        $transaction->setHash(Crypto::byteArrayToBinary($txHash));
        $transaction->setCreateAccount($delegatee->getAddress()->encodeBinary());

        $signBytes = array_merge($txHash, $delegatorAddress->getBytes());


        $signature = $delegatee->sign($signBytes);
        $transaction->setSignature(Crypto::byteArrayToBinary($signature));



        $obj = new TransactionModel();
        $obj->setProtocolTransaction($transaction);

        return $obj;

    }

    /**
     * @param Account $sourceAccount
     * @param array $operations
     * @param null $ts timestamp
     * @param bool $returnHash for phpunit testing
     * @return array|TransactionModel|string
     * @throws AttraceException
     */
    public static function createSigned(Account $sourceAccount, $operations, $ts = null, $returnHash = false)
    {
        if (!$ts) {
            $ts = Util::getCurrentTimeMs();
        }

        $ops = [];
        /** @var OperationWrapper $operation */
        foreach ($operations as $operation) {
            $ops[] = $operation->getOperation();
        }


        $txHash = self::createTxHash($sourceAccount->getAddress()->encodeBinary(), null, $ts, $ops);

        //for unit testing only
        if ($returnHash) {
            return $txHash;
        }


        $transaction = new ProtocolTransaction();
        $transaction->setSourceAddress($sourceAccount->getAddress()->encodeBinary());
        $transaction->setOperations($ops);
        $transaction->setTimestamp($ts);
        $transaction->setHash(Crypto::byteArrayToBinary($txHash));

        $signBytes = array_merge($txHash, $sourceAccount->getAddress()->getBytes());
        $signature = $sourceAccount->sign($signBytes);
        $transaction->setSignature(Crypto::byteArrayToBinary($signature));


        $obj = new TransactionModel();
        $obj->setProtocolTransaction($transaction);

        return $obj;
    }

    private static function createTxHash($addresBinary, $creatorBinary, $timestamp, array $ops)
    {

        $operations = new Operations();
        $operations->setValues($ops);

        $opBinary = $operations->serializeToString();

        $nonceBinary     = Crypto::intToLittleEndian64BitBinary(0);
        $timestampBinary = Crypto::intToLittleEndian64BitBinary($timestamp);

        $hashParties = [$addresBinary, $nonceBinary, $timestampBinary, $opBinary];
        if ($creatorBinary) {
            $hashParties[] = $creatorBinary;
        }
        return Hash::sha256multi($hashParties);

    }

    /**
     * @return ProtocolTransaction
     */
    public function getProtocolTransaction()
    {
        return $this->protocolTransaction;
    }

    /**
     * @param ProtocolTransaction $protocolTransaction
     */
    public function setProtocolTransaction($protocolTransaction)
    {
        $this->protocolTransaction = $protocolTransaction;
    }


    /**
     * @return array
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param array $metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
    }

    public function getHash()
    {
        return $this->protocolTransaction->getHash();
    }

    public function getHashBase32()
    {
        return Base32::encode($this->getHash());
    }


    /**
     * @return int
     */
    public function getRetries()
    {
        return $this->retries;
    }

    /**
     * @param int $retries
     */
    public function setRetries($retries)
    {
        $this->retries = $retries;
    }

    public function toArray()
    {
        return json_decode($this->getProtocolTransaction()->serializeToJsonString(), true);
    }
}
