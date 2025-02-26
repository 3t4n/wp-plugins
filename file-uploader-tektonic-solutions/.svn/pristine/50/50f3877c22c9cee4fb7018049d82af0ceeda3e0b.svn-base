var fileobj;
var fileName;
var message;

function file_explorer() {
    document.getElementById('tektonic_file_upload_selectfile').click();
    document.getElementById('tektonic_file_upload_selectfile').onchange = function() {
        fileobj  = document.getElementById('tektonic_file_upload_selectfile').files[0];
        fileName = fileobj.name;
        ajax_file_upload(fileobj);
    };
}

function ajax_file_upload(file_obj) {
    if(file_obj != undefined) {
        var formData = new FormData();                  
        formData.append('file', file_obj);
        formData.append('action', 'tektonic_file_upload');
        formData.append('tsfu', tektonic_site_params.tsfu);

        // Display the key/value pairs
        jQuery.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                //Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                  if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    percentComplete = percentComplete * 100;
                    percentComplete = parseInt(percentComplete);

                    if(barType == 'bar') {
                        jQuery('.ts-border').show();
                        jQuery('#tsBar').css('width', percentComplete+'%');
                        jQuery('#ts-progress-label').html(percentComplete+'%');
                    } else if(barType == 'circular') {
                        jQuery('#circular-inner').addClass('p'+percentComplete);
                        jQuery('#circletypelabel').html(percentComplete+'%');
                    }
                  }
                }, false);

                return xhr;
            },
            method: 'POST',
            url: tektonic_site_params.ajax_url,
            contentType: false,
            processData: false,
            data: formData,
            dataType: 'json',
            cache: false,
            beforeSend: function(jqXHR, settings) {
                jQuery('#tektonic_file_upload_notification').html('');
                jQuery('#tektonic_file_upload_status_notification').html('');
                jQuery('#tektonic_file_upload_notification').removeAttr('class');
                jQuery('#preview_upload_files').html('');
                jQuery('#bartype').hide();
                jQuery('#circular').hide();

                let uploadedFile = fileName;
                let getExtension = uploadedFile.substring(uploadedFile.lastIndexOf('.')+1);
                let splitAllowedFileTypes = allowedFileTypes.split(',');

                splitAllowedFileTypes = sanitizeData(splitAllowedFileTypes);

                if(tektonic_site_params.t <= 0) {
                    message = '<strong>Error: Please log in and continue.</strong>';
                    jQuery('#tektonic_file_upload_notification').hide().html(message).fadeIn(2000);
                    jQuery('#tektonic_file_upload_notification').addClass('red');

                    return false;
                }

                getExtension = getExtension.toLowerCase();

                if(splitAllowedFileTypes.indexOf(getExtension) == -1) {
                    message = '<strong>File upload failed! Invalid file type: </strong><span class="black">' + getExtension + '<br>' + fileName + '</span>';
                    jQuery('#tektonic_file_upload_notification').hide().html(message).fadeIn(2000);
                    jQuery('#tektonic_file_upload_notification').addClass('red');
                    return false;
                }

                jQuery('#circular-inner').removeAttr('class');
                jQuery('#circular-inner').addClass('c100');
                jQuery('#bartype').show().fadeIn(5000);
                jQuery('#circular').show().fadeIn(5000);
            },
            success: function(resp) {
                jQuery('#bartype').fadeOut(2000);
                jQuery('#circular').fadeOut(2000);

                if(resp == 1) {
                    message = '<strong>File upload failed! Please try again.';

                    jQuery('#tektonic_file_upload_status_notification').html('');
                    jQuery('#tektonic_file_upload_notification').hide().html(message).fadeIn(2000);
                    jQuery('#tektonic_file_upload_notification').addClass('red');
                } else {
                    let img         = resp.html;
                    let fileNewName = resp.fileNewName;
                    let statusMessage; 

                    message = '<strong>File uploaded successfully!</strong>';
                    statusMessage = '<strong>File uploaded as: </strong><br>' + img;

                    jQuery('#tektonic_file_upload_notification').hide().html(message).fadeIn(2000);
                    jQuery('#tektonic_file_upload_status_notification').hide().html(statusMessage).fadeIn(2000);
                    jQuery('#tektonic_file_upload_notification').addClass('green');
                }
            },
            complete: function() {
                jQuery('#tektonic_file_upload_selectfile').val('');
            }
        });
    }
}

function deleteFile(arg) {
    if(confirm('Are you sure about deleting this file?') == true) {
        let fileId   = jQuery(arg).attr('data-fid');
        let fileName = jQuery(arg).attr('data-fname');
        let aid      = jQuery(arg).attr('data-aid');
        let tsfu     = tektonic_site_params.tsfu;

        jQuery.ajax({
            method: 'POST',
            url: tektonic_site_params.ajax_url,
            data: {'file_id': fileId, 'file_name': fileName, 'action': 'tektonic_file_upload_delete_file', tsfu: tsfu, 'aid': aid},
            dataType: 'json',
            beforeSend: function() {
                jQuery('#tektonic_file_upload_notification').removeAttr('class');
            },
            success: function(deleteResp) {
                jQuery('#tektonic_file_upload_notification').hide().html('<strong>' + deleteResp.message + '</strong>').fadeIn(2000);

                if(deleteResp.error > 0) {
                    jQuery('#tektonic_file_upload_notification').addClass('green');
                    jQuery('#tektonic_file_upload_status_notification').html('');
                } else {
                    jQuery('#tektonic_file_upload_notification').addClass('red');
                }
            },
            complete: function() {},
            error: function() {}
        });
    } else {
        return false;
    }
}

function sanitizeData( entity ) {
    let newValues = new Array();

    jQuery.each( entity, function(key, value) {
        let trimmed = jQuery.trim(value);
        newValues.push(trimmed);
    });

    return newValues;
}
