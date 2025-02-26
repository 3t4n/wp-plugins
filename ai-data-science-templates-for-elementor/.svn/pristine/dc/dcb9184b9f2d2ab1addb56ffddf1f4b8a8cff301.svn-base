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
class AIDA_Compare extends Widget_Base {

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
        return 'aida-compare';
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
        return __( 'Compare', 'ai-elementor' );
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
            'compare_content',
            [
                'label' => __( 'Compare', 'ai-elementor' ),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'ai-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Other AI platforms',
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __( 'Image', 'ai-elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => __( 'Icon Image', 'ai-elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => AIDA_ASSETS_URL . 'images/default/icon.png',
                ],
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => __( 'Title', 'ai-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Insert title here' , 'ai-elementor' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => __( 'Title', 'ai-elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Insert content here' , 'ai-elementor' ),
            ]
        );

        $this->add_control(
            'compare_items',
            [
                'label' => __( 'Compare Items', 'ai-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'compare_style',
            [
                'label' => __( 'Style', 'ai-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'comp_style',
            [
                'label' => __( 'Compare Style', 'ai-elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => __( 'Style 1', 'plugin-domain' ),
                    'compare-box-right'  => __( 'Style 2', 'plugin-domain' ),
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
        <div class="container">
        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">

        <div class="compare-box <?php echo $settings['comp_style'] ?>">

            <div class="compare-heading">
                <span class="title text-center"><?php echo $settings['title'] ?></span>
            </div>
            <div class="img-wrap text-center">
                <img src="<?php echo $settings['image']['url'] ?>" class="center-block mb-30" alt="">
            </div>
            <ul class="unfeat-list list-unstyled">

            <?php foreach ( $settings['compare_items'] as $item ) : ?>
                <li>
                    <div class="icon">
                        <img src="<?php echo $item['image']['url'] ?>" alt="" class="img-responsive">
                    </div>
                    <div class="desc">
                        <span class="title"><?php echo $item['title'] ?></span>
                        <p><?php echo $item['description'] ?></p>
                    </div>
                </li>

            <?php endforeach; ?>

            </ul>
            </div>
        </div>
        </div>
        </div>

        <?php
    }

}
