<div class="updated fade">Thanks for using this plugin, if you feel satisfied, please make a <a href="http://mr.hokya.com/donate" target="_blank">donation</a>. For further reference please see the <a href="http://mr.hokya.com/auto-excerpt" target="_blank">documentation</a></div>
<?php
if ($_POST["editted"]<>"") {
	update_option("excerpt_length",$_POST["excerpt_length"]);
	update_option("readmore",$_POST["readmore"]);
	echo '<div class="updated fade">Settings saved !</div>';
}
?>
<div class="wrap">
<?php if(function_exists('screen_icon')) screen_icon(); ?>
<h2>Auto Excerpt</h2>
<em>You can easily shorten your post on your homepages into excerpts for better reading environment. Automatically show excerpt view on each posts on your homepage and archive pages. It need no HTML editting, so do not worry and just activate it to see the_excerpt view on your homepage.</em>

<style>
td {padding:5px;}
input {border:solid 1px #6F0; -moz-box-shadow:0 0 5px;}
</style>

<form method="post">
<table>
<tr>
<td>Read more text</td>
<td><input name="readmore" value="<?php echo get_option("readmore");?>"/></td>
</tr>
<tr>
<td>Excerpt length</td>
<td><input name="excerpt_length" value="<?php echo get_option("excerpt_length");?>" /></td>
</tr>
</table>
<input type="submit" class="button-primary" value="Save" name="editted" />
</form>

</div>