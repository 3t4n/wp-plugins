<?php
/*

* Plugin Name: AMP Author Box

* Version: 1.0.4.1

* Plugin URI: https://jaaadesign.nl/en/blog/amp-social-share-plugin/

* Description: Extends the AMP plugin (Automattic) by adding a highly customizable author box to the content your website.

* Author: Nick van de Veerdonk

* Author URI: https://jaaadesign.nl/

*/

// create custom plugin settings menu

add_action('admin_menu', 'amp_author_box_menu');

function amp_author_box_menu()
{

	// create new top-level menu

	add_menu_page('AMP Author Box settings', 'AMP Author Box', 'administrator', __FILE__, 'amp_author_box_options_page', plugins_url('/images/icon.png', __FILE__) , 104);

	// call register settings function

	add_action('admin_init', 'register_amp_author_box_settings');
}

function register_amp_author_box_settings()
{

	// register our settings

	register_setting('amp_author_box_settings_group', 'author_box_check_amp');
	register_setting('amp_author_box_settings_group', 'author_box_check_reg');
	register_setting('amp_author_box_settings_group', 'author_box_soc_1_amp');
	register_setting('amp_author_box_settings_group', 'author_box_soc_2_amp');
	register_setting('amp_author_box_settings_group', 'author_box_soc_3_amp');
	register_setting('amp_author_box_settings_group', 'author_box_soc_4_amp');
	register_setting('amp_author_box_settings_group', 'author_box_soc_5_amp');
	register_setting('amp_author_box_settings_group', 'author_box_auth_url_amp');
	register_setting('amp_author_box_settings_group', 'author_box_user_email_amp');
	register_setting('amp_author_box_settings_group', 'checkbox_option_link_color_amp');
	register_setting('amp_author_box_settings_group', 'author_link_color_man_amp');
    register_setting('amp_author_box_settings_group', 'author_add_json_amp');
	
}

