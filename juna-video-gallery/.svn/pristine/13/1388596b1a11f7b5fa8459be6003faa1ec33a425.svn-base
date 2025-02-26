<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	global $wpdb;
	wp_enqueue_media();
	wp_enqueue_script( 'custom-header' );
	add_filter( 'upload_size_limit', 'PBP_increase_upload' );
	function PBP_increase_upload(  )
	{
	 	return 2048000000; //2GB
	}
	$table_name  = $wpdb->prefix . "juna_it_gallery_manager";
	$table_name1 = $wpdb->prefix . "juna_it_video_manager";
	$table_name2 = $wpdb->prefix . "juna_it_video_link";
	$table_name4 = $wpdb->prefix . "juna_it_video_effdb";

	if(isset($_POST['Add_new_Video_Gallery_Save_button']))
	{
		$Add_new_Video_Gallery_Title_Name=sanitize_text_field($_POST['Add_new_Video_Gallery_Title_Name']);

		$Juna_IT_Video_Gallery_Type=sanitize_text_field($_POST['Juna_IT_Video_Gallery_Type']);
		$Juna_IT_Video_Gallery_Show_Video_Type=sanitize_text_field($_POST['Juna_IT_Video_Gallery_Show_Video_Type']);
		$Juna_IT_Video_Gallery_Videos_Quantity=sanitize_text_field($_POST['Juna_IT_Video_Gallery_Videos_Quantity']);

		$JIT_VGallery_VG_Count=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id>%d",0));

		$JITVGcount=0;

		for($i=0;$i<count($JIT_VGallery_VG_Count);$i++)
		{
			$JIT_VGallery_VG_split=explode(' (', $JIT_VGallery_VG_Count[$i]->gallery_title);
			if($JIT_VGallery_VG_split[0]==$Add_new_Video_Gallery_Title_Name)
			{
				$JITVGcount++;
			}
		}

		if($JITVGcount==0)
		{
			$Add_new_Video_Gallery_Title_Name=$Add_new_Video_Gallery_Title_Name;
		}
		else
		{
			$Add_new_Video_Gallery_Title_Name=$Add_new_Video_Gallery_Title_Name .' ('. $JITVGcount .')';
		}

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name (id, gallery_title, gallery_type, Juna_IT_Video_Gallery_Show_Video_Type, Juna_IT_Video_Gallery_Videos_Quantity) VALUES (%d, %s, %s, %s, %d)", '', $Add_new_Video_Gallery_Title_Name, $Juna_IT_Video_Gallery_Type, $Juna_IT_Video_Gallery_Show_Video_Type, $Juna_IT_Video_Gallery_Videos_Quantity));

		$Gallery_number=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE gallery_title=%s", $Add_new_Video_Gallery_Title_Name));

		$JIT_VGallery_Hidden_Count=sanitize_text_field($_POST['JIT_VGallery_Hidden_Count']);

		for($i=1;$i<=$JIT_VGallery_Hidden_Count;$i++)
		{
			$u = explode('\"', sanitize_text_field($_POST['JITVGallery_Uploaded_Title_'.$i]));
			$y = implode(')*^*(', $u);
			$t = explode("\'", $y);
			$Video_title = implode(")*&*(", $t);
			
			$w = explode('\"', sanitize_text_field($_POST['JITVGallery_Uploaded_Desc_'.$i]));
			$s = implode(')*^*(', $w);
			$x = explode("\'", $s);
			$Description_textarea = implode(")*&*(", $x);

			$Video_url=$_POST['JITVGallery_Uploaded_Video_'.$i];
			$Image_url=$_POST['JITVGallery_Uploaded_Image_'.$i];

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, gallery_number, image_url) VALUES (%d, %s, %s, %s, %d, %s)", '', $Video_title, $Description_textarea, $Video_url, $Gallery_number[0]->id,$Image_url));

			$JITVGallery_Included_Link=sanitize_text_field($_POST['JITVGallery_Included_Link_'.$i]);
			$JITVGallery_Uploaded_ONT=sanitize_text_field($_POST['JITVGallery_Uploaded_ONT_'.$i]);

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, video_link, video_ONT, gallery_number) VALUES (%d, %s, %s, %d)", '', $JITVGallery_Included_Link, $JITVGallery_Uploaded_ONT, $Gallery_number[0]->id));
		}	
	}
	else if(isset($_POST['Add_new_Video_Gallery_Update_button']))
	{
		$Juna_IT_Video_Gallery_Hidden_Id_Gallery=sanitize_text_field($_POST['Juna_IT_Video_Gallery_Hidden_Id_Gallery']);
		$Add_new_Video_Gallery_Title_Name=sanitize_text_field($_POST['Add_new_Video_Gallery_Title_Name']);

		$Juna_IT_Video_Gallery_Type=sanitize_text_field($_POST['Juna_IT_Video_Gallery_Type']);
		$Juna_IT_Video_Gallery_Show_Video_Type=sanitize_text_field($_POST['Juna_IT_Video_Gallery_Show_Video_Type']);
		$Juna_IT_Video_Gallery_Videos_Quantity=sanitize_text_field($_POST['Juna_IT_Video_Gallery_Videos_Quantity']);

		$Juna_IT_Video_Gallery_HiddenGN=sanitize_text_field($_POST['Juna_IT_Video_Gallery_HiddenGN']);

		$JIT_VGallery_GN_Count=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id>%d",0));

		$JITVGcount=0;

		if($Add_new_Video_Gallery_Title_Name!=$Juna_IT_Video_Gallery_HiddenGN)
		{
			for($i=0;$i<count($JIT_VGallery_GN_Count);$i++)
			{
				$JIT_VGallery_GN_split=explode(' (', $JIT_VGallery_GN_Count[$i]->Add_new_Video_Gallery_Title_Name);
				if($JIT_VGallery_GN_split[0]==$Add_new_Video_Gallery_Title_Name)
				{
					$JITVGcount++;
				}
			}
		}		

		if($JITVGcount==0)
		{
			$Add_new_Video_Gallery_Title_Name=$Add_new_Video_Gallery_Title_Name;
		}
		else
		{
			$Add_new_Video_Gallery_Title_Name=$Add_new_Video_Gallery_Title_Name .' ('. $JITVGcount .')';
		}

		$wpdb->replace( $table_name, array('id' => $Juna_IT_Video_Gallery_Hidden_Id_Gallery,
			'gallery_title' => $Add_new_Video_Gallery_Title_Name,
			'gallery_type' => $Juna_IT_Video_Gallery_Type,
			'Juna_IT_Video_Gallery_Show_Video_Type' => $Juna_IT_Video_Gallery_Show_Video_Type,
			'Juna_IT_Video_Gallery_Videos_Quantity' => $Juna_IT_Video_Gallery_Videos_Quantity,), 
		array('%d', '%s', '%s', '%s', '%d',));

		$wpdb->query($wpdb->prepare("DELETE FROM $table_name1 WHERE gallery_number=%d", $Juna_IT_Video_Gallery_Hidden_Id_Gallery));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name2 WHERE gallery_number=%d", $Juna_IT_Video_Gallery_Hidden_Id_Gallery));
		$JIT_VGallery_Hidden_Count=sanitize_text_field($_POST['JIT_VGallery_Hidden_Count']);

		for($i=1;$i<=$JIT_VGallery_Hidden_Count;$i++)
		{
			$u = explode('\"', sanitize_text_field($_POST['JITVGallery_Uploaded_Title_'.$i]));
			$y = implode(')*^*(', $u);
			$t = explode("\'", $y);
			$Video_title = implode(")*&*(", $t);
			
			$w = explode('\"', sanitize_text_field($_POST['JITVGallery_Uploaded_Desc_'.$i]));
			$s = implode(')*^*(', $w);
			$x = explode("\'", $s);
			$Description_textarea = implode(")*&*(", $x);

			$Video_url=$_POST['JITVGallery_Uploaded_Video_'.$i];
			$Image_url=$_POST['JITVGallery_Uploaded_Image_'.$i];

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, video_title, video_description, video_url, gallery_number, image_url) VALUES (%d, %s, %s, %s, %d, %s)", '', $Video_title, $Description_textarea, $Video_url, $Juna_IT_Video_Gallery_Hidden_Id_Gallery, $Image_url));

			$JITVGallery_Included_Link=sanitize_text_field($_POST['JITVGallery_Included_Link_'.$i]);
			$JITVGallery_Uploaded_ONT=sanitize_text_field($_POST['JITVGallery_Uploaded_ONT_'.$i]);

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, video_link, video_ONT, gallery_number) VALUES (%d, %s, %s, %d)", '', $JITVGallery_Included_Link, $JITVGallery_Uploaded_ONT, $Juna_IT_Video_Gallery_Hidden_Id_Gallery));
		}
	}
	$Gallery_title_table=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id > %d",0));
	$Gallery_effects=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id > %d",0));
