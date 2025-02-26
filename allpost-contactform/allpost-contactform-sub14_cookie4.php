<?php
/*****************************************************
       "All Post Contact Form"'s Sub File
              - If Cookie Enabled -
              Don't Edit This File
          Created by RainbowLink Inc.
*****************************************************/
$apcf_onetime_ticket = "";
if(!isset($_COOKIE['apcf_onetime_ticket'])){
$apcf_onetime_ticket = $_COOKIE['apcf_onetime_ticket'];
 if(empty($apcf_onetime_ticket) || $apcf_onetime_ticket === "deleted"){
    $apcf_onetime_ticket = md5(uniqid(rand(), true));
    $apcf_onetime_id = $apcf_onetime_ticket;
 }else{
    $apcf_onetime_id = md5(uniqid(rand(), true));
    $apcf_onetime_ticket = "error".$apcf_onetime_id;
 }
}else{
 $apcf_onetime_ticket = "";
 $apcf_onetime_ticket = $_COOKIE['apcf_onetime_ticket'];
 if(empty($apcf_onetime_ticket) || $apcf_onetime_ticket === "deleted"){
    $apcf_onetime_ticket = md5(uniqid(rand(), true));
    $apcf_onetime_id = $apcf_onetime_ticket;
 }else{ $apcf_onetime_id = md5(uniqid(rand(), true));
    $apcf_onetime_ticket = "error".$apcf_onetime_id;
 }
}

$this_time_cookie = "'apcf_onetime_ticket','".$apcf_onetime_ticket."',1"; 
echo '<script type="text/javascript">
setAPCFCookie('.$this_time_cookie.');
</script>';
?>
<input type="hidden" name="apcf_contact_id" value="<?php echo $apcf_onetime_id; ?>">
<script type="text/javascript">
document.write('<div id="apcf_confirmation_btn"><input value="<?php echo $rl_apcf_cbtn; ?>" type="submit" name="apcf_submit" class="btn_confirm"></div>');
</script>
<noscript>
<?php echo $rl_apcf_public_no_javascript_eg; ?>
</noscript>
</form>

