<?php include "../../../wp-load.php";
$redirect = WP_PLUGIN_URL.'../../../';
?>

<form name="registerform" id="registerform" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
      <p>
          <label><?php _e('Username') ?><br />
          <input type="text" name="user_login" id="user_login" class="input" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" tabindex="10" /></label>
      </p>
      <p>
          <label><?php _e('E-mail') ?><br />
          <input type="text" name="user_email" id="user_email" class="input" value="<?php echo esc_attr(stripslashes($user_email)); ?>" size="25" tabindex="20" /></label>
     </p>
  <?php do_action('register_form'); ?>
      <p id="reg_passmail"><?php _e('A password will be e-mailed to you.') ?></p>
      <br class="clear" />
      <input type="hidden" name="redirect_to" value="<?php echo WP_PLUGIN_URL.'../../../'; ?>" />
     <p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="<?php esc_attr_e('Register'); ?>" tabindex="100" /></p>
  </form>
 <div class="error" style="color: blue"></div>



<script type="text/javascript" >
  jQuery(document).ready(function() {
    var options = {
        beforeSubmit:  validateForm
    }
           jQuery('form#registerform').ajaxForm(options);
});

function validateForm(formData, jqForm, options) {


    for (var i=0; i < formData.length; i++) {
        if (!formData[i].value) {
            jQuery('div.error').show().append("both fields must contain data");
            return false;
        }
    }
    var user_info;

    // jQuery.get('getdata.php', {'username': formData[0].value}, function(data) {
    //                 alert(data);
    //                                                         });
     user_info= jQuery.ajax({ type: "GET", url: "wp-content/plugins/login/checkregister.php?username="+formData[0].value+"&email="+formData[1].value, async: false }).responseText;
     
     if(user_info == 'Valid UserName'){
      jQuery('div.error').empty();
       jQuery('div.error').show().append("UserName already used");
      return false;
    }
    else  if(user_info == 'Valid Email'){
      jQuery('div.error').empty();
       jQuery('div.error').show().append("This Email is already registered");
      return false;
    }
    return true;
}
function showResponse(responseText, statusText){
  $location= jQuery.ajax({ type: "GET", url: "wp-content/plugins/login/redirect.php", async: false }).responseText;
  window.location = $location;
}
function showerror( request, status, error){
                alert(error);
                alert(request.responseText);
}

</script>