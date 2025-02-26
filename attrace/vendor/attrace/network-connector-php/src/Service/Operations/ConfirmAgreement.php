<?php


namespace Attrace\Connector\Service\Operations;


use Attrace\Connector\Entity\Address;
use Attrace\Connector\Protocol\Core\OperationConfirmAgreement;
use Attrace\Connector\Protocol\Core\OperationValue;

class ConfirmAgreement extends OperationWrapper
{
    /**
     *
     * @param Address $agreement
     * @return ConfirmAgreement
     */
    public static function create(Address $agreement)
    {
        $confirmAgreement = new ConfirmAgreement();

        $op = new OperationConfirmAgreement();
        $op->setAgreement($agreement->encodeBinary());

        $operationValue = new OperationValue();
        $operationValue->setConfirmAgreement($op);
        $confirmAgreement->getOperation()->setValue($operationValue);
        return $confirmAgreement;
    }
}