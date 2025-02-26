<?php
/**
* Plugin Name: Add Video After product Gallery
* Plugin URI: https://wordpress.org/plugins/add-video-after-product-gallery
* Description: Add Video After product Gallery Woocommerce Single Product Page
* Version: 1.1
* Author: Rounak Kumar
* Author URI: https://learn-wordpress-by-rk.blogspot.com/
**/
add_filter('woocommerce_product_data_tabs', 'avapg_rk_custom_video_options_function', 999, 1);
function avapg_rk_custom_video_options_function($tabs) {
	$tabs['avapg_rk_custom_video_options'] = [
		'label'		=> __( 'Video Options', 'avapg-rk-fields-for-woocommerce' ),
		'target'	=> 'avapg_rk_custom_video_options',
	];
	return $tabs;
}
add_action('woocommerce_product_data_panels', 'avapg_rk_custom_video_options_data');
function avapg_rk_custom_video_options_data(){
	echo '<div id="avapg_rk_custom_video_options" class="panel woocommerce_options_panel">';
		$video_type = get_post_meta( get_the_ID(), '_avapg_rk_custom_video_type', true );
		$avapg_rk_custom_video_width_desk = get_post_meta( get_the_ID(), '_avapg_rk_custom_video_width_desk', true );
		$_avapg_rk_custom_video_height_desk = get_post_meta( get_the_ID(), '_avapg_rk_custom_video_height_desk', true );
		$_avapg_rk_custom_video_width_mob = get_post_meta( get_the_ID(), '_avapg_rk_custom_video_width_mob', true );
		$_avapg_rk_custom_video_height_mob = get_post_meta( get_the_ID(), '_avapg_rk_custom_video_height_mob', true );
		$_avapg_rk_custom_video_mobile_break = get_post_meta( get_the_ID(), '_avapg_rk_custom_video_mobile_break', true );
	?>
	<p class="form-field _avapg_rk_custom_video_field_field ">
		<label for="_avapg_rk_custom_video_type">Video Type</label>
		<select class="short" style="" name="_avapg_rk_custom_video_type" id="_avapg_rk_custom_video_type">
			<option value="1" <?php if($video_type == 1){ echo 'selected'; } ?>>Full Video URL</option>
			<option value="2" <?php if($video_type == 2){ echo 'selected'; } ?>>Youtube Embed Video URL</option>
		</select>
		<span style="display: inline-block;line-height: 20px;margin-top: 10px;"><b>For Full Video URL:</b> Upload your video to wordpress media then copy Video URl and Paste in Video Url field below.<br>
			<b>For Youtube Embed Video URL:</b> Go to youtube > click on your video	> click on share > Click on embed then copy "src" value(looks like https://www.youtube.com/embed/video-id) from the code and Paste in Video Url field below.
		</span>
	</p>
	<?php
	woocommerce_wp_text_input(
        array(
            'id' => '_avapg_rk_custom_video_field',
            'placeholder' => 'Video Url',
            'label' => __('Video Url', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_avapg_rk_custom_video_thumbnail_field',
            'placeholder' => 'Video thumbnail Url (Only for Full Video URL Option)',
            'label' => __('Video thumbnail Url', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_avapg_rk_custom_video_label',
            'placeholder' => 'Watch Video',
            'label' => __('Video Label', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	?>
	
	<p class="form-field _avapg_rk_custom_video_field_field ">
		<label for="_avapg_rk_custom_video_width_desk">Video Width</label>
		<select class="width_height_sel" style="" name="_avapg_rk_custom_video_width_desk" id="_avapg_rk_custom_video_width_desk" style="width: 100px;float: unset;">
			<option value="100px" <?php if($avapg_rk_custom_video_width_desk == '100px'){ echo 'selected'; } ?>>100px</option>
			<option value="200px" <?php if($avapg_rk_custom_video_width_desk == '200px'){ echo 'selected'; } ?>>200px</option>
			<option value="300px" <?php if($avapg_rk_custom_video_width_desk == '300px'){ echo 'selected'; } ?>>300px</option>
			<option value="400px" <?php if($avapg_rk_custom_video_width_desk == '400px'){ echo 'selected'; } ?>>400px</option>
			<option value="500px" <?php if($avapg_rk_custom_video_width_desk == '500px' || empty($avapg_rk_custom_video_width_desk)){ echo 'selected'; } ?>>500px</option>
			<option value="100%"  <?php if($avapg_rk_custom_video_width_desk == '100%'){ echo 'selected'; } ?>>100%</option>
		</select>
		<span style="margin-right: 36px;">(Desktop)</span>		

		<select class="width_height_sel" style="" name="_avapg_rk_custom_video_width_mob" id="_avapg_rk_custom_video_width_mob" style="width: 100px;float: unset;">
			<option value="100px" <?php if($_avapg_rk_custom_video_width_mob == '100px'){ echo 'selected'; } ?>>100px</option>
			<option value="200px" <?php if($_avapg_rk_custom_video_width_mob == '200px'){ echo 'selected'; } ?>>200px</option>
			<option value="300px" <?php if($_avapg_rk_custom_video_width_mob == '300px'){ echo 'selected'; } ?>>300px</option>
			<option value="400px" <?php if($_avapg_rk_custom_video_width_mob == '400px'){ echo 'selected'; } ?>>400px</option>
			<option value="500px" <?php if($_avapg_rk_custom_video_width_mob == '500px'){ echo 'selected'; } ?>>500px</option>
			<option value="100%"  <?php if($_avapg_rk_custom_video_width_mob == '100%' || empty($_avapg_rk_custom_video_width_mob)){ echo 'selected'; } ?>>100%</option>
		</select>
		<span>(Mobile)</span>		
	</p>
	
	<p class="form-field _avapg_rk_custom_video_field_field ">
		<label for="_avapg_rk_custom_video_height_desk">Video Height</label>
		<select class="width_height_sel" style="" name="_avapg_rk_custom_video_height_desk" id="_avapg_rk_custom_video_height_desk"  style="width: 100px;float: unset;">
			<option value="100px" <?php if($_avapg_rk_custom_video_height_desk == '100px'){ echo 'selected'; } ?>>100px</option>
			<option value="200px" <?php if($_avapg_rk_custom_video_height_desk == '200px'){ echo 'selected'; } ?>>200px</option>
			<option value="300px" <?php if($_avapg_rk_custom_video_height_desk == '300px' || empty($_avapg_rk_custom_video_height_desk)){ echo 'selected'; } ?>>300px</option>
			<option value="400px" <?php if($_avapg_rk_custom_video_height_desk == '400px'){ echo 'selected'; } ?>>400px</option>
			<option value="500px" <?php if($_avapg_rk_custom_video_height_desk == '500px'){ echo 'selected'; } ?>>500px</option>
			<option value="auto"  <?php if($_avapg_rk_custom_video_height_desk == 'auto'){ echo 'selected'; } ?>>auto</option>
		</select>
		
		<span style="margin-right: 36px;">(Desktop)</span>		

		<select class="width_height_sel" style="" name="_avapg_rk_custom_video_height_mob" id="_avapg_rk_custom_video_height_mob" style="width: 100px;float: unset;">
			<option value="100px" <?php if($_avapg_rk_custom_video_height_mob == '100px'){ echo 'selected'; } ?>>100px</option>
			<option value="200px" <?php if($_avapg_rk_custom_video_height_mob == '200px'){ echo 'selected'; } ?>>200px</option>
			<option value="300px" <?php if($_avapg_rk_custom_video_height_mob == '300px'){ echo 'selected'; } ?>>300px</option>
			<option value="400px" <?php if($_avapg_rk_custom_video_height_mob == '400px'){ echo 'selected'; } ?>>400px</option>
			<option value="500px" <?php if($_avapg_rk_custom_video_height_mob == '500px'){ echo 'selected'; } ?>>500px</option>
			<option value="auto"  <?php if($_avapg_rk_custom_video_height_mob == 'auto' || empty($_avapg_rk_custom_video_height_mob)){ echo 'selected'; } ?>>auto</option>
		</select>
		<span>(Mobile)</span>
	</p>
	<p class="form-field _avapg_rk_custom_video_field_field ">
		<label for="_avapg_rk_custom_video_mobile_break">Mobile Width Break Point</label>
		<select class="short" style="" name="_avapg_rk_custom_video_mobile_break" id="_avapg_rk_custom_video_mobile_break">
			<option value="320px" <?php if($_avapg_rk_custom_video_mobile_break == '320px'){ echo 'selected'; } ?>>320px</option>
			<option value="375px" <?php if($_avapg_rk_custom_video_mobile_break == '375px'){ echo 'selected'; } ?>>375px</option>
			<option value="425px" <?php if($_avapg_rk_custom_video_mobile_break == '425px'){ echo 'selected'; } ?>>425px</option>
			<option value="600px" <?php if($_avapg_rk_custom_video_mobile_break == '600px'){ echo 'selected'; } ?>>600px</option>
			<option value="768px" <?php if($_avapg_rk_custom_video_mobile_break == '768px' || empty($_avapg_rk_custom_video_mobile_break)){ echo 'selected'; } ?>>768px</option>
			<option value="1024px" <?php if($_avapg_rk_custom_video_mobile_break == '1024px'){ echo 'selected'; } ?>>1024px</option>
		</select>
	</p>
	<style>
	.width_height_sel{
		width: 100px;
		float: unset !important;
	}
	</style>
	<?php
	echo '</div>';
}

add_action('woocommerce_process_product_meta', 'avapg_rk_woocommerce_product_custom_fields_save');
function avapg_rk_woocommerce_product_custom_fields_save($post_id){
	$woocommerce_avapg_rk_custom_video_thumbnail_field = sanitize_url($_POST['_avapg_rk_custom_video_thumbnail_field']);
	if( !empty( $woocommerce_avapg_rk_custom_video_thumbnail_field ) )
		update_post_meta( $post_id, '_avapg_rk_custom_video_thumbnail_field', esc_attr( $woocommerce_avapg_rk_custom_video_thumbnail_field ) );
	
	$woocommerce_avapg_rk_custom_video_field = sanitize_url($_POST['_avapg_rk_custom_video_field']);
	if( !empty( $woocommerce_avapg_rk_custom_video_field ) )
		update_post_meta( $post_id, '_avapg_rk_custom_video_field', esc_attr( $woocommerce_avapg_rk_custom_video_field ) );
	
	$woocommerce_avapg_rk_custom_video_type = sanitize_text_field($_POST['_avapg_rk_custom_video_type']);
	if( !empty( $woocommerce_avapg_rk_custom_video_type ) )
		update_post_meta( $post_id, '_avapg_rk_custom_video_type', esc_attr( $woocommerce_avapg_rk_custom_video_type ) );
	
	$woocommerce_avapg_rk_custom_video_label = sanitize_text_field($_POST['_avapg_rk_custom_video_label']);
	if( !empty( $woocommerce_avapg_rk_custom_video_label ) )
		update_post_meta( $post_id, '_avapg_rk_custom_video_label', esc_attr( $woocommerce_avapg_rk_custom_video_label ) );
	
	$woocommerce_avapg_rk_custom_video_width_desk = sanitize_text_field($_POST['_avapg_rk_custom_video_width_desk']);
	if( !empty( $woocommerce_avapg_rk_custom_video_width_desk ) )
		update_post_meta( $post_id, '_avapg_rk_custom_video_width_desk', esc_attr( $woocommerce_avapg_rk_custom_video_width_desk ) );
	
	$woocommerce_avapg_rk_custom_video_height_desk = sanitize_text_field($_POST['_avapg_rk_custom_video_height_desk']);
	if( !empty( $woocommerce_avapg_rk_custom_video_height_desk ) )
		update_post_meta( $post_id, '_avapg_rk_custom_video_height_desk', esc_attr( $woocommerce_avapg_rk_custom_video_height_desk ) );
	
	$woocommerce_avapg_rk_custom_video_width_mob = sanitize_text_field($_POST['_avapg_rk_custom_video_width_mob']);
	if( !empty( $woocommerce_avapg_rk_custom_video_width_mob ) )
		update_post_meta( $post_id, '_avapg_rk_custom_video_width_mob', esc_attr( $woocommerce_avapg_rk_custom_video_width_mob ) );
	
	$woocommerce_avapg_rk_custom_video_height_mob = sanitize_text_field($_POST['_avapg_rk_custom_video_height_mob']);
	if( !empty( $woocommerce_avapg_rk_custom_video_height_mob ) )
		update_post_meta( $post_id, '_avapg_rk_custom_video_height_mob', esc_attr( $woocommerce_avapg_rk_custom_video_height_mob ) );
	
	$woocommerce_avapg_rk_custom_video_mobile_break = sanitize_text_field($_POST['_avapg_rk_custom_video_mobile_break']);
	if( !empty( $woocommerce_avapg_rk_custom_video_mobile_break ) )
		update_post_meta( $post_id, '_avapg_rk_custom_video_mobile_break', esc_attr( $woocommerce_avapg_rk_custom_video_mobile_break ) );
}

add_action('woocommerce_after_single_product_summary', 'avapg_rk_add_product_video');
function avapg_rk_add_product_video(){
	$video_url = get_post_meta( get_the_ID(), '_avapg_rk_custom_video_field', true );
	$video_thumb_url = get_post_meta( get_the_ID(), '_avapg_rk_custom_video_thumbnail_field', true );
	$video_type = get_post_meta( get_the_ID(), '_avapg_rk_custom_video_type', true );
	$video_label = get_post_meta( get_the_ID(), '_avapg_rk_custom_video_label', true );
	$_avapg_rk_custom_video_width_desk = get_post_meta( get_the_ID(), '_avapg_rk_custom_video_width_desk', true );
	$_avapg_rk_custom_video_height_desk = get_post_meta( get_the_ID(), '_avapg_rk_custom_video_height_desk', true );
	$_avapg_rk_custom_video_width_mob = get_post_meta( get_the_ID(), '_avapg_rk_custom_video_width_mob', true );
	$_avapg_rk_custom_video_height_mob = get_post_meta( get_the_ID(), '_avapg_rk_custom_video_height_mob', true );
	$_avapg_rk_custom_video_mobile_break = get_post_meta( get_the_ID(), '_avapg_rk_custom_video_mobile_break', true );
	if(!empty($video_url)){
	?>
		<div data-thumb="<?php echo esc_url($video_thumb_url); ?>" class="_avapg_rk_product_image_wrap _avapg_rk_change_modal_image">
			<p><?php if($video_label){ echo $video_label; }else{ echo 'Watch Video'; } ?></p>
			<?php if($video_type == 1){ ?>
			<video controls  controlsList="nodownload" muted="" loop="" src="<?php echo esc_url($video_url); ?>?_=0" <?php if(!empty($video_thumb_url)){ ?>poster="<?php echo esc_url($video_thumb_url); ?>"<?php } ?>>
					<source type="video/mp4" src="<?php echo esc_url($video_url); ?>?_=0">
			</video>
			<?php } ?>
			<?php if($video_type == 2){ ?>
				<iframe src="<?php echo esc_url($video_url); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
			<?php } ?>
		</div>
		<style>
		._avapg_rk_product_image_wrap._avapg_rk_change_modal_image {
			margin-bottom: 30px;
		}
		._avapg_rk_product_image_wrap._avapg_rk_change_modal_image p {
			font-size: 22px;
			margin-bottom: 10px;
		}
		._avapg_rk_product_image_wrap._avapg_rk_change_modal_image {
			width: 100%;
			float: left;
		}
		._avapg_rk_product_image_wrap video,
		._avapg_rk_product_image_wrap iframe{
			height:<?php if($_avapg_rk_custom_video_height_desk){ echo $_avapg_rk_custom_video_height_desk; }else{ echo '300px'; } ?>;
			width:<?php if($_avapg_rk_custom_video_width_desk){ echo $_avapg_rk_custom_video_width_desk; }else{ echo '500px'; } ?>;
		}
		@media only screen and (max-width: <?php if($_avapg_rk_custom_video_mobile_break){ echo $_avapg_rk_custom_video_mobile_break; }else{ echo '768px'; } ?>) {
			._avapg_rk_product_image_wrap video,
			._avapg_rk_product_image_wrap iframe{
				height:<?php if($_avapg_rk_custom_video_height_mob){ echo $_avapg_rk_custom_video_height_mob; }else{ echo 'auto'; } ?>;
				width:<?php if($_avapg_rk_custom_video_width_mob){ echo $_avapg_rk_custom_video_width_mob; }else{ echo '100%'; } ?>;
			}
		}
		</style>
	<?php
	}
}
?>