<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// CSS
wp_enqueue_style( 'ifgp-styles-css', IFGP_PLUGIN_URL . 'css/styles.css' );
wp_enqueue_style( 'ifgp-bootstrap-css', IFGP_PLUGIN_URL . 'css/ifgp-bootstrap.css' );
wp_enqueue_style( 'ifgp-metabox-css', IFGP_PLUGIN_URL . 'css/metabox.css' );
wp_enqueue_style( 'ifgp-settings-css', IFGP_PLUGIN_URL . 'css/ifgp-settings.css' );
wp_enqueue_style ( 'wp-color-picker' );

//js
wp_enqueue_script( 'ifgp-bootstrap-js', IFGP_PLUGIN_URL  . 'js/bootstrap.js', array( 'jquery' ), '', true  );
wp_enqueue_script( 'ifgp-popper-js', IFGP_PLUGIN_URL  . 'js/popper.min.js');
wp_enqueue_script( 'ifgp-insta-color-picker', IFGP_PLUGIN_URL  . 'js/insta-color-picker.js', array( 'jquery', 'wp-color-picker' ), '', true);

?>
<style>
.panel-info {
    border-color: #F5F5F5 !important;
}
.hndle.ui-sortable-handle {
	font-size: 1.3rem;
	padding: 10px 0px 0px 15px
}
.postbox-container {
    width: 100%;
}
</style>
	<div class="row">
		<div class="col-md-10">
			<div class="postbox-container insta-settings" style="margin-top:20px; margin-bottom:20px;">
				<div class="postbox">
					<div class="postbox-header"><h2 class="hndle ui-sortable-handle"><?php esc_html_e('Add Instagram Feed Gallery', 'instagram-feed-gallery'); ?></h2>
					<div class="handle-actions hide-if-no-js"></div></div>
					<div class="inside">
						<div class="d-flex align-items-start bhoechie-tab-container">
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
								<div class="list-group">
									<a href="#" class="list-group-item active">
										<span class="dashicons dashicons-instagram"></span><?php esc_html_e('Instagram Tocken', 'instagram-feed-gallery'); ?>
									</a>
									<a href="#" class="list-group-item">
										<span class="dashicons dashicons-layout"></span><?php esc_html_e('Layouts', 'instagram-feed-gallery'); ?>
									</a>
									<a href="#" class="list-group-item">
										<span class="dashicons dashicons-admin-generic"></span><?php esc_html_e('Config', 'instagram-feed-gallery'); ?>
									</a>
									<a href="#" class="list-group-item">
									<span class="dashicons dashicons-welcome-view-site"></span><?php esc_html_e('LightBox', 'instagram-feed-gallery'); ?>
									</a>
									<a href="#" class="list-group-item">
										<span class="dashicons dashicons-cart"></span><?php esc_html_e( 'Upgrade To Pro', 'instagram-feed-gallery' ); ?>
									</a>
								</div>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
								<div class="bhoechie-tab-content active">
									<h2><?php esc_html_e('Type Instagram Accese Tocken', 'instagram-feed-gallery'); ?></h2>
									<hr>
									<div class="row">
										<div class="col-md-4">
											<div class="ma_field_discription">
												<h4><?php esc_html_e('Instagram Accese Tocken', 'instagram-feed-gallery'); ?></h4>
												<p><?php esc_html_e('Enter access token to add the Instagram feed. You can generate access token easily from here', 'instagram-feed-gallery'); ?> <a target="_blank" href="https://www.youtube.com/watch?v=VrqbUP67Jbw"><?php _e('Youtube Video', 'instagram-feed-gallery'); ?></a></p> 

											</div>
										</div>
										<div class="col-md-8">
											<div class="ma_field panel-body">
												<textarea class="form-control" rows="5" id="instagram_acces_token" name="instagram_acces_token"></textarea>
												<div><strong>Access Token Limit:</strong> calls within one hour = 200 * Number of Users | <strong>More details:</strong> <a href="https://developers.facebook.com/docs/graph-api/overview/rate-limiting#application-level-rate-limiting" target="_blank">check here</a></div>
											</div>
										</div>
									</div>
								</div>
								<div class="bhoechie-tab-content">
									<h2><?php esc_html_e('Choose Gallery Layout Type', 'instagram-feed-gallery'); ?></h2>
									<hr>
									<div class="container">
										<div class="row">
											<div class="col-lg-3 col-md-4 col-sm-6">
												<input type="radio" name="insta_layout" id="insta_layout_grid" value="insta_layout_grid" checked>
												<label for="insta_layout_grid"><img class="img-fluid" style="box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" src="<?php echo esc_url(IFGP_PLUGIN_URL.'/img/Grid-Layout.png'); ?>"/></label>
											</div>
											<div class="col-lg-3 col-md-4 col-sm-6">
												<input type="radio" name="insta_layout" >
												<label for="insta_layout_masonry"><a href="https://awplife.com/demo/instagram-feed-gallery-premium/instagram-feed-gallery-masonry-layout/" target="_new"><img class="img-fluid" style="box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" src="<?php echo esc_url(IFGP_PLUGIN_URL.'/img/masonry.png'); ?>"/></a></label>
											</div>
											<div class="col-lg-3 col-md-4 col-sm-6">
												<input type="radio" name="insta_layout">
												<label for="insta_layout_mosaic"><a href="https://awplife.com/demo/instagram-feed-gallery-premium/instagram-feed-gallery-mosaic/" target="_new"><img class="img-fluid" style="box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" src="<?php echo esc_url(IFGP_PLUGIN_URL.'/img/mosaic.jpg'); ?>"/></a></label>
											</div>
											<div class="col-lg-3 col-md-4 col-sm-6">
												<input type="radio" name="insta_layout" >
												<label for="insta_layout_masonry"><a href="https://awplife.com/demo/instagram-feed-gallery-premium/instagram-carousel-layout/" target="_new"><img class="img-fluid" style="box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" src="<?php echo esc_url(IFGP_PLUGIN_URL.'/img/carousel-layout.png'); ?>"/></a></label>
											</div>
											<div class="col-lg-3 col-md-4 col-sm-6">
												<input type="radio" name="insta_layout">
												<label for="insta_layout_mosaic"><a href="https://awplife.com/demo/instagram-feed-gallery-premium/instagram-post-layout/" target="_new"><img class="img-fluid" style="box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" src="<?php echo esc_url(IFGP_PLUGIN_URL.'/img/post-layout.png'); ?>"/></a></label>
											</div>
										</div>
									</div>
								</div>
								<div class="bhoechie-tab-content ">
									<h2><?php esc_html_e('Configuration', 'instagram-feed-gallery'); ?></h2>
									<hr>
									<div class="row insta_grid_column">
										<div class="col-md-4">
											<div class="ma_field_discription">
												<h4><?php esc_html_e('Rows & Column', 'instagram-feed-gallery'); ?></h4>
												<p><?php esc_html_e('Choose columns acording to device', 'instagram-feed-gallery'); ?></p>
											</div>
										</div>						
										<div class="col-md-8">
											<div class="ma_field panel-body">
												<select id="insta_grid_columns_l" name="insta_grid_columns_l" class="form-control" style="margin-left: 15px; width: 300px;">
													<option value="1" ><?php esc_html_e('Columns 12', 'instagram-feed-gallery'); ?></option>
													<option value="2"><?php esc_html_e('Columns 6', 'instagram-feed-gallery'); ?></option>
													<option value="3" selected><?php esc_html_e('Columns 4', 'instagram-feed-gallery'); ?></option>
													<option value="4"><?php esc_html_e('Columns 3', 'instagram-feed-gallery'); ?></option>
													<option value="6"><?php esc_html_e('Columns 2', 'instagram-feed-gallery'); ?></option>
													<option value="12"><?php esc_html_e('Columns 1', 'instagram-feed-gallery'); ?></option>
												</select>
											</div> 
										</div> 
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="ma_field_discription">
												<h4><?php esc_html_e('Instagram Image Limit', 'instagram-feed-gallery'); ?></h4>
												<p><?php esc_html_e('How much images you want to show the instagram gallery.', 'instagram-feed-gallery'); ?></p> 
											</div>
										</div>
										<div class="col-md-8">
											<div class="ma_field panel-body">
												<p class="range-slider">
													<input id="insta_image_limit" name="insta_image_limit" class="range-slider__range" type="range" value="24" min="1" max="50" step="1">
													<span class="range-slider__value"><?php esc_html_e('0', 'instagram-feed-gallery'); ?></span>
												</p>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="ma_field_discription">
												<h4><?php esc_html_e('Instagram Image Spacing', 'instagram-feed-gallery'); ?></h4>
												<p><?php esc_html_e('Set Image Spacing.', 'instagram-feed-gallery'); ?></p> 
											</div>
										</div>
										<div class="col-md-8">
											<div class="ma_field panel-body">
												<p class="range-slider">
													<input id="insta_image_spacing" name="insta_image_spacing" class="range-slider__range" type="range" value="3" min="0" max="20" step="1">
													<span class="range-slider__value"><?php esc_html_e('0', 'instagram-feed-gallery'); ?></span>
												</p>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="ma_field_discription">
												<h4><?php esc_html_e('Icon On Photos', 'instagram-feed-gallery'); ?></h4>
												<p><?php esc_html_e('Set icon on photos', 'instagram-feed-gallery'); ?></p> 
											</div>
										</div>
										<div class="col-md-8">
											<div class="ma_field panel-body">
												<label class="switch">
													<input type="checkbox" id="insta_icon_image" name="insta_icon_image" value="yes" checked >
													<div class="slider round"></div>
												</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="ma_field_discription">
												<h4><?php esc_html_e('Show Caption On Photos', 'instagram-feed-gallery'); ?></h4>
												<p><?php esc_html_e('Set captions on photo', 'instagram-feed-gallery'); ?></p> 
											</div>
										</div>
										<div class="col-md-8">
											<div class="ma_field panel-body">
												<label class="switch">
													<input type="checkbox" id="insta_caption_image" name="insta_caption_image" value="yes">
													<div class="slider round"></div>
												</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="ma_field_discription">
												<h4><?php esc_html_e('Instagram Image Link', 'instagram-feed-gallery'); ?></h4>
												<p><?php esc_html_e('Choose option for instagram Image Link New Tab', 'instagram-feed-gallery'); ?></p> 
											</div>
										</div>
										<div class="col-md-8">
											<div class="ma_field panel-body">
												<label class="switch">
													<input type="checkbox" id="insta_link_redirection" name="insta_link_redirection" value="_new">
													<div class="slider round"></div>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="bhoechie-tab-content">
									<h2><?php esc_html_e('Lightbox', 'instagram-feed-gallery'); ?></h2>
									<hr>
									
									<div class="row">
										<div class="col-md-4">
											<div class="ma_field_discription">
												<h4><?php esc_html_e('Lightbox', 'instagram-feed-gallery'); ?></h4>
												<p><?php esc_html_e('On Off Lightbox', 'instagram-feed-gallery'); ?></p> 
											</div>
										</div>
										<div class="col-md-8">
											<div class="ma_field panel-body">
												<label class="switch">
													<input type="checkbox" id="insta_lightbox" name="insta_lightbox" value="yes">
													<div class="slider round"></div>
												</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="ma_field_discription">
												<h4><?php esc_html_e('Lightbox Color', 'instagram-feed-gallery'); ?></h4>
												<p><?php esc_html_e('Changing the color of your Lightbox', 'instagram-feed-gallery'); ?></p> 
											</div>
										</div>
										<div class="col-md-8">
											<div class="ma_field panel-body">
												<input type="text" id="insta_lightbox_color" name="insta_lightbox_color" value="#ffffff">
											</div>
										</div>
									</div>
								</div>
								<div class="bhoechie-tab-content">
									<h1><?php esc_html_e( 'Upgrade To Pro', 'instagram-feed-gallery' ); ?></h1>
									<hr>
									<div style="padding-left: 10px;">
										<p class="ms-title"><?php esc_html_e( 'Upgrade To Premium For Unloack More Features & Settings', 'instagram-feed-gallery' ); ?></p>
									</div>
									<div>
										<h1><strong><?php esc_html_e( 'Offer:', 'instagram-feed-gallery' ); ?></strong><?php esc_html_e( 'Upgrade To Premium Just In Half Price', 'instagram-feed-gallery' ); ?> <strike> <?php esc_html_e( '$49', 'instagram-feed-gallery' ); ?></strike><strong> <?php esc_html_e( '$39', 'instagram-feed-gallery' ); ?></strong></h1>
										<br>
										<a href="https://awplife.com/wordpress-plugins/instagram-feed-gallery-premium/" target="_blank" class="button button-primary button-hero load-customize hide-if-no-customize"><?php esc_html_e( 'Premium Version Details', 'instagram-feed-gallery' ); ?></a>
										<a href="https://awplife.com/demo/instagram-feed-gallery-premium" target="_blank" class="button button-primary button-hero load-customize hide-if-no-customize"><?php esc_html_e( 'Check Live Demo', 'instagram-feed-gallery' ); ?></a>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-info igp_pannel_bottom ">
							<div class="row panel-body notice notice-info notice-alt">
								<div class="col-md-6 text-left">
									<h3 class="panel-title"><?php esc_html_e('Instagram Feed Gallery Premium', 'instagram-feed-gallery'); ?> <span style="display:inline;"><?php _e('Version', 'instagram-feed-gallery'); ?> - <?php echo esc_html(IFGP_PLUGIN_VER); ?><span></h3>
								</div>
								<div class="col-md-6 text-right">
									<div class="panel-heading">
										<button type="button" onclick="IgpGetShortcode();" class="igp_button btn-lg button_1"><?php esc_html_e('[ Generate Sortcode ]', 'instagram-feed-gallery'); ?></button>
									</div>
								</div>
							</div>
						</div>
						<div class="modal" id="modal-show-shortcode" tabindex="-1" role="dialog" aria-labelledby="modal-new-short-code-label">
							<div class="modal-dialog" role="document" id="inner-modal">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="modal-new-ticket-label"><?php esc_html_e('Instagram Feed Gallery Premium Shortcode', 'instagram-feed-gallery'); ?></h4>
									</div>
									<div class="modal-body text-center">
										<textarea id="awl-shortcode" readonly rows="13" cols="120" style="width: 100%; font-size: 15px;">
										</textarea>
										<div class="center-block text-center">
											<button type="button" class="igp_button button_1" data-toggle="tooltip" title="Copied" onclick="CopyShortcode()" ><i class="fa fa-copy" aria-hidden="true"></i> <?php esc_html_e('Copy Sortcode', 'instagram-feed-gallery'); ?></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
		<div class="col-md-2">
			<div class="postbox-container" style="margin-top:20px; margin-bottom:10px;">
				<div class="meta-box-sortables ui-sortable">
					<div class="postbox">
						<div class="postbox-header"><h2 class="hndle ui-sortable-handle" style="font-size: 16px; text-align: center;">Our Themes</h2>
						<div class="handle-actions hide-if-no-js"><button type="button" class="handle-order-higher" aria-disabled="false" aria-describedby="pfg-themes-handle-order-higher-description"></div></div><div class="inside" style="padding: 0 6px 0px; line-height: 1.4; font-size: 13px;">
						<a href="https://awplife.com/premium-wordpress-themes/" target="_new"><img src="<?php echo esc_url(IFGP_PLUGIN_URL.'/img/Premium-wordpress-themes.jpg'); ?>" width="250" height="280"></a>
						</div>
					</div>
				</div>
				<div class="postbox ">
					<h2 style="font-size: 16px; padding: 10px; border-bottom: 1px solid #c3c4c7;">Rate Our Plugin</h2>
					<div class="inside">
						<div style="text-align:center">
							<p>If you like our plugin then please <b>Rate us</b> on WordPress</p>
						</div>
						<div style="text-align:center">
							<span class="dashicons dashicons-star-filled"></span>
							<span class="dashicons dashicons-star-filled"></span>
							<span class="dashicons dashicons-star-filled"></span>
							<span class="dashicons dashicons-star-filled"></span>
							<span class="dashicons dashicons-star-filled"></span>
						</div>
						<br>
						<div style="text-align:center">
							<a href="https://wordpress.org/support/plugin/wp-instagram-feed-awplife/reviews/" target="_new" class="button button-primary button-large" style="background: #cd2757; border:none; text-shadow: none;"><span class="dashicons dashicons-heart" style="line-height:1.4;"></span> Please Rate Us</a>
						</div>	
					</div>
				</div>
			</div>	
		</div>
	</div>
