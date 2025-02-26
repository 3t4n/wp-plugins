jQuery(document).ready(function ($) {
  // Fetch values from localized data
  var apiKeyVal = aiks_keyword_swap_plugin_vars.apiKeyVal;
  var wordsToHighlightVal = aiks_keyword_swap_plugin_vars.wordsToHighlightVal;
  var apiKeyEndPointVal = aiks_keyword_swap_plugin_vars.apiKeyEndPointVal;

  if (
    apiKeyVal.length === 0 ||
    wordsToHighlightVal.length === 0 ||
    apiKeyEndPointVal.length === 0
  ) {
    return;
  }

  /**
   * Fetch API to get suggestions from the Open AI API
   *
   * This function loads suggestions on the editor button events in the WordPress editor toolbar.
   *
   * @since 1.0.0
   *
   */
  async function suggestAlternatives(nonCompliantWord, apiKeyVal, n = 5) {
    const apiKey = apiKeyVal;

    // Ensure wordsToHighlightVal is an array
    if (!Array.isArray(wordsToHighlightVal)) {
        wordsToHighlightVal = [];
    }

    // Set up request data
    const data = {
        model: "gpt-3.5-turbo",
        messages: [
            {
                role: "user",
                content: `Suggest ${n} alternative words to replace the word '${nonCompliantWord}' while keeping the context.`,
            },
        ],
        max_tokens: 1000,
        temperature: 0.8, // Increase randomness
    };

    try {
        // Set up fetch request
        const response = await fetch(apiKeyEndPointVal, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Authorization: "Bearer " + apiKey,
            },
            body: JSON.stringify(data),
        });

        // Check if the response is not ok
        if (!response.ok) {
            const errorText = await response.text(); // Get error message from response body
            console.error("Error from API: ", errorText);
            throw new Error(`Failed to fetch alternatives. Status: ${response.status}`);
        }

        // Process the response
        const responseData = await response.json();

        // Extract the single string response
        const messageContent = responseData.choices[0].message.content.trim();

        // Split suggestions based on format (use one of the below)
        // Option 1: If numbered list (e.g., "1. suggestion 2. suggestion")
        const suggestions = messageContent.split(/\d+\.\s+/).filter(s => s);

        // Extract suggestions not already in wordsToHighlightVal array (case-insensitive)
        const alternatives = [];
        for (const suggestion of suggestions) {
            const trimmedSuggestion = suggestion.trim();
            // Convert both suggestion and wordsToHighlightVal entries to lowercase for comparison
            const lowerCaseSuggestion = trimmedSuggestion.toLowerCase();
            const lowerCaseWordsToHighlightVal = wordsToHighlightVal.map(word => word.toLowerCase());

            if (!lowerCaseWordsToHighlightVal.includes(lowerCaseSuggestion) && !alternatives.includes(trimmedSuggestion)) {
                alternatives.push(trimmedSuggestion);
            }
        }

        // If no new alternatives are found, request more suggestions by increasing 'n'
        if (alternatives.length === 0) {
            console.log(`No new suggestions found. Requesting ${n * 2} suggestions.`);
            return suggestAlternatives(nonCompliantWord, apiKeyVal, n * 2);
        }

        // Return the first valid suggestion
        return alternatives; // Return one suggestion at a time

    } catch (error) {
        console.error("An error occurred: ", error.message);
        throw error;
    }
  }


  /**
   * Custom function to handle events on highlighted spans.
   */
  function openAI_add_event_on_highlighted_span(editor) {
    var modal = document.getElementById("aiks_keyword_swap_modal");
    var modalText = document.getElementById("aiks-keyword-swap-modal-text");
    var replaceBtn = document.getElementById("aiks-keyword-swap-replace-btn");
    var closeModalBtn = document.getElementsByClassName("aiks-keyword-swap-close")[0];

    var highlightedSpans = editor.getBody().querySelectorAll(".aksHighlighted");

    highlightedSpans.forEach(function (span) {
      span.addEventListener("click", function (event) {
        if (!span.classList.contains("processing")) {
          span.classList.add("processing");

          suggestAlternatives(span.innerText, apiKeyVal)
            .then((alternatives) => {
              if (alternatives.length > 0) {
                var suggestion = alternatives[0];
                modalText.innerHTML =
                  "Replace <strong>'" +
                  span.innerText +
                  "'</strong> with:</br></br><strong>" +
                  suggestion +
                  "</strong>";
                modal.style.display = "block";
                replaceBtn.style.display = "block";

                replaceBtn.onclick = function () {
                  var textNode = document.createTextNode(suggestion);
                  span.parentNode.replaceChild(textNode, span);

                  var updatedContent = editor.getContent();
                  editor.setContent(updatedContent, { format: "raw" });

                  openAI_add_event_on_highlighted_span(editor);

                  editor.save();
                  modal.style.display = "none";
                };
              } else {
                //showNoSuggestionModal(span.innerText);
                // alert error in fetching
                var modal_alert = document.createElement("div");
                modal_alert.style.position = "fixed";
                modal_alert.style.top = "0";
                modal_alert.style.left = "0";
                modal_alert.style.width = "100%";
                modal_alert.style.height = "100%";
                modal_alert.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
                modal_alert.style.display = "flex";
                modal_alert.style.justifyContent = "center";
                modal_alert.style.alignItems = "center";
                modal_alert.style.zIndex = "9999";
                modal_alert.id = "aks-no-words-modal";

                // Create the modal content
                var modalContent_alert = document.createElement("div");
                modalContent_alert.style.backgroundColor = "#fff";
                modalContent_alert.style.padding = "20px";
                modalContent_alert.style.borderRadius = "5px";
                modalContent_alert.style.position = "relative";
                modalContent_alert.innerHTML =
                  "<p>No suggestion found.</p>";
                modalContent_alert.className = "aiks-keyword-swap-modal-content";
                modal_alert.appendChild(modalContent_alert);

                // Append the modal to the body
                document.body.appendChild(modal_alert);

                // Create the close button
                var closeButton_alert = document.createElement("span");
                closeButton_alert.innerHTML = "&times;";
                closeButton_alert.className = "aks-close-btn";

                // Append elements to the modal content
                modalContent_alert.appendChild(closeButton_alert);

                // When the close button is clicked
                closeButton_alert.onclick = function () {
                  // Close the modal box
                  if (document.getElementById("aks-no-words-modal")) {
                    document.getElementById("aks-no-words-modal").remove();
                  }
                };
              }
            })
            .catch((error) => {
              // alert error in fetching
              var modal_alert = document.createElement("div");
              modal_alert.style.position = "fixed";
              modal_alert.style.top = "0";
              modal_alert.style.left = "0";
              modal_alert.style.width = "100%";
              modal_alert.style.height = "100%";
              modal_alert.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
              modal_alert.style.display = "flex";
              modal_alert.style.justifyContent = "center";
              modal_alert.style.alignItems = "center";
              modal_alert.style.zIndex = "9999";
              modal_alert.id = "aks-no-words-modal";

              // Create the modal content
              var modalContent_alert = document.createElement("div");
              modalContent_alert.style.backgroundColor = "#fff";
              modalContent_alert.style.padding = "20px";
              modalContent_alert.style.borderRadius = "5px";
              modalContent_alert.style.position = "relative";
              modalContent_alert.innerHTML =
                "<p>" + error + "</p>";
              modalContent_alert.className = "aiks-keyword-swap-modal-content";
              modal_alert.appendChild(modalContent_alert);

              // Append the modal to the body
              document.body.appendChild(modal_alert);

              // Create the close button
              var closeButton_alert = document.createElement("span");
              closeButton_alert.innerHTML = "&times;";
              closeButton_alert.className = "aks-close-btn";

              // Append elements to the modal content
              modalContent_alert.appendChild(closeButton_alert);

              // When the close button is clicked
              closeButton_alert.onclick = function () {
                // Close the modal box
                if (document.getElementById("aks-no-words-modal")) {
                  document.getElementById("aks-no-words-modal").remove();
                }
              };
            })
            .finally(() => {
              span.classList.remove("processing");
            });
        }
      });
    });
    closeModalBtn.onclick = function () {
      modal.style.display = "none";
    };
    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    };
  }

  /**
   * Function to toggle word highlights and handle the "No words to highlight" message.
   */
  function toggleHighlights(editor) {
    var content = editor.getContent();
    var wordsToHighlight = wordsToHighlightVal; // Words to highlight
    var tempDiv = document.createElement("div");
    tempDiv.innerHTML = content;

    // Function to remove existing highlights
    function removeHighlights() {
      var existingSpans = tempDiv.querySelectorAll(".aksHighlighted");
      existingSpans.forEach(function (span) {
        var parentNode = span.parentNode;
        var spanContent = document.createTextNode(span.innerText);
        parentNode.replaceChild(spanContent, span);
      });
    }

    // Function to highlight words
    function highlightWords(node) {
      if (node.nodeType === Node.TEXT_NODE) {
        var nodeText = node.nodeValue;
        wordsToHighlight.forEach(function (word) {
          var escapedWord = escapeRegExp(word);
          var regex = new RegExp(
            "(^|\\s|['\"])" + escapedWord + "(?=['\"]|\\s|[.,!?]|$)",
            "gi"
          );
          nodeText = nodeText.replace(regex, function (match, p1, p2) {
            return p1 + '<span class="aksHighlighted">' + match + "</span>";
          });
        });

        var spannedNode = document.createElement("span");
        spannedNode.innerHTML = nodeText;
        node.parentNode.replaceChild(spannedNode, node);
      } else if (node.nodeType === Node.ELEMENT_NODE) {
        node.childNodes.forEach(highlightWords);
      }
    }

    // Escape special characters in words to highlight
    function escapeRegExp(string) {
      return string.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");
    }

    // Check if any highlights already exist
    var existingSpans = tempDiv.querySelectorAll(".aksHighlighted");

    if (existingSpans.length > 0) {
      // If highlights exist, remove them (toggle off)
      removeHighlights();
    } else {
      // If no highlights exist, highlight the words (toggle on)
      highlightWords(tempDiv);
      // If no words to highlight, show modal
      if (tempDiv.querySelectorAll(".aksHighlighted").length === 0) {
        // Create a modal dialog
        var modal_alert = document.createElement("div");
        modal_alert.style.position = "fixed";
        modal_alert.style.top = "0";
        modal_alert.style.left = "0";
        modal_alert.style.width = "100%";
        modal_alert.style.height = "100%";
        modal_alert.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
        modal_alert.style.display = "flex";
        modal_alert.style.justifyContent = "center";
        modal_alert.style.alignItems = "center";
        modal_alert.style.zIndex = "9999";
        modal_alert.id = "aks-no-words-modal";

        // Create the modal content
        var modalContent_alert = document.createElement("div");
        modalContent_alert.style.backgroundColor = "#fff";
        modalContent_alert.style.padding = "20px";
        modalContent_alert.style.borderRadius = "5px";
        modalContent_alert.style.position = "relative";
        modalContent_alert.innerHTML =
          "<p>No words to highlight.</p>";
        modalContent_alert.className = "aiks-keyword-swap-modal-content";
        modal_alert.appendChild(modalContent_alert);

        // Append the modal to the body
        document.body.appendChild(modal_alert);

        // Create the close button
        var closeButton_alert = document.createElement("span");
        closeButton_alert.innerHTML = "&times;";
        closeButton_alert.className = "aks-close-btn";

        // Append elements to the modal content
        modalContent_alert.appendChild(closeButton_alert);

        // When the close button is clicked
        closeButton_alert.onclick = function () {
          // Close the modal box
          if (document.getElementById("aks-no-words-modal")) {
            document.getElementById("aks-no-words-modal").remove();
          }
        };

        return;
      }
    }

    // Set the modified content in the editor
    var highlightedContent = tempDiv.innerHTML;
    editor.setContent(highlightedContent, { format: "raw" });

    // Reapply event listeners on the new content
    openAI_add_event_on_highlighted_span(editor);

    // Make sure TinyMCE knows the content has been changed so it can be saved
    editor.save();
  }

  /**
   * Initialize the WordPress Editor Plugin with the Toggle Functionality.
   */
  (function () {
    tinymce.PluginManager.add(
      "aiks_keyword_swap_read_button",
      function (editor, url) {
        editor.addButton("aiks_keyword_swap_read_button", {
          text: "Scan Article",
          icon: false,
          title: "Scan and highlight blocked keywords",
          onclick: function () {
            toggleHighlights(editor);
          },
        });
      }
    );
  })();


  /**
   * Replace Highlighted Words Buttons in WordPress Editor Toolbar
   *
   * This function add buttons and functionality in the WordPress editor toolbar.
   *
   * @since 1.0.0
   */
  (function () {
    tinymce.PluginManager.add(
      "aiks_keyword_swap_replace_button",
      function (editor, url) {
        // Add a button
        editor.addButton("aiks_keyword_swap_replace_button", {
          text: "Replace Highlighted Words",
          icon: false,
          title: "Replace the highlighted blocked keywords",
          onclick: function () {
            // Get editor content
            var content = editor.getContent();

            // Fetch values from localized data
            var apiKeyVal = aiks_keyword_swap_plugin_vars.apiKeyVal;
            var apiKeyEndPointVal =
              aiks_keyword_swap_plugin_vars.apiKeyEndPointVal;

            // Get all highlighted words
            var highlightedSpans = editor
              .getBody()
              .querySelectorAll(".aksHighlighted");

            // Check if there are highlighted spans
            if (highlightedSpans.length === 0) {
              //alert for No words are highlighted
              // Create a modal dialog
              var modal_alert = document.createElement("div");
              modal_alert.style.position = "fixed";
              modal_alert.style.top = "0";
              modal_alert.style.left = "0";
              modal_alert.style.width = "100%";
              modal_alert.style.height = "100%";
              modal_alert.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
              modal_alert.style.display = "flex";
              modal_alert.style.justifyContent = "center";
              modal_alert.style.alignItems = "center";
              modal_alert.style.zIndex = "9999";
              modal_alert.id = "aks-no-words-modal";

              // Create the modal content
              var modalContent_alert = document.createElement("div");
              modalContent_alert.style.backgroundColor = "#fff";
              modalContent_alert.style.padding = "20px";
              modalContent_alert.style.borderRadius = "5px";
              modalContent_alert.style.position = "relative";
              modalContent_alert.innerHTML =
                "<p>No words are currently highlighted.</p>";
              modalContent_alert.className = "aiks-keyword-swap-modal-content";
              modal_alert.appendChild(modalContent_alert);

              // Append the modal to the body
              document.body.appendChild(modal_alert);

              // Create the close button
              var closeButton_alert = document.createElement("span");
              closeButton_alert.innerHTML = "&times;";
              closeButton_alert.className = "aks-close-btn";

              // Append elements to the modal content
              modalContent_alert.appendChild(closeButton_alert);

              // When the close button is clicked
              closeButton_alert.onclick = function () {
                // Close the modal box
                if (document.getElementById("aks-no-words-modal")) {
                  document.getElementById("aks-no-words-modal").remove();
                }
              };
              return;
            }

            // Create a modal dialog
            var modal = document.createElement("div");
            modal.style.position = "fixed";
            modal.style.top = "0";
            modal.style.left = "0";
            modal.style.width = "100%";
            modal.style.height = "100%";
            modal.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
            modal.style.display = "flex";
            modal.style.justifyContent = "center";
            modal.style.alignItems = "center";
            modal.style.zIndex = "9999";
            modal.id = "aks-replace-modal";

            // Create the modal content
            var modalContent = document.createElement("div");
            modalContent.style.backgroundColor = "#fff";
            modalContent.style.padding = "20px";
            modalContent.style.borderRadius = "5px";
            modalContent.style.position = "relative";
            modalContent.className = "aiks-keyword-swap-modal-content";
            modal.appendChild(modalContent);

            var modalOverlay = document.createElement("div");
            modalOverlay.className = "aks-overlay";
            modal.appendChild(modalOverlay);

            // Create the loader
            var loader = document.createElement("div");
            loader.className = "aks-loader";
            loader.style.margin = "0px auto";
            loader.style.position = "fixed";
            loader.style.right = "0";
            loader.style.left = "0";
            modalContent.appendChild(loader);

            // Append the modal to the body
            document.body.appendChild(modal);

            var currentIndex = 0;

            function processNextWord() {
              if (currentIndex >= highlightedSpans.length) {
                // All words processed, close the modal
                document.body.removeChild(modal);
                return;
              }

              var span = highlightedSpans[currentIndex];
              modalContent.innerHTML =
                '<p>Replace "<strong>' +
                span.innerText +
                '</strong>" with:</p>';
              modalContent.appendChild(loader);

              // Show the loader
              loader.style.display = "grid";
              modalOverlay.style.display = "block";

              // Create the input field for replacement suggestion
              var inputField = document.createElement("input");
              inputField.type = "text";
              inputField.style.margin = "10px 0";
              inputField.style.width = "100%";
              inputField.id = "aks-suggestion-input";
              inputField.placeholder = "Enter a replacement...";

              // Create the replace button
              var replaceButton = document.createElement("button");
              replaceButton.innerText = "Replace";
              replaceButton.className = "aks-replace-btn";
              replaceButton.style.marginTop = "10px";
              replaceButton.style.cursor = "pointer";

              // Create the skip button
              var skipButton = document.createElement("button");
              skipButton.innerText = "Skip";
              skipButton.className = "aks-skip-btn";
              skipButton.style.marginTop = "10px";
              skipButton.style.marginLeft = "10px";
              skipButton.style.cursor = "pointer";

              // Create the close button
              var closeButton = document.createElement("span");
              closeButton.innerHTML = "&times;";
              closeButton.className = "aks-close-btn";

              // Append elements to the modal content
              modalContent.appendChild(inputField);
              modalContent.appendChild(replaceButton);
              modalContent.appendChild(skipButton);
              modalContent.appendChild(closeButton);

              // Get alternative and set value in the input field
              suggestAlternatives(span.innerText, apiKeyVal)
                .then((alternatives) => {
                  if (alternatives.length > 0) {
                    var suggestion = alternatives[0];
                    inputField.value = suggestion;
                  } else {
                    //alert for "No suggestions found"
                    // Create a modal dialog
                    var modal_no_suggestions = document.createElement("div");
                    modal_no_suggestions.style.position = "fixed";
                    modal_no_suggestions.style.top = "0";
                    modal_no_suggestions.style.left = "0";
                    modal_no_suggestions.style.width = "100%";
                    modal_no_suggestions.style.height = "100%";
                    modal_no_suggestions.style.backgroundColor =
                      "rgba(0, 0, 0, 0.5)";
                    modal_no_suggestions.style.display = "flex";
                    modal_no_suggestions.style.justifyContent = "center";
                    modal_no_suggestions.style.alignItems = "center";
                    modal_no_suggestions.style.zIndex = "9999";
                    modal_no_suggestions.id = "aks-no-suggestion-modal";

                    // Create the modal content
                    var modalContent_no_suggestions =
                      document.createElement("div");
                    modalContent_no_suggestions.style.backgroundColor = "#fff";
                    modalContent_no_suggestions.style.padding = "20px";
                    modalContent_no_suggestions.style.borderRadius = "5px";
                    modalContent_no_suggestions.style.position = "relative";
                    modalContent_no_suggestions.innerHTML =
                      '<p>No suggestions found for "' +
                      span.innerText +
                      '"</p>';
                    modalContent_no_suggestions.className =
                      "aiks-keyword-swap-modal-content";
                    modal_no_suggestions.appendChild(
                      modalContent_no_suggestions
                    );

                    // Append the modal to the body
                    document.body.appendChild(modal_no_suggestions);

                    // Create the close button
                    var closeButton_no_suggestions =
                      document.createElement("span");
                    closeButton_no_suggestions.innerHTML = "&times;";
                    closeButton_no_suggestions.className = "aks-close-btn";

                    // Append elements to the modal content
                    modalContent_no_suggestions.appendChild(
                      closeButton_no_suggestions
                    );

                    // When the close button is clicked
                    closeButton_no_suggestions.onclick = function () {
                      // Close the modal box
                      if (document.getElementById("aks-no-suggestion-modal")) {
                        document
                          .getElementById("aks-no-suggestion-modal")
                          .remove();
                      }
                    };
                  }
                })
                .catch((error) => {
                  //alert the error message
                  // Create a modal dialog
                  var modal_error = document.createElement("div");
                  modal_error.style.position = "fixed";
                  modal_error.style.top = "0";
                  modal_error.style.left = "0";
                  modal_error.style.width = "100%";
                  modal_error.style.height = "100%";
                  modal_error.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
                  modal_error.style.display = "flex";
                  modal_error.style.justifyContent = "center";
                  modal_error.style.alignItems = "center";
                  modal_error.style.zIndex = "9999";
                  modal_error.id = "aks-error-modal";

                  // Create the modal content
                  var modalContent_error = document.createElement("div");
                  modalContent_error.style.backgroundColor = "#fff";
                  modalContent_error.style.padding = "20px";
                  modalContent_error.style.borderRadius = "5px";
                  modalContent_error.style.position = "relative";
                  modalContent_error.innerHTML = '<p>"' + error + '"</p>';
                  modalContent_error.className =
                    "aiks-keyword-swap-modal-content";
                  modal_error.appendChild(modalContent_error);

                  // Append the modal to the body
                  document.body.appendChild(modal_error);

                  // Create the close button
                  var closeButton_error = document.createElement("span");
                  closeButton_error.innerHTML = "&times;";
                  closeButton_error.className = "aks-close-btn";

                  // Append elements to the modal content
                  modalContent_error.appendChild(closeButton_error);

                  // When the close button is clicked
                  closeButton_error.onclick = function () {
                    // Close the modal box
                    if (document.getElementById("aks-error-modal")) {
                      document.getElementById("aks-error-modal").remove();
                    }
                  };
                })
                .finally(() => {
                  loader.style.display = "none";
                  modalOverlay.style.display = "none";
                });

              // When the replace button is clicked
              replaceButton.onclick = function () {
                // Get the replacement text from the input field
                var replacementText = inputField.value;

                if (inputField.value == "") {
                  if (!document.getElementById("aks-msg-input")) {
                    inputField.insertAdjacentHTML(
                      "afterend",
                      '<span id="aks-msg-input">Please enter the keyword.</br></span>'
                    );
                  }
                  return;
                } else {
                  if (document.getElementById("aks-msg-input")) {
                    document.getElementById("aks-msg-input").remove();
                  }
                }

                // Replace the highlighted word with the replacement text
                if (replacementText) {
                  var newText = document.createTextNode(replacementText);
                  span.parentNode.replaceChild(newText, span);
                }

                // Force TinyMCE to sync the content with its internal state
                editor.save();
                editor.fire("change"); // Trigger change event to ensure content is updated

                // Move to the next word
                currentIndex++;
                processNextWord();
              };

              // When the skip button is clicked
              skipButton.onclick = function () {
                // Move to the next word without replacing
                currentIndex++;
                processNextWord();
              };

              // When the close button is clicked
              closeButton.onclick = function () {
                // Close the modal box
                if (document.getElementById("aks-replace-modal")) {
                  document.getElementById("aks-replace-modal").remove();
                }
              };

              // Prevent clicking outside the modal from closing it
              modal.onclick = function (event) {
                event.stopPropagation();
              };

              // Allow pressing ESC to close the modal without replacing
              document.addEventListener("keydown", function (event) {
                if (event.keyCode === 27) {
                  // ESC key
                  document.body.removeChild(modal);
                }
              });
            }

            // Start processing the first word
            processNextWord();
          },
        });
      }
    );
  })();
});