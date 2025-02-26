<?php
/*
Plugin Name: Add Signature
Plugin URI: http://nibble.it/?p=8848
Description: Add a custom signature to the bottom of posts with the author's information
Author: Marco V. Principato (Original author is Dragon Design)
Version: 1.0
Author URI: http://nibble.it/about
*/

$ddsig_version = '1.0';


// Setup defaults if options do not exist

add_option('ddsig_data', 'Written by %FIRST% %LAST% - <a href="%URL%">Visit Website</a>');	// Signature data
add_option('ddsig_data2', 'Written by %FIRST% %LAST% - <a href="%URL%">Visit Website</a>');	// Signature data
add_option('ddsig_data3', 'Written by %FIRST% %LAST% - <a href="%URL%">Visit Website</a>');	// Signature data
add_option('ddsig_data4', 'Written by %FIRST% %LAST% - <a href="%URL%">Visit Website</a>');	// Signature data
add_option('ddsig_data5', 'Written by %FIRST% %LAST% - <a href="%URL%">Visit Website</a>');	// Signature data
add_option('ddsig_data6', 'Written by %FIRST% %LAST% - <a href="%URL%">Visit Website</a>');	// Signature data
add_option('ddsig_data7', 'Written by %FIRST% %LAST% - <a href="%URL%">Visit Website</a>');	// Signature data
add_option('ddsig_data8', 'Written by %FIRST% %LAST% - <a href="%URL%">Visit Website</a>');	// Signature data

add_option('ddsig_sindex', FALSE);	// Show on index
add_option('ddsig_sposts', FALSE);	// Show on posts
add_option('ddsig_spages', FALSE);	// Show on pages
add_option('ddsig_sarc', FALSE);	// Show on archives
add_option('ddsig_ssearch', FALSE);	// Show on search


function ddsig_add_option_pages() {
	if (function_exists('add_options_page')) {
		add_options_page("Add Signature", 'MVP Add Signature', 8, __FILE__, 'ddsig_options_page');
	}		
}

function ddsig_trim_sig($sig) {
	return trim($sig, "*");
}


