<?php 
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$article         = addlly_get_article_by_id($id);
$article_data    = isset($article['data']) ? $article['data'] : array();
$articleContent  = isset($article_data->article_html) ? $article_data->article_html : '';
$article_status  = get_post_meta($id, 'article_status', true);
if( $article_status == '' ){
    $article_status  = isset($article_data->status) ? $article_data->status : '';
    update_post_meta($id, 'article_status', $article_status);
}
$citationContent = get_post_meta($id, 'citationContent', true);
?>
<div class="blog-writer-content-block">
    <?php
    set_query_var('id', $id);
    set_query_var('active_tab', $active_tab);
    addlly_get_template_part('one-click-blog-writer/edit/top-navbar');
    addlly_get_template_part('one-click-blog-writer/edit/metadata');
    addlly_get_template_part('one-click-blog-writer/edit/version-history');
    ?>
    <div class="content-area-block d-flex article">
        <div class="content-area position-relative">
            <?php
                $articleEditorContent = $articleContent;
                if(isset($citationContent) && !empty($citationContent)){
                    foreach($citationContent as $data){
                        $articleEditorContent = str_replace($data['text'], $data['textWithUrl'], $articleEditorContent);
                    }
                }
                echo '<div class="custom-text-editor">
                    <textarea id="textEditor">' . wp_kses_post($articleEditorContent) . '</textarea>
                </div>
                <div class="textEditerArea html-content position-relative">
                    <div class="goBackBtn">
                        <button type="button" class="blogButton back border-0 mb-3">
                            <span>'. esc_html__('Go back to content', 'addlly') .'</span>
                        </button>
                        <button type="button" class="blogButton copyButton border-0 mb-3">'. esc_html__('Copy HTML', 'addlly') .'</button>
                    </div>
                    <div id="monaco-editor-container" style="height: 500px; width: 100%;"></div>
                </div>';
                echo '<div class="upload-image-tooltip">
                    <div class="arrow-content"></div>
                    <span class="d-flex align-items-center gap-2 cursor-pointer" onclick="openMediaLibraryForBlog()">
                      <i class="icon-images"></i> '. esc_html__('Change or Upload Image', 'addlly') .'
                    </span>
                </div>';
            ?>
        </div>
        <?php addlly_get_template_part('one-click-blog-writer/edit/right-sidebar/article'); ?>
    </div>
</div>
<?php addlly_get_template_part('one-click-blog-writer/edit/articleImages'); ?>
<?php $allowed_html = array(
    '*' => array(
        '*' => true,
    )
); ?>
<textarea id="article_html_content" class="d-none"><?php echo "<!DOCTYPE html>\n". wp_kses_post($articleContent); ?></textarea>
<?php $inline_js = "jQuery(document).ready(function($) {
    require.config({ paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.37.0/min/vs' }});
    require(['vs/editor/editor.main'], function() {
        var monaco_editor = monaco.editor.create(document.getElementById('monaco-editor-container'), {
            value: '',
            language: 'html',
            theme: 'vs-dark',
            height: '100%',
            minHeight: '100vh',
            className: 'editorMinHeight editorMinHeightHtml',
        });
        jQuery('#monaco-editor-container').data('editor', monaco_editor);

        monaco_editor.onKeyUp(function(event) {
            var content = monaco_editor.getValue();
            tinymce.get('textEditor').setContent(html_beautify(content));
            var content  = tinymce.get('textEditor').getContent({format: 'html'});
            var tempElement = jQuery('<div>').html(content);
            var h1Count = tempElement.find('h1').length;
            var h2Count = tempElement.find('h2').length;
            var h3Count = tempElement.find('h3').length;
            jQuery('.heading-counts .h1-count').text(h1Count);
            jQuery('.heading-counts .h2-count').text(h2Count);
            jQuery('.heading-counts .h3-count').text(h3Count);
            var textContent = tempElement.text();
            var wordCount = textContent.trim().split(/\s+/).length;
            jQuery('.heading-counts .word-counts').text(wordCount);
        });

        jQuery('.goBackBtn .copyButton').click(function() {
            var content = monaco_editor.getValue();
            var tempTextarea = jQuery('<textarea>');
            jQuery('body').append(tempTextarea);
            tempTextarea.val(content).select();
            document.execCommand('copy');
            tempTextarea.remove();
            toastr.success('HTML has been copied to clipboard.', 'Success');

        });
    });
});";
wp_add_inline_script( 'addlly-custom-script', $inline_js );
?>
