<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by Atanas Angelov on 18-December-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace CoffeeCode\PhpParser\Node\Stmt;

use CoffeeCode\PhpParser\Node;

class Switch_ extends Node\Stmt {
    /** @var Node\Expr Condition */
    public Node\Expr $cond;
    /** @var Case_[] Case list */
    public array $cases;

    /**
     * Constructs a case node.
     *
     * @param Node\Expr $cond Condition
     * @param Case_[] $cases Case list
     * @param array<string, mixed> $attributes Additional attributes
     */
    public function __construct(Node\Expr $cond, array $cases, array $attributes = []) {
        $this->attributes = $attributes;
        $this->cond = $cond;
        $this->cases = $cases;
    }

    public function getSubNodeNames(): array {
        return ['cond', 'cases'];
    }

    public function getType(): string {
        return 'Stmt_Switch';
    }
}
