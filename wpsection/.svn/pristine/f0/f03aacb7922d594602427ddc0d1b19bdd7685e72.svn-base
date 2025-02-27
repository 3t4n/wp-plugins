<?php

use Elementor\Widget_Base;
use Elementor\Plugin;

if (class_exists('woocommerce')) {
if (class_exists('MrwooMart')) {    

    class WPSection_WPS_Compare_Table_Widget extends Widget_Base {

        public function get_name() {
            return 'wpsection_wps_compare_table';
        }

        public function get_title() {
            return __('Compare Table', 'wpsection');
        }

        public function get_icon() {
            return 'eicon-user-preferences';
        }

        public function get_keywords() {
            return ['wpsection', 'product'];
        }

        public function get_categories() {
            return ['wpsection_shop'];
        }

        protected function _register_controls() {
            // Add your controls here
            $this->start_controls_section(
                'wpsection_wps_compare_table',
                [
                    'label' => esc_html__('General Settings', 'wpsection'),
                ]
            );

//Thumbnail
            $this->add_control(
                'wps_compare_td_thumb',
                array(
                    'label' => esc_html__('Show Thumbnail', 'wpsection'),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'show' => [
                            'show' => esc_html__('Show', 'wpsection'),
                            'icon' => 'eicon-check-circle',
                        ],
                        'none' => [
                            'none' => esc_html__('Hide', 'wpsection'),
                            'icon' => 'eicon-close-circle',
                        ],
                    ],
                    'default' => 'show',
                    'selectors' => array(
                        '{{WRAPPER}} .wps_compare_td_thumb' => 'display: {{VALUE}} !important',
                    ),
                )
            );
            //Title
             $this->add_control(
                'wps_compare_td_titl',
                array(
                    'label' => esc_html__('Show Title', 'wpsection'),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'show' => [
                            'show' => esc_html__('Show', 'wpsection'),
                            'icon' => 'eicon-check-circle',
                        ],
                        'none' => [
                            'none' => esc_html__('Hide', 'wpsection'),
                            'icon' => 'eicon-close-circle',
                        ],
                    ],
                    'default' => 'show',
                    'selectors' => array(
                        '{{WRAPPER}} .wps_compare_td_titl' => 'display: {{VALUE}} !important',
                    ),
                )
            );
//description
                $this->add_control(
                'wps_compare_td_des',
                array(
                    'label' => esc_html__('Show Description', 'wpsection'),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'show' => [
                            'show' => esc_html__('Show', 'wpsection'),
                            'icon' => 'eicon-check-circle',
                        ],
                        'none' => [
                            'none' => esc_html__('Hide', 'wpsection'),
                            'icon' => 'eicon-close-circle',
                        ],
                    ],
                    'default' => 'show',
                    'selectors' => array(
                        '{{WRAPPER}} .wps_compare_td_des' => 'display: {{VALUE}} !important',
                    ),
                )
            );
 //Stock               

        $this->add_control(
                'wps_compare_td_des',
                array(
                    'label' => esc_html__('Show Stock', 'wpsection'),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'show' => [
                            'show' => esc_html__('Show', 'wpsection'),
                            'icon' => 'eicon-check-circle',
                        ],
                        'none' => [
                            'none' => esc_html__('Hide', 'wpsection'),
                            'icon' => 'eicon-close-circle',
                        ],
                    ],
                    'default' => 'show',
                    'selectors' => array(
                        '{{WRAPPER}} .wps_compare_td_stok' => 'display: {{VALUE}} !important',
                    ),
                )
            );

//cat               

        $this->add_control(
                'wps_compare_td_cat',
                array(
                    'label' => esc_html__('Show Catagories', 'wpsection'),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'show' => [
                            'show' => esc_html__('Show', 'wpsection'),
                            'icon' => 'eicon-check-circle',
                        ],
                        'none' => [
                            'none' => esc_html__('Hide', 'wpsection'),
                            'icon' => 'eicon-close-circle',
                        ],
                    ],
                    'default' => 'show',
                    'selectors' => array(
                        '{{WRAPPER}} .wps_compare_td_cat' => 'display: {{VALUE}} !important',
                    ),
                )
            );

