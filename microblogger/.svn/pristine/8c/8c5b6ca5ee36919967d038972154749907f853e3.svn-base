<?php

@include("../../../wp-blog-header.php");
    global $wpdb;
    
@include("settings.php");

    $table = $wpdb->prefix."microB";
    
    $query = "SELECT * FROM " . $wpdb->prefix . "microB WHERE article='1' OR article='0' ORDER BY ID DESC LIMIT " . $RSSLength;
    $res = mysql_query($query);
    
echo('<rss version="2.0"><channel>

    <title>'. $RSSTitle .'</title>
    <description>'. $RSSDescription .'</description>
    <link>'. $RSSLink .'</link>
    <language>en-us</language>');

while($row = mysql_fetch_assoc($res))
{

echo ('
<item>
<title>' . $row['blog'] . '</title>
');
echo ('<link>' . ABSPATH . '</link>
');
    
echo ('<description>' . $row['blog'] . '</description>
</item>
');



}
echo('</channel></rss>');

?>