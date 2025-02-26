<?php
/*
Plugin Name: danixland WPOrg Stats
Plugin URI: https://danix.xyz/?p=3745
Description: A simple plugin that shows useful stats about your plugins hosted on WordPress.org
Version: 0.1
Author: Danilo 'danix' Macri
Author URI: https://danix.xyz/author/danix
Text Domain: dnxwporg

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/


/**
 * Add plugin i18n domain: dnxwporg
 * @since 0.1
 */
load_plugin_textdomain('dnxwporg', false, basename( dirname( __FILE__ ) ) . '/i18n');

/**
 * Function that installs our widget options
 * @since 0.1
 */
function dnxwporg_options_set() {
	update_option( 'dnxwporg_author', 'danixland', '', 'yes' );
	update_option( 'dnxwporg_plugins_stats', '', '', 'yes' );
	update_option( 'dnxwporg_description', true, '', 'yes' );
	update_option( 'dnxwporg_desc_content', '', '', 'yes' );
	update_option( 'dnxwporg_linkto', true, '', 'yes' );
	update_option( 'dnxwporg_use_icons', true, '', 'yes' );
}

/**
 * Function that deletes our widget options
 * @since 0.1
 */
function dnxwporg_options_unset() {
	delete_option( 'dnxwporg_author' );
	delete_option( 'dnxwporg_plugins_stats' );
	delete_option( 'dnxwporg_description' );
	delete_option( 'dnxwporg_desc_content' );
	delete_option( 'dnxwporg_linkto' );
	delete_option( 'dnxwporg_use_icons' );
}

/**
 * Add function on plugin activation that'll set our plugin options
 * @since 0.1
 */
register_activation_hook( __FILE__, 'dnxwporg_options_set' );

/**
 * Add function on plugin deactivation that'll unset our plugin options
 * @since 0.3
 */
register_deactivation_hook( __FILE__, 'dnxwporg_options_unset' );

function dnxwporg_load_js($hook) {
        // Load only on ?page=widgets.php
        if($hook != 'widgets.php') {
                return;
        }
        wp_enqueue_script( 'dnxwporg-utils-js', plugins_url('js/dnxwporg-utils.js', __FILE__), array('jquery'), false, true );
}
add_action( 'admin_enqueue_scripts', 'dnxwporg_load_js' );


/**
 * Add function to retrieve the stats from api.wordpress.org
 * @param $author - the plugin author nickname
 * @return array - either the array with the info about the plugins or an empty array in case of failure
 * @since 0.1
 */
function dnxwporg_get_plugins_stats( $author ) {
    $url    = 'https://api.wordpress.org/plugins/info/1.0/';
    $fields = array(
        'downloaded' => true,
        'rating' => false,
        'description' => false,
        'short_description' => false,
        'donate_link' => false,
        'tags' => false,
        'sections' => false,
        'homepage' => true,
        'added' => false,
        'last_updated' => false,
        'compatibility' => false,
        'tested' => false,
        'requires' => false,
        'downloadlink' => false,
    );
    $args = (object) array( 'author' => $author, 'fields' => $fields );
    $request = array( 'action' => 'query_plugins', 'timeout' => 15, 'request' => serialize( $args) );
    $response = wp_remote_post( $url, array( 'body' => $request ) );
    $plugins_info = unserialize( $response['body'] );
    $result = array();
    $total_dl = '';
    $total_avg = '';
    if ( isset( $plugins_info ) ) {
        # let's build our array of data to return
        foreach ($plugins_info->plugins as $plugin) {
            $pl_name = $plugin->slug;
            $pl_dirlink = 'https://wordpress.org/plugins/' . $pl_name;
            $pl_icon = 'https://ps.w.org/' . $pl_name . '/assets/icon-256x256.png';
            $pl_download = $plugin->download_link;
            $pl_downloaded = $plugin->downloaded;
            $pl_home = $plugin->homepage;
            $pl_voters = $plugin->num_ratings;
            $pl_stars = $plugin->ratings;
            $avg_vote = ($pl_stars[1] + $pl_stars[2] * 2 + $pl_stars[3] * 3 + $pl_stars[4] * 4 + $pl_stars[5] * 5) / $pl_voters;
            $pl_avg_vote = ( ! is_int($avg_vote) ? 0 : $avg_vote );
            $total_dl += $pl_downloaded;
            $total_avg += $pl_avg_vote;
            $result[$pl_name] = array(
                'dir_link' => $pl_dirlink,
                'dl_link' => $pl_download,
                'home_link' => $pl_home,
                'icon' => $pl_icon,
                'downloaded' => $pl_downloaded,
                'voters' => $pl_voters,
                'avg_rating' => $pl_avg_vote
            );
        }
        $avg = $total_avg / count($plugins_info->plugins);
        $result['total_plugins'] = count($plugins_info->plugins);
        $result['total_downloads'] = $total_dl;
        $result['average_rating'] = round( $avg, 2);
        return $result;
    }
    return array();
}

