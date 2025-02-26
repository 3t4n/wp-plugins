// alert("buttons.js");

(function() {
    tinymce.PluginManager.add('docupress', function( editor, url ) {
        editor.addButton( 'docupress', {
            text: 'Add Document',
            icon: false,
            onclick: function() {
                // editor.insertContent('Hello World!');
                // jQuery("#add_docs_docpress").on("click", function(){
			      var url = 'https://fifthsegment.github.io/documentpress/filepicker.htm';
			      var w = screen.width*0.8;
			      var h = screen.height*0.8;
			      // console.log ("width = "+w);
			      window.open(url, "File Picker", "width="+w+", height="+h);
			      window.onmessage = function (e) {
			        // alert(e.data.url);
			        console.log(e.data);
			        var code = "[docupress-document url='"+e.data.url+"'/]";
			        editor.insertContent(code);
			      // if (e.data) {
			      //     //Code for true
			      // } else {
			      //     //Code for false
			      // }
			      };
			    // });
            }
        });
    });
})();