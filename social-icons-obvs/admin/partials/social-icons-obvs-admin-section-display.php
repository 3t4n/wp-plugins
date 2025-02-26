<?php
/**
 * Display section text.
 *
 * @link       http://jase.io/
 * @since      1.0.0
 *
 * @package    Social_Icons_Obvs
 * @subpackage Social_Icons_Obvs/admin/partials
 */

?>

<p><?php _e( 'In this section you may choose the order in which your icons appear.', 'social-icons-obvs' ); ?>
	<br><?php _e( 'When you are done, save your changes, grab the short code and hey presto… you are ready to display them!', 'social-icons-obvs' ) ?></p>
<h3 class="sio-heading"><?php _e( 'Displaying the Icons', 'social-icons-obvs' ); ?></h3>
<p><?php _e( 'Copy the short code below and paste it in the area(s) where you would like to display the icons on your website.', 'social-icons-obvs' )  ?>
	<br><?php _e( 'For instance, you may want to paste it into a widget that is part of your sidebar or footer.', 'social-icons-obvs' ) ?></p>
<p><?php _e( 'The shortcode is: ', 'social-icons-obvs' ) ?><code><?php echo '[social_icons_obvs]' ?></code></p>
<div class="sio-sort">
	<h3 class="sio-heading"><?php _e( 'Icon Order', 'social-icons-obvs' ); ?></h3>
	<ul class="sio-sort__icons"></ul>
</div>
