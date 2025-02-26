document.addEventListener("DOMContentLoaded", function () {
    // --------- Element Selectors ---------
    const widget = document.querySelector(".acf-summarizer-widget");
    const toggleButton = document.querySelectorAll(".acf-summarizer-toggle");
    const closeButton = document.querySelector(".acf-summarizer-close");
    const summarizeButton = document.querySelector(".acf-summarizer-button");
    const summarizeButtonFront = document.querySelector(
        ".acf-summarizer-button-front"
    );
    const deleteButton = document.querySelector(
        ".acf-summarizer-delete-button"
    );
    const deleteMessage = document.querySelector(".delete-change-msg");

    // --------- Event Listeners ---------

    // Toggle widget visibility
    toggleButton.forEach((button) =>
        button.addEventListener("click", toggleWidgetVisibility)
    );
    if (closeButton) {
        closeButton.addEventListener("click", toggleWidgetVisibility);
    }
    // Handle the delete/disdelete button click event
    if (deleteButton) {
        deleteButton.addEventListener("click", handleDeleteClick);
    }

    // Run summary logic on button clicks
    if (summarizeButton) {
        summarizeButton.addEventListener("click", handleSummarizeClick);
    }
    if (summarizeButtonFront) {
        summarizeButtonFront.addEventListener(
            "click",
            handleFrontSummarizeClick
        );
    }
    // --------- Event Handlers ---------

    // Toggle the visibility of the widget
    function toggleWidgetVisibility() {
        widget.classList.toggle("hide-widget");
    }

    /**
     * Handle the delete button click event
     * Sends the post_id and current summary_status to the REST API
     */
    async function handleDeleteClick(event) {
        const button = event.currentTarget;
        const postId = button.getAttribute("data-post-id");
        const currentStatus = button.getAttribute("data-post-status");
        const newStatus = currentStatus === "1" ? "0" : "1"; // Toggle status

        // Disable button to prevent multiple clicks
        button.disabled = true;

        // Send delete/disdelete request
        const response = await updateSummaryStatus(postId, newStatus);

        // Check the response and update button state accordingly
        if (response && response.status === "Updated") {
            const result = document.querySelector(".acf-summarizer-result");
            result.innerHTML = "";
            deleteButton.style.display = "none";
            // Update the button text and attributes based on new status
            button.setAttribute("data-post-status", newStatus);

            // Display the success message based on the new status
            displayDeleteMessage(newStatus);
        } else {
            // Handle error: show an error message or re-enable the button
            console.error("Failed to update summary status:", response);
            button.disabled = false; // Re-enable the button if failed
        }
    }

    /**
     * Handle the summarize button click event
     * Triggers the content summarization logic
     */
    function handleSummarizeClick(event) {
        const button = event.currentTarget;
        const postId = button.getAttribute("data-post-id");
        const result = document.querySelector(".acf-summarizer-result");

        displayLoadingAnimation(result);
        button.disabled = true;
        deleteButton.disabled = true;

        fetchSummary({ post_id: postId }, result, button);
    }

    // Handle the front summarize button click event
    function handleFrontSummarizeClick(event) {
        const button = event.currentTarget;
        const postId = button.getAttribute("data-post-id");
        const result = document.querySelector(".acf-summarizer-result-front");

        displayLoadingAnimation(result);
        button.disabled = true;

        fetchFrontSummary({ post_id: postId }, result, button);
    }

    // --------- Helper Functions ---------

    /**
     * Sends a POST request to update the summary status via REST API
     * @param {number} postId - The ID of the post to update
     * @param {string} newStatus - The new summary status ('0' for approve, '1' for disapprove)
     * @returns {Object} - The response from the REST API
     */
    async function updateSummaryStatus(postId, newStatus) {
        try {
            const response = await fetch(`${aiSummarizer.rest_url_delete}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-WP-Nonce": aiSummarizer.nonce,
                },
                body: JSON.stringify({
                    post_id: postId,
                    summary_status: newStatus,
                }),
            });

            return await response.json();
        } catch (error) {
            console.error("delete request failed:", error);
            return { success: false, error };
        }
    }

    /**
     * Displays a message based on the summary delete status
     * @param {string} status - The new summary status ('0' for disapprove, '1' for approve)
     */
    function displayDeleteMessage(status) {
        if (deleteMessage) {
            deleteMessage.textContent = "Summary has been deleted...";

            // Optionally, add a fade-out effect for the message after a few seconds
            setTimeout(() => {
                deleteMessage.textContent = ""; // Clear the message after 5 seconds
            }, 2000); // 5000ms = 5 seconds
        }
    }

    /**
     * Displays a loading animation while waiting for the summary
     * @param {HTMLElement} result - The result element to display loading animation
     */
    function displayLoadingAnimation(result) {
        result.style.display = "block";
        result.innerHTML = `
            <div class="loading-icon">
                <svg class="loading-dots" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200">
                    <circle fill="#000000" stroke="#000000" stroke-width="12" r="15" cx="40" cy="65">
                        <animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;"
                        keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.4"></animate>
                    </circle>
                    <circle fill="#000000" stroke="#000000" stroke-width="12" r="15" cx="100" cy="65">
                        <animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;"
                        keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.2"></animate>
                    </circle>
                    <circle fill="#000000" stroke="#000000" stroke-width="12" r="15" cx="160" cy="65">
                        <animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;"
                        keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="0"></animate>
                    </circle>
                </svg>
            </div>
        `;
    }

    /**
     * Fetch the summary data and handle the result
     * @param {Object} data - The data to send in the request
     * @param {HTMLElement} result - The element where the summary will be displayed
     * @param {HTMLElement} button - The button to re-enable after the request
     */
    async function fetchSummary(data, result, button) {
        try {
            const response = await makeSummaryRequest(data);

            // Remove the loading animation
            result.querySelector(".loading-icon").remove();

            // Handle error response
            if (
                response.code === "summary_error" ||
                response.data?.status === 500 ||
                response.data?.status === 400
            ) {
                handleSummaryError(response, result, button);
            } else if (response.success === false) {
                handleSummaryError(response, result, button);
            } else {
                displaySummary(response.summary, result, button);
            }
        } catch (error) {
            console.error("Error fetching summary:", error);
        }
    }

    /**
     * Fetch the summary for front and handle the result
     * @param {Object} data - The data to send in the request
     * @param {HTMLElement} result - The element where the summary will be displayed
     * @param {HTMLElement} button - The button to re-enable after the request
     */
    async function fetchFrontSummary(data, result, button) {
        const response = await makeFrontSummaryRequest(data);

        // Remove the loading animation and display the result
        result.querySelector(".loading-icon").remove();

        if (
            response.code === "summary_not_found" ||
            response.data?.status === 404
        ) {
            displaySummary(
                "No summary available, try again or contact site admin.",
                result,
                button
            );
        } else {
            displaySummary(response.summary, result, button);
        }
    }

    /**
     * Displays the summary result with a typewriter effect
     * @param {string} summary - The summary text to display
     * @param {HTMLElement} result - The element to display the summary in
     * @param {HTMLElement} button - The button to re-enable after displaying the summary
     */
    function displaySummary(summary, result, button) {
        typeWriterEffect(summary, result, function () {
            button.textContent = "Re-" + aiSummarizer.summarize;
            button.disabled = false;
            if (deleteButton) {
                deleteButton.style.display = "block";
                deleteButton.disabled = false;
            }
        });
    }

    /**
     * Handles summary error
     * @param {Object} error - The error object
     * @param {HTMLElement} result - The result element
     * @param {HTMLElement} button - The button to re-enable after error
     */
    function handleSummaryError(error, result, button) {
        const errorMessage = `Error: ${error.message}`;
        typeWriterEffect(errorMessage, result, function () {
            button.disabled = false;
        });
    }

    /**
     * Makes an asynchronous request to get the summary
     * @param {Object} data - The request payload
     * @returns {Object} - The summary response or an error
     */
    async function makeSummaryRequest(data) {
        try {
            const response = await fetch(aiSummarizer.rest_url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-WP-Nonce": aiSummarizer.nonce,
                },
                body: JSON.stringify(data),
            });
            return await response.json();
        } catch (error) {
            console.error("Summary request failed:", error);
            return { success: false, error };
        }
    }

    /**
     * Makes an asynchronous request to get the front summary
     * @param {Object} data - The request payload
     * @returns {Object} - The summary response or an error
     */
    // async function makeFrontSummaryRequest(data) {
    //     try {
    //         const response = await fetch(aiSummarizer.rest_url_get_summary, {
    //             method: "GET",
    //             headers: {
    //                 "Content-Type": "application/json",
    //                 "X-WP-Nonce": aiSummarizer.nonce,
    //             },
    //             body: JSON.stringify(data),
    //         });
    //         return await response.json();
    //     } catch (error) {
    //         console.error("Front summary request failed:", error);
    //         return { success: false, error };
    //     }
    // }
    async function makeFrontSummaryRequest(data) {
        try {
            // Convert data object to query parameters
            const queryParams = new URLSearchParams(data).toString();
            const urlWithParams = `${aiSummarizer.rest_url_get_summary}?${queryParams}`;

            const response = await fetch(urlWithParams, {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                    "X-WP-Nonce": aiSummarizer.nonce,
                },
            });

            return await response.json();
        } catch (error) {
            console.error("Front summary request failed:", error);
            return { success: false, error };
        }
    }

    /**
     * Typewriter effect to display text character by character
     * @param {string} text - The text to display
     * @param {HTMLElement} element - The element to display the text
     * @param {function} [callback] - A callback function to invoke after typing finishes
     */
    function typeWriterEffect(text, element, callback) {
        let i = 0;
        const typingSpeed = aiSummarizer.summarySpeed;
        element.innerHTML = ""; // Clear the result area

        function type() {
            if (i < text.length) {
                element.innerHTML += text.charAt(i);
                i++;
                setTimeout(type, typingSpeed);
            } else if (callback) {
                callback();
            }
        }
        type();
    }

    const toggle = document.getElementById("widget-toggle");
    const widgetPreview = document.querySelector(".widget-preview");

    if (toggle) {
        toggle.addEventListener("change", function () {
            if (toggle.checked) {
                widgetPreview.setAttribute("x", 75); // Move widget to right when toggle is on
            } else {
                widgetPreview.setAttribute("x", 20); // Move widget to left when toggle is off
            }
        });
    }
});
