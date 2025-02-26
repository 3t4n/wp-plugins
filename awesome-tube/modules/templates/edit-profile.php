<?php
/**
 * Template Name: User Profile
 *
 * Allow users to update their profiles from Frontend.
 *
 */

/* Get user info. */
global $current_user, $wp_roles, $wp;
//get_currentuserinfo(); //deprecated since 3.1

/* Load the registration file. */
//require_once( ABSPATH . WPINC . '/registration.php' ); //deprecated since 3.1
$error = array();  

if (!empty( isset($_POST['action']) ) && isset($_POST['action']) == 'update-user' ) {

	/* Update user password. */
	if ( !empty( sanitize_text_field( $_POST['pass1'] ) ) && !empty( sanitize_text_field( $_POST['pass2'] ) ) ) {
		if ( sanitize_text_field( $_POST['pass1'] ) == sanitize_text_field( $_POST['pass2'] ) )
			wp_update_user( array( 'ID' => sanitize_text_field( $current_user->ID ), 'user_pass' => sanitize_text_field( $_POST['pass1'] ) ) );
		else
			$error[] = esc_html__('The passwords you entered do not match.  Your password was not updated.', 'awetube');
	}

	/* Update user information. */
	if ( !empty( sanitize_text_field( $_POST['url'] ) ) )
		wp_update_user( array( 'ID' => sanitize_text_field( $current_user->ID ), 'user_url' => sanitize_text_field( $_POST['url'] ) ) );
	if ( !empty( sanitize_email( $_POST['email'] ) ) ){
		if ( !is_email( sanitize_email( $_POST['email'] ) ) )
			$error[] = esc_html__('The Email you entered is not valid.  please try again.', 'awetube');
		elseif ( email_exists( sanitize_email( $_POST['email'] ) ) != $current_user->ID )
			$error[] = esc_html__( 'This email is already used by another user.  try a different one.', 'awetube' );
		else {
			wp_update_user(
				array ( 'ID' => sanitize_text_field( $current_user->ID ), 'user_email' => sanitize_email( $_POST['email'] ) ) 
			);
		}
	}
	if ( !empty( sanitize_text_field($_POST['display_name']) ) )
		wp_update_user( array( 'ID' => sanitize_text_field( $current_user->ID ), 'display_name' => sanitize_text_field( $_POST['display_name'] ) ) );

	if ( !empty( sanitize_text_field( $_POST['first-name'] ) ) )
		update_user_meta( sanitize_text_field( $current_user->ID ), 'first_name', sanitize_text_field($_POST['first-name']) );
	if ( !empty( sanitize_text_field($_POST['last-name']) ) )
		update_user_meta( sanitize_text_field( $current_user->ID ), 'last_name', sanitize_text_field($_POST['last-name']) );
	if ( !empty( sanitize_text_field($_POST['nickname']) ) )
		update_user_meta( sanitize_text_field( $current_user->ID ), 'nickname', sanitize_text_field($_POST['nickname']) );
	if ( !empty( sanitize_textarea_field($_POST['description']) ) )
		update_user_meta( sanitize_text_field( $current_user->ID ), 'description', sanitize_textarea_field($_POST['description']) );

	if ( !empty( $_FILES['user_img'] ) ) {
		require_once ABSPATH . 'wp-admin/includes/image.php';
		require_once ABSPATH . 'wp-admin/includes/file.php';
		require_once ABSPATH . 'wp-admin/includes/media.php';
		$attach_id = media_handle_upload( 'user_img', $current_user->ID );
		if ( is_numeric( $attach_id ) ) {
			update_option( 'user_img', $attach_id );
			update_user_meta( sanitize_text_field( $current_user->ID ), '_user_img', $attach_id );
		}
	}

	$user_social1 = sanitize_text_field( $_POST['user_social1'] );
	$user_social2 = sanitize_text_field( $_POST['user_social2'] );
	$user_social3 = sanitize_text_field( $_POST['user_social3'] );
	$user_social4 = sanitize_text_field( $_POST['user_social4'] );

	if ( !empty( $user_social1 ) ) {
		//update_field( 'user_social1', $user_social1, $current_user->ID );
		update_user_meta( sanitize_text_field( $current_user->ID ), 'user_social1', $user_social1 );
		update_user_meta( sanitize_text_field( $current_user->ID ), '_user_social1', 'field_608102b852bed' );
	}
	if ( !empty( $user_social2 ) ) {
		//update_field( 'user_social2', $user_social2, $current_user->ID );
		update_user_meta( sanitize_text_field( $current_user->ID ), 'user_social2', $user_social2 );
		update_user_meta( sanitize_text_field( $current_user->ID ), '_user_social2', 'field_608102c652bee' );
	}
	if ( !empty( $user_social3 ) ) {
		//update_field( 'user_social3', $user_social3, $current_user->ID );
		update_user_meta( sanitize_text_field( $current_user->ID ), 'user_social3', $user_social3 );
		update_user_meta( sanitize_text_field( $current_user->ID ), '_user_social3', 'field_608102cc52bef' );
	}
	if ( !empty( $user_social4 ) ) {
		//update_field( 'user_social4', $user_social4, $current_user->ID );
		update_user_meta( sanitize_text_field( $current_user->ID ), 'user_social4', $user_social4 );
		update_user_meta( sanitize_text_field( $current_user->ID ), '_user_social4', 'field_608102d252bf0' );
	}

	/* Redirect so the page will show updated info.*/
	/*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
	if ( count( $error ) == 0 ) {
		//action hook for plugins and extra fields saving
		//do_action('edit_user_profile_update', $current_user->ID);
		wp_safe_redirect( home_url( 'awetube-profile' ) );
		exit;
	}
}

if (!empty( isset($_POST['action']) ) && isset($_POST['action']) == 'update-password' ) {
	/* Update user password. */
	if ( !empty( sanitize_text_field( $_POST['pass1'] ) ) && !empty( sanitize_text_field( $_POST['pass2'] ) ) ) {
		if ( sanitize_text_field( $_POST['pass1'] ) == sanitize_text_field( $_POST['pass2'] ) )
			wp_update_user( array( 'ID' => sanitize_text_field( $current_user->ID ), 'user_pass' => sanitize_text_field( $_POST['pass1'] ) ) );
		else
			$error[] = esc_html__('The passwords you entered do not match.  Your password was not updated.', 'awetube');
	}

	/* Redirect so the page will show updated info.*/
	/*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
	if ( count( $error ) == 0 ) {
		//action hook for plugins and extra fields saving
		//do_action('edit_user_profile_update', $current_user->ID);
		wp_safe_redirect( home_url( 'edit_profile' ) );
		exit;
	}
}

get_header(); 

global $wp;
$current_id_user = get_current_user_id();
$user_info = get_user_meta($current_id_user);
$first_name = $user_info["first_name"][0];
$last_name = $user_info["last_name"][0];

$display_name = get_userdata($current_id_user);
$nickname = $user_info["nickname"][0];

$display_name = $display_name->display_name;

$user_name = $first_name .' '. $last_name;
if(empty($first_name)) {
	$user_info = get_userdata($current_id_user);
	$user_name = $user_info->display_name;
}

$user_date_created = get_userdata($current_id_user);

// $user_social1 = get_field( 'user_social1', 'user_' .$current_id_user );
// $user_social2 = get_field( 'user_social2', 'user_' .$current_id_user );
// $user_social3 = get_field( 'user_social3', 'user_' .$current_id_user );
// $user_social4 = get_field( 'user_social4', 'user_' .$current_id_user );

wp_enqueue_style( 'choosen', plugin_dir_url('README.txt') . AWETUBE_PLUGIN_NAME . '/public/css/choosen.min.css', array(), '', 'all' );

?>
<div class="content-wrapper profile-page edit-profile-page">
	<div class="awesome-tube-container">
		<div class="profile-account clearfix">
			<div class="image-author">
				<?php 
					$user_img = wp_get_attachment_image_src( get_user_meta($current_id_user,'_user_img', array('150','150'), true, true ));
					if(!empty($user_img)) { ?>
						<img class="profile_img" src="<?php echo esc_url($user_img[0]); ?>" alt="<?php echo esc_attr($display_name); ?>">
					<?php }
					else {
						echo get_avatar( $current_id_user, 150 );
					} ?>
			</div>
			<div class="profile-author">
				<h2 class="name-user"><?php echo esc_html( $display_name ); ?></h2>
				<span><?php echo esc_html($user_date_created->user_description); ?></span>
				<div class="social-author">
					<!-- <ul>
						<?php //if(!empty($user_social1)) { ?>
						<li>
							<a href="<?php //echo esc_url($user_social1); ?>"><i class="awetube-icon-instagram"></i></a>
						</li>
						<?php //} 
						//if (!empty($user_social3)) { ?>
						<li>
							<a href="<?php //echo esc_url($user_social3); ?>"><i class="awetube-icon-twitter"></i></a>
						</li>
						<?php //}
						//if(!empty($user_social2)) { ?>
						<li>
							<a href="<?php //echo esc_url($user_social2); ?>"><i class="awetube-icon-social-facebook"></i></a>
						</li>
						<?php //} ?>
					</ul> -->
				</div>
			</div>
			<div class="button-profile-wrap">
				<a href="<?php echo home_url( 'awetube-upload' ); ?>" class="upload-button"><i class="awetube-icon-video-camera"></i> <?php echo esc_html_e('Upload', 'awetube'); ?></a>
				<a href="<?php echo home_url( 'awetube-profile' ); ?>" class="edit-profile"><?php echo esc_html_e('Edit Profile', 'awetube'); ?></a>
				<a href="<?php echo esc_url( wp_logout_url( home_url( '/' ) ) ); ?>" class="edit-profile logout-btn"><?php esc_html_e( 'Logout', 'awetube' ); ?></a>
			</div>
		</div>
		<div id="post-<?php the_ID(); ?>">
			<?php //the_content(); ?>
			<?php if ( ! is_user_logged_in() ) : ?>
					<p class="warning">
						<?php esc_html_e('You must be logged in to edit your profile.', 'awetube'); ?>
					</p><!-- .warning -->
			<?php else : ?>
				<?php if ( count( $error ) > 0 ) echo '<p class="error">' . implode( '<br />', esc_html( $error ) ) . '</p>'; ?>
			<form method="post" name="update_profile" action="" method="POST" enctype="multipart/form-data">
				<div class="form-page row clearfix">
					<div class="column column-3">
						<div class="profile-image">
							<div class="form-group">
								<input type="file" name="user_img" id="video_file">
								<label for="video_file" class="add-file-wrap clearfix">
									<div class="image-pro">
										<?php 
										$user_img = wp_get_attachment_image_src( get_user_meta( $current_id_user,'_user_img', array('100','100'), true, true ) );
										if(!empty($user_img)) { ?>
											<img class="profile_img" src="<?php echo esc_url($user_img[0]); ?>" alt="<?php echo esc_attr($user_name); ?>">
										<?php }
										else {
											echo get_avatar( $current_id_user, 100 );
										} ?>
										<span><?php esc_html_e( 'Change Avatar', 'awetube' ); ?></span>
									</div>
								</label>
							</div>
							<div class="form-group row clearfix">
								<div class="column column-1">
									<div class="form-group">
										<label class="control-label" for="username"><?php esc_html_e( 'Username', 'awetube' ); ?></label>
										<input class="form-control" name="username" type="text" id="username" value="<?php the_author_meta( 'user_nicename', $current_user->ID ); ?>" readonly/>
									</div><!-- .form-group -->
								</div>
							</div>

							<div class="form-group row clearfix">
								<div class="column column-1">
									<div class="form-group">
										<label class="control-label" for="description"><?php esc_html_e( 'Description', 'awetube' ); ?></label>
										<div class="form-control" id="text_description"><?php the_author_meta( 'description', $current_user->ID ); ?></div>
									</div><!-- .form-group -->
								</div>
							</div>

							<div class="form-group">
								<button class="change-password" type="button"><?php esc_html_e('Change Password', 'awetube'); ?></button>
							</div>
						</div>
					</div>
					<div class="column column-2of3">
						<div class="inner-form-edit">
							<div class="form-group row clearfix">
								<div class="column column-2">
									<div class="form-group">
										<label class="control-label" for="first-name"><?php esc_html_e( 'First Name', 'awetube' ); ?></label>
										<input class="form-control" name="first-name" type="text" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" />
									</div><!-- .form-group -->
								</div>
								<div class="column column-2">
									<div class="form-group">
										<label class="control-label" for="last-name"><?php esc_html_e( 'Last Name', 'awetube' ); ?></label>
										<input class="form-control" name="last-name" type="text" id="last-name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" />
									</div><!-- .form-group -->
								</div>
							</div>
							<div class="form-group row clearfix">
								<div class="column column-2">
									<div class="form-group">
										<label class="control-label" for="nickname"><?php esc_html_e( 'Nickname', 'awetube' ); ?><span class="mandatory">*</span></label>
										<input class="form-control" name="nickname" type="text" id="nick-name" value="<?php the_author_meta( 'nickname', $current_user->ID ); ?>" />
									</div><!-- .form-group -->
								</div>
								<div class="column column-2">
									<div class="form-group">
										<label class="control-label" for="display_name"><?php esc_html_e( 'Display Name', 'awetube' ); ?></label>
										<select name="display_name" class="form-control chosen-select" id="display_name">
											<option value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" <?php if($display_name == $first_name) { echo esc_attr( 'selected' ); } ?>><?php the_author_meta( 'first_name', $current_user->ID ); ?></option>
											<option value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" <?php if($display_name == $last_name) { echo esc_attr( 'selected' ); } ?>><?php the_author_meta( 'last_name', $current_user->ID ); ?></option>
											<option value="<?php echo esc_attr( $user_name ); ?>" <?php if($display_name == $user_name) { echo esc_attr( 'selected' ); } ?>><?php echo esc_html( $user_name ); ?></option>
											<option value="<?php the_author_meta( 'nickname', $current_user->ID ); ?>" <?php if($display_name == $nickname) { echo esc_attr( 'selected' ); } ?>><?php the_author_meta( 'nickname', $current_user->ID ); ?></option>
										</select>
									</div><!-- .form-group -->
								</div>
							</div>
							<div class="form-group row clearfix">
								<div class="column column-1">
									<div class="form-group">
										<label class="control-label" for="email"><?php esc_html_e( 'E-mail', 'awetube' ); ?><span class="mandatory">*</span></label>
										<input class="form-control" name="email" type="text" id="email" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" />
									</div><!-- .form-group -->
								</div>
								<div class="column column-1">
									<div class="form-group">
										<label class="control-label" for="description"><?php esc_html_e( 'Biographical Information', 'awetube' ); ?></label>
										<textarea class="form-control" name="description" id="description" rows="8"><?php the_author_meta( 'description', $current_user->ID ); ?></textarea>
									</div><!-- .form-group -->
								</div>
							</div>
							<div class="form-group row clearfix">
								<div class="column column-2 column-1-sm">
									<div class="form-group">
										<label class="control-label" for="instagram"><?php esc_html_e( 'Instagram', 'awetube' ); ?></label>
										<div class="social">
											<input class="form-control" name="user_social1" type="text" id="instagram" value="<?php //echo esc_attr( $user_social1 ); ?>" />
											<i class="fa fa-instagram"></i>
										</div>
									</div><!-- .form-group -->
								</div>
								<div class="column column-2 column-1-sm">
									<div class="form-group">
										<label class="control-label" for="facebook"><?php esc_html_e( 'Facebook', 'awetube' ); ?></label>
										<div class="social">
											<input class="form-control" name="user_social2" type="text" id="facebook" value="<?php //echo esc_attr( $user_social2 ); ?>" />
											<i class="fa fa-facebook-f"></i>
										</div>
									</div><!-- .form-group -->
								</div>
							</div>
							<div class="form-group row clearfix">
								<div class="column column-2 column-1-sm">
									<div class="form-group">
										<label class="control-label" for="twitter"><?php esc_html_e( 'Twitter', 'awetube' ); ?></label>
										<div class="social">
											<input class="form-control" name="user_social3" type="text" id="twitter" value="<?php //echo esc_attr( $user_social3 ); ?>" />
											<i class="fa fa-twitter"></i>
										</div>
									</div><!-- .form-group -->
								</div>
							</div>

							<div class="form-group text-left form-submit-btn">
								<?php //echo $referer; ?>
								<input name="updateuser" type="submit" id="updateuser" class="submit btn button skwp-form-btn btn-primary skwp-btn" value="<?php esc_html_e( 'Update', 'awetube' ); ?>" />
								<?php wp_nonce_field( 'update-user' ); ?>
								<input name="action" type="hidden" id="action" value="update-user" />
							</div><!-- .form-submit -->
						</div>
					</div>
				</div>
			</form><!-- #adduser -->
			<?php endif; ?>
		</div><!-- .hentry .post -->
	</div>
	<div id="mySizeChartModal" class="password-modal form-page">
		<div class="modal-outer">
			<div class="password-modal-content">
				<div class="title-modal">
					<span class="close_modal"></span>
					<p><?php esc_html_e( 'Change Password', 'awetube' ); ?></p>
				</div>
				<div class="modal-content">
					<form method="post" name="update_profile" action="" method="POST" enctype="multipart/form-data">
						<div class="form-group row clearfix">
							<div class="form-group column column-1">
								<div class="form-group">
									<label class="control-label" for="pass1"><?php esc_html_e( 'Password', 'awetube' ); ?><span class="mandatory">*</span></label>
									<input class="form-control" name="pass1" type="password" id="pass1" />
								</div><!-- .form-group -->
							</div>
							<div class="form-group column column-1">
								<div class="form-group">
									<label class="control-label" for="pass2"><?php esc_html_e( 'Repeat Password', 'awetube' ); ?></label>
									<input class="form-control" name="pass2" type="password" id="pass2" />
								</div><!-- .form-group -->
							</div>

							<div class="form-group column column-1">
								<div class="form-group">
									<label class="control-label"></label>
									<input name="updateuser" type="submit" id="update-password" class="submit btn button skwp-form-btn btn-primary skwp-btn" value="<?php esc_html_e( 'Update', 'awetube' ); ?>" />
									<?php wp_nonce_field( 'update-password' ); ?>
									<input name="action" type="hidden" id="action" value="update-password" />
								</div><!-- .form-submit -->
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_enqueue_script( 'choosen', plugin_dir_url('README.txt') . AWETUBE_PLUGIN_NAME . '/public/js/choosen.min.js', array( 'jquery' ), '', false ); ?>
<script>
(function ($) {
	'use strict';

	$(document).ready(function() {
		$(".chosen-tags").chosen();
	});

})( jQuery );
</script>
<script>
	jQuery(function () {
		jQuery('.change-password').on('click', function () {
			jQuery('.password-modal').addClass('show');
		});
		jQuery('.close_modal').on('click', function () {
			jQuery('.password-modal').removeClass('show');
		});

		var timerid;

		jQuery("#first-name").on("input", function(){
			// Print entered value in a div box
			var Firstname = jQuery(this).val();
			var lastname = jQuery("#last-name").val();

			if(lastname != "") {
				var lastname = " " + lastname;
			} else {
				var lastname = "";
			}

			var name = Firstname + lastname;
			var arr = new Array;
			jQuery("#display_name > option").each(function() {
				arr.push ( this.value );
			});

			if(jQuery.inArray(name, arr) != -1) {

			} else {
				jQuery('#display_name').append('<option value="'+ name + '">'+ name + '</option>');
			}

		});

		jQuery("#last-name").on("input", function(){
			// Print entered value in a div box
			var Firstname = jQuery("#first-name").val();
			var lastname = jQuery(this).val();

			if(Firstname != "") {
				var Firstname = Firstname + " ";
			} else {
				var Firstname = "";
			}

			var name = Firstname + lastname;
			var arr = new Array;

			jQuery("#display_name > option").each(function() {
				arr.push ( this.value );
			});

			if(jQuery.inArray(name, arr) != -1) {

			} else {
				jQuery('#display_name').append('<option value="'+ name + '">'+ name + '</option>');
			}

		});

		jQuery("#nick-name").on("input", function(){
			// Print entered value in a div box
			var nickname = jQuery(this).val();

			var arr = new Array;
			jQuery("#display_name > option").each(function() {
				arr.push ( this.value );
			});

			if(jQuery.inArray(nickname, arr) != -1) {

			} else {
				jQuery('#display_name').append('<option value="'+ nickname + '">'+ nickname + '</option>');
			}

		});
	})
</script>
<?php

get_footer();
