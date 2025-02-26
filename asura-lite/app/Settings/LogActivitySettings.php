<?php

namespace Asura\Settings;

use Spatie\LaravelSettings\Settings;

class LogActivitySettings extends Settings {
    public bool $enabled;

    public bool $visible;

    public static function group(): string {
        return 'logactivity';
    }
}
