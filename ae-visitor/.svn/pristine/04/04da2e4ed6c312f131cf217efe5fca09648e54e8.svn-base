<?php
function ae_visitor_menu() {
	ae_add_menu_page();
	ae_add_submenu_page('AE Visitor Options', 'Visitor', 10, 'ae_visitor', 'ae_visitor_options');
}
function ae_visitor_options() {
	$ae_error_msg = '';
	if( isset($_POST['submit']) && $_POST['submit']=='Update Changes' ) {
		$ae_visitor_day			= (int)($_POST['ae_visitor_day']);
		$ae_visitor_yesterday	= (int)($_POST['ae_visitor_yesterday']);
		$ae_visitor_week		= (int)($_POST['ae_visitor_week']);
		$ae_visitor_month		= (int)($_POST['ae_visitor_month']);
		$ae_visitor_all			= (int)($_POST['ae_visitor_all']);
		
		update_option('ae_visitor_day', $ae_visitor_day);
		update_option('ae_visitor_yesterday', $ae_visitor_yesterday);
		update_option('ae_visitor_week', $ae_visitor_week);
		update_option('ae_visitor_month', $ae_visitor_month);
		update_option('ae_visitor_all', $ae_visitor_all);
		
		$ae_saved = true;
	}
?>
<div class="wrap">
  <div id="icon-options-general" class="icon32"><br /></div>
  <h2>AE Visitor Settings</h2>
<?php if( $ae_error_msg!='' ) { ?>
  <div id='setting-error-invalid_home' class='error settings-error'> 
    <p><strong>Error Info</strong></p>
  </div>
<?php } ?>
<?php if( $ae_saved ) { ?>
  <div id='setting-error-settings_updated' class='updated settings-error'> 
    <p><strong>Settings saved.</strong></p>
  </div>
<?php } ?>

  <!--<form method="post" action="options.php">-->
  <form method="post" >
    <h3>Main Settings</h3>
    <table class="form-table">
      <tr valign="top" style="background-color:#eee;">
        <th>Start Visitor of Day</th>
        <td><input name="ae_visitor_day" type="text" id="ae_visitor_day" value="<?php echo get_option('ae_visitor_day'); ?>" /></td>
      </tr>
      <tr valign="top">
        <th>Start Visitor of Yesterday</th>
        <td><input name="ae_visitor_yesterday" type="text" id="ae_visitor_yesterday" value="<?php echo get_option('ae_visitor_yesterday'); ?>" /></td>
      </tr>
      <tr valign="top" style="background-color:#eee;">
        <th>Start Visitor of Week</th>
        <td><input name="ae_visitor_week" type="text" id="ae_visitor_week" value="<?php echo get_option('ae_visitor_week'); ?>" /></td>
      </tr>
      <tr valign="top">
        <th>Start Visitor of Month</th>
        <td><input name="ae_visitor_month" type="text" id="ae_visitor_month" value="<?php echo get_option('ae_visitor_month'); ?>" /></td>
      </tr>
      <tr valign="top" style="background-color:#eee;">
        <th>Start Visitor of All</th>
        <td><input name="ae_visitor_all" type="text" id="ae_visitor_all" value="<?php echo get_option('ae_visitor_all'); ?>" /></td>
      </tr>
      <tr valign="top">
        <th></th>
        <td><p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Update Changes'); ?>"  /></p></td>
      </tr>
    </table>
  </form>
</div>
<?php
}
add_action('admin_menu', 'ae_visitor_menu');

?>