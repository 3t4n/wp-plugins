jQuery(document).ready(function(){

    jQuery("form").bind("keypress", function (e) {
        if (e.keyCode == 13) {
            return false;
        }
    });

    // Use term for all plural labels click event
    jQuery("input[name='post-type-label-all']").click(function(){
        if(jQuery("input[name='post-type-label-all']").is(":checked")){
            var post_type_label = jQuery("input[name='post-type-label']").val();
            if(post_type_label != ""){
                populate_label_fields(post_type_label);
            }
            else {
                clear_label_fields(post_type_label);
            }
        }
        else{
            clear_label_fields(post_type_label);
        }
    });

    // Use term for all plural labels input event
    jQuery("input[name='post-type-label']").on('input', function(){
        var post_type_label = jQuery("input[name='post-type-label']").val();
        if(post_type_label != ""){
            if(jQuery("input[name='post-type-label-all']").is(":checked")){
                populate_label_fields(post_type_label);
            }
        }
        else {
            clear_label_fields(post_type_label);
        }
    });

    // // Use term for all plural labels click event
    jQuery("input[name='post-type-label-singular-all']").click(function(){
        if(jQuery("input[name='post-type-label-singular-all']").is(":checked")){
            var post_type_singular_label = jQuery("input[name='post-type-label-singular']").val();
            if(post_type_singular_label != ""){
                populate_singular_label_fields(post_type_singular_label);
            }
            else{
                clear_singular_label_fields(post_type_singular_label);
            }
        }
        else{
            clear_singular_label_fields(post_type_singular_label);
        }
    });

    // Update other singular label fields as user types if autopopulate setting enabled
    jQuery("input[name='post-type-label-singular']").on('input', function(){
        var post_type_singular_label = jQuery("input[name='post-type-label-singular']").val();
        if(jQuery("input[name='post-type-label-singular-all']").is(":checked")){
            if(post_type_singular_label != ""){
                populate_singular_label_fields(post_type_singular_label);
            }
            else{
                clear_singular_label_fields(post_type_singular_label);
            }
        }
    });

    // Populate plural label fields
    function populate_label_fields(post_type_label){
        jQuery("input[name='post-type-label-view-items']").val("View " + post_type_label); 
        jQuery("input[name='post-type-label-search-items']").val("Search " + post_type_label); 
        jQuery("input[name='post-type-label-not-found']").val("No " + post_type_label.toLowerCase() + " found"); 
        jQuery("input[name='post-type-label-not-found-in-trash']").val("No " + post_type_label.toLowerCase() + " found in Trash"); 
        jQuery("input[name='post-type-label-all-items']").val("All " + post_type_label); 
        jQuery("input[name='post-type-label-menu-name']").val(post_type_label.charAt(0).toUpperCase() + post_type_label.slice(1));
        jQuery("input[name='post-type-label-filter-items-list']").val("Filter " + post_type_label.toLowerCase() + " list");
        jQuery("input[name='post-type-label-items-list-navigation']").val(post_type_label.charAt(0).toUpperCase() + post_type_label.slice(1) + " list navigation");
        jQuery("input[name='post-type-label-items-list']").val(post_type_label.charAt(0).toUpperCase() + post_type_label.slice(1) + " list");
    }

    // Clear plural label fields
    function clear_label_fields(post_type_label){
        jQuery(".cwf-plural-label").val("");
    }

    // Populate singular label fields
    function populate_singular_label_fields(post_type_singular_label){
        jQuery("input[name='post-type-label-add-new-item']").val("Add New " + post_type_singular_label);
        jQuery("input[name='post-type-label-edit-item']").val("Edit " + post_type_singular_label);
        jQuery("input[name='post-type-label-new-item']").val("New " + post_type_singular_label);
        jQuery("input[name='post-type-label-view-item']").val("View " + post_type_singular_label);
        jQuery("input[name='post-type-label-parent-item-colon']").val("Parent " + post_type_singular_label + ":");
        jQuery("input[name='post-type-label-archives']").val(post_type_singular_label.charAt(0).toUpperCase() + post_type_singular_label.slice(1) + " Archives");
        jQuery("input[name='post-type-label-attributes']").val(post_type_singular_label.charAt(0).toUpperCase() + post_type_singular_label.slice(1) + " Attributes");
        jQuery("input[name='post-type-label-insert-into-item']").val("Insert into " + post_type_singular_label.toLowerCase());
        jQuery("input[name='post-type-label-uploaded-to-this-item']").val("Uploaded to this " + post_type_singular_label.toLowerCase());
        jQuery("input[name='post-type-label-featured-image']").val("Featured image for this " + post_type_singular_label.toLowerCase());
        jQuery("input[name='post-type-label-set-featured-image']").val("Set featured image for this " + post_type_singular_label.toLowerCase());
        jQuery("input[name='post-type-label-remove-featured-image']").val("Remove featured image for this " + post_type_singular_label.toLowerCase());
        jQuery("input[name='post-type-label-use-featured-image']").val("Use as featured image for this " + post_type_singular_label.toLowerCase());
        jQuery("input[name='post-type-label-item-published']").val(post_type_singular_label.charAt(0).toUpperCase() + post_type_singular_label.slice(1) + " published");
        jQuery("input[name='post-type-label-item-published-privately']").val(post_type_singular_label.charAt(0).toUpperCase() + post_type_singular_label.slice(1) + " published privately");
        jQuery("input[name='post-type-label-item-reverted-to-draft']").val(post_type_singular_label.charAt(0).toUpperCase() + post_type_singular_label.slice(1) + " reverted to draft");
        jQuery("input[name='post-type-label-item-scheduled']").val(post_type_singular_label.charAt(0).toUpperCase() + post_type_singular_label.slice(1) + " scheduled");
        jQuery("input[name='post-type-label-item-updated']").val(post_type_singular_label.charAt(0).toUpperCase() + post_type_singular_label.slice(1) + " updated");
    }

    // Clear singular label fields
    function clear_singular_label_fields(post_type_singular_label){
        jQuery('.cwf-singular-label').val("");
    }

    // Disable label checkbox if user input in other label fields
    jQuery('.cwf-plural-label').on('input', function(){
        jQuery("input[name='post-type-label-all']").prop('checked', false);
    });

    // Disable singular label checkbox if user input in other singular label fields
    jQuery('.cwf-singular-label').on('input', function(){
        jQuery("input[name='post-type-label-singular-all']").prop('checked', false);
    });

    jQuery(".cwf-cpt-dashicon-input").click(function(event){
        var inputId = event.target.id;
        var inputValue = jQuery("#"+inputId).val();
        jQuery("#cwf-icon-url").html(inputValue);
        jQuery("#cwf-icon-url-input").val(inputValue);
    });

    jQuery(".cwf-slug").keydown(function(e){
        if (e.keyCode != '189' && e.keyCode != '8' && e.keyCode != '35' && e.keyCode != '36'
            && e.keyCode !='36' && e.keyCode != '37' && e.keyCode != '38' && e.keyCode != '39' 
            && e.keyCode != '40' && e.keyCode != '46' && e.keyCode != '9' && (e.keyCode < '65' ||  e.keyCode > '90')){
            e.preventDefault();
        }
    });

    /*jQuery("#cpt-taxonomy-select").toggle(function(){
            jQuery("#cpt-taxonomy-checkboxes").css('display', 'block');
        }, function(){
            jQuery("#cpt-taxonomy-checkboxes").css('display', 'none');
    });*/

    jQuery(".cwf-conditional").click(function(event){
        var conditionalElements = jQuery("#"+event.target.id).data('children');
        console.log("conditionalelements = " + conditionalElements);
        if(Array.isArray(conditionalElements)){
            
            jQuery(conditionalElements).each(function(key, value){
                console.log("value is: " + value);
                if(jQuery("#"+value).css("display") == "none"){
                    jQuery("#"+value).show();
                }
                else{
                    jQuery("#"+value).hide();
                    if(jQuery("#"+value+" input").data("clear")){
                        var inputType = jQuery("#"+value+" input").attr('type');
                        if(inputType == "text"){
                            jQuery("#"+value+" input").val("");
                        }
                        else if(inputType == "checkbox"){
                            jQuery("#"+value+" input").attr('checked',false);
                        } 
                    }
                }
            });  
        }
    });

    jQuery('#cpt-filter-submit').click(function() {
        var status = jQuery('#cpt-filter-status option:selected').val();
        document.location.href = 'admin.php?page=custom-wp-framework-admin&status='+status;
    });

    // Top bulk action selector.
    jQuery('#doaction').click(function() {
        
        var bulkAction = jQuery("#bulk-action-selector-top").val();

        switch(bulkAction) {
            case '-1': 
                jQuery("tr#bulk-delete").remove();
                jQuery("tr#bulk-disable").remove();
                jQuery("tr#bulk-enable").remove();
                break;
            case 'enable':
                if(jQuery("tr#bulk-enable").length) {
                    return;
                }
                else {
                    showBulkEnableRow();
                }
                break;
            case 'disable':
                // Check if disable row visible.
                if(jQuery("tr#bulk-disable").length) {
                    return;
                }
                else {
                    showBulkDisableRow();
                }
                break;
            case 'delete':
                // Check if edit row visible.
                if(jQuery("tr#bulk-delete").length) {
                    break;
                }
                else {
                    showBulkDeleteRow();
                    break;
                }
        }
    });

    // Bottom bulk action selector.
    jQuery('#doaction2').click(function() {
        
        var bulkAction = jQuery("#bulk-action-selector-bottom").val();

        switch(bulkAction) {
            case '-1':
                jQuery("tr#bulk-delete").remove();
                jQuery("tr#bulk-disable").remove();
                jQuery("tr#bulk-enable").remove();
                break;
            case 'enable':
                    if(jQuery("tr#bulk-enable").length) {
                        return;
                    }
                    else {
                        showBulkEnableRow();
                    }
                    break;
            case 'disable':
                // Check if disable row visible.
                if(jQuery("tr#bulk-disable").length) {
                    return;
                }
                else {
                    showBulkDisableRow();
                }
                break;
            case 'delete':
                // Check if delete row visible.
                if(jQuery("tr#bulk-delete").length) {
                    return;
                }
                else{
                    showBulkDeleteRow();
                }
                break;
        }

    });

    // Display bulk action form.
    function showBulkDeleteRow() {

        // Remove bulk disable table row if exists.
        jQuery("tr#bulk-disable").remove();

        // Remove bulk enable table row if exists.
        jQuery("tr#bulk-enable").remove();

        // Check that rows have been selected.
        var selectedRows = false;
        var deletedPosts = [];
        jQuery('input[name="custom-post-type[]"]').each(function() {
            if (jQuery(this).is(":checked")) {
                selectedRows = true;
                var row = jQuery(this).parent().parent();
                deletedPosts.push({ "id": jQuery(this).val(), "name": jQuery(row).find('.post_type_key a:first').text() });
            }
        });
     
        if (selectedRows == true) {
          // Construct bulk delete confirmation form.
            var bulkDeleteRow = '<tr id="bulk-delete" class="inline-edit-row inline-edit-row-page bulk-edit-row bulk-edit-row-page bulk-edit-page-inline-editor"><!-- Start of Bulk Delete Row -->';
            bulkDeleteRow += '<td colspan="6" class="colspanchange cwf-inline-bulk-action"><!-- Start of Bulk Delete Column -->';
            bulkDeleteRow += '<form id="bulk-action-form" method="post" action="' + cwf_cpt_vars.post_url + '" ><!-- Start of Bulk Delete Form -->';
            bulkDeleteRow += '<fieldset class="inline-edit-col-left"><!-- Start of Left Fieldset -->';
            bulkDeleteRow += '<legend class="inline-edit-legend">' + cwf_cpt_vars.delete_title + '</legend>';
            bulkDeleteRow += '<input type="hidden" name="nonce" value="' + cwf_cpt_vars.nonce + '"/>';
            bulkDeleteRow += '<input type="hidden" name="action" value="cwf_bulk_delete_cpt" />'; 
            bulkDeleteRow += '<div class="inline-edit-col"><!-- Start of Inline Edit Column -->';
            bulkDeleteRow += '<div style="margin-top:20px;"><strong><u>' + cwf_cpt_vars.delete_warning + '</u></strong></div>';
            bulkDeleteRow += '<div style="margin:20px 0 20px 0;">' + cwf_cpt_vars.delete_confirmation + '</div>';
            bulkDeleteRow += '<div id="bulk-title-div"><!-- Start of Bulk Title Container -->';
            bulkDeleteRow += '<div id="bulk-titles"><!-- Start of Post Titles -->';
            
            jQuery.each(deletedPosts, function(id, post) {
                bulkDeleteRow += addPostToBulkActionDelete(post);
            });

            bulkDeleteRow += '</div><!-- End of Post Titles -->'; 
            bulkDeleteRow += '</div><!-- End of Bulk Title Container -->';
            bulkDeleteRow += '</div><!-- End of Inline Edit Column -->';
            bulkDeleteRow += '<div class="submit inline-edit-save"><!-- Start of Inline Submit Controls -->';
            bulkDeleteRow += '<button id="cwf-cancel-bulk-delete" type="button" class="button cancel alignleft" onclick="removeBulkDeleteForm()">Cancel</button>';
            bulkDeleteRow += '<input type="submit" name="bulk_delete" id="bulk_delete" class="button button-primary alignright" value="Delete">';
            bulkDeleteRow += '</div><!-- End of Inline Submit Controls -->';
            bulkDeleteRow += '</fieldset><!-- End of Left Fieldset -->';
            bulkDeleteRow += '<fieldset class="inline-edit-col-right"><!-- Start of Right Fieldset -->';
            bulkDeleteRow += '<div class="inline-edit-col"><!-- Start of Inline Edit Column -->';
            bulkDeleteRow += '</div><!-- End of Inline Edit Column -->';
            bulkDeleteRow += '</fieldset><!-- End of Right Fieldset -->';
            bulkDeleteRow += '</form><!-- End of Bulk Delete Form -->';
            bulkDeleteRow += '</td><!-- End of Bulk Delete Column -->';
            bulkDeleteRow += '</tr><!-- End of Bulk Delete Row -->';

            // Pre-pend bulk delete table row.
            jQuery(".customposttypes tbody").prepend(bulkDeleteRow);

            // Scroll to bulk delete confirmation form.
            var target = jQuery('.wp-list-table');
            jQuery('html,body').animate({
                scrollTop: target.offset().top
            }, 1000);
        }        
        else {
            jQuery("tr#bulk-delete").remove();
        }
    }

    // Display bulk action form.
    function showBulkDisableRow() {

        // Remove bulk delete table row if exists.
        jQuery("tr#bulk-delete").remove();

        // Check that rows have been selected.
        var selectedRows = false;
        var disabledPosts = [];
        jQuery('input[name="custom-post-type[]"]').each(function() {
            if(jQuery(this).is(":checked")) {
                selectedRows = true;
                var row = jQuery(this).parent().parent();
                disabledPosts.push({ "id": jQuery(this).val(), "name": jQuery(row).find('.post_type_key a:first').text() });
            }
        });

        if(selectedRows == true) {
            // Construct bulk disable confirmation form.
            var bulkDisableRow = '<tr id="bulk-disable" class="inline-edit-row inline-edit-row-page bulk-edit-row bulk-edit-row-page bulk-edit-page-inline-editor"><!-- Start of Bulk Disable Row -->';
            bulkDisableRow += '<td colspan="6" class="colspanchange cwf-inline-bulk-action"><!-- Start of Bulk Disable Column -->';
            bulkDisableRow += '<form id="bulk-action-form" method="post" action="' + cwf_cpt_vars.post_url + '"> <!-- Start of Bulk Disable Form -->';
            bulkDisableRow += '<fieldset class="inline-edit-col-left"><!-- Start of Left Fieldset -->';
            bulkDisableRow += '<legend class="inline-edit-legend">' + cwf_cpt_vars.disable_title + '</legend>';
            bulkDisableRow += '<input type="hidden" name="nonce" value="' + cwf_cpt_vars.nonce + '"/>';
            bulkDisableRow += '<input type="hidden" name="action" value="cwf_bulk_disable_cpt" />';
            bulkDisableRow += '<div class="inline-edit-col"><!-- Start of Inline Edit Column -->';
            bulkDisableRow += '<div style="margin-top:20px;"><strong><u>' + cwf_cpt_vars.disable_warning + '</u></strong></div>';
            bulkDisableRow += '<div style="margin:20px 0 20px 0;">' + cwf_cpt_vars.disable_confirmation + '</div>';
            bulkDisableRow += '<div id="bulk-title-div"><!-- Start of Bulk Title Container -->';
            bulkDisableRow += '<div id="bulk-titles"><!-- Start of Post Titles -->';

            jQuery.each(disabledPosts, function(id, post) {
                bulkDisableRow += addPostToBulkActionDisable(post);
            });

            bulkDisableRow += '</div><!-- End of Post Titles -->';
            bulkDisableRow += '</div><!-- End of Bulk Title Container -->';
            bulkDisableRow += '</div><!-- End of Inline Edit Column -->';
            bulkDisableRow += '<div class="submit inline-edit-save"><!-- Start of Inline Submit Controls -->';
            bulkDisableRow += '<button id="cwf-cancel-bulk-disable" type="button" class="button cancel alignleft" onclick="removeBulkDisableForm()">Cancel</button>';
            bulkDisableRow += '<input type="submit" name="bulk_disable" id="bulk_disable" class="button button-primary alignright" value="Disable">';
            bulkDisableRow += '</div><!-- End of Inline Submit Controls -->';
            bulkDisableRow += '</fieldset><!-- End of Right Fieldset -->';
            bulkDisableRow += '</form><!-- End of Bulk Disable Form -->';
            bulkDisableRow += '</td><!-- End of Bulk Disable Column -->';
            bulkDisableRow += '</tr><!-- End of Bulk Disable Row -->';

            // Pre-pend bulk disable table row.
            jQuery('.customposttypes tbody').prepend(bulkDisableRow);

            // Scroll to bulk disable confirmation form.
            var target = jQuery('.wp-list-table');
            jQuery('html,body').animate({
                scrollTop: target.offset().top
            }, 1000);
        }
        else {
            jQuery("tr#bulk-disable").remove();
        }
    }

    // Display bulk action form.
    function showBulkEnableRow() {

        // Remove bulk delete row if exists.
        jQuery("tr#bulk-delete").remove();

        // Check that rows have been selected.
        var selectedRows = false;
        var enabledPosts = [];
        jQuery('input[name="custom-post-type[]"]').each(function() {
            if(jQuery(this).is(":checked")) {
                selectedRows = true;
                var row = jQuery(this).parent().parent();
                enabledPosts.push({ "id": jQuery(this).val(), "name": jQuery(row).find('.post_type_key a:first').text() });
            }
        });

        if(selectedRows == true) {
            // Construct bulk enable confirmation form.
            var bulkEnableRow = '<tr id="bulk-enable" class="inline-edit-row inline-edit-row-page bulk-edit-row bulk-edit-row-page bulk-edit-page-inline-editor"><!-- Start of Bulk Enable Row -->';
            bulkEnableRow += '<td colspan="6" class="colspanchange cwf-inline-bulk-action"><!-- Start of Bulk Enable Column -->';
            bulkEnableRow += '<form id="bulk-action-form" method="post" action="' + cwf_cpt_vars.post_url + '"> <!-- Start of Bulk Enable Form -->';
            bulkEnableRow += '<fieldset class="inline-edit-col-left"><!-- Start of Left Fieldset -->';
            bulkEnableRow += '<legend class="inline-edit-legend">' + cwf_cpt_vars.enable_title + '</legend>';
            bulkEnableRow += '<input type="hidden" name="nonce" value="' + cwf_cpt_vars.nonce + '"/>';
            bulkEnableRow += '<input type="hidden" name="action" value="cwf_bulk_enable_cpt" />';
            bulkEnableRow += '<div class="inline-edit-col"><!-- STart of Inline Edit Column -->';
            bulkEnableRow += '<div style="margin-top:20px;"><strong><u>' + cwf_cpt_vars.enable_warning + '</u></strong></div>';
            bulkEnableRow += '<div style="margin:20px 0 20px 0;">' + cwf_cpt_vars.enable_confirmation + '</div>';
            bulkEnableRow += '<div id="bulk-title-div"><!-- Start of Bulk Title Container -->';
            bulkEnableRow += '<div id="bulk-titles"><!-- Start of Post Titles -->';

            jQuery.each(enabledPosts, function(id, post) {
                bulkEnableRow += addPostToBulkActionEnable(post);
            });

            bulkEnableRow += '</div><!-- End of Post Titles -->';
            bulkEnableRow += '</div><!-- End of Bulk Title Container -->';
            bulkEnableRow += '</div><!-- End of Inline Edit Column -->';
            bulkEnableRow += '<div class="submit inline-edit-save"><!-- Start of Inline Submit Controls -->';
            bulkEnableRow += '<button id="cwf-cancel-bulk-enable" type="button" class="button cancel alignleft" onclick="removeBulkEnableForm()">Cancel</button>';
            bulkEnableRow += '<input type="submit" name="bulk_enable" id="bulk_enable" class="button button-primary alignright" value="Enable">';
            bulkEnableRow += '</div><!-- End of Inline Submit Controls -->';
            bulkEnableRow += '</fieldset><!-- End of Left Fieldset -->';
            bulkEnableRow += '<fieldset class="inline-edit-col-right"><!-- Start of Right Fieldset -->';
            bulkEnableRow += '<div class="inline-edit-col"><!-- Start of Inline Edit Column -->';
            bulkEnableRow += '</div><!-- End of Inline Edit Column -->';
            bulkEnableRow += '</fieldset><!-- End of Right Fieldset -->';
            bulkEnableRow += '</form><!-- End of Bulk Enable Form -->';
            bulkEnableRow += '</td><!-- End of Bulk Enable Column -->';
            bulkEnableRow += '</tr><!-- End of Bulk Enable Row -->';

            // Pre-pend bulk enable table row.
            jQuery(".customposttypes tbody").prepend(bulkEnableRow);

            // Scroll to bulk enable confirmation form.
            var target = jQuery('.wp-list-table');
            jQuery('html,body').animate({
                scrollTop: target.offset().top
            }, 1000);
        }
        else {
            jQuery("tr#bulk-enable").remove();
        }
    }

    // Update bulk post list when checkbox is clicked.
    jQuery('input[name="custom-post-type[]"]').click(function(){
        
        var row = jQuery(this).parent().parent();
        var postId = jQuery(this).val();
        var name = jQuery(row).find('.post_type_key a:first').text();

        if(jQuery("tr#bulk-delete").length) {
            
            // If checked, and not present in list, then add post.
            if(jQuery(this).is(':checked')){
                
                // Get post html for post.
                var postHtml = addPostToBulkActionDelete({"id": postId, "name": name });
                jQuery("#bulk-titles").append(postHtml);
            }
            else {

                // Get number of posts in list.
                var numPosts = jQuery(".cwf-remove-bulk-post").length;

                if(numPosts > 1) {
                    // Remove post from bulk action list.
                    jQuery("#delete-row-"+ postId).remove();
                }
                else {
                    jQuery("tr#bulk-delete").remove();
                }
            }
        }
    });

    // Update bulk action form on top checkbox toggle event.
    jQuery('#cb-select-all-1').click(function() {

        // Remove bulk action forms if unchecked.
        if(!jQuery(this).is(":checked")) {
            if(jQuery("tr#bulk-delete").length) {
                jQuery("tr#bulk-delete").remove();
            }
            if(jQuery("tr#bulk-disable").length) {
                jQuery("tr#bulk-disable").remove();
            }
        }
        else { 
            if(jQuery("tr#bulk-delete").length) {
                // Update bulk post list
                jQuery("#bulk-titles").empty();

                jQuery('input[name="custom-post-type[]"]').each(function() {
                    var row = jQuery(this).parent().parent();
                    var postId = jQuery(this).val();
                    var name = jQuery(row).find('.post_type_key a:first').text();
                    var postHtml = addPostToBulkActionDelete({"id": postId, "name": name });
                    jQuery("#bulk-titles").append(postHtml);
                });

            }

            if(jQuery("tr#bulk-disable").length) {
                // Update bulk post list
                jQuery("#bulk-titles").empty();
            }
        }
    });

    // Update bulk action form on bottom checkbox toggle event.
    jQuery("#cb-select-all-2").click(function(){

        // Remove bulk delete action form if unchecked.
        if(!jQuery(this).is(":checked")) {
            if(jQuery("tr#bulk-delete").length) {
                jQuery("tr#bulk-delete").remove();
            }
            if(jQuery("tr#bulk-disable").length) {
                jQuery("tr#bulk-disable").remove();
            }
        }
        else {
            if(jQuery("tr#bulk-delete").length) {
                // Update bulk post list
                jQuery("#bulk-titles").empty();

                jQuery('input[name="custom-post-type[]"]').each(function() {
                    var row = jQuery(this).parent().parent();
                    var postId = jQuery(this).val();
                    var name = jQuery(row).find('.post_type_key a:first').text();
                    var postHtml = addPostToBulkActionDelete({"id": postId, "name": name });
                    jQuery("#bulk-titles").append(postHtml);
                });

            }

            if(jQuery("tr#bulk-disable").length) {
                // Update bulk post list
                jQuery("#bulk-titles").empty();

            }
        }
    });
});

