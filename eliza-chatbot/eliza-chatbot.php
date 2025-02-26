<?php
/**
 * Plugin Name:       Eliza Chatbot
 * Description:       ELIZA - A retro chatbot that simulates a psychotherapist, based on the original 'ELIZA' script created by Joseph Weizenbaum in 1966.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.1
 * Author:            Szymon Jessa
 * Author URI:        https://www.szymonjessa.com
 * License:           GPL-3.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package           create-block
 */

 /**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

 if ( ! defined( 'ABSPATH' ) ) exit; 

 function elibot_eliza_chatbot_block_init() {

	register_block_type( __DIR__ . '/build' ,
		array(
			'attributes' => array(
				'webclient' => array(
					'type' => 'string',
					'default' => plugin_dir_url(__FILE__) . '/webclient/webclient.py',
				),
				'interpreter' => array(
					'type' => 'string',
					'default' => 'mpy',
				),
				'credits' => array(
					'type' => 'bool',
					'default' => false,
				),
				'config' => array(
					'type' => 'string',
					'default' => '
					{
						"files": {
							"' . plugin_dir_url(__FILE__) . '/micropython_eliza/__init__.py": "./micropython_eliza/__init__.py",
							"' . plugin_dir_url(__FILE__) . '/micropython_eliza/chat.py": "./micropython_eliza/chat.py",
							"' . plugin_dir_url(__FILE__) . '/micropython_eliza/demo.py": "./micropython_eliza/demo.py",
							"' . plugin_dir_url(__FILE__) . '/micropython_eliza/session.py": "./micropython_eliza/session.py",
							"' . plugin_dir_url(__FILE__) . '/micropython_eliza/identities/__init__.py": "./micropython_eliza/identities/__init__.py",
							"' . plugin_dir_url(__FILE__) . '/micropython_eliza/identities/eliza.py": "./micropython_eliza/identities/eliza.py",
							"' . plugin_dir_url(__FILE__) . '/micropython_eliza/identities/eliza_demo.py": "/micropython_eliza/identities/eliza_demo.py"
						}
					}',
				),
				'pyscript' => array(
					'type' => 'string',
					'default' => 'https://pyscript.net/releases/2023.12.1/core.js',
				),
			),
		)
	);
}

add_action( 'init', 'elibot_eliza_chatbot_block_init' );
