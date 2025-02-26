jQuery(document).ready(function ($) {
  // Initialize sortable for all ordered multiselect lists
  $(".jetapi-ordered-multiselect").sortable({
    update: function (event, ui) {
      $(this)
        .find('input[type="hidden"]')
        .each(function (index) {
          $(this).val($(this).closest("li").data("value"))
        })
    },
  })

  // Function to toggle field states
  function toggleFieldStates(context) {
    var useJetAPIChannels = $("#jeti_use_jetapi_channels").is(":checked")
    var fieldsToToggle = [
      "#jeti_channel_whatsapp",
      "#jeti_channel_telegram",
      "#jeti_channel_sms",
    ]

    if (context === "bulk") {
      fieldsToToggle = [".jeti_bulk_channel"]
    }

    fieldsToToggle.forEach(function (fieldId) {
      var field = $(fieldId)
      var fieldWrapper = field.closest("tr")

      if (useJetAPIChannels) {
        field.prop("disabled", true)
        fieldWrapper.addClass("disabled-field")
      } else {
        field.prop("disabled", false)
        fieldWrapper.removeClass("disabled-field")
      }
    })

    // Toggle cascade sending list
    var cascadeSendingList =
      context === "bulk"
        ? $("#jeti_bulk_cascade_order")
        : $("#jeti_cascade_sending_list")
    if (useJetAPIChannels) {
      cascadeSendingList.sortable("disable")
      cascadeSendingList.closest("tr").addClass("disabled-field")
    } else {
      cascadeSendingList.sortable("enable")
      cascadeSendingList.closest("tr").removeClass("disabled-field")
    }
  }

  // Initial state setup
  if ($("#jeti_settings_form").length) {
    toggleFieldStates("settings")
  } else if ($("#jeti_bulk_messaging_form").length) {
    toggleFieldStates("bulk")
  }

  // Listen for changes on the JetAPI Channels checkbox
  $("#jeti_use_jetapi_channels").change(function () {
    if ($("#jeti_settings_form").length) {
      toggleFieldStates("settings")
    } else if ($("#jeti_bulk_messaging_form").length) {
      toggleFieldStates("bulk")
    }
  })

  // Bulk messaging specific functionality
  if ($("#jeti_bulk_messaging_form").length) {
    $('input[name="jeti_recipient_type"]').change(function () {
      if ($(this).val() === "manual") {
        $("#jeti_manual_recipients").show()
        $("#jeti_wc_customers").hide()
      } else {
        $("#jeti_manual_recipients").hide()
        $("#jeti_wc_customers").show()
      }
    })

    $("#jeti_select_all_customers").change(function () {
      $(".jeti_customer_checkbox").prop("checked", $(this).prop("checked"))
    })

    $(".jeti_customer_checkbox").change(function () {
      if (!$(this).prop("checked")) {
        $("#jeti_select_all_customers").prop("checked", false)
      } else {
        var allChecked =
          $(".jeti_customer_checkbox:checked").length ===
          $(".jeti_customer_checkbox").length
        $("#jeti_select_all_customers").prop("checked", allChecked)
      }
    })

    $("#jeti_bulk_cascade_order").sortable({
      update: function (event, ui) {
        updateCascadeOrder()
      },
    })

    function updateCascadeOrder() {
      $("#jeti_bulk_cascade_order li").each(function (index) {
        $(this)
          .find('input[type="hidden"]')
          .attr("name", "jeti_bulk_cascade_order[" + index + "]")
      })
    }
  }
})
