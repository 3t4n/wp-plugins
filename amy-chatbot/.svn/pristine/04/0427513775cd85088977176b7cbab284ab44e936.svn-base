<?php

//render bot preview page
function amy_previewbot()
{
$basepath = amy_get_plugin_url();	
$backimagepath = $basepath."/images/rectangle2.png";
$defaultcolor = amy_get_primarycolor();
$plugin_url = esc_html(amy_get_plugin_url());

?>

 <style>
	 .amy-btn-primary
	{
		background-color:#E35EE5 !important;
	}
	.amy-btn-primary:hover
	{
		background-color:#DB48DE !important;
	}
	.amy-btn-primary:active
	{
		background-color:#FA85F4 !important;
	}
	 a:focus{
		 box-shadow: unset !important;
	 }
	 input[type=text]:focus
	 {
		 box-shadow: unset !important;
    outline: unset !important;
	 }
	  input[type=select]:focus
	 {
		 box-shadow: unset !important;
    outline: unset !important;
	 }
	 .wp-core-ui select:focus{
		 box-shadow: unset !important;
    outline: unset !important;
	 }
	 .login {
    height: 100vh;
}
            .signup__container {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
}

.signup__container .left-section {
  background-color: #f5f5fa;
  width: 30%;
  padding: 30px 25px;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

.signup__container .left-section .amy-icon {
  width: 52px;
  height: 52px;
  vertical-align: bottom;
  margin-right: 10px;
}

.signup__container .left-section .heading {
  font-size: 24px;
  line-height: 36px;
  vertical-align: super;
  color: #0a1938;
  font-weight: bold;
}

.signup__container .left-section .preview-text {
  margin: 64px 0 32px 0;
  color: #fff;
  margin: 64px 0 32px 0;
  font-size: 15px;
  text-align: center;
  font-weight: normal;
  line-height: 16px;
}

.signup__container .left-section .color-box {
  padding-bottom: 38px;
  color: #000;
  margin-top: 80px;
  margin-bottom: 86px;
}

.signup__container .left-section .color-box .headtext {
  font-size: 16px;
  line-height: 17px;
  margin-top: 0;
	margin-bottom: 20px;
}

.signup__container .left-section .color-box .color-text {
  font-size: 16px;
  line-height: 22px;
  color: rgba(0,0,0,0.87);
  font-weight: bold;
  margin-bottom: 8px;
}

.signup__container .left-section .color-box .color-picker {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  background-color: #fff;
  border: 1px solid #DBDBE8 !important;
  padding: 5px;
  border-radius: 28px;
  margin-bottom: 40px;
}

.signup__container .left-section .color-box .color-picker .textbox {
  border: none;
  width: 70%;
  background: transparent;
  font-size: 16px;
  line-height: 16px;
	padding-left:20px;
	padding-right:20px;
}

.signup__container .left-section .color-box .color-picker .picker {
    padding: 0;
    cursor: pointer;
    margin: 0;
    border: none;
    outline: none;
    border-radius: 50%;
    width: 40px;
    height: 37px;
    background-color: transparent;
    color: transparent;
}

.signup__container .left-section .color-box .color-picker:hover {
  border: 1px solid #DBDBE8 !important;
}

.signup__container .left-section .color-box .dropdown {
  position: relative;
}

.signup__container .left-section .color-box .dropdown:after {
  position: absolute;
  top: 20px;
  right: 20px;
  content: "";
  border-bottom: 0;
  border: 5px solid transparent;
  border-top: 9px solid #0a1938;
  pointer-events: none;
}

.signup__container .left-section .color-box .dropdown select {
  width: 100%;
  cursor: pointer;
  border: 1px solid #DBDBE8;
  border-radius: 28px;
  background-color: #f9f9f9;
  outline: none;
  overflow: hidden;
  padding: 0px 8px 0px 20px;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  font-size: 16px;
  line-height: 30px;
  background: #FFFFFF;
	height:48px;
	color: rgba(0, 0, 0, 0.87);
	 text-indent: 0px !important;
}
.wp-core-ui select:hover 
	 {
		 color: rgba(0, 0, 0, 0.87) !important;
	 }
.signup__container .left-section .signup-refer-text {
  color: rgba(0,0,0,0.6);
  font-size: 14px;
  margin-top: 42px;
  text-align: center;
  line-height: 19px;
  margin-bottom: 15px
}

.signup__container .left-section .redirect-button {
	text-align: center;
}
.signup__container .left-section .redirect-button a {
	text-decoration: none;
	color: #fff;
}
.signup__container .left-section .button {
  padding: 13px 35px;
  font-weight: 500;
  border-radius: 28px;
}

.signup__container .left-section .button--primary {  
  text-align: center;
  padding-left:30px;
  padding-right:30px;
  border: 2px solid #e35ee6;
  font-size: 14px;
  line-height: 19px;  
  margin-bottom: 10px;
}

.signup__container .right-section {
  position: relative;
  background-color: #fff;
  border-radius: 10px;
  padding: 5px;
  width:70%;
}
.signup__container .right-section img {
	width: 75%;
}
	 
.preview-bg-color { background-color: #f5f5fa; }
.previewheader {
	height: 48px;
}
.previewbanner {
	height: 250px;

}	 
.previewfooter {height: 358px; }

.left-section
	 {
 
    width: 312px !important;
		 padding:0px !important;
	 }
	 .width264
	 {
		 width:264px;
		 margin:0 auto;
	 }
	 #wpcontent
{
	padding-left:0px !important;
}
	 .right-section
	 {
		  width:76% !important;
	 }
	 .color-picker, dropdown
	 {
		 height:48px;
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
</style>

<script>
const defaultColorValue = '<?php echo esc_html($defaultcolor) ?>';       

window.addEventListener('load', (event) => {
    //let chatbotMarkup;
    //const chatbotContainer = document.querySelector('.signup__container .right-section');
	const businessSelector = document.querySelector('.signup__container #chatbot-template-dropdown');
    fetch('https://start.amy.us/api/amy/businessTypes')
        .then(response => response.json())
        .then(data => {
	        const businessTypes = data.businessTypes;
            //const businessTypes = ['a','b'];
            let optionString = ``;
            businessTypes.forEach(item => {
                optionString += `<option data-value="${item}">${item}</option>`;
            });
            if(businessSelector) {
                businessSelector.insertAdjacentHTML('beforeend',optionString);
            }
	    }); 
    const colorPicker = document.querySelector('#amyColorPicker .picker');
    colorPicker.value = defaultColorValue;
    colorPicker.addEventListener('input', updateBotHeaderColor, false);
});
    

function updateBotHeaderColor(event) {
    const colorTextBox = document.querySelector('.signup__container #amyColorPicker .textbox');
    if(colorTextBox) {
        colorTextBox.value = event.target.value;
    } 
	document.getElementById("selectedcolor").value = colorTextBox.value;
    if(AmyAPI) {
        AmyAPI ?. set("livechat.chatWindow.color", colorTextBox.value);
		AmyAPI ?. set("livechat.button.color", colorTextBox.value);
    } 
}
function updatebusinesstype(){
	if(AmyAPI) {
		AmyAPI ?. do("livechat.chat.endChat");      
    } 
	var businesstype = document.getElementsByName("listBusinessType")[0].value;
	var colorval = document.querySelector('.signup__container #amyColorPicker .textbox').value;
	document.getElementsByName("listBusinessType")[0].disabled = true;
    sendData(colorval, businesstype);
	
	if(AmyAPI) {		
		setTimeout(function(){ AmyAPI ?. do("livechat.chat.endChat"); }, 4000);	
		setTimeout(function(){ AmyAPI ?. do("livechat.chat.close"); }, 5000);	
		setTimeout(function(){ AmyAPI ?. do("livechat.button.click"); 
							  AmyAPI ?. set("livechat.chatWindow.color", colorval);
		AmyAPI ?. set("livechat.button.color", colorval);document.getElementsByName("listBusinessType")[0].disabled = false;}, 8000);		
    } 
	
	//document.forms['businesstypechange'].submit();
}

$(document).ready(function() {
    console.log( "ready!" );
	var isvisible = true;
	document.getElementsByName("listBusinessType")[0].disabled = true;
	AmyAPI.onReady = function(){			
		AmyAPI.on('livechat.chat.display', function () {
			if(isvisible == true){
				document.getElementsByName("listBusinessType")[0].disabled = false;
			}			
			isvisible = false;
		});
	}
});

function loadfirsttime(){
	AmyAPI ?. do("livechat.chat.endChat");
	AmyAPI ?. do("livechat.chat.close");	
}

function sendData(amycolor,amybusinesstype) {
	var formData = {
	"selectedcolor": amycolor,
	"businesstypechange": '',
	"listBusinessType":amybusinesstype,
	"nonce_businesstypechange":"<?php echo wp_create_nonce("nonce_businesstypechange") ?>"
	};
	$.ajax({
	type: "POST",
	url: "",
	data: $.param(formData),
	contentType: 'application/x-www-form-urlencoded; charset=UTF-8'
	}).done(function (data) {
	console.log('success:'+data);
	}).fail(function(data) {
	console.log('failure : '+data);
	});
}

</script>

<body style="background-color: #f7f2f7;margin:0">
	<?php amy_installpreviewcode() ?>
	        <!--<script src="beforeSignup.js"></script>-->
       <div class="signup__container">
            <div class="left-section">
              <h1 style="width: 264px;margin: 0 auto;margin-top: 31px;">
                  <!--  <svg class="amy-icon" focusable="false" viewBox="0 0 24 28" aria-hidden="true"><g> <circle r="11.9896" transform="matrix(-1 0 0 1 12.0104 11.9896)" fill="#F482FA"></circle> <path d="M5.27969 17.5505C1.41957 13.6918 1.74112 7.99556 2.22346 5.14746C0.868319 6.41073 -3.08226 15.0239 4.6122 21.2025C10.7678 26.1453 17.176 23.3998 19.4958 21.3403C12.9957 23.752 9.26697 21.5363 5.27969 17.5505Z" fill="#E97BEE"></path> <ellipse rx="1.01062" ry="1.81451" transform="matrix(-1 0 0 1 19.2501 10.5089)" fill="#012138"></ellipse> <ellipse rx="1.01062" ry="1.81451" transform="matrix(-1 0 0 1 16.5294 10.9612)" fill="#012138"></ellipse> <ellipse rx="9.81147" ry="0.661056" transform="matrix(-1 0 0 1 11.9786 26.9526)" fill="#01101C"></ellipse> </g>
                    </svg> -->
				  <img style="vertical-align:unset; float:left" src=<?php echo $plugin_url ?>./images/logo.svg>
                    <span class="heading" style="margin-left:17px">Amy</span>
					</h1>
					
					
                
        
                <form method="post" action="" name="businesstypechange" class="width264">
				<div class="color-box" style="margin-top:50px;">
                    
                    <div>
                        <div class="color-text">Color</div>
                        <div id="amyColorPicker" class="color-picker">
                            <input type="text" value="<?php echo esc_html($defaultcolor)?>" class="textbox" name="selectedcolor">
                            <input type="color" value="<?php echo esc_html($defaultcolor)?>" class="picker">
                        </div>
                        <div class="color-text">Business Type</div>
				
				<input type=hidden name="businesstypechange" id="businesstypechange">
                        <div class="dropdown">
                            <select id="chatbot-template-dropdown" name="listBusinessType" onchange="updatebusinesstype();" class="form-control white-backgorund">
<?php amy_loadbusinesstypes(amy_get_businesstype()); ?>
                            </select>
                        </div>
                 </form>
                    </div>
                </div>
	 <form name="signup" action="" method="post">
	<input type=hidden name="selectedcolor" id="selectedcolor" value="<?php echo esc_html($defaultcolor) ?>"/>
	<input type="hidden" name="nonce_signup" id="nonce_signup" style="display:none" value="<?php echo wp_create_nonce("nonce_signup")?>" />
	<input type=hidden name="signup" id="signup" />
	</form>
                <div class="signup-refer-text width264">Want to further customize the chatbot and to get it live?</div>
				<div class="redirect-button width264">
                	<div class="button button--primary width264 amy-btn-primary" style="height:48px;font-weight:bold;"> <a href="javascript:document.forms['signup'].submit();"> Sign up for FREE </a></div>
					
				</div>
            </div>
            <div class="right-section">
                <!--<img src="<?php echo esc_html($backimagepath) ?>" />-->
				<div style="height:48px;background-color:#f5f5fa;width:100%;">					
				</div>			
				<div class="previewbanner" style="margin-top:10px;background-color:#f5f5fa;width:100%;text-align:center;padding-top:100px;padding-bottom:100px;margin-bottom:10px;">
					<span style="font-weight:700;color:#b6b8d1;font-size:34px;line-height:51px;">Your Website</span>
				</div>			
			<div style="margin-bottom:2px;">
				<div class="preview-bg-color" style="height:162px;background-color:#f5f5fa;display:inline-block;width: 33%;">

				</div>
				<div class="preview-bg-color" style="height:162px;background-color:#f5f5fa;display:inline-block;width: 33%;float:right">

				</div>
				<div class="preview-bg-color" style="height:162px;background-color:#f5f5fa;display:inline-block;width: 33%;">

				</div>
			</div>
			<div class="preview-bg-color">
				<div class="previewfooter">

				</div>
			</div>				
            </div>
        </div>

    </body>
	
<?php
}
?>