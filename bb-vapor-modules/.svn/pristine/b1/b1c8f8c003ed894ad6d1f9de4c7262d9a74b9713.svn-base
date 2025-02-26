<?php //phpcs:ignore
class BBVapor_LearnDash_User_Points extends FLBuilderModule {

	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'LearnDash User Points', 'bb-vapor-modules' ),
				'description'     => __( 'LearnDash User Points', 'bb-vapor-modules' ),
				'category'        => __( 'LearnDash', 'bb-vapor-modules' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules' ) ),
				'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/learndash-user-points/',
				'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/learndash-user-points/',
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
	'BBVapor_LearnDash_User_Points',
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
						'course_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Content Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'course_typography' => array(
							'type'  => 'typography',
							'label' => __( 'Typography', 'bb-vapor-modules' ),
						),
					),
				),
			),
		),
	)
);
