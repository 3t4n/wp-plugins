<?php
namespace HowerEffectsElementor\Widget;

use Elementor\Controls_Manager;

/**
 * Bdevs Elementor Widget.
 *
 * Elementor widget that inserts an embeddable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BdevsEffect9 extends \Elementor\Widget_Base {

    public function get_name() {
        return 'bdevs-hover-effect9';
    }

    public function get_title() {
        return __( 'Effect 9', 'hover-effects-addons-for-elementor' );
    }

    public function get_icon() {
        return 'eicon-image';
    }

    public function get_categories() {
        return [ 'hover-effects-addons-for-elementor' ];
    }

    public function get_keywords() {
        return [ 'effect9' ];
    }

    public function get_script_depends() {
        return [ 'hover-effects-addons-for-elementor' ];
    }

    protected function _register_controls() {
        // Section for Services
        $this->start_controls_section(
            'section_content_heading',
            [
                'label' => esc_html__( 'Effect 9', 'hover-effects-addons-for-elementor' ),
            ]
        );

        $this->add_control(
            'background_bg',
            [
                'label'       => esc_html__( 'Choose Image', 'hover-effects-addons-for-elementor' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'dynamic'     => [ 'active' => true ],
                'description' => esc_html__( 'Add image from here', 'hover-effects-addons-for-elementor' ),
                'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
            ]
        );

        $this->add_control(
            'hover_direction',
            [
                'label' => esc_html__( 'Hover Direction', 'hover-effects-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'left_to_right' => esc_html__( 'Left To Right', 'hover-effects-addons-for-elementor' ),
                    'right_to_left' => esc_html__( 'Right To Left', 'hover-effects-addons-for-elementor' ),
                    'top_to_bottom' => esc_html__( 'Top To Bottom', 'hover-effects-addons-for-elementor' ),
                    'bottom_to_top' => esc_html__( 'Bottom To Top', 'hover-effects-addons-for-elementor' ),
                ],
                'default' => 'left_to_right', // Default direction
            ]
    );  
        

        $this->add_control(
            'show_colored',
            [
                'label' => esc_html__( 'Background Color Option', 'hover-effects-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'hover-effects-addons-for-elementor' ),
                'label_off' => esc_html__( 'Hide', 'hover-effects-addons-for-elementor' ),
                'return_value' => 'yes',
                'default' => '', // Default is set to no (hidden)
            ]
        );    
        
        
     $this->add_control(
            'title',
        [
            'label'       => esc_html__( 'Title', 'hover-effects-addons-for-elementor' ),
            'type'        => Controls_Manager::TEXT,
            'dynamic'     => [ 'active' => true ],
            'default'     => esc_html__( 'TITLE', 'hover-effects-addons-for-elementor' ),
            'label_block' => true,
        ]
     );
     $this->add_control(
        'description',
        [
            'label'       => esc_html__( 'Description', 'hover-effects-addons-for-elementor' ), // Correct spelling
            'type'        => Controls_Manager::TEXT,
            'dynamic'     => [ 'active' => true ],
            'default'     => esc_html__( 'This is description', 'hover-effects-addons-for-elementor' ), // Correct spelling
            'label_block' => true,
        ]
    );
    $this->add_control(
        'link',
        [
            'label'       => esc_html__( 'Link', 'hover-effects-addons-for-elementor' ),
            'type'        => Controls_Manager::TEXT,
            'dynamic'     => [ 'active' => true ],
            'default'     => esc_html__( '#', 'hover-effects-addons-for-elementor' ),
            'label_block' => true,
        ]
    );

        $this->end_controls_section();

        $this->start_controls_section(
			'upgrade_pro',
			[
				'label' => esc_html__('PRO Features', 'hover-effects-addons-for-elementor'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'upgrade_pro_html',
			[
				'label' => __( ' ', 'hover-effects-addons-for-elementor'),
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'content_classes' => 'upgrade-pro-prepare',
				'raw' => __( '<br/><div>Unlock All Pro Effects</div><br/>Thank you for installing our free plugin, you can also try our premium version which includes 20+ Premium Hover effects and new effects comming soon with the premium options typography, background styles and etc<br/><br/><a target="_blank" href="https://pixelonetry.com/downloads/hover-effects-addons-for-elementor-wordpress-plugin/">Hover Effects Pro Elementor Addons</a>', 'hover-effects-addons-for-elementor'),
			]
		);

		$this->end_controls_section();

        // Layout section
        $this->start_controls_section(
            'section_content_layout',
            [
                'label' => esc_html__( 'Layout', 'hover-effects-addons-for-elementor' ),
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label'   => esc_html__( 'Alignment', 'hover-effects-addons-for-elementor' ),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'hover-effects-addons-for-elementor' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'hover-effects-addons-for-elementor' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'hover-effects-addons-for-elementor' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justified', 'hover-effects-addons-for-elementor' ),
                        'icon'  => 'fa fa-align-justify',
                    ],
                ],
                'prefix_class' => 'elementor%s-align-',
                'description'  => 'Use align to match position',
                'default'      => 'left',
            ]
        );

        $this->end_controls_section();
    }

    public function render() {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="item-hover circle <?php echo $settings['show_colored'] === 'yes' ? 'colored' : ''; ?> effect9 <?php echo esc_attr($settings['hover_direction']); ?>"><a href="<?php echo esc_url($settings['link']); ?>">
            <div class="img">
            <?php if ( ! empty( $settings['background_bg']['url'] ) ) : ?>
                <img src="<?php echo esc_url( $settings['background_bg']['url'] ); ?>" 
                     alt="<?php echo esc_attr( ! empty( $settings['background_bg']['alt'] ) ? $settings['background_bg']['alt'] : '' ); ?>">
            <?php endif; ?>
            </div>
            <div class="info">
            <h3><?php echo esc_html($settings['title']); ?></h3>
            <p><?php echo esc_html($settings['description']); ?></p>
        </div></a>
    </div>

        <?php
    }
}
