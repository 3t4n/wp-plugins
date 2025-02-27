<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor pcw Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Pcw_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve pcw widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'pcw';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve pcw widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Product Category', 'elementor-pcw-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve pcw widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-product-categories';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the pcw widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'general' );
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the pcw widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return array( 'pcw', 'url', 'link' );
	}

	/**
	 * Register pcw widget controls.
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
				'label' => esc_html__( 'Content', 'elementor-pcw-widget' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'title',
			array(
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label'       => esc_html__( 'Title', 'elementor-pcw-widget' ),
				'placeholder' => esc_html__( 'Enter your title', 'elementor-pcw-widget' ),
			)
		);

		$this->add_control(
			'alignment',
			array(
				'type'    => \Elementor\Controls_Manager::CHOOSE,
				'label'   => esc_html__( 'Alignment', 'elementor-pcw-widget' ),
				'options' => array(
					'left'   => array(
						'title' => esc_html__( 'Left', 'elementor-pcw-widget' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'elementor-pcw-widget' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => esc_html__( 'Right', 'elementor-pcw-widget' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'default' => 'center',
			)
		);

		$this->add_control(
			'display_category',
			array(
				'type'    => \Elementor\Controls_Manager::SELECT,
				'label'   => esc_html__( 'Display Category', 'elementor-pcw-widget' ),
				'default' => '0',
				'options' => array(
					'0' => esc_html__( 'Parent Category', 'elementor-pcw-widget' ),
					''  => esc_html__( 'Parent Category + Sub Category', 'elementor-pcw-widget' ),
				),
			)
		);

		$this->add_control(
			'numbers_of_product',
			array(
				'label'   => esc_html__( 'Enter Number of Products', 'elementor-pcw-widget' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 8,
				'max'     => 150,
				'step'    => 1,
				'default' => 10,
			)
		);

		$this->add_control(
			'numbers_of_columns',
			array(
				'label'   => esc_html__( 'Enter Number of Columns', 'elementor-pcw-widget' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 3,
				'max'     => 10,
				'default' => 4,
			)
		);

		$this->add_control(
			'cat_orderby',
			array(
				'type'    => \Elementor\Controls_Manager::SELECT,
				'label'   => esc_html__( 'Orderby', 'elementor-pcw-widget' ),
				'default' => 'name',
				'options' => array(
					'name' => esc_html__( 'Name', 'elementor-pcw-widget' ),
					'slug' => esc_html__( 'Slug', 'elementor-pcw-widget' ),
				),
			)
		);

		$this->add_control(
			'cat_order',
			array(
				'type'    => \Elementor\Controls_Manager::SELECT,
				'label'   => esc_html__( 'Order', 'elementor-pcw-widget' ),
				'default' => 'ASC',
				'options' => array(
					'ASC'  => esc_html__( 'ASC', 'elementor-pcw-widget' ),
					'DESC' => esc_html__( 'DESC', 'elementor-pcw-widget' ),
				),
			)
		);

		$this->add_control(
			'show_description',
			array(
				'type'    => \Elementor\Controls_Manager::SELECT,
				'label'   => esc_html__( 'Show Description', 'elementor-pcw-widget' ),
				'default' => 'false',
				'options' => array(
					'true'  => esc_html__( 'Yes', 'elementor-pcw-widget' ),
					'false' => esc_html__( 'No', 'elementor-pcw-widget' ),
				),
			)
		);

		$this->add_control(
			'pcw_default_style',
			array(
				'type'    => \Elementor\Controls_Manager::SELECT,
				'label'   => esc_html__( 'Select Defalut Style', 'elementor-pcw-widget' ),
				'default' => 'default',
				'options' => array(
					'default' => esc_html__( 'Default Style', 'elementor-pcw-widget' ),
					'style1'  => esc_html__( 'Style 1', 'elementor-pcw-widget' ),
					'style2'  => esc_html__( 'Style 2', 'elementor-pcw-widget' ),
					'style3'  => esc_html__( 'Style 3', 'elementor-pcw-widget' ),
					'style4'  => esc_html__( 'Style 4', 'elementor-pcw-widget' ),
					'style5'  => esc_html__( 'Style 5', 'elementor-pcw-widget' ),
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			array(
				'label' => esc_html__( 'Style', 'elementor-pcw-widget' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'selector' => '{{WRAPPER}} .product-cats .pro_name',
			)
		);

		$this->add_control(
			'color',
			array(
				'label'     => esc_html__( 'Color', 'elementor-pcw-widget' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#f00',
				'selectors' => array(
					'{{WRAPPER}} h3'                      => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-cats .pro_name' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'elementor-pcw-widget' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .product-cats'     => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .product-cats img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'pcw_pagination',
			array(
				'type'    => \Elementor\Controls_Manager::SELECT,
				'label'   => esc_html__( 'Show/Hide Pagination', 'elementor-pcw-widget' ),
				'default' => 'show',
				'options' => array(
					'show' => esc_html__( 'Show', 'elementor-pcw-widget' ),
					'hide' => esc_html__( 'Hide', 'elementor-pcw-widget' ),
				),
			)
		);

		$this->end_controls_section();

	}

	/**
	 * Render pcw widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings   = $this->get_settings_for_display();
		$text_color = isset( $settings['color'] ) ? $settings['color'] : '#000000';

		echo '<div class="pcw-elementor-widget">';
		echo '<h3 style="text-align:' . esc_attr( $settings['alignment'] ) . ' ">' . esc_attr( $settings['title'] ) . '</h3>';
		echo '</div>';
		echo do_shortcode( '[PCW number="' . $settings['numbers_of_product'] . '" columns="' . $settings['numbers_of_columns'] . '" orderby="' . $settings['cat_orderby'] . '" order="' . $settings['cat_order'] . '" hide_empty="0" parent="' . $settings['display_category'] . '" ids="" description="' . $settings['show_description'] . '" color="' . $text_color . '" style="' . $settings['pcw_default_style'] . '" pagination="' . $settings['pcw_pagination'] . '"]' );
	}

	/**
	 * Render pcw widget content template.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function content_template() {
		?>
		<h3 class="{{ settings.class }}" style="text-align: {{ settings.alignment }};">{{{ settings.title }}}</h3>
		<?php
		echo '[PCW number="{{settings.numbers_of_product}}" columns="{{settings.numbers_of_columns}}" orderby="{{settings.cat_orderby}}" order="{{settings.cat_order}}" hide_empty="0" parent="{{settings.display_category}}" ids="" description="{{settings.show_description}}" color="{{settings.color}}" style="{{settings.pcw_default_style}}" pagination="{{settings.pcw_pagination}}"]';
	}
}
