<?php if(!defined('_MENU_CONFIGURATION')) exit; ?> 
<style>
.gtable {text-align: left;}
.gtable td {  padding-left: 10px; background: #fff;}
.gtable .gcenter {text-align: center;}
.gwarn {background: #f00; color: white; padding: 10px; margin: 5px; font-size: 16px; }
</style>
<?php
	
	function __checked__($x,$y) {
		if ($x == $y) echo 'checked';
	}
	
	global $default_option_pagination_gallery;
	
	$default_null_option_pagination_gallery = array(
	'force_pagination' => 0,
	'default_image_in_page' => 9,
	'extended_pagination' => 0,
	'css_pagination_class' => 'paginate_gallery',
	'include_default_css' => 0,
	'pagination_position' => 'both',
	'fill_gaps_in_last_row' => 0,
	'fill_gaps_transparency' => 0.5,	
	'quick_cache_support' => 0,
	'ajax_pagination' => 0,
	'gallery_cache' => 0,
	'gallery_cache_mode' => '',
	'gallery_cache_expiration' => 0,
	'cdn' => 0,
	'cdn_use_mode' => "round",
	'cdn_servers' => "", 	
	);	
	
	$option_pagination_gallery = array();		
	
	if (isset($_POST['submit_gallery_option'])) {
		foreach ($default_null_option_pagination_gallery as $key=>$value) {
			if (isset($_POST[$key]) AND ($_POST[$key] != "") ) {
				$option_pagination_gallery[$key] = attribute_escape($_POST[$key]);
			} else {
				$option_pagination_gallery[$key] = $value;
			}
		}				
		update_option('ByREV_Pagination_Gallery', $option_pagination_gallery);		
	}
		
	$option_pagination_gallery = get_option('ByREV_Pagination_Gallery', $default_option_pagination_gallery);
	sync_option_gallery($option_pagination_gallery);	
	
	$opg = &$option_pagination_gallery;	
	

	$filekey = dirname( __FILE__).'/cleanfolder-key.php';

	if (!file_exists($filekey)) {
	    $key = md5(mt_rand().time());
	    $code_key = '<?php define("PASSKEY","'.$key.'"); ?>';
	    file_put_contents($filekey, $code_key); 
	}
	include('cleanfolder-key.php');	
	$url_clean_cache = _BYREV_PAGINATE_PLUGIN_DIR.'/cleanfolder.php?key='.PASSKEY;
	
?>

<script>
var cleancode = '<hr><iframe src="<?=$url_clean_cache;?>" marginwidth="1" marginheight="1" height="300" width="90%" name="delcache" title="Clean Cache" scrolling="no" align="absmiddle"></iframe>';
function clean_gallery_cache(divid) {
	var el = document.getElementById(divid);
	el.innerHTML = cleancode;
	el.style.display = "block";
}
</script>

<div style="text-align: center; border: 1px solid #ccc; width: 95%; ">

<form method="POST" action="">
<table border="0" width="100%" bgcolor="#EEEEEE" cellpadding="4" class="gtable" cellspacing="6">
	<tr>
		<td colspan="7"><span style="float: right;" >[ <a target="_blank" href="http://byrev.org/bookmarks/gallery-pagination-for-wordpress-plugin/">Plugin Page</a> ]</span></td>
	</tr>
	<tr>
		<td width="13%">Force Pagination</td>
		<td width="19%" colspan="4">
		<input type="checkbox" name="force_pagination" value="1" <?php __checked__($opg['force_pagination'],'1'); ?>  ></td>
		<td colspan="2">if &quot;<i>pagination</i>&quot; parameter is not present in gallery code like 
		this: <code>[gallery pagination=&quot;N&quot;]</code>, plugin will force paginate with <b>Default Thumbnails in Page</b> 
		value (see below) <i>(default enabled)</i></td>
	</tr>
	<tr>
		<td width="13%">Default Thumbnails in Page</td>
		<td width="19%" colspan="4">
		<input type="text" name="default_image_in_page" size="29" value="<?=$opg['default_image_in_page'];?>"></td>
		<td colspan="2">Number of images per page. If <b>Force Pagination</b> is false (disabled), this value has no effect
		<i>(default 9)</i></td>
	</tr>
	<tr>
		<td width="13%">Extended Pagination Style</td>
		<td width="19%" colspan="4">
		<input type="checkbox" name="extended_pagination" value="1" <?php __checked__($opg['extended_pagination'],'1'); ?> ></td>
		<td colspan="2">if is disabled, pagination will show only NEXT / PREVIEW style, else 
		will show <b><font color="#0000FF"> <code>
		<span style="background-color: #EEEEEE">&nbsp;&lt; [0, 1, 3 ... N] &gt;
		</span></code> </font>&nbsp;</b>style <i>(default enabled)</i></td>
	</tr>
	<tr>
		<td width="13%" height="49">CSS Pagination Class</td>
		<td width="19%" colspan="4" height="49">
		<input type="text" name="css_pagination_class" size="29" value="<?=$opg['css_pagination_class'];?>"></td>
		<td height="49" colspan="2">Change with your class. For more example, view <i>
		byrev-gallery-pagination.css</i> file from plugin folder <i>(default = 
		paginate_gallery)</i></td>
	</tr>
	<tr>
		<td width="13%">Include Default CSS</td>
		<td width="19%" colspan="4">
		<input type="checkbox" name="include_default_css" value="1" <?php __checked__($opg['include_default_css'],'1'); ?>  ></td>
		<td colspan="2">if css style defined in <b>CSS Pagination Class</b> field (see 
		above), is custom/defined in other file, disable this option. <i>
		(default enabled)</i></td>
	</tr>
	<tr>
		<td width="13%">Pagination Position</td>
		<td class="gcenter" width="3%">Bottom<br>
		<input type="radio" value="bottom" <?php __checked__($opg['pagination_position'],'bottom'); ?> name="pagination_position"></td>
		<td class="gcenter" width="7%" colspan="2">Top<br>
		<input type="radio" value="top" <?php __checked__($opg['pagination_position'],'top'); ?> name="pagination_position"> </td>
		<td class="gcenter" width="6%">Both<br>
		<input type="radio" value="both" <?php __checked__($opg['pagination_position'],'both'); ?> name="pagination_position"></td>
		<td colspan="2">plugin add pagination at the bottom and top gallery. Set/Choose the 
		option that you want <i>(default both)</i></td>
	</tr>
	<tr>
		<td width="13%">Fill Gaps in the Last Row</td>
		<td width="19%" colspan="4">
		<input type="checkbox" name="fill_gaps_in_last_row" value="1" <?php __checked__($opg['fill_gaps_in_last_row'],'1'); ?>  ></td>
		<td colspan="2">if the number of images in gallery will not fill last row to the 
		end, the gaps is filled with empty images. <i>(default enabled)</i></td>
	</tr>
	<tr>
		<td width="13%">Fill Gaps Transparency</td>
		<td width="19%" colspan="4">
		<input type="text" name="fill_gaps_transparency" size="29" value="<?=$opg['fill_gaps_transparency'];?>"></td>
		<td colspan="2">empty images transparency (behavior) / translucency - from 0 to 1; 0 
		= invisible, 1 = no transparency&nbsp; <i>
		(default: 0.5) </i></td>
	</tr>
	<tr>
		<td width="13%">Quick Cache Support</td>
		<td width="19%" colspan="4">
		<input type="checkbox" name="quick_cache_support" value="1" <?php __checked__($opg['quick_cache_support'],'1'); ?>  ></td>
		<td colspan="2">must be enabled for the pages to be cached / valid only for "Quick Cache" plugin. <i>(default enabled)</i></td>
	</tr>
	<tr>
		<td width="13%">Ajax Pagination</td>
		<td width="19%" colspan="4">
		<input type="checkbox" name="ajax_pagination" value="1" <?php __checked__($opg['ajax_pagination'],'1'); ?>  ></td>
		<td colspan="2">if is enabled, pagination is loaded with ajax / Save your bandwidth, 
		resources &amp; speed-up your website.</td>
	</tr>
	<tr>
		<td colspan="7" style="background-color: #CCCCCC">
		<p style="text-align: center"><b><i>CDN Option (Content Distribution Network)</i></b></td>
	</tr>
	<tr>
		<td width="13%">Enable CDN</td>
		<td width="19%" colspan="4">
		<input type="checkbox" name="cdn" value="1" <?php __checked__($opg['cdn'],'1'); ?>  ></td>
		<td colspan="2">if is enabled, images is loaded from CDN mirror servers 
		/ Save resources &amp; speed-up your website. <i>(default disabled)</i></td>
	</tr>
	<tr>
		<td width="13%">Usage Mode</td>
		<td width="5%" colspan="2" style="text-align: center">
		Circular<br>
		List<br>
		<input type="radio" value="round" <?php __checked__($opg['cdn_use_mode'],'round'); ?> name="cdn_use_mode"></td>
		<td width="6%" style="text-align: center">
		Random<br>
		Mode<br>
		<input type="radio" value="rand" <?php __checked__($opg['cdn_use_mode'],'rand'); ?> name="cdn_use_mode"></td>
		<td width="6%" style="text-align: center">
		One/ Session<br>
		<input type="radio" value="one" <?php __checked__($opg['cdn_use_mode'],'one'); ?> name="cdn_use_mode"></td>
		<td colspan="2">For 1'st option: all defined servers will be chosen with 
		rotation (list is randomly mixed). With 2'nd option: all defined servers 
		will be used randomly. 
		Otherwise, only one server will be used per session. Defined servers are 
		chosen randomly (to balance the load)&nbsp; <i>(default 
		Circular List)</i></td>
	</tr>
	<tr>
		<td width="13%" height="31">CDN Severs</td>
		<td width="19%" colspan="4" height="31">
		<input type="text" name="cdn_servers" size="36" value="<?=$opg['cdn_servers'];?>"></td>
		<td colspan="2" height="31">CDN servers separated by <b>|&nbsp;</b><i> (Default: Coral Content Distribution Network <sup>(<a target="_blank" href="http://www.coralcdn.org">http://www.coralcdn.org</a>/)</sup> and your own self-domain) </i>
		<br>
		Note: CORAL CDN is not so fast, it is used only as an example.</td>
	</tr>
	<tr>
		<td colspan="7" style="background-color: #CCCCCC">
		<p style="text-align: center"><b><i>Cache - <font color="#0000FF">Experimental Module</font></i></b></td>
	</tr>
	<tr>
		<td width="13%">Gallery Cache</td>
		<td width="19%" colspan="4">
		<input type="checkbox" name="gallery_cache" value="1" <?php __checked__($opg['gallery_cache'],'1'); ?>  ></td>
		<td width="51%">if is enabled, gallery is loaded from cache / Save resources &amp; 
		speed-up your website. <i>(default disabled)</i></td>
		<td width="12%" rowspan="3">
		<input onclick="clean_gallery_cache('cleancache');" type="button" value="Clear Gallery Cache" name="B1"></td>
	</tr>
	<tr>
		<td width="13%">Gallery Cache Mode</td>
		<td class="gcenter" width="3%">Mysql<br>
		<input disabled type="radio" value="mysql" <?php __checked__($opg['gallery_cache_mode'],'mysql'); ?> name="gallery_cache_mode"></td>
		<td class="gcenter" width="7%" colspan="2">Disk<br>
		<input type="radio" value="disk" <?php __checked__($opg['gallery_cache_mode'],'disk'); ?> name="gallery_cache_mode"> </td>
		<td class="gcenter" width="6%">Auto<br>
		<input disabled type="radio" value="auto" <?php __checked__($opg['gallery_cache_mode'],'auto'); ?> name="gallery_cache_mode"></td>
		<td width="51%">1'st for cache in database, 2'nd for cache to disk, 3'rd for auto 
		detect!; <i><br>
		(default disk - mysql and auto are not implemented yet )</i></td>
	</tr>
	<tr>
		<td width="13%">Cache Expiration</td>
		<td width="19%" colspan="4">
		<input type="text" name="gallery_cache_expiration" size="29" value="<?=$opg['gallery_cache_expiration'];?>"></td>
		<td width="51%">Cache Time-Out (sec) <i>(default 86400 sec = 1 day)</i></td>
	</tr>
</table>

<p><input type="submit" value="Save Options" name="submit_gallery_option"></p>

<div id="cleancache" style="display: none;"></div>

<?php if (!_MENU_CONFIGURATION) : ?>	
<div class="gwarn"><font color="#FFFF00">WARNING</font> : <b>_MENU_CONFIGURATION</b> value from <b>byrev-gallery-pagination.php</b> <i>(plugin file)</i> is 
	<font color="#FFFF00">FALSE</font>! <hr>if you want these options to be valid, 
	<b>_MENU_CONFIGURATION</b> must be <font color="#FFFF00">TRUE</font> .</div>
<?php endif; ?>
<div style="border-top: 2px solid #daa; margin: 10px; ">
<div style="float: right; padding: 3px;">
<a target="_blank" href="http://publicphoto.org/" >Public Domain Photos</a> | ByREV <a target="_blank" href="http://bookmarks.byrev.org/" >Quality Bookmarks</a> | ByREV <a target="_blank" href="http://photography.byrev.org/" >Free Photography</a>
</div>
</div>
<div style="clear: both;"></div>
</form>
<?php if (isset($_POST['submit_gallery_option'])) : ?>
<script> 
setTimeout("clean_gallery_cache('cleancache')",1000)
</script>
<?php endif;?>
</div>