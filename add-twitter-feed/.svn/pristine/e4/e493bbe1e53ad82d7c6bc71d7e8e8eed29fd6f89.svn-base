<?php
add_action( 'add_meta_boxes' , 'tfbip_add_meta_boxes');



function tfbip_add_meta_boxes(){

	add_meta_box( 'tfbip_shortcode_meta_box' , 'Shortcode' , 'tfbip_shortcode_meta_boxx' , 'tfbip_twitter_feed','side');
	add_meta_box( 'tfba_buy_premium_meta_box' , 'Buy Premium And Get:' , 'tfbip_premium_version' , 'tfbip_twitter_feed' , 'side' , 'high');



}
function tfbip_shortcode_meta_boxx( $post ){
	

	?>
	<p id="tfbip_shortcode_label">Use this shortcode to add Twitter Feed in your Posts, Pages </p>
	<input style="width: 100%;
    text-align: center;
    font-weight: bold;
    font-size: 17px;" type="text" readonly id="tfbip_shortcode_value" name="tfbip_shortcode_value" value="[icon_twitter_feed id='<?php echo $post->ID; ?>']" />
	

	<?php
}

function tfbip_premium_version(){

 ?> <style type="text/css"> .tfbip-action-button{ width: 93%; text-align: center; background: #0385f4; display: block; padding: 15px 8px; font-size: 16px; border-radius: 5px; font-family: tahoma; color: white; text-decoration: none; border: 2px solid #00BCD4;

 transition: all 0.2s; } .tfbip-action-button:hover{ width: 93%; text-align: center; display: block; padding: 18px 8px; font-size: 16px; border-radius: 5px; color: white !important; text-decoration: none; background: rgba(3, 99, 244, 0.71) !important; border: 2px solid #bb4138; }

 </style><strong> <ul> <li> - Unlock All Feed Templates</li> <li> - Unlock All Feed Styles</li> <li> - Unlock Hashtage Support</li> <li> - Unlock Unlimited Creation of Feeds</li> <li> - Unlock Widget Support</li> <li> - Unlock All Customization Optisons</li> <li> - Create 3, 4, 5, 6 Columns Masonry Feed</li> <li> - Get 24/7 Premium Support</li> <li> - Unlimited Updates</li> </ul> </strong> <a href="https://www.iconplugins.com/wordpress-twitter-feed" target="_blank" class="tfbip-action-button">GET PREMIUM NOW</a> <?php }