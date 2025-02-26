<?php
error_reporting(0);
include("db.php");

require '../s3/aws.phar';
use Aws\S3\S3Client;


if(isset($_REQUEST['id']) && $_REQUEST['id']!="")
  $id = $_REQUEST['id'];
else
  $id = 1;  




//Imagery and Affirmations
//Visualization Techniques
//Taking Control Of Your Meditations
//The Full Power Of Meditation
//Towards Deep Meditation

//echo $amazon_key."SV";
//echo $amazon_secret_key."SV";
//echo $bucket_endpoint."SV";
//echo $bucket."SV";



?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>HTML5 MP3 Player with Playlist</title>
<style>
p {
	clear: both;
}
</style>
<link href="css/player.css" rel="stylesheet" type="text/css" />
<script src="audiojs/audio.js"></script>

<script src="default.js"></script>

<script type="text/javascript">$(function(){var example={'shuffle-track':'ol li'};$('a').click(function(){$(example[this.id]).shuffle()});})</script>

<script type="text/javascript" src="core.js"></script>


<script type="text/javascript">
		$(document).ready(function(){
			$('#scrollbar1').tinyscrollbar();	
		});
	</script>
<script src="smartslider.js" type="text/javascript"></script>
<link href="smartslider.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
        $(document).ready(function() {
            $('#trackbar1').strackbar({ callback: onTick1, defaultValue: 3, sliderHeight: 4, sliderWidth: 68, style: 'style1', animate: true, ticks: true, labels: false, trackerHeight: 20, trackerWidth: 19 });
           
        });
        function onTick1(value) {
		
            //$('#text1').html("Current Value: " + value);
			
			//audio.setVolume(value*10);
			
			var  ids = ['vol-0', 'vol-10', 'vol-20', 'vol-30', 'vol-40', 'vol-50', 'vol-60', 'vol-70', 'vol-80', 'vol-90'];
			
			if(value>=10) value=9;
			if(value<=0) value=0;		
			
			//var elem = document.getElementById(ids[value]);
			
			//elem.click();
			$('#'+ids[value]+'').click();
			
			
        }
     
    </script>
</head>
<body>
<a href="#" id="vol-0"></a> <a href="#" id="vol-10"></a> <a href="#" id="vol-20"></a> <a href="#" id="vol-30"></a> <a href="#" id="vol-40"></a> <a href="#" id="vol-50"></a> <a href="#" id="vol-60"></a> <a href="#" id="vol-70"></a> <a href="#" id="vol-80"></a> <a href="#" id="vol-90"></a>
<div id="WraperMainLarge">
  <div id="MainPlayer">
    <audio id="audio-palayer" preload></audio>
    <div id="Music-title-box"> <img src="images/volume-img.jpg" width="13" height="16" alt="play" align="absmiddle" /> &nbsp; <?php /*?>Part <?php echo $day; ?>:<?php */?> <span id="current-track"></span> </div>
    <div id="Player-display-screen"> <img src="" alt="display" id="current-play-pic" width="325" height="86" /></div>
    
    <div  id="Player-progressbar">
      <div class="scrubber" id="Player-progressbar01">
        <div id="loaded-bar" class="progress" style=" background:#666666; width:0;  height: 7px;">
          <div id="progress-bar" class="loaded" style="width:0; height:7px; background:#e5cf58;"></div>
        </div>
      </div>
    </div>
    
    
    <div class="Clear"></div>
    <div id="Player-Control">
      <div id="Play-back"><a style="cursor:pointer;" id="prev_track" title="previous track"><img src="images/back-img.png" width="26" height="26" alt="back" /></a></div>
      <div id="Play-button"><a style="cursor:pointer;" id="play-pause"><img src="images/pause-btn.png" width="41" height="41" alt="play" id="play-pause-btn" /></a></div>
      <div id="Play-next"><a style="cursor:pointer;" id="next_track" title="next track"><img src="images/next-btn.png" width="26" height="26" alt="next" /></a></div>
      <div id="Play-Revind"> <span id="loop-track-box"> <a style="cursor:pointer;" title="loop on" id="loop-track"><img src="images/noloop-btn.png"  alt="refresh" /></a> </span> <span id="noloop-track-box" style="display:none" > <a style="cursor:pointer;;" id="noloop-track" title="loop off"><img src="images/loop-btn.png" alt="refresh" /></a> </span> 
      
      <?php /*?><span id="shuffle-track-box"> <a style="cursor:pointer;" id="shuffle-track"><img src="images/noshuffle-btn.png" width="27" height="19" alt="revid" /></a> </span> <span id="noshuffle-track-box" style="display:none;"> <a style="cursor:pointer;" id="noshuffle-track"><img src="images/shuffle-btn.png" width="27" height="19" alt="revid" /></a> </span><?php */?> </div>
      <div id="Play-Timer" style="padding-left:7px"><span id="palyed-time">00.00</span> &nbsp;  / &nbsp; <span id="duration-time">00:00</span> </div>
      <!--<div id="Sound-bar">
        <div id="sound01"><img src="images/volume-bar-btn.png" width="12" height="11" /></div>
      </div>-->
      <div>
        <div class="soundbar" id="trackbar1"> </div>
        <!--<div id="text1" style="clear: both; text-align: center;">
            </div>-->
      </div>
    </div>
  </div>
  <div id="MainPalylistbox">
    <div id="Playlist-heading">
    
     
    <div style="float:right;"><a href="https://twitter.com/svnlabs" target="_blank" title="Twitter"><img src="twitter.png" border="0" width="20" /></a><a href="https://www.facebook.com/svnlab" target="_blank" title="Facebook"><img src="facebook.png" border="0" width="20" /></a></div>
    
    </div>
    <div id="Playlist-block" class="Playlist01">
      <div id="scrollbar1">
        <div class="scrollbar">
          <div class="track">
            <div class="thumb">
              <div class="end"></div>
            </div>
          </div>
        </div>
        <div class="viewport">
          <div class="overview">
          
          <?php

           //echo $amazon_key;
           //echo $amazon_secret_key;

           //echo $bucket; echo $folder;

          ?>
          
            <ol id="tracks-list">
              
              <?php


              
              //require '../s3/aws-autoloader.php';

