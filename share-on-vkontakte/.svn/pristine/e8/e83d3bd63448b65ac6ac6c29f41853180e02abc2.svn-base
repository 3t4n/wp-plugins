<?php

/*
Plugin Name: Share On Vkontakte
Version: 1.0
Plugin URI: http://blogoe.ru/share-on-vkontakte/
Description: Add link to share the current post or page to social network VKontakte (vkontakte.ru, vk.com).
Author: Blogoe.ru, Denis Boltikov
Author URI: http://blogoe.ru/
*/



// Create the options page
function share_on_vkontakte_options_page() {
	$current_options = get_option('share_on_vkontakte_options');
	
	$in_page =  $current_options["in_page"];
	$in_post =  $current_options["in_post"];
	$in_frontpage =  $current_options["in_frontpage"];
	$in_arhives =  $current_options["in_arhives"];
	$align_vertical =  $current_options["align_vertical"];
	$align_horizontal =  $current_options["align_horizontal"];
	$css =  $current_options["css"];
	$addtype =  $current_options["addtype"];
	$btn_rac =  $current_options["btn_rac"];
	$btn_style =  $current_options["btn_style"];
	$btn_text =  $current_options["btn_text"];



	if ($_POST['action']){ ?>
		<div id="message" class="updated fade"><p><strong>Options saved.</strong></p></div>
	<?php } ?>
	<div class="wrap" id="share-on-vkontakte-options">
		<h2>Share on Vkontakte Plugin Options</h2>

		<form method="post" action="<?php echo $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']; ?>">
			<fieldset>
				<input type="hidden" name="action" value="save_share_on_vkontakte_options" />
				<table width="100%" cellspacing="2" cellpadding="5" class="editform">
					<colgroup width="200" align="left" valign="top" span="1" />
					<colgroup width="*" align="left" valign="top" span="1" />
					<tr><td colspan="2">&nbsp;</td></tr>
					<tr>
						<td valign="top">Display</td>
						<td><input type="checkbox" name="in_post" value="1" <?php echo ($in_post)?' checked="checked"':''; ;?> /> <label for="in_post">On posts</label></td>
					</tr>
					<tr>
						<td valign="top"></td>
						<td><input type="checkbox" name="in_frontpage" value="1" <?php echo ($in_frontpage)?' checked="checked"':''; ;?> /> <label for="in_frontpage">On frontpage (home)</label></td>
					</tr>
					<tr>
						<td valign="top"></td>
						<td><input type="checkbox" name="in_arhives" value="1" <?php echo ($in_arhives)?' checked="checked"':''; ;?> /> <label for="in_arhives">On archives (category, tag, search)</label></td>
					</tr>
					<tr>
						<td valign="top"></td>
						<td><input type="checkbox" name="in_page" value="1" <?php echo ($in_page)?' checked="checked"':''; ;?> /> <label for="in_page">On pages</label></td>
					</tr>
					<tr><td colspan="2">&nbsp;</td></tr>
					<tr>
						<td valign="top"><label for="align_vertical">Insertion on Post:</label></td>
						<td><select name="align_vertical" style="width: 250px;">
						<option value ="top" <?php if ($align_vertical === "top") echo 'selected="selected"';?>>Top</option>
						<option value ="bottom"<?php if ($align_vertical === "bottom") echo 'selected="selected"';?>>Bottom</option>
						</select></td>
					</tr>
					<tr>
						<td valign="top"><label for="align_horizontal">Align:</label></td>
						<td><select name="align_horizontal" style="width: 250px;">
						<option value ="left" <?php if ($align_horizontal === "left") echo 'selected="selected"';?>>Left</option>
						<option value ="right"<?php if ($align_horizontal === "right") echo 'selected="selected"';?>>Right</option>
						<option value ="none"<?php if ($align_horizontal === "none") echo 'selected="selected"';?>>None</option>
						</select></td>
					</tr>
					<tr><td colspan="2">&nbsp;</td></tr>
					<tr>
						<td valign="top"> <label for="css">Inline CSS:</label></td>
						<td><textarea name="css" style="width: 300px;height: 100px;"><? echo $css; ?></textarea></td>
					</tr>
					<tr><td colspan="2">&nbsp;</td></tr>
					<tr>
						<td valign="top"><label for="addtype">Add type:</label></td>
						<td><select name="addtype" style="width: 250px;">
						<option value ="auto" <?php if ($addtype === "auto") echo 'selected="selected"';?>>Auto</option>
						<option value ="manual"<?php if ($addtype === "manual") echo 'selected="selected"';?>>Manual</option>
						</select></td>
					</tr>
					<tr><td colspan="2">&nbsp;</td></tr>
					<tr><td colspan="2"><hr /></td></tr>
					<tr><td colspan="2"><h2>Vkontakte Button Options</h2></td></tr>
					<tr><td colspan="2">&nbsp;</td></tr>
					<tr>
						<td valign="top">Button Style</td>
						<td>
							<input type="radio" name="btn_style" id="b1" value="Кнопка" <?php echo ($btn_style == 'Кнопка')?' checked="checked"':''; ;?> /> 
								<label for="b1">Кнопка</label><br />
							<input type="radio" name="btn_style" id="b2" value="Кнопка без счетчика" <?php echo ($btn_style == 'Кнопка без счетчика')?' checked="checked"':''; ;?> /> 
								<label for="b2">Кнопка без счетчика</label><br />
							<input type="radio" name="btn_style" id="b3" value="Ссылка" <?php echo ($btn_style == 'Ссылка')?' checked="checked"':''; ;?> /> 
								<label for="b3">Ссылка</label><br />
							<input type="radio" name="btn_style" id="b4" value="Ссылка без иконки" <?php echo ($btn_style == 'Ссылка без иконки')?' checked="checked"':''; ;?> /> 
								<label for="b4">Ссылка без иконки</label><br />
							<input type="radio" name="btn_style" id="b5" value="Иконка" <?php echo ($btn_style == 'Иконка')?' checked="checked"':''; ;?> /> 
								<label for="b5">Иконка</label><br />
						</td>
					</tr>
					<tr><td colspan="2">&nbsp;</td></tr>
					<tr>
						<td valign="top">Adding Parameters</td>
						<td><input type="checkbox" name="btn_rac" value="1" <?php echo ($btn_rac)?' checked="checked"':''; ;?> /> <label for="btn_rac">Right-angled corners</label></td>
					</tr>
					<tr><td colspan="2">&nbsp;</td></tr>
					<tr>
						<td valign="top"><label for="btn_text">Button Text</label></td>
						<td><input type="text" name="btn_text" style="width: 250px;" value="<?php echo ($btn_text); ;?>" /></td>
					</tr>
				</table>
			</fieldset>
			<p class="submit">
				<input type="submit" name="Submit" value="Update Options &raquo;" />
			</p>
		</form>
		<h2>Notes</h2>
		<ul>
			<li>Use &lt;!--vk--&gt; for manual adding button on a page.</li>
			<li>Use class "vkbutton" for design button.</li>
			<li></li>
			<li>(c) <a href="http://blogoe.ru/" target="_blank">Блогое.ru</a>.</li>
		</ul>
	</div>
<?php
}

