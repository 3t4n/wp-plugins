<?php

class SocialLikeboxSliderAdmin {
    
    public function __construct() {
        add_action( 'admin_init', array($this, 'settings_init'));
        add_action( 'admin_menu', array($this, 'options_page'));
    }
    
    public function settings_init(){
        /* Facebook Options
         * Link - https://developers.facebook.com/docs/plugins/page-plugin
         */
        
        
        $plg_options_name = 'slboxs_options';
        register_setting( 'slboxs', $plg_options_name );
        
        add_settings_section('slboxs_section_general', __('General Options', 'slboxs'), array($this, 'section_general_callback'), 'slboxs');
        
        add_settings_section('slboxs_section_facebook', __('Facebook', 'slboxs'), array($this, 'section_facebook_callback'), 'slboxs');
        
        add_settings_section('slboxs_section_twitter', __('Twitter', 'slboxs'), array($this, 'section_facebook_callback'), 'slboxs');
        
        add_settings_section('slboxs_section_youtube', __('YouTube', 'slboxs'), array($this, 'section_facebook_callback'), 'slboxs');
        
        add_settings_field('slboxs_field_enable_facebook', 
            __('Enable', 'slboxs'), array($this, 'field_input_checkbox'), 'slboxs', 'slboxs_section_facebook', [
                'label_for' => 'slboxs_field_enable_facebook',
                'class' => 'slboxs_row',
                'plg_options_name' => $plg_options_name,
            ]
        );
        
        add_settings_field('slboxs_field_enable_twitter', 
            __('Enable', 'slboxs'), array($this, 'field_input_checkbox'), 'slboxs', 'slboxs_section_twitter', [
                'label_for' => 'slboxs_field_enable_twitter',
                'class' => 'slboxs_row',
                'plg_options_name' => $plg_options_name,
            ]
        );
        
        add_settings_field('slboxs_field_enable_youtube', 
            __('Enable', 'slboxs'), array($this, 'field_input_checkbox'), 'slboxs', 'slboxs_section_youtube', [
                'label_for' => 'slboxs_field_enable_youtube',
                'class' => 'slboxs_row',
                'plg_options_name' => $plg_options_name,
            ]
        );
        
        add_settings_field('slboxs_field_facebook_uri', 
            __('Facebook URI', 'slboxs'), array($this, 'field_input_text'), 'slboxs', 'slboxs_section_facebook', [
                'label_for' => 'slboxs_field_facebook_uri',
                'class' => 'slboxs_row',
                'plg_options_name' => $plg_options_name,
            ]
        );
        
        add_settings_field('slboxs_field_twitter_uri', 
            __('Twitter profile URI', 'slboxs'), array($this, 'field_input_text'), 'slboxs', 'slboxs_section_twitter', [
                'label_for' => 'slboxs_field_twitter_uri',
                'class' => 'slboxs_row',
                'plg_options_name' => $plg_options_name,
            ]
        );
        
        add_settings_field('slboxs_field_twitter_theme', 
            __('Theme', 'slboxs'), array($this, 'field_select_callback'), 'slboxs', 'slboxs_section_twitter', [
                'label_for' => 'slboxs_field_twitter_theme',
                'class' => 'slboxs_row',
                'plg_options_name' => $plg_options_name,
                'plg_select_options' => array(
                    array(
                        'value'=>'light',
                        'label' => __( 'Light', 'slboxs' ),
                    ),
                    array(
                        'value'=>'dark',
                        'label' => __( 'Dark', 'slboxs' ),
                    ),
                )
            ]
        );
        
        add_settings_field('slboxs_field_youtube_username', 
            __('YouTube user name', 'slboxs'), array($this, 'field_input_text'), 'slboxs', 'slboxs_section_youtube', [
                'label_for' => 'slboxs_field_youtube_username',
                'class' => 'slboxs_row',
                'plg_options_name' => $plg_options_name,
            ]
        );
        
        add_settings_field('slboxs_field_youtube_video_url', 
            __('YouTube video url', 'slboxs'), array($this, 'field_input_text'), 'slboxs', 'slboxs_section_youtube', [
                'label_for' => 'slboxs_field_youtube_video_url',
                'class' => 'slboxs_row',
                'plg_options_name' => $plg_options_name,
            ]
        );
        
        add_settings_field('slboxs_field_facebook_use_small_header', 
            __('Use Small Header', 'slboxs'), array($this, 'field_input_checkbox'), 'slboxs', 'slboxs_section_facebook', [
                'label_for' => 'slboxs_field_facebook_use_small_header',
                'class' => 'slboxs_row',
                'plg_options_name' => $plg_options_name,
            ]
        );
        
        add_settings_field('slboxs_field_facebook_hide_cover_photo', 
            __('Hide Cover Photo', 'slboxs'), array($this, 'field_input_checkbox'), 'slboxs', 'slboxs_section_facebook', [
                'label_for' => 'slboxs_field_facebook_hide_cover_photo',
                'class' => 'slboxs_row',
                'plg_options_name' => $plg_options_name,
            ]
        );
        
        add_settings_field('slboxs_field_facebook_show_friends_faces', 
            __('Show Friend\'s Faces', 'slboxs'), array($this, 'field_input_checkbox'), 'slboxs', 'slboxs_section_facebook', [
                'label_for' => 'slboxs_field_facebook_show_friends_faces',
                'class' => 'slboxs_row',
                'plg_options_name' => $plg_options_name,
            ]
        );
        
        add_settings_field('slboxs_field_facebook_tabs', 
            __('Tabs', 'slboxs'), array($this, 'field_input_multiple_checkbox'), 'slboxs', 'slboxs_section_facebook', [
                'label_for' => 'slboxs_field_facebook_tabs',
                'class' => 'slboxs_row',
                'plg_options_name' => $plg_options_name,
                'plg_multiple_options' => array(
                    array(
                        'value'=>'timeline',
                        'label' => __( 'timeline', 'slboxs' ),
                    ),
                    array(
                        'value'=>'events',
                        'label' => __( 'events', 'slboxs' ),
                    ),
                    array(
                        'value'=>'messages',
                        'label' => __( 'messages', 'slboxs' ),
                    ),
                )
            ]
        );
        
        add_settings_field('slboxs_field_disable_on_mobile', 
            __('Disable on mobile', 'slboxs'), array($this, 'field_input_checkbox'), 'slboxs', 'slboxs_section_general', [
                'label_for' => 'slboxs_field_disable_on_mobile',
                'class' => 'slboxs_row',
                'plg_options_name' => $plg_options_name,
            ]
        );
        
        add_settings_field('slboxs_field_top', 
            __('Top position', 'slboxs'), array($this, 'field_input_text'), 'slboxs', 'slboxs_section_general', [
                'label_for' => 'slboxs_field_top',
                'class' => 'slboxs_row',
                'plg_options_name' => $plg_options_name,
            ]
        );
        
        add_settings_field('slboxs_field_style', 
            __('Style', 'slboxs'), array($this, 'field_select_callback'), 'slboxs', 'slboxs_section_general', [
                'label_for' => 'slboxs_field_style',
                'class' => 'slboxs_row',
                'plg_options_name' => $plg_options_name,
                'plg_select_options' => array(
                    array(
                        'value' => 'small-fill',
                        'label' => __( 'Small Filled', 'slboxs' ),
                    ),
                    array(
                        'value' => 'small-trans',
                        'label' => __( 'Small Transparent', 'slboxs' ),
                    ),
                    array(
                        'value' => 'big-fill',
                        'label' => __( 'Big Filled', 'slboxs' ),
                    ),
                    array(
                        'value' => 'big-trans',
                        'label' => __( 'Big Transparent', 'slboxs' ),
                    ),
                )
            ]
        );
        
        add_settings_field('slboxs_field_position', 
            __('Position', 'slboxs'), array($this, 'field_select_callback'), 'slboxs', 'slboxs_section_general', [
                'label_for' => 'slboxs_field_position',
                'class' => 'slboxs_row',
                'plg_options_name' => $plg_options_name,
                'plg_select_options' => array(
                    array(
                        'value' => 'left',
                        'label' => __( 'Position Left', 'slboxs' ),
                    ),
                    array(
                        'value' => 'right',
                        'label' => __( 'Position Right', 'slboxs' ),
                    ),
                )
            ]
        );
    }
    
