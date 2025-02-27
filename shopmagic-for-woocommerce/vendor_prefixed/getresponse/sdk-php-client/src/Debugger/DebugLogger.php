<?php

namespace ShopMagicVendor\Getresponse\Sdk\Client\Debugger;

use ShopMagicVendor\Psr\Log\LoggerInterface;
use ShopMagicVendor\Psr\Log\LoggerTrait;
use ShopMagicVendor\Psr\Log\LogLevel;
/**
 * Class DebugLogger
 * @package Getresponse\Sdk\Client\Debugger
 */
class DebugLogger implements LoggerInterface
{
    use LoggerTrait;
    /**
     * @var DataCollector
     */
    private $dataCollector;
    /**
     * DebugLogger constructor.
     * @param DataCollector $dataCollector
     */
    public function __construct(DataCollector $dataCollector)
    {
        $this->dataCollector = $dataCollector;
    }
    /**
     * @inheritDoc
     */
    public function debug($message, array $context = []): void
    {
        if (isset($context['request']) && !isset($context['response'])) {
            $this->dataCollector->collectRequest($context['request']);
        }
        if (isset($context['response'])) {
            $request = isset($context['request']) ? $context['request'] : null;
            $info = isset($context['info']) ? $context['info'] : null;
            $this->dataCollector->collectResponse($context['response'], $request, $info);
        }
    }
    /**
     * @inheritDoc
     */
    public function log($level, $message, array $context = []): void
    {
        if (LogLevel::DEBUG) {
            $this->debug($message, $context);
        }
    }
}
