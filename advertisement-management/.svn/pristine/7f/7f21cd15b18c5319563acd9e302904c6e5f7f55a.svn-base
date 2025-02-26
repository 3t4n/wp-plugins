<?php 
/* 
Plugin Name: Advertisement Management
Version: 1.0
Description: With Advertisement Management you can control all your blogadvertisements from one single location in the blog backend.
Author: Atle Seppola Grimseid
Plugin URI: http://41016996.com/advertisement-management-plugin-for-wordpress/
Author URI: http://41016996.com/
*/ 

/*  This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

add_action('admin_menu', 'admanagement');
function admanagement()
{
		add_submenu_page('options-general.php', 'Advertisement Management', 'Advertisement Management', 10, 'Advertising_page', 'advertising_pages');
}
function advertising_pages()
{
	global $wpdb, $wp_roles, $current_user;

	echo '<div class="wrap">';
	switch( $_GET[ 'action' ] ) {
		//---------------------------------------------------//
		default:
		?>
<h2>Advertisement Magament - Below you can type in your adcodes.</h2> 
<div id="message" class="updated fade" style="background-color: rgb(255, 251, 204);">
<p>Below you can type in your adcodes. Read the description next to the boxes for information on where the ads actually appear in your blog.</p>
</div>
<form method="post" action="options-general.php?page=Advertising_page&action=update">
	<table class="form-table">
	<tr valign="top">
	<th scope="row"><u>1 - Below post-titles frontpage</u><br />This ad will apear below all the post-titles on your blog frontpage.</th>
	<td>
	<textarea name="Advertising_front_page" type="text" rows="5" wrap="soft" id="Advertising_front_page" style="width: 95%; background:#EAF5FE;"/><?php echo stripslashes( get_site_option('Advertising_front_page') ); ?></textarea>
	</td>
	</tr>
	<tr valign="top">
	<th scope="row"><u>2 - Below title inside post</u><br />When a post is open this will appear just below the post title.</th>
	<td>
	<textarea name="Advertising_single_top" type="text" rows="5" wrap="soft" id="Advertising_single_top" style="width: 95%; background:#EAF5FE;"/><?php echo stripslashes( get_site_option('Advertising_single_top') ); ?></textarea>
	</td>
	</tr>
	<tr valign="top">
	<th scope="row"><u>3 - Below post when open</u><br />When a post is open this will show just below the post and before the commentbox.</th>
	<td>
	<textarea name="Advertising_single_bottom" type="text" rows="5" wrap="soft" id="Advertising_single_bottom" style="width: 95%; background:#EAF5FE;"/><?php echo stripslashes( get_site_option('Advertising_single_bottom') ); ?></textarea>
	</td>
	</tr>
	<tr valign="top">
	<th scope="row"><u>4 - Below page title</u><br />This one will appear just below the title inside every pages of your blog.</th>
	<td>
	<textarea name="Advertising_page_top" type="text" rows="5" wrap="soft" id="Advertising_page_top" style="width: 95%; background:#EAF5FE;"/><?php echo stripslashes( get_site_option('Advertising_page_top') ); ?></textarea>
	</td>
	</tr>
	<tr valign="top">
	<th scope="row"><u>5 - Below page content</u><br />This one will appear just below the content in a page if the page is open.</th>
	<td>
	<textarea name="Advertising_page_bottom" type="text" rows="5" wrap="soft" id="Advertising_page_bottom" style="width: 95%; background:#EAF5FE;"/><?php echo stripslashes( get_site_option('Advertising_page_bottom') ); ?></textarea>
	</td>
	</tr>
	<tr valign="top">
	<th scope="row"><u>6 - Below commentboxes</u><br />This advertisement will show up just below the box where your readers type in comments.</th>
	<td>
	<textarea name="Advertising_below_commentbox" type="text" rows="5" wrap="soft" id="Advertising_below_commentbox" style="width: 95%; background:#EAF5FE;"/><?php echo stripslashes( get_site_option('Advertising_below_commentbox') ); ?></textarea>
	</td>
	</tr>
	<tr valign="top">
	<th scope="row"><u>7 - Above header</u><br />This advertisement show up before everyting else on the blog. Above the header.</th>
	<td>
	<textarea name="Advertising_blog_top" type="text" rows="5" wrap="soft" id="Advertising_blog_top" style="width: 95%; background:#EAF5FE;"/><?php echo stripslashes( get_site_option('Advertising_blog_top') ); ?></textarea>
	</td>
	</tr>
	<tr valign="top">
	<th scope="row"><u>8 - Below footer</u><br />This one appears just below the blog footer.</th>
	<td>
	<textarea name="Advertising_below_footer" type="text" rows="5" wrap="soft" id="Advertising_below_footer" style="width: 95%; background:#EAF5FE;"/><?php echo stripslashes( get_site_option('Advertising_below_footer') ); ?></textarea>
	</td>
	</tr>
	</table>
	<p class="submit"><input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" /></p> 
</form>

<h2>I like money</h2> 
<div id="message" class="updated fade" style="background-color: rgb(255, 251, 204);">
<p>
If you like the Advertisement Management plugin, please concider donate some cash to me. Maybe it will make me create even more cool plugins. Click the button below to give a donation. In advance, thanks a lot to everyone giving something back for Advertisement Management.
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIHLwYJKoZIhvcNAQcEoIIHIDCCBxwCAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYCGFuxtMkYi677Fn87VgtoZaDIDkmekn+3VBGqCOf8yUilWhgLPoGVv0eP3EI3qZTMknnVCzv9+qZJ42AtqIQ810Wud2wWs5eb0DV8W5RgnczeJ9WpDyOsIocT0Y6aPXiFqeV3VcLpOmk/4EzFeX6UaSCahVemuIF+Y6eYl2wkALzELMAkGBSsOAwIaBQAwgawGCSqGSIb3DQEHATAUBggqhkiG9w0DBwQIIXkSQisHo/mAgYjw/cSSCn8rWWnB1MVX1Ictytcq0ZS8QqYtaXvZ2ZlM9OIv+WULA46bkpAnCFtA98NVE6MARKxghCbsG0MU5hXPO80fom5lSSQgey6c2NBxfhGwVb3fI/wewK77Qn7GlKCfMyLTv5l5DwqTpO6SiYsYl9oBcOG/3D6hLpy8+OIVUCXYbeZCPagzoIIDhzCCA4MwggLsoAMCAQICAQAwDQYJKoZIhvcNAQEFBQAwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tMB4XDTA0MDIxMzEwMTMxNVoXDTM1MDIxMzEwMTMxNVowgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDBR07d/ETMS1ycjtkpkvjXZe9k+6CieLuLsPumsJ7QC1odNz3sJiCbs2wC0nLE0uLGaEtXynIgRqIddYCHx88pb5HTXv4SZeuv0Rqq4+axW9PLAAATU8w04qqjaSXgbGLP3NmohqM6bV9kZZwZLR/klDaQGo1u9uDb9lr4Yn+rBQIDAQABo4HuMIHrMB0GA1UdDgQWBBSWn3y7xm8XvVk/UtcKG+wQ1mSUazCBuwYDVR0jBIGzMIGwgBSWn3y7xm8XvVk/UtcKG+wQ1mSUa6GBlKSBkTCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb22CAQAwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQUFAAOBgQCBXzpWmoBa5e9fo6ujionW1hUhPkOBakTr3YCDjbYfvJEiv/2P+IobhOGJr85+XHhN0v4gUkEDI8r2/rNk1m0GA8HKddvTjyGw/XqXa+LSTlDYkqI8OwR8GEYj4efEtcRpRYBxV8KxAW93YDWzFGvruKnnLbDAF6VR5w/cCMn5hzGCAZowggGWAgEBMIGUMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbQIBADAJBgUrDgMCGgUAoF0wGAYJKoZIhvcNAQkDMQsGCSqGSIb3DQEHATAcBgkqhkiG9w0BCQUxDxcNMDkwNzI0MDg0OTMwWjAjBgkqhkiG9w0BCQQxFgQUJqQFO6Pj0uJ62281S9aqtR15lAcwDQYJKoZIhvcNAQEBBQAEgYC3g4yhlASpzn9zCL2y3JEvfrI+pdv4KuEo7Nm3IxeQAzzZS9Zvi9hZRfBUfslHmRDjDETmX+Qm4eOBncNUhskcQxxS/awEqKhNf5xnbb7YHMVvgom2BE62VAn6Ss/1xl41i+a7UlBKRQxdyCFPZ8Uj5ozRfGg9TKRsPwCswdz/4w==-----END PKCS7-----
">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</p>
</div>

<?php
break;
//---------------------------------------------------//
case "update":
	update_site_option( "Advertising_front_page", $_POST[ 'Advertising_front_page' ] );
	update_site_option( "Advertising_single_top", $_POST[ 'Advertising_single_top' ] );
	update_site_option( "Advertising_single_bottom", $_POST[ 'Advertising_single_bottom' ] );
	update_site_option( "Advertising_page_top", $_POST[ 'Advertising_page_top' ] );
	update_site_option( "Advertising_page_bottom", $_POST[ 'Advertising_page_bottom' ] );
	update_site_option( "Advertising_below_footer", $_POST[ 'Advertising_below_footer' ] );
	update_site_option( "Advertising_below_commentbox", $_POST[ 'Advertising_below_commentbox' ] );
	update_site_option( "Advertising_blog_top", $_POST[ 'Advertising_blog_top' ] );
	echo "
	<SCRIPT LANGUAGE='JavaScript'>
	window.location='options-general.php?page=Advertising_page&updated=true&updatedmsg=" . urlencode('Settings saved.') . "';
	</script>
	";
break;
//---------------------------------------------------//
case "temp":
break;
//---------------------------------------------------//
}
echo '</div>';
}
function advertising($data){ 
	$advertising_home = stripslashes( get_site_option('Advertising_front_page') );
	$advertising_single_top = stripslashes( get_site_option('Advertising_single_top') );
	$advertising_single_bottom = stripslashes( get_site_option('Advertising_single_bottom') );
	$advertising_page_top = stripslashes( get_site_option('Advertising_page_top') );
	$advertising_page_bottom = stripslashes( get_site_option('Advertising_page_bottom') );
	if (is_single()) {
		return $advertising_single_top . $data . $advertising_single_bottom ;
	} else if (is_home()) {
		return $advertising_home . $data ;
	} else if (is_page()) {
		return $advertising_page_top . $data . $advertising_page_bottom ;
	} else {
		return $data ;
	}
} 
add_filter('the_content', 'advertising'); 

function adbelowfooter() {
	$belowfooteradvertisement = stripslashes( get_site_option('Advertising_below_footer') );
	echo $belowfooteradvertisement;
}
add_action('wp_footer', 'adbelowfooter');

function adbelowcommentbox() {
	$belowcommentboxadvertisement = stripslashes( get_site_option('Advertising_below_commentbox') );
	echo $belowcommentboxadvertisement;
}
add_action('comment_form', 'adbelowcommentbox');

function blogs_top() {
	$blogs_top_advertisement = stripslashes( get_site_option('Advertising_blog_top') );
	echo $blogs_top_advertisement;
}
add_action('get_header', 'blogs_top');
?>