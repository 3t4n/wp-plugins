jQuery(document).ready(function () {
    
    jQuery('[data-bs-toggle="tooltip"]').tooltip();
    document.querySelectorAll('[data-tooltip-id="addlly-tooltip"]').forEach(function(element) {
        var tooltipText = element.getAttribute('data-tooltip-content');
        var placement = element.getAttribute('data-tooltip-place');
        var tooltip = document.createElement('div');
        tooltip.className = 'addlly-tooltip-content addlly-tooltip-' + placement;
        tooltip.textContent = tooltipText;
        element.appendChild(tooltip);
    });
    
    jQuery(document).on("click", "#co-pilot-form .btn-next", function () {
        var currentStepDiv = parseInt(jQuery(this).data('step'));
        var nextNum        = currentStepDiv + 1;
        jQuery(this).data('step', nextNum);
        
        var type = jQuery("#co-pilot-form input[name='type']:checked").val();
        jQuery("#co-pilot-form .type-field").addClass("hide");
        jQuery("#co-pilot-form ."+ type +"-field").removeClass("hide");
        
        jQuery("#co-pilot-form .step").addClass("hide");
        jQuery("#co-pilot-form .step-"+ nextNum).removeClass("hide");
        
        jQuery(this).text('Generate Links');
    });
    
    jQuery(document).on("change", ".addlly-form.one-click select[name='aiTypee']", function () {
        var v = jQuery(this).val();
        if(v == 'GPT 3.5'){
            jQuery(this).closest('.field-dropdown').find('.selectedOptions').remove();
        }else{
            jQuery(this).closest('.field-dropdown').append('<div class="selectedOptions"><span>Addlly suggests using <strong>GPT 3.5</strong></span></div>');
        }
    });
    
    jQuery(document).on("keyup", ".addlly-form.one-click .required", function () {
        var is_valid = true;
        jQuery(".addlly-form.one-click .required").each(function () {
            var val = jQuery(this).val();
            if (val === '') {
                is_valid = false;
            }
        });
        if(is_valid){
            jQuery('.btn-submit').removeAttr('disabled');
        }else{
            jQuery('.btn-submit').prop('disabled', 'disabled');
        }
    });
    
    jQuery(document).on("click", ".addlly-form.one-click .btn-submit", function () {
       
        var t = jQuery(this);
        var is_valid = true;
        jQuery(".addlly-form.one-click .required").each(function () {
            var val = jQuery(this).val();
            var title = jQuery(this).data('title');
            if (val === '') {
                is_valid = false;
                //jQuery(this).css('border', '1px solid red');
                //jQuery(this).closest('.field-group').find('.invalid').text(title+' is required');
            }else{
                //jQuery(this).css('border', '');
                //jQuery(this).closest('.field-group').find('.invalid').text('');
            }
        });
        
        is_valid = addlly_validate_blog_generation();
        if(is_valid){
            jQuery("#addlly_loader").show();
            t.prop('disabled', true);
            jQuery.ajax({
                url: addlly_vars.ajax_url,
                type: 'POST',
                data : 'action=addlly_generate_blog&'+ jQuery('.addlly-form.one-click').serialize(),
                dataType: "json",
                success: function (response) {
                    jQuery("#addlly_loader").hide();
                    if (response.type === 'success') {
                        window.location.href = response.redirectURL;
                    }else{
                        t.prop('disabled', false);
                        alert(response.msg);
                    }
                }
            });
            
        }
        return false;
    });
    
    jQuery(document).on("click", ".generatearticle-btn", function () {
       
        var t  = jQuery(this);
        var id = t.data('id');
        t.prop('disabled', true).find('span');
        jQuery("#addlly_loader").show();
        
        setTimeout(function() { jQuery("#addlly_loader").hide(); }, 5000);
        
        if( 1 == 2 ){
            jQuery.ajax({
                url: addlly_vars.ajax_url,
                type: 'POST',
                data : 'action=addlly_generate_article&id='+ id,
                dataType: "json",
                success: function (response) {
                    if (response.type === 'success') {
                        window.location.href = response.redirectURL;
                    }else{
                        t.prop('disabled', false);
                        alert(response.msg);
                    }
                }
            });
        }
    });
    
    
    jQuery(document).on("click", ".top-nav-items .versionHistory", function () {
        
        var id = jQuery(this).data('id');
        var type = jQuery(this).data('type');
        jQuery("#addlly_loader").show();
        
        jQuery('#versionHistory .filtersDropdown').removeClass('d-none');
        jQuery.ajax({
            url: addlly_vars.ajax_url,
            type: 'POST',
            data : 'action=addlly_get_version_history&id='+ id +'&type='+ type +'&sort_by=desc&filter_by=all' + '&nonce='+ addlly_vars.nonce,
            dataType: "json",
            success: function (response) {
                jQuery("#addlly_loader").hide();
                jQuery('#versionHistory .offcanvas-body').html(response.history_data);
                if( jQuery('#versionHistory .offcanvas-body .versionCards').length <= 0 ){
                    jQuery('#versionHistory .filtersDropdown').addClass('d-none');
                }
                var offcanvas = new bootstrap.Offcanvas(document.getElementById('versionHistory'));
                offcanvas.show();
            }
        });
    });
    
    jQuery(document).on("click", ".generatefaqschema-btn", function () {
        var t  = jQuery(this);
        var id = t.data('id');
        t.prop('disabled', true);
        jQuery("#addlly_loader").show();
        jQuery.ajax({
            url: addlly_vars.ajax_url,
            type: 'POST',
            data : 'action=addlly_generate_faqschema&id='+ id + '&nonce='+ addlly_vars.nonce,
            dataType: "json",
            success: function (response) {
                jQuery("#addlly_loader").hide();
                if (response.type === 'success') {
                    window.location.href = response.redirectURL;
                }else{
                    t.prop('disabled', false);
                    alert(response.msg);
                }
            }
        });
    });
    
    jQuery(document).on("click", ".googleAdCopy-btn", function () {
        var t  = jQuery(this);
        var id = t.data('id');
        t.prop('disabled', true);
        jQuery("#addlly_loader").show();
        jQuery.ajax({
            url: addlly_vars.ajax_url,
            type: 'POST',
            data : 'action=addlly_generate_googleAdCopy&id='+ id + '&nonce='+ addlly_vars.nonce,
            dataType: "json",
            success: function (response) {
                jQuery("#addlly_loader").hide();
                if (response.type === 'success') {
                    window.location.href = response.redirectURL;
                }else{
                    t.prop('disabled', false);
                    alert(response.msg);
                }
            }
        });
    });
    
    jQuery(document).on("click", ".generatesocial-btn", function () {
        var t  = jQuery(this);
        var id = t.data('id');
        var type = t.data('type');
        t.prop('disabled', true);
        jQuery("#addlly_loader").show();
        jQuery.ajax({
            url: addlly_vars.ajax_url,
            type: 'POST',
            data : 'action=addlly_generate_socialContent&id='+ id+ '&type='+ type + '&nonce='+ addlly_vars.nonce,
            dataType: "json",
            success: function (response) {
                jQuery("#addlly_loader").hide();
                if (response.type === 'success') {
                    window.location.href = response.redirectURL;
                }else{
                    t.prop('disabled', false);
                    alert(response.msg);
                }
            }
        });
    });
    
    jQuery(document).on("click", ".edit-one-click .generate-hashtag", function () {
        var t  = jQuery(this);
        var id = t.data('id');
        var type = t.data('type');
        t.prop('disabled', true);
        jQuery("#addlly_loader").show();
        jQuery.ajax({
            url: addlly_vars.ajax_url,
            type: 'POST',
            data : 'action=addlly_generate_hashtags&id='+ id+ '&type='+ type + '&nonce='+ addlly_vars.nonce,
            dataType: "json",
            success: function (response) {
                jQuery("#addlly_loader").hide();
                if (response.type === 'success') {
                    window.location.href = response.redirectURL;
                }else{
                    t.prop('disabled', false);
                    alert(response.msg);
                }
            }
        });
    });
    
    jQuery(document).on("click", ".media-layout .post-desc .more-btn, .mediaLayout .post-desc .more-btn", function () {
        if(jQuery(this).hasClass('active')){
            jQuery(this).closest('.post-desc').find('pre').removeAttr('style');
            jQuery(this).text('see more');
            jQuery(this).removeClass('active');
        }else{
            jQuery(this).closest('.post-desc').find('pre').css('display', 'block').css('padding-right', '0px');
            jQuery(this).text('show less');
            jQuery(this).addClass('active');
        }
    });
    
    jQuery(document).on("click", ".has-tags-block .hash-tag-post", function () {
        if(jQuery(this).hasClass('activeHash')){
            jQuery(this).removeClass('activeHash');
            var c = jQuery('.text-editor-block').html();
            jQuery('.text-editor-block').html(c.replace(' <span class="hash-tag-text">'+ jQuery(this).find('span').text() +'</span>', ''));
        }else{
            jQuery('.text-editor-block').append(' <span class="hash-tag-text">'+ jQuery(this).find('span').text() +'</span>');
            jQuery(this).addClass('activeHash');
        }
    });
    
    jQuery(document).on("click", "#regenrateModal .btn", function () {
        var id       = jQuery('button[data-bs-target="#regenrateModal"]').data('id');
        var type     = jQuery('button[data-bs-target="#regenrateModal"]').data('type');
        var feedback = jQuery('#regenrateModal textarea[name="feedback"]').val();
        
        jQuery("#addlly_loader").show();
        jQuery.ajax({
            url: addlly_vars.ajax_url,
            type: 'POST',
            data : 'action=addlly_regenerate_content&id='+ id +'&type='+ type +'&feedback='+ feedback + '&nonce='+ addlly_vars.nonce,
            dataType: "json",
            success: function (response) {
                jQuery("#addlly_loader").hide();
                if (response.type === 'success') {
                    window.location.href = response.redirectURL;
                }else{
                    alert(response.msg);
                }
            }
        });
    });
    
    jQuery(document).on("click", "#noteModal .btn", function () {
        var id                    = jQuery('button[data-bs-target="#noteModal"]').data('id');
        var type                  = jQuery('button[data-bs-target="#noteModal"]').data('type');
        var likeUsToLookAt        = jQuery('#noteModal select[name="likeUsToLookAt"]').val();
        var specifyLikeUsToLookAt = jQuery('#noteModal textarea[name="specifyLikeUsToLookAt"]').val();
        
        jQuery("#addlly_loader").show();
        jQuery.ajax({
            url: addlly_vars.ajax_url,
            type: 'POST',
            data : 'action=addlly_submit_article_for_review&id='+ id +'&type='+ type +'&likeUsToLookAt='+ likeUsToLookAt +'&specifyLikeUsToLookAt='+ specifyLikeUsToLookAt + '&nonce='+ addlly_vars.nonce,
            dataType: "json",
            success: function (response) {
                jQuery("#addlly_loader").hide();
                if (response.type === 'success') {
                    window.location.href = response.redirectURL;
                }else{
                    alert(response.msg);
                }
            }
        });
    });
    
    jQuery(document).on("click", ".reviewArticle .comment-header-btn .btn", function () {
        var t = jQuery(this);
        jQuery(".reviewArticle .comment-header-btn .btn").removeClass('active');
        t.addClass('active');
        
        var id = t.data('id');
        var article_id = t.data('article_id');
        var type = t.data('type');
        
        jQuery("#addlly_loader").show();
        jQuery.ajax({
            url: addlly_vars.ajax_url,
            type: 'POST',
            data : 'action=addlly_get_review_article_comments&article_id='+ article_id +'&type='+ type +'&id='+ id + '&nonce='+ addlly_vars.nonce,
            dataType: "json",
            success: function (response) {
                jQuery("#addlly_loader").hide();
                if (response.type === 'success') {
                    jQuery(".reviewArticle .sidebar-comment-wrapper .sidebar-comments-list").html(response.comments_list);
                }else{
                    alert(response.msg);
                }
            }
        });
        
    });
    
    jQuery(document).on("click", ".reviewArticle .custom-tooltip span", function () {
        jQuery('.reviewArticle .custom-tooltip').html('<div class="arrow-content"></div>\
        <div class="comment-form-wrapper">\
            <div class="addllyFormWrap">\
                <div class="form-group mb-3">\
                    <textarea name="comment" type="text" rows="4" placeholder="Add Comment" class="addllyForm-control rounded-2 px-3 h-auto"></textarea>\
                    <textarea name="selectedText" class="d-none"></textarea>\
                </div>\
                <div class="d-flex justify-content-between mb-2">\
                    <div class="user-info d-flex align-items-center">\
                        <div class="avatar text-white">T</div>\
                    </div>\
                    <div class="d-flex align-items-center gap-2">\
                        <button class="addlly-outline" type="button">Close</button>\
                        <button class="addlly-primary" type="button" disabled="">Submit</button>\
                    </div>\
                </div>\
            </div>\
        </div>');
    });
    
    jQuery(document).on("click", ".reviewArticle .custom-tooltip .addlly-outline", function () {
        jQuery('.reviewArticle .custom-tooltip').html('<div class="arrow-content"></div>\
        <span class="d-flex align-items-center gap-2 cursor-pointer text-nowrap">\
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">\
                <path d="M123.6 391.3c12.9-9.4 29.6-11.8 44.6-6.4c26.5 9.6 56.2 15.1 87.8 15.1c124.7 0 208-80.5 208-160s-83.3-160-208-160S48 160.5 48 240c0 32 12.4 62.8 35.7 89.2c8.6 9.7 12.8 22.5 11.8 35.5c-1.4 18.1-5.7 34.7-11.3 49.4c17-7.9 31.1-16.7 39.4-22.7zM21.2 431.9c1.8-2.7 3.5-5.4 5.1-8.1c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208s-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6c-15.1 6.6-32.3 12.6-50.1 16.1c-.8 .2-1.6 .3-2.4 .5c-4.4 .8-8.7 1.5-13.2 1.9c-.2 0-.5 .1-.7 .1c-5.1 .5-10.2 .8-15.3 .8c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4c4.1-4.2 7.8-8.7 11.3-13.5c1.7-2.3 3.3-4.6 4.8-6.9c.1-.2 .2-.3 .3-.5z"></path>\
            </svg>\
            Add Comment\
        </span>');
        jQuery('.reviewArticle .custom-tooltip').css('display', 'none');
    });
    
    jQuery(document).on("input", ".reviewArticle .custom-tooltip textarea[name='comment']", function () {
        if( jQuery(this).val() != '' ){
            jQuery('.reviewArticle .custom-tooltip').find('.addlly-primary').removeAttr('disabled');
        }else{
            jQuery('.reviewArticle .custom-tooltip').find('.addlly-primary').prop('disabled', 'disabled');
        }
    });
    
    jQuery(document).on("input", ".reviewArticle .comment-modal textarea[name='reply']", function () {
        if( jQuery(this).val() != '' ){
            jQuery('.reviewArticle .comment-modal').find('.addlly-primary').removeAttr('disabled');
        }else{
            jQuery('.reviewArticle .comment-modal').find('.addlly-primary').prop('disabled', 'disabled');
        }
    });
    
    jQuery(document).on("click", ".reviewArticle .custom-tooltip .addlly-primary", function () {
        var id       = jQuery('.reviewArticle .custom-tooltip').data('id');
        var type     = jQuery('.reviewArticle .custom-tooltip').data('type');
        var comment = jQuery('.reviewArticle .custom-tooltip textarea[name="comment"]').val();
        var selectedText = jQuery('.reviewArticle textarea[name="selectedText"]').val();
        
        jQuery("#addlly_loader").show();
        jQuery.ajax({
            url: addlly_vars.ajax_url,
            type: 'POST',
            data : 'action=addlly_add_review_article_comment&id='+ id +'&type='+ type +'&comment='+ comment +'&selectedText='+ selectedText + '&nonce='+ addlly_vars.nonce,
            dataType: "json",
            success: function (response) {
                jQuery("#addlly_loader").hide();
                if (response.type === 'success') {
                    window.location.href = response.redirectURL;
                }else{
                    alert(response.msg);
                }
            }
        });
    });
    
    jQuery(document).on("click", ".reviewArticle .comment-modal .addlly-primary", function () {
        var comment_id    = jQuery(this).data('comment_id');
        var reply         = jQuery('.reviewArticle .comment-modal textarea[name="reply"]').val();
        
        jQuery("#addlly_loader").show();
        jQuery.ajax({
            url: addlly_vars.ajax_url,
            type: 'POST',
            data : 'action=addlly_add_review_article_comment_reply&parentCommentId='+ comment_id +'&reply='+ reply + '&nonce='+ addlly_vars.nonce,
            dataType: "json",
            success: function (response) {
                jQuery("#addlly_loader").hide();
                jQuery('.reviewArticle .comment-header-btn button[data-type="all"]').click();
                jQuery('.reviewArticle .comment-modal').css('display', 'none');
            }
        });
    });
    
    jQuery(document).on("click", ".reviewArticle .sidebar-comments-list .comment-div, .reviewArticle .sidebar-comments-list .replies-label", function () {
        var t = jQuery(this);
        var id = t.closest('.comment-form-history').data('id');
        var comment_id = t.closest('.comment-form-history').data('comment_id');
        var divTopPosition = t.offset().top;
        divTopPosition = Number(divTopPosition) - 110;
        
        jQuery("#addlly_loader").show();
        jQuery.ajax({
            url: addlly_vars.ajax_url,
            type: 'POST',
            data : 'action=addlly_review_article_comment_reply&id='+ id +'&comment_id='+ comment_id + '&nonce='+ addlly_vars.nonce,
            dataType: "json",
            success: function (response) {
                jQuery("#addlly_loader").hide();
                jQuery('.reviewArticle .comment-modal').html(response.reply_content);
                jQuery('.reviewArticle .comment-modal').css('display', 'block');
                jQuery('.reviewArticle .comment-modal').css('top', ''+ divTopPosition +'px');
                jQuery('.reviewArticle .comment-modal').css('left', '554px');
            }
        });
        
        
    });
    
    jQuery(document).on("click", ".reviewArticle .comment-modal .addlly-outline", function () {
        jQuery('.reviewArticle .comment-modal').css('display', 'none');
    });
    
    jQuery(document).on("click", ".reviewArticle .delete-btn, .reviewArticle .resolved-btn, .reviewArticle .restore-btn", function () {
        var t = jQuery(this);
        var id = t.data('id');
        var comment_id = t.data('comment_id');
        var type = t.data('type');
        var text = t.data('text');
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to proceed?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: text,
            cancelButtonText: 'No',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                jQuery("#addlly_loader").show();
                    jQuery.ajax({
                    url: addlly_vars.ajax_url,
                    type: 'POST',
                    data : 'action=addlly_comment_actions&comment_id='+ comment_id +'&id='+ id +'&type='+ type + '&nonce='+ addlly_vars.nonce,
                    dataType: "json",
                    success: function (response) {
                        jQuery("#addlly_loader").hide();
                        jQuery('.reviewArticle .comment-header-btn button[data-type="all"]').click();
                        jQuery('.reviewArticle .comment-modal').css('display', 'none');
                    }
                });
            }
        });
    });
    
    jQuery(document).on("click", ".top-nav-items #savereviewArticle", function () {
        var t = jQuery(this);
        var id = t.data('id');
        var type = t.data('type');
        var content  = tinymce.get('textEditor').getContent({format: 'html'});
        
        jQuery("#addlly_loader").show();
        jQuery.ajax({
            url: addlly_vars.ajax_url,
            type: 'POST',
            data : 'action=addlly_save_review_article&id='+ id +'&type='+ type + '&content='+ html_beautify(content) + '&nonce='+ addlly_vars.nonce,
            dataType: "json",
            success: function (response) {
                jQuery("#addlly_loader").hide();
                if (response.type === 'success') {
                    window.location.href = response.redirectURL;
                }else{
                    alert(response.msg);
                }
            }
        });
    });
    
    jQuery(document).on("click", ".top-nav-items .train-btn", function () {
        var t = jQuery(this);
        var id = t.data('id');
        var type = t.data('type');
        
        Swal.fire({
            title: 'Are you sure?',
            text: type == 'train' ? "Do you want to train the article for 1-Click Blog?" : "Do you want to unTrain the article for 1-Click Blog?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: type == 'train' ? 'Use article for training' : 'Remove article for training',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                jQuery("#addlly_loader").show();
                jQuery.ajax({
                    url: addlly_vars.ajax_url,
                    type: 'POST',
                    data : 'action=addlly_train_article&id='+ id +'&type='+ type + '&nonce='+ addlly_vars.nonce,
                    dataType: "json",
                    success: function (response) {
                        jQuery("#addlly_loader").hide();
                        if (response.type === 'success') {
                            window.location.href = response.redirectURL;
                        }else{
                            alert(response.msg);
                        }
                    }
                });
            }
        });
    });
    
    
    jQuery(document).on("click", ".citation-btn", function () {
        var id       = jQuery(this).data('id');
        var type     = jQuery(this).data('type');
        
        jQuery("#addlly_loader").show();
        jQuery.ajax({
            url: addlly_vars.ajax_url,
            type: 'POST',
            data : 'action=addlly_auto_citation&id='+ id +'&type='+ type + '&nonce='+ addlly_vars.nonce,
            dataType: "json",
            success: function (response) {
                jQuery("#addlly_loader").hide();
                if (response.type === 'success') {
                    window.location.href = response.redirectURL;
                }else{
                    alert(response.msg);
                }
            }
        });
    });
    
    jQuery(document).on("click", ".save-btn", function () {
        var id       = jQuery(this).data('id');
        var type     = jQuery(this).data('type');
        
        var data = 'action=addlly_save_article&id='+ id +'&type='+ type + '&nonce='+ addlly_vars.nonce;
        if( type == 'article' || type == 'faqSchema' ){
            
            if(jQuery('.custom-text-editor').hasClass('d-none')){
                var editor = jQuery('#monaco-editor-container').data('editor');
                tinymce.get('textEditor').setContent(html_beautify(editor.getValue()));
                var content  = tinymce.get('textEditor').getContent({format: 'html'});
                data += '&content='+ encodeURIComponent(content);
            }else{
                var content  = tinymce.get('textEditor').getContent({format: 'html'});
                data += '&content='+ encodeURIComponent(content);
            }
            
            if( type == 'faqSchema' ){
                var editor = jQuery('#faqSchemaEditor').data('editor');
                var value = editor.getValue();
                data += '&FAQschema='+ value;
            }
        }
        if( type == 'linkedIn' || type == 'facebook' || type == 'twitter' || type == 'instagram' ){
            data += '&content='+ jQuery('.content-area .text-editor-block').html();
        }
        
        jQuery("#addlly_loader").show();
        jQuery.ajax({
            url: addlly_vars.ajax_url,
            type: 'POST',
            data : data,
            dataType: "json",
            contentType: 'application/x-www-form-urlencoded',
            success: function (response) {
                jQuery("#addlly_loader").hide();
                if (response.type === 'success') {
                    jQuery("#savedModal").modal('show');
                    //window.location.href = response.redirectURL;
                }else{
                    alert(response.msg);
                }
            }
        });
        
    });
    
    jQuery(document).on("click", "#savedModal .stay-btn", function () {
        location.reload();
    });
    
    jQuery(document).on("click", "#savedModal .go-btn", function () {
        window.location.href = jQuery(this).data('url');
    });
    
    jQuery(document).on("keyup", ".content-area .text-editor-block", function () {
        var socialContent = jQuery(".content-area .text-editor-block").html();
        
        jQuery('.toggle-sidebar pre').html( socialContent );
        if( socialContent == '' ){
            jQuery('.top-nav-items .save-btn').prop('disabled', true);
            jQuery('#social-media-view .posted-text').addClass('not-content');
        }else{
            jQuery('.top-nav-items .save-btn').prop('disabled', false);
            jQuery('#social-media-view .posted-text').removeClass('not-content');
        }
    });
    
    jQuery(document).on("click", ".content-area .top-header-bar .copy-btn", function () {
        var postContent = jQuery(".content-area .text-editor-block").html();
        var beautifiedContent = html_beautify(postContent);
        function listener(e) {
            e.clipboardData.setData("text/html", beautifiedContent);
            e.clipboardData.setData("text/plain", beautifiedContent);
            e.preventDefault();
        }
        document.addEventListener("copy", listener);
        document.execCommand("copy");
        document.removeEventListener("copy", listener);
        toastr.success('Text has been copied to clipboard.', 'Success');
    });
    
    jQuery(document).on("click", ".editableTextArea.googleAdCopy .copy-textarea-btn", function () {
        var postContent = jQuery(".editableTextArea.googleAdCopy .custom-textarea-editor").html();
        var beautifiedContent = html_beautify(postContent);
        function listener(e) {
            e.clipboardData.setData("text/html", beautifiedContent);
            e.clipboardData.setData("text/plain", beautifiedContent);
            e.preventDefault();
        }
        document.addEventListener("copy", listener);
        document.execCommand("copy");
        document.removeEventListener("copy", listener);
        toastr.success('Text has been copied to clipboard.', 'Success');
    });
    
    jQuery(document).on("click", ".blogMetaInner .copyIcon", function () {
        var txt = jQuery(this).closest('.blogMetaInner').find('.textBlog span').text();
        function listener(e) {
            e.clipboardData.setData("text/html", txt);
            e.clipboardData.setData("text/plain", txt);
            e.preventDefault();
        }
        document.addEventListener("copy", listener);
        document.execCommand("copy");
        document.removeEventListener("copy", listener);
        toastr.success('Text has been copied to clipboard.', 'Success');
    });
    
    jQuery(document).on("click", ".refund-button", function () {
        jQuery('#refundModal input[name="refund_id"]').val(jQuery(this).data('refund_id'));
        jQuery('#refundModal input[name="article_id"]').val(jQuery(this).data('article_id'));
        jQuery('#refundModal input[name="subtype"]').val(jQuery(this).data('subtype'));
        jQuery('#refundModal').modal('show');
    });

    jQuery(document).on("input", "#refundModal textarea[name='comment']", function () {
        if( jQuery(this).val() != '' ){
            jQuery('#refundModal').find('.addlly-primary').removeAttr('disabled');
        }else{
            jQuery('#refundModal').find('.addlly-primary').prop('disabled', 'disabled');
        }
    });
    
    jQuery(document).on("click", "#refundModal .addlly-primary", function () {
        
        var refund_id     = jQuery('#refundModal input[name="refund_id"]').val();
        var article_id    = jQuery('#refundModal input[name="article_id"]').val();
        var subtype       = jQuery('#refundModal input[name="subtype"]').val();
        var comment       = jQuery('#refundModal textarea[name="comment"]').val();
        
        jQuery("#addlly_loader").show();
        jQuery.ajax({
            url: addlly_vars.ajax_url,
            type: 'POST',
            data : 'action=addlly_send_refund_request&refund_id='+ refund_id +'&article_id=' + article_id +'&subtype='+ subtype +'&comment='+ comment + '&nonce='+ addlly_vars.nonce,
            dataType: "json",
            success: function (response) {
                jQuery("#addlly_loader").hide();
                if (response.type === 'success') {
                    window.location.href = response.redirectURL;
                }else{
                    alert(response.msg);
                }
            }
        });
    });
    
    jQuery(document).on("click", "#refundModal .close-btn", function () {
        jQuery('#refundModal').modal('hide');
    });
    
    jQuery(document).on("click", ".articles-list .refund-btn", function () {
        var article_id = jQuery(this).data('article_id');
        jQuery("#addlly_loader").show();
        
        jQuery('#refundRequestsModal .maingenrateBlock #refundsList').remove();
        
        jQuery.ajax({
            url: addlly_vars.ajax_url,
            type: 'POST',
            data : 'action=addlly_get_article_refund_requests&article_id='+ article_id + '&nonce='+ addlly_vars.nonce,
            dataType: "json",
            success: function (response) {
                
                jQuery("#addlly_loader").hide();
                jQuery('#refundRequestsModal').modal('show');
                jQuery('#refundRequestsModal .maingenrateBlock').append(response.refund_requests);
                
            }
        });
        
        
    });
    
    jQuery(document).on("click", "#refundRequestsModal .close-btn", function () {
        jQuery('#refundRequestsModal').modal('hide');
    });
    
    jQuery(document).on("change", ".verionBlock .drop select", function () {
        var id         = jQuery('.verionBlock .filtersDropdown').data('id');
        var type       = jQuery('.verionBlock .filtersDropdown').data('type');
        var sort_by    = jQuery('.verionBlock select[name="sort_by"]').val();
        var filter_by  = jQuery('.verionBlock select[name="filter_by"]').val();
        
        jQuery("#addlly_loader").show();
        jQuery.ajax({
            url: addlly_vars.ajax_url,
            type: 'POST',
            data : 'action=addlly_get_version_history&id='+ id +'&type=' + type +'&sort_by='+ sort_by +'&filter_by='+ filter_by + '&nonce='+ addlly_vars.nonce,
            dataType: "json",
            success: function (response) {
                jQuery("#addlly_loader").hide();
                jQuery('.verionBlock .offcanvas-body .versionNo').html(response.history_data);
            }
        });
    });
    
    
    
    jQuery(document).click(function(event) {
        if (!jQuery(event.target).closest('.action-list').length) {
            if(jQuery('.action-list').hasClass('active')){
                jQuery('.action-list').addClass('d-none').removeClass('active');
            }
        }
    });
    
    jQuery(document).on("click", ".tableColumn .action-btn", function (event) {
        event.preventDefault();
        var t = jQuery(this);
        t.closest('.tableColumn').find('.action-list').removeClass('d-none');
        
        setTimeout(function () {
            t.closest('.tableColumn').find('.action-list').addClass('active');
        }, 500);
    });
    
    jQuery(document).on("click", ".articles-list .untrain-btn, .articles-list .train-btn", function () {
        var t = jQuery(this);
        var id = t.data('id');
        var type = t.data('type');
        var count_train_articles = jQuery('.trainArticles .articles-body .tableRow').length;
        var title = type == 'train' ? 'Do you want to train the article for 1-Click Blog?' : 'Do you want to unTrain the article for 1-Click Blog?';
        Swal.fire({
            title: '',
            html: title + "<br><br>Currently you have "+ count_train_articles +" / 4 article selected for training.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: type == 'train' ? 'Use article for training' : 'Remove article for training',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                jQuery("#addlly_loader").show();
                jQuery.ajax({
                    url: addlly_vars.ajax_url,
                    type: 'POST',
                    data : 'action=addlly_train_article&id='+ id +'&type='+ type +'&view=list' + '&nonce='+ addlly_vars.nonce,
                    dataType: "json",
                    success: function (response) {
                        jQuery("#addlly_loader").hide();
                        if (response.type === 'success') {
                            if(type == 'train'){
                                toastr.success('Article Trained Successfully.', 'Success');
                            }else{
                                toastr.success('Article Untrained Successfully.', 'Success');
                            }
                            setTimeout(function () {
                                window.location.href = response.redirectURL;
                            }, 1000);
                        }else{
                            alert(response.msg);
                        }
                    }
                });
            }
        });
    });
    
    
    jQuery(document).on("click", ".articles-list .preview-btn", function (event) {
        var id = jQuery(this).data('id');
        jQuery("#addlly_loader").show();
        jQuery.ajax({
            url: addlly_vars.ajax_url,
            type: 'POST',
            data : 'action=addlly_article_preview&id='+ id + '&nonce='+ addlly_vars.nonce,
            dataType: "html",
            success: function (response) {
                jQuery("#addlly_loader").hide();
                jQuery('#previewArticleCanvas .articalDetailsPopUp').html(response);
                var offcanvas = new bootstrap.Offcanvas(document.getElementById('previewArticleCanvas'));
                offcanvas.show();
            }
        });
    });
    
    jQuery(document).on("click", ".articalDetailsPopUp .full-preview", function (event) {
        jQuery(this).addClass('d-none');
        jQuery('.articalDetailsPopUp .small-preview').removeClass('d-none');
        jQuery('#previewArticleCanvas').addClass('fullScreen');
    });
    
    jQuery(document).on("click", ".articalDetailsPopUp .small-preview", function (event) {
        jQuery(this).addClass('d-none');
        jQuery('.articalDetailsPopUp .full-preview').removeClass('d-none');
        jQuery('#previewArticleCanvas').removeClass('fullScreen');
    });
    
    jQuery(document).on("click", "#previewArticleCanvas .copy-btn", function (event) {
        var beautifiedContent = html_beautify(jQuery('#previewArticleCanvas .textarea-article-html').html());
        function listener(e) {
            e.clipboardData.setData("text/html", beautifiedContent);
            e.clipboardData.setData("text/plain", beautifiedContent);
            e.preventDefault();
        }
        document.addEventListener("copy", listener);
        document.execCommand("copy");
        document.removeEventListener("copy", listener);
        toastr.success('Text has been copied to clipboard.', 'Success');
    });
    
    
    
    jQuery(document).on("click", ".articles-list .archive-btn", function () {
        var t     = jQuery(this);
        var id    = t.data('id');
        var type  = t.data('type');
        
        Swal.fire({
            title: 'Are you sure?',
            text: type == 'archive' ? "Do you want to archive the selected item?" : "Do you want to restore the selected item?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: type == 'archive' ? 'Yes, archive it!' : 'Yes, restore it!',
            cancelButtonText: 'No',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                jQuery("#addlly_loader").show();
                jQuery.ajax({
                    url: addlly_vars.ajax_url,
                    type: 'POST',
                    data : 'action=addlly_archive_article&id='+ id +'&type='+ type + '&nonce='+ addlly_vars.nonce,
                    dataType: "json",
                    success: function (response) {
                        jQuery("#addlly_loader").hide();
                        if (response.type === 'success') {
                            Swal.fire({
                                title: type == 'archive' ? 'Archived' : 'Restored',
                                text: type == 'archive' ? "Your record has been archived." : "Your record has been restored.",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonText: 'Ok',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        }else{
                            alert(response.msg);
                        }
                    }
                });
            }
        });
    });
    
    jQuery(document).on("click", ".articles-list .delete-btn, #previewArticleCanvas .delete-btn", function () {
        
        var t    = jQuery(this);
        var id   = t.data('id');
        
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete the selected item?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                jQuery("#addlly_loader").show();
                jQuery.ajax({
                    url: addlly_vars.ajax_url,
                    type: 'POST',
                    data : 'action=addlly_delete_article&id='+ id + '&nonce='+ addlly_vars.nonce,
                    dataType: "json",
                    success: function (response) {
                        jQuery("#addlly_loader").hide();
                        if (response.type == 'success') {
                            Swal.fire({
                                title: 'Deleted',
                                text: "Your record has been deleted.",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonText: 'Ok',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = response.redirectURL;
                                }
                            });
                        }else{
                            alert(response.msg);
                        }
                    }
                });
            }
        });
    });
    
    
});

