<?php

if (!defined('ABSPATH')) {
    exit;
}

use BitApps\Pi\Deps\BitApps\WPKit\Hooks\Hooks;
use BitApps\Pi\src\Integrations\ElementorForm\ElementorFormTrigger;

Hooks::addAction('elementor_pro/forms/new_record', [ElementorFormTrigger::class, 'handleSubmit'], 10, 1);