//tags               

        $this->add_control(
                'wps_compare_td_tag',
                array(
                    'label' => esc_html__('Show Tags', 'wpsection'),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'show' => [
                            'show' => esc_html__('Show', 'wpsection'),
                            'icon' => 'eicon-check-circle',
                        ],
                        'none' => [
                            'none' => esc_html__('Hide', 'wpsection'),
                            'icon' => 'eicon-close-circle',
                        ],
                    ],
                    'default' => 'show',
                    'selectors' => array(
                        '{{WRAPPER}} .wps_compare_td_tag' => 'display: {{VALUE}} !important',
                    ),
                )
            );

//rating               

        $this->add_control(
                'wps_compare_td_rat',
                array(
                    'label' => esc_html__('Show Rating', 'wpsection'),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'show' => [
                            'show' => esc_html__('Show', 'wpsection'),
                            'icon' => 'eicon-check-circle',
                        ],
                        'none' => [
                            'none' => esc_html__('Hide', 'wpsection'),
                            'icon' => 'eicon-close-circle',
                        ],
                    ],
                    'default' => 'show',
                    'selectors' => array(
                        '{{WRAPPER}} .wps_compare_td_rat' => 'display: {{VALUE}} !important',
                    ),
                )
            );

//price               

        $this->add_control(
                'wps_compare_td_price',
                array(
                    'label' => esc_html__('Show Price', 'wpsection'),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'show' => [
                            'show' => esc_html__('Show', 'wpsection'),
                            'icon' => 'eicon-check-circle',
                        ],
                        'none' => [
                            'none' => esc_html__('Hide', 'wpsection'),
                            'icon' => 'eicon-close-circle',
                        ],
                    ],
                    'default' => 'show',
                    'selectors' => array(
                        '{{WRAPPER}} .wps_compare_td_price' => 'display: {{VALUE}} !important',
                    ),
                )
            );
 //addto cart               

        $this->add_control(
                'wps_compare_td_cart',
                array(
                    'label' => esc_html__('Show Add to Cart', 'wpsection'),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'show' => [
                            'show' => esc_html__('Show', 'wpsection'),
                            'icon' => 'eicon-check-circle',
                        ],
                        'none' => [
                            'none' => esc_html__('Hide', 'wpsection'),
                            'icon' => 'eicon-close-circle',
                        ],
                    ],
                    'default' => 'show',
                    'selectors' => array(
                        '{{WRAPPER}} .wps_compare_td_cart' => 'display: {{VALUE}} !important',
                    ),
                )
            ); 


//meta compare text  one           

        $this->add_control(
                'wps_compare_meta_text_one',
                array(
                    'label' => esc_html__('Meta Compare One', 'wpsection'),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'show' => [
                            'show' => esc_html__('Show', 'wpsection'),
                            'icon' => 'eicon-check-circle',
                        ],
                        'none' => [
                            'none' => esc_html__('Hide', 'wpsection'),
                            'icon' => 'eicon-close-circle',
                        ],
                    ],
                    'default' => 'show',
                    'selectors' => array(
                        '{{WRAPPER}} .wps_compare_meta_text_one' => 'display: {{VALUE}} !important',
                    ),
                )
            );

//meta compare text  two           

        $this->add_control(
                'wps_compare_meta_text_two',
                array(
                    'label' => esc_html__('Meta Compare Two', 'wpsection'),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'show' => [
                            'show' => esc_html__('Show', 'wpsection'),
                            'icon' => 'eicon-check-circle',
                        ],
                        'none' => [
                            'none' => esc_html__('Hide', 'wpsection'),
                            'icon' => 'eicon-close-circle',
                        ],
                    ],
                    'default' => 'show',
                    'selectors' => array(
                        '{{WRAPPER}} .wps_compare_meta_text_two' => 'display: {{VALUE}} !important',
                    ),
                )
            );


