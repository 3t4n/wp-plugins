<?php
/*
Plugin Name: Auto Meta Header
Plugin URI: http://www.indra-agustian.com
Description: Auto Meta Description and Meta Keyword, Robot Meta Tag (index follow for home, single post, tag, and category - noindex follow for others - Base on Google webmaster guidelines) 
Version: 1.0
Author: indra
Author URI: http://www.indra-agustian.com
License: GPL2
*/

add_action('admin_menu', 'metaheader_add_menu');
add_action('admin_init', 'metaheader_reg_function');
function metaheader_add_menu() {
	add_options_page('Auto Meta Header Option', 'Auto Meta Header', 'administrator', 'my-unique-identifier', 'metaheader_options');
}
	
function metaheader_reg_function() {
	register_setting('metaheader-settings-group', 'metaheader_homekey');
	register_setting('metaheader-settings-group', 'metaheader_postdesc');
	register_setting('metaheader-settings-group', 'metaheader_postkey');
	register_setting('metaheader-settings-group', 'metaheader_tagdesc');
	register_setting('metaheader-settings-group', 'metaheader_tagkey');
	register_setting('metaheader-settings-group', 'metaheader_catdesc');
	register_setting('metaheader-settings-group', 'metaheader_catkey');
	register_setting('metaheader-settings-group', 'metaheader_elsedesc');
	register_setting('metaheader-settings-group', 'metaheader_elsekey');
}

