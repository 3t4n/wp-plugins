<?php
if (!defined('ABSPATH'))
{
	exit;
}


function ecpt_loadTextSliderGlobalScripts()
{
	$speedOfTheTextSlideAnimation = '';
	$speedOfTheTextSlideAnimation = get_option("speedOfTheTextSlideAnimation");
	if (empty($speedOfTheTextSlideAnimation))
	{
		$speedOfTheTextSlideAnimation = 300;
	}
	
?>
<script type="text/javascript">
	jQuery(function($)
	{
		$(document).ready(function()
		{
			/*
			var slider = tns({
				container: '.text_slider_testimonial_panel ul',
				items: 1,
				slideBy: 'page',
				autoplayHoverPause: true,
				//controls: false,
				nav: true,
				autoplayButtonOutput: false,
				arrowKeys: true,
				speed: <?php echo $speedOfTheTextSlideAnimation; ?>,
				autoplay: true
			});
			*/
			var slider = tns({
				  "container": ".text_slider_testimonial_panel .textslidercontent",
				  "items": 1,
				  "controlsContainer": "#customize-controls",
				  "navContainer": ".textslidercontent",
				  "navAsThumbnails": false,
				  "autoplay": true,
				  //"autoplayTimeout": 1000,
				"slideBy": 'page',
				"autoplayHoverPause": true,
				"autoplayButtonOutput": false,				  
				  "autoplayButton": "#customize-toggle",
				  "swipeAngle": false,
				  "speed": <?php echo $speedOfTheTextSlideAnimation; ?>
			});
		});
	});
</script>
<?php 
}

add_action('wp_head', 'ecpt_loadTextSliderGlobalScripts');