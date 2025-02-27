<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Modified by Atanas Angelov on 18-December-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */

namespace CoffeeCode\Symfony\Component\Console\Exception;

/**
 * Represents failure to read input from stdin.
 *
 * @author Gabriel Ostrolucký <gabriel.ostrolucky@gmail.com>
 */
class MissingInputException extends RuntimeException implements ExceptionInterface
{
}
