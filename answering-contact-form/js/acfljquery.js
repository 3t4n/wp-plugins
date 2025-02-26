jQuery(function($){
 $('.acfl-toggle h4').on('click', function(e){
    var answer = $(this).next('.acfl-toggle-info');

    if(!$(answer).is(":visible")) {
      $(this).parent().addClass('open');
    } else {
      $(this).parent().removeClass('open');
    }
    $(answer).slideToggle(300);
  });
});

jQuery(document).ready(function($){
    $("#acfl_submit").bind("click", (function () {
        $("#acfl-submit-now").trigger("click");
    }));
});



