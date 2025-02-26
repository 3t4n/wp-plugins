<?php //phpcs:ignore
class BBVapor_LearnDash_Course_Progress extends FLBuilderModule {

	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'LearnDash Course Progress', 'bb-vapor-modules' ),
				'description'     => __( 'LearnDash Course Progress', 'bb-vapor-modules' ),
				'category'        => __( 'LearnDash', 'bb-vapor-modules' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules' ) ),
				'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/learndash-course-progress/',
				'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/learndash-course-progress/',
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
	'BBVapor_LearnDash_Course_Progress',
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
						'background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Background Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-learndash-course-progress-wrapper .ld-progress',
								'property' => 'background-color',
							),
						),
						'border'           => array(
							'type'    => 'border',
							'label'   => __( 'Border', 'bb-vapor-modules' ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.bbvm-learndash-course-progress-wrapper .ld-progress',
								'property' => 'border',
							),
						),
						'padding'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Padding', 'bb-vapor-modules' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-learndash-course-progress-wrapper .ld-progress',
								'property' => 'padding',
							),
						),
						'margin'           => array(
							'type'       => 'dimension',
							'label'      => __( 'Margin', 'bb-vapor-modules' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-learndash-course-progress-wrapper .ld-progress',
								'property' => 'margin',
							),
						),
						'completed_color'  => array(
							'type'       => 'color',
							'label'      => __( 'Completed Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-learndash-course-progress-wrapper .ld-progress-bar .ld-progress-bar-percentage',
								'property' => 'background-color',
							),
						),
						'incomplete_color' => array(
							'type'       => 'color',
							'label'      => __( 'Incomplete Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-learndash-course-progress-wrapper .ld-progress-bar',
								'property' => 'background-color',
							),
						),
						'typography'       => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'bb-vapor-modules' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-learndash-course-progress-wrapper .ld-progress-heading',
							),
						),
					),
				),
			),
		),
	)
);
