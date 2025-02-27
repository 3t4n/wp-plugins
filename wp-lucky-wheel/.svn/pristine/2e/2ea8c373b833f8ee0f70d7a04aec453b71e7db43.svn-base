jQuery(document).ready(function ($) {
    'use strict';
    if ($('.vi-ui.tabular.menu').length) {
        $('.vi-ui.tabular.menu .item').vi_tab({history: true, historyType: 'hash'});
    }
    if ($('.vi-ui.accordion').length) {
        $('.vi-ui.accordion:not(.wplwl-accordion-init)').addClass('wplwl-accordion-init').vi_accordion('refresh');
    }
    $('.vi-ui.checkbox:not(.wplwl-checkbox-init)').addClass('wplwl-checkbox-init').off().checkbox();
    $('.vi-ui.dropdown:not(.wplwl-dropdown-init)').addClass('wplwl-dropdown-init').off().dropdown();
    $('.wheel-settings .ui-sortable').sortable({
        update: function (event, ui) {
            indexChangeCal();
        }
    });
    /*Color picker*/
    $('.color-picker').iris({
        change: function (event, ui) {
            $(this).parent().find('.color-picker').css({backgroundColor: ui.color.toString()});
        },
        hide: true,
        border: true
    }).on('click', function () {
        $('.iris-picker').hide();
        $(this).closest('td').find('.iris-picker').show();
    });

    $('body').on('click', function () {
        $('.iris-picker').hide();
    });
    $('.color-picker').on('click', function (event) {
        event.stopPropagation();
    });
    /*Select popup icon*/
    $('.wheel-popup-icon').on('click', function () {
        let $button = $(this), $container = $button.closest('.wheel-popup-icons-container');
        if ($button.hasClass('wheel-popup-icon-selected')) {
            $button.removeClass('wheel-popup-icon-selected');
            $container.find('input[name="wheel_popup_icon"]').val('');
        } else {
            $container.find('.wheel-popup-icon-selected').removeClass('wheel-popup-icon-selected');
            $button.addClass('wheel-popup-icon-selected');
            $container.find('input[name="wheel_popup_icon"]').val($button.data('wheel_popup_icon'));
        }
    });


    $('#wheel_popup_icon_color').iris({
        change: function (event, ui) {
            $(this).parent().find('.color-picker').css({backgroundColor: ui.color.toString()});
            $('.wheel-popup-icon-selected').css({color: ui.color.toString()});
        },
        hide: true,
        border: true
    });
    $('#wheel_popup_icon_bg_color').iris({
        change: function (event, ui) {
            $(this).parent().find('.color-picker').css({backgroundColor: ui.color.toString()});
            $('.wheel-popup-icon-selected').css({'background-color': ui.color.toString()});
        },
        hide: true,
        border: true
    });
    //check Probability value
    $('.probability').keyup(function () {
        var check_max = $(this).val();
        if (check_max > 100) {
            $(this).val(100);
        }

    });
    remove_piece();


    function clone_piece() {
        $('.clone_piece').on('click', function () {
            if ($('.wheel_col').length >= 6) {
                alert('You can only add 6 slices. Upgrade to Premium version to add up to 20 slices.');
            } else {
                var new_row = $(this).parent().parent().clone();
                var total_temp = parseInt($('.total_probability').attr('data-total_probability'));
                var new_val = 0;
                if (total_temp + parseInt(new_row.find('input[name="probability[]"]').val()) <= 100) {
                    new_val = parseInt(new_row.find('input[name="probability[]"]').val());
                }
                $('.total_probability').html(total_temp + new_val);
                $('.total_probability').attr('data-total_probability', total_temp + new_val);
                new_row.find('input[name="probability[]"]').val(new_val);

                new_row.insertAfter($(this).parent().parent());
                indexChangeCal();
                changes_probability();
                remove_piece();
                $('.color-picker').iris({
                    change: function (ev, uis) {
                        $(this).parent().find('.color-picker').css({backgroundColor: uis.color.toString()});
                    },
                    hide: true,
                    border: true,
                    width: 270
                }).on('click', function (e) {
                    e.stopPropagation();
                });
                check_coupon();
                $('.clone_piece').unbind();
                clone_piece();
            }
        });

    }

    clone_piece();

    function remove_piece() {
        $('.remove_field').unbind();
        $('.probability').on('change', function () {
            changes_probability();
        });
        $('.remove_field').on('click', function () {
            changes_probability();
            if (confirm("Would you want to remove this?")) {
                if ($('.wheel_col').length > 3) {
                    $(this).closest('tr').remove();
                    changes_probability();
                    indexChangeCal();
                } else {
                    alert('Must have at least 3 slices!');
                    return false;
                }
            }
        });
    }

    function changes_probability() {// check probability
        var tong = 0;
        $('.probability').each(function () {
            var chek = $(this).val();
            if ($.isNumeric(chek) === true) {
                tong += parseInt(chek);
            }
        });
        $('.total_probability').html(tong);
        $('.total_probability').attr('data-total_probability', tong);
        return tong;
    }

    $('#submit').on('click', function () {
        var tong = changes_probability();
        var label = document.getElementsByClassName('custom_type_label');

        if (tong == 100) {
            for (var i = 0; i < label.length; i++) {
                if ($('.custom_type_label').eq(i).val() === '') {
                    alert('Label cannot be empty.');
                    $('.custom_type_label').eq(i).focus();
                    return false;

                }
                if ($('.coupons_select').eq(i).val() === 'custom' && $('.custom_type_value').eq(i).val() === '') {
                    alert('Value cannot be empty.');
                    $('.custom_type_value').eq(i).focus();
                    return false;

                }
                if ($('.coupons_select').eq(i).val() === 'existing_coupon' && $('select[name="wplwl_existing_coupon[]"]')[i].lastElementChild.innerHTML == '') {
                    alert('Value of Existing coupon cannot be empty.');
                    $('select[name="wplwl_existing_coupon[]"]')[i].focus();
                    return false;

                }
            }
            return true;
        } else {
            alert('The total probability must be 100%.');
            return false;
        }

    });

    $(document).on('change', 'select[name="prize_type[]"]', function () {
        changes_probability();
        let $coupon_type = $(this);
        let $row = $coupon_type.closest('tr');
        let coupon_type = $coupon_type.val();
        switch (coupon_type) {
            case 'non':
                $row.attr('class', `wheel_col wheel_col-${coupon_type}`);
                $row.find('.custom_type_label').val('Not Lucky');
                $row.find('select[name="email_templates[]"]').val('').trigger('change');
                break;
            case 'custom':
                $row.attr('class', `wheel_col wheel_col-${coupon_type}`);
                $row.find('.custom_type_value').val('');
                $row.find('.custom_type_label').val('');
                break;
            default:
        }
    });
    function indexChangeCal() {
        var ind = document.getElementsByClassName('wheel_col_index');
        for (var i = 0; i < ind.length; i++) {
            $('.wheel_col_index')[i].innerHTML = (i + 1);
        }
    }

    indexChangeCal();

    $('.wplwl_color_palette').on('click', function () {
        let color_code = $(this).data('color_code');
        let color_array = [],color_des = $('.color_palette').data('color_arr')[color_code];
        if (color_des?.pointer){
            $('#pointer_color').val(color_des.pointer).trigger('change');
        }
        $('#wheel_wrap_bg_color').val(color_code).trigger('change');
        if (color_des?.color && color_des.color.length){
            color_array = color_des.color;
        }
        let piece_color = $('.wheel_col').find('input[name="bg_color[]"]').map(function () {
            return $(this).val();
        }).get();
        let color_size = color_array.length,piece_size = piece_color.length,i, j = 0;
        for (i = 0; i < piece_size; i++) {
            if (j == color_size) {
                j = 0;
            }
            $('.wheel_col').find('input[name="bg_color[]"]').eq(i).val(color_array[j]).css({'background-color': color_array[j]});
            j++;
        }
        $('.auto_color_ok').on('click', function () {
            $('.color_palette').hide();
            $('.auto_color_ok_cancel').hide();
            $('.auto_color').show();
        });
        $('.auto_color_cancel').on('click', function () {
            j = 0;
            for (i = 0; i < piece_size; i++) {
                if (j == color_size) {
                    j = 0;
                }
                $('.wheel_col').find('input[name="bg_color[]"]').eq(i).val(piece_color[j]).css({'background-color': piece_color[j]});
                j++;
            }
            $('.color_palette').hide();
            $('.auto_color_ok_cancel').hide();
            $('.auto_color').show();
        })
    });
    $('.auto_color').on('click', function () {
        $('.color_palette').css({'display': 'flex'});
        $('.auto_color_ok_cancel').css({'display': 'inline-block'});
        $(this).hide();
        $('.auto_color_ok').on('click', function () {
            $('.color_palette').hide();
            $('.auto_color_ok_cancel').hide();
            $('.auto_color').show();
        });
        $('.auto_color_cancel').on('click', function () {
            $('.color_palette').hide();
            $('.auto_color_ok_cancel').hide();
            $('.auto_color').show();
        })
    });
});

