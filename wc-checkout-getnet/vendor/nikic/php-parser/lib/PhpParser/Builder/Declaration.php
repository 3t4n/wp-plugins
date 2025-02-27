<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by Atanas Angelov on 18-December-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace CoffeeCode\PhpParser\Builder;

use CoffeeCode\PhpParser;
use CoffeeCode\PhpParser\BuilderHelpers;

abstract class Declaration implements CoffeeCode\PhpParser\Builder {
    /** @var array<string, mixed> */
    protected array $attributes = [];

    /**
     * Adds a statement.
     *
     * @param CoffeeCode\PhpParser\Node\Stmt|CoffeeCode\PhpParser\Builder $stmt The statement to add
     *
     * @return $this The builder instance (for fluid interface)
     */
    abstract public function addStmt($stmt);

    /**
     * Adds multiple statements.
     *
     * @param (CoffeeCode\PhpParser\Node\Stmt|CoffeeCode\PhpParser\Builder)[] $stmts The statements to add
     *
     * @return $this The builder instance (for fluid interface)
     */
    public function addStmts(array $stmts) {
        foreach ($stmts as $stmt) {
            $this->addStmt($stmt);
        }

        return $this;
    }

    /**
     * Sets doc comment for the declaration.
     *
     * @param CoffeeCode\PhpParser\Comment\Doc|string $docComment Doc comment to set
     *
     * @return $this The builder instance (for fluid interface)
     */
    public function setDocComment($docComment) {
        $this->attributes['comments'] = [
            BuilderHelpers::normalizeDocComment($docComment)
        ];

        return $this;
    }
}
