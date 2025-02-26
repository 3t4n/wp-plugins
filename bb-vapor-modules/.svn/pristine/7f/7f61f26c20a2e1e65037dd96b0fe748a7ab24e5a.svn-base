<?php //phpcs:ignore
class BBVapor_LearnDash_Payments extends FLBuilderModule {

	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'LearnDash Payments', 'bb-vapor-modules' ),
				'description'     => __( 'LearnDash Payments', 'bb-vapor-modules' ),
				'category'        => __( 'LearnDash', 'bb-vapor-modules' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules' ) ),
				'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/learndash-payments/',
				'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/learndash-payments/',
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
	'BBVapor_LearnDash_Payments',
	array(
		'learndash' => array(
			'title' => __( 'LearnDash Options', 'bb-vapor-modules' ),
			'file'  => plugin_dir_path( __FILE__ ) . 'includes/loop-settings.php',
		),
		'options'   => array(
			'title'    => __( 'Options', 'bb-vapor-modules' ),
			'sections' => array(
				'options' => array(
					'title'  => __( 'Options', 'bb-vapor-modules' ),
					'fields' => array(
						'alignment'         => array(
							'type'    => 'align',
							'label'   => __( 'Payment Alignment', 'bb-vapor-modules' ),
							'default' => 'left',
						),
						'course_typography' => array(
							'type'  => 'typography',
							'label' => __( 'Typography', 'bb-vapor-modules' ),
						),
					),
				),
			),
		),
		'styles'    => array(
			'title'    => __( 'Styles', 'bb-vapor-modules' ),
			'sections' => array(
				'options' => array(
					'title'  => __( 'Styles', 'bb-vapor-modules' ),
					'fields' => array(
						'button_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Payment Button Background Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
					),
				),
			),
		),
	)
);
