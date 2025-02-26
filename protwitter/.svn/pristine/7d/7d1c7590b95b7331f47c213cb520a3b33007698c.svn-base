<?php 
	if(isset($_POST['protwitter_hidden']) && ($_POST['protwitter_hidden'] == 'Y')) {
		//Form data sent
		$twitter_id = $_POST['protwitter_twitter_id'];
		update_option('protwitter_twitter_id', $twitter_id);

		?>
		<div class="updated"><p><strong><?php _e('Options saved.' , 'protwitter'); ?></strong></p></div>
		<?php
	} else {
		//Normal page display
		$twitter_id = get_option('protwitter_twitter_id');
	}
?>

<div class="wrap">
	<?php    echo "<h2>" . __( 'Pro Twitter Options', 'protwitter') . "</h2>"; ?>
	<form name="protwitter_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="protwitter_hidden" value="Y">  	
				
		<?php    echo "<h4>" . __( 'Pro Twitter Options Settings', 'protwitter') . "</h4>"; ?>
		
		<p><?php _e("Your Twitter ID: " , 'protwitter'); ?><input type="text" name="protwitter_twitter_id" value="<?php echo $twitter_id; ?>" size="20"><?php _e(" ex: twitter" , 'protwitter'); ?></p>
		
			
		<p class="submit">
		<input type="submit" name="Submit" value="<?php _e('Update Options', 'protwitter') ?>" />
		</p>
	</form>

	<p>For more plugins visit <a href="http://www.myfastblog.com" target="_BLANK" alt="My Fast Blog"> My Fast Blog</a></p>

</div>
