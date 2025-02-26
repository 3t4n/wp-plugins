<?php
/*
Plugin Name: Easy Social Share
Plugin URI: http://www.1line.co.uk
Description: Adds social share buttons
Author: James Murphy
Version: 1.0
*/ 

function socialshare(){
	$options = get_option("widget_socialshare");
	$title = $options['title'];
	$facebook = $options['facebook'];
	$twitter = $options['twitter'];
	$linkedin = $options['linkedin'];
	$rss = $options['rss'];
	$images = $options['images'];
?>
	<ul>
    	<li class="first"><?php echo $title;?>:</li>
        <?php if($facebook) { ?><li><a href="http://www.facebook.com/<?php echo $facebook; ?>" title="become a facebook fan"<?php if($images == '1') { ?> class="facebook"<?php } ?>>facebook</a></li><?php } ?>
        <?php if($twitter) { ?><li><a href="http://www.twitter.com/<?php echo $facebook; ?>" title="follow us on twitter"<?php if($images == '1') { ?> class="twitter"<?php } ?>>twitter</a></li><?php } ?>
        <?php if($linkedin) { ?><li><a href="http://www.linkedin.com/in/<?php echo $linkedin; ?>" title="follow us on linkedin"<?php if($images == '1') { ?> class="linkedin"<?php } ?>>linkedin</a></li><?php } ?>
        <?php if($rss == '1') { ?><li><a href="/?feed=rss" title="View RSS Feed"<?php if($images == '1') { ?> class="rss"<?php } ?>>rss</a></li><?php } ?>
    </ul>
<?php }
 
function widget_socialshare($args) {
  extract($args);
 
  $options = get_option("widget_socialshare");
  if (!is_array( $options ))
{
$options = array(
      'title' => 'Share / Follow us',
	  'facebook' => '',
	  'twitter' => '',
	  'linkedin' => '',
	  'rss' => '1',
	  'images' => '1'
      );
  }
 
  echo $before_widget;
    echo $before_title;
      echo $options['title'];
	  echo $options['facebook'];
	  echo $options['twitter'];
	  echo $options['linkedin'];
	  echo $options['rss'];
	  echo $options['images'];
    echo $after_title;
 
    //Our Widget Content
    socialshare();
  echo $after_widget;
}
 
function socialshare_control()
{
  $options = get_option("widget_socialshare");
  if (!is_array( $options ))
{
$options = array(
      'title' => 'Share / Follow us',
	  'facebook' => '',
	  'twitter' => '',
	  'linkedin' => '',
	  'rss' => '1',
	  'images' => '1'
      );
  }
 
  if ($_POST['socialshare-Submit'])
  {
    $options['title'] = htmlspecialchars($_POST['socialshare-WidgetTitle']);
	$options['facebook'] = htmlspecialchars($_POST['socialshare-WidgetFacebook']);
	$options['twitter'] = htmlspecialchars($_POST['socialshare-WidgetTwitter']);
	$options['linkedin'] = htmlspecialchars($_POST['socialshare-WidgetLinkedin']);
	$options['rss'] = (int) htmlspecialchars($_POST['socialshare-WidgetRSS']);
	$options['images'] = htmlspecialchars($_POST['socialshare-WidgetImages']);
    update_option("widget_socialshare", $options);
  }
 
?>
    <p><label for="socialshare-WidgetTitle">Title: </label>
    <input type="text" id="socialshare-WidgetTitle" name="socialshare-WidgetTitle" value="<?php echo $options['title'];?>" size="15" style="float: right;" /></p>
    <p><label for="socialshare-WidgetFacebook">Facebook ID: </label>
    <input type="text" id="socialshare-WidgetFacebook" name="socialshare-WidgetFacebook" value="<?php echo $options['facebook'];?>" size="15" style="float: right;" /></p>
    <p><label for="socialshare-WidgetTwitter">Twitter ID: </label>
    <input type="text" id="socialshare-WidgetTwitter" name="socialshare-WidgetTwitter" value="<?php echo $options['twitter'];?>" size="15" style="float: right;" /></p>
    <p><label for="socialshare-WidgetLinkedin">LinkedIn ID: </label>
    <input type="text" id="socialshare-WidgetLinkedin" name="socialshare-WidgetLinkedin" value="<?php echo $options['linkedin'];?>" size="15" style="float: right;" /></p>
    <p><label for="socialshare-WidgetRSS">Enable RSS: </label>
    <select id="socialshare-WidgetRSS" name="socialshare-WidgetRSS" style="float: right; width: 118px;">
    	<option value="1" <?php if($options['rss'] == '1'){?>selected="selected"<?php } ?>>yes</option>
        <option value="2" <?php if($options['rss'] == '2'){?>selected="selected"<?php } ?>>no</option>
    </select></p>
    <p><label for="socialshare-WidgetImages">Icons or Text Links: </label>
    <select id="socialshare-WidgetImages" name="socialshare-WidgetImages" style="float: right; width: 118px;">
    	<option value="1" <?php if($options['images'] == '1'){?>selected="selected"<?php } ?>>Icons</option>
        <option value="2" <?php if($options['images'] == '2'){?>selected="selected"<?php } ?>>Text</option>
    </select></p>
    <input type="hidden" id="socialshare-Submit" name="socialshare-Submit" value="1" style="float: right;" />
<?php
}
 
function socialshare_init()
{
  register_sidebar_widget(__('Social Share'), 'widget_socialshare');
  register_widget_control(   'Social Share', 'socialshare_control');
}
add_action("plugins_loaded", "socialshare_init");
wp_register_style($handle = 'socialshare-css', $src = plugins_url('social-share.css', __FILE__), $deps = array(), $ver = '1.0.0', $media = 'all');
wp_enqueue_style('socialshare-css');
?>