jQuery(document).on('click', '.filters .buttonTab button', function (e) {
    jQuery('.filters .buttonTab button').removeClass('active').prop('disabled', false);
    jQuery(this).addClass('active').prop('disabled', true);
    addlly_search_articles();
});

jQuery(document).on('click', '.filters .filterRedu button', function (e) {
    jQuery('.filters .filterRedu button').removeClass('active');
    jQuery(this).addClass('active');
    if(jQuery(this).hasClass('wrap-text')){
        jQuery('.profile-page .cardBody .articles-body').find('.title').addClass('showFullDes');
    }else{
        jQuery('.profile-page .cardBody .articles-body').find('.title').removeClass('showFullDes');
    }
    
});


jQuery(document).on('click', '.filters .show-filters', function (e) {
    jQuery('.filterPopUpH').toggleClass('d-none').addClass('active');
});

jQuery(document).click(function(event) {
    if (!jQuery(event.target).closest('.filterPopUpH').length && !jQuery(event.target).closest('.show-filters').length) {
        if(jQuery('.filterPopUpH').hasClass('active')){
            jQuery('.filterPopUpH').addClass('d-none').removeClass('active');
        }
    }
});

jQuery(document).on('click', '.popUpMain .clearFilters', function (e) {
    jQuery('input[name="durations[]"]').prop('checked', false);
    jQuery('input[name="status[]"]').prop('checked', false);
    jQuery('input[name="AIModels[]"]').prop('checked', false);
    jQuery('.durationsFilter span.blueButton').text('0 selected');
    jQuery('.statusFilter span.blueButton').text('0 selected');
    jQuery('.AIModelsFilter span.blueButton').text('0 selected');
    addlly_search_articles();
});

