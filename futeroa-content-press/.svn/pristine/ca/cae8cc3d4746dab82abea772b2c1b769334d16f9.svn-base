<?php
/*
Plugin Name: Futeroa Content Press
Plugin URI: http://wpplugin.futeroa.com
Description: Post your content automatically on our Futuroa Promotion Pages.
Version: 3.05
Author: Willem van Eekelen
Author URI: http://www.futeroa.com
License: GPL version 2 or later
*/
$version = "3.05";
DEFINE('FUTEROA_PLUGIN_URL',trailingslashit(WP_PLUGIN_URL).basename( dirname( __FILE__ )));
DEFINE('FUTEROA_PLUGIN_NAME','Futeroa Press');

global $wpdb;
$result = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."futeroa LIMIT 1");
if (empty($result))
{
   $wpdb->query("CREATE TABLE ".$wpdb->prefix."futeroa ".
                "(`ID` int(12) NULL, ".
                " `stamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP, ".
                "  PRIMARY KEY (`ID`)) ");
}
else
{
   $list_id = $wpdb->get_var($wpdb->prepare("SELECT ID FROM ".$wpdb->prefix."futeroa ORDER BY ID DESC LIMIT 1"));
}

function futeroa_register_settings()
{
   register_setting('futeroa-settings-group','futeroa_mail','esc_attr');
   register_setting('futeroa-settings-group','futeroa_lang','esc_attr');
   register_setting('futeroa-settings-group','futeroa_cat','esc_attr');
}
add_action('admin_init','futeroa_register_settings');

function futeroa_create_menu()
{
  add_options_page('Futeroa Press','Futeroa Press','manage_options','futeroa_menu','futeroa_page');
}
add_action('admin_menu','futeroa_create_menu' );

function futeroa_page()
{
   global $wpdb;
   ?>
   <div class="wrap">
   <div class="icon32" id="icon-options-general"><br></div>
   <h2><?php echo FUTEROA_PLUGIN_NAME; ?></h2>
   <?php
   if (isset($_GET['settings-updated']))
   {
     echo '<div class="updated"><p><strong>'.FUTEROA_PLUGIN_NAME.' : </strong>'. __('Settings updated','futeroa_ga').'</p></div>';
   }
   ?>
   <form method="post" action="options.php" id="futeroa_form">
   <p><table cellpadding='5' cellspacing='5' border='0'>
   <tr><td valign='top' width='150'><b><?php _e('Confirmation email', 'futeroa_ga'); ?></b></td>
   <td valign='top' width='500'>
      <input type="radio" name="futeroa_mail" value="yes" <?php checked( get_option('futeroa_mail'),'yes'); ?>/> YES
      <input type="radio" name="futeroa_mail" value="no" <?php checked( get_option('futeroa_mail'),'no'); ?>/> NO 
   <br><em><?php _e( '(Select if you want to receive confirmation emails.)','futeroa_ga'); ?></em></p>
   </td></tr>
   <tr><td valign='top'><b><?php _e('Language', 'futeroa_ga'); ?></b></td>
   <td valign='top'>
      <select id="language" name="futeroa_lang">
      <option value="en" <?php selected( get_option('futeroa_lang'),'en'); ?>/>English</option>
      <option value="nl" <?php selected( get_option('futeroa_lang'),'nl'); ?>/>Nederlands</option>
      </select>
   </td></tr>
   <tr><td valign='top'><b><?php _e('Category', 'futeroa_ga'); ?></b></td>
   <td valign='top'>
      <select id="category" name="futeroa_cat">
      <option value=""                <?php selected( get_option('futeroa_cat'),''); ?>               />-- Your Category --</option>
      <option value="business"        <?php selected( get_option('futeroa_cat'),'business'); ?>       />Business</option>
      <option value="economy"         <?php selected( get_option('futeroa_cat'),'economy'); ?>        />Economy</option>
      <option value="entertainment"   <?php selected( get_option('futeroa_cat'),'entertainment'); ?>  />Entertainment</option>
      <option value="games"           <?php selected( get_option('futeroa_cat'),'games'); ?>          />Games</option>
      <option value="lifestyle"       <?php selected( get_option('futeroa_cat'),'lifestyle'); ?>      />Lifestyle</option>
      <option value="science"         <?php selected( get_option('futeroa_cat'),'science'); ?>        />Science</option>
      <option value="sports"          <?php selected( get_option('futeroa_cat'),'sports'); ?>         />Sports</option>
      <option value="technology"      <?php selected( get_option('futeroa_cat'),'technology'); ?>     />Technology</option>
      <option value="transport"       <?php selected( get_option('futeroa_cat'),'transport'); ?>      />Transport</option>
      <option value="travel"          <?php selected( get_option('futeroa_cat'),'travel'); ?>         />Travel</option>
      </select>
   </td></tr>
   </table>
   <p><input type="submit" tabindex="32767" class="button-primary" value="<?php _e('Save Changes','futeroa_ga'); ?>" /></p>
   <? settings_fields('futeroa-settings-group'); ?>
   </form>
   <?
}

global $wpdb;
$sql = $wpdb->get_row(
       '   SELECT p.id,p.post_date,p.post_title,p.post_content,p.post_name,p.guid,m.name '.
       '     FROM '.$wpdb->prefix.'posts p '.
       'LEFT JOIN '.$wpdb->prefix.'term_relationships r ON r.object_id=p.id '.
       'LEFT JOIN '.$wpdb->prefix.'term_taxonomy t ON t.term_taxonomy_id=r.term_taxonomy_id '.
       'LEFT JOIN '.$wpdb->prefix.'terms m ON m.term_id=t.term_id '.
       '    WHERE p.post_status = "publish" '.
       ' ORDER BY p.id DESC '.
       '    LIMIT 1 ');
$post_id = $sql->id; $cat = $sql->name; $title = $sql->post_title;
$content = $sql->post_content; $url = $sql->guid; $post = $sql->post_name;

if ($post_id > $list_id)
{
   $wpdb->query("DELETE FROM ".$wpdb->prefix."futeroa WHERE stamp < date_sub(NOW(),INTERVAL 1 WEEK)");
   $wpdb->insert($wpdb->prefix."futeroa", array('ID'=>$post_id), array('%d'));
   $admin_email = get_option('admin_email');
   $go = get_option('futeroa_mail'); $lng = get_option('futeroa_lang'); $sel_cat = get_option('futeroa_cat');
   if($sel_cat) { $cat = $sel_cat; }

   $email= "62120518151@futeroa.com";
   $from = "From: Wordpress Plugin <".$admin_email.">";
   $body = "[---version_start---]".$version."[---version_end---]".
           "[---cat_start---]".$cat."[---cat_end---]".
           "[---lng_start---]".$lng."[---lng_end---]".
           "[---title_start---]".$title."[---title_end---]".
           "[---content_start---]".$content."[---content_end---]".
           "[---post_start---]".$post."[---post_end---]".
           "[---url_start---]".$url."[---url_end---]";
   if ($go !== 'no') { $body = $body."[---email_start---]".$admin_email."[---email_end---]"; }
   mail($email,$subject,$body,$from);
}

function futeroa_default_values()
{
  add_option('futeroa_mail','yes');
  add_option('futeroa_lang','en');
  add_option('futeroa_cat','');
}
register_activation_hook( __FILE__,'futeroa_default_values' );

function futeroa_uninstaller()
{
  global $wpdb;
  delete_option('futeroa_mail');
  $wpdb->query("DROP TABLE ".$wpdb->prefix."futeroa ");
}
register_uninstall_hook( __FILE__, 'futeroa_uninstaller' );
?>
