<?php
if ($_POST["message"]<>"") {
	update_option("ap_message",$_POST["message"]);
	echo "<div class='updated fade'>Change Saved</div>";
}
?>
<div class="wrap">
<?php if(function_exists('screen_icon')) screen_icon(); ?>
<h2>Anti Plagiarism</h2>

<form method="post">
<p>Your custom message when somebody tries to make a copy shortcut on your site<p>
<p><input style="padding:10px;" size="100%" name="message" value="<?php echo get_option("ap_message"); ?>" /></p>
<p><input name="change" class="button-primary" type="submit" value="Save Changes" /></p>
</form>

<p>If you found some bugs, let's talk about it <a href="http://mr.hokya.com/anti-plagiarism" target="_blank">here</a></p>


</div>