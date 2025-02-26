<?php
@include("../../../../wp-blog-header.php");

global $wpdb;
$table = $wpdb->prefix."microBsettings";
        
        mysql_query("TRUNCATE TABLE ". $wpdb->prefix."microBsettings");

      $query = "INSERT INTO " . $wpdb->prefix."microBsettings" . " (
                      pin,
                      adminblogmodule,
                      mobiletitle,
                      fontcolour,
                      pluginwidth,
                      activitybanner,
                      microblogbanner,
                      microblogcolour,
                      articlefollowscolour,
                      admincolour,
                      usercolour,
                      keymodule,
                      microblogmodule,
                      activitymodule,
                      microblogorder,
                      activityorder, 
                      microblogresults,
                      activityresults,
                      fontsize,
                      secondaryfontcolour,
                      showtime,
                      RSSOn,
                      RSSLength,
                      RSSTitle,
                      RSSDescription,
                      RSSLink
                      )VALUES (
                    '$_POST[pin]',
                    '$_POST[adminblogmodule]',
                    '$_POST[mobiletitle]',
                    '$_POST[fontcolour]',
                    '$_POST[pluginwidth]',
                    '$_POST[activitybanner]',
                    '$_POST[microblogbanner]',
                    '$_POST[microblogcolour]',
                    '$_POST[articlefollowscolour]',
                    '$_POST[admincolour]',
                    '$_POST[usercolour]',
                    '$_POST[keymodule]',
                    '$_POST[microblogmodule]',
                    '$_POST[activitymodule]',
                    '$_POST[microblogorder]',
                    '$_POST[activityorder]',
                    '$_POST[microblogresults]',
                    '$_POST[activityresults]',
                    '$_POST[fontsize]',
                    '$_POST[secondaryfontcolour]',
                    '$_POST[showtime]',
                    '$_POST[RSSOn]',
                    '$_POST[RSSLength]',
                    '$_POST[RSSTitle]',
                    '$_POST[RSSDescription]',
                    '$_POST[RSSLink]'
);";
mysql_query($query) or die('Error, insert query failed');
      $URL = $_SERVER["HTTP_REFERER"];
        header ("Location: $URL");
     

?>
