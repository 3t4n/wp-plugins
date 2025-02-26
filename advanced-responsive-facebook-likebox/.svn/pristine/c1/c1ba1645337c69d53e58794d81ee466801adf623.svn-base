<?php
/**
 * @package responsive-facebook-likebox
*/
/*
Plugin Name: Advanced Responsive Facebook Likebox
Plugin URI: http://www.cr8tech.net
Description: Responsive + Highly Customizable Facebook features.
Version: 1.0
Author: Chris Raven
Author URI: http://www.cr8tech.net
*/

class Responsivefacebook extends WP_Widget{
    
    public function __construct() {
        $params = array(
            'description' => 'Thanks for installing Advanced responsive facebook likebox',
            'name' => 'Advanced responsive facebook likebox'
        );
        parent::__construct('Responsivefacebook','',$params);
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

<!-- here will put all widget configuration -->
		<p>
			<label for="<?php echo $this->get_field_id('title');?>">Title : </label>
			<input
			class="widefat"
			id="<?php echo $this->get_field_id('title');?>"
			name="<?php echo $this->get_field_name('title');?>"
				value="<?php echo !empty($title) ? $title : "Advanced responsive facebook likebox"; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('fb_url');?>">Facebook Page URL : </label>
			<input
			class="widefat"
			id="<?php echo $this->get_field_id('fb_url');?>"
			name="<?php echo $this->get_field_name('fb_url');?>"
				value="<?php echo !empty($fb_url) ? $fb_url : "https://www.facebook.com/FacebookDevelopers"; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('height');?>">Height : </label>
			<input
			class="widefat"
			id="<?php echo $this->get_field_id('height');?>"
			name="<?php echo $this->get_field_name('height');?>"
				value="<?php echo !empty($height) ? $height : "450"; ?>" />
		</p>

		
		<p>
			<label for="<?php echo $this->get_field_id('backgroundColor');?>">Background Color : </label>
			<input
			class="widefat"
			id="<?php echo $this->get_field_id('backgroundColor');?>"
			name="<?php echo $this->get_field_name('backgroundColor');?>"
				value="<?php echo !empty($backgroundColor) ? $backgroundColor : "#ffffff"; ?>" />
		</p>
		<div class="cw-color-picker backgroundColorHide" rel="<?php echo $this->get_field_id('backgroundColor'); ?>"></div>
        
        <p>
			<label for="<?php echo $this->get_field_id('radius');?>">Border Radius : </label>
			<input
			class="widefat"
			id="<?php echo $this->get_field_id('radius');?>"
			name="<?php echo $this->get_field_name('radius');?>"
				value="<?php echo !empty($radius) ? $radius : "5"; ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'color_scheme' ); ?>">Color Scheme:</label> 
			<select id="<?php echo $this->get_field_id( 'color_scheme' ); ?>"
				name="<?php echo $this->get_field_name( 'color_scheme' ); ?>"
				class="widefat" style="width:100%;">
					<option value="0" <?php if ($color_scheme == '0') echo 'selected="0"'; ?> >Light</option>
					<option value="1" <?php if ($color_scheme == '1') echo 'selected="1"'; ?> >Dark</option>	
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'header' ); ?>">Show Header:</label> 
			<select id="<?php echo $this->get_field_id( 'header' ); ?>"
				name="<?php echo $this->get_field_name( 'header' ); ?>"
				class="widefat" style="width:100%;">
					<option value="true" <?php if ($header == 'true') echo 'selected="true"'; ?> >Yes</option>
					<option value="false" <?php if ($header == 'false') echo 'selected="false"'; ?> >No</option>	
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'face' ); ?>">Show Face:</label> 
			<select id="<?php echo $this->get_field_id( 'face' ); ?>"
				name="<?php echo $this->get_field_name( 'face' ); ?>"
				class="widefat" style="width:100%;">
					<option value="true" <?php if ($face == 'true') echo 'selected="true"'; ?> >Yes</option>
					<option value="false" <?php if ($face == 'false') echo 'selected="false"'; ?> >No</option>	
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'border' ); ?>">Show Border:</label> 
			<select id="<?php echo $this->get_field_id( 'border' ); ?>"
				name="<?php echo $this->get_field_name( 'border' ); ?>"
				class="widefat" style="width:100%;">
					<option value="true" <?php if ($border == 'true') echo 'selected="true"'; ?> >Yes</option>
					<option value="false" <?php if ($border == 'false') echo 'selected="false"'; ?> >No</option>	
			</select>
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'post' ); ?>">Show Post:</label> 
			<select id="<?php echo $this->get_field_id( 'post' ); ?>"
				name="<?php echo $this->get_field_name( 'post' ); ?>"
				class="widefat" style="width:100%;">
					<option value="true" <?php if ($post == 'true') echo 'selected="true"'; ?> >Yes</option>
					<option value="false" <?php if ($post == 'false') echo 'selected="false"'; ?> >No</option>	
			</select>
		</p>
         <p>
			<label for="<?php echo $this->get_field_id( 'box' ); ?>">Show Box Shadow:</label> 
			<select id="<?php echo $this->get_field_id( 'box' ); ?>"
				name="<?php echo $this->get_field_name( 'box' ); ?>"
				class="widefat" style="width:100%;">
					<option value="true" <?php if ($box == 'true') echo 'selected="true"'; ?> >Yes</option>
					<option value="false" <?php if ($box == 'false') echo 'selected="false"'; ?> >No</option>	
			</select>
		</p>
		
		
