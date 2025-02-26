/*
##########################################################################################################
###### Project   : Announcement and vertical scroll news  											######
###### File Name : gAnnounceform.js                   												######
###### Purpose   : To validate Announcement admin form 												######
###### Date      : April 04th 2010                  												######
###### Author    : Gopi.R                        													######
##########################################################################################################
*/

function _gAnnounce()
{
	if((document.gAnnouncefrm.gAnn_text.value).trim()=="")
	{
		alert("Please enter the news")
		document.gAnnouncefrm.gAnn_text.focus();
		return false;
	}
	else if((document.gAnnouncefrm.gAnn_order.value).trim()=="")
	{
		alert("Please enter the display order.")
		document.gAnnouncefrm.gAnn_order.focus();
		return false;
	}
	else if(isNaN(document.gAnnouncefrm.gAnn_order.value))
	{
		alert("Please enter the display order in number.");
		document.gAnnouncefrm.gAnn_order.focus();
		document.gAnnouncefrm.gAnn_order.select();
		return false;
	}
	else if(document.gAnnouncefrm.gAnn_status.value=="")
	{
		alert("Please select the display status.")
		document.gAnnouncefrm.gAnn_status.focus();
		return false;
	}
	escapeVal(document.gAnnouncefrm.gAnn_text,'<br>');
}
String.prototype.trim = function() 
{
	return this.replace(/^\s+|\s+$/g,"");
}

function escapeVal(textarea,replaceWith)
{
textarea.value = escape(textarea.value) //encode textarea strings carriage returns
for(i=0; i<textarea.value.length; i++)
{
	//loop through string, replacing carriage return encoding with HTML break tag
	if(textarea.value.indexOf("%0D%0A") > -1)
	{
		//Windows encodes returns as \r\n hex
		textarea.value=textarea.value.replace("%0D%0A",replaceWith)
	}
	else if(textarea.value.indexOf("%0A") > -1)
	{
		//Unix encodes returns as \n hex
		textarea.value=textarea.value.replace("%0A",replaceWith)
	}
	else if(textarea.value.indexOf("%0D") > -1)
	{
		//Macintosh encodes returns as \r hex
		textarea.value=textarea.value.replace("%0D",replaceWith)
	}
}
textarea.value=unescape(textarea.value) //unescape all other encoded characters
}

function ConvertBR(input) 
{
	var output = "";
	for (var i = 0; i < input.length; i++) 
	{
		if ((input.charCodeAt(i) == 13) && (input.charCodeAt(i + 1) == 10)) 
		{
			i++;
			output += "";
		} 
		else 
		{
			output += input.charAt(i);
		}
	}
	//return output;
	alert(output)
}