<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<style type="text/css">
	.Juna_IT_Video_Gallery_Submenu1_Footer_Div
	{
		margin-top: 30px;
		width: 99%;
		height: 120px;
		background-color: #0073aa; 
		border-radius: 10px;
		padding: 5px;
	}
	.Juna_IT_Logo_Orange
	{
		float: left;
		height: 70px;
	}
	.Videos_Title_Span
	{
		color: white;
		margin-left: 25px;
		font-size: 25px;
		font-family: Gabriola;
	}
	.search_text_field
	{
		height: 25px;
		margin-top: -10px;
		border-radius: 3px;
	}
	.Reset_button
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
	.Add_Video_button
	{
		cursor: pointer;
		width: 120px;
		background-color: #0073aa;
		color: #f68935;
		border: 1px solid #f68935;
		border-radius: 3px;
		box-shadow: 0px 0px 30px #f68935;
		margin-right: 25px;
		margin-top: -5px;
		float: right;
	}
	.Videos_Main_Table
	{
		width:99.5% ;
		margin:15px 0 0 0; 
		height:40px;
		border:1px solid #0073aa;
		border-radius: 5px;
		padding: 2px;
	}
	.first_row
	{
		background:#0073aa !important;
		color:white;
		text-align: center;
		font-family: Gabriola;
		font-size: 20px;
	}
	.Videos_Table,.Videos_Table1
	{
		width:99.5% ;
		padding: 2px;
		border:1px solid #0073aa;
		border-radius: 5px;
		margin-top: 1px;
		background-color: #c0c0c0;
	}	
	.Videos_Table1
	{
		display: none;
	}
	.Videos_Table tr:nth-child(odd),.Videos_Table1 tr:nth-child(odd)
	{
		background:#f0f0f0 !important;
		color:#717171;
		text-align: center;
		font-size: 14px;
		height: 30px;	
	}
	.Videos_Table tr:nth-child(even),.Videos_Table1 tr:nth-child(even)
	{
		background:#e4e3e3 !important;
		color:#717171;
		text-align: center;
		font-size: 14px;
		height: 30px;		
	}
	.id_item,.main_id_item
	{
		width:3%;
	}
	.title_item,.main_title_item
	{
		width:25%;
	}	
	.quantity_video_item,.main_quantity_video_item
	{
		width:7%;
	}
	.type_video_item,.main_type_video_item
	{
		width:20%;
	}
	.views_item,.main_views_item
	{
		width:15%;
	}
	.main_actions_item
	{
		width:10%;
	}
	.delete_item,.edit_item
	{
		width:5%;
		text-decoration: underline;
		color: #b12201;
	}
	.delete_item:hover,.edit_item:hover
	{
		cursor: pointer;
		color: #f68935;
	}
	
	.Juna_IT_Video_Gallery_Sub1_Page2
	{
		margin-top: 15px;
		height: 120px;
		background-color: #0073aa; 
		border-radius: 10px;
		padding: 5px;
	}
	.Add_new_Video_Gallery_Cancel_button,.Add_new_Video_Gallery_Save_button,.Add_new_Video_Gallery_Update_button,.Add_new_Video_Gallery_Add_Video_button
	{
		width: 120px;
		background-color: #0073aa;
		color: #f68935;
		border: 1px solid #f68935;
		border-radius: 3px;
		box-shadow: 0px 0px 30px #f68935;
		margin-right: 25px;
		margin-top: -5px;
		float: right;
		cursor: pointer;
	}	
	.Add_new_Video_Gallery_Update_button
	{
		display: none;
	}
	.Add_new_Video_Gallery_Title_Name
	{
		color: red;
		margin-top: -5px;
		width: 200px;
		border-radius: 3px;
	}	
	.video_icon_div
	{
		width:300px;
		border:1px solid #e4e3e3;
	}	
	.Juna_IT_Video_Gallery_Remove_Button_Div
	{
		height:20px;
		width:100%;
	}
	.remove_span
	{
		float: right;
		color: #0073aa;
		margin-right: 25px;
		opacity: 0;
		transition-duration:1s;
	}
	.Juna_IT_Video_Gallery_Remove_Button_Div:hover .remove_span
	{
		height: 100%;
		opacity: 1;
	}
	#Juna_IT_Video_Gallery_Ul li
	{
		cursor: all-scroll;
	}
	#Juna_IT_Video_Gallery_Ul li:nth-child(even)
	{
		background-color: #f5f5f5;
	}
	#Juna_IT_Video_Gallery_Ul li:nth-child(odd)
	{
		background-color: #edecec;
	}
	.Juna_IT_Video_Gallery_Image
	{
		cursor: pointer;
		opacity: 0.3;
		transition-duration:1s;
	}
	.Juna_IT_Video_Gallery_Image:hover
	{
		opacity: 1;
	}
	.video_description_div
	{
		float:right;
		width: 680px;
		height: 222px;
	}
	
	.Juna_IT_Video_Gallery_Table 
	{
		height: 100%;
		width: 100%;
		position: relative;
		transition-duration:0.1s;
		border-right: 1px dotted #ffffff;
	}
	.Juna_IT_Video_Gallery_Table td:nth-child(even)
	{
		width: 70%;
	}
	.Juna_IT_Video_Gallery_Table td:nth-child(odd)
	{
		width: 30%;
		text-align: center;
		font-size: 15px;
		color: #0073aa;
	}
	#Juna_IT_Video_Gallery_Ul li:hover .Juna_IT_Video_Gallery_Table
	{
		border-right: 1px dotted #0073aa;
	}
	.Juna_IT_Video_Gallery_Table tr:nth-child(odd)
	{
		height: 50px;
	}
	.Juna_IT_Video_Gallery_type_text
	{
		width: 99%;
	}	
	.searched_gallery_does_not_exist
	{
		color: white;
		font-family: Gabriola;
		font-size: 25px;
		margin-left: 15px;
	}
	.Juna_IT_Video_Gallery_Sub1_Page3
	{
		border:1px solid #0073aa; 
		margin-top:15px;
		background-color:#ffffff;
		border-radius:10px; 
		padding:5px;
		width: 60%;
		display: none;
	}
	.Juna_IT_Video_Gallery_Sub1_Page3_Table
	{
		width: 100%;
	}
	.Juna_IT_Video_Gallery_Sub1_Page3_Table tr:nth-child(odd)
	{
		background-color: #edecec;
		text-align: center;
		font-size: 14px;
		font-family: Consolas;
	}
	.Juna_IT_Video_Gallery_Sub1_Page3_Table tr:nth-child(even)
	{
		background-color: #f5f5f5;
		text-align: center;
	}
	.Juna_IT_Video_Gallery_Sub1_Page3_Table td:nth-child(1)
	{
		width: 40%;
	}
	.Juna_IT_Video_Gallery_Sub1_Page3_Table td:nth-child(2), .Juna_IT_Video_Gallery_Sub1_Page3_Table td:nth-child(3)
	{
		width: 30%;
	}
	.JIT_VGallery_Sub1D1
	{
		margin-top: 85px;
	}	
	.JIT_VGallery_Sub1D2
	{
		margin-top: 85px;
		display: none;
	}
	.JITVGalleryicon_Yes,.JITVGalleryicon_No
	{
		cursor: pointer;
	}
	.JIT_VGallery_Short_Div
	{
		border:1px solid #0073aa;
		margin-top: 10px;
		width: 99.5%;
		background-color: #ffffff;
		padding:1px;
		border-radius: 5px;
	}
	.JIT_VGallery_Short_Table
	{
		width: 100%;
		text-align: center;
		color:#ffffff;
		font-style: bold;
		font-weight: 900;
	}
	.JIT_VGallery_Short_Table td:nth-child(1)
	{
		width: 20%;
		padding: 5px;
		background-color: #0073aa;
	}
	.JIT_VGallery_Short_Table td:nth-child(2)
	{
		width: 40%;
		padding: 5px;
		background-color: #0073aa;
	}
	.JIT_VGallery_Short_Table td:nth-child(3)
	{
		width: 40%;
		padding: 5px;
		background-color: #0073aa;
	}
</style>