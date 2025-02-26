<?php
/**
 * @package advanced-facebook-page-widget
*/
/*
Plugin Name: Advanced Facebook Page Widget
Plugin URI: http://www.crayfishstudios.com/
Description: Advanced Facebook Page Widget is a customizable facebook page display wordpress widget. There have lots of options to customize the page display widget. So by using this you can up and run a customizable wordpress widget on your website very easily.
Version: 1.0
Author: Crayfish Studios
Author URI: http://www.crayfishstudios.com/
*/

class advancedFacebookPageWidget extends WP_Widget{
    public function __construct() {
        $params = array(
            'description' => 'Advanced Facebook Page Widget is a customizable facebook page display wordpress widget. There have lots of options to customize the page display widget. So by using this you can up and run a customizable wordpress widget on your website very easily',
            'name' => 'Advanced Facebook Page Widget'
        );
        parent::__construct('advancedFacebookPageWidget','',$params);
    }
    public function form($instance) {
        extract($instance);
        ?>
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
<p><small>Note: You can't set any numeric value to zero. Atleast put - "0.1" if necessary</small></p>
<!-- Advanced Facebook Page Widget Configuration Fields START - -->
<div style="color:#fff; font-size:12px; font-weight:bold; padding:3px; margin:0; text-align:center; background:#333333;">Basic Configuration</div>
<p>
    <label for="<?php echo $this->get_field_id('title');?>">Title : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('title');?>"
	name="<?php echo $this->get_field_name('title');?>"
        value="<?php echo !empty($title) ? $title : "Advanced Facebook Page Widget"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('suffix');?>">Module Class Suffix : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('suffix');?>"
	name="<?php echo $this->get_field_name('suffix');?>"
    value="<?php echo !empty($suffix) ? $suffix : ""; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('page');?>">Facebook Page URL : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('page');?>"
	name="<?php echo $this->get_field_name('page');?>"
    value="<?php echo !empty($page) ? $page : "http://www.facebook.com/Facebook"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('width');?>">Width : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('width');?>"
	name="<?php echo $this->get_field_name('width');?>"
    value="<?php echo !empty($width) ? $width : "300"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('height');?>">Height : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('height');?>"
	name="<?php echo $this->get_field_name('height');?>"
    value="<?php echo !empty($height) ? $height : "556"; ?>" />
</p>

<div style="color:#fff; font-size:12px; font-weight:bold; padding:3px; margin:0; text-align:center; background:#333333;">Advanced Configuration</div>
<p>
    <label for="<?php echo $this->get_field_id( 'stream' ); ?>">Show Stream:</label> 
    <select id="<?php echo $this->get_field_id( 'stream' ); ?>"
        name="<?php echo $this->get_field_name( 'stream' ); ?>"
        class="widefat" style="width:100%;">
            <option value="true" <?php if ($stream == 'true') echo 'selected="true"'; ?> > Yes</option>
            <option value="false" <?php if ($stream == 'false') echo 'selected="false"'; ?> >No</option>	
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('background'); ?>">Background Color :</label> 
    <input
    	class="widefat background"
   	id="<?php echo $this->get_field_id('background'); ?>"
        name="<?php echo $this->get_field_name('background'); ?>"
        value="<?php if($background) { echo $background; } else { echo '#050026';} ?>" />
</p>
<div class="cw-color-picker backgroundHide" rel="<?php echo $this->get_field_id('background'); ?>"></div>
<p>
    <label for="<?php echo $this->get_field_id( 'header' ); ?>">Show Header:</label> 
    <select id="<?php echo $this->get_field_id( 'header' ); ?>"
        name="<?php echo $this->get_field_name( 'header' ); ?>"
        class="widefat" style="width:100%;">
            <option value="false" <?php if ($header == 'false') echo 'selected="false"'; ?> >No</option>
            <option value="true" <?php if ($header == 'true') echo 'selected="true"'; ?> > Yes</option>
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('padding');?>">Padding : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('padding');?>"
	name="<?php echo $this->get_field_name('padding');?>"
        value="<?php echo !empty($padding) ? $padding : "15"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('radius');?>">Radius Size : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('radius');?>"
	name="<?php echo $this->get_field_name('radius');?>"
        value="<?php echo !empty($radius) ? $radius : "15"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('border');?>">Border Size : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('border');?>"
	name="<?php echo $this->get_field_name('border');?>"
        value="<?php echo !empty($border) ? $border : "2"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('bordercolor'); ?>">Border Color :</label> 
    <input
    	class="widefat borderColor"
   	id="<?php echo $this->get_field_id('bordercolor'); ?>"
        name="<?php echo $this->get_field_name('bordercolor'); ?>"
        value="<?php if($bordercolor) { echo $bordercolor; } else { echo '#9A1717';} ?>" />
</p>
<div class="cw-color-picker bordercolorHide" rel="<?php echo $this->get_field_id('bordercolor'); ?>"></div>
<p>
    <label for="<?php echo $this->get_field_id( 'theme' ); ?>">Color Scheme :</label> 
    <select id="<?php echo $this->get_field_id( 'theme' ); ?>"
        name="<?php echo $this->get_field_name( 'theme' ); ?>"
        class="widefat" style="width:100%;">
            <option value="light" <?php if ($theme == 'light') echo 'selected="light"'; ?> >Light</option>
            <option value="dark" <?php if ($theme == 'dark') echo 'selected="dark"'; ?> >Dark</option>	
    </select>
</p>
<!--end of configuration fields-->
<?php
    }
    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        $title = apply_filters('widget_title', $title);
        $description = apply_filters('widget_description', $description);
		if(empty($title)) $title = "Advanced Facebook Page Widget";
        if(empty($page)) $page = "http://www.facebook.com/Facebook";
        if(empty($width)) $width = "300";
        if(empty($height)) $height = "356";
        if(empty($stream)) $stream = "true";
        if(empty($background)) $background = "#050026";
		if(empty($header)) $header = "false";
		if(empty($padding)) $padding = "15";
		if(empty($radius)) $radius = "15";
		if(empty($border)) $border = "2";
        if(empty($bordercolor)) $bordercolor = "#9A1717";
		if(empty($theme)) $theme = "light";
		
