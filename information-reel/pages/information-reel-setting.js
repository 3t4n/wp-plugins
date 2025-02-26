function IR_submit()
{
	if(document.IR_form.IR_path.value=="")
	{
		alert(IR_adminscripts.IR_path);
		document.IR_form.IR_path.focus();
		return false;
	}
	else if(document.IR_form.IR_link.value=="")
	{
		alert(IR_adminscripts.IR_link);
		document.IR_form.IR_link.focus();
		return false;
	}
	else if(document.IR_form.IR_target.value=="")
	{
		alert(IR_adminscripts.IR_target);
		document.IR_form.IR_target.focus();
		return false;
	}
	else if(document.IR_form.IR_title.value=="")
	{
		alert(IR_adminscripts.IR_title);
		document.IR_form.IR_title.focus();
		return false;
	}
	else if(document.IR_form.IR_desc.value=="")
	{
		alert(IR_adminscripts.IR_desc);
		document.IR_form.IR_desc.focus();
		return false;
	}
	else if(document.IR_form.IR_type.value == "Select")
	{
		alert(IR_adminscripts.IR_type);
		document.IR_form.IR_type.focus();
		return false;
	}
	else if(document.IR_form.IR_type.value=="")
	{
		alert(IR_adminscripts.IR_type1);
		document.IR_form.IR_type.focus();
		return false;
	}
	else if(document.IR_form.IR_status.value=="")
	{
		alert(IR_adminscripts.IR_status);
		document.IR_form.IR_status.focus();
		return false;
	}
	else if(document.IR_form.IR_order.value=="")
	{
		alert(IR_adminscripts.IR_order);
		document.IR_form.IR_order.focus();
		return false;
	}
	else if(isNaN(document.IR_form.IR_order.value))
	{
		alert(IR_adminscripts.IR_order);
		document.IR_form.IR_order.focus();
		return false;
	}
}

function IR_delete(id)
{
	if(confirm(IR_adminscripts.IR_delete))
	{
		document.frm_IR_display.action="options-general.php?page=information-reel&ac=del&did="+id;
		document.frm_IR_display.submit();
	}
}	

function IR_redirect()
{
	window.location = "options-general.php?page=information-reel";
}

function IR_help()
{
	window.open("http://www.gopiplus.com/work/2011/04/16/wordpress-plugin-information-reel/");
}