<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<script type="text/javascript">
	function Edit_VGallery_Effect(Edit_ID)
	{
		jQuery('.JIT_VGallery_Main_Div1').fadeOut();
		jQuery('.JIT_VGallery_Main_Table').fadeOut();
		jQuery('.JIT_VGallery_Effect_Table').fadeOut();
		jQuery('.JIT_VGallery_Effect_Table1').fadeOut();
		if(Edit_ID=='1')
		{
			jQuery('#Juna_IT_Video_Gallery_Setting_Video_Title').html('Video Gallery/Content-Popup');
		}
		else if(Edit_ID=='2')
		{
			jQuery('#Juna_IT_Video_Gallery_Setting_Video_Title').html('Block Style Video Gallery');
		}
		else if(Edit_ID=='3')
		{
			jQuery('#Juna_IT_Video_Gallery_Setting_Video_Title').html('Thumbnails');
		}
		else if(Edit_ID=='4')
		{
			jQuery('#Juna_IT_Video_Gallery_Setting_Video_Title').html('Video Slider');
		}
		else if(Edit_ID=='5')
		{
			jQuery('#Juna_IT_Video_Gallery_Setting_Video_Title').html('Video Carousel');
		}
		else if(Edit_ID=='6')
		{
			jQuery('#Juna_IT_Video_Gallery_Setting_Video_Title').html('Polaroids');
		}
		setTimeout(function(){
			jQuery('#JIT_VG_FVI_'+Edit_ID).fadeIn();
			jQuery('.JIT_VGallery_Main_Div2').fadeIn();
		},500)
	}
	function JIT_VGallery_Search()
	{

	}
	function JIT_VGallery_Reset()
	{

	}
	function JIT_VGallery_Cancel()
	{
		location.reload();
	}
</script>