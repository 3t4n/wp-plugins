// ssr_scripts_front.js
/*
Author: Saad Amin
Website: http://www.saadamin.com
Description: Front-end script for Student Result or Employee Database plugin.
*/

jQuery(document).ready(function ($) {
    /**
     * Adjust Layout Based on Window Width
     */
    function adjustLayout() {
        if ($("div.result_div").width() < 700) {
            $(".std_input").css({
                "max-width": "100%",
                "width": "100%",
                "margin-right": "auto"
            });
            $("div.result_box div.sep").css({
                padding: "0 20px",
                "margin-bottom": "10px"
            });
            $(".std_title").css({
                "margin-left": "auto"
            });
        } else {
            $(".std_input").css({
                "max-width": "350px",
                "margin-right": "20px"
            });
            $("div.result_box div.sep").css({
                padding: "auto",
                "margin-bottom": "auto"
            });
            $(".std_title").css({
                "margin-left": "20px"
            });
        }
    }

    /**
     * Initialize Layout Adjustment
     */
    $(window).on("load", adjustLayout);
    $(window).resize(adjustLayout);

    /**
     * Debounce Timer Variable
     */
    var debounceTimer;

    /**
     * Handle Keypress Event on Input Field
     */
    $("#rues").css({ opacity: 1 });

    $("#rues").keypress(function () {
        console.log("Key pressed");

        // Hide message box and show loading circle
        $("#ssr_msgbox").hide();
        $("#ssr_frnt_circle").show();
        $(".result_box").css({ opacity: 1 });

        // Clear existing debounce timer
        if (debounceTimer) {
            clearTimeout(debounceTimer);
        }

        // Set new debounce timer
        debounceTimer = setTimeout(function () {
            // Show all result fields initially
            for (var i = 1; i <= 13; i++) {
                $("#ssr_r_f_" + i).show();
            }

            var postID = $.trim($("#rues").val());
            console.log("Started with input length: " + postID.length);

            if (postID.length > 0) {
                $.ajax({
    url: SSR_Ajax.root + "v2/ssr_find_all/",
    method: "GET", // Changed to GET for 'READABLE' REST route
    // No need to set nonce for public endpoints
    data: { postID: postID },
    dataType: "text", // Force response to be treated as text to handle mixed content
    success: function(response) {
        // Step 1: Find the start of the JSON object
        var jsonStart = response.indexOf('{');
        if (jsonStart !== -1) {
            var jsonString = response.substring(jsonStart);
            try {
                // Step 2: Parse the JSON string
                var parsedResponse = JSON.parse(jsonString);

                // Check if the response indicates success
                if (parsedResponse.success === true) {
                    console.log("Parsed JSON Response:", parsedResponse);

                    // Step 3: Access the data under the "0" key
                    var data = parsedResponse["0"];
                    
                    if (data) {
                        // Populate input fields with response data
                        $("#rid2").val(data.rid || '');
                        $("#rn2").val(data.roll || '');
                        $("#stn2").val(data.stdname || '');
                        $("#stfn2").val(data.fathersname || '');
                        $("#stpy2").val(data.pyear || '');
                        $("#stcgpa2").val(data.cgpa || '');
                        $("#stsub2").val(data.subject || '');
                        $("#stsub3").val(data.dob || '');
                        $("#stsub4").val(data.gender || '');
                        $("#stsub5").val(data.address || '');
                        $("#stsub6").val(data.mnam || '');
                        $("#stsub7").val(data.c1 || '');
                        $("#stsub8").val(data.c2 || '');

                        // Handle Image Display
                        if ($("#st_img2").length) {
                            if (data.image && data.image.length > 0) {
                                $("#st_img2").attr("src", data.image).show();
                            } else {
                                $("#st_img2").hide();
                            }
                        }

                        // Hide fields with empty values
                        for (var i = 2; i <= 8; i++) {
                            var fieldVal = $("#stsub" + i).val();
                            if (!fieldVal || fieldVal.length < 1) {
                                $("#ssr_r_f_" + (i + 5)).hide();
                            }
                        }

                        // Hide loading circle and message box
                        $("#ssr_frnt_circle").hide();
                        $(".result_box").css({ opacity: 1 });
                        $("#ssr_msgbox").hide();
                    } else {
                        console.warn("No data found under key '0' in the JSON response.");
                        handleNotFound();
                    }
                } else {
                    console.log("Operation not successful. Handling as not found.");
                    handleNotFound();
                }
            } catch (e) {
                // Step 4: Handle JSON parse errors
                console.error("JSON parse error:", e);
                console.log("Full Response Received:", response);
                // Optionally, display an error message to the user
                $("#ssr_msgbox").text("An error occurred while processing the data.").show();
                $("#ssr_frnt_circle").hide();
            }
        } else {
            // Handle case where no JSON object is found in the response
            console.error("No JSON found in the response.");
            console.log("Full Response Received:", response);
            // Optionally, display an error message to the user
            $("#ssr_msgbox").text("Invalid server response. Please try again later.").show();
            $("#ssr_frnt_circle").hide();
        }

        // Helper function to handle "not found" scenarios
        function handleNotFound() {
            console.log("Data not found.");
            $(".result_box").css({ opacity: 0 });
            $("#ssr_msgbox").show();
            $("#ssr_frnt_circle").hide();
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.error("AJAX Error:", textStatus, errorThrown);
        // Optionally, display an error message to the user
        $("#ssr_msgbox").text("Failed to retrieve data. Please check your connection and try again.").show();
        $("#ssr_frnt_circle").hide();
    }
});

            } else {
                console.log("Empty input");
                $(".result_box").css({ opacity: 0 });
                $("#ssr_msgbox").hide();
                $("#ssr_frnt_circle").hide();
            }
        }, 1000); // 1 second debounce
    });

    /**
     * Prevent Space Character in Input Field
     */
    $("#rues").keydown(function (event) {
        if (event.keyCode === 32) { // 32 is the keycode for space
            event.preventDefault();
        }
    });
});
