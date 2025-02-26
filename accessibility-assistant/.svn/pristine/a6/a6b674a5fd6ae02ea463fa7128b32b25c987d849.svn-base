jQuery(document).ready(function ($) {

     /**Edit-language page start */
     jQuery(".edit-btn").on("click", function (event) {
        event.preventDefault(); // Prevent default anchor behavior
        var language = jQuery(this).data("languagecode");
        var shop_id = jQuery(this).data("shop_id");
        var redirecturl = myScript.editLanguagesUrl+"& lang="+ language +"& shop_id="+shop_id;
        window.location.href = redirecturl;
    });
    /**Edit-language page end */
    
     // Handle click event for the back button
     jQuery("#btnBack").on("click", function (e) {
        e.preventDefault();
        window.location.href = myScript.backtolanguages;
    });
    /***** Widgets page start *****/

    $(function () {
        const $pointer = $(".progress-container .pointer");
    const $progressBar = $(".progress-container .progress-bar");
    const $valueDisplay = $(".progress-container #value");
    const containerWidth = $(".progress-container").width();
    const maxProgress = 100; // Max progress percentage

    // Initial setup based on PHP value
    let initialProgress = $('#value').html();
    // Ensure the initial progress is within bounds
    if (initialProgress < 0) initialProgress = 0;
    if (initialProgress > maxProgress) initialProgress = maxProgress;

    // Set progress bar width and pointer position
    $progressBar.width(initialProgress + "%"); 
    $valueDisplay.text(initialProgress);
    $pointer.css("left", initialProgress + "%");

    // Activate the corresponding items based on initial progress
    $(".progress-container .item-0").toggleClass("active", initialProgress > 0);
    $(".progress-container .item-25").toggleClass("active", initialProgress >= 25);
    $(".progress-container .item-50").toggleClass("active", initialProgress >= 50);
    $(".progress-container .item-75").toggleClass("active", initialProgress >= 75);
    $(".progress-container .item-100").toggleClass("active", initialProgress >= 100);

        $pointer.draggable({
            containment: "parent",
            drag: function (event, ui) {
                // Calculate progress percentage
                const progress = Math.round((ui.position.left / containerWidth) * maxProgress);
    
                // Update the progress bar width and value display
                $progressBar.width(progress + "%");
                $(".bottom_padding_val").val(progress);
                $valueDisplay.text(progress);
                $pointer.css("left", progress + "%");
    
                // Update active classes
                $(".progress-container .item-0").toggleClass("active", progress > 0);
                $(".progress-container .item-25").toggleClass("active", progress >= 25);
                $(".progress-container .item-50").toggleClass("active", progress >= 50);
                $(".progress-container .item-75").toggleClass("active", progress >= 75);
                $(".progress-container .item-100").toggleClass("active", progress >= 100);
            },
        });
    });

     /** Color picker js [Start] */
     jQuery(".clrpickertext").on("input", function () {
        var colorValue = jQuery(this).val();

        // Check if the input length is greater than 7
        if (colorValue.length > 7) {
            jQuery(this).val(colorValue.slice(0, 7)); // Limit to 7 characters
            return; // Exit the function early
        }

        // Validate that the value is a valid hex color code with '#'
        if (/^#[0-9A-F]{0,6}$/i.test(colorValue)) {
            jQuery(this).next(".clrpicker").val(colorValue);
        } else {
            // Optionally clear the invalid input
            jQuery(this).val("");
        }
    });

    jQuery(".clrpicker").on("input", function () {
        var colorValue = jQuery(this).val();

        // Check if the input length is greater than 7
        if (colorValue.length > 7) {
            jQuery(this).val("#000000"); // Reset to default if invalid
            jQuery(this).prev(".clrpickertext").val("#000000"); // Sync text input as well
            return; // Exit the function early
        }

        // Ensure the value is exactly 7 characters long (including '#')
        if (/^#[0-9A-F]{6}$/i.test(colorValue)) {
            jQuery(this).prev(".clrpickertext").val(colorValue);
        } else {
            jQuery(this).val("#000000"); // Reset to default if invalid
            jQuery(this).prev(".clrpickertext").val("#000000"); // Sync text input as well
        }
    });
    /** Color picker js [End] */
    /***** Widgets page end *****/
    /***** Widgets page end *****/

    /***Plan list start */
    $("ul.tabs li").click(function () {
        var tab_id = $(this).attr("data-tab");

        $("ul.tabs li").removeClass("current");
        $(".tab-content").removeClass("current");

        $(this).addClass("current");
        $("#" + tab_id).addClass("current");
    });
    /***Plan list end */

    /**Installation poup js [Start] */
    jQuery(".ada-cc-popup-close").on("click", function () {
        var requestCloseData = {
            shop_data: myScript.shopId,
        };
        fetch(myScript.assistantUrl + "/v1/close/Installtionpopup", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(requestCloseData),
        })
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
                if (data.status == 200) {
                    jQuery(".ada-cc-welcome-popup-main").hide();
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });

    jQuery(".ada-cc-welcome-popup-button").on("click", function () {
        var requestCloseData = {
            shop_data: myScript.shopId,
        };
        fetch(myScript.assistantUrl + "/v1/close/Installtionpopup", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(requestCloseData),
        })
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
                if (data.status == 200) {
                    jQuery(".ada-cc-welcome-popup-main").hide();
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });

       // window.location.href = myScript.planlisting;
    });
    /**Installation poup js [End] */

    /**Thank-you poup js [Start] */
    jQuery(".thankyou-close").on("click", function () {
        var requestCloseData = {
            shop_data: myScript.shopId,
        };
        fetch(myScript.assistantUrl + "/v1/close/Thankyoupopup", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(requestCloseData),
        })
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
                if (data.status == 200) {
                    jQuery(".ada-cc-popup-main").hide();
                    window.location.reload();
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    jQuery(".thank-you-btn").on("click", function () {
        var requestCloseData = {
            shop_data: myScript.shopId,
        };
        fetch(myScript.assistantUrl + "/v1/close/Thankyoupopup", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(requestCloseData),
        })
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
                if (data.status == 200) {
                    jQuery(".ada-cc-popup-main").hide();
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        window.location.href = myScript.accessibilitywidget;
    });
    /**Thank-you poup js [End] */

    /***User guide start */

    // accordion ------------------------

    const accordions = document.querySelectorAll(".accordion");

    accordions.forEach((accordion) => {
        // Attach event listener only to the accordion header
        const header = accordion.querySelector(".accordion-header");

        header.addEventListener("click", () => {
            // Close all other accordions
            accordions.forEach((item) => {
                if (item !== accordion) {
                    item.querySelector(".accordion-body").classList.remove(
                        "active"
                    );
                    item.classList.remove("active"); // Remove purple border and reset icon
                    item.querySelector(".arrow").classList.replace(
                        "fa-angle-down",
                        "fa-angle-right"
                    ); // Reset to angle-right
                }
            });

            // Toggle current accordion
            const body = accordion.querySelector(".accordion-body");
            body.classList.toggle("active");
            accordion.classList.toggle("active"); // Add purple border

            // Toggle the icon
            const icon = accordion.querySelector(".arrow");
            if (body.classList.contains("active")) {
                icon.classList.replace("fa-angle-right", "fa-angle-down");
            } else {
                icon.classList.replace("fa-angle-down", "fa-angle-right");
            }
        });
    });

    /***User guide end */

   
});
