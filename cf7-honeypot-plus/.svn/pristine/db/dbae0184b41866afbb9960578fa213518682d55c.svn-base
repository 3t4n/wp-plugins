<?php 
/*
 * Plugin Name: CF7 Honeypot Plus
 * Description: Adds honeypot plus anti-spam functionality to Contact Form 7 forms.
 * Author: wpdebuglog
 * Version: 1.0.2.1
 * Author URI: https://wpdebuglog.com/
 */

Honeypotplus::get_instance();

class Honeypotplus{

    private $version = '1.0.2.1';
    protected $spam  = false;
    public static $instance;
    private $uuids;
    private $ip_addr;

    /**
     * Instantate object 
     */
    public static function get_instance(){
        if( self::$instance ) return self::$instance;
        self::$instance = new Honeypotplus();
        return self::$instance;
    }

    private function __construct(){
        register_activation_hook( __FILE__, array( $this, 'plugin_activate' ) );
        add_action( 'wpcf7_init', array( $this, 'wpcf7_add_form_tag_honeypotplus' ), 10, 0 );
        add_filter( 'wpcf7_validate_honeypotplus', array( $this, 'wpcf7_honeypotplus_validation_filter' ), 10, 2 );

        add_action( 'wpcf7_contact_form',  array($this, 'add_honeypotplus_input') );
        add_filter( 'cfdb7_before_save_data', array($this, 'honeypot_plus_cfdb7_before_save_data'), 99 );

    }

    public function plugin_activate(){
        delete_option('honeypotplus_uuid_data');
    }

    public function add_honeypotplus_input( $contact_form ){  
        if( is_admin() ) return;  
        $properties          = $contact_form->get_properties();
        $form                = '[honeypotplus honeypotplus]';
        $form               .= $properties['form'];
        $properties['form']  = $form;
        $contact_form->set_properties( $properties );
    }




    public function wpcf7_add_form_tag_honeypotplus() {
        wpcf7_add_form_tag( array( 'honeypotplus' ),
            array( $this, 'wpcf7_honeypotplus_form_tag_handler' ), array( 'name-attr' => true ) );
    }

    public function get_ip(){
        $ip_addr = '';

		if ( isset( $_SERVER['REMOTE_ADDR'] )
		and WP_Http::is_ip_address( $_SERVER['REMOTE_ADDR'] ) ) {
			$ip_addr = $_SERVER['REMOTE_ADDR'];
		}

		return apply_filters( 'wpcf7_remote_ip_addr', $ip_addr );
    }

    public function wpcf7_honeypotplus_form_tag_handler( $tag ) {


        $uuids = get_option( 'honeypotplus_uuid_data', array() );

        $time = time();
        foreach($uuids as $key => $val){
            if( ( $time - $val['time'] ) > 3600  ){
                unset( $uuids[ $key ] );
            }
        }        
        
        $this->ip_addr = $this->get_ip();

        $uuids[ $this->ip_addr ] = array( 
            'uuid1' => substr( wp_generate_uuid4(), 0, 12 ),
            'uuid2' => wp_generate_uuid4(),
            'uuid3' => wp_generate_uuid4(),
            'time'  => time()
        );
        

        $this->uuids = $uuids;

        update_option( 'honeypotplus_uuid_data', $uuids, false);
        
        $uuids         = $uuids[ $this->ip_addr ];
        $atts          = array();
        $atts['name']  = $uuids['uuid1'];
        $atts['type']  = 'text';
        $atts['value'] = $uuids['uuid2'];
        $atts['style'] = 'display:none';
        $atts          = wpcf7_format_atts( $atts );

        $html  = sprintf( '<input %1$s  />', $atts );

        $atts          = array();
        $atts['name']  = $uuids['uuid3'];
        $atts['type']  = 'text';
        $atts['value'] = '';
        $atts['style'] = 'display:none';
        $atts          = wpcf7_format_atts( $atts );

        $html .= sprintf( '<input %1$s  />', $atts );

        return $html;
    }



    public function wpcf7_honeypotplus_validation_filter( $result, $tag ) {

        $form  = WPCF7_ContactForm::get_current();
        $skip  = apply_filters('skip_cf7_honeypot_plus', false, $form->id() );
        
        if( $skip ) return $result;

        $uuids = get_option( 'honeypotplus_uuid_data', array() );

        $this->uuids = $uuids;

        $this->ip_addr = $this->get_ip();

        $uuids  = $uuids[ $this->ip_addr ];
        $name1  = $uuids['uuid1'];
        $value1 = isset( $_POST[$name1] ) ? esc_attr( $_POST[$name1] )  : '';
        $name2  = $uuids['uuid3'];
        $value2 = isset( $_POST[$name2] ) ? esc_attr( $_POST[$name2] )  : '';

        
        if( $value1 !== $uuids['uuid2'] ) 
            $this->spam = true;
        
        if( !isset( $_POST[$name2] ) || ! empty( $value2 ) ) 
            $this->spam = true;
        

        add_filter('wpcf7_spam', array( $this, 'honeypotplus_spam_filter' ));

        return $result;
    }

    public function honeypotplus_spam_filter( $spam ){
        if( $this->spam ) return true;

        return $spam;
    }


    public function honeypot_plus_cfdb7_before_save_data( $data ){

        $uuids  = $this->uuids;
        $ip     = $this->get_ip();
        $uuids  = $uuids[ $ip ];
        
        $name1  = $uuids['uuid1'];
        $name2  = $uuids['uuid3'];

        if( isset( $data[ $name1 ] ) ) 
            unset( $data[ $name1 ] );

        if( isset( $data[ $name2 ] ) ) 
            unset( $data[ $name2 ] );

        if( isset( $data['honeypotplus'] ) ) 
            unset( $data['honeypotplus'] );


        return $data;
    }

}