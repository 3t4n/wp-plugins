<?php
namespace Adminz\Controller;

final class Enqueue {
	private static $instance = null;
	public $id = 'adminz_enqueue';
	public $name = 'Enqueue';
	public $option_name = 'adminz_enqueue';

	public $fonts_uploaded = [];
	public $fonts_supported = [];
	public $settings = [];

	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	function __construct() {
		add_filter( 'adminz_option_page_nav', [ $this, 'add_admin_nav' ], 10, 1 );
		add_action( 'admin_init', [ $this, 'register_settings' ] );
		$this->load_settings();
		add_action( 'init', [ $this, 'init' ] );
	}

	function init() {

		// 
		if ( ( $this->settings['remove_upload_filters'] ?? '' ) == 'on' ) {
			if ( !defined( 'ALLOW_UNFILTERED_UPLOADS' ) ) {
				define( 'ALLOW_UNFILTERED_UPLOADS', true );
			}
		}

		// 
		if ( ( $this->settings['photoswipe'] ?? "" ) == 'on' ) {
			$a = new \Adminz\Helper\Photoswipe;
			$a->init();
		}

		// 
		if ( ( $this->settings['photoswipe'] ?? "" ) == 'on' ) {
			$list = array_values( $this->settings['photoswipe_process'] ?? [] );
			if ( empty( $list[0]['key'] ) ) {
				return;
			}
			$a = new \Adminz\Helper\Photoswipe;
			$a->process( $list );
		}

		// 
		if ( $this->settings['adminz_fonts_uploaded'] ?? "" ) {
			adminz_enqueue_font_uploaded( $this->settings['adminz_fonts_uploaded'] );
		}

		// 
		if ( $this->settings['adminz_supported_font'] ?? "" ) {
			adminz_enqueue_font_supported( $this->settings['adminz_supported_font'] );
		}

		if ( $this->settings['adminz_custom_css_fonts'] ?? "" ) {
			adminz_enqueue_css( $this->settings['adminz_custom_css_fonts'] );
		}

		if ( $this->settings['adminz_custom_js'] ?? "" ) {
			adminz_enqueue_js( $this->settings['adminz_custom_js'] );
		}
	}

	function load_settings() {
		$this->settings = get_option( $this->option_name, [] );

		// font uploaded
		$fonts_uploaded = $this->settings['adminz_fonts_uploaded'] ?? [];
		// old version
		$fonts_uploaded       = adminz_maybeJson( $fonts_uploaded ) ?? [];
		$this->fonts_uploaded = $fonts_uploaded;

		// font supported
		$fonts_supported       = $this->settings['adminz_supported_font'] ?? [];
		$this->fonts_supported = $fonts_supported;
	}

	function add_admin_nav( $nav ) {
		$nav[ $this->id ] = $this->name;
		return $nav;
	}

