<?php

/*
Plugin Name: Zoho Billing
Plugin URI: https://www.zoho.com/billing/help/settings/integrations/wordpress-integration.html
Description: Embed payment forms on your WordPress pages/posts without any coding.
Version: 4.0
Author:Zoho Subscriptions
Author URI: https://billing.zoho.com
*/

function zsplugin_script() {
  //To load the Zoho Billing's CSS
  wp_enqueue_style( 'zohobilling_style', plugin_dir_url( __FILE__ ) . '/assets/css/zoho-subscriptions.css', false, '1.0.0' );
}

function zs_register_my_custom_menu_page() {
  //To show the Zoho Billing icon in the left side
  add_menu_page( 'Zoho Billing', 'Zoho Billing', 'manage_options', 'zoho-billing-settings', 'zs_init_home', plugins_url('assets/images/favicon.ico',__FILE__), 91 );
}

function zs_init_home() {
$zs_api_key = get_option('zs_api_key');
$domain = 'zoho.com';
$org_digest = '';

//zs_api_key option value consists of Domain(DC) and Organization digest
if($zs_api_key !=''){
  $domain = $zs_api_key['zs_domain'];
  $org_digest =  $zs_api_key['zs_org_digest'];
}

?>


<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
      <style type="text/css">

        #wpcontent{
          background-color: #E9EEF2!important;
        }

        #wpbody-content{
          background-color: #E9EEF2!important;
        }

        #wpfooter{
          background-color: #E9EEF2!important;
        }
    </style>

<script>

function showErrorMessage(message){
    jQuery("#error_container").html(message);
    jQuery("#failure_msg").css("display","block");
    }

jQuery(function () {
    jQuery('#submit').on('click', function (e) {
    e.preventDefault();
    jQuery("#failure_msg").css("display","none");

    var orgdigest = document.getElementById("orgdigest").value;
    if(orgdigest =="" || orgdigest==undefined){
      showErrorMessage("Please enter the Connector Key");
      return;
    }

    jQuery("#submit_loading").css("display","inline-block");
    jQuery.ajax({
    type: 'post',
    url: 'options.php',
    data: jQuery('form').serialize(),
    success: function () {
    jQuery("#submit_loading").css("display","none");
    jQuery('#status_msg').slideDown('slow').delay(1500).fadeOut('slow');
    }
    });
});


  });
  </script>

        </head>
        <body >
          <div id="status_msg" align="center" style="display:none">
            <div>Organization details updated successfully.</div>
          </div>
            <form method="post" action="options.php">
               <?php settings_fields( 'zs_settings_group' ); ?>
               <?php do_settings_sections( 'zs_settings_group' ); ?>
              <input type="hidden" name="zs_action" id="zs_action"/>
                <div class="zswelcomepanouter" id="api_key_div">
                    <div class="zswelcomepan">

                        <div class="zswelheading" style="margin-top: 20px;text-align:center;">
                          Zoho Billing Organization Details
                        </div>
                      <div id="failure_msg" style="display:none;">
                          <div id="error_container"></div>
                      </div>
                        <div style="margin-top:40px;padding-left:40px;">
                            <table width="100%" border="0" cellspacing="10" cellpadding="0" style="font-size:14px!important">
                            <tr>
                                  <td height="75" width="75%">
                                    <div class="label">
                                      Select Domain<span style="font-size: 12px">  (The domain from which you access Zoho Billing) </span>
                                    </div>
                                    <select name="zs_api_key[zs_domain]">
                                      <option value="zoho.com" <?php if($domain == 'zoho.com'){ echo esc_html__("selected");} ?> >zoho.com</option>
                                      <option value="zoho.eu" <?php if($domain == 'zoho.eu'){ echo esc_html__("selected");} ?>>zoho.eu</option>
                                      <option value="zoho.in" <?php if($domain == 'zoho.in'){ echo esc_html__("selected");} ?>>zoho.in</option>
                                      <option value="zoho.com.au" <?php if($domain == 'zoho.com.au'){ echo esc_html__("selected");} ?>>zoho.com.au</option>
                                      <option value="zoho.com.cn" <?php if($domain == 'zoho.com.cn'){ echo esc_html__("selected");} ?>>zoho.com.cn</option>
                                      <option value="zoho.jp" <?php if($domain == 'zoho.jp'){ echo esc_html__("selected");} ?>>zoho.jp</option>
                                      <option value="zohocloud.ca" <?php if($domain == 'zohocloud.ca'){ echo esc_html__("selected");} ?>>zohocloud.ca</option>
                                      <option value="zoho.sa" <?php if($domain == 'zoho.sa'){ echo esc_html__("selected");} ?>>zoho.sa</option>
                                    </select>
                                  </td>
                                </tr>
                                <tr>

                                    <td height="45" width="70%">
                                      <div class="label">Enter Connector Key</div>
                                      <input type="password" id="orgdigest" name="zs_api_key[zs_org_digest]" value="<?php echo $org_digest ?>" style="font-size:14px!important;padding:10px;height:40px;width:100%"/>
                                      <div class="zslink" style="padding-top:5px;font-size:12px;font-style:italic;">
                                        You can find your domain and the Connector Key by going to Zoho Billing -> Settings -> Integrations & Marketplace -> Other Apps -> WordPress Integration. 
                                        <a class="zssmallink" style="text-decoration:none;" href="https://www.zoho.com/billing/help/settings/integrations/wordpress-integration.html" id="help_link" target="_blank">
                                          Learn more.
                                        </a>
                                      </div>

                                    </td>
                                    <td>

                                    </td>
                                </tr>

                              <tr><td>
                              <div style="margin-top:15px;">
                                <button id="submit" class="button button-primary" style="box-shadow:none;margin-top: 10px;width: 105px;height: 35px;font-weight: 600;font-size: 15px;border-radius:2px;background-color:#168BCC">
                                  <div style="padding-left:20px;display:none" id="submit_loading"><img  src="<?php echo plugins_url('assets/images/ajax-loader.gif',__FILE__); ?>" style="height:20px;margin:-15px 0 0 -25px;position:absolute"/></div> Save
                                </button>
                              </div>
                              </td></tr>
                            </table>
                        </div>
                        <br />
                    </div>
                </div>


            </form>
            <br/>
        </body>
    </html>
