<?php
/**
 * @license MIT
 *
 * Modified by verdantstudio on 27-January-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace SuperAdventCalendar\Vendor_Prefixed\DI;

use SuperAdventCalendar\Vendor_Prefixed\Psr\Container\NotFoundExceptionInterface;

/**
 * Exception thrown when a class or a value is not found in the container.
 */
class NotFoundException extends \Exception implements NotFoundExceptionInterface
{
}
