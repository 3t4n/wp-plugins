<?php // phpcs:ignore
class BBVapor_Plugin_Info_card extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Plugin Info Card', 'bb-vapor-modules' ),
				'description'     => __( 'Plugin Info Card module for Beaver Builder', 'bb-vapor-modules' ),
				'category'        => __( 'External Plugins', 'bb-vapor-modules' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules' ) ),
				'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/plugin-info-card/',
				'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/plugin-info-card/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_Plugin_Info_card',
	array(
		'general'    => array(
			'title'    => __( 'Options', 'bb-vapor-modules' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Options', 'bb-vapor-modules' ),
					'fields' => array(
						'asset_type' => array(
							'type'    => 'select',
							'label'   => __( 'Plugin', 'bb-vapor-modules' ),
							'options' => array(
								'plugin' => __( 'Plugin', 'bb-vapor-modules' ),
								'theme'  => __( 'Theme', 'bb-vapor-modules' ),
							),
							'default' => 'plugin',
						),
						'slug'       => array(
							'type'    => 'text',
							'label'   => __( 'Plugin or Theme Slug', 'bb-vapor-modules' ),
							'default' => __( 'wp-plugin-info-card', 'bb-vapor-modules' ),
							'help'    => __( 'Can be comma separated.', 'bb-vapor-modules' ),
						),
						'multi'      => array(
							'type'    => 'select',
							'label'   => __( 'Output Multiple Items', 'bb-vapor-modules' ),
							'options' => array(
								'true'  => __( 'Yes', 'bb-vapor-modules' ),
								'false' => __( 'No', 'bb-vapor-modules' ),
							),
							'default' => 'false',
							'help'    => __( 'If you comma-separate slugs, this option will output all items instead of selecting the card randomly', 'bb-vapor-modules' ),
						),
					),
				),
			),
		),
		'appearance' => array(
			'title'    => __( 'Appearance', 'bb-vapor-modules' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Appearance', 'bb-vapor-modules' ),
					'fields' => array(
						'appearance' => array(
							'type'    => 'select',
							'label'   => __( 'Color Scheme', 'bb-vapor-modules' ),
							'options' => array(
								'scheme1'  => __( 'Scheme 1', 'bb-vapor-modules' ),
								'scheme2'  => __( 'Scheme 2', 'bb-vapor-modules' ),
								'scheme3'  => __( 'Scheme 3', 'bb-vapor-modules' ),
								'scheme4'  => __( 'Scheme 4', 'bb-vapor-modules' ),
								'scheme5'  => __( 'Scheme 5', 'bb-vapor-modules' ),
								'scheme6'  => __( 'Scheme 6', 'bb-vapor-modules' ),
								'scheme7'  => __( 'Scheme 7', 'bb-vapor-modules' ),
								'scheme8'  => __( 'Scheme 8', 'bb-vapor-modules' ),
								'scheme9'  => __( 'Scheme 9', 'bb-vapor-modules' ),
								'scheme10' => __( 'Scheme 10', 'bb-vapor-modules' ),
								'scheme11' => __( 'Scheme 11', 'bb-vapor-modules' ),
								'scheme12' => __( 'Scheme 12', 'bb-vapor-modules' ),
								'scheme13' => __( 'Scheme 13', 'bb-vapor-modules' ),
								'scheme14' => __( 'Scheme 14', 'bb-vapor-modules' ),
								'custom'   => __( 'Custom', 'bb-vapor-modules' ),
							),
							'default' => 'scheme1',
							'toggle'  => array(
								'custom' => array(
									'tabs' => 'colors',
								),
							),
						),
						'layout'     => array(
							'type'    => 'select',
							'label'   => __( 'Layout', 'bb-vapor-modules' ),
							'options' => array(
								'card'      => __( 'Card', 'bb-vapor-modules' ),
								'wordpress' => __( 'WordPress', 'bb-vapor-modules' ),
								'large'     => __( 'Large Card', 'bb-vapor-modules' ),
								'flex'      => __( 'Flex Layout', 'bb-vapor-modules' ),
							),
							'default' => 'card',
						),
						'align'      => array(
							'type'    => 'select',
							'label'   => __( 'Align', 'bb-vapor-modules' ),
							'options' => array(
								'left'   => __( 'left', 'bb-vapor-modules' ),
								'center' => __( 'Center', 'bb-vapor-modules' ),
								'right'  => __( 'Right', 'bb-vapor-modules' ),
								'wide'   => __( 'Wide Layout', 'bb-vapor-modules' ),
								'full'   => __( 'Full Width Layout', 'bb-vapor-modules' ),
							),
							'default' => 'full',
						),
					),
				),
			),
		),
		'colors'     => array(
			'title'    => __( 'Colors', 'bb-vapor-modules' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Colors', 'bb-vapor-modules' ),
					'fields' => array(
						'text_color'                => array(
							'type'       => 'color',
							'label'      => __( 'Text Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'property' => 'color',
								'selector' => '.wp-pic.custom .wp-pic-no-plugin, .entry .wp-pic.custom p, .wp-pic.custom p, .wp-pic.custom .wp-pic-back a:not(.wp-pic-page):hover, .wp-pic.custom .wp-pic-back p, .wp-pic.custom:not(.wordpress) .wp-pic-author a, .wp-pic.custom .wp-pic-dl-link, .wp-pic.custom a.wp-pic-name, .wp-pic.custom .wp-pic-front a.wp-pic-name, .wp-pic.custom .wp-pic-flip .wp-pic-face.wp-pic-back, .wp-pic.custom .wp-pic-bar span, .wp-pic.custom .wp-pic-bar a, .wp-pic.custom .wp-pic-back a:not(.wp-pic-page), .wp-pic.custom .wp-pic-asset-bg-title, .wp-pic.custom .wp-pic-download-link span, .wp-pic.custom .wp-pic-download, .wp-pic.custom .wp-pic-page, .wp-pic.custom a.wp-pic-page',
							),
						),
						'bar_color'                 => array(
							'type'       => 'color',
							'label'      => __( 'Bar', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'property' => 'background-color',
								'selector' => '.wp-pic.custom .wp-pic-bar, .wp-pic.custom .wp-pic-bar span:after, .wp-pic.custom .wp-pic-bar a:after',
							),
						),
						'background_color'          => array(
							'type'       => 'color',
							'label'      => __( 'Background Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'property' => 'background-color',
								'selector' => '.wp-pic.custom > div> div',
							),
						),
						'bar_text_color'            => array(
							'type'       => 'color',
							'label'      => __( 'Bar Item Text Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'      => 'css',
								'property'  => 'color',
								'selector'  => '.wp-pic.custom .wp-pic-rating, .wp-pic.custom .wp-pic-downloaded, .wp-pic.custom .wp-pic-requires',
								'important' => true,
							),
						),
						'bar_item_color'            => array(
							'type'       => 'color',
							'label'      => __( 'Bar Item Emphasis Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'      => 'css',
								'property'  => 'color',
								'selector'  => '.wp-pic.custom .wp-pic-bar em',
								'important' => true,
							),
						),
						'download_text_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Download Bar Text Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'      => 'css',
								'property'  => 'color',
								'selector'  => '.wp-pic-download-link span',
								'important' => true,
							),
						),
						'download_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Download Bar Background Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'property' => 'background-color',
								'selector' => '.wp-pic.custom .wp-pic-download, .wp-pic.custom .wp-pic-asset-bg, .wp-pic.custom a.wp-pic-page, .wp-pic.custom.flex .wp-pic-download-link span',
							),
						),
					),
				),
			),
		),
	)
);
