// Thanks to: http://www.webmaster-source.com/2013/02/06/using-the-wordpress-3-5-media-uploader-in-your-plugin-or-theme/
jQuery(document).ready(function($){
  var aFSMnImgUp,
      aFSBgImgUp;

  $('#aFSMnImgBttn').click(function(e) {
    e.preventDefault();
    //If the uploader object has already been created, reopen the dialog
    if (aFSMnImgUp) {
      aFSMnImgUp.open();
      return;
    }
    //Extend the wp.media object
    aFSMnImgUp = wp.media.frames.file_frame = wp.media({
      title: 'Choose Main Image',
      button: {
        text: 'Choose Main Image'
      },
      multiple: false
    });
    //When a file is selected, grab the URL and set it as the text field's value
    aFSMnImgUp.on('select', function() {
      aFSMIAttachment = aFSMnImgUp.state().get('selection').first().toJSON();
      $('#aFSMnIIm').val(aFSMIAttachment.url).change();
      $('#aFSMnAlt').val(aFSMIAttachment.alt);
    });
    //Open the uploader dialog
    aFSMnImgUp.open();
  });

  $('#aFSBgImgBttn').click(function(e) {
    e.preventDefault();
    if (aFSBgImgUp) {
      aFSBgImgUp.open();
      return;
    }
    aFSBgImgUp = wp.media.frames.file_frame = wp.media({
      title: 'Choose Background Image',
      button: {
        text: 'Choose Background Image'
      },
      multiple: false
    });
    aFSBgImgUp.on('select', function() {
      attachment = aFSBgImgUp.state().get('selection').first().toJSON();
      $('#aFSBgdIm').val(attachment.url).change();
    });
    aFSBgImgUp.open();
  });

  $('#aFSMnLnkBttn').click(function(event) {
    wpActiveEditor = true; //we need to override this var as the link dialogue is expecting an actual wp_editor instance
    wpLink.open(); //open the link popup
    return false;
  });
  $('#wp-link-submit').click(function(event) {
    var aFSMILinkAtts = wpLink.getAttrs();//the links attributes (href, target) are stored in an object, which can be access via  wpLink.getAttrs()
    $('#aFSMnLnk').val(aFSMILinkAtts.href);//get the href attribute and add to a textfield, or use as you see fit
    $('#aFSMTarg').prop( "checked", aFSMILinkAtts.target );
    wpLink.textarea = $('#aFSMnLnk'); //to close the link dialogue, it is again expecting a wp_editor instance, so you need to give it something to set focus back to. In this case, I'm using body, but the textfield with the URL would be fine
    wpLink.close();//close the dialogue
    //trap any events
    event.preventDefault ? event.preventDefault() : event.returnValue = false;
    event.stopPropagation();
    return false;
  });
  $('#wp-link-cancel, #wp-link-close').click(function(event) {
    wpLink.textarea = $('#aFSMnLnk');
    wpLink.close();
    event.preventDefault ? event.preventDefault() : event.returnValue = false;
    event.stopPropagation();
    return false;
  });

});