?>
<form method="POST" enctype="multipart/form-data">
	<div class="Juna_IT_Video_Gallery_Submenu1_Footer_Div">
		<a href="http://juna-it.com" target="_blank"<abbr title="Click to Visit"><img src="<?php echo plugins_url('/Images/logo-white.png',__FILE__);?>" class="Juna_IT_Logo_Orange"></a>
		<div class="JIT_VGallery_Sub1D1">
			<span class="Videos_Title_Span">Name:</span> 
			<input type="text"   class="search_text_field" id="search_text_field" onclick="Search_Button_Clicked()" placeholder="Search">
			<input type="button" class="Reset_button"      value="Reset"          onclick="Reset_Button_Clicked()">
			<span class="searched_gallery_does_not_exist" id="searched_gallery_does_not_exist"></span>
			<input type="button" class="Add_Video_button" value="Add New Gallery" onclick="Add_Video_Button_Clicked()">
		</div>
		<div class="JIT_VGallery_Sub1D2">
			<span class="Videos_Title_Span">Gallery Name:</span>
			<input type="text" class="Add_new_Video_Gallery_Title_Name" id="Add_new_Video_Gallery_Title_Name" name="Add_new_Video_Gallery_Title_Name" required>
			<input type="button" class="Add_new_Video_Gallery_Cancel_button" value="Cancel" onclick="Add_new_Video_Gallery_Cancel_button_clicked()">
			<input type="submit" class="Add_new_Video_Gallery_Save_button"   value="Save"   name="Add_new_Video_Gallery_Save_button">
			<input type="submit" class="Add_new_Video_Gallery_Update_button" value="Update" name="Add_new_Video_Gallery_Update_button">

			<input type="text" style="display: none;" id="JIT_VGallery_Hidden_Count"      value="0" name="JIT_VGallery_Hidden_Count">
			<input type="text" style="display: none;" id="Juna_IT_Video_Gallery_HiddenGN" value=""  name="Juna_IT_Video_Gallery_HiddenGN">
			<input type="text" style="display: none;" id="Juna_IT_Video_Gallery_Hidden_Id_Gallery"  name="Juna_IT_Video_Gallery_Hidden_Id_Gallery">
		</div>
	</div>
	<div class="JIT_VGallery_Short_Div">
			<table class="JIT_VGallery_Short_Table">
				<tr>
					<td>Shortcode</td>
					<td>Copy & paste the shortcode directly into any WordPress post or page.</td>
					<td><?php echo 'Example:  [Juna_Video_Gallery id="1"]';?></td>
				</tr>
				<tr>
					<td>Templete Include</td>
					<td>Copy & paste this code into a template file to include the slideshow within your theme.</td>
					<td><input type="text" value='<?php echo 'Example:   <?php echo do_shortcode("[Juna_Video_Gallery id="1"]");?>';?>' style="width:100%;background-color:#0073aa;color:#ffffff;border:none;text-align: center" readonly></td>
				</tr>
			</table>
		</div>
	<table class = 'Videos_Main_Table'>
		<tr class="first_row">
			<td class='main_id_item'><B><I>No</I></B></td>
			<td class='main_title_item'><B><I>Gallery Title</I></B></td>
			<td class='main_quantity_video_item'><B><I>Quantity</I></B></td>
			<td class='main_type_video_item'><B><I>Type</I></B></td>
			<td class='main_views_item'><B><I>Shortcode</I></B></td>
			<td class='main_actions_item'><B><I>Actions</I></B></td>
		</tr>
	</table>
	<table class = 'Videos_Table'>
		<?php for($i=0;$i<count($Gallery_title_table);$i++) {
			$Quantity_Video_table=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE gallery_number=(SELECT id FROM $table_name WHERE gallery_title= %s) ", $Gallery_title_table[$i]->gallery_title ));
		?>
		<tr>
			<td class='id_item'><B><I><?php echo $i+1 ;?></I></B></td>
			<td class='title_item'><B><I><?php echo $Gallery_title_table[$i]->gallery_title ; ?></I></B></td>
			<td class='quantity_video_item'><B><I><?php echo count($Quantity_Video_table); ?></I></B></td>
			<td class='type_video_item'><B><I><?php echo $Gallery_title_table[$i]->gallery_type; ?></I></B></td>
			<td class='views_item'><?php echo '[Juna_Video_Gallery id="'.$Gallery_title_table[$i]->id.'"]';?></td>
			<td class='edit_item' onclick="Edit_Video_Gallery(<?php echo $Gallery_title_table[$i]->id ; ?>)"><B><I>Edit</I></B></td>
			<td class='delete_item' onclick="Delete_Video_Gallery(<?php echo $Gallery_title_table[$i]->id ; ?>)"><B><I>Delete</I></B></td>
		</tr>
		<?php } ?>
	</table>
	<table class = 'Videos_Table1'></table>
		
	<div class="Juna_IT_Video_Gallery_Sub1_Page3">
		<table class="Juna_IT_Video_Gallery_Sub1_Page3_Table">
			<tr>
				<td>Gallery Effect:</td>
				<td>Displaying Content:</td>
				<td>Videos Per Page:</td>
			</tr>
			<tr>
				<td>
					<select name="Juna_IT_Video_Gallery_Type" id="Juna_IT_Video_Gallery_Type" onchange="Juna_IT_Video_Gallery_Type_Changed()">
						<?php for($i=0;$i<count($Gallery_effects);$i++){?>
							<option value="<?php echo $Gallery_effects[$i]->effect_name;?>"><?php echo $Gallery_effects[$i]->effect_name;?></option>
						<?php }?>
					</select>
				</td>
				<td>
					<select name="Juna_IT_Video_Gallery_Show_Video_Type" id="Juna_IT_Video_Gallery_Show_Video_Type" onchange="Juna_IT_Video_Gallery_Show_Video_Type_Changed()">
						<option value="Pageination" selected>Pageination</option>
						<option value="Load More">Load More</option>
						<option value="Show All">Show All</option>
					</select>
				</td>
				<td>
					<input type="text" name="Juna_IT_Video_Gallery_Videos_Quantity" id="Juna_IT_Video_Gallery_Videos_Quantity" value="1">
				</td>
			</tr>
		</table>			
	</div>
	<div class="JIT_VGallery_New_V">
		<table class="JIT_VGallery_Upload_Video_Table">
			<tr>
				<td><label>Title:</label></td>
				<td><input type="text" class="JIT_VGallery_Upload_Video_Input" id="JIT_VGallery_Upload_Title" placeholder="* Required"><span class="JIT_VGallery_Span" id="JIT_VGallery_Span_1">*</span></td>
			</tr>
			<tr>
				<td><label>Description:</label></td>
				<td><textarea class="JIT_VGallery_Upload_Video_Input Juna_IT_Video_Gallery_textarea" rows="5" id="JIT_VGallery_Upload_Desc" placeholder="Optional"></textarea></td>
			</tr>
			<tr>
				<td>
					<div id="wp-content-media-buttons" class="wp-media-buttons" >													
						<a href="#" class="button insert-media add_media" style="border:1px solid #0073aa; color:#0073aa; background-color:#f2f2f2" data-editor="JIT_VGallery_Upload_Video_1" title="Add Video" id="JIT_VGallery_Upload_Video" onclick="JIT_VGallery_Upload_Video_Clicked()">
							<span class="wp-media-buttons-icon"></span>Add Video
						</a>
					</div>
					<input type="text" style="display: none;" id="JIT_VGallery_Upload_Video_1">									
				</td>
				<td><input type="text" class="JIT_VGallery_Upload_Video_Input" id="JIT_VGallery_Upload_Video_2" placeholder="* Required" readonly><span class="JIT_VGallery_Span" id="JIT_VGallery_Span_2">*</span></td>
			</tr>
			<tr>
				<td>
					<div id="wp-content-media-buttons" class="wp-media-buttons" >													
						<a href="#" class="button insert-media add_media" style="border:1px solid #0073aa; color:#0073aa; background-color:#f2f2f2" data-editor="JIT_VGallery_Upload_Image_1" title="Add Image" id="JIT_VGallery_Upload_Image" onclick="JIT_VGallery_Upload_Image_Clicked()">
							<span class="wp-media-buttons-icon"></span>Add Image
						</a>
					</div>
					<input type="text" style="display: none;" id="JIT_VGallery_Upload_Image_1">									
				</td>
				<td><input type="text" class="JIT_VGallery_Upload_Video_Input" id="JIT_VGallery_Upload_Image_2" placeholder="* Required" readonly><span class="JIT_VGallery_Span" id="JIT_VGallery_Span_3">*</span></td>
			</tr>
			<tr>
				<td><label>Link:</label></td>
				<td><input type="text" class="JIT_VGallery_Upload_Video_Input" id="JIT_VGallery_Upload_Link" placeholder="Optional"></td>
			</tr>
			<tr>
				<td><label>Open In New Tab:</label></td>
				<td>
					<i class="JITVGalleryicon_Yes junaiticons-style junaiticons-check" onclick="JIT_VGallery_ONT('Yes')" style="margin-left:5%;margin-right:20px;font-size: 20px; color:#c5c5c5"></i>
					<i class="JITVGalleryicon_No junaiticons-style junaiticons-remove" onclick="JIT_VGallery_ONT('No')" style="font-size: 20px; color:#0073aa"></i>
				</td>
			</tr>			
		</table>
		<div class="JIT_VGallery_Upload_Video_Div1">
			<input type="text" style="display: none;" id="JIT_VGallery_Lindex" value="">
			<input type="text" style="display: none;" id="JIT_VGallery_YON" value="No">
			<input type="button" class="JIT_VGallery_Upload_Video_Button" value="Cancel" onclick="JIT_VGallery_Main_Big_Clicked()">
			<input type="button" class="JIT_VGallery_Upload_Video_Button" id="JIT_VGallery_Button_S" value="Save" onclick="JIT_VGallery_Save_Clicked()">
			<input type="button" class="JIT_VGallery_Upload_Video_Button" id="JIT_VGallery_Button_U" value="Update" onclick="JIT_VGallery_Up_Clicked()">
		</div>
	</div>
	<div id="JIT_VGallery_Photos" class="JIT_VGallery_Photos" onclick="JIT_VGallery_sort()">
		<ul id="Juna_IT_Video_Gallery_Ul">
			
		</ul>			
	</div>	
</form>