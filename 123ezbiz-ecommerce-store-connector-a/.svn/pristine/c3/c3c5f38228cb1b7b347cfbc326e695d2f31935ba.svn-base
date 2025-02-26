<?php

/*
Plugin Name:  123EzBiz *REQUIRED* CONNECTOR A - DO NOT DELETE
Version: 1.0
Description: Makes Required Connections to Start a 123EzBiz Store.
Author: 123EzBiz.com Ecommerce Hosting
Author URI: https://www.123ez.biz/
License: https://www.123ez.biz/
License URI: https://www.123ez.biz/
Text Domain: 123EzBiz
*/





// If Control Panel Files Are Found Do Not Show Notice

$EBWPC_file = plugin_dir_url( __FILE__ ) . '../../../store/Secure/Admin/login.htm';
$EBWPC_file_headers = @get_headers(esc_url($EBWPC_file));



// If Control Panel Files Are Not Found Show Notice

if(!$EBWPC_file_headers || $EBWPC_file_headers[0] == 'HTTP/1.1 404 Not Found') {

function EBWPC_admin_notice_success() {
    global $pagenow;
    $EBWPC_admin_pages = [ 'admin.php', 'plugins.php' ];
    if ( in_array( $pagenow, $EBWPC_admin_pages ) ) {

 ?>




<style>

.carts {
  max-width: 1600px;
  margin: auto;
  display: flex;
  flex-flow: row wrap;
  Justfy-content: center;
  align-items: center;
}

.cart_column1 {
  padding: 0px;
  width: 245px;
}
.cart_column2 {
  padding: 0px;
  width: 65%;
  align-items: center;
}

.divTableCell {
  border: 0px solid #999999;
  margin: auto;
  text-align: center;
}

.divTableCell2 {
  border: 0px solid #999999;
  padding: 0px 0px 0px 10px;
  margin: auto;
  text-align: left;
  align-items: center;
}

</style>


<div class="notice notice-success is-dismissible">

<table cellspacing="0" cellpadding="0" width="100%" border="0">
    <tbody>
        <tr>
            <td valign="top" align="center" width="2%">&nbsp;
            </td>
            <td valign="top" align="left" width="98%">
            <p><span class="PageSubTitle">

            <table cellspacing="0" cellpadding="0" width="100%" align="center" border="0">
                <tbody>
                    <tr>
                      <td style="padding-bottom: 20px;"><big><big><big><b><em>Success: 123Ez.Biz WordPress Ecommerce Plugin Has Been Activated!</em><b></big></big></big></td>
                    </tr>
                    <tr>
                      <td style="padding-top: 20px;"><big><b>Sign up today and let 123EzBiz solve all the difficulties, logistics and complexity of running a professional ecommerce website, while you focus on running your business. With 123EzBiz you can quickly and easily add everything you need into WordPress to create a professional and powerful ecommerce business website!</b></big><br /><br /></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="carts">
                        <div class="cart_column1">
                        <div class="divTableCell"><a href="https://123ez.biz/secure/store/wp_NewSetup.cfm?CheckoutRedirect=yes" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/Truck3.gif'; ?>" valign="middle" border="0" style="height:100px; width:240px;" /></a></div>
                        </div>
                        <div class="cart_column2">
                        <div class="divTableCell2"><big><big><b><em><a href="https://123ez.biz/secure/store/wp_NewSetup.cfm?CheckoutRedirect=yes" target="_blank">Click Here to get Moving for Only $15.95 /month <br /><br />FREE Setup and FREE WordPress Hosting Included!</a></em><b></big></big></div>
                        </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding-top: 20px;"><big><b>123EzBiz for WordPress will allow you to seamlessly integrate powerful ecommerce funtionality into a WordPress website. 123EzBiz is a hosted ecommerce service that requires users to sign up and maintain an active account in order to utilize our plugin and ecommerce service. To help you get started we have put together an *Introductory Offer* that includes Free Setup, FREE WordPress hosting, plus access to test drive all 123EzBiz advanced features for 30 days. 123EzBiz plans start at only $15.95 /month for a professional ecommerce store, and you can change your plan at any time to meet the specific needs of your business model. With Basic, Advanced and Fully Loaded hosting plans and functionality, we can tailor a package that will fit your needs and take your online business website to the next level. 123EzBiz is an all-in-one ecommerce solution designed to be *Quick and Easy* to learn and use. There are hundreds of basic features and an extensive list of advanced features to choose from with many exclusive features that you will not find anywhere else.</b></big><br /><br /></td>
                    </tr>
                </tbody>
            </table>

            <table cellspacing="0" cellpadding="5" width="100%" align="center" border="0">
                <tbody>
                    <tr>
                        <td colspan="2"><big><big><b><em><a href="https://123ez.biz/index.cfm?demo1=yes" target="_blank"><img height="125" alt="" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/WP_Demo1_Animate1.gif'; ?>" valign="middle" style="border: 1px solid;"></a>&nbsp;&nbsp;<a href="https://123ez.biz/index.cfm?demo1=yes" target="_blank">Check Out the 123Ez.Biz Live Demo</a></em><b></big></big><br /><br /><br /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><big><big><b><em>Check Out the List of 123Ez.Biz Optional Advanced Features <a href="https://123ez.biz/secure/store/webdocs/AdvancedFeatures.cfm" target="_blank">Click Here</a></em><b></big></big><br /><br /><br /></td>
                    </tr>                    
                </tbody>
            </table>
            </span></p>
            </td>
        </tr>
    </tbody>
</table>
  
</div>



<?php

    }
}

add_action( 'admin_notices', 'EBWPC_admin_notice_success' );

}

?>