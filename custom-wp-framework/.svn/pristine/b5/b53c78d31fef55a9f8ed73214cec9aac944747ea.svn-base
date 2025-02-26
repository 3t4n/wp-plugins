jQuery(document).ready(function($){

  var mediaUploader;
  $('.cwf-media-upload-button').click(function(e) {
    e.preventDefault();
    var sourceElement = e.target.id;
    var outputType = e.target.getAttribute('data-type');
    var outputDestination = e.target.getAttribute('data-destination');
    var inputDestination = e.target.getAttribute('data-input');
    var mediaTitle = e.target.getAttribute('data-media');
    var resetInput = e.target.getAttribute('data-reset');
    var resetType = e.target.getAttribute('data-reset-type');
      if (mediaUploader) {
      mediaUploader.open();
      return;
    }
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: mediaTitle,
      button: {
      text: mediaTitle
    }, multiple: false });
    mediaUploader.on('select', function() {
      var attachment = mediaUploader.state().get('selection').first().toJSON();
      $("#"+outputDestination).html(attachment.filename);
      if(inputDestination != "") { $("#"+inputDestination).val(attachment.url); }
      if(resetInput != ""){
        if(resetType == "radio"){
          $("input[name="+resetInput+"]").attr('checked',false);
        }
      }
    });
    mediaUploader.open();
  });
});