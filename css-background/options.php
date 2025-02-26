<?php
if ($_POST["bg_submit"]<>"") {
	update_option("cssbackground",$_POST["background"]);
	echo '<div class="updated fade">Settings were saved</div>';
}
if ($_POST["fill_submit"]<>"") {
	update_option("bgfill",$_POST["filling"]);
	echo '<div class="updated fade">Settings were saved</div>';
}
?>
<div class="updated fade">Feel satisfied? <a href="http://mr.hokya.com/donate" target="_blank">Support</a></div>
<div class="wrap">
<?php if(function_exists('screen_icon')) screen_icon(); ?>
<h2>CSS BackGround</h2>
<em>CSS BackGround is to replace your current Background with your own picture or photos from the library or by uploading using the form below. After choosing, you may choose the positioning of background. However, you may <a href="http://mr.hokya.com/css-background/" target="_blank">visit developer's page</a> if you meet any difficulties... :-)</em>

<form method="post">
<h3>Choose BackGround from Images uploaded on your Media</h3>
<?php 
global $wpdb;
$db = $wpdb->get_results("select * from $wpdb->posts where post_type = 'attachment' ");
foreach ($db as $db):?>
	<label>
    <input type="radio" name="background" <?php if(get_option("cssbackground")==$db->guid) echo 'checked="checked"'; ?> value="<?php echo $db->guid;?>"/>
    <img src="<?php echo $db->guid;?>" alt="<?php echo $db->guid;?>" width="100" height="100"/>
    </label>
<?php endforeach;?>

<p><input type="submit" class="button-primary" value="Set as my Wallpaper Background" name="bg_submit"/></p>
</form>

<form method="post">
<h3>Filling Method </h3>
<p><label><input type="radio" name="filling" value="full" <?php if(get_option("bgfill")=="full") echo "checked=''" ;?>/>
Repeat it until fully fill the screen width and height (recommended)</label>
</p>
<p>
  <label><input type="radio" name="filling" value="axis" <?php if(get_option("bgfill")=="axis") echo "checked=''" ;?>/>
Only repeat the image on AXIS / horizontal </label>
</p>
<p><label><input type="radio" name="filling" value="ordinate" <?php if(get_option("bgfill")=="ordinate") echo "checked=''" ;?>/>
Only repeat the image on ORDINATE/vertical</label></p>
<p><input type="submit" value="Save" class="button" name="fill_submit"/></p>
</form>

</div>