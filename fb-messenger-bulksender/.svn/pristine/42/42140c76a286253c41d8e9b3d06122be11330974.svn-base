var NjtFbMess = function()
{
    var self = this;
    var $ = jQuery;

    /*
     * For subscribe pages
     */
    self.pages = [];

    /*
     * For sending message
     */
    self.first_time_sent = true;
    self.users = [];
    self.sending_type = 'text';

    self.content = '';
    self.content_image = '';
    self.content_audio = '';
    self.content_video = '';
    self.content_file = '';

    self.fb_page_id = '';
    self.fb_page_token = '';
    self.total = 0;
    self.total_sent = 0;
    self.total_fail = [];
    self.result_wrap = '.njt-fb-mess-results';
    self.isSending = false;
    self.init = function()
    {
        /*
         * Enable emojioneArea
         */
        //self.setEmoji();

        self.sendNowButtonClicked();

        $('.njt-fb-mess-view-fail-detail').click(function(event) {
            $('.njt-fb-mess-fail-details').stop().toggle();
        });

        self.subscribeBtnClicked();

        self.chooseImageClicked();

        /*
        var tb_unload_count = 1;
        jQuery(window).bind('tb_unload', function () {
            if (tb_unload_count > 1) {
                tb_unload_count = 1;
            } else {
                self.resetThickbox();

                tb_unload_count = tb_unload_count + 1;
            }
        });
        */
       
        /*
         * Send to changed
         */
        $('#njt_fb_mess_send_message_send_to').on('change', function(event) {
            var val = $(this).val();
            if (val == 'in_category') {
                $('#njt_fb_mess_send_message_choose_categories_wrap').show();
            } else {
                $('#njt_fb_mess_send_message_choose_categories_wrap').hide();
            }
        });
        /*
         * Action in sender list page
         */
        self.senderPageDoAction();
        self.catActionBtnClick();

        /*
         * Count selected users and display them
         */
        $('a.njt-fb-mess-send-all.thickbox').click(function(event) {
            var c = String(self.getSelectedSender().length);
            var el = $('#njt_fb_mess_send_message_send_to').find('option[value="selected"]');
            var old_title = el.data('title');
            el.text(old_title + ' (' + c + ')');
        });
    }
    self.chooseImageClicked = function()
    {
        $('.njt-fb-mess-choose-file').click(function(event) {
            var type = $(this).data('file');
            self.renderMediaUploader(type);
        });
    }
    
    self.renderMediaUploader = function(type)
    {
        'use strict';
        var file_frame;
            
        // If the media frame already exists, reopen it.
        if ( undefined !== file_frame ) {
            file_frame.open();
            return;
        }

        // Create a new media frame
        file_frame = wp.media({
            title: njt_fb_mess.add_media_text_title,
            button: {
                text: njt_fb_mess.add_media_text_button,
            },
            multiple: false
        });
        // When an image is selected in the media frame...
        file_frame.on('select', function() {
     
            var selection = file_frame.state().get('selection');                
            selection.map( function( attachment ) {                                    
                attachment = attachment.toJSON();
                //console.log(attachment);
                if ( attachment.id ) {
                    var file_choosed = attachment.url;
                    if (type == 'image') {
                        $('#njt_fb_mess_sending_tab_content_image').find('.njt-fb-mess-choosed-image').remove();
                        $('#njt_fb_mess_sending_tab_content_image').append('<img src="' + file_choosed + '" alt="" class="njt-fb-mess-choosed-image" />');                        
                        self.content_image = file_choosed;
                    } else if(type == 'audio') {                        
                        $('#njt_fb_mess_sending_tab_content_audio').find('audio').remove();
                        $('#njt_fb_mess_sending_tab_content_audio').append('<audio controls><source src="'+file_choosed+'" type="audio/mpeg">Your browser does not support the audio tag.</audio>');
                        self.content_audio = file_choosed;
                    } else if(type == 'video') {                        
                        $('#njt_fb_mess_sending_tab_content_video').find('video').remove();
                        $('#njt_fb_mess_sending_tab_content_video').append('<video width="320" height="240" controls><source src="'+file_choosed+'" type="video/mp4">Your browser does not support the video tag.</video>');
                        self.content_video = file_choosed;
                    } else if(type == 'file') {                        
                        $('#njt_fb_mess_sending_tab_content_file').find('.njt-fb-mess-choosed-file').remove();
                        $('#njt_fb_mess_sending_tab_content_file').append('<a href="'+file_choosed+'" class="njt-fb-mess-choosed-file" target="_blank">'+file_choosed+'</a>');
                        self.content_file = file_choosed;
                    }
                    
                }                
            });
        });
        file_frame.open();
    }
    self.setEmoji = function()
    {
        if ($('#njt_fb_mess_send_message_content').length) {
            $('#njt_fb_mess_send_message_content').emojioneArea({
                pickerPosition: 'bottom',
                hidePickerOnBlur: true
            });
        }
    }

    /*
     * Sender action
     */
    self.senderPageDoAction = function (){
        $('.njt-fb-mess-sender-frm #doaction').click(function(event) {
            var action = $(this).closest('.alignleft.actions.bulkactions').find('select[name="action"]').val();
            var action_name = $(this).closest('.alignleft.actions.bulkactions').find('select[name="action"]').find('option[value="'+action+'"]').text();

            if ((action == 'change_cat') || (action == 'add_new_cat')) {
                $('#njt_fb_mess_change_cat').find('input[name="cat_action"]').val(action);
                self.openThichboxCat(action_name);
                return false;
            }
        });
    }
    self.openThichboxCat = function($title)
    {
        tb_show($title, "/?TB_inline?height=440&amp;width=500&amp;inlineId=njt_fb_mess_change_cat_popup", null);
    }
    self.catActionBtnClick = function()
    {
        $('#submit_cat_action').click(function(event) {
            var $this = $(this);
            $this.addClass('updating-message');

            var act = $('#njt_fb_mess_change_cat').find('input[name="cat_action"]').val();
            var selected_cats = self.getSelectedCat();
            var selected_senders = self.getSelectedSender();

            var data = {
                'action': 'njt_fb_mess_cat_action',
                'act': act,
                'selected_cats' : selected_cats,
                'selected_senders': selected_senders,
            };
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: data,
            })
            .done(function(json) {
                $this.removeClass('updating-message');
                if (json.success) {
                    $('#njt_fb_mess_change_cat').prepend('<div class="njt_fb_mess_tb_status _success">' + json.data.mess + '</div>');                    
                } else {
                    $('#njt_fb_mess_change_cat').prepend('<div class="njt_fb_mess_tb_status _error">' + json.data.mess + '</div>');                    
                }
                setTimeout(function(){
                    $('#njt_fb_mess_change_cat').find('.njt_fb_mess_tb_status').remove();
                }, 3000);
            })
            .fail(function() {
                $this.removeClass('updating-message');
                console.log("error");
            });
            
        });
    }
    /*
     * End sender action
     */
    self.resetVariables = function()
    {
        self.total = 0;
        self.total_sent = 0;
        self.total_fail = [];
    }
    self.resetThickbox = function()
    {
        console.log('reset phat');
        /*
         * Reset send message thickbox
         */
        self.resetVariables();

        $(self.result_wrap).hide();
        $(self.result_wrap).find('h3').text('');

        //$('.njt-fb-mess-results-warning').hide();

        $(self.result_wrap).find('.njt-fb-mess-result-sent strong').text('0');
        $(self.result_wrap).find('.njt-fb-mess-result-fail strong').text('0');
        //$('.njt-fb-mess-view-fail-detail').hide();

        $('.njt-fb-mess-fail-details').html('');

        $('#njt_fb_mess_send_message_choose_categories_wrap').hide();
        $('#njt_fb_mess_send_message_send_to').val('all');
        /*
         * Reset cat_action thickbox
         */
        $('#njt_fb_mess_change_cat').find('input[name="cat_action"]').val('');
        $('#njt_fb_mess_change_cat').find('input[name="cat_id[]"]').each(function(index, el) {
            $(el).prop('checked', false);
        });
        $('#njt_fb_mess_change_cat').find('.njt_fb_mess_tb_status').remove();
        
    }
    self.subscribeBtnClicked = function()
    {
        $(document).on('click', '.njt-fb-mess-subscribe-btn', function(event) {
            var $this = $(this);
            if ($this.attr('disabled') == 'disabled') {
                return false;
            }
            $this.attr('disabled', 'disabled');
            
            $this.addClass('updating-message');

            var page_obj = $(this).closest('.njt-page');
            var page_id = page_obj.data('fb_page_id');
            var data = {
                'action': 'njt_fb_mess_subscribe_page',
                'nonce': njt_fb_mess.nonce,
                'page_id': page_id
            }
            $.ajax({
                url: ajaxurl,
                type: 'POST',                
                data: data,
            })
            .done(function(json) {

                if (!json.success) {
                    var html_error = '<div class="njt-fb-mess-subscribe-wrap"><span class="njt-fb-mess-couldnot-subscribe-text">' + njt_fb_mess.could_not_subscribe_text + json.data.mess + '</span>';
                    html_error += '<a href="javascript:void(0)" class="button njt-fb-mess-subscribe-btn">'+njt_fb_mess.retry_subscribe_text+'</a></div>';
                    page_obj.find('.njt-inner').append(html_error);
                } else {
                    var a = page_obj.find('h3 a');
                    a.attr('href', a.data('link'));

                    $this.closest('.njt-inner').find('.njt-fb-mess-subscribe-wrap').hide();
                    $this.closest('.njt-inner').find('.njt-fb-mess-unsubscribe-wrap').show();
                }
                $this.removeAttr('disabled');
                $this.removeClass('updating-message');
            })
            .fail(function() {
                alert(njt_fb_mess.error_nonce);
                $this.removeAttr('disabled');
                $this.removeClass('updating-message');
            });
            return false;
        });
        $(document).on('click', '.njt-fb-mess-unsubscribe-btn', function(event) {
            var $this = $(this);
            if ($this.attr('disabled') == 'disabled') {
                return false;
            }
            $this.attr('disabled', 'disabled');
            
            $this.addClass('updating-message');

            var page_obj = $(this).closest('.njt-page');
            var page_id = page_obj.data('fb_page_id');
            var data = {
                'action': 'njt_fb_mess_unsubscribe_page',
                'nonce': njt_fb_mess.nonce,
                'page_id': page_id
            }
            $.ajax({
                url: ajaxurl,
                type: 'POST',                
                data: data,
            })
            .done(function(json) {

                if (json.success) {
                    $this.closest('.njt-inner').find('.njt-fb-mess-subscribe-wrap').show();
                    $this.closest('.njt-inner').find('.njt-fb-mess-unsubscribe-wrap').hide();   
                }
                $this.removeAttr('disabled');
                $this.removeClass('updating-message');
            })
            .fail(function() {
                alert(njt_fb_mess.error_nonce);
                $this.removeClass('updating-message');
                $this.removeAttr('disabled');
            });
            return false;
        });
    }
    self.sendNowButtonClicked = function()
    {        
        $('.njt_fb_mess_send_message_send_now').click(function(event) {                        
            var $this = $(this);                    
            if ($this.attr('disabled') == 'disabled') {
                return false;
            }
            if (self.first_time_sent == false) {
                $('.njt-fb-mess-progress-bar .njt-fb-mess-meter > span').css('width', '0%');
                $('.njt-fb-mess-progress-bar .njt-fb-mess-meter > strong').text('0%');
                $('.njt-fb-mess-result-sent strong').text('0');
                $('.njt-fb-mess-result-fail strong').text('0');
                $('.njt-fb-mess-view-fail-detail').hide();
                $('.njt-fb-mess-fail-details').html('').hide();
                self.first_time_sent = true;
            }
            self.fb_page_id = $this.data('fb_page_id');
            self.fb_page_token = $this.data('fb_page_token');

            if ($('#njt_fb_mess_send_message_custom_token').val() != '') {
                self.fb_page_token = $('#njt_fb_mess_send_message_custom_token').val();
            }

            self.content = $('#njt_fb_mess_send_message_content').val();
            if (self.content == '') {
                alert(njt_fb_mess.send_mess_error_empty_content);
                return false;
            }
            

            var selected_u = self.getSelectedSender();
            var send_to = $('#njt_fb_mess_send_message_send_to').val();
            /*
             * Request page id to get list users
             */
            var data = {
                'action': 'njt_fb_mess_get_senders',
                'nonce': njt_fb_mess.nonce,
                'send_to': send_to,
                'fb_page_id' : self.fb_page_id,
                'selected_users': selected_u,             
            };
            if (send_to == 'in_category') {
                data["selected_cats"] = $('select[name="njt_fb_mess_send_message_choose_categories[]"]').val();
            }

            $this.addClass('updating-message').attr('disabled', 'disabled');
            $('.njt-fb-mess-fail-details').hide().html('');

            /*
             * Shows the rocket
             */
            $('.njt-fb-mess-visible-to-send').hide();
            $('.njt-fb-mess-rocket').show();
            $('.njt-fb-mess-progress-bar').show();
            
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: data,
            })
            .done(function(json) {
                $this.removeClass('updating-message').removeAttr('disabled');
                if (json.success) {
                    self.users = json.data.users;
                    self.total = self.users.length;
                    self.sendMessage(self.users, 0);
                } else {
                    alert(json.data.mess);
                }
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText);
                $this.removeClass('updating-message').removeAttr('disabled');
            });
            
        });
    }
    self.sendMessage = function(users, i)
    {
        var user = users[i];
        if (typeof user != 'undefined') {
            var data = {
                'action': 'njt_fb_mess_send_message',
                'nonce': njt_fb_mess.nonce,
                'to': user.sender_id,
                'content': self.content,
                'page_token': self.fb_page_token
            };            

            var j = i + 1;
            $(self.result_wrap).show();
            $(self.result_wrap).find('h3').text(njt_fb_mess.sending_text + ' ' + j + '/' + self.total);

            /*
             * End displaying the results
             */
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: data,
            })
            .done(function(json) {
                if (!json.success) {                    
                    self.total_fail.push({'mess' : json.data.mess, 'to': user.first_name + ' ' + user.last_name});
                    $(self.result_wrap).find('.njt-fb-mess-result-fail strong').text(self.total_fail.length);
                } else {
                    self.total_sent++;
                    $(self.result_wrap).find('.njt-fb-mess-result-sent strong').text(self.total_sent);
                    if ($('.njt_fb_mess_credit_left').length) {
                        $('.njt_fb_mess_credit_left').text(json.data.credit_left);
                    }
                }
                self.updateProgressPercent();

                self.sendMessage(users, i + 1);
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                self.total_fail.push({'mess' : jqXHR.responseText, 'to': user.first_name + ' ' + user.last_name});
                $(self.result_wrap).find('.njt-fb-mess-result-fail strong').text(self.total_fail.length);

                self.updateProgressPercent();

                self.sendMessage(users, i + 1);
            });            
        } else {
            /*
             * Finish sending
             */            
            self.first_time_sent = false;

            $('.njt-fb-mess-visible-to-send').show();
            $('.njt-fb-mess-rocket').hide();
            $('.njt-fb-mess-progress-bar').hide();

            $(self.result_wrap).find('h3').text(njt_fb_mess.complete_text);
            $('.njt-fb-mess-results-warning').hide();

            if (self.total_fail.length > 0) {
                $('.njt-fb-mess-view-fail-detail').show();

                $.each(self.total_fail, function(index, el) {
                    $('.njt-fb-mess-fail-details').append('<li>'+el.to+' : '+el.mess+'</li>');    
                });
            }            

            $('.njt_fb_mess_send_message_send_now').removeClass('updating-message').removeAttr('disabled');

            self.resetVariables();
        }
    }
    self.getSelectedSender = function()
    {
        var selected_u = [];
        $('.toplevel_page_njt-facebook-messenger .check-column > input[name^="id"]').each(function(i, el){
            if ($(el).is(':checked')) {
                selected_u.push($(el).val());
            }                
        });
        return selected_u;
    }
    self.getSelectedCat = function()
    {
        var cats = [];
        $('#njt_fb_mess_change_cat input[name="cat_id[]"]').each(function(i, el){
            if ($(el).is(':checked')) {
                cats.push($(el).val());
            }                
        });
        return cats;
    }

    
    self.updateProgressPercent = function()
    {
        var percent = ((self.total_sent + self.total_fail.length) * 100) / self.total;
        percent = Math.ceil(percent);

        $('.njt-fb-mess-progress-bar > .njt-fb-mess-meter span').attr('style', 'width:' + percent + '%');
        $('.njt-fb-mess-progress-bar > .njt-fb-mess-meter strong').text(percent + '%');
    }

    /*
     * Auto subscribe all pages
     */
    self.subscribePages = function(pages, i)
    {
        var page = pages[i];
        if (typeof page != 'undefined') {
            var page_obj = $('.njt-page[data-fb_page_id="' + page + '"]');            
            var data = {
                'action': 'njt_fb_mess_subscribe_page',
                'nonce': njt_fb_mess.nonce,
                'page_id': page
            }
            $.ajax({
                url: ajaxurl,
                type: 'POST',                
                data: data,
            })
            .done(function(json) {
                page_obj.find('.njt-fb-mess-subscribe-wrap').remove();
                if (!json.success) {
                    var html_error = '<div class="njt-fb-mess-subscribe-wrap"><span class="njt-fb-mess-couldnot-subscribe-text">' + njt_fb_mess.could_not_subscribe_text + json.data.mess + '</span>';
                    html_error += '<a href="javascript:void(0)" class="button njt-fb-mess-subscribe-btn">'+njt_fb_mess.retry_subscribe_text+'</a></div>';
                    page_obj.find('.njt-inner').append(html_error);
                } else {
                    var a = page_obj.find('h3 a');
                    a.attr('href', a.data('link'));
                }
                self.subscribePages(pages, i + 1);
            })
            .fail(function(jqXHR, textStatus, errorThrown) {                
                alert(njt_fb_mess.error_nonce);
            });
        }
    }
    self.subscribePage = function(page_id)
    {
        var page_obj = $('.njt-page[data-fb_page_id="' + page_id + '"]');
        var data = {
            'action': 'njt_fb_mess_subscribe_page',
            'nonce': njt_fb_mess.nonce,
            'page_id': page_id
        }
        page_obj.addClass('njt-page-loading');
        $.ajax({
            url: ajaxurl,
            type: 'POST',                
            data: data,
        })
        .done(function(json) {
            if (json.success) {

            } else {
            }
            page_obj.removeClass('njt-page-loading');
        })
        .fail(function() {
            page_obj.removeClass('njt-page-loading');
        });
    }
}
jQuery(document).ready(function($) {
    var njt_fb_mess_app = new NjtFbMess();
    njt_fb_mess_app.init();
});
function njt_fb_mess_shortcut_click(shortcut)
{
    jQuery(".emojionearea-editor").append(shortcut).trigger("input");
    jQuery("#njt_fb_mess_send_message_content").append(shortcut).trigger("input");
    jQuery(".emojionearea-editor").focus();
}