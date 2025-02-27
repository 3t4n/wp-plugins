<?php
namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use News_Element\Khobish_Helper;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class xlmega_tmpl extends Widget_Base {

    public function get_name() {
        return 'xlmega_tmpl';
    }

    public function get_title() {
        return   esc_html__('Mega menu', 'news-element');
    }

    public function get_icon() {
        return 'dashicons dashicons-editor-paragraph';
    }

    public function get_categories() {
        return [ 'xlmega_menu' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'lbl_query',
            [
                'label' => __( 'Query', 'khobish' ),
            ]
        );

        $this->add_control(
			'post_type',
			[
				'label'       => esc_html__( 'Post type', 'news-element' ),
				'type'        => Controls_Manager::SELECT2,
				'options'     => Khobish_Helper::post_type(),
				'multiple'    => false,
				'label_block' => true,
			]
		);

        $this->add_control(
			'taxonomy',
			[
				'label'       => esc_html__( 'Category', 'news-element' ),
				'type'        => Controls_Manager::SELECT2,
				'options'     => Khobish_Helper::thepaack_drop_taxolist(),
				'multiple'    => false,
				'label_block' => true,
			]
		);

        $r = new \Elementor\Repeater();
        $r->add_control(
            'meta', [
                'label' =>   esc_html__( 'Category', 'news-element' ),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => false,
                'options' =>  Khobish_Helper::thepack_drop_cat(),
            ]
        );

        $this->add_control(
            'terms',
            [
                'type' => Controls_Manager::REPEATER,
                'label' => 'Category terms',
                'fields' => $r->get_controls(),
                'prevent_empty' => false,
                'title_field' => '{{{ meta }}}',
            ]
        );

        $this->add_control(
            'post_perpage',
            [
                'label' => __('Post per page', 'news-element'),
                'type' => Controls_Manager::SLIDER,
            ]
        );

        $this->add_control(
            'offset',
            [
                'label' => __('Offset', 'news-element'),
                'type' => Controls_Manager::SLIDER,
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => __( 'Order', 'news-element' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => 'ASC',
                    'DESC' => 'DESC',
                ],
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => __('Order by', 'news-element'),
                'type' => Controls_Manager::SELECT2,
                'options' => Khobish_Helper::khobish_order_by(),
                'multiple' => false,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'pagination',
            [
                'label' => __( 'Pagination', 'news-element' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '' => 'No Pagination',
                    'load_more' => 'Load More',
                    'prev_next' => 'Prev next',
                    'numeric' => 'Numeric',
                ],
            ]
        );

        $this->add_control(
            'filtr',
            [
                'label' =>   esc_html__('Hide Filter', 'news-element'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' =>   esc_html__('Yes', 'news-element'),
                'label_off' =>   esc_html__('No', 'news-element'),
                'selectors' => [
                    '{{WRAPPER}} .kb-filter-bar' => 'display: none;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_h',
            [
                'label' => __('Header Filter', 'news-element'),
                'condition' => [
                    'filtr!' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'hlabel',
            [
                'label' => __('Label', 'news-element'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Latest',

            ]
        );

        $this->add_control(
            'hmore',
            [
                'label' => __('More link label', 'news-element'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'More',

            ]
        );

        $this->add_control(
            'hall',
            [
                'label' => __('All list label', 'news-element'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'All',

            ]
        );


        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_f',
            [
                'label' => __('Post Metas', 'ashelement'),
            ]
        );

        $r1 = new \Elementor\Repeater();
        $r1->add_control(
            'meta', [
                'label' =>   esc_html__( 'Post meta', 'news-element' ),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => false,
                'options' =>  Khobish_Helper::magnews_meta_fields(),
            ]
        );

        $this->add_control(
            'metaf',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $r1->get_controls(),
                'prevent_empty' => false,
                'title_field' => '{{{ meta }}}',
            ]
        );

        $this->add_control(
            'imgf',
            [
                'label' => __('Image size', 'ashelement'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' =>  Khobish_Helper::ae_image_size_choose(),
                'multiple' => false,
            ]
        );

        $this->add_control(
            'excerptf',
            [
                'label' => __( 'Excerpt length', 'webangon' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ],
                ],

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_general',
            [
                'label' => __('General', 'ashelement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'tmpl',
            [
                'label' => __('Template', 'news-element'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'style_one' => [
                        'title' => __('Grid', 'news-element'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'style_two' => [
                        'title' => __('Overlay', 'news-element'),
                        'icon' => 'eicon-text-align-center',
                    ]
                ],

                'default' => 'style_one',
            ]
        ); 

        $this->add_control(
            'hidecat_overlay',
            [
                'label' => __( 'Hide overlay category', 'your-plugin' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .khboverlaythumb' => 'display: none;',
                ],
            ]
        );

        $this->add_responsive_control(
            'grpdy',
            [
                'label' => __('Wrapper padding', 'webangon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .xldmega-menu-1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'gitsp',
            [
                'label' => __( 'Grid spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .ne-gutter' => 'margin: 0 0 -{{SIZE}}{{UNIT}} -{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ne-gutter .anim-fade' => 'padding: 0 0 {{SIZE}}{{UNIT}} {{SIZE}}{{UNIT}};',                    
                ],
            ]
        );

        $this->add_responsive_control(
            'lwid',
            [
                'label' =>   esc_html__( 'Column width', 'news-element' ),
                'type' =>  Controls_Manager::NUMBER,
                'default' => '33.33',
                 'selectors' => [  
                        '{{WRAPPER}} .ne-d-flex .anim-fade' => 'flex:0 0 {{VALUE}}%;',
                 ],
            ] 
        );


        do_action('newsmag_flex_list', $this,'fb_','.post-item');

        $this->end_controls_section();

        do_action('newsmag_filter_tax_style', $this);

        $this->start_controls_section(
            'section_title',
            [
                'label' => __('Title', 'webangon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        do_action('newsmag_post_title_style', $this,'sb_','.entry_title');

        $this->end_controls_section();

        $this->start_controls_section(
            'section_bmeta',
            [
                'label' => __('Meta', 'webangon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        do_action('newsmag_post_meta_style', $this,'');

        $this->end_controls_section();

        $this->start_controls_section(
            'section_fblock',
            [
                'label' => __('Excerpt', 'webangon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        do_action('newsmag_post_excerpt_style', $this);

        $this->end_controls_section();

        $this->start_controls_section(
            'section_bgcatr',
            [
                'label' => __('Thumb overlay category', 'webangon'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'hidecat_overlay!' => 'yes',
                ],
            ]
        );

        do_action('newsmag_overlay_tax_style', $this,'thmcat__');

        $this->end_controls_section();

        do_action('newsmag_read_more_style', $this);

        do_action('newsmag_pagination_style', $this);

    }

    protected function render() {
        $settings = $this->get_settings();
        require dirname(__FILE__) .'/view.php';
    }

}

if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\xlmega_tmpl());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\xlmega_tmpl());
}

