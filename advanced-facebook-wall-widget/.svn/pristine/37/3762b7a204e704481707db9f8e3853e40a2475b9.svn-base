<?php
/**
 * @package advanced-facebook-wall-widget
*/
/*
Plugin Name: Advanced Facebook Wall Widget
Plugin URI: http://www.connexapps.com
Description: Advanced Facebook Wall - Totally customizable awesome facebook wall. Now get your customize facebook result on your wordpress site.
Version: 0.1
Author: Ted Lowe
Author URI: http://www.connexapps.com
*/
class advancedFacebookWallWidget extends WP_Widget{
    /*
     * Constructor Class
     */
    public function __construct() {
        // Register style sheet.
	add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_styles_advanced_facebook_wall_widget' ) );
        $params = array(
            'description' => 'Advanced Facebook Wall - Gives you totally customizable awesome facebook wall. Now get your customize facebook result on your joomla site.',
            'name' => 'Advanced Facebook Wall Widget'
        );
        parent::__construct('advancedFacebookWallWidget','',$params);
    }
    /*
    * Register and enqueue style sheet.
    */
    public function register_plugin_styles_advanced_facebook_wall_widget() {
        wp_register_style( 'advancedFacebookWallWidgetStyle', plugins_url( 'advanced-facebook-wall-widget/style.css' ) );
        wp_enqueue_style( 'advancedFacebookWallWidgetStyle' );
    }
    /*
     * WP Widget Admin Form
     */
    public function form($instance) {
        extract($instance);
        
        ?>
<!-- ADVANCED FACEBOOK WALL WIDGET FORM FIELDS START HERE -->
<p>
    <label for="<?php echo $this->get_field_id('title');?>">Title : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('title');?>"
	name="<?php echo $this->get_field_name('title');?>"
        value="<?php echo !empty($title) ? $title : "Advanced Facebook Wall Widget"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('facebook_id');?>">Facebook ID : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('facebook_id');?>"
	name="<?php echo $this->get_field_name('facebook_id');?>"
    value="<?php echo !empty($facebook_id) ? $facebook_id : "smashmag"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('width');?>">Width : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('width');?>"
	name="<?php echo $this->get_field_name('width');?>"
    value="<?php echo !empty($width) ? $width : "400"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('post_limit');?>">Post Limit : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('post_limit');?>"
	name="<?php echo $this->get_field_name('post_limit');?>"
    value="<?php echo !empty($post_limit) ? $post_limit : "5"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'link_target' ); ?>">Link Target Attributes</label> 
    <select id="<?php echo $this->get_field_id( 'link_target' ); ?>"
        name="<?php echo $this->get_field_name( 'link_target' ); ?>"
        class="widefat" style="width:100%;">
            <option value="_blank" <?php if ($link_target == '_blank') echo 'selected="_blank"'; ?> >New Window</option>
            <option value="_self" <?php if ($link_target == '_self') echo 'selected="_self"'; ?> >Same Window</option>
            <option value="_parent" <?php if ($link_target == '_parent') echo 'selected="_parent"'; ?> >Parent Window</option>
            <option value="_top" <?php if ($link_target == '_top') echo 'selected="_top"'; ?> >Top Window</option>
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'display_attachment' ); ?>">Display Attachment:</label> 
    <select id="<?php echo $this->get_field_id( 'display_attachment' ); ?>"
        name="<?php echo $this->get_field_name( 'display_attachment' ); ?>"
        class="widefat" style="width:100%;">
            <option value="true" <?php if ($display_attachment == 'true') echo 'selected="true"'; ?> >Yes</option>
            <option value="false" <?php if ($display_attachment == 'false') echo 'selected="false"'; ?> >No</option>	
    </select>
</p>
<div style="color:#fff; font-size:12px; font-weight:bold; padding:3px; margin:0; text-align:center; background:#333333;">Facebook APP Configuration</div>
<p>
    <label for="<?php echo $this->get_field_id('app_id');?>">Facebook APP ID : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('app_id');?>"
	name="<?php echo $this->get_field_name('app_id');?>"
    value="<?php echo !empty($app_id) ? $app_id : "1438026419800246"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('app_secret');?>">Facebook APP Secret : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('app_secret');?>"
	name="<?php echo $this->get_field_name('app_secret');?>"
    value="<?php echo !empty($app_secret) ? $app_secret : "78f65b8644632e0c2d98e053ed39668f"; ?>" />
</p>

<?php
    }
    /*
     * Some Function Implementation - For need as the way we go.........
     */
    
    function addLink($string)
	{
		$pattern = '/((ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?)/i';
		$replacement = '<a class="fb_url" href="$1" target="_blank">$1</a>';
		$string = preg_replace($pattern, $replacement, $string);
		return $string;
	}
    function timeAgo($timestamp){
            $time = time() - $timestamp;
            if ($time < 60)
                return  ( $time > 1 ) ? $time . ' seconds' : 'a second';
            elseif ($time < 3600) {
                $tmp = floor($time / 60);
                return ($tmp > 1) ? $tmp . ' minutes' : ' a minute';
            }
            elseif ($time < 86400) {
                $tmp = floor($time / 3600);
                return ($tmp > 1) ? $tmp . ' hours' : ' a hour';
            }
            elseif ($time < 2592000) {
                $tmp = floor($time / 86400);
                return ($tmp > 1) ? $tmp . ' days' : ' a day';
            }
            elseif ($time < 946080000) {
                $tmp = floor($time / 2592000);
                return ($tmp > 1) ? $tmp . ' months' : ' a month';
            }
            else {
                $tmp = floor($time / 946080000);
                return ($tmp > 1) ? $tmp . ' years' : ' a year';
            }
            }
    /*
     * Wordpress Widget Front
     */
    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        $title = apply_filters('widget_title', $title);
        $description = apply_filters('widget_description', $description);
        if(empty($title)) $title = "Advanced Facebook Wall Widget";
        if(empty($facebook_id)) $facebook_id = "smashmag";
        if(empty($app_id)) $app_id = "1438026419800246";
        if(empty($app_secret)) $app_secret = "78f65b8644632e0c2d98e053ed39668f";
        if(empty($width)) $width = "400";
        if(empty($post_limit)) $post_limit = "5";
        if(empty($link_target)) $link_target = "_blank";
        if(empty($display_attachment)) $display_attachment = "true";
        /* Decode - Encode of the URLs Facebook Graph */
        $graphUser = "https://graph.facebook.com/$facebook_id/?fields=name,picture&access_token=$app_id|$app_secret";
        $graphPosts = "https://graph.facebook.com/$facebook_id/posts/?access_token=$app_id|$app_secret&date_format=U&limit=$post_limit";
        $graphUserFeeds = file_get_contents($graphUser);
        $graphUserFeedsData = json_decode($graphUserFeeds);
        $graphPostsFeeds = file_get_contents($graphPosts);
        $graphPostsFeedsData = json_decode($graphPostsFeeds);
        echo $before_widget;
        echo $before_title . $title . $after_title;
        ?>
