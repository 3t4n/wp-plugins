<?php
function om_stripe_admin_menu(){
 add_menu_page(
 'Om Stripe',//page title
 'Om Stripe Menu',//Stripe Menu Name 
 'manage_options',
 'om-stripe-page',
 'om_stripe_function',//calling function 
 plugins_url( '/../images/om_stripe.png', __FILE__),'3'); }	
add_action('admin_menu','om_stripe_admin_menu');

function om_stripe_function(){ 
global $wpdb;
$table_name = $wpdb->prefix . "om_stripe";
$om_stripe_key= $wpdb->get_row("SELECT * FROM `$table_name` WHERE  id=1");
if(isset($_GET['om_stripe_message'])){echo "<p>".urldecode($_GET['om_stripe_message'])."</p>";//sucess message
}?> 
<form id="omFormStart" method="post" action="admin-post.php">
<label class="omLable">Your Publishable Key:<span class="om_compalsari">*</span></label>
<input type="text"  name="publishable_key" value="<?=$om_stripe_key->publishable_key;?>" />
<label class="omLable">Your API Key:<span class="om_compalsari">*</span></label>
<input type="text"  name="setApiKey" value="<?=$om_stripe_key->setApiKey;?>" />
<input type="hidden" name="action" value="add_om_stripe">
<input type="hidden" name="data" value="om_stripe_id">
<input type="submit" name="submit" value="Submit" onclick="om_reply_submit()"/>
</form><?php  } 

add_action( 'admin_post_add_om_stripe', 'prefix_admin_add_om_stripe' );
function prefix_admin_add_om_stripe() {
    $publishable_key=$_POST['publishable_key'];
	$setApiKey=$_POST['setApiKey'];
	global $wpdb;
	$table_name = $wpdb->prefix . "om_stripe";
	$rows_updated=$wpdb->query("UPDATE `$table_name` SET `publishable_key` = '$publishable_key' , `setApiKey` = '$setApiKey'	WHERE  id=1");
	
	$message=urlencode("Thank for your update");
    wp_redirect(  admin_url("/admin.php?page=om-stripe-page&om_stripe_message=$message") );
   exit;
}
?>