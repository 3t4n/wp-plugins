<?php

/**
 * Amazing widget Regular
 */
namespace Elementoramazing\Widgets;


if ( !defined( 'ABSPATH' ) ) {
    exit;
    // Exit if accessed directly.
}

/**
 * Elementor Amazing widget Regular widget.
 *
 * Elementor widget that displays an Amazing widget Regular icon, a headline and a text.
 *
 * @since 1.0.0
 */
use  Elementor\Controls_Manager ;
use  Elementor\Repeater ;
use  Elementor\Scheme_Color ;
use  Elementor\Scheme_Typography ;
use  Elementor\Group_Control_Typography ;
use  Elementor\Group_Control_Border ;
use  Elementor\Group_Control_Box_Shadow ;
use  Elementor\Widget_Base ;
class An_Amazing_Widget_Regular extends Widget_Base
{
    /** 
     * Get widget name.
     *
     * Retrieve Amazing Regular widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name()
    {
        return 'icon-box An_Amazing_Widget_Regular';
    }
    
    /**
     * Get widget title.
     *
     * Retrieve Amazing widget Regular title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return __( 'Amazing Neo Regular', 'amazing-neo-font-widget' );
    }
    
    /**
     * Get widget icon.
     *
     * Retrieve Amazing widget Regular icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'anb an-amazingneo pro';
    }
    
    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Amazing widget Regular belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_categories()
    {
        return [ 'amazing-neo-icon' ];
    }
    
    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the widget belongs to.
     *
     * @return array Widget keywords.
     * @since 2.1.0
     * @access public
     *
     */
    public function get_keywords()
    {
        return [
            'link',
            'icon',
            'box',
            'amazing'
        ];
    }
    
