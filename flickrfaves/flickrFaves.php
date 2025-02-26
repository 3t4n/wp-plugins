<?php
/*
Plugin Name: flickrFaves
Plugin URI: http://lifeasitcomes.com/flickrfaves/
Description: A plugin to display users' flickr favorites on their <a href="http://wordpress.org/">Wordpress</a> sites.  Uses <a href="http://www.b3co.com/?c=blog&mode=entry&id=617">Favoritas de Flickr en RSS</a> (now included and renamed to 'flickrss.php').  This plugin is based upon <a href="http://eightface.com/wordpress/flickrrss/">flickrRSS</a>.
Version: trunk
License: GPL
Author: Kevin T Driver
Author URI: http://lifeasitcomes.com/
*/

function get_flickrFaves() {

	// the function can accept up to seven parameters, otherwise it uses option panel defaults 	
  	for($i = 0 ; $i < func_num_args(); $i++) {
    	$args[] = func_get_arg($i);
    	}
        
  	if (!isset($args[0])) $num_items = get_option('flickrFaves_display_numitems'); else $num_items = $args[0];
  	if (!isset($args[1])) $imagesize = get_option('flickrFaves_display_imagesize'); else $imagesize = $args[1];
  	if (!isset($args[2])) $userid = stripslashes(get_option('flickrFaves_username')); else $userid = $args[2];
  	if (!isset($args[3])) $before_image = stripslashes(get_option('flickrFaves_before')); else $before_image = $args[3];
  	if (!isset($args[4])) $after_image = stripslashes(get_option('flickrFaves_after')); else $after_image = $args[4];

        if (!function_exists('MagpieRSS')) { // Check if another plugin is using RSS, may not work
		include_once (ABSPATH . WPINC . '/rss.php');
		error_reporting(E_ERROR);
	}

        //echo $imagesize;
        //echo $userid;
        //echo "<br/>";
 
       $rss_url = get_bloginfo('wpurl') . '/wp-content/plugins/flickrss.php?user=' . $userid; 
       //echo $rss_url;
       $rss = @ fetch_rss($rss_url);
       //echo "fetched<br/>";

       if($rss) {
         //echo "rss was true<br/>";

         if($num_items == "FeedLimit")
           $items = array_slice($rss->items,0);
         else 
           $items = array_slice($rss->items,0,$num_items); 

         foreach($items as $item){
           //echo $item['content'];
           $link = $item['link'];
           $contents = array_slice($item['content'],0);
           foreach($contents as $content){
             #echo $content;
               $imgurl = $content;
               #echo $imgurl . "<br/>";
               
               #change image size
               if ($imagesize == "square") {
             	 $imgurl = str_replace("m.jpg", "s.jpg", $imgurl);
               } elseif ($imagesize == "thumbnail") {
                 $imgurl = str_replace("m.jpg", "t.jpg", $imgurl);
               } elseif ($imagesize == "medium") {
                 $imgurl = str_replace("_m.jpg", ".jpg", $imgurl);
               }  

               #add alt and title
               $imgurl = str_replace(".jpg\"", ".jpg\" alt=\"\" title=\"\"", $imgurl);  

               echo $before_image . "<a href=\"$link\">" . $imgurl . "</a>$after_image";
           }
         }
         echo "<a href=\"http://www.flickr.com/photos/" . $userid . "/favorites/\">More Favorites</a>";   
       } else { echo "&middot;"; } 
}

