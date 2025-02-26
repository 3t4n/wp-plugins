<?php
/*
Plugin Name: Author Bio
Plugin URI: http://www.geekyramblings.org/plugins/author-bio/
Description: Adds the post authors bio at the end of the post
Version: 0.12
Requires at least: 2.1
Tested up to: 3.1.0
Author: David Gibbs
Author URI: http://www.geekyramblings.org
*/

/*

    Copyright 2007-2011 by David Gibbs <david@midrange.com>

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

function has_gravatar($email) {
	// Craft a potential url and test its headers
	$hash = md5($email);
	$uri = 'http://www.gravatar.com/avatar/' . $hash . '?d=404';
	$headers = @get_headers($uri);
	if (!preg_match("|200|", $headers[0])) {
		$has_valid_avatar = FALSE;
	} else {
		$has_valid_avatar = TRUE;
	}
	return $has_valid_avatar;
}


function authorbio_content($content) {


	if (is_single() && authorbio_includeBio()) {

		$label = get_option('authorbio_label');

		require_once(ABSPATH . WPINC . '/author-template.php');

		$authorBio = get_the_author_description();
		$includeAuthorUrl = get_option('authorbio_link_author_name');
		$authorUrl = get_the_author_url();
		$includeGravatar = get_option('authorbio_gravatar');
		$authorEmail = get_the_author_email();

		if ($includeGravatar) {
			require_once(ABSPATH . WPINC . '/pluggable.php');
		}

		$bio  = "\n<!-- start author-bio -->\n";
		if ($authorBio && authorbio_category_satisfied()) {
			$bio .= "<table class='author_bio'>\n";
			$bio .= "<tr><td>\n";

			$bio .= "<span class='author_bio_title'>".$label." ";
			if ($includeAuthorUrl && $authorUrl) {
				$bio .= "<a href=\"$authorUrl\">";
			}

			$bio .= get_the_author_meta("display_name");

			if ($includeAuthorUrl && $authorUrl) {
				$bio .= "</a>";
			}

			$bio .= ':</span><br/>';
			if ($includeGravatar && $authorEmail && has_gravatar($authorEmail)) {
				$gravatarSize = get_option('authorbio_gravatar_size');
				$bio .= "\n<!-- gravatar for $authorEmail -->\n";
				$bio .= "<span class='author_bio_gravatar'>";
				$bio .= get_avatar($authorEmail, $gravatarSize);
				$bio .= "</span>\n";
			}
			$bio .= get_the_author_meta("description")."\n";
			$bio .= "<br clear=both/>\n";
			if (authorbio_includeMeta()) {
				$bio .= authorbio_getMetadataTable();
			}
			$bio .= "</td></tr>\n";
			$bio .= "</table>\n";
		} else {
			$bio .= "<!-- author bio is empty -->\n";
		}
		$bio .= "<!-- end author-bio -->\n";

		if (get_option('authorbio_position') == 'top') {
			$content = $bio.$content;
		} else {
			$content = $content.$bio;
		}
	}

	return $content;
}

function authorbio_category_satisfied() {

	$categoryList = get_option('authorbio_category_list');
	$categoryInclude = (get_option('authorbio_category_mode') == 'include');

	if ($categoryList) {
		$categories_to_consider = explode(',',get_option('authorbio_category_list'));
	} else {
		$categories_to_consider = array();
	}
	
	if (count($categories_to_consider) == 0) {
		$found = !$categoryInclude;
		// error_log("no categories to consider");
	} else {
		$found = false;

		foreach((get_the_category()) as $category) { 
			error_log("Considering $category->cat_name");
			if (in_array($category->cat_name,$categories_to_consider)) {
				$found = $categoryInclude;
				break;
			}
		}
	}
	
	return $found;
} 

function authorbio_getMetadataTable() {

	$website=get_the_author_meta('user_url');
	$jabberId=get_the_author_meta('jabber');
	$aimId=get_the_author_meta('aim');
	$yahooId=get_the_author_meta('yim');

	$infoBox='<table class="authorbio_infobox">'."\n";

	if ($website) {
		$infoBox .= '<tr><td>'.__('Website').":</td><td><a href='$website'>$website</a></td></tr>\n";
	}


	if ($jabberId) {
		$infoBox .= '<tr><td>'.__('Jabber').":</td><td><a href='xmpp:$jabberId'>$jabberId</td></tr>\n";
	}

	if ($aimId) {
		$infoBox .= '<tr><td>'.__('AIM').":</td><td><a href='aim:goim?$aimId'>$aimId</td></tr>\n";
	}

	if ($yahooId) {
		$infoBox .= '<tr><td>'.__('Yahoo').":</td><td><a href='ymsgr:sendim?$yahooId'>$yahooId</td></tr>\n";
	}

	$infoBox .= "</table>\n";

	return $infoBox;

}

function authorbio_includeMeta() {

	return	get_option('authorbio_include_website') ||
		get_option('authorbio_include_jabber') ||
		get_option('authorbio_include_aim') ||
		get_option('authorbio_include_yahoo');
}

function authorbio_includeBio() {

	global $page, $numpages;

	$includeOnAllPages = get_option('authorbio_allpages');

	if ($includeOnAllPages || ($page == $numpages)) {
		$result = true;
	} else {
		$result = false;
	}

	return $result;

}

function authorbio_header() {
?>

<script type='text/javascript'>

function authorbio_validateform() {

	var result = true;

	if (document.authorbio_form.authorbio_gravatar.checked) {
		if (document.authorbio_form.authorbio_gravatar_size.value < 32 ||
		    document.authorbio_form.authorbio_gravatar_size.value > 512) {
			alert("Gravatar size must be more than 32 px and less than 255 px");
			result = false;
		}
	}

	return result;
}

function authorbio_gravatar_toggled() {

	var size_input = document.getElementById("authorbio_gravatar_size_block");

	if (document.authorbio_form.authorbio_gravatar.checked) {
		size_input.style.display="block";
	} else {
		size_input.style.display="none";
	}

	return true;
}

function authorbio_numericonly(eventObj) {
    var keycode;
 
    if(eventObj.keyCode) //For IE
        keycode = eventObj.keyCode;
    else if(eventObj.Which)
        keycode = eventObj.Which;  // For FireFox
    else
        keycode = eventObj.charCode; // Other Browser

    if (keycode!=8) { //if the key is the backspace key
        if (keycode<48||keycode>57) //if not a number
            return false; // disable key press
        else
            return true; // enable key press
     }        
 }

</script>

<?php
}

function authorbio_options_menu() {

	authorbio_header();

        ?>
        <div class="wrap">
        <h2><?php _e('Author Bio Settings'); ?></h2>
        <form name="authorbio_form" method="post" action="options.php" onSubmit="return authorbio_validateform()">
        <?php wp_nonce_field('update-options'); ?>

<table class="form-table">
 <tr>
        <th scope="row" valign="top"><?php _e('Author Bio label'); ?>:</th>
        <td>
        <input id="authorbio_label" type="text" name="authorbio_label" value="<?php echo get_option('authorbio_label'); ?>" />
                <label for="authorbio_label"><?php _e('Text that will display in front of the authors first name');?></label>
        </td>
 </tr>
 <tr>
        <th scope="row" valign="top"><?php _e('Meta data to include'); ?>:</th>
        <td>
        <p><input id="authorbio_include_website" type="checkbox" name="authorbio_include_website" <?php echo get_option('authorbio_include_website')?'checked=checked':''; ?> /> <label for="authorbio_include_website"><?php _e('Website'); ?></label></p>
        <p><input id="authorbio_include_jabber" type="checkbox" name="authorbio_include_jabber" <?php echo get_option('authorbio_include_jabber')?'checked=checked':''; ?> /> <label for="authorbio_include_jabber"><?php _e('Jabber Id'); ?></label></p>
        <p><input id="authorbio_include_aim" type="checkbox" name="authorbio_include_aim" <?php echo get_option('authorbio_include_aim')?'checked=checked':''; ?> /> <label for="authorbio_include_aim"><?php _e('AIM Id'); ?></label></p>
        <p><input id="authorbio_include_yahoo" type="checkbox" name="authorbio_include_yahoo" <?php echo get_option('authorbio_include_yahoo')?'checked=checked':''; ?> /> <label for="authorbio_include_yahoo"><?php _e('Yahoo Id'); ?></label></p>
        </td>
 </tr>
 <tr>
        <th scope="row" valign="top"><?php _e('Include on all pages?'); ?></th>
        <td>
        <input id="authorbio_allpages" type="checkbox" name="authorbio_allpages" <?php echo get_option('authorbio_allpages')?'checked=checked':''; ?> />
                <label for="authorbio_allpages"><?php _e('If set, the author bio will be included on all pages of a multipage post.  If not set, the author bio will only appear on the last page of a multi-page post.'); ?></label>
        </td>
 </tr>
<tr>
        <th scope="row" valign="top"><?php _e('Category include/exclude'); ?>:</th>
        <td>
		<?php 
			$includeMode = (get_option('authorbio_category_mode') == 'include');
		?>
        <select id="authorbio_category_mode" name="authorbio_category_mode">
			<option value="include" <?php echo $includeMode?"selected":""; ?>>Include</option>
			<option value="exclude" <?php echo $includeMode?"":"selected"; ?>>Exclude</option>
		</select>
			
                <label for="authorbio_category_mode"><?php _e('Include or exclude the authors bio based from the categories listed below.  To have the author bio appear on all posts, set this mode to "Exclude" and leave the category list blank.'); ?></label>
        </td>
 </tr>
<tr>
        <th scope="row" valign="top"><?php _e('Categories'); ?>:</th>
        <td>
        <input id="authorbio_category_list" type="text" name="authorbio_category_list" size="40" value="<?php echo get_option('authorbio_category_list'); ?>" />
                <label for="authorbio_category_list"><?php _e('Categories to include or exclude the author bio from based on the above setting.'); ?></label>
        </td>
 </tr>
 <tr>
        <th scope="row" valign="top"><?php _e('Link authors name?'); ?></th>
        <td>
        <input id="authorbio_link_author_name" type="checkbox" name="authorbio_link_author_name" <?php echo get_option('authorbio_link_author_name')?'checked=checked':''; ?> />
                <label for="authorbio_link_author_name"><?php _e('If set, and the author has set a web page URL, the author\'s name will be hyperlinked to that page.'); ?></label>
        </td>
 </tr>
 <tr>
        <th scope="row" valign="top"><?php _e('Show authors Gravatar?'); ?></th>
        <td>
        <input id="authorbio_gravatar" 
		type="checkbox" name="authorbio_gravatar" 
		<?php echo get_option('authorbio_gravatar')?'checked=checked':''; ?> 
		onclick="return authorbio_gravatar_toggled();" />
                <label for="authorbio_gravatar"><?php _e('If set the authors gravatar will be displayed in the bio box.'); ?></label>
	<br/>
	<div id="authorbio_gravatar_size_block"
		style="display:<?php echo get_option('authorbio_gravatar')?'block':'none' ?>">
        <input  id="authorbio_gravatar_size" 
		type="text" 
		name="authorbio_gravatar_size" 
		value="<?php echo get_option('authorbio_gravatar_size') ?>"
		size="3" 
		onkeypress="return authorbio_numericonly(event)" />
                <label for="authorbio_gravatar_size"><?php _e('Size of the gravatar image.  The minimum is 32px and the maximum is 512 px.'); ?></label>
	</div>
        </td>
 </tr>
 <tr>
        <th scope="row" valign="top"><?php _e('Position:'); ?></th>
	<td>
        <label><input type="radio" name="authorbio_position" value='bottom' <?php echo (get_option('authorbio_position'))=='bottom'?'checked=checked':''; ?> /> Bottom of post</label><br/>
        <label><input type="radio" name="authorbio_position" value='top' <?php echo (get_option('authorbio_position')=='top')?'checked=checked':''; ?> /> Top of post</label>
        </td>
 </tr>
</table>
<p/>

        <p class="submit">
        <input type="submit" name="Submit" value="Save Changes" />
        </p>
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="authorbio_label,authorbio_allpages,authorbio_include_website,authorbio_include_jabber,authorbio_include_aim,authorbio_include_yahoo,authorbio_category_mode,authorbio_category_list,authorbio_link_author_name,authorbio_gravatar,authorbio_gravatar_size,authorbio_position"/>
        </form>
        </div>
        <?php

}

function authorbio_menu() {
	add_options_page('Author Bio', 'Author Bio', 8, __FILE__, 'authorbio_options_menu');
}	

function authorbio_deactivate() {
	// Clean up the options
	delete_option('authorbio_label');
	delete_option('authorbio_allpages');
	delete_option('authorbio_include_jabber');
	delete_option('authorbio_include_aim');
	delete_option('authorbio_include_yahoo');
	delete_option('authorbio_include_website');
	delete_option('authorbio_category_mode');
	delete_option('authorbio_category_list');
	delete_option('authorbio_link_author_name');
	delete_option('authorbio_gravatar');
}		
		
function authorbio_activate() {
	// Nothing yet
}

add_option('authorbio_label', 'About');
add_option('authorbio_allpages', true);
add_option('authorbio_include_jabber', false);
add_option('authorbio_include_aim', false);
add_option('authorbio_include_yahoo', false);
add_option('authorbio_include_website', false);
add_option('authorbio_category_mode', 'exclude');
add_option('authorbio_category_list', '');
add_option('authorbio_link_author_name', false);
add_option('authorbio_gravatar', false);
add_option('authorbio_gravatar_size', 32);
add_option('authorbio_position', 'bottom');
add_action('admin_menu', 'authorbio_menu');
add_filter('the_content', 'authorbio_content');
// add_filter('admin_head', 'authorbio_header');

?>
