<?php

if (! defined('ABSPATH')) {
	exit;
}

function htgb_block_assets()
{

	// Register the block using block.json
	register_block_type(__DIR__ . '/block.json', array(
		'version' => HT_GLOSSARY_BUILD_NUMBER
	));

	// Set up translations
	wp_set_script_translations(
		'htgb-block-glossary-editor-script',
		'ht-glossary',
		plugin_dir_path(HT_GLOSSARY_MAIN_FILE) . 'languages'
	);
}

add_action('init', 'htgb_block_assets', 50);


function debug_registered_blocks()
{
	if (! is_admin()) return;

	$registry = WP_Block_Type_Registry::get_instance();
	var_dump('Registered blocks: ' . print_r($registry->get_all_registered(), true));

	// Check for your specific block
	var_dump('My block registered: ' . ($registry->is_registered('htgb/block-glossary') ? 'yes' : 'no'));
}
//add_action('init', 'debug_registered_blocks', 50);
