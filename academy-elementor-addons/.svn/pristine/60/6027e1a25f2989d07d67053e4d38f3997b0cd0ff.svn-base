<?php
namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;

class CourseCurriculum extends Widget_Base {

	use CommonStyle;

	public function get_name() {
		return 'academyea-course-curriculum';
	}

	public function get_title() {
		return __( 'Course Curriculum', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-document-file';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'course curriculum', 'course', 'curriculum', 'academy', 'lms' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'course_curriculum_content',
			[
				'label' => __( 'General Settings', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'academy-elementor-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Topics for this course', 'academy-elementor-addons' ),
				'rows' => 3,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'title_style',
			array(
				'label' => __( 'Title', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'title',
			'{{WRAPPER}} .academy-single-course__content-item--curriculum .academy-curriculum-title',
			[ 'typography', 'color' ]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label' => __( 'Gap', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .academy-single-course__content-item--curriculum .academy-curriculum-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 15,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'topic_style',
			array(
				'label' => __( 'Topic', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_responsive_control(
			'course_topic_icon_size',
			[
				'label' => __( 'Icon Size', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .academy-single-course__content-item--curriculum .academy-accordion li a.academy-accordion__title:after' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}}',
				],
				'default' => [
					'size' => 11,
				],
			]
		);

		$this->normal_element(
			'topic_text',
			'{{WRAPPER}} .academy-single-course__content-item--curriculum .academy-accordion li .academy-accordion__title',
			[ 'typography', 'border', 'radius' ]
		);

		$this->start_controls_tabs( 'topic_style_tabs' );

		$this->start_controls_tab(
			'topic_normal_style_tab',
			[
				'label' => __( 'Normal', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'topic_normal_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-single-course__content-item--curriculum .academy-accordion li a.academy-accordion__title:after' => 'border-right-color: {{VALUE}};border-bottom-color: {{VALUE}};',
				],
			]
		);

		$this->normal_element(
			'topic_normal',
			'{{WRAPPER}} .academy-single-course__content-item--curriculum .academy-accordion li .academy-accordion__title',
			[ 'color', 'background' ]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'topic_hover_style_tab',
			[
				'label' => __( 'Hover', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'topic_hover_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-single-course__content-item--curriculum .academy-accordion li a.academy-accordion__title:hover:after' => 'border-right-color: {{VALUE}};border-bottom-color: {{VALUE}};',
				],
			]
		);

		$this->normal_element(
			'topic_hover',
			'{{WRAPPER}} .academy-single-course__content-item--curriculum .academy-accordion li .academy-accordion__title:hover, {{WRAPPER}} .academy-single-course__content-item--curriculum .academy-accordion li.active .academy-accordion__title:hover',
			[ 'color', 'background' ]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'topic_active_style_tab',
			[
				'label' => __( 'Active', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'topic_active_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-single-course__content-item--curriculum .academy-accordion li.active a.academy-accordion__title:after' => 'border-right-color: {{VALUE}};border-bottom-color: {{VALUE}};',
				],
			]
		);

		$this->normal_element(
			'topic_active',
			'{{WRAPPER}} .academy-single-course__content-item--curriculum .academy-accordion li.active .academy-accordion__title',
			[ 'color', 'background' ]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'sub_topic_style',
			array(
				'label' => __( 'Sub Topic', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_responsive_control(
			'course_sub_topic_icon_size',
			[
				'label' => __( 'Icon Size', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .academy-single-course__content-item.academy-single-course__content-item--curriculum .academy-accordion.academy-sub-curriculum-accordion li.academy-entry-thumbnail a.academy-accordion__title:after' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}}!important',
				],
				'default' => [
					'size' => 11,
				],
			]
		);

		$this->normal_element(
			'sub_topic_text',
			'{{WRAPPER}} .academy-single-course__content-item.academy-single-course__content-item--curriculum .academy-accordion.academy-sub-curriculum-accordion li.academy-entry-thumbnail .academy-accordion__title',
			[ 'typography', 'border', 'radius' ]
		);

		$this->start_controls_tabs( 'sub_topic_style_tabs' );

		$this->start_controls_tab(
			'sub_topic_normal_style_tab',
			[
				'label' => __( 'Normal', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'sub_topic_normal_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-single-course__content-item.academy-single-course__content-item--curriculum .academy-accordion.academy-sub-curriculum-accordion li.academy-entry-thumbnail a.academy-accordion__title:after' => 'border-right-color: {{VALUE}};border-bottom-color: {{VALUE}};',
				],
			]
		);

		$this->normal_element(
			'sub_topic_normal',
			'{{WRAPPER}} .academy-single-course__content-item.academy-single-course__content-item--curriculum .academy-accordion.academy-sub-curriculum-accordion li.academy-entry-thumbnail .academy-accordion__title',
			[ 'color', 'background' ]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'sub_topic_hover_style_tab',
			[
				'label' => __( 'Hover', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'sub_topic_hover_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-single-course__content-item.academy-single-course__content-item--curriculum .academy-accordion.academy-sub-curriculum-accordion li.academy-entry-thumbnail a.academy-accordion__title:hover:after' => 'border-right-color: {{VALUE}};border-bottom-color: {{VALUE}};',
				],
			]
		);

		$this->normal_element(
			'sub_topic_hover',
			'{{WRAPPER}} .academy-single-course__content-item.academy-single-course__content-item--curriculum .academy-accordion.academy-sub-curriculum-accordion li.academy-entry-thumbnail .academy-accordion__title:hover, {{WRAPPER}} .academy-single-course__content-item.academy-single-course__content-item--curriculum .academy-accordion.academy-sub-curriculum-accordion li.academy-entry-thumbnail.active .academy-accordion__title:hover',
			[ 'color', 'background' ]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'sub_topic_active_style_tab',
			[
				'label' => __( 'Active', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'sub_topic_active_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-single-course__content-item.academy-single-course__content-item--curriculum .academy-accordion.academy-sub-curriculum-accordion li.academy-entry-thumbnail.active a.academy-accordion__title:after' => 'border-right-color: {{VALUE}};border-bottom-color: {{VALUE}};',
				],
			]
		);

		$this->normal_element(
			'sub_topic_active',
			'.academy-single-course__content-item.academy-single-course__content-item--curriculum .academy-accordion.academy-sub-curriculum-accordion li.academy-entry-thumbnail.active .academy-accordion__title',
			[ 'color', 'background' ]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'content_style',
			array(
				'label' => __( 'Content', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_responsive_control(
			'content_icon_size',
			[
				'label' => __( 'Icon Size', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .academy-accordion li .academy-accordion__body .academy-lesson-list li .academy-btn-play i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 16,
				],
			]
		);

		$this->normal_element(
			'content_text',
			'{{WRAPPER}} .academy-accordion li .academy-accordion__body .academy-entry-content .academy-entry-title,{{WRAPPER}} .academy-accordion li .academy-accordion__body .academy-entry-content .academy-entry-time',
			[ 'typography' ]
		);

		$this->normal_element(
			'curriculam_content',
			'{{WRAPPER}} .academy-accordion li .academy-accordion__body .academy-lesson-list li',
			[ 'padding' ]
		);

		$this->add_control(
			'content_separator_width',
			[
				'label' => __( 'Separator Width', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .academy-accordion li .academy-accordion__body .academy-lesson-list li:not(:first-child)' => 'border-top-width: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 1,
				],
			]
		);

		$this->add_control(
			'content_normal_separator_color',
			[
				'label' => esc_html__( 'Separator Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-accordion li .academy-accordion__body .academy-lesson-list li:not(:first-child)' => 'border-top-color: {{VALUE}};',
				],
			]
		);

		$this->start_controls_tabs( 'content_style_tabs' );

		$this->start_controls_tab(
			'content_normal_style_tab',
			[
				'label' => __( 'Normal', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'content_normal_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-accordion li .academy-accordion__body .academy-lesson-list li .academy-btn-play i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'content_normal_thumbnail_color',
			[
				'label' => esc_html__( 'Thumbnail Background Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-accordion li .academy-accordion__body .academy-lesson-list__item .academy-entry-thumbnail' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'content_normal_text_color',
			[
				'label' => esc_html__( 'Text Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-accordion li .academy-accordion__body .academy-entry-content .academy-entry-title,{{WRAPPER}} .academy-accordion li .academy-accordion__body .academy-entry-content .academy-entry-time' => 'color: {{VALUE}};',
				],
			]
		);

		$this->normal_element(
			'content_normal',
			'{{WRAPPER}} .academy-accordion li .academy-accordion__body .academy-lesson-list li',
			[ 'background' ]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'content_hover_style_tab',
			[
				'label' => __( 'Hover', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'content_hover_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-accordion li .academy-accordion__body .academy-lesson-list li:hover .academy-btn-play i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'content_hover_thumbnail_color',
			[
				'label' => esc_html__( 'Thumbnail Background Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-accordion li .academy-accordion__body .academy-lesson-list__item:hover .academy-entry-thumbnail' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'content_hover_text_color',
			[
				'label' => esc_html__( 'Text Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-accordion li .academy-accordion__body .academy-lesson-list li:hover .academy-entry-content .academy-entry-title,{{WRAPPER}} .academy-accordion li .academy-accordion__body .academy-lesson-list li:hover .academy-entry-content .academy-entry-time' => 'color: {{VALUE}};',
				],
			]
		);

		$this->normal_element(
			'content_hover',
			'{{WRAPPER}} .academy-accordion li .academy-accordion__body .academy-lesson-list li:hover',
			[ 'background' ]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$course_id = ( \Elementor\Plugin::$instance->editor->is_edit_mode() || Helper::is_academyea_preview_mode() ) ? Helper::get_last_course_id() : get_the_ID();
		$curriculums = \Academy\Helper::get_course_curriculum( $course_id, false );
		$topics_first_item_open_status = (bool) \Academy\Helper::get_settings( 'is_opened_course_single_first_topic', true );
		$lessons = [];

		if ( is_array( $curriculums ) && count( $curriculums ) ) {
			foreach ( $curriculums as $topic ) {
				if ( isset( $topic['topics'] ) && is_array( $topic['topics'] ) && count( $topic['topics'] ) ) {
					foreach ( $topic['topics'] as $lesson ) {
						$featured_media = \Academy\Helper::get_lesson_meta( $lesson['id'], 'featured_media' );
						if ( ! empty( $featured_media ) ) {
							$featured_media = wp_get_attachment_image_src( $featured_media, 'full' );
						}
						$video_duration = \Academy\Helper::get_lesson_meta( $lesson['id'], 'video_duration' );
						$lessons[ $lesson['id'] ] = array(
							'is_preview_able' => \Academy\Helper::get_lesson_meta( $lesson['id'], 'is_previewable' ),
							'featured_media' => ( is_array( $featured_media ) ? $featured_media[0] : '' ),
							'video_duration' => $video_duration,
						);
					}
				}
			}
		}
		if ( ! empty( $curriculums ) ) :
			?>

			<div class="academy-single-course__content-item academy-single-course__content-item--curriculum">
				<div class="academy-course-curriculum-header">
					<h4 class="academy-curriculum-title"><?php echo esc_html( $settings['title'] ); ?></h4>
				</div>

				<ul class="academy-accordion">
					<?php
					if ( is_array( $curriculums ) && count( $curriculums ) ) :
						foreach ( $curriculums as $curriculum_item_index => $curriculum_item ) :
							// $topics_first_item_open_status = true;
							?>
							<li class="academy-entry-thumbnail <?php if ( 0 === $curriculum_item_index && true === $topics_first_item_open_status ) :
								?> active <?php endif; ?>" >
								<a class="academy-accordion__title"><?php echo esc_html( $curriculum_item['title'] ); ?></a>
								<div class="academy-accordion__body">
									<?php
									if ( is_array( $curriculum_item['topics'] ) && count( $curriculum_item['topics'] ) > 0 ) {
										?>
										<ul class="academy-lesson-list">
											<?php
											foreach ( $curriculum_item['topics'] as $index => $topic ) {
												if ( 'sub-curriculum' === $topic['type'] ) : ?>
													<ul class="academy-accordion academy-sub-curriculum-accordion">
														<li class="academy-entry-thumbnail <?php if ( 0 === $curriculum_item_index && true === $topics_first_item_open_status ) :
															?> active <?php endif; ?>" >
															<a class="academy-accordion__title"><?php echo esc_html( $topic['name'] ); ?></a>
															<div class="academy-accordion__body">
																<ul class="academy-lesson-list">
																	<?php
																	// Sub Curriculums loop
																	if ( is_array( $topic['topics'] ) && count( $topic['topics'] ) > 0 ) :
																		foreach ( $topic['topics'] as $sub_index => $sub_topic ) : ?>
																			<li class="academy-lesson-list__item academy-sub-lesson-list__item">
																				<div class="academy-entry-content">
																					<i class="<?php echo esc_attr( \Academy\Helper::get_topic_icon_class_name( $sub_topic['type'] ) ); ?>" aria-hidden="true"></i>
																					<h4 class="academy-entry-title"><?php echo esc_html( $sub_topic['name'] ); ?></h4>
																				</div>
																				<div class="academy-entry-control">
																					<?php
																					if ( $sub_topic['is_accessible'] ) :
																						?>
																						<a href="<?php echo esc_url( \Academy\Helper::get_topic_play_link( $sub_topic, $course_id ) ); ?>" class="academy-btn-play academy-btn-lesson-preview">
																							<i class="academy-icon academy-icon--eye"></i>
																						</a>
																					<?php else : ?>
																						<a href="javascript:void(0);" class="academy-btn-play academy-btn-play-lock" disabled="disabled">
																							<i class="academy-icon academy-icon--lock"></i>
																						</a>
																					<?php endif; ?>
																				</div>
																			</li>
																			<?php
																		endforeach;
																	endif;
																	// End Sub Curriculums loop
																	?>
																</ul>
															</div>
														</li>
													</ul>
												<?php else :
													?>
													<li class="academy-lesson-list__item">
														<div class="academy-entry-content">
															<i class="<?php echo esc_attr( \Academy\Helper::get_topic_icon_class_name( $topic['type'] ) ); ?>" aria-hidden="true"></i>
															<h4 class="academy-entry-title"><?php echo esc_html( wp_strip_all_tags( $topic['name'] ) ); ?></h4>
															<?php
															if ( isset( $topic['duration'] ) ) : ?>
																<span class="academy-entry-time"><?php echo esc_html( $topic['duration'] ); ?></span>
																<?php
															endif;
															?>
														</div>
														<div class="academy-entry-control">
															<?php
															if ( $topic['is_accessible'] ) :
																?>
																<a href="<?php echo esc_url( \Academy\Helper::get_topic_play_link( $topic, $course_id ) ); ?>" class="academy-btn-play academy-btn-lesson-preview">
																	<i class="academy-icon academy-icon--eye"></i>
																</a>
															<?php else : ?>
																<a href="javascript:void(0);" class="academy-btn-play academy-btn-play-lock" disabled="disabled">
																	<i class="academy-icon academy-icon--lock"></i>
																</a>
															<?php endif; ?>
														</div>
													</li>
													<?php
												endif;
											}//end foreach
											?>
										</ul>
										<?php
									}//end if
									?>
								</div>
							</li>
							<?php
						endforeach;
					endif;
					?>
				</ul>
			</div>
			<?php
		elseif ( \Elementor\Plugin::instance()->editor->is_edit_mode() ) :
			echo '<div class="no-data-message">' . wp_kses_post( __( '<strong>Editor Only Message:</strong> Please add course curriculam in latest course from the course editor', 'academy-elementor-addons' ) ) . '</div>';
		endif;
	}
}