jQuery(document).on('change', 'input[name="durations[]"]', function (e) {
    var id = jQuery(this).attr('id');
    if( id == 'durations0' ){
        if(jQuery('input[id="durations0"][name="durations[]"]').is(':checked')){
            jQuery('input[name="durations[]"]').prop('checked', true);
        }else{
            jQuery('input[name="durations[]"]').prop('checked', false);
        }
    }else if(!jQuery(this).is(':checked')){
        jQuery('input[id="durations0"][name="durations[]"]').prop('checked', false);
    }
    if(jQuery('input[id="durations0"][name="durations[]"]').is(':checked')){
        jQuery('.durationsFilter span.blueButton').text( (jQuery('input[name="durations[]"]:checked').length - 1) + ' selected');
    }else{
        jQuery('.durationsFilter span.blueButton').text(jQuery('input[name="durations[]"]:checked').length + ' selected');
    }
    addlly_search_articles();
});

jQuery(document).on('change', 'input[name="status[]"]', function (e) {
    var id = jQuery(this).attr('id');
    if( id == 'status0' ){
        if(jQuery('input[id="status0"][name="status[]"]').is(':checked')){
            jQuery('input[name="status[]"]').prop('checked', true);
        }else{
            jQuery('input[name="status[]"]').prop('checked', false);
        }
    }else if(!jQuery(this).is(':checked')){
        jQuery('input[id="status0"][name="status[]"]').prop('checked', false);
    }
    if(jQuery('input[id="status0"][name="status[]"]').is(':checked')){
        jQuery('.statusFilter span.blueButton').text( (jQuery('input[name="status[]"]:checked').length - 1) + ' selected');
    }else{
        jQuery('.statusFilter span.blueButton').text(jQuery('input[name="status[]"]:checked').length + ' selected');
    }
    addlly_search_articles();
});