function amp_author_box_options_page()
{
?>


<div class="wrap">

<h1><span class="dashicons dashicons-admin-settings" style="font-size: 35px;

    color: #AC8F65;

    padding-right: 20px;"></span>AMP Author Box</h1>

<table width="100%">

<br /><br />
	<tbody><tr>
    	<td valign="top">
            <table class="wp-list-table widefat fixed ">
                <thead>
                    <tr>
                        <th>AMP Author Box settings</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <form method="post" action="options.php">



    <?php
	settings_fields('amp_author_box_settings_group'); ?>



    <?php
	do_settings_sections('amp_author_box_settings_group'); ?>

	

    <table class="form-table">

	 <br />	 
	 
		<blockquote class="mindyou">

<p style="    float: left;

    max-width: 678px;

    margin-top: -5px;">TIP! Drag the buttons into your bookmarks bar above, visit any page and click the bookmarklet to test it: results will open in a new window.</p>

<div class="buttcopy"><a href="javascript:void(window.open(%27https://developers.google.com/webmasters/structured-data/testing-tool/?url=%27+window.location.href,%27_blank%27));" title="Drag me!" target="_blank">Structured Data Testing</a></div><div class="buttcopy"><a href="javascript:void(window.open(%27https://validator.ampproject.org/#url=%27+window.location.href,%27_blank%27));" title="Drag me!" target="_blank">AMP validation</a></div>

</blockquote> 

	<br />

	<br />	 
	 
	 

<p>First checkbox renders the author box in AMP, all others add functionality that will appear in your <a style="text-decoration: underline;" href="/wp-admin/profile.php">profile page</a> to be edited, not checked = not rendered, enjoy!.</p>	

	 	<tr valign="top">
        <th scope="row">Add Author Box to AMP</th>
		<td><input name="author_box_check_amp" type="checkbox" value="1" <?php
	checked('1', get_option('author_box_check_amp')); ?> />
		<p>Renders author name, Gravatar, short description, JSON-LD and all checked settings below.</p></td>	       
		</tr> 	

<tr valign="top">
<th scope="row">Author social account 1</th>
<td><input name="author_box_soc_1_amp" type="checkbox" value="1" <?php
	checked('1', get_option('author_box_soc_1_amp')); ?> />
</td>	       
</tr> 			

<tr valign="top">
<th scope="row">Author Social account 2</th>
<td><input name="author_box_soc_2_amp" type="checkbox" value="1" <?php
	checked('1', get_option('author_box_soc_2_amp')); ?> />
</td>	       
</tr>

<tr valign="top">
<th scope="row">Author Social account 3</th>
<td><input name="author_box_soc_3_amp" type="checkbox" value="1" <?php
	checked('1', get_option('author_box_soc_3_amp')); ?> />
</td>	       
</tr>

<tr valign="top">
<th scope="row">Author Social account 4</th>
<td><input name="author_box_soc_4_amp" type="checkbox" value="1" <?php
	checked('1', get_option('author_box_soc_4_amp')); ?> />
</td>	       
</tr>

<tr valign="top">
<th scope="row">Add author website</th>
<td><input name="author_box_soc_5_amp" type="checkbox" value="1" <?php
	checked('1', get_option('author_box_soc_5_amp')); ?> />
</td>	       
</tr>
		
<tr valign="top">
<th scope="row">Author Wordpress profile</th>
<td><input name="author_box_auth_url_amp" type="checkbox" value="1" <?php
	checked('1', get_option('author_box_auth_url_amp')); ?> />
</td>	       
</tr> 
		
<tr valign="top">
<th scope="row">Email icon</th>
<td><input name="author_box_user_email_amp" type="checkbox" value="1" <?php
	checked('1', get_option('author_box_user_email_amp')); ?> />
<p>URL only, renders with clickable HTML symbol.</p></td>	       
		</tr> 

		

					 	<tr valign="top">
        <th scope="row">Custom link color?</th>
		<td><input name="checkbox_option_link_color_amp" type="checkbox" value="1" <?php
	checked('1', get_option('checkbox_option_link_color_amp')); ?> />
		<p>Allows you to set a custom color for author links in the field below.</p></td>	       
		</tr> 
		
		<tr valign="top">
        <th scope="row">Color:</th>
	  <td> <input type="text" name="author_link_color_man_amp" value="<?php
	echo esc_attr(get_option('author_link_color_man_amp')); ?>" />
  <p>Hex, Rgb or Hsl, more info <a href="http://www.w3schools.com/colors/colors_picker.asp" target="_blank" title="HTML Color Picker">here</a></p></td>
 		</tr>	
	
			<tr valign="top">
        <th scope="row">Add your own JSON-LD to AMP author [Person]</th>
		<td><input name="author_add_json_amp" type="checkbox" value="1" <?php
	checked('1', get_option('author_add_json_amp')); ?> />
		<p>Just for fun, creates 3 instances of Property - Value. For inspiration: <a href="http://schema.org/Person" target="_blank">schema.org/Person</a></p></td>	       
		</tr> 	
		
		
	 	
		
		
			<tr valign="top">
        <th scope="row">Add Author Box to non-AMP content?</th>
		<td><input name="author_box_check_reg" type="checkbox" value="1" <?php
	checked('1', get_option('author_box_check_reg')); ?> />
		<p>Awesome sauce!</p></td>	       
		</tr> 	
			
		   </table>
    <br />
  
    <?php
	submit_button(); ?>

</form>
                        <br />                        

                        <span style="font-size: 1.4rem;color: #ffe200;">★★★★★</span> If you like this plugin please consider <a href="https://jaaadesign.nl/en/blog/amp-author-box/"target="_blank">rating it</a>, thank you!
                        <br /><br />
                   	</td>
                           </tr>
                </tbody>
            </table>
            <br />
		</td>
        <td width="15">&nbsp;</td>

        <td width="250" valign="top">

		            <table class="wp-list-table widefat fixed bookmarks">
                <tbody>
                <tr>
                	<td style="padding:4px;">
						<a href="https://wordpress.org/plugins/amp-author-box/" title="Visit Wordpress plugin page" target="_blank">

						<img width="240" alt="AMP footer Widgets" style="margin-bottom: -4px;" src="<?php
	echo plugin_dir_url(__FILE__) . 'images/admin-logo.jpg'; ?>" class="aligncenter"></a>

                    </td>
                </tr>
                </tbody>
            </table>
            <br />
        	            <table class="wp-list-table widefat fixed bookmarks">
            	<thead>
                <tr>
					<th>Our other plugins</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                	<td> 

                    <ul class="uaf_list">

<li><a href="https://nl.wordpress.org/plugins/amp-social-share/" target="_blank">AMP Social Share</a></li>

                    	<li><a href="https://wordpress.org/plugins/amp-html-sitemap/" target="_blank">AMP HTML Sitemap</a></li>

                        <li><a href="https://wordpress.org/plugins/amp-recent-posts/" target="_blank">AMP Recent Posts</a></li>

                        <li><a href="https://wordpress.org/plugins/amp-related-posts/" target="_blank">AMP Related Posts</a></li>

                        <li><a href="https://wordpress.org/plugins/amp-recent-posts-widget/" target="_blank">AMP Recent Posts widget</a></li>

                    </ul>

                    </td>
                </tr>

                </tbody>

            </table>
            <br />
			<table class="wp-list-table widefat fixed bookmarks">

            	<thead>

                <tr>
					<th>Misc.</th>
                </tr>
                </thead>

                <tbody>

                <tr>

                	<td>
                    <ul class="uaf_list">

                    	<li><a href="https://jschema_jd_ampdesign.nl/en/blog/wpml-language-switcher-amp/" target="_blank">WPML language switcher in AMP</a></li>



                        <li><a href="https://jschema_jd_ampdesign.nl/en/blog/wordpress-amp/" target="_blank">WordPress AMP tutorial</a></li>

 <li><a href="https://jaaadesign.nl/en/blog/what-is-structured-data/" target="_blank">What is Structured Data?</a></li>

						 <li><a href="https://jschema_jd_ampdesign.nl/en/contact/" target="_blank">Contact Us</a></li>

                   </ul>
                    </td>
                </tr>
                </tbody>
            </table>
            <br />

</div>



<?php
}

