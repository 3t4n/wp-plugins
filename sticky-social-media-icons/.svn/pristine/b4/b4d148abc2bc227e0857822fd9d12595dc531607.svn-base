<?php

	// Generate nonce value
    $nonce = wp_create_nonce( 'sticky_sm_icons_nonce' );

	global $wpdb;
	$table_name = $wpdb->prefix . 'sticky_sm_icons_tbl';

	$position = $wpdb->get_var( "SELECT position FROM $table_name where id = 1 ");
	
	$fb_link = $wpdb->get_var( "SELECT facebook FROM $table_name where id = 1 ");

	$youtube_link = $wpdb->get_var( "SELECT youtube FROM $table_name where id = 1 ");

	$twitter_link = $wpdb->get_var( "SELECT twitter FROM $table_name where id = 1 ");

	$instagram_link = $wpdb->get_var( "SELECT instagram FROM $table_name where id = 1 ");

	$quora_link = $wpdb->get_var( "SELECT quora FROM $table_name where id = 1 ");

	$tumblr_link = $wpdb->get_var( "SELECT tumblr FROM $table_name where id = 1 ");

	$linkedin_link = $wpdb->get_var( "SELECT linkedin FROM $table_name where id = 1 ");

	$pinterest_link = $wpdb->get_var( "SELECT pinterest FROM $table_name where id = 1 ");

	$telegram_link = $wpdb->get_var( "SELECT telegram FROM $table_name where id = 1 ");

	$position =  sanitize_text_field($position);

	$facebook =  esc_url($fb_link);

	$youtube = esc_url($youtube_link);

	$twitter = esc_url($twitter_link);

	$instagram = esc_url($instagram_link);

	$quora = esc_url($quora_link);

	$tumblr = esc_url($tumblr_link);

	$linkedin = esc_url($linkedin_link);

	$pinterest = esc_url($pinterest_link);

	$telegram = esc_url($telegram_link);

	
?>


<div class="container">
	<div class="txt-heading">
	<h1> Sticky Social Media Icons </h1>
	<p>Explore additional WordPress plugins and assess their functionality</p>
	<a href="https://wpcodecrafter.com/products/" target="_blank" class="button button-primary">Browse All Plugins</a>
	</div>
	<div>
	  <br>
	  
			
			<form action="javascript:void(0)"  method="POST" id="insert_links_form">
            <div class="sm-position">
				<label for="name">Position:</label>	
				
				<?php if($position=='left'): ?>
					
					<input type="radio" id="left" name="position" value="left" required checked="checked">
					<label for="male">Left</label>
					<input type="radio" id="right" name="position" value="right">
					<label for="male">Right</label>
				
				<?php endif; ?>

				<?php if($position=='right'): ?>
					
					<input type="radio" id="left" name="position" value="left" required >
					<label for="male">Left</label>
					<input type="radio" id="right" name="position" value="right" checked="checked">
					<label for="male">Right</label>
				
				<?php endif; ?>

            </div><br>

			<div class="insert-form">
				<label for="name">Facebook:</label>	
            	<input type="text" class="form-control" id="facebook" name="facebook" placeholder="Add Facebook Url" value="<?php echo $facebook; ?>">
			
            </div>

            <div class="insert-form">
				<label for="name">Youtube:</label>
				<input type="text" class="form-control" id="youtube" name="youtube" placeholder="Add Youtube Url" value="<?php echo $youtube; ?>">
				
			</div>

            <div class="insert-form">
				<label for="name">Twitter:</label>
				<input type="text" class="form-control" id="twitter" name="twitter" placeholder="Add Twitter Url" value="<?php echo $twitter; ?>">
				
            </div>

			<div class="insert-form">
				<label for="name">Instagram:</label>
				<input type="text" class="form-control" id="instagram" name="instagram" placeholder="Add Instagram Url" value="<?php echo $instagram; ?>">
				
            </div>

			<div class="insert-form">
				<label for="name">Quora:</label>
				<input type="text" class="form-control" id="quora" name="quora" placeholder="Add Quora Url" value="<?php echo $quora; ?>">
				
            </div>

			<div class="insert-form">
				<label for="name">Tumblr:</label>
				<input type="text" class="form-control" id="tumblr" name="tumblr" placeholder="Add Tumblr Url" value="<?php echo $tumblr; ?>">
				
            </div>

			<div class="insert-form">
				<label for="name">Linkedin:</label>
				<input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Add Linkedin Url" value="<?php echo $linkedin; ?>">
				
            </div>

			<div class="insert-form">
				<label for="name">Pinterest:</label>
				<input type="text" class="form-control" id="pinterest" name="pinterest" placeholder="Add Pinterest Url" value="<?php echo $pinterest; ?>">
			</div>

			<div class="insert-form">
				<label for="name">Telegram:</label>
				<input type="text" class="form-control" id="telegram" name="telegram" placeholder="Add Telegram Url" value="<?php echo $telegram; ?>">
			</div>

           <!-- Add nonce field -->
		   <input type="hidden" name="nonce" value="<?php echo $nonce; ?>">

            <button type="submit" class="insert-btn">Save</button>
			</form>

			<p id="succ-msg"> Links updated successfully.</p>
			
	  
	</div>
</div>