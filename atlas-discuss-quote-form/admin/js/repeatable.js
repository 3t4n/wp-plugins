jQuery(function($) {
    
    // the upload image button, saves the id and outputs a preview of the image
    var imageFrame;
    jQuery('.meta_box_upload_image_button').click(function(event) {
        event.preventDefault();
        
        var options, attachment;
        
        $self = jQuery(event.target);
        $div = $self.closest('div.meta_box_image');
        
        // if the frame already exists, open it
        if ( imageFrame ) {
            imageFrame.open();
            return;
        }
        
        // set our settings
        imageFrame = wp.media({
            title: 'Choose Image',
            multiple: false,
            library: {
                type: 'image'
            },
            button: {
                text: 'Use This Image'
            }
        });
        
        // set up our select handler
        imageFrame.on( 'select', function() {
            selection = imageFrame.state().get('selection');
            
            if ( ! selection )
            return;
            
            // loop through the selected files
            selection.each( function( attachment ) {
                console.log(attachment);
                var src = attachment.attributes.sizes.full.url;
                var id = attachment.id;
                
                $div.find('.meta_box_preview_image').attr('src', src);
                $div.find('.meta_box_upload_image').val(id);
            } );
        });
        
        // open the frame
        imageFrame.open();
    });
    
    // the remove image link, removes the image id from the hidden field and replaces the image preview
    jQuery('.meta_box_clear_image_button').click(function() {
        var defaultImage = jQuery(this).parent().siblings('.meta_box_default_image').text();
        jQuery(this).parent().siblings('.meta_box_upload_image').val('');
        jQuery(this).parent().siblings('.meta_box_preview_image').attr('src', defaultImage);
        return false;
    });
    
    // the file image button, saves the id and outputs the file name
    var fileFrame;
    jQuery('.meta_box_upload_file_button').click(function(e) {
        e.preventDefault();
        
        var options, attachment;
        
        $self = jQuery(event.target);
        $div = $self.closest('div.meta_box_file_stuff');
        
        // if the frame already exists, open it
        if ( fileFrame ) {
            fileFrame.open();
            return;
        }
        
        // set our settings
        fileFrame = wp.media({
            title: 'Choose File',
            multiple: false,
            library: {
                type: 'file'
            },
            button: {
                text: 'Use This File'
            }
        });
        
        // set up our select handler
        fileFrame.on( 'select', function() {
            selection = fileFrame.state().get('selection');
            
            if ( ! selection )
            return;
            
            // loop through the selected files
            selection.each( function( attachment ) {
                console.log(attachment);
                var src = attachment.attributes.url;
                var id = attachment.id;
                
                $div.find('.meta_box_filename').text(src);
                $div.find('.meta_box_upload_file').val(src);
                $div.find('.meta_box_file').addClass('checked');
            } );
        });
        
        // open the frame
        fileFrame.open();
    });
    
    // the remove image link, removes the image id from the hidden field and replaces the image preview
    jQuery('.meta_box_clear_file_button').click(function() {
        jQuery(this).parent().siblings('.meta_box_upload_file').val('');
        jQuery(this).parent().siblings('.meta_box_filename').text('');
        jQuery(this).parent().siblings('.meta_box_file').removeClass('checked');
        return false;
    });
    
    // function to create an array of input values
    function ids(inputs) {
        var a = [];
        for (var i = 0; i < inputs.length; i++) {
            a.push(inputs[i].val);
        }
        //$("span").text(a.join(" "));
    }
    // repeatable fields
    jQuery('.meta_box_repeatable_add').live('click', function() {
        // clone
        var row = jQuery(this).closest('.meta_box_repeatable').find('tbody tr:last-child');
        var clone = row.clone();
        clone.find('select.chosen').removeAttr('style', '').removeAttr('id', '').removeClass('chzn-done').data('chosen', null).next().remove();
        clone.find('input.regular-text, textarea, select').val('');
        clone.find('input[type=checkbox], input[type=radio]').attr('checked', false);
        row.after(clone);
        // increment name and id
        clone.find('input, textarea, select')
            .attr('name', function(index, name) {
                return name.replace(/(\d+)/, function(fullMatch, n) {
                    return Number(n) + 1;
                });
            });
        var arr = [];
        jQuery('input.repeatable_id:text').each(function(){ arr.push($(this).val()); }); 
        clone.find('input.repeatable_id')
            .val(Number(Math.max.apply( Math, arr )) + 1);
        if (!!$.prototype.chosen) {
            clone.find('select.chosen')
                .chosen({allow_single_deselect: true});
        }
        //
        return false;
    });
    
    jQuery('.meta_box_repeatable_remove').live('click', function(){
        jQuery(this).closest('tr').remove();
        return false;
    });

});