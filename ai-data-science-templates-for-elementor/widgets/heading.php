<?php
namespace AIDataTemplates\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class AIDA_Heading extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'aida-heading';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Heading', 'ai-elementor' );
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-document-file';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'ai-data-elements' ];
    }

    /**
     * Retrieve the list of scripts the widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget scripts dependencies.
     */
    public function get_script_depends() {
        return [ 'ai-elementor' ];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function _register_controls() {
        $this->start_controls_section(
            'heading_content',
            [
                'label' => __( 'Heading', 'ai-elementor' ),
            ]
        );

        $this->add_control(
            'title_hlt',
            [
                'label' => __( 'Highlight Text', 'ai-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Why Choose US',
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'ai-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Problems We Defeated',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'ai-elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis accumsan nisi Ut ut felis congue nisl hendrerit commodo.',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'heading_style',
            [
                'label' => __( 'Style', 'ai-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'hlt_color',
            [
                'label' => __( 'Highlight Text Color', 'ai-elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'blue',
                'options' => [
                    'blue' => __( 'Blue', 'plugin-domain' ),
                    'cyan'  => __( 'Cyan', 'plugin-domain' ),
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'ai-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .w-text' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'desc_color',
            [
                'label' => __( 'Description Color', 'ai-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .g-text' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        ?>

        <div class="section-heading text-center">
            <div class="dream-dots justify-content-center">
                <span class="gradient-text <?php echo $settings['hlt_color'] ?>"><?php echo $settings['title_hlt'] ?></span>
            </div>
            <h2 class="w-text"><?php echo $settings['title'] ?></h2>
            <p class="g-text"><?php echo $settings['description'] ?></p>
        </div>

        <?php
    }

}
