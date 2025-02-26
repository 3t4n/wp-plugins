<?php //phpcs:ignore
class BBVapor_LearnDash_Profile extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'LearnDash Profile', 'bb-vapor-modules' ),
				'description'     => __( 'LearnDash Profile', 'bb-vapor-modules' ),
				'category'        => __( 'LearnDash', 'bb-vapor-modules' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules' ) ),
				'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/learndash-profile/',
				'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/learndash-profile/',
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
	'BBVapor_LearnDash_Profile',
	array(
		'options'    => array(
			'title'    => __( 'Options', 'bb-vapor-modules' ),
			'sections' => array(
				'container' => array(
					'title'  => __( 'Options', 'bb-vapor-modules' ),
					'fields' => array(
						'orderby'      => array(
							'type'    => 'select',
							'label'   => __( 'Order By', 'bb-vapor-modules' ),
							'default' => 'name',
							'options' => array(
								'none'     => __( 'None', 'bb-vapor-modules' ),
								'id'       => __( 'ID', 'bb-vapor-modules' ),
								'author'   => __( 'Author', 'bb-vapor-modules' ),
								'title'    => __( 'Title', 'bb-vapor-modules' ),
								'name'     => __( 'Name', 'bb-vapor-modules' ),
								'date'     => __( 'Date', 'bb-vapor-modules' ),
								'modified' => __( 'Modified', 'bb-vapor-modules' ),
							),
						),
						'order'        => array(
							'type'    => 'select',
							'label'   => __( 'Order', 'bb-vapor-modules' ),
							'default' => 'ASC',
							'options' => array(
								'ASC'  => __( 'A-Z', 'bb-vapor-modules' ),
								'DESC' => __( 'Z-A', 'bb-vapor-modules' ),
							),
						),
						'expand'       => array(
							'type'    => 'select',
							'label'   => __( 'Expand All', 'bb-vapor-modules' ),
							'default' => 'false',
							'options' => array(
								'false' => __( 'No', 'bb-vapor-modules' ),
								'true'  => __( 'Yes', 'bb-vapor-modules' ),
							),
						),
						'profile_link' => array(
							'type'    => 'select',
							'label'   => __( 'Show Profile Link', 'bb-vapor-modules' ),
							'default' => 'true',
							'options' => array(
								'false' => __( 'No', 'bb-vapor-modules' ),
								'true'  => __( 'Yes', 'bb-vapor-modules' ),
							),
						),
						'show_header'  => array(
							'type'    => 'select',
							'label'   => __( 'Show Header', 'bb-vapor-modules' ),
							'default' => 'true',
							'options' => array(
								'false' => __( 'No', 'bb-vapor-modules' ),
								'true'  => __( 'Yes', 'bb-vapor-modules' ),
							),
						),
						'show_quizzes' => array(
							'type'    => 'select',
							'label'   => __( 'Show Quizzes', 'bb-vapor-modules' ),
							'default' => 'true',
							'options' => array(
								'false' => __( 'No', 'bb-vapor-modules' ),
								'true'  => __( 'Yes', 'bb-vapor-modules' ),
							),
						),
						'show_search'  => array(
							'type'    => 'select',
							'label'   => __( 'Show Search', 'bb-vapor-modules' ),
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
		'image'      => array(
			'title'    => __( 'Profile Image', 'bb-vapor-modules' ),
			'sections' => array(
				'container' => array(
					'title'  => __( 'Profile Image', 'bb-vapor-modules' ),
					'fields' => array(
						'profile_appearance' => array(
							'type'    => 'select',
							'label'   => __( 'Appearance', 'bb-vapor-modules' ),
							'default' => 'circular',
							'options' => array(
								'circular' => __( 'Circular', 'bb-vapor-modules' ),
								'square'   => __( 'Square', 'bb-vapor-modules' ),
							),
						),
						'profile_border'     => array(
							'type'  => 'border',
							'label' => __( 'Border', 'bb-vapor-modules' ),
						),
						'profile_width'      => array(
							'type'    => 'unit',
							'label'   => __( 'Image Width', 'bb-vapor-modules' ),
							'default' => 150,
							'slider'  => array(
								'min'  => 25,
								'max'  => 150,
								'step' => 5,
							),
						),
					),
				),
			),
		),
		'appearance' => array(
			'title'    => __( 'Appearance', 'bb-vapor-modules' ),
			'sections' => array(
				'container' => array(
					'title'  => __( 'Appearance', 'bb-vapor-modules' ),
					'fields' => array(
						'stats_text_color'                 => array(
							'type'       => 'color',
							'label'      => __( 'Stats Text Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-learndash-profile-wrapper .ld-profile-stats, .bbvm-learndash-profile-wrapper .ld-profile-stats .ld-profile-stat span',
								'property' => 'color',
							),
						),
						'search_color'                     => array(
							'type'       => 'color',
							'label'      => __( 'Search Text Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-learndash-profile-wrapper .ld-search-prompt, .bbvm-learndash-profile-wrapper .ld-search-prompt .ld-icon-search',
								'property' => 'color',
							),
						),
						'accent_color'                     => array(
							'type'       => 'color',
							'label'      => __( 'Accent Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'accent_text_color'                => array(
							'type'       => 'color',
							'label'      => __( 'Accent Text Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'course_progress_complete_color'   => array(
							'type'       => 'color',
							'label'      => __( 'Course Progress Complete Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'course_progress_incomplete_color' => array(
							'type'       => 'color',
							'label'      => __( 'Course Progress Incomplete Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
					),
				),
			),
		),
		'typography' => array(
			'title'    => __( 'Typography', 'bb-vapor-modules' ),
			'sections' => array(
				'container' => array(
					'title'  => __( 'Typography', 'bb-vapor-modules' ),
					'fields' => array(
						'course_title' => array(
							'type'       => 'typography',
							'label'      => __( 'Course Title Typography', 'bb-vapor-modules' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-learndash-profile-wrapper .learndash-wrapper .ld-item-list .ld-course-title',
							),
						),
					),
				),
			),
		),
	)
);
