<?php

// inital landing page for amy experience 
function amy_landingpage()
{
$plugin_url = amy_get_plugin_url();
$businesstypes = amy_businesstypes(amy_get_businesstype());	
$nonce_preview = esc_html(wp_create_nonce('nonce_preview'));
$nonce_signin = esc_html(wp_create_nonce('nonce_signin'));
?>
 <style type="text/css">
	 a:focus{
		 box-shadow: unset !important;
	 }
	
	 input[type=select]:focus
	 {
		box-shadow: unset !important;
    
	 }
	 .wp-core-ui select:focus{
		 box-shadow: unset !important;
	 }
	 
	 .btn:focus {
    outline:unset !important;
    box-shadow: unset !important;
}
	  .wp-core-ui select
	 {
		 color: rgba(0, 0, 0, 0.87) !important;
		 padding: 0px 8px 0 20px;
		 background-position-x: 270px;
		 text-indent: 0px !important;
	 }
	 .wp-core-ui select:hover 
	 {
		 color: rgba(0, 0, 0, 0.87) !important;
	 }
.login {
    height: 100vh;
}
	 #wpcontent
	{
		padding-left:0px;	
	}
.left-head-span
	 {
      	position:relative;
		
		left:32px;
		 top: 34px
	 }
	 .right-head-logo
	 {
		 position:relative !important;
		top:23px !important;
	 }
	 .signin-link
	 {
	 font-size: 14px;
    line-height: 19px;
    font-weight: bold;
}
	 .btn-login
	 {
		 height:48px !important;
		 color:#fff !important;
		 padding:0px !important;
	 }
	 .form-group
	{
		margin-bottom: 0px !important;
	}
	 label
	{
		 cursor:default !important;
	}
	 .ml-4
	 {
		 margin-left:0px !important;
	 }
	 .form-control
	{
	height: 48px !important;
    border: 1px solid #DBDBE8 !important;
	padding-left:20px !important;
	padding-right:20px !important;
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
    </style>
<body style="overflow-x:none;">
<div class="container-fluid bg">
    <div class="row">
        <div class="col-md-9">
            <div class="bg-login">
                <div class="login">
				<form name="signin" action="" method="post" class="left-head-span">
            <span class="font-normal ml-4">Already have an Amy account? </span><a href="#" onclick="javascript:document.forms['signin'].submit();" class="text-primary font-normal signin-link">Sign In</a>
			<input type=hidden name="signin" id="signin" value="signin"/>
			<input type="hidden" name="nonce_signin" id="nonce_signin" value="<?php echo $nonce_signin ?>" />
		</form>                    
                    <div class="start-form">
                        <div class="">
                            <p class="form-paragraph">Let’s get started on making your own customized chatbot for your website</p>
                            <div class="start-form-type">
                                <form name="preview" action="" method="post" style="width:304px">
                                    <div class="form-group">
                                        <label for="listBusinessType">Your Business Type</label>
                                        <select id="listBusinessType" name="listBusinessType" class="form-control">
                                            <?php amy_loadbusinesstypes(amy_get_businesstype()); ?>
                                        </select>
										
                                    </div>                                   
									<div class="" style="padding-top:24px">
                                        <button type="button" class="btn btn-login w-100 amy-btn-primary" onclick="javascript:document.forms['preview'].submit();">Create a chatbot for free</button>
                                    </div>		
	<input type=hidden name="preview" id="preview" value="preview"/>
	<input type=hidden name="nonce_preview" id="nonce_preview" value="<?php echo $nonce_preview ?>"/>
                                </form>
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 pt-2 vh-100">
            <div class="logo justify-content-end right-head-logo">                
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

    function CreatePreview() {
        var valid = true;
        var businessType = $('#listBusinessType').val();
        var _url = $('#createPreviewPageUrl').val();
        var _handShakeId = $('#handShakeId').val();
        if (valid == true) {
            loader(true);
            $.ajax({
                url: _url,
                type: "post",
                contentType: "application/json",
                dataType: "text",
                data: JSON.stringify({ businessTypeName: businessType, handShakeId: _handShakeId }),
                success: function (result, status) {
                    var Result = JSON.parse(result);
                    if (Result.httpStatusCode == "ok" && Result.status == true) {
                        document.forms['preview'].submit();
                    }
                    else {
                        showError(Result.message);
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
    function Signin(url) {
        window.location.href = url;
    }
    function loader(enable) {
        if (enable) {
            $('.loader_amy').show();
            $('.createBot__container').hide();
        }
        else {
            $('.loader_amy').hide();
            $('.createBot__container').show();
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