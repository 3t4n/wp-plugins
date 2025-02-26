$(document).ready(function() {

 var mediaUploader;
 $('#testibgimg').on('click',function(e){
 	e.preventDefault();
 	if(mediaUploader){
 		mediaUploader.open();
 		return;
 	}
 	mediaUploader=wp.media.frames.file_frame=wp.media({
 		'title': 'Choose a Testimonial Background Image',
 		button:{
 			'text':'choosePicture'
 		},
 		multiple:false
 	});
 	mediaUploader.on('select',function(){
 		attachment=mediaUploader.state().get('selection').first().toJSON();
 		
 		$('#testibgurl').text(attachment.url);
 	});
 	mediaUploader.open();

 });

});




