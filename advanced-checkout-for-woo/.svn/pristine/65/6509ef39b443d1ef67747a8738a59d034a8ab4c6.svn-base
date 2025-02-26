<?php
/**
 * Plugin Name: Advance Woocommerce Checkout
 * Plugin URI: https://theonlined.com/advance-woocommerce-checkout
 * Description: This Plugin Provides An Advance Multi-step woocomerce checkout for your Store.
 * Version: 1.3
 * Author: Onlined
 * Author URI: https://theonlined.com/
 * License: GPL2
 * Text Domain: advance-checkout-wc
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Check if WooCommerce is active
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

//require_once dirname( __FILE__ ) . '/includes/license.php';


add_action('admin_menu', 'WAWC_checkout_menu');
add_action('admin_init', 'WAWC_checkout_settings');

function WAWC_checkout_menu() {
    add_menu_page('WA Checkout', 'WA Checkout', 'manage_options', 'wawc-checkout', 'WAWC_checkout_dashboard');
  //  add_submenu_page('wawc-checkout', 'Activate License', 'Activate License', 'manage_options', 'wawc-checkout-activate-license', 'WAWC_checkout_activate_license');
}



function WAWC_checkout_settings() {
     
    register_setting('WAWC_settings', 'K7eypR3a8ndomG2en3');
    register_setting('WAWC_settings', 'RandoM9kEYp3Hrase1L');
    register_setting('WAWC_settings', '5KeyWoRd2RandoM8Gen');
    register_setting('WAWC_settings', 'Gen1raNdomKeyP4hrasE');
    register_setting('WAWC_settings', '7R8a9nD3oM6K2eYp0hrase');

}



function WAWC_checkout_dashboard() {
    if (!current_user_can('manage_options'))  {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }
 if (get_option('Gen1raNdomKeyP4hrasE') !== 'valid') {
  //      wp_die('Invalid License. Please activate your license to use this plugin.');
}
   

    // Save attachment ID and repeater field data
    // Check if the form is submitted
    if (isset($_POST['submit_image_selector'])) {
        if (isset($_POST['image_attachment_id'])) {
        update_option('WAWC_logo_selector', absint($_POST['image_attachment_id']));
        }
        // Save repeater field data
        $WAWC_page_names = isset($_POST['WAWC_page_name']) ? array_map('sanitize_text_field', $_POST['WAWC_page_name']) : array();
        $WAWC_page_links = isset($_POST['WAWC_page_link']) ? array_map('esc_url_raw', $_POST['WAWC_page_link']) : array();

        update_option('WAWC_page_names', $WAWC_page_names);
        update_option('WAWC_page_links', $WAWC_page_links);
         // Save WHMCS API key
    if (isset($_POST['WAWC_map_api'])) {
        update_option('WAWC_map_api', sanitize_text_field($_POST['WAWC_map_api']));
    }
    
  // Save checkbox value
$remove_additional_field = isset($_POST['WAWC_remove_additional_field']) ? 1 : 0;
update_option('WAWC_remove_additional_field', $remove_additional_field);
$remove_company = isset($_POST['WAWC_remove_company']) ? 1 : 0;
update_option('WAWC_remove_company', $remove_company);
$remove_address2 = isset($_POST['WAWC_remove_address2']) ? 1 : 0;
update_option('WAWC_remove_address2', $remove_address2);
$remove_phone = isset($_POST['WAWC_remove_phone']) ? 1 : 0;
update_option('WAWC_remove_phone', $remove_phone);
$remove_shipping_address = isset($_POST['WAWC_remove_shipping_address']) ? 1 : 0;
update_option('WAWC_remove_shipping_address', $remove_shipping_address);
$remove_coupons = isset($_POST['WAWC_remove_coupons']) ? 1 : 0;
update_option('WAWC_remove_coupons', $remove_coupons);
if (isset($_POST['button-background-color'])) {
    update_option('button-background-color', sanitize_text_field($_POST['button-background-color']));
}
if (isset($_POST['button-text-color'])) {
    update_option('button-text-color', sanitize_text_field($_POST['button-text-color']));
}
if (isset($_POST['link-colors'])) {
    update_option('link-colors', sanitize_text_field($_POST['link-colors']));
}
if (isset($_POST['logo-width-px'])) {
    update_option('logo-width-px', sanitize_text_field($_POST['logo-width-px']));
}

        // Save Order Bump fields
        update_option('WAWC_order_bump_position', sanitize_text_field($_POST['WAWC_order_bump_position']));
        update_option('WAWC_order_bump_title', sanitize_text_field($_POST['WAWC_order_bump_title']));
        update_option('WAWC_order_bump_price', sanitize_text_field($_POST['WAWC_order_bump_price']));
        update_option('WAWC_order_bump_description', sanitize_textarea_field($_POST['WAWC_order_bump_description']));
        
        if (isset($_POST['bump_image_attachment_id'])) {
            update_option('WAWC_bump_image_selector', absint($_POST['bump_image_attachment_id']));
        }
    }

    wp_enqueue_media();
    
  
    ?>
   
<style>.wrap.WAWC {
 
    background: #fff;
    box-shadow: 0 0 5px -3px;
    border-radius: 5px;
}
.WAWC-container {
    display: grid;
    grid-template-columns: 20% 80%;
    grid-gap: 1em;
    padding: 3em;
    border-bottom: 1px solid #eee;
}
span.setting-title {
    font-weight: bold;
    display: block;
    margin-bottom: 10px;
}
div#repeater-field {
    display: flex;
    flex-direction: column;
    grid-gap: 10px;
    margin-bottom:10px;
}
div#repeater-field button {
    border: 1px solid;
    padding: 5px 10px;
    border-radius: 5px;
    color: #2271b1;
    border-color: #2271b1;
    background: #f6f7f7;
    vertical-align: top;
}
.WAWC-container label {
    display: block;
    margin-bottom: 10px;
}
.WAWC-inner{
    display:none;
}
.WAWC-inner>div {
    padding: 10px 0;
    margin: 10px 0;
    border-top: 1px solid #ccc;
}
.WAWC-inner span {
    display: block;
    font-weight: bold;
    margin-bottom: 15px;
}
.WAWC-header {
    border-bottom: 1px solid #ccc;
    padding: 2em;
    font-weight: bold;
}
.WAWC-footer {
    padding: 2em;
}.beta-warning {
    margin: 1em;
    padding: 1em;
    background: #ff000030;
    border-radius: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
}
.useful-meta {
    margin: 1em;
    padding: 1em;
    background: #00800030;
    display: flex;
    align-items: center;
    gap: 10px;
    border-radius: 10px;
}
</style>
    <div class="wrap WAWC" >
      <div class="WAWC-header">Woocommerce Advance Checkout</div>
	   <div class="beta-warning">

      <b>Beta Version Alert!</b> Experiencing issues? Reach out for support. Have feature requests? Let us know. We're committed to quick updates. Thank you for your feedback and understanding!
    <a href='https://theonlined.com/contact-us/' class='button'>Contact Us here</a>  
    </div>
    <div class="useful-meta">
<b>Found this plugin useful?</b>  Please leave us a review here. This will help motivate us to add new features in the future
<a href='https://wordpress.org/support/plugin/advanced-checkout-for-woo/reviews/#new-post' class='button'>Rate us Here</a> 
</div>
        <form method='post'>
            <div class="WAWC-container">
                <div> <span class='setting-title'>Upload Logo</span><span>This logo will appear only on checkout page</span></div>
                <div> <div class='image-preview-wrapper'>
			<img id='image-preview' src='<?php echo wp_get_attachment_url( get_option( 'WAWC_logo_selector' ) ); ?>' height='50'>
		</div>
		<input id="upload_image_button" type="button" class="button" value="<?php _e( 'Upload image' ); ?>" />
		<input type='hidden' name='image_attachment_id' id='image_attachment_id' value='<?php echo get_option( 'WAWC_logo_selector' ); ?>'>
        <div style='margin-top:10px'><input type='number' name='logo-width-px' id='logo-width-px' value='<?php echo get_option( 'logo-width-px' ); ?>'><span>Logo Width (px)</span> </div>    
    </div>
       
    </div>
            <div class=" WAWC-container">
                <div> <span class='setting-title'>Policies Link</span><span>Add Policy Pages Name and link, they'll appear in footer of checkout page (e.g privacy policy, terms and conditions).</span></div>
                <div> <div id="repeater-field">
       <?php
// Loop through saved data and display rows
$WAWC_page_names = get_option('WAWC_page_names', array());
$WAWC_page_links = get_option('WAWC_page_links', array());

if (empty($WAWC_page_names)) {
    $WAWC_page_names = array(''); // Initialize with a default value
    $WAWC_page_links = array(''); // Initialize with a default value
}

foreach ($WAWC_page_names as $index => $WAWC_page_name) {
    $WAWC_page_link = isset($WAWC_page_links[$index]) ? $WAWC_page_links[$index] : '';
    ?>
    <div class='row'>
        <input type="text" name="WAWC_page_name[]" placeholder="Page Name" value="<?php echo esc_attr($WAWC_page_name); ?>">
        <input type="text" name="WAWC_page_link[]" placeholder="Page Link" value="<?php echo esc_url($WAWC_page_link); ?>">
        <button type="button" class="remove" class='button'>Remove</button>
   </div>
    <?php
}
?>

    </div>
    <button type="button" id="add" class='button'>Add More Page</button></div>
            </div>
            
		<div class=" WAWC-container">
                <div> <span class='setting-title'>Google Map API Key</span><span>Add Google MAP API key to access <b>"Address Autocomplete Feature"</b>.</span></div>
                <div>  <input type='text' name='WAWC_map_api' Placeholder='Google Map API Key' value="<?php echo esc_attr(get_option('WAWC_map_api')); ?>"></div>
            </div>
            
            	<div class=" WAWC-container">
                <div> <span class='setting-title'>Remove Additional Fields</span><span>Remove Unnecessary/Unwanter features from default woocommerce checkout page..</span></div>
                <div>  <label>
                <input type="checkbox" name="WAWC_remove_additional_field" <?php checked(get_option('WAWC_remove_additional_field'), 1); ?>>
                Remove Order Notes
            </label>
            <label>
                <input type="checkbox" name="WAWC_remove_company" <?php checked(get_option('WAWC_remove_company'), 1); ?>>
                Remove Company Name
            </label>
            <label>
                <input type="checkbox" name="WAWC_remove_address2" <?php checked(get_option('WAWC_remove_address2'), 1); ?>>
                Remove Address Line 2
            </label>
            <label>
                <input type="checkbox" name="WAWC_remove_phone" <?php checked(get_option('WAWC_remove_phone'), 1); ?>>
                Remove Phone
            </label>
            <label>
                <input type="checkbox" name="WAWC_remove_shipping_address" <?php checked(get_option('WAWC_remove_shipping_address'), 1); ?>>
                Remove Ship To Different Address
            </label>
            <label>
                <input type="checkbox" name="WAWC_remove_coupons" <?php checked(get_option('WAWC_remove_coupons'), 1); ?>>
                Remove Coupon Field
            </label></div>
            </div>
		
    
   	<div class=" WAWC-container">
                <div> <span class='setting-title'>Order Bump</span><span>Get Extra Sales by using order bump feature, sell product, insurance, offer using order bump.</span></div>
                <div>   <select name="WAWC_order_bump_position">
        <option value="none" <?php selected(get_option('WAWC_order_bump_position'), 'none'); ?>>None</option>
        <option value="above_payment" <?php selected(get_option('WAWC_order_bump_position'), 'above_payment'); ?>>Above Payment Form</option>
        <option value="below_summary" <?php selected(get_option('WAWC_order_bump_position'), 'below_summary'); ?>>Below Summary</option>
    </select>
    <div class="WAWC-inner">
        <div><span>Order Bump Title</span><input type="text" name="WAWC_order_bump_title" value="<?php echo esc_attr(get_option('WAWC_order_bump_title')); ?>"></div>
        <div><span>Price of Order Bump</span><input type="text" name="WAWC_order_bump_price" value="<?php echo esc_attr(get_option('WAWC_order_bump_price')); ?>"></div>
        <div> <span>Bump Description</span> <textarea name="WAWC_order_bump_description"><?php echo esc_textarea(get_option('WAWC_order_bump_description')); ?></textarea></div>
        <div><span>Order Bump Image</span><div class="bump-image"><div class='bump_image-preview-wrapper'>
    <img id='bump_image-preview' src='<?php echo wp_get_attachment_url(get_option('WAWC_bump_image_selector')); ?>' height='100'>
    </div>
      <input id="upload_bump_image_button" type="button" class="button" value="<?php _e('Upload image'); ?>" />
      <input type='hidden' name='bump_image_attachment_id' id='bump_image_attachment_id' value='<?php echo get_option('WAWC_bump_image_selector'); ?>'></div></div>
    </div>
    </div>
            </div>
   <div class='WAWC-container'>
   <div> <span class='setting-title'>Customize</span><span>Customize colors and style of your checkout page</span></div>
                <div> 
             
                    <div>  
                        <input type="text" name="button-background-color" id="button-background-color" value="<?php echo get_option('button-background-color'); ?>" data-default-color="#effeff" />
    <span>Button Background Color</span>
                    </div>
                    
                    <div>  
                        <input type="text" name="button-text-color" id="button-text-color" value="<?php echo get_option('button-text-color'); ?>" data-default-color="#effeff" />
    <span>Button Text Colors</span>
                    </div>

                    <div>  
                        <input type="text" name="link-colors" id="link-colors" value="<?php echo get_option('link-colors'); ?>" data-default-color="#effeff" />
    <span>Link Colors</span>
                    </div>
                

                </div>
           
   </div>
  
   
     <div class="WAWC-footer"><input  type="submit" name='submit_image_selector'  value="Save Changes" class="button-primary"></div>
     

	</form>
       
    </div>
    <?php
    
}

function WAWC_theme_colorpicker() {
    // Enqueue the color picker script & style
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_style('wp-color-picker');
}

add_action('admin_enqueue_scripts', 'WAWC_theme_colorpicker');

function WAWC_custom_checkout_css() {
    if ( is_checkout() ) {
        $btnclr = get_option('button-background-color');
        $btntxtclr = get_option('button-text-color');
        $lnkclr = get_option('link-colors');
        $logowid = get_option('logo-width-px');
        echo '<style>:root { 
            --btn-back-color: ' . $btnclr . ';
            --btn-text-color: ' . $btntxtclr . ';
            --link-colors: ' . $lnkclr . ';
            --logo-width-px:'.$logowid.'px;
         }</style>';
    }
}
add_action( 'wp_head', 'WAWC_custom_checkout_css' );


add_action( 'admin_footer', 'WAWC_media_selector_print_scripts' );
function WAWC_media_selector_print_scripts() {

	$my_saved_attachment_post_id = get_option( 'WAWC_logo_selector', 0 );
	$my_saved_bump_attachment_post_id = get_option( 'WAWC_bump_image_selector', 0 );

	?>
	<script>
    jQuery(document).ready(function($) {
        $('#button-background-color').wpColorPicker();
        $('#button-text-color').wpColorPicker();
        $('#link-colors').wpColorPicker();
    });
    </script>
	<script type='text/javascript'>
	
    jQuery( document ).ready( function( $ ) {
        // Uploading files - script 1
        var file_frame1, wp_media_post_id1 = wp.media.model.settings.post.id;
        var set_to_post_id1 = <?php echo intval($my_saved_bump_attachment_post_id); ?>;

        // Uploading files - script 2
        var file_frame2, wp_media_post_id2 = wp.media.model.settings.post.id;
        var set_to_post_id2 = <?php echo intval($my_saved_attachment_post_id); ?>;


        // Function for handling file upload
        function handleFileUpload(file_frame, set_to_post_id, previewElement, attachmentIdElement, wp_media_post_id) {
            event.preventDefault();

            if (file_frame) {
                file_frame.uploader.uploader.param('post_id', set_to_post_id);
                file_frame.open();
                return;
            } else {
                wp.media.model.settings.post.id = set_to_post_id;
            }

            file_frame = wp.media.frames.file_frame = wp.media({
                title: 'Select an image to upload',
                button: {
                    text: 'Use this image',
                },
                multiple: false
            });

            file_frame.on('select', function() {
                attachment = file_frame.state().get('selection').first().toJSON();
                $(previewElement).attr('src', attachment.url).css('width', 'auto');
                $(attachmentIdElement).val(attachment.id);
                wp.media.model.settings.post.id = wp_media_post_id;
            });

            file_frame.open();
        }

        // Attach events for file upload - script 1
        $('#upload_bump_image_button').on('click', function(event) {
            handleFileUpload(file_frame1, set_to_post_id1, '#bump_image-preview', '#bump_image_attachment_id', wp_media_post_id1);
        });

        // Attach events for file upload - script 2
        $('#upload_image_button').on('click', function(event) {
            handleFileUpload(file_frame2, set_to_post_id2, '#image-preview', '#image_attachment_id', wp_media_post_id2);
        });

        // Restore the main ID when the add media button is pressed
        $('a.add_media').on('click', function() {
            wp.media.model.settings.post.id = wp_media_post_id1; // Use any of the post IDs, they are the same
        });
    });
</script>
	<script>
    // use jQuery to add or remove rows
    	jQuery( document ).ready( function( $ ) {
        // get the template row
        var template = $('#repeater-field .row:first').clone();

        // add a new row when the add button is clicked
        $('#add').click(function() {
            // clone the template and append it to the repeater field
            var row = template.clone();
            $('#repeater-field').append(row);
        });

        // remove a row when the remove button is clicked
        $('#repeater-field').on('click', '.remove', function() {
            // remove the parent row
            $(this).parent().remove();
        });
    });
</script>
<script>
	jQuery( document ).ready( function( $ ) {
	    var orderbump = document.querySelector("#wpbody-content > div.wrap.WAWC > form > div:nth-child(5) > div:nth-child(2) > select");
    if( orderbump.value!='none'){
        document.querySelector('.WAWC-inner').style.display='block';
    }
     orderbump.addEventListener('change',function(){
         if( orderbump.value!='none'){
        document.querySelector('.WAWC-inner').style.display='block';
    }else{
         document.querySelector('.WAWC-inner').style.display='none';
    }
     })
	})
</script>
	<?php

}


/***********************************************************************
 *                   PLUGIN MAIN                                    *
 * ***********************************************************************/

