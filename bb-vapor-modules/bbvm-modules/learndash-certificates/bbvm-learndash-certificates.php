<?php //phpcs:ignore
class BBVapor_LearnDash_Certificates extends FLBuilderModule {

	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'LearnDash Certificate', 'bb-vapor-modules' ),
				'description'     => __( 'LearnDash Certificate', 'bb-vapor-modules' ),
				'category'        => __( 'LearnDash', 'bb-vapor-modules' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules' ) ),
				'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/learndash-certificates/',
				'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/learndash-certificates/',
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
	'BBVapor_LearnDash_Certificates',
	array(
		'learndash' => array(
			'title' => __( 'LearnDash Options', 'bb-vapor-modules' ),
			'file'  => plugin_dir_path( __FILE__ ) . 'includes/loop-settings.php',
		),
		'button'    => array(
			'title'    => __( 'Button', 'bb-vapor-modules' ),
			'sections' => array(
				'options' => array(
					'title'  => __( 'Button Styles', 'bb-vapor-modules' ),
					'fields' => array(
						'button_align'           => array(
							'type'    => 'align',
							'label'   => __( 'Button Alignment', 'bb-vapor-modules' ),
							'default' => 'left',
						),
						'label_typography'       => array(
							'type'       => 'typography',
							'label'      => __( 'Button Typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'text_color'             => array(
							'type'       => 'color',
							'label'      => __( 'Text Color', 'bb-vapor-modules' ),
							'show_reset' => true,
							'show_alpha' => true,
						),
						'text_color_hover'       => array(
							'type'       => 'color',
							'label'      => __( 'Text Color on Hover', 'bb-vapor-modules' ),
							'show_reset' => true,
							'show_alpha' => true,
						),
						'background_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Background Color', 'bb-vapor-modules' ),
							'show_reset' => true,
							'show_alpha' => true,
						),
						'background_color_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Background Color on Hover', 'bb-vapor-modules' ),
							'show_reset' => true,
							'show_alpha' => true,
						),
						'button_border'          => array(
							'type'  => 'border',
							'label' => __( 'Border', 'bb-vapor-modules' ),
						),
					),
				),
			),
		),
	)
);
