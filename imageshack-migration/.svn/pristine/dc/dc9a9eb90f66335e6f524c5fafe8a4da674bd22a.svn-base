<?php
/**
 * @package ImageShack Migration
 * @author Bouzid Nazim Zitouni
 * @version 1.1
 */
/*
Plugin Name: ImageShack.us Migration
Plugin URI: http://angrybyte.com/wordpress-plugins/imageshack-migration-plugin/
Description: This plugin will help you migrate all your self hotsted images to imageshack.us, and will also transfer all your future uploaded images. This way your blog will run faster, and you will consume less Bandwidth.
Author: PsMan, Bouzid Nazim Zitouni
Version: 1.1
Author URI: http://angrybyte.com
*/

add_action('admin_menu', 'ismenu');
add_filter('the_content','isposts');
add_action('wp_footer','isfooterlink');
//add_action('admin_menu', 'taggatormenu');
//add_action('publish_post', 'autotag');
//add_option("taggatorcs", '1', 'Case sensitivity for taggator?', 'yes');
//add_option("taggatormhw", '1', 'Match whole words?', 'yes');
//add_option("taggatortags", '1', 'Taggator tags', 'yes');
function isfooterlink($content){
	// you are required to let your users know that your pictures are hosted at imageshack.us otherwise they will probably revoke your key, please don't remove the lines below, if you feel so strongly about this, please do not use this plugin. >:(
		$content .= "<p align='center'>Images hosting provided by <a href='http://imageshack.us'> ImageShack</a> Via <a href='http://angrybyte.com'> ImageShack Migration plugin </a></p>";
echo $content;
return $content;
		
	}
function isposts($content){
global $wpdb;
//$serv=str_replace( '%7E', '~', $_SERVER['REQUEST_URI']);
 $pfx=$wpdb->prefix;
 $a= $wpdb->query("CREATE TABLE IF NOT EXISTS `{$pfx}ism` (
`id` INT NOT NULL AUTO_INCREMENT ,
`url` VARCHAR( 2083 ) NOT NULL ,
`isurl` VARCHAR( 2083 ) NOT NULL ,
`attid` int NOT NULL ,
PRIMARY KEY ( `id` ) 
) ENGINE = InnoDB");
$res = $wpdb->get_results("select url,isurl,attid from {$pfx}ism");
	
foreach($res as $url){
//	$atturl=get_attachment_link($url->attid);
if((!$url->url=='') &&(!$url->isurl=='')){
	if(!strpos($content,$url->url)==FALSE){
		$content=str_ireplace($url->url,$url->isurl,$content);
	//	$content=str_ireplace($atturl,$url->isurl,$content);
		}
		}
	
}

 return $content;

}

function ismenu()
{

    add_options_page('Imageshack Migration', 'Imageshack-Migration', 8, __file__,'ism_plugin_options');
   
    
}

//function urlbreak($url){
	
