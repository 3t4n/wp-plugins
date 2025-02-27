<?php
/**
 * @license MIT
 *
 * Modified by Atanas Angelov on 18-December-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */

declare(strict_types=1);

namespace CoffeeCode\JsonMapper\Middleware;

use CoffeeCode\JsonMapper\JsonMapperInterface;
use CoffeeCode\JsonMapper\ValueObjects\PropertyMap;
use CoffeeCode\JsonMapper\Wrapper\ObjectWrapper;

abstract class AbstractMiddleware implements MiddlewareInterface, MiddlewareLogicInterface
{
    public function __invoke(callable $handler): callable
    {
        return function (
            \stdClass $json,
            ObjectWrapper $object,
            PropertyMap $map,
            JsonMapperInterface $mapper
        ) use (
            $handler
        ) {
            $this->handle($json, $object, $map, $mapper);

            $handler($json, $object, $map, $mapper);
        };
    }

    abstract public function handle(
        \stdClass $json,
        ObjectWrapper $object,
        PropertyMap $propertyMap,
        JsonMapperInterface $mapper
    ): void;
}
