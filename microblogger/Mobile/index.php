<?php
//     SETTINGS -- EDIT THESE     \\
$server = "localhost";     // The server on which your database resides (normally localhost)
$dbuser = "username";     // The username for the database that contains the data for your blog
$db = "yourdatabase";     // The database that contains the data for your blog
$password = "abcd";   // Your database password
//     Finish editting, (if you want...)
?>
<?php
//     FIND TABLE PREFIX

mysql_connect($server, $dbuser, $password) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());


$showtablequery = "SHOW TABLES";
 
$showtablequery_result	= mysql_query($showtablequery);
$showtablerow = mysql_fetch_array($showtablequery_result);

$exploded_tname = explode('_', $showtablerow[0]);

$prefix = $exploded_tname[0] . "_";

// GET PIN AND TITLE FROM DATABASE

$query = "SELECT * FROM " . $prefix . "microBsettings";
$setres = mysql_query($query);
$settings = mysql_fetch_assoc($setres);
$pin = $settings['pin'];
$title = $settings['mobiletitle'];

?>



<html>
<title><?php echo $title ?></title>
<body>
<center>
<h1><?php echo $title ?></h1>







<br>
<FORM action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
Pin:  <input type="text" name="pin" length="4" /><br>
Blog: <input type="text" name="blog" /><br>
Article follows? 
<input type="checkbox" name="article" /><br>
<input type="submit" value="Blog!" />
</form>


<?php

//     POST MICROBLOG


$content = $_POST['blog'];
$checkb = $_POST['article'];


if ($checkb == 'on')
{
    $article = 1;
}else{
    $article = 0;
}
if (is_null($content) == FALSE)
      {
        if ($pin == $_POST['pin']){

      
      mysql_query("INSERT INTO " . $prefix . "microB (blog, article) VALUES ('" .  $content . "', '" . $article . "')") or die('Error, insert query failed');
echo "'" . $content . "' blogged! as " . $article;
     }
else {
    echo "The pin you provided was incorrect, please try again.";
}
}


//     GET RECENT POSTS


    $query = "SELECT * FROM " . $prefix . "microB ORDER BY ID DESC LIMIT 5";
    $res = mysql_query($query);
    echo "<H3>Latest blog activity:</h3><h2>";
    echo "<table border='0'>";
    echo "<tr><td>";

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
if (($row['article'] == 0) or ($row['article'] == 1)){


echo '>A microblog was posted<small><font color=#3B9C9C> (';

}else {
echo '>'.$row['blog'].'<small><font color=#3B9C9C> (';
}
        if ( $stamp_NOW[mday] == $exploded_date[2] ) {
            echo 'Today, ' . $exploded_time[0] . ':' . $exploded_time[1];
        }

        else {
            echo $exploded_date[2] . '/' . $exploded_date[1];
        }

    echo ')</small></font></td></tr>';
}
echo "</table>";
?>
</body>
</html>
