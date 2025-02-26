<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>
<div class="genrateAiImages d-none">
    <div class="popupSideBar d-flex flex-column">
        <div class="headerTop d-flex justify-content-between align-items-center gap-3 w-100">
            <p class="m-0">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path><path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"></path></svg>
                <?php esc_html_e('Generate or Upload Image', 'addlly'); ?>
            </p>
            <button class="bg-white border-0 close-btn">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" stroke-width="2" d="M3,3 L21,21 M3,21 L21,3"></path></svg>
            </button>
        </div>
        <div class="genrateBlockImages d-flex flex-wrap w-100">
            <?php 
            set_query_var('id', $id);
            set_query_var('active_tab', $active_tab);
            addlly_get_template_part('one-click-blog-writer/edit/image-library/sidebar-tabs');
            addlly_get_template_part('one-click-blog-writer/edit/image-library/ai-generated-images');
            addlly_get_template_part('one-click-blog-writer/edit/image-library/ai_brand_images');
            addlly_get_template_part('one-click-blog-writer/edit/image-library/free-images');
            addlly_get_template_part('one-click-blog-writer/edit/image-library/uploaded-images');
            ?>
        </div>
    </div>
</div>