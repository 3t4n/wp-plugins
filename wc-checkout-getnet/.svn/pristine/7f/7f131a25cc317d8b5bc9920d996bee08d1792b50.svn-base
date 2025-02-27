<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by Atanas Angelov on 18-December-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace CoffeeCode\PhpParser\Lexer\TokenEmulator;

use CoffeeCode\PhpParser\PhpVersion;

/*
 * In PHP 8.1, "readonly(" was special cased in the lexer in order to support functions with
 * name readonly. In PHP 8.2, this may conflict with readonly properties having a DNF type. For
 * this reason, PHP 8.2 instead treats this as T_READONLY and then handles it specially in the
 * parser. This emulator only exists to handle this special case, which is skipped by the
 * PHP 8.1 ReadonlyTokenEmulator.
 */
class ReadonlyFunctionTokenEmulator extends KeywordEmulator {
    public function getKeywordString(): string {
        return 'readonly';
    }

    public function getKeywordToken(): int {
        return \T_READONLY;
    }

    public function getPhpVersion(): PhpVersion {
        return PhpVersion::fromComponents(8, 2);
    }

    public function reverseEmulate(string $code, array $tokens): array {
        // Don't bother
        return $tokens;
    }
}
