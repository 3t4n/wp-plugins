<?php

namespace Ambikly\Repository;

use Ambikly\Constants;

class SettingsRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function update($name, $value)
    {
        return ambikly_update_option($name, $value);
    }

    public function getAllSettings()
    {
        return $this->getResults("SELECT  REPLACE(option_name, %s, %s) as option_name, option_value FROM {$this->wpdb->prefix}options WHERE option_name LIKE 'ambikly_%'", [
            Constants::SETTING_PREFIX,
            ''
        ]);
    }
}