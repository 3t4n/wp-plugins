jQuery(function($){
 $('.acf-faq-toggle h4').on('click', function(e){
    var answer = $(this).next('.acf-faq-toggle-info');

    if(!$(answer).is(":visible")) {
      $(this).parent().addClass('open');
    } else {
      $(this).parent().removeClass('open');
    }
    $(answer).slideToggle(300);
  });
});
