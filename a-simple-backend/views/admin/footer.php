<script type="text/javascript">
    (function($, window) {
        /*
        Override Page/Post text editor confirm box
         */
        $(window).on('load mobileinit', function() {
            var i = setInterval(function () {
                if (typeof wp.autosave !== 'undefined' && typeof wp.autosave.server.postChanged !== 'undefined') {
                    i = clearInterval(i);

                    wp.autosave.server.postChanged = function () {
                        return false;
                    };
                }
            }, 100);
        });
    })(jQuery, window);
</script>