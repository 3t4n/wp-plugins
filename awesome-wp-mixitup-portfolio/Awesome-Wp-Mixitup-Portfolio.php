<?php 
/*

plugin name: Awesome Wp Mixitup Portfolio
Author: nayon46
Author uri: http://www.nayonbd.com
description:Awesome Mixitup Portfolio allows you to create a very modern and outstanding portfolio which filters instantly using jQuery animations
version:1.0

*/



class Awmp_main_class{

	public function __construct(){

		add_action('wp_enqueue_scripts',array($this,'Awmp_script_portfolio_area'));
	    add_action('init',array($this,'Awmp_custom_area_portfolio_site'));
	    add_shortcode('advanced-portfolio',array($this,'Awmp_advanced_portfolio_section'));


	}

	public function Awmp_script_portfolio_area(){
		wp_enqueue_style('portfolio',PLUGINS_URL('css/portfolio.css',__FILE__));


		wp_enqueue_script('portfolio-js',PLUGINS_URL('js/jquery.mixitup.min.js',__FILE__),array('jquery'));
		wp_enqueue_script('portfolio',PLUGINS_URL('js/portfolio.js',__FILE__),array('jquery','portfolio-js'));
	}

	public function Awmp_custom_area_portfolio_site(){

		load_plugin_textdomain('Awmp_custom_textdomain', false, dirname( __FILE__).'/lang');

		register_post_type('advanced-portfolio',array(
			'labels'=>array(
				'name'=>'Portfolio',
				'add_new_item'=>'add new slider',
				'add_new'=>'add protfolio'
			),
			'public'=>true,
			'supports'=>array('title','editor','thumbnail'),
			'menu_icon'=>'dashicons-format-gallery'
		));


		
	register_taxonomy('advanced_taxonomoy','advanced-portfolio',array(
			'labels'=>array(
				'name'=>'category'
			),
			'public'=>true,
			'hierarchical'=>true
		));


	}

	public function Awmp_advanced_portfolio_section(){
		ob_start();
		?>
		
	<div class="blog_heading">
		<h2 class="blog_title">
			[<span class="main_title_content">Portfolio</span>]
			<span class="title_underline"><i class="fa fa-cog"></i></span>
		</h2>
	</div>
			
	<!-- Portfolio Section Start  -->
	<section class="portfolio padding-top">
		<div class="mixiarea">
			<div class="mixifilter">
					<div class="controls">
					    <button class="filter " data-filter="all">Show all</button>

							<?php $portfolio_types= get_terms('advanced_taxonomoy'); 
								foreach($portfolio_types as $portfolio) :
							?>

					    <button class="filter" data-filter=".<?php echo  $portfolio->slug;  ?>"><?php echo  $portfolio->name;  ?></button>

							<?php endforeach; ?>
					  
					</div>
			</div>
			
		<!-- WORK ITEM -->
		<div id="Containerrr" class="containerr">

			<?php $advanced= new wp_Query(array(
				'post_type'=>'advanced-portfolio',
				'posts_per_page'=>-1
			));
			while( $advanced->have_posts() ) : $advanced->the_post();
			$terms_area = get_the_terms(get_the_id(),'advanced_taxonomoy');
			$terms   = array();
			foreach($terms_area as $term) :
			$terms[] = $term->slug;

			 ?>
			<?php endforeach; ?>

			<!-- WORK ITEM -->
			<div class="mix <?php echo implode(' ',$terms); ?>">
				<div class="grid gird-area">
					<a href="<?php the_permalink(); ?>"><figure class="effect-apollo">
						<?php the_post_thumbnail(); ?>
						<figcaption>
							<p><span><?php echo $term->name;   ?></span></p>
						</figcaption>
					</figure></a>
				</div>
			</div>
			<!-- END / WORK ITEM -->

		<?php  endwhile;  ?>
			</div>
		</div>
	</section> <!-- /portfolio -->
	<!-- Portfolio Section End  -->
		<?php return ob_get_clean();
	}


}
new Awmp_main_class();

















