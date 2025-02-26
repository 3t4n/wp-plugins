jQuery(document).ready(function ($) {
  $("#autochat-reset").on("click", function () {
    // Send an AJAX request to remove the option
    console.log("clicked");
    $.ajax({
      url: ajaxurl, // WordPress AJAX URL
      type: "POST",
      data: {
        action: "remove_tawk_to_script",
      },
      success: function (response) {
        if (response.success) {
          alert("Tawk.to script has been removed.");
        } else {
          alert("Failed to remove the script.");
        }
      },
    });
  });
});
