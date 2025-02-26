<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?>

<div class="wrap">
  <h2><?php _e('Buzrr Options', BUZRR_TEXT_DOMAIN); ?></h2>
	<form method="post" action="<?php echo $this->url($_SERVER['REQUEST_URI']); ?>">
	<?php wp_nonce_field (BUZRR_ADMIN_REFERRER); ?>
	
	<table border="0" cellspacing="5" cellpadding="5" class="form-table">
		<tbody>
			<tr valign="top">
				<th valign="top" align="right"><label for="display_in"><?php _e ('Display in', BUZRR_TEXT_DOMAIN) ?></label>
				</th>
				<td valign="top" >
					<input type="checkbox" id="display_in_categories" name="display_in_categories" <?php echo('on' == (string)$options['display_in_categories']?' checked':''); ?> /><?php _e('Categories', BUZRR_TEXT_DOMAIN); ?><br />
					<input type="checkbox" id="display_in_posts" name="display_in_posts" <?php echo('on' == (string)$options['display_in_posts']?' checked':''); ?> /><?php _e('Posts', BUZRR_TEXT_DOMAIN); ?><br />
					<input type="checkbox" id="display_in_pages" name="display_in_pages" <?php echo('on' == (string)$options['display_in_pages']?' checked':''); ?> /><?php _e('Pages', BUZRR_TEXT_DOMAIN); ?><br />
					<input type="checkbox" id="display_in_feed" name="display_in_feed" <?php echo('on' == (string)$options['display_in_feed']?' checked':''); ?> /><?php _e('RSS Feed', BUZRR_TEXT_DOMAIN); ?>
				</td>
			</tr>
			<tr valign="top">
				<th valign="top" align="right"><label for="position"><?php _e ('Position', BUZRR_TEXT_DOMAIN) ?></label>
				</th>
				<td valign="top" >
					<select name="position" id="position"><?php 
					$position_options = array(
						'before'		=> __('Before Post/Page', BUZRR_TEXT_DOMAIN),
						'after'			=> __('After Post/Page', BUZRR_TEXT_DOMAIN),
						'before_after'	=> __('Before &amp; After Post/Page', BUZRR_TEXT_DOMAIN)
					);
					foreach($position_options as $key => $position_option) {
						if($options['position'] == $key)
							$selected = ' selected';
						else
							$selected = '';
						echo('<option value="' . $key . '"' . $selected . '>' . $position_option . '</option>');
					} ?>
					</select>
				</td>
			</tr>
			<tr valign="top">
				<th valign="top" align="right"><label for="rss_position"><?php _e ('RSS Position', BUZRR_TEXT_DOMAIN) ?></label>
				</th>
				<td valign="top" >
					<select name="rss_position" id="rss_position"><?php 
					$rss_position_options = array(
						'before'		=> __('Before Post', BUZRR_TEXT_DOMAIN),
						'after'			=> __('After Post', BUZRR_TEXT_DOMAIN),
						'before_after'	=> __('Before &amp; After Post', BUZRR_TEXT_DOMAIN)
					);
					foreach($rss_position_options as $key => $rss_position_option) {
						if($options['rss_position'] == $key)
							$selected = ' selected';
						else
							$selected = '';
						echo('<option value="' . $key . '"' . $selected . '>' . $rss_position_option . '</option>');
					} ?>
					</select>
				</td>
			</tr>
			<tr valign="top">
				<th valign="top" align="right"><label for="styling"><?php _e ('Styling', BUZRR_TEXT_DOMAIN) ?></label>
				</th>
				<td valign="top" >
					<input type="text" id="styling" name="styling" value="<?php echo($options['styling']); ?>" /><?php _e('Add your own CSS style (<a href="http://www.w3schools.com/css/" target="_blank">see this CSS tutorial</a>, or use the "Styling for Dummies" option below) to the div that surrounds the button. Example: <a href="http://www.w3schools.com/css/pr_class_float.asp" target="_blank">float</a>: left; <a href="http://www.w3schools.com/css/pr_margin-right.asp" target="_blank">margin-right</a>: 10px;<br />The div also has a class="buzrr_button" if you want to style it in a CSS-file.', BUZRR_TEXT_DOMAIN); ?>
				</td>
			</tr>
			<tr valign="top">
				<th valign="top" align="right"><label for="rss_position"><?php _e ('Styling for Dummies', BUZRR_TEXT_DOMAIN) ?></label>
				</th>
				<td valign="top" >
					<select name="styling_template" id="styling_template"><?php 
					$styling_template_options = array(
						''								=> __('No Styling', BUZRR_TEXT_DOMAIN),
						'float:left;margin-right:5px;'	=> __('Left Aligned', BUZRR_TEXT_DOMAIN),
						'float:right;margin-left:5px;'	=> __('Right Aligned', BUZRR_TEXT_DOMAIN),
					);
					foreach($styling_template_options as $key => $styling_template_option) {
						if($options['styling_template'] == $key)
							$selected = ' selected';
						else
							$selected = '';
						echo('<option value="' . $key . '"' . $selected . '>' . $styling_template_option . '</option>');
					} ?>
					</select>
					<script>
						jQuery('#styling_template').change(function() {
							jQuery('input#styling').val(jQuery('select#styling_template').val());
						});
					</script>
				</td>
			</tr>
			<tr valign="top">
				<th valign="top" align="right"><label for="buzrr_button"><?php _e ('Select Your Buzrr Button', BUZRR_TEXT_DOMAIN) ?></label>
				</th>
				<td valign="top" >
