<?php
/* Plugin Name: eCaroBar Authorize.net
  Plugin URI: http://ecarobar.com/ec-authorize-net/
  Description: A plugin of Authorize.net by ecarobar.com
  Version: 0.3.3
  Author: Shahzeb Farooq
  Author URI: ecarobar.com
  License: GPLv2 or later
 * ToDo
 * 1. Images upload mechanism
 * 2. Get Images name through admin settings and use it from the plugin image directory
 * 3. test comment

 * Updates (To be tested)
 * 1. Updated Header text on receipt page through x_header_html_receipt 126 => Done
 * 2. Added invoice number in payment form
 * 3. Added in admin enable/disable invoice number field 
 * 4. Added div around form for styling id=ec_authorize_form_div and class=ec_authorize_form_div
 * 5. Updated the label for  transaction mode "live" is now "live (Production Environment)"
 * 
 */


class TPAuthorizeNet {

    var $pluginPath;
    var $pluginUrl;
    private $fp_timestamp  ;
    private $fp_sequence  ;
    private $button_image ;
    private $logo_url  ;
    
    private $api_login_id  = '';
    private $transaction_key  = '';
    private $placeholder_text  = 'Enter Your Amount Here';
    private $transaction_mode  = 'test';
    private $header_text  = '';
    private $auth_description  = '';
    private $default_amount  = '';
    //v 0.2 updates
    private $receipt_header_text  = 'THANK YOU FOR MAKING A PAYMENT';
    private $invoice_number  = 'Invoice Number';
    private $enable_invoice  = 'disable';
    //end v 0.2 updates
    private $error_code = array();


    public function __construct() {
        require_once 'anet_php_sdk/AuthorizeNet.php'; 
        $this->pluginPath = dirname(__FILE__);
        $this->fp_timestamp  = time();
        $this->fp_sequence  = 'ecarobar.com'.time();
        $this->button_image  = plugins_url('/images/payment-card-icon.png', __FILE__);
        $this->logo_url  = plugins_url('/images/Payment-Master-Card.ico', __FILE__);
    

        $this->pluginUrl = WP_PLUGIN_URL . '/ec-authorize-net';
        add_shortcode('authorize_net', array($this, 'shortcode_func'));
        add_filter('widget_text', 'do_shortcode');
        add_action('wp_enqueue_scripts', array($this, 'slider_load_scripts'));
        add_action('wp_head', array($this, 'pluginname_ajaxurl'));
        add_action('wp_ajax_nopriv_wp_tp_authorize_net_ajax', array($this, 'wp_tp_authorize_net_ajax'));
        add_action('wp_ajax_wp_tp_authorize_net_ajax', array($this, 'wp_tp_authorize_net_ajax'));
        add_action('admin_menu', array($this, 'ec_admin_menu_controller'));

    }

    public function pluginname_ajaxurl() {
        ?>
        <script type="text/javascript">
            var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
        </script>
        <?php
    }

    public function slider_load_scripts() {
        wp_enqueue_script('jquery');
        wp_register_script('ajax_submission', plugins_url('scripts/ajax_req.js', __FILE__), array("jquery"));
        wp_enqueue_script('ajax_submission');
    }

    public function get_auth_form_custom($param_arr) {
       extract($param_arr);
       $amount_type = 'hidden';
        $action_url = '';
        if ($custom_amount == true && $custom_amount != '') {
            $amount_type = 'text';
            $enable_invoice = ($enable_invoice=='' || $enable_invoice =='disable') ? 'hidden' : 'text';        
       

            return "<div id='ec_authorize_form_div' class='ec_authorize_form_div'><form id='ajaxform' method='post' action='{$action_url }'>
            <table border='0' style='border:none; width:135px;' >
                <tr><td><input type='{$amount_type}' id='amount_ajax' name='amount_ajax' placeholder='{$placeholder_text}'  style='width:95%;' /></td></tr>
                <tr><td><input type='{$enable_invoice}' id='invoice_ajax' name='invoice_ajax' placeholder='{$invoice_number}'  style='width:95%;' /></td></tr>
                <tr><td><input type = 'image' id='image_submit_auth_ajax' src ='{$button_image}' /></td></tr>
            </table>
        </form></div><div id='auth_form_div'></div>";
        } else {
            $this->get_auth_form($param_arr);
        }
    }

