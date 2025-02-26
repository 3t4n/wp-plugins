<?php
/**
 * @package advanced-twitter-embedded-tweets-widget
*/
/*
Plugin Name: Advanced Twitter Embedded Tweets Widget
Plugin URI: http://www.sparxseo.com
Description: Thanks for installing advanced twitter embedded tweets widget.
Version: 1.0
Author: Alan Ferdinand
Author URI: http://www.sparxseo.com
*/
class advancedTwitterEmbeddedTweetsWidget extends WP_Widget{
    public function __construct() {
        $params = array(
            'description' => 'Thanks for installing Advanced Twitter Embedded Tweets',
            'name' => 'Advanced Twitter Embedded Tweets Widget'
        );
        parent::__construct('advancedTwitterEmbeddedTweetsWidget','',$params);
    }
    public function form($instance) {
        extract($instance);
        ?>
<!-- Advanced Twitter Embedded Tweets Widget - -->
<div style="color:#fff; font-size:12px; font-weight:bold; padding:3px; margin:0; text-align:center; background:#333333;">Basic Configuration</div>
<p>
    <label for="<?php echo $this->get_field_id('title');?>">Title : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('title');?>"
	name="<?php echo $this->get_field_name('title');?>"
        value="<?php echo !empty($title) ? $title : "Advanced Twitter Embedded Tweets Widget"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('url');?>">Twitter Post URL ID: </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('url');?>"
	name="<?php echo $this->get_field_name('url');?>"
    value="<?php echo !empty($url) ? $url : "445954975823183872"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('maxwidth');?>">Maximum Width : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('maxwidth');?>"
	name="<?php echo $this->get_field_name('maxwidth');?>"
    value="<?php echo !empty($maxwidth) ? $maxwidth : "300"; ?>" />
</p>
<div style="color:#fff; font-size:12px; font-weight:bold; padding:3px; margin:0; text-align:center; background:#333333;">Advanced Configuration</div>
<p>
    <label for="<?php echo $this->get_field_id( 'media' ); ?>">Media:</label> 
    <select id="<?php echo $this->get_field_id( 'media' ); ?>"
        name="<?php echo $this->get_field_name( 'media' ); ?>"
        class="widefat" style="width:100%;">
            <option value="false" <?php if ($media == 'false') echo 'selected="false"'; ?> >Show</option>
            <option value="true" <?php if ($media == 'true') echo 'selected="true"'; ?> >Hide</option>	
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'thread' ); ?>">Thread:</label> 
    <select id="<?php echo $this->get_field_id( 'thread' ); ?>"
        name="<?php echo $this->get_field_name( 'thread' ); ?>"
        class="widefat" style="width:100%;">
            <option value="false" <?php if ($thread == 'false') echo 'selected="false"'; ?> >Show</option>
            <option value="true" <?php if ($thread == 'true') echo 'selected="true"'; ?> >Hide</option>	
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'align' ); ?>">Alignment:</label> 
    <select id="<?php echo $this->get_field_id( 'align' ); ?>"
        name="<?php echo $this->get_field_name( 'align' ); ?>"
        class="widefat" style="width:100%;">
            <option value="none" <?php if ($align == 'none') echo 'selected="none"'; ?> >None</option>
            <option value="left" <?php if ($align == 'left') echo 'selected="left"'; ?> >Left</option>
            <option value="right" <?php if ($align == 'right') echo 'selected="right"'; ?> >Right</option>
            <option value="center" <?php if ($align == 'center') echo 'selected="center"'; ?> >Center</option>
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('related');?>">Web Intent Related Users : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('related');?>"
	name="<?php echo $this->get_field_name('related');?>"
        value="<?php echo !empty($related) ? $related : ""; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('lang');?>">Language : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('lang');?>"
	name="<?php echo $this->get_field_name('lang');?>"
        value="<?php echo !empty($lang) ? $lang : "en"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('suffix');?>">Widget Class Suffix : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('suffix');?>"
	name="<?php echo $this->get_field_name('suffix');?>"
    value="<?php echo !empty($suffix) ? $suffix : ""; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'author' ); ?>">Support Author:</label> 
    <select id="<?php echo $this->get_field_id( 'author' ); ?>"
        name="<?php echo $this->get_field_name( 'author' ); ?>"
        class="widefat" style="width:100%;">
            <option value="false" <?php if ($author == 'false') echo 'selected="false"'; ?> >Not Supporting Author</option>
            <option value="true" <?php if ($author == 'true') echo 'selected="true"'; ?> >Yes! Supporting Author</option>
    </select>
</p>
<!--end of configuration fields-->
<?php
    }
    public function widget($args, $instance) {
        extract($args);
		//print_r($instance);
        extract($instance);
        $title = apply_filters('widget_title', $title);
        $description = apply_filters('widget_description', $description);
		
		if(empty($title)) $title = "Advanced Twitter Embedded Tweets Widget";
        if(empty($url)) $url = "445954975823183872";
        if(empty($maxwidth)) $maxwidth = "300";
        if(empty($media)) $media = "false";
        if(empty($thread)) $thread = "false";
		if(empty($align)) $align = "none";
		if(empty($related)) $related = "";
		if(empty($lang)) $lang = "en";
		if(empty($author)) $author = "false";
        if(empty($suffix)) $suffix = "";
		
        $data = "";
        $url_fetch = "https://api.twitter.com/1/statuses/oembed.json?id=$url&align=$align&maxwidth=$maxwidth&hide_media=$media&hide_thread=$thread&related=$related&lang=$lang";
        $dataTweet = json_decode(file_get_contents($url_fetch),true);
        extract($dataTweet);
        $data .= $html;
		if($author == "true"){
			$data .= "<div style='font-size: 9px; color: #808080; font-weight: normal; font-family: tahoma,verdana,arial,sans-serif; line-height: 1.28; text-align: right; direction: ltr;'><a href='http://www.advantagebusinessvaluations.com/' target='_blank' style='color: #808080;' title='click here'>how much is my business worth</a></div>";}
			echo $before_widget;
            echo $before_title . $title . $after_title;
            echo $data;
            echo $after_widget;
    }
}
//start registering the extension
add_action('widgets_init','register_sparx_advancedTwitterEmbeddedTweetsWidget');
function register_sparx_advancedTwitterEmbeddedTweetsWidget(){
    register_widget('advancedTwitterEmbeddedTweetsWidget');
}