// Add a new menu under Options
function share_on_vkontakte_add_options_page() {
	add_options_page('Share on Vkontakte', 'Share on Vkontakte', 10, __FILE__, 'share_on_vkontakte_options_page');
}

// Save options
function share_on_vkontakte_save_options() {
	$share_on_vkontakte_options["in_page"] =  $_POST["in_page"];
	$share_on_vkontakte_options["in_post"] =  $_POST["in_post"];
	$share_on_vkontakte_options["in_frontpage"] =  $_POST["in_frontpage"];
	$share_on_vkontakte_options["in_arhives"] =  $_POST["in_arhives"];
	$share_on_vkontakte_options["align_vertical"] =  $_POST["align_vertical"];
	$share_on_vkontakte_options["align_horizontal"] =  $_POST["align_horizontal"];
	$share_on_vkontakte_options["css"] =  $_POST["css"];
	$share_on_vkontakte_options["addtype"] =  $_POST["addtype"];
	$share_on_vkontakte_options["btn_rac"] =  $_POST["btn_rac"];
	$share_on_vkontakte_options["btn_style"] =  $_POST["btn_style"];
	$share_on_vkontakte_options["btn_text"] =  $_POST["btn_text"];


	update_option('share_on_vkontakte_options', $share_on_vkontakte_options);
	$options_saved = true;
}

