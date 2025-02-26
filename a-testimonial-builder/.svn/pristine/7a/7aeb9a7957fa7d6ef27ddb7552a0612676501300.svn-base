<?php
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use DavidWenner\ATestimonialBuilder\ATBS_Widgets;
use DavidWenner\ATestimonialBuilder\ATBS_Content;
use DavidWenner\ATestimonialBuilder\ATBS_Functions;
use DavidWenner\ATestimonialBuilder\ATBS_YoutubeImageResolver;
use DavidWenner\ATestimonialBuilder\ATBS_StringHelper;

?>
<div class="wrap">
    <h1 class="wp-heading-inline"><?php esc_html_e('Manage Testimonials', 'a-testimonial-builder'); ?></h1>
    <a class="page-title-action vocalreferences-btn-addnew" href="#"><?php esc_html_e('Add New', 'a-testimonial-builder'); ?></a>
    <div class="float-right">
        <?php
        if (ATBS_Functions::atbs_is_logged_in()) {
            ?>
            <?php
            if (($email = get_option('atbs_user_email', null))) {
                echo esc_attr($email)
                ?>
                |
            <?php } ?>
            <a href="<?php echo esc_url(admin_url('admin.php?page=a-testimonial-builder-logout')) ?>"><?php esc_html_e('Logout', 'a-testimonial-builder') ?></a>    
            <?php
        } else {
            ?>
            <a href="<?php echo esc_url(admin_url('admin.php?page=a-testimonial-builder')) ?>"><?php esc_html_e('Login', 'a-testimonial-builder') ?></a>
            |
            <a href="https://merchant.vocalreferences.com/auth/sign-up?source=wordpress" target="_blank"><?php esc_html_e('Register', 'a-testimonial-builder') ?></a>
            <?php
        }
        ?>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col">&nbsp;</div>
        <div class="col"> 
            <p class="search-box mb-2">
                <a href="#" class="button" onclick="window.location.reload();">
                    <?php esc_html_e('Refresh testimonials', 'a-testimonial-builder'); ?>
                </a>
            </p>
        </div>
    </div>

    <div class="row row-full-height manage-statistic">
        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
            <div class="card card-default card-border-bottom-brand">
                <div  class="card-body">
                    <div class="text-center number">
                        <?php echo esc_attr($contents['statistics']['testimonials'] ?? 0); ?>
                    </div>
                    <div class="card-title text-center">
                        <?php echo esc_html_e('Testimonials', 'a-testimonial-builder') ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
            <div class="card card-default card-border-bottom-danger">
                <div  class="card-body">
                    <div class="text-center number">
                        <?php echo esc_attr($contents['statistics']['views'] ?? 0); ?>
                    </div>
                    <div class="card-title text-center">
                        <?php echo esc_html_e('Views', 'a-testimonial-builder') ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
            <div class="card card-default card-border-bottom-success">
                <div  class="card-body">
                    <div class="text-center number">
                        <?php echo esc_attr($contents['statistics']['pending'] ?? 0) ?>
                    </div>
                    <div class="card-title text-center">
                        <?php echo esc_html_e('Pending', 'a-testimonial-builder') ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
            <div class="card card-default card-border-bottom-warning">
                <div  class="card-body">
                    <div class="text-center number">
                        <?php echo esc_attr($contents['statistics']['last30days'] ?? 0) ?>
                    </div>
                    <div class="card-title text-center">
                        <?php echo esc_html_e('Last 30 days', 'a-testimonial-builder') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <table class="wp-list-table widefat fixed striped table-view-list pages table">
        <thead>
            <tr>
                <td>
                    <form method="get" action="<?php echo esc_attr(admin_url('admin.php?page=a-testimonial-builder')); ?>">
                        <?php wp_nonce_field('atbs_contents', 'atbs_nonce'); ?>
                        <input type="hidden" name="page" value="a-testimonial-builder"/>
                        <div class="filter-content">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <div class="form-group field-content-title">
                                            <input type="text" value="<?php echo esc_attr($search['search'] ?? '') ?>" id="content-title" class="form-control" name="ContentSearch[search]" placeholder="<?php echo esc_html_e('Search string', 'a-testimonial-builder') ?>">
                                        </div>                        
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <div class="form-group field-contentsearch-status">
                                            <select id="contentsearch-status" class="form-control" name="ContentSearch[status]">
                                                <option value="" disabled=""><?php echo esc_html_e('Status', 'a-testimonial-builder') ?></option>
                                                <option value="all" <?php echo ($search['status'] ?? '') == 'all' ? 'selected' : '' ?>><?php echo esc_html_e('All', 'a-testimonial-builder') ?></option>
                                                <option value="accepted" <?php echo ($search['status'] ?? '') == 'accepted' ? 'selected' : '' ?>><?php echo esc_html_e('Accepted', 'a-testimonial-builder') ?></option>
                                                <option value="pending" <?php echo ($search['status'] ?? '') == 'pending' ? 'selected' : '' ?>><?php echo esc_html_e('Pending', 'a-testimonial-builder') ?></option>
                                            </select>
                                        </div>                        
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group field-content-title">
                                        <div class="form-group field-contentsearch-source">
                                            <select id="contentsearch-source" class="form-control" name="ContentSearch[source]">
                                                <option value="" disabled=""><?php echo esc_html_e('Source', 'a-testimonial-builder') ?></option>
                                                <option value="all" <?php echo ($search['source'] ?? '') == 'all' ? 'selected' : '' ?>><?php echo esc_html_e('All', 'a-testimonial-builder') ?></option>
                                                <option value="webform" <?php echo ($search['source'] ?? '') == 'webform' ? 'selected' : '' ?>><?php echo esc_html_e('Vocalreferences', 'a-testimonial-builder') ?></option>
                                                <option value="google" <?php echo ($search['source'] ?? '') == 'google' ? 'selected' : '' ?>><?php echo esc_html_e('Google', 'a-testimonial-builder') ?></option>
                                                <option value="facebook" <?php echo ($search['source'] ?? '') == 'facebook' ? 'selected' : '' ?>><?php echo esc_html_e('Facebook', 'a-testimonial-builder') ?></option>
                                                <option value="yelp" <?php echo ($search['source'] ?? '') == 'yelp' ? 'selected' : '' ?>><?php echo esc_html_e('Yelp', 'a-testimonial-builder') ?></option>
                                                <option value="csv" <?php echo ($search['source'] ?? '') == 'csv' ? 'selected' : '' ?>><?php echo esc_html_e('Csv', 'a-testimonial-builder') ?></option>
                                            </select>
                                        </div>                        
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group field-content-title">
                                        <div class="form-group field-contentsearch-visible">
                                            <select id="contentsearch-visible" class="form-control" name="ContentSearch[visible]">
                                                <option value="" disabled=""><?php echo esc_html_e('Display', 'a-testimonial-builder') ?></option>
                                                <option value="all" <?php echo ($search['visible'] ?? '') == 'all' ? 'selected' : '' ?>><?php echo esc_html_e('All', 'a-testimonial-builder') ?></option>
                                                <option value="acvive" <?php echo ($search['visible'] ?? '') == 'acvive' ? 'selected' : '' ?>><?php echo esc_html_e('Active', 'a-testimonial-builder') ?></option>
                                                <option value="no-active" <?php echo ($search['visible'] ?? '') == 'no-active' ? 'selected' : '' ?>><?php echo esc_html_e('Not active', 'a-testimonial-builder') ?></option>
                                            </select>
                                        </div>                        
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group field-content-title">
                                        <div class="form-group field-contentsearch-sort">
                                            <select id="contentsearch-sort" class="form-control" name="ContentSearch[sort]">
                                                <option value="" disabled=""><?php echo esc_html_e('Sort by', 'a-testimonial-builder') ?></option>
                                                <option value="all" <?php echo ($search['sort'] ?? '') == 'all' ? 'selected' : '' ?>><?php echo esc_html_e('All', 'a-testimonial-builder') ?></option>
                                                <option value="ending-sooest" <?php echo ($search['sort'] ?? '') == 'ending-sooest' ? 'selected' : '' ?>><?php echo esc_html_e('Time: ending soonest', 'a-testimonial-builder') ?></option>
                                                <option value="newly-listed" <?php echo ($search['sort'] ?? '') == 'newly-listed' ? 'selected' : '' ?>><?php echo esc_html_e('Time: newly listed', 'a-testimonial-builder') ?></option>
                                                <option value="lowest-first" <?php echo ($search['sort'] ?? '') == 'lowest-first' ? 'selected' : '' ?>><?php echo esc_html_e('Rating: lowest first', 'a-testimonial-builder') ?></option>
                                                <option value="highest-first <?php echo ($search['sort'] ?? '') == 'highest-first' ? 'selected' : '' ?>"><?php echo esc_html_e('Rating: highest first', 'a-testimonial-builder') ?></option>
                                            </select>
                                        </div>                        
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-1 col-lg-1">
                                    <button type="submit" class="btn btn-primary filter-search">
                                        <svg class="feather feather-search" fill="none" height="18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="11" cy="11" r="8"/><line x1="21" x2="16.65" y1="21" y2="16.65"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>    
                        </div>
                    </form>
                </td>
            </tr>
        </thead>
    </table>
    <table class="wp-list-table widefat fixed striped table-view-list pages table">
        <thead>
            <tr>
                <td width="10%"><?php esc_html_e('Created Date', 'a-testimonial-builder'); ?></td>
                <td width="60%"></td>
                <td width="5%"><?php esc_html_e('Visible', 'a-testimonial-builder'); ?></td>
                <td width="10%"></td>
            </tr>
        </thead>
        <tbody id="the-list">
            <?php
            if (!empty($contents['items'])) {
                foreach ($contents['items'] as $item) {
                    ?>
                    <tr data-row-id="<?php echo esc_attr($item['id']); ?>">
                        <td style="text-align: center;">
                            <?php echo esc_attr(gmdate('Y-m-d', strtotime($item['created_at']))) ?>
                            <br/>
                            <?php
                            $item = ATBS_YoutubeImageResolver::resolveYoutubeImage($item);
                            if (!empty($item['picture_path'])) {
                                ?><a href="<?php echo esc_attr($item['picture_path']) ?>" data-fancybox="gallery"><img src="<?php echo esc_attr($item['picture_path']) ?>" class="img-thumbnail rounded mx-auto d-block"></a><?php
                            }
                            ?>
                        </td>
                        <td>
                            <?php if (!empty($item['title'])) { ?>
                                <div><strong><?php echo esc_attr($item['title']) ?></strong></div>
                            <?php } ?>
                            <?php if (!empty($item['text_body'])) { ?>
                                <div>
                                    <?php echo esc_attr(ATBS_StringHelper::truncate($item['text_body'], 100)) ?>
                                    <?php
                                    if (!empty($item['reply_comment'])) {
                                        echo '<p style="border-left: 1px solid #ccc;padding-left:5px; margin-top:5px;  margin-left:10px;">' . esc_attr($item['reply_comment']) . '</p>';
                                    }
                                    ?>
                                </div>
                            <?php } ?>
                            <?php if (!empty($item['url']) && $item['record_type'] == ATBS_Content::RECORD_TYPE_VIDEO) { ?>
                                <div><a href="<?php echo esc_attr($item['url']) ?>" target="_blank"><?php echo esc_attr($item['url']) ?></a></div>
                            <?php } ?>
                            <?php if (!empty($item['rating'])) { ?>
                                <div>
                                    <?php echo esc_attr(ATBS_Widgets::atbs_get_star_rating_widget($item['rating'])) ?>
                                </div>
                            <?php } ?>
                            <?php
                            if (!empty($item['custom'])) {
                                foreach ($item['custom'] as $custom)
                                    if (!empty($custom['value'])) {
                                        ?>
                                        <strong><?php echo esc_attr($custom['title']) ?></strong>: <?php echo esc_attr($custom['value']) ?><br/>
                                        <?php
                                    }
                            }
                            ?>
                            <hr/>
                            <div class="vocalreferences-source">
                                <span class="vocalreferences-source-title"><?php esc_html_e('Source:', 'a-testimonial-builder'); ?></span>
                                <?php if ($item['source'] == 'csv') { ?>
                                    <span class="vocalreferences-source-icon">
                                        <img src="<?php echo esc_url(ATBS_URL) ?>assets/images/csv_icon.png" style="width:16px;height:auto;" class="small-icon"/>
                                    </span>
                                <?php } ?>
                                <?php if ($item['source'] == 'facebook') { ?>
                                    <span class="vocalreferences-source-icon">
                                        <img src="<?php echo esc_url(ATBS_URL) ?>assets/images/facebook_icon.png" style="width:16px;height:auto;" class="small-icon"/>
                                    </span>
                                <?php } ?>
                                <?php if ($item['source'] == 'google') { ?>
                                    <span class="vocalreferences-source-icon">
                                        <img src="<?php echo esc_url(ATBS_URL) ?>assets/images/google_my_business_icon.png" style="width:16px;height:auto;" class="small-icon"/>
                                    </span>
                                <?php } ?>
                                <?php if ($item['source'] == 'yelp') { ?>
                                    <span class="vocalreferences-source-icon">
                                        <img src="<?php echo esc_url(ATBS_URL) ?>assets/images/yelp_icon.png" style="width:16px;height:auto;" class="small-icon"/>
                                    </span>
                                <?php } ?>
                                <?php if (!in_array($item['source'], ['csv', 'facebook', 'google', 'yelp'])) { ?>
                                    <span class="vocalreferences-source-icon">
                                        <img src="<?php echo esc_url(ATBS_URL) ?>assets/images/logo_small.png"  style="width:18px;height:auto;" class="small-icon"/>
                                    </span>
                                <?php } ?>
                                <div class="reply-block" style=""><a href="#" class="vocalreferences-btn-reply" data-id="<?php echo esc_attr($item['id']) ?>"><span class="dashicons dashicons-undo"></span><?php esc_html_e('Reply', 'a-testimonial-builder'); ?></a></div>
                            </div>
                        </td>
                        <td class="button-column" style="text-align: center;">
                            <?php if ($item['added_by_customer'] == ATBS_Content::ADDED_BY_CUSTOMER_APPROVED) { ?>
                                <span>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input vocalreferences-btn-visible" <?php echo esc_attr($item['visible'] ? 'checked' : ''); ?> id="visible<?php echo esc_attr($item['id']) ?>" name="item[visible][]" value="<?php echo esc_attr($item['id']) ?>" title="<?php esc_html_e('Visible', 'a-testimonial-builder'); ?>">
                                        <label class="custom-control-label" for="visible<?php echo esc_attr($item['id']) ?>"></label>
                                    </div>
                                </span>
                            <?php } ?>
                        </td>
                        <td class="button-column" style="text-align: center;">
                            <?php if ($item['added_by_customer'] == ATBS_Content::ADDED_BY_CUSTOMER_NOT_APPROVED) { ?>
                                <a class="btn btn-default btn-sm vocalreferences-btn-approve" href="#" data-id="<?php echo esc_attr($item['id']) ?>" title="<?php esc_html_e('Approve', 'a-testimonial-builder'); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                    </svg>
                                </a>
                            <?php } ?>
                            <a class="btn btn-success btn-sm vocalreferences-btn-edit" href="#" data-id="<?php echo esc_attr($item['id']) ?>" title="<?php esc_html_e('Edit:', 'a-testimonial-builder'); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </a>
                            <a class="btn btn-danger btn-sm vocalreferences-btn-delete" href="#" data-id="<?php echo esc_attr($item['id']) ?>" title="<?php esc_html_e('Delete:', 'a-testimonial-builder'); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="4"><?php esc_html_e('No new testimonials have arrived.', 'a-testimonial-builder'); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php esc_html_e('Reply', 'a-testimonial-builder'); ?></h5>
                    <button type="button" data-dismiss="modal" aria-label="Close">
                        &times;
                    </button>
                </div>
                <form id="reply-form" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label><?php esc_html_e('Comment', 'a-testimonial-builder'); ?></label>
                            <textarea rows="5" name="Content[reply_comment]" id="content_reply_comment" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal"><?php esc_html_e('Close', 'a-testimonial-builder'); ?></button>
                        <button type="button" class="btn btn-primary font-weight-bold vocalreferences-btn-reply-save" ><?php esc_html_e('Save', 'a-testimonial-builder'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>