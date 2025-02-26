<?php
/* 
Plugin Name: Multilingual
Plugin URI: http://doocy.net/multilingual/
Description: Adds support for creating multilingual posts. <strong>Requires WordPress 1.5.</strong> Contributing developers: <a href="http://climbtothestars.org">Stephanie Booth</a> and <a href="http://lascribe.net/">Chris Waigl</a>.
Version: 0.8
Author: Morgan Doocy
Author URI: http://doocy.net/
*/

/*
Multilingual - Write posts in multiple languages.
Copyright (C) 2005  Morgan Doocy, Chris Waigl

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
*/

/*
NOTE: This release is ALPHA-level software. It is known to be feature-incomplete and/or partially functional.

Changelog
=========
0.1    - Initial release.
0.2    - Check HTTP_ACCEPT_LANGUAGE too
       - Added the_permalink filter
       - Added support for post-level switching with cookie memory
       - Added support for page-level switching with cookie forget
       - Fixed template function return values on edit.php and post.php
0.3    - Updated Chinese language codes to conform to RFC 1766
       - Allow for multiple languages and precedence in HTTP_ACCEPT_LANGUAGE
       - Updated resolve_post_lang() to use HTTP_ACCEPT_LANGUAGE langs
       - Fixed regexp's to make sure country codes are capitalized
       - Some code refactoring
0.3.1  - Fixed Chinese language codes in $default_frequent_langs
0.3.2  - Added options and made changes to get_page_langs() -- cw
0.3.3  - Fixed get_page_langs() query string: function to delete stuff from query string
0.3.4  - Condensed ml_delang_uri() -- MD
0.4    - Switched from filters on post elements to replacement template functions
0.5    - Added support for feeds
       - HTTP_ACCEPT_LANGUAGE and user agent language are now cached in a cookie
       - Added format support to get_page_langs()
0.5.1  - WordPress localization switcher added
0.6    - Added specific-language localization functions
       - Added on-demand localization module loading
       - Added locale support
0.7    - Added support for translated category names
       - Some code rearranging
0.7.1  - Filled out category/translation admin functionality
       - Added ability to add categories
0.8    - Converted category translation from gettext to database
       - Added permalink support, with full translation of all non-numeric portions of URIs

*/

