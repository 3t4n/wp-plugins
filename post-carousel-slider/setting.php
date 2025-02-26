<?php
$post_type = get_option('tn_post_type');
$showimage = get_option('tn_showimage');
$word_limit = get_option('tn_word_limit');
$query_post = get_option('tn_query_post');
$orderby= get_option('tn_orderby');
$order= get_option('tn_order');
$posts_category= get_option('tn_posts_category');
$autoplay = get_option('tn_autoplay');
$tn_speed = get_option('tn_speed');
$mode_set = get_option('tn_mode');
$minSlides = get_option('tn_minSlides');
$maxSlides = get_option('tn_maxSlides');

if (@$_POST['submit']) {
	$post_type = stripslashes($_POST['tn_post_type']);
	$showimage = stripslashes($_POST['tn_showimage']);
	$word_limit = stripslashes($_POST['tn_word_limit']);
	$query_post = stripslashes($_POST['tn_query_post']);
	$orderby = stripslashes($_POST['tn_orderby']);
	$order = stripslashes($_POST['tn_order']);
	$posts_category = stripslashes($_POST['tn_posts_category']);
	$autoplay = stripslashes($_POST['tn_autoplay']);
	$mode_set = stripslashes($_POST['tn_mode']);
	$tn_speed = stripslashes($_POST['tn_speed']);
	$minSlides = stripslashes($_POST['tn_minSlides']);
	$maxSlides = stripslashes($_POST['tn_maxSlides']);
	update_option('tn_post_type', $post_type );
	update_option('tn_showimage', $showimage );
	update_option('tn_word_limit', $word_limit );
	update_option('tn_query_post', $query_post );
	update_option('tn_orderby', $orderby );
	update_option('tn_order', $order );
	update_option('tn_posts_category', $posts_category );
	update_option('tn_autoplay', $autoplay );
	update_option('tn_mode', $mode_set );
	update_option('tn_speed', $tn_speed );
	update_option('tn_minSlides', $minSlides );
	update_option('tn_maxSlides', $maxSlides );
}
$fimg = array('YES'=>'YES',
            'NO'=>'NO');
$truefalse = array ('true' => 'YES','false'=>'NO')	;
$mode = array ('horizontal' => 'Horizontal','vertical'=>'Vertical')	;			
			
?>
            
<h2>Posts Carousel Slider</h2>
<form name="tchpcs_form" method="post" action="" style="border:1px solid #ccc;padding:10px;background:#fff;margin:0; width:90%;"><table><tr><td><table class="form-table">	<tbody>
<tr class="form-field form-required"><th scope="row"><label for="tn_post_type">Post Type</label></th><td><input  style="width: 200px;" maxlength="4" type="text" value="<?php echo $post_type; ?>" name="tn_post_type" id="tn_post_type" /> 
<p class="description">Define the Post Type Here Default:--[post]...eg..[Testimonial,Event]</p></td></tr>
<tr class="form-field form-required">
			<th scope="row"><label for="name">Show post image:</label></th>
			<td>	<select name="tn_showimage" id="tn_showimage">
      <?php foreach ($fimg  as $key => $value) {?>
      <option value="<?php echo $key; ?>" <?php if($key==$showimage){echo "selected";}?>><?php echo $value;?></option>
      <?php }?>
    </select></td>
		</tr>
<tr class="form-field form-required"><th scope="row"><label for="name">Excerpt Length</label></th><td><input  style="width: 200px;" maxlength="4" type="text" value="<?php echo $word_limit; ?>" name="tn_word_limit" id="tn_word_limit" /> 
<p class="description">Character Limit. e.g. 10</p></td></tr>

<tr class="form-field form-required"><th scope="row"><label for="name">Number of post to be shown in the slider</label></th><td><input  style="width: 200px;" maxlength="2" type="text" value="<?php echo $query_post; ?>" name="tn_query_post" id="tn_query_post" />
<p class="description">e.g. 20</p></td></tr>

<tr class="form-field form-required"><th scope="row"><label for="name">Post order by</label></th><td><input  style="width: 200px;" maxlength="100" type="text" value="<?php echo $orderby; ?>" name="tn_orderby" id="tn_orderby" /> <p class="description">e.g. ID (Possible values: id, author, title, date, category, modified)</p></td></tr>

<tr class="form-field form-required"><th scope="row"><label for="name">Post order</label></th><td><input  style="width: 200px;" maxlength="100" type="text" value="<?php echo $order; ?>" name="tn_order" id="tn_order" /> 
<p class="description">e.g. rand (Possible values: rand, asc, desc)</p></td></tr>

<tr class="form-field form-required"><th scope="row"><label for="name">Posts of which category will be displayed</label></th><td><input  style="width: 200px;" maxlength="100" type="text" value="<?php echo $posts_category;?>" name="tn_posts_category" id="tn_posts_category" /> <p class="description">Category IDs seperated by Comma e.g. 1, 3</p></td></tr>
</tbody>
</table></td><td><table class="form-table">	<tbody>
<tr class="form-field form-required">
			<th scope="row"><label for="tn_autoplay">Mode</label></th>
			<td>	<select name="tn_mode" id="tn_mode">
      <?php foreach ($mode  as $key => $value) {?>
      <option value="<?php echo $key; ?>" <?php if($key==$mode_set){echo "selected";}?>><?php echo $value;?></option>
      <?php }?>
    </select></td>
		</tr>
<tr class="form-field form-required">
			<th scope="row"><label for="tn_autoplay">Auto Play:</label></th>
			<td>	<select name="tn_autoplay" id="tn_autoplay">
      <?php foreach ($truefalse  as $key => $value) {?>
      <option value="<?php echo $key; ?>" <?php if($key==$autoplay){echo "selected";}?>><?php echo $value;?></option>
      <?php }?>
    </select></td>
		</tr>
<tr class="form-field form-required"><th scope="row"><label for="tn_speed">Speed</label></th><td><input  style="width: 200px;" maxlength="4" type="text" value="<?php echo $tn_speed; ?>" name="tn_speed" id="tn_speed" /> 
<p class="description">Speed of the slide. </p></td></tr>

<tr class="form-field form-required"><th scope="row"><label for="tn_minSlides">Min Slides to Show in Slider</label></th><td><input  style="width: 200px;" maxlength="2" type="text" value="<?php echo $minSlides; ?>" name="tn_minSlides" id="tn_minSlides" />
<p class="description">Default 2</p></td></tr>

<tr class="form-field form-required"><th scope="row"><label for="name">Max Slides to Show in Slider</label></th><td><input  style="width: 200px;" maxlength="100" type="text" value="<?php echo $maxSlides; ?>" name="tn_maxSlides" id="tn_maxSlides" /> <p class="description">Default 4</p></td></tr>

</tbody>
</table></td></tr></table>
<input name="submit" id="submit" class="button-primary" value="Update" type="submit" />

</form><br/>