<div class="box1 floatleft"> 
<p class="img"><img border="0"
	src="http://cdn.buzrr.com/images/icons_03.png"></p> 
<p class="radio1"><input type="radio" value="big_blue_buzzicon_white_bg" 
<?php echo('big_blue_buzzicon_white_bg' == $options['buzrr_button']?' checked':''); ?>
	name="button_style1"></p> 
</div> 
<div class="box1 floatleft"> 
<p class="img"><img border="0"
	src="http://cdn.buzrr.com/images/icons_04.png"></p> 
<p class="radio1"><input type="radio" value="big_blue_white_bg" 
<?php echo('big_blue_white_bg' == $options['buzrr_button']?' checked':''); ?>
	name="button_style1"></p> 
</div> 
 
<div class="box1 floatleft"> 
<p class="img"><img border="0"

	src="http://cdn.buzrr.com/images/icons_05.png"></p> 
<p class="radio1"><input type="radio" value="big_red_white_bg" 
<?php echo('big_red_white_bg' == $options['buzrr_button']?' checked':''); ?>
	name="button_style1"></p> 
</div> 
<div class="box1 floatleft"> 
<p class="img"><img border="0"

	src="http://cdn.buzrr.com/images/icons_06.png"></p> 
<p class="radio1"><input type="radio" value="big_blue_buzzicon_bg" 
<?php echo('big_blue_buzzicon_bg' == $options['buzrr_button']?' checked':''); ?>
	name="button_style1"></p> 
</div> 
<div class="box1 floatleft"> 
<p class="img"><img border="0"

	src="http://cdn.buzrr.com/images/icons_07.png"></p> 
<p class="radio1"><input type="radio" value="big_green_white_bg" 
<?php echo('big_green_white_bg' == $options['buzrr_button']?' checked':''); ?>
	name="button_style1"></p> 
</div> 
<div class="box1 floatleft"> 
<p class="img"><img border="0"

	src="http://cdn.buzrr.com/images/icons_08.png"></p> 
<p class="radio1"><input type="radio" value="big_yellow_white_bg" 
<?php echo('big_yellow_white_bg' == $options['buzrr_button']?' checked':''); ?>
	name="button_style1"></p> 
</div> 
 
<div style="clear: both;"></div> 
 
<div class="box1 floatleft"> 
<p class="img"><img border="0"

	src="http://cdn.buzrr.com/images/icons_09.png"></p> 
<p class="radio2"><input type="radio" value="small_lightgreen_1" 
<?php echo('small_lightgreen_1' == $options['buzrr_button']?' checked':''); ?>
	name="button_style1"></p> 
</div> 
<div class="box1 floatleft"> 
<p class="img"><img border="0"

	src="http://cdn.buzrr.com/images/icons_10.png"></p> 
<p class="radio2"><input type="radio" value="small_red_1" 
<?php echo('small_red_1' == $options['buzrr_button']?' checked':''); ?>
	name="button_style1"></p> 
</div> 
<div class="box1 floatleft"> 
<p class="img"><img border="0"

	src="http://cdn.buzrr.com/images/icons_11.png"></p> 
<p class="radio2"><input type="radio" value="small_blue_1" 
<?php echo('small_blue_1' == $options['buzrr_button']?' checked':''); ?>
	name="button_style1"></p> 
</div> 
<div class="box1 floatleft"> 
<p class="img"><img border="0"

	src="http://cdn.buzrr.com/images/icons_12.png"></p> 
<p class="radio2"><input type="radio" value="small_yellow_1" 
<?php echo('small_yellow_1' == $options['buzrr_button']?' checked':''); ?>
	name="button_style1"></p> 
</div> 
<div class="box1 floatleft"> 
<p class="img"><img border="0"

	src="http://cdn.buzrr.com/images/icons_13.png"></p> 
<p class="radio2"><input type="radio" value="small_green_1" 
<?php echo('small_green_1' == $options['buzrr_button']?' checked':''); ?>
	name="button_style1"></p> 
</div> 
 
<div style="clear: both;"></div> 
 
