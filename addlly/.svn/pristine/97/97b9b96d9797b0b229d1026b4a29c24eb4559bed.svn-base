<?php 
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
addlly_get_template_part('one-click-blog-writer/list/articles-list');
addlly_get_template_part('one-click-blog-writer/list/train-articles');
addlly_get_template_part('one-click-blog-writer/list/preview-article');
?>
<div class="modal refund-modal" id="refundRequestsModal">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="maingenrateBlock m-0 p-4 modal-body">
                <div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
                    <strong><?php esc_html_e('Refund Credit Request', 'addlly'); ?></strong>
                    <button class="btn close-btn p-0" data-dismiss="modal">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" stroke-width="2" d="M3,3 L21,21 M3,21 L21,3"></path></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal refund-modal" id="refundModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="maingenrateBlock m-0 p-4 modal-body">
                <div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
                    <strong><?php esc_html_e('Refund Credit Request', 'addlly'); ?></strong>
                    <button class="btn close-btn p-0" data-dismiss="modal">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" stroke-width="2" d="M3,3 L21,21 M3,21 L21,3"></path></svg>
                    </button>
                </div>
                <div class="genrateFields">
                    <div class="fields m-0">
                        <div class="form-group">
                            <label><?php esc_html_e('Comment', 'addlly'); ?> <span class="astrick">*</span></label>
                            <input type="hidden" name="refund_id" value="">
                            <input type="hidden" name="article_id" value="">
                            <input type="hidden" name="subtype" value="">
                            <textarea name="comment" type="text" rows="3" placeholder="<?php echo esc_html('Insert comment ...', 'addlly'); ?>" class="addlly-textarea w-100"></textarea>
                        </div>
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-end">
                    <button class="addlly-primary w-auto" type="button" variant="primary" disabled=""><?php esc_html_e('Send Request', 'addlly'); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>