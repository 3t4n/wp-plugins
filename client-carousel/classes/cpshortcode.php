<?php
/*
Version: 1.0.0
Author:Creative pig
Author URI: www.creativepig.net
*/
class CP_Shortcode {

  public function init() {

    add_shortcode( 'CPCC', array( $this, 'shortcode_callback' ) );

  }

  private function check_if_valid_Client($args){

    $output = false;
    if ( isset($args['id']) && intval( $args['id'] ) > 0  ) {

      $Client = get_post(intval($args['id']));

      if ( ! empty( $Client ) && LOGO_CAROUSEL == $Client->post_type ) {
        $output = true;
      }
    }
    return $output;

  }

  function shortcode_callback( $atts, $content = "" ){
	

    $atts = shortcode_atts( array(
        'id' => '',
    ), $atts, 'CPCC' );

    $atts['id'] = absint($atts['id']);

    $is_valid_Client = $this->check_if_valid_Client($atts);

    if ( ! $is_valid_Client ) {
      return __( 'Client not found', 'client-logo-carousel' );
    }

    ob_start();
    ?>

    <?php
	 	//client_setting_settings
     $clogos = get_post_meta($atts['id'],'_logos',true);
	$clogo_settings = get_option('clogo_settings');
	//secho "<pre>";
//print_r($clogo_settings);
$item_number=$clogo_settings['items'];
	$arrow_style = $clogo_settings['button_style'];
	$carousel_style = $clogo_settings['carousel_style'];
	$hoverstyle=$clogo_settings['hover_style'];
	$boxshadow=$clogo_settings['box_shadow'];
	if($boxshadow=='1'){
		?>
        <style>
		.logoborder{border:4px solid #fff;padding:15px 0;box-shadow:0 1px 4px rgba(0,0,0,0.2);border-radius:4px;}
		
		</style>
        <?php
		
	}elseif($boxshadow=='0'){
		?>
        <style>
		.logoborder{border:none;padding:15px 0;box-shadow:none;border-radius:0px;}
		
		</style>
        <?php
		
		
		}
	if($carousel_style=='style1'){
		?>
        <style>
		.owl-item{border-left:1px solid #666;}
li.owl-item:first-child{border:none;}

		
		</style>
        <?php
		
		
	}
	if($hoverstyle=='Grayscale'){
		?>
        <style>
		.carousel_grayscale{ filter: grayscale(100%); -webkit-filter: grayscale(100%); -moz-filter: grayscale(100%); filter: gray;  /* For IE 6 - 9 */ -webkit-transition: all .6s ease; -moz-transition: all .6s ease; filter: url(filters.svg#grayscale); }
.owl-item:hover .carousel_grayscale { filter: grayscale(0%); -webkit-filter: grayscale(0%); -moz-filter: grayscale(0%); filter: none; -webkit-transform: scale(1.03, 1.03); 
-moz-transform: scale(1.03, 1.03); -webkit-transition: all .6s ease;  -moz-transition: all .6s ease; }
 img.carousel_grayscale { filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale"); /* Firefox 10+, Firefox on Android */
filter: gray; /* IE6-9 */ -webkit-filter: grayscale(100%); /* Chrome 19+, Safari 6+, Safari 6+ iOS */ }

		
		</style>
        <?php
		
	}
	elseif($hoverstyle=='Grow'){
		?>
        <style>
		.hvr-grow {
    backface-visibility: hidden;
    box-shadow: 0 0 1px rgba(0, 0, 0, 0);
    display: inline-block;
    transform: translateZ(0px);
    transition-duration: 0.3s;
    transition-property: transform;
    vertical-align: middle;
}
.hvr-grow:hover, .hvr-grow:focus, .hvr-grow:active {
    transform: scale(1.1);
}
		
		</style>
        <?php
		
	}
	elseif($hoverstyle=='Bob'){
		?>
        <style>
		.hvr-bob {
    backface-visibility: hidden;
    box-shadow: 0 0 1px rgba(0, 0, 0, 0);
    display: inline-block;
    transform: translateZ(0px);
    vertical-align: middle;
}
.hvr-bob:hover, .hvr-bob:focus, .hvr-bob:active {
    animation-delay: 0s, 0.3s;
    animation-direction: normal, alternate;
    animation-duration: 0.3s, 1.5s;
    animation-fill-mode: forwards;
    animation-iteration-count: 1, infinite;
    animation-name: hvr-bob-float, hvr-bob;
    animation-timing-function: ease-out, ease-in-out;
}
@keyframes hvr-bob {
0% {
    transform: translateY(-8px);
}
50% {
    transform: translateY(-4px);
}
100% {
    transform: translateY(-8px);
}
}
@keyframes hvr-bob-float {
100% {
    transform: translateY(-8px);
}
}
		
		</style>
        <?php
		
	}
	elseif($hoverstyle=='Shadow'){
		?>
        <style>
		.hvr-box-shadow-outset {
    backface-visibility: hidden;
    box-shadow: 0 0 1px rgba(0, 0, 0, 0);
    display: inline-block;
    transform: translateZ(0px);
    transition-duration: 0.3s;
    transition-property: box-shadow;
    vertical-align: middle;
}
.hvr-box-shadow-outset:hover, .hvr-box-shadow-outset:focus, .hvr-box-shadow-outset:active {
    box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.6);
}
		
		</style>
        <?php
		
	}
	
	
	if($arrow_style == 'style1'){
		?>
        <style>
		.owl-buttons div.owl-prev:before{content:'\f191 ';}

.owl-buttons div.owl-next:before{content:'\f152   ';}
</style>
        <?php
	}elseif($arrow_style == 'style2'){
		?>
        <style>
		.owl-buttons div.owl-prev:before{content:'\f104  ';}

.owl-buttons div.owl-next:before{content:'\f105   ';}
</style>
        <?php
	}elseif($arrow_style == 'style3'){
		?>
        <style>
		.owl-buttons div.owl-prev:before{content:'\f177  ';}

.owl-buttons div.owl-next:before{content:'\f178   ';}
</style>
        <?php
	}elseif($arrow_style == 'style4'){
		?>
        <style>
		.owl-buttons div.owl-prev:before{content:'\f137   ';}

.owl-buttons div.owl-next:before{content:'\f138    ';}
</style>
        <?php
	}
     ?>
     
   	

		<div class="col-md-12">
        <script>
   jQuery(document).ready(function($){     
 

$(".gallery-slider").owlCarousel({ 
items : <?php echo esc_attr( $clogo_settings['items'] ); ?>,
 singleItem:<?php echo ($clogo_settings['single_item'])?'true':'false'; ?>,
 autoplayTimeout:<?php echo esc_attr( $clogo_settings['slide_speed'] ); ?>,
  navigation: <?php echo ($clogo_settings['navigation'])?'true':'false'; ?>,
   autoPlay: <?php echo ($clogo_settings['auto_play'])?'true':'false'; ?>,
  rewindNav:true,
  rewindNavSpeed:1000,
  responsiveClass:true,
   pagination:<?php echo ($clogo_settings['pagination'])?'true':'false'; ?>,
   autoplayHoverPause:!1<?php //echo esc_attr( $clogo_settings['pagination'] ); ?>,
 
  itemsDesktop : [1199,3],
 itemsDesktopSmall : [979,3]

});
	    });
   </script> 
        
        	<div class="gallery-slider gallery-popup logoborder" id="clogo_owl">
            
           <?php  foreach ($clogos as $key => $slide){
			
	  $attachment = get_post($slide['client_logo_id']);
	   $slider_settings['random_id'] = uniqid(esc_attr($atts['id']).'-');
	  $image_info = wp_get_attachment_image_src( $attachment->ID, $slider_settings['image_size'] );
           $image_url  = array_shift($image_info);
		  
		   ?>
               <div class="imgwidth">
               <a href="<?php echo $slide['url']; ?>"  target="<?php echo esc_attr( $clogo_settings['window_open'] ); ?>"><img src="<?php echo esc_url( $image_url ); ?>" class="carousel_grayscale hvr-grow hvr-bob hvr-box-shadow-outset" alt="gallery"></a>
               
              
               </div>
               <?php }
			   echo $this->get_client_script( $atts, $slider_settings ); ?>                        
            </div>
        
        
        
         
                    
          

    
    
</div>

    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;

  }
  
     
 
function get_client_script( $args, $clogo_settings ){
	    ob_start();
    $clogo_settings = get_option('clogo_settings');
   ?>
      <?php
   $output = ob_get_contents();
   ob_end_clean();
   return $output;  
   }

}
