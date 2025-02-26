(function($) {
    $(document).ready( function() {
        const  wow = new WOW(
                    {
                      boxClass:     'wow',      // default
                      animateClass: 'animated', // default
                      offset:       0,          // default
                      mobile:       true,       // default
                      live:         true        // default
                    }
                );
         wow.init();
         $('a.showListApps').each(function (){
            $(this).on('click', function() {
                $('a.showListApps').removeClass('active');
                $(this).addClass('active');
                let idListApp = $(this).attr('title');
                showListApps(idListApp);
            });        
         });
        function showListApps(id){
            $('.auto-ketting .list-app-data').css('display','none');
            $("#" + id +"").css('display','block');
            
        }
    });
})( jQuery );

