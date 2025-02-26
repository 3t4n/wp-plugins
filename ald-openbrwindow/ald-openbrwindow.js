/*Center Browser window */
function ald_OpenBrWindow(theURL, winName, features, myWidth, myHeight, isCenter)
{
	var ald_win = null;
	var settings;
	settings = 'width='+myWidth+',height='+myHeight;
	
	if(isCenter)		// Position in center of window
	{
		var myLeft = (screen.width) ? (screen.width-myWidth)/2 : 0;
		var myTop = (screen.height) ? (screen.height-myHeight)/2 : 0;
		
		settings +=',left='+myLeft+',top='+myTop;
	}
	
	if(features!='') settings +=','+features;		// add features passed as argument
	ald_win = window.open(theURL,winName,settings);
}
