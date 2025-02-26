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
class AIDA_Partners extends Widget_Base {

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
        return 'aida-partners';
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
        return __( 'Partners Section', 'ai-elementor' );
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
            'partners-section',
            [
                'label' => __( 'Partners', 'ai-elementor' ),
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => __( 'Image', 'plugin-domain' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => AIDA_ASSETS_URL . 'images/default/1.png',
                ],
            ]
        );


        $this->add_control(
            'image_items',
            [
                'label' => __( 'Partner Items', 'ai-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
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

        <section class="our-partners clearfix section-padding-0-70">
            <div class="container">
                <div class="row">

                <?php foreach ($settings['image_items'] as $item) : ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="team-member ">
                            <div class="team-img">
                                <img class="img-responsive center-block" src="<?php echo $item['image']['url'] ?>" alt="">
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </section>

        <?php
    }

}
