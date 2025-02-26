<?php
//-- PX Slider Admin options ------------------------------
//---------------------------------------------------------
function pxslider_admin_page(){
	global $px_message; ?>
	<div class="wrap" style="width:820px;position: relative;"><div id="icon-options-general" class="icon32"><br /></div>
	<?php if(isset($px_message) && $px_message) { ?><div class="updated" id="px_message"><p><strong><?php _e($px_message,'pxslider'); ?></strong></p></div><?php } ?>
	<h2><?php _e('PxSlider '.pxs_get_version().' options Page','pxslider'); ?></h2>
	
	<div class="pxslider-wrapper">
		<!-- WP-Banner Starts Here -->
		<div id="wp_banner">
			<!-- Top Section Starts Here -->
			<div class="top_section">
				<!-- Begin MailChimp Signup Form -->
				<link type="text/css" rel="stylesheet" href="http://cdn-images.mailchimp.com/embedcode/classic-081711.css">
				<style type="text/css">
					#mc_embed_signup{ clear:left; font:14px Helvetica,Arial,sans-serif; }
					/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
					   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
				</style>
				<div id="mc_embed_signup">
					<form novalidate="" target="_blank" class="validate" name="mc-embedded-subscribe-form" id="mc-embedded-subscribe-form" method="post" action="http://wpfruits.us6.list-manage.com/subscribe/post?u=166c9fed36fb93e9202b68dc3&amp;id=bea82345ae">
						<div class="mc-field-group">
							<input type="email" id="mce-EMAIL" class="required email" name="EMAIL" value="" placeholder="Our Newsletter Just Enter Your Email Here" />
							<input type="submit" class="button" id="mc-embedded-subscribe" name="subscribe" value="" onclick="return wp_jsvalid();">
							<div style="clear:both;"></div>
						</div>
						<div class="clear" id="mce-responses">
							<div style="display:none" id="mce-error-response" class="response"></div>
							<div style="display:none" id="mce-success-response" class="response"></div>
						</div>	
						
					</form>
				</div>
				<script type="text/javascript">
					var fnames = new Array();var ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';
					try {
						var jqueryLoaded=jQuery;
						jqueryLoaded=true;
					} catch(err) {
						var jqueryLoaded=false;
					}
					var head= document.getElementsByTagName('head')[0];
					if (!jqueryLoaded) {
						var script = document.createElement('script');
						script.type = 'text/javascript';
						script.src = 'http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js';
						head.appendChild(script);
						if (script.readyState &amp;&amp; script.onload!==null){
							script.onreadystatechange= function () {
								  if (this.readyState == 'complete') mce_preload_check();
							}    
						}
					}
					var script = document.createElement('script');
					script.type = 'text/javascript';
					script.src = 'http://downloads.mailchimp.com/js/jquery.form-n-validate.js';
					head.appendChild(script);
					var err_style = '';
					try{
						err_style = mc_custom_error_style;
					} catch(e){
						err_style = '#mc_embed_signup input.mce_inline_error{border-color:#6B0505;} #mc_embed_signup div.mce_inline_error{margin: 0 0 1em 0; padding: 5px 10px; background-color:#6B0505; font-weight: bold; z-index: 1; color:#fff;}';
					}
					var head= document.getElementsByTagName('head')[0];
					var style= document.createElement('style');
					style.type= 'text/css';
					if (style.styleSheet) {
						style.styleSheet.cssText = err_style;
					} else {
						style.appendChild(document.createTextNode(err_style));
					}
					head.appendChild(style);
					setTimeout('mce_preload_check();', 250);

					var mce_preload_checks = 0;
					function mce_preload_check(){
						if (mce_preload_checks&gt;40) return;
						mce_preload_checks++;
						try {
							var jqueryLoaded=jQuery;
						} catch(err) {
							setTimeout('mce_preload_check();', 250);
							return;
						}
						try {
							var validatorLoaded=jQuery("#fake-form").validate({});
						} catch(err) {
							setTimeout('mce_preload_check();', 250);
							return;
						}
						mce_init_form();
					}
					function mce_init_form()
					{
						jQuery(document).ready( function($) 
						{
						  var options = { errorClass: 'mce_inline_error', errorElement: 'div', onkeyup: function(){}, onfocusout:function(){}, onblur:function(){}  };
						  var mce_validator = $("#mc-embedded-subscribe-form").validate(options);
						  $("#mc-embedded-subscribe-form").unbind('submit');//remove the validator so we can get into beforeSubmit on the ajaxform, which then calls the validator
						  options = { url: 'http://wpfruits.us6.list-manage.com/subscribe/post-json?u=166c9fed36fb93e9202b68dc3&amp;id=bea82345ae&amp;c=?', type: 'GET', dataType: 'json', contentType: "application/json; charset=utf-8",
										beforeSubmit: function(){
											$('#mce_tmp_error_msg').remove();
											$('.datefield','#mc_embed_signup').each(
												function(){
													var txt = 'filled';
													var fields = new Array();
													var i = 0;
													$(':text', this).each(
														function(){
															fields[i] = this;
															i++;
														});
													$(':hidden', this).each(
														function(){
															var bday = false;
															if (fields.length == 2){
																bday = true;
																fields[2] = {'value':1970};//trick birthdays into having years
															}
															if ( fields[0].value=='MM' &amp;&amp; fields[1].value=='DD' &amp;&amp; (fields[2].value=='YYYY' || (bday &amp;&amp; fields[2].value==1970) ) ){
																this.value = '';
															} else if ( fields[0].value=='' &amp;&amp; fields[1].value=='' &amp;&amp; (fields[2].value=='' || (bday &amp;&amp; fields[2].value==1970) ) ){
																this.value = '';
															} else {
																if (/\[day\]/.test(fields[0].name)){
																	this.value = fields[1].value+'/'+fields[0].value+'/'+fields[2].value;									        
																} else {
																	this.value = fields[0].value+'/'+fields[1].value+'/'+fields[2].value;
																}
															}
														});
												});
											return mce_validator.form();
										}, 
										success: mce_success_cb
									};
						  $('#mc-embedded-subscribe-form').ajaxForm(options);

						});
					}
					function mce_success_cb(resp){
						$('#mce-success-response').hide();
						$('#mce-error-response').hide();
						if (resp.result=="success"){
							$('#mce-'+resp.result+'-response').show();
							$('#mce-'+resp.result+'-response').html(resp.msg);
							$('#mc-embedded-subscribe-form').each(function(){
								this.reset();
							});
						} else {
							var index = -1;
							var msg;
							try {
								var parts = resp.msg.split(' - ',2);
								if (parts[1]==undefined){
									msg = resp.msg;
								} else {
									i = parseInt(parts[0]);
									if (i.toString() == parts[0]){
										index = parts[0];
										msg = parts[1];
									} else {
										index = -1;
										msg = resp.msg;
									}
								}
							} catch(e){
								index = -1;
								msg = resp.msg;
							}
							try{
								if (index== -1){
									$('#mce-'+resp.result+'-response').show();
									$('#mce-'+resp.result+'-response').html(msg);            
								} else {
									err_id = 'mce_tmp_error_msg';
									html = '&lt;div id="'+err_id+'" style="'+err_style+'"&gt; '+msg+'&lt;/div&gt;';
									
									var input_id = '#mc_embed_signup';
									var f = $(input_id);
									if (ftypes[index]=='address'){
										input_id = '#mce-'+fnames[index]+'-addr1';
										f = $(input_id).parent().parent().get(0);
									} else if (ftypes[index]=='date'){
										input_id = '#mce-'+fnames[index]+'-month';
										f = $(input_id).parent().parent().get(0);
									} else {
										input_id = '#mce-'+fnames[index];
										f = $().parent(input_id).get(0);
									}
									if (f){
										$(f).append(html);
										$(input_id).focus();
									} else {
										$('#mce-'+resp.result+'-response').show();
										$('#mce-'+resp.result+'-response').html(msg);
									}
								}
							} catch(e){
								$('#mce-'+resp.result+'-response').show();
								$('#mce-'+resp.result+'-response').html(msg);
							}
						}
					}

				</script>
				<!--End mc_embed_signup-->
			</div>
			<!-- Top Section Ends Here -->
			
			<!-- Bottom Section Starts Here -->
			<div class="bot_section">
				<a href="http://www.wpfruits.com/" class="wplogo" target="_blank" title="WFruits.com"></a>
				<a href="https://www.facebook.com/pages/WPFruitscom/443589065662507" class="fbicon" target="_blank" title="Facebook"></a>
				<a href="http://www.twitter.com/wpfruits" class="twicon" target="_blank" title="Twitter"></a>
				<div style="clear:both;"></div>
			</div>
			<!-- Bottom Section Ends Here -->
		</div>
		<!-- WP-Banner Ends Here -->
	
	</div>
	
	<?php wp_nonce_field('update-options'); ?>
	<form method="post">
	<?php $options = get_option('pxslider_options'); ?>

		<?php
			if(mkdir(PXSLIDERPATH.'/tmp')){
			   rmdir(PXSLIDERPATH.'/tmp'); 
			}
			else{
				_e('<small class="pxs_oopserr">oops!!! Seems like the directory permission are not set right so you may see some distortion in images.<br/>Please set the directory permission for the folder "thumb" inside px-slider plugin directory to 777.</small>','pxslider');
			}
		?>
		
		<div class='pxslider_scode_wrapper'>
			<h5 style='text-align:center' class='px_shortinfo'>
				<?php _e("Use Shortcode", 'pxslider'); ?><br> 
				<span style='font-size:14px;font-weight: bold;'><?php _e("[pxslider]", 'pxslider'); ?></span>
				<br><?php _e(" ' or '", 'pxslider'); ?><br>
				<?php _e("Use Template Code", 'pxslider'); ?><br> 
				<span style='font-size:14px;font-weight: bold;'>&lt;?php if(function_exists('pxslider')){ pxslider(); } ?&gt;</span>
			</h5>
		</div>
		
		<div id="poststuff">
			<div class="postbox" id="pxslider_wrap">
				<div class="handlediv" title="Click to toggle"><br/></div>
				<h3 class="hndle"><span><?php _e("General Settings", 'pxslider'); ?></span></h3>
				<div class="inside" style="padding: 10px;">		
					<input type="hidden" name="settings-updated" value="true">
					<table class="pxs_admintbl">
					
						<thead>
							<tr><td><?php _e("Select Category",'pxslider'); ?></td><td><?php wp_dropdown_categories( array( 'show_option_all' =>'' ,'taxonomy' => 'category','id'=>'px_catid','name' => 'pxslider_options[px_catid]','selected' =>$options['cat_id'] )); ?></td></tr>
							<tr><td><?php _e("No. of posts",'pxslider'); ?></td><td><input type="text" name="pxslider_options[no_of_posts]" value="<?php echo $options['no_of_posts'] ?>" size="2" />&nbsp;<small>(<?php _e("default: 3",'pxslider'); ?>)</small></td></tr>
						</thead>
						
							<tr><td><?php _e("Custom Images",'pxslider'); ?></td><td>&nbsp;<input type="checkbox" id="pxs_custmImgs" name="pxslider_options[customImgs]" <?php if($options['customImgs']){ ?> checked <?php } ?> value="true"/> <label for="pxs_custmImgs" ><?php _e('Check it, if you want to use <b>"Custom Images instead of Category".</b>.','pxslider') ?></label></td></tr>						
						
						<tr class="pxs_custmimgs">
							<td colspan="2">
							<table class="pxs_admintbl" cellspacing="0">
								<tr><td><?php _e("Custom Image-1 URL",'pxslider'); ?></td><td><input type="text" class="pxs_uploadimg" name="pxslider_options[img1url]" value="<?php echo $options['img1url'] ?>" /><input class="pxs_uploadbtn button" type="button" value="Upload Image" /></td></tr>
								<tr><td><?php _e("Custom Image-2 URL",'pxslider'); ?></td><td><input type="text" class="pxs_uploadimg" name="pxslider_options[img2url]" value="<?php echo $options['img2url'] ?>" /><input class="pxs_uploadbtn button" type="button" value="Upload Image" /></td></tr>
								<tr><td><?php _e("Custom Image-3 URL",'pxslider'); ?></td><td><input type="text" class="pxs_uploadimg" name="pxslider_options[img3url]" value="<?php echo $options['img3url'] ?>" /><input class="pxs_uploadbtn button" type="button" value="Upload Image" /></td></tr>
								<tr><td><?php _e("Custom Image-4 URL",'pxslider'); ?></td><td><input type="text" class="pxs_uploadimg" name="pxslider_options[img4url]" value="<?php echo $options['img4url'] ?>" /><input class="pxs_uploadbtn button" type="button" value="Upload Image" /></td></tr>
								<tr><td><?php _e("Custom Image-5 URL",'pxslider'); ?></td><td><input type="text" class="pxs_uploadimg" name="pxslider_options[img5url]" value="<?php echo $options['img5url'] ?>" /><input class="pxs_uploadbtn button" type="button" value="Upload Image" /></td></tr>
								<tr><td><?php _e("Custom Image-6 URL",'pxslider'); ?></td><td><input type="text" class="pxs_uploadimg" name="pxslider_options[img6url]" value="<?php echo $options['img6url'] ?>" /><input class="pxs_uploadbtn button" type="button" value="Upload Image" /></td></tr>	
							</table>
							</td>
						</tr>
					
						<tr><td><?php _e("Select Bg Layers Set",'pxslider'); ?></td>
						<td>
							<label class="pxs_bglyrset <?php if($options['bglayerSet'] == "Set-1"){ echo "active";} ?>" for="pxs_bglyrset1" style="background:#e7e7e7 url('<?php echo plugins_url('images/',__FILE__) ?>set1.jpg');"><input type="radio" name="pxslider_options[bglayerSet]" <?php if($options['bglayerSet'] == "Set-1"){ echo "checked='checked'";} ?> value="Set-1" id="pxs_bglyrset1" ></label>
							<label class="pxs_bglyrset <?php if($options['bglayerSet'] == "Set-2"){ echo "active";} ?>" for="pxs_bglyrset2" style="background:#e7e7e7 url('<?php echo plugins_url('images/',__FILE__) ?>set2.jpg');"><input type="radio" name="pxslider_options[bglayerSet]" <?php if($options['bglayerSet'] == "Set-2"){ echo "checked='checked'";} ?> value="Set-2" id="pxs_bglyrset2" ></label>
							<label class="pxs_bglyrset <?php if($options['bglayerSet'] == "Set-3"){ echo "active";} ?>" for="pxs_bglyrset3" style="background:#e7e7e7 url('<?php echo plugins_url('images/',__FILE__) ?>set3.jpg');"><input type="radio" name="pxslider_options[bglayerSet]" <?php if($options['bglayerSet'] == "Set-3"){ echo "checked='checked'";} ?> value="Set-3" id="pxs_bglyrset3" ></label>
							<label class="pxs_bglyrset <?php if($options['bglayerSet'] == "Set-4"){ echo "active";} ?>" for="pxs_bglyrset4" style="background:#e7e7e7 url('<?php echo plugins_url('images/',__FILE__) ?>set4.jpg');"><input type="radio" name="pxslider_options[bglayerSet]" <?php if($options['bglayerSet'] == "Set-4"){ echo "checked='checked'";} ?> value="Set-4" id="pxs_bglyrset4" ></label>
						</td>
						</tr>						
						<tr><td><?php _e("Custom Bg Layer's",'pxslider'); ?></td><td>&nbsp;<input type="checkbox" id="pxs_custmchk" name="pxslider_options[customBgs]" <?php if($options['customBgs']){ ?> checked <?php } ?> value="true"/> <label for="pxs_custmchk" ><?php _e('Check it, if you want to use <b>"Custom Bg-Layers"</b>.','pxslider') ?></label></td></tr>						
						<tr><td><?php _e("Custom Bg-Layer-1 URL",'pxslider'); ?></td><td><input type="text" class="pxs_uploadimg" name="pxslider_options[bg1url]" value="<?php echo $options['bg1url'] ?>" /><input class="pxs_uploadbtn button" type="button" value="Upload Image" /></td></tr>
						<tr><td><?php _e("Custom Bg-Layer-2 URL",'pxslider'); ?></td><td><input type="text" class="pxs_uploadimg" name="pxslider_options[bg2url]" value="<?php echo $options['bg2url'] ?>" /><input class="pxs_uploadbtn button" type="button" value="Upload Image" /></td></tr>
						<tr><td><?php _e("Custom Bg-Layer-3 URL",'pxslider'); ?></td><td><input type="text" class="pxs_uploadimg" name="pxslider_options[bg3url]" value="<?php echo $options['bg3url'] ?>" /><input class="pxs_uploadbtn button" type="button" value="Upload Image" /></td></tr>
						<tr><td><?php _e("Duration between slides",'pxslider'); ?></td><td><input type="text" name="pxslider_options[auto_play]" value="<?php echo $options['auto_play'] ?>" size="3" />&nbsp;<?php _e("in ms",'pxslider'); ?>&nbsp;<small>(<?php _e("default: 5000",'pxslider'); ?>)</small></td></tr>
						<tr><td><?php _e("Transition Speed",'pxslider'); ?></td><td><input type="text" name="pxslider_options[slide_speed]" value="<?php echo $options['slide_speed'] ?>" size="3" />&nbsp;<?php _e("in ms",'pxslider'); ?>&nbsp;<small>(<?php _e("default: 1000",'pxslider'); ?>)</small></td></tr>
						<tr><td><?php _e("Thumbnail Rotation",'pxslider'); ?></td><td><select name="pxslider_options[thumbRotation]"><option value="true" <?php selected('true', $options['thumbRotation']); ?>><?php _e("Yes",'pxslider'); ?></option><option value="false" <?php selected('false', $options['thumbRotation']); ?>><?php _e("No",'pxslider'); ?></option></select></td></tr>
						<tr><td><?php _e("Show navigation buttons",'pxslider'); ?></td><td><select name="pxslider_options[navigation]"><option value="true" <?php selected('true', $options['navigation']); ?>><?php _e("Yes",'pxslider'); ?></option><option value="false" <?php selected('false', $options['navigation']); ?>><?php _e("No",'pxslider'); ?></option></select></td></tr>
						<tr><td><?php _e("Circulation",'pxslider'); ?></td><td><select name="pxslider_options[circular]"><option value="true" <?php selected('true', $options['circular']); ?>><?php _e("Yes",'pxslider'); ?></option><option value="false" <?php selected('false', $options['circular']); ?>><?php _e("No",'pxslider'); ?></option></select></td></tr>
						<tr><td colspan="2"><br/><input type="submit" name="parallax_slider_submit" class="button button-primary" value="<?php _e('Save Settings','pxslider') ?>" /></td></tr>
					</table>
				</div>
			</div>
		</div>
	</form>
	
	<iframe class="pxslider_iframe" src="http://www.sketchthemes.com/sketch-updates/plugin-updates/pxslider-lite/pxslider-lite.php" width="250px" height="370px" scrolling="no" ></iframe> 
</div>
<?php
}
function pxslider_updates(){

$update_options = $_REQUEST['pxslider_options'];
$update_options['customImgs'] = (!isset($update_options['customImgs'])) ? 0 : $update_options['customImgs'];
$update_options['customBgs'] = (!isset($update_options['customBgs'])) ? 0 : $update_options['customBgs'];

	$updates = array(
	'cat_id' => $update_options['px_catid'],
	'no_of_posts' =>$update_options['no_of_posts'],
	'customImgs' =>$update_options['customImgs'],
	'img1url' =>$update_options['img1url'],
	'img2url' =>$update_options['img2url'],
	'img3url' =>$update_options['img3url'],
	'img4url' =>$update_options['img4url'],	
	'img5url' =>$update_options['img5url'],
	'img6url' =>$update_options['img6url'],	
	'bglayerSet' =>$update_options['bglayerSet'],
	'customBgs' =>$update_options['customBgs'],
	'bg1url' =>$update_options['bg1url'],
	'bg2url' =>$update_options['bg2url'],
	'bg3url' =>$update_options['bg3url'],
	'auto_play' => $update_options['auto_play'],
	'slide_speed' => $update_options['slide_speed'],
	'thumbRotation' => $update_options['thumbRotation'],
	'navigation' => $update_options['navigation'],
	'circular' =>$update_options['circular']
    );
return $updates;
}
// Reset to defaults
if (isset($_POST['pxslider-reset']) && $_POST['pxslider-reset'] == 1) {
    update_option('pxslider_options', pxslider_defaults());
    $px_message = 'Settings Reset to Default';
}
// Updated message
if (isset($_POST['settings-updated']) && $_POST['settings-updated'] == 'true') {
    $px_message = 'Settings saved';
}	
// Updated slider options
if(isset($_POST['parallax_slider_submit'])){
	update_option('pxslider_options', pxslider_updates());	
}
//---------------------------------------------------------//
?>