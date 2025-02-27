<?php

namespace ShopMagicVendor\WPDesk\Migrations\Version;

use ShopMagicVendor\WPDesk\Migrations\AbstractMigration;
interface MigrationFactory
{
    /** @param class-string<AbstractMigration> $migration_class */
    public function create_version(string $migration_class): AbstractMigration;
}
