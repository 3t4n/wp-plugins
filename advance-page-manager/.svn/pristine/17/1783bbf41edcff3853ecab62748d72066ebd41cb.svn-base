
jQuery(document).ready(function($) {

	jQuery('.wrap').html("<div id=\"icon-edit-pages\" class=\"icon32 icon32-posts-page\"><br /></div><h2>Wisi Advance Page Manager <a href=\"post-new.php?post_type=page\" class=\"add-new-h2\">Erstellen</a> </h2> <div style=\"clear:both\"></div><div id=\"wisiLoadedContent\"></div><div id=\"wisiAdvancePagesManager\"></div><div style=\"clear:both\"></div>");
	
	
	jQuery.ajax({
		  url: window.wisiscripturl + "manager.php",
		  success: function(data) {
			  jQuery('#wisiLoadedContent').html(data);
		  }
	});
	
	jQuery('#wisiAdvancePagesManager').fileTree({
        root: '0',
        script: window.wisiscripturl + "filetree.php",
        expandSpeed: 200,
        collapseSpeed: 200,
        multiFolder: true,
        folderEvent: 'click'
    }, function(file) {
        window.location = "post.php?post="+file+"&action=edit";
    });
    
   
	
	
	
});




var weiter = true;
var SucheGehtWeiter = false;

function liveSearchStart2( ding ) {
	if ( ding != "" ) {
		document.forms.searchform.q.value = ding;
	}
	
	if(document.forms.searchform.q.value.length > 1 ) {
		if(weiter == true ) {
				window.setTimeout("Hinweis()", 500);
                weiter = false;
                jQuery.get(window.wisiscripturl + "search.php?p="+document.forms.searchform.q.value, function(data) {
                	jQuery('#searchoutput').html(data);
                });
	  		weiter = false;
	  } else { SucheGehtWeiter = true; }
	  
	}
  }
  function liveSearchStart() {
  	liveSearchStart2("");
  }

  function Hinweis() {
		weiter = true;
		if ( SucheGehtWeiter == true) {
			liveSearchStart();
		}
		SucheGehtWeiter = false;
	}