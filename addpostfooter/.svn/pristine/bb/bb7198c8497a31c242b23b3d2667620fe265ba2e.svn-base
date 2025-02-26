<?php
/**
 * @package addPostFooter
 * @author Georgi Kodinov
 * @version 1.1.1
 */

/*
Plugin Name: addPostFooter
Plugin URI: http://www.progem.bg/kgeorge/?p=442
Description: Appends HTML or PHP code to the post text in single post display. Useful for adding e.g. adsense ads or counters.
Author: Georgi "Joro" Kodinov
Version: 1.1.1
Author URI: http://www.progem.bg/kgeorge
*/

//config page code
$addPostFooterOptionContentName= 'addPostFooterOptionContent';
$addPostFooterOptionPHPName= 'addPostFooterOptionPHP';
$addPostFooterOptionGroup= 'addPostFooterOptions';

function addPostFooterRegisterSettings() 
{
  global $addPostFooterOptionContentName;
  global $addPostFooterOptionPHPName;
  global $addPostFooterOptionGroup;
  register_setting( $addPostFooterOptionGroup, 
    $addPostFooterOptionContentName);
  register_setting( $addPostFooterOptionGroup, 
    $addPostFooterOptionPHPName);
}

function display_config_page()
{
  global $addPostFooterOptionContentName;
  global $addPostFooterOptionPHPName;
  global $addPostFooterOptionGroup;

  $evaluate_as= get_option($addPostFooterOptionPHPName);
  $html_selected='';
  $php_selected='';
  if ($evaluate_as == "PHP")
    $php_selected= "SELECTED";
  else
    $html_selected= "SELECTED";
?>
<div class="wrap">
  <form method="post" action="options.php">
    <?php settings_fields( $addPostFooterOptionGroup); ?>
    <h2><?php _e('addPostFooter Plugin Settings'); ?></h2>
    <h3><?php _e('Content to Append to the Post'); ?></h3>
    <textarea name="<?php echo $addPostFooterOptionContentName; ?>"
        style="width: 80%; height=100px;"><?php echo get_option($addPostFooterOptionContentName); ?></textarea>
    <table><tr>
    <td>Evaluate as:&nbsp;</td>
    <td>
      <SELECT name="<?php echo $addPostFooterOptionPHPName; ?>">
        <OPTION <?php echo $html_selected ?> >HTML</OPTION>
        <OPTION <?php echo $php_selected ?> >PHP</OPTION>
     </td></tr></table>

     <p class="submit">
       <input type="submit" class='submit_primary' value="<?php _e('Save Changes') ?>" />
     </p>
  </form>
</div>
<?php
}

function addPostFooterMenu()
{
  add_options_page(__('addPostFooter Settings'), __('addPostFooter'), 9, 
    __FILE__, 'display_config_page');
}

// plugin implementation

// the hook that will print the footer to the post
function add_post_footer($content='') {
  global $addPostFooterOptionContentName;
  global $addPostFooterOptionPHPName;
  if (is_single())
  {
    $footer= get_option($addPostFooterOptionContentName);
    $evaluate_as= get_option($addPostFooterOptionPHPName);
    if ($evaluate_as == "PHP")
      $footer= eval($footer);
    if (strlen($footer))
      $content.= '<div>'.$footer.'</div>';
  }
  return $content;
}

// Now we set up hooks 
if (is_admin())
{
  add_action('activate_add_post_footer.php', 'init_vars');
  add_action('admin_menu', 'addPostFooterMenu');
  add_action('admin_init', 'addPostFooterRegisterSettings');
}

add_filter('the_content', 'add_post_footer');

?>
