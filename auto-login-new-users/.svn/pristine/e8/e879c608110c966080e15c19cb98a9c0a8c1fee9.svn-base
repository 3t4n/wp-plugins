<?php
// Add custom fields to admin area
add_action( 'show_user_profile', 'cy_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'cy_show_extra_profile_fields' );

function cy_show_extra_profile_fields( $user ) { ?>

	<h3>Initial Registration Link</h3>

	<table class="form-table">

		<tr>
			<th><label for="registrationlink">Initial Registration Link</label></th>

			<td>
				<span><?php echo get_bloginfo('url'); ?>/?gxe=<?php echo base64_encode($user->user_login); ?>&gx7=<?php echo get_user_meta($user->ID, 'cy_c3dyx', true); ?></span><br />
				<span class="description">Initial user login URL.</span>
			</td>
		</tr>

	</table>
<?php }
?>