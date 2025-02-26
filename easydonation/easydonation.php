<?php
/*
Plugin Name: EasyDonation
Plugin URI: http://www.ejump.co.uk/
Description: PayPal Donation Management plugin
Version: 1.0
Author: Paul Bain
Author URI: http://www.paulbain.co.uk
*/




$activateFunction = 'easydonation_install'; // change this;
add_action( 'activate_' . preg_replace( '/.*wp-content.plugins./','',__FILE__ ), $activateFunction ); 
add_action('admin_menu', 'easydonation_add_admin');
add_filter('the_content','easydonation_content');


function easydonation_add_admin()
{
	add_management_page('EasyDonation Management', 'EasyDonation', 8, 'easydonationmanage', 'easydonation_manage_page');
}


function easydonation_content($content)
{
	global $wpdb;
	
    $regex = '[donation]';
	$code = stripslashes(get_option('easydonation_code'));
	$content = str_replace($regex, $code, $content);
    return $content;
}




function easydonation_manage_page() {

    if(isset($_POST['easydonation_code']))
    {
       update_option('easydonation_code', $_POST['easydonation_code']);
    }
	easydonation_preferences();
}

function easydonation_preferences()
{?>
	<div class="wrap"><h2>EasyDonation Preferences</h2>
		<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
		<table class="edit-form">
		<tr>
			<td>Set PayPal Code:</td>
			<td><textarea name="easydonation_code"><?php echo stripslashes(get_option('easydonation_code'));?></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Save"></td>
		</tr>
		</table>
		</form>
	</div>
<?}


/**
 * easydonation_install
 * Only used to install the database table.
 * 
 * @return void
 */
function easydonation_install() {

      add_option('easydonation_code', '', 'Stores PayPal Adsense code', false);


}

?>