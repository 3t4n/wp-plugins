function findstartswith(inputlist, inputstring) {
    for (var il = 0; il < inputlist.length; il++) {
        if (inputlist[il].startsWith(inputstring)) {
            return il;
        }
    }
}

jQuery(document).ready(function ($) {
    /** progress bar */
    $('.progress .progress-bar').each(function () {
        var text = jQuery(this).attr('class'),
            ca = text.split(' ');

        index = findstartswith(ca, "progress-percent");
        a = ca[index].replace('progress-percent-', '');

        $(this).css("width", a + '%');

        var content = $(this).html();
        $(this).html(content + "<span class='percent'>" + a + "% </span>");

    });

    /** youtube popup */
    jQuery('.box-shadow-ripples, .youtube-popup-link').click(function () {
        var link = jQuery(this).find('a').attr('href');

        var iframeHtml = "<div class='youtube-popup'>";
        iframeHtml += "<div class='youtube-header'>X</div> <iframe src='" + link + "'> </iframe>";


        iframeHtml += "</div>";

        jQuery('body').append(iframeHtml);
    });

    jQuery('.youtube-popup .youtube-header').on('click', function () {
        jQuery('.youtube-popup').remove();
    })

    jQuery('body').on('click', '.youtube-popup .youtube-header', function () {
        jQuery('.youtube-popup').remove();
    })

    jQuery('.has-accordion :is(h2, h3, h4, h5, h6)').click(function () {
        jQuery(this).parent().toggleClass('active');
    });
})