<?php if ( post_password_required() ) {
return;
}
?>

<div id="comments" class="comments-area">
    <?php if ( get_comments(array(
	    'post_id' => get_the_ID(), // use post_id, not post_ID
	    'count' => true //return only the count
    )) != 0 ) : ?>
    <h2><?php echo ARSCP_AMP_Revolution::get()->options->get_option_data('commentsHeader' , 'personalizator', 'Leave a Comment'); ?></h2>

				<ol class="commentlist">

    <?php

    $commentsList= wp_list_comments(array('echo' => false,
                                          'max_depth' => 0,
                                          'avatar_size' => 50,
                                          'style'       => 'ol'),
                get_comments(array( 'post_id' => get_the_ID(), 'number' => ARSCP_AMP_Revolution::get()->options->get_option_data('maxComments','personalizator','4'), 'status' => 'approve') ));

    list( $sanitized_html, $featured_scripts, $featured_styles ) = AMP_Content_Sanitizer::sanitize(
	    $commentsList,
	    array( 'AMP_Img_Sanitizer' => array() ),
	    array(
		    'content_max_width' => $this->get( 'content_max_width' )
	    )
    );

    echo $sanitized_html;


    ?>

                 </ol>
<?php endif;
if(!comments_open(get_the_ID())){

?>
    <div class="commentForm">
        <h3><?php echo ARSCP_AMP_Revolution::get()->options->get_option_data('commentsClosed' , 'personalizator', 'Comments Are Closed'); ?></h3>
        <p></p>
    </div>
    <?php
return;
} ?>

<div class="commentForm">
    <h3><?php echo ARSCP_AMP_Revolution::get()->options->get_option_data('commentsFormHeader' , 'personalizator', 'Deja un comentario'); ?></h3>
    <p></p>
    <form method="post" id="commentform" target="_top" class="comment-form" novalidate="" action-xhr="<?php echo admin_url('admin-ajax.php?action=amp_comment_submit') ?>" target="_top">

        <?php if(is_user_logged_in()) { ?>

        <p class="comment-notes">
            <span id="email-notes"> <?php echo ARSCP_AMP_Revolution::get()->options->get_option_data('sesionStatus' , 'personalizator', 'Logged in'); ?></span>
        </p>
        <?php } else{ ?>
        <p class="comment-notes">
            <span id="email-notes"><?php echo ARSCP_AMP_Revolution::get()->options->get_option_data('privacyComment' , 'personalizator', 'Your email address will not be published. Required fields are marked'); ?></span><span class="required">*</span>
        </p>
        <?php } ?>
        <p class="comment-form-comment">

            <textarea id="comment" placeholder="<?php echo ARSCP_AMP_Revolution::get()->options->get_option_data('commentPlaceHolder' , 'personalizator', 'Your Comment...'); ?>" class="formInput" name="comment" cols="45" rows="8" maxlength="65525" aria-required="true" required="required"></textarea>
        </p>

	    <?php if(!is_user_logged_in()) { ?>
        <p class="comment-form-author">

            <input id="author" name="author" placeholder="<?php echo ARSCP_AMP_Revolution::get()->options->get_option_data('namePlaceholder' , 'personalizator', 'Name'); ?> *" class="formInput" type="text" value="" maxlength="245" aria-required="true" required="required" />
        </p>
        <p class="comment-form-email">

            <input placeholder="Email *" id="email" class="formInput" name="email" type="email" value="" maxlength="100" aria-describedby="email-notes" aria-required="true" required="required" />
        </p>
        <p class="comment-form-url">
            <input placeholder="Web" id="url" name="url" type="url" value="" maxlength="200" class="formInput"/>
        </p>
        <?php } ?>

        <p class="form-submit">
            <input name="submit" type="submit" id="submit" class="submit" value=" <?php echo ARSCP_AMP_Revolution::get()->options->get_option_data('commentButton' , 'personalizator', 'Post Comment'); ?>" />
            <input type="hidden" name="comment_post_ID" value="<?php echo get_the_ID(); ?>" id="comment_post_ID" /><br/>
            <input type="hidden" name="comment_parent" id="comment_parent" value="0" />
        </p>
        <div submit-success class="formSuccess">
            <template type="amp-mustache">
	            <?php echo ARSCP_AMP_Revolution::get()->options->get_option_data('commentsSuccess' , 'personalizator', 'Comment posted successfully'); ?>
            </template>
        </div>
        <div submit-error class="formError">
            <template type="amp-mustache">
	            <?php echo ARSCP_AMP_Revolution::get()->options->get_option_data('commentsFailure' , 'personalizator', 'Error posting comment'); ?>
            </template>
    </form>
</div>
</div>
