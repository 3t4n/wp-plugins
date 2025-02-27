<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by Atanas Angelov on 18-December-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace CoffeeCode\PhpParser\Node\Expr;

use CoffeeCode\PhpParser\Node\ArrayItem;
use CoffeeCode\PhpParser\Node\Expr;

class Array_ extends Expr {
    // For use in "kind" attribute
    public const KIND_LONG = 1;  // array() syntax
    public const KIND_SHORT = 2; // [] syntax

    /** @var ArrayItem[] Items */
    public array $items;

    /**
     * Constructs an array node.
     *
     * @param ArrayItem[] $items Items of the array
     * @param array<string, mixed> $attributes Additional attributes
     */
    public function __construct(array $items = [], array $attributes = []) {
        $this->attributes = $attributes;
        $this->items = $items;
    }

    public function getSubNodeNames(): array {
        return ['items'];
    }

    public function getType(): string {
        return 'Expr_Array';
    }
}
