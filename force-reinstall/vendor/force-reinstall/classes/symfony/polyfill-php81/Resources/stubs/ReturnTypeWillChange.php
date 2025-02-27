<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (\PHP_VERSION_ID < 80100) {
    #[ForceReinstall_Attribute(Attribute::TARGET_METHOD)]
    final class ForceReinstall_ReturnTypeWillChange
    {
        public function __construct()
        {
        }
    }
}
