<div class="fpc_meta_control">

	<?php if($this->plugin_activated): ?>

	<label>Make this page a FanPage?</label>
	<select id="_fbfp_isfanpage" name="_fbfp[isfanpage]">
	<?php if($meta['isfanpage'] == "true"): ?>
	<option value="false">No</option>
	<option value="true" selected="selected">Yes</option>
	<?php else: ?>
	<option value="false" selected="selected">No</option>
	<option value="true">Yes</option>
	<?php endif; ?>
	</select>
	<p>
		<div class="desc">Selecting "Yes" will format the page for display on Facebook fanpages.</div>
	</p>

	<?php if($meta['isfanpage'] == "true"): ?>
	<div id="fpc_other_meta">
	<?php else: ?>
	<div id="fpc_other_meta" style="display:none;">
	<?php endif; ?>

		<div class="fpc-menu-header" id="hdr-app-settings">Facebook Application Settings</div>
		<div class="fpc-menu" id="fpc-app-settings">
			<label for="_fbfp[appid]">Facebook Application ID:</label>
			<p>
				<input type="text" id="_fbfp[appid]" name="_fbfp[appid]" value="<?php echo $meta['appid']; ?>">
				<div class="desc">
					Enter the Application ID of your Facebook Application. Learn how to create your Facebook application
					<a href="http://www.facebook.com/FanpageConnect?sk=app_201667116527432" target="_blank">here</a>.
				</div>
			</p>

			<label for="_fbfp[appsecret]">Facebook Application Secret:</label>
			<p>
				<input type="text" id="_fbfp[appsecret]" name="_fbfp[appsecret]" value="<?php echo $meta['appsecret']; ?>">
				<div class="desc">Enter the Application Secret of your Facebook Application.</div>
			</p>
		</div>

		<div class="fpc-menu-header" id="hdr-menu-settings">Menu Settings</div>
		<div class="fpc-menu" id="fpc-menu-settings">
			<label for="_fbfp[use_menu]">Use Menu In Page?</label>
			<select id="_fbfp[use_menu]" name="_fbfp[use_menu]">
			<?php if($meta['use_menu'] == "true") { ?>
			<option value="defer">Defer to Global</option>
			<option value="false">No</option>
			<option value="true" selected="selected">Yes</option>
			<?php } elseif($meta['use_menu'] == "false") { ?>
			<option value="defer">Defer to Global</option>
			<option value="false" selected="selected">No</option>
			<option value="true">Yes</option>
			<?php } else { ?>
			<option value="defer" selected="selected">Defer to Global</option>
			<option value="false">No</option>
			<option value="true">Yes</option>
			<?php } ?>
			</select>
			<p>
				<div class="desc">
					This will override your global setting for fan pages and use your custom menu in the page.
				</div>
			</p>

			<label for="_fbfp[show_menu]">Display Menu:</label>
			<select id="_fbfp[show_menu]" name="_fbfp[show_menu]">
			<?php if($meta['show_menu'] == "liked") { ?>
			<option value="defer">Defer to Global</option>
			<option value="always">Always</option>
			<option value="liked" selected="selected">Only When &quot;Liked&quot;</option>
			<?php } elseif($meta['show_menu'] == "always") { ?>
			<option value="defer">Defer to Global</option>
			<option value="always" selected="selected">Always</option>
			<option value="liked">Only When &quot;Liked&quot;</option>
			<?php } else { ?>
			<option value="defer">Defer to Global</option>
			<option value="always" selected="selected">Always</option>
			<option value="liked">Only When &quot;Liked&quot;</option>
			<?php } ?>
			</select>
			<p>
				<div class="desc">
					This will override your global setting for how to display your custom menu if it's enabled.
				</div>
			</p>
		</div>

		<div class="fpc-menu-header" id="hdr-css-settings">CSS Settings</div>
		<div class="fpc-menu" id="fpc-css-settings">
			<label for="_fbfp[csslink]">Custom CSS link:</label>
			<p>
				<input type="text" id="_fbfp[csslink]" name="_fbfp[csslink]" value="<?php echo $meta['csslink']; ?>">
				<div class="desc">Enter the URL of the CSS file you'd like to use on your fanpage.</div>
			</p>

			<label for="_fbfp[css]">Custom CSS:</label>
			<p>
				<textarea id="_fbfp[css]" name="_fbfp[css]"><?php echo $meta['css']; ?></textarea>
				<div class="desc">Copy and paste any CSS you'd like to use on your fanpage. This will be loaded after any other CSS file</div>
			</p>
		</div>

		<div class="fpc-menu-header" id="hdr-hdrftr-settings">Header/Footer Content</div>
		<div class="fpc-menu" id="fpc-hdrftr-settings">
			<label for="_fbfp[header]">Custom Header Content:</label>
			<p>
				<textarea id="_fbfp[header]" name="_fbfp[header]"><?php echo $meta['header']; ?></textarea>
				<div class="desc">Paste any custom header content here. It'll be displayed in the &lt;div id="header"&gt; div.</div>
			</p>

			<label for="_fbfp[footer]">Custom Footer Content:</label>
			<p>
				<textarea id="_fbfp[footer]" name="_fbfp[footer]"><?php echo $meta['footer']; ?></textarea>
				<div class="desc">Paste any custom footer content here. It'll be displayed in the &lt;div id="footer"&gt; div.</div>
			</p>
		</div>

		<div class="fpc-menu-header" id="hdr-misc-settings">Miscellaneous Settings</div>
		<div class="fpc-menu" id="fpc-misc-settings">

			<label for="_fbfp[show_comments]">Display Comments:</label>
			<select id="_fbfp[show_comments]" name="_fbfp[show_comments]">
			<?php if($meta['show_comments'] == "liked" || $meta['show_comments'] == '' || is_null($meta['show_comments'])) { ?>
			<option value="always">Always</option>
			<option value="liked" selected="selected">Only When &quot;Liked&quot;</option>
			<?php } else { ?>
			<option value="always" selected="selected">Always</option>
			<option value="liked">Only When &quot;Liked&quot;</option>
			<?php } ?>
			</select>
			<p>
				<div class="desc">
					To display Facebook comments you'll need to enable comments on your page.
				</div>
			</p>

			<label for="_fbfp[template]">Custom Template:</label>
			<?php echo $this->fpc_get_templates($meta['template']); ?>

		</div>

	</div><!-- fpc_other_meta -->

	<?php else: ?>

	<span class="fpc_unregged">Please register the plugin to activate it. (Registration is free)</span><br>
	Go to the <a href="admin.php?page=fanpage-connect.php">Fanpage Connect settings page</a> to activate the plugin.<br>

	<?php endif; ?>

