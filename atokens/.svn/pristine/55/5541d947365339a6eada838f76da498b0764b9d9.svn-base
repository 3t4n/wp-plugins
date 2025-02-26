<?php

if(!empty($_POST))
{
	update_option('atokens_config', $_POST);
	echo '<div class="updated fade" id="message"><p><strong>Settings saved.</strong></p></div>';
}

$options = get_option('atokens_config');
if(empty($options))
{
	add_option('atokens_config', array(	// Default options
											'username' => '',
											'posts' => '',
											'pages' => '',
											'vpos' => 'top',
											'hpos' => 'left',
											'style' => 'standard'
										));
										
	$options = get_option('atokens_config');
}
?>

<div class="wrap">
	<h2>aTokens options</h2>
	
	<form action="" method="post">
		<table class="form-table">
			<tr>
				<td><label for="ps_username">Username</label></td>
				<td><input type="text" name="username" value="<?= $options['username'] ?>" id="ps_username" size="60" /></td>
			</tr>
			<tr>
				<td><label>Style</label></td>
				<td>
					<input type="radio" name="style" value="standard" id="ps_style_standard" <?php if($options['style'] == 'standard') echo 'checked="checked"' ?> /> 
					<label for="ps_style_standard"><img src="https://atokens.com/images/widget/screenshot/widget_standard.png" alt="" /></label> &nbsp;&nbsp;&nbsp;
					
					<input type="radio" name="style" value="small" id="ps_style_small" <?php if($options['style'] == 'small') echo 'checked="checked"' ?> /> 
					<label for="ps_style_small"><img src="https://atokens.com/images/widget/screenshot/widget_small.png" alt="" /></label> &nbsp;&nbsp;&nbsp;
				</td>
			</tr>
			<tr>
				<td><label for="ps_posts">Use in posts</label></td>
				<td><input type="checkbox" name="posts" value="1" id="ps_posts" <?php if($options['posts'] == '1') echo 'checked="checked"' ?> /></td>
			</tr>
			<tr>
				<td><label for="ps_pages">Use in pages</label></td>
				<td><input type="checkbox" name="pages" value="1" id="ps_pages" <?php if($options['pages'] == '1') echo 'checked="checked"' ?> /></td>
			</tr>
			<tr>
				<td><label>Vertical Position</label></td>
				<td>
					<input type="radio" name="vpos" value="top" id="ps_vpos_top" <?php if($options['vpos'] == 'top') echo 'checked="checked"' ?> /> 
					<label for="ps_vpos_top">Top</label> &nbsp;&nbsp;&nbsp;
					
					<input type="radio" name="vpos" value="bottom" id="ps_vpos_bottom" <?php if($options['vpos'] == 'bottom') echo 'checked="checked"' ?> /> 
					<label for="ps_vpos_bottom">Bottom</label> &nbsp;&nbsp;&nbsp;
				</td>
			</tr>
			<tr>
				<td><label>Horizontal Position</label></td>
				<td>
					<input type="radio" name="hpos" value="left" id="ps_hpos_left" <?php if($options['hpos'] == 'left') echo 'checked="checked"' ?> /> 
					<label for="ps_hpos_left">Left</label> &nbsp;&nbsp;&nbsp;
					
					<input type="radio" name="hpos" value="right" id="ps_hpos_right" <?php if($options['hpos'] == 'right') echo 'checked="checked"' ?> /> 
					<label for="ps_hpos_right">Right</label> &nbsp;&nbsp;&nbsp;
				</td>
			</tr>

			<tr>	
				<td></td>
				<td><input type="submit" value="Update" class="button-primary" /></td>
			</tr>
		</table>
	</form>
</div>
