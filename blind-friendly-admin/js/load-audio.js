(function($) {
    // Create an audio element, and set it to autoplay, 
   // and show the player when the page loads.
    var audio = $('<audio />', {
      autoPlay : 'autoplay'
    });
    
    //Finding relative url of this script and audio
     var scripts = document.getElementsByTagName('script');
     var thisScript = scripts[scripts.length-1];
     var path = thisScript.src.replace(/\/script\.js$/, '/');
     var path1 = thisScript.src.replace("js/load-audio.js", '/sounds/audioFile1.ogg');
     var path2 = thisScript.src.replace("js/load-audio.js", '/sounds/audioFile1.mp3');

    // Call our addSource function, and pass in the audio element
    // and the path(s) to your audio.
    addSource(audio, path1);
    addSource(audio, path2);
   
    // When some event is fired...
    $('a').click(function() {
     // Add the audio + source elements to the page.
      audio.appendTo('body');  
      // Fadeout the anchor tag to keep the user from clicking it again.
      //$(this).fadeOut('slow');
      return false;
    });
     
   // Adds a source element, and appends it to the audio element, represented 
   // by elem.
    function addSource(elem, path) {
      $('<source />').attr('src', path).appendTo(elem);
    }
    
})(jQuery);