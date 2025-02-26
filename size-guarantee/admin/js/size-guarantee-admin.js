(function ($) {
  "use strict";

  /**
   * All of the code for your admin-facing JavaScript source
   * should reside in this file.
   *
   * Note: It has been assumed you will write jQuery code here, so the
   * $ function reference has been prepared for usage within the scope
   * of this function.
   *
   * This enables you to define handlers, for when the DOM is ready:
   *
   * $(function() {
   *
   * });
   *
   * When the window is loaded:
   *
   * $( window ).load(function() {
   *
   * });
   *
   * ...and/or other possibilities.
   *
   * Ideally, it is not considered best practise to attach more than a
   * single DOM-ready or window-load handler for a particular page.
   * Although scripts in the WordPress core, Plugins and Themes may be
   * practising this, we should strive to set a better example in our own work.
   */

  $(document).ready(function () {
    // Apply select2 For Dropdown

    var namespace = "size_guarantee_";
    var $apikey = $("#size_guarantee_api_key");
    var $ValidationBtn = $("#apiValidation");
    var $validationMsg = $("#validationMsg");
    var $style = "#" + namespace + "list";
    var $accountLoadingIndicator = $(
      '<i class="close-r" aria-hidden="true"></i>'
    );
    var $accountLoadingIndicator1 = $(
      '<i class="close-x" aria-hidden="true"></i>'
    );
  
    $validationMsg.after($accountLoadingIndicator.hide());
    $validationMsg.after($accountLoadingIndicator1.hide());
    
    
    $ValidationBtn.click(function (e) {
      var val = $apikey.val();
      if (val) {
        $(".connectionLoader").show();
        $ValidationBtn.attr("disabled", "disabled");
        $apikey.attr("disabled", "disabled");
        $ValidationBtn.text("Checking...");
        $.ajax({
          url: ajaxurl,
          data: {
            action: "size_guarantee_validate_api_key",
            api_key: val,
          },
          method: "POST",
          success: function (response) {
            var result = $.parseJSON(response);
            if (!result.success) {
              $accountLoadingIndicator1.show();
              $accountLoadingIndicator1.html(
                '<span style="color:red">Invalid apikey</span>'
              );
              $accountLoadingIndicator.hide();
              // alert(result.message);
              $ValidationBtn.text("Validate");
              $ValidationBtn.removeAttr("disabled");
              $apikey.removeAttr("disabled");
            } else {
              $accountLoadingIndicator.show();
              $accountLoadingIndicator.html(
                '<br><span style="color:green">Connected to Size gurantee Successfully</span>'
              );
              $accountLoadingIndicator1.hide();
              location.reload();
            }
            $(".connectionLoader").hide();
          },
          error: function (error) {
            console.log(error);
          },
        });
      } else {
        alert("Please Enter API key!");
      }
    });
  });

  $(document).on("click", "#storeConnectBtn", function () {
    $("#storeConnectBtn").hide();
    $(".connectionLoader").show();
    var siteURL = $("#site_url").val();
    var type = "woocommerece";
    url = "test.php";
    $.ajax({
      url: url,
      type: "post",
      data: { siteURL: siteURL, type: type },
      success: function (response) {
        // You will get response from your PHP page (what you echo or print)
        // after success set store id
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      },
    });

    // Do ajax call here
  });
})(jQuery);

function divFunction() {
  alert("The js function was clicked.");
  //some code
}