add_action('wp_loaded', 'WAWC_remove_default_woocommerce_order_review', 1);

function WAWC_remove_default_woocommerce_order_review() {
    remove_action('woocommerce_checkout_order_review', 'woocommerce_order_review', 10);
    remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
}


// Add a div before .woocommerce-form-login-toggle
add_action( 'woocommerce_before_checkout_form', 'WAWC_custom_div_before_login_toggle', 1 );
function WAWC_custom_div_before_login_toggle() {
    echo '<div class="custom-before-checkout-wrapper">';
}

// Custom function to output the opening div tag before the checkout form
add_action( 'woocommerce_before_checkout_form', 'WAWC_WAWC_start_custom_div_before_checkout', 5 );
function WAWC_WAWC_start_custom_div_before_checkout() {
  
    echo '<div class="custom-div-before-login-toggle">
    <div class="logoutloader"><span class="loader"></span></div>';
    
       
     if ($attachment_url = wp_get_attachment_url(get_option('WAWC_logo_selector'))) {
    echo '<div class="site-logo desktop"><a href="'.esc_url(home_url('/')).'"><img id="image-preview" alt="site logo" src="' . esc_url($attachment_url) . '" height="100"></a></div>';
}
    echo '<div class="multis-step step1">
    <span class="home"><a href="'.esc_url(home_url('/')).'">Home</a></span> >
    <span class="active">Login</span> >
    <span>Details</span> >
    <span>Payment</span>
</div>
<div class="multis-step step2 ">
    <span class="home"><a href="'.esc_url(home_url('/')).'">Home</a></span> >
    <span class="done">Login </span>> 
    <span class="active">Details</span>>
    <span>Payment</span>
</div>
<div class="multis-step step3">
    <span class="home"><a href="'.esc_url(home_url('/')).'">Home</a></span> >
    <span class="done">Login </span>> 
    <span class="done">Details</span>>
    <span class="active">Payment</span>
</div>';
// Get WooCommerce settings
$allow_orders_without_account = ('yes' === get_option( 'woocommerce_enable_guest_checkout' )) ? true : false;
$allow_login_during_checkout = ('yes' === get_option( 'woocommerce_enable_checkout_login_reminder' )) ? true : false;
$allow_account_creation_during_checkout = ('yes' === get_option( 'woocommerce_enable_signup_and_login_from_checkout' )) ? true : false;

if (!is_user_logged_in() && !$allow_orders_without_account && $allow_login_during_checkout && $allow_account_creation_during_checkout) {
    
  
echo do_shortcode('[woocommerce_my_account]');
}

    
  if (is_plugin_active('login-with-phone-number/login-with-phonenumber.php')) {
    echo '<div class="otp-login">' . do_shortcode('[idehweb_lwp]') . '</div>';
  }

   
}