<?php
}
// Adding filters for the external plugins.

function zs_plugin_initial_tasks() {

     //Creating the option:  zs_api_key contains - domain(DC), org digest
     register_setting( 'zs_settings_group', 'zs_api_key' );
}

function zoho_billing_deactivate(){
  delete_option('zs_api_key');
}

/*
  Wordpress 5.0 uses Gutenberg Editor. So it won't be able to add button to the toolbar like before.
  The shortcode option allows user to embed the payment page with the help of shortcode.
  Adding the short code `[zs plan_code="TRIAL"]` will embed the page.
*/

function zs_embed_hosted_page($attr = array(), $content = null ) {

  $zs_api_key = get_option('zs_api_key');
  $domain = $zs_api_key['zs_domain'];
  $cur_dir = plugins_url('',__FILE__);
  $scriptSrc = $cur_dir . '/assets/js/zs-height-custom.js';
  $scriptUrl = '<script type="text/javascript" src=' . $scriptSrc . '></script>';

  if (isset($attr['plan_code'])) {
    $plan_code = esc_attr( $attr['plan_code'] );
  }
  else {
    return 'plan_code is not provided.';
  }

  if (isset($attr['width'])) {
    $width = esc_attr( $attr['width'] );
  }
  else {
    $width = '700px';
  }

  if ( $domain === 'zoho.in' ) {
    $base_url = 'https://billing.zoho.in/subscribe/';
  } else if ( $domain === 'zoho.eu' ) {
    $base_url = 'https://billing.zoho.eu/subscribe/';
  } else if ( $domain === 'zoho.com.au') {
    $base_url = 'https://billing.zoho.com.au/subscribe/';
  } else if ( $domain === 'zoho.com.cn') {
    $base_url = 'https://billing.zoho.com.cn/subscribe/';
  } else if ( $domain === 'zoho.jp') {
    $base_url = 'https://billing.zoho.jp/subscribe/';
  } else if ( $domain === 'zoho.sa') {
    $base_url = 'https://billing.zoho.sa/subscribe/';
  } else if ( $domain === 'zohocloud.ca') {
    $base_url = 'https://billing.zohocloud.ca/subscribe/';
  } else {
    $base_url = 'https://billing.zoho.com/subscribe/';
  }

  if($zs_api_key !='') {
    $org_digest =  $zs_api_key['zs_org_digest'];
    $iframeSrc =  $base_url . $org_digest . '/' . $plan_code;
    $iframeCode = '<iframe src="' .$iframeSrc . '" width=' . $width . ' height="900" id="ZBilling" style="border:none;"></iframe>';
    return $iframeCode . $scriptUrl;
  }
  return 'Zoho Billing plugin is not properly configured. Please uninstall and configure the plugin again.';
}

    add_action( 'admin_init', 'zs_plugin_initial_tasks' );
    add_action( 'admin_menu', 'zs_register_my_custom_menu_page' );
    add_action( 'admin_enqueue_scripts', 'zsplugin_script' );
    /* Short Code - Wordpress 5.0 */
    add_shortcode( 'zoho_checkout', 'zs_embed_hosted_page' );
    add_shortcode( 'zs', 'zs_embed_hosted_page' );

    register_deactivation_hook( __FILE__, 'zoho_billing_deactivate' );
?>
