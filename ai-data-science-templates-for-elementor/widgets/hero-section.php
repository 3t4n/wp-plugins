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
class HeroSection extends Widget_Base {

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
		return 'hero-section';
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
		return __( 'Hero Section', 'ai-elementor' );
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
			'hero_content',
			[
				'label' => __( 'Hero Content', 'ai-elementor' ),
			]
		);

		$this->add_control(
			'title_hlt',
			[
				'label' => __( 'Highlight Text', 'ai-elementor' ),
				'type' => Controls_Manager::TEXT,
                'default' => 'Creative Artificial Intelligence Solutions',
			]
		);

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'ai-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'AI Data Analysis helps grow faster & Manage like A Pro',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'ai-elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit quaerat est, a labore excepturi rem sed eius facere error! Dolore in perspiciatis porro dolor debitis',
            ]
        );

        $this->add_control(
            'show_title',
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
                    'show_title' => 'yes'
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
                    'show_title' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'show_video',
            [
                'label' => __( 'Show Video', 'ai-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'video_title',
            [
                'label' => __( 'Video Title', 'ai-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Watch Demo',
                'condition' => [
                    'show_video' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'video_url',
            [
                'label' => __( 'Button Url', 'ai-elementor' ),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '',
                ],
                'condition' => [
                    'show_video' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __( 'Choose Right Side Image', 'plugin-domain' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'hero_style',
			[
				'label' => __( 'Style', 'ai-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
            'bg_color',
            [
                'label' => __( 'Section BG Color', 'ai-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ico-bg2' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Button Color', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .more-btn.pink' => 'background: {{VALUE}}',
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

		<section class="hero-section ico-bg2 relative hidden">
            <div class="ico-circled"></div>
            <!-- Hero Content -->
            <div class="hero-section-content">
                <div class="container ">
                    <div class="row align-items-center">
                        <!-- Welcome Content -->
                        <div class="col-12 col-lg-6 col-md-12">
                            <div class="welcome-content text-left">
                                <?php if ( !empty($settings['title_hlt']) ) : ?>
                                    <div class="promo-section">
                                        <h3 class="special-head gradient-text cyan mt-s"><?php echo $settings['title_hlt']; ?></h3>
                                    </div>
                                <?php endif ?>

                                <div class="cd-intro v2 text-left">
                                    <h1 class="cd-headline clip is-full-width thin" >
                                        <span class="w-text bold"><?php echo $settings['title']; ?></span>
                                    </h1>
                                </div>
                                <p class="g-text fadeInUp" data-wow-delay="0.3s"><?php echo $settings['description']; ?></p>';

                                <div class="dream-btn-group fadeInUp w-text" data-wow-delay="0.4s">

                                    <?php if ( $settings['show_title'] == 'yes' && $settings['button_title'] != '' ) { ?>
                                        <a href="<?php echo $settings['description']; ?>" class="btn more-btn pink mr-3"><?php echo $settings['button_title']; ?></a>
                                    <?php }

                                     if ( $settings['show_video'] == 'yes' && $settings['video_url'] != '' ) { ?>

                                        <div class="video-demo-prev">
                                            <a href="<?php echo $settings['video_url']['url'] ?>" class="btn more-btn video-btn v2  mr-3"><i class="fa fa-play"></i> </a>
                                            <span><?php echo $settings['video_title']; ?></span>
                                        </div>

                                     <?php } ?>
                                </div>
                                
                            </div>
                        </div>
                        <div class="mt-50 col-12 col-lg-6 offset-lg-0 col-md-10 offset-md-1 col-sm-12 ">
                            <div class="fadeInUp" style="" data-wow-delay="0.5s">
                                <img style="max-width: 150%" src="<?php echo $settings['image']['url']; ?>" alt="" class="spec-ml city-img img-responsive center-block">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
<?php
	}

}
