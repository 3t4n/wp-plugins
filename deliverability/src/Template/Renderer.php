<?php

namespace TopDeliverability\Template;

use TopDeliverability\Menu\NavigationMenu;
use TopDeliverability\NonceValidator;
use TopDeliverabilityVendor\Twig\Environment;
use TopDeliverabilityVendor\Twig\Error\Error;
use TopDeliverabilityVendor\Twig\Loader\FilesystemLoader;
use TopDeliverabilityVendor\Twig\TemplateWrapper;
use TopDeliverabilityVendor\Twig\TwigFunction;

class Renderer {

	/**
	 * @var Environment
	 */
	private $twig;

	/**
	 * @var NavigationMenu
	 */
	private $navigationMenu;

	/**
	 * @param NavigationMenu $navigationMenu
	 * @param string         $templatePath
	 */
	public function __construct( $navigationMenu, $templatePath ) {
		$this->navigationMenu = $navigationMenu;
		$this->twig           = new Environment( new FilesystemLoader( $templatePath ) );

		$safe = array( 'is_safe' => array( 'html' ) );

		/** @noinspection PhpParamsInspection */
		$customFunctions = array(
			new TwigFunction(
				'wpnonce',
				function ( $action ) {
					return wp_nonce_field( $action, NonceValidator::FIELD_NAME, true, false );
				},
				$safe
			),
			new TwigFunction(
				'wp_enqueue_style',
				'wp_enqueue_style',
				$safe
			),
			new TwigFunction(
				'wp_enqueue_script',
				'wp_enqueue_script',
				$safe
			),
		);

		array_walk( $customFunctions, array( $this->twig, 'addFunction' ) );
	}

	/**
	 * @param string  $template
	 * @param Context $context
	 * @return void
	 */
	public function display( $template, Context $context ) {
		$context         = $this->decorateContext( $context );
		$templateWrapper = $this->loadTemplate( $template );
		$templateWrapper->display( $context );
	}

	/**
	 * @param string  $template
	 * @param Context $context
	 * @return string
	 */
	public function render( $template, Context $context ) {
		$context         = $this->decorateContext( $context );
		$templateWrapper = $this->loadTemplate( $template );
		return $templateWrapper->render( $context );
	}

	/**
	 * @param Context $context
	 * @return array
	 */
	private function decorateContext( Context $context ) {

		$globals = array(
			'navigation_menu' => $this->navigationMenu->build(),
			'admin_post_url'  => admin_url( 'admin-post.php' ),
		);

		array_walk(
			$globals,
			function ( $value, $name ) {
				$this->twig->addGlobal( $name, $value );
			}
		);

		return $context->build();
	}

	/**
	 * @param string $template
	 * @return TemplateWrapper
	 */
	private function loadTemplate( $template ) {
		try {
			return $this->twig->load( $template );
		} catch ( Error $e ) {
			wp_die( $e->getMessage() );
		}
	}
}