jQuery(document).on('change', 'input[name="AIModels[]"]', function (e) {
    var id = jQuery(this).attr('id');
    if( id == 'AIModels0' ){
        if(jQuery('input[id="AIModels0"][name="AIModels[]"]').is(':checked')){
            jQuery('input[name="AIModels[]"]').prop('checked', true);
        }else{
            jQuery('input[name="AIModels[]"]').prop('checked', false);
        }
    }else if(!jQuery(this).is(':checked')){
        jQuery('input[id="AIModels0"][name="AIModels[]"]').prop('checked', false);
    }
    if(jQuery('input[id="AIModels0"][name="AIModels[]"]').is(':checked')){
        jQuery('.AIModelsFilter span.blueButton').text( (jQuery('input[name="AIModels[]"]:checked').length - 1) + ' selected');
    }else{
        jQuery('.AIModelsFilter span.blueButton').text(jQuery('input[name="AIModels[]"]:checked').length + ' selected');
    }
    addlly_search_articles();
});

var typingTimer;
var doneTypingInterval = 500;
jQuery(document).on('keyup', '#search_keyword', function (e) {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(addlly_search_articles, doneTypingInterval);
});

if(jQuery('#search_keyword').length > 0){
    document.getElementById('search_keyword').addEventListener('input', function() {
        var searchInput = this;
        setTimeout(function() {
            if (!searchInput.value) {
                addlly_search_articles()
            }
        }, 1);
    });
}

