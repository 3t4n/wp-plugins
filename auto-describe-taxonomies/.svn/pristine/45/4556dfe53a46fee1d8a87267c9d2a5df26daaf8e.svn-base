<?php
/*
Plugin Name: Auto Describe Taxonomies
Plugin URI: http://wordpress.org/extend/plugins/auto-describe-taxonomies/
Description:This plugin will auto-describe your post tags using freebase.<br>All you have to do after enabling it is to watch it work!<br>If you dont see any tag description in your frontend tag pages, make sure your wordpress theme is displaying them!<br>More information can be found here:<a href=\"http://www.bowie-tx.com/auto-describe-taxonomies/\">http://www.bowie-tx.com/auto-describe-taxonomies/</a>
Version: 1.1.4
Author: itscoolreally
Author URI: http://www.bowie-tx.com/
*/

register_activation_hook( __FILE__, 'adtaxonomies_tags_activate' );
register_deactivation_hook( __FILE__, 'adtaxonomies_tags_deactivate' );

define('CACHE','cache');
define('CACHE_AGE', 86400 * 7);

function adtaxonomies_tags_activate()
{
  global $wpdb, $wp_version;

  if (version_compare($wp_version, "3.0.1", "<"))
  {
    $error = "Your version of Wordpress is " . $wp_version . " and this plugin requires at least version 3.0.1 -- Please use your browser's back button and then upgrade your version of Wordpress";
    wp_die($error);
  }

  add_option('adtaxonomies_tags_described', array(), '', 'yes');
  add_option('adtaxonomies_cats_described', array(), '', 'yes');
  add_option('adtaxonomies_tags_exclude', '', '', 'yes');
  add_option('adtaxonomies_cats_exclude', '', '', 'yes');
  add_option('adtaxonomies_tags_advertise', 0, '', 'yes');
}

function adtaxonomies_tags_deactivate()
{
}

add_action('admin_menu', 'adtaxonomies_tags_menu');
add_action('wp_footer', 'adtaxonomies_tags_advertise');

function adtaxonomies_tags_menu()
{
  add_menu_page('Auto Describe Taxonomies', 'Auto Describe Taxonomies', 'administrator', __FILE__, 'adtaxonomies_tags_menu_html',plugins_url('favicon.ico', __FILE__));
  add_action('admin_init', 'adtaxonomies_tags_register_mysettings');
}

function adtaxonomies_tags_register_mysettings() 
{
  //register our settings
  register_setting('adtaxonomies_tags_group', 'adtaxonomies_tags_exclude');
  register_setting('adtaxonomies_cats_group', 'adtaxonomies_tags_exclude');
  register_setting('adtaxonomies_tags_group', 'adtaxonomies_tags_advertise');
}
        
function adtaxonomies_tags_menu_html()
{
?>
<div class="wrap">
<div style='width:200px;float:left'>
  <div id="icon-tools" class="icon32"><br /></div>
</div>
<form method="post" action="options.php">
<?php settings_fields('adtaxonomies_tags_group'); ?>
<div class="postbox">
  <h2>Auto Describe Taxonomies - Settings</h2>
<table class='form-table'>
  <tr>
    <th width="301" scope="row" align="right">Excluded tags:</th>
    <td>
      <input size="90" name="adtaxonomies_tags_exclude" type="text" id="adtaxonomies_tags_exclude" value="<?php echo get_option('adtaxonomies_tags_exclude'); ?>" />
    </td>
  </tr>
  <tr><th></th><td><span class="description">Coma separated tag list to be excluded. Ex.: api,google</span></td></tr>
  <tr>
    <th width="301" scope="row" align="right">Total tags described:</th>
    <td>
      <?php echo sizeof(get_option('adtaxonomies_tags_described')); ?>
    </td>
  </tr>
  <tr>
    <th width="301" scope="row" align="right">Described tags:</th>
    <td>
		<?php
            $comma = 0;
 			foreach (array_keys(get_option('adtaxonomies_tags_described')) as $name) {
				// Get the tag id
				$tag_id = term_exists("$name");
				// Get the URL of this tag
				$tag_link = get_tag_link( (int)$tag_id, 'post_tag' );
				if ($comma == 0) $format = '<a href="%s" title="%s">%s</a>';
				else $format = ', <a href="%s" title="%s">%s</a>';
				echo sprintf(
					$format,
					esc_url($tag_link),
					$tag_id,$name
				);
				$comma=1;																										
			}
		?>
    </td>
  </tr>
  <tr>
    <th width="301" scope="row" align="right">Excluded categories:</th>
    <td>
      <input size="90" name="adtaxonomies_cats_exclude" type="text" id="adtaxonomies_cats_exclude" value="<?php echo get_option('adtaxonomies_cats_exclude'); ?>" />
    </td>
  </tr>
  <tr><th></th><td><span class="description">Coma separated categories list to be excluded. Ex.: api,google</span></td></tr>
  <tr>
    <th width="301" scope="row" align="right">Total categories described:</th>
    <td>
										<?php
            $comma = 0;
 			foreach (array_keys(get_option('adtaxonomies_cats_described')) as $name) {
				// Get the ID of a given category
				$category_id = get_cat_ID( "$name" );
 
				// Get the URL of this category
				$category_link = get_category_link( $category_id );
				
				if ($comma == 0) $format = '<a href="%s" title="%s">%s</a>';
				else $format = ', <a href="%s" title="%s">%s</a>';
				echo sprintf(
					$format,
					esc_url($category_link),
					$category_id,$name
				);
				$comma=1;																										
																														
			}
		?>
    </td>
  </tr>
  <tr>
    <th width="301" scope="row" align="right">Described categories:</th>
    <td>
      <?php echo implode(', ',array_keys(get_option('adtaxonomies_cats_described')));?>
    </td>
  </tr>
  <tr>
    <th width="301" scope="row" align="right">Advertise:</th>
    <td>
        <input type="radio" name="adtaxonomies_tags_advertise" value="1" <?php echo((get_option('adtaxonomies_tags_advertise')=='1')?('checked'):(''))?>>Yes / <input type="radio" name="adtaxonomies_tags_advertise" value="0" <?php echo((get_option('adtaxonomies_tags_advertise')=='1')?(''):('checked'))?>> No<br>  
    </td>
  </tr>
  <tr>
    <th colspan="2">
      <input type="hidden" name="action" value="update" />
      <p class='submit'><input type="submit" value="<?php _e('Save Changes') ?>" /></p>
    </th>
  </tr>
  <tr>
    <th colspan="2">
    </th>
  </tr>
</table>
</form>
</div>
<?php
}

