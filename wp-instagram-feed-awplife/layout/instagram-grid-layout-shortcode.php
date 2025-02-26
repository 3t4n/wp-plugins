<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Instagram Feed Gallery
 */
?>
<style>
.insta-gallery-div {
	padding: <?php echo esc_attr( $insta_image_spacing ); ?>px !important;
}
.carouselGallery-left, .carouselGallery-right {
	color: <?php echo esc_attr( $insta_lightbox_color ); ?>;
}
.carouselGallery-modal .iconscircle-cross {
	color: <?php echo esc_attr( $insta_lightbox_color ); ?>;
}
</style>
	<div class="row">
			<?php
			if($instagram_response == 200) {
				foreach($instagram_data['data'] as $key =>  $attachment_id) {
					$insta_username 		= $attachment_id['username'];
					$insta_time 			= $attachment_id['timestamp'];
					$insta_photos_link 		= $attachment_id['permalink'];
					$insta_media_type		= $attachment_id['media_type'];	
					$thumbnail_url 			= $attachment_id['media_url'];	

					if(isset($attachment_id['caption'])){
					$insta_photos_caption     	= $attachment_id['caption'];
					} else {
						$insta_photos_caption = '';
					}
					if(isset($attachment_id['thumbnail_url'])){
					$thumbnail_video_image     	= $attachment_id['thumbnail_url'];
					} else {
						$thumbnail_video_image = '';
					}
					//Lightbox class 
					if($insta_lightbox == 'yes') {
						$link_url = $thumbnail_url;
					} else {
						$lightboxop = '';
						$link_url = $insta_photos_link;
					}
					if($insta_media_type == 'VIDEO') {
						$lightboxop = '';
						$link_url = $insta_photos_link;
					}
					$insta_allowed_icon_html = array(
						'i' => array(
							'class' => array()
						)
					);
					$newDate = date("F j, Y ", strtotime($insta_time));
					?>

					<?php if($insta_lightbox == 'yes') { ?>
						<div class="col-md-<?php echo esc_attr( $insta_grid_columns_l ); ?> insta-gallery-div">
							<a class="insta-if-navigation insta-main-div carouselGallery-carousel" type="<?php echo esc_attr( $insta_media_type ); ?>" data-posturl="<?php echo esc_url( $insta_photos_link ); ?>" data-username="<?php echo esc_html( $insta_username ); ?>" data-img-date="<?php echo esc_attr( $newDate ); ?>" data-index="<?php echo esc_attr( $key ); ?>" data-imagetext="<?php echo esc_html( $insta_photos_caption ); ?>" data-imagepath="<?php echo esc_url( $thumbnail_url ); ?>">
								<div class="insta-img-thumbnail">
									<img class='insta-img-thumbnail' src='<?php if ( $insta_media_type == 'VIDEO' ) { echo esc_url( $thumbnail_video_image ); } else { echo esc_url( $thumbnail_url );} ?>'>
									<?php if($insta_media_type == 'VIDEO') { ?>
										<svg class="instagram-video" width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M1.75 4.5a.25.25 0 00-.25.25v14.5c0 .138.112.25.25.25h20.5a.25.25 0 00.25-.25V4.75a.25.25 0 00-.25-.25H1.75zM0 4.75C0 3.784.784 3 1.75 3h20.5c.966 0 1.75.784 1.75 1.75v14.5A1.75 1.75 0 0122.25 21H1.75A1.75 1.75 0 010 19.25V4.75z"/><path d="M9 15.584V8.416a.5.5 0 01.77-.42l5.576 3.583a.5.5 0 010 .842L9.77 16.005a.5.5 0 01-.77-.42z"/></svg>
									<?php } if($insta_icon_image == 'yes') { ?><svg class="insta_svg_icon" width="45px" height="45px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M3 16V8C3 5.23858 5.23858 3 8 3H16C18.7614 3 21 5.23858 21 8V16C21 18.7614 18.7614 21 16 21H8C5.23858 21 3 18.7614 3 16Z" stroke="currentColor" stroke-width="1.5"/><path d="M17.5 6.51L17.51 6.49889" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><?php $insta_allowed_icon_html; } ?>
									<?php if($insta_caption_image == 'yes') { ?>
										<figcaption>
											<p class="pw-caption"><?php echo wp_trim_words( esc_html($insta_photos_caption), 3); ?></p>
										</figcaption>
									<?php } ?>
								</div>
							</a>
						</div>
					<?php } else { ?>	
						<div class="col-md-<?php echo esc_attr( $insta_grid_columns_l ); ?> insta-gallery-div">
							<a class="insta-main-div" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $insta_link_redirection ); ?>">
								<div class="insta-img-thumbnail">
									<img class='insta-img-thumbnail' src='<?php if ( $insta_media_type == 'VIDEO' ) { echo esc_url( $thumbnail_video_image ); } else { echo esc_url( $thumbnail_url );} ?>'>
									<?php if($insta_media_type == 'VIDEO') { ?>
										<svg class="instagram-video" width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M1.75 4.5a.25.25 0 00-.25.25v14.5c0 .138.112.25.25.25h20.5a.25.25 0 00.25-.25V4.75a.25.25 0 00-.25-.25H1.75zM0 4.75C0 3.784.784 3 1.75 3h20.5c.966 0 1.75.784 1.75 1.75v14.5A1.75 1.75 0 0122.25 21H1.75A1.75 1.75 0 010 19.25V4.75z"/><path d="M9 15.584V8.416a.5.5 0 01.77-.42l5.576 3.583a.5.5 0 010 .842L9.77 16.005a.5.5 0 01-.77-.42z"/></svg>
									<?php } if($insta_icon_image == 'yes') { ?><svg class="insta_svg_icon" width="45px" height="45px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M3 16V8C3 5.23858 5.23858 3 8 3H16C18.7614 3 21 5.23858 21 8V16C21 18.7614 18.7614 21 16 21H8C5.23858 21 3 18.7614 3 16Z" stroke="currentColor" stroke-width="1.5"/><path d="M17.5 6.51L17.51 6.49889" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><?php $insta_allowed_icon_html; } ?>
									<?php if($insta_caption_image == 'yes') { ?>
										<figcaption>
											<p class="pw-caption"><?php echo wp_trim_words( esc_html($insta_photos_caption), 3); ?></p>
										</figcaption>
									<?php } ?>
								</div>
							</a>
						</div>
					<?php } 
				} // end of attachment foreach
				
			} else if($instagram_response == 403) { 
					_e('Sorry! No image gallery found.', 'instagram-feed-gallery');
				?>
					
				<div><strong>Access Token Limit:</strong> calls within one hour = 200 * Number of Users | <strong>more details:</strong> <a href="https://developers.facebook.com/docs/graph-api/overview/rate-limiting#application-level-rate-limiting" target="_blank">Check Here</a></div>
				<?php } else if($instagram_response == 400) { ?>
						<?php echo $instagram_data_decode['body']; 
					}
				?>
	</div>
	<?php include('lightbox.php'); ?>