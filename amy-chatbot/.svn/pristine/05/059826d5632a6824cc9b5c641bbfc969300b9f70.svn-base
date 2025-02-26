<?php

// render sign in page
function amy_signup()
{
$plugin_url = esc_html(amy_get_plugin_url());
$businesstypes = esc_html(amy_get_businesstype());
$defaultcolor = esc_html(amy_get_primarycolor());
$t_firstName = amy_get_firstname();
$t_lastName = amy_get_lastname();
$t_amyDomain = get_option("siteurl");
$backtopreviewtext = esc_html("Back to preview");
$nonce_signinsuccess = esc_html(wp_create_nonce("nonce_signinsuccess"));
$nonce_backtopreview = esc_html(wp_create_nonce("nonce_backtopreview"));
if($businesstypes == ""){
	$backtopreviewtext = esc_html("Preview");
}
$emailidconnected = esc_html(get_option("admin_email"));
    if(amy_get_emailidconnected()!="")
    {
        $emailidconnected = esc_html(amy_get_emailidconnected());
    }
	

    ?>	
<title>SignUp</title>
<style type="text/css">
a:focus{
		 box-shadow: unset !important;
	 }
	.btn
	{
		 box-shadow: unset !important;
	}
input:hover
	{
		border: 1px solid #DB48DE !important;
	}
	input:focus
	{
		border: 2px solid #DB48DE !important;
	}
	 input[type=text]:focus
	 {
		box-shadow: unset !important;
    
	 }
	input[type=password]
	{
	box-shadow: unset !important;
	}
	.errormessage {
    color: #c7393b;
}
	
#wpcontent
{
	padding-left:0px !important;
}
	.left-head-span
	 {
        position:relative;
		top:34px;
		left:32px;
	 }
	
	.loginsec
	{
		width:360px !important;
	}
	.form-group
	{
		 width:350px !important;
		margin-bottom: 0px !important
	}
	label
	{
		 cursor:default !important;
	}
			.lblError
	{
		color: #D4313A !important;
		font-size: 12px !important;
line-height: 16px !important;
	}
	
	.btn:hover
	{
		color: #FFFFFF !important;
	}
	.logo
	{
		position:relative !important;
		top:23px !important;
	}
	.form-control
	{
	height: 48px !important;
    border: 1px solid #DBDBE8 !important;
	padding-left:20px !important;
	padding-right:20px !important;
	}
	.btn-login
	{
		height:48px;
		width:350px !important;
	}
	.login {
    height: 100vh;
}
	 #wpfooter
	 {
		 display:none !important;
	 }
	#wpbody-content
	{
		padding-bottom:0px !important;
	
	}
	#wpbody
	{
			background-color: #F5F5FA;
	}
	.amy-btn-primary
	{
		background-color:#E35EE5;
	}
	.amy-btn-primary:hover
	{
		background-color:#DB48DE;
	}
	.amy-btn-primary:active
	{
		background-color:#FA85F4;
	}
		#google-sign-up
	{
		margin-top: 30px;
		margin-bottom: 30px;
	}
	#divider:after 
	{
	top: 9px;
    left: 0;
    width: calc(50% - 20px);
    height: 1px;
    content: "";
    display: block;
    position: absolute;
    background-color: #DFE0E6;
	}
	#divider:before 
	{
		top: 9px;
    	right: 0;
    	width: calc(50% - 20px);
    	height: 1px;
    	content: "";
    	display: block;
    	position: absolute;
    	background-color: #DFE0E6;
	}
	#divider {
    color: rgba(0,0,0,0.38);
    position: relative;
    font-size: 0.875rem;
    margin-top: 24px;
    text-align: center;
    margin-bottom: 24px;
    letter-spacing: 0.01em;
}
	
</style>
<body>
<div class="container-fluid bg">
    <div class="row">
        <div class="col-md-9" style="min-width:500px">
            <div class="bg-login">
                <div class="login">
                    <!--<a class="preview" href=""><i class="fas fa-chevron-left fa-2x"></i>Preview</a>-->
					<div class="previewDiv left-head-span">
	<form name="backtopreview" action="" method="post">		
        <a href="javascript:document.forms['backtopreview'].submit();" style="color:#ffffff;text-decoration:none;font-size:12px;line-height:13px;font-weight:600;">
			<svg width="11" height="20" viewBox="0 0 11 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10.6201 0.989998C10.1301 0.499998 9.34006 0.499998 8.85006 0.989998L0.540059 9.3C0.150059 9.69 0.150059 10.32 0.540059 10.71L8.85006 19.02C9.34006 19.51 10.1301 19.51 10.6201 19.02C11.1101 18.53 11.1101 17.74 10.6201 17.25L3.38006 10L10.6301 2.75C11.1101 2.27 11.1101 1.47 10.6201 0.989998Z" fill="#0A1938"/>