if (is_plugin_page()) {
	
	if (isset($_GET['action'])) $action = $_GET['action'];
	elseif (isset($_POST['action'])) $action = $_POST['action'];
	
	if (isset($_GET['message'])) {
		switch ($_GET['message']) {
			case '-1':
				echo '<div class="error"><p>' . __('Your <code>wp-config.php</code> file must be writable for the WordPress Localization feature to be available.', 'Multilingual') . '</p></div>';
				break;
			case '1':
				echo '<div class="updated"><p>' . __('Category added.') . '</p></div>';
				break;
			case '2':
				echo '<div class="updated"><p>' . __('Category deleted.') . '</p></div>';
				break;
			case '3':
				echo '<div class="updated"><p>' . __('Category updated.') . '</p></div>';
				break;
		}
	}
	
	switch ($action) {
		case 'languages':
			$frequent_langs = get_settings('frequent_langs');
			if (is_dir(ABSPATH . 'wp-includes/languages') && $dh = opendir(ABSPATH . 'wp-includes/languages')) {
				$mofiles['en_US'] = '';
				while (($file = readdir($dh)) !== false) {
					if (strstr($file, '.mo') && '.' != $file && '..' != $file) {
						$mofiles[str_replace('.mo', '', $file)] = $file;
					}
				}
				ksort($mofiles);
			} ?>
		<div class="wrap">
			<h2><?php _e('Language Options', 'Multilingual') ?></h2>
			<form method="post" action="admin.php?page=multilingual.php&action=updatelangs">
				<table width="100%" cellspacing="2" cellpadding="5" class="editform">
					<tr valign="top">
						<th width="33%" scope="row"><?php _e('Frequent Languages:', 'Multilingual') ?></th>
						<td>
							<select name="frequent_langs[]" id="frequent_langs" size="10" multiple="multiple">
							<?php foreach ($lang_codes as $code => $name) : ?>
								<option value="<?php echo $code ?>"<?php if (in_array($code, $frequent_langs)) echo ' selected="selected"' ?>><?php echo $name ?></option>
							<?php endforeach; ?>
							</select>
						</td>
					</tr>
					<tr valign="top">
						<th width="33%" scope="row"><?php _e('WordPress Localization:', 'Multilingual') ?></th>
						<td>
							<select name="wordpress_l10n" id="wordpress_l10n"<?php if (!is_readable($wpconfig) || !is_writable($wpconfig)) echo ' disabled="disabled"' ?>>
						<?php
							foreach ($mofiles as $code => $file) {
								$dashit = str_replace('_', '-', $code);
								if (array_key_exists($dashit, $lang_codes)) $lang = $lang_codes[$dashit];
								elseif (array_key_exists(substr($dashit, 0, 2), $lang_codes)) $lang = $lang_codes[substr($dashit, 0, 2)];
								if ($dashit == 'en-US') $lang = sprintf(__('%s (Default)', 'Multilingual'), $lang); ?>
								<option value="<?php echo $code ?>"<?php if ($code == WPLANG || (WPLANG == '' && $code == 'en_US')) echo ' selected="selected"' ?>><?php echo $lang; ?></option>
						<?php
							} ?>
							</select>
						<?php if (!is_readable($wpconfig) || !is_writable($wpconfig)) : ?>
							<br/><em><?php _e('Your <code>wp-config.php</code> file must be writable for this feature to be available.', 'Multilingual') ?></em>
						<?php endif; ?>
						</td>
					</tr>
				</table>
				<div class="submit"><p><input type="submit" name="update_languages" id="update_languages" value="<?php _e('Update Languages &raquo;', 'Multilingual') ?>" /></p></div>
			</form>
		</div>
			<?php
			break;
		case 'locales':
			$multilingual_date_formats = get_settings('multilingual_date_formats');
			$multilingual_time_formats = get_settings('multilingual_time_formats');
			
			?>
		<div class="wrap">
			<h2><?php _e('Date and Time') ?></h2>
			<form method="post" action="admin.php?page=multilingual.php&action=updatelocales">
				<p><?php _e('The following use the same syntax as the <a href="http://php.net/date">PHP <code>date()</code>function</a>. Save option to update sample output.') ?></p>
				<table with="100%" cellspacing="2" cellpadding="5">
					<thead>
						<tr>
							<th scope="col"><?php _e('Locale', 'Multilingaul') ?></th>
							<th scope="col"><?php _e('Date Format', 'Multilingaul') ?></th>
							<th scope="col"><?php _e('Time Format', 'Multilingaul') ?></th>
						</tr>
					</thead>
					<tbody>
				<?php
					foreach (array_keys($multilingual_date_formats) as $code) {
						$date_format = $multilingual_date_formats["$code"];
						$time_format = $multilingual_time_formats["$code"];
						if (array_key_exists($code, $lang_codes))
							$lang_name = $lang_codes["$code"];
						elseif (array_key_exists(substr($code, 0, 2), $lang_codes))
							$lang_name = $lang_codes[substr($code, 0, 2)];
						else
							$lang_name = $code;
						
						if (!$default) {
							$lang_name = sprintf(__('Default (%s)', 'Multilingual'), $lang_name);
							$default = true;
						} ?>
					<tr>
						<th scope="row"><?php echo $lang_name ?></th>
						<td>
							<input name="date_format_<?php echo $code ?>" type="text" id="date_format_<?php echo $code ?>" size="30" value="<?php echo $date_format ?>" /><br />
							<?php _e('Output:') ?> <strong><?php echo ml_mysql2date($date_format, current_time('mysql'), $code); ?></strong>
						</td>
						<td>
							<input name="time_format_<?php echo $code ?>" type="text" id="time_format_<?php echo $code ?>" size="30" value="<?php echo $time_format ?>" /><br />
							<?php _e('Output:') ?> <strong><?php echo ml_mysql2date($time_format, current_time('mysql'), $code); ?></strong>
						</td>
					</tr>
			<?php	} ?>
					</tbody>
				</table>
				<div class="submit"><p><input type="submit" name="update_locales" value="<?php _e('Update Locales &raquo;', 'Multilingual') ?>" /></p></div>
				<fieldset id="addlocalediv"><legend><?php _e('Add a Locale', 'Multilingual') ?></legend><div class="submit"><select name="new_locale" id="new_locale">
			<?php
				foreach ($lang_codes as $code => $name) {
					if (!array_key_exists($code, $multilingual_date_formats)) echo '<option value="' . $code . '">' . $name . '</option>';
				} ?>
				</select> <input type="submit" name="add_locale" id="add_locale" value="<?php _e('Add Locale', 'Multilingual') ?>" /></div></fieldset>
				
		<?php	unset($default);
				if (count($multilingual_date_formats) > 1) { ?>
				<fieldset id="deletelocalediv"><legend><?php _e('Delete a Locale', 'Multilingual') ?></legend><div class="submit"><select name="old_locale" id="old_locale">
				<?php
					foreach (array_keys($multilingual_date_formats) as $code) {
						if (!$default) {
							$default = true;
							continue;
						}
						echo '<option value="' . $code . '">' . $lang_codes["$code"] . '</option>';
					} ?>
				</select> <input type="submit" name="delete_locale" id="delete_locale" value="<?php _e('Delete Locale', 'Multilingual') ?>" /></div></fieldset>
		<?php	} ?>
			</form>
		</div>
			<?php
			break;
		case 'categories':
			?>
		<div class="wrap">
			<h2><?php _e('Categories') ?></h2>
			<table with="100%" cellspacing="3" cellpadding="3">
				<thead>
					<tr>
						<th scope="col"><?php _e('ID') ?></th>
						<th scope="col"><?php _e('Name') ?></th>
						<th scope="col"><?php _e('Description') ?></th>
						<th scope="col"><?php _e('# Posts') ?></th>
						<th colspan="2"><?php _e('Action') ?></th>
					</tr>
				</thead>
				<tbody>
					<?php ml_cat_rows(); ?>
				</tbody>
			</table>
		</div>
	<?php	if ( $user_level > 3 ) {
				$translations = get_category_translations(1, '', true);
				foreach ($translations as $translation) {
					$uncategorized[] = $translation['cat_name'];
				}
				$uncategorized = join(' / ', $uncategorized);
				?>
		<div class="wrap">
			<p><?php printf(__('<strong>Note:</strong><br />
			Deleting a category does not delete posts from that category, it will just
			set them back to the default category <strong>%s</strong>.'), $uncategorized) ?>
			</p>
		</div>
		
		<div class="wrap">
			<h2><?php _e('Add New Category') ?></h2>
			<form name="addcat" id="addcat" action="admin.php?page=multilingual.php&action=addcat" method="post">
				<p><?php _e('Name:') ?><br />
				<input type="text" name="cat_name" value="" /></p>
				<p><?php _e('Category parent:') ?><br />
				<select name="category_parent" class="postform">
				<option value='0'><?php _e('None') ?></option>
				<?php wp_dropdown_cats(0); ?>
				</select></p>
				<p><?php _e('Description: (optional)') ?> <br />
				<textarea name="category_description" rows="5" cols="50" style="width: 97%;"></textarea></p>
				<p class="submit"><input type="submit" name="submit" value="<?php _e('Add Category &raquo;') ?>" /></p>
			</form>
		</div>
	<?php	}
			break;
		case 'editcat':
			$cat_ID = (int) $_GET['cat_ID'];
			$category_parent = $wpdb->get_var("SELECT category_parent FROM $wpdb->categories WHERE cat_ID = '$cat_ID'");
			$category_languages = get_category_languages($cat_ID, true);
			$translations = get_category_translations($cat_ID, '', true);
			?>
		<div class="wrap">
			<h2><?php _e('Edit Category Translations', 'Multilingual') ?></h2>
			<form name="editcat" action="admin.php?page=multilingual.php&action=editedcat" method="post">
	<?php	for ($i = 0; $i < count($translations); $i++) {
				$code = $translations[$i]['lang'];
				$frequent_langs = get_settings('frequent_langs');
				
				if (array_key_exists($code, $lang_codes))
					$lang_name = $lang_codes["$code"];
				elseif (array_key_exists(substr($code, 0, 2), $lang_codes))
					$lang_name = $lang_codes[substr($code, 0, 2)];
				else
					$lang_name = $code;
				
				if ($i == 0)
					$lang_name = sprintf(__('Default (%s)', 'Multilingual'), $lang_name);
				
				$cat_name = $translations[$i]['cat_name'];
				$category_nicename = $translations[$i]['category_nicename'];
				$category_description = $translations[$i]['category_description'];
				?>
				
				<h3><?php echo $lang_name ?></h3>
				<table class="editform" width="100%" cellspacing="2" cellpadding="5">
					<tr>
						<th width="33%" scope="row"><?php _e('Category name:') ?></th>
						<td width="67%"><input name="cat_name_<?php echo $code ?>" type="text" value="<?php echo wp_specialchars($cat_name); ?>" size="40" />
						<input type="hidden" name="cat_ID" value="<?php echo $cat_ID ?>" /></td>
					</tr>
					<tr>
						<th scope="row"><?php _e('Category slug:') ?></th>
						<td><input name="category_nicename_<?php echo $code ?>" type="text" value="<?php echo wp_specialchars($category_nicename); ?>" size="40" /></td>
					</tr>
				<?php if ($i == 0) : ?>
					<tr>
						<th scope="row"><?php _e('Category parent:') ?></th>
						<td>
							<select name="category_parent">
								<option value="0" <?php if (!$category_parent) echo ' selected="selected"'; ?>><?php _e('None') ?></option>
								<?php wp_dropdown_cats($cat_ID, $category_parent); ?>
							</select>
						</td>
					</tr>
				<?php endif; ?>
					<tr>
						<th scope="row"><?php _e('Description:') ?></th>
						<td><textarea name="category_description_<?php echo $code ?>" rows="5" cols="50" style="width: 97%;"><?php echo wp_specialchars($category_description, 1); ?></textarea></td>
					</tr>
				</table>
	<?php	} ?>
				<p class="submit"><input type="submit" name="edit_category" value="<?php _e('Edit category') ?> &raquo;" /></p>
				<fieldset id="addlangdiv"><legend><?php _e('Add a Language', 'Multilingual') ?></legend><div class="submit"><select name="new_lang" id="new_lang">
			<?php
				foreach ($frequent_langs as $code) {
					if (!array_key_exists($code, $category_languages)) echo '<option value="' . $code . '">' . $lang_codes["$code"] . '</option>';
				} ?>
				</select> <input type="submit" name="add_lang" id="add_lang" value="<?php _e('Add Language', 'Multilingual') ?>" /></div></fieldset>
				
		<?php	if (count($category_languages) > 1) { ?>
				<fieldset id="deletelangdiv"><legend><?php _e('Delete a Language', 'Multilingual') ?></legend><div class="submit"><select name="old_lang" id="old_lang">
				<?php
					for ($i = 1; $i < count($category_languages); $i++) {
						$code = $category_languages[$i];
						echo '<option value="' . $code . '">' . $lang_codes["$code"] . '</option>';
					} ?>
				</select> <input type="submit" name="delete_lang" id="delete_lang" value="<?php _e('Delete Language', 'Multilingual') ?>" /></div></fieldset>
		<?php	} ?>
			</form>
			<p><a href="admin.php?page=multilingual.php&action=categories"><?php _e('&laquo; Return to category list'); ?></a></p>
		</div>
			<?php
			break;
		case 'permalinks':
			
			save_mod_rewrite_rules();
			
			$permalink_structure = get_settings('permalink_structure');
			$category_base = get_settings('category_base');
			$permalink_languages = get_settings('permalink_languages');
			$nonvariable_translations = get_settings('nonvariable_permalink_translations');
			$category_base_translations = get_settings('category_base_permalink_translations');
			
			$nonvariables = preg_replace('!(%[^%]*?%|index.php)/!', '', $permalink_structure);
			?>
		<div class="wrap">
			<h2><?php _e('Multilingual Permalinks', 'Multilingual') ?></h2>
			<?php if ('/' == $nonvariables && '' == $category_base) : ?>
				<p>There are no translatable portions in your permalink setting:</p>
				<blockquote><code><?php echo $permalink_structure ?></code></blockquote>
			<?php else : ?>
			<form action="admin.php?page=multilingual.php&action=updatepermalinks" method="post">
	<?php	for ($i = 0; $i < count($permalink_languages); $i++) {
				$code = $permalink_languages[$i];
				$frequent_langs = get_settings('frequent_langs');
				
				if (array_key_exists($code, $lang_codes))
					$lang_name = $lang_codes["$code"];
				elseif (array_key_exists(substr($code, 0, 2), $lang_codes))
					$lang_name = $lang_codes[substr($code, 0, 2)];
				else
					$lang_name = $code;
				
				if ($i == 0) {
					$lang_name = sprintf(__('Default (%s)', 'Multilingual'), $lang_name);
					$nonvar = $nonvariables;
					$base = $category_base;
					$code = 'default';
				}
				else {
					$nonvar = $nonvariable_translations[$code];
					$base = $category_base_translations[$code];
				}
				?>
				<h3><?php echo $lang_name ?></h3>
				<table class="editform" width="100%" cellspacing="2" cellpadding="5">
					<tr>
						<th width="33%" scope="row"><?php _e('Translatable portion:', 'Multilingual') ?></th>
						<td width="67%"><input name="nonvar_<?php echo $code ?>" type="text" value="<?php echo wp_specialchars($nonvar); ?>" size="40" />
					</tr>
			<?php if ($category_base) : ?>
					<tr>
						<th scope="row"><?php _e('Category base:') ?></th>
						<td><input name="base_<?php echo $code ?>" type="text" value="<?php echo wp_specialchars($base); ?>" size="40" /></td>
					</tr>
			<?php endif; ?>
				</table>
	<?php	} ?>
				<p class="submit"><input type="submit" name="update_permalinks" value="<?php _e('Update permalinks') ?> &raquo;" /></p>
				<fieldset id="addlangdiv"><legend><?php _e('Add a Language', 'Multilingual') ?></legend><div class="submit"><select name="new_lang" id="new_lang">
			<?php
				foreach ($frequent_langs as $code) {
					if (!array_key_exists($code, $permalink_languages)) echo '<option value="' . $code . '">' . $lang_codes["$code"] . '</option>';
				} ?>
				</select> <input type="submit" name="add_lang" id="add_lang" value="<?php _e('Add Language', 'Multilingual') ?>" /></div></fieldset>
				
		<?php	if (count($permalink_languages) > 1) { ?>
				<fieldset id="deletelangdiv"><legend><?php _e('Delete a Language', 'Multilingual') ?></legend><div class="submit"><select name="old_lang" id="old_lang">
				<?php
					for ($i = 1; $i < count($permalink_languages); $i++) {
						$code = $permalink_languages[$i];
						echo '<option value="' . $code . '">' . $lang_codes["$code"] . '</option>';
					} ?>
				</select> <input type="submit" name="delete_lang" id="delete_lang" value="<?php _e('Delete Language', 'Multilingual') ?>" /></div></fieldset>
		<?php	} ?>
			</form>
			<p><a href="admin.php?page=multilingual.php"><?php _e('&laquo; Return to main menu'); ?></a></p>
			</form>
			<?php endif; ?>
		</div>
			<?php
			break;
			
		default:
			?>
		<div class="wrap">
			<h2><?php _e('Multilingual Options', 'Multilingual') ?></h2>
			<ul>
				<li><a href="admin.php?page=multilingual.php&action=languages"><?php _e('Languages', 'Multilingual') ?></a></li>
				<li><a href="admin.php?page=multilingual.php&action=locales"><?php _e('Locales', 'Multilingual') ?></a></li>
				<li><a href="admin.php?page=multilingual.php&action=categories"><?php _e('Categories', 'Multilingual') ?></a></li>
				<li><a href="admin.php?page=multilingual.php&action=permalinks"><?php _e('Permalinks', 'Multilingual') ?></a></li>
			</l>
		</div>
		<?php
			break;
	}

} else {
	
	// The following language codes conform to the specifications outlined in
	// [http://www.faqs.org/rfcs/rfc1766.html] and use registered IANA
	// language tags for dialects and scripts not included in ISO 639, as
	// specified in [http://www.iana.org/assignments/language-tags].
	
	$lang_codes = array (
		"af" => "Afrikaans",
		"ar" => "&#1593;&#1585;&#1576;&#1610;&#1577;",
		"bn" => "&#2476;&#2494;&#2434;&#2482;&#2494;",
		"zh-Hans" => "&#31616;&#20307;&#20013;&#25991;",
		"zh-Hant" => "&#32321;&#39636;&#20013;&#25991;",
		"cs" => "&#269;e&#0353;tina",
		"cy" => "Cymraeg",
		"da-DK" => "Dansk",
		"de-DE" => "Deutsch",
		"el" => "&#917;&#955;&#955;&#951;&#957;&#953;&#954;&#940;",
		"en" => "English",
		"en-AU" => "Australian English",
		"en-GB" => "British English",
		"en-CA" => "Canadian English",
		"en-US" => "U.S. English",
		"es-ES" => "espa&#241;ol",
		"eo" => "Esperanto",
		"fr-FR" => "Fran&#231;ais",
		"fr-CA" => "Fran&#231;ais canadien",
		"fr-CH" => "Fran&#231;ais suisse",
		"ga" => "Gaeilge",
		"gu" => "&#2711;&#2753;&#2716;&#2736;&#2750;&#2724;&#2752;",
		"he" => "&#1506;&#1489;&#1512;&#1497;&#1514;",
		"hi" => "&#2361;&#2367;&#2344;&#2381;&#2342;&#2368;",
		"id" => "Bahasa Indonesia",
		"is" => "&#237;slenska",
		"it-IT" => "Italiano",
		"ja" => "&#26085;&#26412;&#35486;",
		"jv" => "Basa Jawa",
		"ko-KP" => "&#51312;&#49440;&#47568;",
		"ko-KR" => "&#54620;&#44397;&#47568;",
		"la" => "lingua Latina",
		"lt" => "lietuvi&#371;",
		"hu" => "Magyar",
		"mr" => "Marathi",
		"nd" => "Ndebele (North)",
		"nr" => "Ndebele (South)",
		"nl-BE" => "Nederlands Belgi&#235;",
		"nl-NL" => "Nederlands Nederland",
		"no" => "Norsk",
		"nb" => "Norsk Bokm&#229;l",
		"nn" => "Norsk Nynorsk",
		"pa" => "&#2602;&#2672;&#2588;&#2622;&#2604;&#2624; / &#1662;&#1606;&#1580;&#1575;&#1576;&#1740;",
		"pl" => "Polski",
		"pt-BR" => "Portugu&#234;s do Brasil",
		"pt-PT" => "Portugu&#234;s de Portugal",
		"ro" => "rom&#226;n&#259;",
		"ru" => "&#1088;&#1091;&#1089;&#1089;&#1082;&#1080;&#1081; &#1103;&#1079;&#1099;&#1082;",
		"fi" => "Suomi",
		"sv" => "Svenska",
		"ta" => "&#2980;&#2990;&#3007;&#2996;&#3021;",
		"te" => "Telugu",
		"th" => "&#3616;&#3634;&#3625;&#3634;&#3652;&#3607;&#3618;",
		"tr" => "T&#252;rk&#231;e",
		"uk" => "&#1091;&#1082;&#1088;&#1072;&#1111;&#1085;&#1089;&#1100;&#1082;&#1072; &#1084;&#1086;&#1074;&#1072;",
		"ur" => "&#1575;&#1585;&#1583;&#1608;",
		"vi" => "Vi&#7879;t",
		"xh" => "Xhosa",
		"zu" => "Zulu"
	);
	
	$date_defaults = array (
		'en-US' => 'F jS, Y',
		'en-CA' => 'F j, Y',
		'en-GB' => 'j F Y',
		'en-AU' => 'j F Y',
		'en-BE' => 'j F Y',
		'it-IT' => 'j F Y',
		'fr-FR' => 'jS F Y',
		'da-DK' => 'j. F Y',
		'de-DE' => 'j. F Y',
		'ja' => 'Y年n月j日',
		'zh-Hans' => 'Y年n月j日',
		'zh-Hant' => 'Y年n月j日',
		'es-ES' => 'j \d\e F \d\e Y'
	);
	
	$time_defaults = array (
		'en-US' => 'g:i A',
		'en-CA' => 'g:i A',
		'en-GB' => 'H:i',
		'en-AU' => 'g:i A',
		'en-BE' => 'H:i',
		'it-IT' => 'H:i',
		'fr-FR' => 'H:i',
		'da-DK' => 'G.i',
		'de-DE' => 'H:i',
		'ja' => 'G:i',
		'zh-Hans' => 'Ag:i',
		'zh-Hant' => 'Ag:i',
		'es-ES' => 'G:i'
	);
	
	/* Localization functions */
	
	// Return a string translated into the specified locale.
	function ml__($text, $code, $domain = 'Multilingual') {
		global $ml_l10n;
		
		$code = str_replace('-', '_', $code);
		
		if (isset($ml_l10n[$domain][$code]) || ml_load_plugin_textdomain('Multilingual', $code))
			return $ml_l10n[$domain][$code]->translate($text);
		else
			return $text;
	}
	
	function ml_tag__($tag, $code, $domain = 'Multilingual') {
		global $ml_l10n;
		
		$code = str_replace('-', '_', $code);
		
		if (isset($ml_l10n[$domain][$code]) || ml_load_plugin_textdomain('Multilingual', $code)) {
			$translation = $ml_l10n[$domain][$code]->translate($tag);
			return $translation != $tag ? $translation : '';
		}
		else {
			return '';
		}
	}
	
	// Echo a string translated into the specified locale.
	function ml_e($text, $code, $domain = 'Multilingual') {
		global $ml_l10n;
		
		$code = str_replace('-', '_', $code);
		
		if (isset($ml_l10n[$domain][$code]) || ml_load_plugin_textdomain('Multilingual', $code))
			echo $ml_l10n[$domain][$code]->translate($text);
		else
			echo $text;
	}
	
	function ml_load_textdomain($domain, $code, $mofile) {
		global $ml_l10n;
		
		$code = str_replace('-', '_', $code);
		
		if (isset($ml_l10n[$domain][$code])) {
			return true;
		}
		
		if (is_readable($mofile))
			$input = new FileReader($mofile);
		else
			return false;
	
		$ml_l10n[$domain][$code] = new gettext_reader($input);
		localize_date_strings($code);
		return true;
	}
	
	function ml_load_default_textdomain($code) {
		$code = str_replace('-', '_', $code);
		$mofile = ABSPATH . "wp-includes/languages/$code.mo";
		return ml_load_textdomain('default', $code, $mofile);
	}
	
	function ml_load_plugin_textdomain($domain, $code) {
		$code = str_replace('-', '_', $code);
		$mofile = ABSPATH . "wp-content/plugins/$domain-$code.mo";
		return ml_load_textdomain($domain, $code, $mofile);
	}
	
	function ml_load_category_translations($cat_ID, $lang) {
		global $cache_category_translations, $wpdb;
		
		if ($translations = $wpdb->get_row("SELECT cat_name, category_nicename, category_description FROM $wpdb->category_translations WHERE cat_ID = '$cat_ID' AND lang = '$lang'", ARRAY_A)) {
			$cache_category_translations[$cat_ID] = $translations;
			return true;
		}
		return false;
	}
	
	function localize_date_strings($code = '') {
		global $weekday, $weekday_initial, $weekday_abbrev, $month, $month_abbrev, $localized_date_strings;
		
		if ($code) {
			$code = str_replace('-', '_', $code);
			
			$weekday[$code][0] = ml__('Sunday', $code);
			$weekday[$code][1] = ml__('Monday', $code);
			$weekday[$code][2] = ml__('Tuesday', $code);
			$weekday[$code][3] = ml__('Wednesday', $code);
			$weekday[$code][4] = ml__('Thursday', $code);
			$weekday[$code][5] = ml__('Friday', $code);
			$weekday[$code][6] = ml__('Saturday', $code);
			
			// The first letter of each day.  The _%day%_initial suffix is a hack to make
			// sure the day initials are unique.  They should be translated to a one
			// letter initial.  
			$weekday_initial[$code][ml__('Sunday', $code)]    = ml__('S_Sunday_initial', $code);
			$weekday_initial[$code][ml__('Monday', $code)]    = ml__('M_Monday_initial', $code);
			$weekday_initial[$code][ml__('Tuesday', $code)]   = ml__('T_Tuesday_initial', $code);
			$weekday_initial[$code][ml__('Wednesday', $code)] = ml__('W_Wednesday_initial', $code);
			$weekday_initial[$code][ml__('Thursday', $code)]  = ml__('T_Thursday_initial', $code);
			$weekday_initial[$code][ml__('Friday', $code)]    = ml__('F_Friday_initial', $code);
			$weekday_initial[$code][ml__('Saturday', $code)]  = ml__('S_Saturday_initial', $code);
			
			foreach ($weekday_initial as $weekday_ => $weekday_initial_) {
			  $weekday_initial[$code][$weekday_] = preg_replace('/_.+_initial$/', '', $weekday_initial_);
			}
			
			// Abbreviations for each day.
			$weekday_abbrev[$code][ml__('Sunday', $code)]    = ml__('Sun', $code);
			$weekday_abbrev[$code][ml__('Monday', $code)]    = ml__('Mon', $code);
			$weekday_abbrev[$code][ml__('Tuesday', $code)]   = ml__('Tue', $code);
			$weekday_abbrev[$code][ml__('Wednesday', $code)] = ml__('Wed', $code);
			$weekday_abbrev[$code][ml__('Thursday', $code)]  = ml__('Thu', $code);
			$weekday_abbrev[$code][ml__('Friday', $code)]    = ml__('Fri', $code);
			$weekday_abbrev[$code][ml__('Saturday', $code)]  = ml__('Sat', $code);
			
			// The Months
			$month[$code]['01'] = ml__('January', $code);
			$month[$code]['02'] = ml__('February', $code);
			$month[$code]['03'] = ml__('March', $code);
			$month[$code]['04'] = ml__('April', $code);
			$month[$code]['05'] = ml__('May', $code);
			$month[$code]['06'] = ml__('June', $code);
			$month[$code]['07'] = ml__('July', $code);
			$month[$code]['08'] = ml__('August', $code);
			$month[$code]['09'] = ml__('September', $code);
			$month[$code]['10'] = ml__('October', $code);
			$month[$code]['11'] = ml__('November', $code);
			$month[$code]['12'] = ml__('December', $code);
			
			// Abbreviations for each month.
			$month_abbrev[$code][ml__('January', $code)] = ml__('Jan_January_abbreviation', $code);
			$month_abbrev[$code][ml__('February', $code)] = ml__('Feb_February_abbreviation', $code);
			$month_abbrev[$code][ml__('March', $code)] = ml__('Mar_March_abbreviation', $code);
			$month_abbrev[$code][ml__('April', $code)] = ml__('Apr_April_abbreviation', $code);
			$month_abbrev[$code][ml__('May', $code)] = ml__('May_May_abbreviation', $code);
			$month_abbrev[$code][ml__('June', $code)] = ml__('Jun_June_abbreviation', $code);
			$month_abbrev[$code][ml__('July', $code)] = ml__('Jul_July_abbreviation', $code);
			$month_abbrev[$code][ml__('August', $code)] = ml__('Aug_August_abbreviation', $code);
			$month_abbrev[$code][ml__('September', $code)] = ml__('Sep_September_abbreviation', $code);
			$month_abbrev[$code][ml__('October', $code)] = ml__('Oct_October_abbreviation', $code);
			$month_abbrev[$code][ml__('November', $code)] = ml__('Nov_November_abbreviation', $code);
			$month_abbrev[$code][ml__('December', $code)] = ml__('Dec_December_abbreviation', $code);
			
			foreach ($month_abbrev as $month_ => $month_abbrev_) {
			  $month_abbrev[$code][$month_] = preg_replace('/_.+_abbreviation$/', '', $month_abbrev_);
			}
			
			$localized_date_strings[] = $code;
		}
		else {
			$weekday[0] = __('Sunday');
			$weekday[1] = __('Monday');
			$weekday[2] = __('Tuesday');
			$weekday[3] = __('Wednesday');
			$weekday[4] = __('Thursday');
			$weekday[5] = __('Friday');
			$weekday[6] = __('Saturday');
			
			// The first letter of each day.  The _%day%_initial suffix is a hack to make
			// sure the day initials are unique.  They should be translated to a one
			// letter initial.  
			$weekday_initial[__('Sunday')]    = __('S_Sunday_initial');
			$weekday_initial[__('Monday')]    = __('M_Monday_initial');
			$weekday_initial[__('Tuesday')]   = __('T_Tuesday_initial');
			$weekday_initial[__('Wednesday')] = __('W_Wednesday_initial');
			$weekday_initial[__('Thursday')]  = __('T_Thursday_initial');
			$weekday_initial[__('Friday')]    = __('F_Friday_initial');
			$weekday_initial[__('Saturday')]  = __('S_Saturday_initial');
			
			foreach ($weekday_initial as $weekday_ => $weekday_initial_) {
			  $weekday_initial[$weekday_] = preg_replace('/_.+_initial$/', '', $weekday_initial_);
			}
			
			// Abbreviations for each day.
			$weekday_abbrev[__('Sunday')]    = __('Sun');
			$weekday_abbrev[__('Monday')]    = __('Mon');
			$weekday_abbrev[__('Tuesday')]   = __('Tue');
			$weekday_abbrev[__('Wednesday')] = __('Wed');
			$weekday_abbrev[__('Thursday')]  = __('Thu');
			$weekday_abbrev[__('Friday')]    = __('Fri');
			$weekday_abbrev[__('Saturday')]  = __('Sat');
			
			// The Months
			$month['01'] = __('January');
			$month['02'] = __('February');
			$month['03'] = __('March');
			$month['04'] = __('April');
			$month['05'] = __('May');
			$month['06'] = __('June');
			$month['07'] = __('July');
			$month['08'] = __('August');
			$month['09'] = __('September');
			$month['10'] = __('October');
			$month['11'] = __('November');
			$month['12'] = __('December');
			
			// Abbreviations for each month.
			$month_abbrev[__('January')] = __('Jan_January_abbreviation');
			$month_abbrev[__('February')] = __('Feb_February_abbreviation');
			$month_abbrev[__('March')] = __('Mar_March_abbreviation');
			$month_abbrev[__('April')] = __('Apr_April_abbreviation');
			$month_abbrev[__('May')] = __('May_May_abbreviation');
			$month_abbrev[__('June')] = __('Jun_June_abbreviation');
			$month_abbrev[__('July')] = __('Jul_July_abbreviation');
			$month_abbrev[__('August')] = __('Aug_August_abbreviation');
			$month_abbrev[__('September')] = __('Sep_September_abbreviation');
			$month_abbrev[__('October')] = __('Oct_October_abbreviation');
			$month_abbrev[__('November')] = __('Nov_November_abbreviation');
			$month_abbrev[__('December')] = __('Dec_December_abbreviation');
			
			foreach ($month_abbrev as $month_ => $month_abbrev_) {
			  $month_abbrev[$month_] = preg_replace('/_.+_abbreviation$/', '', $month_abbrev_);
			}
		}
	}
	
	
	/* Utility functions (internal) */
	function resolve_post_lang($reqlang, $post_langs) {
		global $cache_post_langs;
		
		// Special handling for 'zh' or 'zh-XX', since these are stored differently in $lang_codes
		if (strstr($reqlang, 'zh')) {
			// Unspecific or People's Republic of China
			if ($reqlang == 'zh' || $reqlang == 'zh-CN' || $reqlang == 'zh-RC') {
				// Default to Simplified (that's what Google does)
				if (in_array('zh-Hans', $post_langs)) {
					$cache_post_langs["$id"] = 'zh-Hans';
					return $cache_post_langs["$id"];
				}
				elseif (in_array('zh-Hant', $post_langs)) {
					$cache_post_langs["$id"] = 'zh-Hant';
					return $cache_post_langs["$id"];
				}
				else return false;
			}
			// Everywhere else (Hong Kong, Taiwan or Singapore)
			elseif ($reqlang == 'zh-HK' || $reqlang == 'zh-TW' || $reqlang == 'zh-SG') {
				// Default to Traditional (that's what Google does)
				if (in_array('zh-Hant', $post_langs)) {
					$cache_post_langs["$id"] = 'zh-Hant';
					return $cache_post_langs["$id"];
				}
				elseif (in_array('zh-Hans', $post_langs)) {
					$cache_post_langs["$id"] = 'zh-Hans';
					return $cache_post_langs["$id"];
				}
				else return false;
			}
			else return false;
		}
		
		// See if there's a match with the same country name as language name (e.g. fr-FR)
		if (strlen($reqlang) == 2) {
			$test = $reqlang . "-" . strtoupper($reqlang);
			if (in_array($test, $post_langs)) {
				$cache_post_langs["$id"] = $reqlang . "-" . strtoupper($reqlang);
				return $cache_post_langs["$id"];
			}
		}
		
		// Try to find a match in $post_langs using only the language name
		foreach ($post_langs as $lang) {
			if (substr($reqlang, 0, 2) == substr($lang, 0, 2)) {
				$cache_post_langs["$id"] = $lang;
				return $cache_post_langs["$id"];
			}
		}
		return false;
	}
	
	function get_post_lang($id) {
		global $current_language, $accept_languages, $switchpostlang_cookie, $cache_post_langs;
		
		if (isset($cache_post_langs["$id"]))
			return $cache_post_langs["$id"];
		
		// Post-level switching takes precedence
		if (is_array($switchpostlang_cookie) && array_key_exists($id, $switchpostlang_cookie)) {
			// TODO: idiot-proof this; users could enter their own query string value for switchpostlang
			$cache_post_langs["$id"] = $switchpostlang_cookie["$id"];
			return $cache_post_langs["$id"];
		}
		
		$post_langs = explode(' ', get_post_meta($id, '_post_langs', true));
		
		// If browser has supplied HTTP_ACCEPT_LANGUAGES
		if ($accept_languages && !isset($_GET['lang'])) {
			foreach ($accept_languages as $lang) {
				// First, look for an exact match
				if (in_array($lang, $post_langs)) {
					$cache_post_langs["$id"] = $lang;
					return $cache_post_langs["$id"];
				}
				// Then try to negotiate a partial match
				$match = resolve_post_lang($lang, $post_langs);
				if ($match) {
					$cache_post_langs["$id"] = $match;
					return $cache_post_langs["$id"];
				}
			}
		}
		// Otherwise, try to match $current_language
		else {
			// First, look for an exact match
			if (in_array($current_language, $post_langs)) {
				$cache_post_langs["$id"] = $current_language;
				return $cache_post_langs["$id"];
			}
			// Then try to negotiate a patial match
			else {
				$match = resolve_post_lang($current_language, $post_langs);
				if ($match) {
					$cache_post_langs["$id"] = $match;
					return $cache_post_langs["$id"];
				}
			}
		}
		
		// Last resort: use WPLANG
		if ('' != WPLANG) {
			$cache_post_langs["$id"] = str_replace('_', '-', WPLANG);
			return $cache_post_langs["$id"];
		}
		
		// Really last resort: use post's main language
		if ('' != $post_langs[0]) {
			$cache_post_langs["$id"] = $post_langs[0];
			return $cache_post_langs["$id"];
		}
		
		// If all else fails, use 'en-US' (US since it's the localization of WP itself)
		$cache_post_langs["$id"] = 'en-US';
		return $cache_post_langs["$id"];
	}
	
	function parse_accept_languages() {
		$http_accept_languages = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
		foreach ($http_accept_languages as $http_accept_language) {
			preg_match("!([a-z]{2}(?:-[a-zA-Z]{2})?)(?:;q=(\d\.\d\d?))?!", $http_accept_language, $matches);
			if ('' == $matches[2]) $matches[2] = '1.0';
			// Make sure Alpha-2 code is capitalized
			$matches[1] = preg_replace('!([a-z]{2}-)([a-z]{2})!e', "'$1' . strtoupper('$2')", $matches[1]);
			$accept_languages[(string)(int)((float)$matches[2] * 100)] = $matches[1];
		}
		krsort($accept_languages);
		$accept_languages = array_values($accept_languages);
		return $accept_languages;
	}
	
	function ml_mysql2date($dateformatstring, $mysqlstring, $code, $use_b2configmonthsdays = 1) {
		global $month, $weekday, $month_abbrev, $weekday_abbrev, $localized_date_strings;
		$code = str_replace('-', '_', $code);
		if (!is_array($localized_date_strings) || !in_array($code, $localized_date_strings))
			localize_date_strings($code);
		$m = $mysqlstring;
		if (empty($m)) {
			return false;
		}
		$i = mktime(substr($m,11,2),substr($m,14,2),substr($m,17,2),substr($m,5,2),substr($m,8,2),substr($m,0,4)); 
		if (!empty($month) && !empty($weekday) && $use_b2configmonthsdays) {
			$datemonth = $month[$code][date('m', $i)];
			$datemonth_abbrev = $month_abbrev[$code][$datemonth];
			$dateweekday = $weekday[$code][date('w', $i)];
			$dateweekday_abbrev = $weekday_abbrev[$code][$dateweekday];
			if (strstr($code, 'en'))
				$ordinal = date('S', $i);
			elseif (strstr($code, 'fr') && '1' == date('j', $i))
				$ordinal = 'er';
			if (strstr($code, 'zh'))
				$zh_ampm = 'AM' == date('A', $i) ? '上午' : '下午';
			$dateformatstring = ' '.$dateformatstring;
			if ($zh_ampm) $dateformatstring = preg_replace("/([^\\\])(?:A|a)/", "\\1".backslashit($zh_ampm), $dateformatstring);
			$dateformatstring = preg_replace("/([^\\\])S/", "\\1".backslashit($ordinal), $dateformatstring);
			$dateformatstring = preg_replace("/([^\\\])D/", "\\1".backslashit($dateweekday_abbrev), $dateformatstring);
			$dateformatstring = preg_replace("/([^\\\])F/", "\\1".backslashit($datemonth), $dateformatstring);
			$dateformatstring = preg_replace("/([^\\\])l/", "\\1".backslashit($dateweekday), $dateformatstring);
			$dateformatstring = preg_replace("/([^\\\])M/", "\\1".backslashit($datemonth_abbrev), $dateformatstring);
			
			$dateformatstring = substr($dateformatstring, 1, strlen($dateformatstring)-1);
		}
		$j = @date($dateformatstring, $i);
		if (!$j) {
		// for debug purposes
		//	echo $i." ".$mysqlstring;
		}
		return $j;
	}
	
	function ml_delang_uri($uri) {
	// deletes the "lang=..." part from the query string of an uri
		$home_regexp = '!^' . get_settings('siteurl') . '/([a-z]{2}|[a-z]{2}-[a-zA-Z]{2})?/?$!';
	//	echo "<pre>$home_regexp</pre>";
		
		if (preg_match($home_regexp, $uri)) {
		//	echo "<pre>Home!</pre>";
			return get_settings('siteurl') . '/';
		}
		
		if (get_settings('add_lang_to_permalinks')) {
			return preg_replace('!/([a-z]{2}|[a-z]{2}-[a-zA-Z]{2})/!', '/', $uri);
		}
		else {
			preg_match('!^([^?]*)(\?[^#]*)(#.*)?$!', $uri, $matches);
			
			if ($matches[2]) {
				$matches[2] = preg_replace('!lang=[^&]*!', '', $matches[2]);
				if ($matches[2] == '?') $matches[2] = '';
			}
			array_shift($matches);
			return join('', $matches);
		}
	}
	
	function ml_cat_rows($parent = 0, $level = 0, $categories = 0) {
		global $wpdb, $class, $user_level;
		if (!$categories)
			$categories = $wpdb->get_results("SELECT * FROM $wpdb->categories ORDER BY cat_name");
		
		if ($categories) {
			foreach ($categories as $category) {
				$category_languages = get_category_languages($category->cat_ID);
				$translations = get_category_translations($category->cat_ID, '', true);
				unset($cat_names);
				unset($category_descriptions);
				if ($category->category_parent == $parent) {
					$category->cat_name = wp_specialchars($category->cat_name);
					$count = $wpdb->get_var("SELECT COUNT(post_id) FROM $wpdb->post2cat WHERE category_id = $category->cat_ID");
					$pad = str_repeat('&#8212; ', $level);
					if ( $user_level > 3 )
						$edit = "<a href='admin.php?page=multilingual.php&amp;action=editcat&amp;cat_ID=$category->cat_ID' class='edit'>" . __('Edit') . "</a></td><td><a href='admin.php?page=multilingual.php&amp;action=deletecat&amp;cat_ID=$category->cat_ID' onclick=\"return confirm('".  sprintf(__("You are about to delete the category \'%s\'.  All of its posts will go to the default category.\\n  \'OK\' to delete, \'Cancel\' to stop."), addslashes(strip_tags($category->cat_name))) . "')\" class='delete'>" .  __('Delete') . "</a>";
					else
						$edit = '';
					
					$class = ('alternate' == $class) ? '' : 'alternate';
					foreach ($translations as $translation) {
						if ($translation['cat_name']) $cat_names[] = '<span lang="' . $translation['lang'] . '">' . $translation['cat_name'] . '</span>';
						if ($translation['category_description']) $category_descriptions[] = '<span lang="' . $translation['lang'] . '">' . $translation['category_description'] . '</span>';
					}
					if (count($cat_names)) $cat_name_trans = join(' / ', $cat_names);
					if (count($category_descriptions)) $category_description_trans = join(' / ', $category_descriptions);
					
					echo "<tr class='$class'><th scope='row'>$category->cat_ID</th><td>$pad $cat_name_trans</td>
					<td>$category_description_trans</td>
					<td>$count</td>
					<td>$edit</td>
					</tr>";
					ml_cat_rows($category->cat_ID, $level + 1, $categories);
				}
			}
		} else {
			return false;
		}
	}
	
	function add_category_languages($cat_ID, $langs, $include_default = false) {
		global $wpdb, $cache_category_languages;
		
		if (!is_array($langs)) $langs = array($langs);
		
		foreach ($langs as $lang) {
			if (!$wpdb->get_var("SELECT rel_id FROM $wpdb->category_translations WHERE cat_ID = '$cat_ID' AND lang = '$lang'") ) {
				$wpdb->query("INSERT INTO $wpdb->category_translations (cat_ID, lang, cat_name, category_nicename, category_description) VALUES ('$cat_ID', '$lang', '', '', '')");
				
				if ($wpdb->insert_id) {
					$cache_category_languages[$cat_ID][] = $lang;
				}
			}
		}
		if ($include_default) {
			$category_languages = $cache_category_languages[$cat_ID];
			array_unshift($category_languages, get_settings('default_category_language'));
			return $category_languages;
		}
		else
			return $cache_category_languages[$cat_ID];
	}
	
	function delete_category_languages($cat_ID, $langs, $include_default = false) {
		global $wpdb, $cache_category_languages;
		
		if (!is_array($langs)) $langs = array($langs);
		
		foreach ($langs as $lang) {
			if ($wpdb->get_var("SELECT rel_id FROM $wpdb->category_translations WHERE cat_ID = '$cat_ID' AND lang = '$lang'") ) {
				$wpdb->query("DELETE FROM $wpdb->category_translations WHERE cat_ID = '$cat_ID' AND lang = '$lang'");
				
				$id_langs = $cache_category_languages[$cat_ID];
				unset($id_langs[array_search($lang, $id_langs)]);
				$cache_category_languages[$cat_ID] = $id_langs;
			}
		}
		$id_langs = $cache_category_languages[$cat_ID];
		if (!count($id_langs))
			unset($cache_category_languages[$cat_ID]);
		if ($include_default) {
			if (is_array($cache_category_languages[$cat_ID])) {
				$category_languages = $cache_category_languages[$cat_ID];
				array_unshift($category_languages, get_settings('default_category_language'));
				return $category_languages;
			}
			else
				return array(get_settings('default_category_language'));
		}
		else {
			if (is_array($cache_category_languages[$cat_ID]))
				return $cache_category_languages[$cat_ID];
			else
				return array();
		}
	}
	
	function get_category_languages($cat_ID, $include_default = false) {
		global $cache_category_languages;
		if (empty($cache_category_languages)) cache_category_languages();
		if ($include_default) {
			if ($category_languages = $cache_category_languages[$cat_ID])
				array_unshift($category_languages, get_settings('default_category_language'));
			else
				$category_languages = array(get_settings('default_category_language'));
			return $category_languages;
		}
		if (is_array($cache_category_languages[$cat_ID]))
			return $cache_category_languages[$cat_ID];
		else
			return array();
	}
	
	function cache_category_languages() {
		global $wpdb, $cache_category_languages;
		
		if ($cat_IDs = $wpdb->get_col("SELECT cat_ID FROM $wpdb->category_translations")) {
			foreach ($cat_IDs as $cat_ID) {
				if ($langs = $wpdb->get_col("SELECT lang FROM $wpdb->category_translations WHERE cat_ID = '$cat_ID'"))
					$cache_category_languages[$cat_ID] = $langs;
			}
		}
	}
	
	function get_category_translations($cat_ID, $lang = '', $include_default = false) {
		global $wpdb;
		
		if ($lang) $langsql = "AND lang = '$lang'";
		
		$translations = $wpdb->get_results("SELECT lang, cat_name, category_nicename, category_description FROM $wpdb->category_translations WHERE cat_ID = '$cat_ID' $langsql ORDER BY rel_id ASC", ARRAY_A);
		if (!is_array($translations)) $translations = array();
		
		if (!$lang && $include_default) {
			$defaults = $wpdb->get_row("SELECT cat_name, category_nicename, category_description FROM $wpdb->categories WHERE cat_ID = '$cat_ID'");
			array_unshift($translations, array(
				'lang' => get_settings('default_category_language'),
				'cat_name' => $defaults->cat_name,
				'category_nicename' => $defaults->category_nicename,
				'category_description' => $defaults->category_description
			));
		}
		
		if ($lang)
			return $translations[0];
		else
			return $translations;
	}
	
	function update_category_translations($cat_ID, $langs, $cat_names, $category_nicenames, $category_descriptions) {
		global $wpdb, $cache_category_languages;
		
		if (!is_array($langs)) $langs = array($langs);
		if (!is_array($cat_names)) $langs = array($cat_names);
		if (!is_array($category_nicenames)) $langs = array($category_nicenames);
		if (!is_array($category_descriptions)) $langs = array($category_descriptions);
		
		for ($i = 0; $i < count($langs); $i++) {
			$lang = $langs[$i];
			$cat_name = $cat_names[$i];
			$category_nicename = $category_nicenames[$i] ? sanitize_title($category_nicenames[$i]) : sanitize_title($cat_names[$i]);
			$category_description = $category_descriptions[$i];
			if (array($cat_name, $category_nicename, $category_description) == array_values(get_category_translations($cat_ID, $lang)))
				continue;
			elseif (!$wpdb->get_var("SELECT lang FROM $wpdb->category_translations WHERE cat_ID = '$cat_ID' AND lang = '$lang'"))
				add_category_languages($cat_ID, $lang);
			
			$cat_name = $wpdb->escape($cat_name);
			$category_nicename = $wpdb->escape($category_nicename);
			$category_description = $wpdb->escape($category_description);
			$wpdb->query("UPDATE $wpdb->category_translations SET cat_name = '$cat_name', category_nicename = '$category_nicename', category_description = '$category_description' WHERE cat_ID = '$cat_ID' AND lang = '$lang'");
		}
	}
	
	function ml_init() {
		global $wpdb, $switchpostlang_cookie, $current_language, $accept_languages, $multilingual_installed, $locale, $pagenow, $table_prefix, $month;
		
		load_plugin_textdomain('Multilingual');
		
		add_option('frequent_langs', array("de", "en-CA", "en-GB", "en-US", "es", "fr-CA", "fr-FR", "ja", "nl-NL", "pt-BR", "pt-PT", "zh-Hans", "zh-Hant"), "Languages frequently blogged in.", false);
		add_option('multilingual_date_formats', array('en-US' => 'F jS, Y', 'fr-FR' => 'jS F Y'), "Locale-specific date formats for multilingual blogging.", false);
		add_option('multilingual_time_formats', array('en-US' => 'g:i a', 'fr-FR' => 'G\hi'), "Locale-specific time formats for multilingual blogging.", false);
		add_option('cache_acceptlanguages', 1, "Option to cache the browser's Accept-Languages header in a cookie.", false);
		add_option('default_category_language', 'en-US', "Language in which default category names are written.", false);
		add_option('add_lang_to_permalinks', 1);
		$wpdb->category_translations = $table_prefix . 'category_translations';
		if (!get_settings('multilingual_installed')) {
			$wpdb->query("CREATE TABLE IF NOT EXISTS $wpdb->category_translations (
				rel_id int(11) NOT NULL auto_increment,
				cat_ID int(11) NOT NULL default '0',
				lang varchar(5) NOT NULL default '',
				cat_name varchar(50) default NULL,
				category_nicename varchar(50) default NULL,
				category_description text,
				PRIMARY KEY  (rel_id)
			)");
		}
		add_option('multilingual_installed', 1);
		add_option('permalink_languages', array('en-US'));
		
		$multilingual_installed = true;
		
		// Handle cookies for post-level language switching
		if (isset($_GET['switchpost']) && isset($_GET['switchpostlang'])) {
			$switchpost = $_GET['switchpost'];
			$switchpostlang = $_GET['switchpostlang'];
			if (isset($_COOKIE['switchpostlang_' . COOKIEHASH]))
				parse_str($_COOKIE['switchpostlang_' . COOKIEHASH], $switchpostlang_cookie);
			$switchpostlang_cookie["$switchpost"] = $switchpostlang;
			foreach ($switchpostlang_cookie as $splckey => $splcval) {
				$splc .= (strlen($splc) < 1) ? '' : '&';
				$splc .= $splckey . '=' . rawurlencode($splcval);
			}
			setcookie('switchpostlang_' . COOKIEHASH, $splc, time() + 31536000, COOKIEPATH);
		}
		elseif (isset($_POST['switchpost']) && isset($_POST['switchpostlang'])) {
			$switchpost = $_POST['switchpost'];
			$switchpostlang = $_POST['switchpostlang'];
			if (isset($_COOKIE['switchpostlang_' . COOKIEHASH]))
				parse_str($_COOKIE['switchpostlang_' . COOKIEHASH], $switchpostlang_cookie);
			$switchpostlang_cookie["$switchpost"] = $switchpostlang;
			foreach ($switchpostlang_cookie as $splckey => $splcval) {
				$splc .= (strlen($splc) < 1) ? '' : '&';
				$splc .= $splckey . '=' . rawurlencode($splcval);
			}
			setcookie('switchpostlang_' . COOKIEHASH, $splc, time() + 31536000, COOKIEPATH);
		}
		elseif (isset($_COOKIE['switchpostlang_' . COOKIEHASH])) {
			parse_str($_COOKIE['switchpostlang_' . COOKIEHASH], $switchpostlang_cookie);
		}
		
		// Handle cookies for page-level language switching
		if (isset($_COOKIE['acceptlanguages_' . COOKIEHASH])) {
			$accept_languages = explode(';', $_COOKIE['acceptlanguages_' . COOKIEHASH]);
			$current_language = $accept_languages[0];
		}
		if (isset($_COOKIE['lang_' . COOKIEHASH])) {
			$current_language = $_COOKIE['lang_' . COOKIEHASH];
			if (count($accept_languages))
				array_unshift($accept_languages, $current_language);
		}
		
		// Determine the language to display
		if (isset($_GET) && isset($_GET['lang'])) {
			$current_language = $_GET['lang'];
			
			// Erase post-level switching cookie if we aren't on a single post
			if (isset($_COOKIE['switchpostlang_' . COOKIEHASH])) {
				setcookie('switchpostlang_' . COOKIEHASH, '', time() - 31536000, COOKIEPATH);
				unset($switchpostlang_cookie);
			}
			
			// FIXME
		//	if (!is_single())
		//		setcookie('lang_' . COOKIEHASH, $current_language, time() + 31536000, COOKIEPATH);
		}
		elseif (isset($_POST) && isset($_POST['lang'])) {
			$current_language = $_POST['lang'];
			
			// Erase post-level switching cookie if we aren't on a single post
			if (isset($_COOKIE['switchpostlang_' . COOKIEHASH])) {
				setcookie('switchpostlang_' . COOKIEHASH, '', time() - 31536000, COOKIEPATH);
				unset($switchpostlang_cookie);
			}
			
			// FIXME
		//	if (!is_single())
		//		setcookie('lang_' . COOKIEHASH, $current_language, time() + 31536000, COOKIEPATH);
		}
		elseif (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) && !$accept_languages) {
			$accept_languages = parse_accept_languages();
		//	if (get_settings('cache_acceptlanguages'))
		//		setcookie('acceptlanguages_' . COOKIEHASH, join(';', $accept_languages), time() + 31536000, COOKIEPATH);
			$current_language = $accept_languages[0];
		}
		elseif (!$accept_languages && !$current_language) {
			$agent_lang_regexp = '!^Mozilla/\d\.\d\d? (?:\[([a-z]{2})\] )?\((?:Windows NT 5.0|Windows|Macintosh|X11|compatible); (?:U|MSIE \d\.\d)(?:; (?:Macintosh|PPC Mac OS X(?: Mach-O)?|Windows NT 5\.\d|Linux [^\);]*)(?:; (?:PPC|([a-z]{2}(?:-[a-zA-Z]{2})?)))?)?.*?\)(?: Opera \d\.\d\d?\s*\[([a-z]{2})\])?.*?$!';
			if (preg_match($agent_lang_regexp, $_SERVER['HTTP_USER_AGENT'], $matches)) {
				array_shift($matches);
				$current_language = join('', $matches);
				// Make sure Alpha-2 code is capitalized
				$current_language = preg_replace('!([a-z]{2}-)([a-z]{2})!e', "'$1' . strtoupper('$2')", $current_language);
				setcookie('lang_' . COOKIEHASH, $current_language, time() + 31536000, COOKIEPATH);
			}
			else {
				$current_language = str_replace('_', '-', WPLANG);
				setcookie('lang_' . COOKIEHASH, $current_language, time() + 31536000, COOKIEPATH);
			}
		}
		
		$locale = str_replace('-', '_', $current_language);
		
		load_default_textdomain();
		
		localize_date_strings();
		
		header('Content-Type: text/html; charset=utf-8');
		header("Content-Language: $current_language");
	}
	
	/* Action functions */
	function ml_admin_head() {
		global $pagenow;
		if ($pagenow == 'post.php') { ?>
			<script type="text/javascript">
				function delete_confirm(text) {
					var old_lang = document.getElementById('old_lang');
					return confirm(text.replace(/%s/, old_lang[old_lang.selectedIndex].text));
				}
				function check_charset() {
					var the_charset = '';
					var is_ie = navigator.userAgent.indexOf("MSIE") != -1 && navigator.userAgent.indexOf("Opera") == -1;
					var is_moz = navigator.userAgent.indexOf("Safari") == -1 && (navigator.userAgent.indexOf("Firefox") != -1 || navigator.userAgent.indexOf("Netscape") != -1 || navigator.userAgent.indexOf("Gecko") != -1);
					if (is_ie)
						the_charset = document.charset;
					else if (is_moz)
						the_charset = document.characterSet;
						
					if (is_ie || is_moz && the_charset != 'UTF-8') {
						var warning = document.createTextNode("<?php _e("Warning: Your browser is not set to use UTF-8 character encoding. The Multilingual plugin requires UTF-8 to display most international characters.") ?>");
						var p = document.createElement("p");
						p.setAttribute("id", "charset_warning");
						p.appendChild(warning);
						var poststuff = document.getElementById("poststuff");
						poststuff.insertBefore(p, poststuff.firstChild);
					}
				}
				window.onload = check_charset;
			</script>
<?php	}
	}
	
	function ml_edit_form() {
		global $postdata, $user_level, $lang_codes, $current_language;
		
		echo '<fieldset id="mainlangdiv"><legend>' . __('Language', 'Multilingual') . '</legend><select name="main_lang" id="main_lang">';
		$langs = get_settings('frequent_langs');
		$post_langs = explode(' ', get_post_meta($postdata->ID, '_post_langs', true));
		foreach ($langs as $lang) {
			echo '<option value="' . $lang . '"';
			if ($post_langs[0] == $lang) echo ' selected="selected"';
			echo '>' . $lang_codes["$lang"] . '</option>';
		}
		echo '</select></fieldset>';
		
		echo '<h3>' . __('Multilingual Posting', 'Multilingual') . '</h3>';
		
		$rows = get_settings('default_post_edit_rows');
		if (($rows < 3) || ($rows > 100)) $rows = 10;
		
		if ($post_langs[0]) {
			for ($i = 1; $i < count($post_langs); $i++) {
				$lang = $post_langs[$i]; ?>
	<h4><?php echo $lang_codes["$lang"] ?></h4>
	<fieldset id="titlediv_<?php echo $lang ?>"><legend><?php ml_e('Title', str_replace('-', '_', $lang)) ?></a></legend><input type="text" name="title_<?php echo $lang ?>" id="title_<?php echo $lang ?>" value="<?php echo get_post_meta($postdata->ID, '_post_title_' . $lang, true) ?>" size="30"/></fieldset>
	<fieldset id="postnamediv_<?php echo $lang ?>"><legend><?php ml_e('Post slug', str_replace('-', '_', $lang)) ?></a></legend><input type="text" name="postname_<?php echo $lang ?>" id="postname_<?php echo $lang ?>" value="<?php echo get_post_meta($postdata->ID, '_post_slug_' . $lang, true) ?>" size="30"/></fieldset>
	<fieldset id="postexcerpt_<?php echo $lang ?>"><legend><?php ml_e('Excerpt', str_replace('-', '_', $lang)) ?></a></legend><textarea name="excerpt_<?php echo $lang ?>" id="excerpt_<?php echo $lang ?>" rows="1" cols="40"><?php echo get_post_meta($postdata->ID, '_post_excerpt_' . $lang, true) ?></textarea></fieldset>
	<fieldset id="postdiv_<?php echo $lang ?>"><legend><?php ml_e('Post', str_replace('-', '_', $lang)) ?></a></legend><textarea name="content_<?php echo $lang ?>" id="content_<?php echo $lang ?>" rows="<?php echo $rows ?>" cols="40"><?php echo get_post_meta($postdata->ID, '_post_content_' . $lang, true) ?></textarea></fieldset>
	<p class="submit">
		<input name="save" type="submit" id="save" tabindex="6" value="<?php _e('Save and Continue Editing') ?>" />
		<input type="submit" name="submit" value="<?php _e('Save') ?>" style="font-weight: bold;" tabindex="6" /> 
		<?php 
		if ('publish' != $postdata->post_status || 0 == $postdata->ID) {
		?>
		<?php if ( 1 < $user_level || (1 == $user_level && 2 == get_option('new_users_can_blog')) ) : ?>
			<input name="publish" type="submit" id="publish" tabindex="10" value="<?php _e('Publish') ?>" /> 
		<?php endif; ?>
		<?php
		}
		?>
	</p>
	<?php	}
		}
		
		echo '<fieldset id="addlangdiv"><legend>' . __('Add a Language', 'Multilingual') . '</legend><div class="submit"><select name="new_lang" id="new_lang">';
		foreach ($langs as $lang) {
			if (!in_array($lang, $post_langs)) echo '<option value="' . $lang . '">' . $lang_codes["$lang"] . '</option>';
		}
		echo '</select> <input type="submit" name="save" id="add_lang" value="' . __('Add Language', 'Multilingual') . '" /></div></fieldset>';
		
		if (count($post_langs) > 1) {
			echo '<fieldset id="deletelangdiv"><legend>' . __('Delete a Language', 'Multilingual') . '</legend><div class="submit"><select name="old_lang" id="old_lang">';
			for ($i = 1; $i < count($post_langs); $i++) {
				$lang = $post_langs[$i];
				echo '<option value="' . $lang . '">' . $lang_codes["$lang"] . '</option>';
			}
			echo '</select> <input type="submit" name="save" id="delete_lang" value="' . __('Delete Language', 'Multilingual') . '" onclick="return delete_confirm(\'' . __("You are about to delete all content for the language \'%s\'\\n  \'OK\' to delete, \'Cancel\' to stop.", 'Multilingual') . '\')" /></div></fieldset>';
		}
	}
	
	function ml_edit_post() {
		global $post_ID, $action;
		
		$main_lang = $_POST["main_lang"];
		$post_langs = explode(' ', get_post_meta($post_ID, '_post_langs', true));
		$post_langs[0] = $main_lang;
		
		if ($post_langs[0]) {
			for ($i = 1; $i < count($post_langs); $i++) {
				$lang = $post_langs[$i];
				delete_post_meta($post_ID, '_post_title_' . $lang);
				delete_post_meta($post_ID, '_post_excerpt_' . $lang);
				delete_post_meta($post_ID, '_post_slug_' . $lang);
				delete_post_meta($post_ID, '_post_content_' . $lang);
				if (isset($_POST["title_$lang"])) add_post_meta($post_ID, '_post_title_' . $lang, $_POST["title_$lang"]);
				if (isset($_POST["postname_$lang"]) && !empty($_POST["postname_$lang"])) add_post_meta($post_ID, '_post_slug_' . $lang, sanitize_title($_POST["postname_$lang"]));
				else add_post_meta($post_ID, '_post_slug_' . $lang, sanitize_title($_POST["title_$lang"]));
				if (isset($_POST["excerpt_$lang"])) add_post_meta($post_ID, '_post_excerpt_' . $lang, $_POST["excerpt_$lang"]);
				if (isset($_POST["content_$lang"])) add_post_meta($post_ID, '_post_content_' . $lang, $_POST["content_$lang"]);
			}
		}
		
		if (isset($_POST['save'])) {
			if ($_POST['save'] == __('Add Language', 'Multilingual') && isset($_POST['new_lang']) && !in_array($_POST['new_lang'], $post_langs)) {
				$new_lang = $_POST["new_lang"];
				if ($post_langs[0] == '') $post_langs[0] = $new_lang;
				else array_push($post_langs, $new_lang);
				add_post_meta($post_ID, '_post_title_' . $new_lang, '');
				add_post_meta($post_ID, '_post_slug_' . $new_lang, '');
				add_post_meta($post_ID, '_post_excerpt_' . $new_lang, '');
				add_post_meta($post_ID, '_post_content_' . $new_lang, '');
			}
			elseif ($_POST['save'] == __('Delete Language', 'Multilingual') && isset($_POST['old_lang']) && in_array($_POST['old_lang'], $post_langs)) {
				$old_lang = $_POST['old_lang'];
				$post_langs = explode(' ', str_replace(' ' . $old_lang, '', join(' ', $post_langs)));
				delete_post_meta($post_ID, '_post_title_' . $old_lang);
				delete_post_meta($post_ID, '_post_slug_' . $old_lang);
				delete_post_meta($post_ID, '_post_excerpt_' . $old_lang);
				delete_post_meta($post_ID, '_post_content_' . $old_lang);
			}
		}
		
		delete_post_meta($post_ID, '_post_langs');
		add_post_meta($post_ID, '_post_langs', join(' ', $post_langs));
	}
	
	function ml_admin_menu() {
		add_options_page(__('Multilingual Posting', 'Multilingual'), __('Multilingual', 'Multilingual'), 5, 'multilingual.php');
	}
	
	function ml_generate_rewrite_rules() {
		
	}
	
	add_action('admin_head', 'ml_admin_head');
	add_action('simple_edit_form', 'ml_edit_form', 5);
	add_action('edit_form_advanced', 'ml_edit_form', 5);
	add_action('save_post', 'ml_edit_post');
	add_action('edit_post', 'ml_edit_post');
	add_action('publish_post', 'ml_edit_post');
	add_action('admin_menu', 'ml_admin_menu');
	add_action('generate_rewrite_rules', 'ml_generate_rewrite_rules');
	
	
	/* Filter functions */
	
	function ml_the_title($title) {
		global $id, $pagenow;
		
		if ($pagenow == 'edit.php') {
			$post_langs = explode(' ', get_post_meta($id, '_post_langs', true));
			$main_lang = array_shift($post_langs);
			$title = '<span lang="' . $main_lang . '">' . $title . '</span>';
			foreach ($post_langs as $lang) {
				$title .= ' / <span lang="' . $lang . '">' . get_post_meta($id, '_post_title_' . $lang, true) . '</span>';
			}
		}
		return $title;
	}
	
	function ml_the_title_rss($title) {
		global $id;
		
		$lang = get_post_lang($id);
		$post_langs = explode(' ', get_post_meta($id, '_post_langs', true));
		if ('' != $post_langs[0] && $lang != $post_langs[0])
			return get_post_meta($id, '_post_title_' . $lang, true);
		else
			return $the_title;
	}
	
	function ml_the_excerpt_rss($excerpt) {
		global $id;
		
		$lang = get_post_lang($id);
		$post_langs = explode(' ', get_post_meta($id, '_post_langs', true));
		if ('' != $post_langs[0] && $lang != $post_langs[0])
			return get_post_meta($id, '_post_excerpt_' . $lang, true);
		else
			return $excerpt;
	}
	
	function ml_the_content($content) {
		global $id;
		
		if (is_feed()) {
			$lang = get_post_lang($id);
			$post_langs = explode(' ', get_post_meta($id, '_post_langs', true));
			if ('' != $post_langs[0] && $lang != $post_langs[0])
				return get_post_meta($id, '_post_content_' . $lang, true);
			else
				return $content;
		}
		return $content;
	}
	
/*	function ml_bloginfo($info) {
		global $current_language;
		
		if ($info == get_bloginfo('rss2_url') || $info == get_bloginfo('rss_url') || $info == get_bloginfo('atom_url') || $info == get_bloginfo('rdf_url')) {
			if (strstr('?', $info))
				$info .= '&lang=' . $current_language;
			else
				$info .= '?lang=' . $current_language;
		}
		return $info;
	}	*/
	
	function ml_rewrite_rules_array($rules) {
		$permalink_structure = get_settings('permalink_structure');
		$nonvariables = array(preg_replace('!(%[^%]*?%|index.php)/!', '', $permalink_structure));
		$nonvariables = $nonvariables[0] == '/' ? '' : $nonvariables;
		if ($nonvariables)
			$nonvariables = array_map(create_function('$val', 'return ltrim($val, "/");'), array_values(array_unique(array_merge($nonvariables, array_values(get_settings('nonvariable_permalink_translations'))))));
		
		if (get_settings('category_base'))
			$category_base = array_values(array_unique(array_merge(array(get_settings('category_base')), array_values(get_settings('category_base_permalink_translations')))));
		
		$frequent_langs = get_settings('frequent_langs');
		foreach ($frequent_langs as $lang) {
			$page_val = ml_tag__('page_permalink', $lang);
			$search_val = ml_tag__('search_permalink', $lang);
			$comments_val = ml_tag__('comments_permalink', $lang);
			$feed_val = ml_tag__('feed_permalink', $lang);
			$author_val = ml_tag__('author_permalink', $lang);
			if ($page_val) $page[] = $page_val;
			if ($search_val) $search[] = $search_val;
			if ($comments_val) $comments[] = $comments_val;
			if ($feed_val) $feed[] = $feed_val;
			if ($author_val) $author[] = $author_val;
			if (!get_settings('category_base')) {
				$category_val = ml_tag__('category_permalink', $lang);
				if ($category_val) $category[] = $category_val;
			}
		}
		$page = array_unique($page);
		$search = array_unique($search);
		$comments = array_unique($comments);
		$feed = array_unique($feed);
		$author = array_unique($author);
		$category = array_unique($category);
		
		$rewritecode = array_keys($rules);
		$rewritereplace = array_values($rules);
		
		unset($rules);
		for ($i = 0; $i < count($rewritecode); $i++) {
			// Add lang attribute to query string
			if (preg_match('!(\d)\$!', strrev($rewritereplace[$i]), $matches))
				$rewritereplace[$i] .= '&lang=$' . ++$matches[1];
			else
				$rewritereplace[$i] .= '&lang=$1';
			
			// Make all slug regexes the same
			$rewritecode[$i] = preg_replace('!\(\.\+\??\)!', '([^/]+)', $rewritecode[$i]);
			
			// Insert language before pagination
			$pages_regex = '!((page)?(/\?\(\[0-9\]\)/\?|/\?\(\[0-9\]\{1,\}\)/\?|\(\[0-9\]\+\)\?/\?)|trackback/\?)!';
			$lang_code = '([a-z]{2}|[a-z]{2}-[a-zA-Z]{2})?/?';
			if (preg_match($pages_regex, $rewritecode[$i], $matches)) {
				$rewritecode[$i] = str_replace($matches[1], $lang_code . $matches[1], $rewritecode[$i]);
				// Now swap the backreferences
				if (!strstr($matches[1], 'trackback')) {
					$rewritereplace[$i] = preg_replace('!&page(d?)=\$(\d)(.*?)&lang=\$(\d)!', '&page$1=\$$4$3&lang=\$$2', $rewritereplace[$i]);
				}
			}
			else {
				$rewritecode[$i] = rtrim($rewritecode[$i], '$') . $lang_code . '$';
			}
			
			if ($page)
				$rewritecode[$i] = preg_replace('!page!', '(?:page|' . join('|', $page) . ')', $rewritecode[$i]);
			
			if ($search)
				$rewritecode[$i] = preg_replace('!search!', '(?:search|' . join('|', $search) . ')', $rewritecode[$i]);
			
			if ($comments)
				$rewritecode[$i] = preg_replace('!comments!', '(?:comments|' . join('|', $comments) . ')', $rewritecode[$i]);
			
			if ($feed)
				$rewritecode[$i] = preg_replace('!feed([^|])!', '(?:feed|' . join('|', $feed) . ')$1', $rewritecode[$i]);
			
			if ($author)
				$rewritecode[$i] = preg_replace('!author!', '(?:author|' . join('|', $author) . ')', $rewritecode[$i]);
			
			if ($category)
				$rewritecode[$i] = preg_replace('!category!', '(?:category|' . join('|', $category) . ')', $rewritecode[$i]);
			
			if ($nonvariables)
				$rewritecode[$i] = preg_replace('!' . $nonvariables[0] . '!', '(?:' . join('|', $nonvariables) . ')', $rewritecode[$i]);
			
			if ($category_base)
				$rewritecode[$i] = preg_replace('!' . $category_base[0] . '!', '(?:' . join('|', $category_base) . ')', $rewritecode[$i]);
			
			$rules[$rewritecode[$i]] = $rewritereplace[$i];
		}
		$rules['([a-z]{2}|[a-z]{2}-[a-zA-Z]{2})?/?$'] = '/index.php?lang=$1';
//		echo "<pre>";
//		print_r($page);
//		print_r($search);
//		print_r($comments);
//		print_r($feed);
//		print_r($author);
//		print_r($category);
//		print_r($nonvariables);
//		print_r($category_base);
//		print_r($rules);
//		exit();
//		echo "</pre>";
		return $rules;
	}
	
	function ml_posts_join($join) {
		global $wpdb;
		if (is_category()) {
			$join .= " LEFT JOIN $wpdb->category_translations ON ($wpdb->categories.cat_ID = $wpdb->category_translations.cat_ID)";
		}
		elseif (is_single()) {
			if (!strstr($join, "$wpdb->postmeta")) {
				$join .= " LEFT JOIN $wpdb->postmeta ON ($wpdb->posts.ID = $wpdb->postmeta.post_id)";
			}
		}
		elseif (is_search()) {
	//		if (!strstr($join, "$wpdb->postmeta")) {
	//			$join .= " LEFT JOIN $wpdb->postmeta ON ($wpdb->posts.ID = $wpdb->postmeta.post_id)";
	//		}
		}
	//	echo "<big><pre>Join: $join</pre></big>";
		return $join;
	}
	
	function ml_posts_where($where) {
		global $wpdb;
		if (is_category()) {
			$where = preg_replace('!(category_nicename\s*=\s*([\'"])([^\2]*?)\2)!', "$wpdb->categories.$1 OR $wpdb->category_translations.category_nicename = '$3'", $where);
		}
		elseif (is_single()) {
			$where = preg_replace('!(post_name\s*=\s*([\'"])([^\2]*?)\2)!', "($wpdb->posts.$1 OR ($wpdb->postmeta.meta_key REGEXP '_post_slug_[a-z]{2}(-[a-zA-Z]{2})?' AND $wpdb->postmeta.meta_value = '$3'))", $where);
		}
		elseif (is_search()) {
	//		$where = preg_replace('!(\(post_content\s+LIKE\s+([\'"])([^\2]*?)\2\))!', "$1 OR ($wpdb->postmeta.meta_value LIKE '$3')", $where);
		}
	//	echo "<big><pre>Where: $where</pre></big>";
		return $where;
	}
	
	function ml_post_link($link, $idpost) {
		global $id, $post;
		
		$lang = get_post_lang($id);
		if (get_settings('add_lang_to_permalinks')) {
			// Switch translatable portions of the permalink
			$permalink_structure = get_settings('permalink_structure');
			$nonvariables = preg_replace('!(%[^%]*?%|index.php)/!', '', $permalink_structure);
			$nonvariables = $nonvariables == '/' ? '' : $nonvariables;
			if ($nonvariables) {
				$nonvariable_trans = get_settings('nonvariable_permalink_translations');
				$nonvariable_trans = $nonvariable_trans[$lang];
				if ($nonvariable_trans)
					$link = preg_replace("!$nonvariables!", $nonvariable_trans, $link);
			}
			$post_langs = explode(' ', get_post_meta($id, '_post_langs', true));
			if ($lang != $post_langs[0]) {
				$post_slug_trans = get_post_meta($id, '_post_slug_' . $lang, true);
				if ($post_slug_trans)
					$link = preg_replace('!' . $post->post_name . '!', $post_slug_trans, $link);
			}
			preg_match('!^([^?]*)(\?.*)?$!', $link, $matches);
			$matches[1] = rtrim($matches[1], '/') . "/$lang/";
		}
		else {
			preg_match('!^([^?]*)(\?[^#]*)?(#.*)?$!', $link, $matches);
			if ($matches[2])
				$matches[2] = '&lang=' . $lang;
			else
				$matches[2] = '?lang=' . $lang;
		}
		array_shift($matches);
		return join('', $matches);
	}
	
	function ml_year_link($link) {
		global $locale;
		
		$lang = str_replace('_', '-', $locale);
		
		// Switch translatable portions of the permalink
		$permalink_structure = get_settings('permalink_structure');
		$nonvariables = preg_replace('!(%[^%]*?%|index.php)/!', '', $permalink_structure);
		$nonvariables = $nonvariables == '/' ? '' : $nonvariables;
		if ($nonvariables) {
			$nonvariable_trans = get_settings('nonvariable_permalink_translations');
			$nonvariable_trans = $nonvariable_trans[$lang];
			if ($nonvariable_trans)
				$link = preg_replace("!$nonvariables!", $nonvariable_trans, $link);
		}
		return $link;
	}
	
	function ml_category_link($link) {
		global $locale, $wpdb;
		
		$lang = str_replace('_', '-', $locale);
		
		// Switch translatable portions of the permalink
		$permalink_structure = get_settings('permalink_structure');
		$nonvariables = preg_replace('!(%[^%]*?%|index.php)/!', '', $permalink_structure);
		$nonvariables = $nonvariables == '/' ? '' : $nonvariables;
		if ($nonvariables) {
			$nonvariable_trans = get_settings('nonvariable_permalink_translations');
			$nonvariable_trans = $nonvariable_trans[$lang];
			if ($nonvariable_trans)
				$link = preg_replace("!$nonvariables!", $nonvariable_trans, $link);
		}
		
		// Switch category portion
		$category_base = get_settings('category_base');
		if (!$category_base) {
			$link = preg_replace('!category!', ml_tag__('category_permalink', $lang), $link);
		}
		
		$categories = $wpdb->get_results("SELECT cat_ID, category_nicename FROM $wpdb->categories");
		
		foreach ($categories as $category) {
			if (strstr($link, $category->category_nicename)) {
				$nicename_translation = $wpdb->get_var("SELECT category_nicename FROM $wpdb->category_translations WHERE cat_ID = '$category->cat_ID' AND lang = '$lang'");
				if ($nicename_translation)
					$link = preg_replace("!$category->category_nicename!", $nicename_translation, $link);
				break;
			}
		}
		
		return $link;
	}
	
	function ml_locale($locale) {
//		echo "<pre>$locale</pre>";
//		exit();
		return $locale;
	}
	
	function ml_the_category($link) {
		global $wpdb, $locale;
		
		$lang = str_replace('_', '-', $locale);
		
		$cat_name = preg_replace('!<a\s+[^>]*?>([^<]*)</a>!', '$1', $link);
		
		$cat_ID = $wpdb->get_var("SELECT cat_ID FROM $wpdb->categories WHERE cat_name = '" . addslashes($cat_name) . "'");
		$translation = $wpdb->get_var("SELECT cat_name FROM $wpdb->category_translations WHERE cat_ID = '$cat_ID' AND lang = '$lang'");
		return preg_replace("!$cat_name!", $translation, $link);
	}
	
	function ml_feed_link($link) {
		global $locale;
		
		$lang = str_replace('_', '-', $locale);
		
		$feed_trans = ml_tag__('feed_permalink', $lang);
		$comments_trans = ml_tag__('comments_permalink', $lang);
		$link = preg_replace('!feed!', $feed_trans, $link);
		$link = preg_replace('!comments!', $comments_trans, $link);
		
		preg_match('!^([^?]*)(\?.*)?$!', $link, $matches);
		$matches[1] = rtrim($matches[1], '/') . "/$lang/";
		
		array_shift($matches);
		$link = join('', $matches);
		
		return $link;
	}
	
	add_filter('locale', 'ml_locale', 1);
	add_filter('the_title', 'ml_the_title', 1);
	add_filter('the_title_rss', 'ml_the_title_rss', 1);
	add_filter('the_excerpt_rss', 'ml_the_excerpt_rss', 1);
	add_filter('the_content', 'ml_the_content', 1);
//	add_filter('bloginfo', 'ml_bloginfo', 1);
	if (get_settings('add_lang_to_permalinks')) {
		add_filter('rewrite_rules_array', 'ml_rewrite_rules_array', 1);
	}
	add_filter('posts_where', 'ml_posts_where');
	add_filter('posts_join', 'ml_posts_join');
	add_filter('post_link', 'ml_post_link', 1);
	add_filter('year_link', 'ml_year_link', 1);
	add_filter('month_link', 'ml_year_link', 1);
	add_filter('day_link', 'ml_year_link', 1);
	add_filter('category_link', 'ml_category_link', 1);
	add_filter('the_category', 'ml_the_category', 1);
	add_filter('feed_link', 'ml_feed_link', 1);
	
	
	/* Template functions */
	
	function get_alt_langs() {
		global $id;
		
		$cur_lang = get_post_lang($id);
		$post_langs = explode(' ', get_post_meta($id, '_post_langs', true));
		
		foreach ($post_langs as $lang) {
			if ($lang != $cur_lang)
				echo '<li><a href="' . get_lang_permalink($lang) . '">' . substr($lang, 0, 2) . '</a></li>';
		}
	}
	
	function get_switchpost_langs() {
		global $id;
		
		$cur_lang = get_post_lang($id);
		$post_langs = explode(' ', get_post_meta($id, '_post_langs', true));
		
		foreach ($post_langs as $lang) {
			if ($lang != $cur_lang) {
				$url = get_settings('siteurl') . $_SERVER['REQUEST_URL'];
				if (!strstr($url, '?'))
					echo '<li><a href="' . $url . '?switchpost=' . $id . '&switchpostlang=' . $lang . '">' . substr($lang, 0, 2) . '</a></li>';
				else
					echo '<li><a href="' . $url . '&switchpost=' . $id . '&switchpostlang=' . $lang . '">' . substr($lang, 0, 2) . '</a></li>';
			}
		}
	}
	
	function get_page_langs($format='code_short', $type='hyperlink_list', $show_current=false, $mark_current=true, $echo=true) {
		global $id, $current_language, $wpdb, $lang_codes;
		// echoes or returns all possible post languages 
		// display types:
		//   link_list - returns linked list items; 
		//   list - list items without links
		//   div - encloses linked items in <div></div>
		// $mark_current only operates if $current is set to true
		
		$post_langs = $wpdb->get_col("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key='_post_langs'");
		$post_langs = array_values(array_unique(explode(' ', join(' ', $post_langs))));
		if ($show_current == false)
			unset($post_langs[array_search($current_language,$post_langs)]);
		sort($post_langs);
		
		if ($echo == false) {
			return $post_langs;
		} else {
			if ($type == 'hyperlink_list') {
				$before = '<li><a href="';
				$after = "</a></li>\n";
				$between = '">';
				$before_current = '<li class="current_language">';
				$after_current = "</li>\n";
			}
			elseif ($type == 'list') { // attention, this is a list without links
				$before = '<li>';
				$after = "</li>\n";
				$between = '';
				$before_current = '<li class="current_language">';
				$after_current = "</li>\n";
			}
			elseif ($type == 'div') {
				$before = '<div><a href="';
				$after = "</a></div>\n";
				$between = '">';
				$before_current = '<div class="current_language">';
				$after_current = "</div>\n";
			}
			
			foreach ($post_langs as $lang) {
				if ($lang == $current_language && $mark_current) {
					if ($format == 'full_name')
						echo $before_current . $lang_codes[$lang] . $after_current;
					elseif ($format == 'code_long')
						echo $before_current . $lang . $after_current;
					elseif ($format == 'code_short')
						echo $before_current . substr($lang, 0, 2) . $after_current;
				} else {
					$url = ml_delang_uri($_SERVER['REQUEST_URI']);
					if (get_settings('add_lang_to_permalinks'))
						$url .= "$lang/";
					elseif (!strstr($url, '?'))
						$url .= "?lang=$lang";
					else
						$url .= "&amp;lang=$lang";
					
					if ($type == 'links')
						echo '<link title="' . $lang_codes[$lang] . '" rel="alternate" type="text/html" hreflang="' . $lang . '" href="' . $url . '" />' . "\n";
					elseif ($format == 'full_name')
						echo $before . $url . $between . $lang_codes[$lang] . $after;
					elseif ($format == 'code_long')
						echo $before . $url . $between . $lang . $after;
					elseif ($format == 'code_short')
						echo $before . $url . $between . substr($lang, 0, 2) . $after;
				}
			}
		}
	}
	
	function the_language() {
		echo get_language();
	}
	
	function get_language() {
		global $id;
		return get_post_lang($id);
	}
	
	function the_page_language() {
		global $current_language;
		echo $current_language;
	}
	
	function the_lang_permalink($lang = '') {
		echo get_lang_permalink($lang);
	}
	
	function get_lang_permalink($lang = '') {
		global $id, $post;
		
		$post_lang = get_post_lang($id);
		$link = ml_delang_uri(get_permalink());
		if (get_settings('add_lang_to_permalinks')) {
			// Switch translatable portions of the permalink back
			$permalink_structure = get_settings('permalink_structure');
			$nonvariables = preg_replace('!(%[^%]*?%|index.php)/!', '', $permalink_structure);
			$nonvariables = $nonvariables == '/' ? '' : $nonvariables;
			$post_langs = explode(' ', get_post_meta($id, '_post_langs', true));
			if ($nonvariables) {
				$nonvariable_trans = get_settings('nonvariable_permalink_translations');
				if ($post_lang == $post_langs[0]) {
					$old_nonvariable_trans = $nonvariables;
					$new_nonvariable_trans = $nonvariable_trans[$lang] ? $nonvariable_trans[$lang] : $nonvariables;
				}
				elseif ($lang != $post_langs[0]) {
					$old_nonvariable_trans = $nonvariable_trans[$post_lang];
					$new_nonvariable_trans = $nonvariable_trans[$lang] ? $nonvariable_trans[$lang] : $nonvariables;
				}
				else {
					$old_nonvariable_trans = $nonvariable_trans[$post_lang];
					$new_nonvariable_trans = $nonvariables;
				}
				$link = preg_replace("!$old_nonvariable_trans!", $new_nonvariable_trans, $link);
			}
			
			if ($post_lang == $post_langs[0]) {
				$old_post_slug_trans = $post->post_name;
				$new_post_slug_trans = get_post_meta($id, '_post_slug_' . $lang, true);
			}
			elseif ($lang != $post_langs[0]) {
				$old_post_slug_trans = get_post_meta($id, '_post_slug_' . $post_lang, true);
				$new_post_slug_trans = get_post_meta($id, '_post_slug_' . $lang, true);
			}
			else {
				$old_post_slug_trans = get_post_meta($id, '_post_slug_' . $post_lang, true);
				$new_post_slug_trans = $post->post_name;
			}
			$link = preg_replace('!' . $old_post_slug_trans . '!', $new_post_slug_trans, $link);
			
			preg_match('!^([^?]*)(\?.*)?$!', $link, $matches);
			$matches[1] = rtrim($matches[1], '/') . "/$lang/";
		}
		else {
			preg_match('!^([^?]*)(\?[^#]*)?(#.*)?$!', $link, $matches);
			if ($matches[2])
				$matches[2] = '&lang=' . $lang;
			else
				$matches[2] = '?lang=' . $lang;
		}
		array_shift($matches);
		return join('', $matches);
	}
	
	function alt_langs_exist() {
		global $id;
		$post_langs = get_post_meta($id, '_post_langs', true);
		if ($post_langs) {
			$cur_lang = get_post_lang($id);
			$post_langs = preg_replace("! ?$cur_lang!", '', $post_langs);
			return '' != $post_langs;
		}
		return false;
	}
	
	function the_title_multilingual($before = '', $after = '', $echo = true) {
		$title = get_the_title_multilingual();
		if (!empty($title)) {
			$title = apply_filters('the_title', $before . $title . $after);
			if ($echo)
				echo $title;
			else
				return $title;
		}
	}
	
	function get_the_title_multilingual($id = 0) {
		global $post, $wpdb;
		
		$post_id = $id == 0 ? $post->ID : $id;
		
		$lang = get_post_lang($post_id);
		$post_langs = explode(' ', get_post_meta($post_id, '_post_langs', true));
		if ('' != $post_langs[0] && $lang != $post_langs[0])
			$title = get_post_meta($post_id, '_post_title_' . $lang, true);
		else {
			if ( 0 != $id )
				$id_post = $wpdb->get_var("SELECT post_title, post_password FROM $wpdb->posts WHERE ID = $id");
				$title = $id_post->post_title;
				if (!empty($id_post->post_password))
					$title = 'Protected: ' . $title;
			else
				$title = $post->post_title;
				if (!empty($post->post_password))
					$title = 'Protected: ' . $title;
		}
		return $title;
	}
	
	function the_excerpt_multilingual() {
		echo apply_filters('the_excerpt', get_the_excerpt_multilingual());
	}
	
	function get_the_excerpt_multilingual($fakeit = true) {
		global $id, $post;
		
		$lang = get_post_lang($id);
		$post_langs = explode(' ', get_post_meta($id, '_post_langs', true));
		if ('' != $post_langs[0] && $lang != $post_langs[0])
			$output = get_post_meta($id, '_post_excerpt_' . $lang, true);
		else
			$output = $post->post_excerpt;
		
		if (!empty($post->post_password)) { // if there's a password
			if ($_COOKIE['wp-postpass_'.COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				$output = __('There is no excerpt because this is a protected post.');
				return $output;
			}
		}
		
		// If we haven't got an excerpt, make one in the style of the rss ones
		if (($output == '') && $fakeit) {
			if ('' != $post_langs[0] && $lang != $post_langs[0])
				$output = get_post_meta($id, '_post_content_' . $lang, true);
			else
				$output = $post->post_content;
			
			$output = strip_tags($output);
			$blah = explode(' ', $output);
			$excerpt_length = 120;
			if (count($blah) > $excerpt_length) {
				$k = $excerpt_length;
				$use_dotdotdot = 1;
			} else {
				$k = count($blah);
				$use_dotdotdot = 0;
			}
			$excerpt = '';
			for ($i=0; $i<$k; $i++) {
				$excerpt .= $blah[$i].' ';
			}
			$excerpt .= ($use_dotdotdot) ? '...' : '';
			$output = $excerpt;
		}
		return $output;
	}
	
	function the_content_multilingual($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
		$content = get_the_content_multilingual($more_link_text, $stripteaser, $more_file);
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		echo $content;
	}
	
	function get_the_content_multilingual($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
		global $id, $post, $more, $single, $withcomments, $page, $pages, $multipage, $numpages;
		global $preview;
		global $pagenow;
		$output = '';
	
		if (!empty($post->post_password)) { // if there's a password
			if (stripslashes($_COOKIE['wp-postpass_'.COOKIEHASH]) != $post->post_password) {  // and it doesn't match the cookie
				$output = get_the_password_form();
				return $output;
			}
		}
	
		if ($more_file != '') {
			$file = $more_file;
		} else {
			$file = $pagenow; //$_SERVER['PHP_SELF'];
		}
		$content = $pages[$page-1];
		$content = explode('<!--more-->', $content, 2);
		if ((preg_match('/<!--noteaser-->/', join('', $pages)) && ((!$multipage) || ($page==1))))
			$stripteaser = 1;
		$teaser = $content[0];
		if (($more) && ($stripteaser))
			$teaser = '';
		$output .= $teaser;
		if (count($content)>1) {
			if ($more) {
				$output .= '<a id="more-'.$id.'"></a>'.$content[1];
			} else {
				$output .= ' <a href="'. get_permalink() . "#more-$id\">$more_link_text</a>";
			}
		}
		if ($preview) { // preview fix for javascript bug with foreign languages
			$output =  preg_replace('/\%u([0-9A-F]{4,4})/e',  "'&#'.base_convert('\\1',16,10).';'", $output);
		}
		return $output;
	}
	
	function the_permalink_multilingual() {
		echo apply_filters('the_permalink', get_permalink_multilingual());
	}
	
	function get_permalink_multilingual($id = false) {
		global $post, $wpdb;
	
		$rewritecode = array(
			'%year%',
			'%monthnum%',
			'%day%',
			'%hour%',
			'%minute%',
			'%second%',
			'%postname%',
			'%post_id%',
			'%category%',
			'%author%',
			'%pagename%'
		);
	
		if ($id) {
			$idpost = $wpdb->get_row("SELECT ID, post_date, post_name, post_status, post_author FROM $wpdb->posts WHERE ID = $id");
		} else {
			$idpost = $post;
		}
	
		if ($idpost->post_status == 'static') {
			return get_page_link($idpost->ID);
		}
	
		$permalink = get_settings('permalink_structure');
		$lang = get_post_lang($idpost->ID);
		
		if ('' != $permalink) {
			$unixtime = strtotime($idpost->post_date);
	
			$cats = get_the_category($idpost->ID);
			$category = $cats[0]->category_nicename;
			$authordata = get_userdata($idpost->post_author);
			$author = $authordata->user_nicename;
			$rewritereplace = 
			array(
				date('Y', $unixtime),
				date('m', $unixtime),
				date('d', $unixtime),
				date('H', $unixtime),
				date('i', $unixtime),
				date('s', $unixtime),
				$idpost->post_name,
				$idpost->ID,
				$category,
				$author,
				$idpost->post_name,
			);
			return get_settings('home') . str_replace($rewritecode, $rewritereplace, $permalink) . "$lang/";
		} else { // if they're not using the fancy permalink option
			return get_settings('home') . '/?p=' . $idpost->ID . '&lang=' . $lang;
		}
	}
	
	function the_post_multilingual() {
		start_wp_multilingual(true);
	}
	
	function start_wp_multilingual($use_wp_query = false) {
		global $post, $id, $postdata, $authordata, $day, $preview, $page, $pages, $multipage, $more, $numpages, $wp_query;
		global $pagenow;
		
		if ($use_wp_query) {
		  $post = $wp_query->next_post();
		} else {
		  $wp_query->next_post();
		}
	
		if (!$preview) {
			$id = $post->ID;
		} else {
			$id = 0;
			$postdata = array (
				'ID' => 0,
				'Author_ID' => $_GET['preview_userid'],
				'Date' => $_GET['preview_date'],
				'Content' => $_GET['preview_content'],
				'Excerpt' => $_GET['preview_excerpt'],
				'Title' => $_GET['preview_title'],
				'Category' => $_GET['preview_category'],
				'Notify' => 1
				);
		}
		$authordata = get_userdata($post->post_author);
		
		$day = mysql2date('d.m.y', $post->post_date);
		$currentmonth = mysql2date('m', $post->post_date);
		$numpages = 1;
		if (!$page)
			$page = 1;
		if (isset($p))
			$more = 1;
		$lang = get_post_lang($id);
		$post_langs = explode(' ', get_post_meta($id, '_post_langs', true));
		if ('' != $post_langs[0] && $lang != $post_langs[0])
			$content = get_post_meta($id, '_post_content_' . $lang, true);
		else
			$content = $post->post_content;
		if (preg_match('/<!--nextpage-->/', $content)) {
			if ($page > 1)
				$more = 1;
			$multipage = 1;
			$content = str_replace("\n<!--nextpage-->\n", '<!--nextpage-->', $content);
			$content = str_replace("\n<!--nextpage-->", '<!--nextpage-->', $content);
			$content = str_replace("<!--nextpage-->\n", '<!--nextpage-->', $content);
			$pages = explode('<!--nextpage-->', $content);
			$numpages = count($pages);
		} else {
			$pages[0] = $content;
			$multipage = 0;
		}
		return true;
	}
	
	function the_date_multilingual($d = '', $before = '', $after = '', $echo = true, $suppress_sameday = false) {
		global $id, $post, $day, $previousday, $newday;
		
		$lang = get_post_lang($id);
		
		$the_date = '';
		if (!$suppress_sameday || $day != $previousday) {
			$the_date .= $before;
			if ('' == $d) {
				$formats = get_settings('multilingual_date_formats');
				$format = array_key_exists($lang, $formats) ? $formats[$lang] : array_shift($formats);
				$the_date .= ml_mysql2date($format, $post->post_date, $lang);
			} else {
				$the_date .= ml_mysql2date($d, $post->post_date, $lang);
			}
			$the_date .= $after;
			$previousday = $day;
		}
		$the_date = apply_filters('the_date', $the_date);
		if ($echo) {
			echo $the_date;
		} else {
			return $the_date;
		}
	}
	
	function the_time_multilingual($d = '') {
		echo apply_filters('the_time', get_the_time_multilingual( $d ) );
	}
	
	function get_the_time_multilingual($d = '') {
		global $id;
		
		$lang = str_replace('-', '_', get_post_lang($id));
		
		if ('' == $d) {
			$formats = get_settings('multilingual_time_formats');
			$format = $formats["$lang"];
		}
		else {
			$format = $d;
		}
		
		$the_time = ml_mysql2date($format, $post->post_date, $lang);
		
		return apply_filters('get_the_time', $the_time);
	}
	
	function wp_list_cats_multilingual($args = '') {
		parse_str($args, $r);
		if (!isset($r['optionall'])) $r['optionall'] = 0;
		if (!isset($r['all'])) $r['all'] = 'All';
		if (!isset($r['sort_column'])) $r['sort_column'] = 'ID';
		if (!isset($r['sort_order'])) $r['sort_order'] = 'asc';
		if (!isset($r['file'])) $r['file'] = '';
		if (!isset($r['list'])) $r['list'] = true;
		if (!isset($r['optiondates'])) $r['optiondates'] = 0;
		if (!isset($r['optioncount'])) $r['optioncount'] = 0;
		if (!isset($r['hide_empty'])) $r['hide_empty'] = 1;
		if (!isset($r['use_desc_for_title'])) $r['use_desc_for_title'] = 1;
		if (!isset($r['children'])) $r['children'] = true;
		if (!isset($r['child_of'])) $r['child_of'] = 0;
		if (!isset($r['categories'])) $r['categories'] = 0;
		if (!isset($r['recurse'])) $r['recurse'] = 0;
		if (!isset($r['feed'])) $r['feed'] = '';
		if (!isset($r['feed_image'])) $r['feed_image'] = '';
		if (!isset($r['exclude'])) $r['exclude'] = '';
		if (!isset($r['hierarchical'])) $r['hierarchical'] = true;
	
		list_cats_multilingual($r['optionall'], $r['all'], $r['sort_column'], $r['sort_order'], $r['file'],	$r['list'], $r['optiondates'], $r['optioncount'], $r['hide_empty'], $r['use_desc_for_title'], $r['children'], $r['child_of'], $r['categories'], $r['recurse'], $r['feed'], $r['feed_image'], $r['exclude'], $r['hierarchical']);
	}
	
	function list_cats_multilingual($optionall = 1, $all = 'All', $sort_column = 'ID', $sort_order = 'asc', $file = '', $list = true, $optiondates = 0, $optioncount = 0, $hide_empty = 1, $use_desc_for_title = 1, $children=FALSE, $child_of=0, $categories=0, $recurse=0, $feed = '', $feed_image = '', $exclude = '', $hierarchical=FALSE) {
		global $wpdb, $category_posts;
		global $querystring_start, $querystring_equal, $querystring_separator;
		global $current_language;
		// Optiondates now works
		if ('' == $file) {
			$file = get_settings('home') . '/';
		}
		
		$exclusions = '';
		if (!empty($exclude)) {
			$excats = preg_split('/[\s,]+/',$exclude);
			if (count($excats)) {
				foreach ($excats as $excat) {
					$exclusions .= ' AND cat_ID <> ' . intval($excat) . ' ';
				}
			}
		}
		
		if (intval($categories)==0){
			$sort_column = 'cat_'.$sort_column;
	
			$query  = "
				SELECT cat_ID, cat_name, category_nicename, category_description, category_parent
				FROM $wpdb->categories
				WHERE cat_ID > 0 $exclusions
				ORDER BY $sort_column $sort_order";
	
			$categories = $wpdb->get_results($query);
		}
		if (!count($category_posts)) {
			$cat_counts = $wpdb->get_results("	SELECT cat_ID,
			COUNT($wpdb->post2cat.post_id) AS cat_count
			FROM $wpdb->categories 
			INNER JOIN $wpdb->post2cat ON (cat_ID = category_id)
			INNER JOIN $wpdb->posts ON (ID = post_id)
			WHERE post_status = 'publish' $exclusions
			GROUP BY category_id");
			if (! empty($cat_counts)) {
				foreach ($cat_counts as $cat_count) {
					if (1 != intval($hide_empty) || $cat_count > 0) {
						$category_posts["$cat_count->cat_ID"] = $cat_count->cat_count;
					}
				}
			}
		}
		
		if ( $optiondates ) {
			$cat_dates = $wpdb->get_results("	SELECT category_id,
			UNIX_TIMESTAMP( MAX(post_date) ) AS ts
			FROM $wpdb->posts, $wpdb->post2cat
			WHERE post_status = 'publish' AND post_id = ID $exclusions
			GROUP BY category_id");
			foreach ($cat_dates as $cat_date) {
				$category_timestamp["$cat_date->category_id"] = $cat_date->ts;
			}
		}
		
		if (intval($optionall) == 1 && !$child_of && $categories) {
			$all = apply_filters('list_cats', $all);
			$link = "<a href=\"".$file.$querystring_start.'cat'.$querystring_equal.'all">'.$all."</a>";
			if ($list) {
				echo "\n\t<li>$link</li>";
			} else {
				echo "\t$link<br />\n";
			}
		}
		
		$num_found=0;
		$thelist = "";
		
		foreach ($categories as $category) {
			
			$category_languages = get_category_languages($category->cat_ID);
			
			if (in_array($current_language, $category_languages)) {
				$translation = get_category_translations($category->cat_ID, $current_language);
				$cat_name = $translation['cat_name'];
			}
			else {
				$cat_name = $category->cat_name;
			}
			
			if ((intval($hide_empty) == 0 || isset($category_posts["$category->cat_ID"])) && (!$hierarchical || $category->category_parent == $child_of) && ($children || $category->category_parent == 0)) {
				$num_found++;
				$link = '<a href="'.get_category_link(0, $category->cat_ID, $category->category_nicename).'" ';
				if ($use_desc_for_title == 0 || empty($category->category_description)) {
					$link .= 'title="'. sprintf(__("View all posts filed under %s"), wp_specialchars($cat_name)) . '"';
				} else {
					$link .= 'title="' . wp_specialchars($category->category_description) . '"';
				}
				$link .= '>';
				$link .= apply_filters('list_cats', $cat_name).'</a>';
				
				if ( (! empty($feed_image)) || (! empty($feed)) ) {
					
					$link .= ' ';
					
					if (empty($feed_image)) {
						$link .= '(';
					}
					
					$link .= '<a href="' . get_category_rss_link(0, $category->cat_ID, $category->category_nicename)  . '"';
					
					if ( !empty($feed) ) {
						$title =  ' title="' . $feed . '"';
						$alt = ' alt="' . $feed . '"';
						$name = $feed;
						$link .= $title;
					}
					
					$link .= '>';
					
					if (! empty($feed_image)) {
						$link .= "<img src=\"$feed_image\" border=\"0\"$alt$title" . ' />';
					} else {
						$link .= $name;
					}
					
					$link .= '</a>';
					
					if (empty($feed_image)) {
						$link .= ')';
					}
				}
				
				if (intval($optioncount) == 1) {
					$link .= ' ('.intval($category_posts["$category->cat_ID"]).')';
				}
				if ( $optiondates ) {
					if ( $optiondates == 1 ) $optiondates = 'Y-m-d';
					$link .= ' ' . gmdate($optiondates, $category_timestamp["$category->cat_ID"]);
				}
				if ($list) {
					$thelist .= "\t<li>$link\n";
				} else {
					$thelist .= "\t$link<br />\n";
				}
				if ($hierarchical && $children) $thelist .= list_cats($optionall, $all, $sort_column, $sort_order, $file, $list, $optiondates, $optioncount, $hide_empty, $use_desc_for_title, $hierarchical, $category->cat_ID, $categories, 1, $feed, $feed_image, $exclude, $hierarchical);
				if ($list) $thelist .= "</li>\n";
				}
		}
		if (!$num_found && !$child_of){
			if ($list) {
				$before = '<li>';
				$after = '</li>';
			}
			echo $before . __("No categories") . $after . "\n";
			return;
		}
		if ($list && $child_of && $num_found && $recurse) {
			$pre = "\t\t<ul class='children'>";
			$post = "\t\t</ul>\n";
		} else {
			$pre = $post = '';
		}
		$thelist = $pre . $thelist . $post;
		if ($recurse) {
			return $thelist;
		}
		echo apply_filters('list_cats', $thelist);
	}
	ml_init();
	
	require_once(ABSPATH . 'wp-includes/streams.php');
	require_once(ABSPATH . 'wp-includes/gettext.php');
	
	$wpconfig = ABSPATH . 'wp-config.php';
	if (isset($_GET['action'])) $action = $_GET['action'];
	elseif (isset($_POST['action'])) $action = $_POST['action'];
	
	switch ($action) {
		case 'updatepermalinks':
			
			$permalink_structure = get_settings('permalink_structure');
			$category_base = get_settings('category_base');
			$permalink_languages = get_settings('permalink_languages');
			$nonvariable_translations = get_settings('nonvariable_permalink_translations');
			$category_base_translations = get_settings('category_base_permalink_translations');
			
			$nonvariables = preg_replace('!(%[^%]*?%|index.php)/!', '', $permalink_structure);
			$new_default_nonvariables = $_POST['nonvar_default'];
			$permalink_structure = preg_replace("!$nonvariables!", $new_default_nonvariables, $permalink_structure);
		//	echo "<pre>";
		//	echo "$nonvariables\n";
		//	echo "$new_default_nonvariables\n";
		//	echo "$permalink_structure\n";
		//	exit();
			update_option('permalink_structure', $permalink_structure);
			
			for ($i = 1; $i < count($permalink_languages); $i++) {
				$code = $permalink_languages[$i];
				$nonvariable_translations["$code"] = stripslashes(trim($_POST['nonvar_' . $code]));
				$category_base_translations["$code"] = stripslashes(trim($_POST['base_' . $code]));
			}
			
			if (isset($_POST['add_lang'])) {
				$new_code = $_POST['new_lang'];
				$permalink_languages[] = $new_code;
				$nonvariable_translations["$new_code"] = '';
				$category_base_translations["$new_code"] = '';
			}
			elseif (isset($_POST['delete_lang'])) {
				$old_code = $_POST['old_lang'];
				unset($permalink_languages["$old_code"]);
				unset($nonvariable_translations["$old_code"]);
				unset($category_base_translations["$old_code"]);
			}
			update_option('permalink_languages', $permalink_languages);
			update_option('nonvariable_permalink_translations', $nonvariable_translations);
			update_option('category_base_permalink_translations', $category_base_translations);
			
			header('Location: admin.php?page=multilingual.php&action=permalinks&updated=true');
			exit();
			
			break;
			
		case 'addcat':
			
			get_currentuserinfo();
			
			if ($user_level < 3)
				die (__('Cheatin&#8217; uh?'));
			
			$cat_name= wp_specialchars($_POST['cat_name']);
			$id_result = $wpdb->get_row("SHOW TABLE STATUS LIKE '$wpdb->categories'");
			$cat_ID = $id_result->Auto_increment;
			$category_nicename = sanitize_title($cat_name, $cat_ID);
			$category_description = $_POST['category_description'];
			$category_parent = intval($_POST['category_parent']);
			
			$wpdb->query("INSERT INTO $wpdb->categories (cat_ID, cat_name, category_nicename, category_description, category_parent) VALUES ('0', '$cat_name', '$category_nicename', '$category_description', '$category_parent')");
			
			add_category_languages($cat_ID, get_settings('default_category_language'));
			
			header("Location: admin.php?page=multilingual.php&action=editcat&message=1&cat_ID=$cat_ID");
			break;
		
		case 'deletecat':
			
			require_once('admin-functions.php');
			
			check_admin_referer();
			
			$cat_ID = (int) $_GET['cat_ID'];
			$cat_name = get_catname($cat_ID);
			$category = $wpdb->get_row("SELECT * FROM $wpdb->categories WHERE cat_ID = '$cat_ID'");
			$cat_parent = $category->category_parent;
			
			if ( 1 == $cat_ID )
				die(sprintf(__("Can't delete the <strong>%s</strong> category: this is the default one"), $cat_name));
			
			get_currentuserinfo();
			
			if ( $user_level < 3 )
				die (__('Cheatin&#8217; uh?'));
			
			$wpdb->query("DELETE FROM $wpdb->categories WHERE cat_ID = '$cat_ID'");
			$wpdb->query("UPDATE $wpdb->categories SET category_parent = '$cat_parent' WHERE category_parent = '$cat_ID'");
			$wpdb->query("UPDATE $wpdb->post2cat SET category_id='1' WHERE category_id='$cat_ID'");
			
			delete_category_languages($cat_ID, get_category_languages($cat_ID));
			
			header("Location: admin.php?page=multilingual.php&message=2");
			exit();
			
			break;
		
		case 'editedcat':
			
			get_currentuserinfo();
			
			if ($user_level < 3)
				die (__('Cheatin&#8217; uh?'));
			
			$cat_ID = (int) $_POST['cat_ID'];
			$category_parent = $_POST['category_parent'];
			
			$category_languages = get_category_languages($cat_ID, true);
			
			$default_cat_name = wp_specialchars($_POST['cat_name_' . $category_languages[0]]);
			$default_category_nicename = sanitize_title($_POST['category_nicename_' . $category_languages[0]], $cat_ID);
			$default_category_description = $_POST['category_description_' . $category_languages[0]];
			
			$wpdb->query("UPDATE $wpdb->categories SET cat_name = '$default_cat_name', category_nicename = '$default_category_nicename', category_description = '$default_category_description', category_parent = '$category_parent' WHERE cat_ID = '$cat_ID'");
			
			// Do deletions first, 'cause we don't have to update them
			if (isset($_POST['delete_lang']) && isset($_POST['old_lang'])) {
				$old_lang = $_POST['old_lang'];
				$category_languages = delete_category_languages($cat_ID, $old_lang, true);
			}
			// Update remaining translations
			for ($i = 1; $i < count($category_languages); $i++) {
				$update_langs[] = $category_languages[$i];
				$cat_names[] = $_POST['cat_name_' . $category_languages[$i]];
				$category_nicenames[] = $_POST['category_nicename_' . $category_languages[$i]];
				$category_descriptions[] = $_POST['category_description_' . $category_languages[$i]];
			}
			if ($update_langs) update_category_translations($cat_ID, $update_langs, $cat_names, $category_nicenames, $category_descriptions);
			
			// Add new translations
			if (isset($_POST['add_lang']) && isset($_POST['new_lang'])) {
				$new_lang = $_POST['new_lang'];
				$category_languages = add_category_languages($cat_ID, $new_lang, true);
			}
			
			header("Location: admin.php?page=multilingual.php&action=editcat&message=3&cat_ID=$cat_ID");
			exit();
			
			break;
		
		case 'updatelangs':
			$pluginbaseuri = preg_replace('!&updated=(?:true|false)!', '', $_SERVER['REQUEST_URI']) . '&action=languages';
			update_option('frequent_langs', $_POST['frequent_langs']);
			
			if (is_readable($wpconfig) && is_writable($wpconfig)) {
				$new_lang = str_replace('-', '_', $_POST['wordpress_l10n']);
				if ($new_lang == 'en_US') $new_lang = '';
				$f = fopen($wpconfig, 'r+');
				$content = fread($f, filesize($wpconfig));
				$newcontent = preg_replace("!define \('WPLANG', '[^']*'\);!", "define ('WPLANG', '$new_lang');", $content);
				ftruncate($f, 0);
				fseek($f, 0);
				fwrite($f, $newcontent);
				fclose($f);
			}
			else {
				header('Location: ' . $pluginbaseuri . '&message=-1');
				exit();
			}
			
			header('Location: ' . $pluginbaseuri . '&updated=true');
			exit();
			
			break;
		
		case 'updatelocales':
			$multilingual_date_formats = get_settings('multilingual_date_formats');
			$multilingual_time_formats = get_settings('multilingual_time_formats');
			
			foreach (array_keys($multilingual_date_formats) as $code) {
				$multilingual_date_formats["$code"] = stripslashes(trim($_POST['date_format_' . $code]));
				$multilingual_time_formats["$code"] = stripslashes(trim($_POST['time_format_' . $code]));
			}
			
			if (isset($_POST['add_locale'])) {
				$new_code = $_POST['new_locale'];
				$multilingual_date_formats["$new_code"] = $date_defaults["$new_code"];
				$multilingual_time_formats["$new_code"] = $time_defaults["$new_code"];
			}
			elseif (isset($_POST['delete_locale'])) {
				$old_code = $_POST['old_locale'];
				unset($multilingual_date_formats["$old_code"]);
				unset($multilingual_time_formats["$old_code"]);
			}
			update_option('multilingual_date_formats', $multilingual_date_formats);
			update_option('multilingual_time_formats', $multilingual_time_formats);
			
			header('Location: admin.php?page=multilingual.php&action=locales&updated=true');
			exit();
			
			break;
			
		default:
			
			break;
	}
}
?>