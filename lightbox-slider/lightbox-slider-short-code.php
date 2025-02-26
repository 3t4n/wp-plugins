<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Lightbox Slider Shortcode
 */

add_shortcode( 'LBS', 'light_box_slider_short_code' );
function light_box_slider_short_code($Id) {
	ob_start();
	if(!isset($Id['id'])) {
	$Id['id'] = "";
	}
	else{
		$lbs_id = $Id['id'];
	}
    /**
     * Load Lightbox Slider Settings
     */
    $LBS_Settings  = unserialize( get_option("WL_LBS_Settings") );
    if(count($LBS_Settings)) {
        $LBS_Hover_Animation     = $LBS_Settings['LBS_Hover_Animation'];
        $LBS_Gallery_Layout      = $LBS_Settings['LBS_Gallery_Layout'];
        $LBS_Hover_Color         = $LBS_Settings['LBS_Hover_Color'];
        $LBS_Hover_Color_Opacity = 1;
        $LBS_Font_Style          = $LBS_Settings['LBS_Font_Style'];
        $LBS_Image_View_Icon     = $LBS_Settings['LBS_Image_View_Icon'];
		$LBS_Gallery_Title       = $LBS_Settings['LBS_Gallery_Title'];
		$wl_custom_css      	 = $LBS_Settings['wl_custom_css'];

    } else {
		$LBS_Hover_Color_Opacity = 1;
		$LBS_Hover_Animation     = "flow";
        $LBS_Gallery_Layout      = "col-md-6";
        $LBS_Hover_Color         = "#000";
        $LBS_Font_Style          = "Arial";
        $LBS_Image_View_Icon     = "far fa-image";
		$LBS_Gallery_Title 		 = "yes";
		$wl_custom_css          = "";
    }
	if(!function_exists('lbs_hex2rgb')) {
		function lbs_hex2rgb($hex) {
		   $hex = str_replace("#", "", $hex);

		   if(strlen($hex) == 3) {
			  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
			  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
			  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
		   } else {
			  $r = hexdec(substr($hex,0,2));
			  $g = hexdec(substr($hex,2,2));
			  $b = hexdec(substr($hex,4,2));
		   }
		   $rgb = array($r, $g, $b);

		   return $rgb; // returns an array with the rgb values
		}
	}
    $RGB = lbs_hex2rgb($LBS_Hover_Color);
  
    $HoverColorRGB = implode(", ", $RGB);
    ?>
    <style>
    .b-link-fade .b-wrapper, .b-link-fade .b-top-line{
        background: rgba(<?php echo esc_attr($HoverColorRGB); ?>, <?php echo esc_attr($LBS_Hover_Color_Opacity); ?>) !important;
    }
    .b-link-flow .b-wrapper, .b-link-flow .b-top-line{
        background: rgba(<?php echo esc_attr($HoverColorRGB); ?>, <?php echo esc_attr($LBS_Hover_Color_Opacity); ?>) !important;
    }
    .b-link-stroke .b-top-line{
        background: rgba(<?php echo esc_attr($HoverColorRGB); ?>, <?php echo esc_attr($LBS_Hover_Color_Opacity); ?>) !important;
    }
    .b-link-stroke .b-bottom-line{
        background: rgba(<?php echo esc_attr($HoverColorRGB); ?>, <?php echo esc_attr($LBS_Hover_Color_Opacity); ?>) !important;
    }
    .b-link-box .b-top-line{
        border: 16px solid rgba(<?php echo esc_attr($HoverColorRGB); ?>, <?php echo esc_attr($LBS_Hover_Color_Opacity); ?>) !important;
    }
    .b-link-box .b-bottom-line{
        background: rgba(<?php echo esc_attr($HoverColorRGB); ?>, <?php echo esc_attr($LBS_Hover_Color_Opacity); ?>) !important;
    }
    .b-link-stripe .b-line{
        background: rgba(<?php echo esc_attr($HoverColorRGB); ?>, <?php echo esc_attr($LBS_Hover_Color_Opacity); ?>) !important;
    }
    .b-link-apart-horisontal .b-top-line, .b-link-apart-horisontal .b-top-line-up{
        background: rgba(<?php echo esc_attr($HoverColorRGB); ?>, <?php echo esc_attr($LBS_Hover_Color_Opacity); ?>) !important;
    }
    .b-link-apart-horisontal .b-bottom-line, .b-link-apart-horisontal .b-bottom-line-up{
        background: rgba(<?php echo esc_attr($HoverColorRGB); ?>, <?php echo esc_attr($LBS_Hover_Color_Opacity); ?>) !important;
    }
    .b-link-apart-vertical .b-top-line, .b-link-apart-vertical .b-top-line-up{
        background: rgba(<?php echo esc_attr($HoverColorRGB); ?>, <?php echo esc_attr($LBS_Hover_Color_Opacity); ?>) !important;
    }
    .b-link-apart-vertical .b-bottom-line, .b-link-apart-vertical .b-bottom-line-up{
        background: rgba(<?php echo esc_attr($HoverColorRGB); ?>, <?php echo esc_attr($LBS_Hover_Color_Opacity); ?>) !important;
    }
    .b-link-diagonal .b-line{
        background: rgba(<?php echo esc_attr($HoverColorRGB); ?>, <?php echo esc_attr($LBS_Hover_Color_Opacity); ?>) !important;
    }
    .b-wrapper{
        font-family:<?php echo str_ireplace("+", " ", $LBS_Font_Style); ?>; // real name pass here
    }
	.enigma_home_portfolio_caption h3{
		font-family:<?php echo str_ireplace("+", " ", $LBS_Font_Style); ?>; // real name pass here
	}
	.gal-container .row {
		margin-right: 0;
		margin-left: 0;
	}
	.gal_head_style{
		font-weight: bolder;
		padding-bottom:20px;
		border-bottom:2px solid #f2f2f2;
		text-align:center ;
		margin-bottom: 20px;
		font-size:16px;
		font-family:<?php echo esc_attr($LBS_Font_Style); ?>;
	}
	.fnf{
		background-color: #ff000091;
		border-radius: 5px;
		color: #fff;
		font-family: initial;
		text-align: center;
		padding:4px;
	}
	<?php echo esc_attr($wl_custom_css); ?>
    </style>

    <?php
    /**
     * Load All Image Gallery Custom Post Type
     */
    $IG_CPT_Name = "lightbox-slider";
    $IG_Taxonomy_Name = "category";
	$all_posts = wp_count_posts( 'lightbox-slider')->publish;
    $AllGalleries = array( 'p' => $Id['id'], 'post_type' => $IG_CPT_Name, 'orderby' => 'ASC','posts_per_page' =>$all_posts);
    $loop = new WP_Query( $AllGalleries );
    ?>
    <div id="gallery1" class="gal-container">
		<?php while ( $loop->have_posts() ) : $loop->the_post();?>
			<!--get the post id-->
			<?php $post_id = get_the_ID(); ?>
			<div id="<?php echo get_the_title($post_id); ?>" style="display: block; overflow:hidden; padding-bottom:20px;">
					<?php if($LBS_Gallery_Title==""){ $LBS_Gallery_Title == "yes"; } if($LBS_Gallery_Title == "yes") { ?>
				<!-- lbs gallery title-->
				<div class="gal_head_style">
					<?php echo esc_attr( get_the_title($post_id) ); ?>
				</div>
				<?php } ?>
				<!--lbs gallery photos-->
				<div>
					<div class="row">
					<?php
						/**
						 * Get All Photos from Gallery Post Meta
						 */
						$lbs_all_photos_details = unserialize(get_post_meta( get_the_ID(), 'lbs_all_photos_details', true));
						$TotalImages =  get_post_meta( get_the_ID(), 'lbs_total_images_count', true );
						$i = 1;
						count($lbs_all_photos_details);
						if(is_array($lbs_all_photos_details)){
							foreach($lbs_all_photos_details as $lbs_single_photos_detail) {
								 $name = $lbs_single_photos_detail['lbs_image_label'];
							     $url = $lbs_single_photos_detail['lbs_image_url'];
								 if($name == "") {
										// if slide title blank then
										global $wpdb;
										$post_table_prefix = $wpdb->prefix. "posts";
										if($attachment = $wpdb->get_col($wpdb->prepare("SELECT `post_title` FROM `$post_table_prefix` WHERE `guid` LIKE '%s'", $url))) { 
											// attachment title as alt
											$slide_alt = $attachment[0];
											if(empty($attachment[0])) {
												// post title as alt
												$slide_alt = get_the_title( $post_id );
											}
										}
										if(empty($attachment[0])) {
											// post title as alt
											$slide_alt = get_the_title( $post_id );
										} 								
									} else {
										// slide title as alt
										$slide_alt = $name;
									}
								
								?>
								<div class="<?php echo esc_attr($LBS_Gallery_Layout); ?>  wl-gallery" >
									<div style="box-shadow: 0 0 6px rgba(0,0,0,.7);">
										<div class="b-link-<?php echo esc_attr($LBS_Hover_Animation); ?> b-animate-go">
											<img src="<?php echo esc_url($url); ?>" class="gall-img-responsive" alt="<?php echo esc_attr($slide_alt);?>">
											<div class="b-wrapper">
												<p class="b-scale b-animate b-delay03">
													<a href="<?php echo esc_url( $url ); ?>" data-lightbox="image" title="<?php echo esc_attr( $name ); ?>" class="hover_thumb">
														<i class="fas <?php echo esc_attr($LBS_Image_View_Icon) ; ?> fa-4x"></i>
													</a>
												</p>
											</div>
										</div>
										<?php if($name) { ?>
											<div class="enigma_home_portfolio_caption">
												<h3><?php echo esc_attr( $name ); ?></h3>
											</div>
										<?php } ?>		
									</div>
								</div>
								<?php if($LBS_Gallery_Layout=="col-md-4") {
									 if($i%3==0) { ?>
										</div>
										<div class="row">
										<?php
									}
								} else {
									if($i%2==0){ ?>
										</div>
										<div class="row">
										<?php
									}
								}
								$i++;
							}//end of foreach
						}//end of is_array	
						if($TotalImages==0){ ?><div class="fnf"><?php esc_html_e("No Photo Found In Photo Gallery.", WEBLIZAR_LBS_TEXT_DOMAIN); ?></div><?php }
					?>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
    </div>
    <?php wp_reset_query(); ?>
    <?php
	return ob_get_clean();
}
?>