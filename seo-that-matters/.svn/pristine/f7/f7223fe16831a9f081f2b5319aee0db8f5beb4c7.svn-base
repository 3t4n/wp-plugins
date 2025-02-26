<?php

namespace SeoThatMatters;

header("Content-type: application/javascript");

$prefix = 'seotm';

?>

(function($) {
    $(document).ready(function() {

        // Tab navigation
        $(".<?php echo $prefix; ?>-navigation ul li a:not(.<?php echo $prefix; ?>-ignore)").click(function() {
            var tab = $(this).attr("data-tab");
            $(".<?php echo $prefix; ?>-navigation ul li a").removeClass("current");
            $(".tab-content").removeClass("current");
            $(this).addClass("current");
            $(".<?php echo $prefix; ?>-content section").removeClass("current");
            $(".<?php echo $prefix; ?>-content section." + tab).addClass("current");
            updateActionURL(tab);
            $("html, body").animate({
                scrollTop: 0
            }, 400);
        });

        // Update action URL with tab
        function updateActionURL(tab) {
            var form = $(".<?php echo $prefix; ?>-form");
            var action = form.attr("action");

            if (action.indexOf("#") !== -1) {
                var hash = action.replace(/.*#/, "#");
                action = action.replace(/#.*/, "");
            }

            form.attr({
                action: action + "#" + tab
            });
        }

        // Set current tab based on hash
        var hash = window.location.hash;
        hash = hash.replace("#", "");
        if (hash !== "") {
            $(".<?php echo $prefix; ?>-navigation ul li a#<?php echo $prefix; ?>_" + hash).addClass("current");
            $(".<?php echo $prefix; ?>-content section." + hash).addClass("current");
            updateActionURL(hash);
        } else if ($(".<?php echo $prefix; ?>-content section.current").length === 0) {
            $(".<?php echo $prefix; ?>-content section").eq(0).addClass("current");
            $(".<?php echo $prefix; ?>-navigation ul li").eq(0).find("a").addClass("current");
        }
        
        // Form confirmation
        $("form.<?php echo $prefix; ?>-form").areYouSure({
            message: "Changes that you made may not be saved"
        });

        // Reset confirmation
        $(".reset-confirm").click(function(event) {
            if (!confirm("This will reset this plugin settings. Are you sure?")) {
                event.preventDefault(); // Prevent the default action (resetting the plugin settings)
                return false; // Stop further execution of the function
            }
        });
    });

    $(document).ready(function() {
        // Main toggle
        $('.main-toggle[type="checkbox"]').change(function() {
            var isChecked = $(this).prop("checked");
            var revised = $(this).attr("data-revised");
            var subFields = $(this).parents(".toggle-group").find(".sub-fields");

            if (subFields.length) {
                if ((isChecked && revised !== "1" && subFields.find('input[type="checkbox"]:checked').length === subFields.find('input[type="checkbox"]').length) ||
                    (!isChecked && revised === "1")) {
                    subFields.fadeOut();
                } else {
                    subFields.fadeIn();
                }
            }
        }).trigger("change");

        // Toggle arrow
        $(".<?php echo $prefix; ?>-toggle-arrow").on("click", function() {
            $(this).toggleClass("active");
            $(this).next("ul").slideToggle();
        });

        // Show/hide admin menu
        $("#enable_<?php echo $prefix; ?>_admin").on("change", function() {
            if ($(this).is(":checked")) {
                $(".menu-admin-wrapper").show();
            } else {
                $(".menu-admin-wrapper").hide();
            }
        }).trigger("change");

        // Show/hide welcome for user roles
        $(".enable_welcome_for_all_roles").on("change", function() {
            var userRoles = $("#select_user_roles" + $(this).data("section"));

            if ($(this).is(":checked")) {
                userRoles.fadeOut();
            } else {
                userRoles.fadeIn();
            }
        });
    });

    // Plugin notice dismiss
    $(document).ready(function() {
        var notice = $(".<?php echo $prefix; ?>-notice");

        if (notice.length && notice.hasClass("is-dismissible")) {
            window.setTimeout(function() {
                notice.fadeOut(780);
            }, 2780);
        }
    });

    // Show and hide content
    $(document).ready(function() {
        // Show/hide content based on checkbox
        $(".show-hide").change(function() {
            var isChecked = $(this).prop("checked");
            var showHideAttr = $(this).attr("data-show-hide");
            var showHideContent = $(this).parents(".show-hide-group").find(".show-hide-content");

            if (showHideContent.length) {
                if ((isChecked && showHideAttr !== "1" && showHideContent.find('input[type="checkbox"]:checked').length === showHideContent.find('input[type="checkbox"]').length) ||
                    (!isChecked && showHideAttr === "1")) {
                    showHideContent.fadeOut();
                } else {
                    showHideContent.fadeIn();
                }
            }
        }).trigger("change");
    });

    $(document).ready(function() {
        // Hide/show content based on checkbox
        $(".hide-show").change(function() {
            var isChecked = $(this).prop("checked");
            var hideShowAttr = $(this).attr("data-hide-show");
            var hideShowContent = $(this).parents(".hide-show-group").find(".hide-show-content");

            if (hideShowContent.length) {
                if ((isChecked && hideShowAttr !== "1" && hideShowContent.find('input[type="checkbox"]:checked').length === hideShowContent.find('input[type="checkbox"]').length) ||
                    (!isChecked && hideShowAttr === "1")) {
                    hideShowContent.fadeOut();
                } else {
                    hideShowContent.fadeIn();
                }
            }
        }).trigger("change");
    });
	
})(jQuery);
