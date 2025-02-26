function JIT_VGallery_sort()
{
	jQuery('#Juna_IT_Video_Gallery_Ul').sortable({
      	update: function() {
        	jQuery("#Juna_IT_Video_Gallery_Ul > li").each(function(){
        		jQuery(this).find('.JITVGallery_Uploaded_Title').attr('id','JITVGallery_Uploaded_Title_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.JITVGallery_Uploaded_Title').attr('name','JITVGallery_Uploaded_Title_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.JITVGallery_Uploaded_Desc').attr('id','JITVGallery_Uploaded_Desc_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.JITVGallery_Uploaded_Desc').attr('name','JITVGallery_Uploaded_Desc_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.JITVGallery_Uploaded_Video').attr('id','JITVGallery_Uploaded_Video_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.JITVGallery_Uploaded_Video').attr('name','JITVGallery_Uploaded_Video_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.JITVGallery_Uploaded_Image').attr('id','JITVGallery_Uploaded_Image_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.JITVGallery_Uploaded_Image').attr('name','JITVGallery_Uploaded_Image_'+parseInt(parseInt(jQuery(this).index())+1));
			});         
       	}
    });	
}
function JIT_VGallery_Main_Big_Clicked()
{
	setTimeout(function(){
		jQuery('#JIT_VGallery_Upload_Title').val('');
		jQuery('#JIT_VGallery_Upload_Desc').val('');
		jQuery('#JIT_VGallery_Upload_Video_2').val('');
		jQuery('#JIT_VGallery_Upload_Image_2').val('');
		jQuery('#JIT_VGallery_Upload_Link').val('');
		jQuery('.JITVGalleryicon_No').css('color','#0073aa');
		jQuery('.JITVGalleryicon_Yes').css('color','#c5c5c5');
		jQuery('.JIT_VGallery_Span').fadeOut();

		jQuery('#JIT_VGallery_Button_S').fadeIn();
		jQuery('#JIT_VGallery_Button_U').fadeOut();
	},300)
}
function JIT_VGallery_Upload_Video_Clicked()
{
	var nIntervId = setInterval(function(){
		var code = jQuery('#JIT_VGallery_Upload_Video_1').val();
		
		if(code.indexOf("uploads")>0)
		{
			if(code.indexOf("mp4")>0)
			{
				var s=code.split('mp4="'); 
				var src=s[1].split('"');				
				jQuery('#JIT_VGallery_Upload_Video_2').val(src[0]);
				if(jQuery('#JIT_VGallery_Upload_Video_2').val().length>0){
					clearInterval(nIntervId);
				}				
			}
			else if(code.indexOf("flv")>0)
			{
				var s=code.split('flv="'); 
				var src=s[1].split('"');				
				jQuery('#JIT_VGallery_Upload_Video_2').val(src[0]);
				if(jQuery('#JIT_VGallery_Upload_Video_2').val().length>0){
					clearInterval(nIntervId);
				}				
			}
			else if(code.indexOf("3gp")>0)
			{
				var s=code.split('href="'); 
				var src=s[1].split('"');				
				jQuery('#JIT_VGallery_Upload_Video_2').val(src[0]);
				if(jQuery('#JIT_VGallery_Upload_Video_2').val().length>0){
					clearInterval(nIntervId);
				}				
			}
		}
		else if(code.indexOf('https://www.youtube.com/')>0)
		{
			var s1 = code.split('<a href="https://www.youtube.com/'); 
			if(code.indexOf('list')>0 || code.indexOf('index')>0)
			{
				var s2= s1[1].split("=");
				var src = s2[1].split('&');

				jQuery('#JIT_VGallery_Upload_Video_2').val('https://www.youtube.com/embed/'+src[0]);
				jQuery('#JIT_VGallery_Upload_Image_2').val('http://img.youtube.com/vi/'+src[0]+'/mqdefault.jpg');
				if(jQuery('#JIT_VGallery_Upload_Video_2').val().length>0){
					clearInterval(nIntervId);
				}				
			}
			else if(code.indexOf('embed')>0)
			{
				var s1=code.split('[embed]');
				var s2=s1[1].split('[/embed]');
				if(s2[0].indexOf('watch?')>0)
				{
					var s3=s2[0].split('=');
					
					jQuery('#JIT_VGallery_Upload_Video_2').val('https://www.youtube.com/embed/'+s3[1]);
					jQuery('#JIT_VGallery_Upload_Image_2').val('http://img.youtube.com/vi/'+s3[1]+'/mqdefault.jpg');
					if(jQuery('#JIT_VGallery_Upload_Video_2').val().length>0){
						clearInterval(nIntervId);
					}	
				}
				else
				{
					var src=s2[0];
					var Imsrc=src.split('embed/');

					jQuery('#JIT_VGallery_Upload_Video_2').val(src);
					jQuery('#JIT_VGallery_Upload_Image_2').val('http://img.youtube.com/vi/'+Imsrc[1]+'/mqdefault.jpg');
					if(jQuery('#JIT_VGallery_Upload_Video_2').val().length>0){
						clearInterval(nIntervId);
					}	
				}
			}
			else
			{
				var s2= s1[1].split('=');
				var src = s2[1].split('">https://');

				jQuery('#JIT_VGallery_Upload_Video_2').val('https://www.youtube.com/embed/'+src[0]);
				jQuery('#JIT_VGallery_Upload_Image_2').val('http://img.youtube.com/vi/'+src[0]+'/mqdefault.jpg');
				if(jQuery('#JIT_VGallery_Upload_Video_2').val().length>0){
					clearInterval(nIntervId);
				}				
			}	
		}
		else if(code.indexOf('https://youtu.be/')>0)
		{
			var s1 = code.split('<a href="https://youtu.be/'); 
			var src = s1[1].split('">https://');

			jQuery('#JIT_VGallery_Upload_Video_2').val('https://www.youtube.com/embed/'+src[0]);
			jQuery('#JIT_VGallery_Upload_Image_2').val('http://img.youtube.com/vi/'+src[0]+'/mqdefault.jpg');
			if(jQuery('#JIT_VGallery_Upload_Video_2').val().length>0){
				clearInterval(nIntervId);
			}				
		}
		else if(code.indexOf('https://vimeo.com/')>0)
		{
			if(code.indexOf('embed')>0)
			{
				var s1=code.split('[embed]https://vimeo.com/');
				var src=s1[1].split('[/embed]');
				if(src[0].length>9)
				{
					var real_src=src[0].split('/');
					src[0]=real_src[2];
				}
				jQuery('#JIT_VGallery_Upload_Video_2').val('https://player.vimeo.com/video/'+src[0]);
				
				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'Get_Vimeo_Video_Image_Src', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: 'https://player.vimeo.com/video/'+src[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response){
					jQuery('#JIT_VGallery_Upload_Image_2').val(response);
					if(jQuery('#JIT_VGallery_Upload_Video_2').val().length>0){
						clearInterval(nIntervId);
					}				
				});		
   			}
			else
			{
				var s1 = code.split('<a href="https://vimeo.com/'); 
				var src = s1[1].split('">https://');
				if(src[0].length>9)
				{
					var real_src=src[0].split('/');
					src[0]=real_src[2];
				}
				jQuery('#JIT_VGallery_Upload_Video_2').val('https://player.vimeo.com/video/'+src[0]);
				
				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'Get_Vimeo_Video_Image_Src', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: 'https://player.vimeo.com/video/'+src[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					jQuery('#JIT_VGallery_Upload_Image_2').val(response);
					if(jQuery('#JIT_VGallery_Upload_Video_2').val().length>0){
						clearInterval(nIntervId);
					}				
				});		
			}		
		}
	},600)
}
function JIT_VGallery_Upload_Image_Clicked()
{
	var nIntervId = setInterval(function(){
		var code = jQuery('#JIT_VGallery_Upload_Image_1').val();			
		if(code.indexOf('img')>0){
			var s=code.split('src="'); 
			var src=s[1].split('"');				
			jQuery('#JIT_VGallery_Upload_Image_2').val(src[0]);
			if(jQuery('#JIT_VGallery_Upload_Image_2').val().length>0){
				clearInterval(nIntervId);
			}				
		}
	},100)
}
function JIT_VGallery_Save_Clicked()
{
	var JITVGalleryUT=jQuery('#JIT_VGallery_Upload_Title').val();
	var JITVGalleryUD=jQuery('#JIT_VGallery_Upload_Desc').val();

	var JITVGalleryUV=jQuery('#JIT_VGallery_Upload_Video_2').val();
	var JITVGalleryUI=jQuery('#JIT_VGallery_Upload_Image_2').val();

	var JIT_VGallery_Upload_Link=jQuery('#JIT_VGallery_Upload_Link').val();
	var JIT_VGallery_YON=jQuery('#JIT_VGallery_YON').val();

	if(JIT_VGallery_YON=='Yes')
	{
		JITVGalleryColorY='#0073aa';
		JITVGalleryColorN='#c5c5c5';
	}
	else
	{
		JITVGalleryColorY='#c5c5c5';
		JITVGalleryColorN='#0073aa';
	}

	var JITVGalleryHC=jQuery('#JIT_VGallery_Hidden_Count').val();

	jQuery('#JIT_VGallery_Upload_Video_1').val('');
	jQuery('#JIT_VGallery_Upload_Image_1').val('');

	var JITVGalleryNHC=parseInt(parseInt(JITVGalleryHC)+1);

	if(JITVGalleryUT=='' || JITVGalleryUV=='' || JITVGalleryUI=='')
	{
		if(JITVGalleryUT=='')
		{
			jQuery('#JIT_VGallery_Span_1').fadeIn();
			return false;
		}
		if (JITVGalleryUV=='') 
		{
			jQuery('#JIT_VGallery_Span_2').fadeIn();
			return false;
		}
		if(JITVGalleryUI=='')
		{
			jQuery('#JIT_VGallery_Span_3').fadeIn();
			return false;
		}			
	}
	else
	{
		jQuery('#Juna_IT_Video_Gallery_Ul').append('<li id="JIT_VGallery_Photos_Ul_Li_'+JITVGalleryNHC+'"><div class="JIT_VGallery_Photos_Desc_Div"><table class="JIT_VGallery_Photos_Table"><tr><td colspan="2"><i class="junaiticons-style junaiticons-remove" style="cursor:pointer;float:right;font-size: 20px; color:#ff0000" onclick="JIT_VGallery_Remove_U('+JITVGalleryNHC+')"></i><i class="junaiticons-style junaiticons-edit" style="cursor:pointer;float:right;margin-right:10px;font-size: 22px; color:#0073aa" onclick="JIT_VGallery_Edit_U('+JITVGalleryNHC+')"></i></td></tr><tr><td><label>Title</label></td><td><input type="text" class="JIT_VGallery_Upload_Video_Input JITVGallery_Uploaded_Title" id="JITVGallery_Uploaded_Title_'+JITVGalleryNHC+'" name="JITVGallery_Uploaded_Title_'+JITVGalleryNHC+'" value="'+JITVGalleryUT+'" readonly></td></tr><tr><td><label>Description</label></td><td><textarea class="JIT_VGallery_Upload_Video_Input JITVGallery_Uploaded_Desc" rows="3"  id="JITVGallery_Uploaded_Desc_'+JITVGalleryNHC+'" name="JITVGallery_Uploaded_Desc_'+JITVGalleryNHC+'" value="'+JITVGalleryUD+'" readonly>'+JITVGalleryUD+'</textarea></td></tr><tr><td><label>Video URL</label></td><td><input type="text" class="JIT_VGallery_Upload_Video_Input JITVGallery_Uploaded_Video" id="JITVGallery_Uploaded_Video_'+JITVGalleryNHC+'" name="JITVGallery_Uploaded_Video_'+JITVGalleryNHC+'" value="'+JITVGalleryUV+'" readonly></td></tr><tr><td><label>Image URL</label></td><td><input type="text" class="JIT_VGallery_Upload_Video_Input JITVGallery_Uploaded_Image" id="JITVGallery_Uploaded_Image_'+JITVGalleryNHC+'" name="JITVGallery_Uploaded_Image_'+JITVGalleryNHC+'" value="'+JITVGalleryUI+'" readonly></td></tr><tr><td><label>Link</label></td><td><input type="text" class="JIT_VGallery_Upload_Video_Input JITVGallery_Included_Link" id="JITVGallery_Included_Link_'+JITVGalleryNHC+'" name="JITVGallery_Included_Link_'+JITVGalleryNHC+'" value="'+JIT_VGallery_Upload_Link+'" readonly></td></tr><tr><td><label>New Tab</label></td><td style="text-align: center"><input type="hidden" class="JITVGallery_Uploaded_ONT" id="JITVGallery_Uploaded_ONT_'+JITVGalleryNHC+'" name="JITVGallery_Uploaded_ONT_'+JITVGalleryNHC+'" value="'+JIT_VGallery_YON+'"><i class="JITVGC junaiticonsdraw junaiticons-style junaiticons-check"  style="margin-right:20px;font-size: 20px; color:'+JITVGalleryColorY+'"></i><i class="JITVGR junaiticonsdraw junaiticons-style junaiticons-remove"  style="font-size: 20px; color:'+JITVGalleryColorN+'"></i></td></tr></table></div><div class="JIT_VGallery_Photos_Div" id="JIT_VGallery_Photos_Div_'+JITVGalleryNHC+'"><img class="JIT_VGallery_Photo" id="JIT_VGallery_Photo_'+JITVGalleryNHC+'" src="'+JITVGalleryUI+'"></div></li>');

		jQuery('#JIT_VGallery_Hidden_Count').val(JITVGalleryNHC);

		jQuery('.JIT_VGallery_Photos').fadeIn();
		JIT_VGallery_Main_Big_Clicked();
	}
}
function JIT_VGallery_Remove_U(Removed_ID)
{
	jQuery('#JIT_VGallery_Photos_Ul_Li_'+Removed_ID).remove();

	jQuery('#JIT_VGallery_Hidden_Count').val(jQuery('#JIT_VGallery_Hidden_Count').val()-1);

	jQuery("#Juna_IT_Video_Gallery_Ul > li").each(function(){
		jQuery(this).find('.JITVGallery_Uploaded_Title').attr('id','JITVGallery_Uploaded_Title_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.JITVGallery_Uploaded_Title').attr('name','JITVGallery_Uploaded_Title_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.JITVGallery_Uploaded_Desc').attr('id','JITVGallery_Uploaded_Desc_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.JITVGallery_Uploaded_Desc').attr('name','JITVGallery_Uploaded_Desc_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.JITVGallery_Uploaded_Video').attr('id','JITVGallery_Uploaded_Video_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.JITVGallery_Uploaded_Video').attr('name','JITVGallery_Uploaded_Video_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.JITVGallery_Uploaded_Image').attr('id','JITVGallery_Uploaded_Image_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.JITVGallery_Uploaded_Image').attr('name','JITVGallery_Uploaded_Image_'+parseInt(parseInt(jQuery(this).index())+1));
	});  
	if(jQuery("#Juna_IT_Video_Gallery_Ul > li").length==0)
	{
		jQuery('#JIT_VGallery_Photos').fadeOut();
	}
	else
	{
		jQuery('#JIT_VGallery_Photos').fadeIn();
	}
}
function JIT_VGallery_Edit_U(Edited_ID)
{
	var Edited_Video_Title=jQuery('#JIT_VGallery_Photos_Ul_Li_'+Edited_ID).find('.JITVGallery_Uploaded_Title').val();
	var Edited_Video_Desc=jQuery('#JIT_VGallery_Photos_Ul_Li_'+Edited_ID).find('.JITVGallery_Uploaded_Desc').val();
	var Edited_Video_VL=jQuery('#JIT_VGallery_Photos_Ul_Li_'+Edited_ID).find('.JITVGallery_Uploaded_Video').val();
	var Edited_Video_IL=jQuery('#JIT_VGallery_Photos_Ul_Li_'+Edited_ID).find('.JITVGallery_Uploaded_Image').val();
	var Edited_Video_Link=jQuery('#JIT_VGallery_Photos_Ul_Li_'+Edited_ID).find('.JITVGallery_Included_Link').val();
	var Edited_Video_ONT=jQuery('#JIT_VGallery_Photos_Ul_Li_'+Edited_ID).find('.JITVGallery_Uploaded_ONT').val();

	jQuery('#JIT_VGallery_Lindex').val(Edited_ID);

	jQuery('#JIT_VGallery_Upload_Title').val(Edited_Video_Title);
	jQuery('#JIT_VGallery_Upload_Desc').val(Edited_Video_Desc);
	jQuery('#JIT_VGallery_Upload_Video_2').val(Edited_Video_VL);
	jQuery('#JIT_VGallery_Upload_Image_2').val(Edited_Video_IL);
	jQuery('#JIT_VGallery_Upload_Link').val(Edited_Video_Link);
	jQuery('#JIT_VGallery_YON').val(Edited_Video_ONT);

	if(Edited_Video_ONT=='Yes')
	{
		jQuery('.JITVGalleryicon_Yes').css('color','#0073aa');
		jQuery('.JITVGalleryicon_No').css('color','#c5c5c5');
	}
	else
	{
		jQuery('.JITVGalleryicon_No').css('color','#0073aa');
		jQuery('.JITVGalleryicon_Yes').css('color','#c5c5c5');
	}
	
	jQuery('#JIT_VGallery_Button_S').fadeOut();
	jQuery('.JIT_VGallery_Span').fadeOut();

	setTimeout(function(){
		jQuery('#JIT_VGallery_Button_U').fadeIn();
	},300)	
}
function JIT_VGallery_Up_Clicked()
{
	var JIT_VGallery_Lindex=jQuery('#JIT_VGallery_Lindex').val();

	var JITVGalleryUT=jQuery('#JIT_VGallery_Upload_Title').val();
	var JITVGalleryUD=jQuery('#JIT_VGallery_Upload_Desc').val();

	var JITVGalleryUV=jQuery('#JIT_VGallery_Upload_Video_2').val();
	var JITVGalleryUI=jQuery('#JIT_VGallery_Upload_Image_2').val();

	var JITVGllery_Link=jQuery('#JIT_VGallery_Upload_Link').val();
	var JITVGallery_ONT=jQuery('#JIT_VGallery_YON').val();

	jQuery('#JIT_VGallery_Upload_Video_1').val('');
	jQuery('#JIT_VGallery_Upload_Image_1').val('');

	if(JITVGalleryUT=='' || JITVGalleryUV=='' || JITVGalleryUI=='')
	{
		if(JITVGalleryUT=='')
		{
			jQuery('#JIT_VGallery_Span_1').fadeIn();
			return false;
		}
		if (JITVGalleryUV=='') 
		{
			jQuery('#JIT_VGallery_Span_2').fadeIn();
			return false;
		}
		if(JITVGalleryUI=='')
		{
			jQuery('#JIT_VGallery_Span_3').fadeIn();
			return false;
		}			
	}
	else
	{
		jQuery('#JIT_VGallery_Photos_Ul_Li_'+JIT_VGallery_Lindex).find('.JITVGallery_Uploaded_Title').val(JITVGalleryUT);
		jQuery('#JIT_VGallery_Photos_Ul_Li_'+JIT_VGallery_Lindex).find('.JITVGallery_Uploaded_Desc').val(JITVGalleryUD);
		jQuery('#JIT_VGallery_Photos_Ul_Li_'+JIT_VGallery_Lindex).find('.JITVGallery_Uploaded_Video').val(JITVGalleryUV);
		jQuery('#JIT_VGallery_Photos_Ul_Li_'+JIT_VGallery_Lindex).find('.JITVGallery_Uploaded_Image').val(JITVGalleryUI);
		jQuery('#JIT_VGallery_Photos_Ul_Li_'+JIT_VGallery_Lindex).find('.JIT_VGallery_Photo').attr('src',JITVGalleryUI);
		jQuery('#JIT_VGallery_Photos_Ul_Li_'+JIT_VGallery_Lindex).find('.JITVGallery_Included_Link').val(JITVGllery_Link);
		jQuery('#JIT_VGallery_Photos_Ul_Li_'+JIT_VGallery_Lindex).find('.JITVGallery_Uploaded_ONT').val(JITVGallery_ONT);

		if(JITVGallery_ONT=='Yes')
		{
			jQuery('#JIT_VGallery_Photos_Ul_Li_'+JIT_VGallery_Lindex).find('.JITVGC').css('color','#0073aa');
			jQuery('#JIT_VGallery_Photos_Ul_Li_'+JIT_VGallery_Lindex).find('.JITVGR').css('color','#c5c5c5');
		}
		else
		{
			jQuery('#JIT_VGallery_Photos_Ul_Li_'+JIT_VGallery_Lindex).find('.JITVGR').css('color','#0073aa');
			jQuery('#JIT_VGallery_Photos_Ul_Li_'+JIT_VGallery_Lindex).find('.JITVGC').css('color','#c5c5c5');
		}
		
		jQuery('#JIT_VGallery_Button_U').fadeOut();
		JIT_VGallery_Main_Big_Clicked();

		setTimeout(function(){
			jQuery('#JIT_VGallery_Button_S').fadeIn();
		},300)	
	}
}