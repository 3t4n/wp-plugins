//--CAPitalZNEW--/	
function load() {   
    
    jQuery(function($) {

       //$('#post-title-1').bind("keydown", switchKBonKeyDown);
       //$('#post-title-1').bind("keypress", switchKBonKeyPress);

        //$('#post-content-0').bind("keydown", switchKBonKeyDown);
      // $('#post-content-0').bind("keypress", switchKBonKeyPress);

      

       //$('#post-title-0').bind("keydown", switchKBonKeyDown);
       //$('#post-title-0').bind("keypress", switchKBonKeyPress);
	    
	 //**Gutenburg Block classes for edit **// 
$('.body').on('focus', '.wp-block', 
	function (){  
   // console.log(this.id);
     // console.log('#'+this.id);
     //alert(this.id);

     $('#post-title-1, textarea').bind("keydown", switchKBonKeyDown);
        $('#post-title-1, textarea').bind("keypress", switchKBonKeyPress);
         $('#post-content-0, textarea').bind("keydown", switchKBonKeyDown);
        $('#post-content-0, textarea').bind("keypress", switchKBonKeyPress);

    // $('#'+this.id).bind("keydown", switchKBonKeyDown);
    //$('#'+this.id).bind("keypress", switchKBonKeyPress);
    
  
      
  });
	   
	   
		
		$('input[type="text"], textarea').bind("keydown", switchKBonKeyDown);
        $('input[type="text"], textarea').bind("keypress", switchKBonKeyPress);
		
  
    });
    
}
window.onload = load;
//--/CAPitalZNEW--/
