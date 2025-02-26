jQuery(document).ready(function($){

    $.shispSanitizeSlider = function(shispSliderInput) {
        return shispSliderInput.replace(/<(|\/|[^>\/bi]|\/[^>bi]|[^\/>][^>]+|\/[^>][^>]+)>/g, '');
    };
    
    $.shispSanitizeUrl = function(shispSliderUrl) {
        var pattern = /(http(s)?:\/\/)?(www\.)?[^(<|>|\(|\)|=)]{2,256}\.[a-z]{2,6}[^(<|>|\(|\)|=)]*/igm;
        if ( pattern.test(shispSliderUrl) ) {
            return shispSliderUrl.replace(/<(|\/|[^>\/bi]|\/[^>bi]|[^\/>][^>]+|\/[^>][^>]+)>/g, '');
        }else{
            return null;
        }
    };
    
    $('li.shisp-add-new-slide').click(function(){
        $('div.shisp-lightboxme').lightbox_me({
            centered: true,
            closeSelector: '.shisp-slide-cancel',
            onLoad: function(){

                $('input.shisp-slide-insert').val(shisp_data.insert);
                $('div.shisp-lightboxme img').attr('src',shisp_data.no_image);
                $('#shisp-current-slide').val(0);
                $('#shisp-new-slide-title').attr('type','text');
                $('#shisp-new-slide-title').val('');
                $('#shisp-new-slide-url').attr('type','text');
                $('#shisp-new-slide-url').val('');
                $('input.shisp-slide-delete').css('display','none');

            }
        });
    });

    $(document).on('click','#shisp-sliders-metabox li:not(.shisp-add-new-slide)',function(){

        var SlideId         = $(this).data('slide');
        var inputElement    = $(this).find('input');
        var imgUrl          = $(inputElement).eq(0).val();
        var caption         = $(inputElement).eq(1).val();
        var url             = $(inputElement).eq(2).val();

        $('div.shisp-lightboxme').lightbox_me({
            centered: true,
            closeSelector: '.shisp-slide-cancel',
            onLoad: function(){

                $('input.shisp-slide-insert').val(shisp_data.edit);
                $('#shisp-current-slide').val(SlideId);
                $('div.shisp-lightboxme img').attr('src',imgUrl);
                $('#shisp-new-slide-title').attr('type','text');
                $('#shisp-new-slide-title').val(caption);
                $('#shisp-new-slide-url').attr('type','text');
                $('#shisp-new-slide-url').val(url);
                $('input.shisp-slide-delete').css('display','inline-block');

            }
       
        });
    });

    $('div.shisp-lightboxme img').click(function(){
        var el = $(this);
        tb_show(shisp_data.tb_title,'media-upload.php?type=image&TB_iframe=true');
        window.send_to_editor = function ( html ){
            var imageUrl = $('img',html).attr('src');
            $(el).attr('src',imageUrl);
            $(el).removeClass('shisp-no-img-selected');
            tb_remove();
        }
        return false;
    });

    $('input.shisp-slide-insert').click(function(){

        var CurrentSlide       = $('#shisp-current-slide').val();
        var shispFinalimgUrl   = $('div.shisp-lightboxme img').attr('src');
        var FinalimgUrl        = $.shispSanitizeUrl(shispFinalimgUrl);
        var shispTitle         = $('#shisp-new-slide-title').val();
        var Title              = $.shispSanitizeSlider(shispTitle);
        var shispFinalUrl      = $('#shisp-new-slide-url').val();
        var FinalUrl           = $.shispSanitizeUrl(shispFinalUrl);
        console.log(FinalUrl);
        console.log(FinalimgUrl);

        if(FinalimgUrl == shisp_data.no_image) {
            alert(shisp_data.no_image_alert);
            return false;
        }else {
            if(CurrentSlide == 0) {
                var SlideId = $("li.shisp-add-new-slide").prev().data('slide');
                SlideId++;

                var NewHtml = `<li class="shisp-slides-li" title="${Title}" data-slide="${SlideId}" data-content="${shisp_data.edit}"><img class="shisp-image-slide" src="${FinalimgUrl}"><input type="hidden" name="shisp-slider-images[]" value="${FinalimgUrl}"><input type="hidden" name="shisp-slider-captions[]" value="${Title}"><input type="hidden" name="shisp-slider-urls[]" value="${FinalUrl}"></li>`;
                $(NewHtml).insertBefore('li.shisp-add-new-slide');
            }else {
                var slideForEdit = $(`li[data-slide="${CurrentSlide}"] *`);
                $(`li[data-slide="${CurrentSlide}"]`).attr('title',Title);
                $(slideForEdit).eq(0).attr('src',FinalimgUrl);
                $(slideForEdit).eq(1).val(FinalimgUrl);
                $(slideForEdit).eq(2).val(Title);
                $(slideForEdit).eq(3).val(FinalUrl);
            }
        }

        $('div.shisp-lightboxme').trigger('close');

        return false;

    });

    $('input.shisp-slide-delete').click(function(){

        var CurrentSlideForDelete   = $('#shisp-current-slide').val();
        // var SlideForDelete          = $(`li[data-slide="${CurrentSlideForDelete}"] *`);
        $(`li[data-slide="${CurrentSlideForDelete}"]`).remove();
        $('div.shisp-lightboxme').trigger('close');

    });

});