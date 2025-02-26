<?php
/*
Plugin Name: G Social Share
Plugin URI: http://www.plrpackagestore.com/
Description: Social Sharing was never so easy. Increase your web traffic by inserting a social share button in your posts or pages or sidebar wherever you wish with the help of a small one word short code.
Version: 1.0
Author: Gabriel De Florio
Author http://www.plrpackagestore.com
License: GPL2
*/
/*  Copyright 2011  JennyClicks Inc.  (email : support@jennyclicks.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


session_start();

$_SESSION[blogurl] = get_bloginfo ( 'wpurl' );

$_SESSION[gsocialshareprocessurl] = $_SESSION[blogurl]."/wp-content/plugins/gsocialshare";

add_action('admin_menu', 'gsocialshare_top_menu');

function gsocialshare_top_menu() {
add_menu_page('G Social Share', 'G Social Share', 'read', 'gsocialshare_slug', 'gsocialshare_page');
}

function gsocialshare_page() {
?>
<div>
<h2 align="center"><a href="http://www.plrpackagestore.com" target="_blank"><img src="<?php echo($_SESSION[gsocialshareprocessurl]); ?>/plrbanner.jpg" border="0"></a>
<br><br><br>
G Social Share Plugin<br>
</h2>
With Google giving more importance to Web 2.0 sites, it is imperative that you provide your blog readers a way to share your posts at a point when you think they are 
most engaged with your content & likely to share it with others. But most of social share plugins only allows you to add sharing buttons at the end or beginning of a 
post or page but this has now changed with G Social Share plugin.
<br><br>Now with the help of small one word short codes, you can insert social share button in your blog posts, pages or sidebar wherever you wish. <b>To insert the 
social share button</b>, just place the short code in to your posts or pages or sidebar where you would like these buttons to appear.
<br><br>
<strong>For small social share button, use short code:</strong> [gsocialsharesmall]
<br><br><br>
<strong>For medium social share button, use short code:</strong> [gsocialsharemedium]
<br><br><br>
<strong>For small social share button, use short code:</strong> [gsocialsharebig]
<br><br><br>
For any help, visit <a href="http://jennyclicks.com/support" target="_blank">www.jennyclicks.com/support</a><br>
</div>
<?php
}

function gsocialshare_add_button($content) {
$gcaform = '<br>
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f1fda8d7072c2e4"></script>
<!-- AddThis Button END -->
<br>';
$content = str_replace('[gsocialsharesmall]',$gcaform,$content);

$gcaform = '<br>
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f1fe9d015c83418"></script>
<!-- AddThis Button END -->
<br>';
$content = str_replace('[gsocialsharemedium]',$gcaform,$content);

$gcaform = '<br>
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f1fe9fa0460fa45"></script>
<!-- AddThis Button END -->
<br>';
$content = str_replace('[gsocialsharebig]',$gcaform,$content);


return($content);
}

add_filter('the_content', 'gsocialshare_add_button');

?>