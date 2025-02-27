
<style type="text/css">
.button_wrapper_id_<?php echo esc_attr($id); ?>{
	margin-top: <?php echo esc_attr($custom_data->margin_top); ?>px!important;
	margin-right: <?php echo esc_attr($custom_data->margin_right);?>px!important;
	margin-bottom: <?php echo esc_attr($custom_data->margin_bottom); ?>px!important;
	margin-left: <?php echo esc_attr($custom_data->margin_left); ?>px!important;
	<?php if( isset($custom_data->container_use) &&  $custom_data->container_use==1){ ?>display: block;<?php }else{ ?>display: inline-block;<?php } ?>
}
.button_container_id_<?php echo esc_attr($id); ?>{
	width: <?php echo esc_attr($custom_data->container_width); ?>px!important;	
	text-align: <?php echo esc_attr($custom_data->button_align); ?>!important;
	<?php if(isset($custom_data->container_center) && $custom_data->container_center ==1){ ?>margin: 0 auto!important;<?php } ?>
	
}

.wd_button_<?php echo esc_attr($id); ?>{
	line-height: 1.42857143;
	text-decoration: none!important;
	display: inline-block;
	border-bottom: none;	
	width: <?php echo esc_attr($custom_data->button_width); ?>px!important;
	height: <?php echo esc_attr($custom_data->button_height); ?>px;
	padding-top: <?php echo esc_attr($custom_data->padding_top); ?>px!important;
	padding-right: <?php echo esc_attr($custom_data->padding_right); ?>px!important;
	padding-bottom: <?php echo esc_attr($custom_data->padding_bottom); ?>px!important;
	padding-left: <?php echo esc_attr($custom_data->padding_left); ?>px!important;
	color: <?php echo esc_attr($custom_data->button_text_color);?>!important;	
	font-size: <?php echo esc_attr($custom_data->font_size); ?>px!important;
	font-weight: <?php echo !empty($custom_data->text_bold) ? esc_attr($custom_data->text_bold) : '' ;?>;
	font-style: <?php echo !empty($custom_data->text_italic) ? esc_attr($custom_data->text_italic) : '';?>;
	text-align: <?php echo esc_attr($custom_data->text_align);?>;

	<?php if(!($custom_data->button_layout =='simple_button' && isset($custom_data->button_circle))){
		?>
		border-top-left-radius: <?php echo esc_attr($custom_data->border_top_left); ?>px;
		border-top-right-radius: <?php echo esc_attr($custom_data->border_top_right); ?>px;
		border-bottom-left-radius:  <?php echo esc_attr($custom_data->border_bottom_left); ?>px;
		border-bottom-right-radius: <?php echo esc_attr($custom_data->border_bottom_right); ?>px;
		<?php
		}else{
			?>
			border-radius: 50%;
			<?php
			} ?>

			<?php 
			if(!($custom_data->button_layout=='curl' || $custom_data->button_layout=='border_transitions')){?>
				border-style: <?php echo esc_attr($custom_data->border_style); ?>;
				border-width: <?php echo esc_attr($custom_data->border_width); ?>px;
				border-color: <?php echo esc_attr($custom_data->border_color); ?>;
				<?php }
				?>
				text-shadow:<?php echo esc_attr($custom_data->shadow_offset_left); ?>px <?php echo esc_attr($custom_data->shadow_offset_top); ?>px <?php echo esc_attr($custom_data->shadow_blur); ?>px <?php echo esc_attr($custom_data->shadow_color); ?>;


				-webkit-box-shadow: <?php echo esc_attr($custom_data->border_shadow_offset_left); ?>px <?php echo esc_attr($custom_data->border_shadow_offset_top);?>px <?php echo esc_attr($custom_data->border_shadow_blur);?>px <?php echo esc_attr($custom_data->border_shadow_color); ?>;
				-moz-box-shadow: <?php echo esc_attr($custom_data->border_shadow_offset_left); ?>px <?php echo esc_attr($custom_data->border_shadow_offset_top); ?>px <?php echo esc_attr($custom_data->border_shadow_blur); ?>px <?php echo esc_attr($custom_data->border_shadow_color); ?>;
				box-shadow: <?php echo esc_attr($custom_data->border_shadow_offset_left); ?>px <?php echo esc_attr($custom_data->border_shadow_offset_top); ?>px <?php echo esc_attr($custom_data->border_shadow_blur); ?>px <?php echo esc_attr($custom_data->border_shadow_color); ?>;


				background: -webkit-gradient(linear, left top, left bottom, color-stop(<?php echo esc_attr($custom_data->gradient_stop); ?>%, <?php echo esc_attr($button_bg_color_start); ?>), color-stop(1, <?php echo esc_attr($button_bg_color_end); ?>));
				background: -moz-linear-gradient(<?php echo esc_attr($button_bg_color_start); ?> <?php echo esc_attr($custom_data->gradient_stop); ?>%, <?php echo esc_attr($button_bg_color_end);


				 ?>);
				background: -o-linear-gradient(<?php echo esc_attr($button_bg_color_start); ?> <?php echo esc_attr($custom_data->gradient_stop); ?>%, <?php echo esc_attr($button_bg_color_end); ?>);
				background: linear-gradient(<?php echo esc_attr($button_bg_color_start); ?> <?php echo esc_attr($custom_data->gradient_stop); ?>%, <?php echo esc_attr($button_bg_color_end); ?>);
				webkit-transition: all 0.3s;
				-moz-transition: all 0.3s;
				transition: all 0.3s;
			}

			<?php 
			if($custom_data->button_layout=='icon_with_text'){ ?>
				.wd_button_<?php echo esc_attr($id); ?> .fa{
					margin-right: 10px;	
				}
				<?php } ?>


				.wd_button_<?php echo esc_attr($id); ?>:hover{
					color: <?php echo esc_attr($custom_data->button_text_hover_color); ?>!important;
					text-shadow:<?php echo esc_attr($custom_data->shadow_offset_left); ?>px <?php echo esc_attr($custom_data->shadow_offset_top); ?>px <?php echo esc_attr($custom_data->shadow_blur); ?>px <?php echo esc_attr($custom_data->shadow_hover_color); ?>;
					text-shadow-color:<?php echo esc_attr($custom_data->shadow_hover_color); ?>;	
					border-color: <?php echo esc_attr($custom_data->border_hover_color); ?>;
					-webkit-box-shadow: <?php echo esc_attr($custom_data->border_shadow_offset_left); ?>px <?php echo esc_attr($custom_data->border_shadow_offset_top); ?>px <?php echo esc_attr($custom_data->border_shadow_blur); ?>px <?php echo esc_attr($custom_data->border_shadow_hover_color); ?>;
					-moz-box-shadow: <?php echo esc_attr($custom_data->border_shadow_offset_left); ?>px <?php echo esc_attr($custom_data->border_shadow_offset_top); ?>px <?php echo esc_attr($custom_data->border_shadow_blur); ?>px <?php echo esc_attr($custom_data->border_shadow_hover_color); ?>;
					box-shadow: <?php echo esc_attr($custom_data->border_shadow_offset_left); ?>px <?php echo esc_attr($custom_data->border_shadow_offset_top); ?>px <?php echo esc_attr($custom_data->border_shadow_blur); ?>px <?php echo esc_attr($custom_data->border_shadow_hover_color);?>;

					<?php 
					if(!($custom_data->button_layout =='background_transitions')){ ?>
						background: -webkit-gradient(linear, left top, left bottom, color-stop(<?php echo esc_attr($custom_data->gradient_stop); ?>%, <?php echo esc_attr($button_bg_hover_color_start); ?>), color-stop(1, <?php echo esc_attr($button_bg_hover_color_end); ?>));
						background: -moz-linear-gradient(<?php echo esc_attr($button_bg_hover_color_start); ?> <?php echo esc_attr($custom_data->gradient_stop); ?>%, <?php echo esc_attr($button_bg_hover_color_end); ?>);
						background: -o-linear-gradient(<?php echo esc_attr($button_bg_hover_color_start); ?> <?php echo esc_attr($custom_data->gradient_stop); ?>%, <?php echo esc_attr($button_bg_hover_color_end); ?>);
						background: linear-gradient(<?php echo esc_attr($button_bg_hover_color_start); ?> <?php echo esc_attr($custom_data->gradient_stop); ?>%, <?php echo esc_attr($button_bg_hover_color_end); ?>);
						<?php } ?>


						webkit-transition: all 0.3s;
						-moz-transition: all 0.3s;
						transition: all 0.3s;
					}
					</style>