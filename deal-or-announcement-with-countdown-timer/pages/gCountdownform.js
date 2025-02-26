function gCountdownform()
{
	if(document.gCountform.gCount.value=="")
	{
		alert(deal_or_announcement_adminscripts.gCount);
		document.gCountform.gCount.focus();
		return false;
	}
	else if(document.gCountform.gCountdisplay.value=="")
	{
		alert(deal_or_announcement_adminscripts.gCountdisplay);
		document.gCountform.gCountdisplay.focus();
		return false;
	}
	else if(document.gCountform.gCountmonth.value=="")
	{
		alert(deal_or_announcement_adminscripts.gCountmonth);
		document.gCountform.gCountmonth.focus();
		return false;
	}
	else if(document.gCountform.gCountdate.value=="")
	{
		alert(deal_or_announcement_adminscripts.gCountdate);
		document.gCountform.gCountdate.focus();
		return false;
	}
	else if(document.gCountform.gCountyear.value=="")
	{
		alert(deal_or_announcement_adminscripts.gCountyear);
		document.gCountform.gCountyear.focus();
		return false;
	}
	else if(document.gCountform.gCounthour.value=="")
	{
		alert(deal_or_announcement_adminscripts.gCounthour);
		document.gCountform.gCounthour.focus();
		return false;
	}
	else if(document.gCountform.gCountzoon.value=="")
	{
		alert(deal_or_announcement_adminscripts.gCountzoon);
		document.gCountform.gCountzoon.focus();
		return false;
	}
}

function gCountdelete(id)
{
	if(confirm(deal_or_announcement_adminscripts.gCountdelete))
	{
		document.frm_gCountdisplay.action="options-general.php?page=deal-with-countdown&ac=del&did="+id;
		document.frm_gCountdisplay.submit();
	}
}	

function gCountredirect()
{
	window.location = "options-general.php?page=deal-with-countdown";
}

function gCounthelp()
{
	window.open("http://www.gopiplus.com/work/2010/07/18/deal-or-announcement-with-countdown-timer/");
}