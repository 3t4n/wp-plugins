<?php

namespace CliccheWidgetsForElementor\Widgets; 

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use CliccheWidgetsForElementor\Traits\Posts_list;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

class CliccheAnimatedHamburger extends Widget_Base { 

  use Posts_list;
  CONST plugin_name = CLICCHE_ANIMATED_HAMBURGER_NAME;  

  public function get_name() { 
		return CLICCHE_ANIMATED_HAMBURGER_NAME;
  } 

  public function get_title() { 
		return __( 'Animated Hamburger Menu', 'clicche-elementor' );
  }  

  public function get_icon() {	
		return 'fas fa-bars gh-icon';
  } 

  public function get_categories() {
		return [ 'widgets-by-clicche' ];
  }
  /**
   * Register the widget controls.
   * Adds different input fields to allow the user to change and customize the widget settings.
   * @since 1.1.0
   *
   * @access protected
   */
  protected function register_controls() {

    $this->start_controls_section(
		  'section_content',
		  [
			'label' => __( 'Settings', 'clicche-elementor' ),
		  ]
    ); 

    $this->add_control(
		  'hamburger_text',
		  [
			'label' => __( 'Text', 'clicche-elementor' ),
			'type' => Controls_Manager::TEXT,
			'placeholder' => __( 'Near button text', 'clicche-elementor' ),
		  ]
    );		

	$this->add_control(
			'bar_height',
			[
				'label' => __( 'Bars height', 'clicche-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 7,
						'step' => 1,
					],	
				],
				'default' => [
					'unit' => 'px',
					'size' => 4,
				],
				'selectors' => [
                    '{{WRAPPER}} .hamburger-inner:after, {{WRAPPER}}  .hamburger-inner:before, {{WRAPPER}}  .hamburger-inner' => 'height: {{SIZE}}{{UNIT}};',  
				],
			]
	);	