    /**
     * Register phone widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {
        
        $this->start_controls_section( 'section_icon', [
            'label' => __( 'Content', 'amazing-neo-font-widget' ),
        ] );
        $this->add_control( 'icon', [
            'label'   => __( 'Icon', 'amazing-neo-font-widget' ),
            'type'    => Controls_Manager::ICON,
            'include' => [
                'anr an-abacus', 'anr an-ac', 'anr an-accessible-icon', 'anr an-accounts',
        ],
            'default' => 'an an-tableware pro',
        ] );
        $this->add_control( 'view', [
            'label'        => __( 'View', 'amazing-neo-font-widget' ),
            'type'         => Controls_Manager::SELECT,
            'options'      => [
            'default' => __( 'Default', 'amazing-neo-font-widget' ),
            'stacked' => __( 'Stacked', 'amazing-neo-font-widget' ),
            'framed'  => __( 'Framed', 'amazing-neo-font-widget' ),
        ],
            'default'      => 'default',
            'prefix_class' => 'elementor-view-',
            'condition'    => [
            'icon!' => '',
        ],
        ] );
        $this->add_control( 'shape', [
            'label'        => __( 'Shape', 'amazing-neo-font-widget' ),
            'type'         => Controls_Manager::SELECT,
            'options'      => [
            'circle' => __( 'Circle', 'amazing-neo-font-widget' ),
            'square' => __( 'Square', 'amazing-neo-font-widget' ),
        ],
            'default'      => 'circle',
            'condition'    => [
            'view!' => 'default',
            'icon!' => '',
        ],
            'prefix_class' => 'elementor-shape-',
        ] );
        $this->add_control( 'position', [
            'label'        => __( 'Icon Position', 'amazing-neo-font-widget' ),
            'type'         => Controls_Manager::CHOOSE,
            'default'      => 'top',
            'options'      => [
            'left'  => [
            'title' => __( 'Left', 'amazing-neo-font-widget' ),
            'icon'  => 'an an-align-left',
        ],
            'top'   => [
            'title' => __( 'Top', 'amazing-neo-font-widget' ),
            'icon'  => 'an an-align-center',
        ],
            'right' => [
            'title' => __( 'Right', 'amazing-neo-font-widgetr' ),
            'icon'  => 'an an-align-right',
        ],
        ],
            'prefix_class' => 'elementor-position-',
            'toggle'       => false,
            'condition'    => [
            'icon!' => '',
        ],
        ] );
        $this->add_control( 'show_title', [
            'label'        => __( 'Show Title', 'amazing-neo-font-widget' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => __( 'Show', 'amazing-neo-font-widget' ),
            'label_off'    => __( 'Hide', 'amazing-neo-font-widget' ),
            'return_value' => 'yes',
            'default'      => 'yes',
            'separator'    => 'before',
        ] );
        $phone_title_text = [
            'label'       => __( 'Title', 'amazing-neo-font-widget' ),
            'type'        => Controls_Manager::TEXT,
            'condition'   => [
            'show_title' => 'yes',
        ],
            'default'     => __( 'Available on premium version', 'amazing-neo-font-widget' ),
            'placeholder' => __( 'Enter your title', 'amazing-neo-font-widget' ),
            'label_block' => true,
        ];
        $this->add_control( 'title_text', $phone_title_text );
        $this->add_control( 'title_size', [
            'label'     => __( 'Title HTML Tag', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::SELECT,
            'condition' => [
            'show_title' => 'yes',
        ],
            'options'   => [
            'h1'   => 'H1',
            'h2'   => 'H2',
            'h3'   => 'H3',
            'h4'   => 'H4',
            'h5'   => 'H5',
            'h6'   => 'H6',
            'div'  => 'div',
            'span' => 'span',
            'p'    => 'p',
        ],
            'default'   => 'h3',
        ] );
        $this->add_control( 'show_description', [
            'label'        => __( 'Show Description', 'amazing-neo-font-widget' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => __( 'Show', 'amazing-neo-font-widget' ),
            'label_off'    => __( 'Hide', 'amazing-neo-font-widget' ),
            'return_value' => 'yes',
            'default'      => 'yes',
            'separator'    => 'before',
        ] );

       $phone_description_text = [
            'label'       => '',
            'type'        => Controls_Manager::TEXTAREA,
            'condition'   => [
            'show_description' => 'yes',
        ],
            'default'     => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
            'placeholder' => __( 'Enter your description', 'elementor' ),
            'rows'        => 10,
            'separator'   => 'none',
            'show_label'  => false,
        ];
        $this->add_control( 'description_text', $phone_description_text );
        $this->end_controls_section();
        $this->start_controls_section( 'link_settings', [
            'label' => __( 'URL', 'amazing-neo-font-widget' ),
        ] );
        $this->add_control( 'amazing_widget_link', [
            'label'        => __( 'Widget Link', 'amazing-neo-font-widget' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => __( 'Show', 'amazing-neo-font-widget' ),
            'label_off'    => __( 'Hide', 'amazing-neo-font-widget' ),
            'return_value' => 'yes',
            'default'      => 'yes',
            'separator'    => 'before',
        ] );
        $amazing_regular_link = [
            'label'       => __( 'URL', 'amazing-neo-font-widget' ),
            'type'        => Controls_Manager::TEXT,
            'placeholder' => __( 'http://amazingneo.com/', 'amazing-neo-font-widget' ),
            'separator'   => 'before',
        ];
        $this->add_control( 'amazing_widget_regular_link', $amazing_regular_link );
        $this->end_controls_section();
        $this->start_controls_section( 'section_style_icon', [
            'label'     => __( 'Icon', 'amazing-neo-font-widget' ),
            'tab'       => Controls_Manager::TAB_STYLE,
            'condition' => [
            'icon!' => '',
        ],
        ] );




        $this->start_controls_tabs( 'icon_colors' );
        $this->start_controls_tab( 'icon_colors_normal', [
            'label' => __( 'Normal', 'amazing-neo-font-widget' ),
        ] );
        $this->add_control( 'primary_color', [
            'label'     => __( 'Primary Color', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::COLOR,
            'scheme'    => [
            'type'  => \Elementor\Core\Schemes\Color::get_type(),
            'value' => \Elementor\Core\Schemes\Color::COLOR_1,
        ],
            'default'   => '#333',
            'selectors' => [
            '{{WRAPPER}}.elementor-view-stacked .elementor-icon'                                                    => 'background-color: {{VALUE}};',
            '{{WRAPPER}}.elementor-view-framed .elementor-icon, {{WRAPPER}}.elementor-view-default .elementor-icon' => 'color: {{VALUE}}; border-color: {{VALUE}};',
        ],
        ] );
        $this->add_control( 'secondary_color', [
            'label'     => __( 'Secondary Color', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'condition' => [
            'view!' => 'default',
        ],
            'selectors' => [
            '{{WRAPPER}}.elementor-view-framed .elementor-icon'  => 'background-color: {{VALUE}};',
            '{{WRAPPER}}.elementor-view-stacked .elementor-icon' => 'color: {{VALUE}};',
        ],
        ] );
        $this->end_controls_tab();
        $this->start_controls_tab( 'icon_colors_hover', [
            'label' => __( 'Hover', 'amazing-neo-font-widget' ),
        ] );
        $this->add_control( 'hover_primary_color', [
            'label'     => __( 'Primary Color', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
            '{{WRAPPER}}.elementor-view-stacked .elementor-icon:hover'                                                          => 'background-color: {{VALUE}};',
            '{{WRAPPER}}.elementor-view-framed .elementor-icon:hover, {{WRAPPER}}.elementor-view-default .elementor-icon:hover' => 'color: {{VALUE}}; border-color: {{VALUE}};',
        ],
        ] );
        $this->add_control( 'hover_secondary_color', [
            'label'     => __( 'Secondary Color', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'condition' => [
            'view!' => 'default',
        ],
            'selectors' => [
            '{{WRAPPER}}.elementor-view-framed .elementor-icon:hover'  => 'background-color: {{VALUE}};',
            '{{WRAPPER}}.elementor-view-stacked .elementor-icon:hover' => 'color: {{VALUE}};',
        ],
        ] );
        $this->add_control( 'hover_animation', [
            'label' => __( 'Hover Animation', 'amazing-neo-font-widget' ),
            'type'  => Controls_Manager::HOVER_ANIMATION,
        ] );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_responsive_control( 'icon_space', [
            'label'     => __( 'Spacing', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::SLIDER,
            'default'   => [
            'size' => 15,
        ],
            'range'     => [
            'px' => [
            'min' => 0,
            'max' => 100,
        ],
        ],
            'selectors' => [
            '{{WRAPPER}}.elementor-position-right .elementor-icon-box-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
            '{{WRAPPER}}.elementor-position-left .elementor-icon-box-icon'  => 'margin-right: {{SIZE}}{{UNIT}};',
            '{{WRAPPER}}.elementor-position-top .elementor-icon-box-icon'   => 'margin-bottom: {{SIZE}}{{UNIT}};',
            '(mobile){{WRAPPER}} .elementor-icon-box-icon'                  => 'margin-bottom: {{SIZE}}{{UNIT}};',
        ],
        ] );
        $this->add_responsive_control( 'icon_size', [
            'label'     => __( 'Size', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::SLIDER,
            'range'     => [
            'px' => [
            'min' => 6,
            'max' => 300,
        ],
        ],
            'selectors' => [
            '{{WRAPPER}} .elementor-icon' => 'font-size: {{SIZE}}{{UNIT}};',
        ],
        ] );
        $this->add_control( 'icon_padding', [
            'label'     => __( 'Padding', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::SLIDER,
            'selectors' => [
            '{{WRAPPER}} .elementor-icon' => 'padding: {{SIZE}}{{UNIT}};',
        ],
            'range'     => [
            'em' => [
            'min' => 0,
            'max' => 5,
        ],
        ],
            'condition' => [
            'view!' => 'default',
        ],
        ] );
        $this->add_control( 'rotate', [
            'label'     => __( 'Rotate', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::SLIDER,
            'default'   => [
            'size' => 0,
            'unit' => 'deg',
        ],
            'selectors' => [
            '{{WRAPPER}} .elementor-icon i' => 'transform: rotate({{SIZE}}{{UNIT}});',
        ],
        ] );
        $this->add_control( 'border_width', [
            'label'     => __( 'Border Width', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::DIMENSIONS,
            'selectors' => [
            '{{WRAPPER}} .elementor-icon' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
            'condition' => [
            'view' => 'framed',
        ],
        ] );
        $this->add_control( 'border_radius', [
            'label'      => __( 'Border Radius', 'amazing-neo-font-widget' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors'  => [
            '{{WRAPPER}} .elementor-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
            'condition'  => [
            'view!' => 'default',
        ],
        ] );
        $this->end_controls_section();
        $this->start_controls_section( 'section_style_content', [
            'label' => __( 'Content', 'elementor' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ] );
        $this->add_responsive_control( 'text_align', [
            'label'     => __( 'Alignment', 'elementor' ),
            'type'      => Controls_Manager::CHOOSE,
            'options'   => [
            'left'    => [
            'title' => __( 'Left', 'elementor' ),
            'icon'  => 'an an-align-left',
        ],
            'center'  => [
            'title' => __( 'Center', 'elementor' ),
            'icon'  => 'an an-align-center',
        ],
            'right'   => [
            'title' => __( 'Right', 'elementor' ),
            'icon'  => 'an an-align-right',
        ],
            'justify' => [
            'title' => __( 'Justified', 'elementor' ),
            'icon'  => 'an an-align-justify',
        ],
        ],
            'selectors' => [
            '{{WRAPPER}} .elementor-icon-box-wrapper' => 'text-align: {{VALUE}};',
        ],
        ] );
        $this->add_control( 'content_vertical_alignment', [
            'label'        => __( 'Vertical Alignment', 'elementor' ),
            'type'         => Controls_Manager::SELECT,
            'options'      => [
            'top'    => __( 'Top', 'elementor' ),
            'middle' => __( 'Middle', 'elementor' ),
            'bottom' => __( 'Bottom', 'elementor' ),
        ],
            'default'      => 'top',
            'prefix_class' => 'elementor-vertical-align-',
        ] );
        $this->add_control( 'heading_title', [
            'label'     => __( 'Title', 'elementor' ),
            'type'      => Controls_Manager::HEADING,
            'separator' => 'before',
        ] );
        $this->add_responsive_control( 'title_bottom_space', [
            'label'     => __( 'Spacing', 'elementor' ),
            'type'      => Controls_Manager::SLIDER,
            'range'     => [
            'px' => [
            'min' => 0,
            'max' => 100,
        ],
        ],
            'selectors' => [
            '{{WRAPPER}} .elementor-icon-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
        ],
        ] );
        $this->add_control( 'title_color', [
            'label'     => __( 'Color', 'elementor' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
            '{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-title' => 'color: {{VALUE}};',
        ],
            'scheme'    => [
            'type'  => \Elementor\Core\Schemes\Color::get_type(),
            'value' => \Elementor\Core\Schemes\Color::COLOR_1,
        ],
        ] );
        $this->add_group_control( Group_Control_Typography::get_type(), [
            'name'     => 'title_typography',
            'selector' => '{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-title',
            'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
        ] );
        $this->add_control( 'heading_description', [
            'label'     => __( 'Description', 'elementor' ),
            'type'      => Controls_Manager::HEADING,
            'separator' => 'before',
        ] );
        $this->add_control( 'description_color', [
            'label'     => __( 'Color', 'elementor' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
            '{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-description' => 'color: {{VALUE}};',
        ],
            'scheme'    => [
            'type'  => \Elementor\Core\Schemes\Color::get_type(),
            'value' => \Elementor\Core\Schemes\Color::COLOR_3,
        ],
        ] );
        $this->add_group_control( Group_Control_Typography::get_type(), [
            'name'     => 'description_typography',
            'selector' => '{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-description',
            'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_3,
        ] );
        $this->end_controls_section();
    }
    
    /**
     *Build link
     *
     */
    private function build_phone_link( $settings )
    {
        if ( empty($settings['amazing_widget_regular_link']) ) {
            return '';
        }
        $value = '' . $settings['amazing_widget_regular_link'];
        return $value;
    }
    
