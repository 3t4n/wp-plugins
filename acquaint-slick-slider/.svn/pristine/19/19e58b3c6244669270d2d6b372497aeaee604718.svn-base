<?php
/**
 * Load All AQSS Custom Post Type
 */
$IG_CPT_Name = "aqs_gallery";
$AllSlides = array(  'p' => $Id['id'], 'post_type' => $IG_CPT_Name);
$loop = new WP_Query( $AllSlides );

while ( $loop->have_posts() ) : $loop->the_post();
//get the post id
$post_id = get_the_ID();

/**
 * Get All Slides Details Post Meta
 */
$RPGP_AllPhotosDetails = unserialize(base64_decode(get_post_meta( get_the_ID(), 'aqs_all_photos_details', true)));

$TotalImages =  get_post_meta( get_the_ID(), 'aqs_total_images_count', true );
$i = 1;
$j = 1;

if($AQSS_L3_Auto_Slideshow==0){
	$autoplay='true';
} else{
	$autoplay='false';
}

$speed=$AQSS_L3_Transition_Speed;

if($AQSS_L3_Infinite_Scroll==1){
	$infinite='true';
} else{
	$infinite='false';
}

if($AQSS_L3_Navigation_Button==1){
	$dots='true';
} else{
	$dots='false';
}

?>
<?php 
/*simple slider*/
if($AQSS_L3_Slider_Type==1){ ?>
<script type="text/javascript">
	jQuery( document ).ready(function( jQuery ) {
		jQuery('#example3_<?php echo $post_id; ?> .single-item').slick({
			dots: <?php echo $dots; ?>,
			infinite: <?php echo $infinite; ?>,
			autoplay: <?php echo $autoplay; ?>,
  			autoplaySpeed: <?php echo $speed; ?>	
		});
	});
</script>
<?php } 

/*Multiple slider*/
else if($AQSS_L3_Slider_Type==2) {?>
<script type="text/javascript">
jQuery( document ).ready(function( jQuery ) {
	jQuery('#example3_<?php echo $post_id; ?> .single-item').slick({
	  dots: <?php echo $dots; ?>,
	  infinite: <?php echo $infinite; ?>,
	  slidesToShow: <?php echo $AQSS_L3_Slide_To_Show; ?>,
	  slidesToScroll: <?php echo $AQSS_L3_Slide_To_Scroll; ?>,
	  autoplay: <?php echo $autoplay; ?>,
	  autoplaySpeed: <?php echo $speed; ?>
	});
});
</script>
<?php } 

/*responsive slick slider*/
else if($AQSS_L3_Slider_Type==3) {?>
<script type="text/javascript">
jQuery( document ).ready(function( jQuery ) {	
	jQuery('#example3_<?php echo $post_id; ?> .single-item').slick({  
	  dots: <?php echo $dots; ?>,
	  infinite: <?php echo $infinite; ?>,
	  speed: <?php echo $speed; ?>,
	  slidesToShow: <?php echo $AQSS_L3_Slide_To_Show; ?>,
	  slidesToScroll: <?php echo $AQSS_L3_Slide_To_Scroll; ?>,
	  responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 3,
	        infinite: false,
	        dots: true
	      }
	    },
	    {
	      breakpoint: 600,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	 
	  ]
	});
});
</script>
<?php } 

/*variable width slider*/
else if($AQSS_L3_Slider_Type==4) {?>
<script type="text/javascript">
jQuery( document ).ready(function( jQuery ) {
	jQuery('#example3_<?php echo $post_id; ?> .single-item').slick({
  		  dots: <?php echo $dots; ?>,
		  infinite: <?php echo $infinite; ?>,		  
  		  slidesToShow: 1,
		  centerMode: true,
		  variableWidth: true
	});
});
</script>
<?php } 

