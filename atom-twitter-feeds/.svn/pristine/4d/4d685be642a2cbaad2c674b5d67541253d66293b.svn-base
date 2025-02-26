<?php
/**
 * @package atom-twitter-feeds
*/
/*
Plugin Name: Atom Twitter Feeds
Plugin URI: http://www.atomixstudios.com
Description: Highly Customizable Twitter Feeds for Wordpress.
Version: 1.0.0
Author: Thomas Andrew Erickson
Author URI: http://www.atomixstudios.com
*/
class atom_twitter_feeds extends WP_Widget{
    public function __construct() {
        $params = array(
            'description' => 'Highly customizable Twitter Widget for Wordpress',
            'name' => 'Atom Twitter Feeds'
        );
        parent::__construct('atom_twitter_feeds','',$params);
    }
    public function form($instance) {
        extract($instance);
        ?>
<!-- Color Picker Script Start -->
<script type="text/javascript">
//<![CDATA[
    jQuery(document).ready(function()
    {
	// colorpicker field
	jQuery('.cw-color-picker').each(function(){
	var $this = jQuery(this),
        id = $this.attr('rel');
 	$this.farbtastic('#' + id);
    });
});		
//]]>   
</script>
<!-- Color Picker Script End -->
<p>
    <label for="<?php echo $this->get_field_id('title');?>">Title: </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('title');?>"
	name="<?php echo $this->get_field_name('title');?>"
    value="<?php echo !empty($title) ? $title : "Atom Twitter Feeds"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('username');?>">Twitter Username: </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('username');?>"
	name="<?php echo $this->get_field_name('username');?>"
    value="<?php echo !empty($username) ? $username : "twitterapi"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('widget_id');?>">Widget ID: </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('widget_id');?>"
	name="<?php echo $this->get_field_name('widget_id');?>"
    value="<?php echo !empty($widget_id) ? $widget_id : "395494957030445056"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('width');?>">Width: </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('width');?>"
	name="<?php echo $this->get_field_name('width');?>"
    value="<?php echo !empty($width) ? $width : "300"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('height');?>">Height: </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('height');?>"
	name="<?php echo $this->get_field_name('height');?>"
        value="<?php echo !empty($height) ? $height : "500"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('tweet_limit');?>">Tweet Limit: </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('tweet_limit');?>"
	name="<?php echo $this->get_field_name('tweet_limit');?>"
        value="<?php echo !empty($tweet_limit) ? $tweet_limit : "5"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('padding');?>">Padding: </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('padding');?>"
	name="<?php echo $this->get_field_name('padding');?>"
        value="<?php echo !empty($padding) ? $padding : "10"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('border_radius');?>">Border Radius: </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('border_radius');?>"
	name="<?php echo $this->get_field_name('border_radius');?>"
        value="<?php echo !empty($border_radius) ? $border_radius : "10"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'theme' ); ?>">Theme: </label> 
    <select id="<?php echo $this->get_field_id( 'theme' ); ?>"
        name="<?php echo $this->get_field_name( 'theme' ); ?>"
        class="widefat" style="width:100%;">
            <option value="light" <?php if ($theme == 'light') echo 'selected="light"'; ?> >Light</option>
            <option value="dark" <?php if ($theme == 'dark') echo 'selected="dark"'; ?> >Dark</option>	
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('link_color'); ?>">Link Color: </label> 
    <input
    	class="widefat link_color"
   	id="<?php echo $this->get_field_id('link_color'); ?>"
        name="<?php echo $this->get_field_name('link_color'); ?>"
        value="<?php if($link_color) { echo $link_color; } else { echo '#7a00cc';} ?>" />
</p>
<div class="cw-color-picker link_colorHide" rel="<?php echo $this->get_field_id('link_color'); ?>"></div>
<p>
    <label for="<?php echo $this->get_field_id( 'transparent' ); ?>">Transparency: </label> 
    <select id="<?php echo $this->get_field_id( 'transparent' ); ?>"
        name="<?php echo $this->get_field_name( 'transparent' ); ?>"
        class="widefat" style="width:100%;">
            <option value="transparent" <?php if ($transparent == 'transparent') echo 'selected="transparent"'; ?> >Yes</option>
            <option value=" " <?php if ($transparent == ' ') echo 'selected=" "'; ?> >No</option>	
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('background_color'); ?>">Background Color: </label> 
    <input
    	class="widefat background_color"
   	id="<?php echo $this->get_field_id('background_color'); ?>"
        name="<?php echo $this->get_field_name('background_color'); ?>"
        value="<?php if($background_color) { echo $background_color; } else { echo '#faa8d9';} ?>" />
</p>
<div class="cw-color-picker background_colorHide" rel="<?php echo $this->get_field_id('background_color'); ?>"></div>
<p>
    <label for="<?php echo $this->get_field_id('border_color'); ?>">Border Color: </label> 
    <input
    	class="widefat border_color"
   	id="<?php echo $this->get_field_id('border_color'); ?>"
        name="<?php echo $this->get_field_name('border_color'); ?>"
        value="<?php if($border_color) { echo $border_color; } else { echo '#b802b8';} ?>" />
</p>
<div class="cw-color-picker boder_colorHide" rel="<?php echo $this->get_field_id('border_color'); ?>"></div>
<p>
    <label for="<?php echo $this->get_field_id( 'header' ); ?>">Header: </label> 
    <select id="<?php echo $this->get_field_id( 'header' ); ?>"
        name="<?php echo $this->get_field_name( 'header' ); ?>"
        class="widefat" style="width:100%;">
            <option value=" " <?php if ($header == ' ') echo 'selected=" "'; ?> >Show</option>
            <option value="noheader" <?php if ($header == 'noheader') echo 'selected="noheader"'; ?> >Hide</option>	
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'border' ); ?>">Border: </label> 
    <select id="<?php echo $this->get_field_id( 'border' ); ?>"
        name="<?php echo $this->get_field_name( 'border' ); ?>"
        class="widefat" style="width:100%;">
            <option value=" " <?php if ($border == ' ') echo 'selected=" "'; ?> >Show</option>
            <option value="noborders" <?php if ($border == 'noborders') echo 'selected="noheader"'; ?> >Hide</option>
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'scrollbar' ); ?>">Scrollbar: </label> 
    <select id="<?php echo $this->get_field_id( 'scrollbar' ); ?>"
        name="<?php echo $this->get_field_name( 'scrollbar' ); ?>"
        class="widefat" style="width:100%;">
            <option value="noscrollbar" <?php if ($scrollbar == 'noscrollbar') echo 'selected="noscrollbar"'; ?> >Hide</option>	
            <option value=" " <?php if ($scrollbar == ' ') echo 'selected=" "'; ?> >Show</option>
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'footer' ); ?>">Footer: </label> 
    <select id="<?php echo $this->get_field_id( 'footer' ); ?>"
        name="<?php echo $this->get_field_name( 'footer' ); ?>"
        class="widefat" style="width:100%;">
            <option value="nofooter" <?php if ($footer == 'nofooter') echo 'selected="nofooter"'; ?> >Hide</option>	
            <option value=" " <?php if ($footer == ' ') echo 'selected=" "'; ?> >Show</option>
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('language');?>">Language: </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('language');?>"
	name="<?php echo $this->get_field_name('language');?>"
        value="<?php echo !empty($language) ? $language : "EN"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('related');?>">Web Intent Related Users: </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('related');?>"
	name="<?php echo $this->get_field_name('related');?>"
        value="<?php echo !empty($related) ? $related : "twitterapi,twitter"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'polite' ); ?>">Polite: </label> 
    <select id="<?php echo $this->get_field_id( 'polite' ); ?>"
        name="<?php echo $this->get_field_name( 'polite' ); ?>"
        class="widefat" style="width:100%;">
            <option value="assertive" <?php if ($polite == 'assertive') echo 'selected="assertive"'; ?> >Assertive</option>	
            <option value="polite" <?php if ($polite == 'polite') echo 'selected="polite"'; ?> >Polite</option>
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('suffix');?>">CSS Class Suffix : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('suffix');?>"
	name="<?php echo $this->get_field_name('suffix');?>"
    value="<?php echo !empty($suffix) ? $suffix : ""; ?>" />
