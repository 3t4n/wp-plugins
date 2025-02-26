<?php
	class  Juna_IT_Video_Gallery extends WP_Widget
	{
		function __construct()
 	  	{
 			$params=array('name'=>'Juna_IT_Video_Gallery','description'=>'This is the widget of Juna IT Video Gallery plugin');
			parent::__construct('Juna_IT_Video_Gallery','',$params);
 	  	}
 	  	function form($instance)
 		{
 			$Juna_IT_Video_Gallery_Name=$instance['gallery_title'];
		   	?>
		   	<div>			  
			   	<p>
			   		Gallery Name:
			   		<select name="<?php echo $this->get_field_name('gallery_title'); ?>" class="widefat" > 
				   		<?php
				   			global $wpdb;
				   			$table_name=$wpdb->prefix . "juna_it_gallery_manager";
				   			$gallery_name=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id > %d", 0));

				   			foreach ($gallery_name as $gallery_title)
				   			{
				   				?><option value="<?php echo $gallery_title->id;?>"><?php echo $gallery_title->gallery_title;?></option><?php 
				   			}
				   		?>			   		
			   		</select>
			   	</p>		   
		   	</div>
		   	<?php
 		}
 		function widget($args,$instance)
 		{
 			extract($args);
 		 	$Juna_IT_Video_Gallery_Name=empty($instance['gallery_title']) ? '' : $instance['gallery_title'];
 		 	global $wpdb;

 		 	$table_name   = $wpdb->prefix . "juna_it_gallery_manager";
			$table_name1  = $wpdb->prefix . "juna_it_video_manager";
			$table_name2  = $wpdb->prefix . "juna_it_video_link";

			$table_name4  = $wpdb->prefix . "juna_it_video_effdb";
			$table_name5  = $wpdb->prefix . "juna_it_v_effect1";
			$table_name6  = $wpdb->prefix . "juna_it_v_effect2";
			$table_name7  = $wpdb->prefix . "juna_it_v_effect3";
			$table_name8  = $wpdb->prefix . "juna_it_v_effect4";
			$table_name9  = $wpdb->prefix . "juna_it_v_effect5";
			$table_name10 = $wpdb->prefix . "juna_it_v_effect6";

			$JIT_VG_GP=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id=%d", $Juna_IT_Video_Gallery_Name));

			$JIT_VG_VP1=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE gallery_number=%s", $Juna_IT_Video_Gallery_Name));
			$JIT_VG_VP2=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE gallery_number=%s", $Juna_IT_Video_Gallery_Name));

			$JIT_VG_EP_M=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE effect_name=%s", $JIT_VG_GP[0]->gallery_type));

			if($JIT_VG_EP_M[0]->effect_type=='Video Gallery/Content-Popup')
			{
				$JIT_VG_EP=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE JIT_VGallery_TN_ID=%s", $JIT_VG_EP_M[0]->id));
				$JIT_VG_EIT=$JIT_VG_EP[0]->Juna_IT_Video_Gallery_Choose_Buttons_Type;
				$height_hover_image1 = explode('px',$JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Height);
	 		 	$height_hover_image = (int)$height_hover_image1[0]/100*40;
	 		 	$height_hover_span = (int)$height_hover_image1[0]/100*30;
			}
			else if($JIT_VG_EP_M[0]->effect_type=='Block Style Video Gallery')
			{
				$JIT_VG_EP=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE JIT_VGallery_TN_ID=%s", $JIT_VG_EP_M[0]->id));				
			}
			else if($JIT_VG_EP_M[0]->effect_type=='Thumbnails')
			{
				$JIT_VG_EP=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE JIT_VGallery_TN_ID=%s", $JIT_VG_EP_M[0]->id));
				$JIT_VG_EIT=$JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Icons;
			}
			else if($JIT_VG_EP_M[0]->effect_type=='Video Slider')
			{
				$JIT_VG_EP=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE JIT_VGallery_TN_ID=%s", $JIT_VG_EP_M[0]->id));
			}
			else if($JIT_VG_EP_M[0]->effect_type=='Video Carousel')
			{
				$JIT_VG_EP=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE JIT_VGallery_TN_ID=%s", $JIT_VG_EP_M[0]->id));
			}
			else if($JIT_VG_EP_M[0]->effect_type=='Polaroids')
			{
				$JIT_VG_EP=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name10 WHERE JIT_VGallery_TN_ID=%s", $JIT_VG_EP_M[0]->id));
				if($JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Icon_Type==1)
				{
					$Juna_IT_Video_Gallery_Close_Icon='junaiticons-times-circle';
				}
				else if($JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Icon_Type==2)
				{
					$Juna_IT_Video_Gallery_Close_Icon='junaiticons-times-circle-o';
				}
				else if($JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Icon_Type==3)
				{
					$Juna_IT_Video_Gallery_Close_Icon='junaiticons-close';
				}
			}

 		 	$Juna_IT_Video_Gallery_Show_Video_Type=$JIT_VG_GP[0]->Juna_IT_Video_Gallery_Show_Video_Type;
 		 	$Juna_IT_Video_Gallery_Videos_Quantity=$JIT_VG_GP[0]->Juna_IT_Video_Gallery_Videos_Quantity;
 		 	$Juna_IT_Video_Gallery_Count_Videos=count($JIT_VG_VP1);

 		 	if($Juna_IT_Video_Gallery_Show_Video_Type=="Show All")
 		 	{
 		 		$Juna_IT_Video_Gallery_Quantity=$Juna_IT_Video_Gallery_Count_Videos;
 		 		$Juna_IT_Video_Gallery_Per_Page_First='';
 		 		$Juna_IT_Video_Gallery_Per_Page_Second='';
 		 		$Juna_IT_Video_Gallery_Hoplo='Show';
 		 		$Juna_IT_Video_Gallery_Load_More='';
	 		 	$Juna_IT_Video_Gallery_Load_More_='';
 		 	}
 		 	else if($Juna_IT_Video_Gallery_Show_Video_Type=="Pageination")
 		 	{
 		 		if($Juna_IT_Video_Gallery_Videos_Quantity>=$Juna_IT_Video_Gallery_Count_Videos)
 		 		{
 		 			$Juna_IT_Video_Gallery_Quantity=$Juna_IT_Video_Gallery_Count_Videos;
	 		 		$Juna_IT_Video_Gallery_Per_Page_First=1;
	 		 		$Juna_IT_Video_Gallery_Per_Page_Second='/1';
	 		 		$Juna_IT_Video_Gallery_Hoplo='none';
	 		 		$Juna_IT_Video_Gallery_Load_More='';
	 		 		$Juna_IT_Video_Gallery_Load_More_hidden='';
 		 		} 	
 		 		else
 		 		{
 		 			$Juna_IT_Video_Gallery_Quantity=$Juna_IT_Video_Gallery_Videos_Quantity;
	 		 		$Juna_IT_Video_Gallery_Per_Page_First=1;
	 		 		$Juna_IT_Video_Gallery_fg=$Juna_IT_Video_Gallery_Count_Videos/$Juna_IT_Video_Gallery_Videos_Quantity;
	 		 		$Juna_IT_Video_Gallery_Per_Page_Second='/'.ceil($Juna_IT_Video_Gallery_fg);
	 		 		$Juna_IT_Video_Gallery_Hoplo='done';
	 		 		$Juna_IT_Video_Gallery_Load_More='';
	 		 		$Juna_IT_Video_Gallery_Load_More_hidden='';
 		 		}	 		
 		 	}
 		 	else if($Juna_IT_Video_Gallery_Show_Video_Type=="Load More")
 		 	{
 		 		if($Juna_IT_Video_Gallery_Videos_Quantity>=$Juna_IT_Video_Gallery_Count_Videos)
 		 		{
 		 			$Juna_IT_Video_Gallery_Quantity=$Juna_IT_Video_Gallery_Count_Videos;
	 		 		$Juna_IT_Video_Gallery_Per_Page_First='';
	 		 		$Juna_IT_Video_Gallery_Per_Page_Second='';
	 		 		$Juna_IT_Video_Gallery_Hoplo='none';
	 		 		$Juna_IT_Video_Gallery_Load_More='';
	 		 		$Juna_IT_Video_Gallery_Load_More_hidden='none';
 		 		} 	
 		 		else
 		 		{
 		 			$Juna_IT_Video_Gallery_Quantity=$Juna_IT_Video_Gallery_Videos_Quantity;
	 		 		$Juna_IT_Video_Gallery_Per_Page_First='';
	 		 		$Juna_IT_Video_Gallery_Per_Page_Second='';
	 		 		$Juna_IT_Video_Gallery_Hoplo='done';
	 		 		$Juna_IT_Video_Gallery_Load_More='Load More...';
	 		 		$Juna_IT_Video_Gallery_Load_More_hidden='done';	 		 		
 		 		}
 		 	}

 		 	for($j=0;$j<count($JIT_VG_VP1);$j++)
 		 	{
 		 		$u = explode(')*^*(', $JIT_VG_VP1[$j]->video_title);
				$y = implode('"', $u);
				$t = explode(")*&*(", $y);
				$Juna_IT_Video_Gallery_Videos_Title[$j] = implode("'", $t);

				$w = explode(')*^*(', $JIT_VG_VP1[$j]->video_description);
				$s = implode('"', $w);
				$x = explode(")*&*(", $s);
				$Juna_IT_Video_Gallery_Videos_Description[$j] = implode("'", $x);

 		 		$Juna_IT_Video_Gallery_Videos_URL[$j]=$JIT_VG_VP1[$j]->video_url;
 		 		$Juna_IT_Video_Gallery_Images_URL[$j]=$JIT_VG_VP1[$j]->image_url;
 		 	}
 		 	
 		 	if($JIT_VG_EIT==1)
 		 	{
 		 		$Juna_IT_Video_Gallery_Left_Icon='junaiticons-arrow-circle-o-left';
 		 		$Juna_IT_Video_Gallery_Right_Icon='junaiticons-arrow-circle-o-right';
 		 		$Juna_IT_Video_Gallery_Close_Icon='junaiticons-times-circle-o';
 		 		$Juna_IT_Video_Gallery_Load_More_hidden1='';
 		 	}
 		 	else if($JIT_VG_EIT==2)
 		 	{
 		 		$Juna_IT_Video_Gallery_Left_Icon='junaiticons-arrow-left';
				$Juna_IT_Video_Gallery_Right_Icon='junaiticons-arrow-right';
				$Juna_IT_Video_Gallery_Close_Icon='junaiticons-close';
				$Juna_IT_Video_Gallery_Load_More_hidden1='';
 		 	}
 		 	else if($JIT_VG_EIT==3)
 		 	{
 		 		$Juna_IT_Video_Gallery_Left_Icon='junaiticons-chevron-left';
				$Juna_IT_Video_Gallery_Right_Icon='junaiticons-chevron-right';
				$Juna_IT_Video_Gallery_Close_Icon='junaiticons-close';
				$Juna_IT_Video_Gallery_Load_More_hidden1='';
 		 	}
 		 	else if($JIT_VG_EIT==4)
 		 	{
 		 		$Juna_IT_Video_Gallery_Left_Icon='junaiticons-toggle-left';
				$Juna_IT_Video_Gallery_Right_Icon='junaiticons-toggle-right';
				$Juna_IT_Video_Gallery_Close_Icon='junaiticons-times-circle-o';
				$Juna_IT_Video_Gallery_Load_More_hidden1='';
 		 	}
 		 	else if($JIT_VG_EIT==5)
 		 	{
 		 		$Juna_IT_Video_Gallery_Left_Icon='junaiticons-chevron-circle-left';
				$Juna_IT_Video_Gallery_Right_Icon='junaiticons-chevron-circle-right';
				$Juna_IT_Video_Gallery_Close_Icon='junaiticons-times-circle';
				$Juna_IT_Video_Gallery_Load_More_hidden1='';
 		 	}
 		 	else if($JIT_VG_EIT==6)
 		 	{
 		 		$Juna_IT_Video_Gallery_Left_Icon='junaiticons-arrow-circle-left';
				$Juna_IT_Video_Gallery_Right_Icon='junaiticons-arrow-circle-right';
				$Juna_IT_Video_Gallery_Close_Icon='junaiticons-times-circle';
				$Juna_IT_Video_Gallery_Load_More_hidden1='';
 		 	}
 		 	else if($JIT_VG_EIT==7)
 		 	{
 		 		$Juna_IT_Video_Gallery_Left_Icon='junaiticons-angle-double-left';
				$Juna_IT_Video_Gallery_Right_Icon='junaiticons-angle-double-right';
				$Juna_IT_Video_Gallery_Close_Icon='junaiticons-times-circle-o';
				$Juna_IT_Video_Gallery_Load_More_hidden1='';
 		 	}
 		 	else if($JIT_VG_EIT==8)
 		 	{
 		 		$Juna_IT_Video_Gallery_Left_Icon='junaiticons-caret-left';
				$Juna_IT_Video_Gallery_Right_Icon='junaiticons-caret-right';
				$Juna_IT_Video_Gallery_Close_Icon='junaiticons-close';
				$Juna_IT_Video_Gallery_Load_More_hidden1='';
 		 	}
 		 	else if($JIT_VG_EIT==9)
 		 	{
 		 		$Juna_IT_Video_Gallery_Left_Icon='junaiticons-mail-reply';
				$Juna_IT_Video_Gallery_Right_Icon='junaiticons-mail-forward';
				$Juna_IT_Video_Gallery_Close_Icon='junaiticons-times-circle';
				$Juna_IT_Video_Gallery_Load_More_hidden1='';
 		 	}

 		 	if($JIT_VG_EP_M[0]->effect_type=='Video Gallery/Content-Popup')
 		 	{
 		 		?>
				<style>
					.botDiv{
						border-top:1px dotted <?php echo $JIT_VG_EP[0]->JIT_VG_PTC;?> !important;
					}
				</style>
 		 		<input type="text" style="display: none;" value="<?php echo $Juna_IT_Video_Gallery_Load_More_hidden1;?>" id="Juna_IT_Video_Gallery_Load_More_hidden1">
	 		 	<div class="Juna_IT_Video_Gallery_Content_Main_Video_Contain_Div" onclick="Juna_IT_Video_Gallery_Content_Main_Video_Contain_Div_Closed()"></div>
 		 		
				<div class="Juna_IT_Video_Gallery_Content_Video_Contain_Div" style="border:<?php echo  $JIT_VG_EP[0]->JIT_VG_PBW;?> <?php echo $JIT_VG_EP[0]->JIT_VG_PBS;?> <?php echo $JIT_VG_EP[0]->JIT_VG_PBC;?>;background-color:<?php echo  $JIT_VG_EP[0]->JIT_VG_PBgC;?>;">
					<div class='Juna_IT_Video_Gallery_Content_Video_Contain_Div_relative'>	
						<div class="Juna_IT_Video_Gallery_Content_Icons_Div" style="line-height:0px;background-color: <?php echo  $JIT_VG_EP[0]->JIT_VG_IBgC;?>;color:<?php echo  $JIT_VG_EP[0]->JIT_VG_IC;?>;font-size: <?php echo  $JIT_VG_EP[0]->JIT_VG_IFS;?>">
							<div class="Juna_IT_Video_Gallery_Content_Icons_Div_Left">
								<input type="text" style="display: none;" id="Juna_IT_Video_Gallery_Hidden_Gallery_Number" value="<?php echo $Juna_IT_Video_Gallery_Name;?>">
								<i class="junaitcontent junaiticons-style <?php echo $Juna_IT_Video_Gallery_Left_Icon;?>"  onclick="Juna_IT_Video_Gallery_Content_Left_Icon_Clicked()"></i>
							</div>
							<div class="Juna_IT_Video_Gallery_Content_Count_Div" style="line-height:0px;color:<?php echo  $JIT_VG_EP[0]->JIT_VG_IC;?>;font-size: <?php echo  $JIT_VG_EP[0]->JIT_VG_IFS;?>"><span id="Juna_IT_Video_Gallery_Content_Video_Count"></span> of <?php echo $Juna_IT_Video_Gallery_Count_Videos;?></div>
							<div class="Juna_IT_Video_Gallery_Content_Icons_Div_Close" onclick="Juna_IT_Video_Gallery_Content_Main_Video_Contain_Div_Closed()">
								<i class="junaitcontent junaiticons-style <?php echo $Juna_IT_Video_Gallery_Close_Icon;?>" ></i>
							</div> 
							<div class="Juna_IT_Video_Gallery_Content_Icons_Div_Right">
								<i class="junaitcontent junaiticons-style <?php echo $Juna_IT_Video_Gallery_Right_Icon;?>" onclick="Juna_IT_Video_Gallery_Content_Right_Icon_Clicked()"></i>
							</div>
						</div>
						<div class='iframe_relative'>
							<iframe class="Juna_IT_Video_Gallery_Content_Video_Iframe" style="border-radius:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Border_Radius;?>;" src="" frameborder="0" allowfullscreen></iframe>
						</div>
						<div class='Juna_IT_Video_Gallery_Content_Description_relative'>
							<div class='Juna_IT_Video_Gallery_Content_Description' style="background-color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Description_Background_Color;?>;">
								<input type="text" style="display: none;" class="Juna_IT_Video_Gallery_Content_Description_Text_Firts" value="">
								<h2 class='Juna_IT_Video_Gallery_Content_Description_Title' style='text-align:center; color:<?php echo $JIT_VG_EP[0]->JIT_VG_PTC;?>;font-family:<?php echo $JIT_VG_EP[0]->JIT_VG_PTFF;?>;font-size:<?php echo $JIT_VG_EP[0]->JIT_VG_PTFS;?>; margin-top:0px;'></h2>
								<div class='botDiv' style="margin-bottom:15px;margin-left:15px;width:90%;"></div>
								<p class='Juna_IT_Video_Gallery_Content_Description_Text' style='padding-left:5px;padding-right:10px;color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Description_Color;?>;font-family:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Font_Family_Video_Description;?>;font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Font_Size_Video_Description;?>;'></p>
								<p style="text-align:<?php echo $JIT_VG_EP[0]->JIT_VG_CP_LPos;?>;" class="JIT_VGallery_CP_LinkP"><a class="JIT_VGallery_CP_Link" href="" target=""><span class='PopLink' style="background-color: <?php echo $JIT_VG_EP[0]->JIT_VG_CP_LBgC;?>;padding: 3px 10px 3px 10px;color:<?php echo $JIT_VG_EP[0]->JIT_VG_CP_LC;?>; font-size:<?php echo $JIT_VG_EP[0]->JIT_VG_CP_LFS;?>;font-family:<?php echo $JIT_VG_EP[0]->JIT_VG_CP_LFF;?>;border:1px solid <?php echo $JIT_VG_EP[0]->JIT_VG_CP_LBC;?>;border-radius: <?php echo $JIT_VG_EP[0]->JIT_VG_CP_LBR;?>;cursor: pointer;"><?php echo $JIT_VG_EP[0]->JIT_VG_CP_LT;?></span></a></p>
							</div>
						</div>
					</div>
				</div>
				
				<input type='text' style='display:none;' class='descFirstFontSize' value='<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_First_Font_Size_Video_Description;?>'/>
	 		 	<input type='text' style='display:none;' class='descFontSize' value='<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Font_Size_Video_Description;?>'/>
				<input type='text' style='display:none;' class='titlFontSize' value='<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Font_Size_Video_Title;?>'/>
				<input type='text' style='display:none;' class='popIconssFontSize' value='<?php echo  $JIT_VG_EP[0]->JIT_VG_IFS;?>'/>
				<input type='text' style='display:none;' class='linkFontSize' value='<?php echo $JIT_VG_EP[0]->JIT_VG_CP_LFS;?>'/>
	 		 		<div style="width:100%; float:left;">
		 		 		<?php
			 		 		for($j=0;$j<$Juna_IT_Video_Gallery_Count_Videos;$j++)
			 		 		{				 		 			
				 				?>				 		 			
					 		 		<div id="Juna_IT_Video_Gallery_Video_<?php echo $j+1;?>" style="border-radius:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Border_Radius;?>;" class="Juna_IT_Video_Gallery_Content_Video" onclick='Juna_IT_Video_Gallery_Content_Big_Clicked("<?php echo $Juna_IT_Video_Gallery_Videos_URL[$j];?>","<?php echo $j+1;?>","<?php echo $Juna_IT_Video_Gallery_Images_URL[$j];?>","<?php echo $JIT_VG_VP1[$j]->video_title;?>","<?php echo $JIT_VG_VP2[$j]->video_link;?>","<?php echo $JIT_VG_VP2[$j]->video_ONT;?>")'>
					 		 			<div class = 'Juna_IT_Video_Gallery_Content_black_div_animate'>
					 		 				<div class='Juna_IT_Video_Gallery_Content_load_div_in_open_video' style='background-image:url(<?php echo plugins_url('/Images/video_load.gif',__FILE__)?>);'></div>
					 		 			</div>
					 		 			<div class="Juna_IT_Video_Gallery_Content_Zoom_Div" style="position:relative;text-align:center;position:absolute; height:100%; width:100%; background-color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Hover_Background_Color;?>;opacity:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Background_Transparency;?>;border-radius:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Border_Radius;?>">
					 		 				<div  class = 'Juna_IT_Video_Gallery_Content_Zoom_Video' style="position:relative;height:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Height;?>;">
												<img src='<?php echo plugins_url('/Images/Zoom1.png',__FILE__);?>' class='imgIcon' style='width:50px;height:50px;'>
											</div>
					 		 			</div>
					 		 			<img class = 'image_video_poster_in_JI' style="width:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Width;?>;
					 		 				height:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Height;?>;
					 		 				border-width:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Border_Width;?>;
					 		 				border-radius:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Border_Radius;?>;
					 		 				border-style:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Border_Style;?>;
					 		 				border-color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Border_Color;?>;" 
					 		 				src="<?php echo $Juna_IT_Video_Gallery_Images_URL[$j];?>;">
					 		 			<div class = 'hover_video_div_JI'style="width:100%; height:<?php echo $height_hover_span;?>px;position:absolute;bottom:0;left:0;z-index:1000000; background-color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Title_Background_Color;?>; text-align:center;clear:both;z-index:0">
					 		 				<span style="display:block;margin-top:5%;color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Title_Color;?>;
					 		 					text-shadow:2px 2px 10px <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Box_Shadow_Video_Title_Color;?>;
					 		 					font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Font_Size_Video_Title;?>; 
					 		 					font-family:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Font_Family_Video_Title;?>;"><?php echo $Juna_IT_Video_Gallery_Videos_Title[$j];?>
					 		 				</span>
					 		 			</div>
					 		 		</div>
				 		 		<?php
			 		 		}			 		 		
		 		 		?>
						<input type='text' style='display:none;' class='popImgWidth' value='<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Width;?>'>
						<input type='text' style='display:none;' class='popImgHeight' value='<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Height;?>'>
						<input type='text' style='display:none;' class='popImgTitlFontSize' value='<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Font_Size_Video_Title;?>'>
						<input type='text' style='display:none;' class='firstPagination' value='<?php echo $JIT_VG_EP[0]->JIT_VG_Page_PFS;?>'>
						<input type='text' style='display:none;' class='firstPaginationIconSize' value='<?php echo $JIT_VG_EP[0]->JIT_VG_Page_IFS;?>'>
						
		 		 		<div class='pagination1' id="Juna_IT_Video_Gallery_Show_All" style="margin-top:40px;float:left;font-size:<?php echo $JIT_VG_EP[0]->JIT_VG_Page_PFS;?>;color:<?php echo $JIT_VG_EP[0]->JIT_VG_Page_PC;?>;text-align:<?php echo $JIT_VG_EP[0]->JIT_VG_Page_PPos;?>;width:100%">
		 		 			<input type="text" style="display: none;" value="<?php echo $Juna_IT_Video_Gallery_Hoplo;?>" id="Juna_IT_Video_Gallery_Hoplo">
		 		 			<input type="text" style="display: none;" value="<?php echo $Juna_IT_Video_Gallery_Count_Videos;?>" id="Juna_IT_Video_Gallery_Count_Videos">
		 		 			<input type="text" style="display: none;" value="<?php echo $Juna_IT_Video_Gallery_Videos_Quantity;?>" id="Juna_IT_Video_Gallery_Videos_Quantity">
		 		 			<input type="text" style="display: none;" value="<?php echo $Juna_IT_Video_Gallery_Videos_Quantity;?>" id="Juna_IT_Video_Gallery_Videos_Quantity_Hidden">
		 		 			<input type="text" style="display: none;" value="<?php echo $Juna_IT_Video_Gallery_Load_More_hidden;?>" id="Juna_IT_Video_Gallery_Load_More_hidden">
    				  		<input type="text" style="display: none;" id="Juna_IT_Video_Gallery_Hidden_Type" value="Content Popup">

		 		 			<i class="PIc junaiticonsdraw junaiticons-style junaiticons-fast-backward" style="color:<?php echo $JIT_VG_EP[0]->JIT_VG_Page_IC;?>; font-size:<?php echo $JIT_VG_EP[0]->JIT_VG_Page_IFS;?>;" onclick="Juna_IT_Video_Gallery_Fast_Backward_Clicked()"></i>
		 		 			<i class="PIc junaiticonsdraw junaiticons-style junaiticons-chevron-left" style="color:<?php echo $JIT_VG_EP[0]->JIT_VG_Page_IC;?>; font-size:<?php echo $JIT_VG_EP[0]->JIT_VG_Page_IFS;?>;" onclick="Juna_IT_Video_Gallery_Chevron_Left_Clicked()"></i>
		 		 			<span id="Juna_IT_Video_Gallery_First_Page"><?php echo $Juna_IT_Video_Gallery_Per_Page_First;?></span><span id="Juna_IT_Video_Gallery_End_Page"><?php echo $Juna_IT_Video_Gallery_Per_Page_Second;?></span><span id="Juna_IT_Video_Gallery_Load_More" onclick="Juna_IT_Video_Gallery_Load_More_Clicked()"><?php echo $Juna_IT_Video_Gallery_Load_More;?></span>
		 		 			<i class="PIc junaiticonsdraw junaiticons-style junaiticons-chevron-right" style="color:<?php echo $JIT_VG_EP[0]->JIT_VG_Page_IC;?>; font-size:<?php echo $JIT_VG_EP[0]->JIT_VG_Page_IFS;?>;" onclick="Juna_IT_Video_Gallery_Chevron_Right_Clicked()"></i>
		 		 			<i class="PIc junaiticonsdraw junaiticons-style junaiticons-fast-forward" style="color:<?php echo $JIT_VG_EP[0]->JIT_VG_Page_IC;?>; font-size:<?php echo $JIT_VG_EP[0]->JIT_VG_Page_IFS;?>;" onclick="Juna_IT_Video_Gallery_Fast_Forward_Clicked()"></i>
		 		 		</div>	 		 				 		 		
	 		 		</div>
					
 		 		<?php
 		 	}
 		 	else if($JIT_VG_EP_M[0]->effect_type=='Block Style Video Gallery')
 		 	{
 		 		?>
 		 			<div style="width:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Container;?>; float:left;text-align:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Position;?>">
		 		 		<?php
			 		 		for($j=0;$j<$Juna_IT_Video_Gallery_Count_Videos;$j++)
			 		 		{
				 		 		?>
					 		 		<div class="Juna_IT_Video_Gallery_Main_Div" style="display:none;margin:5px 15px 5px 15px;position:relative;" id="Juna_IT_Video_Gallery_Video_<?php echo $j+1;?>">
						 		 		<?php 
						 		 			if($JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Location=="After Title" && $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Title_Background_Color1!='none')
						 		 			{
						 		 				?>
						 		 					<p class='BlockStyleTitle' style="padding:10px;position:relative;background-color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Title_Background_Color1;?>;color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Title_Color1;?>;font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Font_Size_Video_Title1;?>;font-family:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Font_Family_Video_Title1;?>;text-align:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Title_Align;?>;"><?php echo $Juna_IT_Video_Gallery_Videos_Title[$j];?></p>
						 		 				<?php
						 		 				if($JIT_VG_EP[0]->Juna_IT_Video_Gallery_Line_Color!='none')
						 		 				{
						 		 					?>
						 		 						<div style="border-top:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Line_Width;?> <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Line_Style;?> <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Line_Color;?>; margin-top:-15px;margin-bottom:10px;"></div>
						 		 					<?php
						 		 				}
						 		 			}
						 		 		?>					 		 			
 		 								<iframe class='videoIframes' style="display:inline;border:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Border_Width1;?> <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Border_Style1;?> <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Border_Color1;?>;border-radius:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Border_Radius1;?>;width:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Width1;?>; height:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Height1;?>;" src="<?php echo $Juna_IT_Video_Gallery_Videos_URL[$j];?>" id="iframe_in_video_icon_1" frameborder="0" allowfullscreen></iframe>
					 		 			<?php 
						 		 			if($JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Location=="Before Title" && $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Title_Background_Color1!='none')
						 		 			{
						 		 				?>
						 		 					<p class='BlockStyleTitle' style="margin-top:15px;padding:10px;position:relative;background-color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Title_Background_Color1;?>;color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Title_Color1;?>;font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Font_Size_Video_Title1;?>;font-family:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Font_Family_Video_Title1;?>;text-align:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Title_Align;?>;"><?php echo $Juna_IT_Video_Gallery_Videos_Title[$j];?></p>
						 		 				<?php
						 		 				if($JIT_VG_EP[0]->Juna_IT_Video_Gallery_Line_Color!='none')
						 		 				{
						 		 					?>
						 		 						<div style="border-top:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Line_Width;?> <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Line_Style;?> <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Line_Color;?>; margin-top:-15px;margin-bottom:10px;"></div>
						 		 					<?php
						 		 				}
						 		 			}
						 		 			if($JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Description_Background_Color1!='none')
						 		 			{
						 		 				?>
						 		 					<p class='blockStyleDeskFontSize' style="background-color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Description_Background_Color1;?>;color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Description_Color1;?>;font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Font_Size_Video_Description1;?>;font-family:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Font_Family_Video_Description1;?>;text-align:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Description_Align;?>;"><span style="font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_First_Font_Size_Video_Description1;?>;"><?php echo $Juna_IT_Video_Gallery_Videos_Description[$j][0];?></span><?php echo substr($Juna_IT_Video_Gallery_Videos_Description[$j], 1);?></p>
						 		 				<?php
						 		 			}
						 		 		?>
						 		 		<?php if($JIT_VG_VP2[$j]->video_link!=''){?>
						 		 			<p style="text-align:<?php echo $JIT_VG_EP[0]->JIT_VG_BS_LPos;?>;"><a class="JIT_VGallery_CP_Link" href="<?php echo $JIT_VG_VP2[$j]->video_link;?>" target="<?php if($JIT_VG_VP2[$j]->video_ONT=='Yes'){echo '_blank';}?>"><span  class="blStLink" style="background-color: <?php echo $JIT_VG_EP[0]->JIT_VG_BS_LBgC;?>;padding: 3px 10px 3px 10px;color:<?php echo $JIT_VG_EP[0]->JIT_VG_BS_LC;?>; font-size:<?php echo $JIT_VG_EP[0]->JIT_VG_BS_LFS;?>;font-family:<?php echo $JIT_VG_EP[0]->JIT_VG_BS_LFF;?>;border:1px solid <?php echo $JIT_VG_EP[0]->JIT_VG_BS_LBC;?>;border-radius: <?php echo $JIT_VG_EP[0]->JIT_VG_BS_LBR;?>;cursor: pointer;"><?php echo $JIT_VG_EP[0]->JIT_VG_BS_LT;?></span></a></p>
						 		 		<?php }?>
					 		 		</div>
				 		 		<?php
			 		 		}
		 		 		?>
						<input type='text' style='display:none;' class='iframeWidth' value='<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Width1;?>'>
						<input type='text' style='display:none;' class='iframeHeight' value='<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Video_Height1;?>'>
						<input type='text' style='display:none;' class='blockStyleTitle' value='<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Font_Size_Video_Title1;?>'>
						<input type='text' style='display:none;' class='BlockStyleDeskFirstFontSize' value='<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_First_Font_Size_Video_Description1;?>'>
						<input type='text' style='display:none;' class='BlockStyleDeskFontSize' value='<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Font_Size_Video_Description1;?>'>
						<input type='text' style='display:none;' class='BlockStyleLinkFontSize' value='<?php echo $JIT_VG_EP[0]->JIT_VG_BS_LFS;?>'>
						<input type='text' style='display:none;' class='BlockStylePaginationFontSize' value='<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Pageination_Font_Size;?>'>
						<input type='text' style='display:none;' class='BlockStylePaginationIconSize' value='<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Pageination_Icons_Size;?>'>
		 		 		<div class='pagination2' id="Juna_IT_Video_Gallery_Show_All" style="font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Pageination_Font_Size;?>;color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Pageination_Color;?>;text-align:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Pageination_Position;?>;">
		 		 			<input type="text" style="display: none;" value="<?php echo $Juna_IT_Video_Gallery_Hoplo;?>" id="Juna_IT_Video_Gallery_Hoplo">
		 		 			<input type="text" style="display: none;" value="<?php echo $Juna_IT_Video_Gallery_Count_Videos;?>" id="Juna_IT_Video_Gallery_Count_Videos">
		 		 			<input type="text" style="display: none;" value="<?php echo $Juna_IT_Video_Gallery_Videos_Quantity;?>" id="Juna_IT_Video_Gallery_Videos_Quantity">
		 		 			<input type="text" style="display: none;" value="<?php echo $Juna_IT_Video_Gallery_Videos_Quantity;?>" id="Juna_IT_Video_Gallery_Videos_Quantity_Hidden">
		 		 			<input type="text" style="display: none;" value="<?php echo $Juna_IT_Video_Gallery_Load_More_hidden;?>" id="Juna_IT_Video_Gallery_Load_More_hidden">
    				  		<input type="text" style="display: none;" value="Block Style" id="Juna_IT_Video_Gallery_Hidden_Type">

		 		 			<i class="BIc junaiticonsdraw junaiticons-style junaiticons-fast-backward" style="color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Pageination_Icons_Color;?>; font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Pageination_Icons_Size;?>;" onclick="Juna_IT_Video_Gallery_Fast_Backward_Clicked()"></i>
		 		 			<i class="BIc junaiticonsdraw junaiticons-style junaiticons-chevron-left" style="color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Pageination_Icons_Color;?>; font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Pageination_Icons_Size;?>;" onclick="Juna_IT_Video_Gallery_Chevron_Left_Clicked()"></i>
		 		 			<span id="Juna_IT_Video_Gallery_First_Page"><?php echo $Juna_IT_Video_Gallery_Per_Page_First;?></span><span id="Juna_IT_Video_Gallery_End_Page"><?php echo $Juna_IT_Video_Gallery_Per_Page_Second;?></span><span id="Juna_IT_Video_Gallery_Load_More" onclick="Juna_IT_Video_Gallery_Load_More_Clicked()"><?php echo $Juna_IT_Video_Gallery_Load_More;?></span>
		 		 			<i class="BIc junaiticonsdraw junaiticons-style junaiticons-chevron-right" style="color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Pageination_Icons_Color;?>; font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Pageination_Icons_Size;?>;" onclick="Juna_IT_Video_Gallery_Chevron_Right_Clicked()"></i>
		 		 			<i class="BIc junaiticonsdraw junaiticons-style junaiticons-fast-forward" style="color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Pageination_Icons_Color;?>; font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Pageination_Icons_Size;?>;" onclick="Juna_IT_Video_Gallery_Fast_Forward_Clicked()"></i>
		 		 		</div>
	 		 		</div>
 		 		<?php
 		 	}
 		 	else if($JIT_VG_EP_M[0]->effect_type=='Thumbnails')
	 		{
	 			?>		 		 		
	 				<div class="Juna_IT_Video_Gallery_Main_Video_Contain_Div" onclick="Juna_IT_Video_Gallery_Main_Video_Contain_Div_Closed()"></div>
	 				<div class="Juna_IT_Video_Gallery_Video_Contain_Div" style="border:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Border_Width;?> <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Border_Style;?> <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Border_Color;?>;border-radius:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Border_Radius;?>">
	 					<div class="Juna_IT_Video_Gallery_Thumbnails_Count_Div">Video <span id="Juna_IT_Video_Gallery_Thumbnails_Video_Count"></span> of <?php echo $Juna_IT_Video_Gallery_Count_Videos;?></div>

		 				<span class="Juna_IT_Video_Gallery_Thumbnails_Icons_Div">
		 					<input type="text" style="display: none;" id="Juna_IT_Video_Gallery_Hidden_Gallery_Number" value="<?php echo $Juna_IT_Video_Gallery_Name;?>">
		 					<i class="junaitthumbnails junaiticons-style <?php echo $Juna_IT_Video_Gallery_Left_Icon;?>"  style ='display:block;' onclick="Juna_IT_Video_Gallery_Thumbnails_Left_Icon_Clicked()"></i>
		 				</span>
		 				<span class="Juna_IT_Video_Gallery_Thumbnails_Icons_Div1">
							<i class="junaitthumbnails junaiticons-style <?php echo $Juna_IT_Video_Gallery_Right_Icon;?>" style ='display:block;' onclick="Juna_IT_Video_Gallery_Thumbnails_Right_Icon_Clicked()"></i>
		 				</span>
		 				<iframe class="Juna_IT_Video_Gallery_Thumbnails_Video" style="border-radius:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Border_Radius;?>;width:100%;height:100%;" src="" frameborder="0" allowfullscreen></iframe>
		 		 	</div>	
	 				<div style="width:100%; float:left;">
	 					<?php
			 		 		for($j=0;$j<$Juna_IT_Video_Gallery_Count_Videos;$j++)
			 		 		{			 		 			
				 		 		?>
				 		 			<div style='position:relative;' class="Juna_IT_Video_Gallery_Thumbnails_Video_Image_Main_Div" id="Juna_IT_Video_Gallery_Video_<?php echo $j+1;?>" onclick="Juna_IT_Video_Gallery_Thumbnails_Big_Clicked('<?php echo $Juna_IT_Video_Gallery_Videos_URL[$j];?>','<?php echo $j+1;?>')">
	 				 					<div class="Juna_IT_Video_Gallery_Thumbnails_Video_Image_Div" style="border-radius:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Border_Radius;?>;width:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Image_Width;?>; height:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Image_Height;?>;background-color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Title_Bg_Color;?>; opacity:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Title_Transparency_Hover;?>">
											<div class="Juna_IT_Video_Gallery_Thumbnails_Video_Image_Div_Contain" style="">
													
											</div>												
	 				 					</div>
										
	 				 					<img class="Juna_IT_Video_Gallery_Thumbnails_Video_Image" style="border:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Border_Width;?> <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Border_Style;?> <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Border_Color;?>;border-radius:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Border_Radius;?>;margin:0px;padding:0px;" src="<?php echo $Juna_IT_Video_Gallery_Images_URL[$j];?>"></img>
										<div class='tumbnailCenter' style='color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Title_Color;?>;text-align:center;width:100%;'>
											<span class='hoverTitlFontSize' style="font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Title_Font_Size;?>;font-family:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Title_Font_Family;?>;"><?php echo $Juna_IT_Video_Gallery_Videos_Title[$j];?></span>
											<div class='hrDiv' style="border-top:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Title_Line_Width;?> <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Title_Line_Style;?> <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Title_Color;?>; width:90%;margin-left:5%;margin-top:5px;margin-bottom:10px;"></div>
											<span class='hoverTitlFontSize' style="font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Title_Font_Size;?>;font-family:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Title_Font_Family;?>;"><?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Title_Line_Text;?></span>
										</div>
									</div>
	 				 			<?php
	 				 		}
	 				 	?>
						<input type='text' style='display:none;' class='tumbnailWidth' value='<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Image_Width;?>'>
						<input type='text' style='display:none;' class='tumbnailHeight' value='<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Image_Height;?>'>
						<input type='text' style='display:none;' class='tumbnailImgWidth' value='<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Image_Width;?>'>
						<input type='text' style='display:none;' class='tumbnailImgHeight' value='<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Image_Height;?>'>
						<input type='text' style='display:none;' class='tumbnailHoverTitlFontSize' value='<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Video_Title_Font_Size;?>'>
						<input type='text' style='display:none;' class='tumbnailPaginationFontSize' value='<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Pageination_Font_Size;?>'>
						<input type='text' style='display:none;' class='tumbnailPaginationIconSize' value='<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Pageination_Icons_Size;?>'>
	 				 	<div class='pagination3' id="Juna_IT_Video_Gallery_Show_All" style="margin-top:20px;float:left;font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Pageination_Font_Size;?>;color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Pageination_Color;?>;text-align:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Pageination_Position;?>;width:100%">
		 		 			<input type="text" style="display: none;" value="<?php echo $Juna_IT_Video_Gallery_Hoplo;?>" id="Juna_IT_Video_Gallery_Hoplo">
		 		 			<input type="text" style="display: none;" value="<?php echo $Juna_IT_Video_Gallery_Count_Videos;?>" id="Juna_IT_Video_Gallery_Count_Videos">
		 		 			<input type="text" style="display: none;" value="<?php echo $Juna_IT_Video_Gallery_Videos_Quantity;?>" id="Juna_IT_Video_Gallery_Videos_Quantity">
		 		 			<input type="text" style="display: none;" value="<?php echo $Juna_IT_Video_Gallery_Videos_Quantity;?>" id="Juna_IT_Video_Gallery_Videos_Quantity_Hidden">
		 		 			<input type="text" style="display: none;" value="<?php echo $Juna_IT_Video_Gallery_Load_More_hidden;?>" id="Juna_IT_Video_Gallery_Load_More_hidden">
    				  		<input type="text" style="display: none;" id="Juna_IT_Video_Gallery_Hidden_Type" value="Thumbnail">

		 		 			<i class="TIc junaiticonsdraw junaiticons-style junaiticons-fast-backward" style="color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Pageination_Icons_Color;?>; font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Pageination_Icons_Size;?>;" onclick="Juna_IT_Video_Gallery_Fast_Backward_Clicked()"></i>
		 		 			<i class="TIc junaiticonsdraw junaiticons-style junaiticons-chevron-left" style="color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Pageination_Icons_Color;?>; font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Pageination_Icons_Size;?>;" onclick="Juna_IT_Video_Gallery_Chevron_Left_Clicked()"></i>
		 		 			<span id="Juna_IT_Video_Gallery_First_Page"><?php echo $Juna_IT_Video_Gallery_Per_Page_First;?></span><span id="Juna_IT_Video_Gallery_End_Page"><?php echo $Juna_IT_Video_Gallery_Per_Page_Second;?></span><span id="Juna_IT_Video_Gallery_Load_More" onclick="Juna_IT_Video_Gallery_Load_More_Clicked()"><?php echo $Juna_IT_Video_Gallery_Load_More;?></span>
		 		 			<i class="TIc junaiticonsdraw junaiticons-style junaiticons-chevron-right" style="color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Pageination_Icons_Color;?>; font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Pageination_Icons_Size;?>;" onclick="Juna_IT_Video_Gallery_Chevron_Right_Clicked()"></i>
		 		 			<i class="TIc junaiticonsdraw junaiticons-style junaiticons-fast-forward" style="color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Pageination_Icons_Color;?>; font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Thumbnails_Pageination_Icons_Size;?>;" onclick="Juna_IT_Video_Gallery_Fast_Forward_Clicked()"></i>
		 		 		</div>		 		 		
	 				</div>	 				
	 			<?php
	 		}
	 		else if($JIT_VG_EP_M[0]->effect_type=='Video Slider')
	 		{
	 			?>
	 				<div class="Juna_IT_Video_Gallery_Slider_Div" >
		 				<div class="Juna_IT_Video_Gallery_Slider_Main_Div" id="Juna_IT_Video_Gallery_Slider_Glob" style="position: relative; visibility: visible;margin-left:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Slider_Position;?>;width:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Slider_Video_Width;?>;height:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Slider_Video_Height;?>;">
					        <input type="text" style="display: none;" id="Juna_IT_Video_Gallery_Slider_Pause_Time" value="<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Slider_Pause_Time;?>">
					        <input type="text" style="display: none;" id="Juna_IT_Video_Gallery_Slider_Change_Speed" value="<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Slider_Change_Speed;?>">
					       	<input type="text" style="display: none;" id="Juna_IT_Video_Gallery_Hidden_Type" value="Slider">
					       	<input type="text" style="display: none;" class="Juna_IT_Video_Gallery_Hidden_width" value="<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Slider_Video_Width;?>">
					        <!-- Loading Screen -->
					        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
					            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
					            <div style="position:absolute;display:block;background:url('<?php echo plugins_url('/Images/loading.gif',__FILE__);?>') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
					        </div>

					        <div data-u="slides" style="width:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Slider_Video_Width;?>;height:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Slider_Video_Height;?>;cursor: default; position: relative; top: 0px; left: 0px; overflow: hidden;">
						        <div data-u="navigator" class="Juna_IT_Video_Gallery_Slider_Navigation" >
						            <div data-u="prototype" ></div>
						        </div>
						        <span data-u="arrowleft" class="Juna_IT_Video_Gallery_Slider_Left_Icon" style="left:0px; background-image: url('<?php echo plugins_url("/Images/Slider/slider-left-". $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Slider_Icons_Type .".png",__FILE__);?>');background-position:left center;" data-autocenter="2"></span>
					       		<span data-u="arrowright" class="Juna_IT_Video_Gallery_Slider_Right_Icon" style="right:0px; background-image: url('<?php echo plugins_url("/Images/Slider/slider-right-". $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Slider_Icons_Type .".png",__FILE__);?>');background-position:right center;" data-autocenter="2"></span>
					           <?php 
						            for($j=0;$j<$Juna_IT_Video_Gallery_Count_Videos;$j++)
								 	{					 			
							 			if(strpos($Juna_IT_Video_Gallery_Videos_URL[$j],'youtube.com')>0)
							 			{							 				
							 				$Juna_IT_Video_Gallery_Slider_Play_Icon_PNG=plugins_url('/Images/youtubeplay.png',__FILE__);
							 			}
							 			else if(strpos($Juna_IT_Video_Gallery_Videos_URL[$j],'vimeo.com')>0)
							 			{							 				
							 				$Juna_IT_Video_Gallery_Slider_Play_Icon_PNG=plugins_url('/Images/vimeoplay.png',__FILE__);
										}	
										?>
											<div data-p="112.50" class="Juna_IT_Video_Gallery_Slider_Iframe_Div" style="display:none; cursor:pointer; background-color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Slider_Background_Color;?>; border:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Slider_Border_Width;?> <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Slider_Border_Style;?> <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Slider_Border_Color;?>;border-radius:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Slider_Border_Radius;?>;" onclick="Juna_IT_Video_Gallery_Slider_Play_Video('<?php echo $Juna_IT_Video_Gallery_Videos_URL[$j];?>','<?php echo $Juna_IT_Video_Gallery_Videos_Title[$j];?>')">
								            	<iframe src="<?php echo $Juna_IT_Video_Gallery_Videos_URL[$j];?>" class="Juna_IT_Video_Gallery_Slider_Iframe" style="width:100%;height:100%;position:absolute;left:0;display:none;" frameborder="0" allowfullscreen></iframe>
												<?php if($JIT_VG_EP[0]->Juna_IT_Video_Gallery_Slider_Title_Background_Color!='none'){ ?>
													<span class="Juna_IT_Video_Gallery_Slider_Video_Title" style="padding:5px;background-color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Slider_Title_Background_Color;?>;color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Slider_Title_Color;?>;font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Slider_Title_Font_Size;?>;font-family:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Slider_Title_Font_Family;?>;text-align:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Slider_Title_Position;?>;"><?php echo $Juna_IT_Video_Gallery_Videos_Title[$j];?></span>
												<?php }?>
												<span class="Juna_IT_Video_Gallery_Slider_Play_Icon_Span" style="background-image:url('<?php echo $Juna_IT_Video_Gallery_Slider_Play_Icon_PNG;?>');"></span>			            
								                <img data-u="image" src="<?php echo $Juna_IT_Video_Gallery_Images_URL[$j];?>" class="Juna_IT_Video_Gallery_Slider_Iframe_Image"/>
								            </div>
							            <?php
									}
								?>
					        </div>
					    </div>
					</div>
					
	 			<?php
	 		}
	 		else if($JIT_VG_EP_M[0]->effect_type=='Video Carousel')
	 		{
	 			?>
	 				<div class="Juna_IT_Video_Gallery_Carousel_Main_Video_Contain_Div" onclick="Juna_IT_Video_Gallery_Carousel_Main_Video_Contain_Div_Closed()"></div>
	 				
	 				<div class="Juna_IT_Video_Gallery_Carousel_Video_Contain_Div" style="border:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Video_Border_Width;?> <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Video_Border_Style;?> <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Video_Border_Color;?>;">
		 				<iframe class="Juna_IT_Video_Gallery_Carousel_Video" style="border-radius:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Video_Border_Radius;?>;width:100%;height:100%;" src="" frameborder="0" allowfullscreen></iframe>
		 		 	</div>	
	 				
	 				<div class="Juna_IT_Video_Gallery_Carousel_Div" style="height:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Height;?>;">
		 				<div class="Juna_IT_Video_Gallery_Carousel_Main_Div" id="Juna_IT_Video_Gallery_Carousel_Glob" style="position: relative; visibility: visible; margin-left:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Position;?>; width: <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Width;?>; height: <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Height;?>;">
					       
					        <input type="text" style="display: none;" id="Juna_IT_Video_Gallery_Carousel_Autoplay_Steps" value="<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Autoplay_Steps;?>">
					        <input type="text" style="display: none;" id="Juna_IT_Video_Gallery_Carousel_Slide_Width" value="<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Slide_Width;?>">
					        <input type="text" style="display: none;" id="Juna_IT_Video_Gallery_Carousel_Slide_Spacing" value="<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Slide_Spacing;?>">
					        <input type="text" style="display: none;" id="Juna_IT_Video_Gallery_Carousel_Slide_Cols" value="<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Slide_Cols;?>">
					        <input type="text" style="display: none;" id="Juna_IT_Video_Gallery_Carousel_Arrows_Steps" value="<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Arrows_Steps;?>">
					        <input type="text" style="display: none;" id="Juna_IT_Video_Gallery_Carousel_Pause_Time" value="<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Pause_Time;?>">
					        <input type="text" style="display: none;" id="Juna_IT_Video_Gallery_Carousel_Change_Speed" value="<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Change_Speed;?>">
					        <input type="text" style="display: none;" id="Juna_IT_Video_Gallery_Carousel_Border_Radius" value="<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Video_Border_Radius;?>">
					        <input type="text" style="display: none;" id="Juna_IT_Video_Gallery_Carousel_Width" value="<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Width;?>">
					       	<input type="text" style="display: none;" id="Juna_IT_Video_Gallery_Hidden_Type" value="Carousel">

					       	<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
					            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
					            <div style="position:absolute;display:block;background:url('<?php echo plugins_url('/Images/loading.gif',__FILE__);?>') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
					        </div>
					        
					        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Width;?>; height: <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Height;?>; overflow: hidden;border:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Border_Width;?> <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Border_Style;?> <?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Border_Color;?>; border-radius:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Border_Radius;?>;background-color:<?php echo $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Background_Color;?>;">
					           	<!-- Bullet Navigator -->
						        <div data-u="navigator" class="Juna_IT_Video_Gallery_Carousel_Navigation">
						            <div data-u="prototype" style="width:21px;height:21px;">
						                <div data-u="numbertemplate"></div>
						            </div>
						        </div>
						        <!-- Arrow Navigator -->
						        <span data-u="arrowleft" class="Juna_IT_Video_Gallery_Carousel_Left_Icon" style="left:0px; background-image: url('<?php echo plugins_url("/Images/Slider/slider-left-". $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Icons_Type .".png",__FILE__);?>');background-position:left center;" data-autocenter="2"></span>
						        <span data-u="arrowright" class="Juna_IT_Video_Gallery_Carousel_Right_Icon" style="right:0px; background-image: url('<?php echo plugins_url("/Images/Slider/slider-right-". $JIT_VG_EP[0]->Juna_IT_Video_Gallery_Carousel_Icons_Type .".png",__FILE__);?>');background-position:right center;" data-autocenter="2"></span>
					           	<?php 
						            for($j=0;$j<$Juna_IT_Video_Gallery_Count_Videos;$j++)
								 	{					 			
							 			if(strpos($Juna_IT_Video_Gallery_Videos_URL[$j],'youtube.com')>0)
							 			{							 				
							 				$Juna_IT_Video_Gallery_Slider_Play_Icon_PNG=plugins_url('/Images/youtubeplay.png',__FILE__);
							 			}
							 			else if(strpos($Juna_IT_Video_Gallery_Videos_URL[$j],'vimeo.com')>0)
							 			{							 				
							 				$Juna_IT_Video_Gallery_Slider_Play_Icon_PNG=plugins_url('/Images/vimeoplay.png',__FILE__);
										}	
										?>
											<div class="Juna_IT_Video_Gallery_Carousel_Iframe_Div" style="display:none; cursor:pointer;" onclick="Juna_IT_Video_Gallery_Carousel_Play_Video('<?php echo $Juna_IT_Video_Gallery_Videos_URL[$j];?>')">
								            	<span class="Juna_IT_Video_Gallery_Carousel_Play_Icon_Span" style="background-image:url('<?php echo $Juna_IT_Video_Gallery_Slider_Play_Icon_PNG;?>');"></span>			            
								                <img data-u="image" src="<?php echo $Juna_IT_Video_Gallery_Images_URL[$j];?>" class="Juna_IT_Video_Gallery_Carousel_Iframe_Image"/>
								            </div>
							            <?php
									}
								?>
					        </div>    
						</div>
					</div>
	 			<?php
	 		}
			else if($JIT_VG_EP_M[0]->effect_type=='Polaroids')
	 		{?>
				<style>
					.piece {
						background:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Video_Bg_Color;?>;
						opacity:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Video_Bg_Color_Op/100;?> !important;
						float: left;
					}
					.photostack figure::after {
						content: '';
						position: absolute;
						width: 100%;
						height: 100%;
						top: 0;
						left: 0;
						visibility: visible;
						opacity: 1;
						background: rgba(0,0,0,0.05);
						-webkit-transition: opacity 0.6s;
						border-radius:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Big_Image_Border_Radius;?>;
						transition: opacity 0.6s;
					}
					.photostack nav span {
						position: relative;
						display: inline-block;
						margin: 0 5px;
						width: 30px;
						height: 30px;
						cursor: pointer;
						background:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Radius_Bg_Color;?>;
						border-radius:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Radius_Border_radius;?>;
						text-align: center;
						-webkit-transition: -webkit-transform 0.6s ease-in-out, background 0.3s;
						transition: transform 0.6s ease-in-out, background 0.3s;
						-webkit-transform: scale(0.48);
						transform: scale(0.48);
					}
					.photostack nav span::after {
						content: "\e600";
						font-family: 'icons';
						font-size:
						speak: none;
						display: inline-block;
						vertical-align: top;
						font-style: normal;
						font-weight: normal;
						font-variant: normal;
						text-transform: none;
						line-height: 30px;
						color:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Radius_Color;?>;
						opacity: 0;
						-webkit-font-smoothing: antialiased;
						-moz-osx-font-smoothing: grayscale;
						-webkit-transition: opacity 0.3s;
						transition: opacity 0.3s;
						-webkit-backface-visibility: hidden;
						backface-visibility: hidden;
					}
					.photostack nav span.current {
						background:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Radius_Bg_Color2;?>;
						-webkit-transform: scale(1);
						transform: scale(1);
					}
				</style>
					<input type='text' style='display:none;' class='polaroidsHeight'  value='<?php echo  $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Slider_Height;?>'>
					<input type='text' style='display:none;' class='polaroidsImgWidth' value='<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Image_Width;?>'>
					<input type='text' style='display:none;' class='polaroidsTitleFontSize' value='<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Title_Font_Size;?>'>
					<input type='text' style='display:none;' class='polaroidsDescFontSize' value='<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Desc_Font_Size;?>'>
					<input type='text' style='display:none;' class='polaroidsDescFirstFontSize' value='<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Desc_First_Font_Size;?>'>
					<input type='text' style='display:none;' class='polaroidsLinkSize' value='<?php echo $JIT_VG_EP[0]->JIT_VG_Pol_LFS;?>'>
					<div id="wrap" style='display:none;' onclick='Juna_IT_Video_Gallery_Polaroids_Big_Closed()' >
					  	<div id="popup">
							<span style='top:-50px;' class='delIcon'>
								<i style='color:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Icon_Color;?>;font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Icon_Size;?>' class="junaitcontent junaiticons-style <?php echo $Juna_IT_Video_Gallery_Close_Icon;?>"></i>
							</span>
							<iframe class="Juna_IT_Video_Gallery_Polaroids_Video_Iframe" src="" frameborder="0" allowfullscreen></iframe>
					  	</div>	
					</div>
					<div class="containerJuna">
						<section id="photostack-3" class="photostack" style="margin-top: 30px;height:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Slider_Height;?>;background:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Slider_Background;?>;box-shadow:0px 0px <?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Slider_Box_Shadow;?>;border-radius:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Slider_Border_Radius;?> ">
							<div class='div_div'>
								<?php
								for($j=0;$j<$Juna_IT_Video_Gallery_Count_Videos;$j++)
								{			 		 			
				 		 		?>
									<figure  style='width:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Image_Width;?>;background:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Image_Background;?>;border-radius:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Big_Image_Border_Radius;?>' class='rev reverse' onclick = "Juna_IT_Video_Gallery_Polaroids_Big_Clicked('<?php echo $Juna_IT_Video_Gallery_Videos_URL[$j];?>')" >
										<img style='margin:0px;border-radius:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Image_Border_Radius;?>;border:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Image_Border_Width;?> solid <?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Image_Border_Color;?>;box-shadow:0px 0px <?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Image_Box_Shadow;?> <?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Image_Box_Shadow_Color;?>;' src="<?php echo $Juna_IT_Video_Gallery_Images_URL[$j];?>" alt="img05" />
										<figcaption>
											<h2 class="photostack-title" style='margin:0px;font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Title_Font_Size;?>;font-family:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Title_Font_Family;?>;color:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Title_Color;?>;'><?php echo $Juna_IT_Video_Gallery_Videos_Title[$j];?></h2>
											<?php
												if($Juna_IT_Video_Gallery_Videos_Description[$j] !== '' && $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Desc_Show == 'on')
												{
											?>
											<div class="descDiv photostack-back" style='background:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Desc_Bg_Color;?>;border-radius:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Big_Image_Border_Radius;?>'>
												<p class='polaroidsDesc' style='font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Desc_Font_Size;?>;font-family:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Desc_Font_Family;?>;color:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Desc_Color;?>;'><span style='font-size:<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Desc_First_Font_Size;?>;'><?php echo $Juna_IT_Video_Gallery_Videos_Description[$j][0];?></span><?php echo substr($Juna_IT_Video_Gallery_Videos_Description[$j], 1);?></p>
												<?php if($JIT_VG_VP2[$j]->video_link!=''){?>
								 		 			<p style="text-align:<?php echo $JIT_VG_EP[0]->JIT_VG_Pol_LPos;?>;"><a class="JIT_VGallery_CP_Link" href="<?php echo $JIT_VG_VP2[$j]->video_link;?>" target="<?php if($JIT_VG_VP2[$j]->video_ONT=='Yes'){echo '_blank';}?>"><span class='PLink' style="background-color: <?php echo $JIT_VG_EP[0]->JIT_VG_Pol_LBgC;?>;padding: 3px 10px 3px 10px;color:<?php echo $JIT_VG_EP[0]->JIT_VG_Pol_LC;?>; font-size:<?php echo $JIT_VG_EP[0]->JIT_VG_Pol_LFS;?>;font-family:<?php echo $JIT_VG_EP[0]->JIT_VG_Pol_LFF;?>;border:1px solid <?php echo $JIT_VG_EP[0]->JIT_VG_Pol_LBC;?>;border-radius: <?php echo $JIT_VG_EP[0]->JIT_VG_Pol_LBR;?>;cursor: pointer;"><?php echo $JIT_VG_EP[0]->JIT_VG_Pol_LT;?></span></a></p>
								 		 		<?php }?>
											</div>
											<?php
												}
											?>
										</figcaption>
									</figure>
								<?php
								}
								?>
							</div>
						</section>
					</div>
					<script src='<?php echo plugins_url("/Scripts/Juna_IT_Video_Gallery_Lib.js",__FILE__);?>'></script>
					<script>
						var t=false;
						jQuery('.JIT_VGallery_CP_Link').click(function(){
								t=true;
								setTimeout(function(){
									t=false;
								},100)
							})
						var sp = '<?php echo $JIT_VG_EP[0]->Juna_IT_VG_Polaroids_Popup_Effect_Speed;?>';
						var spp = sp.split('');
						
						var pieces = 260,
							speed = spp[0],
							pieceW = 30,
							pieceH = 30;
						
						if(jQuery(window).width() <= 620){
							pieces = 165
						}
						if(jQuery(window).width() <= 470){
							pieces = 70
						}
						for (var i = pieces - 1; i >= 0; i--) {
						  jQuery('#popup').prepend('<div class="piece" style="width:'+pieceW+'px; height:'+pieceH+'px"></div>');
						};
						function breakGlass(from){
							if(t==true){
								return;
							}
						  if (from === "reverse"){
							jQuery('.piece').each(function(){
							  TweenLite.to(jQuery(this), speed, {x:0, y:0, rotationX:0, rotationY:0, opacity: 1, z: 0});
							  TweenLite.to(jQuery('#popup h1'),0.2,{opacity:1, delay: speed});
							  jQuery('#wrap').show(1000);
							  setTimeout(function(){
									jQuery('.Juna_IT_Video_Gallery_Polaroids_Video_Iframe').animate({'opacity':'1'},1500);
									
								},1000)
							});
							return;
						  }
						  if(!from){
							TweenLite.to(jQuery('#popup h1'),0.2,{opacity:0});
						  } else {
							TweenLite.from(jQuery('#popup h1'),0.5,{opacity:0, delay: speed});
						  }
						  jQuery('.piece').each(function(){
							var distX = getRandomArbitrary(-250, 250),	
								distY = getRandomArbitrary(-250, 250),
								rotY  = getRandomArbitrary(-720, 720),
								rotX  = getRandomArbitrary(-720, 720),
								z = getRandomArbitrary(-500, 500);

							if(!from){
							  TweenLite.to(jQuery(this), speed, {x:distX, y:distY, rotationX:rotX, rotationY:rotY, opacity: 0, z: z});	
							} else {
							  TweenLite.from(jQuery(this), speed, {x:distX, y:distY, rotationX:rotX, rotationY:rotY, opacity: 0, z: z});	
							}			
						  });	
						}
						function getRandomArbitrary(min, max) {
						  return Math.random() * (max - min) + min;
						}
						jQuery('#wrap').click(function(){
						  breakGlass();
						  setTimeout(function(){
							  jQuery('#wrap').hide(1000);
							  jQuery('.Juna_IT_Video_Gallery_Polaroids_Video_Iframe').animate({'opacity':'0'},1500);
						  },300)
						});	
						jQuery('.reverse').click(function(){
						  breakGlass('reverse');	
						});	
						breakGlass(false);
					</script>
					<script>
						( function( window ) {
							
							'use strict';
							var polaroidsHeight = parseInt(jQuery('.polaroidsHeight').val()); 
							var polaroidsImgWidth = parseInt(jQuery('.polaroidsImgWidth').val());
							var polaroidsTitleFontSize = parseInt(jQuery('.polaroidsTitleFontSize').val());
							var polaroidsDescFontSize = parseInt(jQuery('.polaroidsDescFontSize').val());
							var polaroidsDescFirstFontSize = parseInt(jQuery('.polaroidsDescFirstFontSize').val());
							var polaroidsLinkSize = parseInt(jQuery('.polaroidsLinkSize').val()); 
							
							function polResp(){
								if(jQuery('#photostack-3').parent().parent().width()<500){
									jQuery('figure').css('width',polaroidsImgWidth*(jQuery('#photostack-3').parent().parent().width())/400+'px');
									jQuery('figure').css('padding',parseInt(jQuery('figure').width())/15+'px');
									jQuery('.descDiv').css('paddong',jQuery('figure').width()+'px');
									jQuery('.photostack-title').css('font-size',polaroidsTitleFontSize*(jQuery('figure').width())/200+'px');
									jQuery('.photostack-title').css('line-height',parseInt(jQuery('.photostack-title').css('font-size'))+5+'px');
									jQuery('.polaroidsDesc').css('font-size',polaroidsDescFontSize*(jQuery('figure').width())/200+'px');
									jQuery('.polaroidsDesc span').css('font-size',polaroidsDescFirstFontSize*(jQuery('figure').width())/200+'px');
									jQuery('.PLink').css('font-size',polaroidsLinkSize*(jQuery('figure').width())/200+'px');
									jQuery('.polaroidsDesc').css('line-height',parseInt(jQuery('.polaroidsDesc').css('font-size'))+5+'px');
								}
							}
							polResp();
							jQuery(window).resize(function(){
								polResp();
							})
							
							jQuery('#photostack-3 nav span').click(function(){
								jQuery('figure.photostack-flip').animate({'margin-left':'-20px'},1000);
							})
							
							
							// class helper functions from bonzo https://github.com/ded/bonzo

							function classReg( className ) {
							  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
							}

							// classList support for class management
							// altho to be fair, the api sucks because it won't accept multiple classes at once
							var hasClass, addClass, removeClass;

							if ( 'classList' in document.documentElement ) {
							  hasClass = function( elem, c ) {
								return elem.classList.contains( c );
							  };
							  addClass = function( elem, c ) {
								elem.classList.add( c );
							  };
							  removeClass = function( elem, c ) {
								elem.classList.remove( c );
							  };
							}
							else {
							  hasClass = function( elem, c ) {
								return classReg( c ).test( elem.className );
							  };
							  addClass = function( elem, c ) {
								if ( !hasClass( elem, c ) ) {
								  elem.className = elem.className + ' ' + c;
								}
							  };
							  removeClass = function( elem, c ) {
								elem.className = elem.className.replace( classReg( c ), ' ' );
							  };
							}

							function toggleClass( elem, c ) {
							  var fn = hasClass( elem, c ) ? removeClass : addClass;
							  fn( elem, c );
							}

							var classie = {
							  // full names
							  hasClass: hasClass,
							  addClass: addClass,
							  removeClass: removeClass,
							  toggleClass: toggleClass,
							  // short names
							  has: hasClass,
							  add: addClass,
							  remove: removeClass,
							  toggle: toggleClass
							};

							// transport
							if ( typeof define === 'function' && define.amd ) {
							  // AMD
							  define( classie );
							} else {
							  // browser global
							  window.classie = classie;
							}
													
							'use strict';

							// https://gist.github.com/edankwan/4389601
							Modernizr.addTest('csstransformspreserve3d', function () {
								var prop = Modernizr.prefixed('transformStyle');
								var val = 'preserve-3d';
								var computedStyle;
								if(!prop) return false;

								prop = prop.replace(/([A-Z])/g, function(str,m1){ return '-' + m1.toLowerCase(); }).replace(/^ms-/,'-ms-');

								Modernizr.testStyles('#modernizr{' + prop + ':' + val + ';}', function (el, rule) {
									computedStyle = window.getComputedStyle ? getComputedStyle(el, null).getPropertyValue(prop) : '';
								});

								return (computedStyle === val);
							});

							var support = { 
									transitions : Modernizr.csstransitions,
									preserve3d : Modernizr.csstransformspreserve3d
								},
								transEndEventNames = {
									'WebkitTransition': 'webkitTransitionEnd',
									'MozTransition': 'transitionend',
									'OTransition': 'oTransitionEnd',
									'msTransition': 'MSTransitionEnd',
									'transition': 'transitionend'
								},
								transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ];

							function extend( a, b ) {
								for( var key in b ) { 
									if( b.hasOwnProperty( key ) ) {
										a[key] = b[key];
									}
								}
								return a;
							}

							function shuffleMArray( marray ) {
								var arr = [], marrlen = marray.length, inArrLen = marray[0].length;
								for(var i = 0; i < marrlen; i++) {
									arr = arr.concat( marray[i] );
								}
								// shuffle 2 d array
								arr = shuffleArr( arr );
								// to 2d
								var newmarr = [], pos = 0;
								for( var j = 0; j < marrlen; j++ ) {
									var tmparr = [];
									for( var k = 0; k < inArrLen; k++ ) {
										tmparr.push( arr[ pos ] );
										pos++;
									}
									newmarr.push( tmparr );
								}
								return newmarr;
							}

							function shuffleArr( array ) {
								var m = array.length, t, i;
								// While there remain elements to shuffle…
								while (m) {
									// Pick a remaining element…
									i = Math.floor(Math.random() * m--);
									// And swap it with the current element.
									t = array[m];
									array[m] = array[i];
									array[i] = t;
								}
								return array;
							}

							function Photostack( el, options ) {
								this.el = el;
								this.inner = this.el.querySelector( '.div_div' );
								this.allItems = [].slice.call( this.inner.children );
								this.allItemsCount = this.allItems.length;
								if( !this.allItemsCount ) return;
								this.items = [].slice.call( this.inner.querySelectorAll( 'figure:not([data-dummy])' ) );
								this.itemsCount = this.items.length;
								// index of the current photo
								this.current = 0;
								this.options = extend( {}, this.options );
								extend( this.options, options );
								this._init();
							}

							Photostack.prototype.options = {};

							Photostack.prototype._init = function() {
								this.currentItem = this.items[ this.current ];
								this._addNavigation();
								this._getSizes();
								this._initEvents();
							}

							Photostack.prototype._addNavigation = function() {
								// add nav dots
								this.nav = document.createElement( 'nav' )
								var inner = '';
								for( var i = 0; i < this.itemsCount; ++i ) {
									inner += '<span></span>';
								}
								this.nav.innerHTML = inner;
								this.el.appendChild( this.nav );
								this.navDots = [].slice.call( this.nav.children );
							}

							Photostack.prototype._initEvents = function() {
								var self = this,
									beforeStep = classie.hasClass( this.el, 'photostack-start' ),
									open = function() {
										var setTransition = function() { 
											if( support.transitions ) {
												classie.addClass( self.el, 'photostack-transition' ); 
											}
										}
										if( beforeStep ) {
											this.removeEventListener( 'click', open ); 
											classie.removeClass( self.el, 'photostack-start' );
											setTransition();
										}
										else {
											self.openDefault = true;
											setTimeout( setTransition, 25 );
										}
										self.started = true; 
										self._showPhoto( self.current );
									};

								if( beforeStep ) {
									this._shuffle();
									this.el.addEventListener( 'click', open );
								}
								else {
									open();
								}

								this.navDots.forEach( function( dot, idx ) {
									dot.addEventListener( 'click', function() {
										// rotate the photo if clicking on the current dot
										if( idx === self.current ) {
											self._rotateItem();
										}
										else {
											// if the photo is flipped then rotate it back before shuffling again
											var callback = function() { self._showPhoto( idx ); }
											if( self.flipped ) {
												self._rotateItem( callback );
											}
											else {
												callback();
											}
										}
									} );
								} );

								window.addEventListener( 'resize', function() { self._resizeHandler(); } );
							}

							Photostack.prototype._resizeHandler = function() {
								var self = this;
								function delayed() {
									self._resize();
									self._resizeTimeout = null;
								}
								if ( this._resizeTimeout ) {
									clearTimeout( this._resizeTimeout );
								}
								this._resizeTimeout = setTimeout( delayed, 100 );
							}

							Photostack.prototype._resize = function() {
								var self = this, callback = function() { self._shuffle( true ); }
								this._getSizes();
								if( this.started && this.flipped ) {
									this._rotateItem( callback );
								}
								else {
									callback();
								}
							}
							
							Photostack.prototype._showPhoto = function( pos ) {
								if( this.isShuffling ) {
									return false;
								}
								this.isShuffling = true;

								// if there is something behind..
								if( classie.hasClass( this.currentItem, 'photostack-flip' ) ) {
									this._removeItemPerspective();
									jQuery('photostack-flip').css('z-index','222222')
									classie.removeClass( this.navDots[ this.current ], 'flippable' );
								}

								classie.removeClass( this.navDots[ this.current ], 'current' );
								classie.removeClass( this.currentItem, 'photostack-current' );
								
								// change current
								this.current = pos;
								this.currentItem = this.items[ this.current ];
								
								classie.addClass( this.navDots[ this.current ], 'current' );
								// if there is something behind..
								if( this.currentItem.querySelector( '.photostack-back' ) ) {
									// nav dot gets class flippable
									classie.addClass( this.navDots[ pos ], 'flippable' );
								}

								// shuffle a bit
								this._shuffle();
							}

							// display items (randomly)
							Photostack.prototype._shuffle = function( resize ) {
								var iter = resize ? 1 : this.currentItem.getAttribute( 'data-shuffle-iteration' ) || 1;
								if( iter <= 0 || !this.started || this.openDefault ) { iter = 1; }
								// first item is open by default
								if( this.openDefault ) {
									// change transform-origin
									classie.addClass( this.currentItem, 'photostack-flip' );
									this.openDefault = false;
									this.isShuffling = false;
								}
								
								var overlapFactor = .5,
									// lines & columns
									lines = Math.ceil(this.sizes.inner.width / (this.sizes.item.width * overlapFactor) ),
									columns = Math.ceil(this.sizes.inner.height / (this.sizes.item.height * overlapFactor) ),
									// since we are rounding up the previous calcs we need to know how much more we are adding to the calcs for both x and y axis
									addX = lines * this.sizes.item.width * overlapFactor + this.sizes.item.width/2 - this.sizes.inner.width,
									addY = columns * this.sizes.item.height * overlapFactor + this.sizes.item.height/2 - this.sizes.inner.height,
									// we will want to center the grid
									extraX = addX / 2,
									extraY = addY / 2,
									// max and min rotation angles
									maxrot = 35, minrot = -35,
									self = this,
									// translate/rotate items
									moveItems = function() {
										--iter;
										// create a "grid" of possible positions
										var grid = [];
										// populate the positions grid
										for( var i = 0; i < columns; ++i ) {
											var col = grid[ i ] = [];
											for( var j = 0; j < lines; ++j ) {
												var xVal = j * (self.sizes.item.width * overlapFactor) - extraX,
													yVal = i * (self.sizes.item.height * overlapFactor) - extraY,
													olx = 0, oly = 0;

												if( self.started && iter === 0 ) {
													var ol = self._isOverlapping( { x : xVal, y : yVal } );
													if( ol.overlapping ) {
														olx = ol.noOverlap.x;
														oly = ol.noOverlap.y;
														var r = Math.floor( Math.random() * 3 );
														switch(r) {
															case 0 : olx = 0; break;
															case 1 : oly = 0; break;
														}
													}
												}

												col[ j ] = { x : xVal + olx, y : yVal + oly };
											}
										}
										// shuffle
										grid = shuffleMArray(grid);

										var l = 0, c = 0, cntItemsAnim = 0;
										self.allItems.forEach( function( item, i ) {
											// pick a random item from the grid
											if( l === lines - 1 ) {
												c = c === columns - 1 ? 0 : c + 1;
												l = 1;
											}
											else {
												++l
											}

											var randXPos = Math.floor( Math.random() * lines ),
												randYPos = Math.floor( Math.random() * columns ),
												gridVal = grid[c][l-1],
												translation = { x : gridVal.x, y : gridVal.y },
												onEndTransitionFn = function() {
													++cntItemsAnim;
													if( support.transitions ) {
														this.removeEventListener( transEndEventName, onEndTransitionFn );
													}
													if( cntItemsAnim === self.allItemsCount ) {
														if( iter > 0 ) {
															moveItems.call();
														}
														else {
															// change transform-origin
															classie.addClass( self.currentItem, 'photostack-flip' );
															// all done..
															self.isShuffling = false;
															if( typeof self.options.callback === 'function' ) {
																self.options.callback( self.currentItem );
															}
														}
													}
												};

											if(self.items.indexOf(item) === self.current && self.started && iter === 0) {
												self.currentItem.style.WebkitTransform = 'translate(' + self.centerItem.x + 'px,' + self.centerItem.y + 'px) rotate(0deg)';
												self.currentItem.style.msTransform = 'translate(' + self.centerItem.x + 'px,' + self.centerItem.y + 'px) rotate(0deg)';
												self.currentItem.style.transform = 'translate(' + self.centerItem.x + 'px,' + self.centerItem.y + 'px) rotate(0deg)';
												// if there is something behind..
												if( self.currentItem.querySelector( '.photostack-back' ) ) {
													self._addItemPerspective();
												}
												classie.addClass( self.currentItem, 'photostack-current' );
											}
											else {
												item.style.WebkitTransform = 'translate(' + translation.x + 'px,' + translation.y + 'px) rotate(' + Math.floor( Math.random() * (maxrot - minrot + 1) + minrot ) + 'deg)';
												item.style.msTransform = 'translate(' + translation.x + 'px,' + translation.y + 'px) rotate(' + Math.floor( Math.random() * (maxrot - minrot + 1) + minrot ) + 'deg)';
												item.style.transform = 'translate(' + translation.x + 'px,' + translation.y + 'px) rotate(' + Math.floor( Math.random() * (maxrot - minrot + 1) + minrot ) + 'deg)';
											}

											if( self.started ) {
												if( support.transitions ) {
													item.addEventListener( transEndEventName, onEndTransitionFn );
												}
												else {
													onEndTransitionFn();
												}
											}
										} );
									};

								moveItems.call();
							}

							Photostack.prototype._getSizes = function() {
								this.sizes = {
									inner : { width : this.inner.offsetWidth, height : this.inner.offsetHeight },
									item : { width : this.currentItem.offsetWidth, height : this.currentItem.offsetHeight }
								};
								
								// translation values to center an item
								this.centerItem = { x : this.sizes.inner.width / 2 - this.sizes.item.width / 2, y : this.sizes.inner.height / 2 - this.sizes.item.height / 2 };
							}

							Photostack.prototype._isOverlapping = function( itemVal ) {
								var dxArea = this.sizes.item.width + this.sizes.item.width / 3, // adding some extra avoids any rotated item to touch the central area
									dyArea = this.sizes.item.height + this.sizes.item.height / 3,
									areaVal = { x : this.sizes.inner.width / 2 - dxArea / 2, y : this.sizes.inner.height / 2 - dyArea / 2 },
									dxItem = this.sizes.item.width,
									dyItem = this.sizes.item.height;

								if( !(( itemVal.x + dxItem ) < areaVal.x ||
									itemVal.x > ( areaVal.x + dxArea ) ||
									( itemVal.y + dyItem ) < areaVal.y ||
									itemVal.y > ( areaVal.y + dyArea )) ) {
										// how much to move so it does not overlap?
										// move left / or move right
										var left = Math.random() < 0.5,
											randExtraX = Math.floor( Math.random() * (dxItem/4 + 1) ),
											randExtraY = Math.floor( Math.random() * (dyItem/4 + 1) ),
											noOverlapX = left ? (itemVal.x - areaVal.x + dxItem) * -1 - randExtraX : (areaVal.x + dxArea) - (itemVal.x + dxItem) + dxItem + randExtraX,
											noOverlapY = left ? (itemVal.y - areaVal.y + dyItem) * -1 - randExtraY : (areaVal.y + dyArea) - (itemVal.y + dyItem) + dyItem + randExtraY;

										return {
											overlapping : true,
											noOverlap : { x : noOverlapX, y : noOverlapY }
										}
								}
								return {
									overlapping : false
								}
							}

							Photostack.prototype._addItemPerspective = function() {
								classie.addClass( this.el, 'photostack-perspective' );
							}

							Photostack.prototype._removeItemPerspective = function() {
								classie.removeClass( this.el, 'photostack-perspective' );
								classie.removeClass( this.currentItem, 'photostack-flip' );
							}

							Photostack.prototype._rotateItem = function( callback ) {
								if( classie.hasClass( this.el, 'photostack-perspective' ) && !this.isRotating && !this.isShuffling ) {
									this.isRotating = true;

									var self = this, onEndTransitionFn = function() {
											if( support.transitions && support.preserve3d ) {
												this.removeEventListener( transEndEventName, onEndTransitionFn );
											}
											self.isRotating = false;
											if( typeof callback === 'function' ) {
												callback();
											}
										};

									if( this.flipped ) {
										classie.removeClass( this.navDots[ this.current ], 'flip' );
										if( support.preserve3d ) {
											this.currentItem.style.WebkitTransform = 'translate(' + this.centerItem.x + 'px,' + this.centerItem.y + 'px) rotateY(0deg)';
											this.currentItem.style.transform = 'translate(' + this.centerItem.x + 'px,' + this.centerItem.y + 'px) rotateY(0deg)';
										}
										else {
											classie.removeClass( this.currentItem, 'photostack-showback' );
										}
									}
									else {
										classie.addClass( this.navDots[ this.current ], 'flip' );
										if( support.preserve3d ) {
											this.currentItem.style.WebkitTransform = 'translate(' + this.centerItem.x + 'px,' + this.centerItem.y + 'px) translate(' + this.sizes.item.width + 'px) rotateY(-179.9deg)';
											this.currentItem.style.transform = 'translate(' + this.centerItem.x + 'px,' + this.centerItem.y + 'px) translate(' + this.sizes.item.width + 'px) rotateY(-179.9deg)';
										}
										else {
											classie.addClass( this.currentItem, 'photostack-showback' );
										}
									}

									this.flipped = !this.flipped;
									if( support.transitions && support.preserve3d ) {
										this.currentItem.addEventListener( transEndEventName, onEndTransitionFn );
									}
									else {
										onEndTransitionFn();
									}
								}
							}

							// add to global namespace
							window.Photostack = Photostack;
						})( window );
					</script>
					<script>
						new Photostack( document.getElementById( 'photostack-3' ), {
							callback : function( item ) {
								//console.log(item)
							}
						} );
					</script>
			<?php
			}
 		}
	}
?>