<?php
include_once("../../../../wp-config.php");

/*echo DB_HOST."|".DB_USER."|".DB_PASSWORD."|".DB_NAME;

if (!class_exists('S3')) require_once '../s3/S3.php';

$table	=	$table_prefix.'options';   /// change with your table name ;)


$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
if (!$link) {
    die('Not Connected : ' . mysqli_error());
}


// connect to database
$db_selected = mysqli_select_db(DB_NAME, $link);

//mysqli_query("SET character_set_client=utf8", $link);
//mysqli_query("SET character_set_connection=utf8", $link);
//mysqli_query("SET character_set_results=utf8", $link);

if (!$db_selected) {
    die ('Can\'t Connected : ' . mysqli_error());
}*/


//echo get_option("amazon-s3-cloud-mp3-amazon_secret_key");


// AWS access info
$amazon_key	= get_option("amazon-s3-cloud-mp3-amazon_key");	 
$amazon_secret_key	= get_option("amazon-s3-cloud-mp3-amazon_secret_key");   

$bucket_endpoint	= isset($_REQUEST['endpoint'])?$_REQUEST['endpoint']:get_option("amazon-s3-cloud-mp3-bucket-endpoint");		

//$bucket	= get_option("amazon-s3-cloud-mp3-bucket");
//$folder	= get_option("amazon-s3-cloud-mp3-folder");

$bucket = isset($_REQUEST['bucket'])?$_REQUEST['bucket']:"";
$folder = isset($_REQUEST['folder'])?$_REQUEST['folder']:"";


/*if($amazon_key && $amazon_secret_key)
{

if($bucket_endpoint == "s3.amazonaws.com")
  $s3 = new S3($amazon_key, $amazon_secret_key);
else
  $s3 = new S3($amazon_key, $amazon_secret_key, true, $bucket_endpoint);
  
  
}*/  
  


function get_option1($name)
{

$q = mysqli_query("select option_value from $table where option_name = '".$name."'");
$row = mysqli_fetch_assoc($q);

return $row['option_value'];

}


function format_number($number, $symbol = false )
{
    return  $symbol==true ? "£".number_format($number, 2, '.', '') : number_format($number, 2, '.', '');
}



?>