<?php
namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;

class CourseReviews extends Widget_Base {
	use CommonStyle;

	public function get_name() {
		return 'academyea-course-reviews';
	}

	public function get_title() {
		return __( 'Course Reviews', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-review';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'course reviews', 'course', 'reviews', 'academy', 'lms' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'course_review_form',
			array(
				'label' => __( 'Reviews Form', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'course_review_form',
			'{{WRAPPER}} .academy-review-form',
			[ 'background', 'border', 'radius', 'padding', 'margin' ]
		);

		$this->end_controls_section();

		$this->button_style(
			[
				'title'          => esc_html__( 'Add Review Button', 'academy-elementor-addons' ),
				'slug'           => 'review_form_add_review_button',
				'selector'       => '{{WRAPPER}} .academy-review-form .academy-btn-add-review',
				'hover_selector' => '{{WRAPPER}} .academy-review-form .academy-btn-add-review:hover',
			]
		);

		$this->start_controls_section(
			'course_review_form_content',
			array(
				'label' => __( 'Review Form Content', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'review_form_rating_icon_style',
			[
				'label' => esc_html__( 'Icon Style', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'review_form_rating_icon',
			'{{WRAPPER}} .academy-review-form .comment-respond .comment-form .stars a',
			[ 'color', 'typography' ]
		);

		$this->add_control(
			'review_form_rating_icon_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'review_form_rating_text_style',
			[
				'label' => esc_html__( 'Text Style', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'review_form_rating_text',
			'{{WRAPPER}} .academy-review-form .comment-respond .comment-form .academy-review-form-review textarea',
			[ 'color', 'typography', 'background', 'border', 'radius' ]
		);

		$this->add_control(
			'review_form_rating_text_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'review_form_rating_placeholder_style',
			[
				'label' => esc_html__( 'Placeholder Style', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'review_form_rating_placeholder',
			'{{WRAPPER}} .academy-review-form .comment-respond .comment-form .academy-review-form-review textarea::placeholder',
			[ 'color', 'typography' ]
		);

		$this->end_controls_section();

		$this->button_style(
			[
				'title'          => esc_html__( 'Submit Button', 'academy-elementor-addons' ),
				'slug'           => 'review_form_submit_button',
				'selector'       => '.academy-review-form .comment-respond .comment-form .form-submit input[type = submit]',
				'hover_selector' => '.academy-review-form .comment-respond .comment-form .form-submit input[type = submit]:hover',
			]
		);

		$this->start_controls_section(
			'course_review_list',
			array(
				'label' => __( 'Review List', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'review_rating_general_style',
			[
				'label' => esc_html__( 'General Style', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'course_review_list',
			'{{WRAPPER}} .academy-review-list li',
			[ 'background', 'border', 'radius', 'padding', 'margin' ]
		);

		$this->add_control(
			'course_review_list_general_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'review_rating_user_thumbnail_style',
			[
				'label' => esc_html__( 'Profile Picture', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'review_rating_user_thumbnail',
			'{{WRAPPER}} .academy-review-list li .academy-review_container .academy-review-thumnail img',
			[ 'border', 'radius' ]
		);

		$this->size_element(
			'review_rating_user_thumbnail',
			'_rating_user_user_thumbnail',
			'{{WRAPPER}} .academy-review-list li .academy-review_container .academy-review-thumnail img',
			[ 'width', 'height' ]
		);

		$this->add_control(
			'review_rating_user_thumbnail_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'review_rating_text_style',
			[
				'label' => esc_html__( 'Rating Text', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'review_rating_text',
			'{{WRAPPER}} .academy-review-list li .academy-review_container .academy-review-thumnail .academy-review__rating',
			[ 'color', 'typography' ]
		);

		$this->add_control(
			'review_rating_text_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'review_rating_icon_style',
			[
				'label' => esc_html__( 'Rating Icon', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'review_rating_icon',
			'{{WRAPPER}} .academy-review-list li .academy-review_container .academy-review-thumnail .academy-review__rating .academy-icon:before',
			[ 'color', 'typography' ]
		);

		$this->add_control(
			'review_rating_icon_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'review_rating_username_style',
			[
				'label' => esc_html__( 'Username Style', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'review_rating_username',
			'{{WRAPPER}} .academy-review-list li .academy-review_container .academy-review-content .academy-review-meta .academy-review-meta__author',
			[ 'color', 'typography' ]
		);

		$this->add_control(
			'review_rating_username_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'review_rating_date_style',
			[
				'label' => esc_html__( 'Date Style', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'review_rating_date',
			'{{WRAPPER}} .academy-review-list li .academy-review_container .academy-review-content .academy-review-meta .academy-review-meta__published-date',
			[ 'color', 'typography' ]
		);

		$this->add_control(
			'review_rating_date_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'review_rating_description_style',
			[
				'label' => esc_html__( 'Description Style', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'review_rating_description',
			'{{WRAPPER}} .academy-review-list li .academy-review_container .academy-review-content .academy-review-description p',
			[ 'color', 'typography' ]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$course_id = ( \Elementor\Plugin::$instance->editor->is_edit_mode() || Helper::is_academyea_preview_mode() ) ? Helper::get_last_course_id() : get_the_ID();
		$args = array(
			'post_id' => $course_id,
		);
		$comments = get_comments( $args );
		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() || Helper::is_academyea_preview_mode() ) : ?>
			<div class="academy-review-form">
				<div class="academy-review-form__add-review">
					<button class="academy-btn academy-btn--bg-purple academy-btn-add-review"><?php esc_html_e( 'Add Review', 'academy-elementor-addons' ); ?></button>
				</div>
				<?php
				$comment_form = array(
					/* translators: %s is product title */
					'title_reply'         => '',
					/* translators: %s is product title */
					'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'academy-elementor-addons' ),
					'title_reply_before'  => '<span id="reply-title" class="academy-review-reply-title">',
					'title_reply_after'   => '</span>',
					'comment_notes_after' => '',
					'label_submit'        => esc_html__( 'Submit', 'academy-elementor-addons' ),
					'logged_in_as'        => '',
					'comment_field'       => '',
				);

				$name_email_required = true;
				$fields              = array(
					'author' => array(
						'label'    => __( 'Name', 'academy-elementor-addons' ),
						'type'     => 'text',
						'value'    => '',
						'required' => $name_email_required,
					),
					'email'  => array(
						'label'    => __( 'Email', 'academy-elementor-addons' ),
						'type'     => 'email',
						'value'    => '',
						'required' => $name_email_required,
					),
				);

				$comment_form['fields'] = array();

				foreach ( $fields as $key => $field ) {
					$field_html  = '<p class="academy-review-form-' . esc_attr( $key ) . '">';
					$field_html .= '<label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] );

					if ( $field['required'] ) {
						$field_html .= '&nbsp;<span class="required">*</span>';
					}

					$field_html .= '</label><input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' /></p>';

					$comment_form['fields'][ $key ] = $field_html;
				}

				$login_page_url = wp_login_url( get_permalink() );
				if ( $login_page_url ) {
					/* translators: %s opening and closing link tags respectively */
					$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'academy-elementor-addons' ), '<a href="' . esc_url( $login_page_url ) . '">', '</a>' ) . '</p>';
				}

				$comment_form['comment_field'] = '<div class="academy-review-form-rating"><select name="academy_rating" id="academy_rating" required>
					<option value="">' . esc_html__( 'Rate&hellip;', 'academy-elementor-addons' ) . '</option>
					<option value="5">' . esc_html__( 'Perfect', 'academy-elementor-addons' ) . '</option>
					<option value="4">' . esc_html__( 'Good', 'academy-elementor-addons' ) . '</option>
					<option value="3">' . esc_html__( 'Average', 'academy-elementor-addons' ) . '</option>
					<option value="2">' . esc_html__( 'Not that bad', 'academy-elementor-addons' ) . '</option>
					<option value="1">' . esc_html__( 'Very poor', 'academy-elementor-addons' ) . '</option>
				</select></div>';

				$comment_form['comment_field'] .= '<p class="academy-review-form-review"><textarea id="academy_comment" name="comment" cols="45" rows="8" placeholder="' . esc_html__( 'Enter your feedback', 'academy-elementor-addons' ) . '" required></textarea></p>';

				comment_form( $comment_form, $course_id );
				?>
			</div>
			<?php if ( $comments ) : ?>
				<ol class="academy-review-list">
					<?php
					wp_list_comments(array(
						'callback' => 'academy_review_lists',
					), $comments); ?>
				</ol>

			<?php else :
				if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) : ?>
				<p class="academy-no-reviews"><?php echo wp_kses_post( __( '<strong>Editor Only Message:</strong> This Course have no review. Please add review in latest course from the course single page.', 'academy-elementor-addons' ) ); ?></p>
							<?php endif;
endif;
		else :
			academy_single_course_reviews();
		endif;
	}

}