function metaheader_options() {
	if (!current_user_can('administrator'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}

?>
<h2>Meta Header</h2>
<p>Auto Meta Description and Meta Keyword, Robot Meta Tag (index follow for home, single post, tag, and category - noindex follow for others - Base on Google webmaster guidelines)</p>
<form method="post" action="options.php">
<?php settings_fields('metaheader-settings-group'); ?>
<table><tr>
  <td width="180px">Home description / <a href="./options-general.php">Tagline </a></td>
  <td><?php echo bloginfo('description'); ?>
</td></tr>
<tr>
  <td>Home keyword </td>
  <td><input type="text" name="metaheader_homekey" size="100" value="<?php echo get_option('metaheader_homekey'); ?>">
</td></tr>
<tr>
  <td>Single post description</td>
  <td><input type="text" name="metaheader_postdesc" size="100" value="<?php echo get_option('metaheader_postdesc'); ?>">
</td></tr>
<tr>
  <td>Single post keyword</td>
  <td><input type="text" name="metaheader_postkey" size="100" value="<?php echo get_option('metaheader_postkey'); ?>">
</td></tr>
<tr>
  <td>Tag description</td>
  <td><input type="text" name="metaheader_tagdesc" size="100" value="<?php echo get_option('metaheader_tagdesc'); ?>">
</td></tr>
<tr>
  <td>Tag keyword</td>
  <td><input type="text" name="metaheader_tagkey" size="100" value="<?php echo get_option('metaheader_tagkey'); ?>">
</td></tr>
<tr>
  <td>Category description</td>
  <td><input type="text" name="metaheader_catdesc" size="100" value="<?php echo get_option('metaheader_catdesc'); ?>">
</td></tr>
<tr>
  <td>Category keyword</td>
  <td><input type="text" name="metaheader_catkey" size="100" value="<?php echo get_option('metaheader_catkey'); ?>">
</td></tr>
<tr>
  <td>Else description</td>
  <td><input type="text" name="metaheader_elsedesc" size="100" value="<?php echo get_option('metaheader_elsedesc'); ?>">
</td></tr>
<tr>
  <td>Else keyword</td>
  <td><input type="text" name="metaheader_elsekey" size="100" value="<?php echo get_option('metaheader_elsekey'); ?>">
</td></tr>
</table>
    <p>Note:<br/>Keyword separate by (,) example: cms, wordpress, website, automotive, google sitemap<br/>
	Good description recomended is more than 100 chars and maxlength is 300 Chars </p>
    <p>
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
</form>
<h2>Robot Meta Tag Header</h2>
<p>Index follow for home, single post, tag, and category - noindex follow for others - base on <strong>google webmaster guidelines</strong> and <strong>Google Panda Algorithm</strong><br/>
  Note: <strong>Please Remove</strong> "&lt;meta name=&quot;robots&quot; content=&quot;follow, all&quot; /&gt; " if your <a href="./theme-editor.php">themes header</a> contain this meta robot<br/>
  <a href="./theme-editor.php"><img src="http://autocar-zone.com/images/followall.jpg"/></a>
 <p>Created By <a href="http://www.indra-agustian.com" target="_blank">Indra Agustian</a> - To see the example web that use this plugin method visit <a href="http://autocar-zone.com" target="_blank">autocar zone</a></p>
  <? } ?>
<?
function meta() 
{ 
if (get_option('metaheader_homekey') <> ''){
$metaheader_homekey=', '.get_option('metaheader_homekey');}
else {$metaheader_homekey='' ;}

if (get_option('metaheader_postdesc') <> ''){
$metaheader_postdesc=', '.get_option('metaheader_postdesc');}
else {$metaheader_postdesc='' ;}

if (get_option('metaheader_postkey') <> ''){
$metaheader_postkey=', '.get_option('metaheader_postkey');}
else {$metaheader_postkey='' ;}

if (get_option('metaheader_tagdesc') <> ''){
$metaheader_tagdesc=', '.get_option('metaheader_tagdesc');}
else {$metaheader_tagdesc='' ;}

if (get_option('metaheader_tagkey') <> ''){
$metaheader_tagkey=', '.get_option('metaheader_tagkey');}
else {$metaheader_tagkey='' ;}

if (get_option('metaheader_catdesc') <> ''){
$metaheader_catdesc=', '.get_option('metaheader_catdesc');}
else {$metaheader_catdesc='' ;}

if (get_option('metaheader_catkey') <> ''){
$metaheader_catkey=', '.get_option('metaheader_catkey');}
else {$metaheader_catkey='' ;}

if (get_option('metaheader_elsedesc') <> ''){
$metaheader_elsedesc=', '.get_option('metaheader_elsedesc');}
else {$metaheader_elsedesc='' ;}

if (get_option('metaheader_elsekey') <> ''){
$metaheader_elsekey =', '.get_option('metaheader_elsekey');}
else {$metaheader_elsekey='' ;}
?>
<meta name="description" content="<?php if ( is_single() ) {
single_post_title('', true); echo $metaheader_postdesc; 
} 
elseif ( is_home() ) {
bloginfo('name'); echo " - "; bloginfo('description');
}
elseif ( is_tag() ) {
single_tag_title('', true); echo $metaheader_tagdesc;
}
elseif ( is_category() ) {
single_cat_title('', true); echo $metaheader_catdesc;
}
else { echo $metaheader_elsedesc;
}

?>" />
<meta name="keywords" content="<?php if ( is_single() ) {
single_post_title('', true); echo $metaheader_postkey; 
} 
elseif ( is_tag() ) {
single_tag_title('', true); echo $metaheader_tagkey; 
}
elseif ( is_category() ) {
single_cat_title('', true); echo $metaheader_catkey; 
}
elseif ( is_home() ) {
bloginfo('name');echo $metaheader_homekey;
}
else { echo $metaheader_elsekey;
}
?>" /> 

<meta name="robots" content="<?php 
if ( is_paged() ) { echo 'noindex, follow'; }
elseif ( is_attachment()) {echo 'noindex, follow';}
elseif ( is_single() ) { echo 'index, follow';} 
elseif ( is_tag() ) { echo 'index, follow'; }
elseif ( is_category() ) { echo 'index, follow'; }
elseif ( is_home() ) { echo 'index, follow'; }
else { echo 'noindex, follow';}
?>" /> 
<? }
add_action('wp_head', 'meta');
?>