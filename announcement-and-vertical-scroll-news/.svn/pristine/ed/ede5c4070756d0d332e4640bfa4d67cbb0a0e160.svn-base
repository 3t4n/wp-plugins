/*
##########################################################################################################
###### Project   : Announcement and vertical scroll news  											######
###### File Name : noenter.js                   													######
###### Purpose   : This javascript is to hide enter key press from the page text box & text area  	######
###### Date      : April 04th 2010                  												######
###### Author    : Gopi.R                        													######
##########################################################################################################
*/

function gAnnounceNoEnterKey(e)
{
    var pK = e ? e.which : window.event.keyCode;
    return pK != 13;
}
document.onkeypress = gAnnounceNoEnterKey;
if (document.layers) document.captureEvents(Event.KEYPRESS);