function amp_author_box_title_jd()
{

	// Add new fields

	if (get_option('author_box_check_amp') == '1') echo '<th><span style="font-size: 1rem;">AMP Author Box settings</span></th>';
}

add_filter('user_contactmethods', 'amp_author_box_title_jd', 98);

function amp_author_box_jd($profile_fields)
{

	// Add new fields

	if (get_option('author_box_check_amp') == '1' && get_option('author_box_soc_1_amp') == '1')
	{
		$profile_fields['acc_1_amp_jd'] = '&#128241 Social URL #1';
		$profile_fields['acc_1_amp_jd_title'] = '&#128241  Social name #1';
	}

	if (get_option('author_box_check_amp') == '1' && get_option('author_box_soc_2_amp') == '1')
	{
		$profile_fields['acc_2_amp_jd'] = '&#128241 Social URL #2';
		$profile_fields['acc_2_amp_jd_title'] = '&#128241  Social name #2';
	}

	if (get_option('author_box_check_amp') == '1' && get_option('author_box_soc_3_amp') == '1')
	{
		$profile_fields['acc_3_amp_jd'] = '&#128241 Social URL #3';
		$profile_fields['acc_3_amp_jd_title'] = '&#128241  Social name #3';
	}

	if (get_option('author_box_check_amp') == '1' && get_option('author_box_soc_4_amp') == '1')
	{
		$profile_fields['acc_4_amp_jd'] = '&#128241 Social URL #4';
		$profile_fields['acc_4_amp_jd_title'] = '&#128241 Social name #4';
	}

	if (get_option('author_box_check_amp') == '1' && get_option('author_box_soc_5_amp') == '1')
	{
		$profile_fields['acc_5_amp_jd'] = '&#128241 Website URL';
		$profile_fields['acc_5_amp_jd_title'] = '&#128241 Website text';
	}

	if (get_option('author_box_check_amp') == '1' && get_option('author_box_auth_url_amp') == '1')
	{
		$profile_fields['author_box_url_amp_jd'] = '&#128241 Wordpress profile';
		$profile_fields['author_box_url_jd_title'] = '&#128241 Wordpress profile text';
	}
	
	if (get_option('author_box_check_amp') == '1' && get_option('author_add_json_amp') == '1')
	{
		$profile_fields['profile_add_json_amp_1'] = '&#128241 JSON-LD<br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Use: Property - Value,<br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;no apostrophes';
		$profile_fields['profile_add_json_amp_2'] = '';
		$profile_fields['profile_add_json_amp_3'] = '';
		$profile_fields['profile_add_json_amp_4'] = '';
		$profile_fields['profile_add_json_amp_5'] = '';
		$profile_fields['profile_add_json_amp_6'] = '';
	}

	return $profile_fields;
}

add_filter('user_contactmethods', 'amp_author_box_jd', 99);





