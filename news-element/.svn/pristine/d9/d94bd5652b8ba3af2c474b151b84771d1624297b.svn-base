<?php
namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Utils;
use News_Element\Khobish_Helper;
use News_Element\Widgets\Group_Query;

if (!defined('ABSPATH'))
    exit;

class khobish_herogrid16 extends Widget_Base {

    public function get_name() {
        return 'ae_hgrid16';
    }

    public function get_title() {
        return __('Hero 16', 'news-element');
    }

    public function get_icon() {
        return 'eicon-posts-group';
    }

    public function get_categories() {
        return array('khobish-element');
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_posts_carousel',
            [
                'label' => __('Query', 'news-element'),
            ]
        );

        $this->add_group_control(
            Group_Query::get_type(),
            [
                'name' => 'query',
            ] 
        );

        $this->add_control(
            'post_perpage',
            [
                'label' => __('Post per page', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => 'px',
                    'size' => 5,
                ],                
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
                'default' => 'ASC',
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
                'default' => 'ID',
                'multiple' => false,
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_first',
            [
                'label' => __('Meta Builder', 'news-element'),
            ]
        );

        $this->start_controls_tabs('dfd');

        $this->start_controls_tab(
            'x1',
            [
                'label' => esc_html__( 'First', 'news-element' ),
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
            'fmeta',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $r1->get_controls(),
                'prevent_empty' => false,
                'title_field' => '{{{ meta }}}',
            ]
        );

        $this->add_control(
            'fimg',
            [
                'label' => __('Image size', 'news-element'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' =>  Khobish_Helper::ae_image_size_choose(),
                'multiple' => false,
            ]
        );

        $this->add_control(
            'fex',
            [
                'label' => __( 'Excerpt length', 'news-element' ),
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

        $this->end_controls_tab();

        $this->start_controls_tab(
            'x2',
            [
                'label' => esc_html__( 'Second', 'news-element' ),
            ]
        );

        $r1s = new \Elementor\Repeater();
        $r1s->add_control(
            'meta', [
                'label' =>   esc_html__( 'Post meta', 'news-element' ),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => false,
                'options' =>  Khobish_Helper::magnews_meta_fields(),
            ]
        );

        $this->add_control(
            'smeta',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $r1s->get_controls(),
                'prevent_empty' => false,
                'title_field' => '{{{ meta }}}',
            ]
        );

        $this->add_control(
            'simg',
            [
                'label' => __('Image size', 'news-element'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' =>  Khobish_Helper::ae_image_size_choose(),
                'multiple' => false,
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        $this->start_controls_section(
            'section_gnrl',
            [
                'label' => __('General', 'news-element'),
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
                        'title' => __('One', 'news-element'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'style_two' => [
                        'title' => __('Two', 'news-element'),
                        'icon' => 'eicon-text-align-center',
                    ]
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'hidecat_overlay',
            [
                'label' => __( 'Hide overlay category', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .ft-thumbwrap .catbg-wrap' => 'display: none;',
                ],
            ]
        );

        $this->add_responsive_control(
            'rvs',
            [
                'label' => __( 'Row reverse', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .khobishhero16' => 'flex-direction:row-reverse;',
                ],
            ]
        );

        $this->add_responsive_control(
            'gitsp',
            [
                'label' => __( 'Grid spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .ne-gutter' => 'margin: 0 0 -{{SIZE}}{{UNIT}} -{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ne-gutter>div[class^="ne-df-"]' => 'padding: 0 0 {{SIZE}}{{UNIT}} {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .secondblock .post-item:first-child' => 'margin-bottom:{{SIZE}}{{UNIT}};',                  
                ],
            ]
        );

        $this->start_controls_tabs('frw');

        $this->start_controls_tab(
            'd3',
            [
                'label' => esc_html__( 'Big', 'news-element' ),
            ]
        );

        do_action('newsmag_flex_list', $this,'big_','.firstblock .post-item');

        $this->end_controls_tab();

        $this->start_controls_tab(
            'd4',
            [
                'label' => esc_html__('Small', 'news-element'),
            ]
        );

        do_action('newsmag_flex_list', $this,'sml_','.secondblock .post-item');

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_titles',
            [
                'label' => __('Title', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('title');

        $this->start_controls_tab(
            'tmain',
            [
                'label' => esc_html__( 'Big', 'news-element' ),
            ]
        );

        do_action('newsmag_post_title_style', $this,'btt_','.firstblock .entry_title');

        $this->end_controls_tab();

        $this->start_controls_tab(
            'wer',
            [
                'label' => esc_html__( 'Small', 'news-element' ),
            ]
        );

        do_action('newsmag_post_title_style', $this,'stt_','.secondblock .entry_title');

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_taxo',
            [
                'label' => __('Category background', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        do_action('newsmag_post_cat_bg_style', $this,'cdx_');

        $this->end_controls_section();

        $this->start_controls_section(
            'section_taxgo',
            [
                'label' => __('Thumb overlay category', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'hidecat_overlay!' => 'yes',
                ],
            ]
        );

        do_action('newsmag_overlay_tax_style', $this,'ovtx_');

        $this->end_controls_section();

         $this->start_controls_section(
            'section_meta',
            [
                'label' => __('Post meta', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        do_action('newsmag_post_meta_style', $this,'');

        $this->end_controls_section();

        $this->start_controls_section(
            'section_fblock',
            [
                'label' => __('Excerpt', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        do_action('newsmag_post_excerpt_style', $this);

        $this->end_controls_section();

        do_action('newsmag_read_more_style', $this);

    }

    protected function render() {

        $settings = $this->get_settings();
        require dirname(__FILE__) .'/view.php';

    }

    protected function content_template() {
    }

}

if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\khobish_herogrid16());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\khobish_herogrid16());
}