function WAWC_start_custom_div() {
    
     $WAWC_page_names = get_option('WAWC_page_names', array());
    $WAWC_page_links = get_option('WAWC_page_links', array());

    if (!empty($WAWC_page_names)) {
        echo '<div class="policy-links">';
        foreach ($WAWC_page_names as $index => $WAWC_page_name) {
            $WAWC_page_link = isset($WAWC_page_links[$index]) ? esc_url($WAWC_page_links[$index]) : '#';
            echo '<a href="' . $WAWC_page_link . '">' . esc_html($WAWC_page_name) . '</a>';
        }
        echo '</div>';
    } 
    
    echo '</div>
    <div class="custom-order-review-coupon-wrapper">';
}

// Custom function to output the closing div tag
function WAWC_end_custom_div() {
    // Get the Order Bump Position value
$orderBumpPosition = get_option('WAWC_order_bump_position');
// Output different things based on the Order Bump Position
if ($orderBumpPosition === 'below_summary') {
    echo do_shortcode('[WAWC_order_bump]');
} 
    echo '</div>
    <div class="order-summary">Order Summary <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"/></svg>
    </div>';
    
    if ($attachment_url = wp_get_attachment_url(get_option('WAWC_logo_selector'))) {
    echo '<div class="site-logo mobile"><a href="'.esc_url(home_url('/')).'"><img id="image-preview" alt="site logo" src="' . esc_url($attachment_url) . '" height="100"></a></div>
    </div>';
    }
   
        
}

