jQuery(document).ready(function( $ ) {
    function update_short_code() {
        var type = parseInt($('#coinlib-widget-type').val());
        if (type < 0 || type > 4) type = 0;
        var dark = parseInt($('#coinlib-widget-theme').val() == 'light' ? 0 : 1);
        var coinid = parseInt($('#coinlib-widget-coinid').data('coinid'));
        var prefcoinid = parseInt($('#coinlib-widget-prefcoinid').data('prefcoinid'));
        var width = parseInt($('#coinlib-widget-width').val());
        var coincount = parseInt($('#coinlib-widget-coincount').val());
        var graph = parseInt($('#coinlib-widget-graph').val());
        var height = parseInt($('#coinlib-widget-height').val());
        var shortcode = '';
        $('.coinlib-widget-selector').hide();
        if (type == 0) {
            $('.coinlib-widget-coinid-selector').show();
            $('.coinlib-widget-prefcoinid-selector').show();
            $('.coinlib-widget-width-selector').show();
            shortcode = '[coinlib-widget type=0 coinid=' + coinid + ' prefcoinid=' + prefcoinid +
                ' width=' + width + ' dark=' + dark + ']';
        } else if (type == 1) {
            $('.coinlib-widget-coinid-selector').show();
            $('.coinlib-widget-prefcoinid-selector').show();
            shortcode = '[coinlib-widget type=1 coinid=' + coinid + ' prefcoinid=' + prefcoinid + ' dark=' + dark + ']';
        } else if (type == 2) {
            $('.coinlib-widget-width-selector').show();
            shortcode = '[coinlib-widget type=2 width=' + width + ' dark=' + dark + ']';
        } else if (type == 3) {
            $('.coinlib-widget-prefcoinid-selector').show();
            shortcode = '[coinlib-widget type=3 prefcoinid=' + prefcoinid + ' dark=' + dark + ']';
        } else if (type == 4) {
            $('.coinlib-widget-coincount-selector').show();
            $('.coinlib-widget-prefcoinid-selector').show();
            $('.coinlib-widget-graph-selector').show();
            $('.coinlib-widget-height-selector').show();
            shortcode = '[coinlib-widget type=4 prefcoinid=' + prefcoinid + ' coincount=' + coincount + ' graph=' + graph + ' dark=' + dark + ' height=' + height + ']';
        } else {
            shortcode = '';
        }
        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: { action: 'coinlib_widget_ajax_parse' , shortcode: shortcode }
        }).done(function( msg ) {
            $('#coinlib-preview').html(msg.html);
            $('#coinlib-shortcode').val(shortcode);
        });
    }
    
    $(".coinlib-widget-sel").change(function() {
        update_short_code();
    });

    var availableCoins = JSON.parse(atob($('#coinlib-widget-coinlist').attr('value')));
    $( "#coinlib-widget-coinid" ).autocomplete({
        source: availableCoins,
        minLength: 0,
        focus: function( event, ui ) {
            $("#coinlib-widget-coinid").val(ui.item.label);
            $("#coinlib-widget-coinid").data('coinid', ui.item.value);
            return false;
        },
        select: function( event, ui ) {
            $("#coinlib-widget-coinid").val(ui.item.label);
            $("#coinlib-widget-coinid").data('coinid', ui.item.value);
            return false;
        },
    }).on( "autocompleteselect", function( event, ui ) {
        update_short_code();
    } );

    $( "#coinlib-widget-prefcoinid" ).autocomplete({
        source: availableCoins,
        minLength: 0,
        focus: function( event, ui ) {
            $("#coinlib-widget-prefcoinid").val(ui.item.label);
            $("#coinlib-widget-prefcoinid").data('prefcoinid', ui.item.value);
            return false;
        },
        select: function( event, ui ) {
            $("#coinlib-widget-prefcoinid").val(ui.item.label);
            $("#coinlib-widget-prefcoinid").data('prefcoinid', ui.item.value);
            return false;
        },
    }).on( "autocompleteselect", function( event, ui ) {
        update_short_code();
    } );
});
