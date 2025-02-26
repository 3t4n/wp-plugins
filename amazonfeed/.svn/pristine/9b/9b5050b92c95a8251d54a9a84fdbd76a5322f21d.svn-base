<label for="amazonfeed_keywords">Page specific keywords for finding Amazon products: </label>
<input type="input" name="amazonfeed_keywords" value="<?php echo $amazonfeed_keywords; ?>" size="25" />
<br/>
<br/>
<label for="amazonfeed_disabled">Disable Amazon related products on this page: </label>
<input type="checkbox" name="amazonfeed_disabled" value="true" <?php echo $amazonfeed_disabled; ?> /> Disabled
<br/>
<br/>
<label for="amazonfeed_sortby">Sorting order for Amazon products on this page: </label>
<select name='amazonfeed_sortby'>
	<option value='default' <?php if($amazonfeed_sortby == 'default') echo "selected"; ?>>Default Setting</option>
	<option value='random' <?php if($amazonfeed_sortby == 'random') echo "selected"; ?>>Random</option>
	<option value='salesrank' <?php if($amazonfeed_sortby == 'salesrank') echo "selected"; ?>>Popularity (high to low)</option>
	<option value='-salesrank' <?php if($amazonfeed_sortby == '-salesrank') echo "selected"; ?>>Reverse Popularity</option>
	<option value='listprice' <?php if($amazonfeed_sortby == 'listprice') echo "selected"; ?>>Price (high to low)</option>
	<option value='-listprice' <?php if($amazonfeed_sortby == '-listprice') echo "selected"; ?>>Reverse Price</option>
</select>