/**
 * This function will execute with the scheduled cron job and update the data inside the option
 * @since 0.1
 */
function dnxwporg_save_plugins_stats() {

	$author = get_option('dnxwporg_author');
  $plugins = dnxwporg_get_plugins_stats( $author );
  update_option( 'dnxwporg_plugins_stats', $plugins );
}
add_action( 'dnxwporg_save_plugins_stats', 'dnxwporg_save_plugins_stats' );

/**
 * we schedule the cron if it's not yet scheduled
 * @since 0.1
 */
if ( ! wp_next_scheduled( 'dnxwporg_save_plugins_stats' ) ) {
	wp_schedule_event( 1407110400, 'daily', 'dnxwporg_save_plugins_stats' ); // 1407110400 is 08 / 4 / 2014 @ 0:0:0 UTC
}

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'danixland_wporg_widget' );

/**
 * Register our widget.
 * 'dnx_WPOrg' is the widget class used below.
 *
 * @since 0.1
 */
function danixland_wporg_widget() {
	register_widget( 'dnx_WPOrg' );
}

/**
 * dnx_WPOrg class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class dnx_WPOrg extends WP_Widget {


    /**
     * Widget setup.
     */
    public function __construct() {
      	parent::__construct(
			'danixland-wporg-stats',
			__( 'danixland WP.org Stats', 'dnxwporg' ),
			array(
				'customize_selective_refresh' => true,
				'description' => __('Use this widget to display statistics about your WP.org hosted plugins on your site', 'dnxwporg'),
			)
        );
    }

	/**
	 * Displays the setup form for the widget in the widgets page
	 */
	public function form( $instance ) {
		$defaults = array( 
			'title' => __( 'WP.org Plugins Stats', 'dnxwporg' ),
			'author' => get_option( 'dnxwporg_author' ),
			'description' => get_option( 'dnxwporg_description' ),
			'desc_content' => get_option( 'dnxwporg_desc_content' ),
			'link_wporg' => get_option( 'dnxwporg_linkto' ),
			'use_icons' => get_option( 'dnxwporg_use_icons' )
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		extract( $instance, EXTR_SKIP );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'dnxwporg'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'author' ); ?>"><?php _e('The username of the Plugin\'s author on WP.org', 'dnxwporg'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'author' ); ?>" name="<?php echo $this->get_field_name( 'author' ); ?>" value="<?php echo $author ?>" style="width:100%;" />
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $description, true ); ?> id="dnxwporg_use_desc" name="<?php echo $this->get_field_name( 'description' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e('Select this if you want to display a small description inside the widget.', 'dnxwporg'); ?></label>
			<textarea id="dnxwporg_custom_desc" name="<?php echo $this->get_field_name( 'desc_content' ); ?>" rows="10" cols="30" <?php disabled( $description, false ); ?> /><?php echo $desc_content; ?></textarea>
			<label for="<?php echo $this->get_field_id( 'desc_content' ); ?>"><?php _e('If active but empty, the standard plugin description will be used.', 'dnxwporg'); ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $link_wporg, true ); ?> id="<?php echo $this->get_field_id( 'link_wporg' ); ?>" name="<?php echo $this->get_field_name( 'link_wporg' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'link_wporg' ); ?>"><?php _e('If selected, your links will point to the WP.org plugin page, if not, the PLUGIN URI will be used instead.', 'dnxwporg'); ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $use_icons, true ); ?> id="<?php echo $this->get_field_id( 'use_icons' ); ?>" name="<?php echo $this->get_field_name( 'use_icons' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'use_icons' ); ?>"><?php _e('If selected, the widget will display the icon from the assets directory in your plugin svn folder.', 'dnxwporg'); ?></label>
		</p>
	<?php
	}

	/**
	 * Update the widget content
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['author'] = strip_tags( $new_instance['author'] );
		$instance['description'] = (bool) $new_instance['description'];
		$instance['desc_content'] = sanitize_textarea_field( $new_instance['desc_content'] );
		$instance['link_wporg'] = (bool) $new_instance['link_wporg'];
		$instance['use_icons'] = (bool) $new_instance['use_icons'];

		update_option( 'dnxwporg_author', $instance['author'] );
		if ($old_instance['author'] !== $new_instance['author']) {
			update_option( 'dnxwporg_plugins_stats', dnxwporg_get_plugins_stats( $instance['author'] ) );
		}
		update_option( 'dnxwporg_linkto', $instance['link_wporg'] );
		update_option( 'dnxwporg_use_icons', $instance['use_icons'] );
		update_option( 'dnxwporg_description', $instance['description'] );
		update_option( 'dnxwporg_desc_content', $instance['desc_content'] );
		
		return $instance;
	}

	/**
	 * How to display the widget on the public side of the site.
	 */
	public function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$author = sanitize_user(get_option('dnxwporg_author'), true);
		$description = get_option('dnxwporg_description');
		$desc_content = get_option('dnxwporg_desc_content');
		$linkto = get_option('dnxwporg_linkto');
		$use_icons = get_option('dnxwporg_use_icons');

		/* we recover the data from the option if it is set, otherwhise we call the retrieve function directly */
		$option_stats = get_option('dnxwporg_plugins_stats');
	    $plugins = ( false === $option_stats ? dnxwporg_get_plugins_stats() : $option_stats );

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

    ?>
    <div class="dnxwporg_container">
	    <?php if ($description) { ?>
	    	<div class="dnxwporg_description">
	    	<?php if (empty($desc_content)) : ?>
			    <p class="dnxwporg-pl-standard-desc"><?php printf( _n('%s contributed <span class="dnxwporg-pl-count">%s</span> plugin with <span class="dnxwporg-pl-dloads">%s</span> total downloads and an average rating of <span class="dnxwporg-pl-avg-rating">%s</span>', '%s contributed <span class="dnxwporg-pl-count">%s</span> plugins with <span class="dnxwporg-pl-dloads">%s</span> total downloads and an average rating of <span class="dnxwporg-pl-avg-rating">%s</span>', $plugins['total_plugins'], 'dnxwporg' ), $author, $plugins['total_plugins'], $plugins['total_downloads'], $plugins['average_rating'] ); ?></p>
			<?php else : ?>
				<p class="dnxwporg-pl-custom-desc"><?php echo $desc_content; ?></p>
	    	<?php endif; ?>
	    	</div>
	    <?php } ?>
	    <div class="dnxwporg_pl_list_container">
		    <ul class="dnxwporg_pl_list">
		    <?php foreach ($plugins as $name => $data) { 
		        if (is_array($data) ) : ?>
	    			<li class="dnxwporg_pl_item">
	    				<a class="dnxwporg-pl-link" href="<?php echo ($linkto ? $data['dir_link'] : $data['home_link']) ?>">
		    				<?php if ($use_icons) : ?>
		    					<img class="dnxwporg-pl-link-icon" src="<?php echo $data['icon']; ?>" alt="<?php echo $name; ?>">
		    				<?php endif; ?>
	    					<span class="dnxwporg-pl-link-name"><?php echo $name; ?></span>
	    				</a>
	    				<p class="dnxwporg-pl-stats">
	    					<span class="dnxwporg-pl-tot-dloads"><?php echo $data['downloaded']; ?></span>
	    					<span class="dnxwporg-pl-avg-vote"><?php echo $data['avg_rating']; ?></span>
	    				</p>
	    			</li>
		        <?php endif;
		    } ?>
		    </ul>
	    </div>
    </div>
