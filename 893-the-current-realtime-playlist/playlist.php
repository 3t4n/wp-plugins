<?php
/*
Plugin Name: 89.3 The Current - Playlist
Plugin URI: http://scaredpanda.com/893-the-current-playlist-widget/
Description: Realtime Playlist for 89.3 The Current, from Minnesota Public Radio
Author: Clint McMahon
Version: 1
Author URI: http://www.scaredpanda.com/
*/
function widget_GetPlaylist($args) 
{
extract($args);
  echo $before_widget;
  echo $before_title;?>89.3 The Current<?php echo $after_title;
  ?><div id="theCurrentPlaylist" />
  <script language="javascript">
function GetPlaylist()
{
	var xmlHttp;
	try
	{
		// Firefox, Opera 8.0+, Safari
		xmlHttp=new XMLHttpRequest();
	}
	catch (e)
	{
		// Internet Explorer
		try
		{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e)
		{
			try
			{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e)
			{
				alert("Your browser does not support AJAX!");
				return false;
			}
		}
	}
	xmlHttp.onreadystatechange=function()
    {
    if(xmlHttp.readyState==4)
      {
		//document.myForm.time.value=xmlHttp.responseText;
		var xmlDoc = xmlHttp.responseXML.documentElement;

		var artist = null;
		var title = null;
		var finalHtml = null;
		var naText = "blah";
		var notesrc = "http://minnesota.publicradio.org/standard/images/mpr005/icon_note.gif";
		var playlistDiv = document.getElementById('theCurrentPlaylist');
		try {
		//ajax request same as now_playing.js from the mpr website
		if(window.ActiveXObject) {
			artist = xmlDoc.getElementsByTagName("trackList")[0].getElementsByTagName("track")[0].getElementsByTagName("creator")[0].childNodes[0].nodeValue;
			title = xmlDoc.getElementsByTagName("trackList")[0].getElementsByTagName("track")[0].getElementsByTagName("title")[0].childNodes[0].nodeValue;
		} else if(window.XMLHttpRequest) {
			// Safari apparently throws an exception instead of assigning the variable to "undefined" (like every other browser).
			// So I must catch each and then do nothing as they are defaulted earlier.
			try {
				artist = xmlDoc.getElementsByTagName("trackList")[0].getElementsByTagName("track")[0].childNodes[3].firstChild.data;
			} catch(err) {}
			try {
				title = xmlDoc.getElementsByTagName("trackList")[0].getElementsByTagName("track")[0].childNodes[1].firstChild.data;
			} catch(err) {}
		}
		if (artist != null && title != null) {
			finalHtml = artist + " - " + title;
		}
	} catch(err) {
		playlistDiv.innerHTML = "booong. error.";
	}
		var nowPlaying = "<div>Now Playing</div>";
		var mprLink = "<div style='padding-top:3px'><a href='http://minnesota.publicradio.org/radio/services/the_current/songs_played/'>" + finalHtml + "</a></div>";
		playlistDiv.innerHTML = nowPlaying + mprLink;
		
      }
    }
  //xmlHttp.open("GET","/wp-content/plugins/getplaylist.php",true);
  //this variable needs to be set to the path of the widget. 
  //var helperFilePath = "/wordpress/wp-content/plugins/thecurrent-realtime-playlist/getplaylist.php";
  var helperFilePath = "/wp-content/plugins/thecurrent-realtime-playlist/getplaylist.php";
  xmlHttp.open("GET",helperFilePath,true);
  xmlHttp.send(null);
  var t;
  t=setTimeout("GetPlaylist()",10000);

}
GetPlaylist();

  </script>
  <?php
  echo $after_widget;
}

function GetPlaylist_init()
{
  register_sidebar_widget(__('89.3 The Current Playlist'), 'widget_GetPlaylist');
}
add_action("plugins_loaded", "GetPlaylist_init");
?>