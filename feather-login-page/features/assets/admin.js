
$ = jQuery;



$(function() {
    $("#slug").on( "change", window.document, function(e) {
        
        const siteURL = $("#customLoginSiteURL");

        siteURL.html( siteURL.data("url") + $(this).val() );

    } );
});