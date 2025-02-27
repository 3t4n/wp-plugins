(function ($) {

    $(document).ready(function(){

        // Color Picker
        $('.color-field').wpColorPicker();

        // Initilization of Select 2 JS
        $('.wpx-multiselect').select2();

        // Toggle for all icons

        $('.more-icons').on('click', function(e){

            var link = $(this);

            e.preventDefault();
            $('.all-icons').slideToggle('slow', function(){
              if ($(this).is(':visible')) {
                link.addClass('close');
              }
              else {
                link.removeClass('close');                
              }   
        });


        $( "#base-list li input[type='radio']" ).on( "click", function(){
            var icon = $(this).closest("li").find("i").attr( "class" );
            var prevIcon = $(".radiolist li i").attr( "class" );
            $(".radiolist li i").removeClass( prevIcon ).addClass( icon );
        });

      });


    });

})(jQuery);