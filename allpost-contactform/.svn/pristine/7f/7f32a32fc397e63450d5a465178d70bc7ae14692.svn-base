<?php
/*****************************************************
       "All Post Contact Form"'s Sub File
              - If Cookie Enabled -
              Don't Edit This File
          Created by RainbowLink Inc.
*****************************************************/
$get_onetime_ticket = $_COOKIE['apcf_onetime_ticket']; 
if($apcf_contact_id !== $get_onetime_ticket){ 
  $apcf_onetime_id = md5(uniqid(rand(), true)); 
  $apcf_contact_id = md5(uniqid(rand(), true));
  echo '<h2 class="submission">'.$rl_apcf_errormsg.'</h2>
        <script type="text/javascript">
        eraseAPCFCookie(apcf_onetime_ticket);
        </script> 
        <form action="'.$rl_apcf_SUBMIT.'" method="POST"><div id="apcf_confirmation_btn"><input value="'.$rl_apcf_errorbtn.'" type="submit" name="apcf_delete_cookie" class="btn_confirm"></div>'; 
  exit;
}

