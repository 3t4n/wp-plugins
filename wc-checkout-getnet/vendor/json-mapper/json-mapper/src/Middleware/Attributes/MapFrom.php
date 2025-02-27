<?php
/**
 * @license MIT
 *
 * Modified by Atanas Angelov on 18-December-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */

declare(strict_types=1);

namespace CoffeeCode\JsonMapper\Middleware\Attributes;

use Attribute;

#[Attribute]
class MapFrom
{
    /** @var string */
    public $source;

    public function __construct(string $source)
    {
        $this->source = $source;
    }
}
