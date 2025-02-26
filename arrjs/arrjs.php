<?php
/*
Plugin Name: ArrJS
Plugin URI: http://design.bybrandon.net/
Description: This plugin will add a random quote widget. The JS comes from <a href="http://thewebthought.blogspot.com/2010/11/jquery-random-quotes-from-txt-file.html">this post</a> which <a href="http://design.bybrandon.net">the plugin author</a> implemented for Wordpress.
Author: Brandon Lyon
Version: 1
Author URI: http://design.bybrandon.net/
*/

function arrjs() {
  echo'
		<p class="arrjsquotes"></p>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			$.get(\'/wp-content/plugins/arrjs/quotes.txt\', function(data) {
				var quotes = data.split("\@");
				var idx = Math.floor(quotes.length * Math.random());
				$(\'.arrjsquotes\').html(quotes[idx]);
			});
		});
		</script>
  ';
}

function widget_arrjs($args) {
  extract($args);
 
  $options = get_option("widget_arrjs");
  if (!is_array( $options ))
{
$options = array(
      'title' => 'My Widget Title'
      );
  }
 
  echo $before_widget;
    echo $before_title;
      echo $options['title'];
    echo $after_title;
 
    //Our Widget Content
    arrjs();
  echo $after_widget;
}
 
function widgetarrjs_control()
{
  $options = get_option("widget_arrjs");
  if (!is_array( $options ))
{
$options = array(
      'title' => 'My Widget Title'
      );
  }
 
  if ($_POST['arrjs-Submit'])
  {
    $options['title'] = htmlspecialchars($_POST['arrjs-WidgetTitle']);
    update_option("widget_arrjs", $options);
  }
 
?>
  <p>
    <label for="arrjs-WidgetTitle">Widget Title: </label>
    <input type="text" id="arrjs-WidgetTitle" name="arrjs-WidgetTitle" value="<?php echo $options['title'];?>" />
    <input type="hidden" id="arrjs-Submit" name="arrjs-Submit" value="1" />
  </p>
<?php
}

 
function arrjs_init()
{
  register_sidebar_widget(__('ArrJS Random Quotes'), 'widget_arrjs');
  register_widget_control(   'ArrJS Random Quotes', 'widgetarrjs_control', 300, 200 );
}
add_action("plugins_loaded", "arrjs_init");
?>