// Add the opening div tag before the order review
add_action( 'woocommerce_after_checkout_form', 'WAWC_start_custom_div', 15 );

// Add the order review after the checkout form
add_action( 'woocommerce_after_checkout_form', 'woocommerce_order_review', 20 );

// Add the coupon form after the order review
if (get_option('WAWC_remove_coupons') != 1) {
add_action( 'woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form', 30 );
}
// Add the closing div tag after the coupon form
add_action( 'woocommerce_after_checkout_form', 'WAWC_end_custom_div', 35 );



// Edit Order Summary
add_filter( 'woocommerce_cart_item_name', 'WAWC_add_product_image_and_remove_link_to_order_review', 10, 3 );
function WAWC_add_product_image_and_remove_link_to_order_review( $name, $cart_item, $cart_item_key ) {
    $thumbnail = $cart_item['data']->get_image();
    $quantity = sprintf('<strong class="product-quantity">%d</strong>', $cart_item['quantity']);
    $remove_link = sprintf(
        '<a href="%s" class="remove-item" title="%s">×</a>',
        esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
        __( 'Remove this item', 'woocommerce' )
    );

    // Get the product variation
    $variation = '';
    if (!empty($cart_item['variation'])) {
        foreach ($cart_item['variation'] as $attribute => $term_slug) {
            $taxonomy = str_replace('attribute_', '', $attribute);
            $term = get_term_by('slug', $term_slug, $taxonomy);
            $variation .= ' ' . $term->name;
        }
    }

    // Limit the product name to 40 characters
    if (strlen($name) > 40) {
        $name = substr($name, 0, 40) . '...';
    }

    // Append the variation to the product name
    $name .= $variation;

    return $thumbnail . ' ' . $name . ' ' . $quantity . ' ' . $remove_link;
}








