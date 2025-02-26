<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Required admin function files
require( plugin_dir_path( __FILE__ ) . '/options/register-options.php');
require( plugin_dir_path( __FILE__ ) . '/settings/settings-functions.php');
require( plugin_dir_path( __FILE__ ) . '/meta/meta-functions.php');
require( plugin_dir_path( __FILE__ ) . '/taxonomy/taxonomy-functions.php');


// Adds custom menu items to sermon menu
add_action('admin_menu', 'asp_setup_settings_menu');
function asp_setup_settings_menu() {
    add_submenu_page( 'edit.php?post_type=sermons', __('Settings', 'advanced-sermons'), __('Settings', 'advanced-sermons'), 'manage_options', 'asp-settings', 'asp_settings');

    // Show Buy Pro Version if pro version is not installed
    if (!is_plugin_active('advanced-sermons-pro/advanced-sermons-pro.php')) {
        add_submenu_page('edit.php?post_type=sermons', __('Buy Pro Version', 'advanced-sermons'), __('Buy Pro Version', 'advanced-sermons'), 'manage_options', 'asp_upgrade_redirect', 'asp_upgrade_redirect');
    }

    // Show Activate License if pro version is installed
    if ( is_plugin_active('advanced-sermons-pro/advanced-sermons-pro.php') ) {
        add_submenu_page( 'edit.php?post_type=sermons',  __('Manage License', 'advanced-sermons'), __('Manage License', 'advanced-sermons'), 'manage_options', 'asp-settings&page=asp-settings&tab=activate', 'asp_settings');
    }
}


// Handles redirect for Buy Pro Version submenu item above
function asp_upgrade_redirect() { ?>
	<script>
			window.location.href = 'https://advancedsermons.com/pricing/';
	</script>
	<?php
}


// Custom save changes option notice
function asp_custom_save_notice() {
    global $pagenow;
    if ( $pagenow == 'edit.php' ) {
        if ( isset( $_GET['settings-updated'] )) {
            add_settings_error( 'asp-notices', 'asp-settings-updated', __('Settings saved.', 'advanced-sermons'), 'updated' );
        }
    }
}
add_action('admin_notices', 'asp_custom_save_notice');


// Add ability to filter sermons by taxonomy from WordPress dashboard
function asp_sermon_taxonomy_filter_dropdowns() {
    global $typenow; // this variable stores the current custom post type
    if ( $typenow == 'sermons' ) { // choose one or more post types to apply taxonomy filter for them if( in_array( $typenow  array('post','games') )
        $taxonomy_names = array( 'sermon_series', 'sermon_speaker', 'sermon_topics', 'sermon_book');
        foreach ($taxonomy_names as $single_taxonomy) {
            $current_taxonomy = isset( $_GET[$single_taxonomy] ) ? $_GET[$single_taxonomy] : '';
            $taxonomy_object = get_taxonomy( $single_taxonomy );
            $taxonomy_name = $taxonomy_object->labels->name;
            $taxonomy_terms = get_terms( $single_taxonomy );
            if(count($taxonomy_terms) > 0) {
                echo "<select name='$single_taxonomy' id='$single_taxonomy' class='postform'>";
                echo '<option value="">' . __("All {$taxonomy_name}", "advanced-sermons") . '</option>';
                foreach ($taxonomy_terms as $single_term) {
                    echo '<option value='. $single_term->slug, $current_taxonomy == $single_term->slug ? ' selected="selected"' : '','>' . $single_term->name .' (' . $single_term->count .')</option>';
                }
                echo "</select>";
            }
        }
    }
}
add_action( 'restrict_manage_posts', 'asp_sermon_taxonomy_filter_dropdowns' );


// Add view count for sermons
function setSermonsViews($post_id) {
		$asp_disable_view_count = get_option( 'asp_general_disable_view_count' );
		if ( current_user_can( 'manage_options' ) ) {
		    // Do nothing
		} else {
		    $count_key = 'post_views_count';
		    $count = get_post_meta($post_id, $count_key, true);
		    if ( $count == '' ) {
		        $count = 0;
		        delete_post_meta($post_id, $count_key);
		        add_post_meta($post_id, $count_key, '0');
		    } else {
		        $count++;
		        update_post_meta($post_id, $count_key, $count);
		    }
		}
}
function getSermonsViews($post_id){
		$asp_disable_view_count = get_option( 'asp_general_disable_view_count' );
		if ( !empty( $asp_disable_view_count ) ) {
		    $count_key = 'post_views_count';
		    $count = get_post_meta($post_id, $count_key, true);
		    if ( empty( $count ) ) {
		        delete_post_meta($post_id, $count_key);
		        add_post_meta($post_id, $count_key, '0');
		        return __('0', 'advanced-sermons');
		    }
		    return $count;
		}
        return '0';
}


// Add sermon data (including views) to WordPress admin column
add_filter('manage_sermons_posts_columns', 'asp_sermons_column_data');
add_action('manage_sermons_posts_custom_column', 'asp_sermons_custom_column_data', 5, 2);

