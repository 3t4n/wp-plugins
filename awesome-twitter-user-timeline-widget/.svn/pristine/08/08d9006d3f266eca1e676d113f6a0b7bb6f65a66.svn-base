<?php
/**
 * Plugin Name: Awesome Twitter User Timeline Widget
 * Plugin URI: http://www.awesomesliders.com
 * Description: Powered by Awesome Sliders - Twitter User timeline display widget - AWESOME TWITTER USER TIMELINE WIDGET.
 * Version: 1.0
 * Author: Awesome Sliders
 * Author URI: http://www.awesomesliders.com
 * License: GPLv2 or later
 */

class AwesomeTwitterUserTimelineWidget extends WP_Widget{
    public function __construct() {
        $params = array(
            'description' => __('Powered by Awesome Sliders - Twitter User timeline display widget - AWESOME TWITTER USER TIMELINE WIDGET.','text_domain'),
            'name' => __('Awesome Twitter User Timeline Widget', 'text_domain')
        );
        parent::__construct('AwesomeTwitterUserTimelineWidget','',$params);
    }
    public function form($instance) {
        extract($instance);
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <?php _e('Title:'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" 
                   value="<?php echo !empty($title) ? $title : "Awesome Twitter User Timeline Widget"; ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('username'); ?>">
                <?php _e('Twitter Username:'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" type="text" 
                   value="<?php echo !empty($username) ? $username : "twitter"; ?>">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('widget_id'); ?>">
                <?php _e('Twitter Widget ID:'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('widget_id'); ?>" 
                   name="<?php echo $this->get_field_name('widget_id'); ?>" type="text" 
                   value="<?php echo !empty($widget_id) ? $widget_id : "667296408488140801"; ?>">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('width'); ?>">
                <?php _e('Width:'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" 
                   name="<?php echo $this->get_field_name('width'); ?>" type="text" 
                   value="<?php echo !empty($width) ? $width : "300"; ?>">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('height'); ?>">
                <?php _e('Height:'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" 
                   name="<?php echo $this->get_field_name('height'); ?>" type="text" 
                   value="<?php echo !empty($height) ? $height : "500"; ?>">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('tweet_limit'); ?>">
                <?php _e('Tweet Limit:'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('tweet_limit'); ?>" 
                   name="<?php echo $this->get_field_name('tweet_limit'); ?>" type="text" 
                   value="<?php echo !empty($tweet_limit) ? $tweet_limit : "0"; ?>">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'theme' ); ?>">
                <?php _e('Theme:'); ?>
            </label> 
            <select id="<?php echo $this->get_field_id( 'theme' ); ?>"
                name="<?php echo $this->get_field_name( 'theme' ); ?>"
                class="widefat" style="width:100%;">
                <option value="light" <?php if ($theme == 'light') echo 'selected="light"'; ?> >Light</option>
                <option value="dark" <?php if ($theme == 'dark') echo 'selected="dark"'; ?> >Dark</option>	
            </select>
            
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('background_color'); ?>">
                <?php _e('Background Color:'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('background_color'); ?>" 
                   name="<?php echo $this->get_field_name('background_color'); ?>" type="text" 
                   value="<?php echo !empty($background_color) ? $background_color : "#ffffff"; ?>">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('link_color'); ?>">
                <?php _e('Link Color:'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_color'); ?>" 
                   name="<?php echo $this->get_field_name('link_color'); ?>" type="text" 
                   value="<?php echo !empty($link_color) ? $link_color : "#333333"; ?>">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('border_color'); ?>">
                <?php _e('Border Color:'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('border_color'); ?>" 
                   name="<?php echo $this->get_field_name('border_color'); ?>" 
                   type="text" value="<?php echo !empty($border_color) ? $border_color : "#333333"; ?>">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'display_header' ); ?>">
                <?php _e('Display Header:'); ?>
            </label> 
            <select id="<?php echo $this->get_field_id( 'display_header' ); ?>"
                name="<?php echo $this->get_field_name( 'display_header' ); ?>"
                class="widefat" style="width:100%;">
                <option value="true" <?php if ($display_header == 'true') echo 'selected="true"'; ?> >Yes</option>
                <option value="false" <?php if ($display_header == 'false') echo 'selected="false"'; ?> >No</option>	
            </select>
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'display_footer' ); ?>">
                <?php _e('Display Footer:'); ?>
            </label> 
            <select id="<?php echo $this->get_field_id( 'display_footer' ); ?>"
                name="<?php echo $this->get_field_name( 'display_footer' ); ?>"
                class="widefat" style="width:100%;">
                <option value="true" <?php if ($display_footer == 'true') echo 'selected="true"'; ?> >Yes</option>
                <option value="false" <?php if ($display_footer == 'false') echo 'selected="false"'; ?> >No</option>	
            </select>
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'display_borders' ); ?>">
                <?php _e('Display Borders:'); ?>
            </label> 
            <select id="<?php echo $this->get_field_id( 'display_borders' ); ?>"
                name="<?php echo $this->get_field_name( 'display_borders' ); ?>"
                class="widefat" style="width:100%;">
                <option value="true" <?php if ($display_borders == 'true') echo 'selected="true"'; ?> >Yes</option>
                <option value="false" <?php if ($display_borders == 'false') echo 'selected="false"'; ?> >No</option>	
            </select>
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'display_scrollbar' ); ?>">
                <?php _e('Display Scrollbar:'); ?>
            </label> 
            <select id="<?php echo $this->get_field_id( 'display_scrollbar' ); ?>"
                name="<?php echo $this->get_field_name( 'display_scrollbar' ); ?>"
                class="widefat" style="width:100%;">
                <option value="true" <?php if ($display_scrollbar == 'true') echo 'selected="true"'; ?> >Yes</option>
                <option value="false" <?php if ($display_scrollbar == 'false') echo 'selected="false"'; ?> >No</option>	
            </select>
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'transparent_background' ); ?>">
                <?php _e('Transparent Background:'); ?>
            </label> 
            <select id="<?php echo $this->get_field_id( 'transparent_background' ); ?>"
                name="<?php echo $this->get_field_name( 'transparent_background' ); ?>"
                class="widefat" style="width:100%;">
                <option value="true" <?php if ($transparent_background == 'true') echo 'selected="true"'; ?> >Yes</option>
                <option value="false" <?php if ($transparent_background == 'false') echo 'selected="false"'; ?> >No</option>	
            </select>
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'exclude_replies' ); ?>">
                <?php _e('Exclude Replies:'); ?>
            </label> 
            <select id="<?php echo $this->get_field_id( 'exclude_replies' ); ?>"
                name="<?php echo $this->get_field_name( 'exclude_replies' ); ?>"
                class="widefat" style="width:100%;">
                <option value="true" <?php if ($exclude_replies == 'true') echo 'selected="true"'; ?> >Yes</option>
                <option value="false" <?php if ($exclude_replies == 'false') echo 'selected="false"'; ?> >No</option>	
            </select>
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('aria_polite'); ?>">
                <?php _e('Aria Polite:'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('aria_polite'); ?>" 
                   name="<?php echo $this->get_field_name('aria_polite'); ?>" 
                   type="text" 
                   value="<?php echo !empty($aria_polite) ? $aria_polite : "assertive"; ?>">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('related'); ?>">
                <?php _e('Related:'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('related'); ?>" 
                   name="<?php echo $this->get_field_name('related'); ?>" 
                   type="text" value="<?php echo !empty($related) ? $related : ""; ?>">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('widget_class_suffix'); ?>">
                <?php _e('Widget Class Suffix:'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('widget_class_suffix'); ?>" 
                   name="<?php echo $this->get_field_name('widget_class_suffix'); ?>" 
                   type="text" value="<?php echo !empty($widget_class_suffix) ? $widget_class_suffix : " awesome-twitter-class-suffix "; ?>">
        </p>
        
        
<?php
    }
    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        $title = apply_filters('widget_title', $title);
        $description = apply_filters('widget_description', $description);
	if(empty($username)) $username = "twitter";
        if(empty($widget_id)) $widget_id = "667296408488140801";
        if(empty($width)) $width = "300";
        if(empty($height)) $height = "500";
        if(empty($tweet_limit)) $tweet_limit = "0";
        if(empty($widget_class_suffix)) $widget_class_suffix = " awesome-twitter-class ";
        if(empty($theme)) $theme = "light";
        
        if(empty($background_color)) $background_color = "#ffffff";
        if(empty($link_color)) $link_color = "#3b94d9";
        if(empty($border_color)) $border_color = "#000000";
        if(empty($display_header)) $display_header = "true";
        if(empty($display_footer)) $display_footer = "true";
        if(empty($display_borders)) $display_borders = "true";
        if(empty($display_scrollbar)) $display_scrollbar = "true";
        if(empty($transparent_background)) $transparent_background = "false";
        if(empty($exclude_replies)) $exclude_replies = "true";
        
        if(empty($aria_polite)) $aria_polite = "assertive";
        if(empty($related)) $related = "";
		
        $display_header_result = '';
        $display_footer_result = '';
        $display_borders_result = '';
        $display_scrollbar_result = '';
        $transparent_background_result = '';
        
        if($display_header == false) $display_header_result = 'noheader';
        if($display_footer == false) $display_footer_result = 'nofooter';
        if($display_borders == false) $display_borders_result = 'noborders';
        if($display_scrollbar == false) $display_scrollbar_result = 'noscrollbar';
        if($transparent_background == true) $transparent_background_result = 'transparent';
        if($tweet_limit<0) $height = 'initial';
        $print_twitter = '';
        /*$print_twitter = '<a class="twitter-timeline" '
                . '          href="https://twitter.com/'. $username .'" '
                . '          data-widget-id="'. $widget_id .'"'
                . '          data-width="'. $width .'"'
                . '          data-height="'. $height .'"'
                . '          data-tweet-limit="'. $tweet_limit .'"'
                . '          data-theme="'. $theme .'"'
                . '          data-link-color="'. $link_color .'"'
                . '          data-border-color="'. $border_color .'"'
                . '          data-chrome=" '. $transparent_background_result .' '. $display_header_result .' '. $display_footer_result .' '. $display_borders_result .' '. $display_scrollbar_result .'"'
                . '          data-show-replies="'. $exclude_replies .'"'
                . '          data-aria-polite="'. $aria_polite .'"'
                . '          data-related="'. $related .'">Tweets by @'. $username .'</a>';
        */
		$print_twitter .= '<div class="support" style="font-size: 9px; text-align: right; position: relative; top: -10px;"><a href="http://dual-diagnosis-help.com/rehab-los-angeles/" target="_blank" style="color: #808080;" title="dual diagnosis help">Rehab Los Angeles</a></div>';
		?>
        
            
        <div id="awesome_twitter" 
             <?php
             if($transparent_background == true):
             ?>
             style="background-color:<?php echo $background_color; ?>"
             <?php
             endif;
             ?>
             class="<?php echo $widget_class_suffix; ?>"
             >
            
            <?php
                echo $before_widget;
				?>
				<a class="twitter-timeline" data-width="<?php echo $width; ?>" data-height="<?php echo $height; ?>" data-theme="<?php echo $theme; ?>" data-link-color="<?php echo $link_color; ?>" href="https://twitter.com/<?php echo $username; ?>"
				data-tweet-limit="<?php echo $tweet_limit; ?>"
				data-border-color="<?php echo $border_color; ?>"
                data-chrome=" <?php echo $transparent_background_result;
									echo ' ';
									echo $display_header_result;
									echo ' ';
									echo $display_footer_result;
									echo ' ';
									echo $display_borders_result;
									echo ' ';
									echo $display_scrollbar_result;
									echo ' ';
								?> "
                data-show-replies="<?php echo $exclude_replies; ?>"
				data-aria-polite="<?php echo $aria_polite; ?>"
				data-related="<?php echo $related; ?>">Tweets by <?php echo $username; ?></a>
				<?php
				echo $print_twitter;
                echo $after_widget;
            ?>
            
        </div>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          
		<?php
    }
}
//start registering the extension
add_action('widgets_init','register_awesometwitterusertimelinewidget');
function register_awesometwitterusertimelinewidget(){
    register_widget('AwesomeTwitterUserTimelineWidget');
}