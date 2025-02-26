<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
if( $FAQschema != '' ){?>
<div class="toggle-sidebar">
    <label class="mb-2 d-flex gap-3  ">
        <span class="labelHeading d-block"><?php esc_html_e("FAQ's Markup Schema", 'addlly'); ?></span>
        <span class="svgCopy">
            <div class="copy">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none" class="injected-svg" data-src="<?php echo esc_url(ADDLLY_URL); ?>/assets/images/copyIcon.svg" xmlns:xlink="http://www.w3.org/1999/xlink" role="img">
                        <path d="M11.8323 0H5.11034C4.13392 0 3.3395 0.794414 3.3395 1.77083V1.98817H2.16829C1.19188 1.98817 0.397461 2.78258 0.397461 3.759V14.2292C0.397461 15.2057 1.19188 16.0001 2.16829 16.0001H8.89028C9.86669 16.0001 10.661 15.2057 10.661 14.2292V14.0119H11.8322C12.8087 14.0119 13.6031 13.2175 13.6031 12.2411V1.77083C13.6032 0.794414 12.8087 0 11.8323 0ZM9.51883 14.2292C9.51883 14.5758 9.23684 14.8578 8.89035 14.8578H2.16829C1.82173 14.8578 1.53974 14.5758 1.53974 14.2292V3.75892C1.53974 3.41236 1.82173 3.13037 2.16829 3.13037H8.89028C9.23684 3.13037 9.51876 3.41236 9.51876 3.75892V14.2292H9.51883ZM12.4609 12.2411C12.4609 12.5876 12.1789 12.8696 11.8323 12.8696H10.6611V3.75892C10.6611 2.78251 9.86669 1.98809 8.89035 1.98809H4.48178V1.77075C4.48178 1.42419 4.76377 1.1422 5.11034 1.1422H11.8323C12.1789 1.1422 12.4609 1.42419 12.4609 1.77075V12.2411Z" fill="#0039FF"></path>
                    </svg>
                </div>
            </div>
        </span>
    </label>
    <div id="faqSchemaEditor"></div>
</div>
<?php
$inline_js = "jQuery(document).ready(function($) {
        var faq_editor = '';
        require.config({ paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.37.0/min/vs' }});
        require(['vs/editor/editor.main'], function() {
            faq_editor = monaco.editor.create(document.getElementById('faqSchemaEditor'), {
                value: js_beautify(JSON.stringify(". $FAQschema .", null, 2)),
                language: 'json',
                theme: 'vs-dark',
                height: '100%',
                minHeight: '100vh',
                className: 'editorMinHeight editorMinHeightHtml',
            });
            jQuery('#faqSchemaEditor').data('editor', faq_editor);
            faq_editor.onKeyUp(function(event) {
                var content = faq_editor.getValue();
                var faqSchema = JSON.parse(content);
                var editor_content = '';
                jQuery.each(faqSchema.mainEntity, function(index, item) {
                    editor_content += '<h2>'+ item.name +'</h2>';
                    editor_content += '<p>'+ item.acceptedAnswer.text +'</p>';
                });
                tinymce.get('textEditor').setContent(editor_content);
            });
            
            jQuery('.toggle-sidebar .svgCopy').click(function() {
                var content = faq_editor.getValue();
                var tempTextarea = jQuery('<textarea>');
                jQuery('body').append(tempTextarea);
                tempTextarea.val(content).select();
                document.execCommand('copy');
                tempTextarea.remove();
                toastr.success('Text has been copied to clipboard.', 'Success');

            });
        });
    });";
    wp_add_inline_script( 'addlly-custom-script', $inline_js );
?>
<?php }else{ ?>
    <div class="toggle-sidebar notContent"></div>
<?php } ?>
