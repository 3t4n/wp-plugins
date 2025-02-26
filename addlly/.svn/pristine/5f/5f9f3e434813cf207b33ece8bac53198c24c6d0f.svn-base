<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$article         = addlly_get_article_by_id($id);
$article_data    = isset($article['data']) ? $article['data'] : array();
$FAQschema       = isset($article_data->FAQschema) ? wp_json_encode($article_data->FAQschema) : '';
$FAQHTML         = isset($article_data->FAQHTML) ? $article_data->FAQHTML : '';
?>
<div class="blog-writer-content-block">
    <?php
    set_query_var('id', $id);
    set_query_var('active_tab', $active_tab);
    addlly_get_template_part('one-click-blog-writer/edit/top-navbar');
    addlly_get_template_part('one-click-blog-writer/edit/metadata');
    addlly_get_template_part('one-click-blog-writer/edit/version-history');
    ?>
    <div class="content-area-block d-flex faqSchema">
        <div class="content-area position-relative">
            <?php
            if( $FAQHTML != '' ){
                echo '<div class="custom-text-editor">
                    <textarea id="textEditor">' . wp_kses_post($FAQHTML) . '</textarea>
                </div>';
                
                echo '<div class="textEditerArea html-content position-relative">';
                    echo '<div class="goBackBtn">';
                        echo '<button type="button" class="blogButton back border-0 mb-3">';
                            echo '<span>'. esc_html__('Go back to content', 'addlly') .'</span>';
                        echo '</button>';
                        echo '<button type="button" class="blogButton copyButton border-0 mb-3">'. esc_html__('Copy HTML', 'addlly') .'</button>';
                    echo '</div>';
                    echo '<div id="monaco-editor-container" style="height: 500px; width: 100%;"></div>';
                echo '</div>';
                
                $inline_js = "jQuery(document).ready(function($) {
                    var monaco_editor = '';
                    require.config({ paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.37.0/min/vs' }});
                    require(['vs/editor/editor.main'], function() {
                        monaco_editor = monaco.editor.create(document.getElementById('monaco-editor-container'), {
                            value: '',
                            language: 'html',
                            theme: 'vs-dark',
                            height: '900px',
                            minHeight: '100vh',
                            className: 'editorMinHeight editorMinHeightHtml',
                        });
                        jQuery('#monaco-editor-container').data('editor', monaco_editor);

                        monaco_editor.onKeyUp(function(event) {
                            var content = html_beautify(monaco_editor.getValue());
                            setTimeout(function() {
                                jQuery('#textEditor').tinymce().setContent(content);
                            }, 100);

                            var headingsAndParagraphs = getHeadingsAndParagraphs(content);
                            var schema = generateSchema(headingsAndParagraphs);
                            var editor = jQuery('#faqSchemaEditor').data('editor');
                            editor.setValue(JSON.stringify(schema, null, 2));
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
                
            }else{
                echo '<div class="custom-text-editor notContent"></div>';
            }
            ?>
        </div>
        <?php
        set_query_var('FAQschema', $FAQschema);
        addlly_get_template_part('one-click-blog-writer/edit/right-sidebar/faqs'); 
        ?>
    </div>
</div>