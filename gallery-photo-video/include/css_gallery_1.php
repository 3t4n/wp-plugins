<style type="text/css">
	.GPV_wrapper_<?php echo $id;?> .grid-title{
		text-align:<?php echo $data_setting['GPV_setting_title_position'];?>; 
		color: <?php echo $data_setting['GPV_setting_title_color'];?>!important; 
	}

	/**GPV_my-grid_ color start**/
	.GPV_wrapper_<?php echo $id;?> .GPV_my-grid_<?php echo $id;?>{
		background: <?php echo $data_setting['GPV_setting_container_background_color'];?>;		
		
	}
	.GPV_wrapper_<?php echo $id;?> .gpv_bg_color{
		background: <?php echo $data_setting['GPV_setting_container_open_color'];?>;
	}
	/**GPV_my-grid_ color start**/

	/**GPV_my-grid_ font start**/
	.GPV_wrapper_<?php echo $id;?> .GPV_my-grid_<?php echo $id;?> .grid-details-content,
	.GPV_wrapper_<?php echo $id;?> .grid-title{
		font-family:<?php echo $data_setting['GPV_setting_font_style'];?>!important;
	}
	/**GPV_my-grid_ font end**/

	/**image-layout start**/
	<?php if($data_setting['GPV_setting_image_layout']=='cir'){?>
		.GPV_my-grid_<?php echo $id;?> .img-responsive,
		.GPV_my-grid_<?php echo $id;?> .pic-caption{		
			border-radius: 50%;
		}
		<?php } ?>
		/**image-layout end**/

		/**grid-details-content bg color start**/
		<?php 
		if($data_setting['GPV_setting_img_border_show']=='Yes'){
			?>
			.GPV_wrapper_<?php echo $id;?> .GPV_my-grid_<?php echo $id;?> .grid-thumbnail-content{
				border: <?php echo($data_setting['GPV_setting_img_border_size']==1 || $data_setting['GPV_setting_img_border_size']==2)?$data_setting['GPV_setting_img_border_size']:'';?>px solid <?php echo $data_setting['GPV_setting_img_border_color']?>;			
			}
			<?php
			} ?>

			.GPV_wrapper_<?php echo $id;?> .GPV_my-grid_<?php echo $id;?> .grid-details-content{
				background: <?php echo $data_setting['GPV_setting_open_img_background_color'];?>;

			}
			.GPV_wrapper_<?php echo $id;?> .GPV_my-grid_<?php echo $id;?> .grid-arrow{
				border-bottom-color: <?php echo $data_setting['GPV_setting_open_img_background_color'];?>;
			}
			/**grid-details-content bg color end**/

			/**label color start**/
			.GPV_wrapper_<?php echo $id;?> .GPV_my-grid_<?php echo $id;?> .grid-image-label{
				text-align: <?php echo $data_setting['GPV_setting_label_position'];?>;
				font-family:<?php echo $data_setting['GPV_setting_font_style'];?>;
			}
			.GPV_wrapper_<?php echo $id;?> .GPV_my-grid_<?php echo $id;?> .hover-label{
				font-family:<?php echo $data_setting['GPV_setting_font_style'];?>!important;
			}
			/**label color end**/

			/**button color start**/
			.GPV_wrapper_<?php echo $id;?> .GPV_my-grid_<?php echo $id;?> .grid-details-content .gpv-link-btn{
				float: <?php echo($data_setting['GPV_setting_button_position']=='left')?'left':'';?>!important;
				background: <?php echo $data_setting['GPV_setting_button_background_color'];?>;
				border-color:<?php echo $data_setting['GPV_setting_button_border_color'];?>!important;
				color:<?php echo $data_setting['GPV_setting_button_text_color'];?>!important;  
			}
			/**button color end**/

			/**description color start**/
			.GPV_wrapper_<?php echo $id;?> .GPV_my-grid_<?php echo $id;?> .grid-description{
				color:<?php echo $data_setting['GPV_setting_description_text_color'];?>!important;  
				text-align: justify;
				font-size: 17px;
				margin-top:<?php //echo ($data_setting['GPV_setting_label']!='Yes')?'1em;':'';?>!important;   
				font-family:<?php echo $data_setting['GPV_setting_font_style'];?>!important;
			}
			/**description color end**/

			/**close color start**/
			.GPV_wrapper_<?php echo $id;?> .GPV_my-grid_<?php echo $id;?> .grid-details .grid-close:before,
			.GPV_wrapper_<?php echo $id;?> .GPV_my-grid_<?php echo $id;?> .grid-details .grid-close:after{
				background: <?php echo $data_setting['GPV_setting_close_icon_color']; ?>;
			}

			/**close color end**/		

			/**custom css**/
			<?php echo $data_setting['GPV_setting_Custom_CSS']; ?>
			/**custom css**/
			</style>