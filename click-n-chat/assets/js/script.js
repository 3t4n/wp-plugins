jQuery(document).ready(function($) {
  	console.log(click_n_chat_ajax_object)
	$('.cnc-chat-messages').slimScroll({
		height: '100hv',
		start: 'bottom'
	});
	var first = true;
	const inputInitHeight = '30';
	var chatsvg = `<img class="rcnc-chat-left-received" width="20px" style="backgrosund:`+click_n_chat_ajax_object.chat_bg_color+`" src="`+click_n_chat_ajax_object.plugin_url+`assets/images/chatlefticonlb.png?rand=`+ Math.random() +`">`;
	var chat_bg_color = click_n_chat_ajax_object.chat_bg_color;
	var cnc_chatbot_icon = 	$('#cnc-chatbot-icon-img').attr('src');					
	$('#cnc-chatbot-icon').on('click', function() {
		
        var popup = $("#cnc-chatbot-popup");
		var closebg = $('#cnc-chatbot-icon-img').data('closebg');
		if(popup.is(':visible'))
		{
			if(closebg != "")
				$('#cnc-chatbot-icon-img').css('background','');
				
			$('#cnc-chatbot-icon-img').attr('src',cnc_chatbot_icon+'?rand=' + Math.random());
			$('#cnc-chatbot-icon-img').addClass('animate-popout');
			setTimeout(function() {
				$('#cnc-chatbot-icon-img').removeClass('animate-popout');
			}, 300);
			popup.fadeOut();
			
		}
		else
		{
			if(closebg != "")
				$('#cnc-chatbot-icon-img').css('background',closebg);
			$('#cnc-chatbot-icon-img').attr('src',click_n_chat_ajax_object.plugin_url+'assets/images/closeiconbw.png?rand=' + Math.random());
			$('#cnc-chatbot-icon-img').addClass('animate-popup');
			setTimeout(function() {
				$('#cnc-chatbot-icon-img').removeClass('animate-popup');
			}, 300);
			popup.fadeIn();
		}
		
		if (typeof cncanalytics === 'function') {
			cncanalytics();
		}
		
		if(first == true && click_n_chat_ajax_object.chat_name_start == "0")
		{
			$('.cnc-chat-body').show();
			first = false;
			setTimeout(function() {
				var recMessage = '<div class="cnc-message received tri-right left-top"><span class="rcnc-message-icon">'+chatsvg+'</span><div class="received-content" style="background:'+chat_bg_color+'">'+$('#click_n_chat_greetings_message').html()+'</div></div>';
				$('.cnc-chat-messages').append(recMessage);
			}, 500);
		}
		
    });
	
 	
	$('.cnc-icon-popup-icon').on('click', function() {
        var popupContainer = $(this).parent('.cnc-icon-popup-container');
        popupContainer.toggleClass('active');
		var closebg = $('#cnc-chatbot-icon-img').data('closebg');
 		if(!popupContainer.hasClass("active"))
		{
			if(closebg != "")
				$('#cnc-chatbot-icon-img').css('background','');
				
			$('#cnc-chatbot-icon-img').attr('src',cnc_chatbot_icon+'?rand=' + Math.random());
			$('#cnc-chatbot-icon-img').attr('style','background:'+$(this).data("header")+';border-radius:50%');
			$('#cnc-chatbot-icon-img').addClass('animate-popout');
			setTimeout(function() {
				$('#cnc-chatbot-icon-img').removeClass('animate-popout');
			}, 300);
			popup.fadeOut();
			
		}
		else
		{
			if(closebg != "")
				$('#cnc-chatbot-icon-img').css('background',closebg);
			$('#cnc-chatbot-icon-img').attr('src',click_n_chat_ajax_object.plugin_url+'assets/images/closeiconbw.png?rand=' + Math.random());
			
			$('#cnc-chatbot-icon-img').attr('style','background:'+$(this).data("header")+';border-radius:50%');
			 
			$('#cnc-chatbot-icon-img').addClass('animate-popup');
			setTimeout(function() {
				$('#cnc-chatbot-icon-img').removeClass('animate-popup');
			}, 300);
			popup.fadeIn();
		}
		
		if (typeof cncanalytics === 'function') {
			cncanalytics();
		}
    });
	
	$('#refreshImage').on('click', function() {
		$('.cnc-chat-messages').html('');
		var recMessage = '<div class="cnc-message received tri-right left-top"><span class="rcnc-message-icon">'+chatsvg+'</span><div class="received-content" style="background:'+chat_bg_color+'">'+$('#click_n_chat_greetings_message').html()+'</div></div>';
		$('.cnc-chat-messages').append(recMessage);
		$('.cnc-chat-suggestions').slideDown();
	});
	$('#closeImage').on('click', function() {
		$('#cnc-chatbot-icon').trigger('click');
	}); 
	// Close chat functionality  
	$('.chat-close').on('click', function() {  
		$('.cnc-chat-container').hide();  
	});  
	
	// Start chat  
	$('#cnc-start-chat').on('click', function() {  
		const name = $('#chat-name').val().trim();  
		const phone = $('#chat-phone').val().trim();  
		const email = $('#chat-email').val().trim();  
		if (name && phone && email) {  
			$('.cnc-loading-chat').show(); 
		} else {  
			alert("Please fill out all fields.");  
		}  
	});
	 
	// Send message functionality  
	$('.cnc-chat-send').on('click', function() {  
		const messageText = $('.chat-input').val().trim(); 
		$('.chat-input').val('').css("height", "30px");
		$('.cnc-chat-suggestions').hide();
		if (messageText) {  
			// Create a new message element  
			var sendMessage = '<div class="cnc-message sent"><div class="sent-content">'+messageText+'</div></div>';
			const messageElement = $('<div class="chat-cnc-message sent animate-chat"></div>').html(sendMessage);  
			$('.cnc-chat-messages').append(messageElement); // Append to chat messages  

			$('.cnc-loading-chat').show(); 
			$.ajax({
				type: 'POST',
				url: click_n_chat_ajax_object.ajax_url,
				data: {
					action: click_n_chat_ajax_object.auto_reply_method,
					message: messageText,
					security: click_n_chat_ajax_object.nonce,
					lid: $('#lid').val()
				},
				success: function(response) {
					$('.cnc-loading-chat').hide(); 
					var recMessage = '<div class="cnc-message received tri-right left-top"><span class="rcnc-message-icon">'+chatsvg+'</span><div class="received-content" style="background:'+chat_bg_color+'">'+response.reply+'</div></div>';
					
					$('.cnc-chat-messages').append('<div class="chat-message received animate-chat">'+recMessage+'</div>');
					$('.cnc-chat-messages').slimScroll({ scrollBy: $('.animate-chat').height() * 20 + 'px' });  
					$('.cnc-chat-messages').removeclass("animate-chat");
				}
			});
			$('.cnc-chat-messages').slimScroll({ scrollBy: $('.animate-chat').height() * 20 + 'px' });  
		}  
	});  
	
	$('.cnc-chat-suggestion-button').on('click', function() {  
		const messageText = $(this).html().trim();  
		$('.chat-input').val('').height(inputInitHeight);
		$('.cnc-chat-suggestions').hide();
		if (messageText) {  
			// Create a new message element  
			var sendMessage = '<div class="cnc-message sent"><div class="sent-content">'+messageText+'</div></div>';
			const messageElement = $('<div class="chat-cnc-message sent animate-chat"></div>').html(sendMessage);  
			$('.cnc-chat-messages').append(messageElement); // Append to chat messages  

			$('.cnc-loading-chat').show(); 
			$.ajax({
				type: 'POST',
				url: click_n_chat_ajax_object.ajax_url,
				data: {
					action: 'click_n_chat_get_auto_reply_action',
					message: messageText,
					security: click_n_chat_ajax_object.nonce,
					lid: $('#lid').val()
				},
				success: function(response) {
					$('.cnc-loading-chat').hide(); 
					var recMessage = '<div class="cnc-message received tri-right left-top"><span class="rcnc-message-icon">'+chatsvg+'</span><div class="received-content" style="background:'+chat_bg_color+'">'+response.reply+'</div></div>';
					
					$('.cnc-chat-messages').append('<div class="chat-message received animate-chat">'+recMessage+'</div>');
					$('.cnc-chat-messages').slimScroll({ scrollBy: $('.animate-chat').height() * 20 + 'px' });  
					$('.cnc-chat-messages').removeclass("animate-chat");
				}
			});
			$('.cnc-chat-messages').slimScroll({ scrollBy: $('.animate-chat').height() * 20 + 'px' });  
		}  
	}); 

	$('.chat-input').on('keydown', function(e) {  
		if(e.key === 'Enter' && !e.shiftKey) {
			e.preventDefault();
			$('.cnc-chat-send').click();
		}  
	}); 
	
	
	$(".chat-input").on("input", function () {
	  $(this).height(inputInitHeight).height(this.scrollHeight);
	});
	
});