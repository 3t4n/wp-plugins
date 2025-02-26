<?php

namespace AIPT\Core;

use AIPT\Core\Database\Migrations\CreateBulkGeneratorTables;

class Deactivator {
    public static function deactivate() {

        $admin_role = get_role('administrator');
        if ($admin_role) {
            $admin_role->remove_cap('manage_aipt_settings');
        }

        $shop_manager_role = get_role('shop_manager');
        if ($shop_manager_role) {
            $shop_manager_role->remove_cap('manage_aipt_settings');
        }

        update_option('aipt_needs_setup', true);
        update_option('aipt_setup_completed', false);

        $bulk_generator_tables = new CreateBulkGeneratorTables();
        $bulk_generator_tables->down();
    }
} 