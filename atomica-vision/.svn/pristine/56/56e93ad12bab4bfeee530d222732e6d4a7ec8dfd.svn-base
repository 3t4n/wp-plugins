<?php defined( 'ABSPATH' ) || exit; 

function atomica_vision_get_admin(){

if (!class_exists( 'WooCommerce' )) {

    echo "Please install or activate Woocomerce plugin.";
    return; 
}

$atomica_vision_auth_token = get_option( 'atomica_vision_auth_token' );
$atomica_vision_try_on_button_text = get_option( 'atomica_vision_try_on_button_text' );
$atomica_vision_try_on_close_button_text = get_option( 'atomica_vision_try_on_close_button_text' );
?>

<h1>Atomica Vision</h1>

<form method="post" action="options.php">

    <?php settings_fields( 'atomica_vision_settings_update' ); ?>
    <?php do_settings_sections( 'atomica_vision_settings_update' ); ?>

    <table class="form-table">
        <tr valign="top">
            <th scope="row">Authorization token:</th>
            <td>
                <input class="regular-text" placeholder="1111222233334444AAAABBBBCCCCDDDD" type="text" name="atomica_vision_auth_token" value="<?php echo esc_attr($atomica_vision_auth_token); ?>"/>
                <p class="description" id="tagline-description">You can find it in your profile.   <a href="https://vision.atomicagroup.com/" target="_blank">https://vision.atomicagroup.com/</a></p>

            </td>
        </tr>   

        <tr valign="top">
            <th scope="row">Try on button text:</th>
            <td>
                <input class="regular-text" placeholder="Live try on" type="text" name="atomica_vision_try_on_button_text" value="<?php echo esc_attr($atomica_vision_try_on_button_text); ?>"/>
            </td>
        </tr>   

        <tr valign="top">
            <th scope="row">Close button text:</th>
            <td>
                <input class="regular-text" placeholder="Close" type="text" name="atomica_vision_try_on_close_button_text" value="<?php echo esc_attr($atomica_vision_try_on_close_button_text); ?>"/>
            </td>
        </tr>   

        <tr valign="top">
            <th scope="row">Try on button position:</th>
            <td>
                <select class="regular-text" name="atomica_vision_try_on_button_position">
                    <option <?php echo get_option( 'atomica_vision_try_on_button_position' ) === "woocommerce_before_add_to_cart_form" ? "selected" : "" ?> value="woocommerce_before_add_to_cart_form">Before add to card form</option>
                    <option <?php echo get_option( 'atomica_vision_try_on_button_position' ) === "woocommerce_after_add_to_cart_form" ? "selected" : "" ?>  value="woocommerce_after_add_to_cart_form">After add to card form</option>
                 </select>
    
            </td>
        </tr>   

        <tr valign="top">
            <th scope="row">Try on auto start:</th>
            <td>
                <select class="regular-text" name="atomica_vision_try_on_auto_start">
                    <option <?php echo get_option( 'atomica_vision_try_on_auto_start' ) === "true" ? "selected" : "" ?> value="true">Yes</option>
                    <option <?php echo get_option( 'atomica_vision_try_on_auto_start' ) === "false" ? "selected" : "" ?>  value="false">No</option>
                 </select>
    
            </td>
        </tr>   

    </table>

    <?php submit_button(); ?>
</form>

<?php } ?>