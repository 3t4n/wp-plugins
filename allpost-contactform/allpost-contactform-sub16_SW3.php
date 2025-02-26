<?php
/*****************************************************
         "All Post Contact Form"'s Sub File
            - Submission Window 【END】 -
               Don't Edit This File
            Created by RainbowLink Inc.
*****************************************************/
$apcf_clear_all = $_POST['confirmation_verification'];
$apcf_clear_all = "13579";
?>
<script type="text/javascript">
setTimeout(function(){
	window.location.href = '<?php echo $rl_apcf_redirect_page; ?>';
}, <?php echo $rl_apcf_redirect_time; ?>*1000);
</script>
<?php
if(!empty($rl_apcf_gototop)){
?>
 <p class="apcf_disp_gototop"><a href="<?php echo $rl_apcf_users_toppage_url; ?>" class="btn_gototop"><?php echo $rl_apcf_gototop; ?></a></p>
<?php
}


