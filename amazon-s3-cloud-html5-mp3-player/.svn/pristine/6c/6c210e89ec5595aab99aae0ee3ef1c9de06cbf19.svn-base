<?php

error_reporting(0);

/*

Plugin Name: Amazon S3 Cloud HTML5 MP3 Player Plugin 

Plugin URI: https://www.svnlabs.com/html5

Description: Amazon S3 Cloud HTML5 MP3 Player plugin that allows you to link to your amazon S3 bucket and sets up a HTML5 playlist. 

Version: 2.5

Author: Sandeep Verma

Author URI: https://www.svnlabs.com/html5/amazon-s3-cloud-html5-player/

*/ 





 

// Some Defaults

$amazon_key				= '';

$amazon_secret_key		= '';

$bucket					= '';

$bucket_endpoint		= 's3.amazonaws.com';

$folder					= '';

$player					= 'horizontal';



// Put our defaults in the "wp-options" table

add_option("amazon-s3-cloud-mp3-amazon_key", $amazon_key, 'yes' );

add_option("amazon-s3-cloud-mp3-amazon_secret_key", $amazon_secret_key, 'yes' );

add_option("amazon-s3-cloud-mp3-bucket", $bucket);

add_option("amazon-s3-cloud-mp3-bucket-endpoint", $bucket_endpoint);

add_option("amazon-s3-cloud-mp3-folder", $folder);

add_option("amazon-s3-cloud-mp3-player", $player); 



//grab options from the database

$amazon_key	= get_option("amazon-s3-cloud-mp3-amazon_key");	

$amazon_secret_key	= get_option("amazon-s3-cloud-mp3-amazon_secret_key");





//include the S3 class 

if (!class_exists('S3'))require_once('s3/S3.php');



//AWS access info

if (!defined('awsAccessKey')) define('awsAccessKey', $amazon_key);

if (!defined('awsSecretKey')) define('awsSecretKey', $amazon_secret_key);



// Start the plugin

if ( ! class_exists( 'Amazon_S3_Cloud_MP3_Player' ) ) {

	class Amazon_S3_Cloud_MP3_Player {

// prep options page insertion

		function add_config_page() {

			if ( function_exists('add_submenu_page') ) {

				add_options_page('Cloud MP3 Player Options', 'Amazon S3 Cloud MP3 Player Options', 10, basename(__FILE__), array('Amazon_S3_Cloud_MP3_Player','config_page'));

			}	

	}

// Options/Settings page in WP-Admin

		function config_page() {

			if ( isset($_POST['submit']) ) {

				$nonce = $_REQUEST['_wpnonce'];

				if (! wp_verify_nonce($nonce, 'amazon-s3-cloud-mp3-updatesettings') ) die('Security check failed'); 

				if (!current_user_can('manage_options')) die(__('You cannot edit the search-by-category options.'));

				check_admin_referer('amazon-s3-cloud-mp3-updatesettings');	

			// Get our new option values

			$amazon_key	= $_POST['amazon_key'];

			$amazon_secret_key	= $_POST['amazon_secret_key'];

			$bucket	= $_POST['bucket'];

			$bucket_endpoint	= $_POST['bucket_endpoint'];

			$folder	= $_POST['folder'];

			$player	= $_POST['player'];

		    // Update the DB with the new option values

			update_option("amazon-s3-cloud-mp3-amazon_key", ($amazon_key));

			update_option("amazon-s3-cloud-mp3-amazon_secret_key", ($amazon_secret_key));

			update_option("amazon-s3-cloud-mp3-bucket", ($bucket));

			update_option("amazon-s3-cloud-mp3-bucket-endpoint", ($bucket_endpoint));

			update_option("amazon-s3-cloud-mp3-folder", ($folder));

			update_option("amazon-s3-cloud-mp3-player", ($player));

			}

			

			$amazon_key	= get_option("amazon-s3-cloud-mp3-amazon_key");

			$amazon_secret_key	= get_option("amazon-s3-cloud-mp3-amazon_secret_key");	

			$bucket	= get_option("amazon-s3-cloud-mp3-bucket");

			$bucket_endpoint	= get_option("amazon-s3-cloud-mp3-bucket-endpoint");

			$folder	= get_option("amazon-s3-cloud-mp3-folder");	

			$player	= get_option("amazon-s3-cloud-mp3-player");	

			

?>



<div class="wrap">

  <h2>Amazon S3 Cloud HTML5 MP3 Player Options</h2>

  

  

  <?php

  

  // Check for CURL

//if (!extension_loaded('curl') && !@dl(PHP_SHLIB_SUFFIX == 'so' ? 'curl.so' : 'php_curl.dll')) 	die("\nERROR: CURL extension not loaded\n\n");

  

  

  ?>

  

  

  <form action="" method="post" id="amazon-s3-cloud-mp3-config">

    <table class="form-table">

      <?php if (function_exists('wp_nonce_field')) { wp_nonce_field('amazon-s3-cloud-mp3-updatesettings'); } ?>

       <tr>

        <th scope="row" valign="top"><label for="amazon_key">Amazon Key:</label></th>

        <td><input type="password" name="amazon_key" id="amazon_key" class="regular-text" value="<?php echo $amazon_key; ?>"/></td>

      </tr>

      <tr>

        <th scope="row" valign="top"><label for="amazon_secret_key">Amazon Secret Key:</label></th>

        <td><input type="password" name="amazon_secret_key" id="amazon_secret_key" class="regular-text" value="<?php echo $amazon_secret_key; ?>"/></td>

      </tr>

      

      <tr>

        <th scope="row" valign="top"><label for="bucket">Amazon Bucket:</label></th>

        <td><input type="text" name="bucket" id="bucket" class="regular-text" value="<?php echo $bucket; ?>"/></td>

      </tr>

      

      <tr>

        <th scope="row" valign="top"><label for="bucket">Amazon Bucket Endpoint:</label></th>

        <td><input type="text" name="bucket_endpoint" id="bucket_endpoint" class="regular-text" value="<?php echo $bucket_endpoint; ?>"/></td>

      </tr>

      

      

      <tr>

        <th scope="row" valign="top"><label for="player">Player:</label></th>

        

        <td>

        <select name="player">

        <option value="horizontal" <?php if($player=="horizontal") { ?> selected="selected" <?php } ?> >horizontal</option>

        

        </select>

        </td>

      </tr>

      

      

      <tr>

        <th scope="row" valign="top"><label for="folder"></label></th>

        

        <td><input type="hidden" name="folder" value="">

        

 

<?php 



/*if($bucket_endpoint == "s3.amazonaws.com")

  $s3 = new S3(awsAccessKey, awsSecretKey);

else

  $s3 = new S3(awsAccessKey, awsSecretKey, true, $bucket_endpoint);

  





$contents = $s3->getBucket($bucket);*/



?>



</td>

      </tr>

      

      

      

      

      

      

      



    </table>

    <br/>



      <span style="color:#FF0000"><strong>Note: </strong>Please make your Amazon S3 Bucket and MP3 files public</span>  

     <br />

<br />



    <span class="submit" style="border: 0;">

    <input type="submit" name="submit" value="Save Settings" />

    </span>

  </form>

 <?php amazon_s3_cloud_mp3player(); ?>

<br />

<?php /*?><h3>PHP Code for template php files</h3>

<code>&lt;?php amazon_s3_cloud_mp3player(); ?&gt;</code><?php */?>



<h3>Shortcode for Page or Post</h3>

<code>[html5aws3mp3 player="<?php echo $player; ?>" bucket="BUCKET-NAME" endpoint="BUCKET-ENDPINT" folder="FOLDER-NAME/"]</code><br /><br /> 



<code>[html5aws3mp3 player="<?php echo $player; ?>" bucket="<?php echo $bucket; ?>" endpoint="BUCKET-ENDPINT" folder="FOLDER-NAME/"]</code><br /><br />



<code>[html5aws3mp3 player="<?php echo $player; ?>" bucket="<?php echo $bucket; ?>"]</code><br />







<?php //echo $scode; ?>



<?php



 



?>

<br />



<hr />



<h3>Embed Anywhere</h3>



<textarea cols="60" rows="10" onFocus="this.select();" style="border:1px dotted #343434" >Upgrade to paid version for this feature</textarea><br />



<a href="http://cloudplayer.svnlabs.com/" target="_blank">Amazon S3 Cloud MP3 Player Plugin ...</a>



<br />

- Amazon S3 SubFolder support<br />

- Vertical playlist support<br />

- MP3 Song's information using ID3 Tags<br />  

- Customize social link<br /> 

- Access Private / Secure AWS S3 Bucket files<br /> <br /> 





<strong>Help</strong><br />



<a target="_blank" href="https://www.svnlabs.com/blogs/amazon-s3-error-handling/">Amazon S3 Error Handling</a><br />

<a target="_blank" href="https://www.svnlabs.com/html5/faqs/amazon-s3-bucket-endpoint/">Amazon S3 Bucket Endpoint</a><br />



<br />

<br />





<div id="fb-root"></div>

<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) return;

  js = d.createElement(s); js.id = id;

  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=181968385196620";

  fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>



<div class="fb-like" data-href="https://www.facebook.com/Html5Mp3Player" data-send="true" data-width="450" data-show-faces="true"></div>  



<!-- Paypal etc.  -->



 </div>

<?php		}

	}

} 

  