<?php
		/* After widget (defined by themes). */
		echo $after_widget;
	}
}

// Add Shortcode
function dnxwporg_stats_shortcode() {

	$author = sanitize_user(get_option('dnxwporg_author'), true);
	$description = get_option('dnxwporg_description');
	$desc_content = get_option('dnxwporg_desc_content');
	$linkto = get_option('dnxwporg_linkto');
	$use_icons = get_option('dnxwporg_use_icons');

	/* we recover the data from the option if it is set, otherwhise we call the retrieve function directly */
	$option_stats = get_option('dnxwporg_plugins_stats');
    $plugins = ( false === $option_stats ? dnxwporg_get_plugins_stats() : $option_stats );

    ob_start(); ?>

    <div class="dnxwporg_container">
	    <?php if ($description) { ?>
	    	<div class="dnxwporg_description">
	    	<?php if (empty($desc_content)) : ?>
			    <p class="dnxwporg-pl-standard-desc"><?php printf( _n('%s contributed <span class="dnxwporg-pl-count">%s</span> plugin with <span class="dnxwporg-pl-dloads">%s</span> total downloads and an average rating of <span class="dnxwporg-pl-avg-rating">%s</span>', '%s contributed <span class="dnxwporg-pl-count">%s</span> plugins with <span class="dnxwporg-pl-dloads">%s</span> total downloads and an average rating of <span class="dnxwporg-pl-avg-rating">%s</span>', $plugins['total_plugins'], 'dnxwporg' ), $author, $plugins['total_plugins'], $plugins['total_downloads'], $plugins['average_rating'] ); ?></p>
			<?php else : ?>
				<p class="dnxwporg-pl-custom-desc"><?php echo $desc_content; ?></p>
	    	<?php endif; ?>
	    	</div>
	    <?php } ?>
	    <div class="dnxwporg_pl_list_container">
		    <ul class="dnxwporg_pl_list">
		    <?php foreach ($plugins as $name => $data) { 
		        if (is_array($data) ) : ?>
	    			<li class="dnxwporg_pl_item">
	    				<a class="dnxwporg-pl-link" href="<?php echo ($linkto ? $data['dir_link'] : $data['home_link']) ?>">
		    				<?php if ($use_icons) : ?>
		    					<img class="dnxwporg-pl-link-icon" src="<?php echo $data['icon']; ?>" alt="<?php echo $name; ?>">
		    				<?php endif; ?>
	    					<span class="dnxwporg-pl-link-name"><?php echo $name; ?></span>
	    				</a>
	    				<p class="dnxwporg-pl-stats">
	    					<span class="dnxwporg-pl-tot-dloads"><?php echo $data['downloaded']; ?></span>
	    					<span class="dnxwporg-pl-avg-vote"><?php echo $data['avg_rating']; ?></span>
	    				</p>
	    			</li>
		        <?php endif;
		    } ?>
		    </ul>
	    </div>
    </div>
	
	<?php $output = ob_get_clean();
	return $output;

}
add_shortcode( 'dnxwporg_stats', 'dnxwporg_stats_shortcode' );

