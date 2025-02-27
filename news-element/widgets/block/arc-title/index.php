<?php
namespace News_Element\Widgets;
use Elementor;
use Elementor\Plugin;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use News_Element\Khobish_Helper;

class khb_arc_title extends Widget_Base{
    public function get_name() {
        return 'khbarctitle';
    }

    public function get_title() {
        return __( 'Arc Title', 'news-element' );
    }

    public function get_icon() {
        return 'eicon-image-box';
    }

    public function get_categories() {
        return [ 'khobish-builder' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_layout_settings',
            [
                'label' =>   esc_html__( 'Label', 'news-element' )
            ]
        );

        $this->add_control(
            'cat',
            [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Category label', 'news-element'),
                'label_block' => true,
                'default' => 'Category:',
            ]
        );

        $this->add_control(
            'tag',
            [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Tag label', 'news-element'),
                'label_block' => true,
                'default' => 'Tag:',
            ]
        );

        $this->add_control(
            'author',
            [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Author label', 'news-element'),
                'label_block' => true,
                'default' => 'Author:',
            ]
        );

        $this->add_control(
            'year',
            [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Year label', 'news-element'),
                'label_block' => true,
                'default' => 'Year:',
            ]
        );

        $this->add_control(
            'notfound',
            [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('404 label', 'news-element'),
                'label_block' => true,
                'default' => 'Page not found!',
            ]
        );

        $this->add_control(
            'search',
            [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Search label', 'news-element'),
                'label_block' => true,
                'default' => 'Search Results for:',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => __( 'Style', 'news-element' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => __( 'Alignment', 'news-element' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'news-element' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'news-element' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'news-element' ),
                        'icon' => 'eicon-text-align-right',
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .arctitle' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'link_typo',
                'selector' => '{{WRAPPER}} .arctitle h3',
                'label' => __( 'Typography', 'news-element' ),
            ]
        );

        $this->add_control(
            'titlecolor',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .arctitle h3' => 'color: {{VALUE}};'
                ],
            ]
        );


        $this->add_control(
            'tagmargins',
            [
                'label' => __('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .arctitle h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings();

        $arg = [
            'cat' => $settings['cat'],
            'tag' => $settings['tag'],
            'author' => $settings['author'],
            'year' => $settings['year'],
            'notfound' => $settings['notfound'],
            'search' => $settings['search'],
        ];

        if (Plugin::instance()->editor->is_edit_mode()){?>

            <div class="arctitle"><?php echo Khobish_Helper::khb_arc_title($arg);?></div>

        <?php } else {?>

            <div class="arctitle">

                <?php echo Khobish_Helper::khb_arc_title($arg);?>

            </div>

        <?php }

    }
}

if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\khb_arc_title());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\khb_arc_title());
}
