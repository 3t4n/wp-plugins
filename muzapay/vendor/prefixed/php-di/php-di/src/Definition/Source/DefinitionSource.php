<?php

declare (strict_types=1);
namespace MuzaPayDeps\DI\Definition\Source;

use MuzaPayDeps\DI\Definition\Definition;
use MuzaPayDeps\DI\Definition\Exception\InvalidDefinition;
/**
 * Source of definitions for entries of the container.
 *
 * @author Matthieu Napoli <matthieu@mnapoli.fr>
 */
interface DefinitionSource
{
    /**
     * Returns the DI definition for the entry name.
     *
     * @throws InvalidDefinition An invalid definition was found.
     */
    public function getDefinition(string $name): Definition|null;
    /**
     * @return array<string,Definition> Definitions indexed by their name.
     */
    public function getDefinitions(): array;
}