/*Adaptive Height Slider   */
else if($AQSS_L3_Slider_Type==5) {?>
<script type="text/javascript">
jQuery( document ).ready(function( jQuery ) {
	jQuery('#example3_<?php echo $post_id; ?> .single-item').slick({
		  dots: <?php echo $dots; ?>,
		  infinite: <?php echo $infinite; ?>,
		  speed: <?php echo $speed; ?>,
		  slidesToShow: 1,
		  adaptiveHeight: true
	});		
});
</script>
<?php } 

/*Center Mode*/
else if($AQSS_L3_Slider_Type==6) {?>
<script type="text/javascript">
jQuery( document ).ready(function( jQuery ) {
	
	jQuery('#example3_<?php echo $post_id; ?> .single-item').slick({
	  dots: <?php echo $dots; ?>,
	  centerMode: true,
	  centerPadding: '60px',
	  slidesToShow: '<?php echo $AQSS_L3_Slide_To_Show; ?>',
	  responsive: [
	    {
	      breakpoint: 768,
	      settings: {
	        arrows: false,
	        centerMode: true,
	        centerPadding: '40px',
	        slidesToShow: 3
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        arrows: false,
	        centerMode: true,
	        centerPadding: '40px',
	        slidesToShow: 1
	      }
	    }
	  ]
	});
		
});
</script>
<?php } 

/*Lazy Load Slider  */
else if($AQSS_L3_Slider_Type==7) {?>
<script type="text/javascript">
jQuery( document ).ready(function( jQuery ) {

	jQuery('#example3_<?php echo $post_id; ?> .lazy').slick({ 
	  dots: <?php echo $dots; ?>, 
	  lazyLoad: 'ondemand',  
	  slidesToShow: <?php echo $AQSS_L3_Slide_To_Show; ?>,
	  slidesToScroll: <?php echo $AQSS_L3_Slide_To_Scroll; ?>,
	  infinite: <?php echo $infinite; ?>
	});
		
});
</script>	
<?php } 

/*Fade Slider  */
else if($AQSS_L3_Slider_Type==8) {?>
<script type="text/javascript">
jQuery( document ).ready(function( jQuery ) {

	jQuery('#example3_<?php echo $post_id; ?> .single-item').slick({
	  dots: <?php echo $dots; ?>,
	  infinite: '<?php echo $infinite; ?>',
	  speed: '<?php echo $speed; ?>',
	  fade: true,
	  cssEase: 'linear'
	});
		
});
</script>	
<?php } 

/*Right to left slider*/
else if($AQSS_L3_Slider_Type==9) {?>
<script type="text/javascript">
jQuery( document ).ready(function( jQuery ) {
	jQuery('.single-item-rtl').attr('dir','rtl');
	jQuery('.single-item-rtl').slick({
	  rtl: true,
	  dots: <?php echo $dots; ?>,
	  infinite: '<?php echo $infinite; ?>'
	});
});
</script>	
<?php } ?>
<?php //echo "11".$AQSS_L3_Title_Color;exit;  ?>
<style>
.sp-image {
    padding: 2%;
}

/* font + color */
.title-in  {
	font-family: <?php echo $AQSS_L3_Font_Style; ?> !important;
	color: #<?php echo $AQSS_L3_Title_Color; ?> !important;
	background-color: #<?php echo $AQSS_L3_Title_BgColor; ?> !important;
	opacity: 0.7 !important;
}
.desc-in  {
	font-family: <?php echo $AQSS_L3_Font_Style; ?> !important;
	color: #<?php echo $AQSS_L3_Desc_Color; ?> !important;
	background-color: #<?php echo $AQSS_L3_Desc_BgColor; ?> !important;
	opacity: 0.7 !important;
}

#example3_<?php echo $post_id; ?> .title-in {
	color: <?php echo $RISP_Slide_In_Title_Color; ?> !important;
	font-weight: bolder;
	text-align: center;
}

#example3_<?php echo $post_id; ?> .title-in-bg {
	background: rgba(255, 255, 255, 0.7); !important;
	white-space: unset !important;
	max-width: 90%;
	min-width: 40%;
	transform: initial !important;
	-webkit-transform: initial !important;
	font-size: 14px !important;
}

