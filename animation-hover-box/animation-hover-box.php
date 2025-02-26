<?php 

/*
Plugin Name: Animation Hover Box
Author: Nayon
Author Uri: http://www.nayonbd.com
Description:Amazing hover effects is an impressive hover effects collection.It is the fastest and most easiest plugin to set up in just few minutes 
Version:1.0
*/

class Ahb_main_class{

	public function __construct(){

		add_action('init',array($this,'Ahb_main_area'));
		add_action('wp_enqueue_scripts',array($this,'Ahb_main_script_area'));
		add_shortcode('animation-box',array($this,'Ahb_main_shortcode_area'));
	}


	public function Ahb_main_area(){
	
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');

		load_plugin_textdomain('Ahb_hover_textdomain', false, dirname( __FILE__).'/lang');

		register_post_type('hover-content',array(
			'labels'=>array(
				'name'=>'Hover Content'
			),
			'public'=>true,
			'supports'=>array('title','thumbnail','editor'),
			'menu_icon'=>'dashicons-format-gallery'
	    ));
	}

	public function Ahb_main_script_area(){

		wp_enqueue_style('bootstrapcss',PLUGINS_URL('css/bootstrap.min.css',__FILE__));
		wp_enqueue_style('main-style',PLUGINS_URL('css/style.css',__FILE__));

		wp_enqueue_script('bootstrapjs',PLUGINS_URL('js/bootstrap.min.js',__FILE__),array('jquery'));
	}

	public function Ahb_main_shortcode_area($attr,$content){
	ob_start();
	?>
	
	<div class="container">
	 	<?php $gallery = new wp_Query(array(
			'post_type'=>'hover-content'
		));
		while( $gallery->have_posts() ) : $gallery->the_post();
		?>
		<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
	    <div style="background-image: url('<?php echo $thumb['0'];?>')" class="col-xl-3 col-lg-3 col-md-3 col-sm-3 project wow animated animated4 fadeInLeft">
	        <div class="project-hover">
	            <h4><?php the_title(); ?></h4>
	            <hr />
	            <p><?php the_content(); ?></p>
	        </div>
	    </div>
		<?php endwhile; ?>
	    <div class="clearfix"></div>
	</div>

	<?php
	return ob_get_clean();
}

}
new Ahb_main_class();





