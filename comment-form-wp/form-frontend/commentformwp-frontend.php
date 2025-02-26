<?php 
/**
 * @package Comment Form WP
 * 
 * Comment Form WP Frontend
 * */

// ABSPATH Defined
if (! defined('ABSPATH')) {
	exit('not valid');
}


/* ==========================
	Modify Comment Form
========================== */
add_filter('comment_form_defaults', 'commentformwp_comment_form_modifier');

function commentformwp_comment_form_modifier($defaults) {
	// leave a reply
	$wpcf_title = get_option('commentformwp-title');
	if(! empty($wpcf_title)){
		$defaults['title_reply'] = __( $wpcf_title, 'comment-form-wp' );
	};
    // Your email address will not be published. Required fields are marked *
	$commentformwp_note = get_option('commentformwp-note');
	if(!empty($commentformwp_note)){
		$defaults['comment_notes_before'] = __( '<p class="comment-notes">
	<span id="email-notes"> '. $commentformwp_note .' </span></p>', 'comment-form-wp');
	};
	
    // author
	$commentformwp_author = get_option('commentformwp-author');
	$cfwpauthor_label = !empty($commentformwp_author) ? $commentformwp_author : 'Author';

	$commentformwp_authorplc = get_option('commentformwp-author-plc');
	$cfwpauthorplc_label = !empty($commentformwp_authorplc) ? $commentformwp_authorplc : '';

	$cfwpplc_required = get_option('commentformwp-placerequired-yes') == 'yes' ? '*' : '';
	$cfwplabel_required = get_option('commentformwp-labelrequired-yes') == 'yes' ? '*' : '';
		//if have placeholder then label will empty
	if (!empty($cfwpauthorplc_label)) {
		$cfwpauthor_label   = '';
		$cfwplabel_required = '';
	};

	$defaults['fields']['author'] = '<p class="comment-form-author">
		<label for="author">' . $cfwpauthor_label . ' <span class="required">'. $cfwplabel_required .'</span></label>
		<input id="author" name="author" type="text" placeholder="'. $cfwpauthorplc_label .' '. $cfwpplc_required .'" value="" size="30" maxlength="245" autocomplete="name" required="required"></p>';

	// remove Author
	if(get_option('commentformwp-nameoption') == 'not'){
		unset($defaults['fields']['author']);
	};

    // Email
	$commentformwp_email = get_option('commentformwp-email');
	$cfwpemail_label = !empty($commentformwp_email) ? $commentformwp_email : 'Email';

	$commentformwp_emailplc = get_option('commentformwp-email-plc');
	$cfwpemailplc_label = !empty($commentformwp_emailplc) ? $commentformwp_emailplc : '';
		//if have placeholder then label will empty
	if (!empty($cfwpemailplc_label)) {
		$cfwpemail_label    = '';
		$cfwplabel_required = '';
	};

	$defaults['fields']['email'] = __( '<p class="comment-form-email">
	<label for="email">'. $cfwpemail_label .' <span class="required">'. $cfwplabel_required .'</span></label> 
	<input id="email" name="email" type="email" placeholder="'. $cfwpemailplc_label .' '. $cfwpplc_required .'" value="" size="30" maxlength="100" aria-describedby="email-notes" autocomplete="email" required="required"></p>', 'comment-form-wp');
	// remove Email
	if(get_option('commentformwp-emailoption') == 'not'){
		unset($defaults['fields']['email']);
	};

    // URL
	$commentformwp_url = get_option('commentformwp-url');
	$cfwpurl_label = !empty($commentformwp_url) ? $commentformwp_url : 'Website';

	$commentformwp_urlplc = get_option('commentformwp-url-plc');
	$cfwpurlplc_label = !empty($commentformwp_urlplc) ? $commentformwp_urlplc : '';

		//if have placeholder then label will empty
	if (!empty($cfwpurlplc_label)) {
		$cfwpurl_label      = '';
		$cfwplabel_required = '';
	};

	$defaults['fields']['url'] = __( '<p class="comment-form-url">
	<label for="url">'. $cfwpurl_label .' <span class="required">'. $cfwplabel_required .'</span></label> 
	<input id="url" name="url" type="url" placeholder="'. $cfwpurlplc_label .' '. $cfwpplc_required .'" value="" size="30" maxlength="200" autocomplete="url" required="required"></p>', 'comment-form-wp');
	// remove URL
	if(get_option('commentformwp-websiteoption') == 'not'){
		unset($defaults['fields']['url']);
	};

    // comment fields
	$commentformwp_comment = get_option('commentformwp-textarea');
	$cfwpcomment_label = !empty($commentformwp_comment) ? $commentformwp_comment : 'Comment';

	$commentformwp_commentplc = get_option('commentformwp-textarea-plc');
	$cfwpcommentplc_label = !empty($commentformwp_commentplc) ? $commentformwp_commentplc : '';

		//if have placeholder then label will empty
	if (!empty($cfwpcommentplc_label)) {
		$cfwpcomment_label    = '';
		$cfwplabel_required   = '';
	};

	$defaults['comment_field'] = __( '<p class="comment-form-comment">
	<label for="comment">'. $cfwpcomment_label .' <span class="required">'. $cfwplabel_required .'</span></label>
	<textarea id="comment" name="comment" placeholder="'. $cfwpcommentplc_label .' '. $cfwpplc_required .'" cols="45" rows="8" maxlength="65525" required="required" spellcheck="false"></textarea> </p>', 'comment-form-wp');
    // cookies
	$cfwpcookie_text = get_option('commentformwp-cookies');
	$cfwp_cookie = !empty($cfwpcookie_text) ? $cfwpcookie_text : 'Save my name, email, and website in this browser for the next time I comment.';
	$defaults['fields']['cookies'] = __( '<p class="comment-form-cookies-consent">
	<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"> 
	<label for="wp-comment-cookies-consent">'. $cfwp_cookie .'</label></p>', 'comment-form-wp');

	// remove cookies
	if(get_option('commentformwp-cookie-hideshow') == 'not'){
		unset($defaults['fields']['cookies']);
	}
	// reply
	$commentformwp_replyto = get_option('commentformwp-reply');
	if(!empty($commentformwp_replyto)){
		$defaults['title_reply_to'] = __( $commentformwp_replyto, 'comment-form-wp' );
	}
	// cancel reply
	$commentformwp_canreply = get_option('commentformwp-cancel-reply');
	if(!empty($commentformwp_canreply)){
		$defaults['cancel_reply_link'] = __( $commentformwp_canreply, 'comment-form-wp' );
	}
	// post comment
	$commentformwp_submit = get_option('commentformwp-submitbtn');
	if(!empty($commentformwp_submit)){
		$defaults['label_submit'] = __( $commentformwp_submit, 'comment-form-wp' );
	}

	
    return $defaults;
};

/* ==============================================================
	Move the comment text field & cookies option to the bottom
============================================================== */
add_filter( 'comment_form_fields', 'commentformwp_comment_field_to_bottom' );
function commentformwp_comment_field_to_bottom( $fields ) {
 	// for textarea field
	if(get_option('commentformwp-commentbottom') == 'yes'){
		$comment_field = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_field;
	}

    // for cookies
	if(get_option('commentformwp-cookiesbottom') == 'yes'){
		$cookies_field = $fields['cookies'];
		unset( $fields['cookies'] );
		$fields['cookies'] = $cookies_field;
	}

    return $fields;
};

/* =====================================
	Style add for perfect form design
===================================== */
add_action('wp_head', 'commentformwp_style_add_dynamic');
function commentformwp_style_add_dynamic(){ ?>
<!-- WP Comment Form Style -->
<style>
<?php if(get_option('commentformwp-nameoption') == 'not') : ?>
	.comment-respond .comment-form-email{
		display: block;
		width: 100%;
		margin-left: 0;
	}
<?php endif; ?>
<?php if(get_option('commentformwp-emailoption') == 'not') : ?>
	.comment-respond .comment-form-author{
		display: block;
		width: 100%;
	}
<?php endif; ?>
<?php if(get_option('commentformwp-websiteoption') == 'not') : ?>
	.comment-respond p.comment-form-cookies-consent {
		display: block;
		width: 100%;
	}
<?php endif; ?>
<?php if(get_option('commentformwp-submitbtn-right') == 'yes') : ?>
	.comment-respond .form-submit #submit{
		display: block;
		margin-left: auto;
	}
<?php endif; ?>
</style>

<?php
};