add_filter( "the_content", "adtaxonomies_tags_the_content", 10);

function adtaxonomies_tags_the_content($content)
{
  $postid = $post->ID;

  $post_tags = get_the_tags($postid);
  $my_tags = get_option('adtaxonomies_tags_described');
  $ignore_tags = explode(',',strtolower(get_option('adtaxonomies_tags_exclude'))); //dan left this out
  $skip = 0;
  //dan also left out the following sanity check
  if(is_array($post_tags) && count((array)$post_tags)>0)
  foreach ($post_tags as $tag)
  {
    if (
       !$skip && 
       empty($my_tags[$tag->name]) && 
       !in_array(strtolower($tag->name), $ignore_tags))
    {//this tags was never described. lets describe it
      $skip = 1;
      $my_tags[$tag->name] = $tag->term_id;

      $term = $tag->name;
      $topic = '/en/'.strtolower(str_replace(' ','_',$term));
      $url = 'http://api.freebase.com/api/experimental/topic/basic?id='.$topic;
 
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $jsonresultstr = curl_exec($ch);
      curl_close($ch);
      $resultarray = json_decode($jsonresultstr, true); 

      if (!empty($resultarray[$topic]['result']['description']))
      {
        wp_update_term($tag->term_id, 'post_tag', array('description' => $resultarray[$topic]['result']['description']));
      }
      update_option('adtaxonomies_tags_described', $my_tags);
    }
  }

  if (!$skip)
    $post_cats = get_the_category($postid);
    $my_cats = get_option('adtaxonomies_cats_described');

    $ignore_cats = explode(',',strtolower(get_option('adtaxonomies_cats_exclude')));
    $tmp = array();
    foreach($ignore_cats as $value)
      $tmp[] = trim($value);
    $ignore_cats = $tmp;
    //and he left out this following sanity check
    if(is_array($post_cats) && count((array)$post_cats)>0)
    foreach ($post_cats as $tag)
    {
      if (!$skip && empty($my_cats[$tag->name]) && !in_array(strtolower($tag->name), $ignore_cats))
      {//this cats was never described. lets describe it
        $skip = 1;
        $my_cats[$tag->name] = $tag->term_id;

        $term = $tag->name;
        $topic = '/en/'.strtolower(str_replace(' ','_',$term));
        $url = 'http://api.freebase.com/api/experimental/topic/basic?id='.$topic;
   
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $jsonresultstr = curl_exec($ch);
        curl_close($ch);
        $resultarray = json_decode($jsonresultstr, true); 

        if (!empty($resultarray[$topic]['result']['description']))
        {
          wp_update_term($tag->term_id, 'category', array('description' => $resultarray[$topic]['result']['description']));
        }
        update_option('adtaxonomies_cats_described', $my_cats);
      }
    }
  {
  }
  
  return $content;
}

function adtaxonomies_tags_advertise()
{
  if (get_option('adtaxonomies_tags_advertise') == 1) 
  {
    echo("<p align='center'><small>Page optimized by <a href='http://wordpress.org/extend/plugins/auto-describe-taxonomies/' title='Auto Describe Taxonomies' style='text-decoration:none;'>Auto Describe Taxonomies</a> - <a href='http://www.bowierocks.com' title='Life in Bowie, TX' style='text-decoration:none;'>Bowie, TX - The Experience!</a></small></p>");
  }
}

?>
