<div class="wrap">
<div id="icon-options-general" class="icon32"><br /></div>
<h2>Ads For Old Posts</h2>

<form method="post" action="options.php">
<?php settings_fields( 'afop_options_group' ); ?>
<?php $options = get_option( 'afop_option' ); ?>

<table class="form-table">

<tr valign="top">
<th scope="row">Ad to Insert</th>
<td><textarea name="afop_option[afop_ad]" cols="50" rows="5"><?php echo $options['afop_ad']; ?></textarea></td>
</tr>

<tr valign="top">
<th scope="row">Ad Location</th>
<td>	
<?php
	$do_loc = $options['afop_loc'];
?>	
	<select name="afop_option[afop_loc]">
		<option value="start" <?php if ($do_loc == "start") { echo "SELECTED"; } ?>>Start of Post</option>
		<option value="end" <?php if ($do_loc == "end") { echo "SELECTED"; } ?>>End of Post</option>
		<option value="shortcode" <?php if ($do_loc == "shortcode") { echo "SELECTED"; } ?>>Use with [afop] shortcode</option>
	</select>
</td>
</tr>

<tr valign="top">
<th scope="row" colspan="2">Show ads on posts older than <input type="text" name="afop_option[afop_age]" size="3" value="<?php echo $options['afop_age']; ?>" /> days.</td>
</tr>

<tr valign="top">
<th scope="row">Align Ad Block</th>
<td>	
<?php
	$do_align = $options['afop_align'];
?>	
	<select name="afop_option[afop_align]">
		<option value="left" <?php if ($do_align == "left") { echo "SELECTED"; } ?>>Left</option>
		<option value="right" <?php if ($do_align == "right") { echo "SELECTED"; } ?>>Right</option>
	</select>
</td>
</tr>

<tr valign="top">
<th scope="row"><h3>CSS Settings</h3></th>
</tr>
<tr valign="top">
<th scope="row">Float</th>
<td>	
<?php
	$do_float = $options['afop_float'];
?>	
	<select name="afop_option[afop_float]">
		<option value="none" <?php if ($do_float == "none") { echo "SELECTED"; } ?>>None</option>
		<option value="left" <?php if ($do_float == "left") { echo "SELECTED"; } ?>>Left</option>
		<option value="right" <?php if ($do_float == "right") { echo "SELECTED"; } ?>>Right</option>
	</select>
</td>
</tr>
<tr valign="top">
	<th scope="row">Margin</th>
	<td>	
	<?php
		$do_margin = $options['afop_margin'];
	?>	
		<select name="afop_option[afop_margin]">
			<option value="none" <?php if ($do_margin == "none") { echo "SELECTED"; } ?>>None</option>
			<option value="all" <?php if ($do_margin == "all") { echo "SELECTED"; } ?>>All</option>
			<option value="left" <?php if ($do_margin == "left") { echo "SELECTED"; } ?>>Left</option>
			<option value="right" <?php if ($do_margin == "right") { echo "SELECTED"; } ?>>Right</option>
			<option value="top" <?php if ($do_margin == "top") { echo "SELECTED"; } ?>>Top</option>
			<option value="bottom" <?php if ($do_margin == "bottom") { echo "SELECTED"; } ?>>Bottom</option>
		</select>
		<input type="text" name="afop_option[afop_margin_amount]" size="5" value="<?php echo $options['afop_margin_amount']; ?>"> pixels
	</td>
</tr>

<tr valign="top">
	<th scope="row">Background Color</th>
	<td><input type="text" class="afop-color-field" name="afop_option[afop_background]" value="<?php echo $options['afop_background']; ?>"></td>
</tr>

<tr valign="top">
	<th scope="row">Border</th>
	<td>
	<?php
		$do_border = $options['afop_border'];
		$do_border_weight = $options['afop_border_weight'];
	?>
		<select name="afop_option[afop_border]">
			<option value="none" <?php if ($do_border == "none") { echo "SELECTED"; } ?>>None</option>
			<option value="all" <?php if ($do_border == "all") { echo "SELECTED"; } ?>>All</option>
			<option value="left" <?php if ($do_border == "left") { echo "SELECTED"; } ?>>Left</option>
			<option value="right" <?php if ($do_border == "right") { echo "SELECTED"; } ?>>Right</option>
			<option value="top" <?php if ($do_border == "top") { echo "SELECTED"; } ?>>Top</option>
			<option value="bottom" <?php if ($do_border == "bottom") { echo "SELECTED"; } ?>>Bottom</option>
		</select>
		</td>
