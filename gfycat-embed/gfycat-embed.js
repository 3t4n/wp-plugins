(
    function ($)
    {
        $(document).ready
        (
            function()
            {
                $('.gfycat-embed_video:not([autoplay])').each
                (
                    function(i)
                    {
                        addPlayButton($(this));
                    }
                );
        
                $('.gfycat-embed_video:not([loop])').each
                (
                    function(i)
                    {
                        if($(this).siblings('.gfycat-embed_play').size() == 0)
                        {
                            addPlayButton($(this),false);
                        }
                        
                        $(this).on('ended',function(e)
                            {
                                $(e.target).siblings('.gfycat-embed_play').css('display','block');
                            });
                    }
                );
                
                $('.gfycat-embed_shell').each
                (
                    function()
                    {
                        $(this).width($(this).children('video').width());
                        $(this).height($(this).children('video').height());
                    }
                );
            }
        );

        function addPlayButton(vid,show)
        {
            show = show == undefined ? true : show;

            var btn = $('<a href="#" class="gfycat-embed_play">&#9654;</a>');
            
            if(!show)
            {
                btn.css('display','none');
            }
            
            vid.parent().append(btn);
            
            btn.click(function(e)
            {
                e.preventDefault();
                
                $(e.target).css('display','none');
                $(e.target).siblings('video')[0].play();
                
                return false;
            })
        }
    }
)(jQuery);