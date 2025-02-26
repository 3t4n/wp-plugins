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
class AIDA_Team extends Widget_Base {

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
        return 'aida-team';
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
        return __( 'Team Member', 'ai-elementor' );
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
            'team-section',
            [
                'label' => __( 'Team Member', 'ai-elementor' ),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __( 'Image', 'plugin-domain' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'name',
            [
                'label' => __( 'Name', 'ai-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Andy Crishen' , 'ai-elementor' ),
            ]
        );

        $this->add_control(
            'designation',
            [
                'label' => __( 'Designation', 'ai-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Company CEO' , 'ai-elementor' ),
            ]
        );

        $this->add_control(
            'fb_url',
            [
                'label' => __( 'Facebook Url', 'ai-elementor' ),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'twitter_url',
            [
                'label' => __( 'Twitter Url', 'ai-elementor' ),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'linkedin_url',
            [
                'label' => __( 'Linkedin Url', 'ai-elementor' ),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'about_us_style',
            [
                'label' => __( 'Style', 'ai-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label' => __( 'Section Color', 'ai-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .check-mark-icon-font' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .icon-font-box i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .icon-font-box' => 'border: 2px solid {{VALUE}}',
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
            <div class="our-team ico-team">
                <div class="team_img">
                    <img src="<?php echo $settings['image']['url'] ?>" class="mt-30 width-80" alt="chef-1">
                    <ul class="social">
                        <?php if(!empty($settings['fb_url'])) : ?>
                            <li><a href="<?php echo $settings['fb_url'] ?>"><i class="fa fa-facebook"></i></a></li>
                        <?php endif; ?>
                        <?php if(!empty($settings['twitter_url'])) : ?>
                            <li><a href="<?php echo $settings['twitter_url'] ?>"><i class="fa fa-twitter"></i></a></li>
                        <?php endif; ?>
                        <?php if(!empty($settings['linkedin_url'])) : ?>
                            <li><a href="<?php echo $settings['linkedin_url'] ?>"><i class="fa fa-linkedin"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="team-content">
                    <h4 class="title"><?php echo $settings['name'] ?></h4>
                    <span class="post"><?php echo $settings['designation'] ?></span>
                </div>
            </div>


        <?php
    }

}
