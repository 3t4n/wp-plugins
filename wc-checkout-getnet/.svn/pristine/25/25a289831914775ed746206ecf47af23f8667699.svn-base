<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by Atanas Angelov on 18-December-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace CoffeeCode\PhpParser\Lexer\TokenEmulator;

use CoffeeCode\PhpParser\PhpVersion;
use CoffeeCode\PhpParser\Token;

/** @internal */
abstract class TokenEmulator {
    abstract public function getPhpVersion(): PhpVersion;

    abstract public function isEmulationNeeded(string $code): bool;

    /**
     * @param Token[] $tokens Original tokens
     * @return Token[] Modified Tokens
     */
    abstract public function emulate(string $code, array $tokens): array;

    /**
     * @param Token[] $tokens Original tokens
     * @return Token[] Modified Tokens
     */
    abstract public function reverseEmulate(string $code, array $tokens): array;

    /** @param array{int, string, string}[] $patches */
    public function preprocessCode(string $code, array &$patches): string {
        return $code;
    }
}
