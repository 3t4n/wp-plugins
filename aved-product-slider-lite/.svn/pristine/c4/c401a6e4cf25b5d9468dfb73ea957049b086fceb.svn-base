<?php 
// Loader scripts 
// AVS Core
?>

<?php 

class AVS_scripts_loader
{

	public static function load_default_scripts()
	{
		$js_way = AVS_SLIDER_URL.'/AVED-Slider-Plugin/assets/js/';
		$css_way = AVS_SLIDER_URL.'/AVED-Slider-Plugin/assets/css/';	
		wp_enqueue_script('AVS_slick_js',$js_way.'slick.js',array(),'1.5',true);
		wp_enqueue_script('AVS_min_slick_js',$js_way.'slick.min.js',array(),'1.5',true);
		wp_enqueue_style('AVS_slick_css',$css_way.'slick.css');
		wp_enqueue_style('AVS_slick_theme_css',$css_way.'slick-theme.css');
		wp_enqueue_style('AVS_plg_theme_css',$css_way.'plugin-styles.css');
		wp_enqueue_style('AVS_custom_plugin_css',$css_way.'custom.css');
	}

	public static function get_configurated_script_code($params)
	{
		if(!isset($params)){return false;}
	?>
		<script type="text/javascript" > 			
			jQuery(document).ready(function($){
			    $('.avs-slider-core').slick({
			      infinite: true,
			      slidesToShow: <?= $params->params['visible']; ?>,
			      slidesToScroll: <?= $params->params['slidesToScroll']; ?>,
			      autoplay: <?= $params->params['autoplay']; ?>,
			  	  autoplaySpeed: <?= intval($params->params['autoplaySpeed'])*1000; ?>,
			  	  draggable: <?= $params->params['druggable']; ?>,
			  	  pauseOnHover: <?= $params->params['pauseOnScrool']; ?>,
			  	  responsive: [
				    {
				      breakpoint: 1024,
				      settings: {
				        slidesToShow: 2,
				        slidesToScroll: 2,
				        infinite: true,
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
				        slidesToShow: 2,
				        slidesToScroll: 2
				      }
				    }
				    // You can unslick at a given breakpoint now by adding:
				    // settings: "unslick"
				    // instead of a settings object
				  ]
			    });
			});
		</script>
		<?php
	} 
}

?>