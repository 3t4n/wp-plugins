<?php
/**
 * The plugin elementor shortcode Widget.
 *
 * @link       https://themeatelier.net/
 * @since      1.0.0
 *
 * @package    domain_for_sale
 * @subpackage domain_for_sale/Admin/ElementorAddons/Widgets
 * @author     ThemeAtelier <themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\DomainForSale\Admin\ElementorAddons\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor List Widget.
 *
 * Elementor widget that inserts an embeddable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Element_Shortcode_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve list widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'domain-for-sale-shortcode-ew';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve list widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Domain For Sale - Template', 'domain-for-sale' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve list widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-globe';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'basic' );
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return array( 'Domain For Sale', 'Shortcode', 'Template' );
	}

	/**
	 * Get all post list.
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function domain_for_sale_post_list() {
		$post_list = array(
			'' => __( '-- Select a template --', 'domain-for-sale' ) // Placeholder option
		);
		$domain_for_sale_posts = new \WP_Query(
			array(
				'post_type'      => 'dfs_template',
				'post_status'    => 'publish',
				'posts_per_page' => 10000,
			)
		);
		$posts           = $domain_for_sale_posts->posts;
		foreach ( $posts as $post ) {
			$post_list[ $post->ID ] = $post->post_title;
		}
		krsort( $post_list );
		return $post_list;
	}

	/**
	 * Register list widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			array(
				'label' => __( 'Content', 'domain-for-sale' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'domain_for_sale_shortcode',
			array(
				'label'       => __( 'Domain For Sale - Template Shortcode(s)', 'domain-for-sale' ),
				'type'        => \Elementor\Controls_Manager::SELECT,
				'label_block' => true,
				'default'     => '',
				'options'     => $this->domain_for_sale_post_list(),
			)
		);

		$this->end_controls_section();

	}

	/**
	 * Render list widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings                  = $this->get_settings_for_display();
		$domain_for_sale_shortcode = $settings['domain_for_sale_shortcode'];

		if ( '' === $domain_for_sale_shortcode ) {
			echo '<div style="text-align: center; margin-top: 0; padding: 10px" class="elementor-add-section-drag-title">Select a shortcode</div>';
			return;
		}

		$views_id = (int) $domain_for_sale_shortcode;
		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {

			echo do_shortcode( '[domain_for_sale id="' . esc_attr( $views_id ) . '"]' );
		} else {
			echo do_shortcode( '[domain_for_sale id="' . esc_attr( $views_id ) . '"]' );
		}
	}
}