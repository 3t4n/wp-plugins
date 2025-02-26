<?php
/* Plugin Name: Aidsys Latest News
 * Plugin URI: https://github.com/jomonthomaslobo/latest-news/blob/main/aidsys-news-listing.zip
 * Description: Display the latest news articles on your website.
 * Version: 1.3
 * Author: Jomon Thomas Lobo
 * Author URI: https://jomonthomaslobo.github.io/gitprofile/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: aidsys-news-listing
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Enqueue scripts and styles
function aidsys_news_ticker_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_style('news-ticker-style', plugin_dir_url(__FILE__) . 'css/news-ticker.css', array(), '1.0.0');
    wp_enqueue_script('news-ticker-script', plugin_dir_url(__FILE__) . 'js/news-ticker.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'aidsys_news_ticker_scripts');
/**
 *  Register the "news" custom post type
 */

function aidsys_news_setup_post_type(){
    register_post_type('news',['public'=>true,'show_ui' => true,'label'=>'Latest News','show_in_menu'=>true]) ;

}
add_action('init','aidsys_news_setup_post_type');

/** Activation Hook */
function aidsys_news_activated(){
    //Register latest news post type
    aidsys_news_setup_post_type() ;
    //Clear Permalinks after post type registration
    flush_rewrite_rules() ;
}

register_activation_hook(__FILE__, 'aidsys_news_activated' );

/** Deactivation Hook */
function aidsys_news_deactivated(){
    //Un Register Post Type
    unregister_post_type( 'news' );
    //Clear Permalinks 
    flush_rewrite_rules() ;
}

register_deactivation_hook( __FILE__, 'aidsys_news_deactivated' );
// Register shortcode for news ticker panel

function aidsys_news_ticker_panel_shortcode($atts) {
    // Shortcode attributes
    $atts = shortcode_atts(array(
        'post_type' => 'news', // Default post type
        'limit' => -1, // Display all posts by default
    ), $atts);

    // Query arguments
    $args = array(
        'post_type' => $atts['post_type'],
        'posts_per_page' => $atts['limit'],
        'order' => 'DESC', // Display latest posts first
    );

    // Fetch posts
    $query = new WP_Query($args);

    // Output news ticker HTML
    ob_start(); // Start output buffering
    ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Latest News</h3>
        </div>
        <div class="panel-body">
            <div id="news-ticker-panel">
                <marquee direction =up scrollamount=2 onmouseover="this.stop();" onmouseout="this.start();">
                    <ul class="list-group">

                        <?php
                        if ($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post();
                                ?>
                                <li class="list-group-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                               <hr/>
                               <?php
                            endwhile;
                        endif;
                        wp_reset_postdata(); // Reset post data
                        ?>
                    </ul>
                </marquee>
              
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean(); // Return the buffered content
}
add_shortcode('aidsys_news_ticker_panel', 'aidsys_news_ticker_panel_shortcode');




       
