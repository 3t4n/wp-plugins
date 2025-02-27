(function($, win){

    var border = {
        img: '',
        encImg: '',

        encode: false,

        color: '#000',

        otop: 5,
        obottom: 5,
        oleft: 5,
        oright: 5,

        stop: 5,
        sbottom: 5,
        sleft: 5,
        sright: 5,

        repeat_h: 'repeat',
        repeat_v: 'repeat'
    }

    function updateImage() {
        var image = JSON.parse($('#customImageHidden').val())
        if (image) {
          var height = image.height;
          var width = image.width;

          $('#offsetTop').attr('max', height);
          $('#offsetTopText').attr('max', height);
          $('#offsetBottom').attr('max', height);
          $('#offsetBottomText').attr('max', height);
          $('#offsetRight').attr('max', width);
          $('#offsetRightText').attr('max', width);
          $('#offsetLeft').attr('max', width);
          $('#offsetLeftText').attr('max', width);

          $('#sizeTop').attr('max', height);
          $('#sizeTopText').attr('max', height);
          $('#sizeBottom').attr('max', height);
          $('#sizeBottomText').attr('max', height);
          $('#sizeRight').attr('max', width);
          $('#sizeRightText').attr('max', width);
          $('#sizeLeft').attr('max', width);
          $('#sizeLeftText').attr('max', width);

          border.img = image.url;
          console.log(border)
          updateCSS()
        }
    };

    /* Color Picker Init */
    $("#colorpicker").spectrum({
        showInput: true,
        color: "#000"
    });
    $("#colorpicker").show();
    $("#colorpicker").on('change', function(){
        $("#colorpicker").spectrum("set", $("#colorpicker").val());
        border.color = $("#colorpicker").spectrum('get').toHexString();
        $("#colorpicker").val($("#colorpicker").spectrum('get').toHexString());
        /*updateCSS();*/
        updateColorCSS();
        /*console.log( $("#colorpicker").spectrum('get').toHexString() );*/
    });

    /* -- / -- */

    $('input[type="number"]').on('keyup',function(){
        v = parseInt($(this).val());
        min = parseInt($(this).attr('min'));
        max = parseInt($(this).attr('max'));

        /*if (v < min){
            $(this).val(min);
        } else */if (v > max){
            $(this).val(max);
        }
    })

    $('#offsetTop, #offsetTopText').on('input', function(e){
        $('#offsetTop, #offsetTopText').val(this.value);
        border.otop = this.value;
        updateCSS();
    });

    $('#offsetBottom, #offsetBottomText').on('input', function(e){
        $('#offsetBottom, #offsetBottomText').val(this.value);
        border.obottom = this.value;
        updateCSS();
    });

    $('#offsetLeft, #offsetLeftText').on('input', function(e){
        $('#offsetLeft, #offsetLeftText').val(this.value);
        border.oleft = this.value;
        updateCSS();
    });

    $('#offsetRight, #offsetRightText').on('input', function(e){
        $('#offsetRight, #offsetRightText').val(this.value);
        border.oright = this.value;
        updateCSS();
    });

    $('#sizeTop, #sizeTopText').on('input', function(e){
        $('#sizeTop, #sizeTopText').val(this.value);
        border.stop = this.value;
        updateCSS();
    });

    $('#sizeTopColor, #sizeTopTextColor').on('input', function(e){
        $('#sizeTopColor, #sizeTopTextColor').val(this.value);
        border.stop = this.value;
        updateColorCSS();
    });

    $('#sizeBottom, #sizeBottomText, #sizeBottomColor, #sizeBottomTextColor').on('input', function(e){
        $('#sizeBottom, #sizeBottomText').val(this.value);
        border.sbottom = this.value;
        updateCSS();
    });

    $('#sizeBottomColor, #sizeBottomTextColor').on('input', function(e){
        $('#sizeBottomColor, #sizeBottomTextColor').val(this.value);
        border.sbottom = this.value;
        updateColorCSS();
    });

    $('#sizeLeft, #sizeLeftText').on('input', function(e){
        $('#sizeLeft, #sizeLeftText').val(this.value);
        border.sleft = this.value;
        updateCSS();
    });

    $('#sizeLeftColor, #sizeLeftTextColor').on('input', function(e){
        $('#sizeLeftColor, #sizeLeftTextColor').val(this.value);
        border.sleft = this.value;
        updateColorCSS();
    });

    $('#sizeRight, #sizeRightText, #sizeRightColor, #sizeRightTextColor').on('input', function(e){
        $('#sizeRight, #sizeRightText').val(this.value);
        border.sright = this.value;
        updateCSS();
    });

    $('#sizeRightColor, #sizeRightTextColor').on('input', function(e){
        $('#sizeRightColor, #sizeRightTextColor').val(this.value);
        border.sright = this.value;
        updateColorCSS();
    });

    $('#repeatV').change( function(e){
        border.repeat_v = this.value;
        updateCSS();
    });

    $('#repeatH').change( function(e){
        border.repeat_h = this.value;
        updateCSS();
    });

    $('#encode').change( function(e){
        border.encode = this.checked;
        updateCSS();
    });

    $('button[data-target="#howItWorks"]').on('click', function(){
        if($(this).text() === 'How it works'){
            $(this).text('Read less');
        }else
        if($(this).text() === 'Read less'){
            $(this).text('How it works');
        }
    })

    $('#copyToClipboard').on('click', function(){
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($('#codeGenerated').text()).select();
        document.execCommand("copy");
        $temp.remove();
    })

    var updateCSS = function(){
        var border_width = border.stop + 'px ' + border.sright + 'px ' + border.sbottom + 'px ' + border.sleft + 'px';
        var border_img_s = border.otop + ' ' + border.oright + ' ' + border.obottom + ' ' + border.oleft + '';
        var img = border.img;
        var encImg = border.encImg;
        /*var borderColor = border.color;*/

        if(border.encode){
            img = encImg;
        }

        var border_repeat = border.repeat_h + ' ' + border.repeat_v;

        $('#codeGenerated')
            .text(
              "[bdrimg w='"+border_width+"' i='"+img+"' is='"+border_img_s+"' ir='"+border_repeat+"']\n*** Your content ***\n[/bdrimg]"
            )
        $('#imgPreview + #css').html(
            '<style>'+
                '#imgPreview{' +
                    'border-style: solid;' +
                    'border-width: '+border_width+';' +
                    '-moz-border-image: url("'+img+'") '+border_img_s+' '+border_repeat+';' +
                    '-webkit-border-image: url("'+img+'") '+border_img_s+' '+border_repeat+';' +
                    '-o-border-image: url("'+img+'") '+border_img_s+' '+border_repeat+' ;' +
                    'border-image: url("'+img+'") '+border_img_s+' '+border_repeat+';' +
                '}' +
            '</style>'
        )
    }

    var updateColorCSS = function(){
        var border_width = border.stop + 'px ' + border.sright + 'px ' + border.sbottom + 'px ' + border.sleft + 'px';
        var borderColor = border.color;

        $('#codeGenerated')
            .text(
                "[bdrimg w='"+border_width+"' bc='"+borderColor+"']\n*** Your content ***\n[/bdrimg]"
            );
        $('#imgPreview + #css').html(
            '<style>'+
              '#imgPreview{' +
              'border-style: solid;' +
              'border-width: '+border_width+';' +
              'border-color: '+borderColor+';' +
              '}' +
            '</style>'
        )
    }

    /* Tabs Init */
    jQuery.fn.lightTabs = function(options){

        var createTabs = function(){
            tabs = this;
            i = 0;

            showPage = function(i){
                $(tabs).children("div").children("div").hide();
                $(tabs).children("div").children("div").eq(i).show();
                $(tabs).children("ul").children("li").removeClass("active");
                $(tabs).children("ul").children("li").eq(i).addClass("active");
                $('#codeGenerated').text('');
            }

            showPage(0);

            $(tabs).children("ul").children("li").each(function(index, element){
                $(element).attr("data-page", i);
                i++;
            });

            $(tabs).children("ul").children("li").click(function(){
                showPage(parseInt($(this).attr("data-page")));
            });
        };
        return this.each(createTabs);
    };

    $(document).ready(function(){
        $(".tabs").lightTabs();

        var mediaUploader;

        $('#customImage').click(function(e) {
          e.preventDefault();
          // If the uploader object has already been created, reopen the dialog
            if (mediaUploader) {
            mediaUploader.open();
            return;
          }
          // Extend the wp.media object
          mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
            text: 'Choose Image'
          }, multiple: false });

          // When a file is selected, grab the URL and set it as the text field's value
          mediaUploader.on('select', function() {
            attachment = mediaUploader.state().get('selection').first().toJSON();
            console.log(attachment)
            $('#customImageHidden').val(JSON.stringify(attachment));
            $('.image-name').text(attachment.filename);
            updateImage();
          });
          // Open the uploader dialog
          mediaUploader.open();
        });
    });

})(jQuery, window);