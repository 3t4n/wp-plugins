<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Advanced_Fancy_Text_Widget extends Widget_Base {

    public function get_name() {
        return 'advanced-fancy-text';
    }

    public function get_title() {
        return 'Advanced Fancy Text';
    }

    public function get_icon() {
        return 'eicon-text-area';
    }

    public function get_categories() {
        return [ 'advamentor' ];
    }

    // Registering Controls
    protected function _register_controls() {

        // Registering Advanced Fancy Text Global Before Content Controls
        $this->start_controls_section( 'advanced_fancy_text_global_before_content_controls',
            [
                'label'             => __( 'Text Before Effect', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_CONTENT
            ]
        );

        // Registering Advanced Fancy Text Global Before Text Control
        $this->add_control( 'advanced_fancy_text_global_before_text_control',
            [
                'label'             => __( 'Before Text', 'advamentor' ),
                'type'              => Controls_Manager::TEXT,
                'default'           => __( 'Advamentor is ', 'advamentor' ),
                'placeholder'       => __( 'Type your text here', 'advamentor' ),
            ]
        );

        // Registering Advanced Fancy Text Global Before Typography Control
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'              => 'advanced_fancy_text_global_before_typography_controls',
                'label'             => __( 'Before Text Typography', 'advamentor' ),
                'scheme'            => Scheme_Typography::TYPOGRAPHY_1,
                'selector'          => '{{WRAPPER}} .advanced-fancy-text-before-content',
            ]
        );

        $this->end_controls_section();

        // Registering Advanced Fancy Text Global Effect Content Controls
        $this->start_controls_section( 'advanced_fancy_text_global_effect_content_controls',
            [
                'label'             => __( 'Enter Effect Text(s)', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_CONTENT
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control( 'advanced_fancy_text_global_effect_text_control', 
            [
                'label'             => __( 'Add Text with Effect', 'advamentor' ),
                'type'              => Controls_Manager::TEXT,
                'label_block'       => true,
            ]
        );

        $this->add_control( 'advanced_fancy_text_global_effect_text_repeater',
            [
                'label'             => __( 'Effect Text(s) List', 'advamentor' ),
                'type'              => Controls_Manager::REPEATER,
                'fields'            => $repeater->get_controls(),
                'default'           => [
                    [
                        'advanced_fancy_text_global_effect_text_control'        => __( 'Increadibly', 'advamentor' )
                    ],
                    [
                        'advanced_fancy_text_global_effect_text_control'        => __( 'Beautifully', 'advamentor' )
                    ],
                ],
                'title_field' => '{{{ advanced_fancy_text_global_effect_text_control }}}',
            ]
        );

        $this->end_controls_section();

        // Registering Advanced Fancy Text Global After Content Controls
        $this->start_controls_section( 'advanced_fancy_text_global_after_content_controls',
            [
                'label'             => __( 'Text After Effect', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_CONTENT
            ]
        );

        // Registering Advanced Fancy Text Global After Text Control
        $this->add_control( 'advanced_fancy_text_global_after_text_control',
            [
                'label'             => __( 'After Text', 'advamentor' ),
                'type'              => Controls_Manager::TEXT,
                'default'           => __( ' and awesome.', 'advamentor' ),
                'placeholder'       => __( 'Type your text here', 'advamentor' ),
            ]
        );

        // Registering Advanced Fancy Text Global After Typography Control
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name'              => 'advanced_fancy_text_global_after_typography_controls',
                'label'             => __( 'After Text Typography', 'advamentor' ),
                'scheme'            => Scheme_Typography::TYPOGRAPHY_1,
                'selector'          => '{{WRAPPER}} .advanced-fancy-text-after-content',
            ]
        );

        $this->end_controls_section();

        // Registering Advanced Fancy Text Global Effect Style Controls
        $this->start_controls_section( 'advanced_fancy_text_global_effect_style_controls',
            [
                'label'             => __( 'Select Text Effect', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_STYLE
            ]
        );

        // Registering Advanced Fancy Text Global Effect Preset Control
        $this->add_control( 'advanced_fancy_text_global_effect_preset_control',
            [
                'label'             => __( 'Select Effect', 'advamentor' ),
                'type'              => Controls_Manager::SELECT,
                'default'           => 'typeit',
                'options'           => 
                [
                    'typeit'        => __( 'Cursor', 'advamentor' ),
                    'typer'         => __( 'Typewriter', 'advamentor' )
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings   = $this->get_settings_for_display();
        $elementid  = $this->get_id();

        echo '<div class="advamentor-fancy-text-wrapper">';

        echo '<div class="x"><span class="advanced-fancy-text-before-content">' . $settings['advanced_fancy_text_global_before_text_control'] . '</span>';

        if ( $settings['advanced_fancy_text_global_effect_preset_control'] == 'typeit' ) {

            echo '<span class="advamentor-fancy-text-' . $elementid . '"></span>';

        } else {

            echo '<div class="advamentor-fancy-text-tyepr-' . $elementid . '" style="display: inline;"><span class="typer" data-delay="150" data-words="';
            if ( $settings['advanced_fancy_text_global_effect_text_repeater'] ) {
                foreach (  $settings['advanced_fancy_text_global_effect_text_repeater'] as $item ) {
                    echo $item['advanced_fancy_text_global_effect_text_control'] . ',';
                }
            }
            echo '"></span>';
            echo '<span class="cursor" data-owner="first-typer"></span></div>';

        }

        echo '<span class="advanced-fancy-text-after-content">' . $settings['advanced_fancy_text_global_after_text_control'] . '</span></div>';

        echo '</div>';

        ?>

        <script type="text/javascript">
            (function($) {

                new TypeIt('.advamentor-fancy-text-<?php echo $elementid; ?>', {
                    strings: [
                        <?php
                        if ( $settings['advanced_fancy_text_global_effect_text_repeater'] ) {
                            foreach (  $settings['advanced_fancy_text_global_effect_text_repeater'] as $item ) {
                                echo '"'.$item['advanced_fancy_text_global_effect_text_control'] . '",';
                            }
                        }
                        ?>
                    ],
                    speed: 100,
                    breakLines: false,
                    waitUntilVisible: true,
                    loop: true
                }).go();

            })( jQuery );
        </script>

        <?php

    }

}