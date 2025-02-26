var amp_zaenu_uploader = jQuery.noConflict();
amp_zaenu_uploader(document).ready(function($){
    $('#zaenu_button').click(function(e) {
        e.preventDefault();
        var zaenu_image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_zaenu_image = zaenu_image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_zaenu_image);
            var zaenu_image_url = uploaded_zaenu_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#zaenu_logo').val(zaenu_image_url);
        });
    });
    $('#zaenu_button2').click(function(e) {
        e.preventDefault();
        var zaenu_icon = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_zaenu_icon = zaenu_icon.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_zaenu_icon);
            var zaenu_icon_url = uploaded_zaenu_icon.toJSON().url;
            // Let's assign the url value to the input field
            $('#zaenu_icon').val(zaenu_icon_url);
        });
    });
});