<?php

namespace RankologyFno\Services\InternalLinking;


class RenderMetaboxInternalLinking {
    public function render($id) {


        

        $post = get_post($id);
        
        $content = rankology_fno_get_service('SignificantKeywords')->getFullContentByPost($post);

        $keywords = rankology_fno_get_service('SignificantKeywords')->retrieveSignificantKeywords($content);
        $data = rankology_fno_get_service('SignificantKeywords')->computeKeywords($keywords, $content, $id);

        ?>

        <script>
            document.addEventListener('DOMContentLoaded', function(){
                const $ = jQuery;
                $(".rankology-copy-clipboard").on("click", function(){
                    const value = $(this).data("copy-value");
                    const $temp = $("<input>");
                    $("body").append($temp);
                    $temp.val(value).select();
                    document.execCommand("copy");
                    $temp.remove();

                    $("#rankology-link-copied").fadeIn(200).delay(2000).fadeOut(200);
                });
            })

        </script>

        <p class="description-alt">
            <?php esc_html_e('Internal links are important for SEO and user experience. Always try to link your content together, with quality link anchors.', 'wp-rankology'); ?>
        </p>
        <p>
            <?php esc_html_e('Here is a list of articles related to your content, sorted by relevance, that you should link to.', 'wp-rankology'); ?>
        </p>
        <div style="display:none;" id="rankology-link-copied">
            <div class="rankology-notice is-info">
                <?php  esc_html_e("Link copied in the clipboard", "wp-rankology"); ?>
            </div>
        </div>
        <?php if(empty($data)): ?>
            <?php esc_html_e("No suggestion of internal links.", "wp-rankology"); ?>
        <?php endif; ?>

        <?php foreach($data as $key => $item): ?>
            <div style="display: flex; margin-bottom: 15px;">
                <span data-copy-value="<?php echo esc_attr($item['permalink']); ?>" class="dashicons dashicons-admin-page rankology-copy-clipboard" style="padding:5px; background: var(--borderColorLight40); border-radius: 4px; width:30px; height:30px; display:flex; align-items:center; line-height:30px; justify-content:center; cursor:pointer;"></span>
                <a
                    href=<?php echo esc_attr($item['permalink']); ?>
                    title="<?php esc_html_e(
                        "Open this link in a new window",
                        "wp-rankology"
                    ); ?>"
                    target="_blank"
                    style="margin-right:10px; margin-left:10px; line-height: 30px;"
                >
                    <?php echo esc_html($item['title']); ?>
                </a>
                <span class="dashicons dashicons-redo"></span>
                <a
                    href="<?php echo esc_attr($item['edit_link']); ?>"
                    target="_blank"
                    style="text-decoration: none;"
                    title="<?php esc_html_e(
                        "Edit this link in a new window",
                        "wp-rankology"
                    ); ?>"
                >
                    <span
                        class="dashicons dashicons-edit"
                    ></span>
                </a>
            </div>
        <?php
        endforeach;
    }
}
