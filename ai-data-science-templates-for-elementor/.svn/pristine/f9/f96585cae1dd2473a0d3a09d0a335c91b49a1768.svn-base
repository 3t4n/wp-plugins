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
class AIDA_Faq extends Widget_Base {

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
		return 'aida-faq';
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
		return __( 'Faq Section', 'ai-elementor' );
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
			'faq-section',
			[
				'label' => __( 'Faq', 'ai-elementor' ),
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


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'faq_title',
            [
                'label' => __( 'Faq Title', 'ai-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Insert faq title here' , 'ai-elementor' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'faq_content',
            [
                'label' => __( 'Faq Content', 'ai-elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Insert faq content here' , 'ai-elementor' ),
            ]
        );

        $this->add_control(
            'faq_items',
            [
                'label' => __( 'Faq Items', 'ai-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ faq_title }}}',
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
            <div class="faq-timeline-area transparent section-padding-0-85" id="faq">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-6">
                            <img class="img-responsive" src="<?php echo $settings['image']['url'] ?>" alt="">
                        </div>
                        <div class="col-12 col-lg-6 col-md-12">
                            <div class="dream-faq-area mt-s ">
                                <dl style="margin-bottom:0">

                                <?php foreach ( $settings['faq_items'] as $item ) : ?>
                                    <dt class="wave fadeInUp" data-wow-delay="0.2s"><?php echo $item['faq_title'] ?></dt>
                                    <dd class="fadeInUp" data-wow-delay="0.3s">
                                        <p><?php echo $item['faq_content'] ?></p>
                                    </dd>

                                <?php endforeach; ?>

                                </dl>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
<?php
	}

}
