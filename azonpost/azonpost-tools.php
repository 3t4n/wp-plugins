<style>
#icon-ap-ikon {
	background: transparent url('<?php echo plugins_url('/gambar/ap-32.png', __FILE__); ?>') no-repeat;
}
</style>
<?php
   global $title;
   if (function_exists('screen_icon')) {
		screen_icon( 'ap-ikon' );
	}
//nyimpen tags=============
if ($_POST['simpentags'])
{
	if ($_POST['ap_pilih_tags'] == '0')
	{
		$radiotags = $_POST['ap_pilih_tags'];
		update_option('ap_radio_tags_opt', $radiotags);	
		echo '<div class="updated"><p>Post Tags setting successfully saved.</p></div>';
	}else{
		$prasetags = $_POST['prasetags'];
			if(empty($prasetags))
			{
				echo '<div class="error"><p>You have to select at least one phrase.</p></div>';
			}else{
				update_option('ap_prase_tags_opt', $prasetags);
				$radiotags = $_POST['ap_jumlah_tags'];
				update_option('ap_radio_tags_opt', $radiotags);	
				echo '<div class="updated"><p>Post Tags setting successfully saved.</p></div>';
			}
	}
}
if ($_POST['simpendes'])
{
	if ($_POST['ap_metaradio'] == '0')
	{
		$radiodes = $_POST['ap_metaradio'];
		update_option('ap_radio_des_opt', $radiodes);	
		echo '<div class="updated"><p>Meta Description setting successfully saved.</p></div>';
	}else{
		$metades = $_POST['ap_dbmetades'];
		update_option('ap_radio_des_opt', $metades);
		echo '<div class="updated"><p>Meta Description setting successfully saved.</p></div>';
	}
}
if ($_POST['simpenkw'])
{
	if ($_POST['ap_pilih_kw'] == '0')
	{
		$radiokw = $_POST['ap_pilih_kw'];
		update_option('ap_radio_kw_opt', $radiokw);	
		echo '<div class="updated"><p>' . 'Meta Keywords setting successfully saved.' . '</p></div>';
	}else{
			$prasekw = $_POST['prasekw'];
			if(empty($prasekw))
			{
				echo '<div class="error"><p>You have to select at least one phrase.</p></div>';
			}else{
				update_option('ap_prase_kw_opt', $prasekw);
				$radiokw = $_POST['ap_jumlah_kw'];
				update_option('ap_radio_kw_opt', $radiokw);	
				$kastemkw = $_POST['ap_kastem_kw'];
				update_option('ap_kastem_kw_opt', $kastemkw);	
				echo '<div class="updated"><p>Meta Keywords setting successfully saved.</p></div>';
			}	
	}
}	
if ($_POST['simpenfbkomen'])
{
	if (!EMPTY($_POST['ap_fb_lebar']))
	{
		if (ctype_digit($_POST['ap_fb_lebar']))
		{
			$fbkomenopt = array($_POST['ap_fb_pake'], $_POST['ap_fb_lebar'], $_POST['ap_fb_jml'], $_POST['ap_fb_warna']);
			update_option('ap_fb_komen_opt', $fbkomenopt);
    		echo '<div class="updated"><p>Facebook Comments Box Setting saved.</p></div>';
    	}else{
			echo '<div class="error"><p>Facebook number of comments should be numeric values.</p></div>';
		}
	}else{
		echo '<div class="error"><p>Number of Facebook comments can not be empty.</p></div>';
	}
}
//init
$dbradiotags = get_option('ap_radio_tags_opt');
$dbprasetags = get_option('ap_prase_tags_opt');
if (empty($dbprasetags)){$dbprasetags = array( '0' => 'satutags' );}
$dbmetaradio = get_option('ap_radio_des_opt');
$dbradiokw = get_option('ap_radio_kw_opt');
$dbprasekw = get_option('ap_prase_kw_opt');
if (empty($dbprasekw)){$dbprasekw = array( '0' => 'satukw' );}
$dbkastemkw = get_option('ap_kastem_kw_opt');
$fbkomenopt = get_option('ap_fb_komen_opt');
if (empty($fbkomenopt))
{
	$fbkomenopt = array('0', '500', '5', '0');
	update_option('ap_fb_komen_opt', $fbkomenopt);
}
?>
<div class="wrap">	
	<h2><?php _e( 'Tools - '.AP_NAME );?></h2>
	<div id="poststuff" class="metabox-holder has-right-sidebar">
				<div id="side-info-column" class="inner-sidebar">
			<div id="side-sortables" class="meta-box-sortables ui-sortable">
				<div class="postbox inside">
					<h3 class="handle"><?php _e( 'Ads Space' );?></h3>
					<div class="inside">
						<p align="center">
							<script type="text/javascript"><!--
							google_ad_client = "ca-pub-8063998966056079";
							/* azon */
							google_ad_slot = "2180851587";
							google_ad_width = 250;
							google_ad_height = 250;
							//-->
							</script>
							<script type="text/javascript"
							src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
							</script>
						</p>
					</div> 
				</div>
				<div class="postbox inside">
					<h3 class="handle"><?php _e( 'Ads Space' );?></h3>
					<div class="inside">
						<p align="center">
							<script type="text/javascript"><!--
								google_ad_client = "ca-pub-8063998966056079";
								/* azon img 250x250 */
								google_ad_slot = "6552175587";
								google_ad_width = 250;
								google_ad_height = 250;
								//-->
								</script>
								<script type="text/javascript"
								src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
							</script>
						</p>
					</div> 
				</div>
				<div class="postbox inside">
					<h3 class="handle"><?php _e( 'Tips' );?></h3>
					<div class="inside">
						<p>
							By default, the Facebook Comments Box will be placed at the end of the bottom of the post contents.
							You can use shortcode: <code>^fbcomments^</code>, to move the Facebook Comments Box to another place of the post contents.
							This funtion only works, if the Facebook Comments Box setting is enabled.
						</p>
					</div> 
				</div>
					<?php require_once( dirname(__FILE__) . '/azonpost-about.php' );?>
			</div>
		</div>		
