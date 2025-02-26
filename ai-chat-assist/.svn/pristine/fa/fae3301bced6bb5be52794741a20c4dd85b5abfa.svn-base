jQuery(document).ready(function ($) {
  $("#save_acachat_api_key").on("click", function () {
    $(this).prop("disabled", true).text("Saving...");
    var acachat_api_key = $("#acachat_api_key").val();
    const acachat_api_key_nonce = $("#acachat_api_key_nonce").val();
    $.post(
      chatAssist.ajax_url,
      {
        action: "save_acachat_api_key",
        acachat_api_key: acachat_api_key,
        acachat_api_key_nonce: acachat_api_key_nonce,
      },
      function (response) {
        $("#save_acachat_api_key").text("Save Changes").prop("disabled", false);
        if (response.success) {
          $("#response_message").html(
            '<span style="color: green;">' + response.data + "</span>"
          );
        } else {
          $("#response_message").html(
            '<span style="color: red;">' + response.data + "</span>"
          );
        }
        setTimeout(function () {
          $("#response_message").html("");
        }, 3000);
      }
    );
  });
});
