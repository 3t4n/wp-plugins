<?php

namespace Skautis_Integration\Vendor\Skautis\Wsdl\Decorator;

use Skautis_Integration\Vendor\Skautis\Wsdl\WebServiceInterface;
abstract class AbstractDecorator implements WebServiceInterface
{
    /**
     * @WebServiceInterface
     */
    protected $webService;
    /**
     * @inheritdoc
     */
    public abstract function call($functionName, array $arguments = []);
    /**
     * @inheritdoc
     */
    public function __call($functionName, $arguments)
    {
        return $this->call($functionName, $arguments);
    }
    /**
     * @inheritdoc
     */
    public function subscribe($eventName, callable $callback)
    {
        $this->webService->subscribe($eventName, $callback);
    }
}