jQuery(document).ready(function ($) {
    'use strict';
    // Set all variables to be used in scope
    var frame,
        metaBox = $('#wplwl-bg-image'), // Your meta box id here
        addImgLink = metaBox.find('.wplwl-upload-custom-img'),
        imgContainer = metaBox.find('.wplwl-image-container');
    $('.wheel_wrap_bg_image_custom').css('margin-top','15px');
    $('.wheel_wrap_bg_image_type').dropdown({
        onChange:function (val) {
            handle_choose_bg_image_type(val);
        }
    });
    handle_choose_bg_image_type($('.wheel_wrap_bg_image_type select').val())
    function handle_choose_bg_image_type(val){
        if (parseInt(val)){
            $('.wheel_wrap_bg_image_custom').show();
            if ($('.wplwl-remove-image').length){
                $('.wplwl-upload-custom-img').hide();
            }else {
                $('.wplwl-upload-custom-img').show();
            }
        }else {
            $('.wheel_wrap_bg_image_custom').hide();
            $('.wheel_wrap_bg_image').val(wp_lucky_wheel_params_admin.bg_img_default);
        }
    }
    // ADD IMAGE LINK
    addImgLink.on('click', function (event) {
        event.preventDefault();

        // If the media frame already exists, reopen it.
        if (frame) {
            frame.open();
            return;
        }

        // Create a new media frame
        frame = wp.media({
            title: 'Select or Upload Media Of Your Chosen Persuasion',
            button: {
                text: 'Use this media'
            },
            multiple: false  // Set to true to allow multiple files to be selected
        });


        // When an image is selected in the media frame...
        frame.on('select', function () {

            // Get media attachment details from the frame state
            var attachment = frame.state().get('selection').first().toJSON();
            console.log(attachment);
            var attachment_url;
            if (attachment.sizes.thumbnail) {
                attachment_url = attachment.sizes.thumbnail.url;
            } else if (attachment.sizes.medium) {
                attachment_url = attachment.sizes.medium.url;
            } else if (attachment.sizes.large) {
                attachment_url = attachment.sizes.large.url;
            } else if (attachment.url) {
                attachment_url = attachment.url;
            }
            // Send the attachment URL to our custom image input field.
            imgContainer.append('<img style="border: 1px solid;width: 300px;"class="review-images" src="' + attachment_url + '"/><input class="wheel_wrap_bg_image" name="wheel_wrap_bg_image" type="hidden" value="' + attachment.id + '"/><span class="wplwl-remove-image nagative vi-ui button">Remove</span>');

            $('.wplwl-upload-custom-img').hide();

        });

        // Finally, open the modal on click
        frame.open();
    });
    // DELETE IMAGE LINK
    $(document).on('click', '.wplwl-remove-image',function (event) {
        event.preventDefault();
        $(this).parent().html('');
        $('.wplwl-upload-custom-img').show();
    });

});
jQuery(document).ready(function ($) {
    'use strict';
//    select google font
    $('#wplwl-google-font-select').fontselect().change(function () {
        // replace + signs with spaces for css
        $('#wplwl-google-font-select').val($(this).val());
        $('.wplwl-google-font-select-remove').show();
    });
    $('.wplwl-google-font-select-remove').on('click', function () {
        $(this).parent().find('.font-select span').html('<span>Select a font</span>');
        $('#wplwl-google-font-select').val('');
        $(this).hide();
    })
    /*Color picker*/
    $('#wplwl_button_shop_color').iris({
        change: function (event, ui) {
            $(this).parent().find('.color-picker').css({backgroundColor: ui.color.toString()});
        },
        hide: true,
        border: true
    }).on('click', function (event) {
        event.stopPropagation();
        $('.iris-picker').hide();
        $(this).closest('td').find('.iris-picker').show();
    });
    $('#wplwl_button_shop_bg_color').iris({
        change: function (event, ui) {
            $(this).parent().find('.color-picker').css({backgroundColor: ui.color.toString()});
        },
        hide: true,
        border: true
    }).on('click', function (event) {
        event.stopPropagation();
        $('.iris-picker').hide();
        $(this).closest('td').find('.iris-picker').show();
    });

    $('.preview-emails-html-overlay').on('click', function () {
        $('.preview-emails-html-container').addClass('preview-html-hidden');
    });
    $('.wplwl-preview-emails-button').on('click', function () {
        $('.wplwl-preview-emails-button').html('Please wait...');
        $.ajax({
            url: wp_lucky_wheel_params_admin.url,
            type: 'GET',
            dataType: 'JSON',
            data: {
                action: 'wplwl_preview_emails',
                heading: $('#heading').val(),
                content: tinyMCE.get('content') ? tinyMCE.get('content').getContent() : $('#content').val(),
                from_name: $('#from_name').val(),
                footer_text: $('#footer_text').val(),
                email_base_color: $('#email_base_color').val(),
                email_background_color: $('#email_background_color').val(),
                email_body_background_color: $('#email_body_background_color').val(),
                email_body_text_color: $('#email_body_text_color').val(),
                wplwl_admin_nonce: wp_lucky_wheel_params_admin.wplwl_admin_nonce,
            },
            success: function (response) {
                $('.wplwl-preview-emails-button').html('Preview emails');
                if (response) {
                    $('.preview-emails-html').html(response.html);
                    $('.preview-emails-html-container').removeClass('preview-html-hidden');
                }
            },
            error: function (err) {
                $('.wplwl-preview-emails-button').html('Preview emails');
            }
        })
    })
    /*preview wheel*/
    $('.wp-lucky-wheel-preview-overlay').on('click', function () {
        $('.wp-lucky-wheel-preview').addClass('preview-html-hidden');
    })
    $('.preview-lucky-wheel').on('click', function () {
        let color = [];
        $('input[name="bg_color[]"]').map(function () {
            color.push($(this).val());
        });
        let slices_text_color = [];
        $('input[name="slices_text_color[]"]').map(function () {
            slices_text_color.push($(this).val());
        });
        let label = [];
        $('input[name="custom_type_label[]"]').map(function () {
            label.push($(this).val());
        });
        let prize_type = [];
        $('select[name="prize_type[]"]').map(function () {
            prize_type.push($(this).val());
        });
        let coupon_amount = [];
        $('input[name="coupon_amount[]"]').map(function () {
            coupon_amount.push($(this).val());
        });
        let wplwl_center_color = $('#wheel_center_color').val();
        let wplwl_border_color = '#ffffff';
        let wplwl_dot_color = '#000000';
        let slices = color.length;
        let sliceDeg = 360 / slices;
        let deg = -(sliceDeg / 2);
        let cv = document.getElementById('wplwl_canvas');
        let ctx = cv.getContext('2d');
        let width = 400;// size
        cv.width = width;
        cv.height = width;
        let center = (width) / 2;
        let wheel_text_size = parseInt(width / 28);
        for (let i = 0; i < slices; i++) {
            drawSlice(ctx, deg, color[i]);
            drawText(ctx, deg + sliceDeg / 2, label[i], slices_text_color[i], wheel_text_size);
            deg += sliceDeg;

        }
        cv = document.getElementById('wplwl_canvas1');
        ctx = cv.getContext('2d');
        cv.width = width;
        cv.height = width;
        drawPoint(ctx, deg, wplwl_center_color);
        let center_image = $('input[name="wheel_center_image"]').parent().find('img').attr('src');
        if (center_image) {
            let wl_image = new Image;
            wl_image.onload = function () {
                cv = document.getElementById('wplwl_canvas1');
                ctx = cv.getContext('2d');
                let image_size = 2 * (width / 8 - 7);
                ctx.arc(center, center, image_size / 2, 0, 2 * Math.PI);
                ctx.clip();
                ctx.drawImage(wl_image, center - image_size / 2, center - image_size / 2, image_size, image_size);

            };
            wl_image.src = center_image;
        }
        drawBorder(ctx, wplwl_border_color, 'rgba(0,0,0,0)', 20, 4, 5, 'rgba(0,0,0,0.2)');
        cv = document.getElementById('wplwl_canvas2');
        ctx = cv.getContext('2d');

        cv.width = width;
        cv.height = width;
        drawBorder(ctx, 'rgba(0,0,0,0)', wplwl_dot_color, 20, 4, 5, 'rgba(0,0,0,0)');

        $('.wp-lucky-wheel-preview').removeClass('preview-html-hidden');

        function deg2rad(deg) {
            return deg * Math.PI / 180;
        }

        function drawSlice(ctx, deg, color) {
            ctx.beginPath();
            ctx.fillStyle = color;
            ctx.moveTo(center, center);
            let r;
            if (width <= 480) {
                r = width / 2 - 10;
            } else {
                r = width / 2 - 14;
            }
            ctx.arc(center, center, r, deg2rad(deg), deg2rad(deg + sliceDeg));
            ctx.lineTo(center, center);
            ctx.fill();
        }

        function drawPoint(ctx, deg, color) {
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

        function drawBorder(ctx, borderC, dotC, lineW, dotR, des, shadColor) {
            ctx.beginPath();
            ctx.strokeStyle = borderC;
            ctx.lineWidth = lineW;
            ctx.shadowBlur = 1;
            ctx.shadowOffsetX = 8;
            ctx.shadowOffsetY = 8;
            ctx.shadowColor = shadColor;
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

        function drawText(ctx, deg, text, color, wheel_text_size) {
            ctx.save();
            ctx.translate(center, center);
            ctx.rotate(deg2rad(deg));
            ctx.textAlign = "right";
            ctx.fillStyle = color;
            ctx.font = '200 ' + wheel_text_size + 'px Helvetica';
            ctx.shadowOffsetX = 0;
            ctx.shadowOffsetY = 0;
            text = text.replace(/&#(\d{1,4});/g, function (fullStr, code) {
                return String.fromCharCode(code);
            });
            let reText = text.split('\/n'), text1 = '', text2 = '';
            if (reText.length > 1) {
                text1 = reText[0];
                text2 = reText.splice(1, reText.length - 1);
                text2 = text2.join('');
            }
            if (text1.trim() !== "" && text2.trim() !== "") {
                ctx.fillText(text1.trim(), 7 * center / 8, -(wheel_text_size * 1 / 4));
                ctx.fillText(text2.trim(), 7 * center / 8, wheel_text_size * 3 / 4);
            } else {
                ctx.fillText(text, 7 * center / 8, wheel_text_size / 2 - 2);
            }
            ctx.restore();
        }

    });
});
