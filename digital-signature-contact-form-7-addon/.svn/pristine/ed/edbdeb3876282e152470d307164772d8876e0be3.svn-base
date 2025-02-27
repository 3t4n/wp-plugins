var esigCf7 = {
    setCookie: function (cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    },
    getCookie: function (name) {
        var pattern = RegExp(name + "=.[^;]*")
        matched = document.cookie.match(pattern)
        if (matched) {
            var cookie = matched[0].split('=')
            return cookie[1]
        }
        return false
    },
    unsetCookie: function (name) {
       
        //document.cookie = name + "=" + +"; " + expires;
        document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }
};
(function ($) {



    document.addEventListener('wpcf7mailsent', function (event) {
        var url = esigCf7.getCookie('esig-cf7-redirect');
        if (url) {
            esigCf7.unsetCookie('esig-cf7-redirect');
            location = decodeURIComponent(url);
        }
    }, false);


})(jQuery);