<?php
    }
    
    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        $title = apply_filters('widget_title', $title);
        $description = apply_filters('widget_description', $description);
	    if(empty($title)) $title = "Advanced responsive facebook likebox";
        if(empty($fb_url)) $fb_url = "https://www.facebook.com/FacebookDevelopers";
        if(empty($height)) $height = "450";
        if(empty($backgroundColor)) $backgroundColor = "#ffffff";
        if(empty($color_scheme)) $color_scheme = "0";
        if(empty($radius)) $radius = "5";
        if(empty($header)) $header = "true";
		 if(empty($face)) $face = "true";
        if(empty($border)) $border = "true";
		if(empty($post)) $post = "true";
        if(empty($box)) $box = "true";
		
		
        echo $before_widget;
            echo $before_title . $title . $after_title;
            
            ?>
<style>
.fb_iframe_widget span {
display: inline-block;
position: relative;
text-align: justify;
width: 100%;
}

.fb-like-box.fb_iframe_widget {
    width: 100% !important;
}

.fb-like-box.fb_iframe_widget span {
width: 100%;
}
.fb-like-box iframe {
    width: 100% !important;
}

.fb-like-box span {
    width: 100% !important;
}
</style>
 <div id="container" style="width:100%; background:<?php echo $backgroundColor;?> ; border-radius:<?php echo $radius;?>px; 
<?php if($box=='true'){?>
-webkit-box-shadow: 1px 1px 23px 0px rgba(57, 53, 50, 0.7);
-moz-box-shadow:    1px 1px 23px 0px rgba(57, 53, 50, 0.7);
box-shadow:         1px 1px 23px 0px rgba(57, 53, 50, 0.7);
<?php } else {}?>
">
  <div class="fb-like-box" data-href="<?php echo $fb_url;?>" data-colorscheme="light"    data-show-faces="<?php echo $face;?>" data-stream="<?php echo $post;?>" data-header="<?php echo $header;?>" data-show-border="<?php echo $border;?>"></div>
<div style='color:#ccc; font-size: 9px; text-align:right;'><a href='http://www.backpainfreeme.com' title='backpainfreeme.com' target='_blank'>Click here</a></div>
</div>

<div id="fb-root"></div>
<script>

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
   js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=262562957268319&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


jQuery(window).bind("load resize", function(){    
  var container_width = $('#container').width();    
    jQuery('#container').html('<div class="fb-like-box" ' + 
    'data-href="<?php echo $fb_url;?>"' +
    ' data-width="' + container_width + '" data-colorscheme="<?php echo $color_scheme;?>" data-height="<?php echo $height;?>" data-show-faces="<?php echo $face;?>" ' +
    'data-stream="<?php echo $post;?>"  data-header="<?php echo $header;?>" data-show-border="<?php echo $border;?>"></div>');
    FB.XFBML.parse( );    
}); 
</script>

   
<?php
        echo $after_widget;
    }
}
//registering the color picker
function responsive_facebook_likebox_color_picker_script() {
	wp_enqueue_script('farbtastic');
}
function responsive_facebook_likebox_color_picker_style() {
	wp_enqueue_style('farbtastic');
}
add_action('admin_print_scripts-widgets.php', 'responsive_facebook_likebox_color_picker_script');
add_action('admin_print_styles-widgets.php', 'responsive_facebook_likebox_color_picker_style');
add_action('widgets_init','register_Responsivefacebook');
function register_Responsivefacebook(){
    register_widget('Responsivefacebook');
}