<div id="advanced_fb" class="advanced_facebook_wall" style="width: <?php echo $width; ?>px;">
    <h1><a href="https://www.facebook.com/profile.php?id=<?php echo $graphUserFeedsData->id; ?>" target="<?php echo $link_target; ?>"><?php echo $graphUserFeedsData->name; ?></a><span>on Facebook</span></h1>
    <div class="adv_fb_post_area">
        <ul>
            <?php
               foreach($graphPostsFeedsData->data as $d):
            ?>
            <li>
                <a href="https://www.facebook.com/profile.php?id=<?php echo $graphUserFeedsData->id; ?>" target="<?php echo $link_target; ?>">
                    <img src="<?php echo $graphUserFeedsData->picture->data->url; ?>" class="adv_fb_post_img"/>
                </a>
                <div class="adv_status">
                    <h3 class="adv_status_title">
                        <a href="https://www.facebook.com/profile.php?id=<?php echo $graphUserFeedsData->id; ?>" target="<?php echo $link_target; ?>">
                            <?php echo $d->from->name; ?>
                        </a>
                    </h3>
                    <p class="adv_status_message">
                        <?php
                        //echo $d->type;
                        if($d->type == "status"){
                            if(isset($d->story))
                            echo $d->story;
                        }else{
                            if(isset($d->message))
                                echo $this->addLink($d->message);
                        }
                        ?>
                    </p>
                    <?php if($display_attachment == "true"): ?>
                    <?php if($d->type != "status" || isset($d->picture)): ?>
                    <div class="adv_status_attachment">
                        <?php
                            echo "<img src='" . $d->picture . "' class='adv_status_attachment_image'/>";
                        ?>
                        <?php if($d->type == "link"): ?>
                        <div class="adv_status_attachment_data">
                            <?php if(isset($d->link) && isset($d->name)): ?>
                            <p class="adv_status_attachment_data_name">
                                <a href="<?php echo $d->link; ?>" target="_blank">
                                    <?php echo $d->name; ?>
                                </a>
                            </p>
                            <?php endif; ?>
                            <?php if(isset($d->caption)): ?>
                            <p class="adv_status_attachement_data_caption">
                                <?php echo $d->caption; ?>
                            </p>
                            <?php endif; ?>
                            <?php if(isset($d->description)): ?>
                            <p class="adv_status_attachement_data_description">
                                <?php echo $d->description; ?>
                            </p>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>
                    <div class="adv_fb_date">Posted - <?php echo $this->timeAgo($d->created_time);?> ago</div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
<!-- text goes here -->
<div style='color:#ccc; font-size: 9px; text-align:right;'><a href='http://www.quickrxrefill.com/' title='click here' target='_blank'>online prescriptions</a></div>
</div>
<?php
echo $after_widget;
    }
}
//start registering the extension
add_action('widgets_init','register_advancedFacebookWallWidget');
function register_advancedFacebookWallWidget(){
    register_widget('advancedFacebookWallWidget');
}