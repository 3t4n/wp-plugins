jQuery( document ).ready(function ($) {
    $(".dropdowncloser").hide();
    var var1;
    $(".dropdownopener").on('click', function (e) {
        e.preventDefault();
        var1  = $(".dropdowntextholder").height();
        $('.dropdowntextholder').css('height', 'auto');
        var autoHeight = $('.dropdowntextholder').height();
        $('.dropdowntextholder').height(var1).animate({height: autoHeight}, 100);
        $(".dropdownopener").fadeOut();
        $(".dropdowncloser").fadeIn();
    });

    $(".dropdowncloser").on('click', function (e) {
        e.preventDefault();
        var var2 = var1;
        $(".dropdowntextholder").css("height",var2);
        $(".dropdowncloser").fadeOut();
        $(".dropdownopener").fadeIn();
    });
});
