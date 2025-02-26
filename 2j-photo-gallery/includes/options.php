<?php
/*
*      2J Photo Gallery
*      By 2J Photo Gallery Team
*      Contact: http://2joomla.net
*      Licensed under the GPLv3
*      Copyright (c) 2017, 2JTeam. All rights reserved.
*/



if( !defined('WPINC') || !defined("ABSPATH") ){
	die();
}

$options = get_option( '2j-photo-gallery' , array() );

if ( isset( $_POST['submit'] ) ) {
	check_admin_referer( 'twoj-photo-gallery-options' );
	$options['active'] = ( $_POST['active'] == 'on' );

	update_option( '2j-photo-gallery', $options );
}
?>
<style> .indent {padding-left: 2em} </style>
<div class="wrap">
	<h1><?php _e( '2J Photo Gallery', 'photo-gallery-2j'); ?></h1>

	<form action="" method="post" id="twoj-photo-gallery">
		<ul>
			<li>
				<label for="gallery_enable">
					<input type="radio" id="gallery_enable" name="active" value="on" <?php checked( $options['active'] );?> /> 
					<strong>
						<?php _e( 'Enable' ); ?>
					</strong>
				</label>			
			</li>
			<li>
				<label for="gallery_disable">
					<input type="radio" id="gallery_disable" name="active" value="off" <?php checked( !$options['active'] );?> /> 
					<strong>
						<?php _e( 'Disable' ); ?>
					</strong>
				</label>
			</li>
		</ul>
		<?php wp_nonce_field( 'twoj-photo-gallery-options' ); ?>
		<p class="submit">
			<input class="button-primary" type="submit" name="submit" value="<?php _e( 'Save Changes') ?>">
		</p>
	</form>
</div>
