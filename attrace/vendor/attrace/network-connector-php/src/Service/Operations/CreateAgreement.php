<?php


namespace Attrace\Connector\Service\Operations;


use Attrace\Connector\Entity\Address;
use Attrace\Connector\Protocol\Contractprotocol\ListMap;
use Attrace\Connector\Protocol\Core\OperationCreateAgreement;
use Attrace\Connector\Protocol\Core\OperationValue;

class CreateAgreement extends OperationWrapper
{
    /**
     *
     * @param Address[] $parties
     * @param ListMap $args
     * @param $compensationCurrency
     * @param $contractID
     * @param $confirmationDueInHours
     * @return CreateAgreement
     */
    public static function create(
        array $parties,
        ListMap $args,
        $compensationCurrency,
        $contractID,
        $confirmationDueInHours
    ) {
        $createAgreement = new CreateAgreement();

        $op = new OperationCreateAgreement();

        $partiesArr = [];

        /** @var Address $party */
        foreach ($parties as $party) {
            $partiesArr[] = $party->encodeBinary();
        }



        $op->setParties($partiesArr);
        $op->setContractId($contractID);
        $op->setArguments($args);
        $op->setCompensationCurrency($compensationCurrency);
        $op->setConfirmationDueInHours($confirmationDueInHours);

        $operationValue = new OperationValue();
        $operationValue->setCreateAgreement($op);
        $createAgreement->getOperation()->setValue($operationValue);
        return $createAgreement;
    }
}