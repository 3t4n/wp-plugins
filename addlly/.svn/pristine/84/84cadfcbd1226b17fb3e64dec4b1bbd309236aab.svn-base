<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>
<div class="p-1">
    <div class="comment-modal-header">
        <div class="d-flex align-items-center gap-2">
            <button class="btn arrow-btn p-0 border-0">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path d="M11.67 3.87L9.9 2.1 0 12l9.9 9.9 1.77-1.77L3.54 12z"></path>
                </svg>
            </button>
            <button class="btn arrow-btn p-0 border-0" disabled="">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path fill="none" d="M0 0h24v24H0V0z"></path>
                    <path d="M6.23 20.23L8 22l10-10L8 2 6.23 3.77 14.46 12z"></path>
                </svg>
            </button>
        </div>
        <div class="d-flex align-items-center ms-auto gap-2">
           <?php if($comment['status'] == 'deleted'){ ?>
                <div class="restore-btn" data-id="<?php echo absint($id); ?>" data-comment_id="<?php echo absint($comment['commentId']); ?>" data-type="restore" data-text="<?php esc_html_e('Yes, restore it!', 'addlly'); ?>">
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
    <div class="comment-modal-body messages">
        <?php if(isset($comment['replyComments'])){
            foreach($comment['replyComments'] as $reply){
                if($reply->comment != ''){ ?>
                    <div class="message <?php echo esc_attr($reply->senderType); ?>">
                        <div class="message-header">
                            <p class="mb-0"><?php echo esc_html($reply->user_info); ?></p>
                            <?php if(isset($reply->createAt) && $reply->createAt != ''){ ?>
                                <p class="mb-0"><?php echo esc_html(human_time_diff( strtotime($reply->createAt), current_time( 'timestamp' ) ).' '. __( 'ago', 'addlly' )); ?></p>
                            <?php } ?>
                        </div>
                        <pre class=""><?php echo wp_kses_post($reply->comment); ?></pre>
                    </div>
                <?php } ?>
            <?php }
        } ?>
    </div>
    <div class="comment-modal-footer addllyFormWrap">
        <div class="form-group">
            <textarea name="reply" type="text" rows="3" class="addllyForm-control rounded-3 p-2 bg-white" placeholder="<?php esc_html_e('Add Reply', 'addlly'); ?>"></textarea>
            <div class="d-flex align-items-center justify-content-between mt-2">
                <div class="user-info">
                    <div class="avatar text-white">A</div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <button class="addlly-outline" type="button"><?php esc_html_e('Close', 'addlly'); ?></button>
                    <button class="addlly-primary" type="button" disabled="" data-comment_id="<?php echo esc_attr($comment['commentId']); ?>"><?php esc_html_e('Submit', 'addlly'); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>