function addlly_pagination_ajax( page_num, action ){
    if( action == 'refund_list' ){
        addlly_search_refunds_list( page_num, action );
    }else{
        addlly_search_articles( page_num, action );
    }
}

function addlly_search_articles( page_num, action ){
    
    page_num = page_num || 1;
    action   = action || '';
    
    var data = '';
    var data_vals = '';
    
    if(jQuery("#search_keyword").val() != ''){
        data_vals += '&search_keyword='+ jQuery("#search_keyword").val();
        data += '&search_keyword='+ jQuery("#search_keyword").val();
    }
    
    if(jQuery('input[name="durations[]"]:checked').val() != '' && typeof jQuery('input[name="durations[]"]:checked').val() != 'undefined'){
        var selectedValues = [];
        jQuery('input[name="durations[]"]:checked').each(function () {
            selectedValues.push(jQuery(this).val());
        });
        data += '&durations='+ selectedValues;
        data_vals += '&durations='+ selectedValues;
    }
    
    if(jQuery('input[name="status[]"]:checked').val() != '' && typeof jQuery('input[name="status[]"]:checked').val() != 'undefined'){
        var selectedValues = [];
        jQuery('input[name="status[]"]:checked').each(function () {
            selectedValues.push(jQuery(this).val());
        });
        data += '&status='+ selectedValues;
        data_vals += '&status='+ selectedValues;
    }
    
    if(jQuery('input[name="AIModels[]"]:checked').val() != '' && typeof jQuery('input[name="AIModels[]"]:checked').val() != 'undefined'){
        var selectedValues = [];
        jQuery('input[name="AIModels[]"]:checked').each(function () {
            selectedValues.push(jQuery(this).val());
        });
        data += '&AIModels='+ selectedValues;
        data_vals += '&AIModels='+ selectedValues;
    }
    
    var articleStatus = jQuery('.filters .buttonTab button.active').data('id');
    data += '&articleStatus='+ articleStatus;
    data_vals += '&articleStatus='+ articleStatus;
    
    if( page_num > 1 ){
        data += '&pg='+ page_num;
    }
    jQuery("#addlly_loader").show();
    jQuery.ajax({
        url: addlly_vars.ajax_url,
        type: 'POST',
        data : 'action=addlly_search_articles'+ data + '&nonce='+ addlly_vars.nonce,
        dataType: "json",
        success: function (response) {
            jQuery("#addlly_loader").hide();
            jQuery('.profile-page .articles-list .articles-body').html(response.html);
            jQuery('.profile-page .articles-list .pagenation').html(response.pagination);
            
            if( response.trainArticles == '' || response.trainArticles == null ){
                jQuery('.trainArticles').addClass('d-none');
                jQuery('.trainArticles .articles-body').html('');
            }else{
                jQuery('.trainArticles .tableHeading span').html(response.countTrainArticles)
                jQuery('.trainArticles').removeClass('d-none');
                jQuery('.trainArticles .articles-body').html(response.trainArticles);
            }
        }
    });
}

