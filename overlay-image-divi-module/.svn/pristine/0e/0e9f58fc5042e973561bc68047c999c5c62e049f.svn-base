<?php

class LWP_OverlayImages extends ET_Builder_Module {
    public $slug = 'lwp_overlay_image';

    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => 'http://learnhowwp.com/divi-overlay-images',
        'author'     => 'learnhowwp.com',
        'author_uri' => 'http://learnhowwp.com/',
    );

    public function init() {
        $this->name = esc_html__( 'Overlay Image', 'lwp-overlay-images' );
        $this->main_css_element = '%%order_class%%';
        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'main_content' => esc_html__( 'Content', 'lwp-overlay-images' ),
                ),
            ),
        );
    }

    public function get_fields() {
        $et_accent_color = et_builder_accent_color();
        $fields = array(
            'overlay_title'       => array(
                'label'           => esc_html__( 'Title', 'lwp-overlay-images' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Title text for overlay.', 'lwp-divi-flipbox' ),
                'toggle_slug'     => 'main_content',
            ),
            'content'             => array(
                'label'           => esc_html__( 'Content', 'lwp-overlay-images' ),
                'type'            => 'tiny_mce',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'lwp-overlay-images' ),
                'toggle_slug'     => 'main_content',
            ),
            'src'                 => array(
                'label'              => esc_html__( 'Image', 'lwp-overlay-images' ),
                'type'               => 'upload',
                'option_category'    => 'basic_option',
                'upload_button_text' => esc_attr__( 'Upload an image', 'lwp-overlay-images' ),
                'choose_text'        => esc_attr__( 'Choose an Image', 'lwp-overlay-images' ),
                'update_text'        => esc_attr__( 'Set As Image', 'lwp-overlay-images' ),
                'hide_metadata'      => true,
                'affects'            => array('alt', 'title_text'),
                'description'        => esc_html__( 'Upload your desired image, or type in the URL to the image you would like to display.', 'lwp-overlay-images' ),
                'toggle_slug'        => 'main_content',
            ),
            'overlay_color'       => array(
                'default'     => 'rgba(0,0,0,0.5)',
                'label'       => esc_html__( 'Overlay Color', 'lwp-overlay-images' ),
                'type'        => 'color-alpha',
                'description' => esc_html__( 'Here you can define a custom color for the overlay.', 'lwp-overlay-images' ),
                'toggle_slug' => 'overlay_settings',
                'tab_slug'    => 'advanced',
            ),
            'overlay_effect'      => array(
                'label'            => esc_html__( 'Overlay Effect', 'lwp-overlay-images' ),
                'type'             => 'select',
                'description'      => esc_html__( 'Here you can define the Effect for the Overlay', 'lwp-overlay-images' ),
                'toggle_slug'      => 'overlay_settings',
                'tab_slug'         => 'advanced',
                'options'          => array(
                    'fade'   => esc_html__( 'Fade', 'lwp-overlay-images' ),
                    'slide'  => esc_html__( 'Slide', 'lwp-overlay-images' ),
                    'zoom'   => esc_html__( 'Zoom', 'lwp-overlay-images' ),
                    'always' => esc_html__( 'Always', 'lwp-overlay-images' ),
                ),
                'default_on_front' => 'fade',
            ),
            'slide_direction'     => array(
                'label'            => esc_html__( 'Slide Direction', 'lwp-overlay-images' ),
                'type'             => 'select',
                'description'      => esc_html__( 'Here you can define the Direction for the Slide Effect', 'lwp-overlay-images' ),
                'toggle_slug'      => 'overlay_settings',
                'tab_slug'         => 'advanced',
                'options'          => array(
                    'top'    => esc_html__( 'Top', 'lwp-overlay-images' ),
                    'bottom' => esc_html__( 'Bottom', 'lwp-overlay-images' ),
                    'left'   => esc_html__( 'Left', 'lwp-overlay-images' ),
                    'right'  => esc_html__( 'Right', 'lwp-overlay-images' ),
                ),
                'default_on_front' => 'top',
                'show_if'          => array(
                    'overlay_effect' => 'slide',
                ),
            ),
            'transition_duration' => array(
                'label'            => esc_html__( 'Transition Duration', 'lwp-overlay-images' ),
                'type'             => 'range',
                'description'      => esc_html__( 'Here you can define the Duration for the Transition', 'lwp-overlay-images' ),
                'toggle_slug'      => 'overlay_settings',
                'tab_slug'         => 'advanced',
                'range_settings'   => array(
                    'min'  => '100',
                    'max'  => '10000',
                    'step' => '100',
                ),
                'validate_unit'    => 'true',
                'allowed_units'    => array('ms'),
                'default_unit'     => 'ms',
                'default_on_front' => '500ms',
            ),
            'alt'                 => array(
                'label'           => esc_html__( 'Image Alternative Text', 'lwp-overlay-images' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Enter the Alt text for the image here', 'lwp-overlay-images' ),
                'toggle_slug'     => 'attributes',
                'tab_slug'        => 'custom_css',
            ),
            'title'               => array(
                'label'           => esc_html__( 'Image Title Text', 'lwp-overlay-images' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Enter the text for the Title attribute for the image here', 'lwp-overlay-images' ),
                'toggle_slug'     => 'attributes',
                'tab_slug'        => 'custom_css',
            ),
            'text_width'          => array(
                'label'            => esc_html__( 'Text Width', 'lwp-overlay-images' ),
                'description'      => esc_html__( 'Adjust the width of the cards in the Flip Box.', 'lwp-overlay-images' ),
                'type'             => 'range',
                'tab_slug'         => 'advanced',
                'toggle_slug'      => 'width',
                'validate_unit'    => true,
                'default'          => 'auto',
                'default_unit'     => '%',
                'default_on_front' => 'auto',
                'allowed_units'    => array(
                    '%',
                    'em',
                    'rem',
                    'px',
                    'cm',
                    'mm',
                    'in',
                    'pt',
                    'pc',
                    'ex',
                    'vh',
                    'vw'
                ),
                'allow_empty'      => true,
                'range_settings'   => array(
                    'min'  => '0',
                    'max'  => '100',
                    'step' => '1',
                ),
            ),
        );
        $fields_paid = array();
        $fields = array_merge( $fields, $fields_paid );
        return $fields;
    }

    public function get_settings_modal_toggles() {
        $fields = array();
        $fields_paid = array(
            'advanced' => array(
                'toggles' => array(
                    'icon_settings'    => esc_html__( 'Icon', 'lwp-overlay-images' ),
                    'overlay_settings' => esc_html__( 'Overlay', 'lwp-overlay-images' ),
                ),
            ),
        );
        $fields = array_merge( $fields, $fields_paid );
        return $fields;
    }

    public function get_advanced_fields_config() {
        $fields = array(
            'fonts' => array(
                'header-overlay' => array(
                    'css'          => array(
                        'main'      => "{$this->main_css_element} h2.lwp_overlay_title, {$this->main_css_element} h1.lwp_overlay_title, {$this->main_css_element} h3.lwp_overlay_title, {$this->main_css_element} h4.lwp_overlay_title, {$this->main_css_element} h5.lwp_overlay_title, {$this->main_css_element} h6.lwp_overlay_title",
                        'important' => 'all',
                    ),
                    'header_level' => array(
                        'default' => 'h4',
                    ),
                    'label'        => esc_html__( 'Title', 'lwp-overlay-images' ),
                ),
                'module'         => array(
                    'css'   => array(
                        'main'      => "{$this->main_css_element} .lwp_overlay_content",
                        'important' => 'all',
                    ),
                    'label' => esc_html__( 'Body', 'lwp-overlay-images' ),
                ),
            ),
        );
        $fields_paid = array();
        $fields = array_merge( $fields, $fields_paid );
        return $fields;
    }

    public function render( $attrs, $content, $render_slug ) {
        $button_text = '';
        $button_url = '';
        $button_url_new_window = '';
        $button_class = '';
        $button_custom = '';
        $button_rel = '';
        $button_icon = '';
        $use_icon = '';
        $overlay_icon = '';
        $icon_color = '';
        $use_circle = '';
        $circle_color = '';
        $use_circle_border = '';
        $circle_border_color = '';
        $icon_alignment = '';
        $use_icon_font_size = '';
        $icon_font_size = '';
        $overlay_title = esc_html( $this->props['overlay_title'] );
        $text = $this->props['content'];
        $img_src = $this->props['src'];
        $overlay_color = $this->props['overlay_color'];
        $overlay_effect = $this->props['overlay_effect'];
        $slide_direction = $this->props['slide_direction'];
        $transition_duration = $this->props['transition_duration'];
        $alt = $this->props['alt'];
        $title = $this->props['title'];
        //Image title attribute
        $text_width = $this->props['text_width'];
        $overlay_level = 'h4';
        if ( isset( $this->attrs_unprocessed['header-overlay_level'] ) ) {
            $overlay_level = $this->attrs_unprocessed['header-overlay_level'];
        }
        $overlay_title_html = '';
        if ( $overlay_title != '' ) {
            $overlay_title_html = sprintf( '<%2$s class="lwp_overlay_title">%1$s</%2$s>', $overlay_title, $overlay_level );
        }
        ET_Builder_Element::set_style( $render_slug, array(
            'selector'    => '%%order_class%% .overlay',
            'declaration' => sprintf( 'background:%1$s; transition:%2$s;', esc_attr( $overlay_color ), esc_attr( $transition_duration ) ),
        ) );
        if ( isset( $text_width ) && $text_width != '' ) {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%% .lwp_overlay_container',
                'declaration' => sprintf( 'width:%1$s;', $text_width ),
            ) );
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%% .container .lwp_overlay_container',
                'declaration' => 'white-space:normal;',
            ) );
        }
        $image_has_info = false;
        $image_width = '';
        $image_height = '';
        $image_info = null;
        if ( !empty( $img_src ) && isset( $img_src ) && filter_var( ini_get( 'allow_url_fopen' ), FILTER_VALIDATE_BOOLEAN ) ) {
            $image_info = getimagesize( $img_src );
            $image_has_info = true;
        }
        if ( $image_has_info && $image_info != false ) {
            $image_width = 'width="' . $image_info[0] . '"';
            $image_height = 'height="' . $image_info[1] . '"';
        }
        if ( !empty( $button_text ) && !empty( $button_url ) ) {
            $button_class = 'lwp_has_button';
        }
        // Render button
        $button = $this->render_button( array(
            'button_text'    => $button_text,
            'button_url'     => $button_url,
            'url_new_window' => $button_url_new_window,
            'button_custom'  => $button_custom,
            'button_rel'     => $button_rel,
            'custom_icon'    => $button_icon,
        ) );
        $icon_html = '';
        if ( $use_icon === 'on' ) {
            $overlay_icon = esc_attr( et_pb_process_font_icon( $overlay_icon ) );
            //Processing the Back Icon
            $circle_class = '';
            if ( $use_circle === 'on' ) {
                $circle_class = 'lwp_icon_circle';
            }
            $icon_html = sprintf( '<span class="image_wrap"><span class="lwp_overlay_icon et-pb-icon %2$s">%1$s</span></span>', $overlay_icon, $circle_class );
            $icon_style = '';
            $icon_style .= sprintf( 'color:%1$s;', $icon_color );
            if ( $use_circle === 'on' ) {
                $icon_style .= sprintf( 'background-color:%1$s;', $circle_color );
            }
            if ( $use_circle_border === 'on' ) {
                $icon_style .= sprintf( 'border:3px solid; border-color:%1$s;', $circle_border_color );
            }
            if ( $use_icon_font_size === 'on' ) {
                if ( isset( $icon_font_size ) ) {
                    $icon_font_size_responsive_active = et_pb_get_responsive_status( $icon_font_size_last_edited );
                    $icon_font_size_values = array(
                        'desktop' => $icon_font_size,
                        'tablet'  => ( $icon_font_size_responsive_active ? $icon_font_size_tablet : '' ),
                        'phone'   => ( $icon_font_size_responsive_active ? $icon_font_size_phone : '' ),
                    );
                    et_pb_responsive_options()->generate_responsive_css(
                        $icon_font_size_values,
                        '%%order_class%% .lwp_overlay_icon',
                        'font-size',
                        $render_slug,
                        '',
                        'range'
                    );
                }
            }
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%% .lwp_overlay_icon',
                'declaration' => $icon_style,
            ) );
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%% .image_wrap',
                'declaration' => sprintf( 'text-align:%1$s;', $icon_alignment ),
            ) );
            $icon_selector = '%%order_class%% .et-pb-icon';
            // Font Icon Styles.
            $this->generate_styles( array(
                'utility_arg'    => 'icon_font_family',
                'render_slug'    => $render_slug,
                'base_attr_name' => 'overlay_icon',
                'important'      => true,
                'selector'       => $icon_selector,
                'processor'      => array('ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon'),
            ) );
        }
        return sprintf(
            '<div class="container %4$s %10$s">
			<img src="%2$s" class="image" %7$s %8$s alt="%5$s" title="%6$s">
			<div class="overlay %3$s %4$s">
				<div class="text lwp_overlay_container">
					%11$s
					%12$s
					<div class="lwp_overlay_content">%1$s</div>
					%9$s
				</div>
			</div>
		</div>',
            $text,
            esc_attr( $img_src ),
            esc_attr( $overlay_effect ),
            esc_attr( $slide_direction ),
            esc_attr( $alt ),
            esc_attr( $title ),
            $image_width,
            $image_height,
            $button,
            $button_class,
            $icon_html,
            $overlay_title_html
        );
    }

}

new LWP_OverlayImages();