    public function get_auth_form($param_arr) {
       extract($param_arr);
       $fingerprint = AuthorizeNetSIM_Form::getFingerprint($api_login_id, $transaction_key, $amount, $fp_sequence, $fp_timestamp);
        $header = "<h1>".$header_text."</h1>";
        if ($transaction_mode == 'test') {
            $action_url = 'https://test.authorize.net/gateway/transact.dll';
            $test_mode = 'true';
        }
        else {
            $action_url = 'https://secure.authorize.net/gateway/transact.dll';
            $test_mode = 'false';
        }
        //v 0.2 updated x_header_html_receipt to have receipt_header_text and include invoice number
        $enable_invoice = ($enable_invoice=='' || $enable_invoice =='disable') ? 'hidden' : 'text';        

        return "<div id='ec_authorize_form_div' class='ec_authorize_form_div'>"
        . "<form name='auth_form' id='auth_form' method='post' action='{$action_url}'>
            <input type='hidden' name='x_login' value='" . $api_login_id . "' />
            <input type='hidden' name='x_fp_hash' value='" . $fingerprint . "' />
            <input type='hidden' name='x_amount' value='" . $amount . "' />
            <input type='hidden' name='x_fp_timestamp' value='" . $fp_timestamp . "' />
            <input type='hidden' name='x_fp_sequence' value='" . $fp_sequence . "' />
            <input type='hidden' name='x_version' value='3.1'>
            <INPUT TYPE='hidden' NAME='x_description' VALUE='{$auth_description}'>
            <input type='hidden' name='x_show_form' value='payment_form'>
            <input type='hidden' name='x_test_request' value='false' />
            <input type='hidden' name='x_method' value='cc'>
            <input type='hidden' name='x_header_html_payment_form' value='{$header}' />  
            <input type='hidden' name='x_logo_url' value='{$logo_url}' />  
            <input type='hidden' name='x_receipt_link_method' value='{$logo_url}' />  
            <input type='hidden' name='x_header_html_receipt' value='{$receipt_header_text}' />  
            <input type='hidden' name='x_test_request' value='{$test_mode}' />
            <input type='{$enable_invoice}' name='x_invoice_num' placeholder='{$invoice_number}' value='{$invoice_number}' />
            <input type = 'image' src ='{$button_image}' /> 
        </form></div>";
    }

    public function shortcode_func($atts, $content = null) {
       extract(shortcode_atts( array('amount' => '','custom_amount' => false, 'invoice_number' => $invoice_number), $atts));
       $auth_param =  array();
       $auth_param['api_login_id'] = (get_option('api_login_id')=='') ? $this->api_login_id : get_option('api_login_id');
       $auth_param['transaction_key'] = (get_option('transaction_key')=='') ? $this->transaction_key : get_option('transaction_key');
       if(empty($auth_param['api_login_id']) || $auth_param['api_login_id']=='')  $this->error_code[] = 1;
       if(empty($auth_param['transaction_key']) || $auth_param['transaction_key']=='') $this->error_code[] = 2;
       $auth_param['fp_timestamp'] = time();
       $auth_param['fp_sequence'] = "123" . time();
       $auth_param['custom_amount'] = $custom_amount;
       $auth_param['button_image'] = (get_option('button_image')=='') ? $this->button_image : get_option('button_image');
       $auth_param['placeholder_text'] = (get_option('placeholder_text')=='') ? $this->placeholder_text : get_option('placeholder_text');
       $auth_param['transaction_mode'] = (get_option('transaction_mode')=='') ? $this->transaction_mode : get_option('transaction_mode');        
       //Added in v 0.2
       $auth_param['receipt_header_text'] = (get_option('receipt_header_text')=='') ? $this->receipt_header_text: get_option('receipt_header_text');        
       $auth_param['invoice_number'] = ($invoice_number != '') ? $invoice_number : $this->invoice_number;        
       $auth_param['enable_invoice'] = (get_option('enable_invoice')=='') ? $this->enable_invoice : get_option('enable_invoice');        
       
       $auth_param['header_text'] = (get_option('header_text')=='') ? $this->header_text : get_option('header_text');
       if(empty($auth_param['header_text']) || $auth_param['header_text']=='') $this->error_code[] = 4;

       $auth_param['logo_url'] = (get_option('logo_url')=='') ? $this->logo_url : get_option('logo_url');
       $auth_param['auth_description'] = (get_option('auth_description')=='') ? $this->auth_description : get_option('auth_description');
       if(empty($auth_param['auth_description']) || $auth_param['auth_description']=='') $this->error_code[] = 5;
       
       $auth_param['default_amount'] = (get_option('default_amount')=='') ? $this->default_amount : get_option('default_amount');
       $auth_param['amount'] = ($amount=='') ? $auth_param['default_amount'] : $amount;
            
       if(empty($auth_param['default_amount']) || $auth_param['default_amount']=='' || $auth_param['default_amount'] < 1 ){
           $this->error_code[] = 3;
       }
       
       if(sizeof($this->error_code)>0){
           return $this->get_error();
       }
       if ($custom_amount == true){
           return $this->get_auth_form_custom($auth_param);
       }else{           
           return $this->get_auth_form($auth_param);
       }
    }
    