// ADD share button in Thanks Page
add_action( 'woocommerce_thankyou', 'WAWC_thankyou_share_buttons', 10, 1 );
function WAWC_thankyou_share_buttons( $order_id ) {
    if ( ! $order_id ) return;

    
    $order = wc_get_order( $order_id );

   
    $order_url = $order->get_view_order_url();

   
    $whatsapp_url = 'https://api.whatsapp.com/send?text=' . urlencode( 'I have just purchased: ' . $order_url );
    $facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode( $order_url );
    $twitter_url = 'https://twitter.com/intent/tweet?url=' . urlencode( $order_url ) . '&text=' . urlencode( 'Check out my recent purchase!' );
    $print_url = 'javascript:window.print()';

   
    echo '<h2>Share Your Order:</h2><div class="share-buttons">';
    echo '<a href="' . esc_url( $whatsapp_url ) . '" target="_blank">Share on WhatsApp</a>';
    echo '<a href="' . esc_url( $facebook_url ) . '" target="_blank">Share on Facebook</a>';
    echo '<a href="' . esc_url( $twitter_url ) . '" target="_blank">Share on Twitter</a>';
    echo '<a onclick="window.print()" target="_blank">Print</a>';
    echo '</div>';
}
// Make Shipping Fields Options
add_filter( 'woocommerce_checkout_fields', 'WAWC_make_shipping_address_fields_required' );
function WAWC_make_shipping_address_fields_required( $fields ) {
    $fields['shipping']['shipping_first_name']['required'] = false;
    $fields['shipping']['shipping_last_name']['required'] = false;
    $fields['shipping']['shipping_company']['required'] = false;
    $fields['shipping']['shipping_country']['required'] = false;
    $fields['shipping']['shipping_address_1']['required'] = false;
    $fields['shipping']['shipping_address_2']['required'] = false;
    $fields['shipping']['shipping_city']['required'] = false;
    $fields['shipping']['shipping_state']['required'] = false;
    $fields['shipping']['shipping_postcode']['required'] = false;
    return $fields;
}

