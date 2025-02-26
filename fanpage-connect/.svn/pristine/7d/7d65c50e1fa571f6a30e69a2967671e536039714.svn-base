<?php
global $wp_filter;
global $post;
$this_id = $post->ID;
$nonce = wp_create_nonce("app_sidebar_nonce");

?>
<div class="fpc_meta_control">
<?php if($this->plugin_activated): ?>

	<div class="option-header">Facebook Page Settings</div>
	<div class="app-options-closed">
		<table border="0" class="fpc-option-table">
			<tr>
				<td class="label-td"><label for="fpcpage_app">Facebook App to Use:</label></td>
				<td class="option-td">
					<?php
					$old_post = $post;
					$args = array('post_type' => 'fpc-app', 'nopaging'  => true);
					$query = new WP_Query( $args );
					if($query->have_posts()) {
						echo "<select id='fpcpage_app' name='_fpcpage[app]'>\n";
						echo "<option value=''>Select an App</option>\n";
						while ( $query->have_posts() ) {
							$query->the_post();
							echo "<option value='".$post->ID."'>".get_the_title()."</option>\n";
						}
						echo "</select>\n";
					} else {
						?>
						<input type="hidden" id="fpcpage_app" name="_fpcpage[app]" value="">
						<p class="fpc-note">
							You have no registered/published Apps! You'll need to <a href="post-new.php?post_type=fpc-app">create one</a>
							in order to use fan gates and like buttons!
						</p>
						<?php
					}
					wp_reset_postdata();
					$post = $old_post;
					?>
				</td>
			</tr>
		</table>
	</div>
	<div class="option-header">Open Graph Settings</div>
	<div class="app-options-closed">
		<table border="0" class="fpc-option-table">
			<tr>
				<td class="label-td"><label for="fpcpage_ogtitle">Title:</label></td>
				<td class="option-td">
					<input type="text" id="fpcpage_ogtitle" name="_fpcpage[ogtitle]" value="<?php echo $meta['ogtitle']; ?>" size="60">
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fpcpage_ogtype">Type:</label></td>
				<td class="option-td">
					<select id="fpcpage_ogtype" name="_fpcpage[ogtype]">
						<?php include FPC_PLUGIN_DIR.'/util/fanpage-connect-fb-ogtypes.php'; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fpcpage_ogimg">Site Image URL:</label></td>
				<td class="option-td">
					<input type="text" id="fpcpage_ogimg" name="_fpcpage[ogimg]" value="<?php echo $meta['ogimg']; ?>" size="60">
					<button id="btn_ogimg">Select Image</button>
					<p>
						The image must be at least 50px by 50px and have a maximum aspect ratio of 3:1.<br>
						We support PNG, JPEG and GIF formats.
					</p>
				</td>
			</tr>
		</table>
	</div>
	<div class="option-header">Menu Options</div>
	<div class="app-options-closed">
		<table border="0" class="fpc-option-table">
			<tr>
				<td class="label-td"><label for="fpcpage_use_menu">Use Menu in Page?</label></td>
				<td class="option-td">
					<select id="fpcpage_use_menu" name="_fpcpage[use_menu]">
						<option value="false">No</option>
						<option value="true">Yes</option>
						<!--<option value="defer">Defer to Global</option>-->
					</select>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fpcpage_menu">Menu to Use</label></td>
				<td class="option-td">
					<?php
						$menus = wp_get_nav_menus();
						if(empty($menus)){
					?>
					<strong>No menus available</strong>
					<input type="hidden" id="fpcpage_menu" name="_fpcpage[menu]" value="">
					<?php } else { ?>
					<select id="fpcpage_menu" name="_fpcpage[menu]">
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
				<td class="label-td"><label for="fpcpage_show_menu">Display Menu</label></td>
				<td class="option-td">
					<select id="fpcpage_show_menu" name="_fpcpage[show_menu]">
						<option value="liked">When page is &quot;Liked&quot;</option>
						<option value="always">Always</option>
						<!--<option value="defer">Defer to Global</option>-->
					</select>
					<p>
						You can create custom menus in the <a href="http://localhost/wp/wp-admin/nav-menus.php">Appearance &gt; Menus</a> tab and
						use them in your fan pages.<br>If you're going to use menus, we suggest you create menus specifically for your fan pages.
					</p>
				</td>
			</tr>
		</table>
	</div>
	<div class="option-header">Layout &amp; CSS Options</div>
	<div class="app-options-closed">
		<table border="0" class="fpc-option-table">
			<tr>
				<td class="label-td"><label for="fpcpage_csslink">Header Content:</label></td>
				<td class="option-td">
					<div class="custom-editor-container">
						<textarea class="custom-editor" name="_fpcpage[header_content]"><?php echo wp_richedit_pre($meta['header_content']); ?></textarea>
					</div>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fpcpage_csslink">Footer Content:</label></td>
				<td class="option-td">
					<div class="custom-editor-container">
						<textarea class="custom-editor" name="_fpcpage[footer_content]"><?php echo wp_richedit_pre($meta['footer_content']); ?></textarea>
					</div>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fpcpage_csslink">Header Widget:</label></td>
				<td class="option-td">
					<select id="fpcpage_header_widget" name="_fpcpage[header_widget]" class="widget-select">
						<?php if(isset($meta['app'])) { echo $this->build_app_sidebar_select($meta['app']); } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fpcpage_side_widgets">Sidebar Widget:</label></td>
				<td class="option-td">
					<select id="fpcpage_side_widget" name="_fpcpage[side_widget]" class="widget-select">
						<?php if(isset($meta['app'])) { echo $this->build_app_sidebar_select($meta['app']); } ?>
					</select>
					<select id="fpcpage_side_widget_lr" name="_fpcpage[side_widget_lr]" >
						<option value="right">Right Side</option>
						<option value="left">Left Side</option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fpcpage_side_widgets">Footer Widget:</label></td>
				<td class="option-td">
					<select id="fpcpage_footer_widget" name="_fpcpage[footer_widget]" class="widget-select">
						<?php if(isset($meta['app'])) { echo $this->build_app_sidebar_select($meta['app']); } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fpcpage_csslink">Custom CSS link:</label></td>
				<td class="option-td">
					<input type="text" id="fpcpage_csslink" name="_fpcpage[csslink]" value="<?php echo $meta['csslink']; ?>">
					<img src="<?php echo FPC_PLUGIN_URL; ?>/img/layout.png" id="layout-img">
					<p>Enter the URL of the CSS file you'd like to use on your fanpage.</p>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fpcpage_css">Custom CSS:</label></td>
				<td class="option-td">
					<textarea id="fpcpage_css" name="_fpcpage[css]"><?php echo $meta['css']; ?></textarea>
					<p>Copy and paste any CSS you'd like to use on your fanpage. This will be loaded after any other CSS file</p>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fpcpage_template">Custom Template:</label></td>
				<td class="option-td">
					<?php echo $this->get_custom_templates($meta['template'],'fpcpage'); ?>
				</td>
			</tr>
		</table>
	</div>
	<div class="option-header">Miscellaneous Options</div>
	<div class="app-options-closed">
		<table border="0" class="fpc-option-table">
			<tr>
				<td class="label-td"><label for="fpcpage_show_comments">Display Comments:</label></td>
				<td class="option-td">
					<select id="fpcpage_show_comments" name="_fpcpage[show_comments]">
						<option value="liked" selected="selected">Only When &quot;Liked&quot;</option>
						<option value="always">Always</option>
					</select>
					<p>
						To display Facebook comments you'll need to enable comments on your page.
					</p>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fpcpage_pop_links">Link Control:</label></td>
				<td class="option-td">
					<p>
						<?php if(!empty($meta['pop_links'])): ?>
						<input type="checkbox" name="_fpcpage[pop_links]" id="fpcpage_pop_links" checked="checked" value="1">
						<?php else: ?>
						<input type="checkbox" name="_fpcpage[pop_links]" id="fpcpage_pop_links" value="1">
						<?php endif; ?>
						Auto-force links to open in a new window (see help for details).
					</p>
					<P>
						<?php if(!empty($meta['pop_forms'])): ?>
						<input type="checkbox" name="_fpcpage[pop_forms]" id="fpcpage_pop_forms" checked="checked" value="1">
						<?php else: ?>
						<input type="checkbox" name="_fpcpage[pop_forms]" id="fpcpage_pop_forms" value="1">
						<?php endif; ?>
						Auto-force forms to post to a new window (see help for details).
					</p>
				</td>
			</tr>
			<tr>
				<td class="label-td"><label for="fbfp_drop_iframe">Page/iFrame Control:</label></td>
				<td class="option-td">
					<?php if(!empty($meta['drop_iframe'])): ?>
					<input type="checkbox" name="_fpcpage[drop_iframe]" id="fpcpage_drop_iframe" checked="checked" value="1">
					<?php else: ?>
					<input type="checkbox" name="_fpcpage[drop_iframe]" id="fpcpage_drop_iframe" value="1">
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

	tinyMCE.init({
		skin: 'wp_theme',
		width : 500,
		selector : '.custom-editor'
	});

	if(String('<?php echo $meta['app']; ?>') != '') { jQuery("#fpcpage_app").val('<?php echo $meta['app']; ?>'); }
	if(String('<?php echo $meta['use_menu']; ?>') != '') { jQuery("#fpcpage_use_menu").val('<?php echo $meta['use_menu']; ?>'); }
	if(String('<?php echo $meta['menu']; ?>') != '') { jQuery("#fpcpage_menu").val('<?php echo $meta['menu']; ?>'); }
	if(String('<?php echo $meta['show_menu']; ?>') != '') { jQuery("#fpcpage_show_menu").val('<?php echo $meta['show_menu']; ?>'); }
	if(String('<?php echo $meta['show_comments']; ?>') != '') { jQuery("#show_comments").val('<?php echo $meta['show_comments']; ?>'); }
	if(String('<?php echo $meta['ogtype']; ?>') != '') { jQuery("#fpcpage_ogtype").val('<?php echo $meta['ogtype']; ?>'); }
	if(String('<?php echo $meta['header_widget']; ?>') != '') { jQuery("#fpcpage_header_widget").val('<?php echo $meta['header_widget']; ?>'); }
	if(String('<?php echo $meta['side_widget']; ?>') != '') { jQuery("#fpcpage_side_widget").val('<?php echo $meta['side_widget']; ?>'); }
	if(String('<?php echo $meta['side_widget_lr']; ?>') != '') { jQuery("#fpcpage_side_widget_lr").val('<?php echo $meta['side_widget_lr']; ?>'); }
	if(String('<?php echo $meta['footer_widget']; ?>') != '') { jQuery("#fpcpage_footer_widget").val('<?php echo $meta['footer_widget']; ?>'); }

	var oldApp = '<?php echo $meta[app]; ?>';
	var newApp = '<?php echo $meta[app]; ?>';
	var templates = '<?php echo FPC_TEMPLATES_URL; ?>/';
	var $redirSelect = jQuery('#redirect_select');
	var $redirOther = jQuery('#redirect_other');
	var $fbRedirect = jQuery('#fpcpage_redirect');

	// check the redirect valueand auto-set the dropdowns
	if($fbRedirect.val() == '') {
		$redirSelect.val($fbRedirect.val());
		$redirOther.val($fbRedirect.val());
	} else if (jQuery('#redirect_select option[value="'+$fbRedirect.val()+'"]').val() == $fbRedirect.val()) {
		$redirSelect.val($fbRedirect.val());
		$redirOther.val('');
	} else {
		$redirSelect.val('other');
		$redirOther.val($fbRedirect.val());
	}

	$redirSelect.on('change',function(){
		$this = jQuery(this);
		if($this.val() == 'other'){
			$fbRedirect.val($redirOther.val());
			$redirOther.focus();
		} else {
			$redirOther.val('');
			$fbRedirect.val($this.val());
		}
	});

	$redirOther.on('change keypress keydown keyup',function(){
		$this = jQuery(this);
		if($this.val() == ''){
			$redirSelect.val('');
		} else {
			$redirSelect.val('other');
		}
		$fbRedirect.val($this.val());
	});

	jQuery('#template_preview').on('click',function(e){
		e.preventDefault();
		e.stopPropagation();
		templateDir = jQuery('#fpcpage_template').val();
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

	jQuery('#fpcpage_app').on('change',function(){
		newApp = jQuery(this).val();
		getAppSidebars();
	});
	jQuery('#fpcpage_header_widget').on('change',function(){
		showLayout();
	});
	jQuery('#fpcpage_side_widget').on('change',function(){
		showLayout();
	});
	jQuery('#fpcpage_side_widget_lr').on('change',function(){
		showLayout();
	});
	jQuery('#fpcpage_footer_widget').on('change',function(){
		showLayout();
	});

	function showLayout(){
		headw = jQuery('#fpcpage_header_widget').val();
		sidew = jQuery('#fpcpage_side_widget').val();
		sides = jQuery('#fpcpage_side_widget_lr').val();
		footw = jQuery('#fpcpage_footer_widget').val();
		img = jQuery('#layout-img');
		baseImg = '<?php echo FPC_PLUGIN_URL; ?>/img/layout';
		h = (headw == '')? '' : 'h';
		s = (sidew == '')? '' : 's' + sides.charAt(0);
		f = (footw == '')? '' : 'f';
		img.attr('src',baseImg+h+s+f+'.png');
	}

	function getAppSidebars(){
		if(newApp != oldApp){
			oldApp = newApp;
			uid = new Date().getTime();
			jQuery('.widget-select').attr('disabled','disabled');
			jQuery('#fpcpage_side_widget_lr').attr('disabled','disabled');
			appReq = jQuery.ajax({
				type : 'post',
				dataType : 'json',
				url : 'admin-ajax.php',
				data : { action : 'get_app_sidebars', post_id : newApp, uid : uid }
			});
			appReq.done(function(data){
				data.widgetNum = parseInt(data.widgetNum);
				if(data.widgetNum > 0 && data.widgetName != '' && data.widgetBase != '') {
					selectContent = '<option value="">None</option>';
					for(i = 1; i < data.widgetNum+1; i++){
						sc = (i < 10)? '0'+i : i;
						selectContent += '<option value="'+data.widgetBase+'-'+sc+'">'+data.widgetName+' '+sc+'</option>';
					}
					jQuery('.widget-select').html(selectContent);
					showLayout();
				} else {
					showNoSidebars();
				}
			});
			appReq.fail(function(jqXHR, textStatus, errorThrown){
				showNoSidebars();
			});
			jQuery('.widget-select').removeAttr('disabled');
			jQuery('#fpcpage_side_widget_lr').removeAttr('disabled');
		}
		/* else {
			showNoSidebars();
		}*/
	}

	function showNoSidebars(){
		jQuery('.widget-select').html('<option value="">None</option>');
		showLayout();
	}

	var file_frame;
	jQuery('#btn_ogimg').on('click', function(e){
		e.stopPropagation();
		e.preventDefault();
		if (file_frame) {
			file_frame.open();
			return;
		}
		file_frame = wp.media.frames.file_frame = wp.media({
			title: 'Open Graph Image Picker',
			button: {
				text: 'Select an Image'
			},
			library: { type : 'image'},
			multiple: false
		});
		file_frame.on('select', function() {
			attachment = file_frame.state().get('selection').first().toJSON();
			jQuery('#fpcpage_ogimg').val(attachment.url);
		});
		file_frame.open();
	});

	showLayout();
	getAppSidebars();

});
</script>