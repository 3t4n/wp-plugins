<?php
function pstl_request($name, $default=null)
{
    if (!isset($_REQUEST[$name])) return $default;
    if (get_magic_quotes_gpc()) return pstl_stripslashes($_REQUEST[$name]);
    else return $_REQUEST[$name];
}

function pstl_stripslashes($value)
{
    $value = is_array($value) ? array_map('pstl_stripslashes', $value) : stripslashes($value);
    return $value;
}

function pstl_field_text($name, $label='', $tips='', $attrs='')
{
  global $options;
  if (strpos($attrs, 'size') === false) $attrs .= 'size="35"';
  echo '<tr valign="top"><th class="th-fixed" scope="row">';
  echo '<label for="options[' . $name . ']">' . $label . '</label></th>';
  echo '<td><input type="text" ' . $attrs . ' name="options[' . $name . ']" value="' .
    htmlspecialchars($options[$name]) . '"/>';
  echo ' ' . $tips;
  echo '</td></tr>';
}

function pstl_field_text2($name, $label='', $tips='', $attrs='')
{
  global $options;
  if (strpos($attrs, 'size') === false) $attrs .= 'size="10"';
  echo '<tr valign="top"><th class="th-fixed" scope="row">';
  echo '<label for="options[' . $name . ']">' . $label . '</label></th>';
  echo '<td><input type="text" ' . $attrs . ' name="options[' . $name . ']" value="' .
    htmlspecialchars($options[$name]) . '"/>';
  echo ' ' . $tips;
  echo '</td></tr>';
}

function pstl_field_checkbox($name, $label='', $tips='', $attrs='')
{
  global $options;
  echo '<tr valign="top"><th class="th-fixed" scope="row">';
  echo '<label for="options[' . $name . ']">' . $label . '</label></th>';
  echo '<td><input type="checkbox" ' . $attrs . ' name="options[' . $name . ']" value="1" ' .
    ($options[$name]!= null?'checked':'') . '/>';
  echo ' ' . $tips;
  echo '</td></tr>';
}

function pstl_field_textarea($name, $label='', $tips='', $attrs='')
{
  global $options;

  if (strpos($attrs, 'cols') === false) $attrs .= 'cols="70"';
  if (strpos($attrs, 'rows') === false) $attrs .= 'rows="5"';

  echo '<tr valign="top"><th class="th-fixed" scope="row">';
  echo '<label for="options[' . $name . ']">' . $label . '</label></th>';
  echo '<td><textarea wrap="off" ' . $attrs . ' name="options[' . $name . ']">' .
    htmlspecialchars($options[$name]) . '</textarea>';
  echo '<br /> ' . $tips;
  echo '</td></tr>';
}

if (isset($_POST['save']))
{
  $options = pstl_request('options');
  update_option('pstl', $options);
}
else
{
    $options = get_option('pstl');
}
?>
<style type="text/css">
.form-table th.th-fixed {width:200px;}
.form-table th.th-blank {background:#FFFFFF;}
</style>
<div class="wrap">
<form method="post">

<h2>Addynamo</h2>

<p>Click <a href="http://www.addynamo.com" target="_blank">here</a> to visit Addynamo to get your embedding code.</p>

<strong>Usage</strong>
<ul>
	<li>Select where you want to insert ads on your site by adding the code into the fields below</li>
	<li>Copy and paste the embed code ID from <a href="http://www.addynamo.com" target="_blank">Addynamo</a></li>
    <li>Enter a width and height for your ad - also found in the embed code</li>
    <li>Insert the same ads across different pages by clicking the check box to display the same ads</li>
    <li>Did you know that we have a sidebar widget as well? Click here to get it.</li>
</ul>

<h3>Home</h3>
<p>To display your ads on your homepage</p>
<table class="form-table">
<th class="th-blank" colspan="100%">Before the post</th>
<? pstl_field_text('home_before', 'ID'); ?>
<? pstl_field_text2('home_before_width', 'width'); ?>
<? pstl_field_text2('home_before_height', 'height'); ?>
</table>
<table class="form-table">
<th class="th-blank" colspan="100%">After the post</th>
<? pstl_field_text('home_after', 'ID'); ?>
<? pstl_field_text2('home_after_width', 'width'); ?>
<? pstl_field_text2('home_after_height', 'height'); ?>
</table>

<h3>Single post</h3>
<p>To display ads when viewing a post on a single page</p>
<table class="form-table">
<? pstl_field_checkbox('post_home', 'Same as above', 'Check this box if you want to dispaly the ads the same as above'); ?>
<th class="th-blank" colspan="100%">Before the post</th>
<? pstl_field_text('post_before', 'ID'); ?>
<? pstl_field_text2('post_before_width', 'width'); ?>
<? pstl_field_text2('post_before_height', 'height'); ?>
</table>
<table class="form-table">
<th class="th-blank" colspan="100%">After the after</th>
<? pstl_field_text('post_after', 'ID'); ?>
<? pstl_field_text2('post_after_width', 'width'); ?>
<? pstl_field_text2('post_after_height', 'height'); ?>
</table>

<h3>Page</h3>
<p>To display ads on your general website pages.</p>
<table class="form-table">
<? pstl_field_checkbox('page_post', 'Same as above', 'Check this box if you want to dispaly the ads the same as above'); ?>
<th class="th-blank" colspan="100%">Before the page</th>
<? pstl_field_text('page_before', 'ID'); ?>
<? pstl_field_text2('page_before_width', 'width'); ?>
<? pstl_field_text2('page_before_height', 'height'); ?>
</table>
<table class="form-table">
<th class="th-blank" colspan="100%">After the page</th>
<? pstl_field_text('page_after', 'ID'); ?>
<? pstl_field_text2('page_after_width', 'width'); ?>
<? pstl_field_text2('page_after_height', 'height'); ?>
</table>

<h3>Categories</h3>
<p>To display ads on your category pages.</p>
<p><strong>IMPORTANT</strong> Make sure that your content is <strong>not showing excerpt (usually the_excerpt in the archive template)</strong> in the template.</p>
<table class="form-table">
<? pstl_field_checkbox('cat_post', 'Same as above', 'Check this box if you want to dispaly the ads the same as above'); ?>
<th class="th-blank" colspan="100%">Before the post</th>
<? pstl_field_text('cat_before', 'ID'); ?>
<? pstl_field_text2('cat_before_width', 'width'); ?>
<? pstl_field_text2('cat_before_height', 'height'); ?>
</table>
<table class="form-table">
<th class="th-blank" colspan="100%">After the post</th>
<? pstl_field_text('cat_after', 'ID'); ?>
<? pstl_field_text2('cat_after_width', 'width'); ?>
<? pstl_field_text2('cat_after_height', 'height'); ?>
</table>

<p class="submit"><input type="submit" name="save" value="Save Ads"></p>
</form>
</div>
