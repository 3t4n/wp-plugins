<?php
if ($_POST["count"]<>"") {
	update_option("comments_max",$_POST["count"]);
	echo '<div class="updated fade">Settings were saved</div>';
}
?>
<div class="wrap">
<?php if(function_exists('screen_icon')) screen_icon(); ?>
<h2>AJAX Comment Page</h2>
<div class="updated fade">Thanks for using this plugin. Perhaps you want to know about the <a href="http://mr.hokya.com/ajax-comment-page" target="_blank">documentation</a> or make a <a href="http://mr.hokya.com/donate" target="_blank">donation</a></div>
<em>AJAX Comment Page is a plugin to divide your comments into virtual pages that will be loaded with AJAX. The main reason is to help your visitor or reader read your post response. And the second reason is to make your blog have a better look with AJAX animations and effects :-)</em>

<form method="post">
<p>Number of Maximum Comments should be loaded per comment pages : <input name="count" value="<?php echo get_option("comments_max");?>" size="3"/></p>
<p><small>Sorry for the short definition, anyways, if you have some question or problem just visit the <a href='http://mr.hokya.com/ajax-comment-page/' target='_blank'>author page</a> and send him a feedback</small></p>
<p><input type="submit" value="Save Changes" class="button-primary"/></p>

</form>
</div>