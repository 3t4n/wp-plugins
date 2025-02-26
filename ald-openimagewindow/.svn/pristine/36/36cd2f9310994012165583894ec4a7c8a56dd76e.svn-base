/* Open Picture Window WordPress Plugin*/
function ald_OpenPictureWindow(theURL, winName, features, myWidth, myHeight, isCenter, myTitle)
{
	var ald_opw = null;
	var settings;
	myWidth = parseInt(myWidth) + 20;
	myHeight = parseInt(myHeight) + 100;
	settings = 'width='+myWidth+',height='+myHeight;
	
	if(!myTitle) myTitle = "Brought to you by Open Picture Window Plugin";
	
	if(isCenter)		// Position in center of window
	{
		var myLeft = (screen.width) ? (screen.width-myWidth)/2 : 0;
		var myTop = (screen.height) ? (screen.height-myHeight)/2 : 0;
		
		settings +=',left='+myLeft+',top='+myTop;
	}
	
	if(features!='') settings +=','+features;		// add features passed as argument

	ald_opw = window.open('',winName,settings);	
	with (ald_opw.document)
	{
		open('text/html', 'replace');
		write('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\n');
		write('<html xmlns="http://www.w3.org/1999/xhtml">\n');
		write('<head><title>');
		write(myTitle);
		write('</title>\n');
		write('<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />\n');
		write('<meta http-equiv="imagetoolbar" content="no" />\n');
		write('<meta name="generator" content="Open Picture Window Plugin" />\n');
		write('<script type="text/javascript">\n');
		write('self.resizeTo('+myWidth+','+myHeight+');\n');
		write('self.focus()\n');
		write('</script>\n');
		write('</head>\n');
		write('<body style="border:0;margin:0;text-align:center">\n');
		write('<a href="javascript:self.close()">');
		write('<img src="'+ theURL +'" style="border:none"');
		write('title="'+ myTitle +'" alt="'+ myTitle +'" ');
		write('/>');
		write('</a>\n');
		write('</body></html>\n');
		close();
	}

}
