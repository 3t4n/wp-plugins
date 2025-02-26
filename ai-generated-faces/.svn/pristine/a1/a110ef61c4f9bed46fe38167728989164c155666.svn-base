<?php
namespace AI_Faces\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class AI_Faces extends Widget_Base {
 
  /**
   * Retrieve the widget name.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return string Widget name.
   */
  public function get_name() {
    return 'AI Generated Faces';
  }
 
  /**
   * Retrieve the widget title.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return string Widget title.
   */
  public function get_title() {
    return __( 'AI_Faces', 'AI_Faces' );
  }
 
  /**
   * Retrieve the widget icon.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return string Widget icon.
   */
  public function get_icon() {
    return 'fas fa-venus-mars';
  }
 
  /**
   * Retrieve the list of categories the widget belongs to.
   *
   * Used to determine where to display the widget in the editor.
   *
   * Note that currently Elementor supports only one category.
   * When multiple categories passed, Elementor uses the first one.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return array Widget categories.
   */
  public function get_categories() {
    return [ 'general' ];
  }
 
  /**
   * Register the widget controls.
   *
   * Adds different input fields to allow the user to change and customize the widget settings.
   *
   * @since 1.1.0
   *
   * @access protected
   */
  protected function _register_controls() {
    
	$this->start_controls_section(
			'info_section',
			[
				'label' => __( 'Info', 'AI_Faces' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		 $this->add_control(
			'ai_API',
			[
				'label' => __( 'API key', 'AI_Faces' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Enter your API Key', 'AI_Faces' ),
				'placeholder' => __( 'Your API Key', 'AI_Faces' ),
				]
		);
	
		
		$this->end_controls_section();
	

	$this->start_controls_section(
      'section_content',
      [
        'label' => __( 'Generated Faces', 'AI_Faces' ),
      ]
    );
 
	 $this->add_control(
			'ai_size',
			[
				'label' => __( 'Size', 'AI_Faces' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'32' => __( '32 px', 'AI_Faces' ),
					'64' => __( '64 px', 'AI_Faces' ),
					'128' => __( '128 px', 'AI_Faces' ),
					'256' => __( '256 px', 'AI_Faces' ),
					'512' => __( '512 px', 'AI_Faces' )
				],
				'default' => '512',
			]
		);
		
	$this->add_control(
		'ai_gender',
		[
			'label' => __( 'Gender', 'AI_Faces' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'options' => [
				'male' => __( 'Male', 'AI_Faces' ),
				'female' => __( 'Female', 'AI_Faces' )
			],
			'default' => 'male',
		]
	);
	
	$this->add_control(
		'ai_age',
		[
			'label' => __( 'Age', 'AI_Faces' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'options' => [
				'infant' => __( 'Infant', 'AI_Faces' ),
				'child' => __( 'Child', 'AI_Faces' ),
				'young-adult' => __( 'Young adult', 'AI_Faces' ),
				'adult' => __( 'Adult', 'AI_Faces' ),
				'elderly' => __( 'Elderly', 'AI_Faces' )
			],
			'default' => 'adult',
		]
	);
	
	$this->add_control(
		'ai_ethnicity',
		[
			'label' => __( 'Ethnicity', 'AI_Faces' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'options' => [
				'white' => __( 'White', 'AI_Faces' ),
				'latino' => __( 'Latino', 'AI_Faces' ),
				'asian' => __( 'Asian', 'AI_Faces' ),
				'black' => __( 'Black', 'AI_Faces' ),
			],
			'default' => 'white',
		]
	);
	
	$this->add_control(
		'ai_eye_color',
		[
			'label' => __( 'Eye Color', 'AI_Faces' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'options' => [
				'brown' => __( 'Brown', 'AI_Faces' ),
				'blue' => __( 'Blue', 'AI_Faces' ),
				'gray' => __( 'Gray', 'AI_Faces' ),
				'green' => __( 'Green', 'AI_Faces' ),
			],
			'default' => 'blue',
		]
	);
	
	$this->add_control(
		'ai_hair_color',
		[
			'label' => __( 'Hair Color', 'AI_Faces' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'options' => [
				'brown' => __( 'Brown', 'AI_Faces' ),
				'blond' => __( 'Blond', 'AI_Faces' ),
				'black' => __( 'Black', 'AI_Faces' ),
				'gray' => __( 'Gray', 'AI_Faces' ),
				'red' => __( 'Red', 'AI_Faces' )
			],
			'default' => 'blond',
		]
	);
		
	$this->add_control(
		'ai_hair_length',
		[
			'label' => __( 'Hair Length', 'AI_Faces' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'options' => [
				'short' => __( 'Short', 'AI_Faces' ),
				'medium' => __( 'Medium', 'AI_Faces' ),
				'long' => __( 'Long', 'AI_Faces' )
			],
			'default' => 'short',
		]
	);
		
	$this->add_control(
		'ai_emotion',
		[
			'label' => __( 'Emotion', 'AI_Faces' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'options' => [
				'joy' => __( 'Joy', 'AI_Faces' ),
				'neutral' => __( 'Neutral', 'AI_Faces' ),
				'surprise' => __( 'Surprise', 'AI_Faces' )
			],
			'default' => 'neutral',
		]
	);
	
	$this->add_control(
  'image_align',
  [
    'label' => __( 'Alignment', 'AI_Faces' ),
    'type' => \Elementor\Controls_Manager::CHOOSE,
    'options' => [
      'left' => [
        'title' => __( 'Left', 'AI_Faces' ),
        'icon' => 'fa fa-align-left',
      ],
      'center' => [
        'title' => __( 'Center', 'AI_Faces' ),
        'icon' => 'fa fa-align-center',
      ],
      'right' => [
        'title' => __( 'Right', 'AI_Faces' ),
        'icon' => 'fa fa-align-right',
      ],
    ],
    'default' => 'center',
    'toggle' => true,
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
    $settings = $this->get_settings_for_display();
 
  
	 // $apiKey = $instance['apiKey'];
	 //$apiKey = 'ngQzkcvXQHWGWATpc4QPKA';
	 $apiKey = $settings['ai_API'];
	 $size = $settings['ai_size'];
	 $gender = $settings['ai_gender'];
	 $age = $settings['ai_age'];
	 $ethnicity = $settings['ai_ethnicity'];
	 $eye_color = $settings['ai_eye_color']; 
	 $emotion = $settings['ai_emotion']; 
	 $hair_color = $settings['ai_hair_color']; 
	 $hair_length = $settings['ai_hair_length']; 
	 $img_align = $settings['image_align'];
	 
	 $url = 'https://api.generated.photos/api/v1/faces?api_key='.$apiKey.'&per_page=1&gender='.$gender.'&age='.$age.'&ethnicity='.$ethnicity.'&eye_color='.$eye_color.'&emotion='.$emotion.'&hair_color='.$hair_color."&hair_length=".$hair_length; 
		
		
	$response = wp_safe_remote_get($url);
		
	$response = $response['body'];
	$data = json_decode( $response, true );
	
	foreach ($data as $innerArray =>$innerValue) {
		if(is_array($innerValue)) {
			foreach ($innerValue as $lastArray => $lastValue) {
				if(is_array($lastValue)) {
					foreach ($lastValue as $latestArray => $latestValue){
						if ($latestArray == "urls") {
							foreach ($latestValue as $ultimateArray => $ultimateValue){
								if ($ultimateValue[$size] != "") {
									//echo '<img src="'.$ultimateValue[$size].'"'. 'align='.$img_align.'>';
									echo '<div style="text-align:'.$img_align.'">';
									echo '<img src="'.$ultimateValue[$size].'"></div>';
								}
							}
						}
					}
				}	
			}
		}
	}
 
  }
 
  /**
   * Render the widget output in the editor.
   *
   * Written as a Backbone JavaScript template and used to generate the live preview.
   *
   * @since 1.1.0
   *
   * @access protected
   */
}