#example3_<?php echo $post_id; ?> .desc-in {
	color: <?php echo $RISP_Slide_In_Desc_Color; ?> !important;
	text-align: center;
}
#example3_<?php echo $post_id; ?> .desc-in-bg {
	background: rgba(<?php echo $RISP_Slide_In_Desc_BG_Color; ?>, <?php echo $RISP_BG_Color_Opacity; ?>) !important;
	white-space: unset !important;
	width: 80% !important;
	min-width: 30%;
	transform: initial !important;
	-webkit-transform: initial !important;
	font-size: 13px !important;
}

@media (max-width: 640px) {
	#example3_<?php echo $post_id; ?> .hide-small-screen {
		display: none;
	}
}

@media (max-width: 860px) {
	#example3_<?php echo $post_id; ?> .sp-layer {
		font-size: 18px;
	}
	
	#example3_<?php echo $post_id; ?> .hide-medium-screen {
		display: none;
	}
}

</style>
<?php  
if($AQSS_L3_Slide_Title == 1) { ?>
<h3 class="uris-slider-title"><?php echo get_the_title( $post_id ); ?> </h3>
<?php } ?>
<div id="example3_<?php echo $post_id; ?>" class="slider-pro">
	<!-- slides div start -->
	<?php if($AQSS_L3_Slider_Type == 7) { $lazy='lazy'; } ?>
	<?php if($AQSS_L3_Slider_Type == 9) { $rtl='single-item-rtl'; } ?>
	<div class="sp-slides single-item slider <?php if(isset($lazy)){ echo $lazy; } ?> <?php if(isset($rtl)){ echo $rtl; } ?>">
		<?php 
		foreach($RPGP_AllPhotosDetails as $RPGP_SinglePhotoDetails) {
		$Title = $RPGP_SinglePhotoDetails['rpgp_image_label'];
		$Desc = $RPGP_SinglePhotoDetails['rpgp_image_desc'];
		$Url = $RPGP_SinglePhotoDetails['rpgp_image_url'];
		$i++;
		?>
		
		<div class="sp-slide image">
			<img class="sp-image" 
			<?php if($AQSS_L3_Slider_Type == 7){ ?> data-lazy="<?php echo esc_url($Url); ?>"<?php } ?>
			
				alt="<?php echo esc_url($Title); ?>" src="<?php echo esc_url($Url); ?>" 
				data-src="<?php echo esc_url($Url); ?>"
				data-small="<?php echo esc_url($Url); ?>"
				data-medium="<?php echo esc_url($Url); ?>"
				data-large="<?php echo esc_url($Url); ?>"
				data-retina="<?php echo esc_url($Url); ?>"/>
				

			<?php if($AQSS_L3_Slide_Title == 1) { ?>
			<?php if($Title != "") { ?>
				
			<p class="sp-layer sp-white sp-padding title-in title-in-bg hide-small-screen" 
				data-position="centerCenter"
				data-vertical="-14%"
				data-show-transition="left" data-show-delay="500">
				<?php if(strlen(esc_html($Title)) > 100 ) echo substr(esc_html($Title),0,100); else echo esc_html( $Title ); ?>
			</p>
				<?php } ?>
			<?php } ?>
			<?php if($AQSS_L3_Slide_Title == 1) { ?>
			<?php if($Desc != "") { ?>
			<p class="sp-layer sp-black sp-padding desc-in desc-in-bg hide-medium-screen" 
				data-position="centerCenter"
				data-vertical="14%"
				data-show-transition="right" data-show-delay="500">
				<?php if(strlen(esc_html($Desc)) > 300 ) echo substr(esc_html($Desc),0,300)."..."; else echo esc_html($Desc); ?>
			</p>
				<?php } ?>
			<?php } ?>
		</div>
		<?php } //end for each ?>		
	</div>	
</div>
<?php endwhile; ?>