function addlly_search_refunds_list( page_num, action ){
    
    page_num = page_num || 1;
    action   = action || '';
    
    var data = '';
    if( page_num > 1 ){
        data += '&pg='+ page_num;
    }
    if(jQuery('#refundsList').length > 0){
        data += '&article_id='+ jQuery('#refundsList').data('id');
    }
    jQuery("#addlly_loader").show();
    jQuery.ajax({
        url: addlly_vars.ajax_url,
        type: 'POST',
        data : 'action=addlly_search_refunds_list'+ data + '&nonce='+ addlly_vars.nonce,
        dataType: "json",
        success: function (response) {
            jQuery("#addlly_loader").hide();
            jQuery('#refundsList .tableBody').html(response.refunds_list);
            jQuery('#refundsList .pagenation').html(response.pagination);
        }
    });
}

jQuery(document).on('keyup', '#addlly-login-form input[name="username"], #addlly-login-form input[name="password"]', function () {
    var username = jQuery('#addlly-login-form input[name="username"]').val();
    var password = jQuery('#addlly-login-form input[name="password"]').val();
    if( username != '' && password != '' ){
        jQuery('#addlly-login-form button[type="submit"]').prop('disabled', false);
    }else{
        jQuery('#addlly-login-form button[type="submit"]').prop('disabled', true);
    }
});