<script>
jQuery(document).ready(function () {
	// tab
    jQuery("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        jQuery(this).siblings('a.active').removeClass("active");
        jQuery(this).addClass("active");
        var index = jQuery(this).index();
        jQuery("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        jQuery("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
	
	//range slider
	var rangeSlider = function(){
	  var slider = jQuery('.range-slider'),
		range = jQuery('.range-slider__range'),
		value = jQuery('.range-slider__value');
		
	  slider.each(function(){
		value.each(function(){
		  var value = jQuery(this).prev().attr('value');
		  jQuery(this).html(value);
		});

		range.on('input', function(){
		  jQuery(this).next(value).html(this.value);
		});
	  });
	};
	rangeSlider();
	});
	
	function IgpGetShortcode() {
		
		var shortcode = '[IFG';
		
		var instagram_acces_token = jQuery("#instagram_acces_token").val();
		if(instagram_acces_token){
			shortcode = shortcode + ' instagram_acces_token="' + instagram_acces_token + '"';
		} else {
			shortcode = shortcode + ' instagram_acces_token="' + '"';
		}
		
		var insta_layout = jQuery('[name=insta_layout]:checked').val();
		if(insta_layout){
			shortcode = shortcode + ' insta_layout="' + insta_layout + '"';
		} else {
			shortcode = shortcode + ' insta_layout="' + 'insta_layout_grid' + '"';
		}
		
		var insta_grid_columns_l = jQuery("#insta_grid_columns_l").val();
		if(insta_grid_columns_l){
			shortcode = shortcode + ' insta_grid_columns_l="' + insta_grid_columns_l + '"';
		} else {
			shortcode = shortcode + ' insta_grid_columns_l="' + '' + '"';
		}
		
		var insta_image_limit = jQuery("#insta_image_limit").val();
		if(insta_image_limit){
			shortcode = shortcode + ' insta_image_limit="' + insta_image_limit + '"';
		}
		var insta_image_spacing = jQuery("#insta_image_spacing").val();
		if(insta_image_spacing){
			shortcode = shortcode + ' insta_image_spacing="' + insta_image_spacing + '"';
		}
		
		var insta_icon_image = jQuery("#insta_icon_image").val();
		if(jQuery("#insta_icon_image").prop('checked') == true){
			shortcode = shortcode + ' insta_icon_image="' + insta_icon_image + '"';
		} else {
			shortcode = shortcode + '';
		}	
		
		
		var insta_caption_image = jQuery("#insta_caption_image").val();
		if(jQuery("#insta_caption_image").prop('checked') == true){
			shortcode = shortcode + ' insta_caption_image="' + insta_caption_image + '"';
		} else {
			shortcode = shortcode + '';
		}	
		
		var insta_link_redirection = jQuery("#insta_link_redirection").val();
		if(jQuery("#insta_link_redirection").prop('checked') == true){
			shortcode = shortcode + ' insta_link_redirection="' + insta_link_redirection + '"';
		} else {
			shortcode = shortcode + '';
		}
		
		var insta_lightbox = jQuery("#insta_lightbox").val();
		if(jQuery("#insta_lightbox").prop('checked') == true){
			shortcode = shortcode + ' insta_lightbox="' + insta_lightbox + '"';
		} else {
			shortcode = shortcode + '';
		}	
		var insta_lightbox_color = jQuery("#insta_lightbox_color").val();
		if(insta_lightbox_color){
			shortcode = shortcode + ' insta_lightbox_color="' + insta_lightbox_color + '"';
		} else {
			shortcode = shortcode + ' insta_lightbox_color="' + '' + '"';
		}
		shortcode = shortcode + ' ]';
		jQuery('#awl-shortcode').text(shortcode);
		jQuery('#modal-show-shortcode').modal('show');
	}
		
	//color-picker
	(function( jQuery ) {
		jQuery(function() {
			// Add Color Picker 
			jQuery('#insta_lightbox_color').wpColorPicker();
		});
	})( jQuery );
	
	function CopyShortcode() {
	var copyText = document.getElementById("awl-shortcode");
	copyText.select();
	document.execCommand("copy");
	}
</script>