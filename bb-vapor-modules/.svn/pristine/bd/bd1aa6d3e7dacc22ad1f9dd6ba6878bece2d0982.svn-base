<?php //phpcs:ignore
class BBVapor_LearnDash_Quizzes extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'LearnDash Quizzes', 'bb-vapor-modules' ),
				'description'     => __( 'LearnDash Quizzes', 'bb-vapor-modules' ),
				'category'        => __( 'LearnDash', 'bb-vapor-modules' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules' ) ),
				'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/learndash-quizzes/',
				'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/learndash-quizzes/',
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
	'BBVapor_LearnDash_Quizzes',
	array(
		'learndash'    => array(
			'title' => __( 'LearnDash Options', 'bb-vapor-modules' ),
			'file'  => plugin_dir_path( __FILE__ ) . 'includes/loop-settings.php',
		),
		'options'      => array(
			'title'    => __( 'Options', 'bb-vapor-modules' ),
			'sections' => array(
				'container' => array(
					'title'  => __( 'Options', 'bb-vapor-modules' ),
					'fields' => array(
						'user_courses' => array(
							'type'    => 'select',
							'label'   => __( 'Show User Quizzes Only', 'bb-vapor-modules' ),
							'default' => 'false',
							'options' => array(
								'false' => __( 'No', 'bb-vapor-modules' ),
								'true'  => __( 'Yes', 'bb-vapor-modules' ),
							),
						),
					),
				),
			),
		),
		'grid_options' => array(
			'title'    => __( 'Grid Options', 'bb-vapor-modules' ),
			'sections' => array(
				'container' => array(
					'title'  => __( 'Options', 'bb-vapor-modules' ),
					'fields' => array(
						'col'            => array(
							'type'    => 'unit',
							'label'   => __( 'Number of Columns', 'bb-vapor-modules' ),
							'default' => 1,
							'help'    => __( 'Requires the LearnDash grid add-on', 'bb-vapor-modules' ),
							'slider'  => array(
								'min'  => 1,
								'max'  => 7,
								'step' => 1,
							),
						),
						'progress_bar'   => array(
							'type'    => 'select',
							'label'   => __( 'Show Progress Bar', 'bb-vapor-modules' ),
							'default' => 'false',
							'options' => array(
								'false' => __( 'No', 'bb-vapor-modules' ),
								'true'  => __( 'Yes', 'bb-vapor-modules' ),
							),
							'help'    => __( 'Requires the LearnDash grid add-on', 'bb-vapor-modules' ),
						),
						'show_content'   => array(
							'type'    => 'select',
							'label'   => __( 'Show Content', 'bb-vapor-modules' ),
							'default' => 'true',
							'options' => array(
								'false' => __( 'No', 'bb-vapor-modules' ),
								'true'  => __( 'Yes', 'bb-vapor-modules' ),
							),
						),
						'show_thumbnail' => array(
							'type'    => 'select',
							'label'   => __( 'Show Thumbnail', 'bb-vapor-modules' ),
							'default' => 'true',
							'options' => array(
								'false' => __( 'No', 'bb-vapor-modules' ),
								'true'  => __( 'Yes', 'bb-vapor-modules' ),
							),
						),
					),
				),
			),
		),
		'styles'       => array(
			'title'    => __( 'Default Styles', 'bb-vapor-modules' ),
			'sections' => array(
				'styles' => array(
					'title'  => __( 'Default Styles', 'bb-vapor-modules' ),
					'fields' => array(
						'quizzes_background_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Topic Background Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'quizzes_background_color_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Topic Background Color on Hover', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'quizzes_anchor_color'           => array(
							'type'       => 'color',
							'label'      => __( 'Topic Link Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'quizzes_anchor_color_hover'     => array(
							'type'       => 'color',
							'label'      => __( 'Topic Link Color on Hover', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'border'                         => array(
							'type'  => 'border',
							'label' => __( 'Topic Item Border', 'bb-vapor-modules' ),
						),
					),
				),
			),
		),
		'grid_styles'  => array(
			'title'    => __( 'Grid Styles', 'bb-vapor-modules' ),
			'sections' => array(
				'grid'   => array(
					'title'  => __( 'Grid', 'bb-vapor-modules' ),
					'fields' => array(
						'grid_alignment'        => array(
							'type'    => 'align',
							'label'   => __( 'Grid Item Alignment', 'bb-vapor-modules' ),
							'default' => 'center',
						),
						'grid_padding'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Grid Padding', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'grid_border'           => array(
							'type'  => 'border',
							'label' => __( 'Grid Border', 'bb-vapor-modules' ),
						),
						'grid_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Grid Item Background Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'title_color'           => array(
							'type'       => 'color',
							'label'      => __( 'Title Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'title_typography'      => array(
							'type'       => 'typography',
							'label'      => __( 'Title Typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'title_padding'         => array(
							'type'       => 'dimension',
							'label'      => __( 'Title Padding', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'title_margin'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Title Margin', 'bb-vapor-modules' ),
							'responsive' => true,
						),
					),
				),
				'image'  => array(
					'title'  => __( 'Image', 'bb-vapor-modules' ),
					'fields' => array(
						'image_border' => array(
							'type'  => 'border',
							'label' => __( 'Image Border', 'bb-vapor-modules' ),
						),
					),
				),
				'button' => array(
					'title'  => __( 'Button', 'bb-vapor-modules' ),
					'fields' => array(
						'button_background_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Button Background Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'button_background_color_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Button Background Color on Hover', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'button_text_color'             => array(
							'type'       => 'color',
							'label'      => __( 'Button Text Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'button_text_color_hover'       => array(
							'type'       => 'color',
							'label'      => __( 'Button Text Color on Hover', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'button_border'                 => array(
							'type'  => 'border',
							'label' => __( 'Button Border', 'bb-vapor-modules' ),
						),
					),
				),
				'colors' => array(
					'title'  => __( 'Colors', 'bb-vapor-modules' ),
					'fields' => array(
						'grid_progress_inactive' => array(
							'type'       => 'color',
							'label'      => __( 'Progress Bar Inactive Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'grid_progress_active'   => array(
							'type'       => 'color',
							'label'      => __( 'Progress Bar Active Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'percentage_text_color'  => array(
							'type'       => 'color',
							'label'      => __( 'Percentage Text Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'progress_text_color'    => array(
							'type'       => 'color',
							'label'      => __( 'Progress Text Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'course_price_heading'   => array(
							'type'       => 'color',
							'label'      => __( 'Course Heading Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'percentage_text_color'  => array(
							'type'       => 'color',
							'label'      => __( 'Percentage Text Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'progress_text_color'    => array(
							'type'       => 'color',
							'label'      => __( 'Progress Text Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'course_price_heading'   => array(
							'type'       => 'color',
							'label'      => __( 'Quiz Heading Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
					),
				),
			),
		),
		'pagination'   => array(
			'title'    => __( 'Pagination', 'bb-vapor-modules' ),
			'sections' => array(
				'container' => array(
					'title'  => __( 'Pagination', 'bb-vapor-modules' ),
					'fields' => array(
						'pager_background' => array(
							'type'       => 'color',
							'label'      => __( 'Pager Background Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'pager_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Pager Text Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'pager_border'     => array(
							'type'  => 'border',
							'label' => __( 'Pager Border', 'bb-vapor-modules' ),
						),
						'pager_typography' => array(
							'type'      => 'typography',
							'label'     => __( 'Pager Typography', 'bb-vapor-modules' ),
							'resonsive' => true,
						),
						'pager_padding'    => array(
							'type'      => 'dimension',
							'label'     => __( 'Pager Padding', 'bb-vapor-modules' ),
							'resonsive' => true,
						),
						'pager_margin'     => array(
							'type'      => 'dimension',
							'label'     => __( 'Pager Margin', 'bb-vapor-modules' ),
							'resonsive' => true,
						),
					),
				),
			),
		),
		'typography'   => array(
			'title'    => __( 'Typography', 'bb-vapor-modules' ),
			'sections' => array(
				'typography' => array(
					'title'  => __( 'Typography', 'bb-vapor-modules' ),
					'fields' => array(
						'course_typography'     => array(
							'type'       => 'typography',
							'label'      => __( 'Course Typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'price_typography'      => array(
							'type'       => 'typography',
							'label'      => __( 'Course Heading Typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'button_typography'     => array(
							'type'       => 'typography',
							'label'      => __( 'Button Typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'percentage_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Percentage Typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'progress_typography'   => array(
							'type'       => 'typography',
							'label'      => __( 'Progress Typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
					),
				),
			),
		),
	)
);
