<?php 
/*
Amigura
http://www.amigura.co.uk
License: GPL2
*/

$ami_link_hide_res = ami_link_hide_opt_get();
?>

<h2>Ami-Link Hide Options</h2>
<p>API Key - with this key you will  be abled to get access.<br />
  if you don't have a key you can get a free one here <a href="http://www.amigura.co.uk/apikey.php?apikey=2" target="_blank">http://www.amigura.co.uk/apikey.php?apikey=2</a></p>
<p>Allow Access - make it available to admin only or all users</p>
<form action="" method="post">
  API Key <br />
  <textarea name="amiapikey" cols="50" rows="7"><?php echo $ami_link_hide_res['apikey']; ?></textarea>
  <br />
  Allow Access
  <input name="amiuseracc" type="radio" value="1" <?php if($ami_link_hide_res['useracc']=='1'){echo 'checked';} ?> />
  Admin Only
  <input name="amiuseracc" type="radio" value="2" <?php if($ami_link_hide_res['useracc']=='2'){echo 'checked';} ?> />
  All Users <br />
  <input name="act" type="hidden" value="o">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="" type="submit" value="Save Changes" class="button-primary save">
</form>
