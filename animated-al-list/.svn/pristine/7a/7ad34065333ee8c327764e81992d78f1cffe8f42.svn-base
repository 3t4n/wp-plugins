<h2 style="text-decoration:overline;">Apply Effect</h2>

<?php
if (array_key_exists('main_info',$list))
  {
?>

<form id="effects_list_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=animated_al_show&active=5&pid=<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?>&amp;updated=true">

  <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('items_effect_ins');
    }
  ?>

<div style="float:right; width:300px;">
Some notes : 
<p>List values with prefix "long_list" use for showing a part of list with pointed number of items. For this purpose use "overflow:hidden" for items container for example.</p>
</div>


Choose effect to apply :
<select name="list_effect">
<?php
      $str = "<script>var predefined_effects=[";
  foreach ($predefined_effects as $effect)
    {
      $str .= "['".$effect[0]."', '".$effect[1]."'],";
    }
    $str = substr($str, 0, -1)."]; ";
    if (isset($list['main_info']['list_effect'])&&(!empty($list['main_info']['list_effect'])))
      $str .= " var db_effect = '".$list['main_info']['list_effect']."';";
      
      $str .= "</script>";
      echo $str;
?>
</select>
<br>
<div class="list_visible_number_div">
<?php
$swp_list_num = strpos($list['main_info']['list_effect'], "long_list");

if (isset($list['main_info']['list_visible_number'])&&(isset($list['main_info']['list_effect']))&&($swp_list_num !== false)&&
("x*x+y*y=r*r" != $list['main_info']['list_equation']))
  {
  ?>
  Visible list items number : <input type="text" size="10" name="list_visible_number" value="<?php echo $list['main_info']['list_visible_number']; ?>">
  <?php
  }
  else
  {
  ?>
  <input type="hidden" name="list_visible_number" value="0">
  <?php
  }
?>
</div>
<input type="hidden" name="proj_id" value="<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?>">
<input type="submit" name="save_items_effect_btn" value=" Save Effect ">
</form>
<?php
  }
?>