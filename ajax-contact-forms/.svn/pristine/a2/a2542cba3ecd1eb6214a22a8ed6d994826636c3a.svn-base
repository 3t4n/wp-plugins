jQuery(document).ready(function($) {

    $(".acfw30_popup_contact_form").submit(function() {
    	var form_id = $(this).attr('id');
    	var id = form_id.replace(/acfw30_popup_contact_form_/g, '');
    	var acfw30_msg = $('#'+form_id+' .acfw30_success_message').val();

        console.log(form_id);
        console.log(id);

    	var inputs_array = $('#'+form_id+' input').map(function () {
            return $(this).attr('name')+" %% "+$(this).val();
        }).get();

        var textareas_array = $('#'+form_id+' textarea').map(function () {
            return $(this).attr('name')+" %% "+$(this).val();
        }).get();

    	var inputs = inputs_array.join('~');
        var textareas = textareas_array.join('~');

    	jQuery.post(
            ajax_object.ajax_url,
            {'action':'acfw30_send', 'id': id, 'inputs': inputs, 'textareas': textareas },
            function(data) {
                $('#'+form_id)[0].reset();
                $('#'+form_id+' .acfw30_close_modal_min').remove();
                $('#'+form_id).prepend('<a href="#close" class="acfw30_close_modal_min"></a><p class="msg_ok">'+acfw30_msg+'</p>');
            }
        );

		return false;
	});

    $(".acfw30_contact_form").submit(function() {
        var form_id = $(this).attr('id');
        var id = form_id.replace(/acfw30_contact_form_/g, '');
        var acfw30_msg = $('#'+form_id+' .acfw30_success_message').val();

        console.log(form_id);
        console.log(id);

        var inputs_array = $('#'+form_id+' input').map(function () {
            return $(this).attr('name')+" %% "+$(this).val();
        }).get();

        var textareas_array = $('#'+form_id+' textarea').map(function () {
            return $(this).attr('name')+" %% "+$(this).val();
        }).get();

        var inputs = inputs_array.join('~');
        var textareas = textareas_array.join('~');

        jQuery.post(
            ajax_object.ajax_url,
            {'action':'acfw30_send', 'id': id, 'inputs': inputs, 'textareas': textareas },
            function(data) {
                $('#'+form_id)[0].reset();
                $('#'+form_id).prepend('<p class="msg_ok">'+acfw30_msg+'</p>');
            }
        );

        return false;
    });
    
});