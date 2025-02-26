<?php
/**
 * This file is responsible for a block of this plugin.
 *
 * @package block Quote.
 */

// Enqueue script.
wp_register_script(
	'awgt-esnext',
	plugins_url( 'build/index.js', __FILE__ ),
	$asset_file['dependencies'],
	$asset_file['version'],
	true,
);

// Enqueue style on editor.
wp_register_style(
	'awgt-editor',
	plugins_url( 'src/editor.css', __FILE__ ),
	array( 'wp-edit-blocks' ),
	filemtime( AWGT_DIR_PATH . 'src/editor.css' ), // filemtime() returns the last time of when its content was modified.
);

// Enqueue style on display.
wp_register_style(
	'awgt-style-alert',
	plugins_url( 'style.css', __FILE__ ),
	array(),
	filemtime( AWGT_DIR_PATH . 'src/block-alert-box/style.css' ), // filemtime() returns the last time of when its content was modified.
);

// Register the block.
register_block_type(
	'awgt-block/alert-box',
	array(
		'api_version'   => 2,
		'editor_style'  => 'awgt-editor',
		'editor_script' => 'awgt-esnext',
		'style'         => 'awgt-style-alert',
		'attributes'    => array(
			'id'             => array(
				'type' => 'string',
			),
			'content'        => array(
				'type' => 'string',
			),
			'contIcon'       => array(
				'type'    => 'string',
				'default' => 'alert-bell',
			),
			'boxWidth'       => array(
				'type'    => 'string',
				'default' => '100%',
			),
			'boxInSpace'     => array(
				'type'    => 'number',
				'default' => 15,
			),
			'fontSize'       => array(
				'type'    => 'number',
				'default' => 16,
			),
			'lineHeight'     => array(
				'type'    => 'number',
				'default' => 24,
			),
			'iconSize'       => array(
				'type'    => 'number',
				'default' => 25,
			),
			'iconPosition'   => array(
				'type'    => 'number',
				'default' => 5,
			),
			'iconSpacing'    => array(
				'type'    => 'number',
				'default' => 12,
			),
			'firstImpres'    => array(
				'type'    => 'string',
				'default' => 'none',
			),
			'firstBoldGap'   => array(
				'type'    => 'number',
				'default' => 5,
			),
			'firstBoldFontSize'   => array(
				'type'    => 'number',
				'default' => 16,
			),
			'toggleOpt'      => array(
				'type'    => 'string',
				'default' => 'none',
			),
			'iconShow'       => array(
				'type'    => 'boolean',
				'default' => true,
			),
			'firstBold'      => array(
				'type'    => 'boolean',
				'default' => false,
			),
			'dropCap'        => array(
				'type'    => 'boolean',
				'default' => true,
			),
			'dropCapSize'     => array(
				'type'    => 'number',
				'default' => 40,
			),
			'dropCapPos'     => array(
				'type'    => 'number',
				'default' => 0,
			),
			'bgSize'         => array(
				'type'    => 'number',
				'default' => 300,
			),
			'contWidth'      => array(
				'type'    => 'number',
				'default' => 400,
			),
			'contentPos'     => array(
				'type'    => 'number',
				'default' => 300,
			),
			'bgColor'        => array(
				'type'    => 'string',
				'default' => 'transparent',
			),
			'textColor'      => array(
				'type'    => 'string',
				'default' => '#5a5a5a',
			),
			'linkColor'      => array(
				'type'    => 'string',
				'default' => '#f44336',
			),
			'iconColor'      => array(
				'type'    => 'string',
				'default' => '#007cba',
			),
			'borderColor'    => array(
				'type'    => 'string',
				'default' => '#007cba',
			),
			'firstBoldColor' => array(
				'type'    => 'string',
				'default' => '#000000',
			),
			'dropCapColor'   => array(
				'type'    => 'string',
				'default' => '#000000',
			),
			'layoutSet'      => array(
				'type'    => 'string',
				'default' => 'lay-one',
			),
		),
	)
);
