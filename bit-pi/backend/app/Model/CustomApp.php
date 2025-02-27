<?php

namespace BitApps\Pi\Model;

use BitApps\Pi\Config;
use BitApps\Pi\Deps\BitApps\WPDatabase\Model;
use BitApps\PiPro\Model\CustomMachine;

class CustomApp extends Model
{
    public const APP_SLUG_PREFIX = 'custom-app-';

    public const APP_SLUG = 'customApp';

    public const status = [
        'ENABLE'  => 1,
        'DISABLE' => 0
    ];

    protected $prefix = Config::VAR_PREFIX;

    protected $casts = [
        'id'     => 'int',
        'status' => 'int',
    ];

    protected $fillable = [
        'name',
        'color',
        'slug',
        'description',
        'logo',
        'status',
    ];

    public function customMachines()
    {
        return $this->hasMany(CustomMachine::class, 'custom_app_id', 'id');
    }
}
