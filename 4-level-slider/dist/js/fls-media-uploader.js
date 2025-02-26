jQuery(document).ready(function($){
    $('.slideImgBtn').click(function(e) {
        var mediaUploader;
        var thisInput = $(this).prev('.slideImg');
        var thisImg = $(this).parent().parent().siblings('.slideimg_wrapper');
        e.preventDefault();
            if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
            text: 'Choose Image'
        }, multiple: false });
        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $(thisInput).val(attachment.url);
            $(thisImg).css("background-image", "url('" + $(thisInput).val() + "')");
        });
        mediaUploader.open();
    });
});