</svg>
			<span style="font-size:14px; line-height:19px;color:rgba(0,0,0,0.6);vertical-align:middle;padding-left:7px;"><?php echo esc_html($backtopreviewtext) ?></span></a>		
		<input type=hidden name="backtopreview" id="backtopreview" value="backtopreview"/>
		<input type="hidden" name="nonce_backtopreview" id="nonce_backtopreview" value="<?php echo esc_html($nonce_backtopreview) ?>" style="display:none;" />
		</form>
    	   		<input type=hidden id="primarycolor" name="primarycolor" value="<?php echo esc_html($defaultcolor) ?>">
<input type=hidden id="businesstype" name="businesstype" value="<?php echo esc_html($businesstypes) ?>">	
    </div>
                    <div class="login-form">
					<form name="signinform" action='' method='post'class="form loginsec">                          
                            <h1 class="form-sign-in">Sign Up</h1>
							<iframe src="https://start.amy.us/assets/images/googleLogin.html?type=signup" name="mainFrame" frameborder=no scrolling="no" width="100%"
　　　　                 height="40px;" id="mainFrame" title="mainFrame" >
2                    </iframe>
<!-- 							<div id="google-sign-up">
								</div> -->
								<div id="divider">
									Or
								</div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="txtEmail" name="emailId"  class="form-control txtbx" type="text" placeholder="sample@gmail.com" value="<?php echo esc_html($emailidconnected) ?>" />
									<label class="lblError" id="lbluserNameErr"></label>
								  <p class="alreadyExistMsg" style="display:none"></p>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
								<input type="password" class="form-control txtbx" placeholder="Enter your password" id="txtPassword">
            <label class="lblError" id="lblPassErr"></label>
                                           
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-login w-100 amy-btn-primary" onclick="SignIn()">Sign Up</button>
								<div class="row divError">
	<div class="col" style="margin-top:10px;">
		<div class="col-2" style="display:inline-block;">
			<!--<i class="fa fa-exclamation-circle" style="font-size:29px;color:#c7393b"></i>  -->
		</div>
        	<div class="col errormessage" id="errMsgTxt" style="display:inline-flex;max-width:80%;vertical-align:text-bottom;">
            </div>
	</div>
</div> 
                            </div>
                            <p class="pt-2 sign-up-agree">By clicking sign up, you agree to our&nbsp;<a href="https://www.amy.us/terms" target="_blank" class="text-primary">Terms</a>&nbsp;and&nbsp;<a href="https://www.amy.us/privacy-policy" target="_blank" class="text-primary">Privacy Policy</a> </p>						
							<input type="hidden" name="nonce_signinsuccess" id="nonce_signinsuccess" style="display:none" value="<?php echo esc_html($nonce_signinsuccess) ?>" />
<input type='hidden' name="emailIdConnected" id="emailIdConnected" />
<input type='hidden' name="campaignId" id="campaignId" />
<input type='hidden' name="token" id="token" />
<input type='hidden' name="firstName" id="firstName" />
<input type='hidden' name="lastName" id="lastName" />
<input type='hidden' name="adminConsoleUrl" id="adminConsoleUrl" />
<input type='hidden' name="agentId" id="agentId" />
<input type='hidden' name="avatarUrl" id="avatarUrl" />
<input type='hidden' name="editBotFlowUrl" id="editBotFlowUrl" />
<input type='hidden' name="editdesignUrl" id="editdesignUrl" />
<input type='hidden' name="siteId" id="siteId" />
<input type='hidden' name="taskbotId" id="taskbotId" />
<input type='hidden' name="viewCollectedLeadsUrl" id="viewCollectedLeadsUrl" />
<input type=hidded name='signinsuccess' value='' style="display:none"/>
                        </form>
						<div class="vertical-center loader_amy" style="display:none;text-align:center;">											
							<h1 style="font-size: 34px;line-height: 46px;font-weight: 700;margin-bottom: 105px;">Sign Up</h1><p class="start-text" style="font-size:20px;line-height:27px;font-weight:700;">You’re signed into Amy!</p>