function ddsig_options_page() {

	global $ddsig_version;


	if (isset($_POST['set_defaults'])) {
		echo '<div id="message" class="updated fade"><p><strong>';

		update_option('ddsig_data', 'Written by %FIRST% %LAST% - <a href="%URL%">Visit Website</a>');	// Signature data
		update_option('ddsig_data2', 'Written by %FIRST% %LAST% - <a href="%URL%">Visit Website</a>');	// Signature data
		update_option('ddsig_data3', 'Written by %FIRST% %LAST% - <a href="%URL%">Visit Website</a>');	// Signature data
		update_option('ddsig_data4', 'Written by %FIRST% %LAST% - <a href="%URL%">Visit Website</a>');	// Signature data
		update_option('ddsig_data5', 'Written by %FIRST% %LAST% - <a href="%URL%">Visit Website</a>');	// Signature data
		update_option('ddsig_data6', 'Written by %FIRST% %LAST% - <a href="%URL%">Visit Website</a>');	// Signature data
		update_option('ddsig_data7', 'Written by %FIRST% %LAST% - <a href="%URL%">Visit Website</a>');	// Signature data
		update_option('ddsig_sindex', FALSE);	// Show on index
		update_option('ddsig_sposts', FALSE);	// Show on posts
		update_option('ddsig_spages', FALSE);	// Show on pages
		update_option('ddsig_sarc', FALSE);	// Show on archives
		update_option('ddsig_ssearch', FALSE);	// Show on search

		echo 'Default Options Loaded!';
		echo '</strong></p></div>';

	} else if (isset($_POST['info_update'])) {

		echo '<div id="message" class="updated fade"><p><strong>';

		update_option('ddsig_data', '*' . (string)$_POST["ddsig_data"] . '*');
		update_option('ddsig_data2', '*' . (string)$_POST["ddsig_data2"] . '*');
		update_option('ddsig_data3', '*' . (string)$_POST["ddsig_data3"] . '*');
		update_option('ddsig_data4', '*' . (string)$_POST["ddsig_data4"] . '*');
		update_option('ddsig_data5', '*' . (string)$_POST["ddsig_data5"] . '*');
		update_option('ddsig_data6', '*' . (string)$_POST["ddsig_data6"] . '*');
		update_option('ddsig_data7', '*' . (string)$_POST["ddsig_data7"] . '*');
		update_option('ddsig_sindex', (bool)$_POST["ddsig_sindex"]);
		update_option('ddsig_sposts', (bool)$_POST["ddsig_sposts"]);
		update_option('ddsig_spages', (bool)$_POST["ddsig_spages"]);
		update_option('ddsig_sarc', (bool)$_POST["ddsig_sarc"]);
		update_option('ddsig_ssearch', (bool)$_POST["ddsig_ssearch"]);

		echo 'Configuration Updated!';
		echo '</strong></p></div>';

	} ?>

	<div class=wrap>

	<h2>Add Signature v<?php echo $ddsig_version; ?></h2>

	<p>Original author of this plugin is Dagon Design, at <a href="http://www.dagondesign.com" target="_blank">http://www.dagondesign.com</a>.</p>
	
	<p>If you want to make the original author a favour, please <a href="http://www.dagondesign.com/donate/" target="_blank">donate</a> to him.</p>
	
	<p>For information and updates (italian language only), please visit <a href="http://nibble.it/?p=8848" target="_blank">http://nibble.it/?p=8848</a>.</p>

	<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
	<input type="hidden" name="info_update" id="info_update" value="true" />

	

	<h3>Signatures</h3>


	<div style="padding: 0 0 0 11px;">


		<p><strong>Primary Signature</strong> - Trigger with &lt;!-- ddsig --&gt; or choose an option below<br />
		<textarea name="ddsig_data" cols="80" rows="4"><?php echo htmlspecialchars(stripslashes(ddsig_trim_sig(get_option('ddsig_data')))) ?></textarea>
		</p>

		<p><strong>Signature 2</strong> - Trigger with &lt;!-- ddsig2 --&gt;<br />
		<textarea name="ddsig_data2" cols="80" rows="4"><?php echo htmlspecialchars(stripslashes(ddsig_trim_sig(get_option('ddsig_data2')))) ?></textarea>
		</p>

		<p><strong>Signature 3</strong> - Trigger with &lt;!-- ddsig3 --&gt;<br />
		<textarea name="ddsig_data3" cols="80" rows="4"><?php echo htmlspecialchars(stripslashes(ddsig_trim_sig(get_option('ddsig_data3')))) ?></textarea>
		</p>

		<p><strong>Signature 4</strong> - Trigger with &lt;!-- ddsig4 --&gt;<br />
		<textarea name="ddsig_data4" cols="80" rows="4"><?php echo htmlspecialchars(stripslashes(ddsig_trim_sig(get_option('ddsig_data4')))) ?></textarea>
		</p>

		<p><strong>Signature 5</strong> - Trigger with &lt;!-- ddsig5 --&gt;<br />
		<textarea name="ddsig_data5" cols="80" rows="4"><?php echo htmlspecialchars(stripslashes(ddsig_trim_sig(get_option('ddsig_data5')))) ?></textarea>
		</p>

		<p><strong>Signature 6</strong> - Trigger with &lt;!-- ddsig6 --&gt;<br />
		<textarea name="ddsig_data6" cols="80" rows="4"><?php echo htmlspecialchars(stripslashes(ddsig_trim_sig(get_option('ddsig_data6')))) ?></textarea>
		</p>

		<p><strong>Signature 7</strong> - Trigger with &lt;!-- ddsig7 --&gt;<br />
		<textarea name="ddsig_data7" cols="80" rows="4"><?php echo htmlspecialchars(stripslashes(ddsig_trim_sig(get_option('ddsig_data7')))) ?></textarea>
		</p>
		
		<strong>Notes:</strong>
		<p>- HTML is allowed<br />
		- <strong>All</strong> newlines will be turned into line breaks<br />
		- CSS can be added to customize the look</p>
		
		<strong>You can use the following variables to display author information:</strong>
		<p>- %LOGIN% - Login name<br />
		- %FIRST% - First name<br />
		- %LAST% - Last name<br />
		- %NICK% - Nickname<br />
		- %EMAIL% - Email address<br />
		- %URL% - Website<br />
		- %DESC% - Description/Bio</br>
		- %PERMALINK% - Post Permalink</p>

	</div>


	<h3>Usage</h3>

	<ul>
	<li>You can add a signature to your post or page by inserting the trigger text given above.</li>
	<li>If you would like to automatically add a signature to selected parts of your site, check the boxes below. These automatic settings only apply to the primary signature.</li>
	</ul>

	<div style="padding: 0 0 0 30px">
		<input type="checkbox" name="ddsig_sindex" value="checkbox" <?php if (get_option('ddsig_sindex')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<strong>Display on index page</strong>
		<br />
		<input type="checkbox" name="ddsig_sposts" value="checkbox" <?php if (get_option('ddsig_sposts')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<strong>Display on posts</strong>
		<br />
		<input type="checkbox" name="ddsig_spages" value="checkbox" <?php if (get_option('ddsig_spages')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<strong>Display on static pages</strong>
		<br />
		<input type="checkbox" name="ddsig_sarc" value="checkbox" <?php if (get_option('ddsig_sarc')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<strong>Display on archive pages (includes cat archives)</strong>
		<br />
		<input type="checkbox" name="ddsig_ssearch" value="checkbox" <?php if (get_option('ddsig_ssearch')) echo "checked='checked'"; ?>/>&nbsp;&nbsp;
		<strong>Display on search pages</strong>
	</div>
	


	<div class="submit">
		<input type="submit" name="set_defaults" value="<?php _e('Load Default Options'); ?> &raquo;" />
		<input type="submit" name="info_update" value="<?php _e('Update options'); ?> &raquo;" />
	</div>

	</form>
	</div><?php
}



function ddsig_generate($content) {

	global $wpdb, $id, $authordata;

	// strip p tags around html comments

	$content = preg_replace('/<p>\s*<!--(.*)-->\s*<\/p>/i', "<!--$1-->", $content);

	// Load options

	$ddsig_data = get_option('ddsig_data');
	$ddsig_data2 = get_option('ddsig_data2');
	$ddsig_data3 = get_option('ddsig_data3');
	$ddsig_data4 = get_option('ddsig_data4');
	$ddsig_data5 = get_option('ddsig_data5');
	$ddsig_data6 = get_option('ddsig_data6');
	$ddsig_data7 = get_option('ddsig_data7');
	$ddsig_sindex = get_option('ddsig_sindex');
	$ddsig_sposts = get_option('ddsig_sposts');
	$ddsig_spages = get_option('ddsig_spages');
	$ddsig_sarc = get_option('ddsig_sarc');
	$ddsig_ssearch = get_option('ddsig_ssearch');

	// Check page type

	$show_sig = FALSE;

	if (is_home() && $ddsig_sindex) {
		$show_sig = TRUE;
	}

	if (is_single() && $ddsig_sposts) {
		$show_sig = TRUE;
	}

	if (is_page() && $ddsig_spages) {
		$show_sig = TRUE;
	}
	
	if (is_archive() && $ddsig_sarc) {
		$show_sig = TRUE;
	}	

	if (is_search() && $ddsig_ssearch) {
		$show_sig = TRUE;
	}

	$found = strpos ($content, '<!-- ddsig -->');

	if ($found) {
		$show_sig = TRUE;
	}

	if ($show_sig) {

		// Get author information
		$a_login = get_the_author_login();		// %LOGIN%
		$a_first = get_the_author_firstname();	// %FIRST% 
		$a_last = get_the_author_lastname();	// %LAST%
		$a_nick = get_the_author_nickname(); 	// %NICK%
		$a_email = get_the_author_email(); 		// %EMAIL%
		$a_url = get_the_author_url();			// %URL%
		$a_desc = get_the_author_description();	// %DESC%
		$a_perm = get_permalink($post->ID);		// %PERMALINK%		

		// Process signature

		$the_sig = stripslashes(nl2br(ddsig_trim_sig($ddsig_data)));
		$the_sig = str_replace("%LOGIN%", $a_login, $the_sig);
		$the_sig = str_replace("%FIRST%", $a_first, $the_sig);
		$the_sig = str_replace("%LAST%", $a_last, $the_sig);
		$the_sig = str_replace("%NICK%", $a_nick, $the_sig);
		$the_sig = str_replace("%EMAIL%", $a_email, $the_sig);
		$the_sig = str_replace("%URL%", $a_url, $the_sig);
		$the_sig = str_replace("%DESC%", $a_desc, $the_sig);
		$the_sig = str_replace("%PERMALINK%", $a_perm, $the_sig);
		
		//$the_sig = '<div class="ddsig_wrap">' . $the_sig . '</div>';

		// Look for trigger

		if ($found_trigger) { 			// If trigger found, process
			$content = str_replace('<!-- ddsig -->', $the_sig, $content);
		} else {	
			$content .= $the_sig;
		}

	}


	$the_sig2 = stripslashes(nl2br(ddsig_trim_sig($ddsig_data2)));
	$the_sig2 = str_replace("%LOGIN%", $a_login, $the_sig2);
	$the_sig2 = str_replace("%FIRST%", $a_first, $the_sig2);
	$the_sig2 = str_replace("%LAST%", $a_last, $the_sig2);
	$the_sig2 = str_replace("%NICK%", $a_nick, $the_sig2);
	$the_sig2 = str_replace("%EMAIL%", $a_email, $the_sig2);
	$the_sig2 = str_replace("%URL%", $a_url, $the_sig2);
	$the_sig2 = str_replace("%DESC%", $a_desc, $the_sig2);
	$the_sig2 = str_replace("%PERMALINK%", $a_perm, $the_sig2);

	$the_sig3 = stripslashes(nl2br(ddsig_trim_sig($ddsig_data3)));
	$the_sig3 = str_replace("%LOGIN%", $a_login, $the_sig3);
	$the_sig3 = str_replace("%FIRST%", $a_first, $the_sig3);
	$the_sig3 = str_replace("%LAST%", $a_last, $the_sig3);
	$the_sig3 = str_replace("%NICK%", $a_nick, $the_sig3);
	$the_sig3 = str_replace("%EMAIL%", $a_email, $the_sig3);
	$the_sig3 = str_replace("%URL%", $a_url, $the_sig3);
	$the_sig3 = str_replace("%DESC%", $a_desc, $the_sig3);
	$the_sig3 = str_replace("%PERMALINK%", $a_perm, $the_sig3);

	$the_sig4 = stripslashes(nl2br(ddsig_trim_sig($ddsig_data4)));
	$the_sig4 = str_replace("%LOGIN%", $a_login, $the_sig4);
	$the_sig4 = str_replace("%FIRST%", $a_first, $the_sig4);
	$the_sig4 = str_replace("%LAST%", $a_last, $the_sig4);
	$the_sig4 = str_replace("%NICK%", $a_nick, $the_sig4);
	$the_sig4 = str_replace("%EMAIL%", $a_email, $the_sig4);
	$the_sig4 = str_replace("%URL%", $a_url, $the_sig4);
	$the_sig4 = str_replace("%DESC%", $a_desc, $the_sig4);
	$the_sig4 = str_replace("%PERMALINK%", $a_perm, $the_sig4);

	$the_sig5 = stripslashes(nl2br(ddsig_trim_sig($ddsig_data5)));
	$the_sig5 = str_replace("%LOGIN%", $a_login, $the_sig5);
	$the_sig5 = str_replace("%FIRST%", $a_first, $the_sig5);
	$the_sig5 = str_replace("%LAST%", $a_last, $the_sig5);
	$the_sig5 = str_replace("%NICK%", $a_nick, $the_sig5);
	$the_sig5 = str_replace("%EMAIL%", $a_email, $the_sig5);
	$the_sig5 = str_replace("%URL%", $a_url, $the_sig5);
	$the_sig5 = str_replace("%DESC%", $a_desc, $the_sig5);
	$the_sig5 = str_replace("%PERMALINK%", $a_perm, $the_sig5);

	$the_sig6 = stripslashes(nl2br(ddsig_trim_sig($ddsig_data6)));
	$the_sig6 = str_replace("%LOGIN%", $a_login, $the_sig6);
	$the_sig6 = str_replace("%FIRST%", $a_first, $the_sig6);
	$the_sig6 = str_replace("%LAST%", $a_last, $the_sig6);
	$the_sig6 = str_replace("%NICK%", $a_nick, $the_sig6);
	$the_sig6 = str_replace("%EMAIL%", $a_email, $the_sig6);
	$the_sig6 = str_replace("%URL%", $a_url, $the_sig6);
	$the_sig6 = str_replace("%DESC%", $a_desc, $the_sig6);
	$the_sig6 = str_replace("%PERMALINK%", $a_perm, $the_sig6);

	$the_sig7 = stripslashes(nl2br(ddsig_trim_sig($ddsig_data7)));
	$the_sig7 = str_replace("%LOGIN%", $a_login, $the_sig7);
	$the_sig7 = str_replace("%FIRST%", $a_first, $the_sig7);
	$the_sig7 = str_replace("%LAST%", $a_last, $the_sig7);
	$the_sig7 = str_replace("%NICK%", $a_nick, $the_sig7);
	$the_sig7 = str_replace("%EMAIL%", $a_email, $the_sig7);
	$the_sig7 = str_replace("%URL%", $a_url, $the_sig7);
	$the_sig7 = str_replace("%DESC%", $a_desc, $the_sig7);
	$the_sig7 = str_replace("%PERMALINK%", $a_perm, $the_sig7);
	
	$the_sig2 = '<div class="ddsig_wrap">' . $the_sig2 . '</div>';
	$the_sig3 = '<div class="ddsig_wrap">' . $the_sig3 . '</div>';
	$the_sig4 = '<div class="ddsig_wrap">' . $the_sig4 . '</div>';
	$the_sig5 = '<div class="ddsig_wrap">' . $the_sig5 . '</div>';
	$the_sig6 = '<div class="ddsig_wrap">' . $the_sig6 . '</div>';
	$the_sig7 = '<div class="ddsig_wrap">' . $the_sig7 . '</div>';


	$content = str_replace('<!-- ddsig2 -->', $the_sig2, $content);
	$content = str_replace('<!-- ddsig3 -->', $the_sig3, $content);
	$content = str_replace('<!-- ddsig4 -->', $the_sig4, $content);
	$content = str_replace('<!-- ddsig5 -->', $the_sig5, $content);
	$content = str_replace('<!-- ddsig6 -->', $the_sig6, $content);
	$content = str_replace('<!-- ddsig7 -->', $the_sig7, $content);


	return $content;

}


add_filter('the_content', 'ddsig_generate');
add_action('admin_menu', 'ddsig_add_option_pages');

?>