	function register_settings() {
		register_setting( $this->id, $this->option_name );

		// add section
		add_settings_section(
			'adminz_custom_font',
			'Custom font',
			function () {},
			$this->id
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Remove Upload filters',
			function () {
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type' => 'checkbox',
						'name' => $this->option_name . '[remove_upload_filters]',
					],
					'value'     => $this->settings['remove_upload_filters'] ?? "",
					'note'      => 'Check it to allow upload your fonts file. Dont forget to disable it later.',
				] );
			},
			$this->id,
			'adminz_custom_font'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Fonts uploaded',
			function () {
				$current = $this->settings['adminz_fonts_uploaded'] ?? [];

				if ( empty( $current ) ) {
					$current = adminz_repeater_array_default( 2, 5 );
				}

				$field_configs = [ 
					'[0]' => [ 
						'field'     => 'input',
						'attribute' => [ 
							'type'        => 'text',
							'placeholder' => 'Source: ...ttf',
						],
					],
					'[1]' => [ 
						'field'     => 'input',
						'attribute' => [ 
							'type'        => 'text',
							'placeholder' => 'Font family: xxx',
						],
					],
					'[2]' => [ 
						'field'   => 'select',
						'options' => [ 
							""        => __( 'Select' ) . ' font weight',
							'normal'  => 'normal',
							'bold'    => 'bold',
							'bolder'  => 'bolder',
							'lighter' => 'lighter',
							'100'     => '100',
							'200'     => '200',
							'300'     => '300',
							'400'     => '400',
							'500'     => '500',
							'600'     => '600',
							'700'     => '700',
							'800'     => '800',
							'900'     => '900',
						],
					],
					'[3]' => [ 
						'field'   => 'select',
						'options' => [ 
							""        => __( 'Select' ) . ' font style',
							'normal'  => 'normal',
							'italic'  => 'italic',
							'oblique' => 'oblique',
							'initial' => 'initial',
							'inherit' => 'inherit',
						],
					],
					'[4]' => [ 
						'field'   => 'select',
						'options' => [ 
							""                => __( 'Select' ) . ' font stretch',
							'ultra-condensed' => 'ultra-condensed',
							'extra-condensed' => 'extra-condensed',
							'condensed'       => 'condensed',
							'semi-condensed'  => 'semi-condensed',
							'normal'          => 'normal',
							'semi-expanded'   => 'semi-expanded',
							'expanded'        => 'expanded',
							'extra-expanded'  => 'extra-expanded',
							'ultra-expanded'  => 'ultra-expanded',
							'initial'         => 'initial',
							'inherit'         => 'inherit',
						],
					],
				];

				echo adminz_repeater(
					$current,
					$this->option_name . '[adminz_fonts_uploaded]',
					$field_configs
				);

				?>
			<p>
				<small>
					<strong><?= __( 'Note' ) ?>:</strong> If the font name contains spaces, it must be surrounded by '. Example:
					<strong>'xxx'</strong>
				</small>
			</p>
			<?php

			},
			$this->id,
			'adminz_custom_font'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Fonts supported',
			function () {
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type' => 'checkbox',
						'name' => $this->option_name . '[adminz_supported_font]',
					],
					'value'     => $this->settings['adminz_supported_font'] ?? [],
					'options'   => [ 
						'lato'        => 'Lato Vietnamese',
						'fontawesome' => 'font awesome 6.5.2-web',
					],
					'before'    => '<div class="adminz_grid_item">',
					'after'     => '</div>',
				] );
				// echo "<pre>"; print_r($this->settings); echo "</pre>";
			},
			$this->id,
			'adminz_custom_font'
		);

		// add section
		add_settings_section(
			'adminz_enqueue_libary',
			'Library',
			function () {},
			$this->id
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Photoswipe',
			function () {

				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type' => 'checkbox',
						'name' => $this->option_name . '[photoswipe]',
					],
					'value'     => $this->settings['photoswipe'] ?? [],
				] );


				// field
				$current = $this->settings['photoswipe_process'] ?? [];

				// default 
				if ( empty( $current ) ) {
					$current = adminz_repeater_array_default( 3 );
				}

				$key_args = [ 
					'field'     => 'input',
					'attribute' => [ 
						'type'        => 'text',
						'placeholder' => 'Gallery CSS selector',
					],
				];

				$value_args = [ 
					'field'     => 'input',
					'attribute' => [ 
						'type'        => 'text',
						'placeholder' => 'Children CSS selector',
					],
				];

				$field_configs = [ 
					'[key]'   => $key_args,
					'[value]' => $value_args,
				];

				echo adminz_repeater(
					$current,
					$this->option_name . '[photoswipe_process]',
					$field_configs
				);

				echo adminz_toggle_button( _x( 'Suggested', 'custom headers' ), ".guild_process" );
				$text1 = adminz_copy('body.single-post .entry-content p');
				$text2 = adminz_copy('img');
				echo <<<HTML
				<table class="guild_process hidden" style="margin-top: 15px;">
					<tr>
						<td> Ex </td>
						<td> Gallery </td>
						<td> Children </td>
					</tr>
					<tr>
						<td> Images on single post content </td>
						<td> {$text1} </td>
						<td> {$text2} </td>
					</tr>
				</table>
				HTML;

			},
			$this->id,
			'adminz_enqueue_libary'
		);

		// add section
		add_settings_section(
			'adminz_enqueue_code',
			'Custom code',
			function () {},
			$this->id
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Custom Css',
			function () {
				echo adminz_field( [ 
					'field'     => 'textarea',
					'attribute' => [ 
						'name' => $this->option_name . '[adminz_custom_css_fonts]'
						// 'placeholder' => "x",
					],
					'value'     => $this->settings['adminz_custom_css_fonts'] ?? "",
				] );

				echo "<small>Heading:</small> " . adminz_copy( 'h1, h2, h3, h4, h5, h6, .heading-font, .off-canvas-center .nav-sidebar.nav-vertical > li > a' ) . "</br>";
				echo "<small>Navigation:</small> " . adminz_copy( '.nav>li>a' ) . "</br>";
				echo "<small>Widget:</small> " . adminz_copy( 'span.widget-title' ) . "</br>";
			},
			$this->id,
			'adminz_enqueue_code'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Custom Javascript',
			function () {
				echo adminz_field( [ 
					'field'     => 'textarea',
					'attribute' => [ 
						'name' => $this->option_name . '[adminz_custom_js]'
						// 'placeholder' => "x",
					],
					'value'     => $this->settings['adminz_custom_js'] ?? "",
				] );
			},
			$this->id,
			'adminz_enqueue_code'
		);



	}
}