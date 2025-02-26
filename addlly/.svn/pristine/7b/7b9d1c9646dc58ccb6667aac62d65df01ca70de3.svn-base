<?php 
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$idd  = isset($idd) ? $idd : 0; 
?>
<div class="justify-content-end align-items-center offcanvas-header">
    <div class="buttons d-flex gap-2 align-items-center">
        <button class="btn delete-btn" data-id="<?php echo absint($idd); ?>">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"></path><path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"></path></svg>
        </button>
        <button class="btn copy-btn">
            <img src="<?php echo esc_url(ADDLLY_URL); ?>/assets/images/copyIcon.svg" alt="copy">
        </button>
        <a class="btn" href="<?php echo esc_url(add_query_arg( 'id', $idd, admin_url('admin.php?page=one-click') )); ?>">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"></path></svg>
        </a>
        <button class="btn full-preview">
            <svg class="full-preview" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M855 160.1l-189.2 23.5c-6.6.8-9.3 8.8-4.7 13.5l54.7 54.7-153.5 153.5a8.03 8.03 0 0 0 0 11.3l45.1 45.1c3.1 3.1 8.2 3.1 11.3 0l153.6-153.6 54.7 54.7a7.94 7.94 0 0 0 13.5-4.7L863.9 169a7.9 7.9 0 0 0-8.9-8.9zM416.6 562.3a8.03 8.03 0 0 0-11.3 0L251.8 715.9l-54.7-54.7a7.94 7.94 0 0 0-13.5 4.7L160.1 855c-.6 5.2 3.7 9.5 8.9 8.9l189.2-23.5c6.6-.8 9.3-8.8 4.7-13.5l-54.7-54.7 153.6-153.6c3.1-3.1 3.1-8.2 0-11.3l-45.2-45z"></path></svg>
        </button>
        <button class="btn small-preview d-none">
            <svg class="small-preview d-none" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0z"></path><path d="M22 3.41L16.71 8.7 20 12h-8V4l3.29 3.29L20.59 2 22 3.41zM3.41 22l5.29-5.29L12 20v-8H4l3.29 3.29L2 20.59 3.41 22z"></path></svg>
        </button>
        <button type="button" class="btn-close text-reset p-0" data-bs-dismiss="offcanvas"></button>
    </div>
</div>
<div class="p-0 overflow-hidden offcanvas-body">
    <div class="types">
        <div class="article-type blogInfo">
            <p><?php esc_html_e('Type', 'addlly'); ?></p>
            <span><?php esc_html_e('1-Click Blog Writer', 'addlly'); ?></span>
        </div>
        <div class="createdOn blogInfo">
            <p><?php esc_html_e('Generated On', 'addlly'); ?></p>
            <span><?php echo get_the_date('M d, Y H:i A', $idd); ?></span>
        </div>
        <div class="createdBy blogInfo">
            <p><?php esc_html_e('Created By', 'addlly'); ?></p>
            <span><?php echo esc_html(addlly_user_full_name()); ?></span>
        </div>
    </div>
    <div class="content mt-4 pe-2 " style="height: calc(-312px + 100vh);">
        <div class="textarea-article-html h-100 overflow-auto ">
            <?php 
            $article         = addlly_get_article_by_id($idd);
            $article_data    = isset($article['data']) ? $article['data'] : array();
            $articleContent  = isset($article_data->article_html) ? $article_data->article_html : '';
            echo wp_kses_post( $articleContent );
            ?>
        </div>
    </div>
</div>
        
        
    