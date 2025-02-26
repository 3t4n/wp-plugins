<?php

namespace RankologyFno\Actions\Admin\Settings;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

use Rankology\Core\Hooks\ExecuteHooksBackend;

class LocalBusiness implements ExecuteHooksBackend {
    /**
     * 
     *
     * @return void
     */
    public function hooks() {
        add_action('admin_init', [$this, 'init']);
    }

    /**
     * 
     * @see @admin_init
     *
     * @return void
     */
    public function init() {
        rankology_fno_get_service('SettingsSectionLocalBusiness')->renderSettings();
    }
}
