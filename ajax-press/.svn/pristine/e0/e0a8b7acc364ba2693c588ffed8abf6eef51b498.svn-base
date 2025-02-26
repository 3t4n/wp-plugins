<?php

namespace Ajax_Press;

defined( 'ABSPATH' ) || exit;

class Theme_Configs {

	private static $instance = null;

	public function __construct() {

	}

	public function get_current_theme_configs() {
		$theme_name = $this->get_theme_name();

		$configs = $this->get_configs( $theme_name );

		return !empty($configs) ? $configs : false;
	}

	public function get_configs( $theme_name ) {
		$configs = [
			'OceanWP'           => [
				'mainSelector' => '#main',
			],
			'Astra'             => [
				'mainSelector' => '#content',
			],
			'Twenty Twenty-Two' => [
				'mainSelector' => 'main',
			],
			'Twenty Twenty-One' => [
				'mainSelector' => '#content',
			],
			'Hello Elementor'   => [
				'mainSelector' => '#content',
			],
			'Twenty Twenty'     => [
				'mainSelector' => '#site-content',
			],
			'Twenty Seventeen'  => [
				'mainSelector'   => '.site-content-contain',
				'extraSelectors' => [
					'.single-featured-image-header',
				],
			],
			'Twenty Nineteen'   => [
				'mainSelector' => '#content',
			],
			'Neve'              => [
				'mainSelector' => '#content',
			],
			'Kadence'           => [
				'mainSelector' => '#inner-wrap',
			],
			'PopularFX'         => [
				'mainSelector' => '#primary',
			],
			'GeneratePress'     => [
				'mainSelector' => '#page',
			],
			'Go'                => [
				'mainSelector' => '#site-content',
			],
			'Inspiro'           => [
				'mainSelector' => '#content',
			],
			'Twenty Sixteen'    => [
				'mainSelector' => '#content',
			],
			'Hestia'            => [
				'mainSelector' => '.main',
			],
			'Storefront'        => [
				'mainSelector' => '#content',
			],
			'Colibri WP'        => [
				'mainSelector'   => '#content',
				'extraSelectors' => [
					'#hero',
				],
			],
			'Sydney'            => [
				'mainSelector' => '#content',
			],
			'Blocksy'           => [
				'mainSelector' => '#main',
			],
			'Twenty Fifteen'    => [
				'mainSelector' => '#primary',
			],
			'Zakra'             => [
				'mainSelector' => '#main',
			],
			'Botiga'            => [
				'mainSelector' => '.content-wrapper',
			],


			'Avada'      => [
				'mainSelector' => '#main',
			],
			'The7'       => [
				'mainSelector' => '#main',
			],
			'Betheme'    => [
				'mainSelector' => '#Content',
			],
			'Enfold'     => [
				'mainSelector' => '#main',
			],
			'x'          => [
				'mainSelector'   => 'x-container',
				'extraSelectors' => [
					'.x-header-landmark',
				],
			],
			'Flatsome'   => [
				'mainSelector' => '#main',
			],
			'Bridge'     => [
				'mainSelector' => '.content',
			],
			'Jupiter'    => [
				'mainSelector' => '#jupiterx-main',
			],
			'Salient'    => [
				'mainSelector' => '.container-wrap',
			],
			'Newspaper'  => [
				'mainSelector' => '.td-main-content-wrap',
			],
			'Uncode'     => [
				'mainSelector' => '.main-wrapper',
			],
			'Impreza'    => [
				'mainSelector' => '#page-content',
			],
			'Porto'      => [
				'mainSelector' => '#main',
			],
			'TheGem'     => [
				'mainSelector' => '#main',
			],
			'uDesign'    => [
				'mainSelector' => '#main',
			],
			'Total'      => [
				'mainSelector' => '#main',
			],
			'KALLYAS'    => [
				'mainSelector' => '.zn_pb_wrapper',
			],
			'Brooklyn'   => [
				'mainSelector'   => '#main-content',
				'extraSelectors' => [
					'#ut-hero',
				],
			],
			'WoodMart'   => [
				'mainSelector' => '.main-page-wrapper',
			],
			'Kalium'     => [
				'mainSelector' => '.wrapper .vc-container',
			],
			'Soledad'    => [
				'mainSelector' => '#main',
			],
			'Eduma'      => [
				'mainSelector' => '#main-content',
			],
			'Shopkeeper' => [
				'mainSelector' => '#primary',
			],
			'Oshine'     => [
				'mainSelector' => '#content',
			],
			'Phlox Pro'  => [
				'mainSelector' => '#main',
			],
			'Karma'      => [
				'mainSelector' => 'body > .elementor',
			],
			'XStore'     => [
				'mainSelector'   => '.content-page',
				'extraSelectors' => [
					'.page-heading',
				]
			],
			'Stockholm'  => [
				'mainSelector' => '.content',
			],
			'REHub'      => [
				'mainSelector' => '#content',
			],
			'Houzez'     => [
				'mainSelector' => '.content-wrap',
			],
		];


		if ( ! empty( $theme_name )  ) {
			return ! empty( $configs[ $theme_name ] ) ? $configs[ $theme_name ] : false;
		}

		return $configs;
	}

	public function get_theme_name() {
		$theme = wp_get_theme();

		return ! empty( $theme->parent() ) ? $theme->parent()->get('Name') : $theme->get('Name');
	}


	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

}

