<?php

include __DIR__ . '/includes/Zip.php';
include __DIR__ . '/includes/Filing.php';

$FROM_DIR = __DIR__ . '/../';
$PLUGIN_DIR = __DIR__ . '/../../';
$TO_DIR = $PLUGIN_DIR . 'output/amadast-shipping-wp/';

copy_dir_recursively($FROM_DIR, $TO_DIR);

rm_dir_recursively($TO_DIR . '.idea');
rm_dir_recursively($TO_DIR . '.git');
rm_dir_recursively($TO_DIR . '.gitignore');
rm_dir_recursively($TO_DIR . '.idea');
rm_dir_recursively($TO_DIR . '.activated');
rm_dir_recursively($TO_DIR . 'scripts');
rm_dir_recursively($TO_DIR . 'utilities/dd.php');
// uncomment these on wp host
//rm_dir_recursively($TO_DIR . 'plugin/plugin-update-checker');
//rm_dir_recursively($TO_DIR . 'classes/AMDSP_Update.php');

Zip($TO_DIR, $PLUGIN_DIR . 'amadast-shipping-wp.zip');

rm_dir_recursively($PLUGIN_DIR . 'output');