<div class="box1 floatleft"> 
<p class="img"><img border="0"

	src="http://cdn.buzrr.com/images/icons_14.png"></p> 
<p class="radio2"><input type="radio" value="small_blue_2" 
<?php echo('small_blue_2' == $options['buzrr_button']?' checked':''); ?>
	name="button_style1"></p> 
</div> 
<div class="box1 floatleft"> 
<p class="img"><img border="0"

	src="http://cdn.buzrr.com/images/icons_15.png"></p> 
<p class="radio2"><input type="radio" value="small_red_2" 
<?php echo('small_red_2' == $options['buzrr_button']?' checked':''); ?>
	name="button_style1"></p> 
</div> 
<div class="box1 floatleft"> 
<p class="img"><img border="0"

	src="http://cdn.buzrr.com/images/icons_16.png"></p> 
<p class="radio2"><input type="radio" value="small_green_2" 
<?php echo('small_green_2' == $options['buzrr_button']?' checked':''); ?>
	name="button_style1"></p> 
</div> 
<div class="box1 floatleft"> 
<p class="img"><img border="0"

	src="http://cdn.buzrr.com/images/icons_17.png"></p> 
<p class="radio2"><input type="radio" value="small_yellow_2" 
<?php echo('small_yellow_2' == $options['buzrr_button']?' checked':''); ?>
	name="button_style1"></p> 
</div> 
 
<div style="clear: both;"></div> 
 
<div class="box1 floatleft"> 
<p class="img"><img border="0"

	src="http://cdn.buzrr.com/images/icons_18.png"></p> 
<p class="radio2"><input type="radio" value="small_red_3" 
<?php echo('small_red_3' == $options['buzrr_button']?' checked':''); ?>
	name="button_style1"></p> 
</div> 
<div class="box1 floatleft"> 
<p class="img"><img border="0"

	src="http://cdn.buzrr.com/images/icons_19.png"></p> 
<p class="radio2"><input type="radio" value="small_green_3" 
<?php echo('small_green_3' == $options['buzrr_button']?' checked':''); ?>
	name="button_style1"></p> 
</div> 
<div class="box1 floatleft"> 
<p class="img"><img border="0"

	src="http://cdn.buzrr.com/images/icons_20.png"></p> 
<p class="radio2"><input type="radio" value="small_yellow_3" 
<?php echo('small_yellow_3' == $options['buzrr_button']?' checked':''); ?>
	name="button_style1"></p> 
</div> 
<div class="box1 floatleft"> 
<p class="img"><img border="0"

	src="http://cdn.buzrr.com/images/icons_21.png"></p> 
<p class="radio2"><input type="radio" value="small_blue_3" 
<?php echo('small_blue_3' == $options['buzrr_button']?' checked':''); ?>
	name="button_style1"></p> 
</div> 
 
<div style="clear: both;"></div> 
 
<div class="box2 floatleft"> 
<p class="img"><img border="0"

	src="http://cdn.buzrr.com/images/icons_22.png"></p> 
<p class="radio3"><input type="radio" value="small_blue_count_text_icon" 
<?php echo('small_blue_count_text_icon' == $options['buzrr_button']?' checked':''); ?>
	name="button_style1"></p> 
</div> 
<div class="box2 floatleft"> 
<p class="img"><img border="0"

	src="http://cdn.buzrr.com/images/icons_23.png"></p> 
<p class="radio3"><input type="radio" value="small_blue_icon_count_text" 
<?php echo('small_blue_icon_count_text' == $options['buzrr_button']?' checked':''); ?>
	name="button_style1"></p> 
</div> 
<div class="box2 floatleft"> 
<p class="img"><img border="0"

	src="http://cdn.buzrr.com/images/icons_24.png"></p> 
<p class="radio4"><input type="radio" value="small_blue_text_icon_count" 
<?php echo('small_blue_text_icon_count' == $options['buzrr_button']?' checked':''); ?>
	name="button_style1"></p> 
</div> 
<div style="clear: both;"></div> 
				</td>
			</tr>
			<tr valign="top">
				<th valign="top" align="right"><label for="display_in"><?php _e ('Attribution Link', BUZRR_TEXT_DOMAIN) ?></label>
				</th>
				<td valign="top" >
					<input type="checkbox" id="attribution_link_enabled" name="attribution_link_enabled" <?php echo('on' == (string)$options['attribution_link_enabled']?' checked':''); ?> /><?php _e('Show attribution link in your theme footer', BUZRR_TEXT_DOMAIN); ?><br />
				</td>
			</tr>
			<tr valign="top">
				<th/>
				<td>
					<input class="button-primary" type="submit" name="update" value="<?php echo __('Update Options &raquo;', BUZRR_TEXT_DOMAIN)?>" />
				</td>
			</tr>
		</tbody>
	</table>
</form>
</div>
