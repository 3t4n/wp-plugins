<?php
/**
 * Plugin Name:       Netroics Blog Posts Grid
 * Plugin URI:        https://wordpress.org/plugins/netroics-blog-posts-grid/
 * Description:       Netroics is a wordpress Blog Posts Griding system Plugin. This plugin give you more flexibility to you easily handle the blog posts with wp blog grid.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Murad Hossain
 * Author URI:        https://netroics.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       netroicstp
 */



require_once 'inc/functions.php';
require_once 'inc/netroics-dynamic-style.php';

 /**
 * Netroics enqueue scripts and styles
 */

function netroicstp__enqueue_scripts() {
    wp_enqueue_style( 'etroicstp-style', plugin_dir_url(__FILE__). 'css/netroicstp-style.css' );
    wp_enqueue_style( 'etroicstp-font-awesome-min', plugin_dir_url(__FILE__). 'css/netroicstp-font-awesome.min.css' );
    // wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'netroicstp__enqueue_scripts' );

/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */
function netroicstp_custom_admin_style() {
    //wp_register_style( 'netroicstp_admin_style', plugin_dir_url(__FILE__). 'css/netroicstp-admin-style.css' );
    wp_enqueue_style('netroicstp_admin_style', plugins_url('css/netroicstp-admin-style.css',  __FILE__ )  );
    wp_enqueue_style( 'netroicstp_admin_style' );
}
add_action( 'admin_enqueue_scripts', 'netroicstp_custom_admin_style' );


// Netroics Color Picker

add_action( 'admin_enqueue_scripts', 'netroicstp_enqueue_color_picker' );
function netroicstp_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('js/my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
    
    wp_enqueue_script( 'iris', admin_url( 'js/iris.min.js' ), array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), false, 1 );
    wp_enqueue_script( 'cp-active', plugins_url('/js/cp-active.js', __FILE__), array('jquery'), '', true );
    
    }

// netroicstp custom post type

    if ( ! function_exists('netroicstp_custom_post') ) {

        // Register Custom Post Type
        function netroicstp_custom_post() {
        
            $labels = array(
                'name'                  => _x( 'Netroicstp Post', 'Post Type General Name', 'netroicstp' ),
                'singular_name'         => _x( 'Netroicstp Post Type', 'Post Type Singular Name', 'netroicstp' ),
                'menu_name'             => __( 'Netroics Posts', 'netroicstp' ),
                'name_admin_bar'        => __( 'Post Type', 'netroicstp' ),
                'archives'              => __( 'Item Archives', 'netroicstp' ),
                'attributes'            => __( 'Item Attributes', 'netroicstp' ),
                'parent_item_colon'     => __( 'Parent Item:', 'netroicstp' ),
                'all_items'             => __( 'All Items', 'netroicstp' ),
                'add_new_item'          => __( 'Add New Item', 'netroicstp' ),
                'add_new'               => __( 'Add New', 'netroicstp' ),
                'new_item'              => __( 'New Item', 'netroicstp' ),
                'edit_item'             => __( 'Edit Item', 'netroicstp' ),
                'update_item'           => __( 'Update Item', 'netroicstp' ),
                'view_item'             => __( 'View Item', 'netroicstp' ),
                'view_items'            => __( 'View Items', 'netroicstp' ),
                'search_items'          => __( 'Search Item', 'netroicstp' ),
                'not_found'             => __( 'Not found', 'netroicstp' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'netroicstp' ),
                'featured_image'        => __( 'Featured Image', 'netroicstp' ),
                'set_featured_image'    => __( 'Set featured image', 'netroicstp' ),
                'remove_featured_image' => __( 'Remove featured image', 'netroicstp' ),
                'use_featured_image'    => __( 'Use as featured image', 'netroicstp' ),
                'insert_into_item'      => __( 'Insert into item', 'netroicstp' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'netroicstp' ),
                'items_list'            => __( 'Items list', 'netroicstp' ),
                'items_list_navigation' => __( 'Items list navigation', 'netroicstp' ),
                'filter_items_list'     => __( 'Filter items list', 'netroicstp' ),
            );
            $args = array(
                'label'                 => __( 'Netroicstp Post Type', 'netroicstp' ),
                'description'           => __( 'netroicstp Post Description', 'netroicstp' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'editor', 'thumbnail' ),
                'taxonomies'            => array( 'category', 'post_tag' ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'menu_position'         => 5,
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'page',
            );
            register_post_type( 'netroicstp', $args );
        
        }
        add_action( 'init', 'netroicstp_custom_post', 0 );
        
        }


// netroicstp posts loop

function netroicstp__custom_posts_loop() {?>


<!-- Start features Lists section -->
<div class="features__lists_main">
<?php 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$data= new WP_Query(array(
    'post_type'=>'netroicstp', 
    'posts_per_page' => get_option('netroics__blog_posts_number'),
    'paged' => $paged,
));

if($data->have_posts()) : ?>
    <div class="features__lists">

    <?php while($data->have_posts())  : $data->the_post(); ?>
        <div class="feature__single">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full')?>" alt="img">
            <div class="feature_single_details">
                <a href="<?php echo get_the_permalink()?>"><h3><?php the_title();?></h3></a>
                <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
            </div>
        </div>

<?php endwhile; ?>

</div>

<div class="netroicstp_pagination">


<?php
    $total_pages = $data->max_num_pages;

    if ($total_pages > 1){

        $current_page = max(1, get_query_var('paged'));
        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text'    => __('« Prev'),
            'next_text'    => __('Next »'),
        ));
    }

    ?>  
        
</div>

<?php else :?>
<h3><?php _e('404 Error&#58; Not Found', ''); ?></h3>

<?php endif;

wp_reset_postdata();?>

</div>
<!-- End features Lists section -->


<?php
}

// Netroicstp added custom shortcode

function netroicstp_custom_shortcode() {
    add_shortcode( 'NetroicsPosts', 'netroicstp__custom_posts_loop' );
}

add_action( 'init', 'netroicstp_custom_shortcode' );

// Netroicstp Redirect to plugin setting page

register_activation_hook(__FILE__, 'netroicstp_plugin_activation');
add_action('admin_init', 'netroicspt_plugin_redirect');

function netroicstp_plugin_activation() {
    add_option('netroicstp_plugin_activation_redirect', true);
}

function netroicspt_plugin_redirect() {
    if(get_option('netroicstp_plugin_activation_redirect', false)) {
        delete_option('netroicstp_plugin_activation_redirect');
        if(!isset($_GET['activate-multi'])) {
            wp_redirect("edit.php?post_type=netroicstp");
        }
    }
}

