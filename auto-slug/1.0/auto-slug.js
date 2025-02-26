
(function($) {
    var scripts = document.getElementsByTagName("script"),
        urlToGenerator = scripts[scripts.length-1].src;
        urlToGenerator = urlToGenerator.substring(0, urlToGenerator.lastIndexOf("/"))+'/generator.php';

    $(function() {
        var timeout = false;
        var $title = $('#title');
        var $newPostSlug = $('#new-post-slug');
        var $editablePostName = $('#editable-post-name');
        var $editablePostNameFull = $('#editable-post-name-full');
        $title.on('input', function(){
            if(timeout) {
                clearTimeout(timeout);
            }

            timeout = setTimeout(function(){
                $.post(urlToGenerator, {q: $title.val()}, function(slug){
                    $newPostSlug.val(slug);
                    var postNameFull = slug;
                    var postName = postNameFull;
                    if(postName.length>28) {
                        postName = postName.substr(0, 14) + '...' + postName.substr(postName.length-14);
                    }
                    $editablePostName.text(postName);
                    $editablePostNameFull.text(postNameFull);
                });
            }, 300);
        });
    });
})(jQuery);
