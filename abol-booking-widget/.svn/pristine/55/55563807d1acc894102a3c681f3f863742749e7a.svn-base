jQuery(document).ready(function($){

  var mediaUploader;

  $('#upload-button').click(function(e) {
    e.preventDefault();
    openMediaPicker();
  });

  $('.current_img').click(function(e) {
      e.preventDefault();
      openMediaPicker();
  });

  function openMediaPicker() {
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
      $('#image-url').val(attachment.url);
    });
    // Open the uploader dialog
    mediaUploader.open();      
  }

});