jQuery(document).ready(function($){
  $('.frame input').change(function() {
        var values = new Array();
        $("#results").empty();
        var result = new Array();
        $.each($(".frame input:checked"), function() {
                result.push($(this).attr("value"));
                $(this).parent().addClass('checked');
        });
        $('.field').val(result.join(','));
        $('.count-selected').text('Selected: '+result.length);
        $.each($(".frame input:not(:checked)"), function() {
                $(this).parent().removeClass('checked');
        });
  });
        var result = new Array();
        $.each($(".frame input:checked"), function() {
                result.push($(this).attr("value"));
                $(this).parent().addClass('checked');
        });
        $('.field').val(result.join(','));
        $('.count-selected').text('Selected: '+result.length);
        $.each($(".frame input:not(:checked)"), function() {
                $(this).parent().removeClass('checked');
        });
});