//	$ex=explode("/",$url);
//	$ex=$ex[count($ex) -1 ];
//	return $ex;
//}
function ism_plugin_options()
{
//duplica(); no longer needed after changing to filters	
global $wpdb;
$serv=str_replace( '%7E', '~', $_SERVER['REQUEST_URI']);
 $pfx=$wpdb->prefix;
 add_option("imageshackapi", '', 'your API key for imageshack.us', 'yes'); 
add_option("imageshackuser", '', 'your username for imageshack.us', 'yes'); 
add_option("imageshackpass", '', 'your password for imageshack.us', 'yes');   
 $iskey = get_option('imageshackapi');
 $isusername = get_option('imageshackuser');
 $ispass = get_option('imageshackpass');
 $a= $wpdb->query("CREATE TABLE IF NOT EXISTS `{$pfx}ism` (
`id` INT NOT NULL AUTO_INCREMENT ,
`url` VARCHAR( 2083 ) NOT NULL ,
`isurl` VARCHAR( 2083 ) NOT NULL ,
`attid` int NOT NULL ,
PRIMARY KEY ( `id` ) 
) ENGINE = InnoDB");

  $res=$wpdb->get_results("select ID, guid from {$pfx}posts where (instr(post_mime_type,'image')) AND (post_type = 'attachment') AND NOT guid in (select url from {$pfx}ism) LIMIT 10");
 $filelist="";
 foreach($res as $fil){
 	$filelist .= $fil->guid . "\n";
 	
 	
 	}
 
  //---------------------------------------------accept user posted csv
 if($_POST["process"]){
$nofadd=0;
   update_option('imageshackapi', $_POST["key"]);
   update_option('imageshackuser', $_POST["username"]);
   update_option('imageshackpass', $_POST["password"]);
   $iskey = get_option('imageshackapi');
 $isusername = get_option('imageshackuser');
 $ispass = get_option('imageshackpass');
 if (!is_user_logged_in()){
 return("buzz off n00b");
 }else{
 
 //if (($_FILES["usafile"]["type"] == "text/csv")||($_FILES["usafile"]["type"] == "text/comma-separated-values"))
 if (1)
 {
 	//echo "file is cvs";
 //if ($_FILES["usafile"]["error"] > 0)
  if (0)
 {
 //echo "Return Code: " . $_FILES["usafile"]["error"] . "<br />";
 }
 else
 {
 	// $basedir=str_replace("wp-admin",'',realpath(dirname($_SERVER['index.php']))) ;
 //move_uploaded_file($_FILES["usafile"]["tmp_name"],
 //$basedir .  $_FILES["usafile"]["name"]);
 //$myfile = $basedir .  $_FILES["usafile"]["name"];
 //$file=fopen($myfile,"r");
 //echo $basedir .  $_FILES["usafile"]["name"] . $file;
 $imgs=$_POST['imgs'];
 $imgs = preg_replace('/\r\n|\r/', "\n", $imgs);
 $imgs=explode("\n",$imgs);
 foreach($imgs as $img)
 //while(!feof($file))
  {
  //$line =  fgets($file);
  //$line= str_ireplace('"','',$line);
  //$line= explode(",",$line);
  if((!$img=='') && (!$iskey=='')){
  	if((!$isusername=='') &&(!$ispass=='')){
  	$isapi="http://www.imageshack.us/upload_api.php?url=$img&key=$iskey&action=transload&a_username=$isusername&a_password=$ispass";	
  	}else{
  	$isapi="http://www.imageshack.us/upload_api.php?url=$img&key=$iskey&action=transload";	
  	}
  
  //Sorry i'm no xml geek !
  //$xml = simplexml_load_file("$isapi");
  if ($fp = fopen("$isapi", 'r')) {
   $xml = '';

   while ($line = fread($fp, 1024)) {
      $xml .= $line;
   }
   }
 //echo $img. "<br />" . $xml  . "<br />";
   	
	   	$strt=strpos($xml,"<image_link>") + 12 ;
   		if($strt>12){
		   $imglnk = str_split($xml,$strt);
   		
   		$end=strpos($imglnk[1],"</image_link>") ;
   		$imglnk = str_split($imglnk[1],$end);
   		$imglnk=$imglnk[0];
   	//	echo $imglnk;
   	$psts=$wpdb->query("insert into {$pfx}ism(url,isurl,attid) values ('$img','$imglnk',0)");
		   	$nofadd=$nofadd + 1;
		   	}
			 //  //nailed it!
   		}
   		}
   	//$psts=$wpdb->query("update {$pfx}posts set post_content = REPLACE(post_content, '$fil->guid', '$line[2]') where instr(post_content,'$fil->guid'); "); // not safe I'm better off with a filter'
	  //$psts= $wpdb->query("update {$pfx}posts set post_content =  '$line[2]' ID = $fil->ID); ");
   	}
   	
   	
   }
  }

 
 
 
 if($nofadd>0){
echo <<<EORT
 	<div id='message' class='error'><p>Great! you have successfully sent $nofadd images to imageshack.us<br /></h2></p></div>	
EORT;

}else{
	
echo <<<EOFT
 	<div id='message' class='error'><p>Oops! Nothing was uploaded, maybe you key is wrong or invalid, or maybe you added a wrong user/pass, or probably your host is blocking hotlinking. or you just don't have anything new to upload<br /></h2></p></div>	

EOFT;
	
}
 }
 
 $res=$wpdb->get_results("select ID, guid from {$pfx}posts where (instr(post_mime_type,'image')) AND (post_type = 'attachment') AND NOT guid in (select url from {$pfx}ism) LIMIT 10");
 $filelist="";
 foreach($res as $fil){
 	$filelist .= $fil->guid . "\n";
 	
 	
 	}
 	
 	$countpics = $wpdb->get_var("select count(id) from {$pfx}ism");

	Echo <<<EOFT
	<br /><br /><div id="icon-upload" class="icon32"><br /></div><h2> <div class='wp-submenu-head'>ImageShack Migration</div ></h2><br /><br /><div align='middle'> <img src="http://stream.imageshack.us/hire/header.png"  align="right" /><br />
			ImageShack Migration will help you copy all photos and pictures pn your posts to the free images host imageshack.us, everything will be done remotely and automatically 10 files at a time. It's also safe, your original files WILL NOT be deleted, you never<br /> Just follow the simple steps below to get started:</div><br /><br />
<ol>
<li> First you need an <a href="http://stream.imageshack.us/xmlapi/"> API key from imageshack.us</a> It's free and instant don't worry!</li>
<li> Paste the key in the Key box below the files list.<br /></li>
<li> To avoid putting much pressure on your server and imageshack servers, you need to send 10 images at a time. Click "send 10 pictures" and wait for a a while until the page is refreshed.<br /></li>
<li> Don't be alarmed is you get one or two errors on the top of the page once in a while when you submit, it is a sign that imageshack server timed out for a file or two, don't worry it is a common thing, unless you recieve errors for all files, you are kinda fine.<br /></li>
<li> Keep uploading 10 pics at a time until you get everything and the "upload to imageshack.us" becomes blank.<br /></li>
<li> In some cases imageshack.us will require you to register your domain you can do so by going to http://stream.imageshack.us/content.php?page=register_domain.</li>
<li> That's it! this plugin will replace the links to your pictures by the imageshack links, you can keep posting and uploading pictures to your blog, but you will have to visit the plugin and upload newly added pictures every once in a while, to keep your server fresh.</li></ol>
<li> If you plan to keep using this plugin forever, please drop by, <a href= 'http://angrybyte.com/donate' >and a make a dontation</a>, thank you for helping us keep the internet a free place to take, and to give.</li></ol>
<br /> 

<br />

<h3> upload to imageshack.us</h3> <form action='$serv' method='post'>
<textarea name='imgs' cols='50' rows='10'>$filelist</textarea> <br />
API Key<input type="text" name="key" value="$iskey" /><br />
Username (optional)<input type="text" name="username" value="$isusername" /><br />
Password (optional)<input type="password" name="password" value="$ispass" /><br />
<input type="hidden" name="action" value="transload" /><br />
<input type="hidden" name="process" value="1" /><br />
<input type="submit" value="Send 10 Pictures" />
</form>
<br /><br />

You currently have $countpics pictures uploaded at imageshack.us<br /><br /><br /> If you are looking for a similar plugin to send your uploaded files to a file sharing website, please check my other plugin <a href="http://angrybyte.com/wordpress-plugins/wordpress-filefactory-plugin/" >WordPress FileFactory</a><br /><br /><br />

<dl>
	<dd><i> Imageshack, www.imageshack.us are registered trademarks for their respective owners,  This plugin is not affiliated with or funded by Imageshack, it is just a free independent work for non-commercial use, If this plugin was useful for you,  <a href= 'http://angrybyte.com/donate' >think about making a donation </a>, we appreciate your contribution to make the internet a free place, free to take & to give. </i></dd>
</dl>	
EOFT;
}





?>