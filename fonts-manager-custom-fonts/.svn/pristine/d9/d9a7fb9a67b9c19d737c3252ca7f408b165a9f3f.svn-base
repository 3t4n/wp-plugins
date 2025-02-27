<?php if ( ! defined( 'ABSPATH' ) ) exit;

$fmcfFntListArr = fmcf_font_nm_list_arr();
?>
<div class="fmcf_main_container">
<h1 class="fmcf_main_title">Font Plugin</h1>
<ul>
  <li class="fmcf_tab"><a href="<?php echo admin_url('admin.php?page=fmcf-upload-fonts-page');?>">Upload Fonts</a></li>
  <li class="fmcf_tab fmcf_tabSelected"><a>Google Fonts</a><span class="fmcf_active_tab"></span></li>
  <li class="fmcf_tab"><a href="<?php echo admin_url('admin.php?page=fmcf-assign-fonts');?>">Assign Fonts</a></li>
  <li class="fmcf_tab"><a href="<?php echo admin_url('admin.php?page=fmcf-set-color');?>">Color Settings</a></li>
</ul>
<div class="fmcf_container">
	<?php include FMCF_DIR_PATH.'views/fmcf-main.php';	
		$get_google_font_url = FMCF_PLUGIN_URL.'assests/fmcf-google-fonts.json';
		$getGoogleFontJson = file_get_contents($get_google_font_url);
		$googleFontJsonData = json_decode($getGoogleFontJson,true);
	?>
	<div class="">
		<div class="fmcf_google_font_tab_container">
		<a href="<?php echo admin_url('admin.php?page=fmcf-google-fonts');?>" class="fmcf_nav_btn fmcf_disable_btn">Google Fonts</a>
		<a href="<?php echo admin_url('admin.php?page=fmcf-predefined-fonts');?>" class="fmcf_nav_btn ">Local Fonts</a>
		
			
		</div>	
		<div class="fmcf_google_font_preview_container">				
			<div class="fmcf_field">
			<select id="fmcfGoogleFont" class="fmcf_font_list fmcf_gfont_list">
				<option>Select google font</option>
				<?php

				foreach($googleFontJsonData as $key => $val)
				{
					?>
						<option value="<?php echo $key; ?>"><?php echo $key; ?></option>
					<?php 
				}
				?>
			</select>
			</div>
			<div id="fmcf_google_font_preview_container">
			<!-- <div class="fmcf_gfont_preview_list">
				<div class="fmcf_gfont_preview">
					<div class="fmcf_gfont_weight">Regular 400</div>
					<div class="fmcf_gfont_ptext">How are you</div>
				</div>
				<div class="fmcf_gfont_add_btn"><button class="fmcf_font_add">Add</button></div>
			</div> -->
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
</div>

<script type="text/javascript">
	var getGoogleFntFmcfUrl = '<?php echo FMCF_PLUGIN_URL; ?>';
</script>
