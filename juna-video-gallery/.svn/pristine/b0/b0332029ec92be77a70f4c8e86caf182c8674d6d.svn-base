<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	global $wpdb;
	
	$table_name4  = $wpdb->prefix . "juna_it_video_effdb";

	$JIT_VGallery_Effects=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id > %d",0));
?>	
<form  method='POST' id='form_popup_for_video'>
	<div class="Juna_IT_Video_Gallery_Prop_Div_Main">
		<a href="http://juna-it.com" target="_blank" title="Click to Visit"><img src="<?php echo plugins_url('/Images/logo-white.png',__FILE__);?>" class="Juna_IT_Logo_Orange"></a>
		
		<div class="JIT_VGallery_Main_Div1">
			<span class="JIT_VGallery_Title_Span">Effect Title:</span> 
			<input type="text"   class="JIT_VGallery_search_text" id="JIT_VGallery_search_text1" onclick="JIT_VGallery_Search()" placeholder="Search">
			<input type="button" class="JIT_VGallery_Reset_text" value="Reset" onclick="JIT_VGallery_Reset()">
			<span class="JIT_VGallery_not" id="JIT_VGallery_not1"></span>
		</div>

		<div class="JIT_VGallery_Main_Div2">
			<label class="Juna_IT_Video_Gallery_Setting_Video_Title_Label">Selected Gallery Type:</label>
			<span id='Juna_IT_Video_Gallery_Setting_Video_Title'>Video Gallery/Content-Popup</span>

			<input type="button" class="Juna_IT_Video_Gallery_Prop_Save" value="Back" onclick="JIT_VGallery_Cancel()">
		</div>
	</div>
	<div id="JIT_VGallery_Button_Div" class="JIT_VGallery_Button_Div">
		<a href="http://juna-it.com/index.php/video-gallery/" target="_blank" title="Click to Buy"><div class="JIT_VGallery_Full_Version_Image"></div></a>
		<span style="display:block;color:#ffffff;font-size:16px;">This is the free version of the plugin. Click "GET THE FULL VERSION" for more advanced options.</span><br>
		<span style="display:block;color:#ffffff;font-size:16px;margin-top:-15px;"> We appreciate every customer.</span>
	</div>
	<table class="JIT_VGallery_Main_Table">
		<tr class="JIT_VGallery_first_row">
			<td class='JIT_VGallery_main_id_item'><B><I>No</I></B></td>
			<td class='JIT_VGallery_main_title_item'><B><I>Effect Name</I></B></td>
			<td class='JIT_VGallery_main_effect_item'><B><I>Effect Type</I></B></td>
			<td class='JIT_VGallery_main_actions_item'><B><I>Actions</I></B></td>
		</tr>
	</table>
	<table class='JIT_VGallery_Effect_Table'>
		<?php for($i=0;$i<count($JIT_VGallery_Effects);$i++) {
			if($i<6){ ?>
				<tr>
					<td class='JIT_VGallery_id_item'><B><I><?php echo $i+1 ;?></I></B></td>
					<td class='JIT_VGallery_title_item'><B><I><?php echo $JIT_VGallery_Effects[$i]->effect_name;?></I></B></td>
					<td class='JIT_VGallery_effect_item'><B><I><?php echo $JIT_VGallery_Effects[$i]->effect_type;?></I></B></td>
					<td class='JIT_VGallery_edit_item' onclick="Edit_VGallery_Effect(<?php echo $i+1;?>)"><B><I>Edit</I></B></td>
					<td><B><I>Delete</I></B></td>
				</tr>
		<?php }}?>
	</table>
	<table class = 'JIT_VGallery_Effect_Table1'></table>

	<img class="JIT_VG_FVI" id="JIT_VG_FVI_1" src="<?php echo plugins_url('/Images/content.png',__FILE__);?>">
	<img class="JIT_VG_FVI" id="JIT_VG_FVI_2" src="<?php echo plugins_url('/Images/block.png',__FILE__);?>">
	<img class="JIT_VG_FVI" id="JIT_VG_FVI_3" src="<?php echo plugins_url('/Images/thumbnails.png',__FILE__);?>">
	<img class="JIT_VG_FVI" id="JIT_VG_FVI_4" src="<?php echo plugins_url('/Images/slider.png',__FILE__);?>">
	<img class="JIT_VG_FVI" id="JIT_VG_FVI_5" src="<?php echo plugins_url('/Images/carousel.png',__FILE__);?>">
	<img class="JIT_VG_FVI" id="JIT_VG_FVI_6" src="<?php echo plugins_url('/Images/polaroids.png',__FILE__);?>">
</form>