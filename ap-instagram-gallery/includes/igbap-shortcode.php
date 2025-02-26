<?php 
add_shortcode( 'arrow_insta_gallery', 'igbap_insta_gallery_shortcode' );
function igbap_insta_gallery_shortcode($atts , $content){

	extract( shortcode_atts( array( 'id' => null ) , $atts ) );

	$igbap_show_photos_from = get_post_meta($id, '_igbap_show_photos_from', true);
	$igbap_user_id = get_post_meta($id, '_igbap_user_id', true);
	$igbap_user_hashtag = get_post_meta($id, '_igbap_user_hashtag', true);
	$igbap_multiuser_id = get_post_meta($id, '_igbap_multiuser_id', true);
	$igbap_multitag_id = get_post_meta($id, '_igbap_multitag_id', true);
	$igbap_column_count = get_post_meta($id, '_igbap_column_count', true);
	$igbap_liked_id = get_post_meta($id, '_igbap_liked_id', true);
	$igbap_number_of_photos = get_post_meta($id, '_igbap_number_of_photos', true);
	$ifba_number_of_columns = get_post_meta($id, '_ifba_number_of_columns', true);
	$ifba_images_margin = get_post_meta($id, '_ifba_images_margin', true);
	$igbap_lightbox_speed = get_post_meta($id, '_igbap_lightbox_speed', true);
	$igbap_lightbox_delay = get_post_meta($id, '_igbap_lightbox_delay', true);
	$utbap_enable_videos = get_post_meta($id, '_utbap_enable_videos', true);
	$utbap_enable_videos_controls = get_post_meta($id, '_utbap_enable_videos_controls', true);
	$igbap_lightbox_username = get_post_meta($id, '_igbap_lightbox_username', true);
	$igbap_lightbox_description = get_post_meta($id, '_igbap_lightbox_description', true);
	$igbap_lightbox_likes = get_post_meta($id, '_igbap_lightbox_likes', true);
	$igbap_lightbox_comments = get_post_meta($id, '_igbap_lightbox_comments', true);
	$igbap_lightbox_location = get_post_meta($id, '_igbap_lightbox_location', true);
	$igbap_lightbox_date = get_post_meta($id, '_igbap_lightbox_date', true);
	$igbap_lightbox_link = get_post_meta($id, '_igbap_lightbox_link', true);
	$igbap_color_scheme = get_post_meta($id, '_igbap_color_scheme', true);
	$utbap_enable_load_more_button = get_post_meta($id, '_utbap_enable_load_more_button', true);
	$igbap_bg_overlay = get_post_meta($id, '_igbap_bg_overlay', true);
	$igbap_container_bg = get_post_meta($id, '_igbap_container_bg', true);
	$igbap_username_color = get_post_meta($id, '_igbap_username_color', true);
	$igbap_date_time_color = get_post_meta($id, '_igbap_date_time_color', true);
	$igbap_caption_color = get_post_meta($id, '_igbap_caption_color', true);
	$igbap_link_color = get_post_meta($id, '_igbap_link_color', true);
	$igbap_private_access_token = get_post_meta($id, '_igbap_private_access_token', true);



	ob_start();

	?>
	<div class="<?php echo $igbap_color_scheme; ?>">
		<div id="arrow_insta_gallery_<?php echo $id;?>" style="text-align: center;" class="element ig-fashion <?php echo $ifba_number_of_columns; ?> <?php echo $ifba_images_margin;?>"></div>
	</div>
	<style type="text/css">



		<?php if($igbap_container_bg != '') { ?>
			.fancybox-skin{
				background: <?php echo $igbap_container_bg; ?> !important;
			}
			<?php } ?>

			<?php if($igbap_username_color != '') { ?>
				.fancybox-skin .username-ui{
					color: <?php echo $igbap_username_color; ?> !important;
				}
				<?php } ?>
				<?php if($igbap_date_time_color != '') { ?>
				.fancybox-skin .date-ui{
					color: <?php echo $igbap_date_time_color; ?> !important;
				}
				<?php } ?>
				<?php if($igbap_caption_color != '') { ?>
				.fancybox-skin .description-ui{
					color: <?php echo $igbap_caption_color; ?> !important;
				}
				<?php } ?>
				<?php if($igbap_link_color != '') { ?>
				.fancybox-skin .link-ui{
					color: <?php echo $igbap_link_color; ?> !important;
				}
				<?php } ?>
				<?php if($ifba_images_margin == '') { ?>
					.instagram-element.col-1 .instagram-photo { width:100%; }
					.instagram-element.col-2 .instagram-photo { width:50%; }
					.instagram-element.col-3 .instagram-photo { width:33%; }
					.instagram-element.col-4 .instagram-photo { width:25%; }
					.instagram-element.col-5 .instagram-photo { width:20%; }
					.instagram-element.col-6 .instagram-photo { width:16.6%; }
					.instagram-element.col-7 .instagram-photo { width:14.28%; }
					.instagram-element.col-8 .instagram-photo { width:12.5%; }
					.instagram-element.col-9 .instagram-photo { width:11.11%; }
					.instagram-element.col-10 .instagram-photo { width:10%; }
					<?php  }else{ ?>
						.instagram-element.col-1 .instagram-photo { width:99%; }
						.instagram-element.col-2 .instagram-photo { width:49%; }
						.instagram-element.col-3 .instagram-photo { width:32%; }
						.instagram-element.col-4 .instagram-photo { width:24%; }
						.instagram-element.col-5 .instagram-photo { width:19%; }
						.instagram-element.col-6 .instagram-photo { width:15.6%; }
						.instagram-element.col-7 .instagram-photo { width:13.28%; }
						.instagram-element.col-8 .instagram-photo { width:11.5%; }
						.instagram-element.col-9 .instagram-photo { width:10.11%; }
						.instagram-element.col-10 .instagram-photo { width:9%; }
						<?php } ?>
	
					</style>
	
					<script type="text/javascript">

						setTimeout(function(){ 
							var igbap_id = '<?php echo $id;?>';
							var igbap_show_photos_from = '<?php echo $igbap_show_photos_from; ?>';
							var igbap_user_id = '<?php echo $igbap_user_id; ?>';
							var igbap_user_hashtag = '<?php echo $igbap_user_hashtag; ?>';
							var igbap_multiuser_id = '<?php echo $igbap_multiuser_id; ?>';
							var igbap_multitag_id = '<?php echo $igbap_multitag_id; ?>';
							var igbap_column_count = '<?php echo $igbap_column_count; ?>';
							var igbap_liked_id = '<?php echo $igbap_liked_id; ?>';
							var igbap_number_of_photos = <?php echo $igbap_number_of_photos; ?>;
							var ifba_number_of_columns = '<?php echo $ifba_number_of_columns; ?>';
							var ifba_images_margin = '<?php echo $ifba_images_margin; ?>';
							var igbap_lightbox_speed = <?php echo $igbap_lightbox_speed; ?>;
							var igbap_lightbox_delay = <?php echo $igbap_lightbox_delay; ?>;
							var utbap_enable_videos = '<?php echo $utbap_enable_videos; ?>';
							var utbap_enable_videos_controls = '<?php echo $utbap_enable_videos_controls; ?>';
							var igbap_lightbox_username = '<?php echo $igbap_lightbox_username; ?>';
							var igbap_lightbox_description = '<?php echo $igbap_lightbox_description; ?>';
							var igbap_lightbox_likes = '<?php echo $igbap_lightbox_likes; ?>';
							var igbap_lightbox_comments = '<?php echo $igbap_lightbox_comments; ?>';
							var igbap_lightbox_location = '<?php echo $igbap_lightbox_location; ?>';
							var igbap_lightbox_date = '<?php echo $igbap_lightbox_date; ?>';
							var igbap_lightbox_link = '<?php echo $igbap_lightbox_link; ?>';
							var igbap_private_access_token = '<?php echo $igbap_private_access_token; ?>';

							var igbap_give_user_ids = '';
							var igbap_give_hashtags = '';
							var igbap_give_liked_id = '';
							var igbap_access_token = '';

							if(igbap_show_photos_from == 'user'){
								igbap_give_user_ids = igbap_user_id;
							}
							if(igbap_show_photos_from == 'hashtag'){
								igbap_give_hashtags = igbap_user_hashtag;
							}
							if(igbap_show_photos_from == 'multiuser'){
								igbap_give_user_ids = igbap_multiuser_id;
							}
							if(igbap_show_photos_from == 'multitag'){
								igbap_give_hashtags = igbap_multitag_id;
							}
							if(igbap_show_photos_from == 'liked'){
								igbap_give_user_ids = igbap_liked_id;
							}
							if(igbap_private_access_token == ''){
								igbap_access_token = '355477699.3a81a9f.ce8b1a0b7895403f84b45f1eb2eda6f7';
							}else{
								igbap_access_token = '<?php echo $igbap_private_access_token; ?>';
							}


							jQuery('#arrow_insta_gallery_'+igbap_id).instagramElement({
								accessToken : igbap_access_token,
								mode : igbap_show_photos_from,
								userID : igbap_give_user_ids,
								video: utbap_enable_videos,
								limit:igbap_number_of_photos,
								tag: igbap_give_hashtags,
								showVideoControls: utbap_enable_videos_controls,
								showUsername: igbap_lightbox_username,
								showDescription: igbap_lightbox_description,
								showLikes : igbap_lightbox_likes,
								showComments: igbap_lightbox_comments,
								showLocation : igbap_lightbox_location,
								showDate: igbap_lightbox_date,
								showLink : igbap_lightbox_link,
								speed: igbap_lightbox_speed,
								delayInterval: igbap_lightbox_delay
							});
						}, 500);
						jQuery(".instagram-element").click(function(e){
							if (jQuery(e.target).hasClass("instagram-photo"))
								return false;

// your other code here
});
</script>

<style type="text/css">
	#arrow_insta_gallery_<?php echo $id;?> .seachInstagramLoadMoreContainer{
		display:<?php if($utbap_enable_load_more_button == '1'){echo 'block';}else{echo 'none';} ?>;
	}
</style>
<?php
return ob_get_clean();
}