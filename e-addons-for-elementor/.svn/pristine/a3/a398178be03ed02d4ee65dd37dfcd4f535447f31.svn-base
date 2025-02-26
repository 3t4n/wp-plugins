<?php
namespace EAddonsForElementor\Modules\Heading\Extensions;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;

use EAddonsForElementor\Base\Base_Extension;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Heading extenstion
 *
 * @since 1.0.1
 */
class Splitting extends Base_Extension {

    public $common_sections_actions = [];    

    public function __construct() {
        parent::__construct();

        $this->register_script('assets/js/e-addons-splitting.js'); // from module folder

        $this->add_actions();
    }

    public function get_description() {
        return __('Heading animate text for elementor extension', 'e-addons-for-elementor');
    }

    public function get_pid() {
        return 241;
    }

    public function get_icon() {
        return 'eadd-heading-widget-animations';
    }
    public function get_script_depends() {        
        return ['elementor-waypoints','waypoints-inview','splitting','e-addons-splitting'];
    }
    public function get_style_depends() {        
        return ['splitting','animated-verbs'];
    }
    /**
     * Add Actions
     *
     * @access private
     */
    protected function add_actions() {
        add_action("elementor/widget/before_render_content", array($this, 'splitting_before_content'), 10, 1);
        

        add_action( 'elementor/element/heading/section_title/after_section_end', [$this, 'add_controls'], 15, 2);
        
        add_action("elementor/widget/render_content", array($this, 'splitting_render_content'), 10, 2);
        add_action( 'elementor/widget/print_template', array($this, 'splitting_print_content'), 10, 2);
    }
    
    public function add_controls($element, $args) {
        $element_type = $element->get_type();

        $element->start_controls_section(
            'section_animate_heading', [
                'label' => '<i class="eadd-heading-widget-animations eadd-ic-left"></i> '.'<i class="eadd-logo-e-addons eadd-ic-right"></i> '.__('Animate', 'e-addons-for-elementor'),
            ]
        );
        $element->add_control(
            'splitting_type', [
                  'label' => __('Splitting effect', 'e-addons-for-elementor'),
                  'type' => Controls_Manager::SELECT,
                  'options' => [
                        '' => __('none','e-addons-for-elementor'),
                        'fall' => __('Falling', 'e-addons-for-elementor'),
                        'wave' => __('Wave', 'e-addons-for-elementor'),
                        //'stretch' => __('Stretch', 'e-addons-for-elementor'),
                        //'breathe' => __('Breathe', 'e-addons-for-elementor'),
                        'jump' => __('Jump', 'e-addons-for-elementor'),
                        'float' => __('Float', 'e-addons-for-elementor'),
                        'flip' => __('Flipping', 'e-addons-for-elementor'),
                        'twirl' => __('Twirling', 'e-addons-for-elementor'),
                        'jog' => __('Jogging', 'e-addons-for-elementor'),
                        'hide' => __('Hiding', 'e-addons-for-elementor'),
                        'retreat' => __('Retreating', 'e-addons-for-elementor'),
                        'break' => __('Breaking', 'e-addons-for-elementor'),
                        'sway' => __('Swaying', 'e-addons-for-elementor'),
                        'blink' => __('Blinking', 'e-addons-for-elementor'),
                        'tumble' => __('Tumbling', 'e-addons-for-elementor'),
                      
                  ],
                  'frontend_available' => true,
                  'default' => '',
                  //'render_type' => 'template',
            ]
        );
        $element->add_control(
            'splitting_amount', [
                'label' => __('Amount', 'e-addons-for-elementor'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => '0.3',
                    'unit' => 'em'
                ],
                'dynamic' => [
                    'active' => false,
                ],
                'size_units' => ['px', '%','em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 140,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ]
                ],
                'condition' => [
                    'splitting_type' => ['wave','jump','tumble'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .splitting .char' => '--amo: -{{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .e-add-headline' => 'padding: calc({{SIZE}}{{UNIT}} + 10px)'
                ],
            ]
        );
        $element->add_control(
            'splitting_amount_scale', [
                'label' => __('Amount', 'e-addons-for-elementor'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => '3',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ],
                ],
                'dynamic' => [
                    'active' => false,
                ],
                'condition' => [
                    'splitting_type' => ['retreat'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .splitting .char' => '--amop: {{SIZE}};',
                    
                ],
            ]
        );
        $element->add_control(
            'splittiing_count', [
                'label' => __('Counting repetitions', 'e-addons-for-elementor'),
                'type' => Controls_Manager::NUMBER,
                'description' => __('Empty this value for for infinite ripetition.','e-addons-for-elementor'),
                'default' => '',
                'min' => 0,
                'max' => 50,
                'step' => 1,
                'separator' => 'before',
                'dynamic' => [
                    'active' => false,
                ],
                'condition' => [
                    'splitting_type!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .splitting .char' => '--it: {{VALUE}}',
                ],
            ]
        );
        //fall (loop)
        //wave (loop) ..amount
        //stretch (loop)    ..amount
        //breader (loop)    .. x
        //jump              ..delay
        //float (loop)            
        //flip              ..delay
        //twirl             ..delay
        //jog (loop)             
        //hide              ... x
        //retreat   
        //breack            ..delay
        //sway (loop)
        //blink             ..delay
        //tumble            ..delay


        $element->end_controls_section();
    }
    public function splitting_before_content($element) {
        $settings = $element->get_settings_for_display();
        
        if ( !empty($settings['splitting_type']) && $element->get_name() == 'heading' ) {
            $element->add_render_attribute( 'title', 'class', ['e-add-splitting','e-add-headline'] );
            $typeSplitting = $settings['splitting_type'];
            
            $element->add_render_attribute( 'title', 'class', 'headline--'.$typeSplitting );
        }
    }
    public function splitting_print_content($content, $element) {
        if ( ! $content ) {
            return;
        }

        ob_start();
        ?>
        <#
        if ( '' !== settings.splitting_type ) {
            view.addRenderAttribute( 'title', 'class', ['e-add-splitting','e-add-headline','headline--'+settings.splitting_type] );
        }
        #>
        <?php
        $ob = ob_get_clean();

        return $ob.$content;
    }
    public function splitting_render_content($content, $element) {
        $settings = $element->get_settings_for_display();
        
        if ( !empty($settings['splitting_type']) && $element->get_name() == 'heading' ) {
            $this->enqueue();
        }
        return $content; // mostro il widget
    }
}
