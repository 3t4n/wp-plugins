<?php
/*
registration form control
*/
function reg_form($step,$name,$email,$frm,$hide,$btn){
	global $reg_form_id, $reg_form_redir, $reg_form_tracker, $reg_form_name, $reg_list_name;
	global $frm_cb_receipt, $frm_cb_date, $frm_cb_name, $frm_cb_email, $frm_submit;

	if(!$hide) { // hide scripting if we don't need it
?>
	<script>
	jQuery(document).ready(function(){

		hide = '<?php echo $hide; ?>';
		goodForm = false;
		goodCB = false;
		jQuery('#regStatus').html('').hide();
		usrName = jQuery('form[name="frmReg1"] #usr_name');
		usrEmail = jQuery('form[name="frmReg1"] #usr_email');
		cbReceipt = jQuery('form[name="frmReg1"] #cb_receipt');
		cbDate = jQuery('form[name="frmReg1"] #cbDate');
		cbName = jQuery('form[name="frmReg1"] #cbName');
		cbEmail = jQuery('form[name="frmReg1"] #cbEmail');
		regBtn = jQuery('form[name="frmReg1"] #regBtn');
		regFrm = jQuery('form[name="frmReg1"]');

		regFrm.submit(function(e){
			if(!hide){
				return (goodForm);
			} else {
				return true;
			}
		});
		regBtn.click(function(e){
			jQuery('#regStatus').html('').hide();
			if(<?php echo (!$hide); ?>){ // validate & submit
				if(!goodForm){
					goodForm = fpcValidateForm();
				}
			} else {
				goodForm = true;
			}
			if(goodForm){
				regBtn.val('Registering');
				regFrm.submit();
			}
		}); // end regBtn click

	}); // end doc ready

	function fpcValidateForm(){
		if(!goodForm){
			var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			var err = '';
			if(usrName.val().length <= 0){
				err += 'Registration Error:<br>';
				err += '* Please Enter Your Name';
			}
			if(reg.test(usrEmail.val()) == false){
				err += (err == '')? 'Registration Error:<br>' : '<br>';
				err += '* Please Enter a Valid Email';
			}
			if(err != ''){
				jQuery('#regStatus').html(err).fadeIn('fast');
				return false;
			}
			return true;
		} else {
			return true;
		}
	}
	</script>
<?php } ?>
	<form method="post" id="<?php echo $frm; ?>" name="<?php echo $frm; ?>" action="http://www.aweber.com/scripts/addlead.pl">
	<div style="display:none !important;">
		<input type="hidden" name="meta_web_form_id" value="<?php echo $reg_form_id; ?>">
		<input type="hidden" name="meta_split_id" value="">
		<input type="hidden" name="listname" value="<?php echo $reg_list_name; ?>">
		<input type="hidden" name="redirect" value="<?php echo $reg_form_redir; ?>">
		<input type="hidden" name="meta_redirect_onlist" value="<?php echo $reg_form_redir; ?>?fpc_onlist=1">
		<input type="hidden" name="meta_adtracking" value="<?php echo $reg_form_name; ?>">
		<input type="hidden" name="meta_message" value="1001">
		<input type="hidden" name="meta_required" value="name,email">
		<input type="hidden" name="meta_forward_vars" value="1">
		<input type="hidden" name="meta_tooltip" value="">
		<input type="hidden" name="custom Affiliate-ID" value="">
		<input type="hidden" name="custom Website" value="<?php bloginfo('url'); ?>">
		<input type="hidden" name="custom ClickBank-Date" value="<?php echo  $frm_cb_date; ?>" id="cbDate">
		<input type="hidden" name="custom ClickBank-Name" value="<?php echo $frm_cb_name; ?>" id="cbName">
		<input type="hidden" name="custom ClickBank-Email" value="<?php echo $frm_cb_email; ?>" id="cbEmail">
		<input type="hidden" name="reg_step" value="<?php echo $step;?>">
		<script>
		document.write('<input type="hidden" name="admin_url" id="admin_url" value="'+location.protocol+'//'+location.host+location.pathname+'?page=fpc-main">');
		</script>
		<img src="<?php echo $reg_form_tracker; ?>" alt="">
	</div>
	<table cellpadding="5" cellspacing="3" border="0" class="reg_form_center"<?php if($hide){echo ' style="display:none;"';} ?>>
		<tr>
			<td align="left"><label for="usr_name">Name:</label></td>
			<td><input id="usr_name" type="text" name="name" value="<?php echo $name; ?>"></td>
		</tr>
		<tr>
			<td align="left"><label for="usr_email">Email:</label></td>
			<td><input id="usr_email" type="text" name="email" value="<?php echo $email; ?>"></td>
		</tr>
		<?php if(!$hide): ?>
		<tr>
			<td>&nbsp;</td>
			<td align="left"><input id="regBtn" name="submit" type="submit" value="<?php echo $btn; ?>"></td>
		</tr>
		<?php endif; ?>
	</table>

	<?php if(!$hide): ?>
	<div id="regStatus"></div>
	<?php endif; ?>

	<?php if($hide): ?>
	<input id="checkBtn" id="checkBtn" name="submit" type="submit" value="<?php echo $btn; ?>"></td>
	<?php endif; ?>

	</form>
<?php
} // end reg_form

