<?php
@include("../../../../wp-blog-header.php");
// SETTINGS

global $wpdb;
$table = $wpdb->prefix."microBsettings";

$query = "SELECT * FROM $table WHERE 1";
$res = mysql_query($query);
$row = mysql_fetch_assoc($res);
?>

<h1>Write a microblog!</h1>

<br>


<br>
<form action="../wp-content/plugins/microblogger/modules/admin_blog-logic.php" method="post">
<input type="text" name="blog" /><br><br>

Full article on the way? <input type="checkbox" name="article" /><br>

<input type="submit" value="Blog!" />
</form>
<?php
echo ('
<form action="../wp-content/plugins/microblogger/modules/admin_settings-logic.php" method="post">
<br>
<h1>Microblogger Settings:</h1>

<table BORDER=0>
    <tr>
        <td>
            <b>Mobile blogging</b>
        </td>
    </tr>

    <tr>
        <td>
           PIN
        </td>
        <td>
            <input type="text" name="pin" value="' . $row['pin'] . '" />
        </td>
    </tr>

    <tr>
        <td>
           Mobile Page Title
        </td>
        <td>
            <input type="text" name="mobiletitle" SIZE="50" value="' . $row['mobiletitle'] . '" />
        </td>
    </tr>

    <tr>
        <td>
            <b>Title Banners</b>
        </td>
    </tr>

    <tr>
        <td>
            The title banner of the microblog module
        </td>
        <td>
            <input type="text" name="microblogbanner" SIZE="50" value="' . $row['microblogbanner'] . '"/>
        </td>
    </tr>
    
    <tr>
        <td>
            The title banner of the activity module
        </td>
        <td>
            <input type="text" name="activitybanner" SIZE="50" value="' . $row['activitybanner'] . '"/>
        </td>
    </tr>
    <tr>
        <td>
            <b>Admin area settings</b>
        </td>
    </tr>
    <tr>
        <td>
            Show the admin blog widget?
        </td>
        <td>
            <input type="text" name="adminblogmodule" value="' . $row['adminblogmodule'] . '" />
        </td>
    </tr>
    <tr>
        <td>
            <b>Layout</b>
        </td>
    </tr>
    <tr>
        <td>
           Plugin width
        </td>
        <td>
            <input type="text" name="pluginwidth" value="' . $row['pluginwidth'] . '" />
        </td>
    </tr>
    
    <tr>
        <td>
            Show the microblog module
        </td>
        <td>
            <input type="text" name="microblogmodule" value="' . $row['microblogmodule'] . '" />
        </td>
    </tr>
    
    <tr>
        <td>
            Show the activity module
        </td>
        <td>
            <input type="text" name="activitymodule" value="' . $row['activitymodule'] . '" />
        </td>
    </tr>
    
    <tr>
        <td>
            Show the key module
        </td>
        <td>
            <input type="text" name="keymodule" value="' . $row['keymodule'] . '" />
        </td>
    </tr>

        <tr>
        <td>
           Blog and activity font size
        </td>
        <td>
            <input type="text" name="fontsize" value="' . $row['fontsize'] . '" />
        </td>
    </tr>

        <tr>
        <td>
           Show date and time on blog/activity posts
        </td>
        <td>
            <input type="text" name="showtime" value="' . $row['showtime'] . '" />
        </td>
    </tr>

    <tr>
        <td>
            <b>Colour Schemes</b>
        </td>
    </tr>
    
    <tr>
        <td>
            Microblog colour
        </td>
        <td>
            <input type="text" name="microblogcolour" value="' . $row['microblogcolour'] . '" />
        </td>
    </tr>

    <tr>
        <td>
            Article following microblog colour
        </td>
        <td>
            <input type="text" name="articlefollowscolour" value="' . $row['articlefollowscolour'] . '" />
        </td>
    </tr>
    
    <tr>
        <td>
            Admin activity colour
        </td>
        <td>
            <input type="text" name="admincolour" value="' . $row['admincolour'] . '" />
        </td>
    </tr>
    
    <tr>
        <td>
            User activity colour
        </td>
        <td>
            <input type="text" name="usercolour" value="' . $row['usercolour'] . '" />
        </td>
    </tr>

    <tr>
        <td>
            Font colour
        </td>
        <td>
            <input type="text" name="fontcolour" value="' . $row['fontcolour'] . '" />
        </td>
    </tr>

    <tr>
        <td>
            Secondary font colour
        </td>
        <td>
            <input type="text" name="secondaryfontcolour" value="' . $row['secondaryfontcolour'] . '" />
        </td>
    </tr>

    <tr>
        <td>
            <b>Number of results displayed</b>
        </td>
    </tr>
    
    <tr>
        <td>
            ...in microblog
        </td>
        <td>
            <input type="text" name="microblogresults" value="' . $row['microblogresults'] . '" />
        </td>
    </tr>

    <tr>
        <td>
            ...in activity
        </td>
        <td>
            <input type="text" name="activityresults" value="' . $row['activityresults'] . '" />
        </td>
    </tr>

    <tr>
        <td>
            <b>Order of modules</b>
        </td>
    </tr>
    
    <tr>
        <td>
            Microblog
        </td>
        <td>
            <input type="text" name="microblogorder" value="' . $row['microblogorder'] . '" />
        </td>
    </tr>

    <tr>
        <td>
            Activity
        </td>
        <td>
            <input type="text" name="activityorder" value="' . $row['activityorder'] . '" />
        </td>
    </tr>


    <tr>
        <td>
            <b>RSS Feed Settings</b>
        </td>
    </tr>


    <tr>
        <td>
            Display RSS Link?
        </td>
        <td>
            <input type="text" name="RSSOn" value="' . $row['RSSOn'] . '" /> (TRUE/FALSE)
        </td>
    </tr>
    <tr>
        <td>
            RSS Feed Title
        </td>
        <td>
            <input type="text" name="RSSTitle" value="' . $row['RSSTitle'] . '" />
        </td>
    </tr>

    <tr>
        <td>
            RSS Description
        </td>
        <td>
            <input type="text" name="RSSDescription" value="' . $row['RSSDescription'] . '" />
        </td>
    </tr>

    <tr>
        <td>
            RSS Link URL
        </td>
        <td>
            <input type="text" name="RSSLink" value="' . $row['RSSLink'] . '" />
        </td>
    </tr>

    <tr>
        <td>
            RSS feed length
        </td>
        <td>
            <input type="text" name="RSSLength" value="' . $row['RSSLength'] . '" />
        </td>
    </tr>
</table>
<input type="submit" value="Update" />
</form>

');
?>