function share_on_vkontakte_add_js ($str) {
	echo '<script type="text/javascript" src="http://vkontakte.ru/js/api/share.js?5"></script>';
	return false;
}

function share_on_vkontakte_add_to_page($postval) {
	global $post;
	$current_options = get_option('share_on_vkontakte_options');	
	$in_page =  $current_options["in_page"];
	$in_post =  $current_options["in_post"];
	$in_frontpage =  $current_options["in_frontpage"];
	$in_arhives =  $current_options["in_arhives"];
	$align_vertical =  $current_options["align_vertical"];
	$align_horizontal =  $current_options["align_horizontal"];
	$css =  $current_options["css"];
	$addtype =  $current_options["addtype"];
	$btn_rac =  $current_options["btn_rac"];
	$btn_style =  $current_options["btn_style"];
	$btn_text =  $current_options["btn_text"];

	$style = '';
	if ($align_horizontal != 'none')
		$style=($align_horizontal == 'left')?'float:left;':'float:right;';
	$style ='style="'.$style.$css.'"';

	$btn_rac2 = ($btn_rac)?'button':'round';

	switch ($btn_style) {
		case 'Кнопка':
			$btn_rac2 = ($btn_rac)?'button':'round';
			break;
		case 'Кнопка без счетчика':
			$btn_rac2 .= "_nocount";
			break;
		case 'Ссылка':
			$btn_rac2 = "link";
			break;
		case 'Ссылка без иконки':
			$btn_rac = "link_noicon";
			break;
		case 'Иконка':
			$btn_rac2 = "custom";
			$btn_text = "<img src='http://vk.com/images/vk32.png?1' />";
			break;
		default: 
			$btn_rac2 = ($btn_rac)?'button':'round';
	}
	
	$vk = "<div class=\"vkbutton\"".$style."><script type=\"text/javascript\"><!--
document.write(VK.Share.button('".get_permalink($post->ID)."',{type: \"".$btn_rac2."\", text: \"".$btn_text."\"}));
--></script></div>";
	
	if (
			(is_home() && $in_frontpage) ||
			(is_front_page() && $in_frontpage) ||
			(is_single() && $in_post) ||
			(is_page() && $in_page) ||
			(is_archive() && $in_arhives)
		) {
		if ($addtype == 'auto') {
			if ($align_vertical == 'top') {
				$postval = $vk.$postval;
			} else {
				$postval .= $vk;
			}
			$postval = str_replace ('<!--vk-->', '', $postval);
		} else {
			$postval = str_replace ('<!--vk-->', $vk, $postval);
		}
	}

	return $postval;
}

// Create default options
if (!get_option('share_on_vkontakte_options')){
	$share_on_vkontakte_options["in_page"] = '0'; // 1 or 0
	$share_on_vkontakte_options["in_post"] = '1'; // 1 or 0
	$share_on_vkontakte_options["in_frontpage"] = '1'; // 1 or 0
	$share_on_vkontakte_options["in_arhives"] = '0'; // 1 or 0
	$share_on_vkontakte_options["align_vertical"] = 'top'; // top, bottom
	$share_on_vkontakte_options["align_horizontal"] = 'right'; // right, left or none
	$share_on_vkontakte_options["css"] = 'display:inline;margin: 0 0 5px 5px;'; // css inline
	$share_on_vkontakte_options["addtype"] = 'auto'; // auto or manual
	$share_on_vkontakte_options["btn_rac"] =  '0'; // 0 = round & 1 = corner
	$share_on_vkontakte_options["btn_style"] =  'Кнопка';
	$share_on_vkontakte_options["btn_text"] =  'Сохранить';

	update_option('share_on_vkontakte_options', $share_on_vkontakte_options);
}

if ($_POST['action'] == 'save_share_on_vkontakte_options'){
	share_on_vkontakte_save_options();
}

add_action('wp_head', 'share_on_vkontakte_add_js');
add_action('admin_menu', 'share_on_vkontakte_add_options_page');
add_action('the_content', 'share_on_vkontakte_add_to_page');

?>