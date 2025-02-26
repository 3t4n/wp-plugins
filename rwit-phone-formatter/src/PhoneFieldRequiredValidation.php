<?php 

class RWITPF_PhoneFieldRequiredValidation{

    public function __construct(){
        add_filter( 'wpcf7_validate_tel*', array($this, 'cpnf_tel_validation_filter'), 10, 2 );
    }


    // define the wpcf7_validate_tel callback 
    function cpnf_tel_validation_filter( $result, $tag ) { 
        // make filter magic happen here... 
        
        $phone = sanitize_text_field($_POST['cpnf_phno']);

        if(empty($phone)){
            $result->invalidate($tag, esc_attr(get_option('cpnf_required_message')));
        }
        return $result;
    }
}