<p style="font-size:16px;line-height:22px;margin-bottom:87px;">Hang on tight, Amy is busy setting itself up on your WordPress website</p>
						
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
<g transform="rotate(0 50 50)">
<rect x="45" y="26" rx="5" ry="5" width="10" height="10" fill="#e35ee5">
<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="4.545454545454546s" begin="-3.977272727272727s" repeatCount="indefinite"></animate>
</rect>
</g>
<g transform="rotate(45 50 50)">
<rect x="45" y="26" rx="5" ry="5" width="10" height="10" fill="#e35ee5">
<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="4.545454545454546s" begin="-3.409090909090909s" repeatCount="indefinite"></animate>
</rect>
</g>
<g transform="rotate(90 50 50)">
<rect x="45" y="26" rx="5" ry="5" width="10" height="10" fill="#e35ee5">
<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="4.545454545454546s" begin="-2.840909090909091s" repeatCount="indefinite"></animate>
</rect>
</g>
<g transform="rotate(135 50 50)">
<rect x="45" y="26" rx="5" ry="5" width="10" height="10" fill="#e35ee5">
<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="4.545454545454546s" begin="-2.272727272727273s" repeatCount="indefinite"></animate>
</rect>
</g>
<g transform="rotate(180 50 50)">
<rect x="45" y="26" rx="5" ry="5" width="10" height="10" fill="#e35ee5">
<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="4.545454545454546s" begin="-1.7045454545454546s" repeatCount="indefinite"></animate>
</rect>
</g>
<g transform="rotate(225 50 50)">
<rect x="45" y="26" rx="5" ry="5" width="10" height="10" fill="#e35ee5">
<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="4.545454545454546s" begin="-1.1363636363636365s" repeatCount="indefinite"></animate>
</rect>
</g>
<g transform="rotate(270 50 50)">
<rect x="45" y="26" rx="5" ry="5" width="10" height="10" fill="#e35ee5">
<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="4.545454545454546s" begin="-0.5681818181818182s" repeatCount="indefinite"></animate>
</rect>
</g>
<g transform="rotate(315 50 50)">
<rect x="45" y="26" rx="5" ry="5" width="10" height="10" fill="#e35ee5">
<animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="4.545454545454546s" begin="0s" repeatCount="indefinite"></animate>
</rect>
</g>
</svg>								
 
</div>
                    </div>
                </div>
            </div>
        </div>
          <div class="col-md-3 pt-2 vh-100">
                <div class="logo justify-content-end">
                    <img src=<?php echo $plugin_url ?>./images/logo.svg>
                    <h1 class="logo-text">Amy</h1>
                </div>                
			  <div class="intro justify-content-end w-100 d-flex">
                <div class="d-flex  h-100 align-items-center introduction">
                    <p style="font-size:34px;line-height:46px;font-weight:700;">Start using Amy, the most intuitive chatbot for small businesses</p>
                </div>

            </div>
            </div>
    </div>
</div>   
</body>
<script>
	
function googleSignUp ({token, userInfo}) {
 var _url = "https://api.amy.us/cmsapi/integration/amythirdpartysignup";
 var businessType = $("#businesstype").val();
 var primaryColor  =$("#primarycolor").val();
 var firstName = "<?php $current_user = wp_get_current_user();   echo esc_html($current_user->user_firstname ) ?>"
 var lastName = "<?php $current_user = wp_get_current_user();   echo esc_html($current_user->user_lastname ) ?>"
 var webSite = "<?php echo esc_html($t_amyDomain) ?>"
  if(businessType == "") 
	businessType = "Other";
 var _handShakeId = $('#handShakeId').val();
            loader(true);
            $.ajax({
                url: _url,
                type: "post",
                contentType: "application/json",
                dataType: "text",
                data: JSON.stringify({ emailId: userInfo.email, handShakeId: _handShakeId, businessType:businessType, primaryColor: primaryColor, thirdPartnerType: 0, thirdPartyToken: token,webSite: webSite, payload: {
					firstName,
					lastName
					
				}}),
                success: function (result, status) {
                    var Results = JSON.parse(result);
                    if (Results.httpStatusCode == "ok" && Results.status == true) {
						console.log (Results);
                        // populate all hidden fields
						document.signinform.emailIdConnected.value = Results.emailId;
						document.signinform.campaignId.value = Results.campaignId;
						document.signinform.token.value = Results.token;
						document.signinform.firstName.value = Results.firstName;
						document.signinform.lastName.value = Results.lastName;
						document.signinform.adminConsoleUrl.value = Results.adminConsoleUrl;
						document.signinform.agentId.value = Results.agentId;
						document.signinform.avatarUrl.value = Results.avatarUrl;
						document.signinform.editBotFlowUrl.value = Results.editBotFlowUrl;
						document.signinform.editdesignUrl.value = Results.editdesignUrl;
						document.signinform.siteId.value = Results.siteId;
						document.signinform.taskbotId.value = Results.taskbotId;
						document.signinform.viewCollectedLeadsUrl.value = Results.viewCollectedLeadsUrl;
						document.forms['signinform'].submit();
                    }	
                    else {
                        showError(Results.message);
                        loader(false);
                    }
                },
                error: function (error) {
                    showError(error.responseText);
                    loader(false);
                }
            });
        }