function asp_sermons_column_data($columns) {
    // Create a new array for the new column order
    $new_columns = array();
    global $asp_sermon_label;

    // Add the custom column before the 'Comments' column
    foreach ($columns as $key => $title) {
        if ($key === 'comments') {  // 'comments' is the key for the Comments column
            $new_columns['sermon_data'] = sprintf(__("%s Data", "advanced-sermons"), $asp_sermon_label);
        }
        $new_columns[$key] = $title;
    }

    return $new_columns;
}

function asp_sermons_custom_column_data($column_name, $id) {
    if ($column_name === 'sermon_data') {
        // Fetch video and audio types
        $sermonVideoType = get_post_meta($id, 'asp_sermon_video_type_select', true);
        $sermonAudioEmbed = get_post_meta($id, 'asp_sermon_audio_embed', true);
        $sermonMP4 = get_post_meta($id, 'asp_sermon_mp4', true);
        $asp_disable_view_count = get_option( 'asp_general_disable_view_count' );

        // Define custom labels for video types
        $videoTypeLabels = array(
            'youtube' => 'YouTube',
            'vimeo' => 'Vimeo',
            'facebook' => 'Facebook',
            'embed' => 'Embed',
            '' => '',
        );

        // Get the label for the video type, or default to the raw value if not found
        $videoTypeLabel = isset($videoTypeLabels[$sermonVideoType]) ? $videoTypeLabels[$sermonVideoType] : $sermonVideoType;

	    // Define custom labels for audio types
	    $audioTypeLabels = [];
	    if ($sermonMP4) {
		    $audioTypeLabels[] = 'File';
	    }
	    if ($sermonAudioEmbed) {
		    $audioTypeLabels[] = 'Embed';
	    }

	    $audioTypeLabel = implode(', ', $audioTypeLabels);

	    // Determine image label
	    // Determine image label
	    $imageLabel = ''; // Default label
	    if (has_post_thumbnail($id)) {
		    $imageLabel = 'Featured';
	    } else {
		    // Check if the default series image is enabled
		    $asp_single_sermon_default_series_image = get_option('asp_single_sermon_default_series_image');
		    if (!empty($asp_single_sermon_default_series_image)) {
			    $asp_sermon_series_terms = wp_get_post_terms($id, 'sermon_series');
			    if (!empty($asp_sermon_series_terms) && !is_wp_error($asp_sermon_series_terms)) {
				    // Assuming the series image is determined by the first term in the array
				    $asp_series_term = $asp_sermon_series_terms[0];
				    $asp_series_image_id = get_term_meta($asp_series_term->term_id, 'series-taxonomy-image-id', true);
				    if ($asp_series_image_id) {
					    $imageLabel = 'Series'; // Series image is assigned
				    }
			    }
		    }
	    }

        // Display video type
        echo 'Video: ' . esc_html($videoTypeLabel) . '<br>';

        // Display audio type
        echo 'Audio: ' . esc_html($audioTypeLabel) . '<br>';

	    // Display audio type
	    echo 'Image: ' . $imageLabel . '<br>';

        if ( !empty( $asp_disable_view_count ) ) {
            // Display views
            echo 'Views: ' . getSermonsViews($id);
        }
    }
}


// Include color picker assets to Advanced Sermons settings
add_action( 'admin_enqueue_scripts', 'asp_add_color_picker' );
function asp_add_color_picker( $hook ) {
    if ( is_admin() ) {
        // Add the color picker css file
        wp_enqueue_style( 'wp-color-picker' );
        // Include our custom jQuery file with WordPress Color Picker dependency
    }
}


// Handles the Advanced Sermons upload image engine
function asp_load_media_files() {
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'asp_load_media_files' );


