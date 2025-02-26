<?php
namespace AewElementorLayout\Traits;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;

trait Helper
{
	private function aew_get_all_post_categories( $post_type ) {
		
		$options = array();

		$taxonomy = 'aew_services	';

		if ( ! empty( $taxonomy ) ) {
			// Get categories for post type.
			$terms = get_terms(
				array(
					'taxonomy'   => $taxonomy,
					'hide_empty' => false,
				)
			);
			if ( ! empty( $terms ) ) {
				foreach ( $terms as $term ) {
					if ( isset( $term ) ) {
						if ( isset( $term->slug ) && isset( $term->name ) ) {
							$options[ $term->slug ] = $term->name;
						}
					}
				}
			}
		}
		return $options;
	}

	private function aew_get_service_categories() {
		$taxonomy = 'service_tag';
		$terms = get_terms($taxonomy);
		$options = array();
		
		if ($terms) {
			foreach ($terms as $term) {
				if ( isset( $term ) ) {
					if ( isset( $term->term_id ) && isset( $term->name ) ) {
						$options[ $term->term_id ] = $term->name;
					}
				}
			}
		}
		wp_reset_query();
		return $options;
	}
	/**
	 * Post Category Options.
	 */
	private function aew_content_category_options() {

		$this->start_controls_section(
			'section_query',
			[
				'label' => __( 'Choose Category', 'elementor-layout' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		// Post categories
		$this->add_control(
			'post_categories',
			[
				'label'       => __( 'Categories', 'elementor-layout' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => true,
				'options'     => $this->aew_get_service_categories(),
				
			]
		);

		$this->end_controls_section();

	}


	/**
	 * Post Order Options.
	 */
	private function aew_content_order_options(){
		
		$this->start_controls_section(
			'post_order',
			[
				'label' => __( 'Choose order', 'elementor-layout' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'orderby',
			[
				'label' => __( 'Order By', 'elementor-layout' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'post_date',
				'options' => [
					'post_date' => __( 'Date', 'elementor-layout' ),
					'post_title' => __( 'Title', 'elementor-layout' ),
					'rand' => __( 'Random', 'elementor-layout' ),
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label' => __( 'Order', 'elementor-layout' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'desc',
				'options' => [
					'asc' => __( 'ASC', 'elementor-layout' ),
					'desc' => __( 'DESC', 'elementor-layout' ),
				],
			]
		);

		$this->end_controls_section();
	}

	private function aew_content_image_options(){
		$this->start_controls_section(
			'image_section',
			[
				'label' => __( 'Image Show/hide', 'elementor-layout' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_image',
			[
				'label' => __( 'Image', 'elementor-layout' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor-layout' ),
				'label_off' => __( 'Hide', 'elementor-layout' ),
				'default' => 'yes',
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'post_thumbnail',
				'exclude' => [ 'custom' ],
				'default' => 'full',
				'prefix_class' => 'post-thumbnail-size-',
				'condition' => [
					'show_image' => 'yes',
				],
			]
		);

		$this->end_controls_section();

	}
	private function aew_content_testimonial_image_options(){
		$this->start_controls_section(
			'image_section',
			[
				'label' => __( 'Image Show/hide', 'elementor-layout' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_image',
			[
				'label' => __( 'Image', 'elementor-layout' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor-layout' ),
				'label_off' => __( 'Hide', 'elementor-layout' ),
				'default' => 'yes',
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

	}


	private function aew_content_title_options(){
		$this->start_controls_section(
			'title_section',
			[
				'label' => __( 'Post Title Show/hide', 'elementor-layout' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_title',
			[
				'label' => __( 'Title', 'elementor-layout' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor-layout' ),
				'label_off' => __( 'Hide', 'elementor-layout' ),
				'default' => 'yes',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label' => __( 'Title HTML Tag', 'elementor-layout' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h2',
				'condition' => [
					'show_title' => 'yes',
				],
			]
		);

		$this->end_controls_section();

	}

	private function aew_content_metadata_options(){

		$this->start_controls_section(
			'metadata_section',
			[
				'label' => __( 'Include Metadata', 'elementor-layout' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'meta_data',
			[
				'label' => __( 'Meta Data', 'elementor-layout' ),
				'label_block' => true,
				'type' => Controls_Manager::SELECT2,
				'default' => [ 'author', 'date', 'comments','categories'],
				'multiple' => true,
				'options' => [
					'author' => __( 'Author', 'elementor-layout' ),
					'date' => __( 'Date', 'elementor-layout' ),
					'categories' => __( 'Categories', 'elementor-layout' ),
					'comments' => __( 'Comments', 'elementor-layout' ),
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

	}

	private function aew_content_options(){

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content Hide/show', 'elementor-layout' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_content',
			[
				'label' => __( 'Content', 'elementor-layout' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor-layout' ),
				'label_off' => __( 'Hide', 'elementor-layout' ),
				'default' => 'yes',
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

	}
	private function aew_content_excerpt_options(){

		$this->start_controls_section(
			'excerpt_section',
			[
				'label' => __( 'Excerpt Hide/show', 'elementor-layout' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_excerpt',
			[
				'label' => __( 'Excerpt', 'elementor-layout' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor-layout' ),
				'label_off' => __( 'Hide', 'elementor-layout' ),
				'default' => 'yes',
				'separator' => 'before',
			]
		);


		$this->add_control(
			'excerpt_length',
			[
				'label' => __( 'Excerpt Length', 'elementor-layout' ),
				'type' => Controls_Manager::NUMBER,
				/** This filter is documented in wp-includes/formatting.php */
				'default' => apply_filters( 'excerpt_length', 25 ),
				'condition' => [
					'show_excerpt' => 'yes',
				],
			]
		);

		$this->end_controls_section();

	}


	private function aew_team_content_excerpt_options(){

		$this->start_controls_section(
			'excerpt_section',
			[
				'label' => __( 'Excerpt Hide/show', 'elementor-layout' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_excerpt',
			[
				'label' => __( 'Excerpt', 'elementor-layout' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor-layout' ),
				'label_off' => __( 'Hide', 'elementor-layout' ),
				'default' => 'no',
				'separator' => 'before',
			]
		);


		$this->add_control(
			'excerpt_length',
			[
				'label' => __( 'Excerpt Length', 'elementor-layout' ),
				'type' => Controls_Manager::NUMBER,
				/** This filter is documented in wp-includes/formatting.php */
				'default' => apply_filters( 'excerpt_length', 25 ),
				'condition' => [
					'show_excerpt' => 'yes',
				],
			]
		);

		$this->end_controls_section();

	}

	private function aew_content_readmore_options(){
		$this->start_controls_section(
			'Readmore_section',
			[
				'label' => __( 'CTA Button Hide/show', 'elementor-layout' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_read_more',
			[
				'label' => __( 'CTA Button', 'elementor-layout' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor-layout' ),
				'label_off' => __( 'Hide', 'elementor-layout' ),
				'default' => 'yes',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'read_more_text',
			[
				'label' => __( 'CTA Button Text', 'elementor-layout' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Read More »', 'elementor-layout' ),
				'condition' => [
					'show_read_more' => 'yes',
				],
			]
		);

		$this->end_controls_section();

	}
	private function aew_team_content_readmore_options(){
		$this->start_controls_section(
			'Readmore_section',
			[
				'label' => __( 'CTA Button Hide/show', 'elementor-layout' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_read_more',
			[
				'label' => __( 'CTA Button', 'elementor-layout' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor-layout' ),
				'label_off' => __( 'Hide', 'elementor-layout' ),
				'default' => 'no',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'read_more_text',
			[
				'label' => __( 'CTA Button Text', 'elementor-layout' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Read More »', 'elementor-layout' ),
				'condition' => [
					'show_read_more' => 'yes',
				],
			]
		);

		$this->end_controls_section();

	}
	

}