	$this->add_control(
			'hamburger_width',
			[
				'label' => __( 'Hamburger width', 'clicche-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 80,
						'step' => 1,
					],	
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
                    '{{WRAPPER}} .hamburger-inner:after, {{WRAPPER}}  .hamburger-inner:before, {{WRAPPER}}  .hamburger-inner,  {{WRAPPER}}  .hamburger-box' => 'width: {{SIZE}}{{UNIT}};', 
				],
			]
	);

	$this->add_control(
			'hamburger_animation',
			[
				'label' => __( 'Animation', 'clicche-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'arrowalt' => __( 'Default', 'clicche-elementor' ),
					'arrowalt' => __( 'Arrow Alt', 'clicche-elementor' ),
					'3dxy-r' => __( '3Dxy Reverse', 'clicche-elementor' ),
					'vortex' => __( 'Vortex', 'clicche-elementor' ),
					'vortex-r' => __( 'Vortex Reverse', 'clicche-elementor' ),
					'stand' => __( 'Stand', 'clicche-elementor' ),
					'stand-r' => __( 'Stand Reverse', 'clicche-elementor' ),
					'spring' => __( 'Spring', 'clicche-elementor' ),
					'spring-r' => __( 'Spring Reverse', 'clicche-elementor' ),
					'spin' => __( 'Spin', 'clicche-elementor' ),
					'spin-r' => __( 'Spin Reverse', 'clicche-elementor' ),
					'elastic' => __( 'Elastic', 'clicche-elementor' ),
					'elastic-r' => __( 'Elastic Reverse', 'clicche-elementor' ),
					'collapse' => __( 'Collapse', 'clicche-elementor' ),
					'collapse-r' => __( 'Collapse Reverse', 'clicche-elementor' ),
					'arrowturn' => __( 'Arrow Turn', 'clicche-elementor' ),
					'arrow-r' => __( 'Arrow Right', 'clicche-elementor' ),
					'3dy-r' => __( '3Dy Reverse', 'clicche-elementor' ),
					'3dxy' => __( '3Dxy', 'clicche-elementor' ),
				],
				'default' => 'arrowalt',
			]
	);

	$this->add_control(
			'alignment',
			[
				'label' => __( 'Alignment', 'clicche-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'center' => __( 'Center', 'clicche-elementor' ),
					'flex-start' => __( 'Start', 'clicche-elementor' ),
					'flex-end' => __( 'End', 'clicche-elementor' ),	
				],
				'default' => 'center',
				'selectors' => [
                    '{{WRAPPER}} .clicche-hamburger-block' => 'justify-content: {{VALUE}};', 
				],
			]
	);	

	$this->add_control(
		  'title_hamburger',
		  [
			'label' => __( 'Href Title', 'clicche-elementor' ),
			'type' => Controls_Manager::TEXT,	
		  ]
    ); 

	$this->add_control(
			'popup',
			[
				'label' => __( 'Popup', 'clicche-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => $this->cliccheGetPopups(),
				'description' => __( 'Choose the popup to trigger on click', 'clicche-elementor' ),
				'default' => '',
			]
	);	

	$this->add_control(
			'attiva_hamburger',
			[
				'label' => __( 'Try animation', 'clicche-elementor' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'button_type' => 'default',
				'text' => __( 'Try' , 'clicche-elementor' ),
				'event' => 'clicche:hamburger:preview',
			]
	);

    $this->end_controls_section();
	/*
	/* Style tabs
	*/
	$this->start_controls_section(
            'clicche_hamburger_elementor_style_settings',
            [
                'label' => esc_html__('Hamburger', 'clicche-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
    );

	$this->add_control(
			'hamburger_color',
			[
				'label' => __( 'Bars color', 'clicche-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_2,
				],
				'selectors' => [
					'{{WRAPPER}} .hamburger-inner:after, {{WRAPPER}}  .hamburger-inner:before, {{WRAPPER}}  .hamburger-inner' => 'background-color: {{VALUE}}',
				],
			]
	);

	$this->add_control(
		'menu_style',
		[
			'label' => __( 'Menù alignment', 'clicche-elementor' ),
			'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'horizontal' => __( 'Horizontal', 'clicche-elementor' ),
					'vertical' => __( 'Vertical', 'clicche-elementor' ),
				],
				'default' => 'horizontal',
		]
	);

	$this->add_control(
		'text_position_horizontal',
		[
			'label' => __( 'Text position', 'clicche-elementor' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'options' => [
				'row' => __( 'Before', 'clicche-elementor' ),
				'row-reverse' => __( 'After', 'clicche-elementor' ),
			],
			'default' => 'row',	
			'condition' => ['menu_style' => 'horizontal'],	
			'selectors' => [
				'{{WRAPPER}} .clicche-hamburger-block' => 'flex-direction:  {{VALUE}}', 
			],
		]
	);

	$this->add_control(
		'text_position_vertical',
		[
			'label' => __( 'Text position', 'clicche-elementor' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'options' => [
				'column' => __( 'Before', 'clicche-elementor' ),
				'column-reverse' => __( 'After', 'clicche-elementor' ),				
			],
			'default' => 'column',	
			'condition' => ['menu_style' => 'vertical'],
			'selectors' => [
				'{{WRAPPER}} .clicche-hamburger-block' => 'flex-direction:  {{VALUE}}',
			],
		]
	);		

	$this->end_controls_section();

	$this->start_controls_section(
            'clicche_hamburger_elementor_text_settings',
            [
                'label' => esc_html__('Text', 'clicche-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
     );

	 $this->add_control(
			'hamburger_text_color',
			[
				'label' => __( 'Text color', 'clicche-elementor'  ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_2,
				],
				'selectors' => [
					'{{WRAPPER}} .text-hamburger' => 'color: {{VALUE}}',
				],
			]
	);

	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name' => 'testo_hamburger_stile',
			'label' => __( 'Text', 'clicche-elementor'  ),
			'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
			'selector' => '{{WRAPPER}} .text-hamburger',
		]
	);		

	$this->end_controls_section();		  

  }
  /**
   * Render the widget output on the frontend.
   *
   * Written in PHP and used to generate the final HTML.
   *
   * @since 1.1.0
   *
   * @access protected
   */
  protected function render() {

		$target 		= '';
		$target_pop 	= '';		

		$settings = $this->get_settings_for_display();		

		if( $settings['popup']  )
		{	
				$target 	  = 'popup';
				$target_pop   = $this->generateActionUrl( 'open', $settings['popup'] );
		}			

		$href      = ( $target_pop ) ? 'href="'.$target_pop.'"' : '' ;
		$title     = ( $settings['title_hamburger'] ) ? $settings['title_hamburger'] : 'Popup' ;		

		?>

		<a title='<?= $title ?>' <?= $href  ?>>
			<div class='clicche-hamburger-block <?= $settings['text_position'] ?? '' ?> <?= $settings['menu_style'] ?>' data-target-type='<?= $target ?>' data-target='<?= $settings['popup'] ?>' id='clicche-hamburger-<?= $this->get_id() ?>'>
					<?php if( !empty( $settings['hamburger_text'] )): ?>
							<div class='text-hamburger'>
									<?php echo $settings['hamburger_text']; ?>
							</div>
					<?php endif; ?>					

					<button  class='clicche-hamburger hamburger--<?= $settings['hamburger_animation'] ?>' type="button">
								<div class="hamburger-box">
									<div class="hamburger-inner"></div>
								</div>	
					</button>
			</div>
		</a>	

		<?php
  }
  /**
   * Render the widget output in the editor
   *
   * Written as a Backbone JavaScript template and used to generate the live preview.
   *
   * @since 1.1.0
   *
   * @access protected
   */
  protected function content_template() {
    ?>  
	<div class='clicche-hamburger-block'>	
			<#	if ( settings.hamburger_text ) { #>
					<div class='text-hamburger'>{{{ settings.hamburger_text }}}</div>
			<# } #>
			<button  class='clicche-hamburger {{{ settings.text_position }}} {{{ settings.menu_style }}} hamburger--{{{ settings.hamburger_animation }}}' type="button">
						<a>
							<div class="hamburger-box">
								<div class="hamburger-inner"></div>
							</div>
						</a>
			</button>
	</div>
    <?php
  }
}