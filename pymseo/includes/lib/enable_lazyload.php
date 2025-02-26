<?php

//###############################
// WPO -> Lazy load
//###############################
//--> Pediente iframes

	
// NO FUNCIONA
//function example_add_img_class( $class ) {
//	return $class . ' patata';
//}
//add_filter( 'get_image_tag_class', 'example_add_img_class' );		
	if ( ! is_admin() ) {
		// Si el IFRAME o el embed no tiene class lo añadimos, si no el reemplaze no funciona
		function fun_pymseo_add_class_lazy_embed( $cache, $url, $attr, $post_ID ) {
			if ( strpos( $cache, 'youtube.com' ) !== false || strpos( $cache, 'youtu.be' ) !== false ) {
				$cache = str_replace( '<iframe ', '<iframe class="" ', $cache ); // YouTube doesn't have a class on its iframe.
			}
			if ( strpos( $cache, 'soundcloud.com' ) !== false ) {

			}
			return $cache;
		}
		add_filter( 'embed_oembed_html', 'fun_pymseo_add_class_lazy_embed', 10, 4 );
		
		function fun_pymseo_add_class_lazy($content) {
			//-- Change src/srcset to data attributes.
			$content = preg_replace("/<img(.*?)(src=)(.*?)>/i", '<img$1data-$2$3>', $content);
			$content = preg_replace("/<img(.*?)(srcset=)(.*?)>/i", '<img$1data-$2$3>', $content);
			$content = preg_replace("/<iframe(.*?)(src=)(.*?)>/i", '<iframe$1data-$2$3>', $content);
			// -- Add pymseolazy in class
			$content = preg_replace('/<img(.*?)class=\"(.*?)\"(.*?)>/i', '<img$1class="$2 pymseolazy"$3>', $content);
			$content = preg_replace('/<iframe(.*?)class=\"(.*?)\"(.*?)>/i', '<iframe$1class="$2 pymseolazy"$3>', $content);
			return $content;
		}
		add_filter('the_content', 'fun_pymseo_add_class_lazy');
		add_filter('post_thumbnail_html', 'fun_pymseo_add_class_lazy');
		add_filter('get_avatar', 'fun_pymseo_add_class_lazy');
		add_filter('get_image_tag', 'fun_pymseo_add_class_lazy');
		add_filter('widget_text', 'fun_pymseo_add_class_lazy');
		add_filter('get_avatar', 'fun_pymseo_add_class_lazy');
		add_filter('wp_get_attachment_image_attributes', 'fun_pymseo_add_class_lazy');
		function fun_pymseo_lazyload_script(){
		?>
<script><?php require PYMSEO_PLUGIN_DIR. '/js/lazyload/lazyload.min.js'; ?>
var lazyLoadInstance = new LazyLoad({elements_selector: ".pymseolazy"});
console.log("%cFunción Javascript -> pymSEO -> Lazy Load Vanilla v.12.1: %cCargado ",'color: #104E8B;font-weight:bold','color:green;font-weight:bold');</script>
		<?php
		}
		add_action( 'wp_footer', 'fun_pymseo_lazyload_script');
	} 


?>