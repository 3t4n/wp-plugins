<?php
/***
Plugin Name: Awesome Portfolio
Description: This is a Custom Widget Post plugin. You can set manually post Title, Image, and Link easiest way.It will be include the Title and Descriptions.
Version: 1.0.1
Text Domain: aawesome_portfolio
Domain Path: /language
Author: S.M.Abdul Hadi
Author URI:https://web.facebook.com/abdul.shuvo.79
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
****/
?>
<?php if(! function_exists('awesome_portfolio_post_type')) {


// Register Custom Post Type  portfolio
// Post Type Key: portfolio
function awesome_portfolio_post_type() {

	$labels = array(
		'name' => __( 'portfolio', 'Post Type General Name', 'portfolio' ),
		'singular_name' => __( ' portfolio', 'Post Type Singular Name', 'portfolio' ),
		'menu_name' => __( 'Awesome Portfolio', 'portfolio' ),
		'name_admin_bar' => __( ' portfolio', 'portfolio' ),
		'archives' => __( ' portfolio Archives', 'portfolio' ),
		'attributes' => __( ' portfolio Attributes', 'portfolio' ),
		'parent_item_colon' => __( 'Parent  portfolio:', 'portfolio' ),
		'all_items' => __( 'All portfolio', 'portfolio' ),
		'add_new_item' => __( 'Add New  portfolio', 'portfolio' ),
		'add_new' => __( 'Add New portfolio', 'portfolio' ),
		'new_item' => __( 'New  portfolio', 'portfolio' ),
		'edit_item' => __( 'Edit  portfolio', 'portfolio' ),
		'update_item' => __( 'Update  portfolio', 'portfolio' ),
		'view_item' => __( 'View  portfolio', 'portfolio' ),
		'view_items' => __( 'View portfolio', 'portfolio' ),
		'search_items' => __( 'Search  portfolio', 'portfolio' ),
		'not_found' => __( 'Not found', 'portfolio' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'portfolio' ),
		'featured_image' => __( 'Featured Image', 'portfolio' ),
		'set_featured_image' => __( 'Set featured image', 'portfolio' ),
		'remove_featured_image' => __( 'Remove featured image', 'portfolio' ),
		'use_featured_image' => __( 'Use as featured image', 'portfolio' ),
		'insert_into_item' => __( 'Insert into  portfolio', 'portfolio' ),
		'uploaded_to_this_item' => __( 'Uploaded to this  portfolio', 'portfolio' ),
		'items_list' => __( 'portfolio list', 'portfolio' ),
		'items_list_navigation' => __( 'portfolio list navigation', 'portfolio' ),
		'filter_items_list' => __( 'Filter portfolio list', 'portfolio' ),
	);
	$args = array(
		'label'					 => __( ' portfolio', 'portfolio' ),
		'description'			 => __( 'This is awesome Portfolio Plugin', 'portfolio' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor','thumbnail' ),
		'taxonomies'            => array( 'corporate_portfolio_category'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-screenoptions',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'awesome_portfolio', $args );

}
add_action( 'init', 'awesome_portfolio_post_type', 0 );
}

if (! function_exists('portfoliotaxonomies')) {

	// Register Taxonomy awesomeportfolio
// Taxonomy Key: awesomeportfolio
function awesomeportfolio_taxonomies() {

	$labels = array(
		'name'              => _x( 'Awesome Portfolio', 'taxonomy general name', 'portfolio' ),
		'singular_name'     => _x( 'awesomeportfolio', 'taxonomy singular name', 'portfolio' ),
		'search_items'      => __( 'Search portfolio', 'portfolio' ),
		'all_items'         => __( 'All Portfolio', 'portfolio' ),
		'parent_item'       => __( 'Parent portfolio', 'portfolio' ),
		'parent_item_colon' => __( 'Parent portfolio:', 'portfolio' ),
		'edit_item'         => __( 'Edit portfolio', 'portfolio' ),
		'update_item'       => __( 'Update portfolio', 'portfolio' ),
		'add_new_item'      => __( 'Add New Portfolio Category', 'portfolio' ),
		'new_item_name'     => __( 'New portfolio Name', 'portfolio' ),
		'menu_name'         => __( 'awesome portfolio category', 'portfolio' ),
	);
	$args = array(
		'labels'			 => $labels,
		'description'		 => __( '', 'portfolio' ),
		'hierarchical' 		 => true,
		'public' 			 => true,
		'show_ui' 			 => true,
		'show_admin_column'  => true,
		'show_in_nav_menus'  => true,
		'show_tagcloud' 	 => true,
	);
	register_taxonomy( 'awesomeportfolio', array('awesome_portfolio'), $args );

}

add_action( 'init', 'awesomeportfolio_taxonomies', 0 );}

add_shortcode('aawesome_portfolio','portfolio_func');
    function portfolio_func(){
	?>

		 <!--portfolio start-->

	 			<?php 
                    $port = new WP_Query(array(
                        'post_type'  => 'awesome_portfolio',
                        'posts_per_page'  => -1,
                    ));
                    if ($port->have_posts()): 
                    ?>
   
                <div class="text-center">
                    <ul class="js-PortfolioFilter portfolio-filter text-center u-MarginTop0">
                        <li class="active"><a href="<?php the_permalink();?>" data-filter="*"> All</a></li>
                        <?php
                         $portfolio = get_terms('awesomeportfolio', array(
                         	'hide_empty' =>true ));
                         foreach ($portfolio as $item) {
                         	echo '<li><a href="<?php the_permalink();?>" data-filter=".'.$item->slug.'">'.$item->name.'</a></li>';
                         }
                        ?>
                        
                    </ul>
                </div>

              <div class="js-Portfolio portfolio-grid portfolio-gallery grid-4 gutter">
              	

              		<?php while($port->have_posts()):$port->the_post();?>
              			<?php 
                        $category = get_the_terms(get_the_ID(),'awesomeportfolio');
                        $category_in = array();
                        foreach ($category as $term) {
                             $category_in[]= $term->slug;
                        }
                        $portfolio_class = join(' ',$category_in);
                        
                    ?>
                    <div class="portfolio-item <?php echo $portfolio_class;?>">
                        <a href="<?php the_permalink();?>" class="portfolio-image" title="We are creative">
                            <img src="<?php the_post_thumbnail_url();?>" alt=""/>
                            <div class="portfolio-hover-title">
                                <div class="portfolio-content">
                                    <h4><?php the_title();?></h4>
                                    <div class="portfolio-category">
                                        <span><?php echo $portfolio_class;?></span>  
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                     <?php endwhile; ?>
                </div> 

                  <?php 
                    else:
                    echo "Sorry !! We dont found any post here";
                    endif;
                    ?>
                    
                    
                
            
    	<!--portfolio end-->


	<?php 
  
}

class portfolio_styles{

	public function __construct(){
		add_action('wp_enqueue_scripts',array($this,'enqueue'));
	}

	public function enqueue(){

		/*** custom Iinks ***/
		
		wp_enqueue_style('bootstrap',plugins_url('assets/css/bootstrap.min.css',__FILE__));
		wp_enqueue_style('main',plugins_url('assets/css/main.css',__FILE__));


		wp_enqueue_script('bootstrap', plugin_dir_url( __FILE__ ) . 'assets/js/bootstrap.min.js', array('jquery'), '', true);
		wp_enqueue_script('carousel', plugin_dir_url( __FILE__ ) . 'assets/js/owl.carousel.min.js', array('jquery'), '', true);
		wp_enqueue_script('isotope', plugin_dir_url( __FILE__ ) . 'assets/js/isotope.pkgd.min.js', array('jquery'), '', true);
		
		wp_enqueue_script('main', plugin_dir_url( __FILE__ ) . 'assets/js/main.js', array('jquery','bootstrap','carousel','isotope'), '', true);


	}
}

new portfolio_styles;

?>