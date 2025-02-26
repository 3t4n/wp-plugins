<?php
   /*
   Plugin Name: Replace Howdy
   Plugin URI: http://www.odrasoft.com/plugins/remove-howdy
   Description: This plugin will replace "Howdy" with your custome text in the top right corner of your Wordpress dashboard.
   Version: 1.2
   Author: Swadesh Ranjan Swain
   Author URI: http://www.odrasoft.com
   License: GPL2
   */
   if (is_admin()) {
add_action('admin_menu', 'wp_custom_howdy');
function wp_custom_howdy() {
    add_options_page('Remove Howdy', 'Remove Howdy', 'manage_options',  basename(__FILE__), 'wp_remove_howdy_page');
}
function wp_remove_howdy_page() {
?>
<div class="wrap">
			<h3>Replace the "Howdy" Option</h3>
            <?php
    if ( isset($_POST['submit']) ) { 
        $nonce = $_REQUEST['_wpnonce'];
        if (! wp_verify_nonce($nonce, 'php-howdy-updatesettings' ) ) {
            die('security error');
        }
        $removehowdy = $_POST['removehowdy'];
		$removehowdytext = $_POST['removehowdytext'];
        update_option( 'od_removehowdy', $removehowdy );
		 update_option( 'od_removehowdytext', $removehowdytext );
    } 
    $od_removehowdy = get_option( 'od_removehowdy' );
	$od_removehowdytext = get_option( 'od_removehowdytext' );
	?>
			<form method="post" action="" id="php_config_page">
				<?php wp_nonce_field('php-howdy-updatesettings'); ?>
				<table class="form-table">
					<tbody>
                    <tr>
						<th><label>Allow to Remove Howdy Text </label></th>
						<td>
               <Input type = 'Radio' Name ='removehowdy' value= 'yes'
 <?php if ($od_removehowdy == 'yes') echo 'checked="checked"'; ?>>
Yes
<Input type = 'Radio' Name ='removehowdy' value= 'no'
 <?php if ($od_removehowdy == 'no') echo 'checked="checked"'; ?>>
No
                        </td>
                    </tr>
                    <tr>
						<th><label>Add Text On The Place of Howdy</label></th>
						<td>
                                         <Input type = 'text' Name ='removehowdytext' value= '<?php echo $od_removehowdytext ; ?>' />
                        </td>
                    </tr>
					</tbody>
				</table>
				<p class="submit"><input type="submit" value="Save Changes" class="button-primary" id="submit" name="submit" /></p>  
			</form>
		</div>
<?php
} // get_option('od_phpcontent');
} 
function replace_howdy( $wp_admin_top_bar ) {
    $wp_my_account=$wp_admin_top_bar->get_node('my-account');
	$howdytext = get_option('od_removehowdytext') ;
    $replacetitle = str_replace( 'Howdy', $howdytext, $wp_my_account->title );
    $wp_admin_top_bar->add_node( array(
        'id' => 'my-account',
        'title' => $replacetitle,
    ) );
}
if ( get_option('od_removehowdy') == 'yes') {add_filter( 'admin_bar_menu', 'replace_howdy',25 ); } ?> 