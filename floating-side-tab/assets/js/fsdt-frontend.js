jQuery(document).ready(function ($) {
  "use strict";
  /**
   * Tab show and hide
   */
  $("body").on("click", ".fsdt-close-tab", function (e) {
    $(".fsdt-tab.fsdt-menu-wrap").removeClass("active");
    $(this).closest(".fsdt-tab-data").hide();
    $(".fsdt-external").removeClass("fsdt-no-hover");
    e.stopImmediatePropagation();
  });

  /**
   * icon switch case
   */
  $("body").on("click", ".fsdt-open-menu", function (e) {
    $(".fsdt-close").toggle();
    $(".fsdt-openn").toggle();
    $(".fsdt-open-menu").toggleClass("active");
  });

  /**
   * tab close for template 23 and template 24
   */
  $("body").on("click", ".fsdt-close", function (e) {
    $(".fsdt-menu-wrap").removeClass("active");
    $(".fsdt-tab-data").hide();
  });

  /**
   * tab click event
   */
  $("body").on("click", ".fsdt-tab.fsdt-menu-wrap", function (event) {
    var selector = $(this);
    var tempDivClass = $("#fsdt-front-display-wrap").attr("class");
    var tempArray = tempDivClass.split(" ");
    var temp_num = tempArray[2];
    if (!$(this).hasClass("fsdt-close-tab")) {
      var tab_ref = $(this).data("tab-ref");
      if (!$(this).hasClass("active")) {
        if ($(this).is(":has(.fsdt-tab-data)")) {
          $(".fsdt-tab.fsdt-menu-wrap").removeClass("active");
          $(this).addClass("active");
          $(".fsdt-tab-data").hide();
          $('.fsdt-tab-data[data-tab-ref="' + tab_ref + '"]').show();

          if (
            temp_num == "fsdt-template-6" ||
            temp_num == "fsdt-template-7" ||
            temp_num == "fsdt-template-8" 
           
          ) {
            $(".fsdt-external").addClass("fsdt-no-hover");
          }
        }
      } else {
        if (!$(event.target).closest(".fsdt-tab-data").length) {
          $('.fsdt-tab-data[data-tab-ref="' + tab_ref + '"]').toggle();
          selector.removeClass("active");

          if (
            temp_num == "fsdt-template-6" ||
            temp_num == "fsdt-template-7" ||
            temp_num == "fsdt-template-8"
          ) {
            $(".fsdt-external").removeClass("fsdt-no-hover");
          }
        }
      }
    } else {
     
    }
  });

  $("body").on("click", ".fsdt-open-menu", function () {
    $(".fsdt-show").toggle("slide");
  });
  $("body").on("click", function () {
    $("p").toggleClass("main");
  });

  $(document).on("click", "body", function (event) {
    if ($(event.target).closest(".fsdt-tab-data").length) {
      if ($(this).is(":has(.fsdt-tab-data)")) {
        $(event.target).closest(".fstp-tab-data").show();
      } else {
        $(event.target).closest(".fsdt-tab-data").show();
        $(".fsdt-menu-wrap").removeClass("active");
      }
    } else {
      $(".fsdt-external").removeClass("fsdt-no-hover");
      $(".fsdt-menu-wrap").removeClass("active");
      $(".fsdt-tab-data").hide();
    }
  });

  $(document).on("click", "fsdt-tab,  .fsdt-tab-link", function (e) {
    e.stopImmediatePropagation();
  });
});
