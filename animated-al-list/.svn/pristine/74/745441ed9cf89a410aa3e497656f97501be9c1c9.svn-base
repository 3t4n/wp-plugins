<h2 style="text-decoration:overline;">Items Positions</h2>
<div>
<div class='position_errors' style="color:red;">

</div>
<?php
if (array_key_exists('main_info',$list))
{
?>
<div style="float:right; width:300px;">
Predefined states : 
<select name="predefined_states">
<option value="none">none</option>
<?php
foreach ($predefined_list as $prl)
  {
    echo "<option value='".$prl['name']."'>".$prl['name']."</option>";
  }
?>
</select>
<p>Positions of the elements depends on main container parameters (width and height in "List Settings" section) and quantity of elements also.</p>
</div>

<form id="positions_list_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=animated_al_show&active=4&pid=<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?>&amp;updated=true">

  <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('items_positions_ins');
    }
  ?>
Equation : 
<select name="position_equation">
<option value="none">none</option>
<?php
foreach ($position_equation as $peq)
  {
  if ((isset($list['main_info']['list_equation']))&&($list['main_info']['list_equation'] == $peq))
    echo "<option value='$peq' selected>$peq</option>";
    else
    echo "<option value='$peq'>$peq</option>";
  }
?>
</select>
<div class="equa_rest_fields">
<?php
if (isset($list['main_info']['list_equation_koef'])&&(!empty($list['main_info']['list_equation_koef'])))
{
$list_equation_koef = explode("***", $list['main_info']['list_equation_koef']);

foreach ($list_equation_koef as $leqk)
  {
  $swp_leqk = explode("**", $leqk);
    echo $swp_leqk[0] . " <input type='text' size='10' name=\"equa_addit[".$swp_leqk[0]."]\" value='".$swp_leqk[1]."'>";
  }
}
?>
</div>
<p>
Offset div relativly system coordinates of the graph of the equation :<br>
Left <input type="text" size="10" name="list_offset_left" value="<?php echo $list['main_info']['list_offset_left']; ?>"><br>
Top &nbsp;<input type="text" size="10" name="list_offset_top" value="<?php echo $list['main_info']['list_offset_top']; ?>"><br>
Radius of moving First/Last element in list &nbsp;<input type="text" size="10" name="move_radius_fl" value="<?php echo $list['main_info']['radius_first_last_elem']; ?>"><br>
<p>Side of moving First/Last element :
Left/Down <input type="radio" name="side_of_moving_fl" value="1" <?php if ($list['main_info']['side_of_moving_first_last']==1)echo 'checked'; ?>> 
Right/Up <input type="radio" name="side_of_moving_fl" value="-1" <?php if ($list['main_info']['side_of_moving_first_last']==-1)echo 'checked'; ?>></p>
<input type="hidden" name="proj_id" value="<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?>">
<input type="submit" name="save_items_positions_btn" value=" Save Positions equation ">
</form>

<?php 
 }
?>
</div>