    /**
     * Render phone widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        
        if ( !empty($settings['link']['url']) ) {
            $this->add_render_attribute( 'link', 'href', $settings['link']['url'] );
            $icon_tag = 'a';
            if ( $settings['link']['is_external'] ) {
                $this->add_render_attribute( 'link', 'target', '_blank' );
            }
            if ( $settings['link']['nofollow'] ) {
                $this->add_render_attribute( 'link', 'rel', 'nofollow' );
            }
        }
        
        $value = $this->build_phone_link( $settings );
        $this->add_render_attribute( 'icon', 'class', [ 'elementor-icon', 'elementor-animation-' . $settings['hover_animation'] ] );
        $icon_tag = 'span';
        $has_icon = !empty($settings['icon']);
        $has_title = !empty($settings['title_text']);
        $has_description = !empty($settings['description_text']);
        $has_full_link = !empty($settings['amazing_widget_link']);
        $has_link = !empty($value);
        
        if ( $has_icon ) {
            $this->add_render_attribute( 'i', 'class', $settings['icon'] );
            $this->add_render_attribute( 'i', 'aria-hidden', 'true' );
        }
        
        $icon_attributes = $this->get_render_attribute_string( 'icon' );
        $this->add_render_attribute( 'description_text', 'class', 'elementor-icon-box-description' );
        $this->add_inline_editing_attributes( 'title_text', 'none' );
        $this->add_inline_editing_attributes( 'description_text' );
        ?>
		<?php 
        
        if ( !empty($has_full_link) && !empty($has_link) ) {
            ?>
            <a href="<?php 
            echo  $value ;
            ?>"> <?php 
        }
        
        ?>
		<?php 
        
        if ( $has_icon ) {
            ?>
            <div class="elementor-icon-box-wrapper">
            <div class="elementor-icon-box-icon"><?php 
            
            if ( !$has_full_link && !empty($has_link) ) {
                ?>
            <a href="<?php 
                echo  $value ;
                ?>"> <?php 
            }
            
            ?>
            <<?php 
            echo  implode( ' ', [ $icon_tag, $icon_attributes ] ) ;
            ?>>
            <i <?php 
            echo  $this->get_render_attribute_string( 'i' ) ;
            ?>></i>
            </<?php 
            echo  $icon_tag ;
            ?>>
			<?php 
            if ( !$has_full_link && !empty($has_link) ) {
                ?></a> <?php 
            }
            ?>
            </div>
		<?php 
        }
        
        ?>


        <div class="elementor-icon-box-content">
		<?php 
        
        if ( $has_title ) {
            
            if ( !$has_full_link && !empty($has_link) ) {
                ?>
            <a href="<?php 
                echo  $value ;
                ?>"> <?php 
            }
            
            ?>
            <<?php 
            echo  $settings['title_size'] ;
            ?> class="elementor-icon-box-title">
            <<?php 
            echo  implode( ' ', [ $icon_tag ] ) ;
            echo  $this->get_render_attribute_string( 'title_text' ) ;
            ?>
            ><?php 
            echo  $settings['title_text'] ;
            ?></<?php 
            echo  $icon_tag ;
            ?>>
            </<?php 
            echo  $settings['title_size'] ;
            ?>><?php 
        }
        
        if ( !$has_full_link && !empty($has_link) ) {
            ?></a> <?php 
        }
        ?>
		<?php 
        
        if ( $has_description ) {
            ?>
            <p <?php 
            echo  $this->get_render_attribute_string( 'description_text' ) ;
            ?>><?php 
            echo  $settings['description_text'] ;
            ?></p>
		<?php 
        }
        
        ?>
        </div>

        </div>  <?php 
        if ( $has_full_link ) {
            ?></a> <?php 
        }
        ?>
		<?php 
    }
    
    /**
     * Render icon box widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _content_template()
    {
        ?>
        <#
        var link = settings.link.url ? 'href="sms:' + settings.link.url + '"' : '',
        iconTag = link ? 'a' : 'span';

        view.addRenderAttribute( 'description_text', 'class', 'elementor-icon-box-description' );

        view.addInlineEditingAttributes( 'title_text', 'none' );
        view.addInlineEditingAttributes( 'description_text' );
        #>
        <div class="elementor-icon-box-wrapper">
            <# if (settings.image ){
            if ( settings.image.url ) {
            var image = {
            id: settings.image.id,
            url: settings.image.url,
            size: settings.thumbnail_size,
            dimension: settings.thumbnail_custom_dimension,
            model: view.getEditModel()
            };

            var image_url = elementor.imagesManager.getImageUrl( image );

            var imageHtml = '<img src="' + image_url + '" class="elementor-animation-' + settings.hover_animation + '"/>';

            if ( settings.link.url ) {
            imageHtml = '<a href="' + settings.link.url + '">' + imageHtml + '</a>';
            }

            html += '
            <figure class="elementor-image-box-img">' + imageHtml + '</figure>
            ';
            }
            <# if ( settings.icon ) { #>
            <div class="elementor-icon-box-icon">

                <{{{ iconTag + ' ' + link }}} class="elementor-icon elementor-animation-{{ settings.hover_animation }}">
                <i class="{{ settings.icon }}" aria-hidden="true"></i>
            </
            {{{ iconTag }}}>
        </div>
        <# } #>
        <div class="elementor-icon-box-content">
            <{{{ settings.title_size }}} class="elementor-icon-box-title">
            <{{{ iconTag + ' ' + link }}} {{{ view.getRenderAttributeString( 'title_text' ) }}}>{{{ settings.title_text
            }}}
        </{{{ iconTag }}}>
        </{{{ settings.title_size }}}>
        <p {{{ view.getRenderAttributeString( 'description_text' ) }}}>{{{ settings.description_text }}}</p>
        </div>
        </div>
		<?php 
    }

}