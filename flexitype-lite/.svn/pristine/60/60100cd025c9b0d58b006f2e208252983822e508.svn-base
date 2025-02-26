<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class FlexiType_Video extends Widget_Base
{
    public function get_name()
    {
        return 'flexitype-video';
    }

    public function get_title()
    {
        return esc_html__('Video Icon','flexitype-lite');
    }

    public function get_icon()
    {
        return 'flexitype-icon eicon-youtube';
    }

    public function get_categories()
    {
        return ['flexitype'];
    }

    public function get_style_depends() {
		return [ 
			'elementor-icons-fa-solid',
			'elementor-icons-fa-brands',
			'elementor-icons-fa-regular',
		];
	}
    
    protected function register_controls()
    {
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Video Icon','flexitype-lite'),
            ]
        );
        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__('Alignment','flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left','flexitype-lite'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center','flexitype-lite'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right','flexitype-lite'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .video-icon-alignment' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon','flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-play',
					'library' => 'fa-solid',
                ],
            ]
        );
        $this->add_control(
            'close_icon',
            [
                'label' => esc_html__('Close Icon', 'flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'default' => [
					'value' => 'fas fa-times-circle',
					'library' => 'fa-solid',
				],
            ]
        );
        $this->add_control(
            'video_url',
            [
                'label' => esc_html__('Video URL','flexitype-lite'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_attr__('https://www.youtube.com/watch?v=SZEflIVnhH8','flexitype-lite'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Video Icon Style','flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-video-icon a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype-video-icon a svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'background_color',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-video-icon a' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_size',
            [
                'label' => esc_html__('Font Size','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-video-icon a' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype-video-icon a svg' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_width',
            [
                'label' => esc_html__('Max Width','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-video-icon a' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_radius',
            [
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-video-icon a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .video-pulse::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .video-pulse::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'animation_style',
            [
                'label' => esc_html__('Animation Style','flexitype-lite'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'border_color',
            [
                'label' => esc_html__('Border','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-video-icon::after' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype-video-icon::before' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'animation_background_color',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-video-icon::after' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .flexitype-video-icon::before' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
            <div class="video-icon-alignment">
                <div class="flexitype-video-icon video-pulse">
                    <a class="flexitype-video-popup-icon" href="<?php echo esc_url($settings['video_url']); ?>">
                        <?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?>
                    </a>
                </div>
            </div>
            <div class="flexitype-video-popup">
                <div class="flexitype-video-popup-video">
                    <iframe src=""></iframe>
                    <div class="video_close">
                        <?php \Elementor\Icons_Manager::render_icon($settings['close_icon'], ['aria-hidden' => 'true']); ?>
                    </div>
                </div>
            </div>
            <div class="video-overlay"></div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new FlexiType_Video);