//$bucket = 'beyond-the-chair';

   $region = str_replace("s3.", "", $bucket_endpoint);
   $region = str_replace(".amazonaws.com", "", $region);    

   
   if($region=="amazonaws.com") $region = "us-east-1";           

   if($region=="") $region = "us-east-1";          


  //echo $region.$bucket;


$client = S3Client::factory([
    'version' => 'latest',
    'region'  => $region,
    'signature'    => 'v4',
    'credentials' => [
        'key'    => $amazon_key,
        'secret' => $amazon_secret_key
    ]
]);



 $objects = $client->getIterator('ListObjects', array(
        'Bucket' => $bucket,
        'Prefix' => $folder
    ));

    //echo "Keys retrieved!\n";
    /*foreach ($objects as $object) {
        //echo $object['Key'] . "\n<br>";
    echo $signedUrl = $client->getObjectUrl($bucket, $object['Key'], '+10 minutes')."\n<br>";
    
    
    }*/
              
			  
			 //if($amazon_key && $amazon_secret_key) {
			  				
			//foreach($s3->getBucket($bucket, $folder) as $file) {

    foreach ($objects as $object) {
			
			
				//$fname = $file['name'];
				//$furl = "http://$bucket.$bucket_endpoint/".$fname;
				

        //$signedUrl = $client->getObjectUrl($bucket, $object['Key'], '+10 minutes');

        $cmd = $client->getCommand('GetObject', [
    'Bucket' => $bucket,
    'Key' => $object['Key'],
    ]);
    
    $request = $client->createPresignedRequest($cmd, "+30 minute");
    
    $signedUrl = (string) $request->getUri();

    if(preg_match("/\.mp3$/i", $object['Key']))
        { 
							
				//if(preg_match("/\.mp3$/i", $furl)) { 
				
				
				//$mp3_det = getMp3Info( $furl );
				
				//print_r($mp3_det);
				
				$mp3p = 'amazon-s3-cloud-mp3-player.png';						
					
				//$mp3s = $furl;  
                 
				//$mp3t = basename($fname); //'Cloud Song'; 
				
				$mp3a = '';
			  
			  ?>
              
              
              
              <li>
                <a href="#" data-src="<?php echo $signedUrl; ?>" title="<?php echo $mp3t; ?>" class="track-name" name="<?php echo $mp3p; ?>"><?php echo basename($object['Key']); ?></a>
                <p class="Title01"><?php echo $mp3a; ?></p>
              </li>
              
              
              <?php $mm++;  } } //} ?>
              
              
            </ol>
            
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php

/* debug log */

function debug_log($file_path, $text)
{
	$file_dir = dirname($file_path);
	if( !file_exists($file_dir) or !is_dir($file_dir) or !is_writable($file_dir) )
		return false;
	
	$write_mode = 'w';
	if( file_exists($file_path) && is_file($file_path) && is_writable($file_path) )
		$write_mode = 'a';
	
	if( !$handle = fopen($file_path, $write_mode) )
		return false;
	
	if( fwrite($handle, $text. "\n") == FALSE )
		return false;
	
	@fclose($handle);
}

/* debug log */

//if(isset($_SERVER['HTTP_REFERER']))
//debug_log(dirname(__FILE__)."/logs/log-full.txt", date("d-m-y-H-i-s-A")." = ".$_SERVER['HTTP_REFERER']);


?>



</body>
</html>
