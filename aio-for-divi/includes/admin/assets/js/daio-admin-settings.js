(function($) {
  "use strict";

  /**
   * Divi AiO Tabs
   */
  $(".daio-nav-bar .daio-main-navigation a").on("click", function(e) {
    e.preventDefault();
    $(".daio-nav-bar .daio-main-navigation a").removeClass("link-active");
    $(this).addClass( "link-active" );
    var tab = $(this).attr("href");
    $(".daio-settings-content").removeClass("active-content");
    $(".daio-settings-contents")
    .find( tab )
    .addClass( "active-content" );
  });

  /**
   * Button 
   */
  var saveBtn = $( ".daio-header-right .daio-button" );

  $('.daio-checkbox input[type="checkbox"]').on("click", function(e) {
    saveBtn.addClass("save-now");
    saveBtn.removeAttr("disabled").css("cursor", "pointer");
  });

  /**
   * Ajax Save
   */
  $( ".daio-settings-save" ).on( "click", function(e) {

    e.preventDefault();

    var $this = $(this);

    if ( $this.hasClass("save-now") ) {

      $.ajax({

        url: daio_script_vars.ajaxurl,
        type: "post",

        data: {
          action: "save_settings_with_ajax",
          security: daio_script_vars.nonce,
          fields: $("form#daio-settings").serialize()
        },

        beforeSend: function() {
          $this.html(
            '<svg id="daio-spinner" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48"><circle cx="24" cy="4" r="4" fill="#fff"/><circle cx="12.19" cy="7.86" r="3.7" fill="#fffbf2"/><circle cx="5.02" cy="17.68" r="3.4" fill="#fef7e4"/><circle cx="5.02" cy="30.32" r="3.1" fill="#fef3d7"/><circle cx="12.19" cy="40.14" r="2.8" fill="#feefc9"/><circle cx="24" cy="44" r="2.5" fill="#feebbc"/><circle cx="35.81" cy="40.14" r="2.2" fill="#fde7af"/><circle cx="42.98" cy="30.32" r="1.9" fill="#fde3a1"/><circle cx="42.98" cy="17.68" r="1.6" fill="#fddf94"/><circle cx="35.81" cy="7.86" r="1.3" fill="#fcdb86"/></svg><span> Saving Data... </span>'
          );
        },

        success: function(response) {

          console.log( response );

          setTimeout( function() {

              $this.html("Save Now");

              swal(
                "All Settings Saved!",
                "Click OK to continue",
                "success"
              );

              saveBtn.removeClass("save-now");

          }, 1000);
        },

        error: function( response ) {
          console.log( response );

          swal("Oops...", "Something went wrong!", "error");
        }

      });

    } else {

      $(this)
      .attr("disabled", "true")
      .css("cursor", "not-allowed");
    }
  });

})(jQuery);