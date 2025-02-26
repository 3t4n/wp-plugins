	(function($) {
	$(document).ready(function() {
	function parseQueryString(queryString) {
    var obj = {};
    function sliceUp(x) { x.replace('?', '').split('|').forEach(splitUp); }
    function splitUp(x) { var str = x.split('='); obj[str[0]] = decodeURIComponent(str[1]); }
    try { (!queryString ? sliceUp(location.search) : sliceUp(queryString)); } catch(e) {}
   return obj;
}

   valobj = parseQueryString(val1);
   console.log(valobj);
   
  
  
	
	$('.wp-editor-area').correctme({
        corrections: valobj,
    });

 




	});
	
	(function() {
    tinymce.PluginManager.add('gavickpro_tc_button', function( editor, url ) {
        editor.addButton( 'gavickpro_tc_button', {
            title: 'My test button',
            icon: 'icon gavickpro-own-icon',
            onclick: function() {
                editor.insertContent('Hello World!');
            }
        });
    });
})();

	}(jQuery));
	
	