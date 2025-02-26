<?php


namespace Attrace\Connector\Service\Operations;


use Attrace\Connector\Entity\Address;
use Attrace\Connector\Protocol\Contractprotocol\Value;
use Attrace\Connector\Protocol\Core\ActionCall;
use Attrace\Connector\Protocol\Core\OperationCreateRoot;
use Attrace\Connector\Protocol\Core\OperationValue;

class CreateRoot extends OperationWrapper
{
    /**
     *
     * @param Address $agreementAddress
     * @param Address $sourceAccountAddress
     * @param $action
     * @param Address $parentRootAddress
     * @param Value[] $params
     * @return CreateRoot
     */
    public static function create(Address $agreementAddress, Address $sourceAccountAddress, $action, Address $parentRootAddress = null, array $params = null)
    {
        $createRoot = new CreateRoot();

        $op = new OperationCreateRoot();
        $op->setAgreement($agreementAddress->encodeBinary());
        $op->setSourceAccount($sourceAccountAddress->encodeBinary());
        if ($parentRootAddress) {
            $op->setParentRootAddress($parentRootAddress->encodeBinary());
        }
        $actionCall = new ActionCall();
        $actionCall->setAction($action);
        if ($params) {
            $actionCall->setParams($params);
        }
        $op->setActionCall($actionCall);

        $operationValue = new OperationValue();
        $operationValue->setCreateRoot($op);
        $createRoot->getOperation()->setValue($operationValue);
        return $createRoot;
    }
}