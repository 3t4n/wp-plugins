<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by Atanas Angelov on 18-December-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace CoffeeCode\PhpParser\Node\Stmt;

use CoffeeCode\PhpParser\Node;

class Const_ extends Node\Stmt {
    /** @var Node\Const_[] Constant declarations */
    public array $consts;

    /**
     * Constructs a const list node.
     *
     * @param Node\Const_[] $consts Constant declarations
     * @param array<string, mixed> $attributes Additional attributes
     */
    public function __construct(array $consts, array $attributes = []) {
        $this->attributes = $attributes;
        $this->consts = $consts;
    }

    public function getSubNodeNames(): array {
        return ['consts'];
    }

    public function getType(): string {
        return 'Stmt_Const';
    }
}
