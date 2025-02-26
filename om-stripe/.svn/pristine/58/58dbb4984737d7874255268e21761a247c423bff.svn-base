<?php
/* Plugin Name: Om Stripe
 * Plugin URI: http://www.sanditsolution.com/
 * Description: Get donation through stripe
 * Version: 02.00.00
 * Author:Siddharth Singh
 * Author URI:http://www.sanditsolution.com/about.html
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */  global $om_stripe_db_version;
$om_stripe_db_version = "1.0";
function om_stripe_db_install() {
global $wpdb; global $om_stripe_db_version;
$charset_collate = $wpdb->get_charset_collate();
$table_name = $wpdb->prefix . "om_stripe";
$sql="CREATE TABLE $table_name (
`id` int(11) NOT NULL AUTO_INCREMENT,
`publishable_key` varchar(45) DEFAULT NULL,
`setApiKey` varchar(45) DEFAULT NULL,
PRIMARY KEY (`id`), UNIQUE KEY `id` (`id`)
)$charset_collate;";
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql ); add_option( "om_stripe_db_version", $om_stripe_db_version );}


function om_stripe_install_data() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'om_stripe';
	
	$wpdb->insert(
		$table_name,
		array(
			'publishable_key' => 'Your Publishable Key',
			'setApiKey' => 'Your API Key',
		)
	);
}

register_activation_hook( __FILE__, 'om_stripe_db_install' );
register_activation_hook( __FILE__, 'om_stripe_install_data' );

function om_stripe_db_uninstall() {
global $wpdb;
$table = $wpdb->prefix."om_stripe";
delete_option('om_stripe_db_version');
$wpdb->query("DROP TABLE IF EXISTS $table");
}register_deactivation_hook( __FILE__, 'om_stripe_db_uninstall' );


//Add action link start
add_filter( 'plugin_action_links', 'om_stripe_add_action_plugin', 10, 5 );
function om_stripe_add_action_plugin( $actions, $plugin_file ){
static $plugin; if(!isset($plugin))$plugin = plugin_basename(__FILE__);
if ($plugin == $plugin_file) {
$more_product = array('more product' => '<a href="http://www.sanditsolution.com/shops/">' . __('More Product', 'General') . '</a>');
$site_link = array('support' => '<a href="http://www.sanditsolution.com/contact.html" target="_blank">Support</a>');
$became_client = array('became client' => '<a href="http://doc.sanditsolution.com/register/" target="_blank">Became Client</a>');
$actions = array_merge($more_product, $actions);
$actions = array_merge($site_link, $actions);
$actions = array_merge($became_client, $actions);
}return $actions;}


include_once dirname( __FILE__ ) . '/html_container.php';
include_once dirname( __FILE__ ) . '/including_js_css.php';
if ( is_admin() ) :
require_once dirname( __FILE__ ) . '/admin-menu/admin_main_menu.php';
endif;

/*Ajax response result*/
add_action( 'wp_ajax_om_stripe_ajax', 'om_stripe_ajax_response' );
add_action( 'wp_ajax_nopriv_om_stripe_ajax', 'om_stripe_ajax_response' );
function om_stripe_ajax_response() {
require 'lib/Stripe.php';
if ($_POST) {
		$userData=(object) $_POST;
		$userDatas=$userData->POST;
			$Fname = $userDatas['Fname'];
			$Address1 = $userDatas['Address1'];
			$Phone_no = $userDatas['Phone_no'];
			$Email = $userDatas['Email'];
			$cardnum = $userDatas['cardnum'];
			$cvc = $userDatas['cvc'];
			$month = $userDatas['month'];
			$year = $userDatas['year'];
			$amount = $userDatas['amount'];
			$token =   $_POST['stripeToken'];
			$charges =$_POST['charges'];
			ob_start();?>
<table border="1" cellpadding="8" cellspacing="8" width="400" style="margin-left:auto; margin-right:auto;">
  <thead>
    <tr>
      <td colspan="2" bgcolor="#999999" style="color:#FFFFFF;"><h1>NEW USER MAKES A PAYMENT ON OBASEKISOLICITORS.COM</h1></td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th width="120">Name:</th>
      <td><?=ucfirst($Fname);?></td>
    </tr>
    <tr>
      <th width="120">Email:</th>
      <td><?=ucfirst($Email);?></td>
    </tr>
    <tr>
      <th width="120">Phone:</th>
      <td><?=ucfirst($Phone_no);?></td>
    </tr>
    <tr>
      <th width="120">Address:</th>
      <td><?=ucfirst($Address1);?></td>
    </tr>
    <tr>
      <th width="120">Card Num:</th>
      <td><?=ucfirst($cardnum);?></td>
    </tr>
    <tr>
      <th width="120">CVC:</th>
      <td><?=ucfirst($cvc);?></td>
    </tr>
    <tr>
      <th width="120">Expiration Month:</th>
      <td><?=$month;?></td>
    </tr>
    <tr>
      <th width="120">Expiration Year:</th>
      <td><?=$year;?></td>
    </tr>
    <tr>
      <th width="120">Donation Amount:</th>
      <td><?=$amount;?></td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="2" bgcolor="#999999" style="color:#FFFFFF;"><?="&copy; copyright 2015" ?></td>
    </tr>
  </tfoot>
</table>
<?php
$om_message = ob_get_clean();
$siteUrl=get_site_url();
$finalUrlValue=str_replace("http://","",$siteUrl);
$om_admin_email="info@obasekisolicitors.com";
//$om_admin_email = get_option( 'admin_email' );
$subject='[New User Pay On Your Website]';
$headers  = "From: ".$om_admin_email."\r\n";
$headers .= "Reply-To:".$om_admin_email."\r\n";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$finalUrlValue.' <'.$finalUrlValue.'>' . "\r\n";

wp_mail( $om_admin_email, $subject, $om_message, $headers);
$om_user_message = "Thanks for your payment, We will get back to you soon";
$om_user_subject='[New User Pay On Your Website]';
wp_mail( $Email, $om_user_subject, $om_user_message, $headers);

	global $wpdb;
	$table_name = $wpdb->prefix . "om_stripe";
	$om_stripe_key= $wpdb->get_row("SELECT * FROM `$table_name` WHERE  id=1");
			
  Stripe::setApiKey($om_stripe_key->setApiKey);
  $error = '';
  $success = '';
  try {
    if (!isset($_POST['stripeToken']))
      throw new Exception("The Stripe Token was not generated correctly");
	  
	  $customer =Stripe_Customer::create(array(
    "source" => $_POST['stripeToken'],
    "email" =>  $Email)
               );
	  
        Stripe_Charge::create(array("amount" => $charges,
                                "currency" => "usd",
                                "customer" => $customer->id));
								
    $success = 'Your payment was successful.';
	if(isset($success)){
		echo "Sucess";
		};
  }
  catch (Exception $e) {
    $error = $e->getMessage();
	echo $error;
  }}die();	} ?>
