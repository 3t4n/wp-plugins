<?php

namespace NativeRent\Admin\Views;

use NativeRent\Core\View\ViewInterface;

class Layout implements ViewInterface {
	/**
	 * @var string
	 */
	protected $templatePath = 'admin/layout';

	/**
	 * Main content.
	 *
	 * @var ViewInterface
	 */
	public $content;

	/** @var bool */
	public $withFooter = false;

	/**
	 * @param  ViewInterface $content
	 * @param  bool          $withFooter
	 */
	public function __construct( ViewInterface $content, $withFooter = false ) {
		add_action(
			'admin_enqueue_scripts',
			function () {
				add_filter(
					'script_loader_tag',
					function ( $tag, $handle, $src ) {
						if ( 'nativerent-form-component' !== $handle ) {
							return $tag;
						}

						return str_replace(
							'<script ',
							'<script onerror="window.NRENT_FORM_COMPONENT_ERROR=true;" ',
							$tag
						);
					},
					10,
					3
				);
				wp_enqueue_script(
					'nativerent-form-component',
					NATIVERENT_FORM_COMPONENTS_URL
				);
				wp_enqueue_style(
					'nativerent-admin-style',
					plugins_url( 'static/admin/main.css', NATIVERENT_PLUGIN_FILE ),
					[],
					filemtime( NATIVERENT_PLUGIN_DIR . '/static/admin/main.css' )
				);
			}
		);

		$this->content = $content;
		$this->withFooter = $withFooter;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getTemplatePath() {
		return $this->templatePath;
	}
}
