<?php

if ( class_exists( 'QuadLayers\\WP_Plugin_Table_Links\\Load' ) ) {
	new \QuadLayers\WP_Plugin_Table_Links\Load(
		QLTGM_PLUGIN_FILE,
		array(
			array(
				'text' => esc_html__( 'Settings', 'quadlayers-telegram-chat' ),
				'url'  => admin_url( 'admin.php?page=qltgm' ),
				'target'=> '_self',
			),
			array(
				'text' => esc_html__( 'Premium', 'quadlayers-telegram-chat' ),
				'url'  => QLTGM_PREMIUM_SELL_URL,
			),
			array(
				'place' => 'row_meta',
				'text'  => esc_html__( 'Support', 'quadlayers-telegram-chat' ),
				'url'   => QLTGM_SUPPORT_URL,
			),
			array(
				'place' => 'row_meta',
				'text'  => esc_html__( 'Documentation', 'quadlayers-telegram-chat' ),
				'url'   => QLTGM_DOCUMENTATION_URL,
			),
		)
	);
}
