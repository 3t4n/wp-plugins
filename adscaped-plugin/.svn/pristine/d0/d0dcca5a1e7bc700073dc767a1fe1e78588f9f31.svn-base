<?php
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
?>

<?php
//TODO: add gen page security (token/nonce)  
	if($_POST['asc_setp_hidden'] == '1') {  
		// update settings  
		$f_pid = $_POST['asc_setf_pid']; //TODO: secure input
		update_option("asc_opt_pageid", $f_pid);
		
		$f_spad = $_POST['asc_setf_spad'];
		update_option("asc_opt_spad", $f_spad);
		
		echo '<div id="message" class="updated"><p>Settings updated</p></div>';
	}  else {
		$f_pid = get_option("asc_opt_pageid");
		$f_spad = get_option("asc_opt_spad");
	}
?>  

<div class="wrap">

<?php    echo "<h2>" . __( 'adscaped plugin settings', 'ascwpp_setp' ) . "</h2>"; ?>  
   
<form name="asc_setp_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">

<input type="hidden" name="asc_setp_hidden" value="1">  
<?php    echo "<h4>" . __( 'adscaped user', 'ascwpp_setp' ) . "</h4>"; ?>  

<table class="form-table"><tr><th scope="row">
<?php _e("adscaped page id: " ); ?></th><td><input type="text" name="asc_setf_pid" value="<?php echo $f_pid; ?>" size="40"><?php _e(" Your site's hash ID" ); ?></td></tr>
</table><br><hr>

<?php    echo "<h4>" . __( 'Wordpress integration', 'ascwpp_setp' ) . "</h4>"; ?>
 
<table class="form-table"><tr><th scope="row">
<?php $ch_add = ""; if ($f_spad == "on") $ch_add = 'checked="checked"'; ?>
<?php _e("Show ad above posts: " ); ?> </th><td><input type="checkbox" name="asc_setf_spad" <?php echo $ch_add; ?>><?php _e("" ); ?></td></tr>
</table>

<p class="submit">  
<input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes', 'ascwpp_setp' ) ?>" />  
</p>  
</table>
</form>

</div>  
