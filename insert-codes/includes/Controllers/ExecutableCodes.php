<?php

namespace InsertCodes\Controllers;

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * Class ExecutableCodes.
 * Handles the executable codes.
 *
 * @since 1.2.0
 * @package InsertCodes\Controllers
 */
class ExecutableCodes {
	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'execute_init' ) );
	}

	/**
	 * Execute the code snippet.
	 *
	 * @since 1.2.0
	 * @return void
	 */
	public function execute_init() {
		// Snippets is not enabled the return.
		if ( 'yes' !== get_option( 'insertcodes_enable_snippets', 'no' ) ) {
			return;
		}

		// Arguments to pass to the code snippet.
		$args = array(
			'type'     => 'php',
			'location' => get_option( 'insertcodes_snippets_location', 'everywhere' ),
			'priority' => 'default',
			'hook'     => 'init',
		);

		// Get the executable code snippets.
		$code_snippets = get_option( 'insertcodes_php', '' );

		// Check if the code snippets is empty.
		if ( empty( $code_snippets ) ) {
			return;
		}

		// phpcs:disable
		// TODO: We should Implode all the code and execute it when we supported multiple Code Snippets.
		// Example: $code_snippets = implode( PHP_EOL, $code_snippets );.
		// Loop through the code snippets.
		/*
		foreach ( $code_snippets as $code_snippet ) {
			// Execute the code snippet.
			$this->execute(
				$code_snippet['code'],
				$code_snippet['type'],
				$code_snippet['location'],
				$code_snippet['priority'],
				$code_snippet['hook'],
				$code_snippet['args']
			);
		}
		*/
		// phpcs:enable

		// Execute the code snippets.
		new Execute( $code_snippets, $args );
	}
}
