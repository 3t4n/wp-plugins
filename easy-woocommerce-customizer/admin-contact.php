<?php


if ( cs_get_option('customer_contact') ) {
    
?>
<style>
.ucf_form{ width: 100%; padding: 10px 5px; float:left;}
.ucf_field{ padding: 5px; font: 400 14px/1.5em Arial; border: 1px solid #CCC; transition: ease 0.3s linear; color: #3F4C6B; margin: 5px 0; border-radius:2px;}
    .ucf_field:hover{ border: 1px solid #3F4C6B; color:#000;}
.ucf_button{ background: #04A4CC; color: #FFF; font: 400 14px/1.5em Arial; transition: ease 0.3s linear; padding: 5px 20px; border: 1px solid #3F4C6B;}
    .ucf_button:hover{ background: #3F4C6B; }
.ucf_label_success{ color: #3C763D; background-color: #DFF0D8; border-color: #D6E9C6; width: 100%; float: left; margin:2px; padding:5px;}
.ucf_label_alert{  color: #A94442; background-color: #F2DEDE; border-color: #EBCCD1; width: 100%; float: left; margin: 5px; padding:5px;}
</style>
<?php



/**
 * [tr_txt language function]
 * @return [array] [langs array return ]
 */
function ewc_tr_txt(){
    return array(
        'user_name' => __('User name'),
        'user_mail' => __('User mail'),
        'subject' => __('Subject'),
        'subject' => __('Subject'),
        'message' => __('Message'),
        'send' => __('Send'),
        'from' => __('From: '),
        'mess_succ' => __('Thanks, your message has been sent to admin'),
        'mess_error' => __('Error'),
        'mess_empty_fields' => __('Empty fields'),
    );
}


/**
 * [html_form_code show contact form]
 */
function ewc_html_form_code(){
    $lang = ewc_tr_txt();

    if ( is_user_logged_in() ) {
    echo '<form action="'.esc_url($_SERVER['REQUEST_URI']).'" method="POST" class="ucf_form">';

    echo '<input type="text" name="subject_field"  class="ucf_field" svalue="'.(isset($_POST['subject_field']) ? esc_attr($_POST['subject_field']) : '' ).'" size="100%" placeholder='.$lang["subject"].' />';

    echo '<textarea name="message_field" class="ucf_field" placeholder='.$lang["message"].'>'.(isset($_POST['message_field']) ? esc_attr($_POST['message_field']) : '' ).'</textarea>';

    echo '<input type="submit" name="submit_field" class="ucf_button" value="'.$lang["send"].'" />';
    echo '</form>';

    } else {}
}


function ewc_send_email(){

    global $current_user;
    $lang = ewc_tr_txt();

    if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['subject_field'])){

    if(!empty($_POST['message_field']) || !empty($_POST['message_field'])){
    

        
        $uname = $current_user->user_login;
        $umail = $current_user->user_email;
        $subject = sanitize_text_field($_POST['subject_field']);
        $message =
        "<p><strong>".$lang["user_name"]."</strong>: ".$uname."</p>".
        "<p><strong>".$lang["user_mail"]."</strong>: ".$umail."</p>".
        "<p><strong>".$lang["subject"]."</strong>: ".$subject."</p>".
        "<p><strong>".$lang["message"]."</strong>: ".esc_textarea($_POST['message_field'])."</p>";


        $to = get_option('admin_email');
        
        $headers = ''.$lang["from"].' '.$uname.' < '.$umail.' >';

        add_filter('wp_mail_content_type',create_function('', 'return "text/html"; ')); //send html formated
        
        if(wp_mail($to, $subject, $message, $headers)){
            echo '<div class="ucf_label_success">'; echo '<p>'.$lang["mess_succ"].'</p>';
            echo "</div>";
        } else {
            echo '<div class="ucf_label_alert">'; echo '<p>'.$lang["mess_error"].'</p>';
            echo '</div>';
        }
        
        remove_filter( 'wp_mail_content_type', 'set_html_content_type' ); //remove html formated 
        function set_html_content_type() { return 'text/html'; }

    } else { echo '<div class="ucf_label_alert">'; echo '<p>'.$lang["mess_empty_fields"].'</p>'; echo '</div>'; }
    
    }
}

function ewc_cf_shortcode(){
    ob_start();
    ewc_send_email();
    ewc_html_form_code();
    return ob_get_clean();
}

add_shortcode( 'ewc_contact_form', 'ewc_cf_shortcode' );



/**
 * Register new endpoint to use inside My Account page.
 *
 * @see https://developer.wordpress.org/reference/functions/add_rewrite_endpoint/
 */
function ewc_custom_endpoints() {
    add_rewrite_endpoint( 'contact-to-admin', EP_ROOT | EP_PAGES );
}

add_action( 'init', 'ewc_custom_endpoints' );

/**
 * Add new query var.
 *
 * @param array $vars
 * @return array
 */
function ewc_custom_query_vars( $vars ) {
    $vars[] = 'contact-to-admin';

    return $vars;
}

add_filter( 'query_vars', 'ewc_custom_query_vars', 0 );

/**
 * Flush rewrite rules on plugin activation.
 */
function ewc_custom_flush_rewrite_rules() {
    add_rewrite_endpoint( 'contact-to-admin', EP_ROOT | EP_PAGES );
    flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'ewc_custom_flush_rewrite_rules' );

function ewc_custom_insert_after_helper( $items, $new_items, $after ) {
    // Search for the item position and +1 since is after the selected item key.
    $position = array_search( $after, array_keys( $items ) ) + 1;

    // Insert the new item.
    $array = array_slice( $items, 0, $position, true );
    $array += $new_items;
    $array += array_slice( $items, $position, count( $items ) - $position, true );

    return $array;
}



/**
 * Insert the new endpoint into the My Account menu.
 *
 * @param array $items
 * @return array
 */
function ewc_custom_my_account_menu_items( $items ) {
    // Remove the logout menu item.
    $logout = $items['customer-logout'];
    unset( $items['customer-logout'] );

    // Insert your custom endpoint.
    $items['contact-to-admin'] = __( 'Contact to Admin', 'woocommerce' );

    // Insert back the logout item.
    $items['customer-logout'] = $logout;

    return $items;
}

add_filter( 'woocommerce_account_menu_items', 'ewc_custom_my_account_menu_items' );


/**
 * Endpoint HTML content.
 */
function ewc_custom_endpoint_content() {
    echo do_shortcode('[ewc_contact_form]');
}

add_action( 'woocommerce_account_contact-to-admin_endpoint', 'ewc_custom_endpoint_content' );

}