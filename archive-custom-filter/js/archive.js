jQuery(document).ready(function($){
	$('#yearsdata').on('change', function() {
	       var url = this.value; 
          if (url) {
              window.location = url;
          }
          return false;
	});
});