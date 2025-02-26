(function( $ ) {
    $(function() {

    function onepageIconSelect() {
        $('select.onepage-lite-iconselect, .customize-control.customize-control-select select').each(function(){
            $(this).select2({
                templateResult: function(state) {
                    if (!state.id) return state.text; // optgroup
                    return '<i class="fa fa-' + state.id + '"></i>&nbsp;&nbsp;' + state.text;
                },
                templateSelection: function(state) {
                    if (!state.id) return state.text; // optgroup
                    return '<i class="fa fa-' + state.id + '"></i>&nbsp;&nbsp;' + state.text;
                },
                escapeMarkup: function(m) { return m; }
            });
        });
    }

    onepageIconSelect();

    $(document).on('widget-added widget-updated', function(e) {
        onepageIconSelect();
    });

    });
})( jQuery );