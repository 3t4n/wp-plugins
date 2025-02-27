<?php

/**
 * Metabox for the Employees custom post type
 *
 * @package    	Terra_Themes_Tools
 * @link        http://terra-themes.com
 * Author:      Terra Themes
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


function terra_themes_tools_employees_metabox() {
    new Terra_Themes_Tools_Employees_Metabox();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'terra_themes_tools_employees_metabox' );
    add_action( 'load-post-new.php', 'terra_themes_tools_employees_metabox' );
}

class Terra_Themes_Tools_Employees_Metabox {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
        global $post;
		add_meta_box(
			'tt_employees_metabox'
			,__( 'Employee Info', 'terra_themes_tools' )
			,array( $this, 'render_meta_box_content' )
			,'employees'
			,'advanced'
			,'high'
		);
	}

	public function save( $post_id ) {
	
		if ( ! isset( $_POST['terra_themes_tools_employees_nonce'] ) )
			return $post_id;

		$nonce = $_POST['terra_themes_tools_employees_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'terra_themes_tools_employees' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		if ( 'employees' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;
	
		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}


		$position 		= isset( $_POST['terra_themes_tools_emp_position'] ) ? sanitize_text_field($_POST['terra_themes_tools_emp_position']) : false;
		$socialOne 		= isset( $_POST['terra_themes_tools_emp_socialOne'] ) ? esc_url_raw($_POST['terra_themes_tools_emp_socialOne']) : false;
		$socialTwo 		= isset( $_POST['terra_themes_tools_emp_socialTwo'] ) ? esc_url_raw($_POST['terra_themes_tools_emp_socialTwo']) : false;
		$socialThree	= isset( $_POST['terra_themes_tools_emp_socialThree'] ) ? esc_url_raw($_POST['terra_themes_tools_emp_socialThree']) : false;
		$empMail		= isset( $_POST['terra_themes_tools_emp_mail'] ) ? sanitize_email($_POST['terra_themes_tools_emp_mail']) : false;
		$link 			= isset( $_POST['terra_themes_tools_emp_link'] ) ? esc_url_raw($_POST['terra_themes_tools_emp_link']) : false;
		
		update_post_meta( $post_id, 'tt-position', $position );
		update_post_meta( $post_id, 'tt-socialOne', $socialOne );
		update_post_meta( $post_id, 'tt-socialTwo', $socialTwo );
		update_post_meta( $post_id, 'tt-socialThree', $socialThree );
		update_post_meta( $post_id, 'tt-mail', $empMail );
		update_post_meta( $post_id, 'tt-custom-link', $link );
	}

	public function render_meta_box_content( $post ) {
		wp_nonce_field( 'terra_themes_tools_employees', 'terra_themes_tools_employees_nonce' );

		$position 		= get_post_meta( $post->ID, 'tt-position', true );
		$socialOne 		= get_post_meta( $post->ID, 'tt-socialOne', true );
		$socialTwo		= get_post_meta( $post->ID, 'tt-socialTwo', true );
		$socialThree	= get_post_meta( $post->ID, 'tt-socialThree', true );
		$empMail		= get_post_meta( $post->ID, 'tt-mail', true );
		$link			= get_post_meta( $post->ID, 'tt-custom-link', true );

	?>
		
		<div class="tt-meta-wrapper">
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Employee Position', 'terra_themes_tools' ); ?></h4>
					<p><?php _e('The position will be displayed next to the name.', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_emp_position" name="terra_themes_tools_emp_position" value="<?php echo esc_html($position); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Social Media Link (1)', 'terra_themes_tools' ); ?></h4>
					<p><?php _e('Provide a link to a social media network.', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_emp_socialOne" name="terra_themes_tools_emp_socialOne" value="<?php echo esc_url($socialOne); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Social Media Link (2)', 'terra_themes_tools' ); ?></h4>
					<p><?php _e('Provide a link to a social media network.', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_emp_socialTwo" name="terra_themes_tools_emp_socialTwo" value="<?php echo esc_url($socialTwo); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Social Media Link (3)', 'terra_themes_tools' ); ?></h4>
					<p><?php _e('Provide a link to a social media network.', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_emp_socialThree" name="terra_themes_tools_emp_socialThree" value="<?php echo esc_url($socialThree); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Employee E-Mail', 'terra_themes_tools' ); ?></h4>
					<p><?php _e('Provide a e-mail address.', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_emp_mail" name="terra_themes_tools_emp_mail" value="<?php echo esc_attr($empMail); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Employee Link', 'terra_themes_tools' ); ?></h4>
					<p><?php _e('If you want the employee name to link somewhere, paste it in here.', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_emp_link" name="terra_themes_tools_emp_link" value="<?php echo esc_url($link); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>






	<?php
	}
}
