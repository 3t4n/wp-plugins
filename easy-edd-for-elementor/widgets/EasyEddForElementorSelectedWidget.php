<?php
namespace EasyEddForElementor\Widgets;
use EasyEddForElementor\Widgets\Customizer\TemplateCustomizer;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class EasyEddForElementorSelectedWidget extends \Elementor\Widget_Base {

    public function get_name ()
    {
        return esc_html__('Selected EDD Products', 'ele-edd-addon');
    }

    public function get_title ()
    {
        return esc_html__( 'Selected EDD Products', 'ele-edd-addon' );
    }

    public function get_icon ()
    {
        return 'eicon-products';
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
            'select_products',
            [
                'label' => esc_html__( 'Select Product(s)', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->getEddProducts(),
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

    /**
     * This method will get all edd products and return the id as array key and title as array value.
     * @return array $options
     */
    private function getEddProducts ()
    {
        $options = [];
        $args = [
            'post_type' => 'download',
            'posts_per_page' => -1,
            'post_status' => 'publish'
        ];

        $products = get_posts( $args );

        foreach ( $products as $product ) {
            $options[ $product->ID ] = $product->post_title;
        }

        return $options;
    }

    /**
     * Get edd products by selected ids.
     * @param array $settings
     * @return array $products
     */
    private function queryEddProducts ( $settings )
    {
        $products = [];
        if ( $settings['select_products'] ){
            foreach ( $settings['select_products'] as $product ) {
                $products[] =  new \EDD_Download( $product );
            }
        }

        return $products;
    }

    // Render the widget output on the frontend
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $products = $this->queryEddProducts( $settings );

        $purchaseLinkArgs = [
            'text' => $settings['button-text'],
            'price' => $settings['show-price'] === 'yes' ? true : false,
        ];

        require plugin_dir_path( __FILE__ ) . "templates/{$settings['template']}.php";
    }
}