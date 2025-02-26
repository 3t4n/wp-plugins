<?php
/**
* Plugin Name: All in One News Scroll
* Description: All in One News Scroll plugin can create vertical scroll news. Using shortcode as well as by Widget in any page or post. Shortcode - [allinone-news] .
* Version: 1.12
* Author: omikant
* Author URI: https://profiles.wordpress.org/omikant
* License: GPL2
*/

include( plugin_dir_path( __FILE__ ) . 'scroller-setting.php');

function wpclcl_news_list() {
  $labels = array(
    'name'               => _x( 'News & Updates', 'post type general name' ),
    'singular_name'      => _x( 'News & Update', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'News & Update' ),
    'add_new_item'       => __( 'Add New News & Update' ),
    'edit_item'          => __( 'Edit News & Update' ),
    'new_item'           => __( 'New News & Update' ),
    'all_items'          => __( 'All News & Update' ),
    'view_item'          => __( 'View News & Update' ),
    'search_items'       => __( 'Search News & Update' ),
    'not_found'          => __( 'No News & Update found' ),
    'not_found_in_trash' => __( 'No News & Update found in the Trash' ), 
    'menu_name'          => 'News & Updates'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our News & Update specific data',
    'public'        => true,
    'menu_position' => 5,
    'menu_icon'     => 'dashicons-welcome-view-site',
    'supports'      => array( 'title', 'thumbnail', 'editor' ),
    'has_archive'   => true,
  );
  register_post_type( 'news_updates', $args ); 
}
add_action( 'init', 'wpclcl_news_list' );

//hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires

add_action( 'init', 'create_news_updates_taxonomy', 0 );

function create_news_updates_taxonomy() {

// Labels part for the GUI

  $labels = array(
    'name' => _x( 'Category', 'taxonomy general name' ),
    'singular_name' => _x( 'Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Category' ),
    'popular_items' => __( 'Popular Category' ),
    'all_items' => __( 'All Category' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Category' ), 
    'update_item' => __( 'Update Category' ),
    'add_new_item' => __( 'Add New Category' ),
    'new_item_name' => __( 'New Category Name' ),
    'separate_items_with_commas' => __( 'Separate Category with commas' ),
    'add_or_remove_items' => __( 'Add or remove Category' ),
    'choose_from_most_used' => __( 'Choose from the most used Category' ),
    'menu_name' => __( 'Category' ),
  ); 

// Now register the non-hierarchical taxonomy like tag

  register_taxonomy('news_category','news_updates',array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'categories' ),
  ));
}


// create shortcode to list all Testimonials which come in blue
add_shortcode( 'allinone-news', 'wpclcl_news_query_list' );
function wpclcl_news_query_list( $atts ) {
    ob_start();
    $query = new WP_Query( array(
        'post_type' => 'news_updates',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'rand',
    ) );
    if ( $query->have_posts() ) { ?>
		<div class="vticker">
			<ul>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<li class="item-event"  id="post-<?php the_ID(); ?>">
					<div class="news-event">
						<div class="news_title">
							<h3><?php the_title(); ?></h3>
							<p><?php the_content(); ?></p>
						</div>
					</div>
				</li>
				<?php endwhile;
				wp_reset_postdata(); ?>
			</ul>
        </div>
    <?php $myvariable_news = ob_get_clean();
    return $myvariable_news;
    }
}
// create shortcode to list all Testimonials which come in blue
add_shortcode( 'allinone-news-category', 'wpclcl_news_query_list_category' );
function wpclcl_news_query_list_category( $atts ) {
    ob_start();
	
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'type' => 'news_updates',
        'order' => 'date',
        'orderby' => 'rand',
        'posts' => -1,
        'category' => '',
    ), $atts ) );
	
    $query = new WP_Query( array(
        'post_type' => 'news_updates',
        'posts_per_page' => -1,
        'order' => $order,
        'orderby' => $orderby,
        'news_category' => $category,
    ) );
    if ( $query->have_posts() ) { ?>
		<div class="vticker">
			<ul>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<li class="item-event"  id="post-<?php the_ID(); ?>">
					<div class="news-event">
						<div class="news_title">
							<h3><?php the_title(); ?></h3>
							<p><?php the_content(); ?></p>
						</div>
					</div>
				</li>
				<?php endwhile;
				wp_reset_postdata(); ?>
			</ul>
        </div>
    <?php $myvariable_news1 = ob_get_clean();
    return $myvariable_news1;
    }
}


add_action('wp_footer', 'wpclcl_news_register_scripts');
function wpclcl_news_register_scripts() {
    if (!is_admin()) { ?>
	
	
	<script type="text/javascript">
		jQuery(document).ready(function(){
		
		<?php 	
			$options = get_option('scroller_setting_settings');
			$direction = $options['scroller_setting_select_field_0']; 
			$interval  = $options['scroller_setting_select_field_1']; 
			$visible   = $options['scroller_setting_select_field_2']; 
			
		?>
			var dd = jQuery('.vticker').easyTicker({
				direction: '<?php if($direction == 1){	echo 'up';	} else {echo 'down';} ?>',
				easing: 'easeInOutBack',
				speed: 'slow',
				interval: <?php echo $interval; ?>,
				height: 'auto',
				visible: <?php echo $visible; ?>,
				mousePause: <?php if($direction == 1){	echo 'true';	} else {echo 'false';} ?>,
				controls: {
					up: '.up',
					down: '.down',
					toggle: '.toggle',
					stopText: 'Stop !!!'
				}
			}).data('easyTicker');
			
			cc = 1;
			jQuery('.aa').click(function(){
				$('.vticker ul').append('<li>' + cc + ' Triangles can be made easily using CSS also without any images. This trick requires only div tags and some</li>');
				cc++;
			});
			
			jQuery('.vis').click(function(){
				dd.options['visible'] = 3;
				
			});
			
			jQuery('.visall').click(function(){
				dd.stop();
				dd.options['visible'] = 0 ;
				dd.start();
			});
			
		});
	</script>
		<?php 
        // register
        wp_register_script('wp_event_script', plugins_url('js/jquery.easing.min.js', __FILE__));
        wp_register_script('wp_ticker_script', plugins_url('js/jquery.easy-ticker.js', __FILE__));
		// enqueue
        wp_enqueue_script('wp_event_script');
        wp_enqueue_script('wp_ticker_script');
        wp_enqueue_script( 'jquery' );
		
    }
}


// Creating the widget 
class allinone_news_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'allinone_news_widget', 

// Widget name will appear in UI
__('News & Updates Widget', 'wpb_widget_domain'), 

// Widget description
array( 'description' => __( 'Widget for News & Updates', 'wpb_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
    $listings = new WP_Query();
		$listings->query('post_type=news_updates&posts_per_page=3' );	
		if($listings->found_posts > 0) {
			echo '<div class="vticker"><ul>';
				while ($listings->have_posts()) {
					$listings->the_post(); ?>
					<li class="event_li">
						<div class="ul_news">
							<?php the_title(); ?>
						</div> 
					</li>
					<?php 
				}
			echo '</ul></div>';
			wp_reset_postdata(); 
		}else{
			echo '<p style="padding:25px;">No News are there. </p>';
		}
	

echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class allinone_news_widget ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'allinone_news_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );


	
?>