function widget_flickrFaves_init() {
  if(!function_exists('register_sidebar_widget')) return;

  function widget_flickrFaves($args) {
    extract($args);
    
    $options = get_option('widget_flickrFaves');
    $title = $options['title'];
 
    echo $before_widget . $before_image . $title . $after_image ."<br/>";
    get_flickrFaves();
    echo $after_widget;
  }
  function widget_flickrFaves_control() {
    $options = get_option('widget_flickrFaves');
    if(!is_array($options))
      $options = array('title'=>'');
    if( $_POST['flickrFaves-submit'] ){
      $options['title'] = strip_tags(stripslashes($_POST['flickrFaves-title']));
      update_option('widget_flickrFaves', $options);
    } 
    
    $title = htmlspecialchars($options['title'], ENT_QUOTES);

    echo '<p style="text-align:right;"<label for="flickrFaves-title">Title: <input style="width: 200px;" id="gsearch-title" name="flickrFaves-title" type="text" value="'.$title.'" /></label></p>';

    echo '<input type="hidden" id="flickrFaves-submit" name="flickrFaves-submit" value="1" />';

  }
  register_sidebar_widget('flickrFaves', 'widget_flickrFaves');
  register_widget_control('flickrFaves', 'widget_flickrFaves_control',300,100);
}
  function flickrFaves_subpanel() {
    if(isset($_POST['update_flickrFaves'])) {
      $option_username = $_POST['flickrFaves_username'];
      $option_display_numitems = $_POST['display_numitems'];
      $option_display_imagesize = $_POST['display_imagesize'];
      $option_before = $_POST['before_image'];
      $option_after = $_POST['after_image'];
      update_option('flickrFaves_username', $option_username);
      update_option('flickrFaves_display_numitems', $option_display_numitems);
      update_option('flickrFaves_display_imagesize', $option_display_imagesize);
      update_option('flickrFaves_before', $option_before);
      update_option('flickrFaves_after', $option_after);
      ?> <div class="updated"><p>Options changes saved.</p></div> <?php
    }
    ?>
    <div class="wrap">
      <h2>flickrFaves Options</h2>
      <form method="post">
      <fieldset class="options">
      <table>
        <tr>
          <td><p><strong><label for="username">Flickr Username</label>:</strong></p></td>
          <td><input name="flickrFaves_username" type="text" id="flickrFaves_username" value="<?php echo get_option('flickrFaves_username'); ?>" size="20" /></td></tr>
        <tr>
          <td>
            <select name="display_numitems" id="display_numitems">
              <option <?php if(get_option('flickrFaves_display_numitems') == '1') {echo 'selected'; } ?> value="1">1</option>
              <option <?php if(get_option('flickrFaves_display_numitems') == '2') {echo 'selected'; } ?> value="2">2</option>
              <option <?php if(get_option('flickrFaves_display_numitems') == '3') {echo 'selected'; } ?> value="3">3</option>
              <option <?php if(get_option('flickrFaves_display_numitems') == '4') {echo 'selected'; } ?> value="4">4</option>
              <option <?php if(get_option('flickrFaves_display_numitems') == '5') {echo 'selected'; } ?> value="5">5</option>
              <option <?php if(get_option('flickrFaves_display_numitems') == '6') {echo 'selected'; } ?> value="6">6</option>
              <option <?php if(get_option('flickrFaves_display_numitems') == '7') {echo 'selected'; } ?> value="7">7</option>
              <option <?php if(get_option('flickrFaves_display_numitems') == '8') {echo 'selected'; } ?> value="8">8</option>
              <option <?php if(get_option('flickrFaves_display_numitems') == '9') {echo 'selected'; } ?> value="9">9</option>
              <option <?php if(get_option('flickrFaves_display_numitems') == '10') {echo 'selected'; } ?> value="10">10</option>
              <option <?php if(get_option('flickrFaves_display_numitems') == 'FeedLimit') {echo 'selected'; } ?> value="FeedLimit">Feed Limit</option>
            </select>
            <select name="display_imagesize" id="display_imagesize">
		      <option <?php if(get_option('flickrFaves_display_imagesize') == 'square') { echo 'selected'; } ?> value="square">square</option>
		      <option <?php if(get_option('flickrFaves_display_imagesize') == 'thumbnail') { echo 'selected'; } ?> value="thumbnail">thumbnail</option>
		      <option <?php if(get_option('flickrFaves_display_imagesize') == 'small') { echo 'selected'; } ?> value="small">small</option>
		      <option <?php if(get_option('flickrFaves_display_imagesize') == 'medium') { echo 'selected'; } ?> value="medium">medium</option>
		    </select>
            <label for="mediumImages">images</label>
           </td> 
         </tr>
         <tr>
          <td><p><strong><label for="before_image">Before</label>/<label for="after_image">After</label>:</strong></p></td>
          <td><input name="before_image" type="text" id="before_image" value="<?php echo htmlspecialchars(stripslashes(get_option('flickrFaves_before'))); ?>" size="10" /> / 
        	  <input name="after_image" type="text" id="after_image" value="<?php echo htmlspecialchars(stripslashes(get_option('flickrFaves_after'))); ?>" size="10" /> <em> e.g. &lt;li&gt;&lt;/li&gt;, &lt;p&gt;&lt;/p&gt;</em></p>
          </td>
         </tr>
         </table>
        </fieldset>

		<p><div class="submit"><input type="submit" name="update_flickrFaves" value="<?php _e('Update flickrFaves', 'update_flickrFaves') ?>"  style="font-weight:bold;" /></div></p>
        </form>       
        </div>
<?php  } // end flickrFaves_subpanel()

function fF_admin_menu() {
  if(function_exists('add_options_page')){
    add_options_page('flickrFaves Options Page', 'flickrFaves', 8, 'flickrFaves', 'flickrFaves_subpanel');
  }
}

add_action('admin_menu', 'fF_admin_menu');
add_action('plugins_loaded', 'widget_flickrFaves_init');
?>
