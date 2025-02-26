$ = jQuery;
$(document).ready(function () {
  console.log("Document ready");

  // Manage tab switching without Bootstrap's tab method
  $(".nav-tab").on("click", function (e) {
    e.preventDefault();
    $(".nav-tab").removeClass("nav-tab-active");
    $(this).addClass("nav-tab-active");

    // Show the selected tab content
    const tabId = $(this).attr("href");
    $(".tab-content").removeClass("tab-content-active");
    $(tabId).addClass("tab-content-active");

    // Store active tab in localStorage
    localStorage.setItem("activeTab", tabId);
  });

  // Restore the active tab from localStorage
  const activeTab = localStorage.getItem("activeTab");
  if (activeTab) {
    $(".nav-tab").removeClass("nav-tab-active");
    $(".nav-tab[href='" + activeTab + "']").addClass("nav-tab-active");
    $(".tab-content").removeClass("tab-content-active");
    $(activeTab).addClass("tab-content-active");
  } else {
    // Default to first tab if no activeTab is saved
    $(".nav-tab-wrapper a:first").addClass("nav-tab-active");
    $(".tab-content:first").addClass("tab-content-active");
  }

  // Handle Get Translations button click
  $('#get-translations-button').on('click', function() {
    console.log("Get Translations button clicked");
    const checkedJobIds = $("input[name='job_ids[]']:checked").map(function() {
      return $(this).val();
    }).get();

    const data = {
      action: 'GRDL_WP_PLUGIN_GET_TRANSLATIONS',
      nonce: GRDL_Ajax.nonce,
      job_ids: checkedJobIds
    };

    // Send AJAX request
    $.ajax({
      url: GRDL_Ajax.ajaxurl,
      type: 'POST',
      data: data,
      success: function(response) {
        console.log("AJAX request successful. Response:", response);
        
        // Refresh the page after setting the active tab
        const currentTab = localStorage.getItem("activeTab") || "#tab-1"; // Fallback to the first tab if none is set
        localStorage.setItem("activeTab", currentTab); // Make sure active tab is stored
        location.reload(); // Refresh the page to show updates
      },
      error: function(xhr, status, error) {
        console.error("AJAX request failed.", error);
        console.error("Status:", status);
        console.error("Response Text:", xhr.responseText);
      }
    });
  });

  // Other functionality remains the same
  $(".list-profile").on("submit", function (e) {
    if (!confirm("Do you want to delete?")) e.preventDefault();
  });

  $("#new-profile-link").on("click", function (e) {
    e.preventDefault();
    $("#new-profile-form").slideDown("slow");
  });

  $("#cb-select-all-1").click(function () {
    const checkedValue = $(this).is(":checked");
    $("input[name='job_ids[]']").prop("checked", checkedValue);
  });
});
