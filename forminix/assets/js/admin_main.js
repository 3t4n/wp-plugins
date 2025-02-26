/* =========== GLOBAL OPERATIONS ========== */

var forminix_current_form_id = "0" //93651428

function forminix_hide_all(){
    'use strict';
    jQuery("#forminix_forms").hide();
    jQuery("#forminix_settings").hide();
    jQuery("#forminix_entries").hide();
    jQuery("#forminix_entry").hide();
    jQuery("#forminix_builder").hide();
    jQuery(".forminix_forms_create_popup_container").css("display", "none");
    jQuery(".forminix_settings_integration_popup_container").css("display", "none");
}


function forminix_enable_tinymce(field_name){
    'use strict';
    var tinymce_plugins = 'textcolor,image,lists,link'
    if(tinymce.PluginManager.lookup.link === undefined){
        tinymce_plugins = 'textcolor,image,lists'
    }
    wp.editor.remove(field_name);
    wp.editor.initialize(field_name, {
        tinymce: {
            wpautop: true,
            plugins: tinymce_plugins,
            external_plugins: {
                'code': forminix_default_js_var.tinymce_code_plugin
            },
            toolbar1: 'formatselect,bold,italic,forecolor,removeformat,bullist,numlist,blockquote,alignleft,aligncenter,alignright,alignjustify,image,link,code',
            textarea_rows : 20
        }
    });
}


function forminix_admin_esc_string(str){
    'use strict';
    return str.replaceAll('&', '::forminix_amp::')
        .replaceAll('<', '::forminix_left_arrow::')
        .replaceAll('>', '::forminix_right_arrow::')
        .replaceAll('"', '::forminix_dbl_quote::')
        .replaceAll("'", '::forminix_sin_quote::')
        .replaceAll("`", '::forminix_grave::')
        .replaceAll("\\", '::forminix_backslash::');
}

function forminix_admin_unesc_string(str){
    'use strict';
    return str.replaceAll('::forminix_amp::', '&amp;')
        .replaceAll('::forminix_left_arrow::', '&lt;')
        .replaceAll('::forminix_right_arrow::', '&gt;')
        .replaceAll('::forminix_dbl_quote::', '&quot;')
        .replaceAll('::forminix_sin_quote::', "&#039;")
        .replaceAll('::forminix_grave::', "&#96;")
        .replaceAll('::forminix_backslash::', "&#92;");
}


function forminix_admin_codify_string(str){
    'use strict';
    return str.replaceAll('&amp;', '&')
        .replaceAll('&lt;', '<')
        .replaceAll('&gt;', '>')
        .replaceAll('&quot;', '"')
        .replaceAll('&#039;', "'")
        .replaceAll('&#96;', "`")
        .replaceAll('&#92;', "\\");
}

function forminix_admin_unesc_and_codify_string(str){
    'use strict';
    return str.replaceAll('::forminix_amp::', '&')
        .replaceAll('::forminix_left_arrow::', '<')
        .replaceAll('::forminix_right_arrow::', '>')
        .replaceAll('::forminix_dbl_quote::', '"')
        .replaceAll('::forminix_sin_quote::', "'")
        .replaceAll('::forminix_grave::', "`")
        .replaceAll('::forminix_backslash::', "\\");
}

function forminix_auto_linkify_string(inputText) {
    'use strict';
    var replacedText, replacePattern1, replacePattern2, replacePattern3;

    //URLs starting with http://, https://, or ftp://
    replacePattern1 = /(\b(https?|ftp):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/gim;
    replacedText = inputText.replace(replacePattern1, '<a href="$1" target="_blank">$1</a>');

    //URLs starting with "www." (without // before it, or it'd re-link the ones done above).
    replacePattern2 = /(^|[^\/])(www\.[\S]+(\b|$))/gim;
    replacedText = replacedText.replace(replacePattern2, '$1<a href="http://$2" target="_blank">$2</a>');

    //Change email addresses to mailto:: links.
    replacePattern3 = /(([a-zA-Z0-9\-\_\.])+@[a-zA-Z\_]+?(\.[a-zA-Z]{2,6})+)/gim;
    replacedText = replacedText.replace(replacePattern3, '<a href="mailto:$1">$1</a>');

    return replacedText;
}



function forminix_show_pro_popup(headline, details) {
    'use strict';
    if(headline === ""){
        headline = "Go Premium";
    }
    if(details === ""){
        details = "This feature is only available in the Pro Version";
    }
    jQuery(".forminix_pro_popup_container").css("display", "flex");
    jQuery(".forminix_pro_popup_container h3").text(headline);
    jQuery(".forminix_pro_popup_container p").text(details);
}
function forminix_close_pro_popup() {
    'use strict';
    jQuery(".forminix_pro_popup_container").css("display", "none");
}