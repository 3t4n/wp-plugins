<?php

if (!defined('ABSPATH')) {
    exit;
}

use BitApps\Pi\Deps\BitApps\WPKit\Hooks\Hooks;
use BitApps\Pi\src\Integrations\ContactForm7\ContactForm7Trigger;

Hooks::addAction('wpcf7_before_send_mail', [ContactForm7Trigger::class, 'handleSubmit'], 10);
