<div>
<h2>Jisbar Toolbar Settings </h2>
<div>
  <p>To find out more about Jisbar, visit the site at <a href="http://www.jisbar.com" target="_blank">Jisbar</a></p>
  <p><strong>NOTE: </strong>This demo version does show a &quot;Powered by&quot; Link for the bar. However, you can register at the Jisbar site, setup your own bar and remove it.<br>
      <br>
  To get started, login to your admin Panel on the Jisbar site and go to the GET CODE tab.<br>
  <br>
  There you will find your Jisbar Bar ID.  Enter that below:<br>
  <br>
  <?php if($_GET["updated"]=="true"){ ?>
    </p>
  <div id="showstatus" style="border:1px solid #006600; padding:10px; background-color:#B5FF6A;width:400px;">Your Settings have been Saved</div><br>
<?php } ?>
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<?php settings_fields('jisbar'); ?>
<div align="left">Jisbar Bar ID: <input name="web_property_id" type="text" value="<?php echo get_option('web_property_id'); ?>" size="40" />
<input type="hidden" name="action" value="update" />
</div>  
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>
</form>
</div>
</div>