</tr>

<tr valign="top">
	<th scope="row">Border Weight</th>
	<td><select name="afop_option[afop_border_weight]">
			<option value="thin" <?php if ($do_border_weight == "thin") { echo "SELECTED"; } ?>>Thin</option>
			<option value="medium" <?php if ($do_border_weight == "medium") { echo "SELECTED"; } ?>>Medium</option>
			<option value="thick" <?php if ($do_border_weight == "thick") { echo "SELECTED"; } ?>>Thick</option>
	</select>
	</td>

<tr valign="top">
	<th scope="row">Border Style</th>	
	<td>
	<?php
		$do_border_style = $options['afop_border_style'];
	?>
		<select name="afop_option[afop_border_style]">
	<option value="none" <?php if ($do_border_style == "none") { echo "SELECTED"; } ?>>None</option>
	<option value="solid" <?php if ($do_border_style == "solid") { echo "SELECTED"; } ?>>Solid</option>
	<option value="dotted" <?php if ($do_border_style == "dotted") { echo "SELECTED"; } ?>>Dotted</option>
	<option value="dashed" <?php if ($do_border_style == "dashed") { echo "SELECTED"; } ?>>Dashed</option>
	<option value="double" <?php if ($do_border_style == "double") { echo "SELECTED"; } ?>>Double</option>
	<option value="groove" <?php if ($do_border_style == "groove") { echo "SELECTED"; } ?>>Groove</option>
	<option value="ridge" <?php if ($do_border_style == "ridge") { echo "SELECTED"; } ?>>Ridge</option>
	<option value="inset" <?php if ($do_border_style == "inset") { echo "SELECTED"; } ?>>Inset</option>
	<option value="outset" <?php if ($do_border_style == "outset") { echo "SELECTED"; } ?>>outset</option>
	</select></td>
</tr>

<tr valign="top">
	<th scope="row">Border Color</th>
	<td><input type="text" class="afop-color-field" name="afop_option[afop_border_color]" value="<?php echo esc_attr( $options['afop_border_color']); ?>"></td>
</tr>

<tr valign="top">
	<th scope="row">Width</th>
	<td><input type="text" name="afop_option[afop_width]" size="5" value="<?php echo esc_attr( $options['afop_width']); ?>">
	<?php $do_width_type = $options['afop_width_type']; ?>
	<select name="afop_option[afop_width_type]">
		<option value="px" <?php if ($do_width_type == "px") { echo "SELECTED"; } ?>>Pixels</option>
		<option value="%" <?php if ($do_width_type == "%") { echo "SELECTED"; } ?>>Percent</option>
	</select>
</td>
</tr>

<tr valign="top">
<th scope="row">Text Align</th>
<td>	
<?php
	$do_text_align = $options['afop_text_align'];
?>	
	<select name="afop_option[afop_text_align]">
		<option value="none" <?php if ($do_text_align == "none") { echo "SELECTED"; } ?>>None</option>
		<option value="left" <?php if ($do_text_align == "left") { echo "SELECTED"; } ?>>Left</option>
		<option value="right" <?php if ($do_text_align == "right") { echo "SELECTED"; } ?>>Right</option>
		<option value="center" <?php if ($do_text_align == "center") { echo "SELECTED"; } ?>>Center</option>
	</select>
</td>
</tr>

<tr valign="top">
<th scope="row">Span or Div</th>
<td>	
<?php
	$switch_to_div = $options['afop_spandiv'];
?>	
	<select name="afop_option[afop_spandiv]">
		<option value="span" <?php if ($switch_to_div == "span") { echo "SELECTED"; } ?>>Span</option>
		<option value="div" <?php if ($switch_to_div == "div") { echo "SELECTED"; } ?>>Div</option>
	</select>
</td>
</tr>


</table>

<input type="hidden" name="action" value="update" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>


</form>
</div>
