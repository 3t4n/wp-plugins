<?php


namespace rnpagebuilder\core\Managers\PreviewManager;


class PreviewManager
{
    public function GetPreviewURL()
    {
        $pageId=0;
        $pages=get_pages( array(
            'meta_key'   => 'aiopb_preview_page',
            'meta_value' => true,
        ));

        if(count($pages)==0)
        {
            $post = array(
                'post_content' => '[aiopbpreview]',
                'post_name' => __('Page Builder Preview'),
                'post_title' => __('Page Builder Preview'),
                'post_status' => 'publish',
                'post_type' => 'page',
                'ping_status' => 'closed',
                'comment_status' => 'closed',
                'meta_input' => array(
                    'aiopb_preview_page' => true
                )
            );
            $pageId = wp_insert_post($post);
        }else
        {
            $currentPage=$pages[0];
            if(strpos($currentPage->post_content,'[aiopbpreview]')===false)
            {
               wp_update_post(array(
                   'ID'=>$currentPage->ID,
                   'post_content'=>$currentPage->post_content.'[aiopbpreview]'
               ));
            }
            $pageId = $currentPage->ID;
        }

        return get_permalink($pageId);
    }

}