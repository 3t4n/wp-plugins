"use strict";

//nav-bar slope promotions
function activate_page_setting_promotions() {
  jQuery(".slope-setting-container-promotions").css("display", "block");
  jQuery(".slope-style-container-promotions").css("display", "none");
  jQuery(".slope-layout-container-promotions").css("display", "none");
  jQuery("#setting_page_promotions_select").addClass("nav-tab-active");
  jQuery("#style_page_promotions_select").removeClass("nav-tab-active");
  jQuery("#layout_page_promotions_select").removeClass("nav-tab-active");
}

function activate_page_style_promotions() {
  jQuery(".slope-setting-container-promotions").css("display", "none");
  jQuery(".slope-style-container-promotions").css("display", "block");
  jQuery(".slope-layout-container-promotions").css("display", "none");
  jQuery("#setting_page_promotions_select").removeClass("nav-tab-active");
  jQuery("#style_page_promotions_select").addClass("nav-tab-active");
  jQuery("#layout_page_promotions_select").removeClass("nav-tab-active");
}

function activate_page_layout_promotions() {
  jQuery(".slope-setting-container-promotions").css("display", "none");
  jQuery(".slope-style-container-promotions").css("display", "none");
  jQuery(".slope-layout-container-promotions").css("display", "block");
  jQuery("#setting_page_promotions_select").removeClass("nav-tab-active");
  jQuery("#style_page_promotions_select").removeClass("nav-tab-active");
  jQuery("#layout_page_promotions_select").addClass("nav-tab-active");
}

function slope_smooth_back_to_top() {
  var timeOut;

  if (document.body.scrollTop != 0 || document.documentElement.scrollTop != 0) {
    window.scrollBy(0, -30);
    timeOut = setTimeout('slope_smooth_back_to_top()', 10);
  } else clearTimeout(timeOut);
} //success message


function message_success() {
  jQuery("#success-message").css("display", "block");
  jQuery("#success-message").delay(2000).fadeOut(700);
  slope_smooth_back_to_top();
}

function message_promotions_success() {
  var borderValue = document.getElementById("slope_promotions_border_size");

  if (borderValue.value > 6 || borderValue.value < 0) {
    jQuery("#error-promotions-message").css("display", "block");
    jQuery("#error-promotions-message").delay(2000).fadeOut(700);
    return activate_page_style_promotions();
  } else {
    jQuery("#success-promotions-message").css("display", "block");
    jQuery("#success-promotions-message").delay(2000).fadeOut(700);
  }

  slope_smooth_back_to_top();
}
"use strict";

function slopeCheckValidity() {
  var form = new SlopeForm(jQuery('#slope-welcome-form'), ['slope-user-type', 'slope-email-address']);

  if (!form.isValid() || !document.getElementById('slope-terms').checked) {
    jQuery(this).find('input[type="submit"]').attr('disabled', 'disabled');
  } else {
    jQuery(this).find('input[type="submit"]').attr('disabled', false);
  }
}

function slopeSendDataAndRedirect(nextPageUrl) {
  var slopeWelcomeForm = new SlopeForm(jQuery('#slope-welcome-form'), ['slope-user-type', 'slope-email-address']);
  var ZAPIER_URL = 'https://hooks.zapier.com/hooks/catch/3734337/o3u54mk/';

  if (slopeWelcomeForm.isValid() || !document.getElementById('slope-terms').checked) {
    slopeWelcomeForm.send(ZAPIER_URL, function () {
      window.location = nextPageUrl;
    });
  }
}

jQuery(document).on('change', '#slope-welcome-form', slopeCheckValidity);