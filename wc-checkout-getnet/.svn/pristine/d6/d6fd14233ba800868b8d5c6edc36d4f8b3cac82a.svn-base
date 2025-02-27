<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by Atanas Angelov on 18-December-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace CoffeeCode\PhpParser\Lexer\TokenEmulator;

use CoffeeCode\PhpParser\PhpVersion;

final class ReadonlyTokenEmulator extends KeywordEmulator {
    public function getPhpVersion(): PhpVersion {
        return PhpVersion::fromComponents(8, 1);
    }

    public function getKeywordString(): string {
        return 'readonly';
    }

    public function getKeywordToken(): int {
        return \T_READONLY;
    }

    protected function isKeywordContext(array $tokens, int $pos): bool {
        if (!parent::isKeywordContext($tokens, $pos)) {
            return false;
        }
        // Support "function readonly("
        return !(isset($tokens[$pos + 1]) &&
                 ($tokens[$pos + 1]->text === '(' ||
                  ($tokens[$pos + 1]->id === \T_WHITESPACE &&
                   isset($tokens[$pos + 2]) &&
                   $tokens[$pos + 2]->text === '(')));
    }
}
