<?php
// Se WordPress non viene chiamato direttamente, esci.
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Rimuovi le opzioni del plugin
delete_option('adhub_platform_options');

// Pulisci eventuali dati transient
delete_transient('adhub_platform_cache');