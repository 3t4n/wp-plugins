<?php
include_once("../../../../wp-config.php");

$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
if (!$link) {
    die('Not Connected : ' . mysql_error());
}

// connect to database
$db_selected = mysql_select_db(DB_NAME, $link);

mysql_query("SET character_set_client=utf8", $link);
mysql_query("SET character_set_connection=utf8", $link);
mysql_query("SET character_set_results=utf8", $link);

if (!$db_selected) {
    die ('Can\'t Connected : ' . mysql_error());
}


//include_once("function.php");

//header("Content-type: text/xml; charset=utf-8");
//header('Content-Type: application/rss+xml; charset=ISO-8859-1');
//header('Content-Type: application/atom+xml');

global $wpdb;
$itable		=	$wpdb->prefix."html5video_items";

if(isset($_REQUEST['id']) && $_REQUEST['id']!="")
 $id = $_REQUEST['id'];
 

$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n";

//$xml .= "<playlist version=\"1\" xmlns=\"http://xspf.org/ns/0/\">\r\n";
$xml .= "<playlist>\r\n";

$xml .= "<video-list>\r\n";




$qqqq = mysql_query("select * from `".$itable."` where pid = '".$id."'  ");

$mm=1;
	  
while( $docta = mysql_fetch_assoc($qqqq) )
{

/*if(isset($_POST['download'][$i]) && $_POST['download'][$i]=='1')
{  print_r($selectboxes); die(); }
else
  $ddll = '0';  */
  
  
    $mp3i = $docta['id'];
	
	$mp3p = $docta['image'];						
		
	$mp3s = $docta['song'];  
	 
	$mp3t = $docta['title']; 
	
	$mp3a = $docta['artist'];
	
	$mp3d = $docta['download'];


  $xml .= "\r\n<video>\r\n";

    $xml .= "<name><![CDATA[".$mp3t."]]></name>\r\n";

	$xml .= "<artist><![CDATA[".$mp3a."]]></artist>\r\n";

	$xml .= "<url><![CDATA[".$mp3s."]]></url>\r\n";

    $xml .= "<image><![CDATA[".$mp3p."]]></image>\r\n";
	
	$xml .= "<download>".$mp3d."</download>\r\n";

  $xml .= "</video>\r\n\r\n";

}
	
$xml .= "</video-list>\r\n";

$xml .= "</playlist>\r\n";	

header('Content-type: application/xml');
echo $xml;
 
 
?> 