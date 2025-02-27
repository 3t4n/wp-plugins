jQuery(document).ready(function ($) {
  $("#cookie-tabs").tabs();

  $(".ccc-warning-popup-wrapper .warning-close-popup").on(
    "click",
    function (e) {
      e.preventDefault();
      $(this).closest(".ccc-warning-popup-wrapper").remove();
    }
  );

  $(".addRow").on("click", function (e) {
    e.preventDefault();

    var containerClass = $(this).data("class");

    $("<div/>", {
      class: containerClass,
      html: GetHtml(containerClass),
    })
      .hide()
      .appendTo("#" + containerClass + "Container")
      .slideDown("slow"); // Get the html from template and hide and slideDown for transtion.
  });

  $("body").on("click", ".removeRow", function (e) {
    e.preventDefault();

    var containerClass = $(this).data("class");

    $(this)
      .parents("td")
      .parents("tr")
      .parents("table")
      .parents("." + containerClass)
      .remove();
  });

  $("body").on("click", ".removeRow", function (e) {
    e.preventDefault();

    var containerClass = $(this).data("class");

    $(this)
      .parents("td")
      .parents("tr")
      .parents("table")
      .parents("." + containerClass)
      .remove();

    var len = $("#last-used-key-optionalCookies").attr("data-keyid") - 1;

    $("#last-used-key-optionalCookies").attr("data-keyid", len);
  });

  $("body").on("click", ".removeCookieCategory", function (e) {
    e.preventDefault();

    var containerClass = $(this).data("class");

    $(this).parent().parent().remove();

    var len = $("#last-used-key-optionalCookies").attr("data-keyid") - 1;

    $("#last-used-key-optionalCookies").attr("data-keyid", len);
  });

  // Get the template and update the input field names
  function GetHtml(containerClass) {
    var len =
      parseInt(jQuery("#last-used-key-" + containerClass).attr("data-keyid")) +
      1;
    jQuery("#last-used-key-" + containerClass).attr("data-keyid", len);

    var $html = jQuery("." + containerClass + "Template").clone();

    if (containerClass === "altLanguages") {
      $html
        .find("#cookiecontrol_settings\\[" + containerClass + "Text\\]")
        .prop(
          "name",
          "cookiecontrol_settings[" + containerClass + "Text][" + len + "]"
        );
      $html
        .find("#cookiecontrol_settings\\[" + containerClass + "Text\\]")
        .prop(
          "id",
          "cookiecontrol_settings[" + containerClass + "Text][" + len + "]"
        );
      $html
        .find("#cookiecontrol_settings\\[" + containerClass + "Mode\\]")
        .prop(
          "name",
          "cookiecontrol_settings[" + containerClass + "Mode][" + len + "]"
        );
      $html
        .find("#cookiecontrol_settings\\[" + containerClass + "Mode\\]")
        .prop(
          "id",
          "cookiecontrol_settings[" + containerClass + "Mode][" + len + "]"
        );
    }

    if (containerClass === "optionalCookies") {
      $html
        .find(
          "#cookiecontrol_settings\\[" + containerClass + "thirdPartyCookies\\]"
        )
        .prop(
          "id",
          "cookiecontrol_settings[" +
            containerClass +
            "thirdPartyCookies][" +
            len +
            "]"
        );
      $html
        .find("#cookiecontrol_settings\\[" + containerClass + "Name\\]")
        .prop(
          "name",
          "cookiecontrol_settings[" + containerClass + "Name][" + len + "]"
        );
      $html
        .find("#cookiecontrol_settings\\[" + containerClass + "Name\\]")
        .prop(
          "id",
          "cookiecontrol_settings[" + containerClass + "Name][" + len + "]"
        )
        .prop("required", true);
      $html
        .find("#cookiecontrol_settings\\[" + containerClass + "Label\\]")
        .prop(
          "name",
          "cookiecontrol_settings[" + containerClass + "Label][" + len + "]"
        );
      $html
        .find("#cookiecontrol_settings\\[" + containerClass + "Label\\]")
        .prop(
          "id",
          "cookiecontrol_settings[" + containerClass + "Label][" + len + "]"
        )
        .prop("required", true);
      $html
        .find("#cookiecontrol_settings\\[" + containerClass + "Description\\]")
        .prop(
          "name",
          "cookiecontrol_settings[" +
            containerClass +
            "Description][" +
            len +
            "]"
        );
      $html
        .find("#cookiecontrol_settings\\[" + containerClass + "Description\\]")
        .prop(
          "id",
          "cookiecontrol_settings[" +
            containerClass +
            "Description][" +
            len +
            "]"
        );
      $html
        .find("#cookiecontrol_settings\\[" + containerClass + "Array\\]")
        .prop(
          "name",
          "cookiecontrol_settings[" + containerClass + "Array][" + len + "]"
        );
      $html
        .find("#cookiecontrol_settings\\[" + containerClass + "Array\\]")
        .prop(
          "id",
          "cookiecontrol_settings[" + containerClass + "Array][" + len + "]"
        );

      $html
        .find(
          "#cookiecontrol_settings\\[" +
            containerClass +
            "thirdPartyCookiesName\\]"
        )
        .prop(
          "name",
          "cookiecontrol_settings[" +
            containerClass +
            "thirdPartyCookiesName][" +
            len +
            "]"
        );
      $html
        .find(
          "#cookiecontrol_settings\\[" +
            containerClass +
            "thirdPartyCookiesName\\]"
        )
        .prop(
          "id",
          "cookiecontrol_settings[" +
            containerClass +
            "thirdPartyCookiesName][" +
            len +
            "]"
        );

      $html
        .find(
          "#cookiecontrol_settings\\[" +
            containerClass +
            "thirdPartyCookiesUrl\\]"
        )
        .prop(
          "name",
          "cookiecontrol_settings[" +
            containerClass +
            "thirdPartyCookiesUrl][" +
            len +
            "]"
        );
      $html
        .find(
          "#cookiecontrol_settings\\[" +
            containerClass +
            "thirdPartyCookiesUrl\\]"
        )
        .prop(
          "id",
          "cookiecontrol_settings[" +
            containerClass +
            "thirdPartyCookiesUrl][" +
            len +
            "]"
        );

      $html
        .find("#cookiecontrol_settings\\[" + containerClass + "onAccept\\]")
        .prop(
          "name",
          "cookiecontrol_settings[" + containerClass + "onAccept][" + len + "]"
        );
      $html
        .find("#cookiecontrol_settings\\[" + containerClass + "onAccept\\]")
        .prop(
          "id",
          "cookiecontrol_settings[" + containerClass + "onAccept][" + len + "]"
        );

      $html
        .find("#cookiecontrol_settings\\[" + containerClass + "onRevoke\\]")
        .prop(
          "name",
          "cookiecontrol_settings[" + containerClass + "onRevoke][" + len + "]"
        );
      $html
        .find("#cookiecontrol_settings\\[" + containerClass + "onRevoke\\]")
        .prop(
          "id",
          "cookiecontrol_settings[" + containerClass + "onRevoke][" + len + "]"
        );

      $html
        .find(
          "#cookiecontrol_settings\\[" +
            containerClass +
            "initialConsentState\\]"
        )
        .prop(
          "name",
          "cookiecontrol_settings[" +
            containerClass +
            "initialConsentState][" +
            len +
            "]"
        );
      $html
        .find(
          "#cookiecontrol_settings\\[" +
            containerClass +
            "initialConsentState\\]"
        )
        .prop(
          "id",
          "cookiecontrol_settings[" +
            containerClass +
            "initialConsentState][" +
            len +
            "]"
        );

      $html
        .find("#cookiecontrol_settings\\[" + containerClass + "lawfulBasis\\]")
        .prop(
          "name",
          "cookiecontrol_settings[" +
            containerClass +
            "lawfulBasis][" +
            len +
            "]"
        );
      $html
        .find("#cookiecontrol_settings\\[" + containerClass + "lawfulBasis\\]")
        .prop(
          "id",
          "cookiecontrol_settings[" +
            containerClass +
            "lawfulBasis][" +
            len +
            "]"
        );

      $html
        .find(
          "#cookiecontrol_settings\\[" + containerClass + "thirdPartyCookies\\]"
        )
        .prop(
          "name",
          "cookiecontrol_settings[" +
            containerClass +
            "thirdPartyCookies][" +
            len +
            "]"
        );
      $html
        .find(
          "#cookiecontrol_settings\\[" + containerClass + "thirdPartyCookies\\]"
        )
        .prop(
          "id",
          "cookiecontrol_settings[" +
            containerClass +
            "thirdPartyCookies][" +
            len +
            "]"
        );

      $html
        .find("#cookiecontrol_settings\\[" + containerClass + "VendorName\\]")
        .prop(
          "name",
          "cookiecontrol_settings[" +
            containerClass +
            "VendorName][" +
            len +
            "]"
        );
      $html
        .find("#cookiecontrol_settings\\[" + containerClass + "VendorName\\]")
        .prop(
          "id",
          "cookiecontrol_settings[" +
            containerClass +
            "VendorName][" +
            len +
            "]"
        );

      $html
        .find("#cookiecontrol_settings\\[" + containerClass + "VendorUrl\\]")
        .prop(
          "name",
          "cookiecontrol_settings[" + containerClass + "VendorUrl][" + len + "]"
        );
      $html
        .find("#cookiecontrol_settings\\[" + containerClass + "VendorUrl\\]")
        .prop(
          "id",
          "cookiecontrol_settings[" + containerClass + "VendorUrl][" + len + "]"
        );

      $html
        .find(
          "#cookiecontrol_settings\\[" + containerClass + "VendorDescription\\]"
        )
        .prop(
          "name",
          "cookiecontrol_settings[" +
            containerClass +
            "VendorDescription][" +
            len +
            "]"
        );
      $html
        .find(
          "#cookiecontrol_settings\\[" + containerClass + "VendorDescription\\]"
        )
        .prop(
          "id",
          "cookiecontrol_settings[" +
            containerClass +
            "VendorDescription][" +
            len +
            "]"
        );

      $html
        .find(
          "#cookiecontrol_settings\\[" +
            containerClass +
            "VendorThirdPartyCookies\\]"
        )
        .prop(
          "name",
          "cookiecontrol_settings[" +
            containerClass +
            "VendorThirdPartyCookies][" +
            len +
            "]"
        );
      $html
        .find(
          "#cookiecontrol_settings\\[" +
            containerClass +
            "VendorThirdPartyCookies\\]"
        )
        .prop(
          "id",
          "cookiecontrol_settings[" +
            containerClass +
            "VendorThirdPartyCookies][" +
            len +
            "]"
        );
    }

    $html
      .find("#cookiecontrol_settings\\[" + containerClass + "\\]")
      .prop(
        "name",
        "cookiecontrol_settings[" + containerClass + "][" + len + "]"
      );
    $html
      .find("#cookiecontrol_settings\\[" + containerClass + "\\]")
      .prop(
        "id",
        "cookiecontrol_settings[" + containerClass + "][" + len + "]"
      );

    return $html.html();
  }

  var $accCount = 1;
  $(".optionalCookies").each(function () {
    $(this).find(".ccc-title h3 span").text($accCount);
    $accCount++;
  });

  $(".ccc-accordion")
    .find(".ccc-title")
    .on("click", function () {
      $(this).parent().parent().find(".ccc-content").slideToggle(400);
      $(this)
        .find("i")
        .text($(this).find("i").text() == "+" ? "-" : "+")
        .fadeIn();
    });

  $(document).on("click", ".more-opt-link", function (e) {
    e.preventDefault();
    lenOptLink =
      $(this).parent().parent().find(".thirdPartyCookiesGroup-down").length + 1;
    // lenOptLink++;
    var countOpt = $(this).closest(".data-number").data("number");
    $(this).before(
      '<span class="thirdPartyCookiesGroup thirdPartyCookiesGroup-down thirdPartyCookiesGroupVal">' +
        '<input type="text" class="optOutLink-field1 optOutLinkNameDynamic" placeholder="eg. Name" name="cookiecontrol_settings[optionalCookiesthirdPartyCookiesName' +
        countOpt +
        "][" +
        lenOptLink +
        ']"  id="cookiecontrol_settings[optionalCookiesthirdPartyCookiesName' +
        countOpt +
        "][" +
        lenOptLink +
        ']" size="50" />' +
        '<input type="text" class="optOutLink-field1 optOutLinkUrlDynamic" placeholder="eg. optOutLink" name="cookiecontrol_settings[optionalCookiesthirdPartyCookiesUrl' +
        countOpt +
        "][" +
        lenOptLink +
        ']"  id="cookiecontrol_settings[optionalCookiesthirdPartyCookiesUrl' +
        countOpt +
        "][" +
        lenOptLink +
        ']" size="50" />' +
        '<a href="#" class="remove-opt-link">' +
        '<div class="dashicons dashicons-dismiss"><span class="screen-reader-text">Remove</span></div> Remove optOutlink</a>' +
        "</span>"
    );
  });

  $(document).on("click", ".more-category-vendors", function (e) {
    e.preventDefault();
    lenOptLink =
      $(this).parent().parent().find(".categoryVendor-down").length + 1;
    // lenOptLink++;
    var countOpt = $(this).closest(".data-number").data("number");
    $(this).before(
      '<div class="categoryVendor categoryVendor-down categoryVendorVal">' +
        '<input type="text" class="categoryVendorFieldDynamic" placeholder="eg. Name" name="cookiecontrol_settings[optionalCookiesVendorName' +
        countOpt +
        "][" +
        lenOptLink +
        ']"  id="cookiecontrol_settings[optionalCookiesVendorName' +
        countOpt +
        "][" +
        lenOptLink +
        ']" size="50" /><br><br>' +
        '<input type="text" class="categoryVendorFieldDynamic" placeholder="eg. Description" name="cookiecontrol_settings[optionalCookiesVendorDescription' +
        countOpt +
        "][" +
        lenOptLink +
        ']"  id="cookiecontrol_settings[optionalCookiesVendorDescription' +
        countOpt +
        "][" +
        lenOptLink +
        ']" size="50" /><br><br>' +
        '<input type="text" class="categoryVendorFieldDynamic" placeholder="eg. Url" name="cookiecontrol_settings[optionalCookiesVendorUrl' +
        countOpt +
        "][" +
        lenOptLink +
        ']"  id="cookiecontrol_settings[optionalCookiesVendorUrl' +
        countOpt +
        "][" +
        lenOptLink +
        ']" size="50" /><br><br>' +
        '<label for="cookiecontrol_settings[optionalCookiesVendorThirdPartyCookies' +
        countOpt +
        "][" +
        lenOptLink +
        ']">Third party cookies</label>' +
        '<input type="radio" class="first" value="true" name="cookiecontrol_settings[optionalCookiesVendorThirdPartyCookies' +
        countOpt +
        "][" +
        lenOptLink +
        ']"  id="cookiecontrol_settings[optionalCookiesVendorThirdPartyCookies' +
        countOpt +
        "][" +
        lenOptLink +
        ']"/>' +
        "Yes" +
        '<input type="radio"  value="false" name="cookiecontrol_settings[optionalCookiesVendorThirdPartyCookies' +
        countOpt +
        "][" +
        lenOptLink +
        ']"  id="cookiecontrol_settings[optionalCookiesVendorThirdPartyCookies' +
        countOpt +
        "][" +
        lenOptLink +
        ']" checked />' +
        "No" +
        '<a href="#" class="remove-category-vendor">' +
        '<div class="dashicons dashicons-dismiss"><span class="screen-reader-text">Remove</span></div> Remove Vendor</a>' +
        "</div>"
    );
  });

  $("#form-settings-main").submit(function (event) {
    event.preventDefault(); // this will prevent the default submit
    $(".optionalInfoCookies").each(function () {
      var nameVal = $(this).find(".optOutLinkNameDynamic").val();
      var that = $(this);
      var nameVal = $(this).find(".optOutLinkNameDynamic").val();
      var urlVal = $(this).find(".optOutLinkUrlDynamic").val();
      if (nameVal.trim() == "" || urlVal.trim() == "") {
        that.find(".thirdPartyCookieFinalUrl").val("");
      }
    });
    $(this).unbind("submit").submit(); // continue the submit unbind preventDefault
  });

  $("#form-reset-main").submit(function (event) {
    event.preventDefault(); // this will prevent the default submit

    if (
      confirm(
        "Are you sure you want to reset your Settings? All your changes will be lost"
      )
    ) {
      $(this).unbind("submit").submit();
    } else {
      // Do nothing!
    }
  });

  $(document).on("click", ".remove-opt-link", function (e) {
    e.preventDefault();
    $(this).parent().remove();
  });

  $(document).on("click", ".remove-category-vendor", function (e) {
    e.preventDefault();
    $(this).parent().remove();
  });

  $(".pro-check, .multi-check").on("click", function () {
    $(".hide-com").show();
  });

  $(".com-check").on("click", function () {
    $(".hide-com").hide();
  });

  $(".ccc-datepicker").datepicker({ dateFormat: "dd/mm/yy" });

  $(document).on("keyup", ".ccc-content-cat .cookie-label-field", function () {
    var cookieLabelField = $(this).val();
    var cookieKeyId = $("#last-used-key-optionalCookies").attr("data-keyid");
    var cookieCatLabel = $(this)
      .closest(".optionalCookies")
      .find(".ccc-title-catlabel");
    $(this)
      .closest(".optionalCookies")
      .find(".ccc-title-number")
      .text(cookieKeyId);
    if (cookieLabelField) {
      cookieCatLabel.text("(" + cookieLabelField + ")");
    } else {
      cookieCatLabel.text("");
    }
  });

  /* Version 9 */

  $(".cookiecontrol_settings_iab_v9").on("change", function () {
    switch ($(this).val()) {
      case "true":
        $("#cookie-tabs .cookie-optional-tab").addClass("hidden_cookie_tab");
        break;
      case "false":
        $("#cookie-tabs .cookie-optional-tab").removeClass("hidden_cookie_tab");
        break;
    }
  });

  $(".cookiecontrol_settings_govuk_v9").on("change", function () {
    switch ($(this).val()) {
      case "GOVUK":
        $(".govuk-hide-element").addClass("govuk-hide-element-hide");
        $(".govuk-show-element").addClass("govuk-hide-element-show");
        break;
      default:
        $(".govuk-hide-element").removeClass("govuk-hide-element-hide");
        $(".govuk-show-element").removeClass("govuk-hide-element-show");
    }
  });

  if ($(".cookiecontrol_settings_api_key_version").length) {
    $(".cookiecontrol_settings_api_key_version").on("change", function (e) {
      var verionValue = $(this).val();
      if (confirm("Are you sure you want to change your Api version Key?")) {
        $("#ccc_api_version_form_submit").val(verionValue);
        $("#ccc_save_form_submit ").trigger("click");
      } else {
        var versionChecked = $("#ccc_api_version_form_submit").val();
        $("#ccc_radio_api_key_version_" + versionChecked)
          .prop("checked", true)
          .trigger("click");
      }
    });
  }

  $("#ccc_calculate_vendors_button").on("click", function (e) {
    e.preventDefault();
    var checkedTerritorials = $(
      "#iab-generate-vendors .territorial-scope-input:checkbox:checked"
    )
      .map(function () {
        return this.value.toLowerCase();
      })
      .get();

    var checkedEnviroments = $(
      "#iab-generate-vendors .environment-input:checkbox:checked"
    )
      .map(function () {
        return this.value.toLowerCase();
      })
      .get();

    var checkedServices = $(
      "#iab-generate-vendors .service-input:checkbox:checked"
    )
      .map(function () {
        return this.value.toLowerCase();
      })
      .get();

    if (
      checkedTerritorials.length > 0 ||
      checkedEnviroments.length > 0 ||
      checkedServices.length > 0
    ) {
      $.getJSON(
        "https://cc.cdn.civiccomputing.com/vl/v2/additional-vendor-information-list.json",
        function (data) {
          var vendors = Object.values(data.vendors);

          var filteredData = vendors
            .filter(
              (vendor) =>
                (vendor.territorialScope?.some((territorial) =>
                  checkedTerritorials.includes(territorial.toLowerCase())
                ) ||
                  checkedTerritorials.length === 0) &&
                (vendor.environments?.some((enviroment) =>
                  checkedEnviroments.includes(enviroment.toLowerCase())
                ) ||
                  checkedEnviroments.length === 0) &&
                (vendor.serviceTypes?.some((service) =>
                  checkedServices.includes(service.toLowerCase())
                ) ||
                  checkedServices.length === 0)
            )
            .map((vendor) => vendor.id);

          $(".iab-include-vendors").val(
            "[" + filteredData.map((num) => `"${num}"`) + "]"
          );
          $(".iab-include-vendors-text")
            .removeClass("hide")
            .find(".iab-include-vendors-span")
            .text(filteredData.length + " vendors.");
          $(".iab-include-vendors-error").addClass("hide");
        }
      );
    } else {
      $(".iab-include-vendors-error").removeClass("hide");
    }
  });
});
