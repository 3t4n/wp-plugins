jQuery( document ).ready(function() {
    // console.log( "tooltip-ready!" );
     tippy('.mytooltips', {
            content: function (reference) {
              const tid = reference.getAttribute('custom_shortcode');
              //const position = reference.getAttribute('position');
              //console.log(tid);
               return tid;
            },
        });
});