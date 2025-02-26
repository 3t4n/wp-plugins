
jQuery(document).ready(function () {


  if (jQuery(".hide-btn")[0]) {
    jQuery("#wpadminbar").append("<div class='hide-btn-menu'></div>");
  }

  jQuery("#wpadminbar").draggable({
    axis: "y",
    containment: "window",
    handle: ".handle-child"
  });


});

jQuery("body").on("click", ".hide-btn-menu", function () {
  jQuery("#wpadminbar").css({ "top": 0 });
  jQuery("#wpadminbar").toggleClass('hide-menu-wp');
})