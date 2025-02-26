<?php 
/*
Plugin Name: Awesome Wp Team Member
Author: Nayon
Author Uri: http://www.nayonbd.com
Description:This plugin adds a teams section to the admin panel which allows you to showcase your employees/people on your website the easy way.
Version:1.0
*/

class Awtm_main_class{

	public function __construct(){
		add_action('init',array($this,'Awtm_main_area'));
		add_action('wp_enqueue_scripts',array($this,'Awtm_main_script_area'));
		add_shortcode('team-member',array($this,'Awtm_main_shortcode_area'));
	}

	public function Awtm_main_area(){

		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');

		load_plugin_textdomain('Awtm_photo_textdomain', false, dirname( __FILE__).'/lang');
		register_post_type('team-member',array(
			'labels'=>array(
				'name'=>'Team Members'
			),
			'public'=>true,
			'supports'=>array('title','thumbnail','editor'),
			'menu_icon'=>'dashicons-businessman'
	    ));
	}

	public function Awtm_main_script_area(){
		wp_enqueue_style('font-awesome',PLUGINS_URL('css/font-awesome.min.css',__FILE__));
		wp_enqueue_style('bootstrapcss',PLUGINS_URL('css/bootstrap.min.css',__FILE__));
		wp_enqueue_style('team-maincss',PLUGINS_URL('css/style.css',__FILE__));

	}

	public function Awtm_main_shortcode_area($attr,$content){
	ob_start();
	?>
	<!-- Team -->
	<section id="team" class="pb-5">
	    <div class="container">
	        <div class="row">
				<?php $ateam = new wp_Query(array(
					'post_type'=>'team-member',
					'posts_per_page'=>-1
				));
					while( $ateam->have_posts() ) : $ateam->the_post();
				?>
	            <!-- Team member -->
	            <div class="col-xs-12 col-sm-6 col-md-4">
	                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
	                    <div class="mainflip">
	                        <div class="frontside">
	                            <div class="card">
	                                <div class="card-body text-center">
	                                    <p><?php the_post_thumbnail(); ?></p>
	                                    <h4 class="card-title"><?php the_title(); ?></h4>
	                                    <p class="card-text"><?php echo wp_trim_words( get_the_content(), 12); ?></p>
	                                    
	                                </div>
	                            </div>
	                        </div>
	                        <div class="backside">
	                            <div class="card">
	                                <div class="card-body text-center mt-4">
	                                    <h4 class="card-title"><?php the_title(); ?></h4>
	                                    <p class="card-text"><?php the_content(); ?></p>

	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <!-- ./Team member -->
				<?php endwhile; ?>
	        </div>
	    </div>
	</section>
	<!-- Team -->
	<?php
	return ob_get_clean();
}

}
new Awtm_main_class();





