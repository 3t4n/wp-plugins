<?php
	/*
	Plugin Name: Kento Latest Tabs
	Plugin URI: https://pluginspoint.com
	Description: Display Latest/Updated/Popular Posts, Recent Posts, and Comments on the sidebar.
	Version: 1.5
	Author: pluginspoint
	Author URI: https://pluginspoint.com/
	License: GPLv2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
	Text Domain: kento-latest-tabs
	*/

	if ( ! defined( 'ABSPATH' ) ) {
	    exit; // Exit if accessed directly
	}

	// Define plugin constants
	define( 'KENTO_LATEST_TABS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
	define( 'KENTO_LATEST_TABS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

	// Enqueue styles and scripts
	function kento_latest_tabs_scripts() {
	    wp_enqueue_style(
	        'kento-latest-tabs-style',
	        KENTO_LATEST_TABS_PLUGIN_URL . 'css/style.css',
	        array(),
	        '1.5'
	    );

	    wp_enqueue_script(
	        'kento-highlight',
	        KENTO_LATEST_TABS_PLUGIN_URL . 'js/kento-highlight.js',
	        array( 'jquery' ),
	        '1.5',
	        true
	    );

	    wp_localize_script(
	        'kento-highlight',
	        'MyAjax',
	        array(
	            'ajaxurl' => admin_url( 'admin-ajax.php' ),
	        )
	    );
	}
	add_action( 'wp_enqueue_scripts', 'kento_latest_tabs_scripts' );

	// Load plugin text domain for translations
	function kento_latest_tabs_load_textdomain() {
	    load_plugin_textdomain( 'kento-latest-tabs', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
	add_action( 'plugins_loaded', 'kento_latest_tabs_load_textdomain' );


	class Kento_Latest_Tabs_Plugin extends WP_Widget {

	    public function __construct() {
	        $widget_ops = array(
	            'classname'   => 'kento_latest_tabs_plugin',
	            'description' => __('A widget to display Popular posts, latest posts, and latest comments.', 'kento-latest-tabs')
	        );

	        parent::__construct(
	            'kento_latest_tabs_widget',
	            __('Kento Latest Tabs Widget', 'kento-latest-tabs'),
	            $widget_ops
	        );
	    }

	    public function widget( $args, $instance ) {
	        $title = isset($instance['title']) ? $instance['title'] : __('Latest Tabs', 'kento-latest-tabs');
	        $limit = isset($instance['limit']) && is_numeric($instance['limit']) ? (int) $instance['limit'] : 5;

	        // Queries for Popular and Recent posts
	        $popular_posts_args = array(
	            'posts_per_page'      => $limit,
	            'no_found_rows'       => true,
	            'post_status'         => 'publish',
	            'orderby'             => 'comment_count',
	            'ignore_sticky_posts' => true,
	        );
	        $popular_posts_query = new WP_Query($popular_posts_args);

	        $recent_posts_args = array(
	            'posts_per_page'      => $limit,
	            'no_found_rows'       => true,
	            'post_status'         => 'publish',
	            'ignore_sticky_posts' => true,
	        );
	        $recent_posts_query = new WP_Query($recent_posts_args);

	        echo $args['before_widget'];
	        if (!empty($title)) {
	            echo $args['before_title'] . esc_html($title) . $args['after_title'];
	        }

			// Retrieve the option values and assign defaults if empty
			$pop_title = get_option('kento_latest_tabs_pop_title');
			$pop_title = !empty($pop_title) ? $pop_title : __('Popular', 'kento-latest-tabs');

			$rp_title = get_option('kento_latest_tabs_rp_title');
			$rp_title = !empty($rp_title) ? $rp_title : __('Recent', 'kento-latest-tabs');

			$lc_title = get_option('kento_latest_tabs_lc_title');
			$lc_title = !empty($lc_title) ? $lc_title : __('Comments', 'kento-latest-tabs');

	        ?>

			<?php
			// Retrieve the settings values from the WordPress options
			$active_color 	= get_option('kento_latest_tabs_active');
			$hover_color 	= get_option('kento_latest_tabs_hover');
			$kento_tm_style = get_option('kento_thumb_style');

			// Check if either active or hover color is set
			if ( $active_color || $hover_color ) {
			    ?>
			    <style>
			        /* Active tab background color */
			        #kento-highlight-widget ul.tabs li.active a {
			            background-color: <?php echo esc_attr($active_color); ?> !important;
			        }

			        /* Active tab hover background color */
			        #kento-highlight-widget ul.tabs li.active:hover a {
			            background-color: <?php echo esc_attr($active_color); ?> !important;
			        }

			        /* Hover tab background color */
			        #kento-highlight-widget ul.tabs li a:hover {
			            background-color: <?php echo esc_attr($hover_color); ?> !important;
			        }

			        /* Thumbnail style customization */
			        <?php if ($kento_tm_style == 1) { ?>
			            #kento-highlight-widget .kento-post-thumbnail img {
			                border-radius: 0%;
			            }
			        <?php } elseif ($kento_tm_style == 2) { ?>
			            #kento-highlight-widget .kento-post-thumbnail img {
			                border-radius: 50%;
			                display: block;
			                overflow: hidden;
			            }
			        <?php } ?>
			    </style>
			    <?php
			}
			?>

	        <div id="kento-highlight-widget">
	            <div class="widget-container">
	                <div class="widget-top">
						<ul class="tabs post-tabs">
						    <li class="tabs active"><a class="tab1"><?php echo esc_html($pop_title); ?></a></li>
						    <li class="tabs"><a class="tab2"><?php echo esc_html($rp_title); ?></a></li>
						    <li class="tabs"><a class="tab3"><?php echo esc_html($lc_title); ?></a></li>
						</ul>
	                </div>

	                <div id="tab1" class="tabs-wrap" style="display:block;">
	                    <ul>
	                        <?php if ($popular_posts_query->have_posts()) : ?>
	                            <?php while ($popular_posts_query->have_posts()) : $popular_posts_query->the_post(); ?>
	                                <li>
	                                    <div class="kento-post-thumbnail">
	                                        <?php if (has_post_thumbnail()) : ?>
	                                            <?php the_post_thumbnail('thumbnail'); ?>
	                                        <?php else : ?>
	                                            <img src="<?php echo esc_url(plugins_url('css/images/images.png', __FILE__)); ?>" alt="<?php esc_attr_e('No image', 'kento-latest-tabs'); ?>" />
	                                        <?php endif; ?>
	                                    </div>
	                                    <div class="kento-post-details">
	                                    	<div class="post-title">
	                                        	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	                                    	</div>
	                                    	<div class="post-meta">
												<?php
												// Get the number of comments
												$comments_count = get_comments_number();

												// Check the number of comments and display the appropriate message
												if ($comments_count == 0) {
												    echo __('no comments', 'kento-latest-tabs');
												} elseif ($comments_count == 1) {
												    echo __('one comment', 'kento-latest-tabs');
												} else {
												    // Display the number of comments
												    printf(__(' % comments', 'kento-latest-tabs'), $comments_count);
												}
												?>
	                                    	</div>
	                                    </div>
	                                </li>
	                            <?php endwhile; ?>
	                        <?php endif; ?>
	                        <?php wp_reset_postdata(); ?>
	                    </ul>
	                </div>

	                <div id="tab2" class="tabs-wrap" style="display:none;">
	                    <ul>
	                        <?php if ($recent_posts_query->have_posts()) : ?>
	                            <?php while ($recent_posts_query->have_posts()) : $recent_posts_query->the_post(); ?>
	                                <li>
	                                    <div class="kento-post-thumbnail">
	                                        <?php if (has_post_thumbnail()) : ?>
	                                            <?php the_post_thumbnail('thumbnail'); ?>
	                                        <?php else : ?>
	                                            <img src="<?php echo esc_url(plugins_url('css/images/images.png', __FILE__)); ?>" alt="<?php esc_attr_e('No image', 'kento-latest-tabs'); ?>" />
	                                        <?php endif; ?>
	                                    </div>
	                                    <div class="kento-post-details">
	                                    	<div class="post-title">
	                                        	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	                                    	</div>
	                                    	<div class="post-meta">
	                                    		<span class="date"><?php the_time('d M, Y'); ?></span>
	                                    	</div>
	                                    </div>
	                                </li>
	                            <?php endwhile; ?>
	                        <?php endif; ?>
	                        <?php wp_reset_postdata(); ?>
	                    </ul>
	                </div>

	                <div id="tab3" class="tabs-wrap" style="display:none;">
	                    <ul>
	                        <?php
	                        $comments = get_comments(array(
	                            'status' => 'approve',
	                            'number' => $limit,
	                        ));
	                        foreach ($comments as $comment) : ?>
	                            <li>
	                                <div class="kento-post-thumbnail">
	                                    <?php echo get_avatar($comment, 60); ?>
	                                </div>
	                                <div class="kento-post-details">
	                                    <a href="<?php echo esc_url(get_permalink($comment->comment_post_ID) . '#comment-' . $comment->comment_ID); ?>">
	                                        <b><?php echo esc_html($comment->comment_author); ?>:</b>
	                                        <?php echo esc_html(wp_trim_words($comment->comment_content, 10, '...')); ?>
	                                    </a>
	                                </div>
	                            </li>
	                        <?php endforeach; ?>
	                    </ul>
	                </div>
	            </div>
	        </div>

	        <?php
	        echo $args['after_widget'];
	    }

	    public function update( $new_instance, $old_instance ) {
	        $instance = array();
	        $instance['title'] = !empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : '';
	        $instance['limit'] = !empty($new_instance['limit']) ? absint($new_instance['limit']) : 5;

	        return $instance;
	    }

	    public function form( $instance ) {
	        $title = isset($instance['title']) ? $instance['title'] : __('Latest Tabs', 'kento-latest-tabs');
	        $limit = isset($instance['limit']) ? $instance['limit'] : 5;
	        ?>
	        <p>
	            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
	                <?php esc_html_e('Title:', 'kento-latest-tabs'); ?>
	            </label>
	            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>" />
	        </p>
	        <p>
	            <label for="<?php echo esc_attr($this->get_field_id('limit')); ?>">
	                <?php esc_html_e('Limit Posts Number:', 'kento-latest-tabs'); ?>
	            </label>
	            <input type="number" class="widefat" id="<?php echo esc_attr($this->get_field_id('limit')); ?>" name="<?php echo esc_attr($this->get_field_name('limit')); ?>" value="<?php echo esc_attr($limit); ?>" />
	        </p>
	        <?php
	    }
	}

	//Register Latest Tab Widget
	if (!function_exists('kento_latest_tabs_plugin')) {
		function kento_latest_tabs_plugin() {
			register_widget( 'Kento_Latest_Tabs_Plugin' );
		}
		add_action( 'widgets_init', 'kento_latest_tabs_plugin' );
	}

	// Function to add the plugin settings page to the admin menu
	function kento_latest_tabs_admin_page() {
	    add_menu_page(
	        __('Kento Latest Tabs', 'kento-latest-tabs'),  // Page title
	        __('Kento Latest Tabs', 'kento-latest-tabs'),  // Menu title
	        'manage_options',                             // Capability required to access
	        'latesttabssettings',                         // Slug for the menu item
	        'kh_settings_page'                           // Function to display the page content
	    );
	}
	add_action('admin_menu', 'kento_latest_tabs_admin_page');

	// Function to render the settings page
	function kh_settings_page() {
	    include('admin-page.php');
	}

	// Register plugin settings
	function kento_latest_tabs_init() {
	    register_setting('kento_highlight_plugin_options', 'kento_latest_tabs_active');
	    register_setting('kento_highlight_plugin_options', 'kento_latest_tabs_hover');
	    register_setting('kento_highlight_plugin_options', 'kento_latest_tabs_pop_title');
	    register_setting('kento_highlight_plugin_options', 'kento_latest_tabs_rp_title');
	    register_setting('kento_highlight_plugin_options', 'kento_latest_tabs_lc_title');
	}
	add_action('admin_init', 'kento_latest_tabs_init');

	// Enqueue color picker and custom script
	function enqueue_color_picker($hook_suffix) {
	    // Make sure we only load the color picker on our plugin settings page
	    if ($hook_suffix !== 'toplevel_page_latesttabssettings') {
	        return;
	    }

	    // Enqueue WordPress color picker style and script
	    wp_enqueue_style('wp-color-picker');
	    wp_enqueue_script(
	        'my-script-handle',
	        KENTO_LATEST_TABS_PLUGIN_URL . 'js/pic-color.js',  // Ensure KENTO_LATEST_TABS_PLUGIN_URL is defined correctly
	        array('wp-color-picker'),
	        false,
	        true
	    );
	}
	add_action('admin_enqueue_scripts', 'enqueue_color_picker');