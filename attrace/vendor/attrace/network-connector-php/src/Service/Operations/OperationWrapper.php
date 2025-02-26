<?php


namespace Attrace\Connector\Service\Operations;


use Attrace\Connector\Protocol\Core\Operation;
use Attrace\Connector\Util\Perf;

abstract class OperationWrapper
{
    /** @var Operation $operation */
    protected $operation;

    public function __construct()
    {
        Perf::start('newOperation');
        $this->operation =new Operation();
        Perf::stop('newOperation');
    }

    /**a
     * @return Operation
     */
    public function getOperation()
    {
        return $this->operation;
    }

}