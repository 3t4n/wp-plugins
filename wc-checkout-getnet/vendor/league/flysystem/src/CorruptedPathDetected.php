<?php
/**
 * @license MIT
 *
 * Modified by Atanas Angelov on 18-December-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */

namespace CoffeeCode\League\Flysystem;

use LogicException;

class CorruptedPathDetected extends LogicException implements FilesystemException
{
    /**
     * @param string $path
     * @return CorruptedPathDetected
     */
    public static function forPath($path)
    {
        return new CorruptedPathDetected("Corrupted path detected: " . $path);
    }
}
