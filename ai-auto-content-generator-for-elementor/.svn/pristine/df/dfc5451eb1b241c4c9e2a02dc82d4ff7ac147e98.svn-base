if (typeof jQuery != "undefined") {
  (function ($) {
    "use strict";
    class HandleAll {
      constructor(controlView) {
        this.controls = $(controlView)
          .get(0)
          .$el.parentsUntil(".elementor-controls-stack");
        this.editor = this.controls.find(".elementor-wp-editor");

        
      
      }

      async getContent() {
        const editorId = this.editor.attr("id");
        if (window.parent.tinyMCE && editorId) {
          const editor = window.parent.tinyMCE.get(editorId);
          if (editor) {
            const content = editor.getContent();
            return content.replace(/<\/?[^>]+(>|$)/g, ""); // Strip HTML tags
          }
        }
      }

      async shortContent(content) { 
        const postContent = content;
        try{
        let currentSession = null;
        const summarizer = await window.ai.summarizer.create({
          sharedContext: "A blog post",
          type: "headline",
          length: "short",
          format: "plain-text",
        });
        currentSession = summarizer;

        const stream = summarizer.summarizeStreaming(postContent, {
          context:
            "Avoid any toxic language and be as constructive as possible.",
        });

        let result = "";

        for await (const value of stream) {
          result = value.replaceAll("\n\n\n\n", "\n\n");
          const footer = document.querySelector(".swal2-footer");
          if (footer) {
            footer.style.display = "none";
          }
          Swal.update({
            html: `<textarea class="result-content" disabled>${result}</textarea>`,
            footer: null,
            showCloseButton: true,
            didClose: () => {
              if (currentSession) {
                currentSession.destroy();
                currentSession = null;
              }
            },
          });
          const textarea = document.querySelector(".result-content");
          if (textarea) {
            textarea.scrollTop = textarea.scrollHeight;
          }
          Swal.showLoading();
        }

        return result;
      }catch(error){

      }
      }

      async writeContent(inputText, contextInfo = "", additionalText = "") {
        try {
         
          let currentSession = null;
          const session = await window.ai.languageModel.create();
          currentSession = session;

          let context = `
            Avoid any toxic language and be as constructive as possible.
          `;

          if (contextInfo) {
            context += `\n${contextInfo}`;
          }

          const stream = session.promptStreaming(
            `
            You are an AI writing assistant. Your goal is to help users with writing tasks by generating relevant and high-quality text. Do NOT answer questions; simply write on behalf of the user. Use the provided "input" (writing task) and "context" (extra information) to tailor your response. Focus on producing error-free and engaging writing. Do not explain your response, just provide the generated text please dont add any formatting or styling.
      
            Input: ${inputText}
            Context: ${context}
            `
          );

          let result = "";

          for await (const value of stream) {
            result = value
              .replace(/[^\w\s.,!?:\[\]()\-]/g, "")
              .replace(/[#*]/g, "");

            const footer = document.querySelector(".swal2-footer");
            if (footer) {
              footer.style.display = "none";
            }

            Swal.update({
              html: `<textarea class="result-content" disabled>${result}</textarea>`,
              footer: null,
              showCloseButton: true,
              didClose: () => {
                if (currentSession) {
                  currentSession.destroy();
                  currentSession = null;
                }
              },
            });

            const textarea = document.querySelector(".result-content");
            if (textarea) {
              textarea.scrollTop = textarea.scrollHeight;
            }
            Swal.showLoading();
          }

          return result;
        } catch (error) {
          // throw error;
        }
      }

      async summarizeContent(content) {
        const postContent = content;
       
        try{
        let currentSession = null;
        const summarizer = await window.ai.summarizer.create({
          sharedContext: "A blog post",
        });
        currentSession = summarizer;
        const stream = summarizer.summarizeStreaming(postContent, {
          context:
            "Avoid any toxic language and be as constructive as possible.",
        });

        let result = "";

        for await (const value of stream) {
          let counter = 1;
          result = value
            .replaceAll("\n\n\n\n", "\n\n")
            .replace(/^\s*[#*]/gm, () => `${counter++}.`);

          // Hide footer
          const footer = document.querySelector(".swal2-footer");
          if (footer) {
            footer.style.display = "none";
          }
          Swal.update({
            html: `<textarea class="result-content" disabled>${result}</textarea>`,
            footer: null,
            showCloseButton: true,
            didClose: () => {
              if (currentSession) {
                currentSession.destroy();
                currentSession = null;
              }
            },
          });

          const textarea = document.querySelector(".result-content");

          if (textarea) {
            textarea.scrollTop = textarea.scrollHeight;
          }
          Swal.showLoading();
        }
        return result;
      }catch(error){

      }
      }

      async generateAIContent(chipText, text) {
        if (!("ai" in self && "summarizer" in self.ai && "ai" in self && "languageModel" in self.ai)) {
            return;
          }

      
        let currentSession = null;
        const session = await window.ai.languageModel.create({
          systemPrompt: `Act as a professional content writer. Generate engaging, informative, and clear content without using markdown formatting of any kind like: * and #. Use bold text sparingly for headings, emphasis, or key points to enhance readability and highlight important information. For lists, use simple text-based formatting, such as:
Bulleted points with hyphens or bullets
Numbered lists with standard numbering 
Ensure all content is free of special markdown syntax like asterisks for italicization, hash symbols for headings, or backticks for code. Maintain a conversational, approachable tone, and create content that is accessible and easy to read `,
        });
        currentSession = session;

        try {
          const prompt =` ${chipText} ${text}. Generate engaging, informative, and clear content without using markdown formatting of any kind like: * and #. Use bold text sparingly for headings, emphasis, or key points to enhance readability and highlight important information. For lists, use simple text-based formatting, such as:
Bulleted points with hyphens or bullets
Numbered lists with standard numbering 
Ensure all content is free of special markdown syntax like asterisks for italicization, hash symbols for headings, or backticks for code. Maintain a conversational, approachable tone, and create content that is accessible and easy to read `;
       
          const response = await session.promptStreaming(prompt);
          let result = "";
          let previousChunk = "";

          // Process the stream chunks as they arrive
          for await (const chunk of response) {
            
            const newContent = chunk.slice(previousChunk.length);

            const cleanedContent = newContent
              .replace(/^#{1,6}\s+/gm, "")
              // Convert markdown bold to plain text
              .replace(/\*\*(.*?)\*\*/g, "$1")
              // Convert markdown bullets to plain bullet
              .replace(/^\s*[-*+]\s/gm, "• ")
              // Keep basic punctuation and structure
              .replace(/[^\w\s.,!?:'\-•\[\]()]/g, "");

            result += cleanedContent;
            previousChunk = chunk;
            const footer = document.querySelector(".swal2-footer");
            if (footer) {
              footer.style.display = "none";
            }

            Swal.update({
              html: `<textarea class="result-content" disabled>${result}</textarea>`,
              footer: null,
              showCloseButton: true,
              didClose: () => {
                if (currentSession) {
                  currentSession.destroy();
                  currentSession = null;
                }
              },
            });

            // Add auto-scroll
            const textarea = document.querySelector(".result-content");
            if (textarea) {
              textarea.scrollTop = textarea.scrollHeight;
            }
            Swal.showLoading();
          }
          return result;
        } catch (error) {}
      }
     
      getPromptData() {
        return {
          paragraph: {
            menuTitle: "Write a paragraph on this",
            prompt:
              "Write a paragraph on this topic:\n\n[[text]]\n\n----\nWritten paragraph\n",
          },
          continue: {
            menuTitle: "Continue this text",
            prompt:
              "Continue this text:\n\n[[text]]\n\n----\nContinued text about this topic\n",
          },
          ideas: {
            menuTitle: "Generate ideas on this",
            prompt:
              "Generated ideas on this topic\n\n[[text]]\n\n----\nGenerated ideas on this topic \n",
          },
          article: {
            menuTitle: "Write an article about this",
            prompt:
              "Write a complete article about this:\n\n[[text]]\n\n----\nWritten article about this topic\n",
          },
          tldr: {
            menuTitle: "Generate a TL;DR",
            prompt:
              "Generate a TL;DR of this text:\n\n[[text]]\n\n----\nTL;DR about this topic\n",
          },
        };
      }

      async genearteContentHandler() {

        if (!window.hasOwnProperty('chrome') || !navigator.userAgent.includes('Chrome') || navigator.userAgent.includes('Edg')) {
          Swal.fire({
            title: "Chrome Browser Required",
            html: `<div class="ai_text_model_error">
            <p>This feature is exclusively supported on the Google Chrome browser.</p>
           </div>`,
            showCloseButton: true,
            showConfirmButton: false,
            width: 400,
            customClass: {
              container: "aacgfe-modal-main-wrp",
            },
          });
          return;
      }
      const chromeVersion = (() => {
        const raw = navigator.userAgent.match(/Chrom(e|ium)\/([0-9]+)\./);
        return raw ? parseInt(raw[2], 10) : null;
      })();

       if (chromeVersion === null || chromeVersion < 132) {
        Swal.fire({
          title: "Chrome Update Required",
          html: `<div class="ai_text_model_error">
            <p>Please update your Chrome browser to version 132 or later to use this feature.</p>
          </div>`,
          showCloseButton: true,
          showConfirmButton: false,
          width: 400,
          customClass: {
            container: "aacgfe-modal-main-wrp",
            title:"aacgfe-modal-title",
          },
        });
        return;
       }

        if (!("ai" in self && "summarizer" in self.ai && "ai" in self && "languageModel" in self.ai ) ) {
 
          Swal.fire({
            title: "AI Model Unavailable",
            html: `<div class="ai_text_model_error"><p><b> Warning! Ensure the AI model is installed in your browser by referring to the official  <a href="https://developer.chrome.com/docs/ai/built-in-apis" target="_blank" rel="noopener noreferrer">Chrome AI Model documentation</a>. Then, enable these flags:</b>
            <ol>
              <li>Please update your Chrome browser to version 132 or later.</li>
              <li>Copy this flag and paste it in your chrome browser search bar</li>
              <li><code class="aacgfe-code-block">chrome://flags/#optimization-guide-on-device-model</code> – Enabled BypassPerfRequirement this flag.</li>
              <li><code class="aacgfe-code-block">chrome://flags/#prompt-api-for-gemini-nano</code> - Enable this flag.</li>
              <li><code class="aacgfe-code-block">chrome://flags/#summarization-api-for-gemini-nano</code> – Enable this flag.</li>
              <li>Then relaunch your browser</li>
            </ol>
            <p><b>For more details, check the official <a href="https://docs.coolplugins.net/" target="_blank">documentation</a></b></p>
            </div>`,
            showCloseButton: true,
            showConfirmButton: false,
            width: 600,
            customClass: {
              container: "aacgfe-modal-main-wrp",
            },
          });
          return;
        
        
        }
        

         const available = (await self.ai.languageModel.capabilities())
          .available;
          

         const availablesum = (await self.ai.summarizer.capabilities())
          .available;
          if (available === "no" || available === "after-download" || availablesum === "no" || availablesum === "after-download") {
            Swal.fire({
              title: "AI Model Unavailable",
              html: `<div class="ai_text_model_error"><p><b> Warning! Ensure the AI model is installed in your browser by referring to the official  <a href="https://developer.chrome.com/docs/ai/built-in-apis" target="_blank" rel="noopener noreferrer">Chrome AI Model documentation</a>. Then, enable these flags:</b>
              <ol>
                <li>Please update your Chrome browser to version 132 or later.</li>
                <li>Copy this flag and paste it in your chrome browser search bar</li>
                <li><code class="aacgfe-code-block">chrome://flags/#optimization-guide-on-device-model</code> – Enabled BypassPerfRequirement this flag.</li>
                <li><code class="aacgfe-code-block">chrome://flags/#prompt-api-for-gemini-nano</code> - Enable this flag.</li>
                <li><code class="aacgfe-code-block">chrome://flags/#summarization-api-for-gemini-nano</code> – Enable this flag.</li>
                <li>Then relaunch your browser</li>
              </ol>
              <p><b>For more details, check the official <a href="https://docs.coolplugins.net/" target="_blank">documentation</a></b></p>
              </div>`,
              showCloseButton: true,
              showConfirmButton: false,
              width: 600,
              customClass: {
                container: "aacgfe-modal-main-wrp",
              },
            });
            return;
        }

        const content = await this.getContent();
        if (!content || content.trim() === '') {
          Swal.fire({
            html: `<div class="ai_text_model_error_content"><p>Please enter some content first</p></div>`,
            showCloseButton: true,
            showConfirmButton: false
          });
          return;
        }
      
        const promptData = this.getPromptData();

        const resultContent = document.querySelector(".result-content");

        if (resultContent) {
          resultContent.value = ""; // Clear any previous content
        }

        const promptOptions = Object.entries(promptData)
          .map(
            ([key, value]) => `
            <option value="${key}">${value.menuTitle}</option>
          `
          )
          .join("");

        Swal.fire({
          title: "AI Content Generator",
          html: `<div><p>Generate Content in Few Seconds With Chrome Built-in AI. </p></div>
            <div class="ai-content-generator">
              <div class="input-wrapper">
                <textarea class="ai-prompt-input" disabled>${content}</textarea>
              </div>
              <div class="suggested-prompts">
                <h6>Suggested Prompts</h6>
                <div class="prompt-chips">
                  <button class="prompt-chip">Make it shorter</button>
                  <button class="prompt-chip">Make it longer</button>
                  <button class="prompt-chip">Fix the grammar</button>
                  <button class="prompt-chip">Write on this topic</button>
                  <button class="prompt-chip">Summarize this</button>
                   <select id="custom-prompts" class="custom-prompt-select">
                    <option value="" disabled selected>Select a prompt</option>
                    ${promptOptions}
                  </select>
                </div>
              
              </div>
            </div>`,
          footer: `<div class="result-actions">
            <button class="regenerate-btn" id="ai_regenrate_button">Generate Text</button>
          </div>`,
          showCloseButton: true,

          customClass: {
            container: "aacgfe-modal-main-wrp",
            loader: "loading",
          },

          showConfirmButton: false,
          width: 600,
          didOpen: () => {
            const input = document.querySelector(".ai-prompt-input");
            const modal = document.querySelector(".swal2-container");
            const customPromptSelect =
              document.querySelector("#custom-prompts");

            // Prevent input focus from deselecting the widget
            modal.addEventListener("mousedown", (e) => e.stopPropagation());
            modal.addEventListener("mouseup", (e) => e.stopPropagation());
            modal.addEventListener("click", (e) => e.stopPropagation());
            modal.addEventListener("focus", (e) => e.stopPropagation(), true);

            let promptText = "";

            // Handle prompt chip clicks
            document.querySelectorAll(".prompt-chip").forEach((chip) => {
              chip.addEventListener("click", () => {
                // Remove active class and reset styles from all chips
                document.querySelectorAll(".prompt-chip").forEach((c) => {
                  c.classList.remove("active");
                });
                // Add active class and set styles to clicked chip
                chip.classList.add("active");

                // Reset custom prompt select
                customPromptSelect.value = "";
                // Set the prompt text
                promptText = chip.textContent;

                return promptText;
              });
            });

            // Handle custom prompt selection
            customPromptSelect.addEventListener("change", (e) => {
              // Remove active class from all chips when dropdown is selected
              document.querySelectorAll(".prompt-chip").forEach((chip) => {
                chip.classList.remove("active");
              });
              const selectedPrompt = promptData[e.target.value];
              if (selectedPrompt) {
                promptText = selectedPrompt.prompt.replace("[[text]]", content);
              }
            });

            // Handle generate content
            const generateContent = async () => {
              const promptddText = promptText;

              if (!promptText) return;

              // Hide prompt chips and dropdown instead of just disabling
              document.querySelector(".suggested-prompts").style.display =
                "none";

              Swal.showLoading();
              document.querySelector("#ai_regenrate_button").style.display =
                "none";
              document
                .querySelector(".swal2-container")
                .classList.add("loading");
              
              let result;
              if (promptddText === "Summarize this") {
                result = await this.summarizeContent(content);
              } else if (promptddText === "Make it shorter") {
                result = await this.shortContent(content);
              } else if (promptddText === "Write on this topic") {
                result = await this.writeContent(content);
              } else {
                result = await this.generateAIContent(content, promptText);
              }

              if (result) {
                Swal.fire({
                  title: "AI Content Generator",
                  width: 600,
                  html: `<textarea class="result-content" disabled>${result}</textarea>`,
                  showConfirmButton: false,
                  footer: `<div class="ai_footer_main_div">
                    <button class="regenerate-btn" id="ai_new_promt_button">New Prompt</button>
                    <button class="regenerate-btn" id="ai_use_text_button">Use Text</button>
                  </div>`,
                  showCloseButton: true,
                  customClass: {
                    container: "aacgfe-modal-main-wrp",
                    loader: "loading",
                  },
                });

                // Updated "Use Text" button click handler
                document
                  .getElementById("ai_use_text_button")
                  .addEventListener("click", () => {
                    try {
                      const content = result.trim().replace(/\r?\n/g, "<br />");
                      if (window.parent.tinyMCE) {
                        const editorId = this.editor.attr("id");
                        const activeEditor =
                          window.parent.tinyMCE.get(editorId);
                        if (activeEditor) {
                          activeEditor.setContent(content);
                          activeEditor.fire("change");
                        }
                      } else {
                        this.editor.val(content);
                        this.editor.trigger("change");
                      }
                      Swal.close();
                    } catch (error) {
                      this.editor.val(result.trim());
                      this.editor.trigger("change");
                      Swal.close();
                    }
                  });

                // Handle "New Prompt" button click
                document
                  .getElementById("ai_new_promt_button")
                  .addEventListener("click", (ele) => {
                    ele.stopPropagation();
                    this.genearteContentHandler();
                  });
              }
            };

            // Add enter key handler
            input.addEventListener("keypress", (e) => {
              if (e.key === "Enter") {
                generateContent();
              }
            });

            // Add regenerate button handler
            document
              .querySelector(".regenerate-btn")
              .addEventListener("click", generateContent);
          },
        });
      }
    }

    $(window).on("elementor/frontend/init", function () {
      elementor.channels.editor.on(
        "ai:content:generate",
        function (controlView) {
          const obj = new HandleAll(controlView);
          obj.genearteContentHandler();
        }
      );
    });
  })(jQuery);
}
