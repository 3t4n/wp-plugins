<?php

namespace MSV_AMSPSBTT_MAIN\PAGE_SCROLL_BACK_TO_TOP_SETTINGS;

if( ! defined( 'ABSPATH' ) ) exit();

if ( ! class_exists( 'MSV_AMSPSBTT_Page_Scroll_Back_Settings_API' ) ):

class MSV_AMSPSBTT_Page_Scroll_Back_Settings_API {

    /**
     * settings sections array
     *
     * @var array
     */
    protected $settings_sections = array();
	
    /**
     * Settings fields array
     *
     * @var array
     */
    protected $settings_fields = array();

    public function __construct() {
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
    }

    /**
     * Enqueue scripts and styles
     */
    function admin_enqueue_scripts() {
        wp_enqueue_style( 'wp-color-picker' );

        wp_enqueue_media();
        wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'my-script-handle', plugins_url('assets/js/ams-psbtt-color.js', MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP), array( 'wp-color-picker' ), false, true );
        wp_enqueue_script( 'jquery' );
    }

    /**
     * Set settings sections
     *
     * @param array   $sections setting sections array
     */
    function set_sections( $sections ) {
        $this->settings_sections = $sections;

        return $this;
    }

    /**
     * Add a single section
     *
     * @param array   $section
     */
    function add_section( $section ) {
        $this->settings_sections[] = $section;

        return $this;
    }

    /**
     * Set settings fields
     *
     * @param array   $fields settings fields array
     */
    function set_fields( $fields ) {
        $this->settings_fields = $fields;

        return $this;
    }

    function add_field( $section, $field ) {
        $defaults = array(
            'name'  => '',
            'label' => '',
            'desc'  => '',
            'type'  => 'text'
        );

        $arg = wp_parse_args( $field, $defaults );
        $this->settings_fields[$section][] = $arg;

        return $this;
    }

    /**
     * Initialize and registers the settings sections and fileds to WordPress
     *
     * Usually this should be called at `admin_init` hook.
     *
     * This function gets the initiated settings sections and fields. Then
     * registers them to WordPress and ready for use.
     */
    function admin_init() {
        //register settings sections
        foreach ( $this->settings_sections as $section ) {
            if ( false == get_option( $section['id'] ) ) {
                add_option( $section['id'] );
            }

            if ( isset($section['desc']) && !empty($section['desc']) ) {
                $section['desc'] = '<div class="inside">'.$section['desc'].'</div>';
                $callback = create_function('', 'echo "'.str_replace('"', '\"', $section['desc']).'";');
            } else if ( isset( $section['callback'] ) ) {
                $callback = $section['callback'];
            } else {
                $callback = null;
            }

            add_settings_section( $section['id'], '', $callback, $section['id'] );
			
        }

        //register settings fields
        foreach ( $this->settings_fields as $section => $field ) {
            foreach ( $field as $option ) {

                $type = isset( $option['type'] ) ? $option['type'] : 'text';

                $args = array(
                    'id'                => $option['name'],
                    'disabled'          => isset($option['disabled']) ? $option['disabled'] : null,
                    'readonly'          => isset($option['readonly']) ? $option['readonly'] : null,
                    'label_for'         => $args['label_for'] = "{$section}[{$option['name']}]",
                    'desc'              => isset( $option['desc'] ) ? $option['desc'] : '',
                    'name'              => $option['label'],
                    'section'           => $section,
                    'size'              => isset( $option['size'] ) ? $option['size'] : null,
                    'options'           => isset( $option['options'] ) ? $option['options'] : '',
                    'std'               => isset( $option['default'] ) ? $option['default'] : '',
                    'sanitize_callback' => isset( $option['sanitize_callback'] ) ? $option['sanitize_callback'] : '',
                    'type'              => $type,
					'min'				=> isset( $option['min'] ) ? $option['min'] : '',
					'max'				=> isset( $option['max'] ) ? $option['max'] : '',
					'unit'				=> isset( $option['unit'] ) ? $option['unit'] : '',
					'step'				=> isset( $option['step'] ) ? $option['step'] : '0.9',
					
                );
                add_settings_field( $section . '[' . $option['name'] . ']', $option['label'], array( $this, 'callback_' . $type ), $section, $section, $args );
            }
        }

        // creates our settings in the options table
        foreach ( $this->settings_sections as $section ) {
            register_setting( $section['id'], $section['id'], array( $this, 'sanitize_options' ) );
        }
    }

	
	function callback_boxshadow( $args ) {
        $h_length = esc_attr( $this->get_option( 'h_length', $args['section'], 2 ) );
        $v_length = esc_attr( $this->get_option( 'v_length', $args['section'], 2 ) );
        $blur_radius = esc_attr( $this->get_option( 'blur_radius', $args['section'], 10 ) );
        $spread_radius = esc_attr( $this->get_option( 'spread_radius', $args['section'], 0 ) );
		$box_shadow = esc_attr( $this->get_option( 'box_shadow', $args['section'], "" ) );
		$sh_color = esc_attr( $this->get_option( 'sh_color', $args['section'], "#000" ) );
        $size  = isset( $args['size'] ) && !is_null( $args['size'] ) ? $args['size'] : 'small';
        $type  = isset( $args['type'] ) ? 'number' : 'text';
        $disabled  = isset( $args['disabled'] ) ? "disabled" : "";
        $readonly  = isset( $args['readonly'] ) ? "readonly" : "";

        $html  = '<fieldset>';
        $html  .= sprintf( '<label for="%1$s[%2$s]">', $args['section'], $args['id'] );
        $html  .= sprintf( '<input type="hidden" name="%1$s[%2$s]" value="off" />', $args['section'], $args['id'] );
        $html  .= sprintf( '<input type="checkbox" class="checkbox" id="%1$s[%2$s]" name="%1$s[box_shadow]" value="on" %3$s %4$s %5$s/>Box Shadow', $args['section'], $args['id'], checked( $box_shadow, 'on', false ), $disabled, $readonly );
        $html  .= sprintf( '</label>' );
        $html  .= '</fieldset>';
		
		$html  .= '<fieldset id="ams-box-shadow">';
		
		$html  .= sprintf( '<label for="%1$s[%2$s]">Horizontal Length</label>', $args['section'], $args['id'] );
		
		$html  .= sprintf( '<input style="margin-right:15px;" min="-50" max="50" type="%1$s" class="%2$s-text" id="%3$s[%4$s]" name="%3$s[h_length]" value="%5$s" %6$s %7$s/><span>Px&nbsp;&nbsp;&nbsp;&nbsp;</span>', $type, $size, $args['section'], $args['id'], $h_length, $disabled, $readonly );
		$html  .= sprintf( '<label for="%1$s[%2$s]">Vertical Length</label>', $args['section'], $args['id'] );
		$html  .= sprintf( '<input style="margin-right:15px;" min="-50" max="50" type="%1$s" class="%2$s-text" id="%3$s[%4$s]" name="%3$s[v_length]" value="%5$s" %6$s %7$s/><span>Px&nbsp;&nbsp;&nbsp;&nbsp;</span>', $type, $size, $args['section'], $args['id'], $v_length, $disabled, $readonly ) . '<br /><br />';
		$html  .= sprintf( '<label for="%1$s[%2$s]">Blur Radius</label>', $args['section'], $args['id'] );
		$html  .= sprintf( '<input style="margin-right:15px;" min="0" max="300" type="%1$s" class="%2$s-text" id="%3$s[%4$s]" name="%3$s[blur_radius]" value="%5$s" %6$s %7$s/><span>Px&nbsp;&nbsp;&nbsp;&nbsp;</span>', $type, $size, $args['section'], $args['id'], $blur_radius, $disabled, $readonly );
		$html  .= sprintf( '<label for="%1$s[%2$s]">Spread Radius</label>', $args['section'], $args['id'] );
		$html  .= sprintf( '<input style="margin-right:15px;" type="%1$s" min="-50" max="50" class="%2$s-text" id="%3$s[%4$s]" name="%3$s[spread_radius]" value="%5$s" %6$s %7$s/><span>Px &nbsp;&nbsp;</span>', $type, $size, $args['section'], $args['id'], $spread_radius, $disabled, $readonly ) . '<br /><br />';
		
		
		$html  .= sprintf( '<input type="text" class="%1$s-text wp-color-picker-field" id="%2$s[%3$s]" name="%2$s[sh_color]" value="%4$s" data-default-color="%5$s" />', $size, $args['section'], $args['id'], $sh_color, $args['std'] );
		
		$html  .= '</fieldset>';
        $html  .= $this->get_field_description( $args );

        echo $html;
    }
	
	function callback_dropshadow( $args ) {
        $h_length = esc_attr( $this->get_option( 'drop_h_length', $args['section'], 2 ) );
        $v_length = esc_attr( $this->get_option( 'drop_v_length', $args['section'], 2 ) );
        $blur_radius = esc_attr( $this->get_option( 'drop_blur_radius', $args['section'], 10 ) );
		$drop_shadow = esc_attr( $this->get_option( 'drop_shadow', $args['section'], "" ) );
		$sh_color = esc_attr( $this->get_option( 'drop_sh_color', $args['section'], "#000" ) );
        $size  = isset( $args['size'] ) && !is_null( $args['size'] ) ? $args['size'] : 'small';
        $type  = isset( $args['type'] ) ? 'number' : 'text';
        $disabled  = isset( $args['disabled'] ) ? "disabled" : "";
        $readonly  = isset( $args['readonly'] ) ? "readonly" : "";

        $html  = '<fieldset class="ams-drop-shadow-style">';
        $html  .= sprintf( '<label for="%1$s[%2$s]">', $args['section'], $args['id'] );
        $html  .= sprintf( '<input type="hidden" name="%1$s[%2$s]" value="off" />', $args['section'], $args['id'] );
        $html  .= sprintf( '<input type="checkbox" class="checkbox" id="%1$s[%2$s]" name="%1$s[drop_shadow]" value="on" %3$s %4$s %5$s/>Drop Shadow', $args['section'], $args['id'], checked( $drop_shadow, 'on', false ), $disabled, $readonly );
        $html  .= sprintf( '</label>' );
        $html  .= '</fieldset>';
		
		$html  .= '<fieldset id="ams-drop-shadow" class="ams-drop-shadow-style">';
		
		$html  .= sprintf( '<label for="%1$s[%2$s]">Horizontal Length</label>', $args['section'], $args['id'] );
		
		$html  .= sprintf( '<input style="margin-right:15px;" min="-50" max="50" type="%1$s" class="%2$s-text" id="%3$s[%4$s]" name="%3$s[drop_h_length]" value="%5$s" %6$s %7$s/><span>Px&nbsp;&nbsp;&nbsp;&nbsp;</span>', $type, $size, $args['section'], $args['id'], $h_length, $disabled, $readonly );
		$html  .= sprintf( '<label for="%1$s[%2$s]">Vertical Length</label>', $args['section'], $args['id'] );
		$html  .= sprintf( '<input style="margin-right:15px;" min="-50" max="50" type="%1$s" class="%2$s-text" id="%3$s[%4$s]" name="%3$s[drop_v_length]" value="%5$s" %6$s %7$s/><span>Px</span>', $type, $size, $args['section'], $args['id'], $v_length, $disabled, $readonly ) . '<br /><br />';
		$html  .= sprintf( '<label for="%1$s[%2$s]">Blur Radius</label>', $args['section'], $args['id'] );
		$html  .= sprintf( '<input style="margin-right:15px;" min="0" max="300" type="%1$s" class="%2$s-text" id="%3$s[%4$s]" name="%3$s[drop_blur_radius]" value="%5$s" %6$s %7$s/><span>Px</span>', $type, $size, $args['section'], $args['id'], $blur_radius, $disabled, $readonly ). '<br /><br />';
		
		
		$html  .= sprintf( '<input type="text" class="%1$s-text wp-color-picker-field" id="%2$s[%3$s]" name="%2$s[drop_sh_color]" value="%4$s" data-default-color="%5$s" />', $size, $args['section'], $args['id'], $sh_color, $args['std'] );
		
		$html  .= '</fieldset>';
        $html  .= $this->get_field_description( $args );

        echo $html;
    }
	
	
    /**
     * Get field description for display
     *
     * @param array   $args settings field args
     */
    public function get_field_description( $args ) {
        if ( ! empty( $args['desc'] ) ) {
            $desc = sprintf( '<p class="description">%s</p>', $args['desc'] );
        } else {
            $desc = '';
        }

        return $desc;
    }

    /**
     * Displays a text field for a settings field
     *
     * @param array   $args settings field args
     */
    function callback_text( $args ) {

        $value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
        $size  = isset( $args['size'] ) && !is_null( $args['size'] ) ? $args['size'] : 'regular';
        $type  = isset( $args['type'] ) ? $args['type'] : 'text';
        $disabled  = isset( $args['disabled'] ) ? "disabled" : "";
        $readonly  = isset( $args['readonly'] ) ? "readonly" : "";

        $html  = sprintf( '<input type="%1$s" class="%2$s-text" id="%3$s[%4$s]" name="%3$s[%4$s]" value="%5$s" %6$s %7$s/>', $type, $size, $args['section'], $args['id'], $value, $disabled, $readonly );
        $html  .= $this->get_field_description( $args );

        echo $html;
    }

    /**
     * Displays a url field for a settings field
     *
     * @param array   $args settings field args
     */
    function callback_url( $args ) {
        $this->callback_text( $args );
    }

    /**
     * Displays a number field for a settings field
     *
     * @param array   $args settings field args
     */
    function callback_number( $args ) {
        $value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
        $size  = isset( $args['size'] ) && !is_null( $args['size'] ) ? $args['size'] : 'small';
        $type  = isset( $args['type'] ) ? $args['type'] : 'text';
		$min = isset( $args['min'] ) ? $args['min'] : '';
		$max = isset( $args['max'] ) ? $args['max'] : '';
		$unit = isset( $args['unit'] ) ? $args['unit'] : '';
		$step = isset( $args['step'] ) ? $args['step'] : '';
        $disabled  = isset( $args['disabled'] ) ? "disabled" : "";
        $readonly  = isset( $args['readonly'] ) ? "readonly" : "";

        $html  = sprintf( '<input type="%1$s" class="%2$s-text" id="%3$s[%4$s]" name="%3$s[%4$s]" value="%5$s" %6$s %7$s min="%8$s" max="%9$s" step="%10$s"/><span> %11$s</span>', $type, $size, $args['section'], $args['id'], $value, $disabled, $readonly, $min, $max, $step, $unit );
        $html  .= $this->get_field_description( $args );

        echo $html;
    }

    /**
     * Displays a checkbox for a settings field
     *
     * @param array   $args settings field args
     */
    function callback_checkbox( $args ) {

        $value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
        $disabled  = isset( $args['disabled'] ) ? "disabled" : "";
        $readonly  = isset( $args['readonly'] ) ? "readonly" : "";

        $html  = '<fieldset>';
        $html  .= sprintf( '<label for="%1$s[%2$s]">', $args['section'], $args['id'] );
        $html  .= sprintf( '<input type="hidden" name="%1$s[%2$s]" value="off" />', $args['section'], $args['id'] );
        $html  .= sprintf( '<input type="checkbox" class="checkbox" id="%1$s[%2$s]" name="%1$s[%2$s]" value="on" %3$s %4$s %5$s/>', $args['section'], $args['id'], checked( $value, 'on', false ), $disabled, $readonly );
        $html  .= sprintf( '%1$s</label>', $args['desc'] );
        $html  .= '</fieldset>';

        echo $html;
    }

    /**
     * Displays a multicheckbox a settings field
     *
     * @param array   $args settings field args
     */
    function callback_multicheck( $args ) {

        $value = $this->get_option( $args['id'], $args['section'], $args['std'] );
        $disabled  = isset( $args['disabled'] ) ? "disabled" : "";
        $readonly  = isset( $args['readonly'] ) ? "readonly" : "";
        $html  = '<fieldset>';

        foreach ( $args['options'] as $key => $label ) {
            $checked = isset( $value[$key] ) ? $value[$key] : '0';
            $html    .= sprintf( '<label for="%1$s[%2$s][%3$s]">', $args['section'], $args['id'], $key );
            $html    .= sprintf( '<input type="checkbox" class="checkbox" id="%1$s[%2$s][%3$s]" name="%1$s[%2$s][%3$s]" value="%3$s" %4$s %5$s %6$s />', $args['section'], $args['id'], $key, checked( $checked, $key, false ), $disabled, $readonly );
            $html    .= sprintf( '%1$s</label><br>',  $label );
        }

        $html .= $this->get_field_description( $args );
        $html .= '</fieldset>';

        echo $html;
    }

    /**
     * Displays a multicheckbox a settings field
     *
     * @param array   $args settings field args
     */
    function callback_radio( $args ) {

        $value = $this->get_option( $args['id'], $args['section'], $args['std'] );
        $disabled  = isset( $args['disabled'] ) ? "disabled" : "";
        $readonly  = isset( $args['readonly'] ) ? "readonly" : "";
		
        $html  = '<fieldset class="field_radio" style="width:750px">';

        foreach ( $args['options'] as $key => $label ) {
            $html .= sprintf( '<label style="margin-right:15px !important;" for="%1$s[%2$s][%3$s]">',  $args['section'], $args['id'], $key );
            $html .= sprintf( '<input type="radio" class="radio" id="%1$s[%2$s][%3$s]" name="%1$s[%2$s]" value="%3$s" %4$s %5$s %6$s />', $args['section'], $args['id'], $key, checked( $value, $key, false ), $disabled, $readonly );
            $html .= sprintf( '%1$s</label>', $label, $disabled, $readonly );
        }

        $html .= $this->get_field_description( $args );
        $html .= '</fieldset>';

        echo $html;
    }
	
	
	
	function callback_radioinline( $args ) {

        $value = $this->get_option( $args['id'], $args['section'], $args['std'] );
        $disabled  = isset( $args['disabled'] ) ? "disabled" : "";
        $readonly  = isset( $args['readonly'] ) ? "readonly" : "";
        $html  = '<fieldset>';

        foreach ( $args['options'] as $key => $label ) {
            $html .= sprintf( '<label style="margin-right:15px !important;" for="%1$s[%2$s][%3$s]">',  $args['section'], $args['id'], $key );
            $html .= sprintf( '<input type="radio" class="radio" id="%1$s[%2$s][%3$s]" name="%1$s[%2$s]" value="%3$s" %4$s %5$s %6$s />', $args['section'], $args['id'], $key, checked( $value, $key, false ), $disabled, $readonly );
            $html .= sprintf( '%1$s</label>', $label, $disabled, $readonly );
        }

        $html .= $this->get_field_description( $args );
        $html .= '</fieldset>';

        echo $html;
    }
    /**
     * Displays a selectbox for a settings field
     *
     * @param array   $args settings field args
     */
    function callback_select( $args ) {

        $value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
        $size  = isset( $args['size'] ) && !is_null( $args['size'] ) ? $args['size'] : 'regular';
        $disabled  = isset( $args['disabled'] ) ? "disabled" : "";
        $readonly  = isset( $args['readonly'] ) ? "readonly" : "";
        $html  = sprintf( '<select class="%1$s" name="%2$s[%3$s]" id="%2$s[%3$s]" %4$s %5$s>', $size, $args['section'], $args['id'], $disabled, $readonly );

        foreach ( $args['options'] as $key => $label ) {
            $html .= sprintf( '<option value="%1$s"%2$s %3$s>%4$s</option>', $key, selected( $value, $key, false ), $disabled, $label );
        }

        $html .= sprintf( '</select>' );
        $html .= $this->get_field_description( $args );

        echo $html;
    }

    /**
     * Displays a textarea for a settings field
     *
     * @param array   $args settings field args
     */
    function callback_textarea( $args ) {

        $value = esc_textarea( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
        $size  = isset( $args['size'] ) && !is_null( $args['size'] ) ? $args['size'] : 'regular';
        $disabled  = isset( $args['disabled'] ) ? "disabled" : "";
        $readonly  = isset( $args['readonly'] ) ? "readonly" : "";

        $html  = sprintf( '<textarea rows="15" cols="100" class="%1$s-text" id="%2$s[%3$s]" name="%2$s[%3$s]" %4$s %5$s>%6$s</textarea>', $size, $args['section'], $args['id'], $disabled, $readonly, $value );
        $html  .= $this->get_field_description( $args );

        echo $html;
    }

    /**
     * Displays a textarea for a settings field
     *
     * @param array   $args settings field args
     * @return string
     */
    function callback_html( $args ) {
        echo $this->get_field_description( $args );
    }

    /**
     * Displays a rich text textarea for a settings field
     *
     * @param array   $args settings field args
     */
    function callback_wysiwyg( $args ) {

        $value = $this->get_option( $args['id'], $args['section'], $args['std'] );
        $size  = isset( $args['size'] ) && !is_null( $args['size'] ) ? $args['size'] : '500px';

        echo '<div style="max-width: ' . $size . ';">';

        $editor_settings = array(
            'teeny'         => true,
            'textarea_name' => $args['section'] . '[' . $args['id'] . ']',
            'textarea_rows' => 10
        );

        if ( isset( $args['options'] ) && is_array( $args['options'] ) ) {
            $editor_settings = array_merge( $editor_settings, $args['options'] );
        }

        wp_editor( $value, $args['section'] . '-' . $args['id'], $editor_settings );

        echo '</div>';

        echo $this->get_field_description( $args );
    }

    /**
     * Displays a file upload field for a settings field
     *
     * @param array   $args settings field args
     */
    function callback_file( $args ) {

        $value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
        $size  = isset( $args['size'] ) && !is_null( $args['size'] ) ? $args['size'] : 'regular';
        $id    = $args['section']  . '[' . $args['id'] . ']';
        $label = isset( $args['options']['button_label'] ) ? $args['options']['button_label'] : __( 'Choose File' );

        $html  = sprintf( '<input type="text" class="%1$s-text wpsa-url" id="%2$s[%3$s]" name="%2$s[%3$s]" value="%4$s"/>', $size, $args['section'], $args['id'], $value );
        $html  .= '<input type="button" class="button wpsa-browse" value="' . $label . '" />';
        $html  .= $this->get_field_description( $args );

        echo $html;
    }

    /**
     * Displays a password field for a settings field
     *
     * @param array   $args settings field args
     */
    function callback_password( $args ) {

        $value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
        $size  = isset( $args['size'] ) && !is_null( $args['size'] ) ? $args['size'] : 'regular';

        $html  = sprintf( '<input type="password" class="%1$s-text" id="%2$s[%3$s]" name="%2$s[%3$s]" value="%4$s"/>', $size, $args['section'], $args['id'], $value );
        $html  .= $this->get_field_description( $args );

        echo $html;
    }

    /**
     * Displays a color picker field for a settings field
     *
     * @param array   $args settings field args
     */
    function callback_color( $args ) {

        $value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
        $size  = isset( $args['size'] ) && !is_null( $args['size'] ) ? $args['size'] : 'regular';

        $html  = sprintf( '<input type="text" class="%1$s-text wp-color-picker-field" id="%2$s[%3$s]" name="%2$s[%3$s]" value="%4$s" data-default-color="%5$s" />', $size, $args['section'], $args['id'], $value, $args['std'] );
        $html  .= $this->get_field_description( $args );

        echo $html;
    }

    /**
     * Sanitize callback for Settings API
     */
    function sanitize_options( $options ) {
		if ( isset( $options['restore'] ) ) {
			return $this->defaultSettings();
		}

		foreach( $options as $option_slug => $option_value ) {
            $sanitize_callback = $this->get_sanitize_callback( $option_slug );

            // If callback is set, call it
            if ( $sanitize_callback ) {
                $options[ $option_slug ] = call_user_func( $sanitize_callback, $option_value );
                continue;
            }
        }
        return $options;
    }

	public function defaultSettings() {
		$defaults = array();

		foreach ( $this->settings_fields as $section => $field ) {
			foreach ( $field as $key => $option ) {
				$option_key = $option['name'];
				$defaults[$option_key] = $option['default'];
			}
		}
		return $defaults;
	}
	
    /**
     * Get sanitization callback for given option slug
     *
     * @param string $slug option slug
     *
     * @return mixed string or bool false
     */
    function get_sanitize_callback( $slug = '' ) {
        if ( empty( $slug ) ) {
            return false;
        }

        // Iterate over registered fields and see if we can find proper callback
        foreach( $this->settings_fields as $section => $options ) {
            foreach ( $options as $option ) {
                if ( $option['name'] != $slug ) {
                    continue;
                }

                // Return the callback name
                return isset( $option['sanitize_callback'] ) && is_callable( $option['sanitize_callback'] ) ? $option['sanitize_callback'] : false;
            }
        }

        return false;
    }

    /**
     * Get the value of a settings field
     *
     * @param string  $option  settings field name
     * @param string  $section the section name this field belongs to
     * @param string  $default default text if it's not found
     * @return string
     */
    function get_option( $option, $section, $default = '' ) {

        $options = get_option( $section );

        if ( isset( $options[$option] ) ) {
            return $options[$option];
        }

        return $default;
    }

    /**
     * Show navigations as tab
     *
     * Shows all the settings section labels as tab
     */
    function show_navigation() {
        $html = '<h2 class="nav-tab-wrapper">';

        foreach ( $this->settings_sections as $tab ) {
		
		
            $html .= sprintf( '<a href="#%1$s" class="nav-tab" id="%1$s-tab">%2$s</a>', $tab['id'], $tab['title'] );
			
			
        }

        $html .= '</h2>';
        echo $html;
    }

    /**
     * Show the section settings forms
     *
     * This function displays every sections in a different form
     */
    function show_forms() {
        ?>
        <div class="metabox-holder">
			<?php foreach ( $this->settings_sections as $form ) { ?>
				<div id="<?php echo $form['id']; ?>" class="group" style="display: none;">
					<div class="metabox-holder has-right-sidebar">
							<?php
							$this->preview_button();
							?>
						<form method="post" action="options.php" style="clear:both;">
							<?php
							settings_fields( $form['id'] );
							do_settings_sections( $form['id'] );
							?>
							<div style="padding-left: 10px">
								<?php submit_button(); ?>
								<?php submit_button( 'Resore Default Settings', 'secondary', $form['id'] . '[restore]', false ); ?>
								
							</div>
						</form>
					</div>
				</div>
			<?php } ?>
        </div>
        <?php
        $this->script();
    }
	
	
	
	
	private function preview_button() {
		# see http://www.satoripress.com/2011/10/wordpress/plugin-development/clean-2-column-page-layout-for-plugins-70/
		?>
		<div class="inner-sidebar" style="width:665px;">

			<div class="postbox" style="position:absolute;min-width:665px;">
				<h3 ><span>Preview Box</span></h3>
				<hr style=""/>
				<div class="inside" style="margin:0;line-height:0;">
					<?php 
					
					$html = '<div class="ams-page-scroll-back-to-top-wrapper">';
					$icon_type = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'icon_type', 'preset' );
					if ( 'preset' == $icon_type ) :
						$html .= '<img title="Scroll to Top" class="page-scroll-back-to-top-img-preset" src="' . ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'image_preset', plugins_url( 'assets/icons/arrow23.png', MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP ) ) . '" />';
					elseif ( 'upload' == $icon_type ) :
						$html .= '<img title="Scroll to Top" class="page-scroll-back-to-top-img-preset" src="' . ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'image_upload', plugins_url( 'assets/icons/arrow23.png', MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP ) ) . '" />';
					elseif ( 'icon' == $icon_type ) :
						$html .= '<i class="fa ' . ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'icon_preset', 'fa-angle-double-up') . ' ' . ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'icon_size', 'fa-lg') .  '"></i>';
					elseif ( 'text' == $icon_type ) :
						$html .= '<p class="page-scroll-back-to-top-text-button">' . ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'text_button', 'Scroll Back To Top') . '</p>';
					endif;
					
					$html .= '</div>';
					echo $html;
					
					?>
				</div>
			</div>

		</div> <!-- .inner-sidebar -->
		<?php
	}
    /**
     * Tabbable JavaScript codes & Initiate Color Picker
     *
     * This code uses localstorage for displaying active tabs
     */
    function script() {
        ?>
        <script>
            jQuery(document).ready(function($) {
                //Initiate Color Picker
                $('.wp-color-picker-field').wpColorPicker();

                // Switches option sections
                $('.group').hide();
                var activetab = '';
                if (typeof(localStorage) != 'undefined' ) {
                    activetab = localStorage.getItem("activetab");
                }
                if (activetab != '' && $(activetab).length ) {
                    $(activetab).fadeIn();
                } else {
                    $('.group:first').fadeIn();
                }
                $('.group .collapsed').each(function(){
                    $(this).find('input:checked').parent().parent().parent().nextAll().each(
                    function(){
                        if ($(this).hasClass('last')) {
                            $(this).removeClass('hidden');
                            return false;
                        }
                        $(this).filter('.hidden').removeClass('hidden');
                    });
                });

                if (activetab != '' && $(activetab + '-tab').length ) {
                    $(activetab + '-tab').addClass('nav-tab-active');
                }
                else {
                    $('.nav-tab-wrapper a:first').addClass('nav-tab-active');
                }
                $('.nav-tab-wrapper a').click(function(evt) {
                    $('.nav-tab-wrapper a').removeClass('nav-tab-active');
                    $(this).addClass('nav-tab-active').blur();
                    var clicked_group = $(this).attr('href');
                    if (typeof(localStorage) != 'undefined' ) {
                        localStorage.setItem("activetab", $(this).attr('href'));
                    }
                    $('.group').hide();
                    $(clicked_group).fadeIn();
                    evt.preventDefault();
                });

                $('.wpsa-browse').on('click', function (event) {
                    event.preventDefault();

                    var self = $(this);

                    // Create the media frame.
                    var file_frame = wp.media.frames.file_frame = wp.media({
                        title: self.data('uploader_title'),
                        button: {
                            text: self.data('uploader_button_text'),
                        },
                        multiple: false
                    });

                    file_frame.on('select', function () {
                        attachment = file_frame.state().get('selection').first().toJSON();

                        self.prev('.wpsa-url').val(attachment.url);
                    });

                    // Finally, open the modal
                    file_frame.open();
                });
        });
        </script>

        <style type="text/css">
            /** WordPress 3.8 Fix **/
            .form-table th { padding: 20px 10px; }
            #wpbody-content .metabox-holder { padding-top: 5px; }
            .metabox-holder .group > form > h2{display: none;}
        </style>
        <?php
    }

}
endif;