initEvent()
	
function initEvent () {
	window.addEventListener("message", (event) => {
		if(event.data && event.origin.indexOf("amy")!==-1) {
			var data = JSON.parse(event.data)
			googleSignUp(data)
		}
	})
}
	
	
    function SignUp() {
        var _url = $('#signUpURL').val();
        window.location.href = _url;
    }
    function isEmailValid(email) {
        var reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if (!reg.test(email)) {
            return false;
        }
        else
            return true;
    }

    function SignIn() {
        $('#lbluserNameErr').text('');
        $('#lblPassErr').text('');
        var valid = true;

        var userName = $("#txtEmail").val();
        var userPwd = $("#txtPassword").val();
		var businessType = $("#businesstype").val();
		var primaryColor  =$("#primarycolor").val();
		if(businessType == "") 
			businessType = "Other";
        if (userName == "") {
            $('#lbluserNameErr').text('  Email is required.');
            valid = false;
        }
        else {
            if (isEmailValid(userName) == false) {
                $('#lbluserNameErr').text('Email is invalid.');
                valid = false;
            }
        }

        if (userPwd == "") {
            $('#lblPassErr').text('Password is required.');
            valid = false;

        }
		if (!(/^(?=.*[0-9])(?=.*[a-zA-Z])(.{8,})$/).test(userPwd)) {
			$('#lblPassErr').text('use 8 or more characters with a mix of letters, numbers.');
            valid = false;
		}
        var _url = "https://api.amy.us/cmsapi/integration/amysignup";
        var _handShakeId = $('#handShakeId').val();
				var firstName = "<?php $current_user = wp_get_current_user();   echo esc_html($current_user->user_firstname ) ?>"
				var lastName = "<?php $current_user = wp_get_current_user();   echo esc_html($current_user->user_lastname ) ?>"
		var webSite = "<?php echo esc_html($t_amyDomain) ?>"	
        if (valid == true) {
            loader(true);
            $.ajax({
                url: _url,
                type: "post",
                contentType: "application/json",
                dataType: "text",
                data: JSON.stringify({ emailId: userName, password: userPwd, handShakeId: _handShakeId, businessType:businessType, primaryColor: primaryColor,webSite: webSite, payload: {
				firstName,
				lastName
				}}),
                success: function (result, status) {
                    var Results = JSON.parse(result);
                    if (Results.httpStatusCode == "ok" && Results.status == true) {
						console.log (Results);
                        // populate all hidden fields
document.signinform.emailIdConnected.value = Results.emailId;
document.signinform.campaignId.value = Results.campaignId;
document.signinform.token.value = Results.token;
document.signinform.firstName.value = Results.firstName;
document.signinform.lastName.value = Results.lastName;
document.signinform.adminConsoleUrl.value = Results.adminConsoleUrl;
document.signinform.agentId.value = Results.agentId;
document.signinform.avatarUrl.value = Results.avatarUrl;
document.signinform.editBotFlowUrl.value = Results.editBotFlowUrl;
document.signinform.editdesignUrl.value = Results.editdesignUrl;
document.signinform.siteId.value = Results.siteId;
document.signinform.taskbotId.value = Results.taskbotId;
document.signinform.viewCollectedLeadsUrl.value = Results.viewCollectedLeadsUrl;
						document.forms['signinform'].submit();
                    }
					
                    else {
                        showError(Results.message);
                        loader(false);
                    }
                },
                error: function (error) {
                    showError(error.responseText);
                    loader(false);
                }
            });
        }
    }
    function loader(enable) {
        if (enable) {
            $('.loader_amy').show();
            $('.loginsec').hide();
        }
        else {
            $('.loader_amy').hide();
            $('.loginsec').show();
        }
    }
    function showError(msg) {
        if (msg == '' || msg == undefined) {
            msg = "Something went wrong!";
        }
        $('.divError').css('display', 'block');
        $('#errMsgTxt').html(msg);
    }


</script>

<?php
}
?>