</p>
<?php if($username!= '' && $widget_id!= ''):?>
<p><strong>Shortcode:</strong><br/>
    <code>
        [atom_twitter username="<?php echo $username; ?>" widget_id="<?php echo $widget_id; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" tweet_limit="<?php echo $tweet_limit; ?>" padding="<?php echo $padding; ?>" border_radius = "<?php echo $border_radius; ?>" theme="<?php echo $theme; ?>" link_color="<?php echo $link_color; ?>" transparent="<?php echo $transparent; ?>" background_color="<?php echo $background_color; ?>" border_color="<?php echo $border_color; ?>" header="<?php echo $header; ?>" border="<?php echo $border; ?>" scrollbar="<?php echo $scrollbar; ?>" footer="<?php echo $footer; ?>" language="<?php echo $language; ?>" related="<?php echo $related; ?>" polite="<?php echo $polite; ?>" suffix="<?php echo $suffix; ?>"]
    </code>
</p>
<?php endif; ?>
<?php
    }
    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        $title = apply_filters('widget_title', $title);
        if(empty($title)) $title = "Atom Twitter Feeds";
        if(empty($username)) $username = "twitterapi";
        if(empty($widget_id)) $widget_id = "395494957030445056";
        if(empty($width)) $width = "300";
        if(empty($height)) $height = "500";
        if(empty($tweet_limit)) $tweet_limit = "5";
        if(empty($padding)) $padding = "10";
        if(empty($border_radius)) $border_radius = "10";
        if(empty($theme)) $theme = "light";
        if(empty($link_color)) $link_color = "#7a00cc";
        if(empty($transparent)) $transparent = "transparent";
        if(empty($background_color)) $background_color = "#faa8d9";
        if(empty($border_color)) $border_color = "#b802b8";
        if(empty($header)) $header = "noheader";
        if(empty($border)) $border = "";
        if(empty($scrollbar)) $scrollbar = "noscrollbar";
        if(empty($footer)) $footer = "nofooter";
        if(empty($language)) $language = "EN";
        if(empty($related)) $related = "twitterapi,twitter";
        if(empty($polite)) $polite = "assertive";
        if(empty($suffix)) $suffix = "";
        $data = $this->display_tweet($username,$widget_id,$width,$height,$tweet_limit,$padding,$border_radius, $theme,$link_color,$transparent,$background_color,$border_color,$header,$border,$scrollbar,$footer,$language,$related,$polite,$suffix);
        echo $before_widget;
        echo $before_title . $title . $after_title;
        echo $data;
        echo $after_widget;
    }
    public static function display_tweet($username,$widget_id,$width,$height,$tweet_limit,$padding,$border_radius, $theme,$link_color,$transparent,$background_color,$border_color,$header,$border,$scrollbar,$footer,$language,$related,$polite,$suffix){
        $data = "";
        $data .= "
            <div class='atom_twitter_feeds $suffix' style='background: $background_color; width: $width";
        $data .= "px; padding: $padding";
        $data .= "px; border-radius: $border_radius";
        $data .= "px;'>
<a class='twitter-timeline' href='https://twitter.com/$username' data-widget-id='$widget_id' data-chrome='$footer $header $scrollbar $transparent' data-border-color='$border_color' data-theme='$theme' data-link-color='$link_color'  data-related='$related' data-tweet-limit='$tweet_limit' data-aria-polite='$polite' width='$width' height='$height' lang='$language'>Tweets by @$username</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','twitter-wjs');</script>
</div>
";
$data .= "<div id='support_author' style='font-size: 8px; font-weight: normal;><a href='http://www.novusglassrepair.com/' title='Redmond Novus' target='_blank'>Redmond Windshield Repair</a></div>";
        return $data;
    }
}
//registering the color picker
function atom_twitter_feeds_sample_load_color_picker_script() {
	wp_enqueue_script('farbtastic');
}
function atom_twitter_feeds_sample_load_color_picker_style() {
	wp_enqueue_style('farbtastic');
}
add_action('admin_print_scripts-widgets.php', 'atom_twitter_feeds_sample_load_color_picker_script');
add_action('admin_print_styles-widgets.php', 'atom_twitter_feeds_sample_load_color_picker_style');
//register the widget
add_action('widgets_init','register_atom_twitter_feeds');
function register_atom_twitter_feeds(){
    register_widget('atom_twitter_feeds');
}

