jQuery( document ).ready( function($) {

    if ( typeof mlp_args !== "undefined" ) {

        const popup = $(mlp_args.selectors.popup);
        const regex = new RegExp(mlp_args.regex, 'i');

        $(`${mlp_args.selectors.main} form`).on('submit', function (event) {
            let field  = $(this).find(mlp_args.selectors.field),
                status = false;
            if ( field.val() ) {
                if ( regex.exec(field.val()) ) {
                    status = true;
                } else {
                    mlp_error_show(field,mlp_args.messages.invalid);
                }
            } else {
                mlp_error_show(field,mlp_args.messages.required);
            }
            if ( status === false ) {
                event.preventDefault();
                event.stopPropagation();
            }
        });

        document.addEventListener('click', (event) => {
            let action = $(event.target).attr('data-action');
            if ( $(event.target).hasClass(mlp_args.selectors.button.replace('.','')) ) {
                if ( action === 'popup' && ! popup.hasClass('active') ) {
                    popup.addClass('active');
                    popup.children().addClass('active');
                }
                else if ( action === 'delete' ) {
                    jQuery.post( mlp_args.ajax.url, mlp_args.ajax, function( response ){
                        $(mlp_args.selectors.field).val('');
                        popup.removeClass('active');
                        popup.children().removeClass('active');
                        $('[data-info="delete"]').remove();
                    });
                }
            }
            if ( event.target === popup[0] && popup.hasClass('active') || action === 'cancel' ) {
                popup.removeClass('active');
                popup.children().removeClass('active');
            }
        });
    }

});

function mlp_error_show( field, message )
{
    let item = field.next(),
        html = '<span class="error">message</span>';
    if ( item.length ) {
        item.html(message);
    } else {
        field.after(html.replace("message",message));
    }
}