<script type="text/javascript">	
function aptagsnone(){
document.getElementById("jumlahtags").style.display = "none";}
function aptagsyup(){
document.getElementById("jumlahtags").style.display = "block";}
function apkwnone(){
document.getElementById("jumlahkw").style.display = "none";}
function apkwyup(){
document.getElementById("jumlahkw").style.display = "block";}
</script>		
	<div id="post-body">
		<form name="ap_form_tools" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<div id="post-body-content">
			<div id="normal-sortables" class="meta-box-sortables ui-sortable">
				<div id="info" class="postbox">
					<h3 class="handle"><?php _e( 'Post Tags Setting' );?></h3>
						<div class="inside">
							<div style="margin-left:15px;">
								<p><a onclick="aptagsnone();"><input type="radio" name="ap_pilih_tags" <?php if ($dbradiotags == '0'){echo 'checked';}?> value="0"></a> None.
								<br />&nbsp;<dfn>No Post Tags will be created.</dfn></p>
								<p><a onclick="aptagsyup();"><input type="radio" name="ap_pilih_tags" <?php if ($dbradiotags != '0'){echo 'checked';}?> value="ike"></a> 
								Create Post Tags when AzonPost publish posts.
								<br />&nbsp;<dfn>Auto insert Post Tags</dfn></p>
								<div id="jumlahtags" style="margin-left:15px;<?php if ($dbradiotags == '0') { echo 'display: none;';}else{echo 'display: block;';}?>">
									<table width="444"><tr><td  colspan="4">Phrases included in Post Tags (sorted by the high to low density):</td></tr>
									<tr><td><input type="checkbox" name="prasetags[]" <?php if (in_array('satutags', $dbprasetags)){echo 'checked';}?> value="satutags" /> One word</td>
									<td><input type="checkbox" name="prasetags[]" <?php if (in_array('duatags', $dbprasetags)){echo 'checked';}?> value="duatags" /> Two words</td>
									<td><input type="checkbox" name="prasetags[]" <?php if (in_array('tigatags', $dbprasetags)){echo 'checked';}?> value="tigatags" /> Three words</td>
									<td><input type="checkbox" name="prasetags[]" <?php if (in_array('empattags', $dbprasetags)){echo 'checked';}?> value="empattags" /> Four words</td></tr>
									</table>
									<p>Number of Tags:
									<select name="ap_jumlah_tags">
										<?php for ($i = 1; $i < 6; $i++) { ?>
										<option <?php if($dbradiotags == $i) {echo "selected";}?> value="<?php echo $i;?>"><?php echo $i;?> &nbsp;</option>
										<?php } ?>
									</select>
								</div>
							</div>
								<br />
								<p style="margin-left:35px;"><input type="submit" name="simpentags" class="button-primary" value="<?php _e('Save') ?>" /></p>		
						</div>
				</div>
				