    public function field_select_callback($args){
        $options = get_option($args['plg_options_name']);
        $select_options = $args['plg_select_options'];
        // output the field
        echo '<select id="'.esc_attr( $args['label_for'] ).'" data-custom="'.esc_attr( $args['plg_options_name'] ).'" name="slboxs_options['.esc_attr( $args['label_for'] ).']"
        >';
        foreach($select_options as $item){
            echo '<option value="'.$item['value'].'" '.(isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], $item['value'], false ) ) : ( '' ) ).'>'.$item['label'].'</option>';
            
        }
        echo '</select>';
    }
    
    public function section_general_callback($args){
        echo '<p id="'.esc_attr( $args['id'] ).'">'.esc_html_e( 'Fill main options', 'slboxs' ).'</p>';
    }
    
    public function section_facebook_callback($args){
        echo '<p id="'.esc_attr( $args['id'] ).'">'.esc_html_e( 'Set Facebook Options', 'slboxs' ).'</p>';
    }
    
    function field_input_checkbox($args){
        $options = get_option($args['plg_options_name']);
        if( isset( $options[ $args['label_for'] ]) ){
            $is_checked = (($options[ $args['label_for'] ] === 'on') ? ' checked="checked"': '');
        } else {
            $is_checked = '';
        }
        echo '<input id="'.esc_attr( $args['label_for'] ).'" name="slboxs_options['.esc_attr( $args['label_for'] ).']" type="checkbox"'.$is_checked.'" />';
    }
    
    function field_input_multiple_checkbox($args){
        $options = get_option($args['plg_options_name']);
        $multiple_options = $args['plg_multiple_options'];
//        print_r($options);
//        print_r($args);
//        print_r($multiple_options);
        foreach($multiple_options as $item){
            if(isset($options[ $args['label_for'] ])){
                if( in_array( $item['value'], $options[ $args['label_for'] ] )){
                    $is_checked = ' checked="checked"';
                } else {
                    $is_checked = '';
                }
            } else {
                $is_checked = '';
            }
            echo '<label><input type="checkbox" name="slboxs_options['.esc_attr( $args['label_for'] ).'][]" value="'.$item['value'].'" '.$is_checked.' /> '.$item['label'].'</label>&nbsp;&nbsp;';
        }
    }
    
    function field_input_text($args){
        $options = get_option($args['plg_options_name']);
        echo '<input id="'.esc_attr( $args['label_for'] ).'" name="slboxs_options['.esc_attr( $args['label_for'] ).']" size="40" type="text" value="'.$options[ $args['label_for'] ].'" />';
    }
    
    public function options_page(){
        add_options_page('Social Like Box Slider', 'Social Like Box Slider','manage_options','slboxs',array($this, 'options_page_html')); 
    }
    
    public function options_page_html(){
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        } 
        settings_errors( 'slboxs_messages' );
        echo '<div class="wrap">';
        echo '<h1>'.esc_html( get_admin_page_title() ).'</h1>';
        echo '<form action="options.php" method="post">';
        settings_fields( 'slboxs' );
        do_settings_sections( 'slboxs' );
        submit_button( 'Save Settings' );
        echo '</form></div>';
    }
}