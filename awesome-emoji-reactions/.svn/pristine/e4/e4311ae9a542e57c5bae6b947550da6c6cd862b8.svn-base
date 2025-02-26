jQuery(document).ready(function($) {
    $(document).on('click', '.aerppk-reaction-button', function(e) {
        e.preventDefault();
        
        // Проверяем разрешены ли гостевые реакции
        if (!aerppkAjax.isLoggedIn && !aerppkAjax.allowGuests) {
            var container = $(this).closest('.aerppk-reactions-container');
            
            // Проверяем, нет ли уже сообщения
            if (!container.next('.aerppk-message').length) {
                $('<div class="aerppk-message">' + aerppkAjax.messages.loginRequired + '</div>')
                    .insertAfter(container)
                    .delay(2000)
                    .fadeOut(function() {
                        $(this).remove();
                    });
            }
            return;
        }
        
        var button = $(this);
        var container = button.closest('.aerppk-reactions-container');
        var postId = container.data('post-id');
        var emoji = button.data('emoji');
        
        // Для гостей используем REST API
        if (!aerppkAjax.isLoggedIn && aerppkAjax.allowGuests) {
            // Сначала обновляем UI
            if (button.hasClass('active')) {
                button.removeClass('active');
                var count = parseInt(button.find('.aerppk-count').text()) || 0;
                button.find('.aerppk-count').text(Math.max(0, count - 1));
            } else {
                var activeButton = container.find('.aerppk-reaction-button.active');
                if (activeButton.length) {
                    activeButton.removeClass('active');
                    var oldCount = parseInt(activeButton.find('.aerppk-count').text()) || 0;
                    activeButton.find('.aerppk-count').text(Math.max(0, oldCount - 1));
                }
                button.addClass('active');
                var newCount = parseInt(button.find('.aerppk-count').text()) || 0;
                button.find('.aerppk-count').text(newCount + 1);
            }

            // Затем отправляем запрос
            $.ajax({
                url: aerppkAjax.restUrl + 'aer/v1/reaction',
                method: 'POST',
                data: {
                    post_id: postId,
                    emoji: emoji
                }
            });
        } else {
            // Сохраняем предыдущее состояние
            var previousState = {
                buttons: container.find('.aerppk-reaction-button').map(function() {
                    return {
                        emoji: $(this).data('emoji'),
                        count: parseInt($(this).find('.aerppk-count').text()) || 0,
                        active: $(this).hasClass('active')
                    };
                }).get()
            };

            // Обновляем UI сразу
            if (button.hasClass('active')) {
                button.removeClass('active');
                var count = parseInt(button.find('.aerppk-count').text()) || 0;
                button.find('.aerppk-count').text(Math.max(0, count - 1));
            } else {
                var activeButton = container.find('.aerppk-reaction-button.active');
                if (activeButton.length) {
                    activeButton.removeClass('active');
                    var oldCount = parseInt(activeButton.find('.aerppk-count').text()) || 0;
                    activeButton.find('.aerppk-count').text(Math.max(0, oldCount - 1));
                }
                button.addClass('active');
                var newCount = parseInt(button.find('.aerppk-count').text()) || 0;
                button.find('.aerppk-count').text(newCount + 1);
            }

            // Отправляем запрос
            $.ajax({
                url: aerppkAjax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'add_reaction',
                    post_id: postId,
                    emoji: emoji,
                    nonce: aerppkAjax.nonce
                },
                success: function(response) {
                    if (!response.success) {
                        console.error('Error in response:', response.data);
                        // Восстанавливаем состояние при ошибке
                        previousState.buttons.forEach(function(state) {
                            var btn = container.find(`.aerppk-reaction-button[data-emoji="${state.emoji}"]`);
                            btn.find('.aerppk-count').text(state.count);
                            if (state.active) {
                                btn.addClass('active');
                            } else {
                                btn.removeClass('active');
                            }
                        });
                    }
                }
            });
        }
    });
}); 