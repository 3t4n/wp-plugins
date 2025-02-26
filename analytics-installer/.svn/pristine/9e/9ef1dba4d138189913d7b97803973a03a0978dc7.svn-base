<?php
if ($_POST["code"]<>"") {
	update_option("analytics",$_POST["code"]);
	echo '<div class="updated fade">Settings were saved</div>';
}
?>

<div class="wrap">
<?php if(function_exists('screen_icon')) screen_icon(); ?>
<h2>Analytics Installer</h2>

<div class="updated fade">Thanks for using this plugin. Perhaps you want to know about the <a href="http://mr.hokya.com/analytics-installer/" target="_blank">documentation</a> or make a <a href="http://mr.hokya.com/donate" target="_blank">donation</a></div>

<form method="post">
<p>Your Google Analytics Snippet</p>
<p><textarea name="code" cols="50" rows="10" style="border:solid 1px #ACE"><?php echo get_option("analytics");?></textarea></p>
<p><input type="submit" value="Save Changes" class="button-primary"/></p>
</form>

</div>
