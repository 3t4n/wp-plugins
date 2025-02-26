<?php
global $wp_filter;
global $post;
$header_filters = array();
$content_filters = array();
$footer_filters = array();
if(isset($meta['header_filters'])){ $header_filters = $meta['header_filters']; }
if(isset($meta['content_filters'])){ $content_filters = $meta['content_filters']; }
if(isset($meta['footer_filters'])){ $footer_filters = $meta['footer_filters']; }
?>
<div class="fpc_meta_control">
<?php if($this->plugin_activated): ?>

	<div class="option-header option-header-open">Facebook App Basics</div>
	<div>
		<table border="0" class="fpc-option-table"
			<tr>
				<td class="label-td"><label for="fpcapp_appid">Facebook App ID</label></td>
				<td class="option-td">
					<input type="text" id="fpcapp_appid" name="_fpcapp[appid]" value="<?php echo $meta['appid']; ?>">
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fpcapp_appsecret">Facebook App Secret</label></td>
				<td class="option-td">
					<input type="text" id="fpcapp_appsecret" name="_fpcapp[appsecret]" value="<?php echo $meta['appsecret']; ?>">
					<p>
						Find your Facebook App ID/API Key And App Secret <a href="https://developers.facebook.com/apps" target="_blank">here</a>
					</p>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fpcapp_lang">App Language</label></td>
				<td class="option-td">
					<select id="fpcapp_lang" name="_fpcapp[lang]">
						<?php include FPC_PLUGIN_DIR.'/util/fanpage-connect-fb-locales.php'; ?>
					</select>
					<p>
						This is the language of the Facebook JavaScript file that will be loaded in your pages.
					</p>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fpcapp_pageurl">Facebook Page URL</label></td>
				<td class="option-td">
					<input type="text" id="fpcapp_pageurl" name="_fpcapp[pageurl]" value="<?php echo $meta['pageurl']; ?>">
					<p>
						Enter the URL of your fanpage (http://www.facebook.com/your_page_name).<br>
						If you want users to land on a particular tab of your page, enter the URL of the tab<br>
						(http://www.facebook.com/your_page_name?v=app_123456789)
					</p>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fpcapp_admins">Facebook Page Admins</label></td>
				<td class="option-td">
					<input type="text" id="fpcapp_admins" name="_fpcapp[admins]" value="<?php echo $meta['admins']; ?>">
					<p>
						Enter a comma delimited list of Facebook IDs of your page admins.<br>Need your ID?
						Click <a href="http://developers.facebook.com/tools/explorer/" target="_blank">here</a>
					</p>
				</td>
			</tr>
			<tr>
				<td class="label-td">&nbsp;</label></td>
				<td class="option-td">
					<button id="add-to-fb" name="add-to-fb" class="option-update" disabled>Add App to Facebook</button>
				</td>
			</tr>
		</table>
	</div>
	<div class="option-header">Widget Options</div>
	<div id="menu-options" class="app-options-closed">
		<table border="0" class="fpc-option-table">
			<tr>
				<td class="label-td"><label for="fpcapp_num_widgets">How Many Widgets for this App?</label></td>
				<td class="option-td">
					<select id="fpcapp_num_widgets" name="_fpcapp[num_widgets]">
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fpcapp_widget_name">Base Widget Name</label></td>
				<td class="option-td">
					<input type="text" id="fpcapp_widget_name" name="_fpcapp[widget_name]" maxlength="24" length="25" value="<?php echo $meta['widget_name']; ?>">
					<input type="hidden" id="fpcapp_widget_base" name="_fpcapp[widget_base]" value="<?php echo $meta['widget_base']; ?>">
				</td>
			</tr>
			<tr>
				<td class="label-td">&nbsp;</td>
				<td class="option-td">
					<p>
						WordPress <a href="widgets.php">Widgets</a> add content and features to your Sidebars. Examples are the default widgets that
						come with WordPress; for post categories, tag clouds, navigation, search, etc.
					</p>
					<p>
						You can add up to 6 widgets per App. You'll be able to use the widgets in your fanpage's header, content area, sidebar, and footer.
						Suggestion: Name your Sidebar similar to the App name for eas of use.
					</p>
				</td>
			</tr>
		</table>
	</div>
	<div class="option-header">Miscellaneous Options</div>
	<div class="app-options-closed">
		<table border="0" class="fpc-option-table">
			<tr>
				<td class="label-td"><label for="fpcapp_gplus">Google + Profile Link</label></td>
				<td class="option-td">
					<input type="text" id="fpcapp_gplus" name="_fpcapp[gplus]" value="<?php echo $meta['gplus']; ?>">
					<p>
						This will add the rel="author" tag in your fan pages. This makes Google happy!<br>
						To get your profile link, click <a href="https://profiles.google.com/me" target="_blank">here</a>,
						then copy the URL in the address bar.
					</p>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fpcapp_debug">Debug Mode?</label></td>
				<td class="option-td">
					<select id="fpcapp_debug" name="_fpcapp[debug]">
						<option value="false">No</option>
						<option value="true">Yes</option>
					</select>
					<p>
						If you're having issues with your page being liked, or needd to see what Facebook sends in its signed_request,
						enable this to viedw the data in your pages. Remember to disable this when you go live!
					</p>
				</td>
			</tr>
		</table>
	</div>
	<div class="option-header">Filter Removal Options</div>
	<div class="app-options-closed">
		<table border="0" class="fpc-option-table">
			<tr>
				<td class="label-td">&nbsp;</td>
				<td class="option-td">
					<p>
						<em>Most of the time, you don't need to tinker with these options.</em> However, you may find that a
						particular plugin is adding content or modifying your existing content in a way that you don't want.
						For example: SexyBookmarks adds social sharing buttons to your content. While great for your blog, it
						doesn't exactly work for a fan page.
					</p>
					<p>
						Check the items you wish to <strong>DISABLE</strong>. If you don't know what the filter is, then it
						may be best to leave it alone!
					</p>
					<div>
						<div class="option-header option-header-small">Header Filters</div>
						<div id="header-filters" class="app-options-closed">
						<p>
						<?php
						if($wp_filter["wp_head"]) {
							foreach($wp_filter["wp_head"] as $filterarray)
							{
								foreach($filterarray as $name => $details)
								{
									if(in_array($name,$header_filters))
									{
										$c = ' checked="checked" ';
									} else {
										$c = '';
									}
									echo '<input type="checkbox" id="'.$name.'" name="_header_filters[]" value="'.$name.'" '.$c.'> ';
									echo '<label for="'.$name.'">'.$name.'</label><br />';
								}
							}
						}
						?>
						</p>
						</div>
					</div>
					<div>
						<div class="option-header option-header-small">Content Filters</div>
						<div class="app-options-closed">
						<p>
						<?php
						if($wp_filter["the_content"]) {
							foreach($wp_filter["the_content"] as $filterarray)
							{
								foreach($filterarray as $name => $details)
								{
									if(in_array($name,$content_filters))
									{
										$c = ' checked="checked" ';
									} else {
										$c = '';
									}
									echo '<input type="checkbox" id="'.$name.'" name="_content_filters[]" value="'.$name.'" '.$c.'> ';
									echo '<label for="'.$name.'">'.$name.'</label><br />';
								}
							}
						}
						?>
						</p>
						</div>
					</div>
					<div>
						<div class="option-header option-header-small">Footer Filters</div>
						<div class="app-options-closed">
						<p>
						<?php
						if($wp_filter["wp_footer"]) {
							foreach($wp_filter["wp_footer"] as $filterarray)
							{
								foreach($filterarray as $name => $details)
								{
									if(in_array($name,$footer_filters))
									{
										$c = ' checked="checked" ';
									} else {
										$c = '';
									}
									echo '<input type="checkbox" id="'.$name.'" name="_footer_filters[]" value="'.$name.'" '.$c.'> ';
									echo '<label for="'.$name.'">'.$name.'</label><br />';
								}
							}
						}
						?>
						</p>
						</div>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<input type="hidden" name="fpcapp_link_luv" id="fpcapp_link_luv" value="true">

<?php else: ?>

	<span class="fpc_unregged">Please register the plugin to activate it. (Registration is free)</span><br>
	Go to the <a href="admin.php?page=fpc-main">Fanpage Connect settings page</a> to activate the plugin.<br>

<?php endif; ?>

</div><!-- fpc_meta_control -->

<script>
var appWin;
jQuery(document).ready(function(){
	if(String('<?php echo $meta['lang']; ?>') != '') { jQuery("#fpcapp_lang").val('<?php echo $meta['lang']; ?>'); }
	if(String('<?php echo $meta['use_menu']; ?>') != '') { jQuery("#fpcapp_use_menu").val('<?php echo $meta['use_menu']; ?>'); }
	if(String('<?php echo $meta['menu']; ?>') != '') { jQuery("#fpcapp_menu").val('<?php echo $meta['menu']; ?>'); }
	if(String('<?php echo $meta['menu_display']; ?>') != '') { jQuery("#fpcapp_menu_display").val('<?php echo $meta['menu_display']; ?>'); }
	if(String('<?php echo $meta['link_luv']; ?>') != '') { jQuery("#fpcapp_link_luv").val('<?php echo $meta['link_luv']; ?>'); }
	if(String('<?php echo $meta['debug']; ?>') != '') { jQuery("#fpcapp_debug").val('<?php echo $meta['debug']; ?>'); }
	if(String('<?php echo $meta['num_widgets']; ?>') != '') { jQuery("#fpcapp_num_widgets").val('<?php echo $meta['num_widgets']; ?>'); }

	jQuery('#message.updated').find('a').remove();

	jQuery('#add-to-fb').click(function(e){
		e.stopPropagation();
		e.preventDefault();
		appID = jQuery('#fpcapp_appid').val();
		fbRegUrl = 'https://www.facebook.com/dialog/pagetab?app_id=';
		fbRedir = 'http://www.facebook.com';
		fbAddApp = fbRegUrl + appID + '&redirect_uri=' + fbRedir;
		if(!appWin){
			appWin = window.open(fbAddApp,'_blank');
		} else {
			appWin.location = fbAddApp;
		}
		setTimeout(function(){ appWin.focus(); }, 2000);
	});

	if(jQuery('#fpcapp_appid').val().length >= 10){
		jQuery('#add-to-fb').removeAttr('disabled');
	}

	jQuery('.option-header').on('click',function(){
	    $this = jQuery(this);
	    $next = $this.next();
	    $this.toggleClass('option-header-open');
	    if($next.is(":visible")){
	    	$next.slideUp('fast');
	    } else {
	    	$next.slideDown('fast');
	    }
	    //$this.next().toggle('fast');
	});

	jQuery('#fpcapp_appid').on('focus blur',function(){
	    $this = jQuery(this);
	    $appID = $this.val().trim();
	    if($appID.length >= 10){
	    	jQuery('#add-to-fb').removeAttr('disabled');
	    } else {
	    	jQuery('#add-to-fb').attr('disabled','disabled');
	    }
	});

	widgetBase = jQuery('#fpcapp_widget_base');
	widgetName = jQuery('#fpcapp_widget_name');
	jQuery('#fpcapp_widget_name').on('keyup keydown keypress focus blur',function(){
		startVal = widgetName.val().toLowerCase().replace(/[^a-zA-Z0-9 ]+/g, "")
		widgetBase.val(startVal.replace(/[^a-zA-Z0-9]+/g, "-"));
	});
});
</script>