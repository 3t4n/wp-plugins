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
class AIDA_API_Box extends Widget_Base {

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
        return 'aida-api';
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
        return __( 'Api Box', 'ai-elementor' );
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
            'api_content',
            [
                'label' => __( 'Api Box', 'ai-elementor' ),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __( 'Image Icon', 'ai-elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'ai-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Powerful Business APIs',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'ai-elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta dolorum sunt ratione minus neque eveniet hic fuga voluptatibus aut inventore, iure similique esse autem deleniti et tempora explicabo recusandae quibusdam?',
            ]
        );

        $this->add_control(
            'show_btn',
            [
                'label' => __( 'Show Button', 'ai-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'button_title',
            [
                'label' => __( 'Button Title', 'ai-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Learn More',
                'condition' => [
                    'show_btn' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'button_url',
            [
                'label' => __( 'Button Url', 'ai-elementor' ),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '',
                ],
                'condition' => [
                    'show_btn' => 'yes'
                ]
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

        <div class="container section-padding-0-70">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="api-box has-shadow">
                        <img src="<?php echo $settings['image']['url'] ?> " alt="" class="mb-30">
                        <h3 class="bold mb-15"><?php echo $settings['title'] ?></h3>
                        <p><?php echo $settings['description'] ?></p>

                        <?php if ( $settings['show_btn'] == 'yes' && $settings['button_title'] != '' ) : ?>
                            <a href="<?php echo $settings['button_url']['url'] ?>" class="btn more-btn pink mt-15"><?php echo $settings['button_title'] ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }

}
