<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<style type="text/css">
	.Juna_IT_Video_Gallery_Prop_Div_Main
	{
		margin-top: 30px;
		height:120px;
		width:99%;
		border-radius: 10px;
		background-color: #0073aa;
		padding: 5px;
	}
	.Juna_IT_Logo_Orange
	{
		float: right;
		height: 70px;
		margin-right: 10px;
	}
	.Juna_IT_Video_Gallery_Prop_Save
	{
		float: right;
		width: 120px;
		background-color: #0073aa;
		color: #f68935;
		border: 1px solid #f68935;
		border-radius: 3px;
		box-shadow: 0px 0px 30px #f68935;
		cursor: pointer;
		margin-right: 20px;
	}
	.Juna_IT_Video_Gallery_Setting_Video_Title_Label
	{
		font-family: Gabriola;
		font-size: 25px;
		color: white;
		margin-left: 15px;
	}	
	#Juna_IT_Video_Gallery_Setting_Video_Title
	{
		width: 300px;
		background-color: #0073aa;
		border:none;
		color:white;
		font-family: Gabriola;
		font-size: 25px;
		margin-left: 15px;
	}	
	
	.JIT_VGallery_Main_Div1,.JIT_VGallery_Main_Div2
	{
		margin-top: 85px;
	}
	.JIT_VGallery_Main_Div2
	{
		display: none;
	}
	.JIT_VGallery_Title_Span
	{
		color: white;
		margin-left: 25px;
		font-size: 25px;
		font-family: Gabriola;
	}
	.JIT_VGallery_search_text
	{
		height: 25px;
		margin-top: -10px;
		border-radius: 3px;
	}
	.JIT_VGallery_Reset_text
	{
		width: 100px;
		background-color: #0073aa;
		color: white;
		border: 2px solid #0073aa;
		border-radius: 3px;
		box-shadow: 0px 0px 30px white;
		margin-left: 5px;
		cursor: pointer;
	}
	.JIT_VGallery_not
	{
		color: white;
		font-family: Gabriola;
		font-size: 25px;
		margin-left: 15px;
	}
	.JIT_VGallery_Main_Table
	{
		width:99.5% ;
		margin:15px 0 0 0; 
		height:40px;
		border:1px solid #0073aa;
		border-radius: 5px;
		padding: 2px;
	}
	.JIT_VGallery_first_row
	{
		background:#0073aa !important;
		color:white;
		text-align: center;
		font-family: Gabriola;
		font-size: 20px;
	}
	.JIT_VGallery_Effect_Table tr:nth-child(odd),.JIT_VGallery_Effect_Table1 tr:nth-child(odd)
	{
		background:#f0f0f0 !important;
		color:#717171;
		text-align: center;
		font-size: 14px;
		height: 30px;	
	}
	.JIT_VGallery_Effect_Table tr:nth-child(even),.JIT_VGallery_Effect_Table1 tr:nth-child(even)
	{
		background:#e4e3e3 !important;
		color:#717171;
		text-align: center;
		font-size: 14px;
		height: 30px;		
	}
	.JIT_VGallery_Effect_Table,.JIT_VGallery_Effect_Table1
	{
		width:99.5% ;
		padding: 2px;
		border:1px solid #0073aa;
		border-radius: 5px;
		margin-top: 1px;
		background-color: #c0c0c0;
	}	
	.JIT_VGallery_Effect_Table1
	{
		display: none;
	}
	.JIT_VGallery_main_id_item,.JIT_VGallery_id_item
	{
		width:5%;
	}
	.JIT_VGallery_main_title_item,.JIT_VGallery_title_item
	{
		width:35%;
	}
	.JIT_VGallery_main_effect_item,.JIT_VGallery_effect_item
	{
		width:30%;
	}
	.JIT_VGallery_main_actions_item
	{
		width:30%;
	}
	.JIT_VGallery_edit_item,.JIT_VGallery_delete_item
	{
		width:15%;
		text-decoration: underline;
		color: #b12201;
	}
	.JIT_VGallery_edit_item:hover,.JIT_VGallery_delete_item:hover
	{
		cursor: pointer;
		color: #f68935;
	}
	.JIT_VG_FVI
	{
		margin-top: 10px;
		width: 60%;
		display: none;
	}
	.JIT_VGallery_Button_Div
	{
		margin-top: 15px;
		border-radius: 5px;
		text-align: center;
		padding: 5px;
		width: 99%;
		background-color: #f68935;
	}
	.JIT_VGallery_Full_Version_Image
	{
		height: 50px;
		width: 250px;
		background-image: url("<?php echo plugins_url('../Images/full-version.png',__FILE__);?>");
		background-size: 250px 50px;
		background-repeat: no-repeat;
		background-position: center;
		margin: 0 auto;
		transition-duration:1s; 
	}
	.JIT_VGallery_Full_Version_Image:hover
	{
		background-image: url("<?php echo plugins_url('../Images/full-version-1.png',__FILE__);?>");
	}
</style>