<?php 
function settings_page_for_ads_within_paragraph(){
global $mb_ads_within_paragraph_options;
	?>
	<style>
	#ads_within_paragraph_formstyle{
		width:650px;
		margin-top:20px;
		float:left;
	}
	#ads_within_paragraph_formstyle h3{
		padding: 7px 0 7px 5px;
		font-size: 15px;
	}
	</style>
	
	<div class="wrap">
   		<?php screen_icon();?>
        <h2>Ads Within Paragraph Settings</h2>
		<div id="ads_within_paragraph_formstyle" class="postbox">
		<div class="handlediv" title="Click to toggle"><br/></div>
		<h3 class="hndle"><span>General Settings</span></h3>
			<div class="inside">
			
				<form method="post" action="options.php">      
				<?php settings_fields('mb_ads_within_paragraph_group'); ?>
				
				<div style="width:600px; height:auto; background:">
				
					<label for = "ads_within_paragraph_settings[firstadcode_adcode]">Advertisement Code (Adsense, Bing, Yahoo, Media.net or any other ads)</label>
					</br>
						<textarea name="ads_within_paragraph_settings[firstadcode_adcode]" 
								  id="ads_within_paragraph_settings[firstadcode_adcode]"
								  cols="80" 
								  rows="12"><?php echo $mb_ads_within_paragraph_options['firstadcode_adcode']?></textarea>
								  
					</br>
					
					<label for = "ads_within_paragraph_settings[firstadcode_position]">Add</label>
					<select name="ads_within_paragraph_settings[firstadcode_position]">
                        <option value="To Left" <?php selected('To Left',$mb_ads_within_paragraph_options['firstadcode_position']) ?>>To Left</option>
                        <option value="To Right" <?php selected('To Right',$mb_ads_within_paragraph_options['firstadcode_position']) ?>>To Right</option>
                        <option value="Before" <?php selected('Before',$mb_ads_within_paragraph_options['firstadcode_position']) ?>>Before</option>
						<option value="After" <?php selected('After',$mb_ads_within_paragraph_options['firstadcode_position']) ?>>After</option>
					</select>
					
					<label for = "ads_within_paragraph_settings[firstadcode_paragraph]"> Paragraph</label>
					<input type = "text"
						   size="10"
						   id = "ads_within_paragraph_settings[firstadcode_paragraph]"
						   name= "ads_within_paragraph_settings[firstadcode_paragraph]"
						   value = "<?php echo $mb_ads_within_paragraph_options['firstadcode_paragraph']?>" />
					<br><br>
					<input type = "checkbox"
							id = "ads_within_paragraph_settings[showonpages]"
							name= "ads_within_paragraph_settings[showonpages]"
							value = "1" <?php checked('1',$mb_ads_within_paragraph_options['showonpages']) ?> />
					 <label for = "ads_within_paragraph_settings[showonpages]">Also add advertisement to pages</label>	   
						   
					<p class="submit">
					<input name="submit" type="submit" class="button-primary" value="Save Changes"/>
					</p>
					</form>
				
				</div>
				
			</div> <!--/inside-->
			
		</div> <!--/postbox-->
				
		<!--Add Facebook like box-->
		<div style="width:300px; float:left; margin: 20px 0 0 15px">
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			
			<div class="fb-like-box" data-href="https://www.facebook.com/MasterBlogster" data-width="250" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
		</div>
		<!--/Add Facebook like box-->
		
		<div style="clear:both">- Free WordPress Plugin By <a href="http://masterblogster.com" target="_blank">MasterBlogster</a></div>
	</div>
	<?php

}
add_action('admin_menu', 'add_mb_ads_within_paragraph_to_wp_setting_menu');
function add_mb_ads_within_paragraph_to_wp_setting_menu() {
    add_options_page('Ads Within Paragraph', 'Ads Within Paragraph', 'administrator', 'ads-within-paragraph-settings', 'settings_page_for_ads_within_paragraph'); //page_title, menu_title, capability, menu_slug, function
}

function mb_ads_within_paragraph_settings(){
	register_setting('mb_ads_within_paragraph_group', 'ads_within_paragraph_settings'); //group, option name
}
add_action('admin_init','mb_ads_within_paragraph_settings');

?>