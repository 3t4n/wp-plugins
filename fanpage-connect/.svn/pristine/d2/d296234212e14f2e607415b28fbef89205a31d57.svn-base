<?php
global $wp_filter;
global $post;
?>
<div class="fpc_meta_control">
<?php if($this->plugin_activated): ?>

	<input type="hidden" id="isfanpage" name="_fbfp[isfanpage]" value="<?php echo $meta['isfanpage']; ?>">

	<p class="fpc-note">
		You're editing a legacy Fanpage Connect 1.x Fanpage.
	</p>

	<div class="option-header">Facebook App Basics</div>
	<div class="app-options-closed">
		<table border="0" class="fpc-option-table">
			<tr>
				<td class="label-td"><label for="fbfp_appid">Facebook App ID</label></td>
				<td class="option-td">
					<input type="text" id="fbfp_appid" name="_fbfp[appid]" value="<?php echo $meta['appid']; ?>">
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fbfp_appsecret">Facebook App Secret</label></td>
				<td class="option-td">
					<input type="text" id="fbfp_appsecret" name="_fbfp[appsecret]" value="<?php echo $meta['appsecret']; ?>">
					<p>
						Find your Facebook App ID/API Key And App Secret <a href="https://developers.facebook.com/apps" target="_blank">here</a>
					</p>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fbfp_lang">App Language</label></td>
				<td class="option-td">
					<select id="fbfp_lang" name="_fbfp[lang]">
						<?php include FPC_PLUGIN_DIR.'/util/fanpage-connect-fb-locales.php'; ?>
					</select>
					<p>
						This is the language of the Facebook JavaSCript file that will be loaded in your pages.
					</p>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fbfp_pageurl">Facebook Page URL</label></td>
				<td class="option-td">
					<input type="text" id="fbfp_pageurl" name="_fbfp[fpurl]" value="<?php echo $meta['fpurl']; ?>">
					<p>
						Enter the URL of your fanpage (http://www.facebook.com/your_page_name).<br>
						If you want users to land on a particular tab of your page, enter the URL of the tab<br>
						(http://www.facebook.com/your_page_name?v=app_123456789)
					</p>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fbfp_admins">Facebook Page Admins</label></td>
				<td class="option-td">
					<input type="text" id="fbfp_admins" name="_fbfp[admins]" value="<?php echo $meta['admins']; ?>">
					<p>
						Enter a comma delimited list of Facebook IDs of your page admins.<br>Need your ID?
						Click <a href="http://developers.facebook.com/tools/explorer/" target="_blank">here</a>
					</p>
				</td>
			</tr>
		</table>
	</div>
	<div class="option-header">Open Graph Settings</div>
	<div class="app-options-closed">
		<table border="0" class="fpc-option-table">
			<tr>
				<td class="label-td"><label for="fbfp_fpogtitle">Title:</label></td>
				<td class="option-td">
					<input type="text" id="fbfp_fpogtitle" name="_fbfp[fpogtitle]" value="<?php echo $meta['fpogtitle']; ?>" size="60">
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fbfp_fpogtype">Type:</label></td>
				<td class="option-td">
					<select id="fbfp_fpogtype" name="_fbfp[fpogtype]">
						<?php include FPC_PLUGIN_DIR.'/util/fanpage-connect-fb-ogtypes.php'; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fbfp_fpogurl">Canonical URL:</label></td>
				<td class="option-td">
					<input type="text" id="fbfp_fpogurl" name="_fbfp[fpogurl]" value="<?php echo $meta['fpogurl']; ?>">
					<p>Tip: use the URL of your fan page tab URL</p>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fbfp_fpogname">Site Name:</label></td>
				<td class="option-td">
					<input type="text" id="fbfp_fpogname" name="_fbfp[fpogname]" value="<?php echo $meta['fpogname']; ?>">
					<p>A human-readable name for your site</p>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fbfp_fpogimg">Site Image URL:</label></td>
				<td class="option-td">
					<input type="text" id="fbfp_fpogimg" name="_fbfp[fpogimg]" value="<?php echo $meta['fpogimg']; ?>" size="60">
					<p>
						<div class="desc">The image must be at least 50px by 50px and have a maximum aspect ratio of 3:1. We support PNG, JPEG and GIF formats.</div>
					</p>
				</td>
			</tr>
		</table>
	</div>
	<div class="option-header">Menu Options</div>
	<div class="app-options-closed">
		<table border="0" class="fpc-option-table">
			<tr>
				<td class="label-td"><label for="fbfp_use_menu">Use Menu in Page?</label></td>
				<td class="option-td">
					<select id="fbfp_use_menu" name="_fbfp[use_menu]">
						<option value="false">No</option>
						<option value="true">Yes</option>
						<option value="defer">Defer to Global</option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fbfp_menu">Menu to Use</label></td>
				<td class="option-td">
					<?php
						$menus = wp_get_nav_menus();
						if(empty($menus)){
					?>
					<strong>No menus available</strong>
					<input type="hidden" id="fbfp_menu" name="_fbfp[menu]" value="">
					<?php } else { ?>
					<select id="fbfp_menu" name="_fbfp[menu]">
						<option value=""></option>
						<?php foreach($menus as $menu) :?>
							<?php if($menu_name == $menu->name){ ?>
								<option value="<?php echo $menu->name; ?>" selected="selected"><?php echo $menu->name; ?></option>
							<?php } else { ?>
								<option value="<?php echo $menu->name; ?>"><?php echo $menu->name; ?></option>
							<?php } ?>
						<?php endforeach; ?>
					</select>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fbfp_show_menu">Display Menu</label></td>
				<td class="option-td">
					<select id="fbfp_show_menu" name="_fbfp[show_menu]">
						<option value="liked">When page is &quot;Liked&quot;</option>
						<option value="always">Always</option>
						<option value="defer">Defer to Global</option>
					</select>
					<p>
						You can create custom menus in the <a href="http://localhost/wp/wp-admin/nav-menus.php">Appearance &gt; Menus</a> tab and
						use them in your fan pages.<br>If you're going to use menus, we suggest you create menus specifically for your fan pages.
					</p>
					<p class="fpc-note">
						<strong>Note:</strong> This will override your global setting for fan pages and use your custom menu in the page.
					</p>
				</td>
			</tr>
		</table>
	</div>
	<div class="option-header">CSS Options</div>
	<div class="app-options-closed">
		<table border="0" class="fpc-option-table">
			<tr>
				<td class="label-td"><label for="fbfp_csslink">Custom CSS link:</label></td>
				<td class="option-td">
					<input type="text" id="fbfp_csslink" name="_fbfp[csslink]" value="<?php echo $meta['csslink']; ?>">
					<p>Enter the URL of the CSS file you'd like to use on your fanpage.</p>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fbfp_css">Custom CSS:</label></td>
				<td class="option-td">
					<textarea id="fbfp_css" name="_fbfp[css]"><?php echo $meta['css']; ?></textarea>
					<p>Copy and paste any CSS you'd like to use on your fanpage. This will be loaded after any other CSS file</p>
				</td>
			</tr>
		</table>
	</div>
	<div class="option-header">Header/Footer Content</div>
	<div class="app-options-closed">
		<table border="0" class="fpc-option-table">
			<tr>
				<td class="label-td"><label for="fbfp_header">Custom Header Content:</label></td>
				<td class="option-td">
					<textarea id="fbfp_header" name="_fbfp[header]"><?php echo $meta['header']; ?></textarea>
					<p>Paste any custom header content here. It'll be displayed in the &lt;div id="header"&gt; div.</p>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fbfp_footer">Custom Footer Content:</label></td>
				<td class="option-td">
					<textarea id="fbfp_footer" name="_fbfp[footer]"><?php echo $meta['footer']; ?></textarea>
					<p>Paste any custom footer content here. It'll be displayed in the &lt;div id="footer"&gt; div.</p>
				</td>
			</tr>
		</table>
	</div>
	<div class="option-header">Miscellaneous Options</div>
	<div class="app-options-closed">
		<table border="0" class="fpc-option-table">
			<tr>
				<td class="label-td"><label for="fbfp_show_comments">Display Comments:</label></td>
				<td class="option-td">
					<select id="fbfp_show_comments" name="_fbfp[show_comments]">
						<option value="liked" selected="selected">Only When &quot;Liked&quot;</option>
						<option value="always">Always</option>
					</select>
					<p>
						To display Facebook comments you'll need to enable comments on your page.
					</p>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fbfp_template">Custom Template:</label></td>
				<td class="option-td">
					<?php echo $this->get_custom_templates($meta['template'],'fbfp'); ?>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fbfp_pop_links">Link Control:</label></td>
				<td class="option-td">
					<p>
						<?php if(!empty($meta['pop_links'])): ?>
						<input type="checkbox" name="_fbfp[pop_links]" id="fbfp_pop_links" checked="checked" value="1">
						<?php else: ?>
						<input type="checkbox" name="_fbfp[pop_links]" id="fbfp_pop_links" value="1">
						<?php endif; ?>
						Auto-force links to open in a new window (see help for details).
					</p>
					<P>
						<?php if(!empty($meta['pop_forms'])): ?>
						<input type="checkbox" name="_fbfp[pop_forms]" id="fbfp_pop_forms" checked="checked" value="1">
						<?php else: ?>
						<input type="checkbox" name="_fbfp[pop_forms]" id="fbfp_pop_forms" value="1">
						<?php endif; ?>
						Auto-force forms to post to a new window (see help for details).
					</p>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fbfp_drop_iframe">Page/iFrame Control:</label></td>
				<td class="option-td">
					<?php if(!empty($meta['drop_iframe'])): ?>
					<input type="checkbox" name="_fbfp[drop_iframe]" id="fbfp_drop_iframe" checked="checked" value="1">
					<?php else: ?>
					<input type="checkbox" name="_fbfp[drop_iframe]" id="fbfp_drop_iframe" value="1">
					<?php endif; ?>
					Allow the page to be outside the Facebook iFrame tab?.
				</td>
			</tr>
		</table>
	</div>

<?php else: ?>

	<span class="fpc_unregged">Please register the plugin to activate it. (Registration is free)</span><br>
	Go to the <a href="admin.php?page=fpc-main">Fanpage Connect settings page</a> to activate the plugin.<br>

<?php endif; ?>

</div><!-- fpc_meta_control -->

<script>
jQuery(document).ready(function(){
	if(String('<?php echo $meta['lang']; ?>') != '') { jQuery("#lang").val('<?php echo $meta['lang']; ?>'); }
	if(String('<?php echo $meta['use_menu']; ?>') != '') { jQuery("#use_menu").val('<?php echo $meta['use_menu']; ?>'); }
	if(String('<?php echo $meta['menu']; ?>') != '') { jQuery("#menu").val('<?php echo $meta['menu']; ?>'); }
	if(String('<?php echo $meta['show_menu']; ?>') != '') { jQuery("#show_menu").val('<?php echo $meta['show_menu']; ?>'); }
	if(String('<?php echo $meta['show_comments']; ?>') != '') { jQuery("#show_comments").val('<?php echo $meta['show_comments']; ?>'); }
	if(String('<?php echo $meta['fbfp_fpogtype']; ?>') != '') { jQuery("#fbfp_fpogtype").val('<?php echo $meta['fbfp_fpogtype']; ?>'); }

	var templates = '<?php echo FPC_TEMPLATES_URL; ?>/';

	jQuery('#template_preview').on('click',function(e){
		e.preventDefault();
		e.stopPropagation();
		templateDir = jQuery('#fbfp_template').val();
		if(templateDir != ''){
			tb_show('Fanpage Template Preview',templates+templateDir+'/?KeepThis=true&TB_iframe=true&width=827',false);
			jQuery("#TB_window").width(827);
			jQuery("#TB_window").css({'width':'827px !important'});
			jQuery("#TB_iframeContent").width(827);
			jQuery("#TB_iframeContent").css({'width':'827px !important'});
		}
	});

	jQuery('.option-header').on('click',function(){
	    $this = jQuery(this);
	    $next = $this.next();
	    $this.toggleClass('option-header-open');
	    if($next.is(":visible")){
	    	$next.slideUp('fast');
	    } else {
	    	$next.slideDown('fast');
	    }
	});
});
</script>