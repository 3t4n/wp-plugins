jQuery(document).ready(function(){jQuery('input[type="text"]').focus(function(){jQuery(this).removeClass('error')});jQuery('input[type="text"]').blur(function(){jQuery(this).addClass('error')});jQuery('#message').focus(function(){jQuery(this).removeClass('error')});jQuery('#message').blur(function(){jQuery(this).addClass('error')});jQuery("#submit").click(function(){var name=jQuery("#name").val();var email=jQuery("#email").val();var number=jQuery("#number").val();var message=jQuery("#message").val();var captcha=jQuery("#captcha").val();var reg=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;var pattern=/^\d{10}$/;if(jQuery("#name").val()==0)
{jQuery("#name").addClass("error");var ok=!1}
else{jQuery("#name").removeClass("error");var ok=!0}
if(!reg.test(email))
{jQuery("#email").addClass("error");var ok1=!1}
else{jQuery("#email").removeClass("error");var ok1=!0}
if(!pattern.test(number))
{jQuery("#number").addClass("error");var ok2=!1}
else{jQuery("#number").removeClass("error");var ok2=!0}
if(jQuery("#message").val()=="")
{jQuery("#message").addClass("error");var ok3=!1}
else{jQuery("#message").removeClass("error");var ok3=!0}
if(jQuery("#captcha").val()=="<?php echo $security_code; ?>")
{jQuery("#captcha").removeClass("error");var ok4=!0}
else{jQuery("#captcha").addClass("error");var ok4=!1}
if(ok==!0&&ok1==!0&&ok2==!0&&ok3==!0&&ok4==!0)
{jQuery.ajax({url:"<?php echo plugins_url(); ?>/sliding-enquiry-form/mail.php",type:"POST",contentType:!1,processData:!1,data:function(){var data=new FormData();data.append("name",jQuery("#name").val());data.append("email",jQuery("#email").val());data.append("number",jQuery("#number").val());data.append("message",jQuery("#message").val());data.append("captcha",jQuery("#captcha").val());data.append("serveremailid",jQuery("#serveremailid").val());return data}(),error:function(_,textStatus,errorThrown){console.log(textStatus,errorThrown)},success:function(response,textStatus){if(response==0)
{jQuery("#enquiryform").hide();jQuery("#enquirymsg").show()}
else if(responce==1)
{alert("send not")}
console.log(response,textStatus)}});return!0}
else{return!1}})})