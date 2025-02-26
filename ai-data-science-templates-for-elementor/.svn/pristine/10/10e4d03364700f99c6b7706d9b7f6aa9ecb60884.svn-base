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
class AIDA_Service extends Widget_Base {

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
        return 'aida-service';
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
        return __( 'Service', 'ai-elementor' );
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
            'service_content',
            [
                'label' => __( 'Service', 'ai-elementor' ),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __( 'Image Icon', 'ai-elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => AIDA_ASSETS_URL . 'images/default/w2.png',
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'ai-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Go Live in Minutes',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'ai-elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Lorem ipsum dolor sit amet, adipiscing elit. Nulla neque quam, maxi ut ac cu msan ut, posuere sit Lorem ipsum qu.',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'service_style',
            [
                'label' => __( 'Style', 'ai-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_align',
            [
                'label' => __( 'Text Align', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left'  => __( 'Left', 'plugin-domain' ),
                    'center' => __( 'Center', 'plugin-domain' ),
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

        <div class="service_single_content text-<?php echo $settings['text_align'] ?> mb-100">
            <!-- Icon -->
            <div class="service_icon">
                <img src="<?php echo $settings['image']['url'] ?>" alt="">
            </div>
            <h6><?php echo $settings['title'] ?></h6>
            <p><?php echo $settings['description'] ?></p>
        </div>

        <?php
    }

}