// Change the apply coupon button text on the cart and checkout page
function WAWC_woocommerce_button_text ($translation, $text, $domain) {
  if ($domain == 'woocommerce' && $text == 'Apply coupon') {
    return 'Apply'; // Replace 'Your New Button Text' with the desired text.
  }
  return $translation;
}
add_filter ('gettext', 'WAWC_woocommerce_button_text', 10, 3);

// Add placeholder in all fields
// Assign all labels as placeholders in WooCommerce checkout fields
function WAWC_labels_inside_checkout_fields ($fields) {
  foreach ($fields as $section => $section_fields) {
    foreach ($section_fields as $section_field => $section_field_settings) {
      $fields[$section] [$section_field] ['placeholder'] = $fields[$section] [$section_field] ['label'];
      $fields[$section] [$section_field] ['label'] = '';
    }
  }
  return $fields;
}
add_filter ('woocommerce_checkout_fields', 'WAWC_labels_inside_checkout_fields');



// Handle Logout request
function WAWC_handle_inline_ajax_logout() {
    check_ajax_referer('inline_logout_nonce', 'nonce');

 
    if (isset(WC()->session->cart)) {
        $cart = WC()->session->cart;
    }

  
    wp_logout();

   
    if (isset($cart)) {
        WC()->session->cart = $cart;
    }

  
    wp_send_json_success();
}
add_action('wp_ajax_inline_ajax_logout', 'WAWC_handle_inline_ajax_logout');
add_action('wp_ajax_nopriv_inline_ajax_logout', 'WAWC_handle_inline_ajax_logout');


