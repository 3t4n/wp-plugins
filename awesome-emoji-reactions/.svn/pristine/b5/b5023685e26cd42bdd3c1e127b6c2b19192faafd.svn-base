jQuery(document).ready(function($) {
    // База эмодзи
    const emojiCategories = {
        'Smileys & People': [
            '😀', '😃', '😄', '😁', '😅', '😂', '🤣', '😊', '😇', '🙂', '🙃', '😉', '😌', '😍', '🥰', '😘', '😗', '😙', '😚', '😋',
            '😛', '😝', '😜', '🤪', '🤨', '🧐', '🤓', '😎', '🤩', '🥳', '😏', '😒', '😞', '😔', '😟', '😕', '🙁', '☹️', '😣', '😖',
            '😫', '😩', '🥺', '😢', '😭', '😤', '😠', '😡', '🤬', '🤯', '😳', '🥵', '🥶', '😱', '😨', '😰', '😥', '😓', '🤗', '🤔',
            '🤭', '🤫', '🤥', '😶', '😐', '😑', '😬', '🙄', '😯', '😦', '😧', '😮', '😲', '🥱', '😴', '🤤', '😪', '😵', '🤐', '🥴',
            '🤢', '🤮', '🤧', '😷', '🤒', '🤕', '🤑', '🤠', '😈', '👿', '👹', '👺', '🤡', '💩', '👻', '💀', '☠️', '👽', '👾', '🤖'
        ],
        'Gestures': [
            '👍', '👎', '👊', '✊', '🤛', '🤜', '🤞', '✌️', '🤟', '🤘', '👌', '🤌', '🤏', '👈', '👉', '👆', '👇', '☝️', '👋', '🤚',
            '🖐️', '✋', '🖖', '👏', '🙌', '👐', '🤲', '🤝', '🙏', '✍️', '💅', '🤳', '💪', '🦾', '🦿', '🦵', '🦶', '👂', '🦻', '👃'
        ],
        'Hearts': [
            '❤️', '🧡', '💛', '💚', '💙', '💜', '🖤', '🤍', '🤎', '💔', '❤️‍🔥', '❤️‍🩹', '💕', '💞', '💓', '💗', '💖', '💘', '💝',
            '💟', '❣️', '💌'
        ],
        'Animals': [
            '🐶', '🐱', '🐭', '🐹', '🐰', '🦊', '🐻', '🐼', '🐨', '🐯', '🦁', '🐮', '🐷', '🐸', '🐵', '🐔', '🐧', '🐦', '🦆', '🦅',
            '🦉', '🦇', '🐺', '🐗', '🐴', '🦄', '🐝', '🐛', '🦋', '🐌', '🐞', '🐜', '🪲', '🪳', '🦟', '🦗', '🕷️', '🕸️', '🐢', '🐍',
            '🦎', '🦖', '🦕', '🐙', '🦑', '🦞', '🦀', '🐡', '🐠', '🐟', '🐬', '🐳', '🐋', '🦈', '🦭', '🐊', '🦓', '🦍', '🦧', '🦣',
            '🐘', '🦒', '🦏', '🦛', '🐪', '🐫', '🦘', '🦥', '🦦', '🦨', '🦡', '🐃', '🐄', '🐎', '🐖', '🐏', '🐑', '🦙', '🐐', '🦌',
            '🐕', '🐩', '🐈', '🐓', '🦃', '🦚', '🦜', '🦢', '🦩', '🕊️', '🦤', '🐇', '🦝', '🦨'
        ],
        'Food & Drink': [
            '🍏', '🍎', '🍐', '🍊', '🍋', '🍌', '🍉', '🍇', '🍓', '🫐', '🍈', '🍒', '🍑', '🥭', '🍍', '🥥', '🥝', '🍅', '🥑', '🍆',
            '🥕', '🌽', '🌶️', '🥒', '🥬', '🥦', '🧄', '🧅', '🍠', '🥔', '🍤', '🍗', '🍖', '🍔', '🍟', '🍕', '🌭', '🥪', '🌮', '🌯',
            '🥙', '🧆', '🥘', '🍲', '🍜', '🍛', '🍣', '🍱', '🥟', '🍤', '🍙', '🍚', '🍩', '🍪', '🍰', '🎂', '🧁', '🍫', '🍬', '🍭',
            '🍮', '🍯', '🧉', '🥤', '🍵', '🍶', '🍾', '🍷', '🍸', '🍹', '🍺', '🍻', '🥂'
        ],
        'Activities': [
            '⚽️', '🏀', '🏈', '⚾️', '🥎', '🎾', '🏐', '🏉', '🎱', '🎮', '🎲', '🧩', '🎭', '🎨', '🎬', '🎤', '🎧', '🎼', '🎹', '🥁',
            '🎷', '🎺', '🎸', '🎻', '🏹', '🛹', '🛼', '🎯', '🎳', '🥊', '🥋', '🪁', '🪃', '🏋️‍♂️', '🏌️‍♂️', '⛷️', '🏂', '🏄‍♀️', '🚴‍♂️', '🧗'
        ],
        'Holidays': [
            '🎈', '🎉', '🎊', '🎁', '🎂', '🎄', '🎃', '🎗️', '🎟️', '✨', '🎆', '🎇', '🧨', '🎐', '🎏', '🎎', '🎍', '🎋', '🎀',
            '🎠', '🎡', '🎢', '🎪', '🪅', '🪩', '🎇'
        ],
        'Transport': [
            '🚗', '🚕', '🚙', '🚌', '🚎', '🏎️', '🚓', '🚑', '🚒', '🚐', '🚚', '🚛', '🚜', '🚲', '🛴', '🛵', '🏍️', '🚂', '🚃', '🚄',
            '🚅', '🚆', '🚇', '🚈', '🚊', '🚝', '🚞', '🚀', '🛸', '🚁', '🛩️', '✈️', '🛳️', '⛴️', '🚤', '⛵️', '🛥️', '🚦'
        ]
    };
    

    // Function to create picker
    function createPicker() {
        const pickerHtml = `
            <div class="emoji-picker" style="display: none;">
                <div class="emoji-picker__tabs">
                    ${Object.keys(emojiCategories).map(category => 
                        `<button type="button" class="emoji-picker__tab" data-category="${category}">${category}</button>`
                    ).join('')}
                </div>
                <div class="emoji-picker__content">
                    ${Object.entries(emojiCategories).map(([category, emojis]) => `
                        <div class="emoji-picker__category" data-category="${category}" style="display: none;">
                            ${emojis.map(emoji => 
                                `<button type="button" class="emoji-picker__emoji" data-emoji="${emoji}">${emoji}</button>`
                            ).join('')}
                        </div>
                    `).join('')}
                </div>
            </div>
        `;

        // Delete old picker
        $('.emoji-picker').remove();
        
        // Add new picker
        $('body').append(pickerHtml);
        
        // Activate first tab
        $('.emoji-picker__tab:first').addClass('active');
        $('.emoji-picker__category:first').show();
    }

    // Create picker on load
    createPicker();

    // Click handler for "Add emoji" button
    $('#add-emoji').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        const picker = $('.emoji-picker');
        const button = $(this);
        
        if (picker.is(':visible')) {
            picker.hide();
        } else {
            const pos = button.offset();
            picker.css({
                position: 'absolute',
                top: pos.top + button.outerHeight() + 5,
                left: pos.left
            }).show();
        }
    });

    // Tab switching
    $(document).on('click', '.emoji-picker__tab', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        const category = $(this).data('category');
        
        // Activate tab
        $('.emoji-picker__tab').removeClass('active');
        $(this).addClass('active');
        
        // Show category
        $('.emoji-picker__category').hide();
        $(`.emoji-picker__category[data-category="${category}"]`).show();
    });

    // Add loading indicator
    function showLoader(element) {
        element.append('<span class="aerppk-loader"></span>');
        element.css('opacity', '0.5');
    }

    function hideLoader(element) {
        element.find('.aerppk-loader').remove();
        element.css('opacity', '1');
    }

    // Form submit handler
    $('form.aerppk-settings-form').on('submit', function(e) {
        const currentEmojis = $('#enabled-emojis').val();
        $(this).data('saved-emojis', currentEmojis);
    });

    // Click handler for removing emoji
    $(document).on('click', '.aerppk-remove-emoji', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        const tag = $(this).closest('.aerppk-emoji-tag');
        const container = $('.aerppk-selected-emojis');
        const emojiToRemove = tag.attr('data-emoji');
        const input = $('#enabled-emojis');
        
        let emojis = [];
        try {
            emojis = JSON.parse(input.val() || '[]');
            emojis = emojis.filter(emoji => emoji !== emojiToRemove);
            
            showLoader(container);
            
            $.ajax({
                url: aerppkAdmin.ajaxurl,
                type: 'POST',
                data: {
                    action: 'save_aerppk_options',
                    nonce: aerppkAdmin.nonce,
                    emojis: JSON.stringify(emojis)
                },
                success: function(response) {
                    if (response.success) {
                        input.val(JSON.stringify(emojis));
                        
                        $('form.aerppk-settings-form').find('input[name="aerppk_options[enabled_emojis]"]')
                            .val(JSON.stringify(emojis));
                        
                        tag.fadeOut(200, function() {
                            $(this).remove();
                            if ($('.aerppk-emoji-tag').length === 0) {
                                container.html('<div class="aerppk-no-emojis">Нет выбранных эмодзи</div>');
                            }
                        });
                    }
                },
                complete: function() {
                    hideLoader(container);
                }
            });
        } catch(e) {
            console.error('Parse error:', e);
        }
    });

    // Click handler for selecting emoji
    $(document).on('click', '.emoji-picker__emoji', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        const emoji = $(this).data('emoji');
        const input = $('#enabled-emojis');
        const container = $('.aerppk-selected-emojis');
        let emojis = [];
        
        try {
            emojis = JSON.parse(input.val() || '[]');
        } catch(e) {
            emojis = [];
        }

        if (!emojis.includes(emoji)) {
            showLoader(container);
            emojis.push(emoji);
            
            $.ajax({
                url: aerppkAdmin.ajaxurl,
                type: 'POST',
                data: {
                    action: 'save_aerppk_options',
                    nonce: aerppkAdmin.nonce,
                    emojis: JSON.stringify(emojis)
                },
                success: function(response) {
                    if (response.success) {
                        input.val(JSON.stringify(emojis));
                        container.append(`
                            <span class="aerppk-emoji-tag">
                                <span class="emoji-content">${emoji}</span>
                                <button type="button" class="aerppk-remove-emoji">&times;</button>
                            </span>
                        `);
                        $('.emoji-picker').hide();
                    }
                },
                complete: function() {
                    hideLoader(container);
                }
            });
        }
    });

    // Close picker on click outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.emoji-picker').length && 
            !$(e.target).closest('#add-emoji').length) {
            $('.emoji-picker').hide();
        }
    });

    // Add handler after page load
    $(window).on('load', function() {
    });
});