jQuery(document).on("submit", "#addlly-login-form", function () {
       
    var t  = jQuery(this);
    t.prop('disabled', true);
    jQuery("#addlly_loader").show();
    
    jQuery.ajax({
        url: addlly_vars.ajax_url,
        type: 'POST',
        data : 'action=addlly_login&'+ jQuery('#addlly-login-form').serialize(),
        dataType: "json",
        success: function (response) {
            jQuery("#addlly_loader").hide();
            if (response.type === 'success') {
                window.location.href = response.redirectURL;
            }else{
                t.prop('disabled', false);
                alert(response.msg);
            }
        }
    });
    return false;
});

jQuery(document).on('keyup', '.addlly-form.one-click #topic, .addlly-form.one-click #keyword', function () {
    var disabled = jQuery('.addlly-form.one-click .btn-submit').prop('disabled');
    if( disabled == false ){
        addlly_validate_blog_generation();
    }
});
function addlly_validate_blog_generation(){
    
    jQuery('.addlly-form.one-click #topic').closest('.field-input').find('.invalid').text('');
    jQuery('.addlly-form.one-click #keyword').closest('.field-input').find('.invalid').text('');
    
    var isValid = true;
    var topic = jQuery('.addlly-form.one-click #topic').val();
    var topicLength = topic.length;
    var topicSpaceCount = topic.split(' ').length - 1;
    
    jQuery('.addlly-form.one-click #topic').removeClass('is-invalid');
    if( topicLength === topicSpaceCount ){
        jQuery('.addlly-form.one-click #topic').closest('.field-input').find('.invalid').text('Topic should not contain white spaces');
        jQuery('.addlly-form.one-click #topic').addClass('is-invalid');
        isValid = false;
    }else if( topicLength == 2 && topicSpaceCount > 0 ){
        jQuery('.addlly-form.one-click #topic').closest('.field-input').find('.invalid').text('Topic should not contain multiple consecutive white spaces');
        jQuery('.addlly-form.one-click #topic').addClass('is-invalid');
        isValid = false;
    }else if( topicLength < 2 ){
        jQuery('.addlly-form.one-click #topic').closest('.field-input').find('.invalid').text('Topic must be at least 2 characters');
        jQuery('.addlly-form.one-click #topic').addClass('is-invalid');
        isValid = false;
    }
    
    var keyword = jQuery('.addlly-form.one-click #keyword').val();
    var keywordLength = keyword.length;
    var keywordSpaceCount = keyword.split(' ').length - 1;
    
    jQuery('.addlly-form.one-click #keyword').removeClass('is-invalid');
    if( keywordLength === keywordSpaceCount ){
        jQuery('.addlly-form.one-click #keyword').closest('.field-input').find('.invalid').text('Keyword should not contain white spaces');
        jQuery('.addlly-form.one-click #keyword').addClass('is-invalid');
        isValid = false;
    }else if( keywordLength == 2 && keywordSpaceCount > 0 ){
        jQuery('.addlly-form.one-click #keyword').closest('.field-input').find('.invalid').text('Keyword should not contain multiple consecutive white spaces');
        jQuery('.addlly-form.one-click #keyword').addClass('is-invalid');
        isValid = false;
    }else if( keywordLength < 2 ){
        jQuery('.addlly-form.one-click #keyword').closest('.field-input').find('.invalid').text('Keyword must be at least 2 characters');
        jQuery('.addlly-form.one-click #keyword').addClass('is-invalid');
        isValid = false;
    }
    return isValid;
}

jQuery(document).on("click", ".topic-modal .versionHistory .drop button", function (e) {
    if( jQuery(".topic-modal .versionHistory .dropdown-menu_ li").length > 0 ){
        jQuery(".topic-modal .versionHistory .dropdown-menu_").removeClass('d-none');
    }
});
    
jQuery(document).on("click", ".addlly-form .glitterStarBox", function() {
    var topic = jQuery('.addlly-form.one-click #topic').val();
    var topicLength = topic.length;
    if( topicLength < 2 ){
        toastr.error('Please ensure the topic is at least 2 characters long.');
    }else{
        jQuery("#addlly_loader").show();
        jQuery.ajax({
            url: addlly_vars.ajax_url,
            type: 'POST',
            data : 'action=addlly_get_topic_suggestions&'+ jQuery('.addlly-form.one-click').serialize() + '&nonce='+ addlly_vars.nonce,
            dataType: "json",
            success: function (response) {
                jQuery("#addlly_loader").hide();
                if( response.type == 'error' ){
                    toastr.error(response.msg);   
                }else{
                    jQuery('.topic-modal .topicBlock textarea').val(response.topic);
                    jQuery('.topic-modal .topicBlock #geoLocation').val(jQuery('.addlly-form.one-click #geoLocation').val());
                    jQuery('.topic-modal .topicBlock #lang').val(jQuery('.addlly-form.one-click #lang').val());
                    jQuery('.topic-modal .optomizeCardBlocks').html(response.topic_suggestions);
                    jQuery('#topicSuggestionsModal').modal('show');
                    jQuery(".topic-modal .side-menu .btn").find('span').text(response.regenerateLeft);
                    if( response.regenerateLeft <= 0 ){
                        jQuery(".topic-modal .side-menu .btn").prop('disabled', true);
                    }

                    jQuery('.topic-modal .versionHistory .dropdown-menu_').html('');
                    if( response.regenerateLeft < 3 ){
                        var counter = 1;
                        for (var i = 3; i > response.regenerateLeft; i--) {
                            jQuery('.topic-modal .versionHistory .dropdown-menu_').append('<li class="">\
                                <span class="dropdown-item_" data-value="'+ counter +'">Generation '+ counter +'</span>\
                            </li>');
                            counter++;
                        }
                        jQuery('.topic-modal .versionHistory button span').text('Ver. 0'+ jQuery('.topic-modal .versionHistory .dropdown-menu_ li:last-child').find('span').data('value')+ '/03');
                        jQuery('.topic-modal .versionHistory .dropdown-menu_ li:last-child').addClass('active');
                    }
                }
            }
        });
        
    }
});

