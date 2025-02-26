<?php

class fantasticmenu_WPphotoUpload{
	//need to register script with the plugin main file

	public function __construct()
	{

	} 

	public static function uploadButton($idName, $imageURL='')
	{			
		?>
		<div id="<?php echo $idName;?>" class="feature-image-wrapper">
			<p class="hide-if-no-js">
				<a title="Set Image" href="javascript:;" class="set-WPimageUpload-thumbnail btn">Set item image</a>
			</p>

			<div class="featured-WPimageUpload-image-container" class="hidden">
				
				<img src="<?php echo $imageURL; ?>"  />

			</div><!-- #featured-WPimageUpload-image-container -->

			<p class="hide-if-no-js hidden">
				<a title="Remove Image" href="javascript:;" class="remove-WPimageUpload-thumbnail">Remove item image</a>
			</p><!-- .hide-if-no-js -->

			<p class="featured-WPimageUpload-image-info">
				
				<input type="hidden" class="WPimageUpload-thumbnail-src" name="<?php echo $idName;?>" value="<?php echo $imageURL; ?>" />
				<input type="hidden" class="WPimageUpload-thumbnail-title" name="WPimageUpload-thumbnail-title" value="<?php //echo get_post_meta( $post->ID, 'WPimageUpload-thumbnail-title', true ); ?>" />
				<input type="hidden" class="WPimageUpload-thumbnail-alt" name="WPimageUpload-thumbnail-alt" value="<?php //echo get_post_meta( $post->ID, 'WPimageUpload-thumbnail-alt', true ); ?>" />

			</p><!-- #featured-WPimageUpload-image-meta -->

			<script type="text/javascript">
			   renderFeaturedImage(jQuery, "<?php echo $idName;?>");
			</script>
		</div>		
	<?php }
}