//meta compare text  three           

        $this->add_control(
                'wps_compare_meta_text_three',
                array(
                    'label' => esc_html__('Meta Compare Three', 'wpsection'),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'show' => [
                            'show' => esc_html__('Show', 'wpsection'),
                            'icon' => 'eicon-check-circle',
                        ],
                        'none' => [
                            'none' => esc_html__('Hide', 'wpsection'),
                            'icon' => 'eicon-close-circle',
                        ],
                    ],
                    'default' => 'show',
                    'selectors' => array(
                        '{{WRAPPER}} .wps_compare_meta_text_three' => 'display: {{VALUE}} !important',
                    ),
                )
            );
//meta compare text  four           

        $this->add_control(
                'wps_compare_meta_text_four',
                array(
                    'label' => esc_html__('Meta Compare Four', 'wpsection'),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'show' => [
                            'show' => esc_html__('Show', 'wpsection'),
                            'icon' => 'eicon-check-circle',
                        ],
                        'none' => [
                            'none' => esc_html__('Hide', 'wpsection'),
                            'icon' => 'eicon-close-circle',
                        ],
                    ],
                    'default' => 'show',
                    'selectors' => array(
                        '{{WRAPPER}} .wps_compare_meta_text_four' => 'display: {{VALUE}} !important',
                    ),
                )
            );

//meta compare text  five           

        $this->add_control(
                'wps_compare_meta_text_five',
                array(
                    'label' => esc_html__('Meta Compare Five', 'wpsection'),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'show' => [
                            'show' => esc_html__('Show', 'wpsection'),
                            'icon' => 'eicon-check-circle',
                        ],
                        'none' => [
                            'none' => esc_html__('Hide', 'wpsection'),
                            'icon' => 'eicon-close-circle',
                        ],
                    ],
                    'default' => 'show',
                    'selectors' => array(
                        '{{WRAPPER}} .wps_compare_meta_text_five' => 'display: {{VALUE}} !important',
                    ),
                )
            );
//meta compare text  six          

        $this->add_control(
                'wps_compare_meta_text_six',
                array(
                    'label' => esc_html__('Meta Compare Six', 'wpsection'),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'show' => [
                            'show' => esc_html__('Show', 'wpsection'),
                            'icon' => 'eicon-check-circle',
                        ],
                        'none' => [
                            'none' => esc_html__('Hide', 'wpsection'),
                            'icon' => 'eicon-close-circle',
                        ],
                    ],
                    'default' => 'show',
                    'selectors' => array(
                        '{{WRAPPER}} .wps_compare_meta_text_six' => 'display: {{VALUE}} !important',
                    ),
                )
            );        

//meta compare text  Sevem          

        $this->add_control(
                'wps_compare_meta_text_seven',
                array(
                    'label' => esc_html__('Meta Compare Seven', 'wpsection'),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'show' => [
                            'show' => esc_html__('Show', 'wpsection'),
                            'icon' => 'eicon-check-circle',
                        ],
                        'none' => [
                            'none' => esc_html__('Hide', 'wpsection'),
                            'icon' => 'eicon-close-circle',
                        ],
                    ],
                    'default' => 'show',
                    'selectors' => array(
                        '{{WRAPPER}} .wps_compare_meta_text_seven' => 'display: {{VALUE}} !important',
                    ),
                )
            );  
//meta compare text  eight          

        $this->add_control(
                'wps_compare_meta_text_eight',
                array(
                    'label' => esc_html__('Meta Compare Eight', 'wpsection'),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'show' => [
                            'show' => esc_html__('Show', 'wpsection'),
                            'icon' => 'eicon-check-circle',
                        ],
                        'none' => [
                            'none' => esc_html__('Hide', 'wpsection'),
                            'icon' => 'eicon-close-circle',
                        ],
                    ],
                    'default' => 'show',
                    'selectors' => array(
                        '{{WRAPPER}} .wps_compare_meta_text_eight' => 'display: {{VALUE}} !important',
                    ),
                )
            );  




            $this->end_controls_section();
        }

		
	protected function render() {
    // Capture the shortcode output
    $shortcode_output = do_shortcode('[wps_compare_table]');

    // Escape the shortcode output before displaying it
    echo wp_kses_post( $shortcode_output );
}
	
		
    }

    // Register the widget
    Plugin::instance()->widgets_manager->register_widget_type(new WPSection_WPS_Compare_Table_Widget());
}
}
