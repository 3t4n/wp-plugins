this.anchorsAway = function(message){
  jQuery(document).ready(function(){
    jQuery('a[href]').each(function(){
      var a = jQuery(this);
      a.click(function(evt){
	evt.preventDefault();
	if(message) alert(message);
      });
    });
  });
};

