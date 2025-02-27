<?php
    use Elementor\Plugin;
    if (Plugin::instance()->editor->is_edit_mode() || get_post_type()=='elementor_library'){

    	$postid = $settings['prev_id'];

    } else {

	    global $postid;
	    $postid = get_the_ID(); 

    } 
    $aria_req = '';
    $commenter = wp_get_current_commenter();

    $fields = array(

        'fields' => apply_filters(
            'comment_form_default_fields', array(
                'author' => '<div class="comment-form-author khbcomment-field"><label for="author"><span class="screen-reader-text">' . esc_attr__( 'Name *'  , 'zxp' ) . '</span></label><input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' placeholder="' . esc_attr__( 'Name *'  , 'zxp' ) . '"/></div>',
                'email'  => '<div class="comment-form-email khbcomment-field"><label for="email"><span class="screen-reader-text">' . esc_attr__( 'Email *'  , 'zxp' ) . '</span></label><input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' placeholder="' . esc_attr__( 'Email *'  , 'zxp' ) . '"/></div>',
                'url'  => '<div class="comment-form-url khbcomment-field"><label for="url"><span class="screen-reader-text">' . esc_attr__( 'Website *'  , 'zxp' ) . '</span></label><input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . esc_attr__( 'Website'  , 'zxp' ) . '"/></div>',
            )
        ),
        'comment_field' => '<p class="comment-form-comment">' .
            '<textarea id="comment" class="form-control" name="comment" placeholder="Comment" cols="45" rows="8" aria-required="true"></textarea>' .
            '</p>',
        'comment_notes_after' => '',
        'title_reply' => '',
        'comment_notes_before' => '',
    );

$num_comments = get_comments_number($postid);
if ( comments_open($postid) ) {
    if ( $num_comments == 0 ) {
        $comments = __('No Comments');
    } elseif ( $num_comments > 1 ) {
        $comments = $num_comments . __(' Comments');
    } else {
        $comments = __('1 Comment');
    }
    $write_comments =  $comments;
} else {
    $write_comments =  __('Comments are off for this post.');
}

?>

<div class="khb-commentwrap">
    <h3 class="khbcomhead"><?php echo $write_comments;?></h3>
    <ol class="commentlist">
        <?php    
            $comments = get_comments(array(
                'post_id' => $postid,
                'status' => 'approve'
            ));

            wp_list_comments(array(
                'reply_text' => 'Reply',
            ), $comments);
        ?>
    </ol>

<?php comment_form( $fields, $postid );?>

</div>


