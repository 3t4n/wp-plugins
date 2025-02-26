<?php //phpcs:ignore
class BBVapor_LearnDash_Course_Info extends FLBuilderModule {

	/**
	 * Holds the settings object.
	 *
	 * @var array $filter_settings Settings object.
	 */
	private static $filter_settings = null;

	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'LearnDash Course Info', 'bb-vapor-modules' ),
				'description'     => __( 'LearnDash Course Info', 'bb-vapor-modules' ),
				'category'        => __( 'LearnDash', 'bb-vapor-modules' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules' ) ),
				'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/learndash-course-info/',
				'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/learndash-course-info/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
	}

	/**
	 * Populate the settings variable.
	 */
	public function sync_settings() {
		self::$filter_settings = $this->settings;
	}

	/**
	 * Filter for course info.
	 *
	 * @param array $args Shortcode attributes.
	 *
	 * @return array Modified arguments.
	 */
	public static function bbvm_course_info_filter( $args ) {
		$show = array();
		if ( 'yes' === self::$filter_settings->show_courses ) {
			$show[] = 'registered';
		}
		if ( 'yes' === self::$filter_settings->show_progress ) {
			$show[] = 'course';
		}
		if ( 'yes' === self::$filter_settings->show_quizzes ) {
			$show[] = 'quiz';
		}
		$args['type'] = $show;
		return $args;
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_LearnDash_Course_Info',
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
						'show_courses'     => array(
							'type'    => 'select',
							'label'   => __( 'Show Courses', 'bb-vapor-modules' ),
							'default' => 'yes',
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules' ),
								'yes' => __( 'Yes', 'bb-vapor-modules' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'num',
									),
								),
							),
						),
						'num'              => array(
							'type'    => 'unit',
							'label'   => __( 'Number of Courses', 'bb-vapor-modules' ),
							'default' => 50,
						),
						'show_progress'    => array(
							'type'    => 'select',
							'label'   => __( 'Show Course Progress', 'bb-vapor-modules' ),
							'default' => 'yes',
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules' ),
								'yes' => __( 'Yes', 'bb-vapor-modules' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'course_progress',
									),
								),
							),
						),
						'course_progress'  => array(
							'type'    => 'unit',
							'label'   => __( 'Number of Course Progress Items', 'bb-vapor-modules' ),
							'default' => 50,
						),
						'show_quizzes'     => array(
							'type'    => 'select',
							'label'   => __( 'Show Quizzes', 'bb-vapor-modules' ),
							'default' => 'yes',
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules' ),
								'yes' => __( 'Yes', 'bb-vapor-modules' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'course_quizzes',
									),
								),
							),
						),
						'course_quizzes'   => array(
							'type'    => 'unit',
							'label'   => __( 'Number of Quiz Items', 'bb-vapor-modules' ),
							'default' => 50,
						),
						'alignment'        => array(
							'type'    => 'align',
							'label'   => __( 'Content Alignment', 'bb-vapor-modules' ),
							'default' => 'left',
						),
						'show_thumbnail'   => array(
							'type'    => 'select',
							'label'   => __( 'Show Thumbnail', 'bb-vapor-modules' ),
							'default' => 'true',
							'options' => array(
								'false' => __( 'No', 'bb-vapor-modules' ),
								'true'  => __( 'Yes', 'bb-vapor-modules' ),
							),
							'toggle'  => array(
								'true' => array(
									'fields' => array(
										'thumbnail_width',
										'thumbnail_border',
									),
								),
							),
						),
						'thumbnail_width'  => array(
							'type'    => 'unit',
							'label'   => __( 'Thumbnail Max Width', 'bb-vapor-modules' ),
							'default' => 250,
						),
						'thumbnail_border' => array(
							'type'  => 'border',
							'label' => __( 'Thumbnail Border', 'bb-vapor-modules' ),
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
						'background_color'   => array(
							'type'       => 'color',
							'label'      => __( 'Container Background Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'border'             => array(
							'type'  => 'border',
							'label' => __( 'Container Border Color', 'bb-vapor-modules' ),
						),
						'heading_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Heading Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'content_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Content Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'link_color'         => array(
							'type'       => 'color',
							'label'      => __( 'Link Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'heading_padding'    => array(
							'type'       => 'dimension',
							'label'      => __( 'Heading Padding', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'heading_margin'     => array(
							'type'       => 'dimension',
							'label'      => __( 'Heading Margin', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'heading_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Heading Typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'content_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Content Typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
					),
				),
			),
		),
	)
);
