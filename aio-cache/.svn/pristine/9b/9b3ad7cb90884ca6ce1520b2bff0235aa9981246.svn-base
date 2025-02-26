<?php
  add_action('wp', 'phpch_headers' );
  add_action('admin_menu', 'phpch_setting');

  function phpch_headers() { 
		$expires = get_option( 'phpch_setting', 1800 );
		
		if ( $expires >= 0 ) {
			header("Pragma: public");
			header("Cache-Control: max-age=".$expires.", must-revalidate");
		} else {
			header("Pragma: no-cache");
			header("Cache-Control: max-age=".$expires.", no-cache");
		}
		
		header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$expires) . ' GMT');
  }

  function phpch_setting() {
    add_submenu_page('aio-cache-menu',__('PHP Expires Headers','aio-cache-phpexpheaders'), __('PHP Expires Headers','aio-cache-phpexpheaders'), 'manage_options', 'aio-cache-phpexpheaders', 'phpch_setting_page');
  }

  function phpch_setting_page() {
    global $opt_value;

	if (!current_user_can('manage_options')) 
		wp_die( __('You do not have sufficient permissions to access this page.') );
		
    $opt_value = get_option( 'phpch_setting', 1800 );

	if ( is_numeric($_POST['phpch_value']) ) {
        $opt_value = $_POST['phpch_value'];
        update_option( 'phpch_setting', $opt_value );
?>
<div class="updated"><p><strong><?php _e('Settings saved.', 'phpch-menu' ); ?></strong></p></div>
<?php
    } elseif ( isset($_POST['phpch_submit_hidden']) && $_POST['phpch_submit_hidden'] = 'Y' )  {
?>
<div class="updated"><p><strong><?php _e('Numeric values only!', 'phpch-menu' ); ?></strong></p></div>
<?php
	}

    echo '<div class="wrap">';
    echo '<div id="icon-options-general" class="icon32"></div><h2>AIO Cache: PHP Expires Headers</h2>';
    ?>
<h1><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ECVJZ2MJMJTB6&currency_code=USD">To donate, click here.</a></h1><br />
<form name="form1" method="post" action="">
<input type="hidden" name="phpch_submit_hidden" value="Y" />
<h2>
<label for="input1">Cache For </label>  
<input type="input" name="phpch_value" id="input1" value="<?php echo $opt_value; ?>" size="20" /> Seconds <br />
</h2>
<p>
Cache For 0 Seconds = No Cache
<br />
</p>
<h3 class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
</h3>

</form>
</div>

<?php
 
}   // end function phpch_setting_page()

?>