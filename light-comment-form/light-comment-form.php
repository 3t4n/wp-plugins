<?php 

/*
Plugin Name: light comment form
Description: User friendly wordpress contact form.
Author: karlis upitis
Author URI: http://karlis.upitis.com
Version: 1.0
*/
// [Plugin URI]: (in development) http://karlis.upitis.com
$development = true;


	function modify_form_default_fields($a){
		//Note: To use the variables present in the code below in a custom callback function, you must first set these variables within your callback using: 
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		$fields   =  array(
		'author' => '<p class="input-container comment-form-author">'.
					'	<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.
					'	<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label>'.
					'</p>',
		'email'  => '<p class="input-container comment-form-email">'.
					'	<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' . 
					'	<label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label>'.
					'</p>',
		'url'    => '<p class="input-container comment-form-url">'.
					'	<input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />'.
					'	<label for="url">' . __( 'Website' ) . '</label>'.
					'</p>',
		);
		return $fields;
	}

	function modify_comment_field(){
		$field   =  '<p class="textarea-container comment-form-comment">'.
					'	<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>'.
					'	<label for="comment">' . _x( 'Comment', 'noun' ) . '</label>'.
					'</p>';
		return $field;
	}

	function my_scripts() {
		if($development){
			wp_register_script('light-comment-form', plugins_url( 'light-comment-form.js'  , __FILE__ ).'?t='.time(), array('jquery'), false, 'all' );
			wp_register_style ('light-comment-form', plugins_url( 'light-comment-form.css' , __FILE__ ).'?t='.time(), array(), false, 'all' );
		}else{
			wp_register_script('light-comment-form', plugins_url( 'light-comment-form.js'  , __FILE__ ), array('jquery'), '1.0', 'all' );
			wp_register_style ('light-comment-form', plugins_url( 'light-comment-form.css' , __FILE__ ), array(), '1.0', 'all' );
		}
		wp_enqueue_script ('light-comment-form');
		wp_enqueue_style  ('light-comment-form');
	}


	/* make correct (for forms) input and label appearance order*/
	add_filter('comment_form_default_fields','modify_form_default_fields');
	add_filter('comment_form_field_comment','modify_comment_field');

	add_action( 'wp_enqueue_scripts', 'my_scripts', 20, 1);
