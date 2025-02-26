<?php
include "../../../wp-load.php";
$redirect = WP_PLUGIN_URL.'../../../';
$loginformhtml = wp_login_form( array('echo' => false,'redirect' => $redirect ) );
echo $loginformhtml.'<li id="lost"><a href = "'.WP_PLUGIN_URL.'/login/forgetpass_form.php?height=400&width=600&modal=false" class="thickbox" title = "lost password" >Forget Password</a></li>'. '<div class="error" style="color: blue"></div>';
//echo '<div class="error" style="color: blue"></div>';
?>

<script type="text/javascript" >
  $(document).ready(function() {
    var options = {
        beforeSubmit:  validateForm,
        success : showResponse,
        error: showerror
    }
           $('form#loginform').ajaxForm(options);
});

function validateForm(formData, jqForm, options) {

     jQuery('div.error').hide();
    for (var i=0; i < formData.length; i++) {
        if (!formData[i].value) {
          jQuery('div.error').show().append("both fields must contain data");
            return false;
        }
    }
     var user_info;
    
     user_info= jQuery.ajax({ type: "GET", url: "wp-content/plugins/login/getdata.php?username="+formData[0].value+"&pass="+formData[1].value, async: false }).responseText;
 
    if(user_info == 'Invalid UserName'){
      jQuery('div.error').empty();
       jQuery('div.error').show().append("Invalid UserName");
      return false;
    }
    else  if(user_info == 'Invalid Password'){
      jQuery('div.error').empty();
      jQuery('div.error').show().append("Invalid Password");
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