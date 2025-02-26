<?php


namespace Attrace\Connector\Service\Operations;


use Attrace\Connector\Entity\Address;
use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\Protocol\Core\OperationTransferValue;
use Attrace\Connector\Protocol\Core\OperationValue;
use Attrace\Connector\Util\Crypto;

class TransferValue extends OperationWrapper
{

    /**
     * WARNING TODO: when int is bigger that 32767 * 2 (max of uint16), hash is corrupt
     *
     * @param Address $fromAddress
     * @param Address $toAddress
     * @param $int
     * @return TransferValue
     * @throws AttraceException
     */
    public static function create(Address $fromAddress, Address $toAddress, $int)
    {
        //TODO: we have a problem with big integers
        if ($int >65500) {
            throw new AttraceException(AttraceException::BUG_INTEGER_TO_BIG, "Issue with integers bigger than 65535");
        }

        $transValue = new TransferValue();

        $transop = new OperationTransferValue();
        $transop->setFromAddr($fromAddress->encodeBinary());
        $transop->setToAddr($toAddress->encodeBinary());
        $transop->setValue(Crypto::intToBinary($int));

        $operationValue = new OperationValue();
        $operationValue->setTransferValue($transop);
        $transValue->getOperation()->setValue($operationValue);
        return $transValue;
    }

}