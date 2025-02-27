<?php
/**
 * @license MIT
 *
 * Modified by verdantstudio on 27-January-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace SuperAdventCalendar\Vendor_Prefixed\DI\Definition\Helper;

use SuperAdventCalendar\Vendor_Prefixed\DI\Definition\Definition;

/**
 * Helps defining container entries.
 *
 * @author Matthieu Napoli <matthieu@mnapoli.fr>
 */
interface DefinitionHelper
{
    /**
     * @param string $entryName Container entry name
     */
    public function getDefinition(string $entryName) : Definition;
}
