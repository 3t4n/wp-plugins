(function ($) {
    "use strict";
    if (typeof _wplwl_get_email_params === "undefined" || !_wplwl_get_email_params?.prize_type){
        return;
    }
    let wheel_params = _wplwl_get_email_params;
    let wd_width= window.innerWidth, wd_height= window.innerHeight , width,center, cv, ctx;
    let is_mobile = wd_width < 760 , mobile_enable= wheel_params?.wplwl_mobile_enable;
    if (is_mobile && !mobile_enable){
        return;
    }
    let slices = wheel_params.prize_type.length;
    let sliceDeg = 360 / slices;
    let deg = -(sliceDeg / 2);
    $(window).on('resize', function () {
        wd_width= window.innerWidth;
        wd_height= window.innerHeight;
        is_mobile = wd_width < 760;
        if (mobile_enable || !is_mobile) {
            $(document.body).trigger('wplwl-render-popup-wheel');
        }else {
            $('.wplwl_lucky_wheel_wrap').removeClass('wplwl_lucky_wheel_active');
        }
    });
    $(document).ready(function ($) {
        setTimeout(function () {
            $(document.body).trigger('wplwl-render-popup-wheel');
        }, 100);
        $(document.body).on('wplwl-render-popup-wheel', function () {
            if (getCookie('wplwl_cookie')){
                return;
            }
            $('.wplwl_lucky_wheel_wrap').addClass('wplwl_lucky_wheel_active');
            width = wd_width > wd_height ? wd_height : wd_width;
            width = is_mobile ? parseInt(width * 0.6 + 16) : parseInt(wheel_params.wheel_size * (width * 0.55 + 16) / 100);
            design_wheel_with_custom_width();
            if ($('.wplwl_lucky_wheel_content_rendered').length){
                drawWheel();
            }else {
                drawPopupIcon();
                switch (wheel_params.intent){
                    case 'popup_icon':
                        setTimeout(function () {
                            $('.wplwl_wheel_icon').addClass('wplwl_show');
                        }, wheel_params.show_wheel * 1000)
                        break;
                    case 'show_wheel':
                        setTimeout(function () {
                            $('.wplwl_wheel_icon').trigger('click');
                        }, wheel_params.show_wheel * 1000);
                        break;
                }
            }
        });
        $(document).on('click','.wplwl_wheel_icon',function (){
            if (!$('.wplwl_lucky_wheel_wrap.wplwl_lucky_wheel_content_rendered').length){
                $('.wplwl_lucky_wheel_wrap').addClass('wplwl_lucky_wheel_content_rendered');
                drawWheel(true);
                return;
            }
            if (!$('.wplwl_lucky_wheel_wrap').hasClass('wplwl_lucky_wheel_active')){
                return;
            }
            $('.wplwl_wheel_icon').removeClass('wplwl_show');
            $('.wplwl-overlay').show();
            $('html').addClass('wplwl-html');
            $('.wplwl_lucky_wheel_content').addClass('lucky_wheel_content_show');
        });
        $(document).on('click','.wplwl-close-wheel , .wplwl-close, .wplwl-overlay',function (){
            $('html').removeClass('wplwl-html');
            $('.wplwl-overlay').hide();
            setCookie('wplwl_cookie', 'closed', wheel_params.time_if_close);
            $('.wplwl_lucky_wheel_content').removeClass('lucky_wheel_content_show');
            if (! wheel_params.hide_popup ) {
                $('.wplwl_wheel_icon').addClass('wplwl_show');
            }
        });
        $(document).on('click','.wplwl-never-again span',function (){
            setCookie('wplwl_cookie', 'never_show_again', 30 * 24 * 60 * 60);
            $('.wplwl_wheel_icon').addClass('wplwl_show');
            $('.wplwl-overlay').hide();
            $('html').removeClass('wplwl-html');
            $('.wplwl_lucky_wheel_content').removeClass('lucky_wheel_content_show');
        });
        $(document).on('click','.wplwl-reminder-later-a',function (){
            setCookie('wplwl_cookie', 'reminder_later', 24 * 60 * 60);
            $('.wplwl_wheel_icon').addClass('wplwl_show');
            $('.wplwl-overlay').hide();
            $('html').removeClass('wplwl-html');
            $('.wplwl_lucky_wheel_content').removeClass('lucky_wheel_content_show');
        });
        $(document).on('click','.wplwl-hide-after-spin',function (){
            $('.wplwl-overlay').hide();
            $('html').removeClass('wplwl-html');
            $('.wplwl_lucky_wheel_content').removeClass('lucky_wheel_content_show');
            $('.wplwl_wheel_spin').css({'margin-left': '0', 'transition': '2s'});
        });
        $(document).on('keypress', function (e) {
            if ($('.wplwl_lucky_wheel_content').hasClass('lucky_wheel_content_show') && e.keyCode === 13) {
                $('#wplwl_chek_mail').trigger('click');
            }
        });
        $(document).on('click','#wplwl_chek_mail',function (){
            if (!$('.wplwl_lucky_wheel_wrap').hasClass('wplwl_lucky_wheel_active')){
                return;
            }
            $('#wplwl_error_mail,#wplwl_error_name,#wplwl_error_mobile,#wplwl_warring_recaptcha').html('');
            $('.wplwl-required-field').removeClass('wplwl-required-field');
            if (wheel_params.gdpr && !$('.wplwl-gdpr-checkbox-wrap input[type="checkbox"]').prop('checked')) {
                $('#wplwl_error_mail').html(wheel_params.gdpr_warning);
                return false;
            }
            let wplwl_email = $('#wplwl_player_mail').val();
            let wplwl_name = $('#wplwl_player_name').val();
            let qualified = true;

            if (wheel_params.custom_field_name_enable && (!is_mobile || wheel_params.custom_field_name_enable_mobile) && wheel_params.custom_field_name_required  && !wplwl_name) {
                $('#wplwl_error_name').html(wheel_params.custom_field_name_message);
                $('.wplwl_field_name').addClass('wplwl-required-field');
                qualified = false;
            }

            if (!wplwl_email) {
                $('#wplwl_player_mail').prop('disabled', false).focus();
                $('#wplwl_error_mail').html(wheel_params.empty_email_warning);
                $('.wplwl_field_email').addClass('wplwl-required-field');
                qualified = false;
            }
            if (qualified === false) {
                return false;
            }
            $(this).unbind();
            $('.wplwl-overlay').unbind();
            $('#wplwl_player_mail').prop('disabled', true);
            if (getCookie('wplwl_cookie') === "" || getCookie('wplwl_cookie') === 'closed') {
                if ( isValidEmailAddress(wplwl_email) ) {
                    $('#wplwl_chek_mail').addClass('wplwl-adding');
                    $.ajax({
                        type: 'post',
                        dataType: 'json',
                        url: wheel_params.ajaxurl,
                        data: {
                            user_email: wplwl_email,
                            user_name: wplwl_name,
                            is_desktop: !is_mobile ? 1: '',
                            _wordpress_lucky_wheel_nonce: $('#_wordpress_lucky_wheel_nonce').val(),
                        },
                        success: function (response) {
                            if (response.allow_spin === 'yes') {
                                $('.wplwl-show-again-option').hide();
                                $('.wplwl-close-wheel').hide();
                                $('.wplwl-hide-after-spin').show();
                                spins_wheel(response.stop_position, response.result_notification, response.result);
                                let wplwl_show_again = _wplwl_get_email_params.show_again;
                                let wplwl_show_again_unit = _wplwl_get_email_params.show_again_unit;
                                switch (wplwl_show_again_unit) {
                                    case 'm':
                                        wplwl_show_again *= 60;
                                        break;
                                    case 'h':
                                        wplwl_show_again *= 60 * 60;
                                        break;
                                    case 'd':
                                        wplwl_show_again *= 60 * 60 * 24;
                                        break;
                                    default:
                                }
                                setCookie('wplwl_cookie', wplwl_email, wplwl_show_again);
                            } else {
                                $('#wplwl_chek_mail').removeClass('wplwl-adding');
                                $('#wplwl_player_mail').prop('disabled', false);
                                if (response.g_validate_response) {
                                    $('#wplwl_error_mail').html(response.warning);
                                } else {
                                    $('#wplwl_error_mail').html(response.allow_spin);
                                }
                            }

                        }
                    });

                } else {
                    $('#wplwl_player_mail').prop('disabled', false).focus();
                    $('#wplwl_error_mail').html(wheel_params.invalid_email_warning);
                    $('.wplwl_field_email').addClass('wplwl-required-field');
                }
            } else {
                $('#wplwl_error_mail').html(wheel_params.limit_time_warning);
                $('#wplwl_player_mail').prop('disabled', false);
            }
        });
    });
    function setCookie(cname, cvalue, expire) {
        let d = new Date();
        d.setTime(d.getTime() + (expire * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    function design_wheel_with_custom_width(){
        if ($('.wplwl_lucky_wheel_content.wplwl-background-effect-falling-leaves:not(.wplwl_lucky_wheel_content_init)').length){
            let leafContainer = document.querySelector('.wplwl_lucky_wheel_content.wplwl-background-effect-falling-leaves');
            let leaves = new wplwlLeafScene(leafContainer);
            leaves.init();
            leaves.render();
        }
        $('.wplwl_wheel_spin').css({'width': width + 'px', 'height': width + 'px'});
        $('.wplwl_lucky_wheel_content').removeClass('wplwl_lucky_wheel_content_mobile lucky_wheel_content_tablet');
        if (!is_mobile) {
            if ('on' === wheel_params.show_full_wheel) {
                $('.wplwl_lucky_wheel_content').css({'max-width': (width + 600) + 'px'});
            } else {
                $('.wplwl_lucky_wheel_content').css({'max-width': (0.6 * width + 600) + 'px'});
            }
            if (wd_width < 1024){
                $('.wplwl_lucky_wheel_content').addClass('lucky_wheel_content_tablet');
            }
        }else {
            $('.wplwl_lucky_wheel_content').addClass('wplwl_lucky_wheel_content_mobile');
        }
        if ((is_mobile && !wheel_params.custom_field_name_enable_mobile) ){
            $('.wplwl_field_name_wrap').hide();
        }else {
            $('.wplwl_field_name_wrap').show();
        }
        if ((is_mobile && !wheel_params.custom_field_mobile_enable_mobile)){
            $('.wplwl_field_mobile_wrap').hide();
        }else {
            $('.wplwl_field_mobile_wrap').show();
        }
        let inline_css = '.wplwl_lucky_wheel_content:not(.wplwl_lucky_wheel_content_mobile) .wheel-content-wrapper .wheel_content_left{min-width:' + (width + 35) + 'px}';
        inline_css += '.wplwl_lucky_wheel_content.wplwl_lucky_wheel_content_mobile .wheel_description{min-height:' + $('.wheel_description').css('height') + '}';
        if (wheel_params.pointer_position === 'center') {
            inline_css += '.wplwl_pointer:before{font-size:' + parseInt(width / 4) + 'px !important; }';
        } else {
            inline_css += '.wplwl_pointer:before{font-size:' + parseInt(width / 10) + 'px !important; }';
            inline_css += '.wplwl_margin_position .wplwl_wheel_spin_container .wplwl_pointer_content .wplwl_pointer:after{width:' + parseInt(width / 25) + 'px;height:' + parseInt(width / 25) + 'px;bottom:' + parseInt(width / 30) + 'px; }';
        }
        if (!$('#wplwl_lucky_wheel_custom_inline_css').length){
            $('head').append('<style id="wplwl_lucky_wheel_custom_inline_css"></style>');
        }
        $('#wplwl_lucky_wheel_custom_inline_css').html(inline_css);
        if ($('#wplwl_center_image').val()) {
            let wl_image = new Image;
            wl_image.onload = function () {
                let cv = document.getElementById('wplwl_canvas1');
                let ctx = cv.getContext('2d');
                let image_size = 2 * (width / 8 - 7);
                ctx.arc(center, center, image_size / 2, 0, 2 * Math.PI);
                ctx.clip();
                ctx.drawImage(wl_image, center - image_size / 2, center - image_size / 2, image_size, image_size);

            };
            wl_image.src = $('#wplwl_center_image').val();
        }
    }
    async function drawWheel(show_popup = false){
        center = (width) / 2;
        await drawCanvas('wplwl_canvas');
        await drawCanvas('wplwl_canvas1');
        await drawCanvas('wplwl_canvas2');
        if (show_popup){
            $('.wplwl_wheel_icon').trigger('click');
        }
    }
    async function drawCanvas(canvas_id){
        if (!canvas_id){
            return;
        }
        cv = document.getElementById(canvas_id);
        if (!cv){
            return;
        }
        ctx = cv.getContext('2d');
        cv.width = width;
        cv.height = width;
        if (window.devicePixelRatio) {
            $(cv).attr({
                'width': width * window.devicePixelRatio,
                'height': width * window.devicePixelRatio
            });
            $(cv).css({'width': width , 'height': width});
            ctx.scale(window.devicePixelRatio, window.devicePixelRatio);
        }
        switch (canvas_id){
            case 'wplwl_canvas':
                for (let i = 0; i < slices; i++) {
                    drawSlice(deg, wheel_params.bg_color[i]);
                    drawText(deg + sliceDeg / 2, wheel_params.label[i], wheel_params.slices_text_color[i]);
                    deg += sliceDeg;
                }
                break;
            case 'wplwl_canvas1':
                drawPoint(deg, wheel_params.wheel_center_color);
                if (width <= 480) {
                    drawBorder(wheel_params.wheel_border_color, 'rgba(0,0,0,0)', 20, 4, 5, 'rgba(0,0,0,0.2)');
                } else {
                    drawBorder(wheel_params.wheel_border_color, 'rgba(0,0,0,0)', 30, 6, 7, 'rgba(0,0,0,0.2)');
                }
                break;
            case 'wplwl_canvas2':
                if (width <= 480) {
                    drawBorder('rgba(0,0,0,0)', wheel_params.wheel_dot_color, 20, 4, 5, 'rgba(0,0,0,0)');
                } else {
                    drawBorder('rgba(0,0,0,0)', wheel_params.wheel_dot_color, 30, 6, 7, 'rgba(0,0,0,0)');
                }
                break;
        }
    }
    function drawPopupIcon() {
        cv = document.getElementById('wplwl_popup_canvas');
        if (!cv) {
            return;
        }
        ctx = cv.getContext('2d');
        center = 32;
        for (let k = 0; k < slices; k++) {
            drawSlice(deg, wheel_params.bg_color[k]);
            deg += sliceDeg;
        }
        drawPopupIconPoint(wheel_params.wheel_center_color);
        drawBorder(wheel_params.wheel_border_color, wheel_params.wheel_dot_color, 4, 1, 0);
    }
    function drawPopupIconPoint(color) {
        ctx.save();
        ctx.beginPath();
        ctx.fillStyle = color;
        ctx.arc(center, center, 8, 0, 2 * Math.PI);
        ctx.fill();
        ctx.restore();
    }
    function drawPoint(deg, color) {
        ctx.save();
        ctx.beginPath();
        ctx.fillStyle = color;
        ctx.shadowBlur = 1;
        ctx.shadowOffsetX = 8;
        ctx.shadowOffsetY = 8;
        ctx.shadowColor = 'rgba(0,0,0,0.2)';
        ctx.arc(center, center, width / 8, 0, 2 * Math.PI);
        ctx.fill();
        ctx.clip();
        ctx.restore();
    }
    function drawBorder(borderC, dotC, lineW, dotR, des, shadColor='') {
        ctx.beginPath();
        ctx.strokeStyle = borderC;
        ctx.lineWidth = lineW;
        if (shadColor) {
            ctx.shadowBlur = 1;
            ctx.shadowOffsetX = 8;
            ctx.shadowOffsetY = 8;
            ctx.shadowColor = shadColor;
        }
        ctx.arc(center, center, center, 0, 2 * Math.PI);
        ctx.stroke();
        let x_val, y_val, deg;
        deg = sliceDeg / 2;
        let center1 = center - des;
        for (let i = 0; i < slices; i++) {
            ctx.beginPath();
            ctx.fillStyle = dotC;
            x_val = center + center1 * Math.cos(deg * Math.PI / 180);
            y_val = center - center1 * Math.sin(deg * Math.PI / 180);
            ctx.arc(x_val, y_val, dotR, 0, 2 * Math.PI);
            ctx.fill();
            deg += sliceDeg;
        }
    }
    function drawText(deg, text, color) {
        let font_text_wheel = 'Helvetica',
            wheel_text_size = parseInt(width / 28) * parseInt(wheel_params.font_size) / 100;
        if (typeof wheel_params.font_text_wheel !== 'undefined' && wheel_params.font_text_wheel !== '') {
            font_text_wheel = wheel_params.font_text_wheel;
        }
        ctx.save();
        ctx.translate(center, center);
        ctx.rotate(deg2rad(deg));
        ctx.textAlign = "right";
        ctx.fillStyle = color;
        ctx.font = '200 ' + wheel_text_size + 'px ' + font_text_wheel;
        ctx.shadowOffsetX = 0;
        ctx.shadowOffsetY = 0;
        text = text.replace(/&#(\d{1,4});/g, function (fullStr, code) {
            return String.fromCharCode(code);
        });
        text = text.replace(/&nbsp;/g, ' ');
        let reText = text.split('\/n'), text1 = '', text2 = '';
        if (reText.length > 1) {
            text1 = reText[0];
            text2 = reText.splice(1, reText.length - 1);
            text2 = text2.join('');
        } else {
            reText = text.split('\\n');
            if (reText.length > 1) {
                text1 = reText[0];
                text2 = reText.splice(1, reText.length - 1);
                text2 = text2.join('');
            }
        }
        if (text1.trim() !== "" && text2.trim() !== "") {
            ctx.fillText(text1.trim(), 7 * center / 8, -(wheel_text_size * 1 / 4));
            ctx.fillText(text2.trim(), 7 * center / 8, wheel_text_size * 3 / 4);
        } else {
            // ctx.fillText(text.replace(/\\n/g, '').replace(/\/n/g, ''), 7 * center / 8, wheel_text_size / 2 - 2);
            text = text.replace(/\\n/g, '').replace(/\/n/g, '');
            let wrappedText = wrapText(ctx, text, 7 * center / 8, wheel_text_size, width <= 480 ? (width / 3 - 10):(width /3 - 14), wheel_text_size);
            for (let wrappedTextItem of wrappedText) {
                ctx.fillText(wrappedTextItem.text, wrappedTextItem.x, wrappedTextItem.y);
            }
        }
        ctx.restore();
    }
    function wrapText(ctx, text, x, y, maxWidth, lineHeight) {
        let words = text.split(' ');
        let countWords = words.length ;
        let line = ''; // This will store the text of the current line
        let testLine = ''; // This will store the text when we add a word, to test if it's too long
        let lineArray = [], result = []; // This is an array of lines, which the function will return
        for (let i in words) {
            testLine += `${words[i]} `;
            let metrics = ctx.measureText(testLine);
            let testWidth = metrics.width;
            if (testWidth > maxWidth && i > 0) {
                // Then the line is finished, push the current line into "lineArray"
                lineArray.push({text:line,x:x,y:y});
                line = `${words[i]} `;
                testLine = `${words[i]} `;
            } else {
                // If the test line is still less than the max width, then add the word to the current line
                line += `${words[i]} `;
            }
            if( i == countWords - 1) {
                lineArray.push({text:line,x:x,y:y});
            }
        }
        let start_y = y / 2 - 2, countLine = lineArray.length;
        if (countLine > 4){
            start_y = -y ;
        }else if (countLine > 2){
            start_y = -(y * 1 / 2);
        } else if (countLine > 1){
            start_y = -(y * 1 / 4);
        }
        for (let i in lineArray) {
            let tmp = lineArray[i];
            if (i > 0){
                start_y += lineHeight ;
            }
            tmp['y'] = start_y;
            result.push(tmp);
        }
        return result;
    }
    function drawSlice(deg, color) {
        ctx.beginPath();
        ctx.fillStyle = color;
        ctx.moveTo(center, center);
        let r = center;
        if (center !== 32) {
            if (width <= 480) {
                r = width / 2 - 10;
            } else {
                r = width / 2 - 14;
            }
        }
        ctx.arc(center, center, r, deg2rad(deg), deg2rad(deg + sliceDeg));
        ctx.lineTo(center, center);
        ctx.fill();
    }
    function deg2rad(deg) {
        return deg * Math.PI / 180;
    }
    function isValidEmailAddress(emailAddress) {
        let pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/i;
        return pattern.test(emailAddress);
    }
    function spins_wheel(stop_position, result_notification, result) {
        let canvas_1 = $('#wplwl_canvas');
        let canvas_3 = $('#wplwl_canvas2');
        let default_css = '';
        if (window.devicePixelRatio) {
            default_css = 'width:' + width + 'px;height:' + width + 'px;';
        }
        canvas_1.attr('style', default_css);
        canvas_3.attr('style', default_css);
        let stop_deg = 360 - sliceDeg * stop_position;
        let wplwl_spinning_time = wheel_params.spinning_time;
        let wheel_stop = wheel_params.wheel_speed * 360 * wplwl_spinning_time + stop_deg;
        let css = default_css + '-moz-transform: rotate(' + wheel_stop + 'deg);-webkit-transform: rotate(' + wheel_stop + 'deg);-o-transform: rotate(' + wheel_stop + 'deg);-ms-transform: rotate(' + wheel_stop + 'deg);transform: rotate(' + wheel_stop + 'deg);';
        css += '-webkit-transition: transform ' + wplwl_spinning_time + 's ease;-moz-transition: transform ' + wplwl_spinning_time + 's ease;-ms-transition: transform ' + wplwl_spinning_time + 's ease;-o-transition: transform ' + wplwl_spinning_time + 's ease;transition: transform ' + wplwl_spinning_time + 's ease;';
        canvas_1.attr('style', css);
        canvas_3.attr('style', css);
        setTimeout(function () {
            css = default_css + 'transform: rotate(' + stop_deg + 'deg);';
            canvas_1.attr('style', css);
            canvas_3.attr('style', css);

            $('.wplwl_lucky_wheel_content').addClass('wplwl-finish-spinning');
            $('.wplwl-overlay').unbind();
            $('.wplwl-overlay').on('click', function () {
                $('html').removeClass('wplwl-html');
                $(this).hide();

                $('.wplwl_lucky_wheel_content').removeClass('lucky_wheel_content_show');
                $('.wplwl_wheel_spin').css({'margin-left': '0', 'transition': '2s'});
            });
            $('.wplwl_user_lucky').html('<div class="wplwl-frontend-result">' + result_notification + '</div>');
            $('.wplwl_user_lucky').fadeIn(300);
            let wplwl_auto_close = parseInt(wheel_params.auto_close);
            if (wplwl_auto_close > 0) {
                setTimeout(function () {
                    $('.wplwl-overlay').hide();
                    $('html').removeClass('wplwl-html');
                    $('.wplwl_lucky_wheel_content').removeClass('lucky_wheel_content_show');
                    $('.wplwl_wheel_spin').css({'margin-left': '0', 'transition': '2s'});
                }, wplwl_auto_close * 1000);
            }
        }, parseInt(wplwl_spinning_time * 1000))
    }
}(jQuery));
