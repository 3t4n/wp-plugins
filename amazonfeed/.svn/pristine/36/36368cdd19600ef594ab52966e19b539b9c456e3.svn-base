<!-- Display AmazonFeed Widget Configuration Options -->

<label for="amazonfeed-title" style="line-height:35px;display:block;"><?php _e('Display title:', 'widgets'); ?> <input type="text" id="amazonfeed-title" name="amazonfeed-title" value="<?php echo htmlentities($options['TitleText']); ?>" /></label>
<label for="amazonfeed-tags" style="line-height:35px;display:block;"><?php _e('Default tags:', 'widgets'); ?> <input type="text" id="amazonfeed-tags" name="amazonfeed-tags" value="<?php echo htmlentities($options['DefaultTags']); ?>" /></label>
<label for="amazonfeed-results" style="line-height:35px;display:block;"><?php _e('Max results:', 'widgets'); ?> <input type="text" id="amazonfeed-results" name="amazonfeed-results" value="<?php echo htmlentities($options['MaxResults']); ?>" /></label>
<label for="amazonfeed-image" style="line-height:35px;display:block;"><?php _e('Show Images:', 'widgets'); ?> 
	<select id="amazonfeed-image" name='amazonfeed-image'>
		<option value='0' <?php if($options['ImageSize'] == '0') echo "selected"; ?>>No Images</option>
		<option value='1' <?php if($options['ImageSize'] == '1') echo "selected"; ?>>Small</option>
		<option value='2' <?php if($options['ImageSize'] == '2') echo "selected"; ?>>Medium</option>
		<option value='3' <?php if($options['ImageSize'] == '3') echo "selected"; ?>>Large</option>
	</select>
</label>
<label for="amazonfeed-text" style="line-height:35px;display:block;"><?php _e('Show Titles:', 'widgets'); ?> <input type="checkbox" id="amazonfeed-text" name="amazonfeed-text" value="yes" <?php if($options['ShowText'] == '1') echo 'checked'; ?> /></label>
<label for="amazonfeed-desc" style="line-height:35px;display:block;"><?php _e('Show Descriptions:', 'widgets'); ?> <input type="checkbox" id="amazonfeed-desc" name="amazonfeed-desc" value="yes" <?php if($options['ShowDesc'] == '1') echo 'checked'; ?> /></label>
<label for="amazonfeed-sortby">Sorting order for Amazon products on this widget: </label>
<select name='amazonfeed-sortby'>
	<option value='default' <?php if($options['SortBy'] == 'default') echo "selected"; ?>>Default Setting</option>
	<option value='random' <?php if($options['SortBy'] == 'random') echo "selected"; ?>>Random</option>
	<option value='salesrank' <?php if($options['SortBy'] == 'salesrank') echo "selected"; ?>>Popularity (high to low)</option>
	<option value='-salesrank' <?php if($options['SortBy'] == '-salesrank') echo "selected"; ?>>Reverse Popularity</option>
	<option value='listprice' <?php if($options['SortBy'] == 'listprice') echo "selected"; ?>>Price (high to low)</option>
	<option value='-listprice' <?php if($options['SortBy'] == '-listprice') echo "selected"; ?>>Reverse Price</option>
</select>
<input type="hidden" name="amazonfeedwidget-submit" id="amazonfeedwidget-submit" value="1" />