function jd_author_box_amp($content)
{
	
		global $post;
//if (function_exists('is_amp_endpoint') && is_amp_endpoint() && get_option('author_box_check_amp') == '1')
//	{
		// Detect if it is a single post with a post author

		if (is_single() && isset($post->post_author))
		{
			if (function_exists('is_amp_endpoint') && is_amp_endpoint() && get_option('author_box_check_amp') == '1') 
			{

			// Get author's display name

			$display_name = get_the_author_meta('display_name', $post->post_author);

			// If display name is not available then use nickname as display name

			if (empty($display_name)) $display_name = get_the_author_meta('nickname', $post->post_author);

			// Get author's biographical information or description

			$user_description = get_the_author_meta('user_description', $post->post_author);

			// Get author's website URL
			// $user_website = get_the_author_meta('url', $post->post_author);
			// Get link to the author archive page

			$user_posts = get_author_posts_url(get_the_author_meta('ID', $post->post_author));

			// AMP Author Box fields

			$socone = get_the_author_meta('acc_1_amp_jd', $post->post_author);
			$soctwo = get_the_author_meta('acc_2_amp_jd', $post->post_author);
			$socthree = get_the_author_meta('acc_3_amp_jd', $post->post_author);
			$socfour = get_the_author_meta('acc_4_amp_jd', $post->post_author);
			$socfive = get_the_author_meta('acc_5_amp_jd', $post->post_author);
			$auturl = get_the_author_meta('author_box_url_amp_jd', $post->post_author);

			// $user_email = get_the_author_meta('user_email', $post->post_author);)

			$titone = get_the_author_meta('acc_1_amp_jd_title', $post->post_author);
			$tittwo = get_the_author_meta('acc_2_amp_jd_title', $post->post_author);
			$titthree = get_the_author_meta('acc_3_amp_jd_title', $post->post_author);
			$titfour = get_the_author_meta('acc_4_amp_jd_title', $post->post_author);
			$titfive = get_the_author_meta('acc_5_amp_jd_title', $post->post_author);
			$titauturl = get_the_author_meta('author_box_url_jd_title', $post->post_author);
			
			
			if (!empty($display_name)) $author_details = '<div class="author_name"><p>About <a href="' . $user_posts . '" target="_blank" rel="nofollow">' . $display_name . '</a></p></div>';

			// Author avatar and bio

			$auth_email = get_the_author_meta('user_email', $post->post_author);
			$author_details.= '<div class="author_details"><span class="avatr"><amp-img src="' . get_avatar_url($auth_email) . '" alt="" width="60" height="60" /></amp-img></span><div class="justdesc"><p>' . nl2br($user_description) . '</p></div></div>';
			$author_details.= '<div class="author_links">';

			// Check if author has a website in their profile

			if (!empty($socone) && get_option('author_box_soc_1_amp') == '1')
			{
				$author_details.= '<a href="' . $socone . '" target="_blank" rel="nofollow">' . $titone . '</a> ';
			}

			if (!empty($soctwo) && get_option('author_box_soc_2_amp') == '1')
			{
				$author_details.= '<a href="' . $soctwo . '" target="_blank" rel="nofollow">' . $tittwo . '</a> ';
			}

			if (!empty($socthree) && get_option('author_box_soc_3_amp') == '1')
			{
				$author_details.= '<a href="' . $socthree . '" target="_blank" rel="nofollow">' . $titthree . '</a> ';
			}

			if (!empty($socfour) && get_option('author_box_soc_4_amp') == '1')
			{
				$author_details.= '<a href="' . $socfour . '" target="_blank" rel="nofollow">' . $titfour . '</a> ';
			}

			if (!empty($socfive) && get_option('author_box_soc_5_amp') == '1')
			{
				$author_details.= '<a href="' . $socfive . '" target="_blank" rel="nofollow">' . $titfive . '</a> ';
			}

			if (!empty($auturl) && get_option('author_box_auth_url_amp') == '1')
			{
				$author_details.= '<a href="' . $auturl . '" target="_blank" rel="nofollow">' . $titauturl . '</span></a> ';
			}

			if (get_option('author_box_user_email_amp') == '1') $author_details.= '<a href="mailto:' . $auth_email . '"><span class="htmlimg">&#9993;</span></a> ';
			
			
			
			
			
			
			
			
			

			// if there is no author website then just close the paragraph

			$author_details.= '</div>';

			// Pass all this info to post content

			$content = $content . '<div class="jd-css-plugins-aab"><div class="author_bio_section">' . $author_details . '</div></div>';
		}

		return $content;
	}
	else
	{
		$ccontent = $content;
	}

	return $ccontent;
}






