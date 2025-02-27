if (typeof uploadSuccess !== 'undefined') {

    var uploadSuccess_original = uploadSuccess;

    uploadSuccess = function(fileObj, serverData)
    {

        uploadSuccess_original(fileObj, serverData);

        jQuery.ajax({
         url:WPURLS.siteurl,
         type:"POST",
         async:true,
         data:{
           'action': 'verify_highcompress_process_auto'},
             success: function(data)
             {
               console.log(data);
           }
    });
    }
//auto-compress ajax request.
}
if (typeof wp.Uploader !== 'undefined' && typeof wp.Uploader.queue !== 'undefined') {
    wp.Uploader.queue.on('reset', function()
    {
      jQuery.ajax({
       url:WPURLS.siteurl,
       type:"POST",
       async:true,
       data:{
         'action': 'verify_highcompress_process_auto'},
           success: function(data)
           {
             console.log(data);

         }
  });
    });
}
