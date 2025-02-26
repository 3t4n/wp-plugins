jQuery(function($) {
     /* CPT switch */
    $( '.ctp-switch' ).on( 'click', function() {
        var loader = $( this ).parent().next();
        
        loader.show();
            
        var main_control = $( this );
        var data = {
            'action'      : 'ctp_switch',
            'value'       : this.checked,
            'option_name' : main_control.attr( 'rel' )
        };

        $.post( ajaxurl, data, function( response ) {
            response = $.trim( response );

            if ( '1' == response ) {
                main_control.parent().parent().addClass( 'active' );
                main_control.parent().parent().removeClass( 'inactive' );
            } else if( '0' == response ) {
                main_control.parent().parent().addClass( 'inactive' );
                main_control.parent().parent().removeClass( 'active' );
            } else {
                alert( response );
            }
            loader.hide();
        });
    });
    /* CPT switch End */

    // Tabs
    $('.catchp_widget_settings .nav-tab-wrapper a').on('click', function(e){
        e.preventDefault();
        
        if( !$(this).hasClass('ui-state-active') ) {
            $('.nav-tab').removeClass('nav-tab-active');
            $('.wpcatchtab').removeClass('active').fadeOut(0);

            $(this).addClass('nav-tab-active');

            var anchorAttr = $(this).attr('href');

            $(anchorAttr).addClass('active').fadeOut(0).fadeIn(500);
        }

    });

    // jQuery Match Height init for sidebar spots
    $(document).ready(function() {
        $('.catchp-sidebar-spot .sidebar-spot-inner, .col-2 .catchp-lists li, .col-3 .catchp-lists li').matchHeight();
    });
     // jQuery UI Tooltip initializaion
    $(document).ready(function() {
        $('.tooltip').tooltip();
    });

    // Show Hide Toggle Box
    $(".option-content").hide();

    $(".open").show();

    $(".option-toggle").click(function(e){

        e.preventDefault();

        if( !$(this).hasClass('option-active') ){
            $('.option-toggle').removeClass('option-active');
            $('.option-content').hide(400);
            $(this).addClass('option-active');
            $(this).next().stop(true, true).slideToggle(400);

            var anchoID = $(this).offset().top;

            $("html, body").animate({ scrollTop: anchoID - 43}, "slow");

            return false;

        } else {
            $('.option-toggle').removeClass('option-active');
            $('.option-content').hide(400);
        }
    });

    $(function(){
        $("input[name='ajax_autosearch_options[layout]']").on('change', function(){
            if( $(this).val() === 'grid-layout' ) {
                $('tr.acs-column-tr').removeClass('hidden');
            } else {
                $('tr.acs-column-tr').addClass('hidden')
            }
        })
    });
});