// Add Shortcode
function dnxwporg_single_stats_shortcode( $atts ) {

	// Attributes
	$a = shortcode_atts(
		array(
			'total_dl' => 0,
			'avg_dloads' => 0,
			'pl_count' => 0,
		),
		$atts
	);

	/* we recover the data from the option if it is set, otherwhise we call the retrieve function directly */
	$option_stats = get_option('dnxwporg_plugins_stats');
    $plugins = ( false === $option_stats ? dnxwporg_get_plugins_stats() : $option_stats );
	
	// Build the $output variable
	$output = "";

	if ($a['total_dl']) {
		$output = $plugins['total_downloads'];
	} elseif ($a['avg_dloads']) {
		$output = $plugins['average_rating'];
	} elseif ($a['pl_count']) {
		$output = $plugins['total_plugins'];
	}

	return $output;

}
add_shortcode( 'dnxwporg_single_stat', 'dnxwporg_single_stats_shortcode' );

/**
 * Shortcode that returns the plugin icon if existing
 */
function dnxwporg_plugin_icon( $atts ) {

	// Attributes
	$a = shortcode_atts(
		array(
			'plugin_name' => '',
		),
		$atts
	);
	
	/* we recover the data from the option if it is set, otherwhise we call the retrieve function directly */
	$option_stats = get_option('dnxwporg_plugins_stats');
    $plugins = ( false === $option_stats ? dnxwporg_get_plugins_stats() : $option_stats );
	
	$name = $a['plugin_name'];

	// Build the $output variable
	$output = "";

    if (array_key_exists($name, $plugins) && ! empty($plugins[$name]['icon'])) {
    	$output = $plugins[$name]['icon'];
    } else {
    	$output = "";
    }

	return $output;

}
add_shortcode( 'plugin_icon', 'dnxwporg_plugin_icon' );
?>
