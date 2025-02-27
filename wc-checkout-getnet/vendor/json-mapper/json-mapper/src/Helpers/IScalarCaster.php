<?php
/**
 * @license MIT
 *
 * Modified by Atanas Angelov on 18-December-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */

declare(strict_types=1);

namespace CoffeeCode\JsonMapper\Helpers;

use CoffeeCode\JsonMapper\Enums\ScalarType;

interface IScalarCaster
{
    /** @return string|bool|int|float */
    public function cast(ScalarType $scalarType, $value);
}
