//return an istance of xmlhttp 
function xmlHttpInit(){
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
return xmlhttp;	  
}

//Validate email
function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

//delete this field value
function deleteMe(field)
{
	field.value="";
	jQuery("#daext-email").css("color","#555555");
}

//send the mail to the selected recipient
function contactMe(){
	xmlhttp=xmlHttpInit();
	emailSender=document.getElementById("daext-email").value;
	emailRecipient=document.getElementById("daext-email-recipient").value;
	if(!validateEmail(emailSender)){
		jQuery("#daext-email").css("color","#880000");
		return;
	}
	jQuery("#daext-img").fadeIn(0);
	params="email_sender="+escape(emailSender)+"&email_recipient="+escape(emailRecipient);
	xmlhttp.open("POST",blog_url+"/wp-content/plugins/ajax-contact-module/ajax/ajax.php",false);
	//Send the proper header information along with the requesthttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.send(params);
	//hide the form
	jQuery("#daext-img").fadeOut(0);
	jQuery('#daext-p').fadeOut(0);
	jQuery('#daext-p-sent').fadeIn(0);
	jQuery('#daext-form').fadeOut(0);
	jQuery('#daext-newsletterform').delay(3000).fadeOut(1000);
}
