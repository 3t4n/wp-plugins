<?php
namespace sv_block_for_twitch;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class twitch_stream extends init {
	public function init() {
		$this->register_block();
	}

	private function register_block() {
		register_block_type(
			'straightvisions/twitch-stream', array(
				'style'         => 'sv-block-for-twitch-style',
				'editor_script' => 'sv-block-for-twitch-block',
				'editor_style'  => 'sv-block-for-twitch-block-editor',
			)
		);
	}
}