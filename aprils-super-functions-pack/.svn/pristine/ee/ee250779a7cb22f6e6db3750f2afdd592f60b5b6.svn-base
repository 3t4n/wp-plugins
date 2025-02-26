<script type="text/javascript">
jQuery(document).ready(function($){
$('#load_default_doctypes').click(function(){
	$('#asfp_doctypes_list').val('pdf,mp3,zip,doc,xls,ppt,odt,ods,odp,odg,rtf,txt,mov');
	alert("Be sure to click the 'Save Changes' button now.")
});

$('#fb_image_order').click(function(){
	alert("If viewing a single post or page, this part of the plugin chooses an image for a page in this order:\r\n	The post's 'featured image'\r\n	The post's first attached image\r\n	The default image file URL you insert below\r\n	No image\r\n\r\bIf NOT viewing a single post or page, the default file URL is used if it exists, otherwise no image.")
});

});</script>
<style type="text/css">
	.formtable td { padding: 0 10px 15px 0; }
	.formtable { width: 100%; }
	.note { font-size: 80%; line-height: 120%; }
	.fakelink { text-decoration: underline; color: #21759B; cursor: pointer; }
</style>
<div class="item"><h3>Settings</h3>

<form method="post" action="options.php">
<?php
    // New way of setting the fields, for WP 2.7 and newer
    if (function_exists('settings_fields')){
        settings_fields('asfp-options');
    } else {
        wp_nonce_field('update-options');
        ?>
        <input type="hidden" name="action" value="update" />
        <?php
    }
?>

	<table class="formtable">
		<tr>
			<td colspan="2"><h4>Shortcode-related Options</h4></td>
		</tr>
		<tr>
			<td width="80" valign="top">Page Width</td>
			<td><input type="text" value="<?php echo htmlspecialchars(get_option('asfp_pagewidth')); ?>" name="asfp_pagewidth" id="asfp_pagewidth" size="5" />px<div class="note">If the width of your website "page" do not seem to match what the shortcode columns are outputting,<br />enter the maximum width of your page below and save.</div></td>
		</tr>
		<tr>
			<td align="right" valign="top"><input type="checkbox" value="1" name="asfp_cformsjs" id="asfp_cformsjs" <?php if (get_option('asfp_cformsjs')==1) echo ' checked="checked"' ?> /></td>
			<td>Include cforms javascript?<div class="note">If checked, you can use the shortcode <code>[asfp_preselect_recipient]</code> on any page that has a cform contact form where the first field is of type "multiple recipients". <a href="tools.php?page=aprils-super-functions-pack/aprils-super-functions-pack.php&type=dynamic">More details &raquo;</a></div></td>
		</tr>

		<tr>
			<td align="right" valign="top"><input type="checkbox" value="1" name="asfp_tabsjs" id="asfp_tabsjs" <?php if (get_option('asfp_tabsjs')==1) echo ' checked="checked"' ?> /></td>
			<td>Disable tabs &amp; toggle javascript?<div class="note">If checked, you can no longer use the shortcodes <code>[tabs]</code> or <code>[toggle]</code>. <a href="tools.php?page=aprils-super-functions-pack/aprils-super-functions-pack.php&type=dynamic">More details &raquo;</a></div></td>
		</tr>

		<tr>
			<td colspan="2"><h4>Other Options</h4></td>
		</tr>
		<tr>
			<td align="right" valign="top"><input type="checkbox" value="1" name="asfp_sfjs" id="asfp_sfjs" <?php if (get_option('asfp_sfjs')==1) echo ' checked="checked"' ?> /></td>
			<td>Include Suckerfish Javascript?<div class="note">If the theme uses suckerfish menus, this plugin can include the javascript needed for IE-compatibility. The menu must in a parent div with ID <code>#mainnav</code>.</div></td>
		</tr>
		<tr>
			<td align="right" valign="top"><input type="checkbox" value="1" name="asfp_doctypes" id="asfp_doctypes" <?php if (get_option('asfp_doctypes')==1) echo ' checked="checked"' ?> /></td>
			<td>Include document types styles?<div class="note">
			<?php if (get_option('asfp_doctypes')!=1): ?>Icons can be added to any link that is connected to a media type. This is done entirely via css. <input type="hidden" value="<?php echo htmlspecialchars(get_option('asfp_doctypes_list')); ?>" name="asfp_doctypes_list" />
			<?php else: ?>
			Supported Types: <input type="text" value="<?php echo htmlspecialchars(get_option('asfp_doctypes_list')); ?>" name="asfp_doctypes_list" id="asfp_doctypes_list" size="65" />&nbsp;&nbsp;<span id="load_default_doctypes" class="fakelink">&laquo; Load defaults</span><br />If you add a new extension here, for example "xls", then be sure to upload a file correspondingly<br />named "icon-<b>xls</b>.gif" to the <i>wp-content/uploads/</i> directory.
			<?php endif; ?></div></td>
		</tr>
		<tr>
			<td align="right" valign="top"><input type="checkbox" value="1" name="asfp_fbmeta" id="asfp_fbmeta" <?php if (get_option('asfp_fbmeta')==1) echo ' checked="checked"' ?> /></td>
			<td>Include Facebook meta data in head?<div class="note">
			Meta tags for site title, excerpt, image and more can be added to the header so that when someone 'likes' a page on your site, the right information goes to Facebook to display.
			<?php if (get_option('asfp_fbmeta')==1): ?>
			<span id="fb_image_order" class="fakelink">How is each page's image chosen?</span>
			<br />Default image file URL: <input type="text" value="<?php echo htmlspecialchars(get_option('asfp_fbmeta_img')); ?>" name="asfp_fbmeta_img" id="asfp_fbmeta_img" size="65" />
			<?php endif; ?></div></td>
		</tr>
		<tr>
			<td align="right" valign="top"><input type="checkbox" value="1" name="asfp_titlejs" id="asfp_titlejs" <?php if (get_option('asfp_titlejs')==1) echo ' checked="checked"' ?> /></td>
			<td>Remove <code>title</code> attributes?<div class="note">If checked, javascript will be added that removes the title attributes from WordPress-generated menus.</div></td>
		</tr>
	</table>

    <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" />
    </p>
</form>
</div>

<div class="item">
<h3>Template Functions</h3>

<p>The following template functions are included for use in your theme files.</p>
<ul class="foo">
	<li><code>asfp_get_image($post_id,$size='thumbnail',$class=null,$format='imgtag')</code><br />
		<b>Arguments:</b><br />
		<code>$post_id</code> - required. The ID of the post you'd like to grab an image for.<br />
		<code>$size</code> - optional. Options are <code>thumbnail</code>, <code>medium</code>, <code>large</code>, <code>full</code><br />
		<code>$class</code> - optional. If you provide a class, it will be assigned to the image's image tag.<br />
		<code>$format</code> - optional. The other option is <code>url</code> which returns just the URL of the image.<br />
		<b>Returns:</b><br />
		An HTML string containing an image tag.<br />
		<b>Notes:</b><br />
		The dimensions of the returned image are currently hard-coded to 70x70. This will be fixed in a future release.
	</li>

	<li><code>asfp_subpages_nav()</code><br />
		<b>Arguments:</b><br />
		You can pass a string of arguments, e.g. <code>'arg1=val1&arg2=val2'</code>;
			<ul>
				<li><code>link_header=true</code>. This will make the section title a link to the section (default is for it to not be a link)</li>
				<li><code>depth=N</code>. By default, the depth is 2.</li>
			</ul>
		<b>Prints:</b><br />
		An HTML string containing a subnav list inside of a widget div. If the current page is a top-level item, the list will include its children and grandchildren. If the current page is not a top-level item, the list will include the current page's siblings and aunts and uncles and cousins, if applicable. Try it out to see the CSS classes used.
	</li>
</ul>
</div>

<div class="item">
<h3>Widgets</h3>

<p>The following widget is included with this plugin.</p>
<ul class="foo">
	<li><b>Text with Class - ASFP</b><br />This widget is a copy of the built-in WordPress Text Widget. The only change I made was to give it a field where you can specify a class.</li>
</ul>
</div>