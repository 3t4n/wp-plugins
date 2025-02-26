<?php 

/**
 * Handles plugin settings page
 * and its options
 */
class RWITPF_Settings{   

    private $dynamic_messages = array();
    private $default_country ;
    /**
     * Add Settings link in admin menu,
     * register settings,
     */
    public function __construct() {

        $this->default_country = 'US';

        add_action( 'admin_menu', array( $this, 'init' ));
        
        add_action( 'admin_init', array( $this, 'cpnf_settings'));
        
        add_action( 'admin_enqueue_scripts', array( $this, 'styles'));

    }

    public function init(){

        add_menu_page(
            'RWIT Phone Formatter Settings',
            'RWIT Phone Formatter',
            'manage_options',
            'cpnf-settings',
            array( $this, 'content' ),
            'dashicons-phone'
        );
    }

    public function content() {
        ?>
        <div class="page-block-wrap">
            <div class="page-inr-block">
                <h1> RWIT Phone Formatter Settings </h1>
                <div class="page-form">
                    <form method="post" action="options.php" id="plugin-settings">
                        <?php 
                            settings_fields( 'cpnf_settings' );
                            do_settings_sections( 'cpnf-settings' );                            
                        ?>
                        <div class="copy-alert cpnf_shortcode">
                            Copied to Clipboard
                        </div>
                        <?php submit_button("Save"); ?>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }

    public function cpnf_settings() {

        add_settings_section(
            'cpnf_plugin_settings',
            '',
            '',
            'cpnf-settings'
        );
        
        $fields = $this->list_fields();

        foreach($fields as $field){
            register_setting(
                'cpnf_settings',
                $field['name'],
                'sanitize_text_field'
            );
                       
            add_settings_field(
                $field['name'],
                array_key_exists('title',$field) ? $field['title'] : '',
                array($this, 'field_html'),
                'cpnf-settings',
                'cpnf_plugin_settings',
                $field
            );

            if(!empty($field['readonly']) && ($field['readonly'] == 1)){
                $this->dynamic_messages[$field['name']] = $field['copied_text'];
            }
        }
    }

    public function list_fields() {

        include_once 'countries.php';

        return array(
            array(
                'name'     => 'cpnf_country',
                'title'    => 'Country',
                'type'     => 'select',
                'desc'     => 'Select a country for Phone Formatting and Validation',
                'readonly' => false,
                'options'  => $countries,
                'default'  => $this->default_country
            ),
            array(
                'name'     => 'cpnf_name',
                'title'    => 'Form Field name',
                'type'     => 'text',
                'readonly' => false,
                'desc'     => 'Should contain lowercase letters, words separated by underscores or with camelCase',
                'default'  => 'cpnf_phno'
            ),
            array(
                'name'    => 'cpnf_required',
                'title'   => 'Required',
                'type'    => 'checkbox',
                'default' => 0,
            ),
            array(
                'name'     => 'cpnf_required_message',
                'title'    => 'Required error message',
                'type'     => 'text',
                'readonly' => false,
                'default'  => 'This field is required'
            ),
            array(
                'name'        => 'cpnf_placeholder',
                'title'       => 'Placeholder',
                'type'        => 'text',
                'readonly'    => false,
                'placeholder' => '(+555) 123 1234',
                'default'     => '',
            ),
            array(
                'name'     => 'cpnf_invalid_message',
                'title'    => 'Invalid Error Message',
                'type'     => 'text',
                'readonly' => false,
                'default'  => 'Invalid Phone Number'
            ),
            array(
                'name'        => 'cpnf_shortcode',
                'type'        => 'text',
                'readonly'    => true,
                'desc'        => 'Paste this shortcode in Cf7 form editor',
                'default'     => $this->cpnf_phone_shortcode(),
                'copied_text' => 'Copied to Clipboard',
            )
        );
    }

    public function field_html($args){

        //set option value
        $value = '';

        if(get_option($args['name']) === false)
            $value = $args['default'];
        else
            $value = get_option($args['name']);
                
        switch($args['type']){

            case 'text':
                $textFieldHtml = '<div class="input-wraper"><div class="input-div">' ;

                $desc = '';
                if(!empty($args['desc'])){
                    $desc = '<p class="note-text">' . $args['desc']. '</p>';
                }

                $placeholder = '';
                if(array_key_exists('placeholder', $args)){
                    if(!empty($args['placeholder'])){
                        $placeholder = 'placeholder="' . $args['placeholder'] . '"';
                    }
                }            

                $copy = '';
                $readonly = '';
                if( !empty($args['readonly']) && ($args['readonly'] == 1) ){
                    $value = $args['default']; // for readonly fields, default value will be used always
                    $readonly = 'readonly';
                    $copy = '<span class="copy-icn"><img src="'. plugins_url( '../../assets/imgs/copy.png', __FILE__ ) .'" alt="copy-icon" /></span>';
                }

                $textFieldHtml .= '<input type="'.$args['type'].'" id="'. $args['name'] .'" name="'. $args['name'] .'" value="'. esc_attr($value) .'" '. $readonly .' ' . $placeholder.'/>'. $copy . $desc . '<div></div>';                
                echo $textFieldHtml;
                break;
                
            case 'select':
                if(!empty(get_option($args['name'])))
                    $value = get_option($args['name']);

                $desc = '';
                if(!empty($args['desc'])){
                    $desc = '<p class="note-text">' . $args['desc']. '</p>';
                }

                $select = '<select name="'. $args['name'] .'" id="'. $args['name'] .'">';

                foreach($args['options'] as $option){
                    $selected = ($option['code'] == esc_attr($value)) ? 'selected' : '';
                    $select .= '<option value="'. $option['code'].' "'. $selected .'>'.$option['name'].'</option>';
                }

                $select .= '</select>' . $desc;
                echo $select;
                break;
            
            case 'checkbox':

                $checkbox = '<div class="input-wrapper"><div class="input-div"><div class="input-group-prepend">' .
                '<input type="' . $args['type'] . '" value="1"' . checked( 1, esc_attr($value), false ) . ' name="'. $args['name'] .'" />'.
                '</div><input class="pl-30" type="text" id="" name="" value="Please check if field is Required" readonly=""></div></div>';
                echo $checkbox;
                break;
            
        }

    }

    public function styles($hook){
        if($hook == 'toplevel_page_cpnf-settings'){
            // Register styles for settings page
            wp_enqueue_style(
                'cpnf-frontend',
                plugins_url( '../../assets/css/backend.css', __FILE__ )
            );
            // Register scripts for settings page
            wp_enqueue_script(
                'cpnf-admin-js',
                plugins_url( '../../assets/js/admin.js', __FILE__ ),
                [ 'jquery' ],
                '11272018'
            );
            wp_localize_script(
                'cpnf-admin-js',
                'settings',
                array(
                    'dynamic_messages'=> $this->dynamic_messages,
                    'country'=> get_option('cpnf_country') ? esc_attr(get_option('cpnf_country')) : $this->default_country
                )
                
            );
        }
    }
    public function cpnf_phone_shortcode() {
        $placeholder = '';
        $req = '';
        $name = 'cpnf_phno';
        if(get_option('cpnf_required')) {
            $req = '*';
        }
        if(!empty(get_option('cpnf_name'))) {
            $name = get_option('cpnf_name');
        }
        if(!empty(get_option('cpnf_placeholder'))){
            $placeholder = ' placeholder "' . get_option('cpnf_placeholder'). '"';
        }
        $shortcode = '[tel'.$req.' '.esc_attr($name).' id:cpnf-phno class:cpnf-phno' . esc_attr($placeholder) . ']';
        return $shortcode;
    }
}

