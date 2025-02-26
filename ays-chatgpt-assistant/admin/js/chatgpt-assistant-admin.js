(function( $ ) {
	'use strict';

	$(document).ready(function () {
		$(document).find('.ays-assistant-chatbox').show();

		$(document).find('.ays-assistant-chatbox-closed-view').on('click', function () {
			$(this).hide();
			$(document).find('.ays-assistant-chatbox-main-container').show();
		});
		
		$(document).find('.ays-assistant-chatbox-logo-box').on('click', function () {
			$(this).parents('.ays-assistant-chatbox-main-container').hide();
			$(document).find('.ays-assistant-chatbox-closed-view').show();
		});

		$(document).find('.ays-assistant-chatbox-prompt-input').on('input', function () {
			var _this = this;

			var sendBttn = $(document).find('.ays-assistant-chatbox-send-button');

			if ($(_this).val().trim() != "") {
				sendBttn.prop('disabled', false);
			} else {
				sendBttn.prop('disabled', true);
			}
		});

		$(document).on('keypress', function (e) {
			if (e.which == 13) {
				var prompt = $(document).find('.ays-assistant-chatbox-prompt-input');
				if ($(prompt).val().trim() != '' &&  $(prompt).is(":focus")) {
					var button = $(document).find('.ays-assistant-chatbox-send-button');
					if ( !button.prop('disabled') ) {
						button.trigger("click");
					}
				}
			}
		});

		$(document).find('.ays-assistant-chatbox-send-button').on('click', function () {
			var url = "https://api.openai.com/v1/completions";
			var key = $(document).find('.ays-assistant-chatbox-apikey').val();
			var prompt = $(document).find('.ays-assistant-chatbox-prompt-input').val();

			var loader = $(document).find('.ays-assistant-chatbox-loading-box');
			var sendBttn = $(document).find('.ays-assistant-chatbox-send-button');

			var userMessage = $("<div>", {"class": "ays-assistant-chatbox-user-message-box"}).html(prompt);
			$(document).find('.ays-assistant-chatbox-prompt-input').val('');

			$(document).find('.ays-assistant-chatbox-messages-box').append(userMessage).scrollTop($('.ays-assistant-chatbox-messages-box')[0].scrollHeight);
			var scrolledHeight = $('.ays-assistant-chatbox-messages-box')[0].scrollHeight;
			var elementHeight = Math.round($('.ays-assistant-chatbox-messages-box').outerHeight());
			loader.css('bottom', (10 + elementHeight - scrolledHeight));

			if (key != '' && prompt.trim() != '') {
				loader.show();
				sendBttn.prop('disabled', true);

				makeRequest(url, key, prompt)
				.then(data => {
					loader.hide();
					var response = data.choices[0].text;
					var aiMessage = $("<div>", {"class": "ays-assistant-chatbox-ai-message-box"}).html(response);
					
					$(document).find('.ays-assistant-chatbox-messages-box').append(aiMessage).scrollTop($('.ays-assistant-chatbox-messages-box')[0].scrollHeight);
					var scrolledHeight = $('.ays-assistant-chatbox-messages-box')[0].scrollHeight;
					var elementHeight = Math.round($('.ays-assistant-chatbox-messages-box').outerHeight());
					loader.css('bottom', (10 + elementHeight - scrolledHeight));
				})
				.catch(error => {
					loader.hide();
					$(document).find('.ays-assistant-chatbox-messages-box').append($("<div>", {"class": "ays-assistant-chatbox-error-message-box"}).html(error));
				});
			}
		});
	});

	function makeRequest (url, key, prompt, tries = 0) {
		return fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": `Bearer ${key}`
                },
                body: JSON.stringify({
                    model: "text-davinci-003", 
                    prompt: prompt,
                    max_tokens: 2000,
                    temperature: 0.8
                })
            })
			.then(response => {
				if (!response.ok) {
				  	throw new Error("Network is not responding, please try again");
				}
				return response.json();
			})
			.catch(error => {
				if (tries < 3) {
				  	return makeRequest(url, key, prompt, tries + 1);
				} else {
					throw new Error("Network is not responding, please try again");
				}
			});
	}

})( jQuery )
