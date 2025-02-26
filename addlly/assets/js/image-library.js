jQuery(document).ready(function () {
    
    jQuery(document).on("click", ".top-nav-items .imageLibrary, #social-media-view .imageLibrary", function (event) {
        jQuery('.blogSideBar li[data-bs-target="ai_generated_images"]').click();
        jQuery('.genrateAiImages').removeClass('d-none');
    });
    
    jQuery(document).on("click", ".genrateAiImages .close-btn", function (event) {
        jQuery('.genrateAiImages').addClass('d-none');
    });
    
    jQuery(document).on("click", ".genrateAiImages .blogSideBar li", function () {
        var tab = jQuery(this).data('bs-target');
        jQuery('.genrateAiImages .blogSideBar li').removeClass('active');
        jQuery(this).addClass('active');
        
        jQuery('.genrateAiImages .tabsData').addClass('d-none');
        jQuery('.genrateAiImages').find('#'+ tab + '').removeClass('d-none');
        
        if(tab == 'ai_generated_images'){
            addlly_get_ai_generated_images('0');
        }
        if(tab == 'ai_brand_images'){
            addlly_get_aibrand_images();
        }
        if(tab == 'free_images'){
            jQuery("#free_images #Pexels").click();
        }
        if(tab == 'uploaded_images'){
            addlly_get_uploaded_images();
        }
        
    });
    
    jQuery(document).on("click", "#ai_generated_images .re-generate-btn", function (event) {
        addlly_get_ai_generated_images('1');
        if( 1 == 2 ){
            var id   = jQuery(this).data('id');
            var type = jQuery(this).data('type');
            jQuery("#addlly_loader").show();
            jQuery.ajax({
                url: addlly_vars.ajax_url,
                type: 'POST',
                data : 'action=addlly_get_or_generate_ai_images&id='+ id +'&type='+ type + '&nonce='+ addlly_vars.nonce,
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
    
    jQuery(document).on("click", "#free_images .blogButton", function () {
        jQuery('#free_images .searchBar input[name="keyword"]').attr('placeholder', 'Search '+ jQuery(this).text());
        jQuery("#free_images .blogButton").removeClass('activeBtn');
        jQuery(this).addClass('activeBtn');
        addlly_get_free_images();
    });
    
    var typingTimer;
    var doneTypingInterval = 500;
    jQuery(document).on('keyup', '#free_images .searchBar input[name="keyword"]', function (e) {
        var keyword = jQuery(this).val();
        if( keyword == '' ){
            clearTimeout(typingTimer);
            typingTimer = setTimeout(addlly_get_free_images, doneTypingInterval);
        }
    });
    
    jQuery(document).on("click", "#free_images .searchBar button", function () {
        var id         = jQuery('#free_images').data('id');
        var type       = jQuery('#free_images').data('type');
        var keyword    = jQuery('#free_images .searchBar input[name="keyword"]').val();
        var active_tab = jQuery("#free_images .blogButton.activeBtn").attr('id');
        
        if( keyword != '' ){
            jQuery('#free_images .genrateImagesCards').html(addlly_get_free_images_placeholder());
            jQuery.ajax({
                url: addlly_vars.ajax_url,
                type: 'POST',
                data : 'action=addlly_search_free_images&id='+ id +'&type='+ type +'&keyword='+ keyword +'&images_type='+ active_tab + '&nonce='+ addlly_vars.nonce,
                dataType: "html",
                success: function (response) {
                    jQuery('#free_images .genrateImagesCards').html(response);
                }
            });
        }
    });
    
    jQuery(document).on("click", ".genrateImagesCards .cardBox", function (e) {
        e.preventDefault();
        var img_url = jQuery(this).find('img').attr('src');
        
        
        if(jQuery('#social-media-view').length > 0 ){
            
            var id   = jQuery('#social-media-view').data('id');
            var type = jQuery('#social-media-view').data('type');
            jQuery("#addlly_loader").show();
            jQuery.ajax({
                url: addlly_vars.ajax_url,
                type: 'POST',
                data : 'action=addlly_save_social_post_image&id='+ id +'&type='+ type +'&image_url='+ img_url + '&nonce='+ addlly_vars.nonce,
                dataType: "json",
                success: function (response) {
                    jQuery("#addlly_loader").hide();
                    if (response.type === 'success') {
                        var img_ui = '<img src="'+ img_url +'" alt="Post pictures" class=" object-fit-cover w-100 h-100 ">\
                        <button type="button" class="addlly-primary image-upload-btn imageLibrary">\
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"></path><path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"></path></svg>\
                        </button>';
                        if(jQuery('#social-media-view .genrateAiBlock').length > 0){
                            jQuery('#social-media-view .genrateAiBlock').html(img_ui);
                        }else{
                            jQuery('#social-media-view .genrate-Aiblock').html(img_ui);
                        }
                        jQuery('.genrateAiImages').addClass('d-none');
                        
                    }else{
                        alert(response.msg);
                    }
                }
            });
        }else if(jQuery('.content-area-block.article')){
            
            var editor = tinymce.get('textEditor');
            if (editor) {
                //editor.execCommand('mceImage', img_url);
                editor.execCommand('mceImage');
                
                var images_type = jQuery('.blogSideBar li.active').data('bs-target');
                
                var image_title = 'AI Generated Image';
                if( images_type == 'free_images'){
                    image_title = 'Free Image';
                }else if( images_type == 'uploaded_images'){
                    image_title = 'Upload Image';
                }
                
                if( images_type == 'free_images'){
                    var active_tab = jQuery("#free_images .blogButton.activeBtn").text();
                    image_title = active_tab +' '+ image_title;
                }
                
                setTimeout(function () {
                    jQuery('.tox-form input[type="url"].tox-textfield').val(img_url);
                    jQuery('.tox-form__group label:contains("Alternative description")').closest('.tox-form__group').find('input').val('AI Generated Image');
                    jQuery('.tox-form__group label:contains("Image title")').closest('.tox-form__group').find('input').val(image_title);
                }, 500);
            }
            
            jQuery('.genrateAiImages').addClass('d-none');
        }
    });
    
    jQuery(document).on("click", "#uploaded_images .tabsClick button", function () {
        var tab = jQuery(this).data('bs-target');
        jQuery('#uploaded_images .tabsClick button').removeClass('active');
        jQuery(this).addClass('active');
        
        jQuery('#uploaded_images .uploadTabsData').addClass('d-none');
        jQuery('#uploaded_images').find('#'+ tab + '').removeClass('d-none');
        if( tab == 'uploadComputer' ){
            jQuery('#uploaded_images .selectIamgesB').removeClass('d-none');
        }else{
            jQuery('#uploaded_images .selectIamgesB').addClass('d-none');
        }
    });
    
    jQuery(document).on( "change", '#uploaded_images .file-holder input[type="file"]', function() {
        readGalleryURL(this);
    });
    
    function readGalleryURL(input){
            
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var id = jQuery(input).data('id');
                var rand_id = uniqId();
                jQuery('#uploaded_images .genrateButton_').addClass('adddUploadedImages');
                jQuery("#uploaded_images .blogButton").prop('disabled', false);
                
                jQuery('#uploaded_images .brandAi-filUploader').addClass('hide');
                jQuery('#uploaded_images .genrateButton_').prepend('<div id="chooseCard-'+ rand_id +'" class="brandAi-filUploader chooseCard">\
                    <label class="sc-aXZVg kGRXWn w-100">\
                        <div class="file-holder">\
                            <input accept=".jpg,.png,.jpeg" type="file" name="files[]" data-id="'+ rand_id +'">\
                        </div>\
                        <div class="fileUploadBlock position-relative ">\
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="uploadIcon" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">\
                                <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.5 14.5V11h1v3.5a.5.5 0 0 1-1 0z"></path>\
                            </svg>\
                            <h4 class="form-label"><strong>Choose a file</strong> or drag it here</h4>\
                            <p class="m-0 image-types">Supported formats: jpg, jpeg, png; maximum file size: 5MB.</p>\
                        </div>\
                    </label>\
                </div>');
                
                jQuery('#uploaded_images .genrateButton_').append('<div class="image-preview-content chooseCard position-relative" data-id="'+ id +'">\
                    <img src="'+ e.target.result +'" alt="Uploaded-img">\
                    <div class="remove-btn">\
                        <button class="btn" type="button">\
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">\
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>\
                            </svg>\
                        </button>\
                    </div>\
                </div>');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    jQuery(document).on("click", "#uploaded_images .image-preview-content .remove-btn", function (e) {
        e.preventDefault();
        var id = jQuery(this).closest('#uploaded_images .image-preview-content').data('id');
        jQuery('#uploaded_images #chooseCard-'+ id + '').remove();
        jQuery(this).closest('#uploaded_images .image-preview-content').remove();
        
        if(jQuery('#uploaded_images .image-preview-content').length <= 0){
            jQuery('#uploaded_images .genrateButton_').removeClass('adddUploadedImages');
            jQuery("#uploaded_images .blogButton").prop('disabled', true);
        }
    });
    
    jQuery(document).on("click", "#uploaded_images .blogButton", function (e) {
        e.preventDefault();
        
        var id         = jQuery('#uploaded_images').data('id');
        var type       = jQuery('#uploaded_images').data('type');
        var formData   = new FormData(jQuery('#uploaded_images #uploadForm')[0]);
        
        formData.append('action', 'addlly_save_upload_images');
        formData.append('id', id);
        formData.append('type', type);
        formData.append('nonce', addlly_vars.nonce);
        
        jQuery("#addlly_loader").show();
        
        jQuery.ajax({
            url: addlly_vars.ajax_url,
            type: 'POST',
            data : formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (response) {
                jQuery("#addlly_loader").hide();
                
                var rand_id = uniqId();
                jQuery('#uploaded_images .genrateButton_').html('<div id="chooseCard-'+ rand_id +'" class="brandAi-filUploader chooseCard">\
                    <label class="sc-aXZVg kGRXWn w-100">\
                        <div class="file-holder">\
                            <input accept=".jpg,.png,.jpeg" type="file" name="files[]" data-id="'+ rand_id +'">\
                        </div>\
                        <div class="fileUploadBlock position-relative ">\
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="uploadIcon" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">\
                                <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.5 14.5V11h1v3.5a.5.5 0 0 1-1 0z"></path>\
                            </svg>\
                            <h4 class="form-label"><strong>Choose a file</strong> or drag it here</h4>\
                            <p class="m-0 image-types">Supported formats: jpg, jpeg, png; maximum file size: 5MB.</p>\
                        </div>\
                    </label>\
                </div>');
                
                jQuery('#uploaded_images button[data-bs-target="galleryImages"]').click();
                jQuery("#uploaded_images .blogButton").prop('disabled', true);
                jQuery('#uploaded_images #galleryImages').html(response.images_list);
                jQuery('#uploaded_images .total-images').text(response.count_images);
            }
        });
        
    });
    
    //////
    jQuery(document).on("click", "#ai_brand_images .tabsClick button", function () {
        var tab = jQuery(this).data('bs-target');
        jQuery('#ai_brand_images .tabsClick button').removeClass('active');
        jQuery(this).addClass('active');
        
        jQuery('#ai_brand_images .aiBrandImagesCards').addClass('d-none');
        jQuery('#ai_brand_images').find('#'+ tab + '').removeClass('d-none');
        if( tab == 'uploadComputer' ){
            jQuery('#ai_brand_images .selectIamgesB').removeClass('d-none');
        }else{
            jQuery('#ai_brand_images .selectIamgesB').addClass('d-none');
        }
    });
    
    jQuery(document).on( "change", '#ai_brand_images .file-holder input[type="file"]', function() {
        readBrandGalleryURL(this);
    });
    
    function readBrandGalleryURL(input){
            
        if (input.files && input.files[0]) {
            
            var reader = new FileReader();
            reader.onload = function (e) {
                var id = jQuery(input).data('id');
                var rand_id = uniqId();
                
                jQuery("#ai_brand_images .blogButton").prop('disabled', false);
                jQuery('#ai_brand_images .image-preview-content').append('<img src="'+ e.target.result +'" alt="Uploaded-img">\
                    <div class="remove-btn">\
                        <button class="btn" type="button">\
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">\
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>\
                            </svg>\
                        </button>\
                    </div>');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    jQuery(document).on("click", "#ai_brand_images .image-preview-content .remove-btn", function (e) {
        e.preventDefault();
        jQuery('#ai_brand_images .image-preview-content').html('');
        jQuery('#ai_brand_images .file-holder input[type="file"]').val('');
        jQuery("#ai_brand_images .blogButton").prop('disabled', true);
    });
    
    jQuery(document).on("click", "#ai_brand_images .blogButton", function (e) {
        e.preventDefault();
        
        if(jQuery(this).hasClass('generated')){
            jQuery('#ai_brand_images .tabsClick button[data-bs-target="renderImages"]').click();
        }else{
            
            var id         = jQuery('#ai_brand_images').data('id');
            var type       = jQuery('#ai_brand_images').data('type');
            var formData   = new FormData(jQuery('#ai_brand_images #uploadForm')[0]);

            formData.append('action', 'addlly_upload_aibrand_images');
            formData.append('id', id);
            formData.append('type', type);
            formData.append('nonce', addlly_vars.nonce);

            jQuery("#addlly_loader").show();

            jQuery.ajax({
                url: addlly_vars.ajax_url,
                type: 'POST',
                data : formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (response) {
                    jQuery("#addlly_loader").hide();
                    jQuery('#ai_brand_images button[data-bs-target="renderImages"]').click();
                    jQuery('#ai_brand_images #renderImages').html(response.images_list);
                    jQuery('#ai_brand_images button[data-bs-target="renderImages"]').find('.total-images').text(response.count_images);
                    
                    jQuery('#ai_brand_images .file-holder input[type="file"]').prop('disabled', true);
                    jQuery('#ai_brand_images .image-preview-content').html(response.productImg);
                    jQuery('#ai_brand_images .genrateButton_ .blogButton').find('span').text('Show Images');
                    jQuery('#ai_brand_images .genrateButton_ .blogButton').addClass('generated');
                    jQuery('#ai_brand_images .genrateButton_').find('.infoIconSvg').remove();
                    
                    jQuery('#ai_brand_images #galleryImages').html(response.galleryImagesList);
                    jQuery('#ai_brand_images button[data-bs-target="galleryImages"]').find('.total-images').text(response.countGalleryimages);
                }
            });
        }
    });
    //////
    
    
    jQuery(document).on("click", ".genrateImagesCards .cardBox .vdButton .downloadImage", function (e) {
        var active_tab = jQuery('.blogSideBar li.active').data('bs-target');
        var imageUrl   = jQuery(this).closest('.cardBox').find('img').attr('src');
        //if( active_tab == 'free_images' ){
            addlly_downolad_image_using_blob(imageUrl);
        //}
        
        return false;
    });
    
    
    jQuery(document).on("click", ".genrateImagesCards .cardBox .vdButton .viewImage", function (e) {
        e.preventDefault();
        var active_tab = jQuery('.blogSideBar li.active').data('bs-target');
        var total_images = jQuery('#'+ active_tab +' .genrateImagesCards>div').length;
        if( total_images < 10 ){
            total_images = '0'+ total_images;
        }
        
        var active_index = jQuery(this).closest('.cardBox').index();
        active_index = parseInt(active_index) + parseInt(1);
        if( active_index < 10 ){
            active_index = '0'+ active_index;
        }
        
        jQuery('#imageHistoryModal .arrow-next').prop('disabled', false);
        if( active_index == total_images ){
            jQuery('#imageHistoryModal .arrow-next').prop('disabled', true);
        }
        
        jQuery('#imageHistoryModal .arrow-prev').prop('disabled', false);
        if( active_index == '01' ){
            jQuery('#imageHistoryModal .arrow-prev').prop('disabled', true);
        }
        var img_src = jQuery(this).closest('.cardBox').find('img').attr('src');
        jQuery('#imageHistoryModal .image-view-wrapper').find('img').attr('src', img_src);
        jQuery('#imageHistoryModal label.img-label').html('<span class="activeSliderCount">'+ active_index +'</span> / '+ total_images +'');
        jQuery('#imageHistoryModal').modal('show');
        
        return false;
    });
    
    jQuery(document).on("click", "#imageHistoryModal .arrow-prev", function (e) {
        var active_tab = jQuery('.blogSideBar li.active').data('bs-target');
        var index = jQuery('#imageHistoryModal .activeSliderCount').text();
        var active_index = index-1;
        if( active_index < 10 ){
            active_index = '0'+ active_index;
        }
        var img_src = jQuery('#'+ active_tab +'').find('.genrateImagesCards .cardBox').eq(index-2).find('img').attr('src');
        jQuery('#imageHistoryModal .image-view-wrapper').find('img').attr('src', img_src);
        
        jQuery('#imageHistoryModal .arrow-next').prop('disabled', false);
        if( active_index == '01' ){
            jQuery('#imageHistoryModal .arrow-prev').prop('disabled', true);
        }
        jQuery('#imageHistoryModal .activeSliderCount').text(active_index);
    });
    
    jQuery(document).on("click", "#imageHistoryModal .arrow-next", function (e) {
        var active_tab = jQuery('.blogSideBar li.active').data('bs-target');
        var index = jQuery('#imageHistoryModal .activeSliderCount').text();
        var active_index = parseInt(index)+parseInt(1);
        if( active_index < 10 ){
            active_index = '0'+ active_index;
        }
        var img_src = jQuery('#'+ active_tab +'').find('.genrateImagesCards .cardBox').eq(parseInt(index)).find('img').attr('src');
        jQuery('#imageHistoryModal .image-view-wrapper').find('img').attr('src', img_src);
        
        jQuery('#imageHistoryModal .arrow-prev').prop('disabled', false);
        var total_images = jQuery('#'+ active_tab +' .genrateImagesCards>div').length;
        if( active_index == total_images ){
            jQuery('#imageHistoryModal .arrow-next').prop('disabled', true);
        }
        jQuery('#imageHistoryModal .activeSliderCount').text(active_index);
    });
    
    document.addEventListener('keydown', function(event) {
        if (event.key === 'ArrowRight') {
            if(jQuery('.image-history-modal.show').length > 0){
                jQuery("#imageHistoryModal .arrow-next").click();
            }
        } else if (event.key === 'ArrowLeft') { 
            if(jQuery('.image-history-modal.show').length > 0){
                jQuery("#imageHistoryModal .arrow-prev").click();
            }
        }
    });
    
    jQuery(document).on("click", "#imageHistoryModal .download-btn", function (e) {
        var active_tab = jQuery('.blogSideBar li.active').data('bs-target');
        var imageUrl   = jQuery('#imageHistoryModal .image-view-wrapper').find('img').attr('src');
        if( active_tab == 'free_images' ){
            addlly_downolad_image_using_blob(imageUrl);
        }
        return false;
    });
    
    jQuery(document).on("click", "#imageHistoryModal .close-btn", function (e) {
        jQuery('#imageHistoryModal').modal('hide');
    });
    
    jQuery(document).on("click", "#ai_generated_images .versionHistory .drop button", function (e) {
        if( jQuery("#ai_generated_images .versionHistory .dropdown-menu_ li").length > 0 ){
            jQuery("#ai_generated_images .versionHistory .dropdown-menu_").removeClass('d-none');
        }
    });
    
    jQuery(document).on("click", "#ai_generated_images .versionHistory .dropdown-menu_ li", function (e) {
        var ver = jQuery(this).find('span').data('value');
        jQuery('#ai_generated_images .versionHistory button span').text('Ver. 0'+ ver + '/03');
        jQuery('#ai_generated_images .versionHistory .dropdown-menu_ li').removeClass('active');
        jQuery(this).addClass('active');
        jQuery("#ai_generated_images .versionHistory .dropdown-menu_").addClass('d-none');
        
        var id    = jQuery('#ai_generated_images').data('id');
        var type  = jQuery('#ai_generated_images').data('type');

        jQuery('#ai_generated_images .aiGeneratedImagesCards').html(addlly_get_free_images_placeholder());
        
        jQuery.ajax({
            url: addlly_vars.ajax_url,
            type: 'POST',
            data : 'action=addlly_get_ai_generated_images&id='+ id +'&type='+ type + '&version='+ ver + '&nonce='+ addlly_vars.nonce,
            dataType: "json",
            success: function (response) {
                jQuery('#ai_generated_images .aiGeneratedImagesCards').html(response.images_list);
            }
        });
        
    });
});

function uniqId() {
  return Math.round(new Date().getTime() + (Math.random() * 100));
}

function addlly_downolad_image_using_blob( imageUrl ){
//    var imageName = imageUrl.split('/').pop();
//    var a = document.createElement('a');
//    a.href = imageUrl;
//    a.download = imageName;
//    document.body.appendChild(a);
//    a.click();
//    document.body.removeChild(a);
    
    if( 1 == 1 ){
        jQuery.ajax({
            url: imageUrl,
            type: 'GET',
            xhrFields: {
                responseType: 'blob'
            },
            success: function(blob) {
                var url = URL.createObjectURL(blob);
                var imageName = imageUrl.substring(imageUrl.lastIndexOf('/') + 1);
                var a = jQuery('<a />')
                    .attr('href', url)
                    .attr('download', imageName)
                    .appendTo('body');
                a[0].click();
                a.remove();
                URL.revokeObjectURL(url);
            }
        });
    }
}

function addlly_get_free_images(){
    var id         = jQuery('#free_images').data('id');
    var type       = jQuery('#free_images').data('type');
    var active_tab = jQuery("#free_images .blogButton.activeBtn").attr('id');
    
    
    jQuery('#free_images .genrateImagesCards').html(addlly_get_free_images_placeholder());
    
    jQuery.ajax({
        url: addlly_vars.ajax_url,
        type: 'POST',
        data : 'action=addlly_get_free_images&id='+ id +'&type='+ type +'&images_type='+ active_tab + '&nonce='+ addlly_vars.nonce,
        dataType: "html",
        success: function (response) {
            jQuery('#free_images .genrateImagesCards').html(response);
        }
    });
    
}

function addlly_get_ai_generated_images(isRegenerateImg){
    
    var id    = jQuery('#ai_generated_images').data('id');
    var type  = jQuery('#ai_generated_images').data('type');
    
    jQuery('#ai_generated_images .aiGeneratedImagesCards').html(addlly_get_free_images_placeholder());
    jQuery('#ai_generated_images .re-generate-btn').prop('disabled', true);
    
    jQuery.ajax({
        url: addlly_vars.ajax_url,
        type: 'POST',
        data : 'action=addlly_get_ai_generated_images&id='+ id +'&type='+ type + '&isRegenerateImg='+ isRegenerateImg + '&nonce='+ addlly_vars.nonce,
        dataType: "json",
        success: function (response) {
            jQuery('#ai_generated_images .generate-btn').addClass('d-none');
            jQuery('#ai_generated_images .re-generate-btn').removeClass('d-none');
            if( response.regenerateLeft > 0 ){
                jQuery('#ai_generated_images .re-generate-btn').prop('disabled', false);
            }else{
                jQuery('#ai_generated_images .re-generate-btn').prop('disabled', true);
            }
            jQuery('#ai_generated_images .aiGeneratedImagesCards').html(response.images_list);
            
            jQuery('#ai_generated_images .versionHistory .dropdown-menu_').html('');
            if( response.regenerateLeft < 3 ){
                var counter = 1;
                for (var i = 3; i > response.regenerateLeft; i--) {
                    jQuery('#ai_generated_images .versionHistory .dropdown-menu_').append('<li class="">\
                        <span class="dropdown-item_" data-value="'+ counter +'">Generation '+ counter +'</span>\
                    </li>');
                    counter++;
                }
                jQuery('#ai_generated_images .versionHistory button span').text('Ver. 0'+ jQuery('#ai_generated_images .versionHistory .dropdown-menu_ li:last-child').find('span').data('value')+ '/03');
                jQuery('#ai_generated_images .versionHistory .dropdown-menu_ li:last-child').addClass('active');
            }
        }
    });
    
}

function addlly_get_aibrand_images(){
    
    var id         = jQuery('#ai_brand_images').data('id');
    var type       = jQuery('#ai_brand_images').data('type');
    jQuery.ajax({
        url: addlly_vars.ajax_url,
        type: 'POST',
        data : 'action=addlly_get_aibrand_images&id='+ id +'&type='+ type + '&nonce='+ addlly_vars.nonce,
        dataType: "json",
        success: function (response) {
            if( response.productImg != '' ){
                jQuery('#ai_brand_images .file-holder input[type="file"]').prop('disabled', true);
                jQuery('#ai_brand_images .image-preview-content').html(response.productImg);
                jQuery('#ai_brand_images .genrateButton_ .blogButton').prop('disabled', false);
                jQuery('#ai_brand_images .genrateButton_ .blogButton').find('span').text('Show Images');
                jQuery('#ai_brand_images .genrateButton_ .blogButton').addClass('generated');
                jQuery('#ai_brand_images .genrateButton_').find('.infoIconSvg').remove();
                
            }
            jQuery('#ai_brand_images #renderImages').html(response.images_list);
            jQuery('#ai_brand_images button[data-bs-target="renderImages"]').find('.total-images').text(response.count_images);
            
            jQuery('#ai_brand_images #galleryImages').html(response.galleryImagesList);
            jQuery('#ai_brand_images button[data-bs-target="galleryImages"]').find('.total-images').text(response.countGalleryimages);
        }
    });
    
}

function addlly_get_uploaded_images(){
    
    var id         = jQuery('#uploaded_images').data('id');
    var type       = jQuery('#uploaded_images').data('type');
    
    jQuery.ajax({
        url: addlly_vars.ajax_url,
        type: 'POST',
        data : 'action=addlly_get_uploaded_images&id='+ id +'&type='+ type + '&nonce='+ addlly_vars.nonce,
        dataType: "json",
        success: function (response) {
            jQuery('#uploaded_images #galleryImages').html(response.images_list);
            jQuery('#uploaded_images .total-images').text(response.count_images);
        }
    });
    
}

function openMediaLibraryForBlog(){
    var elements = document.getElementsByClassName("upload-image-tooltip");
    for (var i = 0; i < elements.length; i++) {
      elements[i].style = "";
    }
    jQuery('.blogSideBar li[data-bs-target="uploaded_images"]').click();
    jQuery('#uploaded_images .tabsClick button[data-bs-target="uploadComputer"]').click();
    jQuery('.genrateAiImages').removeClass('d-none');
}

function addlly_get_free_images_placeholder(){
    return '<div class="mt-4 justify-content-start gap-3 row">\
        <div class="placeholderI">\
            <p class="overflow-hidden rounded-3 mb-3 placeholder-glow" style="height: 190px;">\
                <span class="h-100 col-12 placeholder"></span>\
            </p>\
        </div>\
        <div class="placeholderI">\
            <p class="overflow-hidden rounded-3 mb-3 placeholder-glow" style="height: 190px;">\
                <span class="h-100 col-12 placeholder"></span>\
            </p>\
        </div>\
        <div class="placeholderI">\
            <p class="overflow-hidden rounded-3 mb-3 placeholder-glow" style="height: 190px;">\
                <span class="h-100 col-12 placeholder"></span>\
            </p>\
        </div>\
        <div class="placeholderI">\
            <p class="overflow-hidden rounded-3 mb-3 placeholder-glow" style="height: 190px;">\
                <span class="h-100 col-12 placeholder"></span>\
            </p>\
        </div>\
        <div class="placeholderI">\
            <p class="overflow-hidden rounded-3 mb-3 placeholder-glow" style="height: 190px;">\
                <span class="h-100 col-12 placeholder"></span>\
            </p>\
        </div>\
    </div>'
}