</div><!-- fpc_meta_control -->
<script>
jQuery(document).ready(function(){
	jQuery("#_fbfp_isfanpage").change(function(){
		if(jQuery(this).val() == "true"){
			jQuery("#fpc_other_meta").slideDown("fast");
		} else {
			jQuery("#fpc_other_meta").slideUp("fast");
		}
	});
	jQuery("#hdr-app-settings").click(function(){fpcToggleMenu(jQuery(this),"fpc-app-settings")});
	jQuery("#hdr-menu-settings").click(function(){fpcToggleMenu(jQuery(this),"fpc-menu-settings")});
	jQuery("#hdr-css-settings").click(function(){fpcToggleMenu(jQuery(this),"fpc-css-settings")});
	jQuery("#hdr-hdrftr-settings").click(function(){fpcToggleMenu(jQuery(this),"fpc-hdrftr-settings")});
	jQuery("#hdr-misc-settings").click(function(){fpcToggleMenu(jQuery(this),"fpc-misc-settings")});
});

function fpcToggleMenu($el,t){
	if($el.hasClass('fpc-open')){
		$el.removeClass('fpc-open');
		jQuery("#"+t).slideUp("fast");
	} else {
		$el.addClass('fpc-open');
		jQuery("#"+t).slideDown("fast");
	}
}
</script>