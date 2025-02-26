<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div id="photo_gallery_add_videos" style="display: none">
	<div id="photo_gallery_add_videos_wrap" data-photo-portfolio-id=""
		 data-add-thumb-video-nonce=""
		 data-add-video-nonce="">
		<h2><?php echo __( 'Add Video URL From Youtube or Vimeo', 'photo-portfolio' ); ?></h2>
		<div class="control-panel">
			<form method="post" action="" class="add-main-video">
				<input type="text" id="web_pace_add_video_input" name="web_pace_add_video_input"/>
				<button class='save-slider-options button-primary web-pace-insert-video-button'
						id='web-pace-insert-video-button'><?php echo __( 'Insert Video', 'photo-portfolio' ); ?></button>
				<div id="add-video-popup-options">
					<div>
						<div>
							<label for="show_title"><?php echo __( 'Title', 'photo-portfolio' ); ?>:</label>
							<div>
								<input name="show_title" value="" type="text"/>
							</div>
						</div>
						<div>
							<label for="show_description"><?php echo __( 'Description', 'photo-portfolio' ); ?>
								:</label>
							<textarea id="show_description" name="show_description"></textarea>
						</div>
						<div>
							<label for="show_url"><?php echo __( 'Url', 'photo-portfolio' ); ?>:</label>
							<input type="text" name="show_url" value=""/>
						</div>
					</div>
				</div>
			</form>
			<form method="post" action="" class="add-thumb-video" data-portfolio-item-id="">
				<input type="text" id="web_pace_add_video_input_thumb" name="web_pace_add_video_input_thumb"/>
				<button class='save-slider-options button-primary web-pace-insert-thumb-video-button'
						id='web-pace-insert-video-button'><?php echo __( 'Insert Video', 'photo-portfolio' ); ?></button>
			</form>
		</div>
	</div>
</div>