jQuery(document).on("click", ".topic-modal .side-menu .btn", function() {
    var t = jQuery(this);
    
    var topic       = jQuery('.topic-modal .topicBlock textarea').val();
    var geoLocation = jQuery(".topic-modal #geoLocation").val();
    var lang        = jQuery(".topic-modal #lang").val();
    
    jQuery("#addlly_loader").show();
    jQuery.ajax({
        url: addlly_vars.ajax_url,
        type: 'POST',
        data : 'action=addlly_get_topic_suggestions&version='+ ver +'&topic='+ topic +'&geoLocation='+ geoLocation +'&lang='+ lang,
        dataType: "json",
        success: function (response) {
            jQuery("#addlly_loader").hide();
            jQuery('.topic-modal .optomizeCardBlocks').html(response.topic_suggestions);
            t.find('span').text(response.regenerateLeft);
            if( response.regenerateLeft <= 0 ){
                t.prop('disabled', true);
            }
            
            jQuery('.topic-modal .versionHistory .dropdown-menu_').html('');
            if( response.regenerateLeft < 3 ){
                var counter = 1;
                for (var i = 3; i > response.regenerateLeft; i--) {
                    jQuery('.topic-modal .versionHistory .dropdown-menu_').append('<li class="">\
                        <span class="dropdown-item_" data-value="'+ counter +'">Generation '+ counter +'</span>\
                    </li>');
                    counter++;
                }
                jQuery('.topic-modal .versionHistory button span').text('Ver. 0'+ jQuery('.topic-modal .versionHistory .dropdown-menu_ li:last-child').find('span').data('value')+ '/03');
                jQuery('.topic-modal .versionHistory .dropdown-menu_ li:last-child').addClass('active');
            }
        }
    });
});

jQuery(document).on("click", ".topic-modal .versionHistory .dropdown-menu_ li", function (e) {
    
    var ver = jQuery(this).find('span').data('value');
    jQuery('.topic-modal .versionHistory button span').text('Ver. 0'+ ver + '/03');
    jQuery('.topic-modal .versionHistory .dropdown-menu_ li').removeClass('active');
    jQuery(this).addClass('active');
    jQuery(".topic-modal .versionHistory .dropdown-menu_").addClass('d-none');
    
    var topic       = jQuery('.topic-modal .topicBlock textarea').val();
    var geoLocation = jQuery(".topic-modal #geoLocation").val();
    var lang        = jQuery(".topic-modal #lang").val();
    
    jQuery("#addlly_loader").show();
    jQuery.ajax({
        url: addlly_vars.ajax_url,
        type: 'POST',
        data : 'action=addlly_get_topic_suggestions&version='+ ver +'&topic='+ topic +'&geoLocation='+ geoLocation +'&lang='+ lang,
        dataType: "json",
        success: function (response) {
            jQuery("#addlly_loader").hide();
            jQuery('.topic-modal .optomizeCardBlocks').html(response.topic_suggestions);
        }
    });
    
});

jQuery(document).on("click", ".topic-modal .optomizeCardBlock button", function() {
    var topic = jQuery(this).closest('.topic-modal .optomizeCardBlock').find('label.topic').text();
    var keyword = jQuery(this).closest('.topic-modal .optomizeCardBlock').find('label.keyword').text();
    jQuery('.addlly-form.one-click #topic').val(topic);
    jQuery('.addlly-form.one-click #keyword').val(keyword);
    jQuery('#topicSuggestionsModal').modal('hide');
    jQuery('.addlly-form.one-click .btn-submit').removeAttr('disabled');
});

jQuery(document).on("click", ".topic-modal .btn-close", function() {
    jQuery('#topicSuggestionsModal').modal('hide');
});

jQuery(document).on("click", ".addlly_wp_signin .passField svg", function() {
    var type = jQuery(".addlly_wp_signin .passField input").attr('type');
    if( type == 'password' ){
        jQuery(".addlly_wp_signin .passField input").attr('type', 'text');
        jQuery(this).html('<path d="M942.2 486.2Q889.47 375.11 816.7 305l-50.88 50.88C807.31 395.53 843.45 447.4 874.7 512 791.5 684.2 673.4 766 512 766q-72.67 0-133.87-22.38L323 798.75Q408 838 512 838q288.3 0 430.2-300.3a60.29 60.29 0 0 0 0-51.5zm-63.57-320.64L836 122.88a8 8 0 0 0-11.32 0L715.31 232.2Q624.86 186 512 186q-288.3 0-430.2 300.3a60.3 60.3 0 0 0 0 51.5q56.69 119.4 136.5 191.41L112.48 835a8 8 0 0 0 0 11.31L155.17 889a8 8 0 0 0 11.31 0l712.15-712.12a8 8 0 0 0 0-11.32zM149.3 512C232.6 339.8 350.7 258 512 258c54.54 0 104.13 9.36 149.12 28.39l-70.3 70.3a176 176 0 0 0-238.13 238.13l-83.42 83.42C223.1 637.49 183.3 582.28 149.3 512zm246.7 0a112.11 112.11 0 0 1 146.2-106.69L401.31 546.2A112 112 0 0 1 396 512z"></path>');
    }else{
        jQuery(".addlly_wp_signin .passField input").attr('type', 'password');
        jQuery(this).html('<path d="M942.2 486.2C847.4 286.5 704.1 186 512 186c-192.2 0-335.4 100.5-430.2 300.3a60.3 60.3 0 0 0 0 51.5C176.6 737.5 319.9 838 512 838c192.2 0 335.4-100.5 430.2-300.3 7.7-16.2 7.7-35 0-51.5zM512 766c-161.3 0-279.4-81.8-362.7-254C232.6 339.8 350.7 258 512 258c161.3 0 279.4 81.8 362.7 254C791.5 684.2 673.4 766 512 766zm-4-430c-97.2 0-176 78.8-176 176s78.8 176 176 176 176-78.8 176-176-78.8-176-176-176zm0 288c-61.9 0-112-50.1-112-112s50.1-112 112-112 112 50.1 112 112-50.1 112-112 112z"></path>');
    }
});