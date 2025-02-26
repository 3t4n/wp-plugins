<?php
    @include("../settings.php");
    global $wpdb;
    $query = "SELECT * FROM " . $wpdb->prefix . "microB WHERE article='1' OR article='0' ORDER BY ID DESC LIMIT " . $activityresults;
    $res = mysql_query($query);

    
echo "<table width=". $pluginwidth ."><tr><td>";

if ($RSSOn == 'TRUE'){
echo "</td></tr> <A href='wp-content/plugins/microblogger/rss.php'><img src='wp-content/plugins/microblogger/images/rss-icon.gif' /></A>";
}
echo $microblogbanner ."</tr></td>";
while($row = mysql_fetch_assoc($res))
{
    $exploded_stamp = explode(' ', $row['date']);
    $exploded_time = explode(':', $exploded_stamp[1]);
    $exploded_date = explode('-', $exploded_stamp[0]);
    $stamp_NOW=getdate(date("U"));


    echo '<font size="2"><tr><td ';

if ($row['article'] == 0){
echo "bgcolor=" . $microblogcolour;
}
if ($row['article'] == 1){
echo "bgcolor=" . $articlefollowscolour;
}
if ($row['article'] == 2){
echo "bgcolor=" . $admincolour;
}
if ($row['article'] == 3){
echo "bgcolor=" . $usercolour;
}

echo '><font size=' . $fontsize . ' color=' . $fontcolour . '>'.$row['blog'].'</font><small><font color=' . $secondaryfontcolour . '>';

if ($showtime == 'TRUE'){
        echo " (";
        if ( $stamp_NOW[mday] == $exploded_date[2] ) {
            echo 'Today, ' . $exploded_time[0] . ':' . $exploded_time[1];
        }

        else {
            echo $exploded_date[2] . '/' . $exploded_date[1];
        }

echo ")";
}
echo '</small></font></td></tr>';
}

echo "</TABLE>";

?>