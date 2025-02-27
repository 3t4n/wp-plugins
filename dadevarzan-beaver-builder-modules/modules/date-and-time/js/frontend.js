(function($){
    $( document ).ready(function() {

        $('.dadevarzan-date-and-time .dadevarzan-time').each(function() {
            var me = $(this);
            var dvTimer = setInterval(function() {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                if (m < 10) {m = "0" + m}
                if (s < 10) {s = "0" + s}
                me.html(h + ":" + m + ":" + s);
            }, 1000);
        });
    });
})(jQuery);
