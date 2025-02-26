(function ($) {

  regulusreignMLU = {
    removeFile: function () {
     
     $( '.mlu_remove').live( 'click', function(event) { 
        $(this).hide();
        $(this).parents().parents().children( '.upload').attr( 'value', '' );
        $(this).parents( '.screenshot').slideUp();
        
        return false;
      });
      
      $( 'a.delete-inline', '#option-1' ).hide();
      
    }, // End removeFile
    

    recreateFileField: function () {
    
      $( 'input.file').each(function(){
        var uploadbutton = '<input class="upload_file_button" type="button" value="Upload" />';
        $(this).wrap( '<div class="file_wrap" />' );
        $(this).addClass( 'file').css( 'opacity', 0); //set to invisible
        $(this).parent().append($( '<div class="fake_file" />').append($( '<input type="text" class="upload" />').attr( 'id',$(this).attr( 'id')+'_file')).val( $(this).val() ).append(uploadbutton));
 
        $(this).bind( 'change', function() {
          $( '#'+$(this).attr( 'id')+'_file').val($(this).val());
        });
        $(this).bind( 'mouseout', function() {
          $( '#'+$(this).attr( 'id')+'_file').val($(this).val());
        });
      });
      
    }, // End recreateFileField


	mediaUpload: function () {
	
	jQuery.noConflict();
	
	$( 'input.upload_button' ).removeAttr( 'style' );
	
      var formfield,
          formID,
          btnContent = true;
      // On Click
      $( 'input.upload_button').live( "click", function () {
        formfield = $(this).prev( 'input').attr( 'name' );
        formID = $(this).attr( 'rel' );
        // Display a custom title for each Thickbox popup.
        var regulus_title = 'Add Media';
        
       
       if ( regulus_title == '' && $(this).parents( '.regulus_metabox_fields' ).prev( 'th' ).find( 'label' ) ) { regulus_title = $(this).parents( '.regulus_metabox_fields' ).prev( 'th' ).find( 'label' ).text(); } // End IF Statement
        
        tb_show( regulus_title, 'media-upload.php?post_id='+formID+'&amp;title=' + regulus_title + '&amp;is_regulusreign=yes&amp;TB_iframe=1' );
        return false;
      });
            
      window.original_send_to_editor = window.send_to_editor;
      window.send_to_editor = function(html) {
        
        if (formfield) {
        	
          
          if ( $(html).html(html).find( 'img').length > 0 ) {
          
          	itemurl = $(html).html(html).find( 'img').attr( 'src' ); // Use the URL to the size selected.
          } else {
          
          // It's not an image. Get the URL to the file instead.
          	
          	var htmlBits = html.split( "'" ); // jQuery seems to strip out XHTML when assigning the string to an object. Use alternate method.
          
          	itemurl = htmlBits[1]; // Use the URL to the file.
          	
          	var itemtitle = htmlBits[2];
          	
          	itemtitle = itemtitle.replace( '>', '' );
          	itemtitle = itemtitle.replace( '</a>', '' );
          
          } // End IF Statement
		  
		  if (formfield == 'exppic') {
		  var attId = $(html).html(html).find('img').attr('class');
		  var attIdArr = attId.split("-");
		  var attIdNum = attIdArr.length - 1;
		  itemId = attIdArr[attIdNum];
          $( '#mediapic').val(itemId);
          }	
          $( '#' + formfield).val(itemurl);
          //$( '#' + formfield).siblings( '.screenshot').slideDown().html(btnContent);
          tb_remove();
          
        } else {
          window.original_send_to_editor(html);
        }
        
        // Clear the formfield value so the other media library popups can work as they are meant to. - 2010-11-11.
        formfield = '';
        
      }
      
    } // End mediaUpload
   
  }; // End regulusreignMLU Object // Don't remove this, or the sky will fall on your head.

  
	$(document).ready(function () {

		regulusreignMLU.removeFile();
		regulusreignMLU.recreateFileField();
		regulusreignMLU.mediaUpload();
	
	});
  
})(jQuery);