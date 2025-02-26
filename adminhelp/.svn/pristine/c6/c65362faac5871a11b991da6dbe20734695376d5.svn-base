<?php
if (function_exists('load_plugin_textdomain')) {
    load_plugin_textdomain('adminhelp', 'wp-content/plugins/adminhelp');
}
function ahelpmenu_request($name, $default=null) 
{
	if (!isset($_REQUEST[$name])) return $default;
	return stripslashes_deep($_REQUEST[$name]);
}
	

function ahelpmenu_field_textarea($name, $label='', $tips='', $attrs='')
{
  global $options;
  
  if (strpos($attrs, 'cols') === false) $attrs .= 'cols="70"';
  if (strpos($attrs, 'rows') === false) $attrs .= 'rows="5"';
  
  echo '<th scope="row">';
  echo '<label for="options[' . $name . ']">' . $label . '</label></th>';
  echo '<td><textarea wrap="on" ' . $attrs . ' name="options[' . $name . ']">' . 
    htmlspecialchars($options[$name]) . '</textarea>';
  echo '<br /> ' . $tips;
  echo '</td>';
}	

if (isset($_POST['save']))
{
    if (!wp_verify_nonce($_POST['_wpnonce'], 'save')) die('Securety violated');
    $options = ahelpmenu_request('options');
    update_option('ahelpmenu', $options);
}
else 
{
    $options = get_option('ahelpmenu');
}
?>	

<div class="wrap">

<form method="post">
<?php wp_nonce_field('save') ?>
<h2>Admin Custom Help Menu</h2>        

<table class="form-table">
<tr valign="top"><?php ahelpmenu_field_textarea('helpmenuoptions', __('Help Menu', 'admin-menu'), __('add text to the box above', 'admin-menu'), 'rows="10"'); ?></tr>

</table>



<p class="submit"><input type="submit" name="save" value="<?php _e('save', 'header-footer'); ?>"></p>

</form>
</div>
