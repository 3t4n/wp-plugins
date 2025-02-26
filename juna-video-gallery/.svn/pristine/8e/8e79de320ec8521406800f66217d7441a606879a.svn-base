<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<script type="text/javascript">	
	function Search_Button_Clicked()
	{
		setInterval(function(){
			var Juna_IT_Video_Searched_Gallery=jQuery('#search_text_field').val();
			if(Juna_IT_Video_Searched_Gallery!='')
			{
				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'Search_Juna_IT_Video_Gallery_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: Juna_IT_Video_Searched_Gallery, // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					if(response=='')
					{
						jQuery('#searched_gallery_does_not_exist').html('* Requested Gallery does not exist!');
						jQuery('.Videos_Table1').hide();
						jQuery('.Videos_Table').show();
					}
					else
					{
						jQuery('#searched_gallery_does_not_exist').html('');
						jQuery('.Videos_Table').hide();
						jQuery('.Videos_Table1').show();
						jQuery('.Videos_Table1').empty();

						var searched_params=response.split(')*^*(');
						for(i=0;i<parseInt(searched_params.length-1);i++)
						{
							searched_params_callback=searched_params[i].split(')&*&(');
							
							jQuery('.Videos_Table1').append("<tr><td class='id_item'><B><I>"+parseInt(parseInt(i)+1)+"</I></B></td><td class='title_item'><B><I>"+searched_params_callback[1]+"</I></B></td><td class='quantity_video_item'><B><I>"+searched_params_callback[2]+"</I></B></td><td class='views_item'><B><I>Views</I></B></td><td class='edit_item' onclick='Edit_Video_Gallery("+searched_params_callback[0]+")'><B><I>Edit</I></B></td><td class='delete_item' onclick='Delete_Video_Gallery("+searched_params_callback[0]+")'><B><I>Delete</I></B></td></tr>");
						}
					}
				});
			}
			else
			{
				jQuery('.Videos_Table1').hide();
				jQuery('.Videos_Table').show();
			}
		}, 600);
	}
	function Reset_Button_Clicked()
	{
		jQuery('#search_text_field').val('');
		jQuery('#searched_gallery_does_not_exist').html('');
		jQuery('.Videos_Table1').hide();
		jQuery('.Videos_Table').show();
	}
	function Add_Video_Button_Clicked()
	{
		jQuery('.JIT_VGallery_Sub1D1').fadeOut();
		jQuery('.Add_new_Video_Gallery_Save_button').fadeIn();
		jQuery('.Add_new_Video_Gallery_Update_button').fadeOut();
		jQuery('.Videos_Main_Table').fadeOut();
		jQuery('.Videos_Table').fadeOut();
		jQuery('.Videos_Table1').fadeOut();
		setTimeout(function(){
			jQuery('.JIT_VGallery_Sub1D2').fadeIn(); 
			jQuery('.Juna_IT_Video_Gallery_Sub1_Page3').fadeIn();
			jQuery('.JIT_VGallery_New_V').fadeIn();
		}, 500);
	}
	function Add_new_Video_Gallery_Cancel_button_clicked()
	{
		location.reload();
	}	
	function Edit_Video_Gallery(id)
	{	
		jQuery('.JIT_VGallery_Sub1D1').fadeOut();
		jQuery('.Add_new_Video_Gallery_Save_button').fadeOut();
		jQuery('.Add_new_Video_Gallery_Update_button').fadeIn();
		jQuery('.Videos_Main_Table').fadeOut();
		jQuery('.Videos_Table').fadeOut();
		jQuery('.Videos_Table1').fadeOut();

		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'Edit_Juna_IT_Video_Gallery_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: id, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			var Gallery_title=response.split('^%^');

			jQuery('#Juna_IT_Video_Gallery_Hidden_Id_Gallery').val(id);
			jQuery('#Add_new_Video_Gallery_Title_Name').val(Gallery_title[0]);
			jQuery('#Juna_IT_Video_Gallery_HiddenGN').val(Gallery_title[0]);
			jQuery('#Juna_IT_Video_Gallery_Type').val(Gallery_title[1]);
			jQuery('#Juna_IT_Video_Gallery_Show_Video_Type').val(Gallery_title[2]);
			Juna_IT_Video_Gallery_Show_Video_Type_Changed();
			jQuery('#Juna_IT_Video_Gallery_Videos_Quantity').val(Gallery_title[3]);
			Juna_IT_Video_Gallery_Type_Changed();
			jQuery('#JIT_VGallery_Hidden_Count').val(Gallery_title[4]);

			var JITVGallery_VParams=Gallery_title[5].split(')*(');

			for(var y=0;y<Gallery_title[4];y++)
			{
				var JITVGallery_Input_params=JITVGallery_VParams[y].split('$#$');

				if(JITVGallery_Input_params[5]=='Yes')
				{
					JITVGalleryColorY='#0073aa';
					JITVGalleryColorN='#c5c5c5';
				}
				else
				{
					JITVGalleryColorY='#c5c5c5';
					JITVGalleryColorN='#0073aa';
				}

				jQuery('#Juna_IT_Video_Gallery_Ul').append('<li id="JIT_VGallery_Photos_Ul_Li_'+parseInt(parseInt(y)+1)+'"><div class="JIT_VGallery_Photos_Desc_Div"><table class="JIT_VGallery_Photos_Table"><tr><td colspan="2"><i class="junaiticons-style junaiticons-remove" style="cursor:pointer;float:right;font-size: 20px; color:#ff0000" onclick="JIT_VGallery_Remove_U('+parseInt(parseInt(y)+1)+')"></i><i class="junaiticons-style junaiticons-edit" style="cursor:pointer;float:right;margin-right:10px;font-size: 22px; color:#0073aa" onclick="JIT_VGallery_Edit_U('+parseInt(parseInt(y)+1)+')"></i></td></tr><tr><td><label>Title</label></td><td><input type="text" class="JIT_VGallery_Upload_Video_Input JITVGallery_Uploaded_Title" id="JITVGallery_Uploaded_Title_'+parseInt(parseInt(y)+1)+'" name="JITVGallery_Uploaded_Title_'+parseInt(parseInt(y)+1)+'" value="'+JITVGallery_Input_params[0]+'" readonly></td></tr><tr><td><label>Description</label></td><td><textarea class="JIT_VGallery_Upload_Video_Input JITVGallery_Uploaded_Desc" rows="3"  id="JITVGallery_Uploaded_Desc_'+parseInt(parseInt(y)+1)+'" name="JITVGallery_Uploaded_Desc_'+parseInt(parseInt(y)+1)+'" value="'+JITVGallery_Input_params[1]+'" readonly>'+JITVGallery_Input_params[1]+'</textarea></td></tr><tr><td><label>Video URL</label></td><td><input type="text" class="JIT_VGallery_Upload_Video_Input JITVGallery_Uploaded_Video" id="JITVGallery_Uploaded_Video_'+parseInt(parseInt(y)+1)+'" name="JITVGallery_Uploaded_Video_'+parseInt(parseInt(y)+1)+'" value="'+JITVGallery_Input_params[2]+'" readonly></td></tr><tr><td><label>Image URL</label></td><td><input type="text" class="JIT_VGallery_Upload_Video_Input JITVGallery_Uploaded_Image" id="JITVGallery_Uploaded_Image_'+parseInt(parseInt(y)+1)+'" name="JITVGallery_Uploaded_Image_'+parseInt(parseInt(y)+1)+'" value="'+JITVGallery_Input_params[3]+'" readonly></td></tr><tr><td><label>Link</label></td><td><input type="text" class="JIT_VGallery_Upload_Video_Input JITVGallery_Included_Link" id="JITVGallery_Included_Link_'+parseInt(parseInt(y)+1)+'" name="JITVGallery_Included_Link_'+parseInt(parseInt(y)+1)+'" value="'+JITVGallery_Input_params[4]+'" readonly></td></tr><tr><td><label>New Tab</label></td><td style="text-align: center"><input type="hidden" class="JITVGallery_Uploaded_ONT" id="JITVGallery_Uploaded_ONT_'+parseInt(parseInt(y)+1)+'" name="JITVGallery_Uploaded_ONT_'+parseInt(parseInt(y)+1)+'" value="'+JITVGallery_Input_params[5]+'"><i class="JITVGC junaiticonsdraw junaiticons-style junaiticons-check"  style="margin-right:20px;font-size: 20px; color:'+JITVGalleryColorY+'"></i><i class="JITVGR junaiticonsdraw junaiticons-style junaiticons-remove"  style="font-size: 20px; color:'+JITVGalleryColorN+'"></i></td></tr></table></div><div class="JIT_VGallery_Photos_Div" id="JIT_VGallery_Photos_Div_'+parseInt(parseInt(y)+1)+'"><img class="JIT_VGallery_Photo" id="JIT_VGallery_Photo_'+parseInt(parseInt(y)+1)+'" src="'+JITVGallery_Input_params[3]+'"></div></li>');
			}

			setTimeout(function(){
				jQuery('.JIT_VGallery_Sub1D2').fadeIn(); 
				jQuery('.Juna_IT_Video_Gallery_Sub1_Page3').fadeIn();
				jQuery('.JIT_VGallery_New_V').fadeIn();
				jQuery('.JIT_VGallery_Photos').fadeIn();
			}, 500);
		})
	}
	function Delete_Video_Gallery(id)
	{
		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'Delete_Juna_IT_Video_Gallery_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: id, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			location.reload();
		});
	}		
	function Juna_IT_Video_Gallery_Show_Video_Type_Changed()
	{
		var Juna_IT_Video_Gallery_Show_Video_Type=jQuery('#Juna_IT_Video_Gallery_Show_Video_Type').val();
		if(Juna_IT_Video_Gallery_Show_Video_Type=='Show All')
		{
			jQuery('#Juna_IT_Video_Gallery_Videos_Quantity').fadeOut();
		}
		else
		{
			jQuery('#Juna_IT_Video_Gallery_Videos_Quantity').fadeIn();
		}
	}
	function Juna_IT_Video_Gallery_Type_Changed()
	{
		var Juna_IT_Video_Gallery_Type=jQuery('#Juna_IT_Video_Gallery_Type').val();

		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'Juna_IT_Video_Gallery_Type', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Juna_IT_Video_Gallery_Type, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {

			if(response=='Video Slider' || response=='Video Carousel' || response=='Polaroids')
			{
				jQuery('#Juna_IT_Video_Gallery_Show_Video_Type').fadeOut();
				jQuery('#Juna_IT_Video_Gallery_Videos_Quantity').fadeOut();
			}
			else
			{
				jQuery('#Juna_IT_Video_Gallery_Show_Video_Type').fadeIn();
				jQuery('#Juna_IT_Video_Gallery_Videos_Quantity').fadeIn();
			}
		});
	}	
	function JIT_VGallery_ONT(YON)
	{
		jQuery('#JIT_VGallery_YON').val(YON);

		if(YON=='Yes')
		{
			jQuery('.JITVGalleryicon_Yes').css('color','#0073aa');
			jQuery('.JITVGalleryicon_No').css('color','#c5c5c5');
		}
		else
		{
			jQuery('.JITVGalleryicon_No').css('color','#0073aa');
			jQuery('.JITVGalleryicon_Yes').css('color','#c5c5c5');
		}
	}
</script>