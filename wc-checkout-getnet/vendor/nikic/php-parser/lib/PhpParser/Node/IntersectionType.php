<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by Atanas Angelov on 18-December-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace CoffeeCode\PhpParser\Node;

class IntersectionType extends ComplexType {
    /** @var (Identifier|Name)[] Types */
    public array $types;

    /**
     * Constructs an intersection type.
     *
     * @param (Identifier|Name)[] $types Types
     * @param array<string, mixed> $attributes Additional attributes
     */
    public function __construct(array $types, array $attributes = []) {
        $this->attributes = $attributes;
        $this->types = $types;
    }

    public function getSubNodeNames(): array {
        return ['types'];
    }

    public function getType(): string {
        return 'IntersectionType';
    }
}