// Creation of manage sermons admin bar quick links
add_action('admin_bar_menu', 'asp_admin_bar_manage_sermons', 70);
function asp_admin_bar_manage_sermons($admin_bar) {
    global $asp_speaker_label, $asp_topic_label, $asp_book_label, $asp_sermon_label;

    // Get the archive link URL
    $asp_archive_slug = get_option( 'asp_general_archive_slug' );
  	if ( !empty( $asp_archive_slug ) ) {
  			$asp_archive_slug = $asp_archive_slug;
  			$asp_archive_slug = strtolower("$asp_archive_slug");
  	} else {
  			$asp_archive_slug = 'sermons';
  	}
    if (get_option('permalink_structure')) {
  		  $asp_archive_slug = get_home_url() . "/" . $asp_archive_slug . "/";
  	} else {
  		  $asp_archive_slug = get_home_url() . "/?post_type=sermons";
  	}

		$asp_toolbar_menu = get_option( 'asp_general_toolbar_menu' );
		// Checks if remove toolbar menu has been enabled in the settings of Advanced Sermons
		if ( empty( $asp_toolbar_menu ) ) {
		    $admin_bar->add_menu( array(
		        'id'    => 'asp-sermons',
		        'title' => __("Manage" . " " . asp_sermon_plural( $asp_sermon_label ), "advanced-sermons"),
		        'href'  => '/wp-admin/edit.php?post_type=sermons',
		        'meta'  => array(
		            'title' => __("Manage" . " " . asp_sermon_plural( $asp_sermon_label ), "advanced-sermons"),
		        ),
		    ));
		    $admin_bar->add_menu( array(
		        'id'    => 'asp-sermons-all',
		        'parent' => 'asp-sermons',
		        'title' => __("All" . " " . asp_sermon_plural( $asp_sermon_label ), "advanced-sermons"),
		        'href'  => '/wp-admin/edit.php?post_type=sermons',
		        'meta'  => array(
		            'title' => __("All" . " " . asp_sermon_plural( $asp_sermon_label ), "advanced-sermons"),
		            'target' => '_self',
		            'class' => 'asp-sermons-all-link'
		        ),
		    ));
		    $admin_bar->add_menu( array(
		        'id'    => 'asp-sermons-new',
		        'parent' => 'asp-sermons',
		        'title' => __("Add New $asp_sermon_label", "advanced-sermons"),
		        'href'  => '/wp-admin/post-new.php?post_type=sermons',
		        'meta'  => array(
		            'title' => __("Add New $asp_sermon_label", "advanced-sermons"),
		            'target' => '_self',
		            'class' => 'asp-sermons-new-link'
		        ),
		    ));
				$admin_bar->add_menu( array(
						'id'    => 'asp-sermons-series',
						'parent' => 'asp-sermons',
						'title' => __('Series', 'advanced-sermons'),
						'href'  => '/wp-admin/edit-tags.php?taxonomy=sermon_series&post_type=sermons',
						'meta'  => array(
								'title' => __('Series', 'advanced-sermons'),
								'target' => '_self',
								'class' => 'asp-sermons-series-link'
						),
				));
				$admin_bar->add_menu( array(
		        'id'    => 'asp-sermons-speakers',
		        'parent' => 'asp-sermons',
		        'title' => __( asp_speaker_plural( $asp_speaker_label ), "advanced-sermons"),
		        'href'  => '/wp-admin/edit-tags.php?taxonomy=sermon_speaker&post_type=sermons',
		        'meta'  => array(
		            'title' => __( asp_speaker_plural( $asp_speaker_label ), "advanced-sermons"),
		            'target' => '_self',
		            'class' => 'asp-sermons-speakers-link'
		        ),
		    ));
				$admin_bar->add_menu( array(
		        'id'    => 'asp-sermons-topics',
		        'parent' => 'asp-sermons',
		        'title' => __( asp_topic_plural( $asp_topic_label ), "advanced-sermons"),
		        'href'  => '/wp-admin/edit-tags.php?taxonomy=sermon_topics&post_type=sermons',
		        'meta'  => array(
		            'title' => __( asp_topic_plural( $asp_topic_label ), "advanced-sermons"),
		            'target' => '_self',
		            'class' => 'asp-sermons-topics-link'
		        ),
		    ));
				$admin_bar->add_menu( array(
		        'id'    => 'asp-sermons-book',
		        'parent' => 'asp-sermons',
		        'title' => __( asp_book_plural( $asp_book_label ), "advanced-sermons"),
		        'href'  => '/wp-admin/edit-tags.php?taxonomy=sermon_book&post_type=sermons',
		        'meta'  => array(
		            'title' => __( asp_book_plural( $asp_book_label ), "advanced-sermons"),
		            'target' => '_self',
		            'class' => 'asp-sermons-book-link'
		        ),
		    ));
            // Display general settings in admin bar to users who can only manage options
            if ( current_user_can('manage_options') ) {
                    $admin_bar->add_menu( array(
                            'id'    => 'asp-sermons-settings',
                            'parent' => 'asp-sermons',
                            'title' => __('Settings', 'advanced-sermons'),
                            'href'  => '/wp-admin/edit.php?post_type=sermons&page=asp-settings',
                            'meta'  => array(
                                    'title' => __('Settings', 'advanced-sermons'),
                                    'target' => '_self',
                                    'class' => 'asp-sermons-settings-link'
                            ),
                    ));
            }
            $admin_bar->add_menu( array(
                'id'    => 'asp-sermons-archive',
                'parent' => 'asp-sermons',
                'title' => __("$asp_sermon_label Archive", 'advanced-sermons'),
                'href'  => $asp_archive_slug,
                'meta'  => array(
                    'title' => __('Archive Page', 'advanced-sermons'),
                    'target' => '_self',
                    'class' => 'asp-sermons-archive-link'
                ),
            ));
		}
}


/**
 * Display sermons by date in the WordPress admin.
 * This function modifies the main query for the sermons post type in the admin area to order posts by date in descending order.
 * It is specifically targeted to run only on the main query for the sermons edit screen, reducing potential conflicts.
 */
function asp_admin_order_sermons($query) {
	if (!is_admin() || !$query->is_main_query()) {
		return $query;
	}

	$screen = get_current_screen();
	if ($screen->post_type == 'sermons' && $screen->base == 'edit') {
		$query->set('orderby', 'date');
		$query->set('order', 'DESC');
	}
	return $query;
}
add_filter('pre_get_posts', 'asp_admin_order_sermons');
