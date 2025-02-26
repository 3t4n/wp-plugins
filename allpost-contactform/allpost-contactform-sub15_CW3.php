<?php
/*****************************************************
         "All Post Contact Form"'s Sub File
          - Confirmation Window 【END】 -
                including: sub14  
               Don't Edit This File
            Created by RainbowLink Inc.
*****************************************************/ 
if($rl_apcf_cookie === "1"){ //--- If Cookie Enabled
 include plugin_dir_path( __FILE__ )."allpost-contactform-sub14_cookie4.php";
}else{ 
 $apcf_onetime_id = md5(uniqid(rand(), true));
 $apcf_onetime_ticket = "error".$apcf_onetime_id;
}
?>
<input type="hidden" name="apcf_contact_id" value="<?php echo $apcf_onetime_id; ?>">
<script type="text/javascript">
document.write('<div id="apcf_confirmation_btn"><input value="<?php echo $rl_apcf_cbtn; ?>" type="submit" name="apcf_submit" class="btn_confirm"></div>');
</script>
<noscript>
<?php echo $rl_apcf_public_no_javascript_eg; ?>
</noscript>
</form>