// Base function 

function amazon_s3_cloud_mp3player($atts = null, $content = null) {



// Plugin Url 

$s3url = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));



$amazon_key	= get_option("amazon-s3-cloud-mp3-amazon_key");	

$amazon_secret_key	= get_option("amazon-s3-cloud-mp3-amazon_secret_key");

$bucket	= get_option("amazon-s3-cloud-mp3-bucket");

$bucket_endpoint	= get_option("amazon-s3-cloud-mp3-bucket-endpoint");	

$folder	= get_option("amazon-s3-cloud-mp3-folder");

$player	= get_option("amazon-s3-cloud-mp3-player");





$pluginurl	=	plugin_dir_url( __FILE__ );





extract( shortcode_atts( array(

		'bucket' => $bucket,

		'endpoint' => 's3.amazonaws.com',

		'folder' => $folder,

		'player' => $player,  // horizontal or vertical

	), $atts ) );

 

 



/*echo '<object type="application/x-shockwave-flash" data="'.$s3url.'dewplayer-playlist.swf" width="235" height="200" id="dewplayer" name="dewplayer">

    <param name="wmode" value="transparent" />

	<param name="wmode" value="transparent" />

	<param name="movie" value="'.$s3url.'dewplayer-playlist.swf" />

	<param name="flashvars" value="showtime=true&autoreplay=true&xml='.$s3url.'playlist.php?name='.urlencode(urlencode($test)).'&autostart=1" />

</object>';*/



//echo '<br />';



if($player == "horizontal")

{

$echo = '<iframe src="'.$pluginurl.'html5/html5full.php?bucket='.$bucket.'&folder='.$folder.'&endpoint='.$endpoint.'&rand='.rand().'" frameborder="0" marginheight="0" marginwidth="0" scrolling="no" width="586" height="227"></iframe>';

return $echo;

}

 





}



// insert into admin panel

add_action('admin_menu', array('Amazon_S3_Cloud_MP3_Player','add_config_page'));

add_shortcode( 'html5aws3mp3', 'amazon_s3_cloud_mp3player' );

?>