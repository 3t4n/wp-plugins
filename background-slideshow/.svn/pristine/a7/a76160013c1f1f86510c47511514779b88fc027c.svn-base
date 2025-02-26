<?php

	$direct_path =  get_bloginfo('wpurl')."/wp-content/plugins/background-slideshow";

?>

<script type="text/javascript">

	function bgSlide() {
		
		var $now = jQuery('#bg_slide img.active');
		if ( $now.length == 0 ) $now = jQuery('#bg_slide img:last');

		var $next =  $now.next().length ? $now.next() : jQuery('#bg_slide img:first');

		$now.addClass('last-active');

		$next.css({opacity: 0.0}).addClass('active').animate({opacity: 1.0}, <?php if(get_option("slide_animation")) { echo get_option("slide_animation"); } else {echo "500";}?>, function() {
			$now.removeClass('active last-active');
		});
		
	}

	jQuery(document).ready(function($) {
		
		setInterval("bgSlide()", <?php if(get_option("slide_timeout")) { echo get_option("slide_timeout"); } else {echo "5000";}?>);
		
	});
	
	
</script>

<style>

	#bg_slide {
	position:relative;
	z-index:-1;
	}
	
	#bg_slide img {
	position:absolute;
	top:0;
	left:0;
	z-index:8;
	opacity:0.0;
	}
	
	#bg_slide img.active {
	z-index:10;
	opacity:1.0;
	}
	
	#bg_slide img.last-active {
	z-index:9;
	}
	
	#bg_slide img {
	min-height: 100%;
	min-width: 100%;
	width: 100%;
	height: auto;
	cursor: pointer;
	padding: 0px !important;
	background: transparent !important;
	position: fixed;
	top: 0;
	left: 0;
	}
	
</style>

<div id="bg_slide">
	
<?php

	global $wpdb;
	
	global $post;
	
	$args = array( 'meta_key' => 'bg_slider', 'meta_value'=> '1', 'suppress_filters' => 0, 'post_type' => array('post', 'page'));
	
	$myposts = get_posts( $args );
	
	foreach( $myposts as $post ) :	setup_postdata($post);
	
		$count ++;
	
		$custom = get_post_custom($post->ID);
		
		$thumb = bg_slide_img();

?>
			<img src="<?php echo $thumb;?>" <?php if($count == 1) { echo "class='active'";};?> <?php if(get_option("slide_link") == 1) { ?> onClick="location.href='<?php the_permalink();?>'" <?php } ?> />
		
<?php

	endforeach;

?>

</div>