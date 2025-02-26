<?php
/*
Plugin Name:  Daily Bible Verse
Plugin URI:   https://bibleverses.net/daily-bible-verse/
Description:  This plugin allows you to add a Bible Verse of the Day widget to your WordPress page.
Version:      1.0
Author:       Bibleverses.net
Author URI:   https://bibleverses.net
License:      GPL v3
License URI: http://www.gnu.org/licenses/gpl.html
*/

define( 'DBVW_PATH', untrailingslashit(plugin_dir_path( __FILE__ )) );
define( 'DBVW_URL' ,  untrailingslashit(plugin_dir_url( __FILE__ )) );


function daily_bible_verse_styles() {
	wp_register_style( 'widget_daily_verse_css', plugins_url('daily-bible-verse.css', __FILE__) );
	wp_enqueue_style( 'widget_daily_verse_css' );
}

add_action( 'wp_enqueue_scripts', 'daily_bible_verse_styles' );

function ecpt_get_default_verse($type) {

    if ( $type == "text_and_image" ) {
        return '<img src="'.DBVW_URL.'/images/1616749579932-love4.png" alt="John 3:16 - Bibleverses.net"><br>"For God so loved the world, that he gave his only begotten Son, that whosoever believeth in him should not perish, but have everlasting life."<br><a href="https://bibleverses.net/kjv/john-3-16/" target="_blank" rel="noopener noreferrer"><b>John 3:16</b></a><br>';
    } else if ($type == "image_only") {
        return '<a href="https://bibleverses.net/kjv/john-3-16/" target="_blank" rel="noopener noreferrer"><img src="'.DBVW_URL.'/images/1616749579932-love4.png" alt="John 3:16 - Bibleverses.net"></a><br>';
    } else {
        return '"For God so loved the world, that he gave his only begotten Son, that whosoever believeth in him should not perish, but have everlasting life."<br><a href="https://bibleverses.net/kjv/john-3-16/" target="_blank" rel="noopener noreferrer"><b>John 3:16</b></a><br>';
    }
}

class Daily_Bible_Verse_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
                'daily_bible_verse_widget', // Base ID
                __('Daily Bible Verse', 'text_domain'), // Name
                array('description' => __('Add our Bible Verse of the Day to your website. Receive guidance from God’s Word and inspire your visitors.', 'text_domain'),) // Args
        );
    }

    function form($instance) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : 'Bible Verse of the Day';
        $type = ! empty( $instance['type'] ) ? $instance['type'] : 'text_only';
        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'type' ); ?>">What type of verse would you like?</label> 
            <select id="<?php echo $this->get_field_id('type'); ?>" name="<?php echo $this->get_field_name('type'); ?>">
                <option value="text_only" <?php _e($type == 'text_only' ? 'selected' : ''); ?>>Verse of the Day (Text only)</option>
                <option value="image_only" <?php _e($type == 'image_only' ? 'selected' : ''); ?>>Verse of the Day (Image only)</option>
                <option value="text_and_image" <?php _e($type == 'text_and_image' ? 'selected' : ''); ?>>Verse of the Day (Text+Image)</option>
            </select>
        </p>

        <?php
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['type'] = strip_tags( $new_instance['type'] );

        return $instance;
    }

    function widget($args, $instance) {

        extract($args, EXTR_SKIP);

        echo $before_widget;

        $title = apply_filters( 'widget_title', $instance['title'] );
        $type = $instance['type'];

        if ( ! empty( $title ) )
        echo $before_title . $title . $after_title;

        $response = wp_remote_get('https://bibleverses.net/api/widget/?type=' . $type);
        if (is_wp_error($response) ) {
            $html = ecpt_get_default_verse($type);
        } 
        $html = $response['body'];
        
        echo $html .= '<small class="bibleverses_link"><i><a href="https://bibleverses.net/" target="_blank" rel="noopener noreferrer">Bibleverses.net</a></i></small>';
        echo $after_widget; 
    }
}

// register Daily_Bible_Verse_Widget widget
function register_daily_bible_verse_widget() {
    register_widget('Daily_Bible_Verse_Widget');
}

add_action('widgets_init', 'register_daily_bible_verse_widget');
