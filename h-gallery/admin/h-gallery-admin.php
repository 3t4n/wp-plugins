<div style="margin: 3em 0 0 2.2em;">

<h2 style="margin: 0 0 1em 0;">H Gallery Settings</h2>

<form method="post" action="options.php">

<?php wp_nonce_field('update-options'); ?>

<label>Picasa User id</label> 
<input name="hgallery_data_userid" size="30" type="text" id="hgallery_data_userid" value="<?php echo get_option('hgallery_data_userid'); ?>" />
<input type="hidden" name="page_options" value="hgallery_data_userid" /><br />

<input type="hidden" name="action" value="update" />

<p style="margin: 3em 0 0 0;">
<input type="submit" value="<?php _e('Save Changes') ?>" />
</p>

</form>

</div>


<div style="font-size: 1.4em; font-weight: bold; margin: 14em 0 0 2.2em;">
<hr />
How to find the Picasa UserId?<br /><br /><br /><br />
<?php echo '<img src="'.plugins_url( '/02314_005.jpg', __FILE__ ).'" />';   ?><br /><br />
<div style="color: #990000">Picasa User id (1)</div>
</div>