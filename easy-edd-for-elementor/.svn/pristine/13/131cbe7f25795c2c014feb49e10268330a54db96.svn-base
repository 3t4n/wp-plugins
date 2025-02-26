<?php
namespace EasyEddForElementor\Widgets;

use EasyEddForElementor\Widgets\Customizer\TemplateCustomizer;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class EasyEddForElementorProductsWidget extends \Elementor\Widget_Base {

	public function get_name ()
    {
		return esc_html__('EDD Products', 'ele-edd-addon');
	}

	public function get_title ()
    {
		return esc_html__( 'EDD Products', 'ele-edd-addon' );
	}

	public function get_icon ()
    {
		return ' eicon-products';
	}

	public function get_custom_help_url ()
    {
		return '';
	}

	public function get_categories() {
		return [ 'edd' ];
	}


	public function get_keywords() {
		return [ 'edd', 'product', 'link', 'download' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Product', 'ele-edd-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'edd-products',
			[
				'label' => esc_html__( 'Filter', 'ele-edd-addon' ),
				'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'all' => 'All',
                    'category' => 'By Category',
                    'tag' => 'By Tag',
                    'id' => 'By ID',
                    '_edd_download_sales' => 'By Sales',
                    '_edd_download_earnings' => 'By Earnings',
                ],
                'label_block' => true,
                'default' => 'all',
            ]
		);

        $this->add_control(
            'edd-category',
            [
                'label' => esc_html__( 'Category', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => Helper::getEddCategories(),
                'label_block' => true,
                'condition' => [
                    'edd-products' => 'category',
                ],
            ]
        );

        $this->add_control(
            'edd-tag',
            [
                'label' => esc_html__( 'Tag', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => Helper::getEddTags(),
                'label_block' => true,
                'condition' => [
                    'edd-products' => 'tag',
                ],
            ]
        );

        $this->add_control(
            'edd-id',
            [
                'label' => esc_html__( 'ID', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'ASC' => 'ASC',
                    'DESC' => 'DESC',
                ],
                'label_block' => true,
                'condition' => [
                    'edd-products' => 'id',
                ],
            ]
        );

        $this->add_control(
            'button-text',
            [
                'label' => esc_html__( 'Button Text', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Purchase', 'ele-edd-addon' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'template',
            [
                'label' => esc_html__( 'Template', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'grid-template' => 'Grid',
                    'list-template' => 'List',
                    'card-template-one' => 'Card Template One',
                ],
                'label_block' => true,
                'default' => 'grid-template',
            ]
        );

        $this->add_control(
            'product-per-row',
            [
                'label' => esc_html__( 'Product To Show In Each Row', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => esc_html__( 3, 'ele-edd-addon' ),
                'label_block' => true,
                'condition' => [
                    'template' => ['grid-template', 'card-template-one'],
                ],
            ]
        );

        $this->add_control(
            'card-bg',
            [
                'label' => esc_html__( 'Card Background', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .edd-product-card' => 'background-color: {{VALUE}};',
                ],
                'default' => '#f5f5f5',
                'condition' => [
                    'template' => 'card-template-one',
                ],
            ]
        );

        $this->add_control(
            'show-price',
            [
                'label' => esc_html__( 'Show Price On Button', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'ele-edd-addon' ),
                'label_off' => esc_html__( 'Hide', 'ele-edd-addon' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show-image',
            [
                'label' => esc_html__( 'Show Product Image', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'ele-edd-addon' ),
                'label_off' => esc_html__( 'Hide', 'ele-edd-addon' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

		$this->end_controls_section();

        // Register the widget controls
        (new TemplateCustomizer)->init( $this );

	}

    // Render the widget output on the frontend
	protected function render()
    {
		$settings = $this->get_settings_for_display();
        $purchaseLinkArgs = [
            'text' => $settings['button-text'],
            'price' => $settings['show-price'] === 'yes' ? true : false,
        ];

        $products = get_posts( $this->buildProductCondition($settings) );
        if(in_array($settings['edd-products'], ['_edd_download_sales', '_edd_download_earnings'])){
            $products = $this->maybeTopSellerOrTopEarner($settings['edd-products']);
        }

        require plugin_dir_path( __FILE__ ) . "templates/{$settings['template']}.php";
	}


    /**
     * Build the product rendering condition
     * @param array $settings
     * @return array
     */
    private function buildProductCondition ( $settings )
    {
        $productCondition = [
            'post_type' => 'download',
            'post_status' => 'publish',
            'order' => 'ASC'
        ];

        if(!$settings['edd-products']) return $productCondition;

        if ( $settings['edd-products'] === 'id' ) {
            $productCondition['orderby'] = 'ID';
            $productCondition['order'] = $settings['edd-id'];
            unset( $productCondition['tax_query'] );
        }

        if ( ! in_array($settings['edd-products'], ['all', 'id']) ) {
            $productCondition['tax_query'] = [
                [
                    'taxonomy' => "download_{$settings['edd-products']}",
                    'field' => 'slug',
                    'terms' => $settings["edd-{$settings['edd-products']}"],
                ]
            ];
        }

        return $productCondition;
    }

    /**
     * Get top seller or top earner products
     * @param string $key
     * @return object
     */
    private function maybeTopSellerOrTopEarner($key)
    {
        $args = array(
            'post_type' => 'download',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'meta_key' => $key,
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
        );
        $products = get_posts( $args );
        return $products;
    }

}