// Add our function to the post content filter

add_action('the_content', 'jd_author_box_amp', 5, 99);

// Allow HTML in author bio section

remove_filter('pre_user_description', 'wp_filter_kses');

// Add extensive author meta JSON-LD

add_filter('amp_post_template_metadata', 'amp_author_box_json_ld', 10, 2);

function amp_author_box_json_ld($metadata, $post)
{

	$socone = isset( $_GET['socone'] )? $_GET['socone']: false;
	$soctwo = isset( $_GET['soctwo'] )? $_GET['soctwo']: false;
	$socthree = isset( $_GET['socthree'] )? $_GET['socthree']: false;
	$socfour = isset( $_GET['socfour'] )? $_GET['socfour']: false;
	$socfive = isset( $_GET['socfive'] )? $_GET['socfive']: false;
	$auturl = isset( $_GET['auturl'] )? $_GET['auturl']: false;
	$auth_email = isset( $_GET['auth_email'] )? $_GET['auth_email']: false;
	$author_details = isset( $_GET['author_details'] )? $_GET['author_details']: false;
	$jsonparty1 = isset( $_GET['jsonparty1'] )? $_GET['jsonparty1']: false;
	$jsonparty2 = isset( $_GET['jsonparty2'] )? $_GET['jsonparty2']: false;
	$jsonparty3 = isset( $_GET['jsonparty3'] )? $_GET['jsonparty3']: false;
	$jsonparty4 = isset( $_GET['jsonparty4'] )? $_GET['jsonparty4']: false;
	$jsonparty5 = isset( $_GET['jsonparty5'] )? $_GET['jsonparty5']: false;
	$jsonparty6 = isset( $_GET['jsonparty6'] )? $_GET['jsonparty6']: false;		
		
		
		
	// AMP Author Box fields
	// Get author's display name

	$display_name = get_the_author_meta('display_name', $post->post_author);

	// If display name is not available then use nickname as display name

	if (empty($display_name)) $display_name = get_the_author_meta('nickname', $post->post_author);
	if (get_option('author_box_soc_1_amp') == '1') 
		$socone = get_the_author_meta('acc_1_amp_jd', $post->post_author);
	
	$author_details = get_the_author_meta('user_description', $post->post_author);
	$html = $author_details;
	$author_details = strip_tags($html);

	if (get_option('author_box_soc_2_amp') == '1') 
		$soctwo = get_the_author_meta('acc_2_amp_jd', $post->post_author);
	if (get_option('author_box_soc_3_amp') == '1') 
		$socthree = get_the_author_meta('acc_3_amp_jd', $post->post_author);
	if (get_option('author_box_soc_4_amp') == '1') 
		$socfour = get_the_author_meta('acc_4_amp_jd', $post->post_author);
	if (get_option('author_box_soc_5_amp') == '1') 
		$socfive = get_the_author_meta('acc_5_amp_jd', $post->post_author);
	if (get_option('author_box_auth_url_amp') == '1') 
		$auturl = get_the_author_meta('author_box_url_amp_jd', $post->post_author);
	if (get_option('author_box_user_email_amp') == '1') 
		$auth_email = get_the_author_meta('user_email', $post->post_author);
	  if (get_option('author_add_json_amp') == '1' && !empty(get_the_author_meta('profile_add_json_amp_1', $post->post_author) ) && !empty(get_the_author_meta('profile_add_json_amp_2', $post->post_author))) {
	  $jsonparty1 = get_the_author_meta('profile_add_json_amp_1', $post->post_author);
	  $jsonparty2 = get_the_author_meta('profile_add_json_amp_2', $post->post_author);
	  }
	  if (get_option('author_add_json_amp') == '1' && !empty(get_the_author_meta('profile_add_json_amp_3', $post->post_author) ) && !empty(get_the_author_meta('profile_add_json_amp_4', $post->post_author))) {
	  $jsonparty3 = get_the_author_meta('profile_add_json_amp_3', $post->post_author);
	  $jsonparty4 = get_the_author_meta('profile_add_json_amp_4', $post->post_author);
	  }
						
		if (get_option('author_add_json_amp') == '1' && !empty(get_the_author_meta('profile_add_json_amp_5', $post->post_author) ) && !empty(get_the_author_meta('profile_add_json_amp_6', $post->post_author))) {
	  $jsonparty5 = get_the_author_meta('profile_add_json_amp_5', $post->post_author);
	  $jsonparty6 = get_the_author_meta('profile_add_json_amp_6', $post->post_author);
	 
		 }
	
	if (function_exists('is_amp_endpoint') && get_option('author_box_check_amp') == '1') {

	

	
	
	$metadata['author'] = array(
		'@type' => 'Person',
		'name' => "$display_name",
		'sameAs' => ["$socone",
		"$soctwo",
		"$socthree",
		"$socfour",
		"$auturl"],
		'url' => "$socfive",
		'email' => "$auth_email",
		'description' => "$author_details",
		"$jsonparty1" => "$jsonparty2",
		"$jsonparty3" => "$jsonparty4",
		"$jsonparty5" => "$jsonparty6",
 
 
	);
	}
	return $metadata;
}

