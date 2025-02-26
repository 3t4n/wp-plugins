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
class AboutUsSection extends Widget_Base {

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
		return 'about-us-section';
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
		return __( 'About Us Section', 'ai-elementor' );
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
			'about_us_1_content',
			[
				'label' => __( 'About Us 1', 'ai-elementor' ),
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
			'title_hlt',
			[
				'label' => __( 'Highlight Text', 'ai-elementor' ),
				'type' => Controls_Manager::TEXT,
                'default' => 'We are the experts you exactly need',
			]
		);

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'ai-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'We are a Machine Learning Consulting Firm Experienced in AI',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'ai-elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit eum illum tempora? Ducimus eum culpa voluptates dolorem dolorum et sit nisi, mollitia animi porro fuga sequi, molestias repellat excepturi nobis eum culpa voluptates dolorem dolorum et Ducimus eum culpa voluptates dolorem dolorum et sit nisi, mollitia animi porro fuga sequi.',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'feature_text',
            [
                'label' => __( 'Feature Text', 'ai-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Insert feature text here' , 'ai-elementor' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'feature_items',
            [
                'label' => __( 'Feature Items', 'ai-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'feature_text' => __( 'Managed Sucre Backups', 'ai-elementor' ),
                    ],
                    [
                        'feature_text' => __( 'Advanced Caching', 'ai-elementor' ),
                    ],
                ],
                'title_field' => '{{{ feature_text }}}',
            ]
        );

		$this->end_controls_section();


        $this->start_controls_section(
            'about_us_2_content',
            [
                'label' => __( 'About Us 2', 'ai-elementor' ),
            ]
        );

        $this->add_control(
            'title_hlt_two',
            [
                'label' => __( 'Highlight Text', 'ai-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'New problems need Creative and unusual Solutions',
            ]
        );

        $this->add_control(
            'title_two',
            [
                'label' => __( 'Title', 'ai-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Apply AI, Deep Learning and Data Sciece to solve Business Problems',
            ]
        );

        $this->add_control(
            'description_two',
            [
                'label' => __( 'Description', 'ai-elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit eum illum tempora? Ducimus eum culpa voluptates dolorem dolorum et sit nisi, mollitia voluptates dolorem dolorum et.',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'feature_text_two',
            [
                'label' => __( 'Feature Text', 'ai-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Insert feature text here' , 'ai-elementor' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'feature_content',
            [
                'label' => __( 'Feature Text', 'ai-elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Insert feature content here' , 'ai-elementor' ),
                'label_block' => false,
            ]
        );

        $this->add_control(
            'feature_two_items',
            [
                'label' => __( 'Feature Items', 'ai-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'feature_text_two' => __( 'Powerfull Mobile And Online App', 'ai-elementor' ),
                        'feature_content' => __( 'Lorem ipsum dolor sit amet, conse ctetur dolor adipisicing elit alias officia aperiam.', 'ai-elementor' ),
                    ],
                    [
                        'feature_text_two' => __( 'Brings More Transparency And Speed', 'ai-elementor' ),
                        'feature_content' => __( 'Lorem ipsum dolor sit amet, conse ctetur dolor adipisicing elit alias officia aperiam.', 'ai-elementor' ),
                    ],
                ],
                'title_field' => '{{{ feature_text_two }}}',
            ]
        );

        $this->add_control(
            'image_two',
            [
                'label' => __( 'Image', 'ai-elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
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

        <section class="about-us-area ico-about-bg section-padding-100-0 clearfix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-6 offset-lg-0 col-md-12 no-padding-left ">
                        <div class="welcome-meter">
                            <img src="<?php echo $settings['image']['url'] ?>">
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 offset-lg-0 mt-s">
                        <div class="who-we-contant">

                        <?php if ( !empty($settings['title_hlt']) ) : ?>
                            <div class="dream-dots text-left fadeInUp">
                                <span class="gradient-text blue"><?php echo $settings['title_hlt'] ?></span>
                            </div>
                        <?php endif ?>

                            <h4><?php echo $settings['title'] ?></h4>
                            <p><?php echo $settings['description'] ?></p>
                            <div class="list-wrap align-items-center mb-20">
                                <div class="row">

                                    <?php foreach ( $settings['feature_items'] as $item ) : ?>
                                        <div class="col-md-6">
                                            <div class="side-feature-list-item">
                                                <i class="fa fa-check-square-o check-mark-icon-font" aria-hidden="true"></i>
                                                <div class="foot-c-info"><?php echo $item['feature_text'] ?></div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="section-padding-70-70">

                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-12 col-lg-6 offset-lg-0">
                            <div class="who-we-contant">

                            <?php if ( !empty($settings['title_hlt_two']) ) : ?>
                                <div class="dream-dots text-left fadeInUp">
                                    <span class="gradient-text blue"><?php echo $settings['title_hlt_two'] ?></span>
                                </div>
                            <?php endif; ?>

                                <h4><?php echo $settings['title_two'] ?></h4>
                                <p><?php echo $settings['description_two'] ?></p>

                            <?php foreach ( $settings['feature_two_items'] as $index => $item ) : ?>
                            <?php

                                $mt_class = '';
                                if ( $index == 0 ) {
                                    $mt_class = 'mt-30';
                                }

                            ?>

                                <div class="services-block-four v2 <?php echo $mt_class ?>">
                                    <div class="inner-box">
                                        <div class="icon-font-box">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <h3><a style="font-weight: 500" href="#"><?php echo $item['feature_text_two'] ?></a></h3>
                                        <div class="text width-80"><?php echo $item['feature_content'] ?></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            </div>
                        </div>
                        <div class="col-12 col-lg-6 offset-lg-0 col-md-12 no-padding-left">
                            <img class="img-responsive" src="<?php echo $settings['image_two']['url'] ?>" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </section>
<?php
	}

}
