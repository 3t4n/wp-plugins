var $ = jQuery;
$(window).on('load', function(){
    $('.ht_service_style').each(function(){
        var $this = $(this);
        var $image = $this.attr('href');
        var $imageWrap = '<span class="ht_service_style_hover"><img src="'+$image+'" alt=""/></span>'
        var $parent = $this.closest('label');
        console.log($imageWrap);
        $this.hover(
            function() {
                $parent.append($imageWrap)
            }, function() {
                $parent.find('span').remove();
            }
        );
        $this.on('click', function(e){
            e.preventDefault();
            $this.closest('label').siblings('label').find('input').prop( "checked", false );
            $this.closest('label').find('input').prop( "checked", true );
        });

    });
});
    
