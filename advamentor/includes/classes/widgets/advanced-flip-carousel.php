<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Advanced_Flip_Carousel_Widget extends Widget_Base {

    public function get_name() {
        return 'advanced-flip-carousel';
    }

    public function get_title() {
        return 'Advanced Flip Carousel';
    }

    public function get_icon() {
        return 'eicon-flip-box';
    }

    public function get_categories() {
        return [ 'advamentor' ];
    }

    // Registering Controls
    protected function _register_controls() {

        $this->start_controls_section( 'advanced_flip_carousel_global_content_controls',
            [
                'label'             => __( 'Content', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control( 'advanced_flip_carousel_global_images_control',
            [
                'label' => __( 'Add Images', 'advamentor' ),
                'show_label' => false,
                'type' => Controls_Manager::GALLERY,
            ]
        );

        $this->add_control( 'advanced_flip_carousel_global_loop_control',
            [
                'label' => __( 'Loop', 'advamentor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'advamentor' ),
                'label_off' => __( 'No', 'advamentor' ),
                'return_value' => 'true',
                'default' => 'false',
            ]
        );

        $this->add_control( 'advanced_flip_carousel_global_autoplay_control',
            [
                'label' => __( 'Autoplay', 'advamentor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'advamentor' ),
                'label_off' => __( 'No', 'advamentor' ),
                'return_value' => 'true',
                'default' => 'false',
            ]
        );

        $this->add_control( 'advanced_flip_carousel_autoplay_delay_control',
            [
                'label' => __( 'Autoplay Delay (in Milliseconds)', 'advamentor' ),
                'type'              => Controls_Manager::NUMBER,
                'default'           => 1000,
                'condition'         => [
                        'advanced_flip_carousel_global_autoplay_control'   => 'true'
                ]
            ]
        );

        $this->add_control( 'advanced_flip_carousel_autoplay_pause_on_hover_control',
            [
                'label' => __( 'Autoplay Pause on Hover', 'advamentor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'advamentor' ),
                'label_off' => __( 'No', 'advamentor' ),
                'return_value' => 'true',
                'default' => 'true',
                'condition'         => [
                        'advanced_flip_carousel_global_autoplay_control'   => 'true'
                ]
            ]
        );

        $this->add_control( 'advanced_flip_carousel_global_click_control',
            [
                'label' => __( 'Click', 'advamentor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'advamentor' ),
                'label_off' => __( 'No', 'advamentor' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );

        $this->add_control( 'advanced_flip_carousel_global_keyboard_control',
            [
                'label' => __( 'Keyboard', 'advamentor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'advamentor' ),
                'label_off' => __( 'No', 'advamentor' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );

        $this->add_control( 'advanced_flip_carousel_global_scrollwheel_control',
            [
                'label' => __( 'Scroll Wheel', 'advamentor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'advamentor' ),
                'label_off' => __( 'No', 'advamentor' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );

        $this->add_control( 'advanced_flip_carousel_global_touch_control',
            [
                'label' => __( 'Touch', 'advamentor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'advamentor' ),
                'label_off' => __( 'No', 'advamentor' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );

        $this->add_control( 'advanced_flip_carousel_global_nav_control',
            [
                'label' => __( 'Navigation', 'advamentor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'advamentor' ),
                'label_off' => __( 'No', 'advamentor' ),
                'return_value' => 'true',
                'default' => 'false',
            ]
        );

        $this->add_control( 'advanced_flip_carousel_global_buttons_control',
            [
                'label' => __( 'Buttons', 'advamentor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'false'  => __( 'None', 'advamentor' ),
                    'true'  => __( 'Arrows', 'advamentor' ),
                    '\'custom\''  => __( 'Custom', 'advamentor' ),
                ],
                'default' => 'false',
            ]
        );

        $this->add_control('advanced_flip_carousel_global_buttonprev_control',
            [
                'label' => __( 'Previous Button Text', 'advamentor' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter text here', 'advamentor' ),
                'default' => 'Previous',
                'condition'         => [
                        'advanced_flip_carousel_global_buttons_control'   => '\'custom\''
                ]
            ]
        );

        $this->add_control('advanced_flip_carousel_global_buttonnext_control',
            [
                'label' => __( 'Next Button Text', 'advamentor' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter text here', 'advamentor' ),
                'default' => 'Next',
                'condition'         => [
                        'advanced_flip_carousel_global_buttons_control'   => '\'custom\''
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section( 'advanced_flip_carousel_global_style_controls',
            [
                'label'             => __( 'Style', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control( 'advanced_flip_carousel_global_style_control',
            [
                'label' => __( 'Style', 'advamentor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'coverflow'  => __( 'Coverflow', 'advamentor' ),
                    'carousel'  => __( 'Carousel', 'advamentor' ),
                    'flat'  => __( 'Flat', 'advamentor' ),
                ],
                'default' => 'coverflow',
            ]
        );

        $this->add_control( 'advanced_flip_carousel_global_fadein_control',
            [
                'label'             => __( 'Fade In (in Milliseconds)', 'advamentor' ),
                'type'              => Controls_Manager::NUMBER,
                'default'           => 400,
            ]
        );

        $this->add_control( 'advanced_flip_carousel_global_spacing_control',
            [
                'label'             => __( 'Spacing', 'advamentor' ),
                'type'              => Controls_Manager::NUMBER,
                'default'           => -0.6,
                'step'              => 0.1,
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $elementid  = $this->get_id();

    ?>

        <div class="advanced-flip-carousel advanced-flip-carousel-<?php echo $elementid; ?>">
            <ul>
                <?php

                    if ( ! empty( $settings['advanced_flip_carousel_global_images_control'] ) ) {

                        foreach ( $settings['advanced_flip_carousel_global_images_control'] as $image ) {
                            echo '<li><img src="' . wp_get_attachment_image_src( $image['id'], 'aafc-thumbnail' )[0] . '" alt="' . esc_attr( Control_Media::get_image_alt( $image ) ) . '"></li>';
                        }

                    } else {
                        ?>
                            <li><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . '../../assets/front/images/advanced-flip-carousel/text1.gif';?>"/></li>
                            <li><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . '../../assets/front/images/advanced-flip-carousel/text2.gif';?>"/></li>
                            <li><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . '../../assets/front/images/advanced-flip-carousel/text3.gif';?>"/></li>
                            <li><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . '../../assets/front/images/advanced-flip-carousel/text4.gif';?>"/></li>
                            <li><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . '../../assets/front/images/advanced-flip-carousel/text5.gif';?>"/></li>
                        <?php
                    }
                ?>
                
            </ul>
        </div>

        <script>
            ( function( $ ) {
                $( '.advanced-flip-carousel-<?php echo $elementid; ?>' ).flipster( {
                    loop: <?php echo $settings['advanced_flip_carousel_global_loop_control'] ? $settings['advanced_flip_carousel_global_loop_control'] : 'false'; ?>,
                    autoplay: <?php echo $settings['advanced_flip_carousel_global_autoplay_control'] ? ( $settings['advanced_flip_carousel_autoplay_delay_control'] ? $settings['advanced_flip_carousel_autoplay_delay_control'] : 1000 ) : 'false'; ?>,
                    pauseOnHover: <?php echo $settings['advanced_flip_carousel_autoplay_pause_on_hover_control'] ? $settings['advanced_flip_carousel_autoplay_pause_on_hover_control'] : 'false'; ?>,
                    style: '<?php echo $settings['advanced_flip_carousel_global_style_control']; ?>',
                    fadeIn: <?php echo $settings['advanced_flip_carousel_global_fadein_control']; ?>,
                    spacing: <?php echo $settings['advanced_flip_carousel_global_spacing_control']; ?>,
                    click: <?php echo $settings['advanced_flip_carousel_global_click_control'] ? $settings['advanced_flip_carousel_global_click_control'] : 'false'; ?>,
                    keyboard: <?php echo $settings['advanced_flip_carousel_global_keyboard_control'] ? $settings['advanced_flip_carousel_global_keyboard_control'] : 'false'; ?>,
                    scrollwheel: <?php echo $settings['advanced_flip_carousel_global_scrollwheel_control'] ? $settings['advanced_flip_carousel_global_scrollwheel_control'] : 'false'; ?>,
                    touch: <?php echo $settings['advanced_flip_carousel_global_touch_control'] ? $settings['advanced_flip_carousel_global_touch_control'] : 'false'; ?>,
                    nav: <?php echo $settings['advanced_flip_carousel_global_nav_control'] ? $settings['advanced_flip_carousel_global_nav_control'] : 'false'; ?>,
                    buttons: <?php echo $settings['advanced_flip_carousel_global_buttons_control']; ?>,
                    buttonPrev: '<?php echo $settings['advanced_flip_carousel_global_buttonprev_control'] ? $settings['advanced_flip_carousel_global_buttonprev_control'] : 'Previous'; ?>',
                    buttonNext: '<?php echo $settings['advanced_flip_carousel_global_buttonnext_control'] ? $settings['advanced_flip_carousel_global_buttonnext_control'] : 'Next'; ?>',
                } );
            } )( jQuery );
        </script>

    <?php

    }

}
