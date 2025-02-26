<?php
global $wpdb;
    @include("../settings.php");
echo "<table width=". $pluginwidth ."><tr><td>". $activitybanner ."</tr></td>";

    $query = "SELECT * FROM " . $wpdb->prefix . "microB ORDER BY ID DESC LIMIT " . $microblogresults;
    $res = mysql_query($query);
    
while($row = mysql_fetch_assoc($res))
{
    $exploded_stamp = explode(' ', $row['date']);
    $exploded_time = explode(':', $exploded_stamp[1]);
    $exploded_date = explode('-', $exploded_stamp[0]);
    $stamp_NOW=getdate(date("U"));


    echo '<font size="' . $fontsize . '"><tr><td ';

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
if (($row['article'] == 0) or ($row['article'] == 1)){


echo '><font size=' . $fontsize . ' color=' . $fontcolour . '>A microblog was posted</font><small><font color=' . $secondaryfontcolour . '>';

}else {
echo '><font size=' . $fontsize . ' color=' . $fontcolour . '>'.$row['blog'].'</font><small><font color=' . $secondaryfontcolour . '>';
}
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
echo "</table>";
?>