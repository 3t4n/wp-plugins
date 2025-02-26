<?php include "../../../wp-load.php";
$redirect = WP_PLUGIN_URL.'../../../';
?>
<form name="lostpasswordform" id="lostpasswordform" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" method="post">
	<p>
		<label><?php _e('Username or E-mail:') ?><br />
		<input type="text" name="user_login" id="user_login" class="input" value="<?php echo esc_attr($user_login); ?>" size="20" tabindex="10" /></label>
	</p>
<?php do_action('lostpassword_form'); ?>
	<input type="hidden" name="redirect_to" value="<?php echo WP_PLUGIN_URL.'../../../' ?>" />
	<p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="<?php esc_attr_e('Get New Password'); ?>" tabindex="100" /></p>
</form>
 <div class="error" style="color: blue"></div>
<script type="text/javascript" >
  jQuery(document).ready(function() {
           jQuery('form#lostpasswordform').ajaxForm({ beforeSubmit:     validateForm });
});

function validateForm(formData, jqForm, options) {


    for (var i=0; i < formData.length; i++) {
        if (!formData[i].value) {
            jQuery('div.error').show().append("the field must contain data");
            return false;
        }
    }
    var user_info;

    // jQuery.get('getdata.php', {'username': formData[0].value}, function(data) {
    //                 alert(data);
    //                                                         });
     user_info= jQuery.ajax({ type: "GET", url: "wp-content/plugins/login/checkregister.php?username="+formData[0].value+"&email=true", async: false }).responseText;
     if(user_info == 'Invalid username or E-mail'){
      jQuery('div.error').empty();
       jQuery('div.error').show().append("Invalid username or E-mail");
      return false;
    }
    return window.location=window.location;
}
</script>