<script type="text/javascript">	
function kwnone(){
document.getElementById("jumlahdes").style.display = "none";}
function kwmete(){
document.getElementById("jumlahdes").style.display = "block";}
</script>		
				<div id="ap-sampen" class="postbox">
					<h3 class="hndle"><span><?php _e('Meta Description Setting' ); ?></span></h3>
					<div class="inside">
						<div style="margin-left:15px;">
							<p><a onclick="kwnone();"><input type="radio" name="ap_metaradio" <?php if ($dbmetaradio == '0'){echo 'checked';}?> value="0"></a> None.
							<br />&nbsp;<dfn>No Meta Description will be created.</dfn></p>
							<p><a onclick="kwmete();"><input type="radio" name="ap_metaradio" <?php if ($dbmetaradio != '0'){echo 'checked';}?> value="kastem"></a> 
							Create Meta Description when AzonPost publish posts.
							<br />&nbsp;<dfn>Auto insert Meta Description by creating Custom Fields</dfn></p>
							<div id="jumlahdes" style="margin-left:15px;<?php if ($dbmetaradio == '0') { echo 'display: none;';}else{echo 'display: block;';}?>">
								<p>Meta Description: 
									<select name="ap_dbmetades">
										<option <?php if($dbmetaradio == "1") {echo "selected";}?> value="1">First 20 words of post content</option>
										<option <?php if($dbmetaradio == "2") {echo "selected";}?> value="2">Last 20 words of post content</option>
										<option <?php if($dbmetaradio == "3") {echo "selected";}?> value="3">Random 20 words of post content </option>
									</select>
								</p>
							</div>
						</div>
								<br />
	<p style="margin-left:35px;"><input type="submit" name="simpendes" class="button-primary" value="<?php _e('Save') ?>" /></p>		
	</div>
				</div>
				<div id="info" class="postbox">
					<h3 class="handle"><?php _e( 'Meta Keywords Setting' );?></h3>
						<div class="inside">
							<div style="margin-left:15px;">
								<p><a onclick="apkwnone();"><input type="radio" name="ap_pilih_kw" <?php if ($dbradiokw == '0'){echo 'checked';}?> value="0"></a> None.
								<br />&nbsp;<dfn>No Meta Keywords will be created.</dfn></p>
								<p><a onclick="apkwyup();"><input type="radio" name="ap_pilih_kw" <?php if ($dbradiokw != '0'){echo 'checked';}?> value="elly"></a> 
								Create Meta Keywords when AzonPost publish posts.
								<br />&nbsp;<dfn>Auto insert Meta Keywords by creating Custom Fields</dfn></p>
								<div id="jumlahkw" style="margin-left:15px;<?php if ($dbradiokw == '0') { echo 'display: none;';}else{echo 'display: block;';}?>">
									<table width="444"><tr><td  colspan="4">Phrases included in Meta Keywords (sorted by the high to low density):</td></tr>
									<tr><td><input type="checkbox" name="prasekw[]" <?php if (in_array('satukw', $dbprasekw)){echo 'checked';}?> value="satukw" /> One word</td>
									<td><input type="checkbox" name="prasekw[]" <?php if (in_array('duakw', $dbprasekw)){echo 'checked';}?> value="duakw" /> Two words</td>
									<td><input type="checkbox" name="prasekw[]" <?php if (in_array('tigakw', $dbprasekw)){echo 'checked';}?> value="tigakw" /> Three words</td>
									<td><input type="checkbox" name="prasekw[]" <?php if (in_array('empatkw', $dbprasekw)){echo 'checked';}?> value="empatkw" /> Four words</td></tr>
									</table>
									<p>Number of Meta Keywords:
									<select name="ap_jumlah_kw">
										<?php for ($i = 1; $i <= 9; $i++) { ?>
										<option <?php if($dbradiokw == $i) {echo "selected";}?> value="<?php echo $i;?>"><?php echo $i;?> &nbsp;</option>
										<?php } ?>
									</select>
									</p>
									<p>Add custom Meta Keywords: <input type="text" name="ap_kastem_kw" value="<?php echo $dbkastemkw;?>" size="55"> <dfn>(separated by comas)</dfn></p>
								</div>
							</div>
								<br />
								<p style="margin-left:35px;"><input type="submit" name="simpenkw" class="button-primary" value="<?php _e('Save') ?>" /></p>		
						</div>
				</div>
				<div id="fbkomenform" class="postbox">
					<h3 class="handle"><?php _e( 'Facebook Comments Box Setting' );?></h3>
						<div class="inside">
							<div style="margin-left:15px;">
								<table><tr><td>
									Enable: </td><td><select name="ap_fb_pake">	
										<option <?php if($fbkomenopt[0] == '0') {echo "selected";}?> value="<?php echo '0';?>"><?php echo 'Nope';?></option>
										<option <?php if($fbkomenopt[0] == '1') {echo "selected";}?> value="<?php echo '1';?>"><?php echo 'Sure';?></option>
										</select>
									</td></tr>
									<tr><td>
									Width: </td><td><input type="text" name="ap_fb_lebar" value="<?php echo $fbkomenopt[1];?>" size="5"> <dfn>(in pixels)</dfn></td></tr>
									<tr><td>
									Number of Comments: </td><td><select name="ap_fb_jml">		
										<?php for ($i = 1; $i <= 10; $i++){?>
										<option <?php if($fbkomenopt[2] == $i) {echo "selected";}?> value="<?php echo $i;?>"><?php echo $i;}?></option>
										</select>
									</td></tr>
									<tr><td>
									Color Scheme: </td><td><select name="ap_fb_warna">	
										<option <?php if($fbkomenopt[3] == '0') {echo "selected";}?> value="<?php echo '0';?>"><?php echo 'Light';?></option>
										<option <?php if($fbkomenopt[3] == '1') {echo "selected";}?> value="<?php echo '1';?>"><?php echo 'Dark';?></option>
										</select>
									</td></tr>
								</table>
							</div>
								<br />
								<p style="margin-left:35px;"><input type="submit" name="simpenfbkomen" class="button-primary" value="<?php _e('Save') ?>" /></p>		
						</div>
				</div>
			</div>
		</div>
	</div>
</div>