// *  AMP Plugin extra styles: AMP content

add_action('amp_post_template_css', 'jd_css_plugins_aab');

function jd_css_plugins_aab($amp_template)
{
	if (function_exists('is_amp_endpoint'))

	// only CSS here please...

?>

div.jd-css-plugins-aab {
	    margin: 30px 0px;
}
.author_bio_section{

padding: 15px;
    background: none repeat scroll 0 0 rgba(248, 248, 248, 0.5);
     border: 1px solid #ececec;
}

.author_name{
font-size:16px;
font-weight: bold;
}
div.author_name a,
div.justdesc a,
div.author_links a
{ text-decoration: none;
    padding: 0 5px 0 5px;  }
.author_details img {
border: 1px solid #D8D8D8;
border-radius: 50%;
float: left;
    padding: 0 5px 0 5px;
}
 span.avatr {
    float: left;
	margin: 0 10px 10px 0;
}
div.author_links { text-align: right }
div.justdesc {
    line-height: 1.4rem;
    font-size: 90%;
  
}
.htmlimg {
    display: inline-block;
    font-size: 2rem;
    vertical-align: bottom;
    color: #5A5A5A;
}
	<?php
}

add_action('admin_head', 'jd_author_box_admin_css', 998);

// *  AMP Plugin prio styles

add_action('amp_post_template_css', 'jd_css_plugins_prio_aab', 999);

function jd_css_plugins_prio_aab($amp_template)
{
	if (function_exists('is_amp_endpoint') && get_option('checkbox_option_link_color_amp') == '1')
	{

		// only CSS here please...

?>

 
div.author_name a, div.justdesc a, div.author_links a,
div.author_name a:hover, div.justdesc a:hover, div.author_links a:hover  {

	 color: <?php
		echo esc_attr(get_option('author_link_color_man_amp')); ?>;
}

<?php
	}
}

