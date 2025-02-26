<?php

//
//     |||||      MICROBLOG SETTINGS      |||||
//
global $wpdb;

$query = "SELECT * FROM " . $wpdb->prefix . "microBsettings";
$res = mysql_query($query);
$row = mysql_fetch_assoc($res);
$result = mysql_query($query); 

// MOBILE

$pin = $row['pin'];

$mobiletitle = $row['mobiletitle']; 

// LAYOUT
$pluginwidth = $row['pluginwidth']; 

$activitybanner = $row['activitybanner'];     //The title part of the activity module

$microblogbanner = $row['microblogbanner'];              //The title part of the microblog module

$showtime = $row['showtime'];
// COLOUR SCHEMES;

$microblogcolour = $row['microblogcolour'];		//The colour of the microblog background

$articlefollowscolour = $row['articlefollowscolour'];	//The colour of the microblog with article following background

$admincolour = $row['admincolour'];		//The colour of the admin activity background

$usercolour = $row['usercolour'];		//The colour of the user activity background

$fontcolour = $row['fontcolour'];

$secondaryfontcolour = $row['secondaryfontcolour'];

$fontsize = $row['fontsize'];
// MODULE INCLUSIONS

$keymodule = $row['keymodule'];          //The module explaining the colours of activities

$microblogmodule = $row['microblogmodule'];    //The microblog module

$activitymodule = $row['activitymodule'];      //The recent activity module

// MODULE ORDER

$activityorder = $row['activityorder'];         //The position of the activity module (if applicable) - 1 or 2
$microblogorder = $row['microblogorder'];         //The position of the microblog module (if applicable) - 1 or 2

// NUMBERS OF RESULT FETCHED FROM DATABASE

$microblogresults = $row['microblogresults'];		//The number of results shown by the microblog
$activityresults = $row['activityresults']; 		//The number of results shown in the activity module


// RSS SETTINGS

$RSSOn = $row['RSSOn'];
$RSSLength = $row['RSSLength'];
$RSSTitle = $row['RSSTitle'];
$RSSDescription = $row['RSSDescription'];
$RSSLink = $row['RSSLink'];
?>