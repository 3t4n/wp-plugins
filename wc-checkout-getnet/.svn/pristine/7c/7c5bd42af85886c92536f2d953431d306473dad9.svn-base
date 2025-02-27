<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by Atanas Angelov on 18-December-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace CoffeeCode\PhpParser\Node;

use CoffeeCode\PhpParser\Node;
use CoffeeCode\PhpParser\NodeAbstract;

class DeclareItem extends NodeAbstract {
    /** @var Node\Identifier Key */
    public Identifier $key;
    /** @var Node\Expr Value */
    public Expr $value;

    /**
     * Constructs a declare key=>value pair node.
     *
     * @param string|Node\Identifier $key Key
     * @param Node\Expr $value Value
     * @param array<string, mixed> $attributes Additional attributes
     */
    public function __construct($key, Node\Expr $value, array $attributes = []) {
        $this->attributes = $attributes;
        $this->key = \is_string($key) ? new Node\Identifier($key) : $key;
        $this->value = $value;
    }

    public function getSubNodeNames(): array {
        return ['key', 'value'];
    }

    public function getType(): string {
        return 'DeclareItem';
    }
}

// @deprecated compatibility alias
class_alias(DeclareItem::class, Stmt\DeclareDeclare::class);