function jd_author_box_admin_css()
{
	echo '<style>

blockquote.mindyou {
    margin-left: 20px;
    border-left: 4px solid rgba(27, 128, 0, 0.67);
    padding-left: 13px;
}
div.buttholder {
    width: 100%;
    marging: auto;
}
div.buttcopy a { color: #fff }
div.buttcopy {
    display: inline-block;
    text-decoration: none;
    font-size: 13px;
    line-height: 26px;
    height: 28px;
    margin: 0;
    padding: 0 10px 1px;
    margin: 0px 0px 0px 28px;
    cursor: pointer;
    border-width: 1px;
    border-style: solid;
    -webkit-appearance: none;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    white-space: nowrap;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    background: #0085ba;
    border-color: #0073aa #006799 #006799;
    -webkit-box-shadow: 0 1px 0 #006799;
    box-shadow: 0 1px 0 #006799;
    color: #fff;
    text-decoration: none;
    text-shadow: 0 -1px 1px #006799,1px 0 1px #006799,0 1px 1px #006799,-1px 0 1px #006799;
}
div.buttcopy:hover {
    background: #008ec2;
    border-color: #006799;
    color: #fff;
}
.extendd {
    vertical-align: baseline;
    line-height: 1.6rem;
}
.extendd input[type=checkbox] {
    position: absolute;
    top: -9999px;
    left: -9999px;
}
/* Default State */
div.tton,
div.tttw,
div.ttth {
    opacity: 0;
    max-height: 0;
    overflow: hidden;
    background: rgba(239, 239, 239, 0.36);
    margin-top: 15px;
    transform: scale(0.8);
    transition: 0.5s;
}
/* Toggled State */
.extendd input[type=checkbox]:checked ~ div.tton,
.extendd input[type=checkbox]:checked ~ div.tttw,
.extendd input[type=checkbox]:checked ~ div.ttth {
    display: block;
    transform: scale(1);
    opacity: 1;
    max-height: 400px;
    overflow: visible;
    padding: 10px 15px 15px 15px;
}
.extendd label {
    cursor: pointer;
    padding-left: 5px;
    color: green;
    font-style: italic;
}

@media only screen and (min-width: 767px) {

 input#profile_add_json_amp_1.regular-text,
input#profile_add_json_amp_3.regular-text,
input#profile_add_json_amp_5.regular-text {
    width: 170px;
}

input#profile_add_json_amp_2.regular-text,
input#profile_add_json_amp_4.regular-text,
input#profile_add_json_amp_6.regular-text
 {
    width: 170px;
    margin-left: 181px;
    float: left;
      margin-top: -63px;
}


  tr.user-profile_add_json_amp_1-wrap,
tr.user-profile_add_json_amp_3-wrap,
tr.user-profile_add_json_amp_5-wrap{

} 
tr.user-profile_add_json_amp_1-wrap th label {
 
}
tr.user-profile_add_json_amp_1-wrap th label:after {
    content: "follows";
    position: absolute;
    width: 100%;
	MAX-WIDTH: 600PX;
    margin-left: 106px;
    margin-top: -12px;
    font-weight: normal;
    font-style: italic;
    color: #999;
}
tr.user-profile_add_json_amp_1-wrap th label:before {
    content: "https://www.facebook.com/matt.mullenweg/";
    position: absolute;
    width: 100%;
	MAX-WIDTH: 600PX;
    margin-left: 404px;
    margin-top: 28px;
    font-weight: normal;
    font-style: italic;
    color: #999;
}


  tr.user-profile_add_json_amp_1-wrap td {
margin-top: 2px;
    display: block;
}
tr.user-profile_add_json_amp_3-wrap td
{
    margin-top: -69px;
	display: inline-block;
}
tr.user-profile_add_json_amp_5-wrap td {
    display: inline-block;
    margin-top: -70px;
}
  tr.user-profile_add_json_amp_2-wrap td,
tr.user-profile_add_json_amp_4-wrap td,
tr.user-profile_add_json_amp_6-wrap td
 {
margin-top: -34px;
    display: block;
}
} 
  </style>';
}

// *  -------------------------------------------------------------------

