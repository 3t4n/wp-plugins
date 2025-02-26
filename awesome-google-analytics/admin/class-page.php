<?php

namespace AGA\Admin;

/**
 * Class Page
 * @package AGA\Admin
 */
abstract class Page {

	/**
	 * @var
	 */
	protected $template;

	/**
	 * @return mixed
	 */
	abstract public function render();

	/**
	 * Render a (back-end) view
	 *
	 * @param $template
	 * @param array $sidebar_addons
	 */
	protected function render_view( $template, $sidebar_addons = array() ) {
		if( file_exists( AGA_PLUGIN_PATH . 'templates/' . $template . '.php' ) ) {
			$this->template['sidebar_addons'] = $sidebar_addons;

			include( AGA_PLUGIN_PATH . 'templates/backend/header.php' );
			include( AGA_PLUGIN_PATH . 'templates/' . $template . '.php' );
			include( AGA_PLUGIN_PATH . 'templates/backend/footer.php' );
		}
		else{
			echo 'Template not found: ' . $template;
			exit;
		}
	}


}