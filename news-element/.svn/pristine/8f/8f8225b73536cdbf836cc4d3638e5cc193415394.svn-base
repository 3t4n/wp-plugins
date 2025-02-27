<?php
namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use News_Element\Khobish_Helper;

class ne_single_post_author extends Widget_Base{
    public function get_name() {
        return 'nepostauthor';
    }

    public function get_title() {
        return   esc_html__( 'Post author', 'news-element' );
    }

    public function get_icon() {
        return 'dashicons dashicons-chart-bar';
    }

    public function get_categories() {
        return [ 'khobish-builder' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_title',
            [
                'label' =>   esc_html__( 'Content', 'news-element' ),
            ]
        );

        $this->add_control(
            'prev_id',
            [
                'label' => __('Preview Post', 'news-element'),
                'type' => Controls_Manager::SELECT2,
                'options' => Khobish_Helper::khobish_drop_posts('post'),
                'multiple' => false,
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_dgeneral',
            [
                'label' =>   esc_html__('General', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
  
        $this->add_responsive_control(
            'thht',
            [
                'label' => esc_html__('Gap', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .ne-author-image' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'nabdr',
                'label' => esc_html__('Border', 'the-pack-addon'),
                'selector' => '{{WRAPPER}} .ne-post-thumb',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_caption',
            [
                'label' =>   esc_html__('Avatar', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'wid',
            [
                'label' => esc_html__('Width', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 800,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .pos-rel img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'rad',
            [
                'label' => esc_html__('Border radius', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 800,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .pos-rel img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_icon',
            [
                'label' =>   esc_html__('Icon', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'klr',
            [
                'label' => esc_html__('Color', 'the-pack-addon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bivo' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'rp',
            [
                'label' => esc_html__('Right spacing', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 800,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .bivo' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'tp',
            [
                'label' => esc_html__('Top spacing', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 800,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .bivo' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_meta',
            [
                'label' =>   esc_html__('Meta', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'mklr',
            [
                'label' => esc_html__('Color', 'the-pack-addon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ne-post-info' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'lmklr',
            [
                'label' => esc_html__('Link Color', 'the-pack-addon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ne-post-info a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'gty',
                'selector' => '{{WRAPPER}} .ne-post-info',
                'label' => esc_html__('Typography', 'the-pack-addon'),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'gltyp',
                'selector' => '{{WRAPPER}} .ne-post-info a',
                'label' => esc_html__('Link Typography', 'the-pack-addon'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render( ) {

        $settings = $this->get_settings();
        require dirname(__FILE__) .'/view.php';

    }
}

if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\ne_single_post_author());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\ne_single_post_author());
}
