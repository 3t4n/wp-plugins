(function($){
    $(window).load(function () {
        $('a').click(function(e){
            var BeforeLocation = $(location).attr('href');
            var OuterElementIdClass = $(this).parent().attr('id') + '_' + $(this).parent().attr('class') + '_' + $(this).parent().get(0).tagName;
            var ahref = $(this).attr('href');
            _gaq.push(['_trackEvent', BeforeLocation, OuterElementIdClass, ahref, 0, true]);
        });
    });
})(jQuery);
