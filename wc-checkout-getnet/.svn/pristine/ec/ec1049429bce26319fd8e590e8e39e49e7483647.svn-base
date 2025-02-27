<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by Atanas Angelov on 18-December-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace CoffeeCode\PhpParser\Node\Scalar;

use CoffeeCode\PhpParser\Node\Expr;
use CoffeeCode\PhpParser\Node\InterpolatedStringPart;
use CoffeeCode\PhpParser\Node\Scalar;

class InterpolatedString extends Scalar {
    /** @var (Expr|InterpolatedStringPart)[] list of string parts */
    public array $parts;

    /**
     * Constructs an interpolated string node.
     *
     * @param (Expr|InterpolatedStringPart)[] $parts Interpolated string parts
     * @param array<string, mixed> $attributes Additional attributes
     */
    public function __construct(array $parts, array $attributes = []) {
        $this->attributes = $attributes;
        $this->parts = $parts;
    }

    public function getSubNodeNames(): array {
        return ['parts'];
    }

    public function getType(): string {
        return 'Scalar_InterpolatedString';
    }
}

// @deprecated compatibility alias
class_alias(InterpolatedString::class, Encapsed::class);
