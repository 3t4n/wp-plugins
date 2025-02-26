<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://flothemes.com
 * @since      1.0.0
 *
 * @package    Pictimewp
 * @subpackage Pictimewp/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Pictimewp
 * @subpackage Pictimewp/public
 * @author     Flothemes <alexg@flothemes.com>
 */
class Pictimewp_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		global $post;

		// include the scripts only when the shortcode or the Gutenberg block is used
		if ( has_shortcode( $post->post_content, 'flo_pictime') || has_block('flo-pt/gallery') || is_admin() ) {
			if(!wp_style_is( $this->plugin_name, 'enqueued' )){
				wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/pictimewp-public.css', array(), $this->version, 'all' );
				wp_enqueue_style( 'pt-fonts-icons', plugin_dir_url( __FILE__ ) . '../admin/assets/icons-fonts/style.css', array(), $this->version, 'all' );
			}
		}

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		global $post;

		// include the scripts only when the shortcode or the Gutenberg block is used or when we are in dashboard(we need them preloaded for the Gutenberg block)
		if ( has_shortcode( $post->post_content, 'flo_pictime') || has_block('flo-pt/gallery') || is_admin() ) {
			if(!wp_script_is( $this->plugin_name, 'enqueued' )){

				wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/pictimewp-public.min.js', array( 'jquery' ), $this->version, true );
			}
    }


	}

	/**
	 *
	 * Render the  shortcode
	 *
	 */
	public function flo_pictime_shortcode($atts) {

		if(isset($atts['id']) && is_numeric($atts['id'])){
			global $post;

			if(!wp_script_is( $this->plugin_name, 'enqueued' ) &&
					!has_shortcode( $post->post_content, 'flo_pictime') &&
					!has_block('flo-pt/gallery')){
					// normally we should meet these conditions when the shortcode is used outside the post content - i.e. in a custom meta box,
					// or in a widget


					wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/pictimewp-public.min.js', array( 'jquery' ), $this->version, true );
					wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/pictimewp-public.css', array(), $this->version, 'all' );
					wp_enqueue_style( 'pt-fonts-icons', plugin_dir_url( __FILE__ ) . '../admin/assets/icons-fonts/style.css', array(), $this->version, 'all' );

			}


			// get the Form's styling settings
			$pt_gal_settings = get_post_meta( (int)$atts['id'], 'pt_gallery_data', true ); // get the form settings

			//var_dump( json_decode($pt_gal_settings) );
			$gs = json_decode( html_entity_decode($pt_gal_settings));

			if(is_object($gs)) {


				if(is_object($gs->projectData)){

					// upon API changes, the baseUrl comes back without '/' at the end
    			// we need to check that and add if not present
					if(substr($gs->projectData->baseUrl, -1) != '/') {
						$gs->projectData->baseUrl .= '/';
					}
				}

				$selected_images = $gs->selectedImagesNoScene;
				$selected_view = $gs->selectedView;
				$gallery_grid_type_settings = $gs->galleryGridTypeSettings;
				$general_grid_settings = $gs->generalGridSettings;

				$gallery_id = (int)$atts['id'];

				$content = '';
				switch ($selected_view) {
					case 'pictime':
						$content = self::render_pictime_view($gs, $gallery_id);
						break;
					case 'stacked':
							$content = self::render_stack_view($gs);
						break;
					case 'grid':
							$content = self::render_grid_view($gs, $gallery_id);
						break;
					case 'slideshow':
							$content = self::render_slidehow_view($gs, $gallery_id);
						break;
					default:
						// code...
						break;
				}
				//var_dump($gs->selectedImagesNoScene);

				return $content;
			}

		}else{
			return __('The passed Gallery ID is not valid','pictimewp');
		}
	}

	public static function getNumericSpacing($gutter) {
    switch ($gutter) {
      //"normal", // spaced, thin_space
      case 'thin_space':
        return 3;
        break;
      case 'spaced':
        return 78;
        break;
      default: // normal
        return 16;
        break;
    }

  }

	public static function getImgProportions($img_id, $projectData) {

			foreach ($projectData->scenes as $scene_key => $scene) {
				foreach ($scene->photos as $img_key => $img) {
					if($img->photoId == $img_id) {
						return $img->prop;
					}
				}
			}

			return false;
	}
	/**
	 * Render the slideshow view
	 */
	public function render_slidehow_view($gs, $gallery_id) {
		$selected_images_data = self::get_selected_images_complete_data($gs);

		$selected_images = $gs->selectedImagesNoScene;

		$content = '';
		$projectData = $gs->projectData;

		$baseUrl = $projectData->baseUrl;
		$galleryGridTypeSettings = $gs->galleryGridTypeSettings;
		$slideshow_settings = $galleryGridTypeSettings->slideshow;

		if(!isset($slideshow_settings->images_height_desktop) ) {
			$slideshow_settings->images_height_desktop = 500;
		}

		if(!isset($slideshow_settings->images_height_mobile) ) {
			$slideshow_settings->images_height_mobile = 250;
		}

		$slider_style = $slideshow_settings->slider_style;

	 	$container_data = array(
			'data-loop="'.$slideshow_settings->loop.'"',
			'data-nav_style="'.$slideshow_settings->navigationStyle.'"',
			'data-slider_style="'.$slider_style.'"',
			'data-transition="'.$slideshow_settings->transition.'"',
			'data-gallery_id="'.$gallery_id.'"'
		);
		$container_data = implode(' ',$container_data);

		if(!isset($slideshow_settings->images_spacing)) {
			$slideshow_settings->images_spacing = '';
		}
		$container_classes = $slideshow_settings->navigationStyle.' g_'.$gallery_id.' spacing_'.$slideshow_settings->images_spacing.' '.$slider_style;

		$generalGridSettings = $gs->generalGridSettings;
		$content_padding_y = $generalGridSettings->content_padding_y;

		$slider_height_rem_desktop = $slideshow_settings->images_height_desktop / 16 . "rem; ";
		$slider_height_mobile = $slideshow_settings->images_height_mobile . "px; ";

		$style = ' --content_padding_y:'.$content_padding_y.'px; --img_height_desktop: '.$slider_height_rem_desktop.' --img_height_mobile: '.$slider_height_mobile;



		$counter = 0;
		$content .= '<div class="pt-slideshow--container" style="'.$style.'">';
			$content .= '<div class="pt-slideshow-view '.$container_classes.' " '.$container_data.' style="">';
			foreach ($selected_images as $img) {
				$filename = $img.'.jpg';
				if(isset($selected_images_data[$img])){
					$filename = $selected_images_data[$img]['filename'];
				}

				$img_prop = self::getImgProportions($img, $projectData);

				$seo = self::get_img_seo_tags($gs, $img);

				$content .= '<div class="photo-wrap" style="--img_prop:'.$img_prop.'">';
					if($counter < 5) {
						$content .= '<img class="selected-photo" src="'.$baseUrl.'lowres/'.$filename.'" '.$seo['alt'].' '.$seo['title'].' />';
					}else{
						if($slider_style == 'single_image') {
							// for this view we use custom lazy loading
							$data_lazy = 'lazysrc';
						}else{
							$data_lazy = 'lazy';
						}

						$content .= '<img class="selected-photo" data-'.$data_lazy.'="'.$baseUrl.'lowres/'.$filename.'" '.$seo['alt'].' '.$seo['title'].' />';
					}

				$content .= '</div>';
				$counter ++;
			}
			$content .= '</div>';

			if($slider_style == 'visible_nearby') {
				$l_arrow_class = 'pictime-icn_pt-arrow';
				$r_arrow_class = 'pictime-icn_pt-arrow';

				if($slideshow_settings->navigationStyle == 'circle_arrows') {
					$l_arrow_class = 'pictime-icn_arrow-with-circle-left';
					$r_arrow_class = 'pictime-icn_arrow-with-circle-right';
				}

				$content .= '<div class="pt-slider-nav '.$slider_style.' '.$slideshow_settings->navigationStyle.' pt_nav_'.$gallery_id.'">';
					$content .= '<span class="pt-slick-prev pic-time-icon '.$l_arrow_class.'"></span>';
					$content .= '<span class="pt-slick-next pic-time-icon '.$r_arrow_class.'"></span>';
				$content .= '</div>';
			}
		$content .= '</div>';


		return $content;
	}

	public function render_pictime_view($gs, $gallery_id) {

		$content = '';
		$projectData = $gs->projectData;

		$baseUrl = $projectData->baseUrl;
		$galleryGridTypeSettings = $gs->galleryGridTypeSettings;
		$pt_settings = $galleryGridTypeSettings->pictime;

		$grid_settings = self::getGridData($projectData->galleryGridType);

		// $gridSpacing = 'normal'; // update this hardcoded value
		// $nrColumns = 3;
		// $gridSpacingNumeric = 16;

		$gridSpacing = $grid_settings['gridSpacing'];
		$nrColumns = $grid_settings['nrColumns'];
		$gridSpacingNumeric = $grid_settings['gridSpacingNumeric'];

		$generalGridSettings = $gs->generalGridSettings;
		$content_padding_x = $generalGridSettings->content_padding_x;
		$content_padding_y = $generalGridSettings->content_padding_y;

		//"--items-padding": gutterNumeric / 2 + "px",
		$block_style="--items-padding: 0px; box-sizing: border-box; height: ".$pt_settings->containerHeight.';';
		$block_style .= ' --content_padding_x:'.$content_padding_x.'px; --content_padding_y:'.$content_padding_y.'px;';

		$content .= '<div class="grid-main-wrap pictime-view '.$gridSpacing.' g_'.$gallery_id.'"

											data-nrcolumns="'.$nrColumns.'"
											data-gutter="'.$gridSpacingNumeric.'"
											data-container_height="'.$pt_settings->containerHeight.'"
											data-container_width="'.$pt_settings->containerWidth.'"
											data-container_padding_x="'.$content_padding_x.'"
											data-gallery_id=".g_'.$gallery_id.'"
											style="'.$block_style.'"
										>';
    foreach ($pt_settings->clonedPhotos as $key => $img) {
			$img_width = 100 / $nrColumns;
			$img_resolution = 'smallres/';

			// the gifs do not get resized and we have to use the original size
			if(strpos($img->filename,'.gif') ){
				$img_resolution = 'lowres/';
			}

			if(isset($img->enlarged) && $img->enlarged) {
				$img_width = $img_width*2;
				$img_resolution = 'lowres/';
			}

			if(isset($img->prop)) {
				$imgHeight = ($img->prop * 100).'%';
			}else{
				$imgHeight = '';
			}

				$img_style = '--top: '.$img->top.'%; --left:'.$img->col*(100/$nrColumns).'%; --width: '.$img_width.'%; --height: '.$img->height.'%; --mobile-height:'.$imgHeight.'';

				$img_bg_style	= '--background-image: url('.$baseUrl.$img_resolution.$img->filename.'); ';

				$seo = self::get_img_seo_tags($gs, $img->photoId, $role='bg');

				$content .= '<div class="photo-wrap" style="'.$img_style.'" href="'.$baseUrl.'lowres/'.$img->filename.'" data-fancybox="pictime-gallery" >';
					$content .= '<div class="selected-photo-as-bg lazy" role="img" '.$seo['alt'].' '.$seo['title'].'  style="'.$img_bg_style.'">';
					$content .= '</div>';

				$content .= '</div>';



		}
    $content .= '</div>';

		return $content;
	}

	public static function getGridData($galleryGridType) {

			if($galleryGridType === null) {
				//use the default settings
				$galleryGridType = 99;
			}

      switch ($galleryGridType) {
				case 0: // use default - same as 2
          $gutter = "normal";
          $numberColumns = 4;
          break;
				case 2:
          $gutter = "normal";
          $numberColumns = 4;
          break;
        case 3:
          $gutter = "spaced";
        	$numberColumns = 4;
          break;
        case 4:
          $gutter = "thin_space";
          $numberColumns = 4;
          break;
        case 20:
          $gutter = "normal";
          $numberColumns = 6;
          break;
        case 21:
          $gutter = "thin_space";
          $numberColumns = 6;
          break;
        case 22:
          $gutter = "spaced";
          $numberColumns = 6;
          break;
        case 30:
          $gutter = "normal";
          $numberColumns = 3;
          break;
        case 31:
          $gutter = "thin_space";
          $numberColumns = 3;
          break;
        case 32:
          $gutter = "spaced";
          $numberColumns = 3;
          break;
				case 99:
					// use default settings:
          $pt_options = get_option('flo_pictime_options');
					if(isset($pt_options['account_integrations']) && isset($pt_options['account_integrations']['galleryType'])) {

						if($pt_options['account_integrations']['galleryType'] == 0) {
							$gutter = "normal";
		          $numberColumns = 4;
						}else {
							$gd = self::getGridData($pt_options['account_integrations']['galleryType']);
							if(isset($gd['gridSpacing'])){
								$gutter = $gd['gridSpacing'];
							}

							if(isset($gd['nrColumns'])){
								$numberColumns = $gd['nrColumns'];
							}
						}


					}
          break;
			}

      $gutterNumeric = self::getNumericSpacing($gutter);

    return array('gridSpacing' => $gutter, 'gridSpacingNumeric' => $gutterNumeric, 'nrColumns' =>  $numberColumns);
  }

	/**
	 *
	 * @param $gs - object -> gallery settings
	 * @param $img_id - int the id of the image we are trying to get its seo tags
	 *
	 * @return array - array('alt' => '','title' => '');
	 */
	public static function get_img_seo_tags($gs, $img_id, $role = 'img'){
		$seo = array(
			'alt' => 'alt=""',
			'title' => ''
		);
		if(isset($gs->selectedImagesSeo) && isset($gs->selectedImagesSeo->$img_id) ) {
			if( isset( $gs->selectedImagesSeo->$img_id->alt) && $gs->selectedImagesSeo->$img_id->alt !== '' ){
				if($role == 'bg') { // when the image is used as bg image
					$alt = 'aria-label=';
				}else{
					$alt = "alt=";
				}
				$seo['alt'] = $alt.'"'. $gs->selectedImagesSeo->$img_id->alt.'"';
			}
			if( isset( $gs->selectedImagesSeo->$img_id->title) && $gs->selectedImagesSeo->$img_id->title !== '' ){
				$seo['title'] = 'title="'. $gs->selectedImagesSeo->$img_id->title.'"';
			}

		}

		return $seo;
	}

	/**
	 *
	 * render grid view
	 * @param - array - the gallery settings
	 * @return - string
	 */
	public static function render_grid_view($gs, $gallery_id) {
		$selected_images_data = self::get_selected_images_complete_data($gs);

		$content = '';

		$projectData = $gs->projectData;
		$baseUrl = $projectData->baseUrl;
		$galleryGridTypeSettings = $gs->galleryGridTypeSettings;
		$grid_settings = $galleryGridTypeSettings->grid;
		$images = $grid_settings->positions;
		$nrColumns = $grid_settings->nrColumns;
		$gridSpacingNumeric =  self::getNumericSpacing($grid_settings->gridSpacing);

		$generalGridSettings = $gs->generalGridSettings;
		$content_padding_x = $generalGridSettings->content_padding_x;
		$content_padding_y = $generalGridSettings->content_padding_y;

		$style = '--content_padding_x:'.$content_padding_x.'px; --content_padding_y:'.$content_padding_y.'px;';

		// artificially remove 0.5 px at the end to avoind layout issues on some screens
		$imgWidth = 'calc(100% / '.$nrColumns.' - '.$gridSpacingNumeric * ($nrColumns - 1)/$nrColumns.'px - 0.5px)';
		$imgWidth = 'calc( (100% - '.($content_padding_x*2).'px) / '.$nrColumns.' - '.$gridSpacingNumeric * ($nrColumns - 1)/$nrColumns.'px - 0.5px)';
		$imgWidthMobile = 'calc(50% - 2px - 0.5px)';


		$content .= '<div class="packery-main-wrap g_'.$gallery_id.' '.$grid_settings->gridSpacing.'"
											data-gallery_id=".g_'.$gallery_id.'"
											data-nrcolumns="'.$nrColumns.'"
											data-positions=\''.json_encode($images).'\'
											data-gutter="'.$gridSpacingNumeric.'"
											style="'.$style.'"
										>';

			foreach ($images as $key => $img) {
				if(isset($img->prop)) {
					$imgHeight = ($img->prop * 100).'%';
				}else{
					$imgHeight = '';
				}

				$filename = $img->id.'.jpg';
				if(isset($selected_images_data[$img->id])){
					$filename = $selected_images_data[$img->id]['filename'];
				}

				$seo = self::get_img_seo_tags($gs, $img->id);

				$content .= '	<div href="'.$baseUrl.'lowres/'.$filename.'" class="packery-photo-wrap" data-id="'.$img->id.'" style="--img-width:'.$imgWidth.'; --img-width_mobile:'.$imgWidthMobile.'; --img-height:'.$imgHeight.'" data-fancybox="grid-gallery" >';

				$data_srcset = $baseUrl.'smallres/'.$filename.' 650w, '.$baseUrl.'lowres/'.$filename.' 1600w';
					$content .= '<div class="packery-photo-wrap--inner">';
						$content .= '<img src="'.$baseUrl.'thumbres/'.$filename.'" width="100%"
									data-src="'.$baseUrl.'lowres/'.$filename.'"
									data-srcset="'.$data_srcset.'"
									sizes="(max-width: 650px) 100vw, 1600px"
									class=" flo-lazyload lazyload"
									'.$seo['alt'].' '.$seo['title'].'
										/>';

					$content .= '	</div>';
				$content .= '	</div>';
			}

		$content .= '</div>';

		return $content;
	}

	/**
	 *
	 * render stack view
	 * @param - array - the gallery settings
	 * @return - string
	 */
	public static function render_stack_view($gs) {
		$selected_images_data = self::get_selected_images_complete_data($gs);

		$selected_images = $gs->selectedImagesNoScene;
		$projectData = $gs->projectData;
		$baseUrl = $projectData->baseUrl;

		$galleryGridTypeSettings = $gs->galleryGridTypeSettings;

		$grid_settings = $galleryGridTypeSettings->stacked;
		$grid_spacing = $grid_settings->gridSpacing;

		$generalGridSettings = $gs->generalGridSettings;
		$content_padding_x = $generalGridSettings->content_padding_x;
		$content_padding_y = $generalGridSettings->content_padding_y;

		$style = '--content_padding_x:'.$content_padding_x.'px; --content_padding_y:'.$content_padding_y.'px;';

		$content = '';
		$content .= '<div class="pt-preview-container stack-view '.$grid_spacing.'" style="'.$style.'">';

		foreach ($selected_images as $img) {

			$seo = self::get_img_seo_tags($gs, $img);
			$filename = $img.'.jpg';
			if(isset($selected_images_data[$img])){
				$filename = $selected_images_data[$img]['filename'];
			}

			$content .= '<a class="photo-wrap" rel="nofollow" href="'.$baseUrl.'lowres/'.$filename.'" data-fancybox="stack-gallery">';
				$data_srcset = $baseUrl.'smallres/'.$filename.' 650w, '.$baseUrl.'lowres/'.$filename.' 1600w';
				$content .= '<img src="'.$baseUrl.'thumbres/'.$filename.'" width="100%"
							data-src="'.$baseUrl.'lowres/'.$filename.'"
							data-srcset="'.$data_srcset.'"
							sizes="(max-width: 650px) 100vw, 1600px"
							class="attachment-medium size-medium flo-lazyload lazyload"
							'.$seo['alt'].' '.$seo['title'].'
								/>';
			$content .= '</a>';
		}
		$content .= '</div>';
		return $content;
	}

	/**
	 *
	 * get the selected images complete data
	 * @param - object $gs -> the gallery settings
	 * @return - array
	 */
	public static function get_selected_images_complete_data($gs){
		$selected_images = $gs->selectedImagesNoScene;
		$projectData = $gs->projectData;

		$selected_images_complete_data = array();
		//iterate through $projectData scenes and images, and if the current image is available in the @$selected_images,
		// then we add it to $selected_images_complete_data

		if(isset($projectData->scenes)){
			foreach ($projectData->scenes as $scene_key => $scene) {
				if(isset($scene->photos)){
					foreach ($scene->photos as $photo) {
						if(in_array($photo->photoId, $selected_images)){
							$selected_images_complete_data[$photo->photoId] = array(
								'photoId' => $photo->photoId,
								'filename' => $photo->filename,
								'prop' => $photo->prop,
							);
						}
					}
				}

			}
		}

		return $selected_images_complete_data;
	}

}
