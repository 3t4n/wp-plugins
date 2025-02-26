jQuery(function($){

    /*Background style dropdown condition*/
    $("#nncd_page_bg_style").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")===""){
                $(".cmb-row.cmb-type-text-url.cmb2-id-nncd-page-bg-video.table-layout").hide();
                $(".cmb-row.cmb-type-file.cmb2-id-nncd-page-bg-image").hide();
                $(".cmb-row.cmb-type-colorpicker.cmb2-id-nncd-page-bg-color").hide();
            }
            else if($(this).attr("value")==="color"){
                $(".cmb-row.cmb-type-text-url.cmb2-id-nncd-page-bg-video.table-layout").hide();
                $(".cmb-row.cmb-type-file.cmb2-id-nncd-page-bg-image").hide();
                $(".cmb-row.cmb-type-colorpicker.cmb2-id-nncd-page-bg-color").show();
            }
            else if($(this).attr("value")==="image"){
                $(".cmb-row.cmb-type-text-url.cmb2-id-nncd-page-bg-video.table-layout").hide();
                $(".cmb-row.cmb-type-file.cmb2-id-nncd-page-bg-image").show();
                $(".cmb-row.cmb-type-colorpicker.cmb2-id-nncd-page-bg-color").hide();
            }
            else if($(this).attr("value")==="video"){
                $(".cmb-row.cmb-type-text-url.cmb2-id-nncd-page-bg-video.table-layout").show();
                $(".cmb-row.cmb-type-file.cmb2-id-nncd-page-bg-image").hide();
                $(".cmb-row.cmb-type-colorpicker.cmb2-id-nncd-page-bg-color").hide();
            }
        });
    }).change();


    /* Filter Layout Option*/
    $("#nncd_page_layout_cd_style").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")==="layout-1"){
                $(".cmb-row.cmb-type-oembed.cmb2-id-nncd-page-item-video").hide();
                $(".cmb-row.cmb-type-file-list.cmb2-id-nncd-page-item-slider").hide();
                $(".cmb-row.cmb-type-text.cmb2-id-nncd-item-1-name.table-layout").hide();
                $(".cmb-row.cmb-type-textarea.cmb2-id-nncd-item-1-description").hide();
                $(".cmb-row.cmb-type-select.cmb2-id-nncd-item-1-icon").hide();
                $(".cmb-row.cmb-type-text.cmb2-id-nncd-item-2-name.table-layout").hide();
                $(".cmb-row.cmb-type-file.cmb2-id-nncd-item-2-image").hide();
                $(".cmb-row.cmb-type-textarea.cmb2-id-nncd-item-2-description").hide();
                $(".cmb-row.cmb-type-select.cmb2-id-nncd-item-2-icon").hide();
                $(".cmb-row.cmb-type-text.cmb2-id-nncd-item-3-name.table-layout").hide();
                $(".cmb-row.cmb-type-file.cmb2-id-nncd-item-3-image").hide();
                $(".cmb-row.cmb-type-textarea.cmb2-id-nncd-item-3-description").hide();
                $(".cmb-row.cmb-type-select.cmb2-id-nncd-item-3-icon").hide();
                $(".cmb-row.cmb-type-file.cmb2-id-nncd-item-1-image").show();
            }
            else if($(this).attr("value")==="layout-2"){
                $(".cmb-row.cmb-type-oembed.cmb2-id-nncd-page-item-video").hide();
                $(".cmb-row.cmb-type-file-list.cmb2-id-nncd-page-item-slider").hide();
                $(".cmb-row.cmb-type-text.cmb2-id-nncd-item-1-name.table-layout").show();
                $(".cmb-row.cmb-type-textarea.cmb2-id-nncd-item-1-description").show();
                $(".cmb-row.cmb-type-select.cmb2-id-nncd-item-1-icon").hide();
                $(".cmb-row.cmb-type-text.cmb2-id-nncd-item-2-name.table-layout").show();
                $(".cmb-row.cmb-type-file.cmb2-id-nncd-item-2-image").show();
                $(".cmb-row.cmb-type-textarea.cmb2-id-nncd-item-2-description").show();
                $(".cmb-row.cmb-type-select.cmb2-id-nncd-item-2-icon").hide();
                $(".cmb-row.cmb-type-text.cmb2-id-nncd-item-3-name.table-layout").show();
                $(".cmb-row.cmb-type-file.cmb2-id-nncd-item-3-image").show();
                $(".cmb-row.cmb-type-textarea.cmb2-id-nncd-item-3-description").show();
                $(".cmb-row.cmb-type-select.cmb2-id-nncd-item-3-icon").hide();
                $(".cmb-row.cmb-type-file.cmb2-id-nncd-item-1-image").show();
            }
            else if($(this).attr("value")==="layout-3"){
                $(".cmb-row.cmb-type-oembed.cmb2-id-nncd-page-item-video").show();
                $(".cmb-row.cmb-type-file-list.cmb2-id-nncd-page-item-slider").hide();
                $(".cmb-row.cmb-type-text.cmb2-id-nncd-item-1-name.table-layout").show();
                $(".cmb-row.cmb-type-textarea.cmb2-id-nncd-item-1-description").show();
                $(".cmb-row.cmb-type-select.cmb2-id-nncd-item-1-icon").hide();
                $(".cmb-row.cmb-type-text.cmb2-id-nncd-item-2-name.table-layout").show();
                $(".cmb-row.cmb-type-file.cmb2-id-nncd-item-2-image").hide();
                $(".cmb-row.cmb-type-textarea.cmb2-id-nncd-item-2-description").show();
                $(".cmb-row.cmb-type-select.cmb2-id-nncd-item-2-icon").hide();
                $(".cmb-row.cmb-type-text.cmb2-id-nncd-item-3-name.table-layout").show();
                $(".cmb-row.cmb-type-file.cmb2-id-nncd-item-3-image").hide();
                $(".cmb-row.cmb-type-textarea.cmb2-id-nncd-item-3-description").show();
                $(".cmb-row.cmb-type-select.cmb2-id-nncd-item-3-icon").hide();
                $(".cmb-row.cmb-type-file.cmb2-id-nncd-item-1-image").hide();
            }
            else if($(this).attr("value")==="layout-4"){
                $(".cmb-row.cmb-type-oembed.cmb2-id-nncd-page-item-video").hide();
                $(".cmb-row.cmb-type-file-list.cmb2-id-nncd-page-item-slider").show();
                $(".cmb-row.cmb-type-text.cmb2-id-nncd-item-1-name.table-layout").show();
                $(".cmb-row.cmb-type-textarea.cmb2-id-nncd-item-1-description").hide();
                $(".cmb-row.cmb-type-select.cmb2-id-nncd-item-1-icon").show();
                $(".cmb-row.cmb-type-text.cmb2-id-nncd-item-2-name.table-layout").show();
                $(".cmb-row.cmb-type-file.cmb2-id-nncd-item-2-image").hide();
                $(".cmb-row.cmb-type-textarea.cmb2-id-nncd-item-2-description").hide();
                $(".cmb-row.cmb-type-select.cmb2-id-nncd-item-2-icon").show();
                $(".cmb-row.cmb-type-text.cmb2-id-nncd-item-3-name.table-layout").show();
                $(".cmb-row.cmb-type-file.cmb2-id-nncd-item-3-image").hide();
                $(".cmb-row.cmb-type-textarea.cmb2-id-nncd-item-3-description").hide();
                $(".cmb-row.cmb-type-select.cmb2-id-nncd-item-3-icon").show();
                $(".cmb-row.cmb-type-file.cmb2-id-nncd-item-1-image").hide();
            }
            else if($(this).attr("value")===""){
                $(".cmb-row.cmb-type-oembed.cmb2-id-nncd-page-item-video").hide();
                $(".cmb-row.cmb-type-file-list.cmb2-id-nncd-page-item-slider").hide();
                $(".cmb-row.cmb-type-text.cmb2-id-nncd-item-1-name.table-layout").hide();
                $(".cmb-row.cmb-type-textarea.cmb2-id-nncd-item-1-description").hide();
                $(".cmb-row.cmb-type-select.cmb2-id-nncd-item-1-icon").hide();
                $(".cmb-row.cmb-type-text.cmb2-id-nncd-item-2-name.table-layout").hide();
                $(".cmb-row.cmb-type-file.cmb2-id-nncd-item-2-image").hide();
                $(".cmb-row.cmb-type-textarea.cmb2-id-nncd-item-2-description").hide();
                $(".cmb-row.cmb-type-select.cmb2-id-nncd-item-2-icon").hide();
                $(".cmb-row.cmb-type-text.cmb2-id-nncd-item-3-name.table-layout").hide();
                $(".cmb-row.cmb-type-file.cmb2-id-nncd-item-3-image").hide();
                $(".cmb-row.cmb-type-textarea.cmb2-id-nncd-item-3-description").hide();
                $(".cmb-row.cmb-type-select.cmb2-id-nncd-item-3-icon").hide();
                $(".cmb-row.cmb-type-file.cmb2-id-nncd-item-1-image").hide();
            }
        });
    }).change();
});