<?php 
/*
Plugin Name: Wp Blog News
Author: Nayon
Author Uri: http://www.nayonbd.com
Description:With Awesome Wp Blog News it's very easy to implement a Blog News in WordPress.Awesome Responsive Blog News WordPress has been created to display Blog News on your WordPress site 
Version:1.0
*/
class Awbn_main_class{
	public function __construct(){
		add_action('init',array($this,'Awbn_main_area'));
		add_action('wp_enqueue_scripts',array($this,'Awbn_main_script_area'));
		add_shortcode('blog-news',array($this,'Awbn_main_shortcode_area'));
	}
	public function Awbn_main_area(){
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		load_plugin_textdomain('Awbn_news_textdomain', false, dirname( __FILE__).'/lang');

	}
	public function Awbn_main_script_area(){
		wp_enqueue_style('bootstrapcss',PLUGINS_URL('css/bootstrap.min.css',__FILE__));
		wp_enqueue_style('font-awesome',PLUGINS_URL('css/font-awesome.min.css',__FILE__));
		wp_enqueue_style('main-blogcss',PLUGINS_URL('css/style.css',__FILE__));
	}
	public function Awbn_main_shortcode_area($attr,$content){
	ob_start();
	?>
   <!-- news gird area start-->
    <div class="news-showcase" id="explore">
        <div class="container">
            <div class="row">
				<?php $bpost = new wp_Query(array(
					'post_type'=>'post',
					'posts_per_page'=>-1
				));
					while( $bpost->have_posts() ) : $bpost->the_post();
				?>
                <div class="col-sm-4">
                    <div class="single-news-post">
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail(); ?>
                            <div class="hover">
                                <ul class="post-link">
                                    <li>
                                        <a href="<?php the_permalink(); ?>" class="fa fa-search"></a>
                                    </li>
                                    <li>
                                        <a href="<?php the_permalink(); ?>" class="fa fa-link"></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="post-date">
                                <span class="date"><?php the_time('d') ?></span>
                                <span class="month"><?php the_time('M') ?></span>
                            </div>
                        </div>
                        <div class="post-content">
                            <h3 class="post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="post-description">
                                <?php echo wp_trim_words( get_the_content(), 15, '...' ); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read More','Awbn_news_textdomain') ?></a>
                        </div>
                    </div>
                </div>
				<?php endwhile; ?>
            </div>
        </div>
    </div>
	<?php
	return ob_get_clean();
}

}
new Awbn_main_class();





