<?php

# Exit if accessed directly
if (!defined('ABSPATH')) exit;

# Load Plugin Defines
require_once __DIR__ . '/includes/defines.php';

# Include some empty class to make sure they are existed while upgrading plugin.
require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-updates.php';
require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats-welcome.php';

# Load Plugin
if (!class_exists('RANKOLOGY_Stats')) {
    require_once RANKOLOGY_STATS_DIR . 'includes/class-rankology-stats.php';
}

# Returns the main instance of Rankology Stats.
function RANKOLOGY_Stats()
{
    return RANKOLOGY_Stats::instance();
}

# Global for backwards compatibility.
$GLOBALS['RANKOLOGY_Stats'] = RANKOLOGY_Stats();

require_once RANKOLOGY_STATS_DIR . 'rankology-stats-detailed-data/index.php';