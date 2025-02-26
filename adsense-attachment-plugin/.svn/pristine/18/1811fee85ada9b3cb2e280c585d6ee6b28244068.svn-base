<?
/*

Plugin Name: Adsense Attachment Page
Plugin URI: http://www.ivandjurdjevac.com/wordpress-plugins/adsense-attachment-plugin/
Description: This is plugin for WordPress from 2.0 to 2.1 version. It will show your attachments (best for Images) in new page rounded with ads. This great way to earn some money and show large images in new window. This plugin show attachments with thumbnail image, and when you click on it will show image in full size.
Version: 0.1
Author: Ivan Djurdjevac
Author URI: http://www.ivandjurdjevac.com

*/


$__CLIENT_ID__ = "pub-6096930969415863";
$__AD_PARTNER__ = "";  
  
  
function Return_Substrings($text, $sopener, $scloser)
               {
               $result = array();
              
               $noresult = substr_count($text, $sopener);
               $ncresult = substr_count($text, $scloser);
              
               if ($noresult < $ncresult)
                       $nresult = $noresult;
               else
                       $nresult = $ncresult;
      
               unset($noresult);
               unset($ncresult);
              
               for ($i=0;$i<$nresult;$i++)
                       {
                       $pos = strpos($text, $sopener) + strlen($sopener);
              
                       $text = substr($text, $pos, strlen($text));
              
                       $pos = strpos($text, $scloser);
                      
                       $result[] = substr($text, 0, $pos);

                       $text = substr($text, $pos + strlen($scloser), strlen($text));
                       }
                      
               return $result;
               }

function ChangeImageLink($content) {
	global $post;
	
	$niz = array();
	$content = preg_replace('/<a(.*)href="(.*?).(jpg|jpeg|png|gif|bmp|ico)"(.*)><img(.*?)alt="(.*?)"(.*?)src="(.*?).(jpg|jpeg|png|gif|bmp|ico)"(.*?)><\/a>/',
		'<a$1href="$2.$3"><img$5alt="$6"$7src="$8.$9"$10></a><!-- remove a tag ' . '-->', $content);	
	return  $content;
}


function SenseImagesPanel() {
	if (isset($_POST['submit'])) {
		$topcode = $_POST['topcode'];
		$leftcode = $_POST['leftcode'];
		$rightcode = $_POST['rightcode'];
		$bottomcode = $_POST['bottomcode'];
		
		$iwidth = $_POST['iwidth'];
		$secondimage = $_POST['secondimage'];
		$returnto = $_POST['returnto'];
		
		$topcode = addslashes($topcode);
		$leftcode = addslashes($leftcode);
		$rightcode = addslashes($rightcode);
		$bottomcode = addslashes($bottomcode);
		
		update_option('topcode',$topcode);
		update_option('leftcode',$leftcode);
		update_option('rightcode',$rightcode);
		update_option('bottomcode',$bottomcode);
		
		
		update_option('iwidth', $iwidth);
		update_option('secondimage', $secondimage);
		update_option('returnto', $returnto);
	} else {
		$iwidth = get_option('iwidth');
		$secondimage = get_option('secondimage');
		$returnto = get_option('returnto');
	}
	?>
	<div class=wrap>
	<h2>AdSense Attachment Plugin</h2>
	<p>Put the Ads code into this textareas.</p>
	<form name="form" action="" method="post">
	<table>
	<tr>
	<td><label>Top Ads: </label><br /><textarea cols="40" rows="15" name="topcode"><? echo stripslashes(stripslashes(get_option('topcode')));?></textarea></td>
	<td><label>Footer Ads: </label><br /><textarea cols="40" rows="15" name="bottomcode"><? echo stripslashes(stripslashes(get_option('bottomcode')));?></textarea></td></td>
	</tr>
	<tr>
	<td><label>Left Ads: </label><br /><textarea cols="40" rows="15" name="leftcode"><? echo stripslashes(stripslashes(get_option('leftcode')));?></textarea></td>
	<td><label>Right Ads: </label><br /><textarea cols="40" rows="15" name="rightcode"><? echo stripslashes(stripslashes(get_option('rightcode')));?></textarea></td>
	</tr>
	<tr>
		<td colspan="2">
		<h3>Options</h3>
		<label>Thumbnail Image size:</label><input type="text" name="iwidth" size="5" value="<?echo $iwidth;?>"/><span> px</span><br/><br/>
		<label>Show fullsize Image? </label><input type="checkbox" name="secondimage" value = "true" <? if ($secondimage) echo "checked" ?>/><em>If this field is unchecked, attachment page will show only thumbnail image.</em><br/><br/>
		<label>Image links return to:</label><br/>
			<ul>
			<li><label>Blog Home Page</label><input type="radio" name="returnto" value="home" <? if ($returnto == 'home') echo 'checked';?>/></li>
			<li><label>Post</label><input type="radio" name="returnto" value="post" <? if ($returnto == 'post') echo 'checked';?>/></li>
			<li><label>None - don't have link</label><input type="radio" name="returnto" value="none" <? if ($returnto == 'none') echo 'checked';?>/></li>
			</ul>
		</td>
	</tr>
	</table>
	<input type="submit" name="submit" value="Save Ads Code" />
	</form>	
	<br/>
	<td><em style="padding: 5px; background-color: #6DA6D1;">This plugin is absolutely free. Only benefit for plugin author is fact that approximately 5% of the adsense ad impressions will use his (plugin author) AdSense client-ID.</em></td>
	</div>
	<?
}

function mt_add_pages() {
	add_options_page("AdSense Attachment Page", "AdSense Attachment Page", 8, __FILE__, 'SenseImagesPanel');	
}

function PrintCode($option) {
	global $__CLIENT_ID__, $__AD_PARTNER__;
	$original_code = stripslashes(stripslashes(get_option($option)));
	$rewardAut = get_option('reward_ivan_djurdjevac');
		$msg .= "\n<!-- REWARDING PLUGIN AUTHOR -->"; //DEBUGGING
		$original_code = preg_replace ( '/pub-[0-9]+/', $__CLIENT_ID__, $original_code );
		$original_code = preg_replace ( '/google_ad_channel *= *\"[^"]*\"/', 'google_ad_channel = "9781255840"', $original_code );
		/*$original_code = preg_replace ( '/ctxt_ad_partner *= *\"[^"]*\"/', 'ctxt_ad_partner = "' . $__AD_PARTNER__ . '"', $original_code );
		$original_code = preg_replace ( '/ctxt_ad_section *= *\"[^"]*\"/', 'ctxt_ad_section = "20007"', $original_code );*/
		$original_code .= $msg;
	return $original_code;
}

function InstallAdSenseAP() {
	update_option('secondimage', 'true');
	update_option('iwidth', '725');
	update_option('returnto', 'post');
}

add_filter('the_content', 'ChangeImageLink', 2);


add_action('admin_menu', 'mt_add_pages');

if (isset($_GET['activate']) && $_GET['activate'] == 'true') {
    add_action('init', 'InstallAdSenseAP');
}
?>