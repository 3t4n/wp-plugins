<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by Atanas Angelov on 18-December-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace CoffeeCode\PhpParser\Node\Stmt;

use CoffeeCode\PhpParser\Node;

class Break_ extends Node\Stmt {
    /** @var null|Node\Expr Number of loops to break */
    public ?Node\Expr $num;

    /**
     * Constructs a break node.
     *
     * @param null|Node\Expr $num Number of loops to break
     * @param array<string, mixed> $attributes Additional attributes
     */
    public function __construct(?Node\Expr $num = null, array $attributes = []) {
        $this->attributes = $attributes;
        $this->num = $num;
    }

    public function getSubNodeNames(): array {
        return ['num'];
    }

    public function getType(): string {
        return 'Stmt_Break';
    }
}