add_action( 'wp_enqueue_scripts', 'WAWC_enqueue_checkout_css' );
function WAWC_enqueue_checkout_css() {
    $rand = rand(1, 9999);
    if ( is_checkout() || is_order_received_page() ) {
        wp_enqueue_style( 'checkout-css', plugins_url( '/assets/css/checkout-css.css', __FILE__ ) , array(), $rand, false);
     }
}

add_action('wp_head', 'WAWC_add_checkout_inline_styles');

add_action('wp_enqueue_scripts', 'WAWC_enqueue_checkout_scripts');
function WAWC_enqueue_checkout_scripts() {
 $rand = rand(1, 9999);
    if (is_checkout()) {
        // Enqueue Google Maps script without version parameter
         if ($WAWC_KEY = get_option('WAWC_map_api')) {
     wp_enqueue_script('google-map-scripts', '//maps.googleapis.com/maps/api/js?key='.$WAWC_KEY.'&libraries=places&callback=initAutocomplete', array(), null, false);

        // Enqueue other scripts without version parameter
        wp_enqueue_script('address-autocomplete', plugins_url('/assets/js/address-autocomplete.js', __FILE__), array(), null, true);
}
       
        wp_enqueue_script('checkout-scripts', plugins_url('/assets/js/checkout-scripts.js', __FILE__), array('jquery'), $rand, true);

        // Localize the checkout-scripts script
        wp_localize_script('checkout-scripts', 'myAjax', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('inline_logout_nonce')
        ));

        // Filter to add defer attribute to google-map-scripts
        add_filter('script_loader_tag', 'WAWC_add_defer_attribute', 10, 2);
    }
}

function WAWC_add_defer_attribute($tag, $handle) {
    // Add defer attribute to the specific script handle
    if ('google-map-scripts' === $handle) {
        $tag = str_replace(' src', ' defer="defer" src', $tag);
    }
    return $tag;
}





