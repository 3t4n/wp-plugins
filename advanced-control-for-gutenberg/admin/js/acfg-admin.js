jQuery(document).ready(function ($) {
  $(document).on("click", ".refact-settings-rules-item-delete", function (e) {
    e.preventDefault();
    if (confirm("Are you sure you want to delete this rule?")) {
      var t = $(this);
      var p = t.parents("li");
      var index = t.attr("data-index");
      // We make our call
      $.ajax({
        url: re_acfg.endpoint_url + "/delete_ruleset",
        type: "post",
        data: {
          index: index,
        },
        beforeSend: function (xhr) {
          p.addClass("loading");
          xhr.setRequestHeader("X-WP-Nonce", re_acfg.nonce);
        },
        success: function (response) {
          p.removeClass("loading");
          if (response.success) {
            p.addClass("deleting");
            setTimeout(function () {
              p.remove();
            }, 500);
          } else {
            alert(response.message);
          }
        },
      });
    }
  });

  $(document).on("click", ".refact-settings-rules-item-clone", function (e) {
    e.preventDefault();
    var t = $(this);
    var p = t.parents("li");
    var index = t.attr("data-index");
    // We make our call
    $.ajax({
      url: re_acfg.endpoint_url + "/clone_ruleset",
      type: "post",
      data: {
        index: index,
      },
      beforeSend: function (xhr) {
        p.addClass("loading");
        xhr.setRequestHeader("X-WP-Nonce", re_acfg.nonce);
      },
      success: function (response) {
        p.removeClass("loading");
        if (response.success) {
          document.location.href += "&sg_duplicated=true&sg_nonce=" + response.nonce;
        } else {
          alert(response.message);
        }
      },
    });
  });

  $(".refact-settings-rules-items").sortable({
    handle: '.handle',
    items: "li:not(.refact-settings-rules-items-heading)",
    placeholder: "ui-state-highlight",
    stop: function (event, ui) {
      var final_index = ui.item.index() - 1;
      var current_index = ui.item.attr("data-index");

      if (final_index == current_index) {
        return;
      }
      $.ajax({
        url: re_acfg.endpoint_url + "/sort_ruleset",
        type: "post",
        data: {
          final_index: final_index,
          current_index: current_index,
        },
        beforeSend: function (xhr) {
          xhr.setRequestHeader("X-WP-Nonce", re_acfg.nonce);
        },
        success: function (response) {
          $(
            ".refact-settings-rules-items li:not(.refact-settings-rules-items-heading)"
          ).each(function (i, v) {
            var link = $(v).find(".refact-acfg-edit-link");
            var searchParam = new URLSearchParams(link.attr("href"));
            searchParam.set("index", i);
            var href = decodeURIComponent(searchParam.toString());
            $(this).attr("data-index", i);
            link.attr("href", href);
          });

          if (!response.success) {
            alert(response.message);
          }
        },
      });
    },
  });
});

document.addEventListener("DOMContentLoaded", function () {
  // Get all toggle buttons and add event listeners
  const toggleButtons = document.querySelectorAll(".js-refact-collapse");
  toggleButtons.forEach((button) => {
      // Find the corresponding refact-list-main and refact-list-wrapper for each button
      const refactListMain = button.closest(".refact-list-main");
      const refactListWrapper = button.closest(".refact-list-main").nextElementSibling;

      // Add a click event listener to each button
      button.addEventListener("click", function () {
          // Toggle the visibility of the wrapper div for the corresponding item
          refactListWrapper.classList.toggle("refact-collapsed");

          // Toggle the "active" class on the refact-list-main item
          refactListMain.classList.toggle("refact-active");
      });
  });
});