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
class AIDA_Service_Section extends Widget_Base {

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
        return 'aida-service-section';
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
        return __( 'Service Section', 'ai-elementor' );
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
            'serivce-section',
            [
                'label' => __( 'Serive Section', 'ai-elementor' ),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __( 'Right Side Image', 'plugin-domain' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => __( 'Image Icon', 'ai-elementor' ),
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
                'label' => __( 'Description', 'ai-elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Insert content here' , 'ai-elementor' ),
            ]
        );

        $this->add_control(
            'service_items',
            [
                'label' => __( 'Service Items', 'ai-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
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
            <div class=" section-padding-70-0">
                <div class="row align-items-center">
                    <div class="col-lg-6 offset-lg-0 col-xs-12">

                    <?php foreach ( $settings['service_items'] as $item ) : ?>

                        <div class="services-block-four transparent">
                            <div class="inner-box">
                                <div class="icon-icon bg4">
                                    <img src="<?php echo $item['image']['url'] ?>" alt="">
                                </div>
                                <h3><a class="normal" href="#"><?php echo $item['title'] ?></a></h3>
                                <p class="text"><?php echo $item['description'] ?></p>
                            </div>
                        </div>

                    <?php endforeach; ?>


                    </div>
                    <div class="col-12 col-lg-6 mt-s">
                        <div class="service-img-wrapper mb-30">
                            <div class="image-box">
                                <img src="<?php echo $settings['image']['url'] ?>" class="center-block img-responsive phone-img" alt="">
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <?php
    }

}
