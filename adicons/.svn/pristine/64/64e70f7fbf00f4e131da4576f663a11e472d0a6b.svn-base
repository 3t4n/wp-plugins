<?
require('../../../wp-blog-header.php');

$uploaddir = ABSPATH.'/wp-content/plugins/adicons/images/';
$user=wp_get_current_user();


$adURL=$_POST['adurl'];
$adText=$_POST['adtext'];
$placement=$_POST['selectedPlace'];
$contactName=$_POST['contactName'];
$contactEmail=$_POST['contactEmail'];
$adStatus=get_option("AI_defaultStatus");
$adPeriodCount=$_POST['periodcount'];
if(($user->user_level > 9) && strstr($_SERVER['HTTP_REFERER'],'wp-admin/options-general.php?page=adicons.php'))
{
	$adStatus=1;
	$asd=",adStartDate";
	$asd2=",now()";
}
$sameurl=get_option("AI_sameURL");

if(!function_exists("vcupdate")) {
	$adPrice=get_option("AI_adPrice");
}
else
	$adPrice=get_option("adPriceToday");



$x=explode("_",$placement);
$ck=$wpdb->get_row("select id from ".$table_prefix."adicons where adRow=".$x[0]." and adCol=".$x[1]);
if($ck->id)
{
	$errmsg="This AdIcon is already full!";
}
else
{
	if($sameurl==0)
	{
		$ck=$wpdb->get_row("select id from  ".$table_prefix."adicons where adURL='$adURL' and adStatus=1");
		if($ck->id)
		{
			$errmsg.="The same URL can not exist twice together";
		}
	}
	if($sameurl || !$errmsg)
		{
			$adRow=$x[0];
			$adCol=$x[1];
			$wpdb->query("insert into ".$table_prefix."adicons (adURL, adText, adPrice, adStatus,contactName, contactEmail, adRow, adCol,adPeriodCount $asd) values ('".$adURL."','".$adText."','".$adPrice."','".$adStatus."','".$contactName."','".$contactEmail."',$adRow,$adCol,'".$adPeriodCount."' $asd2)");
			$id=$wpdb->insert_id;
			if(!$id){
				$errmsg.="Something went wrong.. Please try again";
			}
		}

}
if(!$errmsg)
{
	$uploadfile = $uploaddir . $id.".jpg";
	if (move_uploaded_file($_FILES['iconfile']['tmp_name'], $uploadfile)) {
		$errmsg.= "";
	} else {
		$errmsg.= "Possible file upload attack!";
	}
}
if($errmsg){?>
<html><body><script>alert("<?php echo $errmsg;?>");location.replace("<?php echo $_SERVER['HTTP_REFERER']."#adIconUpload";?>");</script></body></html>
<?php
exit;
}
?>
<html><body><script>alert("Your AdIcon has been added to our database.<?php if($adStatus==0){?>It will become online once it is aproved.<?php }?>");location.replace("<?php echo $_SERVER['HTTP_REFERER'];?>");</script></body></html>
