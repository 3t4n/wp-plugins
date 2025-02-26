<?php
/*
Plugin Name:  Author+ (Lite)
Plugin URI:   http://bloggingdojo.com/wordpress-plugins/author-plus
Description:  Add an "Extended Author Bio" to be displayed instead of the User Descriptions in multi-author-blog's Author Profiles.
Version:      1.9
Author:       Rhys Wynne
Author URI:   http://bloggingdojo.com/ */

add_action('show_user_profile', 'wp_authorplus_extraProfileFields');
add_action('edit_user_profile', 'wp_authorplus_extraProfileFields');
add_action('personal_options_update', 'wp_authorplus_saveExtraProfileFields');
add_action('edit_user_profile_update', 'wp_authorplus_saveExtraProfileFields');

function wp_authorplus_saveExtraProfileFields($userID) {

	if (current_user_can('contributor') || current_user_can('author') || current_user_can('editor') || current_user_can('administrator')) {

	$extendedauthorbio = str_replace("\n", "<br/>", $_POST['extendedauthorbio']);
	update_usermeta($userID, 'extendedauthorbio', $extendedauthorbio);
			
	} else {
	return false;			
	}
}

function wp_authorplus_extraProfileFields($user)
{
	if (current_user_can('contributor') || current_user_can('author') || current_user_can('editor') || current_user_can('administrator')) {

?>
<p align="center">    <a href="http://bloggingdojo.com/wordpress-plugins/author-plus-premium-wordpress-plugin/?utm_source=plugin&utm_medium=banner&utm_campaign=liteplugin"><img src="http://bloggingdojo.com/wp-content/uploads/2011/09/authorplus468.png" /></a></p>
	<h3>Author+ Information</h3>

	<table class='form-table'>
		<tr>
			<th><label for='extendedauthorbio'>Extended Author Bio</label></th>
			<td>
				<textarea name='extendedauthorbio' id='extendedauthorbio' style='height:200px;'><?php 
				$extendedauthorbio = str_replace("<br/>", "\n", get_the_author_meta('extendedauthorbio', $user->ID, true));
				echo $extendedauthorbio; ?></textarea>
				<br />
				<span class='description'>Please enter your extended author bio above. Used often on your Dedicated Author Page.</span>
			</td>
		</tr>
		
	</table>
<p align="center">    <a href="http://bloggingdojo.com/wordpress-plugins/author-plus-premium-wordpress-plugin/?utm_source=plugin&utm_medium=banner&utm_campaign=liteplugin"><img src="http://bloggingdojo.com/wp-content/uploads/2011/09/authorplus468.png" /></a></p>
<?php 
	} else { return false; }
} 

function wp_authorplus_extended_author_bio($userID)
{
	$authordata = get_userdata($userID);
	if ($authordata->extendedauthorbio != "")
	{
		echo $authordata->extendedauthorbio;
	} else {

		echo $authordata->user_description;
	
	}
}

function wp_authorplus_get_user_on_author_page()
{
	$author = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
	return $author;
}

?>
