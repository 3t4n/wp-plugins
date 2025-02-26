<?php
/*****************************************************
       "All Post Contact Form"'s Sub File
              - If Cookie Enabled -
              Don't Edit This File
          Created by RainbowLink Inc.
*****************************************************/
/* Delete Cookie */ 
if($rl_apcf_cookie === "1"){ 
$this_time_cookie = "'apcf_onetime_ticket','deleted',1";
echo '<script type="text/javascript">
setAPCFCookie('.$this_time_cookie.');
</script>
<h2 class="submission">'.$rl_apcf_BackToTopMessage.'</h2>
<form action="'.$rl_apcf_users_toppage_url.'" method="POST"><div id="apcf_confirmation_btn"><input value="&rarr;" type="submit" name="apcf_deleted_cookie" class="btn_confirm"></div>';
exit;
}

