<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$topic            = get_post_meta($id, 'topic', true);
$keyword          = get_post_meta($id, 'keyword', true);
$aiType           = get_post_meta($id, 'aiType', true);
$generated_topic  = get_post_meta($id, 'generated_topic', true);
$meta_title       = get_post_meta($id, 'meta_title', true);
$meta_dec         = get_post_meta($id, 'meta_dec', true);
?>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" aria-modal="true" role="dialog">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel"><?php esc_html_e("Blog's Metadata", "addlly"); ?></h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="blogMetaInner d-flex justify-content-between gap-2 align-items-end">
            <div class="textBlog">
                <p><?php esc_html_e("What do you want to write about?", "addlly"); ?></p>
                <span><?php echo esc_html($topic); ?></span>
            </div>
            <div class="copyIcon cursor-pointer">
                <img src="<?php echo esc_url(ADDLLY_URL); ?>/assets/images/copyIcon.svg" alt="copy" class="text-info" data-bs-toggle="tooltip" title="Copy" data-placement="bottom">
            </div>
        </div>
        <div class="blogMetaInner d-flex justify-content-between gap-2 align-items-end">
            <div class="textBlog">
                <p><?php esc_html_e("Keyword", "addlly"); ?></p>
                <span><?php echo esc_html($keyword); ?></span>
            </div>
            <div class="copyIcon cursor-pointer">
                <img src="<?php echo esc_url(ADDLLY_URL); ?>/assets/images/copyIcon.svg" alt="copy" class="text-info" data-bs-toggle="tooltip" title="Copy" data-placement="bottom">
            </div>
        </div>
        <div class="blogMetaInner d-flex justify-content-between gap-2 align-items-end">
            <div class="textBlog">
                <p><?php esc_html_e("AI Model", "addlly"); ?></p>
                <span><?php echo esc_html($aiType); ?></span>
            </div>
            <div class="copyIcon cursor-pointer">
                <img src="<?php echo esc_url(ADDLLY_URL); ?>/assets/images/copyIcon.svg" alt="copy" class="text-info" data-bs-toggle="tooltip" title="Copy" data-placement="bottom">
            </div>
        </div>
        <div class="offcanvas-header p-0 m-0 my-3"></div>
        <div class="blogMetaInner">
            <p>
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"></path>
                </svg>
                <?php esc_html_e("Headline generated", "addlly"); ?>
            </p>
            <span><?php echo esc_html($meta_title); ?></span>
        </div>
        <div class="blogMetaInner">
            <p>
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"></path>
                </svg>
                <?php esc_html_e("Meta title generated", "addlly"); ?>
            </p>
            <span><?php echo esc_html($meta_title); ?></span>
        </div>
        <div class="blogMetaInner">
            <p>
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"></path>
                </svg>
                <?php esc_html_e("Meta description generated", "addlly"); ?>
            </p>
            <span><?php echo esc_html($meta_dec); ?></span>
        </div>
    </div>
</div>