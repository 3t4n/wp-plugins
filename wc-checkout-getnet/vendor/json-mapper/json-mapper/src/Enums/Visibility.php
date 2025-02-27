<?php
/**
 * @license MIT
 *
 * Modified by Atanas Angelov on 18-December-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */

declare(strict_types=1);

namespace CoffeeCode\JsonMapper\Enums;

use CoffeeCode\MyCLabs\Enum\Enum;

/**
 * @method static Visibility PUBLIC()
 * @method static Visibility PROTECTED()
 * @method static Visibility PRIVATE()
 *
 * @psalm-immutable
 */
class Visibility extends Enum
{
    private const PUBLIC = 'public';
    private const PROTECTED = 'protected';
    private const PRIVATE = 'private';

    public static function fromReflectionProperty(\ReflectionProperty $property): self
    {
        if ($property->isPublic()) {
            return self::PUBLIC();
        }
        if ($property->isProtected()) {
            return self::PROTECTED();
        }
        return self::PRIVATE();
    }
}