/*
registration step 1
*/
function reg_step1() {
	global $current_user;
	get_currentuserinfo();
?>
<div class="fpc_reg_wrapper">
	<h3>Please register the plugin to activate it. (Registration is free)</h3>
	<p>
		In addition you'll also receive a complimentary subscription to the Fanpage Connect Newsletter which will give you insider tips on how to get more from your blog as well as the best Facebook marketing tips. You'll learn how to bring thousands of new visitors to your blog for free..
	</p>
	<p>
		<strong>Fill in the form below to register the plugin:</strong>
	</p>
	<?php reg_form(1,$current_user->user_firstname,$current_user->user_email,'frmReg1',false,'Register'); ?>
	<p>
		<strong>Note:</strong> If you've already registered any of the free Fanpage Conenct plugins then simply enter the name/email from which you have registered before. The plugin will activate immediately.
	</p>
	<p>
		<em>Your contact information will be handled with the strictest confidence and will never be sold or shared with third parties.<strong>Also, you can unsubscribe at anytime.</strong></em>
	</p>
</div>
<?php
} // end reg_step1

/*
registration step 2
*/
function reg_step2($name,$email) {
	global $current_user;
	get_currentuserinfo();
?>
<div class="fpc_reg_wrapper">
	<h3>Almost Done!</h3>
	<p>
		<strong>Step 1:</strong>
	</p>
	<p>
		A confirmation email has been sent to your email "<strong><?php echo $email; ?></strong>". You must click on the link inside the email to activate the plugin.
	</p>
	<p>
		The email will be from <strong>support@fanpageconnect.com</strong> and the subject will be "<strong>Response Required: Activate Your Fanpage Connect Plugin</strong>".
	</p>
	<p>
		<strong>Step 2:</strong>
	</p>
	<p>
		Once you've confirmed your email address, click below to activate Fanpage Connect.
	</p>
	<?php reg_form(2,$name,$email,'frmReg2',true,'Verify &amp; Activate'); ?>

	<!--<h3><a href="javascript:void(0)" onclick="toggleTrouble();" id="divToggle">+</a> Troubleshooting</h3>-->
	<h3 class="option-header">Problems Registering?</h3>

	<div id="trouble-guide">
		<p>
			<strong>The confirmation email is not there in my inbox!</strong><br>
			Dont panic. CHECK THE JUNK, spam or bulk folder of your email.
		</p>
			<p>
			<strong>It's not there in the junk folder either.</strong><br>
			Sometimes the confirmation email takes time to arrive. Please be patient. WAIT FOR 6 HOURS AT MOST. The confirmation email should be there by then.
			</p>
			<p>
			<strong>Dude, 6 hours and yet no sign of a confirmation email!</strong><br>
			Please register again from below:
		</p>

		<?php reg_form(1,$name,$email,'frmReg1',false,'Register'); ?>

		<p>
			<strong>I still have no confirmation email and I've registered 50 times - WTF?</strong><br>
			Okay, please register again from the form above using a DIFFERENT EMAIL ADDRESS this time.
		</p>
		<p>
			<strong>Why am I getting something like this?</strong><br>
			<img src="<?php echo FPC_PLUGIN_URL; ?>/img/verification-error.jpg">
		</p>
		<p>
			You'll get that when you click on "Verify and Activate" button or try to register again.
		</p>
		<p>
			This means that you've already subscribed but haven't clicked on the link in the confirmation email yet. In order to avoid any spam complain we don't send repeated confirmation emails. If you have not recieved the confirmation email then you need to wait for 12 hours at least before requesting another confirmation email.
		</p>
		<p>
			<strong>But I've still got problems.</strong><br>
			No biggie. <a href="mailto:support@fanpageconnect.com">Contact us</a> about it and we will get to you ASAP.
		</p>
	</div>
	<script language="javascript">
	jQuery(document).ready(function(){
		jQuery('.option-header').on('click',function(){
		    $this = jQuery(this);
		    $guide = jQuery('#trouble-guide');
		    $this.toggleClass('option-header-open');
		    if($guide.is(":visible")){
		    	$guide.slideUp('fast');
		    } else {
		    	$guide.slideDown('fast');
		    }
		});
	});
	</script>
</div>
<?php
} // end reg_step2

/*
registration step 3
*/
function reg_step3() {
?>
	<div style="width:250px;margin:0 auto;text-align:center;" id="fpc-reg-thumbs-up">
		<p>
			<img src="<?php echo FPC_PLUGIN_URL; ?>/img/thumbs-up.jpg">
		</p>
		<p>
			<h3>Woot! Fanpage Connect is now activated. Enjoy!</h3>
		</p>
	</div>
	<script>
	setTimeout(function(){
		jQuery('#fpc-reg-thumbs-up').animate({'opacity':0},3000,function(){ jQuery(this).slideUp('slow');});
	},2000)
	</script>
<?php
} // end reg_step3
?>