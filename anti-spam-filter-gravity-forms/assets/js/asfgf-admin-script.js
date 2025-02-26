(function($) {
    $(document).ready(function() {

        function updateHiddenInput() {
            var formIds = [];
            $('.asfgf_wrap #bubble-container .bubble span').each(function() {
                formIds.push($(this).text());
            });
            $('#asfgf_form_ids').val(formIds.join(',')); 
        }

        function updateHiddenKeywordInput() {
            var formIds = [];
            $('.asfgf_wrap #bubble-container-remove-button-filter_keywords .bubble span').each(function() {
                formIds.push($(this).text());
            });
            $('#asfgf_keywords').val(formIds.join(',')); 
        }



        $('#asfgf_enabled_toggleSwitch').click(function() {
            $(this).toggleClass('active'); 
        });
        $('#asfgf_enabled_toggleSwitch').click(function() {
            var hiddenInput = $('#asfgf_enabled');
            var isEnabled = hiddenInput.val() === '1';
            hiddenInput.val(isEnabled ? '0' : '1');
            if(isEnabled){
                $('.asfgf_form_id_box').hide();
                $('.asfgf_cyrillic_enabled_switch , .asfgf_keywords_enabled_switch,.asfgf_kill_spam_enabled_switch').addClass('disabled');
                $('.asfgf_wrap #add-button-keywords ,.asfgf_wrap #keyword-text-id,.asfgf_wrap .remove-button-filter_keywords').attr('disabled', 'disabled');

               
            }else{
                $('.asfgf_form_id_box').show(); 
                $('.asfgf_cyrillic_enabled_switch , .asfgf_keywords_enabled_switch,.asfgf_kill_spam_enabled_switch').removeClass('disabled');
                $('.asfgf_wrap #add-button-keywords , .asfgf_wrap #keyword-text-id,.asfgf_wrap .remove-button-filter_keywords').removeAttr('disabled');

            }

            $(this).toggleClass('active', !isEnabled);
        });


        $('#asfgf_cyrillic_enabled_toggleSwitch').click(function() {
            var hiddenInput = $('#asfgf_cyrillic');
            var isEnabled = hiddenInput.val() === '1';
            hiddenInput.val(isEnabled ? '0' : '1');
            $(this).toggleClass('active', !isEnabled);
        });

        $('#asfgf_keywords_enabled_toggleSwitch').click(function() {
            var hiddenInput = $('#asfgf_keywords_enabled');
            var isEnabled = hiddenInput.val() === '1';
            hiddenInput.val(isEnabled ? '0' : '1');
            $(this).toggleClass('active', !isEnabled);
            if(isEnabled){
                $('#asfgf_keywords_container').hide();           
            }else{
                $('#asfgf_keywords_container').show(); 

            }
        });

        $('#asfgf_kill_spam_enabled_toggleSwitch').click(function() {
            var hiddenInput = $('#asfgf_kill_spam');
            var isEnabled = hiddenInput.val() === '1';
            hiddenInput.val(isEnabled ? '0' : '1');
            $(this).toggleClass('active', !isEnabled);
        });


        $('.asfgf_wrap #add-button').on('click', function() {
            var input = $('.asfgf_wrap #form-id-input');
            var value = input.val()
            const bubbleContainer = $('.asfgf_wrap #bubble-container');
            if(bubbleContainer.children('.bubble').length < 1) {
                if (value) {
                    $('.asfgf_wrap #bubble-container').append(
                        '<div class="bubble"><span>' + value + '</span><button class="remove-button remove-bubble-button">×</button></div>'
                    );
                    input.val('');
                    updateHiddenInput();
                }
            }else{
                $(".asfgf_form_id_box #error-message").show()
            }
        });
    
        // Delegate the click event to dynamically created remove buttons
        $('.asfgf_wrap #bubble-container').on('click', '.remove-button', function() {
            $(this).parent('.bubble').remove();
            $(".asfgf_form_id_box #error-message").hide()
            updateHiddenInput();
        });


        $('.asfgf_wrap #add-button-keywords').on('click', function() {
            var input = $('#keyword-text-id');     
            var value = input.val()
            const bubbleContainer = $('.asfgf_wrap #bubble-container-remove-button-filter_keywords');
            if(bubbleContainer.children('.bubble').length < 3) {
                if (value) {
                    $('.asfgf_wrap #bubble-container-remove-button-filter_keywords').append(
                        '<div class="bubble"><span>' + value + '</span><button class="remove-button-filter_keywords remove-bubble-button">×</button></div>'
                    );
                    input.val('');
                    updateHiddenKeywordInput();
                }
            }else{
                $("#asfgf_keywords_container #error-message").show()
            }
        });
    
        // Delegate the click event to dynamically created remove buttons
        $('.asfgf_wrap #bubble-container-remove-button-filter_keywords').on('click', '.asfgf_wrap .remove-button-filter_keywords', function() {
            $(this).parent('.bubble').remove();
            $("#asfgf_keywords_container #error-message").hide()
            updateHiddenKeywordInput();
        });
    });
})(jQuery);