//shortcode
add_shortcode('atom_twitter', 'atom_twitter_feeds_shortcode');

function atom_twitter_feeds_shortcode($atts){
 	$atts = shortcode_atts(array(
 		'username' => '',
                'widget_id' => '',
                'width' => '300',
                'height' => '500',
                'tweet_limit' => '5',
                'padding' => '10',
                'border_radius' => '10',
                'theme' => 'light',
                'link_color' => '#7a00cc',
                'transparent' => 'transparent',
                'background_color' => '#faa8d9',
                'border_color' => '#b802b8',
                'header' => 'noheader',
                'border' => '',
                'scrollbar' => 'noscrollbar',
                'footer' => 'nofooter',
                'language' => 'EN',
                'related' => 'twitterapi,twitter',
                'polite' => 'assertive',
                'suffix' => ''
 	), $atts);
 	extract($atts);
        if(!empty($username) && !empty($widget_id)){
            $data = atom_twitter_feeds::display_tweet($username,$widget_id,$width,$height,$tweet_limit,$padding,$border_radius, $theme,$link_color,$transparent,$background_color,$border_color,$header,$border,$scrollbar,$footer,$language,$related,$polite,$suffix);
        } else{
            $data = "Please put your twitter username and widget id. this is must fill inputs of this shortcode";
        }
        return $data;
 }
 