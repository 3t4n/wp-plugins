(function($) {

  $( document ).ready(function() {

    if ($('.tish-tab-item').length > 0) {

      $('<div />', {'class': 'simple-tabs-block'}).insertBefore( $('.tish-tab-item').first() );

      var tabUl = $('<ul />');

      $('.tish-tab-item').each(function(index, obj) {

        var li = $('<li />');

        var id = '#tabs-' + index;
        $('<a />', {href: id,
                    html: $(this).text()}).appendTo(li);

        li.appendTo(tabUl);

        $(this).remove();
      });

      tabUl.appendTo('.simple-tabs-block');

      $('.tish-tab-content').each(function(index, obj) {

        var id = 'tabs-' + index;

        $('<div />', {id: id,
                      html: $(this).html()}).appendTo('.simple-tabs-block');

        $(this).remove();
      });

      $('.simple-tabs-block').tabs({heightStyle:'auto'}); 
    }
  });

})(jQuery);
