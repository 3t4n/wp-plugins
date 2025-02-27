<?php
if (!defined('ABSPATH')){
	exit; // Exit if accessed directly
}

final class MultipleLocationGoogleMapShortCode{
	public function __construct() {
     add_shortcode('MLGM', array($this, 'MlgmShortCode'));
	 add_action('wp_head', array($this, 'MlgmCss'));	
	 add_filter('the_content', array($this, 'MlgmDisplayOnPage'));
	}


function MlgmCss()
{
	$styleSettings=get_option('mlgm_style_settings');
	$generalSettings=get_option('mlgm_general_settings');
?>

<style type="text/css">
.axgmap{
	width: <?php if($generalSettings['mlgm_map_width']){echo $generalSettings['mlgm_map_width'];}else {echo 740;} ?>px;
	height: <?php if($generalSettings['mlgm_map_height']){echo $generalSettings['mlgm_map_height'];}else {echo 360;} ?>px;
	border: solid 1px <?php if($styleSettings['mlgm_map_border']){echo $styleSettings['mlgm_map_border'];}else {echo '#ccc';} ?>;
}
</style>
	
<?php }
	
function mlgm_geometry_location($location)
{
    $url = 'http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode( $location ).'&sensor=false';
    if ( extension_loaded( "curl" ) && function_exists( "curl_init" ) ) {
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_URL, $url ) ;
        $result = curl_exec( $ch );
        curl_close( $ch );
    } else {
        $result = file_get_contents( $url );
    }
     
    $api_data = json_decode( $result, true );
    $res=$api_data['results'][0]['geometry']['location']['lat'].', '.$api_data['results'][0]['geometry']['location']['lng'];
	return $res;
	
}

	function MlgmShortCode(){
      ob_start();
	  wp_enqueue_script('mlgm_maps_api', 'https://maps.google.com/maps/api/js?sensor=false', array('jquery'), '', true);
      wp_enqueue_script('jquery_axgmap_js', MLGM_PLUGIN_URL.'asset/js/jquery.axgmap.js', array('jquery'), '1.2.1', true);
      $generalSettings=get_option('mlgm_general_settings'); $styleSettings=get_option('mlgm_style_settings'); ?>      
<div class="axgmap" data-latlng="<?php echo $this->mlgm_geometry_location($generalSettings['defaultCity']); ?>" data-zoom="<?php if(!empty($generalSettings['mlgm_zoomlevel'])){echo $generalSettings['mlgm_zoomlevel'];}else {echo 13;} ?>" <?php if(!empty($generalSettings['mlgm_map_effect_ddnsz'])){ ?> data-draggable="0" data-scrollwheel="0"<?php } if(!empty($generalSettings['mlgm_map_effect_dmc'])){ ?> data-map-type-control="0" data-overview-map-control="0" data-pan-control="0" data-rotate-control="0" data-scale-control="0" data-street-view-control="0" data-zoom-control="0"<?php } ?>>
<?php $mlgm_query_args=array('post_type' =>'mlgm','posts_per_page'=>-1, 'order' => 'ASC');
      $mlgm_query = new WP_Query($mlgm_query_args); if($mlgm_query->have_posts()): while($mlgm_query->have_posts()): $mlgm_query->the_post();
	   $post_thumbnail_id = get_post_thumbnail_id();
       $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
	   $postID=get_the_ID();
	  
	   ?>
 <div data-marker-image="<?php if(!empty($post_thumbnail_url)){ echo $post_thumbnail_url; }else {echo $styleSettings['select_location_marker'];} ?>" data-latlng="<?php echo $this->mlgm_geometry_location(get_post_meta(get_the_ID(), 'mlgm_address', true)); ?>" data-title="<?php echo get_post_meta($postID, 'mlgm_address', true); ?>"><div><?php echo get_the_title().'<br/>'.get_the_content(); ?></div></div>
<?php endwhile; endif; ?> 
 
</div>
<?php return ob_get_clean(); }

function MlgmDisplayOnPage($content){
	  ob_start();
	  $generalSettings=get_option('mlgm_general_settings'); $styleSettings=get_option('mlgm_style_settings');
	  if(is_page($generalSettings['page_id']) && $generalSettings['page_id']!=0)
		{
	  wp_enqueue_script('mlgm_maps_api', 'https://maps.google.com/maps/api/js?sensor=false', array('jquery'), '', true);
      wp_enqueue_script('jquery_axgmap_js', MLGM_PLUGIN_URL.'asset/js/jquery.axgmap.js', array('jquery'), '1.2.1', true);
     ?>      
<div class="axgmap" data-latlng="<?php echo $this->mlgm_geometry_location($generalSettings['defaultCity']); ?>" data-zoom="<?php if(!empty($generalSettings['mlgm_zoomlevel'])){echo $generalSettings['mlgm_zoomlevel'];}else {echo 13;} ?>" <?php if(!empty($generalSettings['mlgm_map_effect_ddnsz'])){ ?> data-draggable="0" data-scrollwheel="0"<?php } if(!empty($generalSettings['mlgm_map_effect_dmc'])){ ?> data-map-type-control="0" data-overview-map-control="0" data-pan-control="0" data-rotate-control="0" data-scale-control="0" data-street-view-control="0" data-zoom-control="0"<?php } ?>>
<?php $mlgm_query_args=array('post_type' =>'mlgm','posts_per_page'=>-1, 'order' => 'ASC');
      $mlgm_query = new WP_Query($mlgm_query_args); if($mlgm_query->have_posts()): while($mlgm_query->have_posts()): $mlgm_query->the_post();
	   $post_thumbnail_id = get_post_thumbnail_id();
       $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
	   $postID=get_the_ID();
	  
	   ?>
 <div data-marker-image="<?php if(!empty($post_thumbnail_url)){ echo $post_thumbnail_url; }else {echo $styleSettings['select_location_marker'];} ?>" data-latlng="<?php echo $this->mlgm_geometry_location(get_post_meta(get_the_ID(), 'mlgm_address', true)); ?>" data-title="<?php echo get_post_meta($postID, 'mlgm_address', true); ?>"><div><?php echo get_the_title().'<br/>'.get_the_content(); ?></div></div>
<?php endwhile; endif; ?> 
 
</div>
		
<?php echo $content; return ob_get_clean(); }else {return $content;}}

/* Display Map on selected page */


	
}
$GLOBALS['MultipleLocationGoogleMapShortCode'] =new MultipleLocationGoogleMapShortCode();
?>