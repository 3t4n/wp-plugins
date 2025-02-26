<?php
/*
Plugin Name: Article Gallery Slider
Plugin URL: http://beautiful-module.com/demo/article-gallery-slider/
Description: A simple Responsive Article Gallery Slider
Version: 1.0
Author: Module Express
Author URI: http://beautiful-module.com
Contributors: Module Express
*/
/*
 * Register CPT sp_article.gallery
 *
 */
if(!class_exists('Article_Gallery_Slider')) {
	class Article_Gallery_Slider {

		function __construct() {
		    if(!function_exists('add_shortcode')) {
		            return;
		    }
			add_action ( 'init' , array( $this , 'cgs_responsive_gallery_setup_post_types' ));

			/* Include style and script */
			add_action ( 'wp_enqueue_scripts' , array( $this , 'cgs_register_style_script' ));
			
			/* Register Taxonomy */
			add_action ( 'init' , array( $this , 'cgs_responsive_gallery_taxonomies' ));
			add_action ( 'add_meta_boxes' , array( $this , 'cgs_rsris_add_meta_box_gallery' ));
			add_action ( 'save_post' , array( $this , 'cgs_rsris_save_meta_box_data_gallery' ));
			register_activation_hook( __FILE__, 'cgs_responsive_gallery_rewrite_flush' );


			// Manage Category Shortcode Columns
			add_filter ( 'manage_responsive_cgs_slider-category_custom_column' , array( $this , 'cgs_responsive_gallery_category_columns' ), 10, 3);
			add_filter ( 'manage_edit-responsive_cgs_slider-category_columns' , array( $this , 'cgs_responsive_gallery_category_manage_columns' ));
			require_once( 'cgs_gallery_admin_settings_center.php' );
		    add_shortcode ( 'sp_article.gallery' , array( $this , 'cgs_responsivegallery_shortcode' ));
		}


		function cgs_responsive_gallery_setup_post_types() {

			$responsive_gallery_labels =  apply_filters( 'sp_article_gallery_labels', array(
				'name'                => 'Article Gallery Slider',
				'singular_name'       => 'Article Gallery Slider',
				'add_new'             => __('Add New', 'sp_article_gallery'),
				'add_new_item'        => __('Add New Image', 'sp_article_gallery'),
				'edit_item'           => __('Edit Image', 'sp_article_gallery'),
				'new_item'            => __('New Image', 'sp_article_gallery'),
				'all_items'           => __('All Images', 'sp_article_gallery'),
				'view_item'           => __('View Image', 'sp_article_gallery'),
				'search_items'        => __('Search Image', 'sp_article_gallery'),
				'not_found'           => __('No Image found', 'sp_article_gallery'),
				'not_found_in_trash'  => __('No Image found in Trash', 'sp_article_gallery'),
				'parent_item_colon'   => '',
				'menu_name'           => __('Article Gallery Slider', 'sp_article_gallery'),
				'exclude_from_search' => true
			) );


			$responsiveslider_args = array(
				'labels' 			=> $responsive_gallery_labels,
				'public' 			=> true,
				'publicly_queryable'		=> true,
				'show_ui' 			=> true,
				'show_in_menu' 		=> true,
				'query_var' 		=> true,
				'capability_type' 	=> 'post',
				'has_archive' 		=> true,
				'hierarchical' 		=> false,
				'menu_icon'   => 'dashicons-format-gallery',
				'supports' => array('title','editor','thumbnail')
				
			);
			register_post_type( 'sp_article_gallery', apply_filters( 'sp_faq_post_type_args', $responsiveslider_args ) );

		}
		
		function cgs_register_style_script() {
		    wp_enqueue_style( 'cgs_responsiveimgslider',  plugin_dir_url( __FILE__ ). 'css/responsiveimgslider.css' );
			/*   REGISTER ALL CSS FOR SITE */
						
			wp_enqueue_style( 'cgs_owl.carousel',  plugin_dir_url( __FILE__ ). 'css/owl.carousel.css' );
			wp_enqueue_style( 'cgs_owl.theme',  plugin_dir_url( __FILE__ ). 'css/owl.theme.css' );
			wp_enqueue_style( 'cgs_article-gallery-slider',  plugin_dir_url( __FILE__ ). 'css/article-gallery-slider.css' );
			

			/*   REGISTER ALL JS FOR SITE */	
			wp_enqueue_script( 'cgs_owl.carousel', plugin_dir_url( __FILE__ ) . 'js/owl.carousel.js', array( 'jquery' ));
		}
		
		
		function cgs_responsive_gallery_taxonomies() {
		    $labels = array(
		        'name'              => _x( 'Category', 'taxonomy general name' ),
		        'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
		        'search_items'      => __( 'Search Category' ),
		        'all_items'         => __( 'All Category' ),
		        'parent_item'       => __( 'Parent Category' ),
		        'parent_item_colon' => __( 'Parent Category:' ),
		        'edit_item'         => __( 'Edit Category' ),
		        'update_item'       => __( 'Update Category' ),
		        'add_new_item'      => __( 'Add New Category' ),
		        'new_item_name'     => __( 'New Category Name' ),
		        'menu_name'         => __( 'Gallery Category' ),
		    );

		    $args = array(
		        'hierarchical'      => true,
		        'labels'            => $labels,
		        'show_ui'           => true,
		        'show_admin_column' => true,
		        'query_var'         => true,
		        'rewrite'           => array( 'slug' => 'responsive_cgs_slider-category' ),
		    );

		    register_taxonomy( 'responsive_cgs_slider-category', array( 'sp_article_gallery' ), $args );
		}

		function cgs_responsive_gallery_rewrite_flush() {  
				cgs_responsive_gallery_setup_post_types();
		    flush_rewrite_rules();
		}


		function cgs_responsive_gallery_category_manage_columns($theme_columns) {
		    $new_columns = array(
		            'cb' => '<input type="checkbox" />',
		            'name' => __('Name'),
		            'gallery_cgs_shortcode' => __( 'Gallery Category Shortcode', 'cgs_slick_slider' ),
		            'slug' => __('Slug'),
		            'posts' => __('Posts')
					);

		    return $new_columns;
		}

		function cgs_responsive_gallery_category_columns($out, $column_name, $theme_id) {
		    $theme = get_term($theme_id, 'responsive_cgs_slider-category');

		    switch ($column_name) {      
		        case 'title':
		            echo get_the_title();
		        break;
		        case 'gallery_cgs_shortcode':
					echo '[sp_article.gallery cat_id="' . $theme_id. '"]';			  	  

		        break;
		        default:
		            break;
		    }
		    return $out;   

		}

		/* Custom meta box for slider link */
		function cgs_rsris_add_meta_box_gallery() {
			add_meta_box('custom-metabox',__( 'LINK URL', 'link_textdomain' ),array( $this , 'cgs_rsris_gallery_box_callback' ),'sp_article_gallery');			
		}
		
		function cgs_rsris_gallery_box_callback( $post ) {
			wp_nonce_field( 'cgs_rsris_save_meta_box_data_gallery', 'rsris_meta_box_nonce' );
			$value = get_post_meta( $post->ID, 'rsris_cgs_link', true );
			echo '<input type="url" id="rsris_cgs_link" name="rsris_cgs_link" value="' . esc_attr( $value ) . '" size="80" /><br />';
			echo 'ie http://www.google.com';
		}
		
		function cgs_truncate($string, $length = 100, $append = "&hellip;")
		{
			$string = trim($string);
			if (strlen($string) > $length)
			{
				$string = wordwrap($string, $length);
				$string = explode("\n", $string, 2);
				$string = $string[0] . $append;
			}

			return $string;
		}
			
		function cgs_rsris_save_meta_box_data_gallery( $post_id ) {
			if ( ! isset( $_POST['rsris_meta_box_nonce'] ) ) {
				return;
			}
			if ( ! wp_verify_nonce( $_POST['rsris_meta_box_nonce'], 'cgs_rsris_save_meta_box_data_gallery' ) ) {
				return;
			}
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
			}
			if ( isset( $_POST['post_type'] ) && 'sp_article_gallery' == $_POST['post_type'] ) {

				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return;
				}
			} else {

				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return;
				}
			}
			if ( ! isset( $_POST['rsris_cgs_link'] ) ) {
				return;
			}
			$link_data = sanitize_text_field( $_POST['rsris_cgs_link'] );
			update_post_meta( $post_id, 'rsris_cgs_link', $link_data );
		}
		
		/*
		 * Add [sp_article.gallery] shortcode
		 *
		 */
		function cgs_responsivegallery_shortcode( $atts, $content = null ) {
			
			extract(shortcode_atts(array(
				"limit"  => '',
				"cat_id" => '',
				"width" => '',
				"autoplay_interval" => '',
				"items" => ''
			), $atts));
			
			if( $limit ) { 
				$posts_per_page = $limit; 
			} else {
				$posts_per_page = '-1';
			}
			if( $cat_id ) { 
				$cat = $cat_id; 
			} else {
				$cat = '';
			}
			
			if( $width ) { 
				$width_slider = $width . "px"; 
			} else {
				$width_slider = '100%';
			}	 	
			
			if( $autoplay_interval ) { 
				$autoplay_intervalslider = $autoplay_interval; 
			} else {
				$autoplay_intervalslider = '4000';
			}
			
			if( $items ) { 
				$items_slider = $items; 
			} else {
				$items_slider = '3';
			}			

			ob_start();
			// Create the Query
			$post_type 		= 'sp_article_gallery';
			$orderby 		= 'post_date';
			$order 			= 'DESC';
						
			 $args = array ( 
		            'post_type'      => $post_type, 
		            'orderby'        => $orderby, 
		            'order'          => $order,
		            'posts_per_page' => $posts_per_page,  
		           
		            );
			if($cat != ""){
		            	$args['tax_query'] = array( array( 'taxonomy' => 'responsive_cgs_slider-category', 'field' => 'id', 'terms' => $cat) );
		            }        
		      $query = new WP_Query($args);

			$post_count = $query->post_count;
			$i = 1;

			if( $post_count > 0) :
			?>
				<div style="width:<?php echo $width_slider; ?>;">
					<div class="cgs_gallery_container">
						<a href="javascript:;" class="cgs_nav_slider prev_slider">&nbsp;</a>
						<a href="javascript:;" class="cgs_nav_slider next_slider">&nbsp;</a>
						<div id="cgs_gallery_slider" class="owl-carousel owl-theme">
						<?php								
							while ($query->have_posts()) : $query->the_post();
								include('designs/template.php');
								
							$i++;
							endwhile;									
						?>
					  </div>
				  </div>
				</div>
			<?php
				endif;
				// Reset query to prevent conflicts
				wp_reset_query();
			?>							
			<script type="text/javascript">
				jQuery(document).ready(function ($) {
					var owl = $("#cgs_gallery_slider");
					owl.owlCarousel({
						autoPlay: <?php echo $autoplay_intervalslider; ?>,
						items : <?php echo $items_slider; ?>, //10 items above 1000px browser width
						itemsDesktop : [1199,3],
						itemsTablet: [600,2], //2 items between 600 and 0
						itemsDesktopSmall : [900,3],// betweem 900px and 601px
						itemsMobile		:[479,2],
						pagination:true,
					  });
					
					$(".cgs_gallery_container .next_slider").click(function(){
						owl.trigger('owl.next');
					});
					$(".cgs_gallery_container .prev_slider").click(function(){
						owl.trigger('owl.prev');
					});
	
				});

			</script>
			<?php
			return ob_get_clean();
		}		
	}
}
	
function cgs_master_gallery_images_load() {
        global $mfpd;
        $mfpd = new Article_Gallery_Slider();
}
add_action( 'plugins_loaded', 'cgs_master_gallery_images_load' );