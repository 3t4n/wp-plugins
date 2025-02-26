<?php

namespace AP360V;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Block {

    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function register_block() {
        register_block_type(AP360V_PATH . 'build/blocks/panorama-viewer');
    }
}