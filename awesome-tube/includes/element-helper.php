<?php

namespace Elementor;

/**
 * The function to call all Elementor custom widget as an custom category.
 */
function awetube_general_elementor_init() {
	Plugin::instance()->elements_manager->add_category(
		'awetube-general-category',
		[
			'title'  => 'Awetube Elements',
			'icon' => 'font'
		],
		1
	);
}
add_action( 'elementor/init', 'Elementor\awetube_general_elementor_init' );

