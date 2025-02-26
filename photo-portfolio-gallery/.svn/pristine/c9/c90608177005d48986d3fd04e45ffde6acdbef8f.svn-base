<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$see_new_video_nonce = wp_create_nonce( 'see_new_video_nonce' );
?>
<div id="photo-portfolio-edit-video" style="display: none">
	<div id="photo-portfolio-edit-video-wrapper" data-video-index="" data-portfolio-id="" data-portfolio-item-id=""
		 data-edit-video-nonce="" data-see-video-nonce="<?php echo $see_new_video_nonce; ?>">
		<h1><?php echo __( 'Update video', 'photo-portfolio' ); ?></h1>
		<form method="post"
			  action="">
			<div class="iframe-text-area">
				<iframe class="iframe-area" src="" frameborder="0" allowfullscreen></iframe>
				<textarea rows="4" cols="50" class="text-area" disabled>
				</textarea>
				<input type="text" id="web_pace_edit_video_input" name="web_pace_edit_video_input" value=""
					   placeholder="New video url"/><br/>
			</div>
			<a class='button-primary set-new-video'><?php echo __( 'See New Video', 'photo-portfolio' ); ?></a>
			<button class='save-slider-options button-primary web-pace-insert-edited-video-button'
					id='web-pace-insert-edited-video-button'><?php echo __( 'Insert Video', 'photo-portfolio' ); ?></button>
		</form>
	</div>
</div>