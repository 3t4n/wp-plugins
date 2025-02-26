<?php
function create_block_advanced_button_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'create_block_advanced_button_block_init' );