// Add post to list in bulk delete form.
function addPostToBulkActionDelete(postDetails) {

    var html = '';
    html += '<div id="delete-row-' + postDetails.id + '" class="cwf-remove-bulk-post">';
    html += '<a id="_' + postDetails.id + '" class="ntdelbutton" title="Remove from Bulk Delete" onclick="removeBulkPost(this)"></a>';
    html += '<span>' + postDetails.name + '</span>';
    html += '<input type="hidden" name="cwf-cpt-id[]" value="' + postDetails.id + '"/></div>';
    return html;

}

// Add post to list in bulk disable form.
function addPostToBulkActionDisable(postDetails) {

    var html = '';
    html += '<div id="disable-row-' + postDetails.id + '" class="cwf-disable-bulk-post">';
    html += '<a id="_' + postDetails.id + '" class="ntdelbutton" title="Remove from Bulk Disable" onclick="removeBulkPost(this)"></a>';
    html += '<span>' + postDetails.name + '</span>';
    html += '<input type="hidden" name="cwf-cpt-id[]" value="' + postDetails.id + '"/></div>';
    return html;

} 

// Add post to list in bulk disable form.
function addPostToBulkActionEnable(postDetails) {

    var html = '';
    html += '<div id="enable-row-' + postDetails.id + '" class="cwf-enable-bulk-post">';
    html += '<a id="_' + postDetails.id + '" class="ntdelbutton" title="Remove from Bulk Enable" onclick="removeBulkPost(this)"></a>';
    html += '<span>' + postDetails.name + '</span>';
    html += '<input type="hidden" name="cwf-cpt-id[]" value="' + postDetails.id + '"/></div>';
    return html;

}


// Remove post from bulk action form.
function removeBulkPost(elem) {

    // Unselect corresponding checkbox.
    jQuery('input[name="custom-post-type[]"]').each(function() {
        if (jQuery(this).val() == (String(elem.id).slice(1))) {
            jQuery(this).prop('checked', false);
        }
    });

    // Remove post from bulk action. 
    jQuery("#"+elem.id).parent('div').remove();

    // Remove form if no posts left selected.
    if(!jQuery(".cwf-remove-bulk-post").length){
        jQuery("tr#bulk-delete").remove();
        jQuery("tr#bulk-disable").remove();
        jQuery("tr#bulk-enable").remove();
        jQuery("#cb-select-all-1").prop('checked',false);
        jQuery("#cb-select-all-2").prop('checked',false);
    }
}

// Remove bulk delete form.
function removeBulkDeleteForm() {
    jQuery("tr#bulk-delete").remove();
}

// Remove bulk disable form.
function removeBulkDisableForm() {
    jQuery("tr#bulk-disable").remove();
}

// Remove bulk enable form.
function removeBulkEnableForm() {
    jQuery("tr#bulk-enable").remove();
}