        $data = "";
        $data .= "
            <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = '//connect.facebook.net/en_US/all.js#xfbml=1';
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));
             </script>
  ";
        $data .= "
<div id='advanced_facebook_page_widget' class='$suffix' style='max-width: $width";
        $data .= "px;'>
		<div class='fbCustom' style='background:$background; width:$width";
        $data .= "px; padding: $padding";
        $data .= "px; border: $border";
        $data .= "px solid $bordercolor; border-radius: $radius";
        $data .= "px;'>
        <div class='FBWrap' style='height:$height";
        $data .= "px; overflow: hidden;'>
            <div class='fb-like-box'
                data-width='$width' data-height='$height' 
                data-href='$page'
                data-border-color='$bordercolor' data-show-faces='true'
                data-stream='$stream' data-header='$header' data-color-scheme='$theme'>
            </div>
         </div>";
$data .= "</div>
<div style='font-size: 9px; color: #808080; font-weight: normal; font-family: tahoma,verdana,arial,sans-serif; line-height: 1.28; text-align: right; direction: ltr;'><a href='http://www.empirepromos.com/' target='_blank' style='color: #808080;' title='click here'>Promotional Items</a></div>
</div>";           

            echo $before_widget;
            echo $before_title . $title . $after_title;
            echo $data;
            echo $after_widget;
    }
}
//color picker module codies
function fishsample_load_color_picker_script() {
	wp_enqueue_script('farbtastic');
}
function fish_sample_load_color_picker_style() {
	wp_enqueue_style('farbtastic');
}
add_action('admin_print_scripts-widgets.php', 'fishsample_load_color_picker_script');
add_action('admin_print_styles-widgets.php', 'fish_sample_load_color_picker_style');
//start registering the extension
add_action('widgets_init','register_fish_advancedFacebookPageWidget');
function register_fish_advancedFacebookPageWidget(){
    register_widget('advancedFacebookPageWidget');
}