    public function get_error() {
        $message= "<h3 style='color:red;'>Please Update the followings to get your Authorize.net button/form</h3>";
        foreach ($this->error_code as $key => $value) {
            switch ($value) {
                case 1:
                    $message .= "<span>Please Provide <strong>API Login ID</strong> in Admin settings</span>";
                    break;
                case 2:
                    $message .= "<span>Please Provide <strong>Transaction Key</strong> in Admin settings</span>";
                    break;
                case 3:
                    $message .= "<span>Please Provide <strong>Default Amount</strong> in Admin settings</span>";
                    break;
                case 4:
                    $message .= "<span>Please Provide <strong>Header Text</strong> in Admin settings</span>";
                    break;
                case 5:
                    $message .= "<span>Please Provide <strong>Description</strong> in Admin settings</span>";
                    break;

                default:
                    break;
            }
            $message .= "<br />";
        }
        
        return $message;
    }

    public function wp_tp_authorize_net_ajax() {
        if (isset($_REQUEST)) {
            $auth_param['default_amount'] = (get_option('default_amount')=='') ? $this->default_amount : get_option('default_amount');
            $amount = ($_REQUEST['custom_amount']=='' || $_REQUEST['custom_amount'] < 1) ? $auth_param['default_amount'] : $_REQUEST['custom_amount'];
            $invoice_number = ($_REQUEST['invoice_ajax']=='' || count($_REQUEST['invoice_ajax']) < 1) ? $auth_param['invoice_ajax'] : $_REQUEST['invoice_ajax'];
           
            $TPAuthorizeNetObj = new TPAuthorizeNet;
            echo $TPAuthorizeNetObj->shortcode_func(array('custom_amount' => false, 'amount' => $amount, 'invoice_number' => $invoice_number));
        }
        die();
    }
    
function ec_admin_menu_controller() {
    add_menu_page('EC Authorize.net', 'EC Authorize.net', 'administrator', 'ec-authorize-net', array(&$this,'ecAuthorizenet_crossSite_settings_page'), 'dashicons-cart');
    add_submenu_page( 'ec-authorize-net', 'Recurring Subscription', 'Recurring Subscription','administrator',  'ec-subscriber-list', array(&$this,'my_render_list_page'));
    //add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    //add_menu_page('EC Authorize.net', 'EC Authorize.net', 'administrator', 'ec-authorize-net', array(&$this,'ecAuthorizenet_crossSite_settings_page'), 'dashicons-cart');
    //add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function = '' );
    
    //$hook1 = add_menu_page('EC List', 'EC Subscriptions', 'activate_plugins', 'ec-subscriber-list', 'my_render_list_page');
    //add_action("load-$hook1", 'add_options');
    add_action('admin_init', array(&$this,'register_mysettings'));
}

function my_render_list_page() {
    global $subListTable;
    echo '<div class="wrap"><h2>Recurring Subscribers list</h2></div>';
    echo '<div class="wrap"><h2>Pro Version Only</h2><br /> To get Recurring Payments and other features please send and email to info@ecarobar.com OR visit <a href="http://ecarobar.com/ec-authorize-net/" target="_blank" >Support</a></div>';
    
}

function register_mysettings() {
    register_setting('ecAuthorizenet-settings-group', 'header_text');
    register_setting('ecAuthorizenet-settings-group', 'logo_url');
    register_setting('ecAuthorizenet-settings-group', 'api_login_id');
    register_setting('ecAuthorizenet-settings-group', 'transaction_key');
    register_setting('ecAuthorizenet-settings-group', 'auth_description');
    register_setting('ecAuthorizenet-settings-group', 'button_image');
    register_setting('ecAuthorizenet-settings-group', 'default_amount');
    register_setting('ecAuthorizenet-settings-group', 'placeholder_text');
    register_setting('ecAuthorizenet-settings-group', 'transaction_mode');
    //Added in v 0.2          
    register_setting('ecAuthorizenet-settings-group', 'receipt_header_text');
    register_setting('ecAuthorizenet-settings-group', 'enable_invoice');
    //end Added in v 0.2
}

function ecAuthorizenet_crossSite_settings_page() {
    ?>
    <div class="wrap">
        <h2>EC Authorize.net Settings</h2>

        <form method="post" action="options.php">
            <?php settings_fields('ecAuthorizenet-settings-group'); ?>
            <?php do_settings_sections('ecAuthorizenet-settings-group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Header Text (displayed on top of the payment page)</th>
                    <td><input type="text" name="header_text" value="<?php echo get_option('header_text'); ?>" /></td>
                </tr>

                <tr valign="top">
                    <th scope="row">Logo URL</th>
                    <td><input type="text" name="logo_url" value="<?php echo get_option('logo_url'); ?>" /></td>
                </tr>

                <tr valign="top">
                    <th scope="row">API Login ID</th>
                    <td><input type="text" name="api_login_id" value="<?php echo get_option('api_login_id'); ?>" /></td>
                </tr>

                <tr valign="top">
                    <th scope="row">Transaction Key</th>
                    <td><input type="text" name="transaction_key" value="<?php echo get_option('transaction_key'); ?>" /></td>
                </tr>

                <tr valign="top">
                    <th scope="row">Description To be displayed on payment page</th>
                    <td><input type="text" name="auth_description" value="<?php echo get_option('auth_description'); ?>" /></td>
                </tr>
                <!--Added in v 0.2-->
                <tr valign="top">
                    <th scope="row">Header Text To be displayed on Receipt page</th>
                    <td><input type="text" name="receipt_header_text" value="<?php echo get_option('receipt_header_text'); ?>" /></td>
                </tr>
                <!--end Added in v 0.2-->
                
                <tr valign="top">
                    <th scope="row">Submit Button Image</th>
                    <td><input type="text" name="button_image" value="<?php echo get_option('button_image'); ?>" /></td>
                </tr>
                
                <tr valign="top">
                    <th scope="row">Default Amount</th>
                    <td><input type="text" name="default_amount" value="<?php echo get_option('default_amount'); ?>" /></td>
                </tr>
                
                <tr valign="top">
                    <th scope="row">Placeholder Text like "Enter your amount here"</th>
                    <td><input type="text" name="placeholder_text" value="<?php echo get_option('placeholder_text'); ?>" /></td>
                </tr>
                
                <tr valign="top">
                    <th scope="row">Transaction Mode</th>
                    <?php 
                        $live_checked = $test_checked  = '';
                        $live_checked = (get_option('transaction_mode')=='live') ? 'checked="checked"' : '';
                        $test_checked = (get_option('transaction_mode')=='test') ? 'checked="checked"' : '';
                         
                    ?>
                    <td><input type="radio" name="transaction_mode" value="live" <?php echo $live_checked;?> >live (Production Environment)<br><input type="radio" name="transaction_mode" value="test" <?php echo $test_checked;?>>test</td>
                </tr>
                
                <tr valign="top">
                    <th scope="row">Enable Invoice Field</th>
                    <?php 
                        $enable_invoice_checked = $disable_invoice_checked  = '';
                        $enable_invoice_checked = (get_option('enable_invoice')=='enable') ? 'checked="checked"' : '';
                        $disable_invoice_checked = (get_option('enable_invoice')=='disable') ? 'checked="checked"' : '';
                         
                    ?>
                    <td><input type="radio" name="enable_invoice" value="enable" <?php echo $enable_invoice_checked;?> >enable<br><input type="radio" name="enable_invoice" value="disable" <?php echo $disable_invoice_checked;?>>disable</td>
                </tr>
                
                
                        
            </table>

            <?php submit_button(); ?>

        </form>
    </div>
<?php }


}

function wp_tp_authorize_net($amount, $api_login_id, $transaction_key, $fp_timestamp, $fp_sequence) {
    $TPAuthorizeNetObj = new TPAuthorizeNet;
    return $TPAuthorizeNetObj->get_auth_form($amount, $api_login_id, $transaction_key, $fp_timestamp, $fp_sequence);
}

$TPAuthorizeNetObj = new TPAuthorizeNet;

/* * ***********************************************************************************************************
 * * End Classy things
  /************************************************************************************************************ */
?>