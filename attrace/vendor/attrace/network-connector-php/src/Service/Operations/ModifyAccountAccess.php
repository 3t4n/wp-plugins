<?php


namespace Attrace\Connector\Service\Operations;


use Attrace\Connector\Entity\Address;
use Attrace\Connector\Protocol\Core\OperationModifyAccountAccess;
use Attrace\Connector\Protocol\Core\OperationModifyAccountAccess\AccessScope;
use Attrace\Connector\Protocol\Core\OperationModifyAccountAccess\AccessScope\BlockScope;
use Attrace\Connector\Protocol\Core\OperationModifyAccountAccess\AccessScope\TXScope;
use Attrace\Connector\Protocol\Core\OperationValue;

class ModifyAccountAccess extends OperationWrapper
{
    /**
     *
     * @param Address $delegatee address who gets the permissions
     * @param TXScope $txPermissions
     * @param BlockScope $blockPermissions
     * @return ModifyAccountAccess
     */
    public static function create(Address $delegatee, TXScope $txPermissions = null, BlockScope $blockPermissions = null)
    {
        $modifyAccountAccess = new ModifyAccountAccess();

        $op         = new OperationModifyAccountAccess();

        $accessScope = new AccessScope();
        $accessScope->setDelegatee($delegatee->encodeBinary());
        if ($txPermissions) {
            $accessScope->setTXPermission($txPermissions);
        }

        if ($blockPermissions) {
            $accessScope->setBlockPermission($blockPermissions);
        }

        $op->setGrantScope($accessScope);
        $operationValue = new OperationValue();
        $operationValue->setModifyAccountAccess($op);
        $modifyAccountAccess->getOperation()->setValue($operationValue);
        return $modifyAccountAccess;
    }
}