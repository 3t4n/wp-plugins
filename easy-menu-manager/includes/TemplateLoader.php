<?php
namespace WCPress\EasyMenuManager;

defined( 'ABSPATH' ) || exit;

/**
 * Manages template loading
 *
 * @since 1.00.00
 */
class TemplateLoader {

	protected static $self;

	const TEMPLATE_FOLDER_PATH = EASY_MENU_MANAGER_ROOT_PATH . 'templates/';

	protected function __construct() {}

	public static function init() {
		if ( empty( TemplateLoader::$self ) ) {
			TemplateLoader::$self = new TemplateLoader();
		}
		return TemplateLoader::$self;
	}

	/**
	 * Loads the template with arguments and template name.
	 *
	 * @since 1.0.0
	 *
	 * @param string $file relative file path
	 * @param string $name name of the template (useful to identify the template)
	 * @param array  $args a list of available arguments
	 *
	 * @return void
	 */
	public function loadTemplate( string $file, string $name = '', array $args = [] ) {
		$template_root_path = apply_filters( 'easy_menu_manager_template_root_path', TemplateLoader::TEMPLATE_FOLDER_PATH, $file, $name, $args );
		$file = apply_filters( 'easy_menu_manager_template_file', $file, $name, $args );
		$args = apply_filters( 'easy_menu_manager_template_args', $args, $file, $name );
		$file_path = TemplateLoader::TEMPLATE_FOLDER_PATH . $file;
		if ( file_exists( $file_path ) ) {
			extract( $args );
			include $file_path;
		}
	}

}