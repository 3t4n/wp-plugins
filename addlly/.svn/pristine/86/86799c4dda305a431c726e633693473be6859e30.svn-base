<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$id              = $idd;
$article_id      = get_post_meta($id, 'article_id', true);
$article_data    = addlly_get_article_by_id($id);
$articleContent  = isset($article_data->article_html) ? $article_data->article_html : '';
$citationContent = get_post_meta($id, 'citationContent', true);
?>
<?php addlly_get_template_part('one-click-blog-writer/edit/header') ; ?>
<div class="addlly-articles-holder">
    <div class="blog-writer-holder d-flex flex-row">
        <?php 
        set_query_var('id', $id);
        set_query_var('active_tab', $active_tab);
        addlly_get_template_part('one-click-blog-writer/edit/left-sidebar');
        if ($active_tab == 'linkedIn' || $active_tab == 'facebook' || $active_tab == 'twitter' || $active_tab == 'instagram') {
            addlly_get_template_part('one-click-blog-writer/edit/social-post');
        }else{
            addlly_get_template_part('one-click-blog-writer/edit/'. $active_tab);
        }
        ?>
    </div>
</div>
<div id="addlly_loader">
    <img src="<?php echo esc_url(ADDLLY_URL); ?>/assets/images/addlly-primary-loader.gif">
</div>
<div class="modal regenrate-modal" id="regenrateModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="text-start p-0 overflow-auto modal-body">
                <div class="maingenrateBlock m-0 p-3 h-100">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4><?php esc_html_e('What would you like to change?', 'addlly'); ?></h4>
                        <button class="btn btn-primary" data-dismiss="modal">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"></path>
                            </svg> <?php esc_html_e('Re-Generate', 'addlly'); ?>
                        </button>
                    </div>
                    <div class="genrateFields mt-3">
                        <div class="fields m-0">
                            <label><?php esc_html_e("Customize your content before hitting the 'Re-Generate' button.", 'addlly'); ?> </label>
                            <textarea name="feedback" type="text" rows="3" placeholder="Insert feedback ..." class="addlly-textarea w-100"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal note-modal" id="noteModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="position-relative p-4 modal-body">
                <div class="d-flex align-items-center justify-content-between">
                    <h3 class="fw-normal"><?php esc_html_e('Request for Editing', 'addlly'); ?></h3>
                    <svg data-dismiss="modal" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="fs-3 text-primary cursor-pointer" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
                    </svg>
                </div>
                <hr>
                <div class="addllyFormWrap">
                    <div class="fields form-group mb-4">
                        <label><?php esc_html_e('What would you like us to look at?', 'addlly'); ?></label>
                        <div class="custom-select">
                            <select name="likeUsToLookAt" id="likeUsToLookAt">
                                <option value="General proofreading"><?php esc_html_e('General proofreading', 'addlly'); ?></option>
                                <option value="Brand tonality"><?php esc_html_e('Brand tonality', 'addlly'); ?></option>
                                <option value="Change/Add Images"><?php esc_html_e('Change/Add Images', 'addlly'); ?></option>
                                <option value="Improve SEO"><?php esc_html_e('Improve SEO', 'addlly'); ?></option>
                                <option value="Special requests"><?php esc_html_e('Special requests', 'addlly'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label><?php esc_html_e('Please specify what would you like us to look at?', 'addlly'); ?></label>
                        <textarea name="specifyLikeUsToLookAt" id="specifyLikeUsToLookAt" type="text" rows="4" placeholder="<?php esc_html_e('Please specify what you would like us to look at', 'addlly'); ?>" class="addllyForm-control h-auto rounded-3"></textarea>
                    </div>
                    <div class="text-end">
                        <button type="button" class="addlly-primary ms-auto btn">
                            <span><?php esc_html_e('Send for Review', 'addlly'); ?></span>
                        </button>
                        <p class="m-2 mb-0 text-primary"><?php esc_html_e('Request for Editing ( Will utilize 4 Addlly Credit )', 'addlly'); ?></p>
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div>

<div class="modal regenrate-modal" id="commentModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="text-start p-0 overflow-auto modal-body">
                <div class="maingenrateBlock m-0 p-3 h-100">
                    <div class="genrateFields mt-3 mb-3">
                        <div class="fields m-0">
                            <textarea name="comment" type="text" rows="3" placeholder="<?php esc_html_e('Add comment', 'addlly'); ?>" class="addlly-textarea w-100"></textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <div class="user-info d-flex align-items-center">
                            <div class="avatar text-white">A</div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <button class="addlly-outline" type="button" data-dismiss="modal"><?php esc_html_e('Close', 'addlly'); ?></button>
                            <button class="addlly-primary btn" type="button" data-dismiss="modal"><?php esc_html_e('Submit', 'addlly'); ?></button>
                        </div>
                    </div>
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
                            <textarea name="comment" type="text" rows="3" placeholder="<?php esc_html_e('Insert comment ...', 'addlly'); ?>" class="addlly-textarea w-100"></textarea>
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
<div class="modal saved-modal" id="savedModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="text-center modal-body">
                <img class="mb-4" src="data:image/png;base64,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" alt="addlly"/>
                <h3 class="mb-sm-3 mb-2"><?php esc_html_e('Saved!', 'addlly'); ?></h3>
                <p class="mb-sm-4 mb-2"><?php esc_html_e('Your details have been saved successfully', 'addlly'); ?></p>
                <div class="d-flex justify-content-center gap-3">
                    <button type="button" class="px-4 stay-btn" style="background-color: rgb(230, 235, 255); border: none; border-radius: 5px; color: rgb(0, 57, 255); font-size: 14px;"><?php esc_html_e('Stay Here', 'addlly'); ?></button>
                    <button type="button" class="addlly-primary px-4 go-btn" data-url="<?php echo esc_url(admin_url('admin.php?page=one-click')); ?>"><?php esc_html_e('Go Dashboard', 'addlly'); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal image-history-modal" id="imageHistoryModal">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
        <div class="modal-content">
            <div class="modal-body">
                <div class="image-content">
                    <button class="btn arrow-btn arrow-prev">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 192 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M192 127.338v257.324c0 17.818-21.543 26.741-34.142 14.142L29.196 270.142c-7.81-7.81-7.81-20.474 0-28.284l128.662-128.662c12.599-12.6 34.142-3.676 34.142 14.142z"></path>
                        </svg>
                    </button>
                    <div class="image-view-wrapper">
                        <img src="<?php echo esc_url(ADDLLY_URL); ?>/assets/images/article-images-1915.png" alt="">
                    </div>
                    <button class="btn arrow-btn arrow-next">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 192 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z"></path>
                        </svg>
                    </button>
                    <button class="btn download-btn me-3">
                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="fs-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" x2="12" y1="15" y2="3"></line>
                        </svg>
                        <?php esc_html_e('Download Image', 'addlly'); ?>
                    </button>
                    <label class="img-label">
                        <span class="activeSliderCount">01</span> / 03
                    </label>
                </div>
                <button class="btn close-btn" data-dismiss="modal">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="fs-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" stroke-width="2" d="M3,3 L21,21 M3,21 L21,3"></path></svg>
                </button>
            </div>
        </div>
    </div>
</div>
