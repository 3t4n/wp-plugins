<?php 
/**
 * @package  WooSearch
 * @developer  name : Joy Shaha
 */

/**
 * plugin url
 * @param  string  $path  file path
 * @return string
 * Feature added by : Joy Shaha <joysaha7302@gmail.com>
 * Date : 21.04.2020
*/
if ( ! function_exists( 'woos_plugin_url' ) ) {
	function woos_plugin_url( $path = '' ) {
	  $url = plugins_url( $path, WOOS_FILE );

	  if ( is_ssl()
	  and 'http:' == substr( $url, 0, 5 ) ) {
	    $url = 'https:' . substr( $url, 5 );
	  }
	  return $url;
	}
}
/**
 * Setting Page Hook
 * @return string
 * Feature added by : Joy Shaha <joysaha7302@gmail.com>
 * Date : 21.04.2020
*/
if ( ! function_exists( 'woos_admin_general_form' ) ) {
    function woos_admin_general_form() {
        ob_start();
        ?>
        <form id="woos_form" method="POST" action="<?php echo esc_attr( $_SERVER['REQUEST_URI'] ) ?>">
        <input type="hidden" id="security_woos" name="security" value="<?php echo wp_create_nonce( 'woos_setting_nonce' ); ?>"/>
         <?php 
            settings_errors();
            settings_fields( 'woos_setting_form_settings' );
            do_settings_sections( 'woos_setting_page' );
         ?>
         <button id="woos_save_setting" type="button" class="btn btn-info save-and-add-setting save_button save_setting"> <?php esc_html_e( 'Save Changes', 'wpdesign' ); ?></button>
        </form>
        <?php
        $output = ob_get_clean();
        echo $output;
    }
}
add_action( 'woos_admin_general', 'woos_admin_general_form', 10 );
/**
 * ShortCode
 * @return string
 * Feature added by : Joy Shaha <joysaha7302@gmail.com>
 * Date : 23.04.2020
*/
if ( ! function_exists( 'woos_admin_shortcode' ) ) {
    function woos_admin_shortcode() {
        ob_start();
        ?>
        <h4>Display Search Form</h4>
        <p>[woos_search_form]</p>
        <?php
        $output = ob_get_clean();
        echo $output;
    }
}
add_action( 'woos_admin_shortcode', 'woos_admin_shortcode', 10 );
if ( ! function_exists( 'woos_woo_search_support' ) ) {
function woos_woo_search_support(){
  ob_start();
    ?>
    <div class="woos-support-box">
      <h4>Support</h4>
          <ul class="woos-infobox-list-social">
              <li class="facebook"><a href="https://www.facebook.com/with.rain79" rel="nofollow" target="_blank" title="Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i>
      </a></li>
              <li class="skype"><a href="skype:abusayedrussell?chat" rel="nofollow" target="_blank" title="Skype"><i class="fa fa-skype" aria-hidden="true"></i>
      </a></li>
              <li class="linkedin"><a href="https://linkedin.com/in/rs-russell" rel="nofollow" target="_blank" title="Linkedin"><i class="fa fa-linkedin-square" aria-hidden="true"></i>
      </a></li>
              <li class="twitter"><a href="https://twitter.com/RSRUSSELL6" rel="nofollow" target="_blank" title="Twitter"><i class="fa fa-twitter-square" aria-hidden="true"></i>
      </a></li>
              <li><strong>Connect with us!</strong></li>
          </ul>
    </div>
  <?php
    $body = ob_get_clean();
    echo $body;
}
}
add_action( 'woos_woo_search_support', 'woos_woo_search_support', 50 );
/**
 * Donate
 * @return string
 * Feature added by : Joy Shaha <joysaha7302@gmail.com>
 * Date : 23.04.2020
*/
if ( ! function_exists( 'woos_admin_donate' ) ) {
    function woos_admin_donate() {
        ob_start();
        ?>
        <h4>Donate</h4>
        <div class="donate-option">
            <a href="https://www.paypal.me/donate786p" target="_blank"><img src="<?php echo WOOS_PLUGIN_IMAGE .'donate_payment_6.png';?>" alt="donate image"></a>
            <a href="https://www.paypal.me/donate786p" target="_blank"><img src="<?php echo WOOS_PLUGIN_IMAGE .'donate_payment_1.png';?>" alt="donate image"></a>
            <a href="https://www.paypal.me/donate786p" target="_blank"><img src="<?php echo WOOS_PLUGIN_IMAGE .'donate_payment_2.png';?>" alt="donate image"></a>
            <a href="https://www.paypal.me/donate786p" target="_blank"><img src="<?php echo WOOS_PLUGIN_IMAGE .'donate_payment_3.png';?>" alt="donate image"></a>
            <a href="https://www.paypal.me/donate786p" target="_blank"><img src="<?php echo WOOS_PLUGIN_IMAGE .'donate_payment_4.png';?>" alt="donate image"></a>
            <a href="https://www.paypal.me/donate786p" target="_blank"><img src="<?php echo WOOS_PLUGIN_IMAGE .'donate_payment_5.png';?>" alt="donate image"></a>
        </div>
        <?php
        $output = ob_get_clean();
        echo $output;
    }
}
add_action( 'woos_admin_donate', 'woos_admin_donate', 10 );