<?php
/*
Plugin Name: Dhrup Contact Form 
Plugin URI: http://dhrup.com
Description: Basic WordPress Contact Form
Author: Dhrup IT Solutions
*/

function dhp_scripts_contact(){
    wp_enqueue_style('Contact', plugins_url( '/css/contact.css' , __FILE__ ), false, '2.2', 'all' );
}
add_action("wp_enqueue_scripts","dhp_scripts_contact");

function dhp_send_mail_form() {
    echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post" id="Contact-New">';
    echo '<p>';
    echo 'Your Name * <br />';
    echo '<input type="text" name="cf-name" value="" required/>';
    echo '</p>';
    echo '<p>';
    echo 'Your Email * <br />';
    echo '<input type="email" name="cf-email" value="" size="40" required/>';
    echo '</p>';
    echo '<p>';
    echo 'Subject * <br />';
    echo '<input type="text" name="cf-subject" value="" size="40" required/>';
    echo '</p>';
    echo '<p>';
    echo 'Your Message * <br />';
    echo '<textarea rows="5" cols="35" name="cf-message"></textarea>';
    echo '</p>';
    echo '<p><input type="submit" name="cf-submitted" value="Send"/></p>';
    echo '</form>';
}


function dhp_deliver_mail() {
    
    if ( isset( $_POST['cf-submitted'] ) ) {
        function wp_mail_content_type_filter() {
            return 'text/plain';
        }
        add_filter( 'wp_mail_content_type', 'wp_mail_content_type_filter' );
        
        // sanitize form values
        $name    = sanitize_text_field( $_POST["cf-name"] );
        $email   = sanitize_email( $_POST["cf-email"] );
        $subject = sanitize_text_field( $_POST["cf-subject"] );
        $message = sanitize_textarea_field( $_POST["cf-message"] );
        
        $to = get_option( 'admin_email' );
        $headers = "From: $name" ."<$email>". "\r\n";

        $mail = wp_mail( $to, $subject, $message, $headers );
        if($mail){
            echo '<div class="success-alert">';
            echo '<p>Thanks for contacting me, expect a response soon.</p>';
            echo '</div>';
        } else {
            echo '<div class="success-danger">';
            echo '<p>An unexpected error occurred.</p>';
            echo '</div>';
        }
    }
}


function dhp_shortcode() {
    session_start();
    dhp_deliver_mail();
    dhp_send_mail_form();

    return ob_get_clean();
}

add_shortcode( 'dhp-contact', 'dhp_shortcode' );
