/**
 * Admin JavaScript for the WooCommerce Helper plugin
 *
 * @package    Easy_Store_Customizer
 * @subpackage Easy_Store_Customizer/admin/js
 */

(function ($) {
  "use strict";

  $(document).ready(function () {
    // Toggle feature settings visibility
    $('.esc-feature-control input[type="checkbox"]').on("change", function () {
      const $settings = $(this)
        .closest(".esc-feature-control")
        .find(".esc-feature-settings");
      if (this.checked) {
        $settings.addClass("active").slideDown(200);
      } else {
        $settings.removeClass("active").slideUp(200);
      }
    });

    const escSettingsForm = $("#esc-settings-form");

    escSettingsForm.on("submit", function (e) {
      e.preventDefault();

      const submitButton = $(this).find('input[type="submit"]');
      const originalText = submitButton.val();

      // Disable submit button and show loading state
      submitButton.prop("disabled", true).val("Saving...");

      // Collect form data
      const formData = new FormData(this);
      formData.append("action", "save_esc_settings");
      formData.append("nonce", escAjax.nonce);

      $.ajax({
        url: escAjax.ajaxurl,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          if (response.success) {
            // Show success message
            const messageDiv = $("<div>", {
              class: "notice notice-success is-dismissible",
              html: `<p>${response.data.message}</p>`,
            });

            escSettingsForm.after(messageDiv);
          } else {
            // Show error message
            const messageDiv = $("<div>", {
              class: "notice notice-error is-dismissible",
              html: `<p>${response.data.message}</p>`,
            });

            escSettingsForm.after(messageDiv);
          }
        },
        error: function () {
          // Show generic error message
          const messageDiv = $("<div>", {
            class: "notice notice-error is-dismissible",
            html: "<p>An error occurred while saving settings.</p>",
          });

          escSettingsForm.after(messageDiv);
        },
        complete: function () {
          // Re-enable submit button
          submitButton.prop("disabled", false).val(originalText);

          // Remove notices after 5 seconds
          setTimeout(function () {
            $(".notice").fadeOut(function () {
              $(this).remove();
            });
          }, 5000);
        },
      });
    });
  });
})(jQuery);