function jd_author_box_regular($content)
{
	
		global $post;

		// Detect if it is a single post with a post author

		if (is_single() && isset($post->post_author))
		{
if (function_exists('is_amp_endpoint') && !is_amp_endpoint() && !is_page() && is_single() && get_option('author_box_check_reg') == '1')
		{
			// Get author's display name

			$display_name = get_the_author_meta('display_name', $post->post_author);

			// If display name is not available then use nickname as display name

			if (empty($display_name)) $display_name = get_the_author_meta('nickname', $post->post_author);

			// Get author's biographical information or description

			$user_description = get_the_author_meta('user_description', $post->post_author);

			// Get author's website URL
			// $user_website = get_the_author_meta('url', $post->post_author);
			// Get link to the author archive page

			$user_posts = get_author_posts_url(get_the_author_meta('ID', $post->post_author));

			// AMP Author Box fields

			$socone = get_the_author_meta('acc_1_amp_jd', $post->post_author);
			$soctwo = get_the_author_meta('acc_2_amp_jd', $post->post_author);
			$socthree = get_the_author_meta('acc_3_amp_jd', $post->post_author);
			$socfour = get_the_author_meta('acc_4_amp_jd', $post->post_author);
			$socfive = get_the_author_meta('acc_5_amp_jd', $post->post_author);
			$auturl = get_the_author_meta('author_box_url_amp_jd', $post->post_author);
			$titone = get_the_author_meta('acc_1_amp_jd_title', $post->post_author);
			$tittwo = get_the_author_meta('acc_2_amp_jd_title', $post->post_author);
			$titthree = get_the_author_meta('acc_3_amp_jd_title', $post->post_author);
			$titfour = get_the_author_meta('acc_4_amp_jd_title', $post->post_author);
			$titfive = get_the_author_meta('acc_5_amp_jd_title', $post->post_author);
			$titauturl = get_the_author_meta('author_box_url_jd_title', $post->post_author);
			if (!empty($display_name)) $author_details = '<div class="author_name"><h4>About <a href="' . $user_posts . '" target="_blank" rel="nofollow"><span itemprop="name">' . $display_name . '</span></a></h4></div>';

			// Author avatar and bio

			$auth_email = get_the_author_meta('user_email', $post->post_author);
			$author_details.= '<div class="author_details"><span class="avatr"><img src="' . get_avatar_url($auth_email) . '" alt="" width="80" height="80" /></span><div class="justdesc" itemprop="description"><p>' . nl2br($user_description) . '</p></div></div>';
			$author_details.= '<div class="author_links">';

		if (!empty($socfive) && get_option('author_box_soc_5_amp') == '1')
			{
				$author_details.= '<a itemprop="url" href="' . $socfive . '" target="_blank" rel="nofollow">' . $titfive . '</a> ';
			}

			if (!empty($socone) && get_option('author_box_soc_1_amp') == '1')
			{
				$author_details.= '<a itemprop="sameAs" href="' . $socone . '" target="_blank" rel="nofollow">' . $titone . '</a> ';
			}

			if (!empty($soctwo) && get_option('author_box_soc_2_amp') == '1')
			{
				$author_details.= '<a itemprop="sameAs" href="' . $soctwo . '" target="_blank" rel="nofollow">' . $tittwo . '</a> ';
			}

			if (!empty($socthree) && get_option('author_box_soc_3_amp') == '1')
			{
				$author_details.= '<a itemprop="sameAs" href="' . $socthree . '" target="_blank" rel="nofollow">' . $titthree . '</a> ';
			}

			if (!empty($socfour) && get_option('author_box_soc_4_amp') == '1')
			{
				$author_details.= '<a itemprop="sameAs" href="' . $socfour . '" target="_blank" rel="nofollow">' . $titfour . '</a> ';
			}

			
			if (!empty($auturl) && get_option('author_box_auth_url_amp') == '1')
			{
				$author_details.= '<a itemprop="sameAs" href="' . $auturl . '" target="_blank" rel="nofollow"><span>' . $titauturl . '</span></a> ';
			}

			if (get_option('author_box_user_email_amp') == '1') $author_details.= '<a itemprop="email" href="mailto:' . $auth_email . '"><span class="htmlimg">&#9993;</span></a> ';

			// if there is no author website then just close the paragraph

			$author_details.= '</div>';

			// Pass all this info to post content

			$content = $content . '<div class="jd-css-plugins-aab"><div class="author_bio_section" itemprop="author" itemscope itemtype="http://schema.org/Person">' . $author_details . '</div></div>';
		}

		return $content;
	}
	else
	{
		$ccontent = $content;
	}

	return $ccontent;
}

// Add our function to the post content filter

add_action('the_content', 'jd_author_box_regular');

// *  AMP Plugin extra styles : regular content

add_action('wp_head', 'jd_css_plugins_aab_reg');

function jd_css_plugins_aab_reg()
{
	if (get_option('author_box_check_reg') == '1') echo '<style>

.author_bio_section{

padding: 15px;
    background: none repeat scroll 0 0 rgba(248, 248, 248, 0.5);
     border: 1px solid #ececec;
}

.author_name{
font-size:16px;
font-weight: bold;
}
div.author_name a,
div.justdesc a,
div.author_links a
{ text-decoration: none;
    padding: 0 5px 0 5px; }
.author_details img {
border: 1px solid #D8D8D8;
border-radius: 50%;
float: left;

}
 span.avatr {
    float: left;
	margin: 0 10px 10px 0;
}
div.author_links { text-align: right }
.htmlimg {
    display: inline-block;
    font-size: 2rem;
    vertical-align: bottom;
    color: #5A5A5A;
    margin-bottom: -4px;
}
</style>';
}

// *  AMP Plugin prio styles regular content

add_action('wp_head', 'jd_css_plugins_prio_aab_reg', 999);

function jd_css_plugins_prio_aab_reg()
{
	if (get_option('author_box_check_reg') == '1' && get_option('checkbox_option_link_color_amp') == '1') {

	// only CSS here please...

?>

 <style>
div.author_name a, div.author_name h4 a, div.justdesc a, div.author_links a,
div.author_name a:hover, div.justdesc a:hover, div.author_links a:hover  {

	 color: <?php
	echo esc_attr(get_option('author_link_color_man_amp')); ?>!important;
}
 </style>
<?php
}
}