function WAWC_add_checkout_inline_styles() {
    if ( is_checkout() ) {
        $styles = '';
        $allow_guest_checkout = get_option('woocommerce_enable_guest_checkout');
        if ( is_user_logged_in() || $allow_guest_checkout === 'yes') {
            $styles .= '
            div#order_review{
                display:none;
            }
            .multis-step.step1{
                display:none;
            }
            .multis-step.step3,.back-step3{
                display:none;
            }';
        } else {
            $styles .= '
            .multis-step.step2,.multis-step.step3{
                display:none;
            }
            form.checkout.woocommerce-checkout{
                display:none!important;
            }';
        }
        if( $allow_guest_checkout === 'yes'){
            $styles .= '
            button.back-step2 {
                pointer-events: none;
                opacity: 0;
            }';
        }
        echo '<style>' . $styles . '</style>';
    } else {
        echo '
        <style>
        .cpops-cart-item__product--link img {
            display: none;
        }
        td.product-name img {
            display: none!important;
        }
        </style>';
    }
}




add_filter( 'page_template', 'WAWC_page_template' );
function WAWC_page_template( $page_template )
{
    if ( is_checkout() ) {
        $page_template = dirname( __FILE__ ) . '/includes/custom-checkout-template.php';
    }
    return $page_template;
}



function WAWC_remove_additional_fields($fields) {
    // You can unset other specific fields if needed
    if (get_option('WAWC_remove_company') == 1) {
        
        unset($fields['billing']['billing_company']);
    }
    if (get_option('WAWC_remove_address2') == 1) {
         unset($fields['billing']['billing_address_2']);
    }
    if (get_option('WAWC_remove_phone') == 1) {
         unset($fields['billing']['billing_phone']);
    }
  
     
    

    return $fields;
}
add_filter('woocommerce_checkout_fields', 'WAWC_remove_additional_fields');





// Remove order notes
function WAWC_remove_order_notes($fields) {
     if (get_option('WAWC_remove_additional_field') == 1) {
    unset($fields['order']['order_comments']);
    
     }
    return $fields;
}
add_filter('woocommerce_checkout_fields', 'WAWC_remove_order_notes');


add_action('woocommerce_before_checkout_form', 'WAWC_remove_checkout_login_form', 4);
function WAWC_remove_checkout_login_form() {
    remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10);
}

}
//////////////////////
// Display the checkbox - Step 1
 function WAWC_content_above_checkout_review_order() {
    // Get the Order Bump Position value
$orderBumpPosition = get_option('WAWC_order_bump_position');

// Output different things based on the Order Bump Position
if ($orderBumpPosition === 'above_payment') {
     echo do_shortcode('[WAWC_order_bump]');
} 
}

add_action('woocommerce_review_order_before_payment', 'WAWC_content_above_checkout_review_order');
function one_time_offer_shortcode() {
   $orderBumpTitle = get_option('WAWC_order_bump_title');
$orderBumpDescription = get_option('WAWC_order_bump_description');
$bumpImageAttachmentId = get_option('WAWC_bump_image_selector');
    ob_start();
    echo '<div id="WAWV-order-bump">';
    woocommerce_form_field('one_time_offer', array(
        'type' => 'checkbox',
        'class' => array('input-checkbox'),
        'label' => $orderBumpTitle,
    ), WC()->checkout->get_value('one_time_offer'));
    echo '<div class="bump-details"><div class="bump-img" style="background-image:url('.wp_get_attachment_url($bumpImageAttachmentId).')"></div><div class="bump-desc">'.$orderBumpDescription.'</div></div>';
    echo '</div>';
    return ob_get_clean();
}
add_shortcode('WAWC_order_bump', 'one_time_offer_shortcode');


// Add the new field to order totals - Step 3
add_action('woocommerce_cart_calculate_fees', 'add_one_time_offer_fee');
function add_one_time_offer_fee() {
    $orderBumpPrice = get_option('WAWC_order_bump_price');
    if ( !WC()->cart->is_empty() && WC()->session->__isset('one_time_offer') ) {
        WC()->cart->add_fee('One Time Offer', $orderBumpPrice);
    }
}


// Update the session value when the checkbox is clicked - Step 4
// Update the session value when the checkbox is clicked - Step 4
add_action('wp_ajax_one_time_offer', 'update_one_time_offer_session');
add_action('wp_ajax_nopriv_one_time_offer', 'update_one_time_offer_session');
function update_one_time_offer_session() {
    if(isset($_POST['one_time_offer'])) {
        if($_POST['one_time_offer']) {
            WC()->session->set('one_time_offer', $_POST['one_time_offer']);
        } else {
            WC()->session->__unset('one_time_offer');
        }
    }
    echo json_encode( WC()->session->__isset('one_time_offer') );
    
}


