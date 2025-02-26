<?php

@include("../../../../wp-blog-header.php");
    global $wpdb;
    $table = $wpdb->prefix."microB";
$content = $_POST['blog'];
$checkb = $_POST['article'];
$givenpin = $_POST['givenpin'];

//if ($givenpin == $pin){

if ($checkb == 'on')
{
    $article = 1;
}else{
    $article = 0;
}

if (is_null($content) == FALSE)
      {
      mysql_query("INSERT INTO $table (blog, article) VALUES ('" .  $content . "', '" . $article . "')") or die('Error, insert query failed');
      
      $URL = $_SERVER["HTTP_REFERER"];
        header ("Location: $URL");
     }
//}
//else {
//echo "The pin you supplied is incorrect. Please try again";
//}
?>