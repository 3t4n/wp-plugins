<?php
$location = $options_page; // Form Action URI
?>

<div class="wrap">
	<h2>Background Slideshow Configuration</h2>
	<p>Use these settings below to adjust the Slideshow. Add a post/page and select "Featured in Background Slideshow" - Select an image as "Featured image" to add it to the slider</p>
	
    <div style="margin-left:0px;">
    <form method="post" action="options.php"><?php wp_nonce_field('update-options'); ?>
        
        <div class="inside">
		<table class="form-table">
			<tr>
				<th><label for="slide_blog">Use on whole blog?</label></th>
				<td>
					<select name="slide_blog">
						<option value="1" <?php if(get_option('slide_blog') == 1) {echo "selected=selected";} ?>>no</option>
						<option value="2" <?php if(get_option('slide_blog') == 2) {echo "selected=selected";} ?>>yes</option>
					</select>
				</td>
			</tr>
			<tr>
				<th><label for="slide_link">Add a link to post/page?</label></th>
				<td>
					<select name="slide_link">
						<option value="1" <?php if(get_option('slide_link') == 1) {echo "selected=selected";} ?>>yes</option>
						<option value="2" <?php if(get_option('slide_link') == 2) {echo "selected=selected";} ?>>no</option>
					</select>
				</td>
			</tr>
			<tr>
				<th><label for="timeout">Timeout for Slideshow (ms)</label></th>
				<td><input type="text" name="slide_timeout" value="<?php $slide_timeout = get_option('slide_timeout'); if(!empty($slide_timeout)) {echo $slide_timeout;} else {echo "5000";}?>"></td>
			</tr>
			<tr>
				<th><label for="animation">Animation Speed (ms)</label></th>
				<td><input type="text" name="slide_animation" value="<?php $slide_animation = get_option('slide_animation'); if(!empty($slide_animation)) {echo $slide_animation;} else {echo "500";}?>"></td>
			</tr>
		</table>
	</div>
	
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="slide_blog, slide_link, slide_timeout, slide_animation" />
		<p class="submit"><input type="submit" name="Submit" value="<?php _e('Update Options') ?>" /></p>
	</form>      
</div>