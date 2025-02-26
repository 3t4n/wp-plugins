<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$comment = isset($comment) ? (array) $comment : array();
if (isset($comment['user_info']) && !empty($comment['user_info']) && isset($comment['comment']) && !empty($comment['comment'])) {
    ?>
    <div class="comment-form-history mb-3 open-bg" data-id="<?php echo absint($id); ?>" data-comment_id="<?php echo absint($comment['commentId']); ?>">
        <div class="user-info d-flex align-items-center mb-2">
            <div class="avatar text-white"><?php echo isset($comment['user_info']) ? esc_html(substr($comment['user_info'], 0, 1)) : ''; ?></div>
            <div class="ms-2">
                <p class="mb-0"><?php echo isset($comment['user_info']) ? esc_html($comment['user_info']) : ''; ?></p>
                <p class="mb-0"><?php echo esc_html(human_time_diff( strtotime($comment['createAt']), current_time( 'timestamp' ) ).' '.__( 'ago', 'addlly')); ?></p>
            </div>
            <div class="d-flex align-items-center ms-auto gap-2">
                <?php if($comment['status'] == 'deleted'){ ?>
                    <div class="restore-btn" data-id="<?php echo esc_attr($id); ?>" data-comment_id="<?php echo absint($comment['commentId']); ?>" data-type="restore" data-text="<?php esc_html_e('Yes, restore it!', 'addlly'); ?>">
                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3.06 13a9 9 0 1 0 .49 -4.087"></path>
                            <path d="M3 4.001v5h5"></path>
                            <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                        </svg>
                    </div>
                <?php }else{ ?>
                    <?php if($comment['status'] == 'resolved'){ ?>
                        <div class="resolved-btn" data-id="<?php echo absint($id); ?>" data-comment_id="<?php echo absint($comment['commentId']); ?>" data-type="reopen" data-text="<?php esc_html_e('Yes, Re-Open it!', 'addlly'); ?>">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 12C1 5.925 5.925 1 12 1s11 4.925 11 11-4.925 11-11 11S1 18.075 1 12Zm16.28-2.72a.751.751 0 0 0-.018-1.042.751.751 0 0 0-1.042-.018l-5.97 5.97-2.47-2.47a.751.751 0 0 0-1.042.018.751.751 0 0 0-.018 1.042l3 3a.75.75 0 0 0 1.06 0Z"></path>
                            </svg>
                        </div>
                    <?php }else{ ?>
                        <div class="resolved-btn" data-id="<?php echo absint($id); ?>" data-comment_id="<?php echo absint($comment['commentId']); ?>" data-type="resolved" data-text="<?php esc_html_e('Yes, resolved it!', 'addlly'); ?>">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.28 9.28a.75.75 0 0 0-1.06-1.06l-5.97 5.97-2.47-2.47a.75.75 0 0 0-1.06 1.06l3 3a.75.75 0 0 0 1.06 0l6.5-6.5Z"></path>
                                <path d="M12 1c6.075 0 11 4.925 11 11s-4.925 11-11 11S1 18.075 1 12 5.925 1 12 1ZM2.5 12a9.5 9.5 0 0 0 9.5 9.5 9.5 9.5 0 0 0 9.5-9.5A9.5 9.5 0 0 0 12 2.5 9.5 9.5 0 0 0 2.5 12Z"></path>
                            </svg>
                        </div>
                    <?php } ?>
                    <div class="delete-btn" data-id="<?php echo absint($id); ?>" data-comment_id="<?php echo absint($comment['commentId']); ?>" data-type="delete" data-text="<?php esc_html_e('Yes, delete it!', 'addlly'); ?>">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" d="M0 0h24v24H0V0z"></path>
                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4z"></path>
                        </svg>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="addllyFormWrap comment-content">
            <pre class="fw-normal comment-div"><?php echo isset($comment['comment']) ? wp_kses_post($comment['comment']) : ''; ?></pre>
            <?php if(isset($comment['replyComments']) && !empty($comment['replyComments'])){ ?>
                <div class="replies-label"><?php echo count($comment['replyComments']); ?> <?php esc_html_e('Replies', 'addlly'); ?></div>
            <?php } ?>
            
        </div>
    </div>
<?php } ?>