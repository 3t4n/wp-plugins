<?php

if (!defined('ABSPATH')) {
    exit;
}

use BitApps\Pi\Deps\BitApps\WPKit\Hooks\Hooks;
use BitApps\Pi\src\Integrations\BitForm\BitFormTrigger;

Hooks::addAction('bitform_submit_success', [BitFormTrigger::class, 'handleSubmit'], 10, 3);
