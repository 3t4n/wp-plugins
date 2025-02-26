<?php

declare (strict_types=1);
namespace MuzaPayDeps\DI;

use MuzaPayDeps\Psr\Container\ContainerExceptionInterface;
/**
 * Exception for the Container.
 */
class DependencyException extends \Exception implements ContainerExceptionInterface
{
}
