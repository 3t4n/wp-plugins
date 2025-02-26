(function(  ) {
    //console.log($('iframe').length, 'eeee');
    var iframes = $('iframe');
    if (iframes.length) {
        iframes.each(function() {
            var iContent = $(this).contents()
            iContent.find('body').on('click', '.aibuy_video_player', function(e) {
                e.preventDefault();
                e.stopPropagation();
                window.parent.aibuyPopup.setEditor();
                window.parent.aibuyPopup.setUrl($(this)[0].dataset.u);
                window.parent.aibuyPopup.setHeight($(this)[0].dataset.h);
                window.parent.aibuyPopup.setWidth($(this)[0].dataset.w);
                window.parent.aibuyPopup.setCurrentVideo($(this))
                window.parent.aibuyPopup.show();
            })
        })
    }
    // var iframe = $('#content_ifr').contents();
    // var i = iframe.find("img");
    // i.on('click', function(e) {
    //     e.preventDefault();
    //     e.stopPropagation();
    //     window.parent.popupTest.setEditor();
    //     window.parent.popupTest.show();
    //     console.log(window.parent);
    //     // var p = new Popup();
    //     // p.show();
    //
    // })

})(  );
