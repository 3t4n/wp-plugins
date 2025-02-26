(function($){
        $(document).on('click','a[data-trigger="simple-slideout"]',function(e){
            e.preventDefault();
            //alert('hello');
            var target_panel = $('#simple-slideout-menu-panel');
            $('a[data-trigger="simple-slideout"]').toggleClass('active');
            var currentValue = $('body').attr('data-sideout_open');
            var newValue = currentValue === 'true' ? 'false' : 'true';
            $('body').attr('data-sideout_open',newValue);
            target_panel.toggleClass('open');
            return false;
        });

        $(document).on('click','#simple-slideout-menu-panel .slideout-menu li.menu-item-has-children > .child-menu-toggler',function(e){
            e.preventDefault();
            var link = $(this);
            var li = link.parent( 'li.menu-item-has-children' );
            li.toggleClass( 'open' );
        });

   $(document).on('click',function(e){
     var target = $(e.target);
     var menuPanel = $('#simple-slideout-menu-panel');
     if(menuPanel.hasClass('auto_close')){
                 if ( !target.closest(menuPanel).length && ! target.is('button, a') &&            $('body').attr('data-sideout_open') === 'true') {
                    menuPanel.find('[data-trigger="simple-slideout"]').click(); 
                 }
            }
   });
})(jQuery);