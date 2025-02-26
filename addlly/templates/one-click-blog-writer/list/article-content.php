<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$postID = get_the_ID();
$article_id = get_post_meta($postID, 'article_id', true);
$topic = get_post_meta($postID, 'topic', true);
$meta_title = get_post_meta($postID, 'meta_title', true);
$aiType = get_post_meta($postID, 'aiType', true);
$istrainArticle = get_post_meta($postID, 'istrainArticle', true);
$isArchivedArticle = get_post_meta($postID, 'isArchivedArticle', true);

?>
<div class="tableRow">
    <div class="tableColumn">
        <div class="title">
            <?php the_title(); ?>
            <div class="desc"><?php echo esc_html($meta_title); ?></div>
        </div>
    </div>
    <div class="tableColumn">
        <div class="created_on"><?php echo get_the_date('d/m/Y H:i:s', $postID); ?></div>
    </div>
    <div class="tableColumn">
        <div class="ai_type"><?php echo esc_html($aiType); ?></div>
    </div>
    <div class="tableColumn">
        <div class="status d-flex">
            <div class="dotStatus">
                <span class="d-block" style="width: 8px; height: 8px; border-radius: 50%; background-color: rgb(132, 204, 22); margin-top: 7px;"></span>
            </div>
            <?php esc_html_e('Done', 'addlly'); ?>
        </div>
    </div>
    <?php if( $articles_type == 'train' ){ ?>
        <div class="tableColumn">
            <div class="request"><span class="untrain-btn" data-id="<?php echo absint($postID); ?>" data-type="untrain"><?php esc_html_e('UnTrain', 'addlly'); ?></span></div>
        </div>
    <?php }else{ ?>
        <div class="tableColumn">
            <div class="request">
                <?php if ($isArchivedArticle != 1) { ?>
                    <span class="refund-btn" data-article_id="<?php echo esc_attr($article_id); ?>"><?php esc_html_e('Refund', 'addlly'); ?></span>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
    <div class="tableColumn">
        <div class="popup">
            <button type="button" class="action-btn">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path></svg>
            </button>
            <ul class="action-list d-none">
                <?php if ($isArchivedArticle != 1) { ?>
                    <li>
                        <a href="javascript:void(0);" class="preview-btn" data-id="<?php echo absint($postID); ?>">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"></path><circle cx="256" cy="256" r="80" fill="none" stroke-miterlimit="10" stroke-width="32"></circle></svg>
                            <?php esc_html_e('Preview Article', 'addlly'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(wp_nonce_url(add_query_arg('id', $postID, admin_url('admin.php?page=one-click')), 'addlly_edit_article_nonce')); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none" class="injected-svg" data-src="/static/media/Pencil.178496ad7eeb62d330169877a022ede2.svg" xmlns:xlink="http://www.w3.org/1999/xlink" role="img">
                                <g id="Pencil" clip-path="url(#clip0_2968_7080-48)">
                                    <path id="Vector-49" d="M10.6276 0.1278C10.6682 0.0870568 10.7165 0.0547318 10.7697 0.0326762C10.8228 0.0106205 10.8798 -0.000732422 10.9373 -0.000732422C10.9949 -0.000732422 11.0519 0.0106205 11.105 0.0326762C11.1582 0.0547318 11.2064 0.0870568 11.2471 0.1278L13.8721 2.7528C13.9128 2.79344 13.9451 2.84172 13.9672 2.89487C13.9893 2.94802 14.0006 3.005 14.0006 3.06255C14.0006 3.1201 13.9893 3.17708 13.9672 3.23023C13.9451 3.28338 13.9128 3.33166 13.8721 3.3723L5.12208 12.1223C5.08009 12.164 5.03008 12.1967 4.97508 12.2185L0.60008 13.9685C0.520574 14.0004 0.433477 14.0082 0.349585 13.991C0.265693 13.9737 0.188697 13.9323 0.128141 13.8717C0.0675853 13.8112 0.0261335 13.7342 0.00892444 13.6503C-0.00828458 13.5664 -0.00049402 13.4793 0.0313303 13.3998L1.78133 9.0248C1.80314 8.9698 1.83589 8.91979 1.87758 8.8778L10.6276 0.1278ZM9.80596 2.18755L11.8123 4.19392L12.9437 3.06255L10.9373 1.05617L9.80596 2.18755ZM11.1937 4.81255L9.18733 2.80617L3.49983 8.49367V8.75005H3.93733C4.05336 8.75005 4.16464 8.79614 4.24669 8.87819C4.32874 8.96024 4.37483 9.07152 4.37483 9.18755V9.62505H4.81233C4.92836 9.62505 5.03964 9.67114 5.12169 9.75319C5.20374 9.83524 5.24983 9.94652 5.24983 10.0625V10.5H5.50621L11.1937 4.81255ZM2.65283 9.34067L2.56008 9.43342L1.22308 12.7768L4.56645 11.4398L4.6592 11.347C4.57575 11.3159 4.5038 11.2599 4.45298 11.1868C4.40216 11.1136 4.3749 11.0266 4.37483 10.9375V10.5H3.93733C3.8213 10.5 3.71002 10.454 3.62797 10.3719C3.54592 10.2899 3.49983 10.1786 3.49983 10.0625V9.62505H3.06233C2.97324 9.62498 2.88629 9.59772 2.81311 9.5469C2.73993 9.49608 2.68401 9.42413 2.65283 9.34067Z" fill="black"></path>
                                </g>
                                <defs>
                                    <clipPath id="clip0_2968_7080-48">
                                        <rect width="14" height="14" fill="white"></rect>
                                    </clipPath>
                                </defs>
                            </svg>
                            <?php esc_html_e('Edit', 'addlly'); ?>
                        </a>
                    </li>
                    <?php if ($istrainArticle != 1) { ?>
                        <li>
                            <a href="javascript:void(0);" class="train-btn" data-id="<?php echo absint($postID); ?>" data-type="train">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0z"></path><path d="M15.5 13.5c0 2-2.5 3.5-2.5 5h-2c0-1.5-2.5-3-2.5-5 0-1.93 1.57-3.5 3.5-3.5s3.5 1.57 3.5 3.5zm-2.5 6h-2V21h2v-1.5zm6-6.5c0 1.68-.59 3.21-1.58 4.42l1.42 1.42a8.978 8.978 0 00-1-12.68l-1.42 1.42A6.993 6.993 0 0119 13zm-3-8l-4-4v3a9 9 0 00-9 9c0 2.23.82 4.27 2.16 5.84l1.42-1.42A6.938 6.938 0 015 13c0-3.86 3.14-7 7-7v3l4-4z"></path></svg>
                                <?php esc_html_e('Use article for training', 'addlly'); ?>
                            </a>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="javascript:void(0);" class="archive-btn" data-id="<?php echo absint($postID); ?>" data-type="archive">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M20 3L22 7V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V7.00353L4 3H20ZM12 10L8 14H11V18H13V14H16L12 10ZM18.764 5H5.236L4.237 7H19.764L18.764 5Z"></path></svg>
                            <?php esc_html_e('Archive', 'addlly'); ?>
                        </a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a href="javascript:void(0);" class="archive-btn" data-id="<?php echo absint($postID); ?>" data-type="restore">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M20 3L22 7V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V7.00353L4 3H20ZM12 10L8 14H11V18H13V14H16L12 10ZM18.764 5H5.236L4.237 7H19.764L18.764 5Z"></path></svg>
                            <?php esc_html_e('Restore', 'addlly'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="delete-btn" data-id="<?php echo absint($postID); ?>">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1" viewBox="0 0 17 17" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><g></g><path d="M10.935 2.016c-0.218-0.869-0.999-1.516-1.935-1.516-0.932 0-1.71 0.643-1.931 1.516h-3.569v1h11v-1h-3.565zM9 1.5c0.382 0 0.705 0.221 0.875 0.516h-1.733c0.172-0.303 0.485-0.516 0.858-0.516zM13 4h1v10.516c0 0.827-0.673 1.5-1.5 1.5h-7c-0.827 0-1.5-0.673-1.5-1.5v-10.516h1v10.516c0 0.275 0.224 0.5 0.5 0.5h7c0.276 0 0.5-0.225 0.5-0.5v-10.516zM8 5v8h-1v-8h1zM11 5v8h-1v-8h1z"></path></svg>
                            <?php esc_html_e('Delete', 'addlly'); ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>