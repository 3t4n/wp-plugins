(function ($) {
  $(document).ready(function () {
    // console.info("xero sdk.js loaded");

    $(document).on(
      "click",
      ".xero-button-allow, .xero-button-skip, .xero-button-disallow",
      function () {
        let nonce = $(this)
            .closest(".xero-notice-data")
            .find("[name='nonce']")
            .val(),
          xero_name = $(this)
            .closest(".xero-notice-data")
            .find("[name='xero_name']")
            .val(),
          date_name = $(this)
            .closest(".xero-notice-data")
            .find("[name='xero_date_name']")
            .val(),
          allow_name = $(this)
            .closest(".xero-notice-data")
            .find("[name='xero_allow_name']")
            .val();

        $.ajax({
          url: ajaxurl,
          type: "POST",
          data: {
            action: "data_sdk_insights",
            button_val: this.value,
            nonce: nonce,
            xero_name: xero_name,
            date_name: date_name,
            allow_name: allow_name,
          },
          success: function (response) {
            console.log(response);
            if (response.status == "success") {
              location.reload();
            } else {
              alert(response.message);
            }
          },
        });
      }
    );

    $(document).on("click", ".xero-global-notice .notice-dismiss", function () {
      let nonce = $(this)
          .closest(".xero-notice-data")
          .find("[name='nonce']")
          .val(),
        xero_name = $(this)
          .closest(".xero-notice-data")
          .find("[name='xero_name']")
          .val();

      $.ajax({
        url: ajaxurl,
        type: "POST",
        data: {
          action: "xero_sdk_dismiss_notice",
          nonce: nonce,
          xero_name: xero_name,
        },
      });
    });

    /**
     * If find .xero-feedback-wrapper then add class on the same id of the feedback
     */
    if ($(".xero-feedback-wrapper").length) {
      $(".xero-feedback-wrapper").each(function () {
        let feedback_id = $(this).attr("id");
        $("#deactivate-" + feedback_id).addClass(
          "xero-feedback-deactivate-plugin-btn"
        );
      });
    }

    $(document).on(
      "click",
      ".xero-feedback-deactivate-plugin-btn",
      function (e) {
        e.preventDefault();
        let id = $(this).attr("id");

        $("#" + id.replace("deactivate-", "")).show();
      }
    );

    $(document).on("click", ".xero-feedback-submit-btn", function () {
      let $noticeData = $(this).closest(".xero-notice-data");

      let nonce = $noticeData.find("[name='nonce']").val(),
        xero_name = $noticeData.find("[name='xero_name']").val(),
        product_id = $noticeData.find("[name='product_id']").val(),
        public_key = $noticeData.find("[name='public_key']").val(),
        api_endpoint = $noticeData.find("[name='api_endpoint']").val(),
        deactivate_url = $(this).data("deactivate-url");

      let feedback_data = {};

      $noticeData.find("textarea, input[type='checkbox']").each(function () {
        const $input = $(this);
        const name = $input.attr("name");
        let value = $input.val();

        if ($input.attr("type") === "checkbox") {
          value = $input.is(":checked") ? "yes" : "no";
        }

        if (value !== "no" && value !== "") {
          feedback_data[name] = value;
        }
      });

      if (Object.keys(feedback_data).length === 0) {
        feedback_data["no_feedback"] = "yes";
      }

      $.ajax({
        url: ajaxurl,
        type: "POST",
        data: {
          action: "data_sdk_insights_deactivate_feedback",
          nonce: nonce,
          product_id: product_id,
          public_key: public_key,
          api_endpoint: api_endpoint,
          feedback: JSON.stringify(feedback_data),
        },
        success: function (response) {
          window.location.href = deactivate_url;
        },
      });
    });
  });
})(jQuery);
