<?php
// Build button
class Share_ChatMe extends Sharing_Source {
	var $shortname = 'chatme';
	public function __construct( $id, array $settings ) {
		parent::__construct( $id, $settings );
		$this->smart = 'official' == $this->button_style;
		$this->icon = 'icon' == $this->button_style;
		$this->button_style = 'icon-text';
	}

	public function get_name() {
		return __( 'ChatMe', 'chatme-share-button' );
	}

	public function get_display( $post ) {
		return '<a rel="nofollow" data-shared="" class="share-chatme sd-button share-icon" href="https://webchat.chatme.im/?r='. get_the_title( $post->ID ) .'" target="_blank" title="' . __('Click here for ChatMe discussions', 'chatme-sharing-jetpack') . '"><span>ChatMe</span></a>';
	}
}